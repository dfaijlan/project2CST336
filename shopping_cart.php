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
        
/* -- Note for teammates:
Remember that it's specified to use session variables for our shopping cart.
You can probably store them in an array on the other pages and then print the content out here.
I added a button and page for clearing the cart for the user on this page that works by destroying the current session.
*/
?>

<html>
    <head>
        <title>Shopping Cart</title>
        <h1>User shopping cart</h1>
    </head>
     <style>
        @import url("style.css");
    </style>
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
                    <li><a href="/movie.php">Movies</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="/clear_cart.php">Clear Cart</a>
            </li>
        </ul>
    </div>
    <!-- Nav wrapper end -->
</div>
<!-- Nav end -->
        <?php
        if(empty($_SESSION["shopping_cart"]["name"])){
            echo "<br>Your shopping cart is empty!";
        }
        else {
        ?>
        <br>
        <table>
            <tr>
                <th>Type</th>
                <th>Name</th>
                <th>Price</th>
                <th>Year</th>
            </tr>
        <?php
                $quantity = 0;
                $total = 0;
                
                $sql = "
                SELECT 'Movie' as type, movie_name, movie_price, release_year
                FROM movie 
                UNION
                SELECT 'Video Game', video_game_name, video_game_price, release_year
                FROM video_game
                UNION
                SELECT 'Anime', anime_name, anime_price, release_year 
                FROM anime
                ";
                
                foreach($_SESSION['shopping_cart']['name'] as $item) {
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()) {
                        if ($item == $row["movie_name"]) {
                            echo "<tr><td>" . $row['type'] . "</td><td>" .$row["movie_name"]. "</td><td>".$row["movie_price"]. "</td><td> ".$row["release_year"] ."</td></tr>";
                            $quantity += 1;
                            $str = substr($row["movie_price"], 1);
                            $total += floatval($str);
                        }
                    }
                }
                echo "</table><br><table><tr><th>Total Items</th><th>Total Price</th></tr>";
                echo "<tr><td>" . $quantity . "</td><td>$" . number_Format($total, 2). "</td></tr>";
        }
        ?>
        </table>
        <br><br>
        <form action="index.php">
            <input type="submit" id="cart_page_buttons" value="Return" />
        </form>
    </body>
</html>