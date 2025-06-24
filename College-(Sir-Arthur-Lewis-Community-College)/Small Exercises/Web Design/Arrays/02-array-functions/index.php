<?php

$ids = [10,22,15,45,67];
$users = ["user2", "user4", "user3", "user1", "user5"];

//counts the number of members
//$output = count($ids);

//
$output = sort($users);


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
            <h1 class="text-3xl font-semibold">PHP Array Functions</h1>
        </div>
    </header>
    <div class="container mx-auto p-4 mt-4">
        <div class="bg-white rounded-lg shadow-md p-6 mt-6">
            <!-- Output -->
            <p class="text-xl"><?= $output ?></p>
            
            <h2>IDs Array</h2>
            <p>
            <pre>
                <?php 
                print_r($ids);
                ?>
            </pre>
            </p>

            <h2>Users Array</h2>
            <p>
            <pre>
                <?php 
                print_r($users);
                ?>
            </pre>
            </p>

        </div>
    </div>
</body>

</html>