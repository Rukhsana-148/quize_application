<?php
session_start();
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

?>
<?php include 'header.html'; ?>
<div class="question">
<div class="top">
      <div class="row">
        <div class="col-sm-3">
        <p>Quize</p>
        <div id="countdowntimer">
       
        </div>
           
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
        <div class="col-sm-10">
          <h4>Your Quize</h4>
          <div id="totalquestion">Total Question : </div>
        <p>Toatla Time :   <span id="countdown"></span></p>
       
          <div id="loadquestion">Load Question :</div>
          <div id="currentque"></div>
          <input type="button" class="btn btn-warning text-white" value="Previous" onclick="loadPrevious()"/>
          <input type="button" class="btn btn-success text-white" value="Next" onclick="loadNext()"/>
        </div>
        <div class="col-sm-2">
        <div id="show"></div>
        <p id="save"></p>
        </div>
    </div>
</div>
<script type="text/javascript">

</script>
<?php include 'footer.html';?>
<script type="text/javascript">

function showTime(){
  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
     document.getElementById('countdown').innerHTML = this.responseText;
    var time = this.responseText*60;
    setInterval(countDown, 1000);
    function countDown(){
  
      const minutes = Math.floor(time/60);
      let seconds = time%60;
     
        document.getElementById('show').innerHTML = `${minutes} : ${seconds}`;
      time--;
      if(minutes<0){
        window.location = 'result.php';
      }
    }
  
   }
}

xmlhttp.open("GET", "load_timer.php",true);
    xmlhttp.send(null);
}

showTime();



function load_total_question(){
  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
     document.getElementById('totalquestion').innerHTML = this.responseText;
      }
}
xmlhttp.open("GET", "load_total_que.php",true);
    xmlhttp.send(null);
}



var questionno = 1;
load_question(questionno);
function load_question(questionno){
 // document.getElementById('currentque').innerHTML = questionno;
  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
      if(xmlhttp.responseText=="over"){
        window.location = "result.php";
      }else{
        document.getElementById('loadquestion').innerHTML = xmlhttp.responseText;
        load_total_question();
      }
      }
    };
    xmlhttp.open("GET", "load_question.php?questionno="+ questionno,true);
    xmlhttp.send(null);
}

function loadPrevious(){
  if(questionno == "1"){
    load_question(questionno);
  }else{
    questionno = questionno-1;

    load_question(questionno);
  }
}
function loadNext(){
  questionno = eval(questionno)+1;
  load_question(questionno);
}

function radioClick(radiovalue, questionno){
 
  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
      }
}
xmlhttp.open("GET", "save_answer_session.php?questionno="+questionno+"&value1="+radiovalue,true);
    xmlhttp.send(null);
}


</script>