let titles= document.getElementsByClassName('title');
for(let title of titles){
    title.onclick = () =>{
        let post_id = title.childNodes[1];
        let post= document.getElementById('post_id');
        post.value = post_id.value;
        document.getElementById('fs').submit();
    }
}
let form = document.getElementById('fs');
let userdivs = document.getElementsByClassName('userdetails');
let username = document.getElementById('usernm');
for(let userdiv of userdivs){
    let btn = userdiv.children[1];
    btn.onclick = ()=>{
        let user_name = userdiv.children[0];
        username.value = user_name.value;
        
        form.action = "user.php";
        form.submit();
    }
}