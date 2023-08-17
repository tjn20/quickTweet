<?php

session_start();

if(!isset($_SESSION['unique_id'])){
    header("Location: ../login");
}


include_once "database.php";

$users=mysqli_escape_string($conn,$_POST['username']);
if(isset($users)){
$sql=mysqli_query($conn,"SELECT * FROM users where username='{$users}'");
$row=mysqli_fetch_assoc($sql);

$sqlFollowing=mysqli_query($conn,"SELECT * FROM follow where follower_user_id={$row['user_id']}");

$num_of_rows=mysqli_num_rows($sqlFollowing);
if($num_of_rows!=$row['following'])
    $sqlUpdate=mysqli_query($conn,"UPDATE users set following={$num_of_rows} where user_id={$row['user_id']}");
echo $row['following'];
}
?>