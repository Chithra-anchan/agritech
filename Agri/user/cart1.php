<?php 
include '../config.php';
$admin=new Admin();
$cus_id=$_SESSION['u_id'];
$stmt1=$admin->ret("SELECT COUNT(*) FROM `cart` WHERE `cid`='$cus_id' ");
$row1=$stmt1->fetch(PDO::FETCH_ASSOC);
$quantity=implode($row1);
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GROCE EASY</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        
        body{
    background: #ddd;
    min-height: 100vh;
    vertical-align: middle;
    display: flex;
    font-family: sans-serif;
    font-size: 0.8rem;
    font-weight: bold;
}
.title{
    margin-bottom: 5vh;
}
.card{
    margin: auto;
    max-width: 1600px;
    width: 90%;
    box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    border-radius: 1rem;
    border: transparent;
}
@media(max-width:767px){
    .card{
        margin: 3vh auto;
    }
}
.cart{
    background-color: #fff;
    padding: 4vh 5vh;
    border-bottom-left-radius: 1rem;
    border-top-left-radius: 1rem;
}
@media(max-width:767px){
    .cart{
        padding: 4vh;
        border-bottom-left-radius: unset;
        border-top-right-radius: 1rem;
    }
}
.summary{
    background-color: #ddd;
    border-top-right-radius: 1rem;
    border-bottom-right-radius: 1rem;
    padding: 4vh;
    color: rgb(65, 65, 65);
}
@media(max-width:767px){
    .summary{
    border-top-right-radius: unset;
    border-bottom-left-radius: 1rem;
    }
}
.summary .col-2{
    padding: 0;
}
.summary .col-10
{
    padding: 0;
}.row{
    margin: 0;
}
.title b{
    font-size: 1.5rem;
}
.main{
    margin: 0;
    padding: 2vh 0;
    width: 100%;
}
.col-2, .col{
    padding: 0 1vh;
}
a{
    padding: 0 1vh;
}
.close{
    margin-left: auto;
    font-size: 0.7rem;
}
img{
    width: 3.5rem;
}
.back-to-shop{
    margin-top: 4.5rem;
}
h5{
    margin-top: 4vh;
}
hr{
    margin-top: 1.25rem;
}
form{
    padding: 2vh 0;
}
select{
    border: 1px solid rgba(0, 0, 0, 0.137);
    padding: 1.5vh 1vh;
    margin-bottom: 4vh;
    outline: none;
    width: 100%;
    background-color: rgb(247, 247, 247);
}
input{
    border: 1px solid rgba(0, 0, 0, 0.137);
    padding: 1vh;
    margin-bottom: 4vh;
    outline: none;
    width: 100%;
    background-color: rgb(247, 247, 247);
}
input:focus::-webkit-input-placeholder
{
      color:transparent;
}
.btn{
    background-color: #000;
    border-color: #000;
    color: white;
    width: 100%;
    font-size: 0.7rem;
    margin-top: 4vh;
    padding: 1vh;
    border-radius: 0;
}
.btn:focus{
    box-shadow: none;
    outline: none;
    box-shadow: none;
    color: white;
    -webkit-box-shadow: none;
    
    transition: none; 
}
.btn:hover{
    color: white;
}
a{
    color: black; 
}
a:hover{
    color: black;
    text-decoration: none;
}
 #code{
    background-image: linear-gradient(to left, rgba(255, 255, 255, 0.253) , rgba(255, 255, 255, 0.185)), url("https://img.icons8.com/small/16/000000/long-arrow-right.png");
    background-repeat: no-repeat;
    background-position-x: 95%;
    background-position-y: center;
}
    </style>
</head>
<body>
   
<div class="card" id="ajax_table"   >
            <div class="row">
                <div class="col-md-8 cart">
                    <div class="title">
                        <div class="row">
                            <div class="col"><h4><b>Shopping Cart</b></h4></div>
                            <div class="col align-self-center text-right text-muted"><?php echo $quantity?> items</div>
                        </div>
                        <div class="row mt-5">
                            <div class=""><h6>Product Name &amp; Details</h6></div>
                            <div class="" style="margin-left: 90px;"><h6>Price</h6></div>
                            <div class=""style="margin-left: 80px;"><h6>Quantity</h6></div>
                            <div class="" style="margin-left: 70px;"><h6>Total</h6></div>
                            <div class="col"style="margin-left: 130px;"><h6>Remove</h6></div>
                            
                        </div>
                    </div>  
                     <?php 
                     $total=0;
                   $g_total=0;
                        $stmt=$admin->ret("SELECT * FROM  `cart` INNER JOIN   `product` ON product.pid=cart.pid ");
                        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                            $price=$row['product_price'];
                             $quantity=$row['quantity'];
                             $pstock = $row['product_stock'];
                            $total=$price*$quantity;
                            $g_total=$g_total+$total;
                            ?>  
                    <div class="row border-top border-bottom">
                        
                        <div class="row main align-items-center">
                           
                            <div class="col-2"><img class="img-fluid" src="../admin/controller/<?php echo $row['product_img']?>" style="width: 200px;height: 100px;"></div>
                            <div class="col">
                               
                                <div class="row"><?php echo $row['pname']?></div>
                            </div>
                            <div class="col">
                            <div class="col"><?php echo $row['product_price']?></div>
                            </div>
                            <div class="col">
                                <?php if ($row['quantity'] > 1 ) { ?>
                        <button onclick="decrement(<?php echo $row['cartid']; ?>)" type="button"  class="minus"><i class="fa fa-minus" aria-hidden="true"></i>
                        </button> <?php } ?>
                    <?php echo $row['quantity'] ?>
                    <?php if($quantity < $pstock){ ?>
                        
                <button onclick="increment(<?php echo $row['cartid']; ?>)" type="button"  class="plus"><i class="fa fa-plus" aria-hidden="true"></i></button>
                <?php } 
                else{ ?>
                    Out of stock
                  <?php
                }
                ?>
                            </div>
                            <div class="col">
                            <div class="col"><?php echo $total?></div>
                            </div>
                            <div class="col">
                            <div class=""style="margin-left: 70px;"><a href="controller/deletecart.php?cusid=<?php echo $row['cartid']?>"><i class="fa fa-times fa-2x"  aria-hidden="true"></i></a></div>
                            </div>
                            
                        </div>
                        
                    </div>
                   <?php } ?>
                   
                    <div class="back-to-shop"><a href="shop.php"><button class="btn btn-primary"> <i class="fa fa-arrow-left" aria-hidden="true"></i> Back to shop</button></a></div>
                </div>
               
                <div class="col-md-4 summary text-red">
                    <div><h5><b>Summary</b></h5></div>
                    <hr>
                  
                    <div class="row">
                        <div class="col" style="padding-left:0;">ITEMS <?php echo $quantity?></div>
                        <div class="col text-right"><?php echo $g_total?></div>
                    </div>
                   
                    <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                        <div class="col">TOTAL PRICE</div>
                        <div class="col text-right"><?php echo $g_total?></div>
                    </div>
                    <?php 
                    $stmt3=$admin->ret("SELECT * FROM `cart` WHERE `cid`='$cus_id'");
                    $row3=$stmt3->fetch(PDO::FETCH_ASSOC);
                    if($stmt3->rowCount()>0){
                    ?>
                    <a href="checkout.php?cus_id=<?php echo $cus_id?>"><buttton class="btn btn-primary">CHECKOUT</button></a>
                    <?php } else { ?>
                            <h5 style="color:red;">cart is full empty</h5>
                        <?php } ?>
                </div>
            </div>
            
        </div>
    </div> 
    <!--ajax increment -->
    <script>
        function increment(vcart_id) { //getting from onclick function -can use any variable
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                   
                    document.getElementById("ajax_table").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "quantity.php?cart_id_increment=" + vcart_id, true);
            xmlhttp.send();
        }
    </script>
    <script>
        function decrement(vcart_id) { //getting from onclick function -can use any variable


            
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    //table id
                   
                    document.getElementById("ajax_table").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "quantity.php?cart_id_decrement=" + vcart_id, true);
            xmlhttp.send();
        }
    </script>
  
</body>
</html>