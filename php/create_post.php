<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a post</title>
    <link rel = "stylesheet" href = "../css/cpost.css">
</head>
<body>
    <?php
    include('session.php');
    include('connect.php');
    include('header.php');
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);
    ?>
    <?php
    if(isset($_SESSION['post_perm']) && $_SESSION['post_perm'] == 1){
    ?>
   

    <form name = "fs" id = "fs" method = "post" action = "process_post.php" enctype = "multipart/form-data">
    <div class="container">
        
        <div class="category">
            <?php
            //get category name and cat id from the category table
            $cat_id = $_POST['cat'];
            $sql = "select cat_name from category where cat_id = '$cat_id'";
            $query = mysqli_query($con,$sql);
            if(!$query){
                echo "Error: ";
            }
            else{
                $cat_name = mysqli_fetch_row($query)[0];
                echo "<h2> Welcome to $cat_name !</h2>";
                echo "<h3>Create a Post</h3>";
            }
            ?>
        </div>
        <input type = "text" style= "display:none" name = "cat_id" value = <?php echo $cat_id ?>>
        <div class="title">
            <input type = "text" placeholder = "Title" name = "title">
        <?php 
        //get image from the user and save it in assets/img then insert it into post 
        //table.. same goes for the content and title 
        ?>
        </div>
        <div class="image">
            <a id = "imga">Image for your post: </a>
        <input type = "file" accept= "image/*" name = "image">
        </div>
        <div class="content">
        <textarea row = "100" col = "200" name = "content" placeholder="Enter your content here"></textarea>
        </div>
        <input type = "submit" value = "Add a post">
    </div>
    </form>
    <?php } 
    else{?>
    <div class="perm">
        <h1>You have to be signed-in to post!</h1>
        <a href = "../php/signup.php">Click here to sign in </a>
    </div>
    <?php
    }?>
</body>
</html>