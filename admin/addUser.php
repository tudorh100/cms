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
if(isset($_POST['add_user'])){
    // $cat_id = $_POST['cat_id'];
    $userFirstname= $_POST['user_firstname'];
    $userLastname= $_POST['user_lastname'];
    $userRole= $_POST['user_role'];

    $username = $_POST['username'];
    $userPassword= $_POST['user_password'];
   
    $userEmail= $_POST['user_email'];
    $userImage= $_POST['image'];;
    if(!empty($userFirstname) && !empty($userLastname)&& !empty($userRole) && !empty($username)&& !empty($userPassword)&& 
    !empty($userEmail) && !empty($userImage)){

  


    //image is he nme coming from the file input and the name is the name of the image file from the iput fiels
  //  $post_image= $_FILES['image'] ['name']; 
    //creatin a temp folder to hose the images
   // $post_image_temp= $_FILES['image']['tmp_name'];


    // $post_date= date('d-m-y');
   
   // $location = 'images/';
    //uploading the image here
//    move_uploaded_file($post_image_temp, "$location.$post_image" );

//hasshing the password here
$userPassword = password_hash($userPassword, PASSWORD_BCRYPT, array('cost'=>12));
   addUser($username,$userPassword,$userFirstname,$userLastname,$userEmail,$userImage,$userRole);
}
}

?>

                    <form action=""  method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Firstname</label>
    <input type="text" class="form-control" name="user_firstname" id="exampleInputEmail1" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Lastname</label>
    <input type="text" class="form-control" name="user_lastname" id="exampleInputEmail1" placeholder="Enter email">

  <div class="form-group">
   
    <label for="exampleInputPassword1">Role</label>
      <select name="user_role" id="" class="form-control">
      <option value='subscriber'>Select  Role</option>
      <option value='admin'>Admin</option>
      <option value='subscriber'>Subscriber  </option>



    </select>

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">username</label>
    <input type="text" class="form-control" name="username" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">password</label>
    <input type="text" class="form-control" name="user_password" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">email</label>
    <input type="email" class="form-control" name="user_email" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputFile">User Image</label>
    <!-- <input type="file" id="exampleInputFile" name="image"> -->
    <input type="text" class="form-control" name="image" id="exampleInputPassword1" placeholder="Password">

    <p class="help-block">Example block-level help text here.</p>
  </div>
  

  
  
  
  <button type="submit" name="add_user" class="btn btn-primary">Add user</button>
</form>





                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   
<?php include_once('includes/footer.php'); ?>