<?php

session_start();

if(!isset($_SESSION['unique_id'])){
    header("Location: ../login");
}
include_once "database.php";
$bio=filter_input(INPUT_POST,"bio",FILTER_SANITIZE_SPECIAL_CHARS);
$bio=mysqli_escape_string($conn,$bio);

$sql=mysqli_query($conn,"UPDATE users set bio='{$bio}' where unique_id={$_SESSION['unique_id']}");

if($sql)
echo $bio;
?>