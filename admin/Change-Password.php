<?php include 'header.php';?>
<?php
if(isset($_POST['change_pass'])){
  $old_pass=$_POST['old_pass'];
  $c_pass=$_POST['c_pass'];
  $new_pass=$_POST['new_pass'];

  $query_chck_pass = mysqli_query($conn,"SELECT * FROM admin WHERE password='$old_pass'") or die(mysqli_error($conn)); 
if(mysqli_num_rows($query_chck_pass)>0){

    if ($new_pass==$c_pass) {

  $query3="UPDATE admin set password='$new_pass'";
       if(mysqli_query($conn, $query3)){    

       ?>
        <script type="text/javascript">
            alert('Update Successfully.');
            window.location.href='';
        </script>
        <?php    

}
}
else{
?>
<script type="text/javascript">
    alert('Invalid same passwords.'); 
window.location.href='';
</script>
<?php
}
}
else{
?>
<script type="text/javascript">
    alert('Invalid old password.'); 
window.location.href='';
</script>
<?php
}
}
?>
<?php include 'navbar.php';?>
<div class="app-content content">
   <div class="content-overlay"></div>
   <div class="content-wrapper">
      <div class="content-body">
         <section class="select2-sizing">
            <div class="row">
               <div class="col-md-12">
                  <div class="card">
                     <div class="card-header">
                        <h4 class="card-title">Change your account password</h4>
                     </div>
                     <div class="card-content">
                        <div class="card-body">
                           <form action="" method="POST">
                              
                              <div class="form-group mb-50">
                                 <label class="text-bold-600" for="exampleInputEmail1">Current Password</label>
                                 <input type="" required name="old_pass" class="form-control" placeholder="Enter Current Password">
                              </div>

                              <div class="form-group mb-50">
                                 <label class="text-bold-600" for="exampleInputEmail1">New Password</label>
                                 <input type="" required name="new_pass" class="form-control" placeholder="Enter New Password">
                              </div>

                              <div class="form-group mb-50">
                                 <label class="text-bold-600" for="exampleInputEmail1">Confrm Password</label>
                                 <input type="" required name="c_pass" class="form-control" placeholder="Enter Confirm Password">
                              </div>
                              <div class="text-center">   
                                 <button type="submit" class="btn btn-primary glow position-relative" name="change_pass">Change<i id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- Select2 Sizing end -->
      </div>
   </div>
</div>
<div class="sidenav-overlay"></div>
<div class="drag-target"></div>
<!-- BEGIN: Footer-->
<?php include 'footer.php';?>