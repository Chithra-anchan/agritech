<?php 
include '../../config.php';
$admin=new Admin();
if(isset($_GET['update_order_status'])){
    $unid = $_GET['update_order_status'];
    $r_id = $_GET['r_id'];
    echo $r_id;
    $stmt=$admin->cud("UPDATE `order1` SET `or_status` ='order_accepted' WHERE `unid`='$unid'  and `cusid`='$r_id'",'UPDATED');
    echo "<script>alert('Order Accepted');window.location='../html/viewOrderDetails.php';</script>";
}
if(isset($_GET['order_cancel'])){
    $unid = $_GET['order_cancel'];
    $r_id = $_GET['r_id'];
    $stmt=$admin->cud("UPDATE `order1` SET `or_status`='order_canceled' WHERE `unid`='$unid'  and `cusid`='$r_id'",'UPDATED');
    echo "<script>alert('Order Canceled');window.location='../order_status.php';</script>";
}


?>