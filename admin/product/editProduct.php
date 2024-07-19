<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}
include_once("../../dbConnect.php");

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
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
    $image = $_POST['image'];

    if (isset($_FILES["image"]["name"]) && $_FILES["image"]["name"] !== "") {
        $targetDir = "images/";
        $image = $targetDir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($image, PATHINFO_EXTENSION));
        move_uploaded_file($_FILES["image"]["tmp_name"], $image);
    }
    // print_r($image);
    // exit;

    $stmt = $pdo->prepare("UPDATE products SET title = :title, description = :description, brand_name = :brandName, product_code = :productCode, product_type = :productType, image = :image, rating = :rating, actual_price = :actualPrice, selling_price = :sellingPrice, tags = :tags, quantity = :quantity WHERE id = :id");
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
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    echo ("<script>window.open('index.php','_self')</script>");
} else {
    $products = $pdo->query("SELECT * FROM products where id = " . $_GET['id'])->fetchAll(PDO::FETCH_ASSOC);
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
                        <input type="hidden" name="id" value="<?= $products[0]['id'] ?>">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input class="form-control" type="text" name="title" value="<?= $products[0]['title'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <textarea class="form-control" name="description" value="<?= $products[0]['description'] ?>" required><?= $products[0]['description'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Brand Name</label>
                            <input class="form-control" type="text" name="brandName" value="<?= $products[0]['brand_name'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Code</label>
                            <input class="form-control" type="text" name="productCode" value="<?= $products[0]['product_code'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Type</label>
                            <input class="form-control" type="text" name="productType" value="<?= $products[0]['product_type'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Image</label>
                            <img src="<?= "../" . $products[0]['image'] ?>" alt="<?= $products[0]['title'] ?>" style="width: 50px;">
                            <input class="form-control" type="file" name="image" value="<?= $products[0]['image'] ?>">
                            <input type="hidden" name="image" value="<?= $products[0]['image'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Rating</label>
                            <input class="form-control" type="number" name="rating" min="1" max="5" value="<?= $products[0]['rating'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Actual Price</label>
                            <input class="form-control" type="number" name="actualPrice" step="0.01" value="<?= $products[0]['actual_price'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Selling Price</label>
                            <input class="form-control" type="number" name="sellingPrice" step="0.01" value="<?= $products[0]['selling_price'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tags</label>
                            <input class="form-control" type="text" name="tags" value="<?= $products[0]['tags'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Quantity</label>
                            <input class="form-control" type="number" name="quantity" value="<?= $products[0]['quantity'] ?>" required>
                        </div>
                        <button type="submit" name="edit" class="btn btn-success mt-3">Update Product</button>
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