const form=document.querySelector('form'),
submitBtn=form.querySelector('.submit input'),
errorText=document.querySelector('.error-message'),
 loader=document.querySelector('.loadingAna.login');


form.onsubmit=(e)=>{
e.preventDefault();
}

submitBtn.addEventListener('click',()=>{
    loader.style.display="flex";
    let xhr= new XMLHttpRequest();
   xhr.open('POST','php/login.php',true); 
   xhr.onreadystatechange= function(){
    if(this.readyState===XMLHttpRequest.DONE){
        if(xhr.status==200 && xhr.readyState==4){
            const response=xhr.response;
            loader.style.display="none"; 
            errorText.style.display="flex";
            if(response==="successfull"){
            errorText.classList.add('success');
            errorText.textContent=response;
            setInterval(()=>{
                location.href="home";
            },2000);
           }
           else{
            errorText.classList.remove('success');
            errorText.textContent=response;
           } 
        }  
    }
    }
    
let formData= new FormData(form);
    xhr.send(formData);
});