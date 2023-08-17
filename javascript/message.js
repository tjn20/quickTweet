const form=document.querySelector('form'),
messageField=document.querySelector('.messaging-field'),
leave=document.querySelector('.leave');
send=form.querySelector('.send-message');


form.onsubmit =(e)=>{
    e.preventDefault();
}

leave.addEventListener('click',()=>{
    location.href="chat";
});


// inserting chat
send.addEventListener('click',()=>{
    const xhr= new XMLHttpRequest();
    xhr.open("POST","php/insertmessage.php",true);
    xhr.onreadystatechange= function(){
        if(this.readyState===XMLHttpRequest.DONE){
            if(xhr.status==200 && xhr.readyState==4){
                const response=xhr.response;
                document.querySelector('.input-field').value="";
                if(!messageField.classList.contains('active')){
                    scrollToBottom();
                 }
           }
        }
    }

    const formData=new FormData(form);
    xhr.send(formData);
});

//getting chat
setInterval(()=>{
    const xhr= new XMLHttpRequest();
    xhr.open("POST","php/getmessage.php",true);
    xhr.onreadystatechange= function(){
        if(this.readyState===XMLHttpRequest.DONE){
            if(xhr.status==200 && xhr.readyState==4){
                const response=xhr.response;
                messageField.innerHTML=response;
                if(!messageField.classList.contains('active')){
                    scrollToBottom();
                 }           }
        }
    }

    const formData=new FormData(form);
    xhr.send(formData);
},400);

function scrollToBottom(){
    messageField.scrollTop=messageField.scrollHeight;
}


messageField.onmouseenter = ()=>{
    messageField.classList.add('active');
}

messageField.onmouseleave = ()=>{
    messageField.classList.remove('active');
}