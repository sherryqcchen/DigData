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
$artefacts = $app->Artefacts();
$projects = $app->Projects();
//$project = $app->SelectProject($project_id);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Arcgaeology Directory</title>
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
				      <a class="navbar-brand" href="#">Brand</a>
				    </div>
				
				    <!-- Collect the nav links, forms, and other content for toggling -->
				    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				      <ul class="nav navbar-nav">
				        <li><a href="index.php">Home </a></li>
				        <li class="active"><a href="Directory.html">Directory</a></li>
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
	              <ol class="breadcrumb">
	                <ul class="nav nav-pills ">  
	                    <li class="active" >
	                       <a href="#Location" data-toggle="pill"  >
		  					    <span onclick="show1()" data-toggle="tooltip" title="Search by Counties" class="glyphicon glyphicon-globe" aria-hidden="true" ></span>
	                       </a>
	                    </li> 
	                    <li>
	                       <a href="#Project" data-toggle="pill" >	
		  					  <span onclick="show2()" data-toggle="tooltip" title="Search by Projects" class="glyphicon glyphicon-list-alt" aria-hidden="true" onclick="show2()"></span>		  					
	                       </a>
	                    </li>
	                    <li>
	                       <a href="#Category" data-toggle="pill">
		  					  <span onclick="show3()" data-toggle="tooltip" title="Search by Category" class="glyphicon glyphicon-glass" aria-hidden="true" ></span>
	                       </a>
	                    </li> 
	                </ul> 
	               </ol>

	                <div class="tab-content" >
	            	    <div class="tab-pane active" id="Location">
						    <div class="form-group" >
								<label >Location</label>
								<div class="btn-group">
								  <button type="button" class="btn btn-default">Select</button>
								  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								    <span class="caret"></span>
								    <span class="sr-only">Toggle Dropdown</span>
								  </button>
								  <ul class="dropdown-menu">
								    <li><a href="#CountiesMap">England</a></li>
								    <li><a href="#CountiesMap" data-toggle="tab">Scotland</a></li>
								    <li><a href="#CountiesMap" data-toggle="tab">Something else here</a></li>
								  </ul>
								</div>
								<label><a href="https://www.google.co.uk/maps">Search google map</a></label>
                            </div>
					    </div>
					     <div class="tab-pane" id="Project">
							<a href="#HotProject" data-toggle="tab" class="list-group-item" >New Projects</a>
				
	                     </div>
	                     <div class="tab-pane" id="Category">
	                     	<a href="#Artifacts" data-toggle="tab" class="list-group-item" >Artifacts</a>
						
	                     </div>

                    </div>

	            </div>
	        	
	<!--Right show parts-->	  
	            <ol class="col-md-9">  
	                <ol class="breadcrumb"> 
	                  <div  id="TitleCounties" >COUNTIES</div>  
	                  <div  id="TitleProject" style="display: none;">PROJECTS</div>
	                  <div  id="TitleCategory" style="display: none;">CATEGORY</div>
	                </ol>
	                
	                <div class="tab-content"> 
	        <!--Counties Map-->        	
	                  <div class="tab-pane fade in active " id="CountiesMap">
	                    	<img src="img/meng/UKmap.jpg" alt="calculator" class="img-thumbnail" />	                  
	                  </div>
	         <!--Hot Project -->         
                       
	                       <div class="tab-pane" id="HotProject">
                            <a href="#" class="list-group-item active">
                            <?php
                            $project_by_id = $app->SelectProject(2);
                            $row = $project_by_id->fetch( PDO::FETCH_ASSOC );
                                    //$res = $projects->get_result()
                                
                                    echo $row['title'];
                              
                            
                            ?>
                            </a>
				<div class="panel-group" id="accordion">
                    
                   <?php while ($row = $projects->fetch(PDO::FETCH_OBJ, PDO::FETCH_ORI_NEXT)) {
    ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <article data-toggle="collapse" data-parent="#accordion">
                                <p><strong><?php echo $row->title ?> -  <?php echo $row->category ?></strong></p> <h6 style="font-size:14px"><?php echo $row->excavator ?>, <?php echo $row->location ?> <?php echo $row->start ?></h6>
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
	                  
	         <!--New Project -->       
	         <!--Hot Topic -->       

                

	         <!--New Topic -->       

   
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
	          <!--Architecture-->        

                

      
	          <!--Biological legacy-->        

                

	          <!--Cultural landscape-->        
	   
                
     
	                  </div>
	                  </div>
 </div>
 </div>
 </div>
</div> 
      

			 
	
		<script type="text/javascript">
			$(function () {
			  $('[data-toggle="tooltip"]').tooltip()
			})
			
			function show1(){
			    document.getElementById("TitleCounties").style.display = "";
			    document.getElementById("TitleProject").style.display = "none";
			    document.getElementById("TitleCategory").style.display = "none";
			}
			
			
		    function show2(){
			    document.getElementById("TitleCounties").style.display = "none";
			    document.getElementById("TitleProject").style.display = "";
			    document.getElementById("TitleCategory").style.display = "none";
			}
		    
		    function show3(){
			    document.getElementById("TitleCounties").style.display = "none";
			    document.getElementById("TitleProject").style.display = "none";
			    document.getElementById("TitleCategory").style.display = "";
			}	
		</script>  
    
	</body>
</html>
