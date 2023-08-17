const form=document.querySelector('form'),
email=form.querySelector('.email'),
submitBtn=form.querySelector('.submit input'),
loader=document.querySelector('.loadingAna.forgot'),
errorBox=document.querySelector('.error-message');

form.onsubmit =(e) =>{
    e.preventDefault();
}


submitBtn.addEventListener('click',()=>{
    loader.style.display="flex";
    const xhr= new XMLHttpRequest();
    xhr.open("POST","php/forgotpassword.php",true);
    xhr.onreadystatechange =function(){
        if(this.readyState===XMLHttpRequest.DONE){
            if(xhr.status==200 && xhr.readyState==4){
                const response= xhr.response;
                errorBox.style.display="flex";
                loader.style.display="none";
                errorBox.textContent=response;
                if(response==="successfull"){
                   setTimeout(()=>{
                    location.href="otp";
                   },1000);
                }
            }
        }
    }

  const formData = new FormData(form);
    xhr.send(formData);
});