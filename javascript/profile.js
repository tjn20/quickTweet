const form=document.querySelector('.edit-bio form'),
editBioCont=document.querySelector('.edit-bio'),
bioText=document.querySelector('.bio-text'),
saveBio=document.querySelector('.save-bio'),
cancelBio=document.querySelector('.cancel-bio'),
tweetsSectionBtn=document.querySelector('.tweets'),
tweetsSection=document.querySelector('.profileSection .tweet'),
likedSectionBtn=document.querySelector('.likes'),
likedSection=document.querySelector('.liked-tweet'),
loader=document.querySelector('.loadingAna.addProfBio'),
followingCount=document.querySelector('.following-count'),
profileUsername=document.querySelector('.profile-username'),
profileFieldCont=document.querySelector('.profile-btn'),
 loader2=document.querySelector('.loadingAna.gettingProfileTweets'),
loader3=document.querySelector('.loadingAna.gettingProfileLikedTweets'),
followerCount=document.querySelector('.followers-count');



function goBackBtn(){
    location.href=document.referrer;
}


form.onsubmit=(e)=>{
    e.preventDefault();
}

saveBio.addEventListener('click',()=>{
    loader.style.display="flex";
    let xhr= new XMLHttpRequest();
    xhr.open('POST','php/uploadbio.php',true); 
    xhr.onreadystatechange= function(){
    if(this.readyState===XMLHttpRequest.DONE){
        if(xhr.status==200 && xhr.readyState==4){
            const response=xhr.response;
            loader.style.display="none";
         bioText.innerHTML=response;
         editBioCont.classList.toggle('active');
        }  
    }
    }
    
    const formData= new FormData(form);
xhr.send(formData);

});


function editbio(){
    document.querySelector('.enterBio').value=bioText.innerHTML;
    editBioCont.classList.toggle('active');
}



cancelBio.addEventListener('click',()=>{
    editBioCont.classList.toggle('active');
});



function followUnfollow(action){
    let xhr= new XMLHttpRequest();
    xhr.open('POST','php/addFollow.php',true); 
    xhr.onreadystatechange= function(){
    if(this.readyState===XMLHttpRequest.DONE){
        if(xhr.status==200 && xhr.readyState==4){
            const response=xhr.response;
            console.log(response);
            if (action === 'follow') {
                profileFieldCont.innerHTML = `
                    <button class="following-button" onclick="followUnfollow('unfollow')">
                        Following
                    </button>
                `;
            } else if (action === 'unfollow') {
                profileFieldCont.innerHTML = `
                    <button class="follow-button" onclick="followUnfollow('follow')">
                        Follow
                    </button>
                `;
            }
        }  
    }
    }
    xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
    xhr.send("type="+action+"&followeduser="+profileUsername.textContent);
}



tweetsSectionBtn.addEventListener('click',()=>{
    tweetsSectionBtn.classList.add('clicked');
    likedSectionBtn.classList.remove('clicked');
    tweetsSection.style.display="block";
    likedSection.style.display="none";

});


likedSectionBtn.addEventListener('click',()=>{
    likedSectionBtn.classList.add('clicked');
    tweetsSectionBtn.classList.remove('clicked');
    tweetsSection.style.display="none";
    likedSection.style.display="block";

});


//getting following
setInterval(()=>{
    let xhr= new XMLHttpRequest();
    xhr.open('POST','php/getFollowing.php',true); 
    xhr.onreadystatechange= function(){
    if(this.readyState===XMLHttpRequest.DONE){
        if(xhr.status==200 && xhr.readyState==4){
            const response=xhr.response;
            followingCount.innerHTML=response;
        }  
    }
    }
    xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
    xhr.send("username=" +profileUsername.textContent);
},500);


//getting followers
setInterval(()=>{
    let xhr= new XMLHttpRequest();
    xhr.open('POST','php/getFollowers.php',true); 
    xhr.onreadystatechange= function(){
    if(this.readyState===XMLHttpRequest.DONE){
        if(xhr.status==200 && xhr.readyState==4){
            const response=xhr.response;
            followerCount.innerHTML=response;
        }  
    }
    }
    xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
    xhr.send("username=" +profileUsername.textContent);
},500);


// logout 
function logout(){
    let xhr= new XMLHttpRequest();
    xhr.open('POST','php/logout.php',true); 
    xhr.onreadystatechange= function(){
    if(this.readyState===XMLHttpRequest.DONE){
        if(xhr.status==200 && xhr.readyState==4){
           if(xhr.response==="done")
           location.href="login";
        }  
    }
}
xhr.send();
}




// getting profile tweets 
setInterval(()=>{
    loader2.style.display="flex";
    let xhr= new XMLHttpRequest();
    xhr.open('POST','php/getProfileTweets.php',true); 
    xhr.onreadystatechange= function(){
    if(this.readyState===XMLHttpRequest.DONE){
        if(xhr.status==200 && xhr.readyState==4){
            const response=xhr.response;
            loader2.style.display="none";

            tweetsSection.innerHTML=response;
        }  
    }
    }
    xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
    xhr.send("username=" +profileUsername.textContent);
},600);
 

//get profile liked tweets
setInterval(()=>{
    loader3.style.display="flex";
    let xhr= new XMLHttpRequest();
    xhr.open('POST','php/getlikedtweet.php',true); 
    xhr.onreadystatechange= function(){
    if(this.readyState===XMLHttpRequest.DONE){
        if(xhr.status==200 && xhr.readyState==4){
            const response=xhr.response;
            loader3.style.display="none";
            likedSection.innerHTML=response;
        }  
    }
    }
    xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
    xhr.send("username=" +profileUsername.textContent);
},600);
