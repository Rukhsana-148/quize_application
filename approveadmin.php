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
}
$update = "UPDATE `admin` SET `status`=1 WHERE `Email` = '$email'";
if($conn->query($update) === TRUE){
      echo  '<script> 
    alert("Approved is Successfully completed!
    
    <a href="superadmin.php">Go BAck</a>") 
    </script>';
}
$admin = "SELECT `Name`, `Email`, `Designation`, `Password`, `status` FROM `admin`";
$admin_result = mysqli_query($conn, $admin);

?>
<?php include 'header.html'; ?>
<div class="container">
  <div class="approvestudent">
    <div class="top">
      <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-7"></div>
        <div class="col-sm-2">
          <a href="superadmin.php" class="btn">Back</a>
        </div>
      </div>
    </div>
    <h4>Approved Admin List</h4>
  <table class="table table-striped table-primary">
<thead>
    <th>Name</th>
    <th>Email</th>
    <th>Designation</th>
    <th>Status</th>
   

</thead>
<tbody>
   
    <?php 
 if($admin_result == TRUE){
    while($admin_rows = mysqli_fetch_assoc($admin_result)){
        if($admin_rows['status']==1){?>
   
    <tr>
        <td><?php echo $admin_rows['Name'];?></td>
        <td><?php echo $admin_rows['Email'];?></td>
        <td><?php echo $admin_rows['Designation'];?></td>
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
<?php include 'footer.html';?>