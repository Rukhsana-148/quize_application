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
$total_que = 0;
$sql = "SELECT `id`, `question_no`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `answer`, `catagory` FROM `question` WHERE `catagory` = '$_SESSION[exam_category]'";



$result = mysqli_query($conn, $sql);
$total_que = mysqli_num_rows($result);

echo "Toatl Question :".$total_que;
?>