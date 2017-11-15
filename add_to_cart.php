<?php
session_start();

if (isset($_GET['name']))
{
    $_SESSION["shopping_cart"]["name"][] = $_GET['name'];
    header("Location: " . $_GET['location'] . ".php");
}

?>
