<?php 
include '../../config.php';
$admin=new Admin();
$cid=$_GET['cusid'];
$stmt=$admin->cud("DELETE  FROM `cart` WHERE  `cartid`='$cid'",'DELETED');
echo "<script>alert('Item deleted Successfully');window.location='../cart1.php';</script>";
?>