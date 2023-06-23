<?php
$dbuser="root";
$dbpass="";
$host="localhost";
$db="hos";
$mysqli=new mysqli($host,$dbuser, $dbpass, $db);



$con = mysqli_connect('localhost','root','','hos');
if(!$con){
    echo "not connected";
}
?>
