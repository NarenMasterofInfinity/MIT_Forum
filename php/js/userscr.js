let posts = document.getElementsByClassName('post');

for(let post of posts){
    post.onclick = ()=>{
        let post_id = post.children[1].children[0].children[0];
        let pst = document.getElementById('post_id');
        pst.value = post_id.value;
        document.getElementById('fs').submit();
    }
}
