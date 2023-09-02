<?php
include('session.php');
include('header.php');
include('connect.php');
?>
<?php

//insert replies
function created_at($day,$hour,$minute){
    if((int)$day > 0){
        return $day.' days ago';
    }
    if((int)$hour > 0){
        return $hour.' hours ago';
    }
    return $minute.' minutes ago';
}
function next_reply($reply_id){
    include('connect.php');
    $sql = "select * from reply where reply_id = '$reply_id'";
    $query = mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($query)){
        return $row['reply_next'];
    }
    return null;
}
function dfs($reply_id,$post_id){//depth first search
    $reply_id = explode(" ",$reply_id);
    if($reply_id[0] != null){
        include('connect.php');
        //display stuff here
      //  echo $reply_id;
        foreach($reply_id as $r_id){
       // echo "<script> console.log($r_id); </script>";
        $sql = "select * from reply where reply_id = '$r_id'";
        $query = mysqli_query($con,$sql);
        while($rows = mysqli_fetch_assoc($query)){
            $user_id = $rows['reply_user'];
                    $usersql = "select * from user where id = '$user_id'";
                    $user_query = mysqli_query($con,$usersql);
                    $row = mysqli_fetch_assoc($user_query);
                   // echo $_SESSION['username'];
                    $uname = $row['uname'];
                    $reply_time = $rows['reply_time'];
                    $reply_content = $rows['reply_content'];
                    $reply_id = $rows['reply_id'];
                    $indentation = (int)$rows['indentation'];
                    $mlperc = strval($indentation * 5);
                    $timediff = "SELECT TIMESTAMPDIFF(DAY, '$reply_time', NOW()) AS days, TIMESTAMPDIFF(HOUR, '$reply_time', NOW()) AS hours, TIMESTAMPDIFF(MINUTE, '$reply_time', NOW()) AS minutes FROM reply;";
                    $q = mysqli_query($con,$timediff);
                    $time = mysqli_fetch_assoc($q);
                    $day = $time['days'];
                    $hour = $time['hours'];
                    $minute = $time['minutes'];
                    $reply_time = created_at($day,$hour,$minute);
                    ?>
                    <br><br>
        <div class="replies" style =<?php echo "\"margin-left: ".$mlperc.'%"' ?>>
        
            <div class="head">
                <div class="left">
                <input type = 'text' id='usersend' style = 'display:none' value = <?php echo $uname ?>>
                    <p id = 'username'><?php echo $uname ?></p>
                </div>
                <div class="right">
                    <p><?php echo $reply_time; ?></p>
                </div>
            </div>
            <div class="body">
                <p><?php echo $reply_content; ?></p>
                <a class = 'click'><span class = 'hyper'>reply</span></a>
            </div>
      

            <form name = 'freply' method = 'post' action = 'reply_handle.php'>
            <div class="reply-wrapper">
        <input type = 'text' style = 'display:none' name = 'reply_id' value = <?php echo $r_id?>>
        <input type = 'text' style = 'display:none' name = 'post' value = <?php echo $post_id?>>
        <input type = 'text' style = 'display:none' name = 'reply_user' value = <?php echo $$user_id?>>
        <div class="rephead">
            <h3>Leave a Reply</h3>
        </div>
        <div class="repinput">
           <p>Comment</p>
            <textarea name = 'replyto' rows = '8' cols="45" maxlength="65525"></textarea>
        </div>
        <div class="btns">
            <button name = 'discard' type = 'button' class = 'discard'>Discard</button>
            <input type = 'submit' name = 'rbtn' class = 'rbtn' value = 'post' formaction = 'reply_handle.php'>
        </div>
    </div>
            </form>
       
            </div>
        
        <?php
        
        }
        $next_id  = next_reply($reply_id);
        dfs($next_id,$post_id);
        
    }
   
}
}

if(isset($_POST['sbtn'])){
//     ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
$uname = $_SESSION['username'];
$reply_content = $_POST['reply'];
$post_id = (int)$_POST['post'];

$uidselect = "select * from user where uname = '$uname'";
$query = mysqli_query($con,$uidselect);
$row = mysqli_fetch_assoc($query);
$user_id = (int)$row['id']; //$_SESSION['uid']
//print_r($_POST);
$flag = true;

if(!empty($reply_content)){
    $sql = "select * from reply order by reply_id desc";
    $query = mysqli_query($con,$sql);
    $r_id = mysqli_fetch_row($query)[0];
    $reply_id = intval($r_id);
    $invalid_ids = $reply_id - 5;
    $checksql = "select * from reply where reply_content = '$reply_content' and reply_user = '$user_id' and reply_id > '$invalid_ids'";
    $cquery = mysqli_query($con,$checksql);
    
    //var_dump($reply_content,$uid,$invalid_ids);
    
    if(mysqli_num_rows($cquery) != 0){
        $flag = false;
    }

    if($flag){
$sql = "insert into reply(reply_post,reply_user,reply_content) values(?,?,?)";
$stmt = mysqli_prepare($con,$sql);
mysqli_stmt_bind_param($stmt,'iis',$post_id,$user_id,$reply_content);
$query = mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
    }

}
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Designing the post</title>
    <script src="https://kit.fontawesome.com/b49b7c84cf.js" crossorigin="anonymous"></script>
    <link rel = "stylesheet" href = "../css/fullpost.css">
<script src = "./js/fullpost.js" defer></script>
</head>
<body>
    <div class="container">
    <?php
$post_id = (int)$_POST['post']; //id to use
//show the post
// $post_id = $_SESSION['post_id'];

$sql = "select * from post where post_id = ?";
$stmt = mysqli_prepare($con,$sql);
mysqli_stmt_bind_param($stmt,'i',$post_id);
$error = mysqli_stmt_execute($stmt);
if(!$error){
    echo "Error: Problems at the Backend";
}
else{
    
    $result = mysqli_stmt_get_result($stmt);
    while($rows = mysqli_fetch_assoc(($result))){
        $img_src = "../".$rows["post_img"];
        //maybe show the username at the top
        //$img_src = "../assets/img/pokemon.jpg";
    ?>
    <div class="post">
        <div class="title" >
            <p class = "pt" style="
    border-radius: 10px;
    background-color: rgb(85 85 243);
    padding: 20px;
    color: white;
"><?php echo $rows['post_title']; ?></p>
        </div>
        <div class="image">
            <a><img class = "imgc" src = <?php echo $img_src;?> alt="Can't find the post image" > </a>

        </div>
        <div class="content">
            <p class = "cp"><?php echo $rows["post_content"]; ?></p>
        </div>
    </div>
    <?php
    }
}
?>
<!-- Replies not done!! doing  -->  <!--Done-->
    <div class="repsection">
    <form id = "fs" name = "fs" method = "post" action = <?php echo $_SERVER['PHP_SELF']; ?>>
    <br><br>
    <div class="reply">
        <div class="input">
            <h3 style="font-size:larger">Comments:</h3>
            <!--process replies as well-->
            <input type = "text" style = "display:none" name = "usernm" id  = "usernm" value = ''>
            <textarea id = "input" name = "reply" rows="10" cols = "150" placeholder="Add your comments :)"></textarea>
            <input type = "text" style = "display:none"  name = "post"  value = <?php echo $post_id; ?>>
            <input type = 'text' id = 'check' style = 'display:none' value = <?php echo $_SESSION['signedin']?> >
            <button type='button' name='sbtn' id='btn'><i class="fa-solid fa-circle-arrow-right fa-4x"></i></button>
            <p id = 'erralert' style = 'color:red'>You must be signed in to reply</p>
        </div>
            <!-- php here to get data from database-->
            <?php
            // ini_set('display_errors', 1);
            // ini_set('display_startup_errors', 1);
            // error_reporting(E_ALL);
            
            $id = $_POST['post'];
            $sql = "select * from reply where reply_post = '$id' and replied_to is null order by reply_time desc";
//searching the entire depth from the source one at a time
    $query = mysqli_query($con,$sql);
if(!$query){
    echo "Error at the backend";
}
else{
$count= mysqli_num_rows($query);
    if($count == 0){
        echo "no replies yet!";
    }
    else{
while($rows = mysqli_fetch_assoc($query)){
    $reply_id = $rows['reply_id'];
    dfs($reply_id,$post_id);
}
    }
}
        
            ?>
        
    </div>
</form>
    </div>
</div>
<!-- <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script> -->
</body>
</html>