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

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    deletePost($id);
    header('location:posts.php');
    echo 'post deleted successfully';

}

?>

                        
                        <?php
                            global $conn;
                            $select = "SELECT * FROM `post`";
                            $sel = mysqli_query($conn, $select);
                            if(!$sel){
                                die('cannot selec from cat table'. mysqli_error());
                            }

?>
                        <table class="table  table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    
                                    <th>Author </th>
                                    <th>Title</th>
                                    <th>Category Id</th>


                                    <th>status</th>
                                    <th>Image</th>
                                    <th>tags</th>
                                    <th>comments</th>
                                    <th>Date</th>
                                    <th>Action </th>
                                </tr>
                                
                            </thead>
                            <tbody>

                            <?php

                                while($row=mysqli_fetch_assoc($sel)){
                                    $post_id = $row['post_id'];
                                    $post_author = $row['post_author'];
                                    $post_title = $row['post_title'];


                                    

                                    $post_category_id = $row['post_category_id'];
                                    $post_date= $row['post_date'];
                                    $post_status= $row['post_status'];
                                    $post_comment= $row['post_comment_count'];
                                    $post_tags= $row['post_tags'];
                                    $post_status= $row['post_status'];
                                    $image= $row['post_image'];
                                    $image= $row['post_image'];



                                    ?>
                                   


                                    <tr>
                                    <td> <?php echo $post_id?></td>
                                    <td> <?php echo $post_author?></td>
                                    <td> <?php echo $post_title?></td>
                                    <td>

                                    <?php
                                     global $conn;
                                     $get_row_id = "SELECT * FROM `categories` WHERE cat_id = $post_category_id";
                                     $get = mysqli_query($conn,$get_row_id);
                                     if(!$get){
                                         die('cud not get id'.mysqli_error());
                                     }
                                         while($row=mysqli_fetch_assoc($get)){
                                 
                                             $title = $row['cat_title'];
                                             $cat_id = $row['cat_id'];
                                             echo $title;
                                         }

?>
                                    </td>

                                    

                            <td> <?php echo $post_status;?></td>
                            <td> <img src='images/.<?php echo $image;?>' class='img-responsive ' height='20' width='90' alt=''>  </td>

                            <td> <?php echo $post_tags;?></td>
                            <td> <?php echo $post_comment;?></td>
                            <td> <?php echo $post_date;?></td>
                            <td> 
                                    <a href='editPost.php? edit=<?php echo $post_id;?>' class='btn btn-primary btn-sm'>Update</a> 
                                    <a href='posts.php?delete=<?php echo $post_id;?>' class='btn btn-danger btn-sm'>Delete</a> 
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

                        function deletePost($id){
                            global $conn;

                            $delete = "DELETE FROM `post` WHERE post_id = '$id'";
                            $del = mysqli_query($conn,$delete);
                            if(!$del){

                                die('post cannot be deleted'.mysqli_error());
                            }else{
                                echo 'post deleted successfully';
                            }

                        }




                        ?>


        </div>
        <!-- /#page-wrapper -->

   
<?php include_once('includes/footer.php'); ?>