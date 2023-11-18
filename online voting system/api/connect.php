<?php
$hostname="localhost";
$dbuser="root";
$dbpassword="";
$dbname="voting";
$connect = mysqli_connect($hostname,$dbuser,$dbpassword,$dbname);
 
if (mysqli_connect_error()) {
    echo "Connection Error.";
} else {
    echo "Database Connection Successfully.";
}
?>