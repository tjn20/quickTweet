<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semi-Twitter</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="wrap">
        <div class="form login">
            <header>
                <img src="images/logo.png" alt="">
                <h2>Quick Tweet</h2>
            </header> 
            <div class="error-message">
               
               </div>
            <form action="" autocomplete="off">
                <div class="field">
                    <label>USERNAME or EMAIL</label>
                    <input type="text"  name="emailorusername" placeholder="USERNAME or EMAIL">
                    <span></span>
                </div>
                <div class="field pass">
                    <label>PASSWORD</label>
                    <input type="password" placeholder="PASSWORD" name="password">
                    <a href="forgotpassword" class="forgot">Forgot password?</a>
                    <span></span>
                </div>
                <div class="field submit">
                    <input type="submit" value="Continue To Quick Tweet">
                </div>
            </form>
            <div class="goTo">
                <h4>No account?</h4>
                <a href="signup">Sign up now</a>
            </div>
            <div class="loadingAna login">
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
    <script src="javascript/login.js"></script>
</body>
</html>