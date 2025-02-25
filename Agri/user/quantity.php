<?php 
include '../config.php';
$admin=new Admin();
$cus_id=$_SESSION['u_id'];
$stmt1=$admin->ret("SELECT COUNT(*) FROM `cart` ");
$row1=$stmt1->fetch(PDO::FETCH_ASSOC);
$quantity=implode($row1);

if(isset($_GET['cart_id_increment'])){
    $cart_id=$_GET['cart_id_increment'];
    $stmt=$admin->ret("SELECT * FROM `cart` INNER JOIN `product` ON product.pid=cart.pid WHERE  `cartid`='$cart_id' AND cart.cid='$cus_id'");
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    $item_price = $row['product_price'];
    $old_quantity = $row['quantity'];
    $new_quantity = $old_quantity + 1;
    $total = $item_price * $new_quantity;

    $stmt1=$admin->cud("UPDATE `cart` SET `quantity`='$new_quantity' WHERE  `cartid`= '$cart_id' AND cart.cid='$cus_id'",'updated');
}

if(isset($_GET['cart_id_decrement'])){
    $cart_id=$_GET['cart_id_decrement'];
    $stmt=$admin->ret("SELECT * FROM `cart` INNER JOIN `product` ON product.pid=cart.pid WHERE  `cartid`='$cart_id' AND cart.cid='$cus_id'");
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    $item_price = $row['product_price'];
    $old_quantity = $row['quantity'];
    $new_quantity = $old_quantity -1;
    $total = $item_price * $new_quantity;

    $stmt1=$admin->cud("UPDATE `cart` SET `quantity`='$new_quantity' WHERE  `cartid`='$cart_id' AND cart.cid='$cus_id'",'updated');
}
?>


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
                             $quantity1=$row['quantity'];
                             $pstock = $row['product_stock'];
                            $total=$price*$quantity1;
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
                    <?php if($quantity1 < $pstock){ ?>
                        
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