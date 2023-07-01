<?php 

define("webserver","localhost");
define("username","root");
define("password","");
define("database","housewest");

$con=mysqli_connect(webserver,username,password,database) or die('unable to connect with database');
?>