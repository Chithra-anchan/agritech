<?php
require_once '../../config.php';
$admin = new Admin();

$id =$_GET['id'];
{

$stmt=$admin->cud("DELETE FROM `product` WHERE `pid`=".$id,"Deleted");

echo"<script>
     alert('Product deleted succesfully');
     window.location='../html/viewProduct.php';
     </script>";
}