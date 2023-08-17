<?php

session_start();

if(!isset($_SESSION['unique_id'])){
    header("Location: ../login");
}

include_once "database.php";

$sqlCheck=mysqli_query($conn,"SELECT * FROM users where unique_id={$_SESSION['unique_id']}");

$sqlrow=mysqli_fetch_assoc($sqlCheck);


$output="";
$sqlCheck=mysqli_query($conn,"SELECT * FROM users where unique_id={$_SESSION['unique_id']}");

$sqlrow=mysqli_fetch_assoc($sqlCheck);
$sql=mysqli_query($conn,"SELECT * FROM follow where follower_user_id={$sqlrow['user_id']}");
if(mysqli_num_rows($sql)>0){
 while($getRow=mysqli_fetch_assoc($sql)){
$sqlGetProfile=mysqli_query($conn,"SELECT * FROM users,tweets where users.user_id={$getRow['followed_user_id']} AND  users.user_id=tweets.user_id order by tweet_id DESC");
while($row=mysqli_fetch_assoc($sqlGetProfile)){
    $sql3=mysqli_query($conn,"SELECT * FROM likedtweet,users where likedtweet.user_id={$sqlrow['user_id']} AND tweet_id={$row['tweet_id']}");

    if(mysqli_num_rows($sql3)>0)
    $result="fas fa-heart";
    else
$result="bx bx-heart likePost";

     $output.='<div class="user">
<img src="php/images/'.$row['img'].'" alt="" onclick="window.location.href=\'profile?username='.$row['username'].'\'">
<div class="user-tweet">
    <h3 onclick="window.location.href=\'profile?username='.$row['username'].'\'">@'.$row['username'].'</h3>
    <p>'.$row['tweet'].'</p>
    <h5><i class="'.$result.'" onclick="likeTweet(this,'. $row['tweet_id'].','.$row['user_id'].')"></i>'.$row['likes'].'</h5>
</div>
</div>'; 
} 
 }
}


echo $output;


?>