<?php
session_start();
$serverName = "localhost";  
$username = "root";
$password = "";
$dbname = "quize";

$conn = new mysqli($serverName, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT `id`, `Examname`, `Time` FROM `exam` WHERE `Examname` = '$_SESSION[exam_category]'";
$result = mysqli_query($conn, $sql);
if($result == TRUE){
  while($rows = mysqli_fetch_assoc($result)){
    $time = $rows['Time'];
  }
}
echo $time;
?>