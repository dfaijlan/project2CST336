<?php
//Sessions used to store items in shopping cart and allow user to see
//shopping cart contents
session_start();
<<<<<<< HEAD
                            
=======

>>>>>>> 6a7d214d69340e5c2a1de5941f185dacd8210da5
//Might not need this for this page
//Using Antonio's database
$servername = "us-cdbr-iron-east-05.cleardb.net";
$username = "bfeaad637110cb";
$password = "c0419d9c";
$dbname = "heroku_303da836d19345a"; 
<<<<<<< HEAD
//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
=======

//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

>>>>>>> 6a7d214d69340e5c2a1de5941f185dacd8210da5
//Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
<<<<<<< HEAD
=======

>>>>>>> 6a7d214d69340e5c2a1de5941f185dacd8210da5
if (isset($_GET["submitButton"])) {
    
    if (!isset($_GET["search_options"])) {
        echo "Please pick a search option.";
    }
    else {
        $value = $_GET["search_options"];
        //echo "$value";
        switch ($value) {
            case anime:
                header("Location: anime.php");
                break;
            case video_game:
                header("Location: video_game.php");
                break;
            case movie:
                header("Location: movie.php");
                break;
        }
    }
}
<<<<<<< HEAD
=======

>>>>>>> 6a7d214d69340e5c2a1de5941f185dacd8210da5
?>
<html>
    <head>
        <title>Online Catalog</title>
        <h1>Online Catalog</h1>
<<<<<<< HEAD
        <style>
            @import url("style.css");
        </style>
    </head>
    <body>
             <div id="nav">
    <div id="nav_wrapper">
        <ul>
            <li><a href="/index.php">Home</a>
            </li>
            <li> <a href="#">Store Department</a>

                <ul>
                    <li><a href="/anime.php">Anime</a>
                    </li>
                    <li><a href="/movie.php">Movies</a>
                    </li>
                    <li><a href="/video_game.php">Video Games</a>
                    </li>
                </ul>
            </li>
             <li> 
                <a href="shopping_cart.php">Shopping Cart</a>
         </li>
        </ul>
    </div>
    <!-- Nav wrapper end -->
</div>
<!-- Nav end -->
        <form>
            <br>
=======
    </head>
    <body>
        
        <form>
>>>>>>> 6a7d214d69340e5c2a1de5941f185dacd8210da5
            <fieldset id="search_options">
                Search for:<br>
                <input type="Radio" name="search_options" value="anime">Anime<br>
                <input type="Radio" name="search_options" value="video_game">Video Games<br>
                <input type="Radio" name="search_options" value="movie">Movies<br>
        </fieldset>
        <fieldset id="submitButton">
            <input type="submit" id="submit" name="submitButton" value="Submit" />
        </fieldset>
<<<<<<< HEAD
=======
        
        </form>
        <form action="shopping_cart.php">
                
                <input type="submit" id="mainPageButtons" value="View Shopping cart" />
                
>>>>>>> 6a7d214d69340e5c2a1de5941f185dacd8210da5
        </form>
    </body>
</html>