<?php
include('session.php');
include('connect.php');
include('signup.php');
?>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $user_name = $_POST['username'];
    $dept = $_POST['dept'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $password = sha1($password);
    //$response = $_POST['error'];
    if(!$con){
        echo "Error while connecting to the database";
    }
    else{
        //echo "connected to the database";
        $sql = "select * from user where uname = '$user_name'";
        $query = mysqli_query($con,$sql);
        $count = mysqli_num_rows($query);
        if($count != 0){
            $_SESSION['uexists'] = "The given username already exists!";
            sleep(1);
            header("Location:signup.php");
        }
        else{
        $query = "INSERT INTO user(uname,uemail,udept,upass,userlevel) values(?,?,?,?,0)";

        $stprep = mysqli_prepare($con,$query);
        mysqli_stmt_bind_param($stprep,'ssss',$user_name,$email,$dept,$password);
    
        $result = mysqli_stmt_execute($stprep);
      
        if(!$result){
            echo "Something wrong while registering";
        }
        else{
            echo "Successfully Registered";
            header("Location:login.php");
        }
    }}
}

else{
    echo "problems with posting the form";
}
?>