<?php

/*$fruits = [
["Apple", "Red",
["Tomato", "Red"],
],
["Banana", "Yellow"],
["Grape", "Purple"]

];

echo "<pre>";

//print_r($fruits);

echo ($fruits[0][2][1]);

echo "<pre>";*/

$user = [
"name" => "Alice", 
"email" => "alice@gmail.com",
"password" => "123", 
"address" => "123 Main St.", 
"hobbies" => ["Reading","Video Games", "Painting", "Dancing"]
];

$user["Race"] = "Afro Descent";

echo "<pre>";

var_dump($user);

echo "<pre>";

$output = $user["name"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Introduction to PHP</title>
</head>

<body class="bg-gray-100">
    <header class="bg-blue-500 text-white p-4">
        <div class="container mx-auto">
            <h1 class="text-3xl font-semibold">Associative Arrays in PHP</h1>
        </div>
    </header>
    <div class="container mx-auto p-4 mt-4">
        <div class="bg-white rounded-lg shadow-md p-6 mt-6">
            <!-- Output -->
            <p class="text-xl"><?= $output ?></p>
        </div>
    </div>
</body>

</html>