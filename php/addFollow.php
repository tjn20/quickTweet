<?php

session_start();

if(!isset($_SESSION['unique_id'])){
    header("Location: ../login");
}

include_once "database.php";

$type=mysqli_escape_string($conn,$_POST['type']);

$followingUser=mysqli_escape_string($conn,$_POST['followeduser']);

$sqlCheck=mysqli_query($conn,"SELECT * FROM users where unique_id={$_SESSION['unique_id']}");

$sqlrow=mysqli_fetch_assoc($sqlCheck);

if(isset($type) && isset($followingUser)){
    $sqlGet=mysqli_query($conn,"SELECT * FROM users where username='{$followingUser}'");
    $sqlGetRow=mysqli_fetch_assoc($sqlGet);
if($type==="follow"){

    $sqlInsert=mysqli_query($conn,"INSERT INTO follow(followed_user_id,follower_user_id) VALUES({$sqlGetRow['user_id']},{$sqlrow['user_id']})");
    if($sqlInsert){
$newNum=$sqlrow['following']+1;
$newNumFollower=$sqlGetRow['followers']+1;
    $sqlChange=mysqli_query($conn,"UPDATE users set followers={$newNumFollower} where user_id={$sqlGetRow['user_id']}");
    $sqlChange2=mysqli_query($conn,"UPDATE users set following={$newNum} where unique_id={$sqlrow['unique_id']}");
    }

    echo "fail";
}
else{
$sqlDelete=mysqli_query($conn,"DELETE FROM follow where followed_user_id={$sqlGetRow['user_id']}  AND follower_user_id={$sqlrow['user_id']}");
if($sqlDelete){
    if($sqlrow['following']===1)
$newNum=0;
else
    $newNum=$sqlrow['following']-1;
if($sqlGetRow['followers']===0)
$newNumFollower=0;
else
    $newNumFollower=$sqlGetRow['followers']-1;
        $sqlChange=mysqli_query($conn,"UPDATE users set followers={$newNumFollower} where user_id={$sqlGetRow['user_id']}");
        $sqlChange2=mysqli_query($conn,"UPDATE users set following={$newNum} where unique_id={$sqlrow['unique_id']}"); 
}
echo "done";
}


}

?>