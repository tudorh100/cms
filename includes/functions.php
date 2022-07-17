<?php

include_once('db.php');










function insertComment($comment_post_id,$commentName,$commentEmail,$commentContent,$commentStatus,$date){
global $conn;

    $insert = "INSERT INTO `comments`(comment_post_id, comment_author, comment_email, 
    comment_content, comment_status, comment_date) 
    VALUES ('$comment_post_id','$commentName','$commentEmail','$commentContent','$commentStatus',now())";

    $in =mysqli_query($conn,$insert);

    if(!$in){
        die('cud not insert comment'.mysqli_error());
    }
}

//creating a commen count here

function createCommentCount($comment_post_id){

    global $conn;
    $createCount = "UPDATE `post` SET post_comment_count= post_comment_count + 1 WHERE post_id= $comment_post_id";
    $in =mysqli_query($conn,$createCount);

    if(!$in){
        die('cud not update post count'.mysqli_error());
    }
}


// function getEmail($getEmail){

//     global $conn;

//     $userlog = "SELECT * FROM users WHERE user_email='$getEmail'";
//     $log = mysqli_query($conn,$userlog);
//     if(!$log){
//         die('could not log in user'.mysqli_error());
//     }
// $row = mysqli_fecth_array($log)   
// $email = $row['user_email'];
// if($log >0){
    
// }



?>