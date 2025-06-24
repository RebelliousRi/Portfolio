<?php

include 'config.php';


$sensitiveData = "Krossing";
$salt = bin2hex(random_bytes(16)); // Generate random salt 
$pepper = "ASecretPepperString";
$dataToHash = $sensitiveData. $salt. $pepper;
$hash = hash("sha256", $dataToHash);


$sensitiveData = "Krossing2";
$storedSalt = $salt;
$storedHash = $hash;
$pepper = "ASecretPepperString";
$dataToHash = $sensitiveData . $storedSalt . $pepper;
$verificationHash
=
hash("sha256", $dataToHash);
if ($storedHash === $verificationHash) { echo "The data are the same!";
} else {
}
echo "The data are not the same!";



$pwdSignup = "Krossing";

$options = [
'cost' => 12
];

$hashedPwd = password_hash($pwdSignup, PASSWORD_BCRYPT, $options);

$pwdLogin = "Krossing2";
if (password_verify($pwdLogin, $hashedPwd)) {
echo "They are the same!";
} else {
echo "They are not the same!";
}

?>



