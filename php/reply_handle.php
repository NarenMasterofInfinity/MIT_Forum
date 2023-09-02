<?php
include('session.php');
include('fullpost.php');
include('connect.php');
function getId($username){
    include('connect.php');
  
    mysqli_close($con);
    return $res;
}
$reply_content = $_POST['replyto'];
$reply_id = intval($_POST['reply_id']);
$uname = $_SESSION['username'];
//$_SESSION['uid']
$sql = "select * from user where uname = '$uname'";
$res = mysqli_query($con,$sql);
$assoc = mysqli_fetch_assoc($res);
$reply_user = (int)$assoc['id'];
$reply_post = $_POST['post'];
$replied_to = $reply_id;
//update indentation levels, replied_to
//checking if the comment is already present

$flag = true;

$invalid_ids = $reply_id - 5;
$checksql = "select * from reply where reply_content = '$reply_content' and reply_user = '$reply_user' and reply_id > '$invalid_ids'";
$cquery = mysqli_query($con,$checksql);

//var_dump($reply_content,$uid,$invalid_ids);

if(mysqli_num_rows($cquery) != 0){
    $flag = false;
}
if($flag && isset($_SESSION['username'])){
$presql = "select indentation from reply where reply_id = '$reply_id'";
$query = mysqli_query($con,$presql);
$indentation = (int)mysqli_fetch_row($query)[0];
$indentation++;
$sql = "insert into reply(reply_content,reply_user,reply_post,replied_to,indentation) values(?,?,?,?,?)";
$stmt = mysqli_prepare($con,$sql);

$next_id = null;
if($indentation !== null){
    mysqli_stmt_bind_param($stmt,'siiii',$reply_content,$reply_user,$reply_post,$replied_to,$indentation);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    $nsql = "select * from reply order by reply_time desc";
    $nquery = mysqli_query($con,$nsql);
    $next_id = mysqli_fetch_row($nquery)[0];
}
else{
    mysqli_stmt_bind_param($stmt,'siiii',$reply_content,$reply_user,(int)$reply_post,(int)$replied_to,1);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    $nsql = "select * from reply order by reply_time desc";
    $nquery = mysqli_query($con,$nsql);
    $next_id = mysqli_fetch_row($nquery)[0];
}
$sql = "select reply_next from reply where reply_id = '$reply_id'";
$query = mysqli_query($con,$sql);
$next = mysqli_fetch_row($query)[0];
if($next == null){
$sql = "update reply set reply_next = '$next_id' where reply_id = '$reply_id'";
$query = mysqli_query($con,$sql);
}
else{
    $next_id = "$next_id"." "."$next";
    $sql = "update reply set reply_next = '$next_id' where reply_id = '$reply_id'";
    $query = mysqli_query($con,$sql);
}
}
?>