<?php
include '../../config.php';
$admin=new Admin();

if(isset($_POST['add'])){
  
  $c_name=$_POST['cname'];
 
 
$stmt=$admin->cud("INSERT INTO `category`(`cname`)
VALUES('$c_name')","inserted");

echo "<script>alert('Category added successfully');
window.location='../html/addCategory.php'; </script>";
}
?>