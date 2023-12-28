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
$catagory = "";
$exam = "SELECT `id`, `Examname`, `Time` FROM `exam` WHERE `id` = '$id'";
$result = mysqli_query($conn, $exam);
if($result ==  TRUE){
    while($rows = mysqli_fetch_assoc($result)){
    $catagory = $rows['Examname'];
    
    }
   
}


if(isset($_POST['submit'])){
    $question = $_POST['question'];
    $opt1 = $_POST['opt1'];
    $opt2 = $_POST['opt2'];
    $opt3 = $_POST['opt3'];
    $opt4 = $_POST['opt4'];
    $ans = $_POST['ans'];
    $qcatagory = $_POST['catagory'];
    $loop = 0;
    $count = 0;

    $sql = "SELECT `id`, `question_no`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `answer`, `catagory` FROM `question` WHERE `catagory` = '$catagory' ORDER BY `id` asc";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    if($count == 0){

    }else{
        while($rows = mysqli_fetch_array($result)){
            $loop = $loop+1;
           
            $update = "UPDATE `question` SET `question_no`='$loop' WHERE `id` = $rows[id]";
        }
    }
    $loop = $loop+1;
    if($question!=""&&$opt1!=""&&$opt2!=""&&$opt3!=""&&$opt4!=""&&$ans!=""&&$qcatagory!=""){
      $insert = "INSERT INTO `question`(`id`, `question_no`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `answer`, `catagory`) 
      VALUES (NULL,'$loop','$question','$opt1','$opt2','$opt3','$opt4','$ans','$qcatagory')";
      if ($conn->query($insert) === TRUE) {
        echo  '<script> 
         alert("Question is created!") 
         </script>';
      } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }

    }else if(isset($_POST['submit2'])){
        $question = $_POST['questioni'];
             $time = md5(time());


            $imag1 = $_FILES['opt1i']['name'];
            $dst1 = "./optimages/".$imag1;
            $dst_db1 = "optimages/".$imag1;
            move_uploaded_file($_FILES['opt1i']['tmp_name'], $dst1);

            $imag2 = $_FILES['opt2i']['name'];
            $dst2 = "./optimages/".$imag2;
            $dst_db2 = "optimages/".$imag2;
            move_uploaded_file($_FILES['opt2i']['tmp_name'], $dst2);

            $imag3 = $_FILES['opt3i']['name'];
            $dst3 = "./optimages/".$imag3;
            $dst_db3 = "optimages/".$imag3;
            move_uploaded_file($_FILES['opt3i']['tmp_name'], $dst3);

            $imag4 = $_FILES['opt4i']['name'];
            $dst4 = "./optimages/".$imag4;
            $dst_db4 = "optimages/".$imag4;
            move_uploaded_file($_FILES['opt4i']['tmp_name'], $dst4);
           
            $imaga = $_FILES['ansi']['name'];
            $dsta = "./optimages/".$imaga;
            $dst_dba = "optimages/".$imaga;
            move_uploaded_file($_FILES['ansi']['tmp_name'], $dsta);

        $qcatagory = $_POST['catagoryi'];
        $loop = 0;
        $count = 0;
    
        $sql = "SELECT `id`, `question_no`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `answer`, `catagory` FROM `question` WHERE `catagory` = '$catagory' ORDER BY `id` asc";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        if($count == 0){
    
        }else{
            while($rows = mysqli_fetch_array($result)){
                $loop = $loop+1;
               
                $update = "UPDATE `question` SET `question_no`='$loop' WHERE `id` = $rows[id]";
            }
        }
        $loop = $loop+1;
      
          $insert = "INSERT INTO `question`(`id`, `question_no`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `answer`, `catagory`) 
          VALUES (NULL,'$loop','$question','$dst_db1','$dst_db2','$dst_db3','$dst_db4','$dst_dba','$qcatagory')";
          if ($conn->query($insert) === TRUE) {
            echo  '<script> 
             alert("Question is created!") 
             </script>';
          } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
          }
        
        }

?>

<?php include 'header.html';?>
<div class="container">
        <div class="question">
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
    <h4>Add Question of <?php echo $catagory;?></h4>
    <div class="row">
 
      <div class="col-sm-2"></div>
        <div class="col-sm-4">
            
            <form action="" method="post">
                <label for="question">Add Question</label>
                <input type="text" name="question"  plcaeholder="Enter question name" class="form-control"/>
                <label for="opt1">Add Option-1</label>
                <input type="text" name="opt1"  plcaeholder="Enter Option 1" class="form-control"/>
                <label for="opt3">Add Option-2</label>
                <input type="text" name="opt2"  plcaeholder="Enter Option 2" class="form-control"/>
                <label for="opt3">Add Option-3</label>
                <input type="text" name="opt3"  plcaeholder="Enter Option 3" class="form-control"/>
                <label for="opt4">Add Option-4</label>
                <input type="text" name="opt4"  plcaeholder="Enter Option 4" class="form-control"/>
                <label for="ans">Add Answer</label>
                <input type="text" name="ans"  plcaeholder="Enter Answer" class="form-control"/>
            
                <input type="hidden" name="catagory"  value="<?php echo $catagory;?>" plcaeholder="Enter Option 1" class="form-control"/>
                <input type="submit" name="submit"  value="Add" class="mt-3 form-control btn btn-success text-white"/>
            </form>
        </div>

<div class="col-sm-4">
<form action="" method="post" enctype="multipart/form-data">
                <label for="question">Add Question</label>
                <input type="filw" name="questioni"  plcaeholder="Enter question name" class="form-control"/>
                <label for="opt1">Add Option-1</label>
                <input type="file" name="opt1i"  plcaeholder="Upload Option 1" class="form-control"/>
                <label for="opt3">Add Option-2</label>
                <input type="file" name="opt2i"  plcaeholder="Upload Option 2" class="form-control"/>
                <label for="opt3">Add Option-3</label>
                <input type="file" name="opt3i"  plcaeholder="Upload Option 3" class="form-control"/>
                <label for="opt4">Add Option-4</label>
                <input type="file" name="opt4i"  plcaeholder="Upload Option 4" class="form-control"/>
                <label for="ans">Add Answer</label>
                <input type="file" name="ansi"  plcaeholder="Upload Answer" class="form-control"/>
            
                <input type="hidden" name="catagoryi"  value="<?php echo $catagory;?>" plcaeholder="Enter Option 1" class="form-control"/>
                <input type="submit" name="submit2"  value="Add" class="mt-3 form-control btn btn-success text-white"/>
            </form>
</div>
    </div>
            </div>
</div>
<?php include 'footer.html';?>
