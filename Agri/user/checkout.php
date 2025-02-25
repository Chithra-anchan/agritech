<?php
include '../config.php';
$admin = new Admin();
$stmt1 = $admin->ret("SELECT COUNT(*) FROM `cart` ");
$row1 = $stmt1->fetch(PDO::FETCH_ASSOC);
$qantity = implode($row1);
if(isset($_SESSION['u_id'])) {?>
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="">

  <title>Checkout</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="../user/css/check.css">
  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- nice select  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
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

</head>

<body class="sub_page">

  <div class="hero_area mb-5">
    <div class="" style="background-color:black;">
      <?php include 'navbar.php' ?>
    </div>
    <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="https://cdn-icons-png.flaticon.com/128/10069/10069169.png" alt="" width="82" height="82">
        <h2>Checkout form</h2>

      </div>
      <form action="controller/order.php" method="POST"  >
        <div class="row">
          <div class="col-md-4 order-md-2 mb-4 ">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
              <span class="text-muted">Your cart</span>
              <span class="badge badge-secondary badge-pill"><?php echo $qantity ?></span>
            </h4>
            <ul class="list-group mb-3">
              <?php
              $total = 0;
              $garnd_total = 0;
              $stmt = $admin->ret("SELECT * FROM `cart` INNER JOIN `product` ON product.pid=cart.pid ");
              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $price = $row['product_price'];
                $quantity = $row['quantity'];
                $total = $price * $quantity;
                $garnd_total = $garnd_total + $total;
              ?>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                  <div>
                    <h6 class="my-0"><?php echo $row['pname'] ?></h6>
                    <small class="text-muted">Quantity: <?php echo $row['quantity'] ?></small>
                  </div>
                  <span class="text-muted">₹ <?php echo $total ?></span>
                </li>
                <?php  } ?>
                <input type="hidden" name="grand_total" value="<?php echo $garnd_total;?>">
              <!-- <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Second product</h6>
            <small class="text-muted">Brief description</small>
          </div>
          <span class="text-muted">$8</span>
        </li> -->
              <!-- <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Third item</h6>
            <small class="text-muted">Brief description</small>
          </div>
          <span class="text-muted">$5</span>
        </li> -->
              <!-- <li class="list-group-item d-flex justify-content-between bg-light">
          <div class="text-success">
            <h6 class="my-0">Promo code</h6>
            <small>EXAMPLECODE</small>
          </div>
          <span class="text-success">-$5</span>
        </li> -->
              <li class="list-group-item d-flex justify-content-between">
                <span>Total (RS)</span>
                <strong>₹ <?php echo $garnd_total ?></strong>
              </li>
            </ul>

          </div>

          <div class="col-md-8 order-md-1 border">
            <h4 class="mb-3">Billing address</h4>
            <!-- <form > -->
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" class="form-control" id="firstName" placeholder="" value="" required name="fname" required>
                <div class="invalid-feedback" >
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" id="lastName" placeholder="" value="" required name="lname">
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>

            <!-- <div class="mb-3">
          <label for="username">Username</label>
          <div class="input-group">
            
            <input type="text" class="form-control" id="username" placeholder="Username" required>
            <div class="invalid-feedback" style="width: 100%;">
              Your username is required.
            </div>
          </div>
        </div> -->

            <div class="mb-3">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" placeholder="" required name="email" required/>
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>
            <div class="mb-3">
              <label for="email">Phone</label>
              <input type="text" class="form-control" id="email" placeholder="" required name="phone" pattern="[1-9]{1}[0-9]{9}" title="Please enter 10 digit phone number and starting number should not be 0" required/>
              <div class="invalid-feedback" >
                Please enter a valid Phone NUmber.
              </div>
            </div>

            <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address" placeholder="" required name="address" required/>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>



            <div class="row">
              <!-- <div class="col-md-5 mb-3">
            <label for="country">Country</label>
            <input type="text" class="form-control" id="country" placeholder="" required >
            <select class="custom-select d-block w-100" id="country" required>
              <option value="">Choose...</option>
              <option>United States</option>
            </select>
            <div class="invalid-feedback">
              Please select a valid country.
            </div>
          </div> -->
              <div class="col-md-4 mb-3">
                <label for="state">State</label>
                <input type="text" class="form-control" id="state" placeholder="" required name="state" required/>
                <!-- <select class="custom-select d-block w-100" id="state" required>
              <option value="">Choose...</option>
              <option>California</option>
            </select> -->
                <div class="invalid-feedback">
                  Please provide a valid state.
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="zip">Pincode</label>
                <input type="number" class="form-control" id="zip" placeholder="" required name="zip" required/>
                <div class="invalid-feedback">
                  Zip code required.
                </div>
              </div>
            </div>


            <hr class="mb-4">

            <h4 class="mb-3">Payment</h4>

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" value="upi" id="upi" onclick="cardform(this.value)" required>
                <label class="custom-control-label" for="credit">UPI/Netbanking</label>
                <div style="display: none;" id="upi_div">
                  <b>scan and pay</b>
                  <img src="https://th.bing.com/th/id/OIP.-I8JMVhpM31DO8sqEGpocgHaHa?w=187&h=187&c=7&r=0&o=5&dpr=1.3&pid=1.7">

                  <!-- transaction id input form-->
                  <div class="billing-address-form">
                    <p><input type="text" placeholder="Enter Transaction id" name="trans_id"></p>
                  </div>
                </div>
              </div>
              <div class="custom-control custom-radio">
                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" value="cash" id="cash" onclick="cardform(this.value)" required>
                <label class="custom-control-label" for="debit">Cash on Delivery</label>
                <div style="display: none;" id="cash_div">
                  <b>pay when your receive item</b>
                </div>
              </div>
              <div class="custom-control custom-radio">
                <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" value="card" id="card" onclick="cardform(this.value)"required>
                <label class="custom-control-label" for="paypal">Debit card/Credit card</label>
                <div style="display: none;" id="card_div">
                  <!-- 🔴 card paymen  body starts -->
                  <div class="container d-flex  main">
                    <div class="card">
                      <!-- <div class="d-flex justify-content-between px-3 pt-4"> <span class="pay">Pay amount</span>
                                                                <div class="amount">
                                                                    <div class="inner"><span class="dollar">$</span><span class="total">32</span></div>
                                                                </div>
                                                            </div> -->

                      <!-- <form action=""> -->
                      <div class="px-3 pt-3">
                        <label for="card number" class="d-flex justify-content-between"><span class="labeltxt">CARD NAME</span></label>
                        <input type="text" class="form-control inputtxt" id="cc-name" name="card_name" placeholder="CARD NAME">
                        <div class="invalid-feedback">
                          Name on card is required
                        </div>
                      </div>
                      <div class="px-3 pt-3">
                        <label for="card number" class="d-flex justify-content-between"><span class="labeltxt">CARD NUMBER</span><img src="https://img.icons8.com/color/48/000000/mastercard-logo.png" width="25" class="image" /></label>
                        <input type="number" class="form-control inputtxt" id="card_no" name="card_no" placeholder="0000 0000 0000 0000" minlength="16" maxlength="16">
                        <div class="invalid-feedback">
                          Credit card number is required
                        </div>
                      </div>


                      <div class="d-flex justify-content-between px-3 pt-4">
                        <div><label for="date" class="exptxt"> Expiry </label><input type="number" class="form-control expiry" placeholder="MM / YY" id="card_expiry" name="card_expiry" minlength="5" maxlength="5">
                          <div class="invalid-feedback">
                            Expiration date required
                          </div>
                        </div>
                        <div><label for="cvv" class="cvvtxt">CVV / CVC</label><input type="text" name="cvv" class="form-control cvv" id="exp" minlength="3" maxlength="3">
                          <div class="invalid-feedback">
                            Security code required
                          </div>
                        </div>
                      </div>
                      <div class="d-flex justify-content-between px-3 pt-4 pb-4">
                        <!-- <div><button type="reset" class="btn btn-light cancel">clear</button></div> -->

                        <!-- <div><button type="button" class="btn btn-primary payment">Make Payment</button></div> -->
                        <!-- <div><input type="submit" class="btn btn-primary payment" value="Make Payment"></div> -->
                      </div>
                      <!-- </form> -->
                    </div>
                  </div>
                  <!-- 🔴 card paymen  body ends -->

                </div>
              </div>
            </div>
        
            <hr class="mb-5">
            <button class="btn btn-primary btn-lg btn-block mb-3" type="submit" name="checkout">Continue to checkout</button>

          </div>

        </div>
      </form>
    </div>

  </div>

  <!-- about section -->



  <!-- end about section -->

  <!-- footer section -->
  <?php include 'footer.php' ?>
  <!-- footer section -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script>
    window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')
  </script>
  <script src="https://getbootstrap.com/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
  <script src="https://getbootstrap.com/docs/4.3/examples/checkout/form-validation.js"></script>
  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- isotope js -->
  <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->
  <script>
    function cardform(myvalue) {

      if (myvalue == 'card') { //radio button id
        document.getElementById('card_div').style.display = 'block'; //div id
        document.getElementById('upi_div').style.display = 'none';
        document.getElementById('cash_div').style.display = 'none';
        document.getElementById('cc-name').required = true;
        document.getElementById('card_no').required = true;
        document.getElementById('card_expiry').required = true;
        document.getElementById('exp').required = true;

      } else if (myvalue == 'upi') {
        document.getElementById('card_div').style.display = 'none';
        document.getElementById('upi_div').style.display = 'block';
        document.getElementById('cash_div').style.display = 'none';
        document.getElementById('cc-name').required = false;
        document.getElementById('card_no').required = false;
        document.getElementById('card_expiry').required = false;
        document.getElementById('exp').required = false;

        

      } else {
        document.getElementById('card_div').style.display = 'none';
        document.getElementById('upi_div').style.display = 'none';
        document.getElementById('cash_div').style.display = 'block';
        document.getElementById('cc-name').required =false;
        document.getElementById('card_no').required = false;
        document.getElementById('card_expiry').required = false;
        document.getElementById('exp').required = false;
        

      }

    }
  </script>
  <script>
    (function() {
      'use strict'

      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByTagName('form')

        // Loop over them and prevent submission
        Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault()
              event.stopPropagation()
            }
            form.classList.add('was-validated')
          }, false)
        })
      }, false)
    }())
  </script>
   <?php
}
else { ?>
<h1>Please Login To Have Access</h1>
<a href="index.php" class="btn btn-warning" style="background-color: red">Back</a>
<?php }?>
</body>

</html>