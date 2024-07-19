<?php include 'header.php';?>
<?php 

?>


<?php 
if (isset($_POST['block'])) {
 $id=$_POST['id'];

 $query2="UPDATE users set account_status='Active' WHERE id='$id'";
 if(mysqli_query($conn, $query2))  
 {
    ?>
    <script type="text/javascript">
        alert('Status Updated successfully');
        window.location.href='';
    </script>
    <?php
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
                        <h4 class="card-title">Completed Orders</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <input type="hidden" name="" id="edit_id">
                            <div class="table-responsive">
                              <table class="table zero-configuration" id="Tables">
                                 <thead>
                                      <tr>
                                          <th>Sr No</th>
                                          <th>Order No</th>
                                          <th>Seller</th>
                                          <th>Client</th>

                                          <th>Package</th>
                                          <th>Amount</th>
                                          
                                        
                                          

                                       </tr>
                               </thead>
                               
<?php 

$select="SELECT * FROM orders WHERE order_status='Rivison'";
$selectsql=mysqli_query($con,$select);
$x=1;
      while ($selectfetch=mysqli_fetch_assoc($selectsql)) {

        $selerid=$selectfetch['seller_id'];
        $clientid=$selectfetch['client_id'];


$userquery="SELECT * FROM user WHERE userid='$selerid'";
$usersql=mysqli_query($con,$userquery);
$userfetch=mysqli_fetch_assoc($usersql);


$userquery22="SELECT * FROM user WHERE  userid='$clientid' ";
$usersql22=mysqli_query($con,$userquery22);
$userfetch22=mysqli_fetch_assoc($usersql22);
   
 ?>
          <tr>
            <td><?php  echo $x; ?> </td>
            <td>#<?php echo $selectfetch['order_id']; ?></td>
            <td><?php echo $userfetch['name']; ?></td>
            <td><?php echo $userfetch22['name']; ?></td>

            <td><?php echo  $selectfetch['package_type']; ?></td>
            <td>$<?php echo   number_format($selectfetch['gig_amt']); ?></td>
            
            


            

           



          </tr>
          <?php $x++; } ?>
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

<script type="text/javascript">
    $('td').on('dblclick', function() {

        var rowIndex = $(this).parent().index('table tbody tr');
        var tdIndex = $(this).index('table tbody tr:eq('+rowIndex+') td');
        var edit_id = $('#edit_id').val();
        var $this = $(this);
        var $input = $('<input>', {
          value: $this.text(),
          type: 'text',
          blur: function() {
            if (this.value!="") {
                $this.text(this.value);
                var edit_val=this.value;

                $.ajax({
                    url: "edit-data.php",
                    type: "POST",
                    data: {
                        edit_val: edit_val,
                        user_id: edit_id,
                        col_num: tdIndex            
                    },
                    success: function(dataResult){
                        var dataResult = JSON.parse(dataResult);
                        if(dataResult.statusCode==200){  
                            alert('done');
                        }

                    } });

            }
        },
        keyup: function(e) {
           if (e.which === 13){
             if (e.which === 13) $input.blur();
             if (this.value!="") {

                 $this.text(this.value);
                 var edit_val=this.value;

                 $.ajax({
                    url: "edit-data.php",
                    type: "POST",
                    data: {
                        edit_val: edit_val,
                        user_id: edit_id,
                        col_num: tdIndex            
                    },
                    success: function(dataResult){
                        var dataResult = JSON.parse(dataResult);
                        if(dataResult.statusCode==200){  
                            alert('done');
                        }

                    } });
             }
         }
     }
 }).appendTo( $this.empty() ).focus();

    });
</script>

<script>

  var table = document.getElementById('Tables');

  for (var i = 1; i < table.rows.length; i++)
  {
    table.rows[i].onclick = function ()
    {
      document.getElementById("edit_id").value = this.cells[0].innerHTML;
  };
}
</script> 