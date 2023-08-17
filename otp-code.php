
<?php
session_start();
 if(!isset($_SESSION['unique_id']) && !isset($_SESSION['email'])){
    header("location: login");
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP verfication</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrap">
        <header> 
            <h2>OTP Verification</h2>
        </header>
        <div class="form otp">
            <div class="error-message sent">
            <?php
echo $_SESSION['info'];
?>
            </div>
            <form autocomplete="off">
            <div class="field">
                <input type="number" name="code" class="code" placeholder="Enter verification code">
                <span></span>
            </div>
            <div class="field submit">
                <input type="submit" value="Submit">
            </div>
            </form>
            <div class="loadingAna otp">
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
    <script src="javascript/otp.js"></script>
</body>
</html>
