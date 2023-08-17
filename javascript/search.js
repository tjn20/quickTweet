
const cancelSearch=document.querySelector('.cancelSearch'),
loader=document.querySelector('.loadingAna.search'),
searchAccCont=document.querySelector('.search-acc');
searchInput=document.querySelector('.field-search input');


searchInput.addEventListener('keyup',()=>{
    if(searchInput.value.length>0){
        loader.style.display="flex";
         const xhr= new XMLHttpRequest();
        xhr.open("POST","php/search.php",true);
        xhr.onreadystatechange= function(){
            if(this.readyState===XMLHttpRequest.DONE){
                if(xhr.status==200 && xhr.readyState==4){
                    const response=xhr.response;
                    loader.style.display="none";
                    searchAccCont.innerHTML=response;
                }
            }
        }
    
        xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
        xhr.send("search-user="+searchInput.value); 
    
    }
    
    else{
        searchAccCont.innerHTML="";   
    }
        });



cancelSearch.addEventListener('click',()=>{
    searchInput.value="";
    searchAccCont.innerHTML="";   

    document.querySelector('.field-search').classList.remove('active');
    document.querySelector('.search-acc').classList.remove('active');

});

searchInput.addEventListener('click',()=>{
    document.querySelector('.field-search').classList.add('active');
    document.querySelector('.search-acc').classList.add('active');
});