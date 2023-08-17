
<?php

session_start();

if(!isset($_SESSION['unique_id'])){
    header("Location: ../login");
}

include_once "database.php";

$user_id=$_SESSION['unique_id'];

/* $result="";
$sql=mysqli_query($conn,"SELECT * FROM users,messages where (unique_id=msg_sender_id OR unique_id=msg_receive_id) AND unique_id<>{$user_id}");

while($row=mysqli_fetch_assoc($sql)){
    $sql2=mysqli_query($conn,"SELECT * FROM messages WHERE (msg_receive_id={$row['unique_id']}
    OR msg_sender_id={$row['unique_id']}) AND (msg_sender_id={$user_id}
    OR msg_receive_id={$user_id}) ORDER BY message_id DESC LIMIT 1");

$get=mysqli_fetch_assoc($sql2);
if(!mysqli_num_rows($sql2)>0){
    $result="No message";
 }
else{
 (strlen($get['message'])>25)?$msg=substr($get['message'],0,20).'...':$msg=$get['message'];
 (($user_id==$get['msg_sender_id'])?$you="You: ":$you=""); 
}

if($result!="No message"){
    $output.='<a href="message.php?username='.$row['username'].'">
    <img src="php/images/'.$row['img'].'" alt=""><div class="user-message">
    <h5>@'.$row['username'].'</h5><p>'.$you.$msg.'</p></div></a>';
}

}


 echo $output; */

 $result = "";
 $output = "";
 $sql = mysqli_query($conn, "SELECT DISTINCT unique_id, username, img FROM users, messages WHERE (unique_id = msg_sender_id OR unique_id = msg_receive_id) AND unique_id <> {$user_id}");
 
 while ($row = mysqli_fetch_assoc($sql)) {
     $sql2 = mysqli_query($conn, "SELECT * FROM messages WHERE (msg_receive_id = {$row['unique_id']} OR msg_sender_id = {$row['unique_id']}) AND (msg_sender_id = {$user_id} OR msg_receive_id = {$user_id}) ORDER BY message_id DESC LIMIT 1");
 
     $get = mysqli_fetch_assoc($sql2);
     if (!mysqli_num_rows($sql2) > 0) {
         $msg = "No message";
     } else {
         (strlen($get['message']) > 25) ? $msg = substr($get['message'], 0, 20) . '...' : $msg = $get['message'];
         (($user_id == $get['msg_sender_id']) ? $you = "You: " : $you = "");
     }
     if($msg!="No message"){
     $output .= '<a href="message?username=' . $row['username'] . '">
     <img src="php/images/' . $row['img'] . '" alt=""><div class="user-message">
     <h5>@' . $row['username'] . '</h5><p>' . $you . $msg . '</p></div></a>';
     }
 }
 echo $output;

 ?>
