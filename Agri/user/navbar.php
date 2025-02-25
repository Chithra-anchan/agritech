
<header class="header-section"  style="background-image:url('img/logo-carousel/header3.jpg'); background-repeat: repeat-null;">
       
<div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="./index.html">
                                <img src="img/logo-carousel/logo-6.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="advanced-search">
                           
                            <form method="GET" action="search.php" class="input-group">
                                 <input style="color:black" type="text" name="query" placeholder="Search products">
                                <button type="submit" value="search"><i class="ti-search"></i></button>

                            </form>

                        </div>
                    </div>
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            <li class="heart-icon"><a href="#">
                                    <i class="icon_heart_alt"></i>
                                    <span>1</span>
                                </a>
                            </li>
                            <li class="cart-icon"><a href="./cart1.php">
                                    <i class="icon_bag_alt"></i>
                                    <span>3</span>
                                </a>
                               
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container"style="max-width:1480px;">
            <div class="nav-depart">
                    
             
                <nav class="nav-menu mobile-menu">
                    <ul>
                    
                        <li><a href="./index.php">Home</a></li>
                        <li><a href="./shop.php">Shop</a></li>
                       
                        <li><a href="order_status.php">Order Status</a></li>
                        <li><a href="info.php">Agriculture Info</a></li>
                       
                        <li><a href="#">Account</a>
                            <ul class="dropdown">

                               <?php if(!isset($_SESSION['u_id'])) 
                               {?>
                                <li><a href="./register.php">Register</a></li>
                               
                               
                                <li><a href="./login.php">Login</a></li>
                            
                                <?php }else{
                                    ?>
                                <li><a href="./logout.php">Logout</a></li>
                                
                            </ul>
                            <?php } ?>
                        </li>
                        
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>