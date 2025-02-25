<?php
include '../../config.php';
$admin=new Admin();

if(isset($_POST['add'])){
  
  $p_name=$_POST['pname'];
  $p_description=$_POST['pdescription'];

  $p_price=$_POST['price'];
  $p_stock=$_POST['pstock'];
  $c_id=$_POST['acttype'];

  $imagename="upload/".basename($_FILES['img']['name']);
  move_uploaded_file($_FILES['img']['tmp_name'],$imagename);
  
$stmt=$admin->cud("INSERT INTO `product`(`pname`,`product_img`,`product_description`,`product_price`,`product_stock`,`cid`)
VALUES('$p_name','$imagename','$p_description','$p_price','$p_stock','$c_id')","inserted");

echo "<script>alert('Product added successfully');
window.location='../html/addproduct.php'; </script>";
}
?>