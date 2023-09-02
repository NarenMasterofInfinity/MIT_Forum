<?php
//get title title
//get image image
//get user id probably 
//get post content content
include('session.php');
include('connect.php');
include('create_post.php');


$username = $_SESSION['username'];//$_SESSION['uid'];
$file = $_FILES['image'];
$random = (string)rand(999999,100000000);
$filename = "img".$_POST['cat_id'].$random;
$tmpname = $file['tmp_name'];
$uploaderror = $file['error'];
$extension = pathinfo(basename($file['name']), PATHINFO_EXTENSION);
$dest = "assets/img/".basename($filename).".".$extension;
$location = "/opt/lampp/htdocs/MIT_Forum/".$dest;
if($uploaderror == UPLOAD_ERR_OK){
//     ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

    if(move_uploaded_file($tmpname,$location)){
        echo "";
    }
    else{
        echo "error";
    }
}
else{
    echo "error while uploading the file";
}
$image = "assets/img/".$filename.".".$extension;
$title = $_POST['title'];
$content = $_POST['content'];
$cat_id = $_POST['cat_id'];
$username = $_SESSION['username']; //$_SESSION['uid']
$sql = "select id from user where uname = '$username'";
$res = mysqli_query($con,$sql);
$assoc = mysqli_fetch_assoc($res);
$user_id = $assoc['id'];
$insertq = "INSERT INTO post(post_cat,post_title,post_img,post_content,post_by) values('$cat_id','$title','$image','$content','$user_id')";
$insertin = $con->query($insertq);
if(!$insertin){
    echo "<div class='error'>Error while creating a post</div>";
}
else{
    echo "<div style= 'color:green' class='success'>Post successfully created</div>";
    echo "<a href = '../php/viewcat.php'>Go back to Forum</a>";
}

?>