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

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   		<title>Archaeology</title>
   		<link rel="stylesheet" href="css/idangerous.swiper.css">
        <link rel="stylesheet" href="css/Show.css">

   		<link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery-2.1.1.min.js"></script>
	   <script src="js/bootstrap.min.js"></script>

	    <link rel="stylesheet" type="text/css" href="css/JQfiles-li/CSSreset.min.css" />
		<link rel="stylesheet" type="text/css" href="css/JQfiles-li/default.css">
		<link rel="stylesheet" type="text/css" media="screen" href="css/JQfiles-li/als_demo.css" />

	</head>
	<body data-spy="scroll" data-target="#myScrollspy">

		<div class="container">
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
				      <a class="navbar-brand" href="#">ARM</a>
				    </div>

				    <!-- Collect the nav links, forms, and other content for toggling -->
				    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				      <ul class="nav navbar-nav">
				        <li class="active"><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
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

<!--The introduction picture -->
			   <div class="jumbotron ">
			    	<div class="row">
				    	<div class="col-md-4">
				    	   <img src="img/logo.png" ></img>
				    	</div>
				    	<div class="col-md-8">
				    	   <h1>Hello Archaeology</h1>
								<p><br>
								A web-based open accessed publishing platform that helps researchers efficiently publish, collect, manage,
								investigate and evaluate archaeological related data with an accessible, easy-to-use web presence.
								</p>
                           <p><a class="btn btn-primary btn-lg" href="Directory_1.php" role="button">Start Tour</a></p>
				    	</div>
			       </div>
			   </div>

<!--slide show-->
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
			    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
			  </ol>

        <!-- Wrapper for slides -->
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
		        <ol class="carousel-indicators">
		           <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		           <li data-target="#myCarousel" data-slide-to="1"></li>
		           <li data-target="#myCarousel" data-slide-to="2"></li>
		           <li data-target="#myCarousel" data-slide-to="3"></li>
		           <li data-target="#myCarousel" data-slide-to="4"></li>
		        </ol>
		        <div class="carousel-inner">

		            <div class="item active">
		                <img src="img/HomepagePic1.jpg" alt="" width=100% >
		                <div class="carousel-caption">
		             
		                  <p></p>
		                </div>
		            </div>

		            <div class="item">
		                <img src="img/HomepagePic2.jpg" alt="" width=100%>
		                <div class="carousel-caption">

		                   <p></p>
		                </div>
		            </div>
		            <div class="item">
		            	<img src="img/HomepagePic3.jpg" alt="" width=100%>
		                <div class="carousel-caption">

		                  <p></p>
		                </div>
		            </div>
		            <div class="item">
		            	<img src="img/HomepagePic4.jpg" alt="" width=100%>
		                <div class="carousel-caption">

		                  <p></p>
		                </div>
		            </div>
		      </div>
		        <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
		        <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
		    </div>


		</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--<script>$('.carousel').carousel()</script>-->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>



	</body>
</html>
