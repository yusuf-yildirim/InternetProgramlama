<?php

error_reporting( ~E_DEPRECATED & ~E_NOTICE );

define('DBHOST', 'localhost:3304');
define('DBUSER', 'alka');
define('DBPASS', 'Burakcan.1');
define('DBNAME', 'onlinekitapevi_db');

$conn = mysqli_connect(DBHOST,DBUSER,DBPASS);
mysqli_set_charset($conn, 'utf8');
$dbcon = mysqli_select_db($conn,DBNAME);


if ( !$conn ) {
    //die("Connection failed : " . mysqli_error());
}

if ( !$dbcon ) {
    //die("Database Connection failed : " . mysqli_error());
}
?>
