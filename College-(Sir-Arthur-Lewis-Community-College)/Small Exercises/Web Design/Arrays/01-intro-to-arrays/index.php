<?php 

$names = ['John', 'Jack', 'Jill'];
$num = [1, 2, 3, 4, 5, 6];

//The value tag is an argument which is a placeholder which will be given a value later on

function inspect($value){

echo "<pre>";

var_dump($value);

echo "<pre>";
    
}

//inspect($names);

//adds members to the array
$num[5] = 200;
$num[6] = 100;
$num[] = 101;

//adds values to the end of an array
array_push($num, 300);

//removes the last member in the array
array_pop($num);

//removes the first member in the array
array_shift($num);

//deletes an array number
unset($num[4]);

//reset array member
$num = array_values($num);

inspect($num);


//print_r($names);

//echo $names[2];


?>



