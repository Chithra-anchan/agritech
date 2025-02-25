
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
    <title>Shop</title>

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
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <?php include 'navbar.php';
          ?>
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad" style="margin-top: 50px;">
        <div class="container" style="max-width: 1470px;">
            <div class="row">
                    <div class="filter-widget" style="padding-right:50px;">
                        <h4 class="fw-title">Categories</h4>
                        <ul class="filter-catagories">
<?php
$stmt=$admin->ret("SELECT * FROM `category`");
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    ?>


                       
                            <li><a style="font-weight: bolder;color:blue" href="shop.php?cid=<?php echo $row['cid'];?>"><?php echo $row['cname'];?></a></li>


                            <?php  } ?>
                       
                        </ul>
                    </div>
                    
                <div class="col-lg-9 order-1 order-lg-2">
                   
                    <div class="product-list">
                        <div class="row">

<?php 

if(isset($_GET['cid']))
{
    $cid=$_GET['cid'];
    $stmt1=$admin->ret("SELECT * FROM `product` INNER JOIN `category` ON product.cid=category.cid WHERE product.cid='$cid'" );
    

}
else{


$stmt1=$admin->ret("SELECT * FROM `product` INNER JOIN `category` ON product.cid=category.cid" );
}

while($row1=$stmt1->fetch(PDO::FETCH_ASSOC))
{?>




                            <div class="col-lg-4 col-sm-6" >
                                <div class="product-item product-disc">
                                    <div class="pi-pic">
                                        <img style="max-height: 200px;min-height:200px;max-width:200px; min-width:200px;" src="../admin/controller/<?php echo $row1['product_img'];?>" alt="">
                                        <div class="sale pp-sale">Assured</div>
                                        <div class="icon">
                                          <form action="" method="POST"></form>
                                            <i class="icon_heart_alt"></i>
                                        </div>
                                        <ul>
                                            <li class="w-icon active"><a href="./controller/cart.php?pid=<?php echo $row1['pid'];?>"><i class="icon_bag_alt"></i></a></li>
                                            <li class="quick-view"><a href="quickview.php?id=<?php echo $row1['pid'];?>">+ Quick View</a></li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name"><?php echo $row1['cname'];?></div>
                                        <a href="#">
                                            <h5><?php echo $row1['pname'];?></h5>
                                        </a>
                                        <div class="product-price">
                                            ₹<?php echo $row1['product_price'];?>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>


<?php } ?>


                           </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->


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