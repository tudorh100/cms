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
                            <small> Subheading</small>

                            
                        </h1>
<?php

//unapproving comments

if(isset($_GET['subscriber'])){
    $userId = $_GET['subscriber'];
    changeToSubscriber($userId);
        header('location:viewUser.php');
    echo 'subscriber changed successfully';

}

if(isset($_GET['admin'])){
    $userId = $_GET['admin'];
    changeToAdmin($userId);
        header('location:viewUser.php');
    echo 'admin changed successfully';

}




// deleteing user
if(isset($_GET['delete'])){ // geetting the id through the url
    // $id = $_GET['delete'];
    // checking if the session is set
    if(isset($_SESSION['user_role'])){  //checking if session user role is set

        if($_SESSION['user_role'] =='admin'){ /// checking if the session user role = admin before the delete can work

            $id = mysqli_real_escape_string($conn,$_GET['delete']);
            deleteUser($id); //peformin the delete function here

            header('location:viewUser.php');
            $msg = "<div class='alert alert-success' role='alert'>
            deleted successfullly
        </div>";
        
        }
        
    

    }
 
}

?>

                        
                        <?php
                            global $conn;
                            $select = "SELECT * FROM `users`";
                            $sel = mysqli_query($conn, $select);
                            if(!$sel){
                                die('cannot selec from cat table'. mysqli_error());
                            }

?>

                        <table class="table  table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    
                                    <th> username</th>
                                    <th>firstname</th>

                                    <th> lastname</th>
                                     <th>emaill</th>
                                    <th> image</th>
                                    <th>role</th>
                                    <th>Approve</th>
                                    <th>Unapprove</th>
                                    <th>Action </th>
                                </tr>
                                
                            </thead>
                            <tbody>

                            <?php

                                while($row=mysqli_fetch_assoc($sel)){
                                    $user_id = $row['user_id'];    // getting the comment id here and storing in a var for future use
                                    $username = $row['username'];
                                    $firstname = $row['user_firstname'];
                                    $lastname= $row['user_lastname'];
                                    $email = $row['user_email'];
                                    $image = $row['user_image'];
                                    $role = $row['user_role'];

                                 //   $post_category_id = $row['post_category_id'];
                                  

                                    ?>

                                    <tr>
                                    <td> <?php echo $user_id?></td>
                                    <td> <?php echo $username?></td>
                                    <td> <?php echo $firstname?></td>
                                    <td> <?php echo $lastname;?></td>
                                    <td> <?php echo $email;?></td>


                                    <!-- fecthvin the post id here from the comment table -->
                                    <?php                     
                                    

                                    // $select = "SELECT * FROM post WHERE post_id = $comment_post_id";
                                    // $que = mysqli_query($conn,$select);

                                    // while($row = mysqli_fetch_assoc($que)){

                                    //     $title =$row['post_title'];
                                    //     $post_id =$row['post_id'];

                                    //     echo "
                                    //     <td> <a href='../post.php?p_id=$post_id'>$title</a>
                                    //    </td>";
                                        
                                    // }
                                    

                                    ?>
                          <td> <img src='' class='img-responsive ' height='20' width='90' alt=''>  </td>


                                    <td> <?php echo $role;?></td>
                            
                                    

                                    <?php
                                     global $conn;
                                    //  $get_row_id = "SELECT * FROM `categories` WHERE cat_id = $post_category_id";
                                    //  $get = mysqli_query($conn,$get_row_id);
                                    //  if(!$get){
                                    //      die('cud not get id'.mysqli_error());
                                    //  }
                                    //      while($row=mysqli_fetch_assoc($get)){
                                 
                                    //          $title = $row['cat_title'];
                                    //          $cat_id = $row['cat_id'];
                                    //         // echo $title;
                                    //      }

?>
          
                            <td> <a href='viewUser.php?admin=<?php echo $user_id;?>' class='btn btn-success btn-sm'>Admin</a> </td>
                                    <td><a href='viewUser.php?subscriber=<?php echo $user_id;?>' class='btn btn-primary btn-sm'>Subscriber</a> </td>
                                            <td>
                                            <a href='editUser.php?editUser=<?php echo $user_id;?>' class='btn btn-primary btn-sm'>Edit</a> 


                                    <a href='viewUser.php?delete=<?php echo $user_id;?>' class='btn btn-danger btn-sm' onclick="alert('are u sure u want to dlete')">Delete</a> 
                                    </td>

 
                                </tr>
                                <?php
                                }
                            

?>
                                
                            </tbody>
                        </table>

                    </div>
                       
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->


            <?php

function deleteUser($id){
    global $conn;

    $deleteComment = "DELETE FROM `users` WHERE user_id= $id";
    $del = mysqli_query($conn,$deleteComment);
    if(!$del){
        die('canno delete comment'.mysqli_error());
    }
}



                        ?>


        </div>
        <!-- /#page-wrapper -->

   
<?php include_once('includes/footer.php'); ?>