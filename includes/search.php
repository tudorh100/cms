<?php include_once('db.php');?>

<div class="col-md-4">

<?php
//doing a serach functionality from the database
if(isset($_POST['submit'])){
    global $conn;
    $search = $_POST['search']; //storing the input text from the form into a variable
     $query = "SELECT * FROM `post` WHERE post_tags LIKE '%$search%'";
     $search_query = mysqli_query($conn, $query);
     if(!$search_query){
         die('query failed'.mysqli_error($conn));
     }
     //gettin a row count here
     $count =mysqli_num_rows($search_query); //checking for the ampunt of num of the word found
     if($count == 0){
         echo "<h1> notin found </h1>";
     }else{
         echo 'somenthi found';
     }
}
?>
<!-- Blog Search Well -->
<div class="well">
    <h4>Blog Search</h4>
    <form action="" method="post">
    <div class="input-group">
        <input type="text"  name="search" class="form-control">
        <span class="input-group-btn">
            <button class="btn btn-default" type="submit" name="submit">
                <span class="glyphicon glyphicon-search"></span>
        </button>
        </span>
    </div>
    </form>
    <!-- /.input-group -->
</div>



<!-- Blog Categories Well -->
<div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-6">
            <ul class="list-unstyled">
                <li><a href="#">Category Name</a>
                </li>
                <li><a href="#">Category Name</a>
                </li>
                <li><a href="#">Category Name</a>
                </li>
                <li><a href="#">Category Name</a>
                </li>
            </ul>
        </div>
        <!-- /.col-lg-6 -->
        <div class="col-lg-6">
            <ul class="list-unstyled">
                <li><a href="#">Category Name</a>
                </li>
                <li><a href="#">Category Name</a>
                </li>
                <li><a href="#">Category Name</a>
                </li>
                <li><a href="#">Category Name</a>
                </li>
            </ul>
        </div>
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>

<!-- Side Widget Well -->
<div class="well">
    <h4>Side Widget Well</h4>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
</div>

</div>

