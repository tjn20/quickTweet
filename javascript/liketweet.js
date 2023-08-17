/* const likes=document.querySelectorAll('.likePost');

likes.forEach(like=>{
    like.addEventListener('click',()=>{
        like.className=(like.className==="bx bx-heart likePost"?"fas fa-heart likePost":"bx bx-heart likePost");
    });
});
 */


function likeTweet(button,tweet_id,user_id){
    if(button.classList.contains('likePost')){
        console.log(button);
       /*  let xhr= new XMLHttpRequest();
        xhr.open('POST','php/addlike.php',true); 
        xhr.onreadystatechange= function(){
        if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status==200 && xhr.readyState==4){
                const response=xhr.response;
               if(response==="successfull"){
                button.classList.remove('likePost');
                button.className="fas fa-heart";
               }
            }  
        }
    }
        var data = 'tweet_id=' + encodeURIComponent(tweet_id)
               + '&user_id=' + encodeURIComponent(user_id)
               + '&checkLike=' + encodeURIComponent("addLike");

    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(data); */
    update(button,tweet_id,user_id,"addLike");
}
else{
    update(button,tweet_id,user_id,"removeLike");

}
}

function update(button,tweet_id,user_id,text){
    console.log(user_id);
    let xhr= new XMLHttpRequest();
    xhr.open('POST','php/addlike.php',true); 
    xhr.onreadystatechange= function(){
    if(xhr.readyState===XMLHttpRequest.DONE){
        if(xhr.status==200 && xhr.readyState==4){
            const response=xhr.response;
           if(response==="successfull" && text==="addLike"){
            button.classList.remove('likePost');
            button.className="fas fa-heart";
           }
           else if(response==="successfull" && text==="removeLike"){
            button.className="bx bx-heart";
            button.classList.add('likePost');
        
           }
console.log(response);
        }  
    }
}
    var data = 'tweet_id=' + encodeURIComponent(tweet_id)
           + '&user_id=' + encodeURIComponent(user_id)
           + '&checkLike=' + encodeURIComponent(text);

xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
xhr.send(data);
}
