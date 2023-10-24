<?php
include 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple HTML Table</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    
<h1>Discount Table</h1>
    <table border="1">
        <tr>
            <th>Vendor</th>
            <th>Trade A</th>
            <th>Trade B</th>
            <th>Trade C</th>
            <th>Trade D</th>
        </tr>
        <?php
        $query = "SELECT * FROM Discount";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['vendor'] . "</td>";
                echo "<td>" . $row['Trade A'] . "</td>";
                echo "<td>" . $row['Trade B'] . "</td>";
                echo "<td>" . $row['Trade C'] . "</td>";
                echo "<td>" . $row['Trade D'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "Failed to retrieve data from the database.";
        }
        ?>
    </table>

<h1>Product Table</h1>
<table border="1">
    <tr>
        <th>#</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Tags</th>
        <th>Vendor</th>
        <th>Cart</th>
    </tr>
    <?php
    $query = "SELECT * FROM Product";
    $result = mysqli_query($conn, $query);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>" . $row['tags'] . "</td>";
            echo "<td>" . $row['vendor'] . "</td>";
            echo "<td><button class='add-to-cart' data-product-id='" . $row['id'] . "'>Add To Cart</button></td>";
            echo "</tr>";
        }
    } else {
        echo "Failed to retrieve data from the database.";
    }
    ?>
</table>

<h1>Shopping Cart</h1>
<ul id="cart-items">
    <!-- Shopping cart items will be displayed here -->

<table border="1">
    <tr>
        <th>Product Name</th>
        <th>Org Price</th>
        <th>Discount Percentage</th>
        <th>Discount Price</th>
        <th>Vendor</th>
        <th>Action</th>
    </tr>
    <?php
    $query = "SELECT * FROM shopping_cart";
    $result = mysqli_query($conn, $query);
    $totalDiscount = 0;
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['productname'] . '</td>';
            echo '<td>' . $row['orgprice'] . '</td>';
            echo '<td>' . $row['discountpercentage'] . '</td>';
            echo '<td>' . $row['discountprice'] . '</td>';
            echo '<td>' . $row['vendor'] . '</td>';
            echo '<td><button class="delete-to-cart" data-delete-id="' . $row['id'] . '">Remove Cart</button></td>';
            echo '</tr>';
            $totalDiscount += $row['discountprice'];
        }
    } else {
        echo '<tr><td colspan="6">No items in the shopping cart.</td></tr>';
    }
    echo '<tr>';
    echo '<td colspan="2"></td>';
    echo '<td><strong>Total Discount Price:</strong></td>';
    echo '<td><strong>' . $totalDiscount . '</strong></td>';
    echo '<td></td>';
    echo '</tr>';
    ?>
    
</table>

</ul>

</body>
<!-- Add this script tag to include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    // Function to add an item to the cart
    function addToCart(productId) {
        $.ajax({
            url: "add_to_cart.php",
            method: "POST",
            data: { product_id: productId },
            success: function(response) {
                // Update the cart display with the returned HTML
                $("#cart-items").html(response);
            }
        });
    }

    // Function to remove an item from the cart
    function removeFromCart(cartId) {
        $.ajax({
            url: "delete_to_cart.php",
            method: "POST",
            data: { delete_id: cartId },
            success: function(response) {
                // Update the cart display with the returned HTML
                $("#cart-items").html(response);
            }
        });
    }

    $(".add-to-cart").on("click", function() {
        var productId = $(this).data("product-id");
        addToCart(productId);
    });

   
    $(document).on("click", ".delete-to-cart", function() {
    var cartId = $(this).data("delete-id");
    removeFromCart(cartId);
});

});
</script>
</html>
