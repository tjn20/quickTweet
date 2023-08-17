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
    <title>Quick Tweet</title>
<link rel="stylesheet" href="style.css">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
</head>
<body>
<div class="wrap tweeting twitter main home">
    <header>
        <img src="images/logo.png" alt="">
    </header>
    <header class="home-nav">
            <h3 class="communityBtn">Community</h3>
            <h3 class="followingBtn checked">Following</h3>
        </header>
   <div class="tweet"> 
    
   </div>
   <div class="following-tweet">
      
       </div>
    <button class="add"><i class='bx bx-plus'></i></button>
    <footer>
            <span></span>
            <i class="fas fa-home home"></i>
            <i class="fas fa-search search"></i>
            <i class="far fa-user user"></i>
            <i class="far fa-envelope message"></i>
        </footer>
    <div class="write-tweet">
       <form autocomplete="off">
       <header>
            <button class="f1">Cancel</button>
            <button class="sendTweet">Tweet</button>
        </header>
        <div class="add-tweet">
             <img src="php/images/<?php include_once "php/database.php";

$sql=mysqli_query($conn,"SELECT * FROM users where unique_id={$_SESSION['unique_id']}");
if(mysqli_num_rows($sql)>0){
$row=mysqli_fetch_assoc($sql);   
echo $row['img'];
} ?>" alt=""> 
            <textarea type="text" placeholder="Tweet quickly!" name="tweet"></textarea>
        </div>
       </form>
    </div>
</div>  
<script src="javascript/tweet.js"></script>  
<script src="javascript/footer.js"></script>
<script src="javascript/liketweet.js"></script>
<script src="javascript/getMainTweet.js"></script>

</body>
</html>