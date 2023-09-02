
let check = document.getElementById('check');

if(check.value){
   // console.log('hf');
    let btn = document.getElementById('btn');
    btn.type = 'submit';
    document.getElementById('erralert').innerHTML = '';
}
let lefts = document.getElementsByClassName('left');
let form = document.getElementById('fs');
for(let left of lefts){
    let username = left.children[1];
    username.onclick = ()=>{
        console.log('clickd');
        let uname = left.children[0];
        let muser = document.getElementById('usernm');
        
        muser.value = uname.value;
        form.action = "user.php"
        form.submit();
        document.getElementById('input').innerHTML = '';
    }
}

let clicks = document.getElementsByClassName('click');
let discards = document.getElementsByClassName('discard');
let reply_wrapper = document.getElementsByClassName('reply-wrapper');
for(let i = 0;i < clicks.length;i++){
    reply_wrapper[i].classList.add('ishidden');
    clicks[i].onclick = ()=>{
        reply_wrapper[i].classList.remove('ishidden');
    }
    discards[i].onclick = ()=>{
        reply_wrapper[i].classList.add('ishidden');
    }
}

