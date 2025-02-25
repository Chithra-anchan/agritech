<?php 
include '../../config.php';
$admin=new Admin();
if(isset($_SESSION['u_id'])){
$cus_id=$_SESSION['u_id'];

if(isset($_GET['pid'])){
  
    $p_id=$_GET['pid'];
$cus_id=$_SESSION['u_id'];

   $quantity=1;
   $stmt=$admin->ret("SELECT * FROM `product` WHERE `pid`='$p_id'");
   $p_row=$stmt->fetch(PDO::FETCH_ASSOC);
//    $num=$stmt->rowCount();
   $p_price=$p_row['product_price'];
   $cart_total=$quantity * $p_price;

   $stmt1=$admin->ret("SELECT * FROM `cart` WHERE `cid`='$cus_id' AND `pid`='$p_id'");
   $cart_row=$stmt1->fetch(PDO::FETCH_ASSOC);
   $num=$stmt1->rowCount();
   if($num>0){
    $quantity_cart=$cart_row['quantity']+1;
    $stmt2=$admin->cud("UPDATE `cart` SET `quantity`='$quantity_cart' WHERE `cid`='$cus_id' AND `pid`='$p_id'",'Updated');
    echo "<script>alert('item added to cart');window.location.href='../cart1.php';</script>";
   }else{
    $stmt3=$admin->cud("INSERT INTO `cart` (`cid`,`pid`,`quantity`,`date`)VALUES('$cus_id','$p_id','$quantity',now())",'inserted');
     echo "<script>alert('item added to cart');window.location.href='../cart1.php';</script>";
   }
}
}else{
  echo"<script>
     alert('Please Login To Have Access');
     window.location='../login.php';
     </script>";
}
?>