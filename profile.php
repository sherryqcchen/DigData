<?php
/**
 * Tutorial: PHP Login Registration system
 *
 * Page : Profile
 */

// Start Session
session_start();

// check user login
if(empty($_SESSION['user_id']))
{
    header("Location: login.php");
}

// Database connection
//require __DIR__ . '/database.php';
//$db = DB();

// Application library ( with DemoLib class )
require __DIR__ . '/lib/library.php';
$app = new DemoLib();

$user = $app->UserDetails($_SESSION['user_id']); // get user details

if (!empty($_POST['btnUpload'])) {
        $user_id = $app->Upload($_FILES['uploaded_file'],$_SESSION['user_id']);
}


?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Personal Profile</title>

		<link rel="stylesheet" href="css/idangerous.swiper.css">
   		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style_ppp.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="css/owl.carousel.css" type="text/css" media="screen">
      <link href="css/owl.theme.css" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="css/cm-overlay.css" />

		<link rel="stylesheet" type="text/css" href="css/JQfiles-li/default.css">
		<link rel="stylesheet" type="text/css" media="screen" href="css/JQfiles-li/als_demo.css" />
		<link href="http://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>

	 <script src="js/jquery-2.1.1.min.js"></script>
	   <script src="js/bootstrap.min.js"></script>
   <!--UP-RIGHT lOG-IN DROPDOWN LIST-->
<style>
img {
    max-width: 145px;
    height: 145px;
    padding-left:25px;
    padding-top:25px;
    padding-bottom: -50px;
}
</style>
	</head>

	<body data-spy="scroll" data-target="#myScrollspy">

		<div class="container">
			<div class="row">
<!--Navgiation bar-->
				<nav class="navbar navbar-default">
				  <div class="container-fluid">
				    <!-- Brand and toggle get grouped for better mobile display -->
				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
				      <a class="navbar-brand" href="index.php">ARM</a>
				    </div>

				    <!-- Collect the nav links, forms, and other content for toggling -->
				    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				      <ul class="nav navbar-nav">
				        <li><a href="index.php">Home </a></li>
				        <li><a href="Directory_1.php">Directory</a></li>
				        <li><a href="Forum.php">Forum</a></li>
				      </ul>
				      <ul class="nav navbar-nav navbar-right">
				      	<li class="dropdown">
				          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <span class="caret"></span></a>
        <!--User Action-->
				          <ul class="dropdown-menu">
				            <li><a href="profile.php">Me</a></li>
				            <li><a href="logout.php">Logout</a></li>
				          </ul>
				       </li>
				      </ul>
				    </div><!-- /.navbar-collapse -->
				  </div><!-- /.container-fluid -->
				</nav>
		  </div>
		</div>
<!--personal info container-->
		<div class="banner" id="home">
		  <div class="container">
			<div class="row">
				<div class="col-md-offset-2 col-md-10 col-lg-offset-0 col-lg-12">
					<div class="well profile">

						<div class="agile-img">
              <img src="uploads/<?php echo $user->uploaded_file ?>"/>
						</div>
						<div class="w3l-banner-grids">
							<div class="col-md-8 w3ls-banner-right">

                                      <div class="banner-right-info">


									<div class="w3ls-banner-left-info">
										<h3>Research Interests</h3>
											<p><?php echo $user->interests ?></p>

                </div>
									<div class="w3ls-banner-left-info">
										<h3>Current research projects</h3>
											<p><?php echo $user->projects ?></p>
                                        <div class="w3-button-info m_nav_item">
                                        <a class="hvr-sweep-to-bottom" href="additional.php">Add Information about interests and projects</a>
                  </div>

                </div>
								</div>


								<div class="clearfix"> </div>
								<div class="w3-button">
									<div class="w3-button-info m_nav_item">
                      <button class="btn btn-success" data-toggle="modal" data-target="#add_new_record_modal">Upload Image</button>
										<a class="hvr-sweep-to-bottom" href="logout.php">Log out</a>
									</div>
								</div>
							</div>
							<div class="col-md-4 w3ls-banner-left">
								<div class="w3ls-banner-left-info">
									<h4>Name</h4>
									<p><?php echo $user->name ?> <?php echo $user->surname ?></p>
								</div>
                <div class="w3ls-banner-left-info">
                  <h4>Occupation</h4>
                  <p><?php echo $user->occupation ?></p>
                </div>
								<div class="w3ls-banner-left-info">
									<h4>Sex</h4>
									<p><?php echo $user->gender ?></p>
								</div>
								<div class="w3ls-banner-left-info">
									<h4>Address</h4>
									<p>
										<?php echo $user->address ?><br>United Kingdom
									</p>
								</div>
								<div class="w3ls-banner-left-info">
									<h4>Email Address</h4>
									<p><?php echo $user->email ?></p>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
			</div>
		  </div>
		</div>
<!-- Modal - Add New Record/User -->
<div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Your Profile Image</h4>
            </div>
            <div class="modal-body">
  <form enctype="multipart/form-data" action="upload.php" method="POST">
    <p>Upload your file</p>
    <input type="file" name="uploaded_file"></input><br />

            <div class="modal-footer">
                <div class="form-group">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" name="btnUpload" value="Upload">Upload</button>
            </div>
                </div>

                                        </form>
        </div>
    </div>
</div>
      </div>
		<script src="js/bars.js"></script>
		<script src="js/owl.carousel.js"></script>

	</body>
</html>
