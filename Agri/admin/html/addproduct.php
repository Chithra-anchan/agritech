<?php 
include '../../config.php';
$admin=new Admin();
?>
<!DOCTYPE html>

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

    <title>Add Products</title>

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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> ADD PRODUCTS</h4>

              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Product Details</h5>
                     
                    </div>
                    <div class="card-body">
                      <form action="../controller/addproduct1.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Product Name</label>
                          <input type="text" name="pname" class="form-control" id="basic-default-fullname" required/>
                        </div>

                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Product Image</label>
                          <input type="file"  name="img" class="form-control" id="basic-default-company" required />
                        </div>

                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Description</label>
                          <textarea maxlength="4000" name="pdescription" class="form-control" id="basic-default-fullname" required></textarea>
                        </div>

                  
                          
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-phone">Product Price</label>
                          <input
                            type="number"
                            id="basic-default-phone"
                            class="form-control phone-mask"
                          name="price" required
                          />
                        </div>

                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Select Category</label>
                          <div id="category" class="form-text">
                        <select name="acttype" id="" class="form-control">
                            <option selected disabled> select category type</option>
                            <?php $stmt=$admin->ret("SELECT * FROM  `category` ");
                            while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                            {
                                ?>
                                <option value="<?php echo $row['cid']; ?>"> 
                                <?php echo $row['cname']; ?> </option> 

                           <?php }?>
                        </select>
                        </div>
                            </div>


                        <div class="mb-3">
                          <label class="form-label" for="basic-default-phone">Product stock</label>
                          <input
                            type="number"
                            id="basic-default-phone"
                            class="form-control phone-mask"
                            name="pstock"
                            required
                          />
                        </div>
                        
                        <button type="submit" name="add" class="btn btn-primary">Add Product</button>
                      </form>
                    </div>
                  </div>
                </div>
                
              </div>
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
