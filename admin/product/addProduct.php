<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}
include_once("../../dbConnect.php");

// Get all products
if (isset($_POST['add'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $brandName = $_POST['brandName'];
    $productCode = $_POST['productCode'];
    $productType = $_POST['productType'];
    $rating = $_POST['rating'];
    $actualPrice = $_POST['actualPrice'];
    $sellingPrice = $_POST['sellingPrice'];
    $tags = $_POST['tags'];
    $quantity = $_POST['quantity'];

    // Upload image
    $targetDir = "images/";
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            // Image uploaded successfully, insert into database
            $image = $targetFile;

            $stmt = $pdo->prepare("INSERT INTO products (title, description, brand_name, product_code, product_type, image, rating, actual_price, selling_price, tags, quantity) VALUES (:title, :description, :brandName, :productCode, :productType, :image, :rating, :actualPrice, :sellingPrice, :tags, :quantity)");
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':brandName', $brandName);
            $stmt->bindParam(':productCode', $productCode);
            $stmt->bindParam(':productType', $productType);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':rating', $rating);
            $stmt->bindParam(':actualPrice', $actualPrice);
            $stmt->bindParam(':sellingPrice', $sellingPrice);
            $stmt->bindParam(':tags', $tags);
            $stmt->bindParam(':quantity', $quantity);
            $stmt->execute();
            echo ("<script>window.open('index.php','_self')</script>");
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "File is not an image.";
    }
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Tables - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="#!">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <?php include_once('./../sideBar.php');         ?>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <div class="pt-3 align-items-center d-flex justify-content-between">
                        <h1>Product Details</h1>
                        <a href="index.php" class="btn btn-danger">Back</a>
                    </div>
                    <form method="POST" enctype="multipart/form-data" class="mb-5">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input class="form-control" type="text" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <textarea class="form-control" name="description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Brand Name</label>
                            <input class="form-control" type="text" name="brandName" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Code</label>
                            <input class="form-control" type="text" name="productCode" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Type</label>
                            <input class="form-control" type="text" name="productType" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Image</label>
                            <input class="form-control" type="file" name="image" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Rating</label>
                            <input class="form-control" type="number" name="rating" min="1" max="5" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Actual Price</label>
                            <input class="form-control" type="number" name="actualPrice" step="0.01" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Selling Price</label>
                            <input class="form-control" type="number" name="sellingPrice" step="0.01" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tags</label>
                            <input class="form-control" type="text" name="tags" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Quantity</label>
                            <input class="form-control" type="number" name="quantity" required>
                        </div>
                        <button type="submit" name="add" class="btn btn-success mt-3">Add New Product</button>
                    </form>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="../js/datatables-simple-demo.js"></script>
</body>

</html>