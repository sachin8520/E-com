<?php
include_once("../dbConnect.php");

if (isset($_POST['addToWishList'])) {
    $productId = $_POST['product_Id'];
    $userId = $_POST['user_id'];



    $productInWishList = $pdo->query("SELECT * from product_wishlist WHERE product_Id = " . $productId . " and user_id = " . $userId . ";")->fetchAll(PDO::FETCH_ASSOC);

    if (count($productInWishList)) {
        $productInWishList = $pdo->query("DELETE from product_wishlist  WHERE product_Id = " . $productId . " and user_id = " . $userId . ";")->fetchAll(PDO::FETCH_ASSOC);
    } else {


        $stmt = $pdo->prepare("INSERT INTO product_wishlist (product_Id, user_id) VALUES (:product_Id, :user_id)");
        $stmt->bindParam(':product_Id', $productId);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();
    }
    $response = new StdClass();
    $response->staus = true;
    $response->message = " Wishlist updated.";

    return print_r($response);
}
