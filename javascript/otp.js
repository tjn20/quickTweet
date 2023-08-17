const form=document.querySelector('form'),
submit=form.querySelector('.code'),
submitBtn=form.querySelector('.submit input'),
loader=document.querySelector('.loadingAna.otp'),
errorBox=document.querySelector('.error-message');



form.onsubmit =(e) =>{
    e.preventDefault();
}


submitBtn.addEventListener('click',()=>{
    loader.style.display="flex";
    const xhr= new XMLHttpRequest();
    xhr.open("POST","php/otpverify.php",true);
    xhr.onreadystatechange =function(){
        if(this.readyState===XMLHttpRequest.DONE){
            if(xhr.status==200 && xhr.readyState==4){
                const response= xhr.response;
                errorBox.textContent=response;
                loader.style.display="none";
                if(response==="successfull"){
                    errorBox.classList.add('sent');
                    setTimeout(()=>{
                        if(document.referrer==="forgotpassword"){
location.href="newpassword";
                        }
                        else
                        location.href="home";
                    },2000);
                }
             
                else{
                    errorBox.classList.remove('sent');
                }
               

            }
        }
    }

  const formData = new FormData(form);
    xhr.send(formData);
});
