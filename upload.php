<?PHP
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

$user = $app->UserDetails($_SESSION['user_id']); // get user details


 if(!empty($_FILES['uploaded_file']))
  {
    $path = "uploads/";
    $path = $path . basename( $_FILES['uploaded_file']['name']);
    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
    header("Location: profile.php");
      $app->Upload($_FILES['uploaded_file']['name'],$_SESSION['user_id']);

    } else{
        echo "There was an error uploading the file, please try again!";
    }
 }
?>
