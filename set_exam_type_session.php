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

$exam_category = $_GET['examcategory'];

$_SESSION['exam_category'] = $exam_category;
$sql = "SELECT `id`, `Examname`, `Time` FROM `exam` WHERE `Examname` = '$exam_category'";
$result = mysqli_query($conn, $sql);
if($result == TRUE){
    while($rows = mysqli_fetch_assoc($result)){
        $_SESSION['exam_time'] = $rows['Time'];
    }
}

$date = date("Y-m-d M:i:s");

$_SESSION["end_time"] = date("Y-m-d M:i:s", strtotime($date."+$_SESSION[exam_time] minutes"));
$_SESSION["exam_start"] = "yes start";
?>