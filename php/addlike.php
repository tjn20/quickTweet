<?php
session_start();

if(!isset($_SESSION['unique_id'])){
    header("Location: ../login");
}

include_once "database.php";
/* $user_id=$_SESSION['unique_id'];
 */ 

  $sqlCheck=mysqli_query($conn,"SELECT * FROM users where unique_id={$_SESSION['unique_id']}");

 $sqlrow=mysqli_fetch_assoc($sqlCheck);
$user_id=$sqlrow['user_id']; 
  
/*  $user_id=mysqli_escape_string($conn,$_POST['user_id']);
 */ $tweet_id=mysqli_escape_string($conn,$_POST['tweet_id']);
$likedOrNot=mysqli_escape_string($conn,$_POST['checkLike']);
if(!empty($user_id) && !empty($tweet_id) && !empty($likedOrNot)){
    $updateSqlQuery;
    $updateSqlLikesquery;
   if($likedOrNot==="addLike"){
    $getNumLikes=mysqli_query($conn,"SELECT * FROM tweets where  tweet_id={$tweet_id}");
    $row=mysqli_fetch_assoc($getNumLikes);
$result=$row['likes']+1;
    $updateSqlQuery="UPDATE tweets set likes={$result} where tweet_id={$tweet_id}";
    $updateSqlLikesquery="INSERT INTO likedtweet(tweet_id,user_id) VALUES($tweet_id,$user_id)";
   }
   else{
    $getNumLikes=mysqli_query($conn,"SELECT * FROM tweets where  tweet_id={$tweet_id}");
    $row=mysqli_fetch_assoc($getNumLikes);
if($row['likes']>0){
    $result=$row['likes']-1;}
else{
    $result=0;
}
    $updateSqlQuery="UPDATE tweets set likes={$result} where tweet_id={$tweet_id}";
    $updateSqlLikesquery="DELETE FROM likedtweet where  tweet_id={$tweet_id} AND user_id={$user_id}";
   }

$updateSql=mysqli_query($conn,$updateSqlQuery);
$updateSqlLikes=mysqli_query($conn,$updateSqlLikesquery);
if($updateSql && $updateSqlLikes){
    echo "successfull";
}
}

?>