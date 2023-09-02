let cats = document.getElementsByClassName('catcontainer');
let cat_post = document.getElementById('cat_post');
let btnn = document.getElementById('butt');


for (let cat of cats) {
    cat.onclick = () => {
        let cat_id = cat.children[1].children[1].children[0];
        cat_post.value = cat_id.value;
        document.getElementById('fs').submit();
    }
}


