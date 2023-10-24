<?php
include 'config.php';

if (isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];

    // Retrieve product details based on the product_id
    $query = "SELECT * FROM Product WHERE id = $productId";
    $result = mysqli_query($conn, $query);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        // Fetch the product details
        $productName = $row['name'];
        $orgPrice = $row['price'];
        $discountPercentage = $row['discount'];
        $vendor = $row['vendor'];
    
        // Check if the discount percentage is greater than 0
        if ($discountPercentage > 0) {
            $discountPrice = $orgPrice - ($orgPrice * $discountPercentage / 100);
        } else {
            // If the discount is 0, set the discount price to the original price
            $discountPrice = $orgPrice;
        }
    
        // Insert the product into the shopping_cart table
        $insertQuery = "INSERT INTO shopping_cart (productname, orgprice, discountpercentage, discountprice, vendor) VALUES ('$productName', $orgPrice, $discountPercentage, $discountPrice, '$vendor')";
        $insertResult = mysqli_query($conn, $insertQuery);
    
        if ($insertResult) {
            // Product added to the cart
        } else {
            echo "Failed to add the product to the cart: " . mysqli_error($conn);
        }
    }
    
    
} else {
    echo "Product ID not provided.";
}

// Retrieve and display the updated shopping cart content
$query = "SELECT * FROM shopping_cart";
$result = mysqli_query($conn, $query);
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
    $totalDiscount = 0; // Initialize the total discount variable

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
            
            // Add the discount price to the total
            $totalDiscount += $row['discountprice'];
        }
    } else {
        echo '<tr><td colspan="6">No items in the shopping cart.</td></tr>';
    }
    ?>
</table>

<!-- Display the total discount price -->
<h2>Total Discount Price: <?php echo $totalDiscount; ?></h2>

