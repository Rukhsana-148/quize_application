<?php
$user = $email = $password =$name= "";
$status =$count= 0;
$serverName = "localhost";  
$username = "root";
$password = "";
$dbname = "quize";

$conn = new mysqli($serverName, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$id = $_GET['id'];
$delete = "DELETE FROM `exam` WHERE `id` = '$id'";
if($conn->query($delete) === TRUE){
    echo  '<script> 
  alert("Delete is successful") 
  </script>';
  }
?>
<script type="text/javascript">
    window.location = "addexam.php";
</script>