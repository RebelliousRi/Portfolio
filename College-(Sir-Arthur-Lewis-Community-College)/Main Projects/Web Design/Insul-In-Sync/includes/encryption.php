<?php
/**
 * Encryption functions for patient data
 * Uses AES-256-CBC encryption with a secure key
 */

require_once __DIR__ . '/encryption_config.php';

// Only generate new keys if they don't exist
if (!file_exists(__DIR__ . '/encryption_keys.php')) {
    // ...key generation code...
}
if (!defined('ENCRYPTION_KEY') || !defined('ENCRYPTION_IV')) {
    require_once __DIR__ . '/encryption_keys.php';
}

function getAesKey() {
    return hex2bin(ENCRYPTION_KEY);
}
function getAesIv() {
    return hex2bin(ENCRYPTION_IV);
}

/**
 * Encrypt sensitive data
 * @param string $data Data to encrypt
 * @return string Encrypted data
 */
function encryptData($data) {
    if (empty($data)) {
        return $data;
    }
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt(
        $data,
        'aes-256-cbc',
        getAesKey(),
        0,
        $iv
    );
    $combined = $iv . $encrypted;
    return base64_encode($combined);
}

/**
 * Decrypt sensitive data
 * @param string $encryptedData Encrypted data to decrypt
 * @return string Decrypted data
 */
function decryptData($encryptedData) {
    if (empty($encryptedData)) {
        return $encryptedData;
    }
    $decoded = base64_decode($encryptedData);
    $ivLength = openssl_cipher_iv_length('aes-256-cbc');
    $iv = substr($decoded, 0, $ivLength);
    $encrypted = substr($decoded, $ivLength);
    $decrypted = openssl_decrypt(
        $encrypted,
        'aes-256-cbc',
        getAesKey(),
        0,
        $iv
    );
    return $decrypted;
}

/**
 * Hash sensitive data (for one-way encryption)
 * @param string $data Data to hash
 * @return string Hashed data
 */
function hashData($data) {
    if (empty($data)) {
        return $data;
    }
    
    return password_hash($data, PASSWORD_ARGON2ID, [
        'memory_cost' => 65536,  // 64MB
        'time_cost' => 4,        // 4 iterations
        'threads' => 3           // 3 threads
    ]);
}

/**
 * Verify hashed data
 * @param string $data Original data
 * @param string $hash Hashed data to verify against
 * @return bool True if data matches hash
 */
function verifyHash($data, $hash) {
    if (empty($data) || empty($hash)) {
        return false;
    }
    
    return password_verify($data, $hash);
}

/**
 * Encrypt an array of sensitive data
 * @param array $data Array of data to encrypt
 * @param array $fields Fields to encrypt
 * @return array Encrypted data
 */
function encryptArray($data, $fields) {
    foreach ($fields as $field) {
        if (isset($data[$field])) {
            $data[$field] = encryptData($data[$field]);
        }
    }
    return $data;
}

/**
 * Decrypt an array of sensitive data
 * @param array $data Array of data to decrypt
 * @param array $fields Fields to decrypt
 * @return array Decrypted data
 */
function decryptArray($data, $fields) {
    foreach ($fields as $field) {
        if (isset($data[$field])) {
            $data[$field] = decryptData($data[$field]);
        }
    }
    return $data;
}

/**
 * Generate a secure encryption key
 * @return string Secure encryption key
 */
function generateEncryptionKey() {
    return bin2hex(random_bytes(32)); // 64 characters for AES-256
}

/**
 * Generate a secure IV
 * @return string Secure IV
 */
function generateIV() {
    return bin2hex(random_bytes(16)); // 32 characters for AES-256-CBC
}

// Example usage:
/*
// Encrypting sensitive data
$encryptedPhone = encryptData($phone);
$encryptedAddress = encryptData($address);

// Decrypting data
$decryptedPhone = decryptData($encryptedPhone);
$decryptedAddress = decryptData($encryptedAddress);

// Hashing sensitive data (one-way)
$hashedSSN = hashData($ssn);

// Encrypting multiple fields
$sensitiveFields = ['phone', 'address', 'email'];
$encryptedData = encryptArray($patientData, $sensitiveFields);

// Decrypting multiple fields
$decryptedData = decryptArray($encryptedData, $sensitiveFields);
*/ 