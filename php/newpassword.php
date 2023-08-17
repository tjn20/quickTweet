<?php
session_start();
if(!isset($_SESSION['email'])){
    header("Location: ../login");
}

include_once "database.php";

$pass=mysqli_escape_string($conn,$_POST['password']);
$Conpass=mysqli_escape_string($conn,$_POST['conpassword']);

if(!empty($pass) && !empty($Conpass)){
if($pass===$Conpass){
    $hash=password_hash($pass,PASSWORD_BCRYPT);
$sql=mysqli_query($conn,"UPDATE users set password='{$hash}' where email='{$_SESSION['email']}'");
if($sql){ 
echo "successfull";
session_unset();
session_destroy();
}
else
echo "Something went wrong, Please try again";
}

else
echo "Passwords not matched!";

}
else{
    echo "Please enter your new password";
}


?>