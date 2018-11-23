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
				      <a class="navbar-brand" href="#">Brand</a>
				    </div>

				    <!-- Collect the nav links, forms, and other content for toggling -->
				    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				      <ul class="nav navbar-nav">
				        <li><a href="index.php">Home </a></li>
				        <li class="active"><a href="Directory.php">Directory</a></li>
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


<!--nav2 右侧导航小图标-->
	        <div class="row">

	            <div class="col-md-9">
	                <div  id="TitleCounties" style="display: none;">COUNTIES</div>
	                <div  id="TitleProject" style="display: none;">PROJECTS</div>
	                <div  id="TitleCategory" style="display: none;">CATEGORY</div>
	            </div>
	        </div>
<!--POST NEW PROJECT PART-->
		  <div class="col-md-12">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
								<span class="glyphicon glyphicon-file">
								</span>POST NEW PROJECT
							</a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
         <form action="Post.php" method="post">
                                    <div class="form-group">
                                        <input type="text" name="title" class="form-control" placeholder="Project Title" required />
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" name="description" placeholder="Project Description" rows="5" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="category">
                                            Category</label>
                                        <select class="form-control" id="category" name="category">
                                            <option>Africa</option>
                                            <option>Asia</option>
                                            <option>Europe</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tags">
                                            Tags</label>
                                        <input type="text" class="form-control" name="tags" id="tags" placeholder="Tags" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="well well-sm">
                                        <div class="input-group">
                                            <span class="input-group-addon">www.jquery2dotnet.com/</span>
                                            <input type="text" class="form-control" name="url" placeholder="Custom url" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="well well-sm well-primary">
                                        <form class="form form-inline " role="form">
                                        <div class="form-group">
                                            <input type="text" class="form-control" value="" name="date" placeholder="Date" required />
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" name="format">
                                                <option>Draft</option>
                                                <option>Published</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success btn-sm" name="btnSubmit" value="Submit">
                                                <a href="Directory.php" style="color:white;" span class="glyphicon glyphicon-floppy-disk"></span> Save</a></button>
                                            <button type="button" class="btn btn-default btn-sm">
                                                <a href="https://en.wikipedia.org/wiki/Archaeology" style="color:black;" span class="glyphicon glyphicon-eye-open"></span> Preview</a></button>
											<button type="button" class="btn btn-info btn-sm">
												<a href="Personal Page Professional_rewrite.php" style="color:white;"  span class="glyphicon glyphicon-backward"></span> Back</a></button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-th-list">
                            </span>POST FILES TO EXISTING PROJECT</a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="category">
                                          Choose Project</label>
                                      <select class="form-control" id="category">
                                          <option>Great Ancient Civilizations of Asia Minor</option>
                                          <option>Deserted Medieval Villages in the West Midlands</option>
                                          <option>Stonehenge & the History of England: English Heritage</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="File Title" required />
                                    </div>
                                    <div class="form-group">
                                        <a href="###">Upload Local File</a>
                                        <input type="filr" name="image" class="hidden" value="" />
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="File Description" required />
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" placeholder="Keywords" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="well well-sm well-primary">
                                        <form class="form form-inline " role="form">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <a href="https://en.wikipedia.org/wiki/Archaeology" style="color:white;" span class="glyphicon glyphicon-floppy-disk"></span> Save</a></button>
                                            <button type="button" class="btn btn-default btn-sm">
                                                <a href="https://en.wikipedia.org/wiki/Archaeology" style="color:black;" span class="glyphicon glyphicon-eye-open"></span> Preview</a></button>
											<button type="button" class="btn btn-info btn-sm">
												<a href="Personal Page Professional_rewrite.html" style="color:white;"  span class="glyphicon glyphicon-backward"></span> Back</a></button>
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
		 </div>
		</div>




	</body>
</html>
