<?php
include 'config.php';

if (isset($_POST['delete_id'])) {
    $deleteId = $_POST['delete_id'];

    // Sanitize the input
    $deleteId = mysqli_real_escape_string($conn, $deleteId);

    // Delete the product from the shopping cart
    $deleteQuery = "DELETE FROM shopping_cart WHERE id = '$deleteId'";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        echo "Product deleted from the cart!";
    } else {
        echo "Failed to delete the product from the cart: " . mysqli_error($conn);
    }
} else {
    echo "Product ID not provided.";
}

// Retrieve and display the updated shopping cart content and calculate the total discount price
$query = "SELECT * FROM shopping_cart";
$result = mysqli_query($conn, $query);
$totalDiscountPrice = 0;

?>

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

            // Calculate total discount price
            $totalDiscountPrice += $row['discountprice'];
        }
    } else {
        echo '<tr><td colspan="6">No items in the shopping cart.</td></tr>';
    }
    ?>
</table>

<!-- Display the total discount price -->
<h2>Total Discount Price: <?php echo $totalDiscountPrice; ?></h2>
