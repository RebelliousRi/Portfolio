<?php
/**
 * Encryption configuration
 * Store these values in environment variables in production
 */

// Only generate new keys if they don't exist
if (!file_exists(__DIR__ . '/encryption_keys.php')) {
    $encryption_key = bin2hex(random_bytes(32)); // 64 characters for AES-256
    $encryption_iv = bin2hex(random_bytes(16));  // 32 characters for AES-256-CBC
    
    $content = "<?php\n";
    $content .= "if (!defined('ENCRYPTION_KEY')) define('ENCRYPTION_KEY', '" . $encryption_key . "');\n";
    $content .= "if (!defined('ENCRYPTION_IV')) define('ENCRYPTION_IV', '" . $encryption_iv . "');\n";
    
    file_put_contents(__DIR__ . '/encryption_keys.php', $content);
}

// Include the keys only if they haven't been defined
if (!defined('ENCRYPTION_KEY') || !defined('ENCRYPTION_IV')) {
    require_once __DIR__ . '/encryption_keys.php';
}

// Fields that should be encrypted in the database
if (!defined('ENCRYPTED_FIELDS')) {
    define('ENCRYPTED_FIELDS', [
        'phone',
        'address',
        'email',
        'em_phone',
        'em_address',
        'conditions'
    ]);
}

// Fields that should be hashed (one-way encryption)
if (!defined('HASHED_FIELDS')) {
    define('HASHED_FIELDS', [
        'pwd'
    ]);
} 