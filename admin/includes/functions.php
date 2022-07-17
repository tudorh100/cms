<?php

include_once('db.php');



//add category
function addCategory($category){
    global $conn;
$inserCat = "INSERT INTO `categories`(cat_title) VALUES ('$category')";
$in = mysqli_query($conn,$inserCat);
if(!$in){
    die('cannot insert into cat table'.mysqli_error());
}


}


//delete category
function deleteCat($the_cat_id){
    global $conn;
    $delete = "DELETE FROM `categories` WHERE cat_id = $the_cat_id";;
    $del = mysqli_query($conn,$delete);
    if(!$del){
        die('cannot delete'.mysqli_error());
    }
}



function getId($cat_id){
    global $conn;
    $get_row_id = "SELECT * FROM `categories` WHERE cat_id = $cat_id";
    $get = mysqli_query($conn,$get_row_id);
    if(!$get){
        die('cud not get id'.mysqli_error());
    }else{
        while($row=mysqli_fetch_assoc($get)){

            $title = $row['cat_title'];
            $cat_id = $row['cat_id'];

            echo " <form action='updateCat.php?update= $cat_id' method='post'>
            <div class='form-group'>
                <label for='cat'>Edit Category</label>
        <input type='text' name='cat_title' value='$title' class='form-control'>

                                            </div>
                                            <div class='form-group'>
        <button type='submit' name='update' class='btn btn-primary'> Update  Category </button>

            </div>
        </form>";

        }
    }
}




function updateCategory($cat_id,$cat_title){
    global $conn;

    $updateCat = "UPDATE `categories` SET cat_title='$cat_title' WHERE cat_id = '$cat_id'";
    $up = mysqli_query($conn,$updateCat);
    if(!$up){
        die('cud not update'.mysqli_error());
    }
}

function insertPost($cat_id,$post_title,$post_author, $post_date,
$post_upload,$post_content,$post_tags,$post_status){
    global $conn;
$insertPost = "INSERT INTO `post`(post_category_id, 
post_title, `post_author`, `post_date`, `post_image`, `post_content`,
 `post_tags`, `post_status`) VALUES
  ('$cat_id','$post_title','$post_author',now(),'$post_upload',
'$post_content','$post_tags','$post_status')";

$in = mysqli_query($conn, $insertPost);
if(!$in){
    die('not inserted into post table'.mysqli_error());
}

}



function getEditId($post_id){

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

        /* "
        
        <form action='updatePost.php'  method='post enctype='multipart/form-data'>
  
        <div class='form-group'>
          <label for='exampleInputEmail1'>Post Title</label>
          <input type='text' class='form-control'  value='$postTitle' name='title' id='exampleInputEmail1' >
        </div>
        <div class='form-group'>
          <label for='exampleInputPassword1'>Post Category Id</label>
          <input type='text' class='form-control' value='$categoryId' name='cat_id' id='exampleInputPassword1' >
        </div>
        <div class='form-group'>
          <label for='exampleInputPassword1'>Post Author</label>
          <input type='text' class='form-control' value='$postAuthor' name='author' id='exampleInputPassword1' 
        </div>
        <div class='form-group'>
          <label for='exampleInputPassword1'>Post Status</label>
          <input type='text' class='form-control' value='$postStatus' name='status' id='exampleInputPassword1' 
        </div>
        <div class='form-group'>
          <label for='exampleInputFile'>Post Image</label>
          <input type='file' id='exampleInputFile' name='image' > 
        <img src='images/.$image' height='90' width='90'>
        </div>
        <div class='form-group'>
          <label for='exampleInputPassword1'>Post Tags</label>
          <input type='text' class='form-control'value='$postTags' name='tags' id='exampleInputPassword1'>
        </div>
      
        <div class='form-group'>
          <label for='exampleInputPassword1'>Post Content</label>
          <textarea name='content' value='$postContents' cols='30' rows='10' class='form-control'>$postContents</textarea>    
      </div>
        
        
        <button type='submit' name='update' class='btn btn-primary' a href='updatePost.php?update=$postId'>Publish post</button>
      </form>
        
        ";

*/
    }
}


function updatePost($post_id,$catId,$postTitle,$postAuthor,$upload,$post_content,$postTags,$postStatus){
    global $conn;

    $updatePost = "UPDATE `post` SET post_category_id='$catId',post_title='$postTitle',
    post_author='$postAuthor',post_image='$upload',post_content='$post_content',
    post_tags='$postTags',post_status='$postStatus' WHERE post_id='$post_id'";
    $up = mysqli_query($conn,$updatePost);

    if(!$up){
        die('could not update poat'.mysqli_error());
    }else{
        echo 'updated succsss';
    }
}


//unapproving comments
function unApprove($commentId){
    global $conn;

    $unapprove = "UPDATE `comments` SET comment_status='unapproved' WHERE comment_id= $commentId";
    $un= mysqli_query($conn, $unapprove);
    if(!$un){
        die('could not unapprove a comment'.mysqli_error());
    }
}


//approving comments
function Approve($commentId){
    global $conn;

    $unapprove = "UPDATE `comments` SET comment_status='approved' WHERE comment_id= $commentId";
    $un= mysqli_query($conn, $unapprove);
    if(!$un){
        die('could not approve a comment'.mysqli_error());
    }
}

function addUser($username,$userPassword,$userFirstname,$userLastname,$userEmail,$userImage,$userRole){
    global $conn;
    
$addUser = "INSERT INTO `users`(username, user_password, user_firstname, user_lastname, user_email, user_image, user_role) 
VALUES ('$username','$userPassword','$userFirstname','$userLastname','$userEmail','$userImage','$userRole')";

$un= mysqli_query($conn, $addUser);

if(!$un){
    die('could not approve a comment'.mysqli_error());
}
}

function changeToAdmin($userId){
    global $conn;

    $change = "UPDATE `users` SET user_role='admin' WHERE user_id= $userId";
    $admin= mysqli_query($conn, $change);
    if(!$admin){
        die('could not approve a comment'.mysqli_error());
    }
}

function changeToSubscriber($userId){
    global $conn;

    $change = "UPDATE `users` SET user_role='subscriber' WHERE user_id= $userId";
    $subscriber= mysqli_query($conn, $change);
    if(!$subscriber){
        die('could not approve a comment'.mysqli_error());
    }
}


function updateUser($userId,$username,$password,$firstname,$lastname,$email,$image,$role){
    global $conn;


    $updateUser = "UPDATE `users` SET username='$username',user_password='$password',user_firstname='$firstname',user_lastname='$lastname',
    user_email='$email',user_image='$image',user_role='$role' WHERE user_id= $userId";
    $up= mysqli_query($conn, $updateUser);
    if(!$up){
        die('could not approve a comment'.mysqli_error());
    }

}



?>