<?php

$user = [
  [
  "name" => "Alice", 
  "email" => "alice@gmail.com",
  "password" => "123", 
  ],
  [
    "name" => "John", 
    "email" => "john@gmail.com",
    "password" => "456", 
    ],
    [
      "name" => "Jane", 
      "email" => "jane@gmail.com",
      "password" => "789", 
      ],
      [
        "name" => "Adam", 
        "email" => "adam@gmail.com",
        "password" => "010", 
        ],
];

$email = $_POST["email"];
$password = $_POST["password"];

//if ($email === $user[0 || 1 || 2 || 3]["email"] && $password === $user[0 || 1 || 2 || 3]["password"]){

  if ($email === $user[0]["email"] && $password === $user[0]["password"]){

echo ("Login Successful! Welcome, " .$user[0]["name"]. ".");

}

else if ($email === $user[1]["email"] && $password === $user[1]["password"]){

    echo ("Login Successful! Welcome, " .$user[1]["name"]. ".");

}

else if ($email === $user[2]["email"] && $password === $user[2]["password"]){
  
  echo ("Login Successful! Welcome, " .$user[2]["name"]. ".");
  
  
}

else if ($email === $user[3]["email"] && $password === $user[3]["password"]){

  echo ("Login Successful! Welcome, " .$user[3]["name"]. ".");


}

else {

    echo ("Invalid email or password. Please try again.");

}



?>