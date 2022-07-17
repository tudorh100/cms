<?php include_once('includes/functions.php'); ?>

<?php include_once('includes/header.php'); ?>



<?php

if(isset($_POST['submit'])){
     
    $category = $_POST['cat_title'];

    if(empty($category)){
        $message = 'categoo npt suubmited';
    }else{
        addCategory($category);
        $message = 'Category Added Successfully';

    }
}


?>


<?php
if(isset($_POST['update'])){ // update code goes here
$update_title = $_POST['cat_title'];
updateCategory($cat_title);
}

?>



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
                            global $conn;
                            $select = "SELECT * FROM `categories`";
                            $sel = mysqli_query($conn, $select);
                            if(!$sel){
                                die('cannot selec from cat table'. mysqli_error());
                            }



?>

                                    <div class="col-xs-6">
                                    <?php 
                        if(isset($message)){
                            echo $message;
                        }
                         ?>

                                  
                                                                                

                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="cat">Add Category</label>
                                <input type="text" name="cat_title" class="form-control">

                                                                    </div>
                                                                    <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-primary"> Add Category </button>

                                    </div>
                                </form>

                                <?php
                                    // if(isset($_GET['edit'])){ //getin and displayin the update form here

                                    // $cat_id = $_GET['edit']; // getting thr link id
                                    // getId($cat_id); //dsplayin the form here from functions page


                                    //}
                                    ?>



                                

                                </div>  <!-- category form    -->
                                <div class="col-xs-6">
                                <?php  
                                if(isset($deleteMessage)){
                                    echo $deleteMessage;

                                    }
                                    ?>
                        <table class="table  table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php

                                while($row=mysqli_fetch_assoc($sel)){

                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];
                                    echo  "<tr>
                                    <td> $cat_id</td>
                                    <td> $cat_title</td>
                                    <td> 
                                    <a href='categories.php? edit=$cat_id' class='btn btn-primary btn-sm'>Update</a> 
                                    <a href='categories.php? delete=$cat_id' class='btn btn-danger btn-sm' onclick= alert('do u want to delete?')>Delete</a> 
                                    </td>

                                    </td>
                                </tr>";
                                }

?>
                                
                            </tbody>
                        </table>

</div>

<!-- delete -->
<?php 
if(isset($_GET['delete'])){
    $the_cat_id = $_GET['delete'];
    // echo $the_cat_id;
    deleteCat($the_cat_id);
    $deleteMessage = 'deleted successfully';
    header("location:categories.php");

}
?>
                       
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   
<?php include_once('includes/footer.php'); ?>