<?php
session_start();

if(!isset($_SESSION['unique_id'])){
    header("Location: login");
}

include_once "php/database.php";

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
    <div class="wrap tweeting twitter profileSection page">
    <?php 
   
              
                    $user_profile=mysqli_escape_string($conn,$_GET['username']); 
           

 $result;
               if(isset($user_profile)){
               

                $sqlCheck=mysqli_query($conn,"SELECT * FROM users where unique_id={$_SESSION['unique_id']}");
                $sqlrow=mysqli_fetch_assoc($sqlCheck);

                $sessionUser=$sqlrow['user_id'];
$sessionUserImg=$sqlrow['img'];
                if($sqlrow['username']===$user_profile){
                    $sql=mysqli_query($conn,"SELECT * FROM users where unique_id={$_SESSION['unique_id']}");
$result="edit";
                    $row=mysqli_fetch_assoc($sql);
                    $availableUser=true;

               } 
               else{
               
                $sql=mysqli_query($conn,"SELECT * FROM users where username='{$user_profile}'");
                if(mysqli_num_rows($sql)>0){
                $row=mysqli_fetch_assoc($sql);
                $sqLFollow=mysqli_query($conn,"SELECT * FROM follow where followed_user_id={$row['user_id']} AND follower_user_id={$sessionUser}");
if(mysqli_num_rows($sqLFollow)>0)
$result="alreadyFollowing";
else
$result="NotFollowing";
$availableUser=true;
                }
                else{
                    $availableUser=false;
                }
               }
            }
        
                ?>
        <header>
            <img src="images/logo.png" alt="">
        </header>
       <?php if($availableUser):?>
        <div class="profile">
            <div class="profile-header">
            <?php if($result!="edit"):?>
                <i class="fas fa-arrow-left goBack" onclick="goBackBtn()"></i>
                <?php endif; ?>

             <div class="profile-field">
                  <h4   class="profile-username" style="display: none;"><?php  $users=mysqli_escape_string($conn,$_GET['username']);
echo $users;         ?></h4> 
             

           
                 <img src="php/images/<?php echo $row['img']?>" alt="">
                
<div class="profile-btn">

<?php if($result==="edit"): ?>
<button class="own-profile-btn" onclick="editbio()">edit bio</button>
<button class="logoutBtn" onclick="logout()"><i class='bx bx-log-in'></i></button>
<?php elseif($result==="NotFollowing"): ?>
<button class="follow-button" onclick="followUnfollow('follow')">Follow</button>
<?php else:?>
<button class="following-button" onclick="followUnfollow('unfollow')">Following</button>
<?php endif; ?>
</div>
       
             </div>
             <h5>@<?php echo $row['username']?></h5>
             <p class="bio-text"><?php echo $row['bio']?></p>
             <h6><i class="fas fa-calendar-alt"></i> Joined <?php 
             $year=substr($row['joined'], 0, 4);
             $month=substr($row['joined'], 4,4);
             $month=str_replace("-","",$month);
             $month=str_replace("0","",$month);
             $monthName = date('F', mktime(0, 0, 0, $month, 1));

             echo $monthName." ".$year?></h6>
             <div class="profile-follow">
                     <h6><span class="following-count"><?php echo $row['following']?></span> following</h6>
                    <h6><span class="followers-count"><?php echo $row['followers']?></span>followers</h6>
                 </div>
                 <div class="header-field">
                     <h4 class="tweets clicked">Tweets</h4>
                     <h4 class="likes">Likes</h4>
                 </div>
             </div>
                 <div class="profile-tweets">
                     <div class="tweet"> 
                       
                          <div class="loadingAna gettingProfileTweets">
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
                    <div class="liked-tweet"> 
                    
                  
                     <div class="loadingAna gettingProfileLikedTweets">
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
             <button class="add"><i class='bx bx-plus'></i></button>
             <footer>
                 <span class="<?php if($result!="edit") echo "notown"?>"></span>
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
              <img src="php/images/<?php echo $sessionUserImg?>" alt=""> 
             <textarea type="text" placeholder="Tweet quickly!" name="tweet"></textarea>
         </div>
        </form>
     </div>
     <div class="edit-bio">
        <form autocomplete="off">
        <header>
             <button class="cancel-bio">Cancel</button>
             <h3>Edit Profile</h3>
             <button class="save-bio">Save</button>
         </header>
         <div class="add-bio">
             <h4>bio: </h4>
             <input type="text" placeholder="Add bio to your profile" maxlength="200" name="bio" class="enterBio">
         </div>
         <div class="loadingAna addProfBio">
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
        </form>
     </div>
    </div>
    <script src="javascript/footer.js"></script>
    <script src="javascript/liketweet.js"></script>
<script src="javascript/tweet.js"></script>
<script src="javascript/profile.js"></script>
<?php  else:?>
    <h2 style="text-align: center; font-size:20px; margin-top:40px;">@Unavailable user</h2> 
   

<?php endif;?>
</body>
</html>

