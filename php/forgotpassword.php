<?php
session_start();
include_once "database.php";

$email=mysqli_escape_string($conn,$_POST['email']);

if(!empty($email)){
  $sql2=mysqli_query($conn,"SELECT * FROM users where email='{$email}'");
  if(mysqli_num_rows($sql2)>0){
    $code = rand(999999, 111111);
    $sql=mysqli_query($conn,"UPDATE users set verifCode={$code} where email='{$email}'");
        $email_subject="Your verification code";
        $email_message="Your verification code is {$code} to reset your password";
        $sender = "From: YOUR_EMAIL";
        $messageInfo="";
        if(mail($email,$email_subject,$email_message,$sender)){
         $messageInfo.="Your verification code is sent to your email - {$email}";
         $sql3=mysqli_query($conn,"SELECT * FROM users where email='{$email}'");
$newSql=mysqli_fetch_assoc($sql3);
         $_SESSION['email']=$email; 
         $_SESSION['info'] = $messageInfo;
         echo "successfull"; 
        }
        else{
         echo "failed sending code";
    
        }
  }
  else{
    echo "This email doesn't exist";
  }
}
else{
    echo "Please enter your email address";
}

?>
