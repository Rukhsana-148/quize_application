<?php
session_start();
$serverName = "localhost";  
$username = "root";
$password = "";
$dbname = "quize";

$conn = new mysqli($serverName, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$question_no = "";
$question_name = "";
$opt1 = "";
$opt2 = "";
$opt3 = "";
$opt4 = "";
$answer = "";
$count = 0;
$ans = "";
$que_no = $_GET['questionno'];

if(isset($_SESSION['answer'][$que_no])){
    $ans = $_SESSION['answer'][$que_no];
  
}

$sql = "SELECT `id`, `question_no`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `answer`, `catagory` 
FROM `question` WHERE `catagory` = '$_SESSION[exam_category]' && `question_no` = '$_GET[questionno]'" ;
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);

if($count == 0){
    echo "over";
}else{
    if($result == TRUE){
        while($rows = mysqli_fetch_assoc($result)){
            $question_no = $rows['question_no'];
            $question = $rows['question'];
            $opt1 = $rows['opt1'];
            $opt2 = $rows['opt2'];
            $opt3 = $rows['opt3'];
            $opt4 = $rows['opt4'];
          
        
          }
    }?>
<br>
<table>
    <tr>
        <?php echo "(".$question_no.")". $question; ?>
    </tr>
</table>
<table>
    <tr><td>
        <input type="radio" name="r1" id="r1" value="<?php echo $opt1;?>" onclick="radioClick(this.value, <?php echo $question_no; ?>)"
        <?php
       if($ans == $opt1){
        echo "checked";
       }else{
        echo "not";
       }
        ?>>
    </td>
    <td>
        <?php
 if(strpos($opt1, 'optimages/')!=false){?>
<img src="optimages/<?php echo $opt1;?>" height="30" width="30">
 <?php } else{
        echo $opt1;
 }
        ?>
    </td>
</tr>
<tr><td>
        <input type="radio" name="r1" id="r1" value="<?php echo $opt2;?>" onclick="radioClick(this.value, <?php echo $question_no; ?>)"
        <?php
       if($ans == $opt2){
        echo "checked";
       }
        ?>>
    </td>
    <td>
        <?php
 if(strpos($opt2, 'optimages/')!=false){?>
<img src="optimages/<?php echo $opt2;?>" height="30" width="30">
 <?php }else{
        echo $opt2;
 }
        ?>
    </td>
</tr>
<tr><td>
        <input type="radio" name="r1" id="r1" value="<?php echo $opt3;?>"onclick="radioClick(this.value, <?php echo $question_no; ?>)" 
        <?php
       if($ans == $opt3){
        echo "checked";
       }
        ?>>
    </td>
    <td>
        <?php
 if(strpos($opt3, 'optimages/')!=false){?>
<img src="optimages/<?php echo $opt3;?>" height="30" width="30">
 <?php }else{
        echo $opt3;
 }
        ?>
    </td>
</tr>
<tr><td>
        <input type="radio" name="r1" id="r1" value="<?php echo $opt4;?>" onclick="radioClick(this.value, <?php echo $question_no; ?>)"
        <?php
       if($ans == $opt4){
        echo "checked";
       }
        ?>>
    </td>
    <td>
        <?php
 if(strpos($opt4, 'optimages/')!=false){?>
<img src="optimages/<?php echo $opt4;?>" height="30" width="30">
 <?php }else{
        echo $opt4;
 }
        ?>
    </td>
</tr>
</table>
<?php }
?>