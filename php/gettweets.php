<?php
session_start();
if(!isset($_SESSION['unique_id'])){
    header("Location: ../login");
}

include_once "database.php";

/* $output="";

$sql=mysqli_query($conn,"SELECT * FROM users,tweets where users.user_id=tweets.user_id  order by tweet_time DESC");
if(mysqli_num_rows($sql)>0){
while( $row=mysqli_fetch_assoc($sql)){
    $output.='<a class="user" href="profile.php?username='.$row['username'].'">
    <img src="php/images/'.$row['img'].'" alt="">
    <div class="user-tweet">
        <h3>@'.$row['username'].'</h3>
        <p>'.$row['tweet'].'</p>
        <h5><i class="bx bx-heart likePost"></i>'.$row['likes'].'</h5>
    </div>
    </a>';


            
}
} */

$output="";
$sqlCheck=mysqli_query($conn,"SELECT * FROM users where unique_id={$_SESSION['unique_id']}");

$sqlrow=mysqli_fetch_assoc($sqlCheck);
$sql=mysqli_query($conn,"SELECT * FROM tweets,users where users.user_id=tweets.user_id  order by tweet_id DESC");
if(mysqli_num_rows($sql)>0){
 while($row=mysqli_fetch_assoc($sql)){

/*     $sql2=mysqli_query($conn,"SELECT * FROM likedtweet where user_id={$_SESSION['unique_id']} AND tweet_id={$row['tweet_id']}");
    if(mysqli_num_rows($sql2)>0)
    $result="fas fa-heart";
else
    $result="bx bx-heart likePost";


     $output.='<div class="user">
<img src="php/images/'.$row['img'].'"   onclick="openProfile(\''.$row['username'].'\')"  alt="">
<div class="user-tweet">
    <h3 onclick="openProfile(\''.$row['username'].'\')">@'.$row['username'].'</h3>
    <p>'.$row['tweet'].'</p>
    <h5><i class="'.$result.'" onclick="likeTweet(this,'. $row['tweet_id'].','.$row['user_id'].')"></i>'.$row['likes'].'</h5>
</div>
</div>';  */


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


echo $output;

?>