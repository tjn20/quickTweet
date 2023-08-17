const form=document.querySelector('form'),
submitBtn=form.querySelector('.submit input'),
errorBox=document.querySelector('.error-message'),
loader=document.querySelector('.loadingAna.newp');

form.onsubmit =(e) =>{
    e.preventDefault();
}


submitBtn.addEventListener('click',()=>{
    loader.style.display="flex";
    const xhr= new XMLHttpRequest();
    xhr.open("POST","php/newpassword.php",true);
    xhr.onreadystatechange =function(){
        if(this.readyState===XMLHttpRequest.DONE){
            if(xhr.status==200 && xhr.readyState==4){
                const response= xhr.response;
                errorBox.textContent=response;
                loader.style.display="none";
                errorBox.style.display="flex";
                if(response==="successfull"){
                    if(!errorBox.classList.contains('done')){
                        errorBox.classList.add('done');
                    }
                    location.href="passwordchanged";
                }
                else{
                    errorBox.classList.remove('done');
                    errorBox.style.display="flex";

                }

            }
        }
    }

  const formData = new FormData(form);
    xhr.send(formData);
});