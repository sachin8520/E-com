<?php
// Start the session

// Include your database connection file
include 'dbConnect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['cart_id']) && isset($_POST['action'])) {
        $cartId = $_POST['cart_id'];
        $action = $_POST['action']; // 'plus' or 'minus'

        // Fetch current quantity from database
        $selectQuantity = "SELECT qty FROM product_cart WHERE id = '$cartId'";
        $result = mysqli_query($mysql, $selectQuantity);
        $row = mysqli_fetch_assoc($result);
        $currentQuantity = $row['qty'];

        // Update quantity based on action
        if ($action === 'plus') {
            $newQuantity = $currentQuantity + 1;
        } elseif ($action === 'minus' && $currentQuantity > 1) {
            $newQuantity = $currentQuantity - 1;
        } else {
            // If action is invalid or quantity is already 1, do not update
            exit('Invalid action or quantity!');
        }

        // Update quantity in database
        $updateQuery = "UPDATE product_cart SET qty = '$newQuantity' WHERE id = '$cartId'";
        if (mysqli_query($mysql, $updateQuery)) {
            // Quantity updated successfully
            echo 'Quantity updated successfully!';
        } else {
            // Error updating quantity
            echo 'Error updating quantity!';
        }
    } else {
        // If cart_id or action is not set
        exit('Cart ID or action is not set!');
    }
}
