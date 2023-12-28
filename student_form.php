<?php 
$name = $dept=$id=$dept = $password = $confirm = "";
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
    $name = $_POST['name'];
    $email = $_POST['email'];
    $id = $_POST['id'];
    $dept = $_POST['department'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    if($name!=""&& $email!=""&& $id!=""&&$dept!=""&&$password!=""&&$password==$confirm){
     $sql = "INSERT INTO `student`(`Name`, `Email`, `StudentID`, `Department`, `Password`) VALUES ('$name','$email','$id','$dept','$dept')";
     if ($conn->query($sql) === TRUE) {
      header("Location: student_login.php");
      
      } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }


}
?>
<?php include 'header.html'; ?>
<div class="container">
    <div class="row studentreg">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <h4>Student Registration</h4>
            <form action="" id="form" method="post" >
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter your name"/>
                <label for="email">Email</label>
                 <input type="email" name="email" placeholder="Enter your email" class="form-control"/>
                 <label for="id">Student Id</label>
                <input type="text" name="id" placeholder="Enter your student id" class="form-control"/>
                <label for="department">Department</label>
                  <select name="department" class="form-control">
                  <option>Select Department</option>
                   
                    <option value="Computer Science and Engineering">Computer Science and Engineering</option>
                    <option value="Electrones and Electronics Engineering">Electrones and Electronics Engineering</option>
                    <option value="Industrail and Production Engineering">Industrail and Production Engineering</option>
                    <option value="Textile Engineering">Textile Engineering</option>
                    <option value="Petrolium and Mining Engineering">Petrolium and Mining Engineering</option>
                    <option value="Pharmecy">Pharmecy</option>
                    <option value="Microbiology">Microbiology</option>
                </select>
                <label for="password">Password</label>
<input type="password" name="password"  id="password" class="form-control" placeholder="Enter your password"/>
<laebl for="confirm">Confirm</label>
<input type="password" name="confirm" id="confirm" class="form-control" placeholder="Retype password" onChange = "checkPassword();"/>
<div class="check text-danger" id="check"></div>

<input type="submit" class="btn form-control"  name="submit"/>


            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>

<?php include 'footer.html';?>