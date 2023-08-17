
const tweets=document.querySelector('.tweet'),
followingtweets=document.querySelector('.following-tweet'),
communityBtn=document.querySelector('.communityBtn'),
followingBtn=document.querySelector('.followingBtn');

communityBtn.addEventListener('click',()=>{
    tweets.style.display="block";
followingtweets.style.display="none";
followingBtn.classList.remove('checked');
communityBtn.classList.add('checked');

});


followingBtn.addEventListener('click',()=>{
    tweets.style.display="none";
followingtweets.style.display="block";
communityBtn.classList.remove('checked');
followingBtn.classList.add('checked');
});


function openProfile(text){
    location.href="search?";

}



 setInterval(()=>{
    let xhr= new XMLHttpRequest();
    xhr.open('POST','php/gettweets.php',true); 
    xhr.onreadystatechange= function(){
    if(this.readyState===XMLHttpRequest.DONE){
        if(xhr.status==200 && xhr.readyState==4){
            const response=xhr.response;
           tweets.innerHTML=response;          
        }  
    }
    }
    
xhr.send();
},500);
 

setInterval(()=>{
    let xhr= new XMLHttpRequest();
    xhr.open('POST','php/getFollowingTweets.php',true); 
    xhr.onreadystatechange= function(){
    if(this.readyState===XMLHttpRequest.DONE){
        if(xhr.status==200 && xhr.readyState==4){
            const response=xhr.response;
            followingtweets.innerHTML=response;          
        }  
    }
    }
    
xhr.send();
},500);


function openProfile(username){
location.href="profile?username="+username;


}


