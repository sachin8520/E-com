<?php
// Start the session
session_start();
// Include your database connection file
include 'dbConnect.php';

if (isset($_SESSION['g_user_id'])) {
    $user = $_SESSION['g_user_id'];

    // Initialize an array to store table rows
    $tableRows = array();
        $totalSubtotal = 0;


    // Fetch cart items and related product details
    $select = "SELECT pc.*, p.title, p.selling_price, p.actual_price, p.brand_name, p.image FROM product_cart pc INNER JOIN products p ON pc.fk_product_id = p.id WHERE pc.fk_user_id = '$user'";
    $data = mysqli_query($mysql, $select);

    if ($data->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($data)) {
            $subtotal = $row['qty'] * $row['selling_price'];
            $totalSubtotal += $subtotal;

            // Construct table row HTML
            $tableRows[] = '<tr class="product-box-contain">
                                <td class="product-detail">
                                    <div class="product border-0">
                                        <a href="product-left-thumbnail.html" class="product-image">
                                            <img src="admin/' . $row['image'] . '" class="img-fluid blur-up lazyload" alt="">
                                        </a>
                                        <div class="product-detail">
                                            <ul>
                                                <li class="name">
                                                    <a href="product-left-thumbnail.html">' . $row['title'] . '</a>
                                                </li>
                                                <li class="text-content"><span class="text-title">Sold By:</span> ' . $row['brand_name'] . '</li>
                                                <li class="text-content"><span class="text-title">Quantity</span> - ' . $row['qty'] . '</li>
                                                <li>
                                                    <h5 class="text-content d-inline-block">Price :</h5>
                                                    <span>' . $row['selling_price'] . '</span>
                                                    <span class="text-content">' . $row['actual_price'] . '</span>
                                                </li>
                                                <li class="quantity-price-box">
                                                    <div class="cart_qty">
                                                        <div class="input-group">
                                                            <button onclick="updateToCart(' . $row['id'] . ', \'minus\')" type="button" class="btn qty-left-minus" data-type="minus" data-field="">
                                                                <i class="fa fa-minus ms-0" aria-hidden="true"></i>
                                                            </button>
                                                            <input class="form-control input-number qty-input" type="text" name="quantity" value="' . $row['qty'] . '">
                                                            <button onclick="updateToCart(' . $row['id'] . ', \'plus\')" type="button" class="btn qty-right-plus" data-type="plus" data-field="">
                                                                <i class="fa fa-plus ms-0" aria-hidden="true"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <h5>Total: ₹' . number_format($subtotal) . '</h5>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                                <td class="price">
                                    <h4 class="table-title text-content">Price</h4>
                                    <h5>₹' . $row['selling_price'] . '<del class="text-content">₹' . $row['actual_price'] . '</del></h5>
                                    <h6 class="theme-color">You Save : ' . ($row['selling_price'] - $row['actual_price']) . '</h6>
                                </td>
                                <td class="quantity">
                                    <h4 class="table-title text-content">Qty</h4>
                                    <div class="quantity-price">
                                        <div class="cart_qty">
                                            <div class="input-group">
                                                <button onclick="updateToCart(' . $row['id'] . ', \'minus\')" type="button" class="btn qty-left-minus" data-type="minus" data-field="">
                                                    <i class="fa fa-minus ms-0" aria-hidden="true"></i>
                                                </button>
                                                <input class="form-control input-number qty-input" type="text" name="quantity" value="' . $row['qty'] . '">
                                                <button onclick="updateToCart(' . $row['id'] . ', \'plus\')" type="button" class="btn qty-right-plus" data-type="plus" data-field="">
                                                    <i class="fa fa-plus ms-0" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="subtotal">
                                    <h4 class="table-title text-content">Total</h4>
                                    <h5> ₹' . number_format($subtotal) . '</h5>
                                </td>
                                <td class="save-remove">
                                    <h4 class="table-title text-content">Action</h4>
                                    <form action="" method="POST">
                                        <input type="hidden" value="' . $row['id'] . '" name="cart_id">
                                        <button style="background-color: transparent;border: none;" class="remove close_button" name="remove">Remove</button>
                                    </form>
                                </td>
                            </tr>';
        }
    } else {
        // No items in cart
        $tableRows[] = '<tr><td colspan="5">No items in cart</td></tr>';
    }

    // Prepare JSON response
     $response = array(
        'tableRowsHTML' => implode('', $tableRows),
        'totalSubtotal' => $totalSubtotal // Adding total subtotal to response
    );
    echo json_encode($response);
} else {
    // User not logged in
    echo json_encode(array('error' => 'User not logged in'));
}
?>

