<?php  include "includes/functions.php"; ?>
 <?php  include "includes/header.php"; ?>


    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>

    <?php


if(isset($_POST['submit'])){
    global $conn;

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $user = mysqli_real_escape_string($conn,$username);
    $pass = mysqli_real_escape_string($conn,$password);
    $email = mysqli_real_escape_string($conn,$email);


    if(empty($user) && empty($pass) && empty($email)){
        $msg = "<div class='alert alert-danger' text-center role='alert'> Fileds Empty</div>
        ";
    }else{
        $pass = password_hash($pass, PASSWORD_BCRYPT, array('cost'=>12));// the cost is the amount of times it should hash the password
        // die($pass);

                $reg= "INSERT INTO `users`(username, user_password, user_email,user_role)
             VALUES ('$user','$pass','$email','subscriber')";
             $in = mysqli_query($conn,$reg);
             if(!$in){
                 die('could not register user'.mysqli_error());
             }else{
                 $msg = "<div class='alert alert-success' text-center role='alert'> Registartion sucessful</div>
                 ";
             }
        

    }
}


?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                    <?php 
                    if(isset($msg)){
                        echo $msg;
                    }
                    ?>
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
