<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Archaeology Directory</title>
   		<link rel="stylesheet" href="../css/idangerous.swiper.css">
        <link rel="stylesheet" href="../css/Show.css">

   		<link rel="stylesheet" href="../css/bootstrap.css">

	    <link rel="stylesheet" type="text/css" href="../css/JQfiles-li/CSSreset.min.css" />
		<link rel="stylesheet" type="text/css" href="../css/JQfiles-li/default.css">
		<link rel="stylesheet" type="text/css" media="screen" href="../css/JQfiles-li/als_demo.css" />

	   <script src="../js/jquery-2.1.1.min.js"></script>
	   <script src="../js/bootstrap.min.js"></script>

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
				      <a class="navbar-brand" href="#">Brand</a>
				    </div>

				    <!-- Collect the nav links, forms, and other content for toggling -->
				    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				      <ul class="nav navbar-nav">
				        <li><a href="index.php">Home </a></li>
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


                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                <form id="form" method="post">
                                   <div class="form-group">
                                        <label for="Project Title">
                                            <h4>Project Title</h4></label>
                                        <input type="text"  name="ProjectTitle" class="form-control"/>
                                    </div>
                                   <div class="form-group">
                                        <label for="ProjectLinks">
                                            <h4>Linked Projects</h4></label>
                                        <input type="text" name="ProjectLinks" class="form-control"/>
                                    </div>
                                        <div class="form-group">
                                        <label for="Excavator">
                                            <h4>Lead Excavator</h4></label>
                                        <input type="text" name="Excavator" class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                         <label for="Investigation Type">
                                             <h4>Investigation Type</h4></label>
                                        <select class="form-control" id="InvestigationType" name="InvestigationType" >
                                           <option value="Excavation">Excavation</option>
								          <option value="Environmental">Environmental</option>
								          <option value="Sampling">Sampling</option>
								          <option value="Dating">Dating</option>
								          <option value="Other">Other</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
								        <input type="text" class="form-control" name="InvestigationOther" placeholder="Investigation (other)" />
												<br>
												<label for="Period Keyword">
														<h4>Keywords</h4></label>
												<input type="text" name="KeyWords"  class="form-control"/>
										</div>
										<div class="form-group">
												<label for="Start Date">
														<h4>Start Date</h4></label>
												<input type="text" name="StartDate" class="form-control" />
										</div>
										<div class="form-group">
												<label for="End Date">
														<h4>End Date</h4></label>
												<input type="text" name="EndDate" class="form-control" />
										</div>
										<div class="form-group">
												<label for="Radiocarbon Data">
														<h4>Radio Carbon Data</h4></label>
												<textarea class="form-control" name="RadioCarbonData"></textarea>
										</div>
										<div class="form-group">
												<label for="Project Description">
														<h4>Project Description</h4></label>
												<textarea class="form-control" name="Description" rows="5"></textarea>
										</div>
																	<div class="form-group">
																	    <label for="Location">
																	      <input type="text" name="Location" class="form-control"  placeholder="Location"/>
										                                    </div>
                                </div>
                                      </div>

							<div class="form-group">
							    <div class="col">
							<input name="george" type="hidden" id="george" value="george" />
							      <button type="submit" name="btnForm" class="btn btn-primary btn-xl">Submit: Step 1 of 2</button>
							    </div>
						    </div>

                                                                                                     </form>

                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
	   	</body>
</html>
