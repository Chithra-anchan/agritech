<?php
include '../../config.php';
$admin=new Admin();

if(isset($_POST['add'])){
  
  $uname=$_POST['username'];
  $uemail=$_POST['email'];
  $upass=$_POST['password'];
 
 
$stmt=$admin->cud("INSERT INTO `user`(`u_name`,`u_email`,`u_pass`)
VALUES('$uname','$uemail','$upass')","inserted");

echo "<script>alert('Registered successfully'); 
window.location.href='../login.php';
</script>";
}
?>