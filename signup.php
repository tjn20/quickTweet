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
        <div class="form sigup">
            <header>
                <img src="images/logo.png" alt="">
                <h2>Quick Tweet</h2>
            </header> 
            <div class="error-message">
               
            </div>
            <form action="" autocomplete="off" enctype="multipart/form-data">
                <div class="field">
                    <label>USERNAME</label>
                    <input type="text"   name="username" placeholder="USERNAME">
                    <span></span>
                </div>
                <div class="field">
                    <label>EMAIL</label>
                    <input type="email"  name="email"  placeholder="EMAIL">
                    <span></span>
                </div>
                <div class="field">
                    <label>PASSWORD</label>
                    <input type="password" name="password" placeholder="PASSWORD">
                    <span></span>
                </div>
                <div class="field">
                    <label>Select Image</label>
                    <input type="file" name="img" class="image" >
                </div>
                <div class="field submit">
                    <input type="submit" class="submitBtn" value="Continue To Quick Tweet">
                </div>
            </form>
            <div class="goTo">
                <h4>Already signed up?</h4>
                <a href="login.php">Login now</a>
            </div>
            <div class="loadingAna signup">
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
    <script src="javascript/signup.js"></script>
</body>
</html>