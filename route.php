<?php


if(isset($_GET['url'])){
    
    $requestedUrl = $_GET['url'];
switch($requestedUrl){

    case " ":
        include "index.php";
        break;

    case "login":{
        include "login.php";
        break;
    }
    case "signup":{
        include "signup.php";
        break;
    } 
    case "search":{
        include "search.php";
        break;
    }
    case "home":{
        include "index.php";
        break;
    }
    case "index":{
        include "index.php";
        break;
    }
    case "forgotpassword":{
        include "forgotpassword.php";
        break;
    }
    case "newpassword":{
        include "newpassword.php";
        break;
    }
    case "otp":{
        include "otp-code.php";
        break;
    }
    case "passwordchanged":{
        include "passwordchanged.php";
        break;
    }

   
    default:{
        include "login.php";
        break;
    }
   
}

}
?>