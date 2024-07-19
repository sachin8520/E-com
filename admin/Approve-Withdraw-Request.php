<?php include 'header.php';?>


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
        <h4 class="card-title">Approve Withdraw Requests</h4>
    </div>
    <div class="card-content">
        <div class="card-body card-dashboard">
<input type="hidden" name="" id="edit_id">
         <div class="table-responsive">
          <table class="table zero-configuration" id="Tables">
           <thead>
            <tr>
            <th>Sr No</th>
            <th>User</th>
            <th>Request Time</th>
            <th>Amount</th>
            <th>Bank name</th>
            <th>Account Holder</th>
            <th>Account No</th>
            <th>Instructions</th>
         </tr>
     </thead>
     <tbody>
        <?php
        $query="SELECT * FROM withdraws WHERE status='Approve'";
        $result = mysqli_query($conn, $query);  
        if ($result->num_rows > 0) {
            $x=1;
            while($row = mysqli_fetch_array($result))  
            {
            $user_id=$row['user_id'];

            $query1 = "SELECT * FROM user WHERE userid='$user_id'";
            $result1 = mysqli_query($conn, $query1);  
            $row1 = mysqli_fetch_array($result1);

              ?>
              <tr>
           <td><?php echo $x;?></td>
            <td><?php echo $row1['name'];?></td>
              <td><?php
            $order_end_date=$row['request_date'];
                      $actual_time_date = date('Y-m-d H:i:s', $order_end_date); 
                      echo $actual_time_date; ?></td>
            <td><?php echo number_format($row['withdraw_amt'],2); ?></td>
            <td><?php echo $row['bank_name']; ?></td>
            <td><?php echo $row['acc_holder']; ?></td>
            <td><?php echo $row['acc_no']; ?></td>
            <td><?php echo $row['instructions']; ?></td>
             

        
        
              
             </tr>
         <?php $x++; } 
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
