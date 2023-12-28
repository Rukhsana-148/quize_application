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

if(isset($_POST['submit'])){
    $user = $_POST['username'];
    $password = $_POST['password'];
}

$sql = "SELECT `Name`, `Email`, `Designation`, `Password`, `status` FROM `admin`";
$student = "SELECT `Name`, `Email`, `StudentID`, `Department`, `Password`, `status` FROM `student`";


$result = mysqli_query($conn, $sql);
$student_result = mysqli_query($conn, $student);
if($result = mysqli_query($conn, $sql)){
    $num_rows = mysqli_num_rows($result);
}

?>
<?php include 'header.html'?>
<div class="container">
   <div class="approvestudent">
  
<?php
    if($result == TRUE){
        while($rows = mysqli_fetch_assoc($result)){
            if($rows['Email']==$user && $rows['Password'] == $password){
                  
                  $name = $rows['Name'];
        if($rows['status']==0){
            echo "You are not approved for making question";
        }else{
            $status = 1;
            echo "";
        }
                  ?>
         <?php   }else{
            $count++;
         }
        }
    }
    ?>
    <?php if($count<$num_rows){?>

    
 <div class="top">
      <div class="row">
        <div class="col-sm-4">
        <p>Quize</p>
        </div>
        <div class="col-sm-3"></div>

        <div class="col-sm-3
        ">
            <?php
            if($status == 1){?>
     <a href="addexam.php" class="btn">Add Exam</a>
        <?php    }
            ?>
        <a href="approvestudent.php" class="btn">List</a>
        </div>
        <div class="col-sm-2">
          <a href="admin_login.php" class="btn">Back</a>
          <a href="index.php" class="btn">Logout</a>

        </div>
      </div>
    </div>
    <h4> Welcome <?php echo $name;?>!</h4>
    <h3 class="text-center text-white py-5">Student Request List</h3>
<table class="table table-striped table-primary">
<thead>
    <th>Name</th>
    <th>Email</th>
    <th>Designation</th>
    <th>Status</th>
    <th>Status</th>
    <th>Action</th>

</thead>
<tbody>
   
    <?php 
 if($student_result == TRUE){
    while($student_rows = mysqli_fetch_assoc($student_result)){
        if($student_rows['status']==0){?>
   
   <tr>
        <td><?php echo $student_rows['Name'];?></td>
        <td><?php echo $student_rows['Email'];?></td>
        <td><?php echo $student_rows['StudentID'];?></td>
        <td><?php echo $student_rows['Department'];?></td>
        <td>Not Approved</td>
        
        <td>
            <form action="approvestudent.php" method="post">
                <input type="hidden"  name="email" value="<?php echo $student_rows['Email'];?>" />
               
                <input type="submit"  name="approve" value="Approve" class="btn btn-success text-white" />
                
            </form>

        </td>
        </tr>

 <?php
         } }
 }
?>
  

        </tbody>  
        </table> 
<?php }else{
    ?>
    <p class="text-warnin">You enter incorrect information! Go Back and Signin Again!</p>
    <a href="admin_login.php" class="btn btn-danger text-white">Go Back</a>
      
<?php }
?>
</div>
</div>
<?php include 'footer.html'?>