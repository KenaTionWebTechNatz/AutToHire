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

    <title>AutoHire</title>
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
  
  
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="styling.css">
    
    
    <!--[if lt IE 9]>
      <script src="js/vendor/html5shiv.min.js"></script>
      <script src="js/vendor/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>

   <style type="text/css">
        body{ font: 14px Century Gothic; text-align: center; }
        .wrapper{ width: 1200px; padding: 20px; margin-left: 70px; margin-top: 70px; color: #000000; background-color: #ffffff; opacity: 0.8; border-radius: 20px; }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>

<div class="hero-wrap" style="background-image: url('images/Bugatti/bugatti_chiron_super_sport_300__prototype_2019_4k_8k-1280x720.jpg');"  data-stellar-background-ratio="0.5">
   
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Auto<span>Hire</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
              <li class="nav-item "><a href="index.html" class="nav-link">Home</a></li>
              <li class="nav-item active"><a href="customerupdate.php" class="nav-link">AuToHire Update</a></li>
	          <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
            <li class="nav-item"><a href="signup.html" class="nav-link">Sign Up</a></li>
            <li class="nav-item"><a href="login.html" class="nav-link">Log In</a></li>
	          <li class="nav-item"><a href="pricing.html" class="nav-link">Rent-Prices</a></li>
	          <li class="nav-item"><a href="car.html" class="nav-link">Car-Rent</a></li>
	          <!--<li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>-->
	          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
	        </ul>
	      </div>
	    </div>
      </nav>
      

      
     
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update  Driver Record</h2>
                    </div>
                    
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
                        
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <center><a href="customerwelcome.php" class="btn btn-default">Cancel</a></center>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>