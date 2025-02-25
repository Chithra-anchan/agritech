<?php
include '../config.php';
$admin=new Admin();
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agriculture Info</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <style>
      <?php include "css/custom.css"?>
      </style>
</head>

<body>
    <!-- Page Preloder -->
  

    <!-- Header Section Begin -->
    <?php include 'navbar.php';
          ?>
    <!-- Header End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
            <?php
            $stmt=$admin->ret("SELECT * FROM `information`");
            while($row=$stmt->fetch(PDO::FETCH_ASSOC))
           {?> 
                    <div class="blog-details-inner" style="padding-top:50px;border-bottom:1px solid grey">
                        <div class="blog-detail-title">
                            <h2><?php echo $row['info_title'];?></h2>
                            <p>AGRITECH</p>
                        </div>
                        <div class="blog-large-pic" style="text-align: center;" >
                        <img style="max-height: 600px;min-height:600px;max-width:600px; min-width:600px;border-radius:1%" src="../Admin/controller/<?php echo $row['info_img'];?>">
                            
                        </div>
                        <div class="blog-detail-desc">
                        <div style="width:none;">
                            
                            <p style="color: black;white-space:pre-wrap;"><?php echo $row['info_msg'];?></p>
                        </div>
                        </div>
                                           
                    </div>
                    <?php   } ?>

                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

    
    <!-- Footer Section Begin -->
      <!-- Footer Section Begin -->
      <?php include 'footer.php';
          ?>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/jquery.dd.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>