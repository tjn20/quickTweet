<?php
session_start();
if(!isset($_SESSION['unique_id']) && !isset($_SESSION['email']))
header("Location: login");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Changed</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrap">
        <div class="form passchanged">
            <header>
                <img src="images/logo.png" alt="">
            </header>
            <div class="error-message">
                <span>you have changed your password.</span>
                       <span> You can login now</span>
            </div>
            <div class="field submit">
                <input type="submit" class="submitBtn" value="Login">
            </div>
           
           </div>
    </div>
    <script src="javascript/passwordChanged.js"></script>
</body>
</html>

<?php
sleep(10);
session_unset();
session_destroy();
?>