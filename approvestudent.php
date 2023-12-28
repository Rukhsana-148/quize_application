<?php
$username = $email = $password = "";
$count = 0;
$serverName = "localhost";  
$username = "root";
$password = "";
$dbname = "quize";

$conn = new mysqli($serverName, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['approve'])){
    $email = $_POST['email'];

$update = "UPDATE `student` SET `status`=1 WHERE `Email` = '$email'";
if($conn->query($update) === TRUE){
  echo  '<script> 
alert("Approved is Successfully completed!") 
</script>';
}
}

$student = "SELECT `Name`, `Email`, `StudentID`, `Department`, `Password`, `status` FROM `student`";
$student_result = mysqli_query($conn, $student);



?>
<?php include 'header.html'?>
<div class="container">
<div class="approvestudent">
<div class="top">
      <div class="row">
        <div class="col-sm-3">
        <p>Quize</p>
        </div>
        <div class="col-sm-2"></div>

        <div class="col-sm-3">
       
        </div>
        <div class="col-sm-4">
          <a href="admin.php" class="btn">Back</a>
          <a href="index.php" class="btn">Logout</a>

        </div>
      </div>
    </div>
  <h4>Approved Student List</h4>
<table class="table table-striped table-primary">
<thead>
    <th>Name</th>
    <th>Email</th>
    <th>Designation</th>
    <th>Status</th>
    <th>Status</th>
  

</thead>
<tbody>
   
    <?php 
 if($student_result == TRUE){
    while($student_rows = mysqli_fetch_assoc($student_result)){
        if($student_rows['status']==1){?>
   
   <tr>
        <td><?php echo $student_rows['Name'];?></td>
        <td><?php echo $student_rows['Email'];?></td>
        <td><?php echo $student_rows['StudentID'];?></td>
        <td><?php echo $student_rows['Department'];?></td>
        <td>Approved</td>
        
       
        </tr>

 <?php
         } }
 }
?>
  

        </tbody>  
        </table> 
</div>
</div>
<?php include 'footer.html'?>