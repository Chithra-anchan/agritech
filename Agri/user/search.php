<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <style>
      <?php include "css/custom.css"?>
      </style>
<body>


    <!-- Header Section Begin -->
    <?php include 'navbar.php';
          ?>
    <!-- Header End -->

 
<?php
// Establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agri";
$conn = new mysqli($servername, $username, $password, $dbname);

// Retrieve the search query from the form submission
$query = $_GET['query'];

// Perform the search query
$sql = "SELECT * FROM product INNER JOIN `category` ON product.cid=category.cid WHERE pname LIKE '%$query%' OR product_description LIKE '%$query%'";
$result = $conn->query($sql);


// Display the search results
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    ?>




    <div class="col-lg-4 col-sm-6" style="margin-top: 50px;width:350px">
        <div class="product-item product-disc">
            <div class="pi-pic">
                <img style="max-height: 200px;min-height:200px;max-width:200px; min-width:200px;" src="../admin/controller/<?php echo $row['product_img'];?>" alt="">
                <div class="sale pp-sale">Assured</div>
                <div class="icon">
                  <form action="" method="POST"></form>
                    <i class="icon_heart_alt"></i>
                </div>
                <ul>
                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                    <li class="quick-view"><a href="quickview.php?id=<?php echo $row['pid'];?>">+ Quick View</a></li>
                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                </ul>
            </div>
            <div class="pi-text">
                <div class="catagory-name"><?php echo $row['cname'];?></div>
                <a href="#">
                    <h5><?php echo $row['pname'];?></h5>
                </a>
                <div class="product-price">
                    ₹<?php echo $row['product_price'];?>
                    
                </div>
            </div>
        </div>
    </div>


<?php }
  }
 else {
  echo "No results found.";
}

// Close the database connection
$conn->close();
?>
<?php include 'footer.php';
          ?>
</body>
</html>