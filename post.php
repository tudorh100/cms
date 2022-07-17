<?php 
include_once('includes/functions.php');

include_once('includes/header.php');?>


    <!-- Navigation -->

    <?php include_once('includes/navigation.php');?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php

                if(isset($_GET['p_id'])){
                    $post_id = $_GET['p_id'];

                }

            global $conn;
        $query = "SELECT * FROM `post` WHERE post_id= $post_id";
        $que = mysqli_query($conn,$query);
        if(!$que){
            die('cannot select categories'. mysqli_error());
        }
        while($row = mysqli_fetch_assoc($que)){
        //   $id = $row['cat_id'];
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
                    <a href="#"><?php echo $post_title;  ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ;  ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ;  ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image;?>" width="150" alt="image">
                <hr>
                <p><?php echo $post_content;  ?></p>

                <hr>

        <?php }?>




          <!-- Blog Comments -->

          <?php
          //creatin a comment here realting to a particula post id

if(isset($_POST['create_comment'])){
     $comment_post_id = $_GET['p_id']; //gtting the post id here and storin in the comment table

 $commentName = $_POST['comment_author'];
 $commentEmail = $_POST['comment_email'];
 $commentContent = $_POST['comment_content'];
$commentStatus = ' Unpproved';
$date = date('d-m-y');

if(!empty($commentName) && !empty($commentEmail) && !empty($commentContent)){
    insertComment($comment_post_id,$commentName,$commentEmail,$commentContent,$commentStatus,$date);

createCommentCount($comment_post_id); // function to increment the comment in the db

$msg = "<div class='alert alert-success' role='alert'>Comment Inserted </div>";

}else{
    $msg = "<div class='alert alert-danger' role='alert'>Please Fill the fields </div>";

}

}



?>

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="post">
                    <div class="form-group">
                     <?php   if(isset($msg)){
                         echo $msg;

                     }
                     ?>
                        <label for="">Name</label>
                            <input type="text" name="comment_author" class="form-control">
                        </div>
                        <div class="form-group">
                        <label for="">email</label>
                            <input type="email" name="comment_email" class="form-control">
                        </div>
                        <div class="form-group">
                        <label for="">comment</label>

                            <textarea name="comment_content" class="form-control" id="editor1" rows="3"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->


<?php

if(isset($_GET['p_id'])){

    $commentPostId =$_GET['p_id'];
}
global $conn;

$selectComment ="SELECT * FROM `comments` WHERE  comment_status='approved' && comment_post_id= $commentPostId";
$sel= mysqli_query($conn,$selectComment);
if(!$sel){
    die('could not select comment'.mysqli_error());
}while($row=mysqli_fetch_assoc($sel)){

    $comment = $row['comment_content'];
    $author = $row['comment_author'];
    $date = $row['comment_date'];


?>



                <!-- Comment -->
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <img class="" src="" alt="jjj">
                    </div>  
                    <div class="flex-grow-1 ms-3">
                        <h4> <?php echo $author;?>
                            <small> <?php echo $date;?> </small>
                        </h4>
                        <?php echo $comment;?>
                    </div>

                </div>
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