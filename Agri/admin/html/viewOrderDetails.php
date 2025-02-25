
<?php 
include '../../config.php';
$admin=new Admin();
?>
<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>View order details</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        <?php include 'sidebar.php'
        ?>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          <?php include 'navbar.php'
          ?>
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> ORDER DETAILS</h4>

              <!-- Basic Bootstrap Table -->
              
              <!--/ Basic Bootstrap Table -->


              <!-- Bootstrap Dark Table -->
              <div class="card">
                <h5 class="card-header">Orders</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table table-dark">
                    <thead>
                      <tr>
                      <th scope="col">SL.NO</th>
                                        <th scope="col">Customer Name</th>
                                        <th scope="col">Customer Address</th>
                                        <th scope="col">State</th>
                                        <th scope="col">Pin Code</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Order Date</th>
                                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <?php 
                               $i=1;
                                $sum = 0;
                               $stmt=$admin->ret("SELECT * FROM `order1` INNER JOIN `shipping` ON shipping.unid=order1.unid  INNER JOIN `product` ON product.pid=order1.pid GROUP BY shipping.unid  ");
                               while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                                $unid=$row['unid'];
                                $stmt1=$admin->ret("SELECT * FROM `order1` WHERE `unid`='$unid'");
                                while($row1=$stmt1->fetch(PDO::FETCH_ASSOC)){
                                    $sum=$sum+$row1['or_total'];
                                }
                               ?>
                        <tr>
                          <td>
                          <?php echo $i++?>
                          </td>
                          <td>
                          <?php echo $row['f_name']?>
                          </td>
                          <td>
                          <?php echo $row['s_address']?>
                          </td>
                          <td>
                          <?php echo $row['s_state']?>
                          </td>
                          <td>
                          <?php echo $row['s_zip']?>
                          </td>
                          <td>
                          <?php echo $row['s_phone']?>
                          </td>
                          <td>
                          <?php echo $row['pname']?>
                          </td>
                          <td><?php echo $sum?></td>
                                    <td><?php echo $row['date']?></td>
                                    <td style="display: flex">
                                        <?php if($row['or_status']=='pending'){?>
                                    <a type="button" class="btn btn-info  btn-fw" href="../controller/update_status.php?update_order_status=<?php echo $row['unid'] ?>&r_id=<?php echo $row['cusid'] ?>">Accept order</a><br>
                                    <a type="button" class="btn btn-danger  btn-fw" href="../controller/update_status.php?order_cancel=<?php echo $row['unid'] ?>&r_id=<?php echo $row['cusid'] ?>">Cancel</a>
                                    <?php } elseif ($row['or_status'] == 'order_canceled') { ?>
                                 <a href="" type="button" class="btn btn-danger  btn-fw">Canceled</a> 
                                    <?php } elseif ($row['or_status'] == 'order_accepted') { ?>
                                 <a href="../controller/update_status.php?Picked_by_courier=<?php echo $row['unid'] ?>& r_id=<?php echo $row['cusid'] ?>" type="button" class="btn btn-primary  btn-fw">Picked by courier</a> 

                                 <?php } elseif ($row['or_status'] == 'Picked by courier') { ?>
                               <a href="../controller/update_status.php?On_the_way=<?php echo $row['unid'] ?>&r_id=<?php echo $row['cusid'] ?>" type="button" class="btn btn-warning  btn-fw">On the way</a>
                                 <?php } elseif ($row['or_status'] == 'On the way') { ?>
                               <a href="../controller/update_status.php?Delivered=<?php echo $row['unid'] ?>&r_id= <?php echo $row['cusid'] ?>" type="button" class="btn btn-success  btn-fw">Delivered</a>
                                 <?php } elseif ($row['or_status'] == 'Delivered') { ?>
                               <a href="" type="button" class="btn btn-success  btn-fw">Item Delivered</a>
                                    <?php }   ?>
                                    </td>
                                

                        </tr>
                      
                    <?php } ?>
                  
                      
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Bootstrap Dark Table -->
   </div>
            <!-- / Content -->

            <!-- Footer -->
            
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
