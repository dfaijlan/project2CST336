<?php
//Sessions used to store items in shopping cart and allow user to see
//shopping cart contents
session_start();
                            
//Might not need this for this page
//Using Antonio's database
$servername = "us-cdbr-iron-east-05.cleardb.net";
$username = "bfeaad637110cb";
$password = "c0419d9c";
$dbname = "heroku_303da836d19345a"; 
//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
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
?>
<html>
    <head>
        <title>Online Catalog</title>
        <h1>Online Catalog</h1>
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
            <fieldset id="search_options">
                Search for:<br>
                <input type="Radio" name="search_options" value="anime">Anime<br>
                <input type="Radio" name="search_options" value="video_game">Video Games<br>
                <input type="Radio" name="search_options" value="movie">Movies<br>
        </fieldset>
        <fieldset id="submitButton">
            <input type="submit" id="submit" name="submitButton" value="Submit" />
        </fieldset>
        </form>
    </body>
</html>
