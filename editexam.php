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

$id = $_GET['id'];
$examname = $examtime = "";
$exam = "SELECT `id`, `Examname`, `Time` FROM `exam` WHERE `id` = '$id'";
$result = mysqli_query($conn, $exam);
if($result ==  TRUE){
    while($rows = mysqli_fetch_assoc($result)){
    $examname = $rows['Examname'];
    $examtime = $rows['Time'];
    }
   
}





if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $time = $_POST['time'];
}
if($name!=""&& $time!=""){
    $sql = "UPDATE `exam` SET `Examname`='$name',`Time`='$time' WHERE `id` = '$id'";

if ($conn->query($sql) === TRUE) {
    echo  '<script> 
     alert("Exam is edited!") 
     window.location = "addexam.php";
     </script>';
  } else {
  echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
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
            <h5>Edit Exam</h5>
            <form action="" method="post">
                <label for="examname">Exam Name</label>
                <input type="text" name="name" value="<?php echo $examname; ?>" placeholder="Enter Exam name" class="form-control"/>
                <label for="examname">Exam Time in Minutes</label>
                <input type="text" name="time" value="<?php echo $examtime; ?>" placeholder="Enter exam time in minitues" class="form-control"/>

                <input type="submit" name="submit" value="Edit Exam" class="mt-2 form-control btn btn-success text-white"/>
            </form>
        </div>
        <div class="col-sm-2"></div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-2"></div>
    </div>
            </div>
</div>
<?php include 'footer.html';?>
