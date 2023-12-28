<?php
$user = $email = $password = "";
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

if(isset($_POST['submit'])){
    $user = $_POST['username'];
    $password = $_POST['password'];
}

$sql = "SELECT `Name`, `Email`, `Designation`, `Password`, `status` FROM `admin`";
$admin = "SELECT `Name`, `Email`, `Designation`, `Password`, `status` FROM `admin`";



$result = mysqli_query($conn, $sql);
$admin_result = mysqli_query($conn, $sql);

if($result = mysqli_query($conn, $sql)){
    $num_rows = mysqli_num_rows($result);
}
if($conn->query($sql) === TRUE){
    echo "";
}



?>

<?php include 'header.html'; ?>
<div class="container">
    <div class="approvestudent">
    
    <?php
    if($result == TRUE){
        while($rows = mysqli_fetch_assoc($result)){
            if($rows['Email']==$user && $rows['Password']==$password){?>
         <h4>Admin Request List</h4>
        
         <?php
            }else{
                $count++;
            }
        }
            }?>
            <?php
            if($count<$num_rows){?>
            <div class="top">
      <div class="row">
        <div class="col-sm-3">
        <p>Quize</p>
        </div>
        <div class="col-sm-2"></div>

        <div class="col-sm-3">
        <a href="approveadmin.php" class="btn">List</a>
        </div>
        <div class="col-sm-4">
          <a href="superadmin_login.php" class="btn">Back</a>
          <a href="index.php" class="btn">Logout</a>

        </div>
      </div>
    </div>
         <table class="table table-striped table-primary">
<thead>
    <th>Name</th>
    <th>Email</th>
    <th>Designation</th>
    <th>Status</th>
    <th>Update</th>

</thead>
<tbody>
    <tr>
        
    <?php 
  
 if($admin_result == TRUE){
    while($admin_rows = mysqli_fetch_assoc($admin_result)){
        if($admin_rows['status']==0){?>
   
    
        <td><?php echo $admin_rows['Name'];?></td>
        <td><?php echo $admin_rows['Email'];?></td>
        <td><?php echo $admin_rows['Designation'];?></td>
        <td><?php echo $admin_rows['status'];?></td>
        <td>
            <form action="approveadmin.php" method="post">
                <input type="hidden"  name="email" value="<?php echo $admin_rows['Email'];?>" />
               
                <input type="submit"  name="approve" value="Approve" class="btn btn-success text-white" />
            </form>
        </td>


 <?php
         } }
 }

?>
    </tr>

        </tbody>  
        </table>
        <?php 
            }else{?>
               <p class="text-danger">Incoorect information.Please go back and signin again</p>
             <a href="superadmin_login.php" class="btn btn-danger text-white">Go Back</a>
         <?php   }?> 
      
</div>
</div>
<?php include 'footer.html';?>