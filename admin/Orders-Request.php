<?php include 'header.php';?>
<?php 
if (isset($_POST['desc_btn'])) {
   $desicion=$_POST['desicion'];
   $desicion_orderid=$_POST['desicion_order'];

   if ($desicion=='Decline') {

      $up="UPDATE orders SET admin_desc='$desicion' WHERE order_id='$desicion_orderid'";
      if (mysqli_query($conn, $up)) {
           ?>
    <script type="text/javascript">
      alert('Thanks\nYour decision has been set successfully;');
    window.location.href = "";
  </script>
  <?php
      }
     
   }

if ($desicion=='Approve') {

$query = "SELECT * FROM orders WHERE order_id='$desicion_orderid'";
$result = mysqli_query($conn, $query);  
if ($row = mysqli_fetch_array($result))  { 
   
   $deliver_days=$row['deliver_days'];
   $startdate=time();
   $end_time = $startdate + ($deliver_days * 24 * 60 * 60);

   $up="UPDATE orders SET admin_desc='$desicion',order_start_date='$startdate',order_end_date='$end_time' WHERE order_id='$desicion_orderid'";
      if (mysqli_query($conn, $up)) {
           ?>
    <script type="text/javascript">
      alert('Thanks\nYour decision has been set successfully;');
    window.location.href = "";
  </script>
  <?php
      }



}

}

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
        <h4 class="card-title">Order Requests</h4>
    </div>
    <div class="card-content">
        <div class="card-body card-dashboard">
<input type="hidden" name="" id="edit_id">
         <div class="table-responsive">
          <table class="table zero-configuration" id="Tables">
           <thead>
            <tr>
             <th>Order No#</th>
             <th>Buyer</th>
             <th>Seller</th>
             <th>Amount</th>
             <th>Order Details</th>
             <th>Action</th>
         </tr>
     </thead>
     <tbody>
        <?php
        $query = "SELECT * FROM orders WHERE admin_desc='Pending' ORDER BY id DESC ";
        $result = mysqli_query($conn, $query);  
        if ($result->num_rows > 0) {
            while($row = mysqli_fetch_array($result))  
            {
            $seller_id=$row['seller_id'];
            $client_id=$row['client_id'];

            $query1 = "SELECT * FROM user WHERE userid='$seller_id'";
            $result1 = mysqli_query($conn, $query1);  
            $row1 = mysqli_fetch_array($result1);

            $query2 = "SELECT * FROM user WHERE userid='$client_id'";
            $result2 = mysqli_query($conn, $query2);  
            $row2 = mysqli_fetch_array($result2);
              ?>
              <tr>
                <td>#<?php echo $row['order_id'];?></td>
                <td><?php echo $row2['name'];?></td>
                <td><?php echo $row1['name'];?></td>
                <td><?php echo number_format($row['pay_amt'],2);?></td>
             

                <td>
                   <a href="view-order-details.php?id=<?php echo $row['order_id'];?>" target="blank">
                      <button class="btn btn-primary btn-sm">View Order Details</button>
                   </a>
                </td>
                <td>
                  <form action="" method="POST">
                     <input type="hidden" value="<?php echo $row['order_id'];?>" name="desicion_order">
                   <select name="desicion" required class="form-control">
                      <option value="">Please select</option>
                      <option value="Approve">Approve</option>
                      <option value="Decline">Decline</option>
                   </select><br>
                   <button name="desc_btn" class="btn btn-primary btn-sm">Submit</button>
                </form>
                </td>
              
             </tr>
         <?php } 
     }
     ?>
 </table>
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


<?php include 'footer.php';?>
