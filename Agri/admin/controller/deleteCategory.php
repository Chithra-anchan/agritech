<?php
require_once '../../config.php';
$admin = new Admin();

$id =$_GET['id'];
{

$stmt=$admin->cud("DELETE FROM `category` WHERE `cid`=".$id,"Deleted");

echo"<script>
     alert('category deleted succesfully');
     window.location='../html/viewCategory.php';
     </script>";
}