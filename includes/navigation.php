<?php 
session_start();

include_once('db.php')  ?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">CMS FRONT</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">


                <?php
            global $conn;
        $query = "SELECT * FROM `categories`";
        $que = mysqli_query($conn,$query);
        if(!$que){
            die('cannot select categories'. mysqli_error());
        }
        while($row = mysqli_fetch_assoc($que)){
          $id = $row['cat_id'];
         $title = $row['cat_title'];
            echo "<li>
            <a href='#'> $title </a>
        </li>";
        }

                ?>
             <li><a href="./admin/index.php">Admin</a> </li>   
              <li><a href="registration.php">Registration</a> </li>


<?php
if(isset($_SESSION['user_role'])){
    if(isset($_GET['p_id'])){
        $post_id = $_GET['p_id'];
        echo"<li>
        <a href='admin/editPost.php?edit=$post_id'>Edit Post </a>
    </li>";
    }
}


?>

                    <!-- <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li> -->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>