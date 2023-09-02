<?php
include('session.php');
include('connect.php');
include('header.php');

if(isset($_POST['usernm'])){
    
    $user = $_POST['usernm'];
}
else if (isset($_POST['user'])) {
    $user = $_POST['user'];
   
}
else{
    $user = $_SESSION['username'];
}
$sql = "SELECT * FROM user WHERE uname = '$user'";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($query);
$uid = $row['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($user)."'s page"; ?></title>
    <link rel = 'stylesheet' href = '../css/userstyle.css'>
    <script src = "./js/userscr.js" defer></script>
</head>
<body>
    <div class="user">
        <div class="uname">
            <a id="uname"><?php echo htmlspecialchars($user); ?></a>
        </div>
        <div class="dept">
            <a id="dept"><?php echo htmlspecialchars($row['udept']); ?></a>
        </div>
        <div class="bio">
            <?php
            $bio = $row['bio'];
            if(isset($_POST['usernm']) && !empty($_POST['usernm'])){
            ?>
            <?php if($bio == ''){ ?>
            <p class = "no-bio">No bio available</p>
            <?php } else{?>
                <a id="bio"><?php echo htmlspecialchars($row['bio']); ?></a>
    
           <?php
            } } else{
            if ($bio == '') {
            ?>
            <form name="fs" method="post" action="user_process.php">
                <label for="bio">Bio section</label><br>
                <textarea rows="10" cols="5" name="bio" placeholder="add your bio!"></textarea>
                <input type="submit" value="Add my Bio">
                <p id="msg"></p>
            </form>
            <?php } else { ?>
                <a id="bio"><?php echo htmlspecialchars($row['bio']); ?></a>
            <?php } } ?>
        </div>
        
    </div><hr>
    <div class="posts">
    
        <form name = "fs" id  = "fs" method = "post" action = "fullpost.php">

<div class="container">
<input type = 'text' style = 'display:none' id = 'post_id' name = 'post' value = ''>
<?php
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);
    
    $sqlp = "select * from post left join user on post.post_by = user.id where post_by = ?";
    $stmt = mysqli_prepare($con,$sqlp);
    mysqli_stmt_bind_param($stmt,'i',$uid);
    
    $result = mysqli_stmt_execute($stmt);
    if(!$result){
        echo "Backend Error...";
    }
    else{
        $rows = mysqli_stmt_get_result($stmt);
        $count = mysqli_num_rows($rows);
        if($count == 0){
            echo "No posts has been posted :(";
        }
        else{
            ?>
            <div class="postuser">
                <div class="align">
                <a><?php echo "$user"."'s posts"; ?></a>
                </div>
            </div>
            <?php
            while($row = mysqli_fetch_assoc($rows)){
                $puid = $row['post_by'];
                $created_at = $row['post_date'];
                $cat_name = $row['post_cat'];
                $post_title = $row['post_title'];
                $post_content = $row['post_content'];
                $post_id = $row['post_id'];
                $sql = "select uname from user where id = $uid";
                $user = mysqli_query($con,$sql);
                $username = mysqli_fetch_row($user)[0];
    ?>
    <div class="post">
        <div class="head">
            <div class="left">
                <p class = "username">Posted By: <?php echo $username ?> </p>
                <p class = "created_at">Posted At: <?php echo $created_at ?></p>
            </div>
            <div class="right">
                <p class = "cat"> <?php echo "Category: ".$cat_name ?></p>
            </div>
        </div>
        <div class="content">
            <div class="title">
                <input type = "text" style = "display:none" value = <?php echo $post_id ?>>
                <p class = "redirect"><strong><?php echo $post_title ?></strong></p>
            </div>
            <div class="text">
                <p><?php echo $post_content ?></p>
            </div>
        </div>
    </div>
<?php
            }
        }
    }
?>
</div>
</form>

    </div>
    <?php include('footer.php'); ?>
</body>
</html>
