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

$sql = "SELECT `Name`, `Email`, `StudentID`, `Department`, `Password`, `status` FROM `student`";



$result = mysqli_query($conn, $sql);


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
                <div class="top">
      <div class="row">
        <div class="col-sm-3">
        <p>Quize</p>
        </div>
        <div class="col-sm-2"></div>

        <div class="col-sm-5">
      
        </div>
        <div class="col-sm-2">
       
          <a href="index.php" class="btn">Logout</a>

        </div>
      </div>
    </div>
    <div class="profile">
        <i class="fa fa-user-circle" aria-hidden="true"></i>
        <p><?php echo $rows['Name'];?></p>
        <p><?php echo $rows['Email'];?></p>
        <p><?php echo $rows['StudentID'];?></p>
        <p><?php echo $rows['Department'];?></p>
        <?php
           if($rows['status']==0){?>
           <p class="text-danger">You're not approved for exam!</p>
         <?php  }else{

            ?>
             <p >You're  approved for exam!</p>
             <a href="selectexam.php?studentid=<?php echo $rows['StudentID'];?>" class="btn btn-success text-white">Start Quize</a>
      <?php  }
        ?>
    </div>


          <?php  }else{
            $count++;
          }
        }
    }

    ?>
    <?php
    if($count==$num_rows){?>
      <p class="text-warning">You enter inccorect information! Please Go back and sigin again!</p>
      <a  href="student_login.php" class="btn btn-danger text-white">Go Back</a>
   <?php }

    ?>
</div>
</div>
<?php include 'footer.html';?>