<?php
// Start session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Load environment variables helper
function loadEnv($filePath) {
    if (!file_exists($filePath)) {
        return;
    }
    
    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        // Skip comments
        if (strpos(trim($line), '#') === 0) {
            continue;
        }
        
        $parts = explode('=', $line, 2);
        if (count($parts) === 2) {
            $key = trim($parts[0]);
            $value = trim($parts[1]);
            $value = trim($value, '"\'');
            
            putenv("$key=$value");
            $_ENV[$key] = $value;
            $_SERVER[$key] = $value;
        }
    }
}

// Load env file from the root directory
loadEnv(__DIR__ . '/../.env');

// Site Configuration
// NOTE: Secrets (API keys) must live in the .env file at the project root,
// never as hardcoded fallbacks here. Non-secret display values (phone,
// admin recipient list, sender address) keep a safe fallback so the site
// still renders if .env is briefly missing, but ideally also move to .env.
define('SITE_NAME', 'Essafir Residence');
define('WHATSAPP_PHONE', getenv('WHATSAPP_PHONE') ?: '+21650836840');
define('POSTMARK_API_KEY', getenv('POSTMARK_API_KEY') ?: '');
define('ADMIN_EMAILS', getenv('ADMIN_EMAILS') ?: 'hosni.hamdi2009@gmail.com,Essafir.hotel@gmail.com');
define('FROM_EMAIL', getenv('FROM_EMAIL') ?: 'info@saboura.net');

// Load translations
function getTranslations() {
    static $translations = null;
    if ($translations === null) {
        $jsonFile = __DIR__ . '/../data/translations.json';
        $jsonContent = file_get_contents($jsonFile);
        $translations = json_decode($jsonContent, true);
    }
    return $translations;
}

// Get current language from session or default to 'en'
function getCurrentLanguage() {
    if (!isset($_SESSION['lang'])) {
        $_SESSION['lang'] = 'en';
    }
    return $_SESSION['lang'];
}

// Get translation for current language
function t($key) {
    $translations = getTranslations();
    $lang = getCurrentLanguage();
    $keys = explode('.', $key);
    $value = $translations[$lang] ?? $translations['en'];
    
    foreach ($keys as $k) {
        if (isset($value[$k])) {
            $value = $value[$k];
        } else {
            return $key;
        }
    }
    
    return $value;
}

// Simple per-session cooldown to stop double-submits and rapid-fire spam
// on the contact form. Returns true if the action is allowed right now.
function checkRateLimit($key = 'contact_form', $seconds = 20) {
    $sessionKey = "rate_limit_$key";
    $now = time();
    $last = $_SESSION[$sessionKey] ?? 0;

    if ($now - $last < $seconds) {
        return false;
    }

    $_SESSION[$sessionKey] = $now;
    return true;
}

// Set language
if (isset($_GET['lang']) && in_array($_GET['lang'], ['en', 'fr', 'ar'])) {
    $_SESSION['lang'] = $_GET['lang'];
    // Redirect to remove lang parameter from URL, preserving section hash if provided
    $redirect = strtok($_SERVER["REQUEST_URI"], '?');
    $hash = '';
    if (isset($_GET['hash']) && preg_match('/^[a-zA-Z0-9_-]+$/', $_GET['hash'])) {
        $hash = '#' . $_GET['hash'];
    }
    header("Location: $redirect$hash");
    exit;
}
?>