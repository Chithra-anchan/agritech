<?php
include '../../config.php';
$admin=new Admin();

if(isset($_POST['add'])){
  
  $message=$_POST['description'];
  $title=$_POST['title'];
 

  $imagename="upload/".basename($_FILES['img']['name']);
  move_uploaded_file($_FILES['img']['tmp_name'],$imagename);
  
$stmt=$admin->cud("INSERT INTO `information`(`info_title`,`info_img`,`info_msg`)
VALUES('$title','$imagename','$message')","inserted");
echo "<script>alert('Information Posted successfully');
window.location='../html/addinformation.php'; </script>";
}
?>