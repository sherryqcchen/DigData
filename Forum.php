<?php
// Start Session
session_start();

// Database connection
// require __DIR__ . '/database.php';
// $db = DB();
if(empty($_SESSION['user_id']))
{
    header("Location: login.php");
}
// Application library ( with DemoLib class )
require __DIR__ . '/lib/library.php';
$app = new DemoLib();
$submit_error_message = '';

$user = $app->UserDetails($_SESSION['user_id']); // get user details

// include("map/db.php");

if (!empty($_POST['submit'])) {
    if ($_POST['topic_title'] == "") {
        $submit_error_message = 'A Project Title is required!';
    } else if ($_POST['comment'] == "") {
        $submit_error_message = 'Comment required!';
    } else {
        $app->Comment($_POST['topic_title'], $_POST['comment']);
        // set session and redirect user to the forum page
        // $_SESSION['user_id'] = $user_id;
        // header("Location: Forum.php");
    }
}
$commenting = $app->Comments();

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   		<title>Archaeology Forum</title>

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
<style>
           section{
           width: 700px;
           height: 500px;
           overflow: auto;
       }
       </style>
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
      <a class="navbar-brand" href="index.php">ARM</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbarNewTopic-collapse-1">
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

        <div class="container">
                <div class="row">
                        <!-- start of page content -->
                        <div class="span8 page-content">
                                <article class=" type-post format-standard hentry clearfix">

                                        <h1 class="topic_title">Chat</h1>
                                        <br>
                                        <div class="tab-pane" id="NewProject">


      <!--Comments -->
                                <section id="comments" class="col-md-12">






                                          <?php while ($row = $commenting->fetch(PDO::FETCH_OBJ, PDO::FETCH_ORI_NEXT)) {
                         ?>
                                          <p><strong><?php echo $row->topic_title ?></strong></p>


                                                        <article id="comment-4">

                                                          									<div class="w3ls-banner-left-info">


                                                          <h5 class="author">
                                                                  <cite class="fn"><?php echo $row->name ?> <?php echo $row->surname ?></cite>

                                                          </h5>

                                                                <div class="comment-meta">



                                                                        <p class="date">
                                                                                <a href="http://knowledgebase.inspirythemes.com/integrating-wordpress-with-your-website/#comment-4">
                                                                                        <time><?php echo $row->timestamp ?></time>
                                                                                </a>
                                                                        </p>

                                                                </div><!-- end .comment-meta -->

                                                                <div class="comment-body">
                                                                        <p><?php echo $row->comment ?></p>

                                                                </div><!-- end of comment-body -->
</div>
                                                        </article>


      <?php } ?>

                                </section>

                                <!-- end of comments -->

                        </div>
                        <!-- end of page content -->



                </div>

      </div>
      <!-- End of Page Container -->

      </div>
	                <br>
                  <br>
<!--Post new topic-->
				    <ol class="breadcrumb">
					    <div>
							<h4>
								<b>Post Comment</b>
							</h4>
					        <br/>
					    </div>
						<form class="form-horizontal" method="post">
							<div class="form-group">
							    <label for="" class="col-sm-2 control-label">Title</label>
							    <div class="col-sm-10">
							      <input type="text" name="topic_title" class="form-control" id="" placeholder="">
							    </div>
						    </div>

						    <div class="form-group">
							    <label for="" class="col-sm-2 control-label">Comment</label>
							    <div class="col-sm-10">
							      <textarea class="form-control" rows="4" name="comment"></textarea>
							    </div>
						    </div>
							<div class="form-group">
							    <div class="col-sm-offset-2 col-sm-10">
									<input type="submit" class="btn btn-default" name="submit" value="Post" />
							    </div>
						    </div>
						</form>

					</ol>

	                  <br>


		</div>

	</body>
</html>
