<?php include 'header.php';?>

<?php 
 

if (isset($_POST['save'])) {
 $bank=$_POST['bank'];
 $holder=$_POST['holder'];
 $iban=$_POST['iban'];
 $upquery="UPDATE payment SET name='$holder', bank='$bank', Iban='$iban'";
  if ( $upsql=mysqli_query($conn,$upquery)) {
    ?>
    <script type="text/javascript">
       alert("Bank account details updated");
       window.location.href="";
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
                        <h4 class="card-title">Bank  Details</h4>
                     </div>
                     <div class="card-content">
                        <div class="card-body">
                           <form action="" method="POST">
                              <?php   

  $banddataquery="SELECT * FROM payment";
  $banddatasql=mysqli_query($conn,$banddataquery);

  if ($banddatasql->num_rows>0) {
         
          
   $bankdatafetch=mysqli_fetch_assoc($banddatasql);
                               ?>
                              <div class="form-group mb-50">
                                 <label class="text-bold-600" for="exampleInputEmail1">Bank</label>
                                 <input value="<?php  echo $bankdatafetch['bank']; ?>" type="" required name="bank" class="form-control" placeholder="Enter Your Bank Name">
                              </div>

                              <div class="form-group mb-50">
                                 <label class="text-bold-600" for="exampleInputEmail1">Account Holder</label>
                                 <input value="<?php  echo $bankdatafetch['name']; ?>" type="" required name="holder" class="form-control" placeholder="Enter Account Holder Name">
                              </div>

                              <div class="form-group mb-50">
                                 <label class="text-bold-600" for="exampleInputEmail1">Account/IBAN No</label>
                                 <input value="<?php  echo $bankdatafetch['Iban']; ?>" type="" required name="iban" class="form-control" placeholder="Enter Account/IBAN No">
                              </div>
                              <div class="text-center">   
                                 <button type="submit" class="btn btn-primary glow position-relative" name="save">Save<i id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>
                              </div>
                           <?php } ?>
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