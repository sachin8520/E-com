<?php include '../config.php';?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="author" content="PIXINVENT">
    <title></title>
    <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/semi-dark-layout.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/semi-dark-layout.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/dashboard-ecommerce.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<?php 
$conn=$con;
   if (isset($_POST['login_btn'])) {
   $log_email = mysqli_real_escape_string($conn,$_POST['email']);
     $log_password = mysqli_real_escape_string($conn,$_POST['log_password']);
   
   
   $query_chck_email = mysqli_query($conn,"SELECT * FROM admin WHERE email = '$log_email' AND binary password='$log_password'") or die(mysqli_error($conn)); 
   if(mysqli_num_rows($query_chck_email)>0){
   
   session_start();
   $_SESSION['username']='Admin';
   ?>
    <script type="text/javascript">
        window.location.href="index.php";
    </script>
    <?php
   
   }
   else{
       ?>
<script type="text/javascript">
   alert('Enter Valid Details');
</script>
<?php
   }
   }
   ?>
<body class="horizontal-layout horizontal-menu navbar-static dark-layout 1-column   footer-static bg-full-screen-image  blank-page blank-page" data-open="hover" data-menu="horizontal-menu" data-col="1-column" data-layout="dark-layout">
   <!-- BEGIN: Content-->
   <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
         <div class="content-header row">
         </div>
         <div class="content-body">
            <!-- login page start -->
            <section id="auth-login" class="row flexbox-container">
               <div class="col-xl-8 col-11">
                  <div class="card bg-authentication mb-0">
                     <div class="row m-0">
                        <!-- left section-login -->
                        <div class="col-md-6 col-12 px-0">
                           <div class="card disable-rounded-right mb-0 p-2 h-100 d-flex justify-content-center">
                              <div class="card-header pb-1">
                                 <div class="card-title">
                                    <h4 class="text-center mb-2">Welcome Back</h4>
                                    <h4 class="text-center">Admin Login</h4>
                                 </div>
                              </div>
                              <div class="card-content">
                                 <div class="card-body">
                                    <form action="" method="POST">
                                       <div class="form-group mb-50">
                                          <label class="text-bold-600" for="exampleInputEmail1">Email address</label>
                                          <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email address" name="email">
                                       </div>
                                       <div class="form-group">
                                          <label class="text-bold-600" for="exampleInputPassword1">Password</label>
                                          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="log_password">
                                       </div>
                                       <button type="submit" class="btn btn-primary glow w-100 position-relative" name="login_btn">Login<i id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- right section image -->
                        <div class="col-md-6 d-md-block d-none text-center align-self-center p-3">
                           <div class="card-content">
                              <img class="img-fluid" src="app-assets/images/pages/login.png" alt="branding logo">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- login page ends -->
         </div>
      </div>
   </div>
   <!-- END: Content-->
   <!-- BEGIN: Vendor JS-->
   <script src="app-assets/vendors/js/vendors.min.js"></script>
   <script src="app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.js"></script>
   <script src="app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.js"></script>
   <script src="app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js"></script>
   <!-- BEGIN Vendor JS-->
   <!-- BEGIN: Page Vendor JS-->
   <script src="app-assets/vendors/js/ui/jquery.sticky.js"></script>
   <!-- END: Page Vendor JS-->
   <!-- BEGIN: Theme JS-->
   <script src="app-assets/js/scripts/configs/horizontal-menu.js"></script>
   <script src="app-assets/js/scripts/configs/vertical-menu-dark.js"></script>
   <script src="app-assets/js/core/app-menu.js"></script>
   <script src="app-assets/js/core/app.js"></script>
   <script src="app-assets/js/scripts/components.js"></script>
   <script src="app-assets/js/scripts/footer.js"></script>
   <!-- END: Theme JS-->
   <!-- BEGIN: Page JS-->
   <!-- END: Page JS-->
</body>
<!-- END: Body-->
</html>