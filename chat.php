
<?php
session_start();
if(!isset($_SESSION['unique_id'])){
    header("Location: login");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twitter</title>
<link rel="stylesheet" href="style.css">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>

</head>
<body>
    <div class="wrap tweeting twitter chatting page">
        <header>
            <img src="images/logo.png" alt="">
        </header>
        <div class="chat">
            <h4>Messages</h4>
             <div class="chat-users">
         
            
            </div> 
           </div>
           <button class="add createChat"><i class="fas fa-envelope"></i></button>
           <footer>
               <span></span>
               <i class="fas fa-home home"></i>
               <i class="fas fa-search search"></i>
               <i class="far fa-user user"></i>
               <i class="far fa-envelope message"></i>
              </footer>
        <div class="createMessage">
         <form autocomplete="off">
        <header>
             <button class="stopsearching">Cancel</button>
             <h3>New Message</h3>
         </header>
         <div class="search-acc-chat">
            <span>To:</span>
            <input type="text" name="search-user">
         </div>
        </form> 
        <div class="message-search-result">
            


                <div class="loadingAna chat">
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
        </div>
        <script src="javascript/chat.js"></script> 
        <script src="javascript/footer.js"></script>  

</body>
</html>
