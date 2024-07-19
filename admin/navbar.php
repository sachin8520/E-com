<?php
if (isset($_POST['light'])) {
   $query_chng_theme="UPDATE users set theme='light' WHERE user_name='$login_user_name'";
      mysqli_query($conn, $query_chng_theme);
    ?>
    <script type="text/javascript">
    window.location.href = "";
  </script>
  <?php  
}
elseif (isset($_POST['dark'])) {
    $query_chng_theme="UPDATE users set theme='dark' WHERE user_name='$login_user_name'";
      mysqli_query($conn, $query_chng_theme); 
      ?>
    <script type="text/javascript">
    window.location.href = "";
  </script>
  <?php   
}
?>
<body class="horizontal-layout horizontal-menu navbar-static dark-layout 2-columns   footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns" data-layout="dark-layout">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-static-top bg-primary navbar-brand-center">
        <div class="navbar-header d-xl-block d-none">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item"><a class="navbar-brand" href="index.php">
                        <div class="brand-logo"><h2 class="brand-text mb-0">Fiver Writers Admin</h2></div>
                        
                    </a></li>
            </ul>
        </div>
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">

                            <li class="nav-item mobile-menu mr-auto"><a class="nav-link nav-menu-main menu-toggle" href="#"><i class="bx bx-menu"></i></a></li>


                        </ul>
                    </div>
                    <ul class="nav navbar-nav float-right d-flex align-items-center">

                        
                        
                        <li class=" nav-item"><a class=" nav-link " href="Logout.php" >
                                <div class="user-nav d-lg-flex d-none"><span class="user-name"> Logout</span></div><span></span>
                            </a>
                           
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->



    <!-- BEGIN: Main Menu-->
    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-sticky navbar-dark navbar-without-dd-arrow" role="navigation" data-menu="menu-wrapper">
        <div class="navbar-header d-xl-none d-block">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="index.php">
                        <div class="brand-logo"></div>
                        <h2 class="brand-text mb-0">Fiver Writers <span style="position: absolute;margin-top: 20px;right: 50px;font-size: 15px;color: #5A8DEE;">Admin</span></h2>
                    </a></li>
                <li  class="nav-item nav-toggle" style="position: absolute;"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="bx bx-x d-block d-xl-none font-medium-4 primary toggle-icon"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <!-- Horizontal menu content-->
        <div class="navbar-container main-menu-content" data-menu="menu-container">
            <!-- include includes/mixins-->
            <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="lines">
                <li class="dropdown nav-item" data-menu="dropdown"><a class="nav-link" href="index.php"><span data-i18n="Dashboard">Dashboard</span></a>
                </li>

                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><span>Users</span></a>
                    <ul class="dropdown-menu">
                        <li data-menu=""><a class="dropdown-item align-items-center" href="All-Sellers.php" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Sellers</a>
                        </li>

                        <li data-menu=""><a class="dropdown-item align-items-center" href="All-Buyers.php" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Buyers</a>
                        </li>
                    </ul>
                </li>

                 <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><span>Orders</span></a>
                    <ul class="dropdown-menu">
                        <li data-menu=""><a class="dropdown-item align-items-center" href="Orders-Request.php" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Orders Request </a>
                        </li>

                        <li data-menu=""><a class="dropdown-item align-items-center" href="Active_orders.php" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Active Orders</a>
                        </li>

                        <li data-menu=""><a class="dropdown-item align-items-center" href="Complete_orders.php" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Complete Orders</a>
                        </li>

                        <li data-menu=""><a class="dropdown-item align-items-center" href="Revision_orders.php" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Revision Orders</a>
                        </li>
                    </ul>
                </li>




                    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><span>Withdraw</span></a>
                    <ul class="dropdown-menu">
                        <li data-menu=""><a class="dropdown-item align-items-center" href="Pending-Withdraw-Request.php" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Pending Withdraw Request </a>
                        </li>

                        <li data-menu=""><a class="dropdown-item align-items-center" href="Approve-Withdraw-Request.php" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Approve Withdraw Request </a>
                        </li>


                        <li data-menu=""><a class="dropdown-item align-items-center" href="Cancel-Withdraw-Request.php" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Cancel Withdraw Request </a>
                        </li>


                    </ul>
                </li>



              




                 <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><span>Settings</span></a>
                    <ul class="dropdown-menu">
                        <li data-menu=""><a class="dropdown-item align-items-center" href="bank_details.php" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Bank details</a>
                        </li>

                        <li data-menu=""><a class="dropdown-item align-items-center" href="Premium-Package-Settings.php" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Premium Package Settings</a>
                        </li>

                        <li data-menu=""><a class="dropdown-item align-items-center" href="Change-Password.php" data-toggle="dropdown"><i class="bx bx-right-arrow-alt"></i>Change Password</a>
                        </li>

                    </ul>
                </li>
                
            </ul>
        </div>
        <!-- /horizontal menu content-->
    </div>
    <!-- END: Main Menu-->
