<?php include 'header.php'?>
<?php include 'navbar.php';?>

<?php $id=$_GET['id'];
$query = "SELECT * FROM orders WHERE order_id='$id'";
$result = mysqli_query($conn, $query);  
if ($row = mysqli_fetch_array($result))  { 

            $seller_id=$row['seller_id'];
            $client_id=$row['client_id'];
            $gig_id=$row['gig_id'];
            $package_type=$row['package_type'];



            $query1 = "SELECT * FROM user WHERE userid='$seller_id'";
            $result1 = mysqli_query($conn, $query1);  
            $row1 = mysqli_fetch_array($result1);

            $query2 = "SELECT * FROM user WHERE userid='$client_id'";
            $result2 = mysqli_query($conn, $query2);  
            $row2 = mysqli_fetch_array($result2);


            $query3 = "SELECT * FROM allgigs WHERE gigid='$gig_id'";
            $result3 = mysqli_query($conn, $query3);  
            $datafetch= mysqli_fetch_array($result3);
if ($package_type=='Basic') {
  $des=$datafetch['basicdes'];
  $deli=$datafetch['basicdeli'];
  $pages=$datafetch['basicpages'];
  $price=$datafetch['basicprice'];
}elseif ($package_type=='Standard') {
  $des=$datafetch['standarddes'];
  $deli=$datafetch['standarddeli'];
  $pages=$datafetch['standardpages'];
  $price=$datafetch['standardprice'];
}elseif($package_type=='Premium'){
  $des=$datafetch['premiumdes'];
  $deli=$datafetch['premiumdeli'];
  $pages=$datafetch['premiumpages'];
  $price=$datafetch['premiumprice'];
}
    date_default_timezone_set('Asia/Karachi');


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
                   Order Details
                 </h5><hr>

              </div>
            </div>
          </div>
            <div class="row">
              <div class="col-12 col-xl-12">
                <div class="card card-plain h-100">
                  <div class="card-header pb-0">
                    <div class="row">
                      <div class="col-md-8 d-flex align-items-center">
                        <h6 class="mb-0">Order Details</h6>
                      </div>
                    </div>
                  </div>
                  <div class="card-body p-2">
                    
                    <hr>
                    <ul class="list-group">
                      <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Order No:</strong> &nbsp; #<?php echo $row['order_id'];?></li>

                      <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Seller:</strong> &nbsp; <?php echo $row1['name'];?></li>

                      <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Buyer:</strong> &nbsp; <?php echo $row2['name'];?></li>
                
                    </ul>
                  </div>

                   <div class="card-header pb-0">
                    <div class="row">
                      <div class="col-md-8 d-flex align-items-center">
                        <h6 class="mb-0">Gig Details</h6>
                      </div>
                    </div>
                  </div>

                   <div class="card-body p-2">
                    
                    <hr>
                    <ul class="list-group">
                      <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Package:</strong> &nbsp; <?php echo $package_type;?></li>

                      <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Package Description:</strong> &nbsp; <?php echo $des?></li>

                      <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Package Days:</strong> &nbsp; <?php echo $deli?></li>


                       <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Package Price:</strong> &nbsp; <?php echo $price?></li>

                
                    </ul>
                  </div>


                  <div class="card-header pb-0">
                    <div class="row">
                      <div class="col-md-8 d-flex align-items-center">
                        <h6 class="mb-0">Payment Details</h6>
                      </div>
                    </div>
                  </div>


                  <div class="card-body p-2">
                    
                    <hr>
                    <ul class="list-group">
                      <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Buyer Tax:</strong> &nbsp; <?php echo $row['buyer_tax'];?>%</li>

                       <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Seller Tax:</strong> &nbsp; <?php echo $row['seller_tax'];?>%</li>

                       <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Buyer Pay Amount:</strong> &nbsp; $<?php echo number_format($row['pay_amt'],2);?></li>
                
                    </ul>
                  </div>



                    <div class="card-header pb-0">
                    <div class="row">
                      <div class="col-md-8 d-flex align-items-center">
                        <h6 class="mb-0">Delivery Days</h6>
                      </div>
                    </div>
                  </div>


                  <div class="card-body p-2">
                    
                    <hr>
                    <ul class="list-group">
                      <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Order Place Date:</strong> &nbsp; <?php $order_place_date=$row['order_place_date']; 
                      $actual_time_date = date('Y-m-d H:i:s', $order_place_date); 
                      echo $actual_time_date; ?></li>

                          <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Order Place Date:</strong> &nbsp; <?php if ($order_start_date=$row['order_start_date']!='') {
                      $actual_time_date = date('Y-m-d H:i:s', $order_start_date); 
                      echo $actual_time_date; } ?></li>

                       <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Order Place Date:</strong> &nbsp; <?php if ($order_end_date=$row['order_end_date']!='') {
                      $actual_time_date = date('Y-m-d H:i:s', $order_end_date); 
                      echo $actual_time_date; } ?></li>
                
                    </ul>
                  </div>










                    <div class="card-header pb-0">
                    <div class="row">
                      <div class="col-md-8 d-flex align-items-center">
                        <h6 class="mb-0">Payment Details</h6>
                      </div>
                    </div>
                  </div>


                  <div class="card-body p-2">
                    
                    <hr>
                    <ul class="list-group">
                      <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Order No:</strong> &nbsp; #<?php echo $row['order_id'];?></li>

                      <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Transaction No:</strong> &nbsp; <?php echo $row['transaction_id'];?></li>

                      <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Bank Name:</strong> &nbsp; <?php echo $row['bank_name'];?></li>

                      <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Account Name:</strong> &nbsp; <?php echo $row['acc_name'];?></li>


                      <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Account No:</strong> &nbsp; <?php echo $row['acc_no'];?></li>

                       <li class="list-group-item border-0 ps-0 pt-0 text-sm"> &nbsp;  <a href="../Order_payment_slips/<?php echo $row['transaction_slip'];?>" target="blank">
                      <button class="btn btn-primary btn-close">View Payment Slip</button>
                   </a></li>
                    </ul>
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
