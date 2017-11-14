<?php
session_start();

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

if(isset($_GET["submitButton"])) {
    $movie_name = $_GET["movie_name"];
    $movie_price = $_GET["movie_price"];
    $release_year = $_GET["movie_release_year"];
    
    $sql = "SELECT *
            FROM movie
            WHERE 1";
            
    if (isset($_GET["filter_by_name_radio"])) {
        $sql = $sql . " AND movie_name = '$movie_name'";
        if ($movie_name == "") {
            echo "<br>Please enter a movie name<br>";
        }
    }
    if (isset($_GET["filter_by_price_radio"])) {
        $sql = $sql . " AND movie_price = '$movie_price'";
        if ($movie_price == "") {
            echo "<br>Please enter a movie price to search<br>";
        }
    }
    if (isset($_GET["filter_by_release_year_radio"])) {
        $sql = $sql . " AND release_year = '$release_year'";
        if ($release_year == "") {
            echo "<br>Please enter a release year to search<br>";
        }
    }
    if (isset($_GET["sort_by_option"])) {
        $value = $_GET["sort_by_option"];
        $sql = $sql . " ORDER BY $value";
    }
    if (isset($_GET["order_radio"])) {
        $value = $_GET["order_radio"];
        if ($_GET["order_radio"] == "descending") {
            $sql = $sql . " desc";
        }
    }
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        //output data of each row
        while($row = $result->fetch_assoc()) {
            echo $row["movie_name"]. " ".$row["movie_price"]. " ".$row["release_year"];
            echo "<br>";
        }
    }
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Movie</title>
        <link rel ="stylesheet" href="/style.css">
        <link href="https://fonts.googleapis.com/css?family=Bungee+Shade" rel="stylesheet">
        <h1 id="mfont">Movie</h1>
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
                    <li><a href="/video_game.php">Video Games</a>
                    </li>
                    <li><a href="/clear_cart.php">Cart</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- Nav wrapper end -->
</div>
<!-- Nav end -->
        <form>
            <fieldset id="filter_by_name">
                Filter by Name:
                <input type="Radio" name="filter_by_name_radio" value="name">
                Name:
                <input type="text" name="movie_name">
            </fieldset>
            <fieldset id="filter_by_price">
                Filter by Price:
                <input type="Radio" name="filter_by_price_radio" value="price">
                Price (please include $ before price):
                <input type="text" name="movie_price">
            </fieldset>
            <fieldset id="filter_by_release_year">
                Filter by Release Year:
                <input type="Radio" name="filter_by_release_year_radio" value="release_year">
                Release Year:
                <input type="text" name="movie_release_year">
            </fieldset>
                <fieldset id="item_info">
                Item Info:
                  <form name="movie">
                        <select name="movie" id="movieMenu">
                            <option value = "nothing" selected ="selected">Select a Film</option>
                            <option value = "https://www.rottentomatoes.com/m/kung_fu_panda/">Kung Fu Panda.</option>
                            <option value = "https://www.rottentomatoes.com/m/bee_movie/">Bee Movie.</option>
                            <option value = "https://www.rottentomatoes.com/m/avatar/">Avatar.</option>
                            <option value = "https://www.rottentomatoes.com/m/moana_2016/">Moana.</option>
                            <option value = "https://www.rottentomatoes.com/m/zootopia/">Zootopia.</option>
                            <option value = "https://www.rottentomatoes.com/m/frozen_2013/">Frozen.</option>
                            <option value = "https://www.rottentomatoes.com/m/trolls/">Trolls.</option>
                            <option value = "https://www.rottentomatoes.com/m/the_emoji_movie/">Emoji Movie.</option>
                            <option value = "https://www.rottentomatoes.com/m/mulan/">Mulan.</option>
                            <option value = "https://www.rottentomatoes.com/m/toy_story/">Toy Story.</option>
                            <option value = "https://www.rottentomatoes.com/m/toy_story_2/">Toy Story 2.</option>
                            <option value = "https://www.rottentomatoes.com/m/toy_story_3/">Toy Story 3.</option>
                            <option value = "https://www.rottentomatoes.com/m/antman/">Ant Man.</option>
                        </select>
                    </form>
                    <script type="text/javascript">
                        var urlMenu = document.getElementById('movieMenu');
                        urlMenu.onchange = function(){
                            var userOption = this.options[this.selectedIndex];
                            if(userOption.value !="nothing"){
                                window.open(userOption.value, "Movies Page", "");
                            }
                        }
                    </script>
            </fieldset>
            <fieldset id="sort_field">
                Order results by:
                <select name="sort_by_option">
                    <option value="">Select...</option>
                    <option value="movie_name">Name</option>
                    <option value="movie_price">Price</option>
                    <option value="release_year">Release Year</option>
                </select>
                <input type="Radio" name="order_radio" value="ascending">Ascending
                <input type="Radio" name="order_radio" value="descending">Descending
            </fieldset>
            <fieldset id="submitButton">
                <input type="submit" id="submit" name="submitButton" value="Submit" />
            </fieldset>
            
        </form>
    </body>
</html>