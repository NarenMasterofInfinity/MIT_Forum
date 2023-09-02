<?php
include('header.php');


?>

<?php
    include('connect.php');
    $response = $_POST['error'];
    $username = $_POST['uname'];
    $password = $_POST['pass'];
    $success = 0;
    $error_msg = "";

if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(!isset($_SESSION['signedin']) && ($_SESSION['signedin'] == false)){
            $sql = "SELECT * from user where uname = $username and upass = sha1($password)";
            $result= mysqli_query($con,$sql);
            if(!$result){
                echo "Problems with logging in";
            }
            else{
                echo "connected";
                if(mysqli_num_rows($result) == 0){
                    echo "Wrong login credentials";
                }

                else{
                    $_SESSION['signedin'] = true;

                    //generate OTP
                    require 'mailsender.php';
                    $email = "oraclenaren2004@gmail.com";
                    $otp = rand(100000,999999);
                    $mail_status = sendOTP($email,$otp);
                    


                    //insert the randomly generated otp into the otp table
                    //only if the message is properly sent
                    if($mail_status == 1){
                        $query = "INSERT INTO otp_login(otp,is_expired) values($otp,0)";
                        $result = mysqli_query($con,$query);

                        $current_id = mysqli_insert_id($con);

                        if(!empty($current_id)){
                            $success = 1;
                        }
                    }

                    //checks if submit button is set
                    //then sees if the otp matches the otp you entered
                    if(!empty($_POST['submit_otp'])){
                        $otp = $_POST['otp'];
                        $query = "SELECT * FROM otp_login WHERE otp = $otp AND is_expired != 1 AND NOW() <= DATE_ADD(created_at,INTERVAL 30 MINUTE)";
                        $result = mysqli_query($con,$query);
                        if(mysqli_num_rows($result) > 0){
                            $query = "UPDATE otp_login SET is_expired = 1 WHERE  otp = $otp";
                            $result = mysqli_query($con,$query);
                            $success = 2;
                        }
                        else{
                            $success = 1;
                            $error_msg = "Invalid OTP";
                        }
                    }

                    //sets some session related stuff
                    while($rows = mysqli_fetch_assoc($res)){
                        $_SESSION['username'] = $rows['uname'];
                        $_SESSION['uid'] = $rows['uid'];
                        $_SESSION['ulevel'] = $rows['ulevel'];
                    }

                }
            }
        }
    
    

}

else{
    echo "Problems at the backend";
}


?>
