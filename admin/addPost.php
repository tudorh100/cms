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
                            <small> Add Post Form</small>
                        </h1>

<?php
if(isset($_POST['create_post'])){
    $cat_id = $_POST['cat_id'];

    $post_title = $_POST['title'];
    $post_author= $_POST['author'];
    //image is he nme coming from the file input and the name is the name of the image file from the iput fiels
    $post_image= $_FILES['image'] ['name']; 
    //creatin a temp folder to hose the images
    $post_image_temp= $_FILES['image']['tmp_name'];

    $post_tags= $_POST['tags'];
    $post_content= $_POST['content'];
    $post_date= date('d-m-y');
    // $post_comment_count= 4;
    $post_status= $_POST['status'];

    $location = 'images/';
    //uploading the image here
   move_uploaded_file($post_image_temp, "$location.$post_image" );


    insertPost($cat_id,$post_title,$post_author, $post_date,
    $post_image,$post_content,$post_tags,$post_status);
    // echo"<div class='panel panel-success'>Post Added Successfully </div>";
    echo "<div class='alert alert-success' role='alert'>
    post addedd
</div>";

}

?>

                    <form action=""  method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Post Title</label>
    <input type="text" class="form-control" name="title" id="exampleInputEmail1" placeholder="Enter email">
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
   
   <label for="exampleInputPassword1">Users</label>
     <select name="cat_id" id="" class="form-control">
     <option value=''>Select  User</option>

     <?php   
   
   global $conn;
   $get_user = "SELECT * FROM `users`";
   $getUser = mysqli_query($conn,$get_user);
   if(!$getUser){
       die('cud not get id'.mysqli_error());
   }
       while($row=mysqli_fetch_assoc($getUser)){

           $username = $row['username'];
           $user_id = $row['user_id'];
           echo " 
           <option value='$user_id'>$username</option>
           ";

       }


?>


   </select>

 </div>
  <!-- <div class="form-group">
    <label for="exampleInputPassword1">Post Author</label>
    <input type="text" class="form-control" name="author" id="exampleInputPassword1" placeholder="Password">
  </div> -->
  <div class="form-group">
    <label for="exampleInputPassword1">Post Status</label>
    <select name="status" id="" class="form-control">
      <option value="">Select Post</option>
    <option value="draft">Draft</option>
    <option value="published">Published</option>
      </select>
  </div>
  <div class="form-group">
    <label for="exampleInputFile">Post Image</label>
    <input type="file" id="exampleInputFile" name="image">
    <p class="help-block">Example block-level help text here.</p>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Post Tags</label>
    <input type="text" class="form-control" name="tags" id="exampleInputPassword1" placeholder="Password">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Post Content</label>
    <textarea name="content" id="editor1" cols="30" rows="10" class="form-control"></textarea>    
</div>
  
  
  <button type="submit" name="create_post" class="btn btn-primary">Publish post</button>
</form>





                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   
<?php include_once('includes/footer.php'); ?>