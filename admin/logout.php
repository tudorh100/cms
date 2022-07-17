<?php 
//turning on session here only on the login page but turnin it every wer in the admin section
session_start();




$_SESSION['username']=null;
$_SESSION['password']=null;
$_SESSION['firsname']=null;
$_SESSION['lastname']=null;
$_SESSION['user_role']=null;

header('Location:../index.php');
?>














