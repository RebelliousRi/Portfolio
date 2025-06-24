<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

if (empty("name") || empty("mgrade") || empty("sgrade") || empty("egrade")) {
    
echo ("Input fields cannot be left blank!");

} else {

    
$student = [
"name" => $_POST["name"],
"grades" => [
"mgrade" => $_POST["mgrade"],
"sgrade" => $_POST["sgrade"],
"egrade" => $_POST["egrade"]
]
];

$avg = (array_sum($student["grades"]))/ count($student["grades"]);



if ($avg >= 90){

    $message = "Excellent!<br/>";

} else if ($avg >= 70){

    $message = "Good job!<br/>";

}else if ($avg < 70){

    $message = "Needs improvement.<br/>";

}

echo ("<h2>Student Report</h2>");

echo ("Student Name: " . $student["name"] . "<br/>");
echo ("Mathematics Grade: " . $student["grades"]["mgrade"] . "<br/>");
echo ("Science Grade: " . $student["grades"]["sgrade"] . "<br/>");
echo ("English Grade: " . $student["grades"]["egrade"] . "<br/>");
echo ("Average Grade: " . number_format($avg, 2) . "<br/>");
echo ("Performance: " . $message . "<br/>");


}

}

?>