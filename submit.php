<?php
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

// Include config & load environment variables
require_once 'includes/config.php';

$postmarkApiKey = POSTMARK_API_KEY;
$from = FROM_EMAIL;
$adminEmails = ADMIN_EMAILS;

// Get and sanitize input
$data = json_decode(file_get_contents('php://input'), true);

if (!$data) {
    http_response_code(400);
    echo json_encode(['error' => 'invalid_input']);
    exit;
}

$name = trim(htmlspecialchars($data['name'] ?? '', ENT_QUOTES, 'UTF-8'));
$emailRaw = trim($data['email'] ?? '');
$phone = trim(htmlspecialchars($data['phone'] ?? '', ENT_QUOTES, 'UTF-8'));
$message = trim(htmlspecialchars($data['message'] ?? '', ENT_QUOTES, 'UTF-8'));

// Honeypot check: if website_url field is filled, reject silently (anti-bot)
$websiteHp = trim($data['website_url'] ?? '');
if ($websiteHp !== '') {
    echo json_encode(['success' => true, 'message' => 'Message sent successfully']);
    exit;
}

// Time check: reject submissions faster than 1.5s after page load
$formTime = (int)($data['form_time'] ?? 0);
if ($formTime > 0 && (time() - $formTime) < 1) {
    http_response_code(429);
    echo json_encode(['error' => 'rate_limited']);
    exit;
}

// Length guards — keep the payload sane regardless of what the client sent
$name = mb_substr($name, 0, 120);
$phone = mb_substr($phone, 0, 40);
$message = mb_substr($message, 0, 4000);

// Validate required fields
if ($message === '') {
    http_response_code(400);
    echo json_encode(['error' => 'message_required']);
    exit;
}

$email = '';
if ($emailRaw !== '') {
    if (!filter_var($emailRaw, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo json_encode(['error' => 'invalid_email']);
        exit;
    }
    $email = htmlspecialchars($emailRaw, ENT_QUOTES, 'UTF-8');
}

if ($email === '' && $phone === '') {
    http_response_code(400);
    echo json_encode(['error' => 'contact_required']);
    exit;
}

// Throttle rapid repeat submissions from the same browser session
if (!checkRateLimit('contact_form', 20)) {
    http_response_code(429);
    echo json_encode(['error' => 'rate_limited']);
    exit;
}

if (empty($postmarkApiKey)) {
    // Misconfigured server (missing .env) — fail clearly instead of
    // silently calling Postmark with a blank token.
    http_response_code(500);
    echo json_encode(['error' => 'server_misconfigured']);
    exit;
}

// Prepare email content
$displayName = $name !== '' ? $name : 'Website Visitor';
$subject = "New Contact Form Message from $displayName";
$htmlBody = "
<div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;'>
    <h2 style='color: #2563eb;'>New Message from Essafir Residence Website</h2>
    <div style='background: #f3f4f6; padding: 20px; border-radius: 8px; margin: 20px 0;'>
        <p><strong>Name:</strong> $displayName</p>
        <p><strong>Email:</strong> " . ($email ?: 'Not provided') . "</p>
        <p><strong>Phone:</strong> " . ($phone ?: 'Not provided') . "</p>
    </div>
    <div style='background: white; padding: 20px; border: 1px solid #e5e7eb; border-radius: 8px;'>
        <p><strong>Message:</strong></p>
        <p style='white-space: pre-wrap;'>$message</p>
    </div>
</div>
";

$requestBody = [
    "From" => $from,
    "To" => $adminEmails,
    "ReplyTo" => $email ?: $from,
    "Subject" => $subject,
    "HtmlBody" => $htmlBody,
    "TextBody" => "Name: $displayName\nEmail: $email\nPhone: $phone\n\nMessage:\n$message"
];

// Send email via Postmark
$ch = curl_init("https://api.postmarkapp.com/email");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "Accept: application/json",
    "X-Postmark-Server-Token: $postmarkApiKey"
]);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($requestBody));
curl_setopt($ch, CURLOPT_TIMEOUT, 10);

// Disable SSL verification only on localhost for development convenience
$isLocalhost = in_array($_SERVER['HTTP_HOST'] ?? '', ['localhost', '127.0.0.1', '[::1]']) ||
               in_array($_SERVER['REMOTE_ADDR'] ?? '', ['127.0.0.1', '::1']);
if ($isLocalhost) {
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
}

$response = curl_exec($ch);
$curlError = curl_error($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpCode == 200) {
    echo json_encode([
        'success' => true,
        'message' => 'Email sent successfully'
    ]);
} else {
    // Log details server-side only; the client gets a generic error code
    error_log("Postmark send failed (HTTP $httpCode): " . ($curlError ?: $response));
    http_response_code(500);
    echo json_encode(['error' => 'send_failed']);
}
?>