<?php
include('session.php');
include('connect.php');
include('user.php');
?>

<?php
$uname = $_SESSION['username'];
$bio = $_POST['bio'];
$sql = "update user set bio = ? where uname = '$uname'";
$stmt = mysqli_prepare($con,$sql);
mysqli_stmt_bind_param($stmt,'s',$bio);
$result = mysqli_stmt_execute($stmt);
if(!$result){
    echo "<p id = 'err' style='color:red'> Can't add bio due to internal troubles</p>";
}
else{
    sleep(1);
    header("Location: user.php");
}
?>