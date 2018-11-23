<?php
/**
 * iTech Empires Tutorial Script : PHP Login Registration system with PDO Connection
 *
 * File: Database Configuration
 */

// database Connection variables

define('HOST', 'is5108group-3.host.cs.st-andrews.ac.uk'); // Database host name ex. localhost
define('USER', 'is5108group-3'); // Database user. ex. root ( if your on local server)
define('PASSWORD', 'q6Pu!kKZM5K30n'); // user password  (if password is not set for user then keep it empty )
define('DATABASE', 'is5108group-3__Digdata'); // Database Database name

/*define('HOST', 'pmr2.host.cs.st-andrews.ac.uk'); // Database host name ex. localhost
define('USER', 'pmr2'); // Database user. ex. root ( if your on local server)
define('PASSWORD', '.t5g06Nqu54.QL'); // user password  (if password is not set for user then keep it empty )
define('DATABASE', 'pmr2_mona'); // Database Database name
*/


function DB()
{
    try {
        $db = new PDO('mysql:host='.HOST.';dbname='.DATABASE.'', USER, PASSWORD);
        return $db;
    } catch (PDOException $e) {
        return "Error!: " . $e->getMessage();
        die();
    }
}
?>
