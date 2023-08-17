<?php
session_start();

if(!isset($_SESSION['unique_id'])){
    header("Location: ../login");
}
include_once "database.php";

$output="";

$users=mysqli_escape_string($conn,$_POST['username']);


$sqlCheck=mysqli_query($conn,"SELECT * FROM users where unique_id={$_SESSION['unique_id']}");

$sqlrow=mysqli_fetch_assoc($sqlCheck);


if(isset($users) && $users===$sqlrow['username'])
{
$sql=mysqli_query($conn,"SELECT distinct img,username,tweet,tweets.tweet_id,likes,users.user_id FROM tweets,users,likedtweet where users.user_id=tweets.user_id  order by like_id DESC");
if(mysqli_num_rows($sql)>0){
 while($row=mysqli_fetch_assoc($sql)){

    $sql2=mysqli_query($conn,"SELECT * FROM likedtweet,users where users.user_id=likedtweet.user_id AND username='{$users}' AND tweet_id={$row['tweet_id']}");
    if(mysqli_num_rows($sql2)>0){
    $result="fas fa-heart";
    $output.='<div class="user">
    <img src="php/images/'.$row['img'].'" alt="">
    <div class="user-tweet">
        <h3>@'.$row['username'].'</h3>
        <p>'.$row['tweet'].'</p>
        <h5><i class="'.$result.'" onclick="likeTweet(this,'. $row['tweet_id'].','.$row['user_id'].')"></i>'.$row['likes'].'</h5>
    </div>
    </div>'; 
    }

} 

}
}

else{
    $sql=mysqli_query($conn,"SELECT distinct img,username,tweet,tweets.tweet_id,likes,users.user_id FROM tweets,users,likedtweet where users.user_id=tweets.user_id  order by like_id DESC");
    if(mysqli_num_rows($sql)>0){
     while($row=mysqli_fetch_assoc($sql)){
    
        $sql2=mysqli_query($conn,"SELECT * FROM likedtweet,users where users.user_id=likedtweet.user_id AND username='{$users}' AND tweet_id={$row['tweet_id']}");
        if(mysqli_num_rows($sql2)>0){
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
            <h5><i class="'.$result.'" onclick="likeTweet(this,'. $row['tweet_id'].','.$sqlrow['user_id'].')"></i>'.$row['likes'].'</h5>
        </div>
        </div>'; 
        }
    
    } 
    
    }  
}

echo $output;

?>