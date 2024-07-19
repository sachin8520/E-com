<?php include 'header.php';?>
<?php 
if (isset($_POST['desc_btn'])) {
   $desicion=$_POST['desicion'];
   $withdraw_id=$_POST['withdraw_id'];


$query = "SELECT * FROM withdraws WHERE id='$withdraw_id'";
$result = mysqli_query($conn, $query);  
if ($row = mysqli_fetch_array($result))  { 

    $withdraw_amt=$row['withdraw_amt'];
    $user_id=$row['user_id'];

if ($desicion=='Approve') {

$up="UPDATE user SET t_withdraw=t_withdraw+'$withdraw_amt' WHERE userid='$user_id'";
      if (mysqli_query($conn, $up)) {

  $up1="UPDATE withdraws SET status='$desicion' WHERE id='$withdraw_id'";
      if (mysqli_query($conn, $up1)) {
           ?>
    <script type="text/javascript">
      alert('Thanks\nYour decision has been set successfully;');
    window.location.href = "";
  </script>
  <?php
      }
}
}


if ($desicion=='Decline') {


$up="UPDATE user SET balance=balance+'$withdraw_amt' WHERE userid='$user_id'";
      if (mysqli_query($conn, $up)) {

  $up1="UPDATE withdraws SET status='$desicion' WHERE id='$withdraw_id'";
      if (mysqli_query($conn, $up1)) {
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
        <h4 class="card-title">Pending Withdraw Requests</h4>
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
            <th>Action</th>
         </tr>
     </thead>
     <tbody>
        <?php
        $query="SELECT * FROM withdraws WHERE status='Pending'";
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
             

        
                <td>
                  <form action="" method="POST">
                     <input type="hidden" value="<?php echo $row['id'];?>" name="withdraw_id">
                   <select name="desicion" required class="form-control">
                      <option value="">Please select</option>
                      <option value="Approve">Approve</option>
                      <option value="Decline">Decline</option>
                   </select><br>
                   <button name="desc_btn" class="btn btn-primary btn-sm">Submit</button>
                </form>
                </td>
              
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
