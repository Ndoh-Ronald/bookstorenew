<?php



//host
$host = "localhost";

//dbname

$dbname = "bookstore";

//username

$user = "root";

//password

$pass = "";

$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// if($conn){
//     echo"Worked Succesfully";
// } else {
//     echo "Error in DB connection";
// }