<?php
/**
 * Tutorial: PHP Login Registration system
 *
 * Page : Profile
 */

// Start Session
session_start();

if(empty($_SESSION['user_id']))
{
    header("Location: login.php");
}
// Application library ( with DemoLib class )
require __DIR__ . '/lib/library.php';
$app = new DemoLib();

$user = $app->UserDetails($_SESSION['user_id']); // get user details

// check Add request
if (!empty($_POST['btnAdd'])) {
        $user_id = $app->Add($_POST['interests'], $_POST['projects'],$_SESSION['user_id']);
        // set session and redirect user to the profile page
        header("Location: profile.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<div class="container">

    <div class="row">
        <div class="col-md-5 well">
            <h4>Add Information</h4>
              <form action="additional.php" method="post">
                <div class="form-group">
                    <label for="">Research Interests</label>
                        <textarea class="form-control" name="interests" rows="5" required></textarea>
                    </div>
                 <div class="form-group">
                    <label for="">Current Projects</label>
                    <div class="form-group">
                        <textarea class="form-control" name="projects"  rows="5" required></textarea>
                    </div>
                <div class="form-group">
                    <input type="submit" name="btnAdd" class="btn btn-primary" value="Add"/>
                </div>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

</body>
</html>
