<?php
session_start();
if(!isset($_SESSION['unique_id']) && !isset($_SESSION['email'])){
    header("Location: ../login");
}

include_once "database.php";
$code=filter_input(INPUT_POST,"code",FILTER_SANITIZE_SPECIAL_CHARS);

$code=mysqli_escape_string($conn,$code);


if(!empty($code)){
    $_SESSION['info'] = "";
    $check_code = "SELECT * FROM users WHERE verifCode = {$code}";
    $code_q = mysqli_query($conn, $check_code);
    if(mysqli_num_rows($code_q)>0){
        $row=mysqli_fetch_assoc($code_q);
        $newCode=0;
        $newStatus="verified";
        if(isset($_SESSION['unique_id'])){
            $updateSql=mysqli_query($conn,"UPDATE users SET status='{$newStatus}',verifCode={$newCode} where unique_id={$_SESSION['unique_id']}");
            if($updateSql){
                echo "successfull";
            }
            else{
                echo "something went wrong, Try again";
            }
        }
        else{
            $updateSql1=mysqli_query($conn,"UPDATE users SET status='{$newStatus}',verifCode={$newCode} where email='{$_SESSION['email']}'");
            if($updateSql1){
                echo "successfull";
            }
            else{
                echo "something went wrong, Try again";
            }
        }
       
    }
    else{
        echo "Incorrect Code";
    }
}

else{
    echo "Please enter the verification code";

}


?>