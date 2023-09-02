<?php
include('header.php');
include('connect.php');
include('session.php');
?>

<?php
// print_r($_SESSION);
if(!isset($_SESSION['signedin']) || ($_SESSION['signedin'] == false)){
    $_SESSION['post_perm'] = false;
}
else{
    $_SESSION['post_perm'] = true; //post only if ur signed in
}
?>

<?php 
$cat_id = (int)$_POST['cat_post'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View post</title>
    <link rel = "stylesheet" href = "../css/poststyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src = "./js/post.js" defer></script>
</head>
<body>
    <center>
    <input type="text" oninput="liveSearch()" id="searchbox" placeholder="search for author, post title or content...">
    </center>
    <br><br>


    <form name = "create" method = "post" action = "create_post.php">
        <input type = "text" style = "display:none" name = "cat" id  = "create" value = <?php echo "$cat_id" ?>>
        
        <button id = "sbtn" type="submit">Add Post <i class="fas fa-plus icon"></i></button>
        
    </form>
<form name = "fs" id  = "fs" method = "post" action = "fullpost.php">
<input type = "text" style = "display:none" name = "usernm" id  = "usernm" value = ''>
    <div class="container">
    <input type = 'text' style = 'display:none' id = 'post_id' name = 'post' value = ''>
    <?php
        
        $sql = "select * from post left join category on post.post_cat = category.cat_id where post.post_cat = ?";
        $stmt = mysqli_prepare($con,$sql);
        mysqli_stmt_bind_param($stmt,'i',$cat_id);
        
        $result = mysqli_stmt_execute($stmt);
        if(!$result){
            echo "Backend Error...";
        }
        else{
            $rows = mysqli_stmt_get_result($stmt);
            $count = mysqli_num_rows($rows);
            if($count == 0){
                echo "No posts in this category";
            }
            else{
                while($row = mysqli_fetch_assoc($rows)){
                    $uid = $row['post_by'];
                    $created_at = $row['post_date'];
                    $cat_name = $row['cat_name'];
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
                    <div class="userdetails">
                    <input type = 'text' id='usersend' style = 'display:none' value = <?php echo $username ?>>
                    <p class = "username" >Posted By: <span class = 'userspan'> <?php echo $username ?></span> </p>
                    </div>
                    <!-- <p class = "username" >Posted By: <span id = 'userspan' style = "text-decoration:underline;color:blue;"></span> </p> -->
                    <p class = "created_at">Posted At: <?php echo $created_at ?></p>
                </div>
                <div class="right">
                    <p class = "cat"> <?php echo $cat_name ?></p>
                </div>
            </div>
            <div class="content">
                <div class="title">
     
                    <input type = "text" style = "display:none" value = <?php echo $post_id ?>>
                    <p class = "redirect"><?php echo $post_title ?></p>
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
<script>
    function liveSearch() {
        
        let posts = document.querySelectorAll(".post");
        let search_query = document.getElementById("searchbox").value.toLowerCase();
        for (let i = 0; i < posts.length; i++) {
            let postText = posts[i].textContent.toLowerCase();
            if (postText.includes(search_query)) {
                posts[i].style.display='block';
            } else {
                posts[i].style.display = "none";;
            }
        }
    }
    </script>
</body>
</html>
