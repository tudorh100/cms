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


if(isset($_GET['editUser'])){

  $userId = $_GET['editUser'];
}
global $conn;

$selectUser = "SELECT * FROM `users` WHERE user_id = $userId";
$sel = mysqli_query($conn,$selectUser);

if(!$sel){
  die('could not select user'.mysqli_error());
}
while($row=mysqli_fetch_assoc($sel)){

  $firstname = $row['user_firstname'];
  $lastname = $row['user_lastname'];
  $email = $row['user_email'];
  $password = $row['user_password'];
  $username = $row['username'];
  $role = $row['user_role'];
  $image = $row['user_image'];




?>
                    <form action="updateUser.php?updateUser= <?php echo $userId;?>"  method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Firstname</label>
    <input type="text" class="form-control" name="user_firstname"  value="<?php  echo $firstname; ?>" id="exampleInputEmail1" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Lastname</label>
    <input type="text" class="form-control" name="user_lastname" value="<?php  echo $lastname; ?>" id="exampleInputEmail1" placeholder="Enter email">

  <div class="form-group">
   
    <label for="exampleInputPassword1">Role</label>
      <select name="user_role" id="" class="form-control">
      <option value='<?php  echo $role; ?>'><?php  echo $role; ?></option>
    <?php  
      if($role == 'admin'){
      echo "<option value='Subscriber'>subscriber</option>";
      }else{
        echo "<option value='admin'>admin</option>";

      }
      ?>
    </select>

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">username</label>
    <input type="text" class="form-control" name="username" value="<?php  echo $username; ?>" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">password</label>
    <input type="password" class="form-control" name="user_password" autocomplete="off" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">email</label>
    <input type="email" class="form-control" name="user_email" value="<?php  echo $email; ?>" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputFile">User Image</label>
    <!-- <input type="file" id="exampleInputFile" name="image" > -->
    <input type="text" class="form-control" name="image" value="<?php  echo $image; ?>" id="exampleInputPassword1" placeholder="Password">

    <p class="help-block">Example block-level help text here.</p>
  </div>
  

  
  
  
  <button type="submit" name="update_user" class="btn btn-primary">Update user</button>
</form>
<?php } ?>





                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   
<?php include_once('includes/footer.php'); ?>