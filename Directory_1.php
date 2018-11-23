<?php
/**
 * Tutorial: PHP Login Registration system
 *
 * Page : Profile
 */

// Start Session

include("db.php");
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
$artefacts = $app->Artefacts();
// $projects = $app->Projects();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Archaeology Directory</title>
   		<link rel="stylesheet" href="css/idangerous.swiper.css">
        <link rel="stylesheet" href="css/Show.css">

   		<link rel="stylesheet" href="css/bootstrap.css">

	    <link rel="stylesheet" type="text/css" href="css/JQfiles-li/CSSreset.min.css" />
		<link rel="stylesheet" type="text/css" href="css/JQfiles-li/default.css">
		<link rel="stylesheet" type="text/css" media="screen" href="css/JQfiles-li/als_demo.css" />

	   <script src="js/jquery-2.1.1.min.js"></script>
	   <script src="js/bootstrap.min.js"></script>

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
				        <li><a href="index.php">Home</a></li>
				        <li class="active"><a href="Directory_1.php">Directory</a></li>
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

<!--Left Search parts-->
	        <div class="row">
	            <div class="col-md-3">
	              <!-- <ol class="breadcrumb">
	                <ul class="nav nav-pills ">
	                    <li><a href="profile.php" data-toggle="pill">
		  					    <span data-toggle="tooltip" title="Add New Project" class="glyphicon glyphicon-globe" aria-hidden="true" ></span>
      </a>
	                    </li>
	                    <li>
	                       <a href="Post.php" data-toggle="pill">
		  					  <span data-toggle="tooltip" title="Add Artifact" class="glyphicon glyphicon-glass" aria-hidden="true" ></span>
	                       </a>
	                    </li>
	                </ul>
	               </ol> -->

	                <div class="tab-content" >
	            	    <div class="tab-pane active" id="Projects">
                             	<a href="#CountiesMap" data-toggle="tab" class="list-group-item" >Projects</a>
                              	<a href="#Artifacts" data-toggle="tab" class="list-group-item" >Artifacts</a>



					    </div>


	                     <div class="tab-pane " id="Category">


	                     </div>

                    </div>

	            </div>

	<!--Right show parts-->
	            <ol class="col-md-9">

	                <div class="tab-content">

<!--Projects-->
<div class="tab-pane fade in active " id="CountiesMap">
<a href="#" class="list-group-item active">
Projects
</a>

<div class="panel-group">
  <div class="col mx-auto">
<?php include("map.php"); ?>
  </div>
</div>
</div>

										<!--Artifacts-->
														 <div class="tab-pane" id="Artifacts">
														 <a href="#" class="list-group-item active">
												 Artifacts
											 </a>

										 <div class="panel-group" id="accordion">

														 <?php while ($row = $artefacts->fetch(PDO::FETCH_OBJ, PDO::FETCH_ORI_NEXT)) {
						 ?>
												 <div class="panel panel-default">
														 <div class="panel-heading">
																 <h4 class="panel-title">
																		 <article data-toggle="collapse" data-parent="#accordion">
																				 <p><strong><?php echo $row->object ?> -  <?php echo $row->project_name ?></strong></p> <?php echo $row->excavator ?>
											 </article>
																 </h4>
														 </div>

																 <div class="panel-body">
																	 <div class="row">
																			 <div class="col-md-6">
																						<p><?php echo $row->description ?></p>

																			 </div>
																	 </div>

														 </div>
												 </div>

														 <?php } ?>

														 </div>
														 </div>


														 </div>
														 </div>
					</div>
					</div>
					</div>
					</div>




						 <script <type="javascript">
							 $(function () {
								 $('[data-toggle="tooltip"]').tooltip()
							 })

               <button id="glyphicon glyphicon-globe">Projects</button>
                 <script>
                   var btn = document.getElementById('show1()');
                   btn.addEventListener('click', function() {
                     document.location.href = '<?php Directory_1.php ?>';
                   });
                 </script>
							 }




					 </body>
					</html>
