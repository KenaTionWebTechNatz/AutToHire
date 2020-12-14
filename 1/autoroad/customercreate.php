<?php
// Include config file
require_once "customerconfig.php";
 
// Define variables and initialize with empty values
$name = $email =$phone = $location = $duration = $carname = $carplateno =  $payment = "";
$name_err = $email_err = $phone_err = $location_err = $duration_err = $carname_err = $carplateno_err = $payment_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
// Validate email
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter a email.";     
    } else{
        $email = $input_email;
    }
    
    // Validate phone
    $input_phone = trim($_POST["phone"]);
    if(empty($input_phone)){
        $phone_err = "Please enter a phone number.";     
    } else{
        $phone = $input_phone;
    }

    // Validate location
    $input_location= trim($_POST["location"]);
    if(empty($input_location)){
        $location_err = "Please enter a location.";     
    } else{
        $location = $input_location;
    }

     // Validate  duration
    $input_duration= trim($_POST["duration"]);
    if(empty($input_duration)){
        $duration_err = "Please state the duration .";     
    } else{
        $duration = $input_duration;
    }

   
    
    // Validate carname
    $input_carname = trim($_POST["carname"]);
    if(empty($input_carname)){
        $carname_err = "Please enter the  Carname.";     
    } else{
        $carname = $input_carname;
    }

   

    // Validate  carplateno
    $input_carplateno = trim($_POST["carplateno"]);
    if(empty($input_carplateno)){
        $carplateno_err = "Please enter the carplateno .";     
    } else{
        $carplateno = $input_carplateno;
    }



    // Validate  payment
    $input_payment = trim($_POST["payment"]);
    if(empty($input_payment)){
        $payment_err = "Please choose a means of payment .";     
    } else{
        $payment = $input_payment;
    }


    // Check input errors before inserting in database
     if(empty($name_err) && empty($email_err) && empty($phone_err) && empty($location_err) && empty($duration_err) && empty($carname_err)&& empty($carplateno_err) && empty($payment_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO CarHireDetails (name,email, phone,location,duration,carname,carplateno,payment) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssss", $param_name, $param_email, $param_phone, $param_location, $param_duration,$param_carname,$param_carplateno,$param_payment);
            
            // Set parameters
            $param_name = $name;
            $param_email = $email;
            $param_phone = $phone;
            $param_location = $location;
            $param_duration=$duration;
            $param_carname=$carname;
            $param_carplateno = $carplateno;
            $param_payment = $payment;

            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: customerhome.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
         //mysqli_close($stmt);
    }
    
      // Close connection
        //mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>AutoHire Customer Create Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
  <link rel="stylesheet" href="css/animate.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">

  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/ionicons.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="css/jquery.timepicker.css">


  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/icomoon.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.html">Auto<span>Hire</span></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item "><a href="index.html" class="nav-link">Home</a></li>
          <li class="nav-item "><a href="customercreate.php" class="nav-link">AuToHire Create</a></li>
          <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
          <li class="nav-item"><a href="pricing.html" class="nav-link">Prices</a></li>
          <li class="nav-item"><a href="car.html" class="nav-link">Rent a Car</a></li>
          <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- END nav -->

  <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/Mercedes/brabus_700_widestar_by_fostla_de_5k-1280x720.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
        <div class="col-md-9 ftco-animate pb-5">
          <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Sign Up<i class="ion-ios-arrow-forward"></i></span></p>
          <h1 class="mb-3 bread">Hire a car today at AutoHire</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section contact-section">
    <div class="container">
    
      <div class="row d-flex mb-5 contact-info justify-content-center">
     
   
          
        <div class="col-md-8">
            
          <div class="row mb-5">
              
            <div class="col-md-4 text-center py-4">
              <div class="icon">
                <span class="icon-map-o"></span>
              </div>
              <p><span>Address:</span></p>
            </div>
            <div class="col-md-4 text-center border-height py-4">
              <div class="icon">
                <span class="icon-mobile-phone"></span>
              </div>
              <p><span>Phone:</span> <a href="tel://1234567920"></a></p>
            </div>
            <div class="col-md-4 text-center py-4">
              <div class="icon">
                <span class="icon-envelope-o"></span>
              </div>
              <p><span>Email:</span> <a href="mailto:info@yoursite.com"></a></p>
            </div>
          </div>
        </div>
      </div>

     
      <div class="row block-9 justify-content-center mb-5">
        <div class="col-md-8 mb-md-5">
          <h2 class="text-center">Hire a car Today at<br>AutoHire</h2>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Full Names</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>Email Address</label>
                            <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                            <span class="help-block"><?php echo $email_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>">
                            <label>Phone Number</label>
                            <input type="text" name="phone" class="form-control" value="<?php echo $phone; ?>">
                            <span class="help-block"><?php echo $phone_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($location_err)) ? 'has-error' : ''; ?>">
                            <label>Location</label>
                            <!--<input type="text" name="location" class="form-control" value="<?php echo $location; ?>">-->
                            <select class="form-control" name = "location" >
                            
                            <option option = "" ></option>
                            <option option = "Milimani" >Milimani</option>
                            <option option = "Langata" >Langata</option>
                            <option option = "Karen" >Karen</option>
                            <option option = "Runda" >Runda</option>
                            <option option = "Kitengela" >Kitengela</option>
                            <option option = "Juja" >Juja</option>
                            <option option = "Rongai" >Rongai</option>
                            <option option = "Kilimani" >Kilimani</option>
                            <option option = "Roysambu" >Roysambu</option>
                           

               </select>
                            <span class="help-block"><?php echo $location_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($duration_err)) ? 'has-error' : ''; ?>">
                            <label>Rent Duration</label>
                            <!--<input type="text" name="duration" class="form-control" value="<?php echo $duration; ?>">-->
                               <select class="form-control" name = "duration" >
                            
                            <option option = "" ></option>
                            <option option = "24hrs" >24hrs</option>
                            <option option = "3 days" >3 days</option>
                            <option option = "1 week" >1 week</option>
                            <option option = "1 month" >1 month</option>
                            <option option = "3 months" >3 months</option>
                            <option option = "6 months" >6 months</option>
                            <option option = "1 year" >1 year </option>
                            <option option = "2 years" >2 years</option>
                          

                          </select>
                            <span class="help-block"><?php echo $duration_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($carname_err)) ? 'has-error' : ''; ?>">
                            <label>Name of Car</label>
                            <input type="text" name="carname" class="form-control" value="<?php echo $carname; ?>">
                            <span class="help-block"><?php echo $carname_err;?></span>
                        </div>
                        
                         <div class="form-group <?php echo (!empty($carplateno_err)) ? 'has-error' : ''; ?>">
                            <label>CarPlate Number</label>

                     <input type="text" name="carplateno" class="form-control" value="<?php echo $carplateno; ?>">
                        <span class="help-block"><?php echo $carplateno_err;?></span>
                        </div>

                        
                       
                         <div class="form-group <?php echo (!empty($payment_err)) ? 'has-error' : ''; ?>">
                            <label>Means of Payment</label>
                            <!--<input type="text" name="payment" class="form-control" value="<?php echo $payment; ?>">-->
                             <select class="form-control" name = "payment" >
                            
                            <option option = "" ></option>
                            <option option = "Cash" >Cash</option>
                            <option option = "Mpesa" >Mpesa</option>
                            <option option = "Paypal" >Paypal</option>
                            <option option = "Visa" >Visa</option>
                           

               </select>
                            <span class="help-block"><?php echo $payment_err;?></span>
                        </div>
                        
                        <center><input type="submit" class="btn btn-primary" value="Submit"></center>
                        <br>
                        <br>
                        <center><input type="submit" class="btn btn-primary" value="Cancel"></center>
                        <center><a href="directorwelcome.php" class="btn btn-default">Cancel</a></center>
                    </form>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-10">
          <div id="map" class="bg-white"></div>
        </div>
      </div>
    </div>
  </section>

  <footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">About Autoroad</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
              <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4 ml-md-5">
            <h2 class="ftco-heading-2">Information</h2>
            <ul class="list-unstyled">
              <li><a href="#" class="py-2 d-block">About</a></li>
              <li><a href="#" class="py-2 d-block">Services</a></li>
              <li><a href="#" class="py-2 d-block">Term and Conditions</a></li>
              <li><a href="#" class="py-2 d-block">Best Price Guarantee</a></li>
              <li><a href="#" class="py-2 d-block">Privacy &amp; Cookies Policy</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Customer Support</h2>
            <ul class="list-unstyled">
              <li><a href="#" class="py-2 d-block">FAQ</a></li>
              <li><a href="#" class="py-2 d-block">Payment Option</a></li>
              <li><a href="#" class="py-2 d-block">Booking Tips</a></li>
              <li><a href="#" class="py-2 d-block">How it works</a></li>
              <li><a href="#" class="py-2 d-block">Contact Us</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Have a Questions?</h2>
            <div class="block-23 mb-3">
              <ul>
                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">

          <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>
              document.write(new Date().getFullYear());
            </script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
        </div>
      </div>
    </div>
  </footer>



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>-->
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

</body>

</html>