const button=document.querySelector('.createChat'),
form=document.querySelector('form');
addTweetCont=document.querySelector('.createMessage'),
loader=document.querySelector('.loadingAna.chat'),
chatUsers=document.querySelector('.chat-users'),
resultCont=document.querySelector('.message-search-result');
input=document.querySelector('.search-acc-chat input');
cancel=document.querySelector('.stopsearching');

cancel.addEventListener('click',()=>{
    resultCont.innerHTML="";   
    input.value="";
    addTweetCont.classList.toggle('active');

});
button.addEventListener('click',()=>{
    addTweetCont.classList.toggle('active');
    
    });

    form.onsubmit= (e) =>{
e.preventDefault();
    }

    input.addEventListener('keyup',()=>{
if(input.value.length>0){
    loader.style.display="flex";
    const xhr= new XMLHttpRequest();
    xhr.open("POST","php/chatusers.php",true);
    xhr.onreadystatechange= function(){
        if(this.readyState===XMLHttpRequest.DONE){
            if(xhr.status==200 && xhr.readyState==4){
                const response=xhr.response;
                loader.style.display="none";
resultCont.innerHTML=response;
            }
        }
    }

    const formData=new FormData(form);
    xhr.send(formData);

}

else{
    resultCont.innerHTML="";   
}
    });


 setInterval(()=>{
    const xhr= new XMLHttpRequest();
    xhr.open("GET","php/getmessagedusers.php",true);
    xhr.onreadystatechange= function(){
        if(this.readyState===XMLHttpRequest.DONE){
            if(xhr.status==200 && xhr.readyState==4){
                const response=xhr.response;
                chatUsers.innerHTML=response;
            console.log(chatUsers);
            }
        }
    }

    xhr.send();
 },500);   