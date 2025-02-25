<?php
include '../../config.php';
$admin=new Admin();

if(isset($_POST['add'])){
  
  $p_name=$_POST['pname'];
  $p_description=$_POST['pdescription'];
  $p_price=$_POST['price'];
  $p_stock=$_POST['pstock'];
  $c_id=$_POST['acttype'];
  $pid=$_POST['pid'];

  $target="upload/";

  $imagename="upload/".basename($_FILES['img']['name']);
  move_uploaded_file($_FILES['img']['tmp_name'],$imagename);
  
$stmt=$admin->cud("UPDATE `product` SET `pname`='$p_name',`product_img`='$imagename',`product_description`='$p_description',
`product_price`='$p_price',`product_stock`='$p_stock',`cid`='$c_id' WHERE `pid`='$pid'","updated");

echo "<script>alert('Updated Product successfully');
window.location='../html/viewProduct.php';
</script>";
}
?>