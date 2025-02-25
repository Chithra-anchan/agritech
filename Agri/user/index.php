
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
    <title>Agritech Home</title>

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

    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            <div class="single-hero-items set-bg" data-setbg="img/agri1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Buy Fertilizers</span>
                            <h1>Agri Tech </h1>
                            <p>We provide the best quality Agriculture based products at youre door step</p>
                            <a href="./shop.php" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Genuine <span>Products</span></h2>
                    </div>
                </div>
            </div>
            <div class="single-hero-items set-bg" data-setbg="img/agri3.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Buy Fungicides</span>
                            <h1>Agri Tech</h1>
                            <p>We provide the best quality Agriculture based products at youre door step</p>
                            <a href="./shop.php" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Genuine<span>Products</span></h2>
                    </div>
                </div>
            </div>
            <div class="single-hero-items set-bg" data-setbg="img/agri6.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Buy Insectisides</span>
                            <h1>Agri Tech</h1>
                            <p>We provide the best quality Agriculture based products at youre door step</p>
                            <a href="./shop.php" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Genuine<span>Products</span></h2>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
    <div class="banner-section spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="img/agri4.jpg"  height="270px" alt="">
                        <div class="inner-text">
                        <a href="shop.php?cid=1"><h4>Fungicides</h4></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="img/ferti.jpg"  height="270px" alt="">
                        <div class="inner-text">
                        <a href="shop.php?cid=3"><h4>Fertilizers</h4></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="img/insec1.jpg" height="270px" alt="">
                        <div class="inner-text">
                          <a href="shop.php?cid=2"><h4>Insecticides</h4></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Section End -->

    <!-- Women Banner Section Begin -->
    <section class="man-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="filter-control">
                        <ul>
                            <li class="active"><h3>Recomended Products</h3></li>
                            <a href="./shop.php"><li><u>View All</u></li></a>
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel">
                    <?php 
                    $stmt2=$admin->ret("SELECT * FROM `product`");
                    while($row2=$stmt2->fetch(PDO::FETCH_ASSOC))
                    {?>
                        <div class="product-item">
                            <div class="pi-pic">
                                <img style="max-height: 300px;min-height:300px;max-width:300px; min-width:300px;" src="../admin/controller/<?php echo $row2['product_img'] ; ?>" alt="">
                                
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="./controller/cart.php?pid=<?php echo $row2['pid'];?>"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="quickview.php?id=<?php echo $row2['pid'];?>">+ Quick View</a></li>
                                </ul>
                            </div>
                            <div class="pi-text" >
                                <div class="catagory-name">Coat</div>
                                <a href="#">
                                    <h5><?php echo $row2['pname'];?></h5>
                                </a>
                                <div class="product-price">
                                            ₹<?php echo $row2['product_price'];?>
                                            
                                        </div>
                            </div>
                        </div>
                        <?php } ?>

                       
                  
                    </div>
                </div>
               
            </div>
        </div>
    </section>
    <!-- Women Banner Section End -->

    
    <!-- Man Banner Section Begin -->
    <section class="man-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="filter-control">
                        <ul>
                        <li class="active"><h3>Fertilizers</h3></li>
                            <a href="./shop.php"><li><u>View All</u></li></a>
                        </ul>
                    </div>
                    
                    <div class="product-slider owl-carousel">
                    <?php 
                    $stmt1=$admin->ret("SELECT * FROM `product` WHERE `cid`='3'");
                    while($row1=$stmt1->fetch(PDO::FETCH_ASSOC))
                    {?>
                      
                        <div class="product-item" >
                            <div class="pi-pic">

                                <img style="max-height: 300px;min-height:300px;max-width:300px; min-width:300px;" src="../admin/controller/<?php echo $row1['product_img'] ; ?>" alt="">
                                <div class="sale">Sale</div>
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="./controller/cart.php?pid=<?php echo $row1['pid'];?>"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="quickview.php?id=<?php echo $row1['pid'];?>">+ Quick View</a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">Coat</div>
                                <a href="#">
                                    <h5><?php echo $row1['pname'] ; ?></h5>
                                </a>
                                <div class="product-price">
                                            ₹<?php echo $row1['product_price'];?>
                                            
                                        </div>
                            </div>
                        </div>
                       
                      
                        <?php } ?>
                    </div>
                </div>
               
            </div>
        </div>
    </section>
    <!-- Man Banner Section End -->

    <!-- Deal Of The Week Section Begin-->
    
    <!-- Deal Of The Week Section End -->


    <!-- Instagram Section Begin -->
    
    <!-- Instagram Section End -->

    <!-- Latest Blog Section Begin -->
    <section class="latest-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Agriculture Informations</h2>
                    </div>
                </div>
            </div>

            
            <div class="row">
            <?php
            $stmt=$admin->ret("SELECT * FROM `information`");
            $counter = 0;
            $max = 3;
            while(($row=$stmt->fetch(PDO::FETCH_ASSOC)) and ($counter < $max))
           {?>
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                       <a href="./info.php"><img   style="max-height: 360px;min-height:360px;max-width:360px; min-width:360px;" class="index-infoimg" src="../Admin/controller/<?php echo $row['info_img'];?>"></a> 
                        <div class="latest-text">
                            <div class="tag-list">
                                
                               
                            </div>
                            <a href="info.php">
                                <h5 style="color:blue;font-weight:bold;">Title:</h5>
                                <h4><?php echo $row['info_title'];?></h4>
                            </a>
                        </div>
                    </div>
                    
                </div> 
                <?php  $counter++; } ?>
           </div>
            
    </section>
    <!-- Latest Blog Section End -->

   

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
    <script src="js/custom.js"></script>
</body>

</html>