const button=document.querySelector('.add'),
addTweetCont=document.querySelector('.write-tweet'),
cancel=document.querySelector('.f1'),
tweet=document.querySelector('textarea'),
sendTweet=document.querySelector('.sendTweet'),
form1=document.querySelector('.write-tweet form');
form1.onsubmit=(e)=>{
    e.preventDefault();
    }

tweet.addEventListener('keyup',()=>{
    if(tweet.value.length>0){
sendTweet.classList.add('active');
    }
    else
    sendTweet.classList.remove('active');

});


cancel.addEventListener('click',()=>{
    tweet.value="";
    addTweetCont.classList.toggle('active');

});


sendTweet.addEventListener('click',()=>{
   if(sendTweet.classList.contains('active')){
    let xhr= new XMLHttpRequest();
    xhr.open('POST','php/tweet.php',true); 
    xhr.onreadystatechange= function(){
    if(this.readyState===XMLHttpRequest.DONE){
        if(xhr.status==200 && xhr.readyState==4){
            const response=xhr.response;
            if(response==="success"){
                tweet.value="";
                addTweetCont.classList.toggle('active');
            }           
        }  
    }
    }
    
    const formData= new FormData(form1);
xhr.send(formData);
   }
});

button.addEventListener('click',()=>{
addTweetCont.classList.toggle('active');

});


