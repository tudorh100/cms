<?php  include_once('includes/db.php');?>




<div class="col-md-4">


<!-- Blog Search Well -->
<div class="well">
    <h4>Blog Search</h4>
    <form action="includes/search.php" method="post">
    <div class="input-group">
        <input type="text"  name="search" class="form-control">
        <span class="input-group-btn">
            <button class="btn btn-default" type="submit" name="submit">
                <span class="glyphicon glyphicon-search"></span>
        </button>
        </span>
    </div>
    </form>
    <!-- /.input-group -->
</div>
<!--login -->
<div class="well">
    <h4>Login</h4>
    <form action="./login.php" method="post">
    <div class="form-group">
        <input type="text"  name="username" class="form-control">
        <span class="input-group-btn">
</div>
<div class="input-group">
<input type="password"  name="password" class="form-control">
<span class="input-group-btn">
            <button class="btn btn-primary" type="submit" name="login">Login</button>
        </span>
    </div>
    </form>
    <!-- /.input-group -->
</div>




<?php
            global $conn;
        $query = "SELECT * FROM `categories`";
        $que = mysqli_query($conn,$query);
        if(!$que){
            die('cannot select categories'. mysqli_error());
        }
                        ?>

<!-- Blog Categories Well -->
<div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-12">
 
            <ul class="list-unstyled">
            <?php

        while($row = mysqli_fetch_assoc($que)){
        $id = $row['cat_id'];
        $title = $row['cat_title'];
            echo "<li>
            <a href='category.php?category=$id'> $title </a>
        </li>";
  
        }
?>
            </ul>
        </div>
        <!-- /.col-lg-6 -->
        
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>

<!-- Side Widget Well -->
<?php include_once('widget.php'); ?>
</div>

