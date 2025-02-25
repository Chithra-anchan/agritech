<?php 
include '../../config.php';
$admin=new Admin();

$cid=$_SESSION['u_id'];

if(isset($_POST['feed'])){
    $rid=$_POST['rid'];
    $rating=$_POST['rate'];
    $msg=$_POST['msg'];
    $stmt=$admin->cud("INSERT INTO `feedback`(`cusid`,`rating`,`message`,`fdate`)VALUES('$cid','$rating','$msg',now())",'INSERTED');
    echo "<script>alert('Thank you so much for youre valuable Feedback');window.location='../index.php?rid=$rid';</script>";
}
?>