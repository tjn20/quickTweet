<?php

session_start();

if(!isset($_SESSION['unique_id'])){
    header("Location: ../login");
}

include_once "database.php";

$sender_id=$_SESSION['unique_id'];
$receiver_username=mysqli_escape_string($conn,$_POST['receiver_name']);

$output="";

$sql=mysqli_query($conn,"SELECT * FROM users where username='{$receiver_username}'");
$row=mysqli_fetch_assoc($sql);

$sql2=mysqli_query($conn,"SELECT * FROM messages where (msg_sender_id={$sender_id} and msg_receive_id={$row['unique_id']}) or (msg_sender_id={$row['unique_id']} and msg_receive_id={$sender_id}) ORDER BY message_id");



if(mysqli_num_rows($sql2)>0){
    while($get=mysqli_fetch_assoc($sql2)){
        if($get['msg_sender_id']===$sender_id){
            $output.='<div class="message sending">
            <div class="details">
                <p>'.$get['message'].'</p>
            </div>
        </div>';   
                                                                                           
        }
        else{
            $output.='<div class="message coming">
            <div class="details">
                <p>'.$get['message'].'</p>
            </div>
        </div>';
        }
    }
}

echo $output;





?>