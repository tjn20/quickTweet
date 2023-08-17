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

$sqlFollowers=mysqli_query($conn,"SELECT * FROM follow where followed_user_id={$row['user_id']}");

$num_of_rows=mysqli_num_rows($sqlFollowers);
if($num_of_rows!=$row['followers'])
    $sqlUpdate=mysqli_query($conn,"UPDATE users set followers={$num_of_rows} where user_id={$row['user_id']}");
    echo $row['followers'];
}
?>