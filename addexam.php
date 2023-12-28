<?php 
$name = $time= "";
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
    $name = $_POST['examname'];
    $time = $_POST['examtime'];
}
if($name!=""&& $time!=""){
    $sql = "INSERT INTO `exam`(`Examname`, `Time`) VALUES ('$name','$time')";

if ($conn->query($sql) === TRUE) {
    echo  '<script> 
     alert("Exam is added!") 
     </script>';
  } else {
  echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$exam = "SELECT `id`, `Examname`, `Time` FROM `exam`";
$result = mysqli_query($conn, $exam);


?>
<?php include 'header.html';?>
<div class="container">
        <div class="approvestudent">
 <div class="top">
      <div class="row">
        <div class="col-sm-4">
        <p>Quize</p>
        </div>
        <div class="col-sm-3"></div>

        <div class="col-sm-3
        ">
            
        
        </div>
        <div class="col-sm-2">
          <a href="admin.php" class="btn">Back</a>
          <a href="index.php" class="btn">Logout</a>

        </div>
      </div>
    </div>
    <hr>
    <div class="row addexam">
        <div class="col-sm-1"></div>
        <div class="col-sm-3">
            <h5>Add Exam</h5>
            <form action="" method="post">
                <label for="examname">Exam Name</label>
                <input type="text" name="examname" placeholder="Enter Exam name" class="form-control"/>
                <label for="examname">Exam Time in Minutes</label>
                <input type="text" name="examtime" placeholder="Enter exam time in minitues" class="form-control"/>

                <input type="submit" name="submit" value="Add Exam" class="mt-2 form-control btn btn-success text-white"/>
            </form>
        </div>
        <div class="col-sm-2"></div>
        <div class="col-sm-4">
        <table class="table table-striped table-primary">
<thead>
    <th>ID</th>
    <th>Exam Name</th>
    <th>Time(minitues)</th>
    <th>Edit</th>
    <th>Delete</th>
    <th>Add Question</th>
    
   

</thead>
<tbody>
         <?php
         if($result == TRUE){
            while($rows = mysqli_fetch_assoc($result)){
              $count++;
                ?>
                <tr>
                    <td><?php echo $count;?></td>
                    <td><?php echo $rows['Examname'];?></td>
                    <td><?php echo $rows['Time'];?></rd>
                    <td><a href="editexam.php?id=<?php echo $rows['id'];?>">Edit</a></td>
                    <td><a href="delete.php?id=<?php echo $rows['id'];?>">Delete</a></td>
                    <td><a href="addquestion.php?id=<?php echo $rows['id'];?>">Select</a></td>
                </tr>
         <?php  }
         }
         ?>
        </div>
        <div class="col-sm-2"></div>
    </div>
            </div>
</div>
<?php include 'footer.html';?>