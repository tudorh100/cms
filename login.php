<?php 
//turning on session here only on the login page but turnin it every wer in the admin section
session_start();
?>

<?php include_once('includes/functions.php');?>

<?php include_once('includes/header.php');?>



    <?php
if(isset($_POST['login'])){

    $user =  $_POST['username'];
    $pass=  $_POST['password'];
    $user = mysqli_real_escape_string($conn,$user);
    $pass = mysqli_real_escape_string($conn,$pass);


    if(empty($user) && empty($user)){
        header('Location:index.php');
    }else{
        //including the database connection here
        global $conn;

//checking if the username and password matches for login
        $select = "SELECT * FROM users WHERE username='$user'";
        $log = mysqli_query($conn,$select);
        if(!$log){
            die('could not select username and password'.mysqli_error());
        }while($row=mysqli_fetch_array($log)){

              $dbId= $row['user_id'];
           $dbUsername= $row['username'];
            $dbUserpassword= $row['user_password'];
           $dbUserfirstname= $row['user_firstname'];
            $dbUserlastname= $row['user_lastname'];
            $dbUserrole= $row['user_role'];
        }
    
        if(password_verify($pass,$dbUserpassword)){

            $_SESSION['username']=$dbUsername;
            $_SESSION['password']=$dbUserpassword;
            $_SESSION['firstname']=$dbUserfirstname;
            $_SESSION['lastname']=$dbUserlastname;
            $_SESSION['user_role']=$dbUserrole;
            header('Location:./admin/index.php');
        }else{
            header('Location:index.php');
        }
         



        }
}


?>





    <?php include_once('includes/footer.php');?>












