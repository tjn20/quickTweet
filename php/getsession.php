<?php

session_start();
if(!isset($_SESSION['unique_id'])){
    header("Location: ../login");
}

include_once "database.php";

$moveTo=mysqli_escape_string($conn,$_POST['move']);

$sql=mysqli_query($conn,"SELECT * FROM users where unique_id={$_SESSION['unique_id']}");

$row=mysqli_fetch_assoc($sql);

if($moveTo==="profile"){
    echo $row['username'];
}

?>