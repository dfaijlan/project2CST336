<?php
session_start();
include 'database.php';

function search() {
//Using Antonio's database
$conn = connectDB();

$sql = "SELECT *
        FROM anime
        WHERE 1";
            
if(isset($_GET["submitButton"])) {
    $anime_name = $_GET["anime_name"];
    $anime_price = $_GET["anime_price"];
    $release_year = $_GET["anime_release_year"];
    
    if (isset($_GET["filter_by_name_radio"])) {
        $sql = $sql . " AND anime_name = '$anime_name'";
        if ($anime_name == "") {
            echo "<br>Please enter an anime name<br>";
        }
    }
    if (isset($_GET["filter_by_price_radio"])) {
        $sql = $sql . " AND anime_price = '$anime_price'";
        if ($anime_price == "") {
            echo "<br>Please enter an anime price to search<br>";
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
        if ($value != "") {
            $sql = $sql . " ORDER BY $value";
        }
        
    }
    if (isset($_GET["order_radio"])) {
        $value = $_GET["order_radio"];
        if ($_GET["order_radio"] == "descending") {
            $sql = $sql . " desc";
        }
    }
}
$result = $conn->query($sql);
    
echo "<table>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Year</th>
        </tr>";
        
if ($result->num_rows > 0) {
    //output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" .$row["anime_name"]. "</td><td>".$row["anime_price"]. "</td><td> ".$row["release_year"] ."</td><td>";
        echo "[<a href='add_to_cart.php?name=" . $row['anime_name'] . "&location=anime'> Add to cart </a>]</td></tr>"; 
    }
}
echo "</table>";
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Anime</title>
        <link rel ="stylesheet" href="/style.css">
        <link href="https://fonts.googleapis.com/css?family=Ewert" rel="stylesheet">
        <h1 id="aFont">Anime</h1>
    </head>
   <body>
        <div id="nav">
    <div id="nav_wrapper">
        <ul>
            <li><a href="/index.php">Home</a>
            </li>
            <li> <a href="#">Store Department</a>

                <ul>
                    <li><a href="/movie.php">Movies</a>
                    </li>
                    <li><a href="/video_game.php">Video Games</a>
                    </li>
                    <li><a href="/shopping_cart.php">Cart</a>
                    </li>
                </ul>
            </li>
             <li> 
                <a href="#">Animes Titles</a>
                 <ul>
                       <li><a href = "https://myanimelist.net/anime/30276/One_Punch_Man/">One Punch Man.</a>
                       <li><a href = "https://myanimelist.net/manga/1517/JoJo_no_Kimyou_na_Bouken_Part_1__Phantom_Blood/">JJBA Part 1.</a>
                       <li><a href = "https://myanimelist.net/manga/1630/JoJo_no_Kimyou_na_Bouken_Part_2__Sentou_Chuuryuu/">JJBA Part 2.</a>
                       <li><a href = "https://myanimelist.net/manga/872/JoJo_no_Kimyou_na_Bouken_Part_3__Stardust_Crusaders/">JJBA Part 3.</a>
                       <li><a href = "https://myanimelist.net/manga/3006/JoJo_no_Kimyou_na_Bouken_Part_4__Diamond_wa_Kudakenai/">JJBA Part 4.</a>
                       <li><a href = "https://myanimelist.net/manga/75989/Boku_no_Hero_Academia/">My Hero Academia Sea.</a>
                       <li><a href = "https://myanimelist.net/anime/35262/Boku_no_Hero_Academia_2nd_Season__Hero_Note/">My Hero Academia Sea 2.</a>
                       <li><a href = "https://myanimelist.net/manga/53/Yuu%E2%98%86Yuu%E2%98%86Hakusho/">Yu Yu Hakusho.</a>
                       <li><a href = "https://myanimelist.net/anime/1604/Katekyo_Hitman_Reborn?q=hitman%20re/">Hitman Reborn.</a>
                       <li><a href = "https://myanimelist.net/anime/20/Naruto/">Naruto.</a>
                 </ul>
         </li>
        </ul>
    </div>
    <!-- Nav wrapper end -->
</div>
<!-- Nav end -->
        <form id="aFont">
            <fieldset id="filter_by_name">
                Filter by Name:
                <input type="Radio" name="filter_by_name_radio" value="name">
                Name:
                <input type="text" name="anime_name">
            </fieldset>
            <fieldset id="filter_by_price">
                Filter by Price:
                <input type="Radio" name="filter_by_price_radio" value="price">
                Price (please include $ before price):
                <input type="text" name="anime_price">
            </fieldset>
            <fieldset id="filter_by_release_year">
                Filter by Release Year:
                <input type="Radio" name="filter_by_release_year_radio" value="release_year">
                Release Year:
                <input type="text" name="anime_release_year">
            </fieldset>
            
            <!--no longer including here conflicting javascript -->
            <!--<fieldset id="item_info">-->
            <!--    Item Info:-->
            <!--      <form name="Anime">-->
            <!--            <select name="Anime" id="animeMenu">-->
            <!--                <option value = "nothing" selected ="selected">Select an Anime</option>-->
            <!--                <option value = "https://myanimelist.net/anime/30276/One_Punch_Man/">One Punch Man.</option>-->
            <!--                <option value = "https://myanimelist.net/manga/1517/JoJo_no_Kimyou_na_Bouken_Part_1__Phantom_Blood/">JJBA Part 1.</option>-->
            <!--                <option value = "https://myanimelist.net/manga/1630/JoJo_no_Kimyou_na_Bouken_Part_2__Sentou_Chuuryuu/">JJBA Part 2.</option>-->
            <!--                <option value = "https://myanimelist.net/manga/872/JoJo_no_Kimyou_na_Bouken_Part_3__Stardust_Crusaders/">JJBA Part 3.</option>-->
            <!--                <option value = "https://myanimelist.net/manga/3006/JoJo_no_Kimyou_na_Bouken_Part_4__Diamond_wa_Kudakenai/">JJBA Part 4.</option>-->
            <!--                <option value = "https://myanimelist.net/manga/75989/Boku_no_Hero_Academia/">My Hero Academia Sea.</option>-->
            <!--                <option value = "https://myanimelist.net/anime/35262/Boku_no_Hero_Academia_2nd_Season__Hero_Note/">My Hero Academia Sea 2.</option>-->
            <!--                <option value = "https://myanimelist.net/manga/53/Yuu%E2%98%86Yuu%E2%98%86Hakusho/">Yu Yu Hakusho.</option>-->
            <!--                <option value = "https://myanimelist.net/anime/1604/Katekyo_Hitman_Reborn?q=hitman%20re/">Hitman Reborn.</option>-->
            <!--                <option value = "https://myanimelist.net/anime/20/Naruto/">Naruto.</option>-->
                            
                     
            <!--            </select>-->
            <!--        </form>-->
                    
            <!--        <script type="text/javascript">-->
            <!--            var urlMenu = document.getElementById('animeMenu');-->
            <!--            urlMenu.onchange = function(){-->
            <!--                var userOption = this.options[this.selectedIndex];-->
            <!--                if(userOption.value !="nothing"){-->
            <!--                    window.open(userOption.value, "Anime Page", "");-->
            <!--                }-->
            <!--            }-->
                        
            <!--        </script>-->
            <!--</fieldset>-->
            <fieldset id="sort_field">
                Order results by:
                <select name="sort_by_option">
                    <option value="">Select...</option>
                    <option value="anime_name">Name</option>
                    <option value="anime_price">Price</option>
                    <option value="release_year">Release Year</option>
                </select>
                <input type="Radio" name="order_radio" value="ascending">Ascending
                <input type="Radio" name="order_radio" value="descending">Descending
            </fieldset>
            <fieldset id="submitButton">
                <input type="submit" id="submit" name="submitButton" value="Submit" />
            </fieldset>
        </form>
        <?php
            search();
        ?>
    </body>
</html>
