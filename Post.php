<?php
/**
 * Tutorial: PHP Login Registration system
 *
 * Page : Profile
 */
// Start Session
session_start();

// Database connection
//require __DIR__ . '/database.php';
//$db = DB();
if(empty($_SESSION['user_id']))
{
    header("Location: login.php");
}
// Application library ( with DemoLib class )
require __DIR__ . '/lib/library.php';
$app = new DemoLib();
$submit_error_message = '';

$user = $app->UserDetails($_SESSION['user_id']); // get user details

if (!empty($_POST['btnSubmit'])) {
    if ($_POST['title'] == "") {
        $submit_error_message = 'Project Title field is required!';
    } else if ($_POST['excavator'] == "") {
        $submit_error_message = 'Excavator field is required!';
    } else if ($_POST['description'] == "") {
        $submit_error_message = 'Project Description field is required!';
    } else if ($_POST['category'] == "") {
        $submit_error_message = 'Category field is required!';
    } else if ($_POST['others'] == "") {
        $submit_error_message = 'Others field is required!';
    } else if ($_POST['investigation'] == "") {
        $submit_error_message = 'Investigation field is required!';
    } else if ($_POST['other'] == "") {
        $submit_error_message = 'Others field is required!';
    } else if ($_POST['keyword'] == "") {
        $submit_error_message = 'Keywords field is required!';
    } else if ($_POST['start'] == "") {
        $submit_error_message = 'Start field is required!';
    } else if ($_POST['end'] == "") {
        $submit_error_message = 'End field is required!';
    } else if ($_POST['radiocarbon'] == "") {
        $submit_error_message = 'Radiocarbon field is required!';
    } else if ($_POST['url'] == "") {
        $submit_error_message = 'Url link field is required!';
    } else if ($_POST['tags'] == "") {
        $submit_error_message = 'Tags field is required!';
    } else if ($_POST['location'] == "") {
        $submit_error_message = 'Location field is required!';
    } else if ($_POST['format'] == "") {
        $submit_error_message = 'Format field is required!';
    } else {
        $user_id = $app->Submit($_POST['title'], $_POST['excavator'], $_POST['description'], $_POST['category'], $_POST['others'], $_POST['investigation'], $_POST['other'], $_POST['keyword'], $_POST['start'], $_POST['end'], $_POST['radiocarbon'], $_POST['url'], $_POST['tags'],$_POST['location'], $_POST['format'], $_SESSION['user_id'] );
        // set session and redirect user to the profile page
        //$_SESSION['user_id'] = $user_id;
        header("Location: Post.php");
    }
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>POST NEW PROJECT</title>
   		<link rel="stylesheet" href="css/idangerous.swiper.css">
   		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/style_pnp.css" type="text/css" media="screen" />
	    <link rel="stylesheet" type="text/css" href="css/JQfiles-li/CSSreset.min.css" />
		<link rel="stylesheet" type="text/css" href="css/JQfiles-li/default.css">
		<link rel="stylesheet" type="text/css" media="screen" href="css/JQfiles-li/als_demo.css" />

	   <script src="js/jquery-2.1.1.min.js"></script>
	   <script src="js/bootstrap.min.js"></script>

	</head>

	<body data-spy="scroll" data-target="#myScrollspy">        <!--container 字体大小-->

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
				      <a class="navbar-brand" href="#">ARM</a>
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



<!--POST NEW PROJECT PART-->
		  <div class="col-md-12">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-th-list">
                            </span>ADD NEW ARTIFACT</a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse">
                        <div class="panel-body">
                          <div class="row">
                             <form action="artefactImage.php" method="post">
                              <div class="col-md-6">
                                    <div class="form-group">
                                         <label for="Subject">
                                             <h4>Subject</h4></label>
                                        <select class="form-control" id="category" name="project_name" >
                                            <option>Great Ancient Civilizations of Asia Minor</option>
                                            <option>Deserted Medieval Villages in the West Midlands</option>
                                            <option>Stonehenge & the History of England: English Heritage</option>
                                            <option>Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control"  name="excavator" placeholder="Excavator" required />
                                    </div>
                                 </div>
                                 <div class="col-md-12">
									   <div class="form-group">
                                        <input type="text" class="form-control" name="object" placeholder="Object Name" required />
                                    </div>
                                 </div>
                                      <div class="col-md-12">
                                     <div class="form-group">
                                        <textarea class="form-control" name="description" placeholder="Description" required></textarea>
                                    </div>
                                 </div>
                                  <div class="col-md-6">
                                        <div class="form-group">
                                        <label for="category">
                                            <h4>Material</h4></label>
                                        <select class="form-control" id="category" name="material">
                                            <option>Wood</option>a href
                                            <option>Metal</option>
                                            <option>Stone</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="well well-sm well-primary">
                                        <form class="form form-inline " a hrefrole="form">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success btn-sm" style="color:white;" span class="glyphicon glyphicon-floppy-disk" name="btnArtefact" value="Submitartefact">Save</button>
											<button type="button" class="btn btn-info btn-sm" style="color:white;"  span class="glyphicon glyphicon-backward" ><a href="profile.php" style="color:white;" >Back</a></button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-th-list">
                            </span>POST ARTIFACT IMAGE</a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                          <div class="row">
                              <div class="col-md-6">

                                <form enctype="multipart/form-data" action="artefactImage.php" method="POST">

                                    <label>
                                        Upload File</label>
                                     <input type="file" name="uploaded_file"></input>
                                  <div class="form-group">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" name="btnUpload" value="Aimage">Upload</button>
            </div>

                                        </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		   </div>
		  </div>
		 </div>
        </div>
	</body>
</html>
