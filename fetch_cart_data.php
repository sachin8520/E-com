<?php
// Start the session
session_start();

// Include your database connection file
include 'dbConnect.php';

// Initialize total price
$total_price = 0;

// Check if user is logged in
if (isset($_SESSION['g_user_id'])) {
    $user = $_SESSION['g_user_id'];
    $cartHTML = ''; // HTML for displaying cart data
    // Fetch cart data for the user
    $select = "SELECT pc.*, p.title, p.selling_price, p.image FROM product_cart pc INNER JOIN products p ON pc.fk_product_id = p.id WHERE pc.fk_user_id = '$user' ORDER BY pc.id DESC";
    $data = mysqli_query($mysql, $select);
    // Check if cart is not empty
    if ($data->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($data)) {
            $subtotal = $row['qty'] * $row['selling_price'];
            $total_price += $subtotal;

            // Construct HTML for displaying each cart item
            $cartHTML .= '<div class="row m-2">
                            <div class="col-4">
                                <img src="admin/' . $row['image'] . '" style="width: 100%; height: 70px;">
                            </div>
                            <div class="col-8">
                                <h3 style="color:#0BAF9A">' . $row['title'] . '</h3>
                                <br>
                                <p>' . $row['qty'] . ' x ₹' . $row['selling_price'] . '</p>
                            </div>
                        </div>
                        <hr>';
        }
    }
} else {
    // If user is not logged in, set total price to 0
    $total_price = 0;
    $cartHTML = ''; // Empty cart HTML
}

$select11="SELECT * FROM product_cart WHERE fk_user_id='$user'";
$data11 = mysqli_query($mysql, $select11);
if ($data11->num_rows>0) {
    // code...
    $cart_item_total=mysqli_num_rows($data11);
}
else{
    $cart_item_total=0;
}


// Prepare response array
$response = array(
    'cartHTML' => $cartHTML,
    'cart_item_total' => $cart_item_total,
    'totalPrice' => number_format($total_price, 2) // Format total price
);

// Send JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
