<?php
session_start();
<<<<<<< HEAD
//Kills the session which in turn clears all session variables that the cart uses.
session_destroy();
=======

//Kills the session which in turn clears all session variables that the cart uses.
session_destroy();

>>>>>>> 6a7d214d69340e5c2a1de5941f185dacd8210da5
header("Location: index.php");
?>