<?php
include('session.php');
include('connect.php');
include('fullpost.php');
?>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$reply_content = $_POST['reply'];
$post_id = (int)$_POST['post'];
$uname = $_SESSION['username'];
//$_SESSION['uid']
$sql = "select * from user where uname = '$uname'";
$res = mysqli_query($con,$sql);
$assoc = mysqli_fetch_assoc($res);
$user_id = (int)$assoc['id'];
//nothing's wrong

echo "<script> console.log(2133);</script>";
if(!empty($reply_content)){
    
    $flag = true;
    $invalid_ids = $reply_id - 2;
    $checksql = "select * from reply where reply_content = '$reply_content' and reply_user = '$reply_user' and reply_id > '$invalid_ids'";
    $cquery = mysqli_query($con,$checksql);
    
    //var_dump($reply_content,$uid,$invalid_ids);
    
    if(mysqli_num_rows($cquery) != 0){
        $flag = false;
    }
    if($flag){
$sql = "insert into reply(reply_post,reply_user,reply_content) values(?,?,?)";
$stmt = mysqli_prepare($con,$sql);
mysqli_stmt_bind_param($stmt,'iis',$post_id,$user_id,(string)$user_id);
$query = mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
    }
//header("Location:fullpost.php");//test
if(!$query){
    echo "Error at the backend";
}
}
?>
