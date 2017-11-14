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
    $anime_name = $_GET["anime_name"];
    $anime_price = $_GET["anime_price"];
    $release_year = $_GET["anime_release_year"];
    
    $sql = "SELECT *
            FROM anime
            WHERE 1";
            
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
    echo $sql;
    echo "<br>";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        //output data of each row
        while($row = $result->fetch_assoc()) {
            echo $row["anime_name"]. " ".$row["anime_price"]. " ".$row["release_year"];
            echo "<br>";
        }
    }
}
?>
<html>
    <head>
        <title>Anime</title>
        <h1>Anime</h1>
    </head>
    <body>
        <form>
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
    </body>
</html>