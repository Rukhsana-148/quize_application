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
    $designation = $_POST['designation'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    if($name!=""&& $email!=""&& $designation!=""&&$password!=""&&$password==$confirm){
     $sql = "INSERT INTO `admin`(`Name`, `Email`, `Designation`, `Password`) VALUES ('$name','$email','$designation','$password')";
     if ($conn->query($sql) === TRUE) {
        echo  '<script> 
         alert("Register is Successfully completed!") 
         </script>';
      } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }


}
?>
<?php include 'header.html'; ?>
<div class="container">
    
<div class="row adminreg">

    <div class="col-sm-3"></div>
    <div class="col-sm-6">
<h4>Admin Registration</h4>
<form action="" method="post" id="form">
<label for="name">Name</label>
<input type="text" name="name" class="form-control" placeholder="Enter your name"/>
<label for="email">Email</label>
<input type="email" name="email" class="form-control" placeholder="Enter your email"/>
<label for="designation">Designation</label>
<select name="designation" class="form-control">
<option value="Lecturer">Lecturer</option>
<option value="Assistant Profesor">Assistant Profesor</option>
<option value="Associate Professor">Associate Professor</option>
<option value="Professor">Professor</option>
</select>
<label for="password">Password</label>
<input type="password" name="password" id="passwordA" class="form-control" placeholder="Enter your password"/>
<laebl for="confirm">Confirm</label>
<input type="password" name="confirm" id="confrimA" class="form-control" placeholder="Retype password" onChange = "checkPasswordA();"/>
<div class="check text-danger" id="checkA"></div>

<input type="submit" class="btn form-control"  name="submit"/>
</form>
    </div>
    <div class="col-sm-3"></div>
</div>
</div>
<?php include 'footer.html'; ?>