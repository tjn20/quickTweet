const user=document.querySelector('footer .user'),
home=document.querySelector('footer .home'),
mail=document.querySelector('footer .message'),
search=document.querySelector('footer .search'),
moveFooter=document.querySelector('footer span');
mail.addEventListener('click',()=>{
    moveFooter.style.transform="translateX(141px)";
    location.href="chat";
});

home.addEventListener('click',()=>{
    moveFooter.style.transform="translateX(-139px)";
    location.href="home";
});

user.addEventListener('click',()=>{
    moveFooter.style.transform="translateX(48px)";
   getSession("profile");
});

search.addEventListener('click',()=>{
    moveFooter.style.transform="translateX(-44px)";
    location.href="search";

});















function getSession(text){
    let xhr= new XMLHttpRequest();
        xhr.open('POST','php/getsession.php',true); 
        xhr.onreadystatechange= function(){
        if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status==200 && xhr.readyState==4){
                const response=xhr.response;
            if(text==="profile"){
                 location.href="profile?username="+response; 
            }
            }  
        }
    }
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send("move="+text);
}