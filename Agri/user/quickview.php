<?php 
include '../config.php';
$admin=new Admin();
$id=$_GET['id'];
$stmt=$admin->ret("SELECT * FROM `product`WHERE `pid`='$id'");
$row=$stmt->fetch(PDO::FETCH_ASSOC)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="quick.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
</head>
<body  style="background:lightblue; background-repeat: repeat-null;">
<div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <div class="images p-3">
                            <div class="text-center p-4"> <img id="main-image" src="../admin/controller/<?php echo $row['product_img'];?>" height="250" width="350" /> </div>
                    
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center"> </div> <i class="fa fa-shopping-cart text-muted"></i>
                            </div>
                            <div class="mt-4 mb-3"> 
                                <h5 class="text-uppercase"><?php echo $row['pname'];?></h5>
                                <div class="price d-flex flex-row align-items-center"> <span class="act-price">₹<?php echo $row['product_price'];?></span>
                                    
                                </div>
                            </div>
                            <p class="about"  style="white-space:pre-wrap;"><?php echo $row['product_description'];?></p>
                            <p class="about"><span style="color:blue;font-weight:500;">PRODUCT STOCK</span> <span style="font-weight: bold;"><?php echo $row['product_stock'];?></span></p>
                           
                            <div class="cart mt-4 align-items-center"><a href="./controller/cart.php?pid=<?php echo $row['pid'];?>"> <button class="btn btn-danger text-uppercase mr-2 px-4">Add to cart</button> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function change_image(image){

var container = document.getElementById("main-image");

container.src = image.src;
}



document.addEventListener("DOMContentLoaded", function(event) {







});
    </script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>
