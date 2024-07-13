<!--DATABASE SIGN UP-->
<?php
$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "dbbookmart";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Ada yang salah;");
}
?>