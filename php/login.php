<?php
session_start();

include_once "database.php";
$emailorUsername=filter_input(INPUT_POST,"emailorusername",FILTER_SANITIZE_SPECIAL_CHARS);

$emailorUsername=mysqli_escape_string($conn,$emailorUsername);
$password=mysqli_escape_string($conn,$_POST['password']);

if(!empty($emailorUsername) && !empty($password)){
$sql=mysqli_query($conn,"SELECT * FROM users where email='{$emailorUsername}' or username='{$emailorUsername}'");
if(mysqli_num_rows($sql)>0){
$row=mysqli_fetch_assoc($sql);
if(password_verify($password,$row['password'])){
    $_SESSION['unique_id']=$row['unique_id'];
echo "successfull";
}
else
echo "password is incorrect!";
}
else
echo "Email or Username doesn't exist!";

}
else
echo "Please fill all fields";


?>