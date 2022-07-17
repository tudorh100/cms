<?php include_once('includes/functions.php'); ?>

<?php include_once('includes/header.php'); ?>







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
                            <small> Edit Post </small>
                        </h1>




<!-- editing page -->
 <?php
if(isset($_GET['edit'])){

    $post_id = $_GET['edit'];
}
global $post_id;
    global $conn;

    $getId = "SELECT * FROM `post` WHERE post_id = '$post_id'";

    $get = mysqli_query($conn,$getId);

    if(!$get){
        die('coud not get the update id'.mysqli_error());
    }
    while($row=mysqli_fetch_assoc($get)){

        $categoryId = $row['post_category_id'];
        $postId = $row['post_id'];
        $postTitle = $row['post_title'];
        $postAuthor = $row['post_author'];
        $postStatus = $row['post_status'];
        $postTags = $row['post_tags'];
        $image = $row['post_image'];
        $postContents = $row['post_content'];

?>

 <form action="updatePost.php?update=<?php echo $postId;?>"  method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Post Title</label>
    <input type="text" class="form-control" name="title" value="<?php echo $postTitle;?>" id="exampleInputEmail1" placeholder="Enter email">
  </div>
  
  <div class="form-group">
   
    <label for="exampleInputPassword1">Post Category Id</label>
      <select name="cat_id" id="" class="form-control">
      <option value=''>Select  Category</option>

      <?php   
    
    global $conn;
    $get_row_id = "SELECT * FROM `categories`";
    $get = mysqli_query($conn,$get_row_id);
    if(!$get){
        die('cud not get id'.mysqli_error());
    }
        while($row=mysqli_fetch_assoc($get)){

            $title = $row['cat_title'];
            $cat_id = $row['cat_id'];
            echo " 
            <option value='$cat_id'>$title</option>
            ";

        }


?>

 
    </select>

  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Post Author</label>
    <input type="text" class="form-control" name="author" value="<?php echo $postAuthor;?>" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Post Status</label>


    <select name="status" id="" class="form-control">
      <option value=""> <?php echo $postStatus;?></option>
      <?php  
if($postStatus == 'published'){
  echo "<option value='draft'>Draft</option>";
}else{
  echo "<option value='published'>Published</option>";


}
      ?>


    </select>
    <!-- <input type="text" class="form-control" name="status" id="exampleInputPassword1" value="<?php echo $postStatus;?>" placeholder="Password"> -->
  </div>
  <div class="form-group">
    <label for="exampleInputFile">Post Image</label>
    <input type="file" id="exampleInputFile" name="image">
    <img src="images/.<?php echo $image;?>" alt="" height="90" width="90">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Post Tags</label>
    <input type="text" class="form-control" name="tags" value="<?php echo $postTags;?>" id="exampleInputPassword1" placeholder="Password">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Post Content</label>
    <textarea name="content" id="" cols="30" rows="10" class="form-control"><?php echo $postContents;?></textarea>    
</div>
  
  
  <button type="submit" name="update" class="btn btn-primary">Publish post</button>
</form>
  
      <?php }
      ?>           





                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   
<?php include_once('includes/footer.php'); ?>