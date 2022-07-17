
<?php include_once('includes/functions.php'); ?>

<?php include_once('includes/header.php'); ?>
<?php include_once('includes/navigation.php'); ?>


<div id="wrapper">

<!-- Navigation -->
<?php include_once('includes/navigation.php'); ?>
    <!-- /.navbar-collapse -->

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                Welcome to admin
                    <small> Subheading</small>
                </h1>

                <?php
    // echo $post_id = $_GET['update'];

if(isset($_POST['update'])){
    $post_id= $_GET['update'];

    $catId = $_POST['cat_id'];

$postTitle = $_POST['title'];
// die($postTitle);

     $postAuthor= $_POST['author'];
    //image is he nme coming from the file input and the name is the name of the image file from the iput fiels
    $post_image= $_FILES['image'] ['name']; 
    //creatin a temp folder to hose the images
    $post_image_temp= $_FILES['image']['tmp_name'];

    $postTags= $_POST['tags'];
    $post_content= $_POST['content'];
    $postStatus=$_POST['status'] ;

    $location = './images/';
    if(file_exists($location.$post_image)){
        echo 'image exist already';
        // header('location:posts.php');
    }else{

          move_uploaded_file($post_image_temp, $location.$post_image);
          $upload = $location.$post_image;

        updatePost($post_id,$catId,$postTitle,$postAuthor,$upload,$post_content,$postTags,$postStatus);
        header('location:posts.php');


    }
  


}

?>


</div>


               
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->


<?php include_once('includes/footer.php'); ?>

