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
                        <h4 class="card-title">All Sellers</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <input type="hidden" name="" id="edit_id">
                            <div class="table-responsive">
                              <table class="table zero-configuration" id="Tables">
                                 <thead>
                                    <tr>
                                       <th>#</th>
                                       <th>Name</th>
                                       <th>Email</th>
                                       <th> Country</th>
                                       <th>City</th>

                                   </tr>
                               </thead>
                               <tbody>
                                <?php
                                $query = "SELECT * FROM user WHERE type='writer' ORDER BY id DESC";
                                $result = mysqli_query($conn, $query);  
                                if ($result->num_rows > 0) {
                                    $a=1;
                                    while($row = mysqli_fetch_array($result))  
                                    {
                                      ?>
                                      <tr>
                <td>
                    <?php echo $a; ?>
                </td>
                <td>
                    <?php echo $row['name']; ?>
                </td>
                <td>
                    <?php echo $row['email']; ?>
                </td>
                <td>
                    <?php echo $row['country']; ?>
                </td>
                <td>
                    <?php echo $row['city']; ?>
                </td>
                    

             
             </tr>
                        <?php $a++; } 
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