<?php
session_start();
if(!isset($_SESSION['unique_id'])){
    header("Location: ../login");
}

include_once "database.php";

$tweet=filter_input(INPUT_POST,"tweet",FILTER_SANITIZE_SPECIAL_CHARS);
$tweet=mysqli_escape_string($conn,$tweet); 

if(!empty($tweet)){
    $sql=mysqli_query($conn,"SELECT * FROM users where unique_id={$_SESSION['unique_id']}");
    if(mysqli_num_rows($sql)>0){
        $row=mysqli_fetch_assoc($sql);
        $sql2=mysqli_query($conn,"INSERT INTO tweets(user_id,tweet) values({$row['user_id']},'{$tweet}')");
        if($sql2)
        echo "success";
    }
}

?>