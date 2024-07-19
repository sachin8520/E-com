<?php
// Start the session
session_start();

// Include your database connection file
include 'dbConnect.php';

// Initialize variables
$itemCount = 0;
$cartItemsHTML = '';
$totalPrice = 0;

// Check if user is logged in
if (isset($_SESSION['g_user_id'])) {
    $user = $_SESSION['g_user_id'];

    // Fetch cart items count
    $selectCount = "SELECT COUNT(*) as itemCount FROM product_cart WHERE fk_user_id='$user'";
    $countData = mysqli_query($mysql, $selectCount);
    $countRow = mysqli_fetch_assoc($countData);
    $itemCount = $countRow['itemCount'];

    // Fetch cart items and total price
    $select = "SELECT pc.*, p.title, p.selling_price, p.image FROM product_cart pc INNER JOIN products p ON pc.fk_product_id = p.id WHERE pc.fk_user_id = '$user'";
    $data = mysqli_query($mysql, $select);
    if ($data->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($data)) {
            $subtotal = $row['qty'] * $row['selling_price'];
            $totalPrice += $subtotal;

            // Construct HTML for displaying each cart item
            $cartItemsHTML .= '<li><img src="admin/' . $row['image'] . '" style="width: 20px;height: 20px;"></li>';
        }
    }
} else {
    // If user is not logged in, set all values to default
    $itemCount = 0;
    $cartItemsHTML = '';
    $totalPrice = 0;
}

// Prepare response array
$response = array(
    'itemCount' => $itemCount,
    'cartItemsHTML' => $cartItemsHTML,
    'totalPrice' => number_format($totalPrice, 2)
);

// Send JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
