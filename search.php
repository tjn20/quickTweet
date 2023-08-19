<?php
session_start();
if(!isset($_SESSION['unique_id'])){
    header("Location: login");
}

include_once "php/database.php";


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
    <div class="wrap tweeting twitter search page">
    <header>
            <img src="images/logo.png" alt="">
        </header>
    <div class="twitter-search">
        <div class="field field-search">
                <?php
            $sql=mysqli_query($conn,"SELECT * FROM users where unique_id={$_SESSION['unique_id']}");
            $row=mysqli_fetch_assoc($sql);

            ?>
            <img src="php/images/<?php echo $row['img']?>" alt="">
            <img src="php/images/1689798034user2.jpg" alt="">
            <input type="text" class="searchinput" placeholder="&#xF002; Search Twitter" style="font-family:Poppins, FontAwesome">
             <button class="cancelSearch">Cancel</button> 
        </div>
          <div class="search-acc">
            <div class="loadingAna search">
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
    <script src="javascript/search.js"></script>
    <script src="javascript/tweet.js"></script>  
<script src="javascript/footer.js"></script>
<script src="javascript/liketweet.js"></script>
</body>
</html>
