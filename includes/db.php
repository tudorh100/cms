<?php

$conn = mysqli_connect('localhost','root','','cms');
if(!$conn){
    die('db not connecgted'. mysqli_error());
}
?>