<?php
include 'header.php';
$query = "SELECT * FROM pend_transactions WHERE user_name='$login_user_name'";
$result = mysqli_query($conn, $query); 
if ($result->num_rows > 0) {
    if($row = mysqli_fetch_array($result)) {
        $amount=$row['amount'];

        $query2="UPDATE users set wallet_balance=$login_user_wallet+$amount WHERE user_name='$login_user_name'";
        if(mysqli_query($conn, $query2))  
        {
            $date=date('d-m-Y h:i:s');

        $sql11 = "INSERT INTO transactions(user_name,amount,date,description,status)
         VALUES ('$login_user_name','$amount','$date','Deposit Into Wallet','Deposit')";
         if (mysqli_query($conn, $sql11)) {

        $query3="DELETE FROM pend_transactions WHERE user_name='$login_user_name'";
        if(mysqli_query($conn, $query3)){


        }
        ?>

        <?php include 'navbar.php';?>
        <!-- BEGIN: Content-->
        <style type="text/css">
            table,th,td{
                text-align: center;
            }
        </style>
        <div class="app-content content">
         <div class="content-overlay"></div>
         <div class="content-wrapper">

          <div class="content-body">

           <!-- Zero configuration table -->
           <section id="basic-datatable">
            <div class="row">
             <div class="col-12">
              <div class="card">
               <div class="card-header">
                <h4 class="card-title">All Users</h4>
            </div>
            <div class="card-content">
                <div class="card-body card-dashboard">
                    <input type="hidden" name="" id="edit_id">
                    <div class="table-responsive">
                       <h3 class="text-white text-capitalize ps-3">Congratulation</h3>
                       <b class="text-white text-capitalize ps-3"><?php echo '₹'. $amount.' Has been added to your wallet';?></b>
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>
</section>
</div>
</div>
</div>
<!-- END: Content-->
<!-- demo chat-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<?php 
}
}
}
}
?>
<?php include 'footer.php';?>
