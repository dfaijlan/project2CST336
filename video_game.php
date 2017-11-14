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
    $video_game_name = $_GET["video_game_name"];
    $video_game_price = $_GET["video_game_price"];
    $release_year = $_GET["video_game_release_year"];
    
    $sql = "SELECT *
            FROM video_game
            WHERE 1";
            
    if (isset($_GET["filter_by_name_radio"])) {
        $sql = $sql . " AND video_game_name = '$video_game_name'";
        if ($video_game_name == "") {
            echo "<br>Please enter a video game name<br>";
        }
    }
    if (isset($_GET["filter_by_price_radio"])) {
        $sql = $sql . " AND video_game_price = '$video_game_price'";
        if ($video_game_price == "") {
            echo "<br>Please enter a video game price to search<br>";
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
            echo $row["video_game_name"]. " ".$row["video_game_price"]. " ".$row["release_year"];
            echo "<br>";
        }
    }
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Video Games</title>
        <link rel ="stylesheet" href="/style.css">
        <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
        <h1 id="vgames">Video Games</h1>
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
                    <li><a href="/clear_cart.php">Cart</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- Nav wrapper end -->
</div>
<!-- Nav end -->
        <form id="vgames">
            <fieldset id="filter_by_name">
                Filter by Name:
                <input type="Radio" name="filter_by_name_radio" value="name">
                Name:
                <input type="text" name="video_game_name">
            </fieldset>
            <fieldset id="filter_by_price">
                Filter by Price:
                <input type="Radio" name="filter_by_price_radio" value="price">
                Price (please include $ before price):
                <input type="text" name="video_game_price">
            </fieldset>
            <fieldset id="filter_by_release_year">
                Filter by Release Year:
                <input type="Radio" name="filter_by_release_year_radio" value="release_year">
                Release Year:
                <input type="text" name="video_game_release_year">
            </fieldset>
            <fieldset id="item_info">
                Item Info:
                  <form name="games">
                        <select name="games" id="gamesMenu">
                            <option value = "nothing" selected ="selected">Select a game</option>
                            <option value = "http://www.ign.com/games/battle-fantasia/xbox-360-14246645/">Batlle Fantasia.</option>
                            <option value = "http://www.ign.com/games/cuphead/">Cuphead.</option>
                            <option value = "http://www.ign.com/games/dungeon-fighter-online/">DFO.</option>
                            <option value = "http://www.ign.com/games/kingdom-hearts/ps2-16467/">Kingdom Hearts.</option>
                            <option value = "http://www.ign.com/games/kingdom-hearts-ii/ps2-550308/">Kingdom Hearts 2.</option>
                            <option value = "http://www.ign.com/games/league-of-legends/">League of Legends.</option>
                            <option value = "http://www.ign.com/games/lost-saga-167231/">Lost Saga.</option>
                            <option value = "http://maplestory.nexon.net/landing/">Maplestory.</option>
                            <option value = "http://www.ign.com/articles/1999/10/08/marvel-vs-capcom-clash-of-super-heroes-review/">Marvel vs Capcom.</option>
                            <option value = "http://www.ign.com/articles/2017/09/18/marvel-vs-capcom-infinite-review/">Marvel vs Capcom Infite Wars.</option>
                            <option value = "http://www.ign.com/games/mega-man-battle-network/gba-15252/">Megaman Battle Network.</option>
                            <option value = "http://www.ign.com/games/mega-man-x/snes-6872/">Megaman X.</option>
                            <option value = "http://www.ign.com/games/mega-man-x4/ps-2083/">Megaman X4.</option>
                            <option value = "http://www.ign.com/games/mega-man-x8/">Megaman X8.</option>
                            <option value = "http://www.ign.com/games/mega-man-zx/">Megaman ZX Adventures.</option>
                            <option value = "http://www.ign.com/games/super-smash-bros/n64-10494/">Super Smash Bros.</option>
                            <option value = "http://www.ign.com/games/super-smash-bros-melee/">Super Smash Bros Melee.</option>
                            <option value = "http://www.ign.com/games/the-world-ends-with-you/">The World Ends With You.</option>
                        </select>
                    </form>
                    
                    <script type="text/javascript">
                        var urlMenu = document.getElementById('gamesMenu');
                        urlMenu.onchange = function(){
                            var userOption = this.options[this.selectedIndex];
                            if(userOption.value !="nothing"){
                                window.open(userOption.value, "Videogames Page", "");
                            }
                        }
                        
                    </script>
            </fieldset>
            <fieldset id="sort_field">
                Order results by:
                <select name="sort_by_option">
                    <option value="">Select...</option>
                    <option value="video_game_name">Name</option>
                    <option value="video_game_price">Price</option>
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