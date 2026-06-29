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
    echo json_encode(['error' => 'Invalid input']);
    exit;
}

$name = htmlspecialchars($data['name'] ?? '', ENT_QUOTES, 'UTF-8');
$email = filter_var($data['email'] ?? '', FILTER_SANITIZE_EMAIL);
$phone = htmlspecialchars($data['phone'] ?? '', ENT_QUOTES, 'UTF-8');
$message = htmlspecialchars($data['message'] ?? '', ENT_QUOTES, 'UTF-8');

// Validate required fields
if (empty($message)) {
    http_response_code(400);
    echo json_encode(['error' => 'Message is required']);
    exit;
}

if (empty($email) && empty($phone)) {
    http_response_code(400);
    echo json_encode(['error' => 'Email or phone is required']);
    exit;
}

// Prepare email content
$subject = "New Contact Form Message from $name";
$htmlBody = "
<div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;'>
    <h2 style='color: #2563eb;'>New Message from Essafir Residence Website</h2>
    <div style='background: #f3f4f6; padding: 20px; border-radius: 8px; margin: 20px 0;'>
        <p><strong>Name:</strong> $name</p>
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
    "Subject" => $subject,
    "HtmlBody" => $htmlBody,
    "TextBody" => "Name: $name\nEmail: $email\nPhone: $phone\n\nMessage:\n$message"
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
    http_response_code(500);
    echo json_encode([
        'error' => 'Failed to send email',
        'http_code' => $httpCode,
        'curl_error' => $curlError ?: null,
        'details' => $response ?: null
    ]);
}
?>