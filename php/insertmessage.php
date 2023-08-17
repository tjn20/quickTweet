<?php

session_start();
if(!isset($_SESSION['unique_id'])){
    header("Location: ../login");
}

include_once "database.php";
$message=filter_input(INPUT_POST,"message",FILTER_SANITIZE_SPECIAL_CHARS);
$message=mysqli_escape_string($conn,$message);


$sender_id=$_SESSION['unique_id'];
$receiver_username=mysqli_escape_string($conn,$_POST['receiver_name']);
if(!empty($message)){
$sql=mysqli_query($conn,"SELECT * FROM users where username='{$receiver_username}'");
$row=mysqli_fetch_assoc($sql);
    $sql2=mysqli_query($conn,"INSERT INTO messages(msg_sender_id,msg_receive_id,message) VALUES({$sender_id},{$row['unique_id']},'{$message}')") or die();
}

?>