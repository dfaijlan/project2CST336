<?php
function connectDB() {
    $servername = "us-cdbr-iron-east-05.cleardb.net";
    $username = "b68a058a419959";
    $password = "08f9374d";
    $dbname = "heroku_b95f3ceb0732f07"; 
    //Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    //Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
?>