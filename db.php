<?php

// change localhost, user,password

$con=mysqli_connect("is5108group-3.host.cs.st-andrews.ac.uk","is5108group-3","q6Pu!kKZM5K30n","is5108group-3__Digdata","3306");
 // Check connection
 if (mysqli_connect_errno())
   {
   echo "Failed to connect to MySQLi: " . mysqli_connect_error();
   }

mysqli_set_charset($con, "utf8mb4");



?>
