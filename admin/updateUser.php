


<?php include_once('includes/functions.php'); ?>

<?php include_once('includes/header.php'); ?>

<?php



if(isset($_POST['update_user'])){
  $userId = $_GET['updateUser'];
  // die('this na the user id'.$userId);
  echo   $firstname= $_POST['user_firstname'];
    $lastname= $_POST['user_lastname'];
    $role= $_POST['user_role'];

    $username = $_POST['username'];
    $password= $_POST['user_password'];
   
    $email= $_POST['user_email'];
    $image= $_POST['image'];
     
    if(!empty($password)){
//selecting the database password here
      $query ="SELECT user_password FROM users WHERE user_id='$userId'";
      $getUser =mysqli_query($conn,$query);
//gettin the row password
      $row = mysqli_fetch_array($getUser); 
      //assigning the row password to a varible
      $dbpass = $row['user_password'];

      //comparin g if the db pass is = the input pass
      if($dbpass != $password){
        // if its not = then hash the password here
        $password = password_hash($password, PASSWORD_BCRYPT, array('cost'=>10));
      }
       //image is he nme coming from the file input and the name is the name of the image file from the iput fiels
    // $post_image= $_FILES['image'] ['name']; 
    //creatin a temp folder to hose the images
    // $post_image_temp= $_FILES['image']['tmp_name'];


    // $post_date= date('d-m-y');
   
    // $location = 'images/';
    //uploading the image here
  //  move_uploaded_file($post_image_temp, "$location.$post_image" );


   updateUser($userId,$username,$password,$firstname,$lastname,$email,$image,$role);
   header('location:viewUser.php');
    }
}
?>
<?php include_once('includes/footer.php'); ?>


?>