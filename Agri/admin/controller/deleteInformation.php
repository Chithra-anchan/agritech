<?php
require_once '../../config.php';
$admin = new Admin();

$id =$_GET['id'];
{

$stmt=$admin->cud("DELETE FROM `information` WHERE `info_id`=".$id,"Deleted");

echo"<script>
     alert('Information deleted succesfully');
     window.location='../html/viewinformation.php';
     </script>";
}