<?php include 'header.php'?>
<?php include 'navbar.php';?>

<?php $id=$_GET['id']?>
<?php
$query = "SELECT * FROM orders WHERE order_id='$id'";
$result = mysqli_query($conn, $query);  
if ($row = mysqli_fetch_array($result))  { 
    ?>
    <body class="g-sidenav-show bg-gray-200">
      <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <!-- End Navbar -->
        <div class="container-fluid px-2 px-md-4">
          <div class="page-header min-height-200 border-radius-xl mt-4" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
            <span class="mask  bg-gradient-primary  opacity-6"></span>
          </div>
          <div class="card card-body mx-3 mx-md-4 mt-n6">
            <div class="row gx-4 mb-2">

              <div class="col-12">
                <div class="h-100">
                  <h5 class="mb-1 text-center">
                   Order Payment Details
                 </h5><hr>

              </div>
            </div>
          </div>
            <div class="row">

              <div class="col-12 col-xl-4">
                <div class="card card-plain h-100">
                  <div class="card-header pb-0 p-3">
                    <div class="row">
                      <div class="col-md-8 d-flex align-items-center">
                        <h6 class="mb-0">Transaction Details</h6>
                      </div>
                    </div>
                  </div>
                  <div class="card-body p-3">
                    
                    <hr>
                    <ul class="list-group">
                      <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Order No:</strong> &nbsp; #<?php echo $row['order_id'];?></li>

                      <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Transaction No:</strong> &nbsp; <?php echo $row['transaction_id'];?></li>

                      <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Bank Name:</strong> &nbsp; <?php echo $row['bank_name'];?></li>

                      <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Account Name:</strong> &nbsp; <?php echo $row['acc_name'];?></li>


                      <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Account No:</strong> &nbsp; <?php echo $row['acc_no'];?></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-12 col-xl-2"></div>
              <div class="col-12 col-xl-6">
                <div class="card card-plain h-100">
                  <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">Transaction Slip</h6>
                  </div>
                  <div class="card-body p-3">
                    <ul class="list-group" >
                      <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2 pt-0" >
                       <img src="../Order_payment_slips/<?php echo $row['transaction_slip'];?>"  frameborder="0"></iframe>
                      </li>

                    </ul>
                  </div>
                </div>
              </div>
            </div>


          
        </div>
      </div>
    </div>
  <?php
}
?>
<?php include 'footer.php'?>
