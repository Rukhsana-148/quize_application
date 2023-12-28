<?php
session_start();


$questionno = $_GET['questionno'];

$value = $_GET['value1'];

$_SESSION['answer'][$questiono] = $value;
echo $questionno;
?>