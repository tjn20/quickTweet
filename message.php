
<?php

session_start();

if(!isset($_SESSION['unique_id'])){
    header("Location: login");
}

ini_set('display_errors', 0);


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
    <div class="wrap tweeting twitter messaging page">
        <header>
            <img src="images/logo.png" alt="">
        </header>
       <div class="messaging-section">
        <div class="message-header-section">
        <?php
            include_once "php/database.php";
            $user_username=mysqli_escape_string($conn,$_GET['username']);
            $sql =mysqli_query($conn,"SELECT * FROM users WHERE username='{$user_username}'");
            if(mysqli_num_rows($sql)>0){
                $row=mysqli_fetch_assoc($sql);
if($row['unique_id']===$_SESSION['unique_id'])
$available=false;
else
$available=true;

            }
            else{
                $available=false;

            }
            ?>
            <?php if($available):?>
            <i class="fas fa-caret-left leave"></i>
            <div class="message-header">
                <img src="php/images/<?php echo $row['img']?>" alt="">
            <h4>@<?php echo $row['username']?></h4>  
            </div>
        </div>
       <div class="messaging-field">
       </div>
       </div>
        <form action="#" class="sending-message" autocomplete="off">
            <input type="text" name="receiver_name"  value="<?php echo $user_username; ?>" hidden>
            <input type="text"  name="message"  class="input-field" placeholder="Type a message..">
            <button><i class="fab fa-telegram-plane send-message"></i></button>
        </form>
    </div>
    <script src="javascript/message.js"></script>
    <?php else:?>
<h2 style="text-align: center; font-size:14px; margin-left:35%;">Invalid Username</h2>
<?php endif;?>

</body>
</html>
