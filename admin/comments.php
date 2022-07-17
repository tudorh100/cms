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

if(isset($_GET['unapprove'])){
    $commentId = $_GET['unapprove'];
    unApprove($commentId);
    header('location:comments.php');
    echo 'comment unapproved successfully';

}

if(isset($_GET['approve'])){
    $commentId = $_GET['approve'];
    Approve($commentId)   ; 
    header('location:comments.php');
    echo 'comment unapproved successfully';

}




// deleteing comment
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    deleteComment($id);
    header('location:comments.php');
    echo 'post deleted successfully';

}

?>

                        
                        <?php
                            global $conn;
                            $select = "SELECT * FROM `comments`";
                            $sel = mysqli_query($conn, $select);
                            if(!$sel){
                                die('cannot selec from cat table'. mysqli_error());
                            }

?>
                        <table class="table  table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    
                                    <th> Author</th>
                                    <th>Email</th>

                                    <th> Comment</th>
                                     <th>Status</th>
                                    <th>In Response To</th>
                                    <th>Date</th>

                                    <th>Approve</th>
                                    <th>UnApprove</th>
                                    <th>Action </th>
                                </tr>
                                
                            </thead>
                            <tbody>

                            <?php

                                while($row=mysqli_fetch_assoc($sel)){
                                    $comment_id = $row['comment_id'];    // getting the comment id here and storing in a var for future use
                                    $comment_post_id = $row['comment_post_id'];
                                    $author = $row['comment_author'];
                                    $email= $row['comment_email'];
                                    $content = $row['comment_content'];
                                    $status = $row['comment_status'];
                                    $date = $row['comment_date'];

                                 //   $post_category_id = $row['post_category_id'];
                                  

                                    ?>

                                    <tr>
                                    <td> <?php echo $comment_id?></td>
                                    <td> <?php echo $author?></td>
                                    <td> <?php echo $email?></td>
                                    <td> <?php echo $content;?></td>
                                    <td> <?php echo $status;?></td>


                                    <!-- fecthvin the post id here from the comment table -->
                                    <?php                     
                                    

                                    $select = "SELECT * FROM post WHERE post_id = $comment_post_id";
                                    $que = mysqli_query($conn,$select);

                                    while($row = mysqli_fetch_assoc($que)){

                                        $title =$row['post_title'];
                                        $post_id =$row['post_id'];

                                        echo "
                                        <td> <a href='../post.php?p_id=$post_id'>$title</a>
                                       </td>";
                                        
                                    }
                                    

                                    ?>

                                    <td> <?php echo $date;?></td>
                                    <td> <a href='comments.php? approve=<?php echo $comment_id;?>' class='btn btn-success btn-sm'>Approve</a> </td>
                                    <td><a href='comments.php? unapprove=<?php echo $comment_id;?>' class='btn btn-primary btn-sm'>UnApprove</a> </td>

                                    

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
          
                            <td> 
                                    <a href='comments.php?delete=<?php echo $comment_id;?>' class='btn btn-danger btn-sm'>Delete</a> 
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

function deleteComment($id){
    global $conn;

    $deleteComment = "DELETE FROM `comments` WHERE comment_id= $id";
    $del = mysqli_query($conn,$deleteComment);
    if(!$del){
        die('canno delete comment'.mysqli_error());
    }
}



                        ?>


        </div>
        <!-- /#page-wrapper -->

   
<?php include_once('includes/footer.php'); ?>