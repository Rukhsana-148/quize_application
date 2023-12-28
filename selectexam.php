<?php
$user = $email = $password = "";
$count = 0;
$serverName = "localhost";  
$username = "root";
$password = "";
$dbname = "quize";
session_start();
$conn = new mysqli($serverName, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$studentid = $_GET['studentid'];
$sql = "SELECT `id`, `Examname`, `Time` FROM `exam`";
$result = mysqli_query($conn, $sql);

?>
<?php include 'header.html';?>
<div class="container">
    <div class="approvestudent">
    <div class="top">
      <div class="row">
        <div class="col-sm-3">
        <p>Quize</p>
        </div>
        <div class="col-sm-2"></div>

        <div class="col-sm-5">
      
        </div>
        <div class="col-sm-2">
        <a href="student.php" class="btn">Back</a>
          <a href="index.php" class="btn">Logout</a>

        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <?php
            if($result == TRUE){
                while($rows = mysqli_fetch_assoc($result)){
                    ?>
                    <input type="button"  onclick ="set_exam_type_session(this.value)" class="btn btn-success text-white form-control mb-3" value="<?php echo $rows['Examname'];?>"/>
               <?php }
            }
            ?>
        </div>
        <div class="col-sm-4"></div>
    </div>
    </div>
</div>
<?php include 'footer.html';?>
<script type="text/javascript">

function set_exam_type_session(examcategory){
  alert(examcategory);
  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
      window.location = 'dashboard.php';
      }
    };
    xmlhttp.open('GET', "set_exam_type_session.php?examcategory="+examcategory, true);
    xmlhttp.send();
}
/*function loadXMLDoc(examcategory) {
  var xhttp = new XMLHttpRequest();
  
  xhttp.onreadystatechange = function() {
 if(this.readyState == 4){
  if(this.status == 200){
    window.location = 'dashboard.php';
  }
 }
  };
  xhttp.open("GET",  "set_exam_type_session.php?examcategory="+examcategory, true);
  xhttp.send();
 
}*/

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>