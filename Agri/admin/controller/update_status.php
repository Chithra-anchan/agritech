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
    echo "<script>alert('Order Canceled');window.location='../html/viewOrderDetails.php';</script>";
}
if(isset($_GET['Picked_by_courier'])){
    $unid = $_GET['Picked_by_courier'];
    $r_id = $_GET['r_id'];
    $stmt=$admin->cud("UPDATE `order1` SET `or_status`='Picked by courier' WHERE `unid`='$unid'  and `cusid`='$r_id'",'UPDATED');
    echo "<script>alert('Picked By Courier');window.location='../html/viewOrderDetails.php';</script>";
}
if(isset($_GET['On_the_way'])){
    $unid = $_GET['On_the_way'];
    $r_id = $_GET['r_id'];
    $stmt=$admin->cud("UPDATE `order1` SET `or_status`='On the way' WHERE `unid`='$unid'  and `cusid`='$r_id'",'UPDATED');
    echo "<script>alert('On The Way');window.location='../html/viewOrderDetails.php';</script>";
}
if(isset($_GET['Delivered'])){
    $unid = $_GET['Delivered'];
    $r_id = $_GET['r_id'];
    $stmt=$admin->cud("UPDATE `order1` SET `or_status`='Delivered' WHERE `unid`='$unid'  and `cusid`='$r_id'",'UPDATED');
    echo "<script>alert('Delivered');window.location='../html/viewOrderDetails.php';</script>";
}

?>