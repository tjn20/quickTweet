<?php
session_start();
if(!isset($_SESSION['email'])){
    header("Location: login");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>NEW Password</title>
</head>
<body>
    <div class="wrap">
       <div class="form newPass">
        <header>
            <h2>Create a new password</h2>
        </header>
        <div class="error-message done">
        </div>
       <form autocomplete="off">
        <div class="field">
            <label>Password</label>
            <input type="password"  name="password" placeholder="New Password">
            <span></span>
        </div>
        <div class="field">
            <label>Confirm Password</label>
            <input type="password"  name="conpassword" placeholder="Confirm Password">
            <span></span>
        </div>
        <div class="field submit">
            <input type="submit" class="submitBtn" value="Submit">
        </div>
       </form>
       <div class="loadingAna newp">
                 <div class="spinner center">
                     <div class="spinner-blade"></div>
                     <div class="spinner-blade"></div>
                     <div class="spinner-blade"></div>
                     <div class="spinner-blade"></div>
                     <div class="spinner-blade"></div>
                     <div class="spinner-blade"></div>
                     <div class="spinner-blade"></div>
                     <div class="spinner-blade"></div>
                     <div class="spinner-blade"></div>
                     <div class="spinner-blade"></div>
                     <div class="spinner-blade"></div>
                     <div class="spinner-blade"></div>
                 </div> 
             </div>
       </div>
    </div>
    <script src="javascript/newpassword.js"></script>
</body>
</html>