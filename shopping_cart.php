<?php
session_start();
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
    <body>
        <form action="clear_cart.php">
            <input type="submit" id="cart_page_buttons" value="Clear Shopping Cart" />
        </form>
        <form action="index.php">
            <input type="submit" id="cart_page_buttons" value="Return" />
        </form>
    </body>
</html>