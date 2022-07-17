<?php include_once('includes/header.php');?>


    <!-- Navigation -->

    <?php include_once('includes/navigation.php');?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php

if(isset($_GET['category'])){

    $catId = $_GET['category'];
}
            global $conn;
        $query = "SELECT * FROM `post` WHERE post_category_id = $catId";
        $que = mysqli_query($conn,$query);
        if(!$que){
            die('cannot select categories'. mysqli_error());
        }
        while($row = mysqli_fetch_assoc($que)){
        //   $id = $row['cat_id'];
          $post_id = $row['post_id'];
          $post_title = $row['post_title'];
          $post_author = $row['post_author'];
          $post_date = $row['post_date'];
          $post_image = $row['post_image'];
          $post_content = $row['post_content'];

                ?>

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary text </small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id;?>"><?php echo $post_title;  ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ;  ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ;  ?></p>
                <hr>
                <img class="img-responsive" src=".../images/<?php echo $post_image;?>" width="150"  height= "100" alt="image">
                <hr>
                <p><?php echo $post_content;  ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

        <?php }?>
            </div>

            <!-- Blog Sidebar Widgets Column -->
           
            <?php include_once('includes/sidebar.php');?>
            </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

<?php include_once('includes/footer.php');?>
