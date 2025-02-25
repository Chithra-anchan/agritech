<?php 
include '../config.php';
$admin=new Admin();
$rid=$_SESSION['u_id'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>feedback</title>
	<!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.0/mdb.min.css"
  rel="stylesheet"
/>
</head>
<body>
<section class="h-100 h-custom" style="background-image:url('img/bb.jpg');">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-8 col-xl-6">
        <div class="card rounded-3">
         
          <div class="card-body p-4 p-md-5 ">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Feedback</h3>

        <form class="px-4" action="../user/controller/feedback1.php" method='POST'>

              

             <input type="hidden" name="rid" value="<?php echo $rid ?>">
          <p class="text-center"><strong>Your rating:</strong></p>

          <div class="form-check mb-2">
            <input class="form-check-input" type="radio" name="rate" id="radio4Example1" value="Very good" />
            <label class="form-check-label" for="radio4Example1">
              Very good
            </label>
          </div>
          <div class="form-check mb-2">
            <input class="form-check-input" type="radio" name="rate" id="radio4Example2" value="Good" />
            <label class="form-check-label" for="radio4Example2">
              Good
            </label>
          </div>
          <div class="form-check mb-2">
            <input class="form-check-input" type="radio" name="rate" id="radio4Example3" value="Medium" />
            <label class="form-check-label" for="radio4Example3">
              Medium
            </label>
          </div>
          <div class="form-check mb-2">
            <input class="form-check-input" type="radio" name="rate" id="radio4Example4" value="Bad" />
            <label class="form-check-label" for="radio4Example4">
              Bad
            </label>
          </div>
          <div class="form-check mb-2">
            <input class="form-check-input" type="radio" name="rate" id="radio4Example5" value=" Very bad" />
            <label class="form-check-label" for="radio4Example5">
              Very bad
            </label>
          </div>
<p class="text-center"><strong>What could we improve?</strong></p>

          <!-- Message input -->
          <div class="form-outline mb-4">
            <textarea class="form-control" id="form4Example4" rows="4"  name='msg'></textarea>
            <label class="form-label" for="form4Example4">Your feedback</label>
          </div>
    
        
               

              
            

        <button type="submit" name='feed' class="btn btn-primary">Submit</button>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.0/mdb.min.js"
></script>
</body>
</html>