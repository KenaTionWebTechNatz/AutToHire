<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "customerconfig.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM CarHireDetails WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $name = $row["name"];
                $email = $row["email"];
                $phone = $row["phone"];
                $location = $row["location"];
                $duration = $row["duration"];
                $carname = $row["carname"];
               $carplateno = $row["carplateno"];
               $payment = $row["payment"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: customererror.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: customerrerror.php");
    exit();
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
              <li class="nav-item active"><a href="customerread.php" class="nav-link">AuToHire Read</a></li>
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
                        <h1>View Driver Record</h1>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <p class="form-control-static"><?php echo $row["name"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <p class="form-control-static"><?php echo $row["email"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <p class="form-control-static"><?php echo $row["phone"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Location</label>
                        <p class="form-control-static"><?php echo $row["location"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Duration</label>
                        <p class="form-control-static"><?php echo $row["duration"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Car Name</label>
                        <p class="form-control-static"><?php echo $row["carname"]; ?></p>
                    </div>
                     <div class="form-group">
                        <label>Car Plate No</label>
                        <p class="form-control-static"><?php echo $row["carplateno"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Means of Payment</label>
                        <p class="form-control-static"><?php echo $row["payment"]; ?></p>
                    </div>
                    <center><p><a href="customerhome.php" class="btn btn-primary">Back</a></p></center>
                    <center><p><a href="index.html" class="btn btn-primary">Home</a></p></center>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>