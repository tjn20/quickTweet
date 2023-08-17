<?php
session_start();
include_once "database.php";

$username=filter_input(INPUT_POST,"username",FILTER_SANITIZE_SPECIAL_CHARS);
$username=mysqli_escape_string($conn,$username);
$email=mysqli_escape_string($conn,$_POST['email']);
$password=mysqli_escape_string($conn,$_POST['password']);
$messageInfo="";
if(!empty($username) && !empty($email) &&  !empty($password)){
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        $sql=mysqli_query($conn,"SELECT * FROM users where email='{$email}'");
        $sql1=mysqli_query($conn,"SELECT * FROM users where username='{$username}'");
        if(mysqli_num_rows($sql)>0)
          
            echo "$email already exists";
        
        
         else if(mysqli_num_rows($sql1)>0){
            echo "$username already exists";
        }
        else{
            if(isset($_FILES['img'])){
                $name=$_FILES['img']['name'];
                $tempName=$_FILES['img']['tmp_name'];

                $img_explode=explode(".",$name);
                $type=end($img_explode);

                $extensions=['png','jpeg','jpg'];

                if(in_array($type,$extensions)===true){
                    $time = time();
                 $newImgName=$time.$name;
                 if(move_uploaded_file($tempName,"images/".$newImgName)){
                    $random_id=rand(time(),10000000);

                    //password hashing

                    $hash=password_hash($password,PASSWORD_BCRYPT);
                    $code = rand(999999, 111111);
                    $status = "not verified";
                   $sqlInsert=mysqli_query($conn,"INSERT INTO users(unique_id,username,email,password,verifCode,status,img) values($random_id,'{$username}','{$email}','{$hash}',{$code},'{$status}','{$newImgName}')");
                if($sqlInsert){
                    $sql3=mysqli_query($conn,"SELECT * FROM users where email='{$email}'");
                    if(mysqli_num_rows($sql3)>0){
                         $row= mysqli_fetch_assoc($sql3);
                       $email_subject="Your verification code";
                       $email_message="Your verification code is {$code}";
                       $sender = "From: tjndocsell@gmail.com";
                       if(mail($email,$email_subject,$email_message,$sender)){
                        $messageInfo.="Your verification code is sent to your email - {$email}";
                        $_SESSION['unique_id']=$row['unique_id']; 
                        $_SESSION['info'] = $messageInfo;
                        echo "successfull"; 
                       }
                       else{
                        echo "failed sending code";

                       }
                     
                    } 
                    else{
                        echo "Something went Wrong! Please try again";

                    }

                }
                else{
                    echo "Something went Wrong! Please try again";
                }
                 }  
                 else{
                    echo "Something went Wrong! Please try again";
                 }

                }
                
                else{
                    echo "Please select an Image file (png,jpeg,jpg)";

                }

            }
        }
        
        
        }
       
    }

else{
echo "Please fill all fields";
}


/* function sendEmail($code,$email,$unique_id){
    $email_subject="Your verification code";
    $email_message="Your verification code is {$code}";
    $sender = "From: tjndocsell@gmail.com";
    $messageInfo="";
    if(mail($email,$email_subject,$email_message,$sender)){
     $messageInfo.="Your verification code is sent to your email - {$email}";
     $_SESSION['unique_id']=$unique_id;//using this session we used user unique id in other php file
     $_SESSION['info'] = $messageInfo;
     echo "successfull";
    }
    else{
        echo "failed sending code";

       }

} */


?>
