<?php
include('session.php');
include('connect.php');
include('header.php');
?>
<?php
$error = '';
$msg = '';
if(isset($_POST['create'])){
    $username = $_SESSION['username'];
    $sql = "select userlevel from user where uname = '$username'";
    $query = mysqli_query($con,$sql);
    $result = mysqli_fetch_assoc($query);
    $userlevel = $result['userlevel'];
    echo $userlevel;
    if($userlevel == 0){
        $error = "Sorry, you're not authorised to create a category!";
        $msg = "You can mail to <a href = 'mailto:mitforum2023@gmail.com'>MIT Forum Admin</a> to request a category.";
    }    //ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);
    else{
$cat_name = $_POST['catname'];
$file = $_FILES['image'];
$cat_desp = $_POST['cat_desp'];

$random = (string)rand(9999999,1000000000);
$extension = pathinfo(basename($file['name']), PATHINFO_EXTENSION);

$filename = "img".$random;
$tmpname = $file['tmp_name'];
$uploaderror = $file['error'];
$dest = "assets/img/".basename($filename).".".$extension;
$location = "/opt/lampp/htdocs/MIT_Forum/".$dest;

if($uploaderror == UPLOAD_ERR_OK){
//     ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

    if(move_uploaded_file($tmpname,$location)){
        echo "done";
    }
    else{
        echo "error";
    }
}
else{
    echo "error while uploading the file";
}

$sql = "insert into category(cat_name,cat_img,cat_desp) values(?,?,?)";
$stmt = mysqli_prepare($con,$sql);
mysqli_stmt_bind_param($stmt,'sss',$cat_name,$dest,$cat_desp);
$query = mysqli_stmt_execute($stmt);

if(!$query){
    echo "errors";
}
else{
    echo "<p style = 'color:green'>Category Added!</p>";
}
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create category</title>
    <link rel = "stylesheet" href = "../css/ccat.css">
</head>
<body class = 'ccatbody'>
    <h3>Create a category</h3>
    <form name = "fs" id = 'fs' method = "post" action = <?php echo $_SERVER['PHP_SELF'] ?> enctype="multipart/form-data">
    <div class="catname">
        <label>Enter the category name:</label>
        <input type = "text" name = "catname">
    </div>
    <div class="catimg">
        <label>Upload the category image</label>
        <input type = "file" accept = "image/*" name = "image">
    </div>
    <div class="catdesp">
        <label>Enter category description</label><br>
        <textarea name = "cat_desp" rows = "20" cols = "100" placeholer = "Enter category description"></textarea>
    </div>
    <p id = "error"><?php  echo $error; 
    echo $msg;?></p>
    
    <input type = "submit" name = "create" value = "Create">
</form>
</body>
</html>