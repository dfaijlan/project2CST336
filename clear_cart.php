<?php
session_start();
//Kills the session which in turn clears all session variables that the cart uses.
session_destroy();
header("Location: index.php");
?>