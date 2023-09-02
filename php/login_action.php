<?php
include('session.php');
// include('header.php');
include('connect.php');

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

?>

<?php

$username = $_POST['uname'];
$password = $_POST['pass']; //upass --> pass

$success = 0;


if ((!isset($_SESSION['signedin']) || $_SESSION['signedin'] == false) && !isset($_POST['submit_btn'])) {
    
    $sql = "select * from user where uname = ? and upass = ?";
    $stmt = mysqli_prepare($con, $sql);
   
    mysqli_stmt_bind_param($stmt, 'ss', $username, sha1($password));
    
    $result = mysqli_stmt_execute($stmt);
    $r_set = mysqli_stmt_get_result($stmt);
    //check if the credentials are righ t
    
    if (!$result) {
        
        echo "error while retrieving data from the database";
    } else {
        if (mysqli_num_rows($r_set) == 0) { //true --> !=S
            include('login.php');
            ?>
            <script>
                document.getElementById('err').innerHTML = "Wrong user Credentials!";
            </script>
            <?php
            //echo "<p id = 'wrong_creden' style = 'color:red'>Wrong user credentials</p>";
        } else {
            //if the credential are right set the success to 1 which displays the otp section
            include('header.php');
            $success = 1;


            //generate OTP
            require '../php/mailsendersmtp.php';

            $sql = "select uemail from user where uname = ?";
            $stmt = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($stmt, 's', $username);
            $result = mysqli_stmt_execute($stmt);

            if (!$result) {
                echo "Can't access the database.. try again later";
            } else {
                $otp = rand(100000, 999999);

                $result = mysqli_stmt_get_result($stmt);

                $email = mysqli_fetch_row($result)[0];

                $mail_status = sendOTP($email, $otp);

                if ($mail_status == 1) { //true -> $mailstatus

                    $query = "insert into otp_login(otp) values(?)";

                    $stmt = mysqli_prepare($con, $query);
                    mysqli_stmt_bind_param($stmt, 'i', $otp);
                    $result = mysqli_stmt_execute($stmt);
                    $_SESSION['otp_sent'] = true;
                    $current_id = mysqli_insert_id($con);

                    if (!empty($current_id)) {
                        $success = 1; // otp has reached to the mail safely

                    }
                } else {
                    echo "Sorry mail couldn't be sent try again later";
                    echo "Mailer Error:" . $mail_status;
                    $_SESSION['otp_sent'] = false;
                }
            }
        }
    }
}
?>

<?php
//print_r($_SESSION);
$error_msg = '';
if (isset($_POST['submit_btn']) && $_SESSION['otp_sent']) {
    $otp1 = $_POST['otp1'];
    $otp2 = $_POST['otp2'];
    $otp3 = $_POST['otp3'];
    $otp4 = $_POST['otp4'];
    $otp5 = $_POST['otp5'];
    $otp6 = $_POST['otp6'];
    $finalotp = $otp1.$otp2.$otp3.$otp4.$otp5.$otp6;
    $otp = (int)$finalotp;
    $sql = "SELECT * FROM otp_login WHERE otp = ? AND is_expired = 0 AND NOW() <= DATE_ADD(created_at, INTERVAL 15 MINUTE)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $otp);
    $result = mysqli_stmt_execute($stmt);
    if (!$result) {
        echo "Errors in the backend: " . mysqli_error($con);
    } else {
        $data = mysqli_stmt_get_result($stmt);
       
        if (mysqli_num_rows($data) == 0) {
            $success = 1;
            $error_msg = "Either the OTP is wrong or it has expired";
            
        } else {
            
            $success = 2;
        }
        if ($success == 2) {
        
            
            $_SESSION['signedin'] = true;
            $_SESSION['post_perm'] = true;
            $_SESSION['username'] = $username;

            // $sql = "select id from user where uname = ? and upass = ?";
            // $stmt = mysqli_prepare($con,$sql);
            // mysqli_stmt_bind_param($stmt,'ss',$username,sha1($password));
            // $query = mysqli_stmt_get_result($stmt);
           
            // $_SESSION['uid'] = mysqli_fetch_row($query)[0];
            //echo $password;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <link rel = "stylesheet" href = "../css/otpstyle.css">
    <script src = "./js/otpsrc.js" defer></script>
</head>

<body>
    <?php if ($success && isset($_SESSION['otp_sent'])) {
    
    ?>
        <form name='fs' action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post'>
            <div class="otp">
                <h2>OTP Verification</h2>
                <div class='container'>
                <?php
                if ($_SESSION['otp_sent']) {//$success == 1
                ?>
                    <p style="color:green"> OTP has been successfully sent</p>
                    <p>(Check in your spam inbox as well)</p>
                <?php } ?>
                <label for="otp">Enter your OTP</label><br>
                <input type = "text" name = "uname" style = "display:none" value = <?php echo $username; ?> >
                <input type = "text" name = "pass" style= "display:none" value = <?php echo $password; ?>>
                <div class="userotp">
                    <input type = "text" name = "otp1" id = "otp1" maxlength="1" >
                    <input type = "text" name = "otp2" id = "otp2" maxlength="1">
                    <input type = "text" name = "otp3" id = "otp3" maxlength="1">
                    <input type = "text" name = "otp4" id = "otp4" maxlength="1">
                    <input type = "text" name = "otp5" id = "otp5" maxlength="1">
                    <input type = "text" name = "otp6" id = "otp6" maxlength="1">
                </div><br>
                
                <input type="submit" value="Verify" name="submit_btn">
                <?php
                if ($error_msg) {
                ?>
                   
                    <p style="color:red"><?php echo $error_msg ?></p>
                <?php } ?>
                <?php
                if ($_SESSION['signedin']) {
                   
                ?>
                    <p style="color:green">You have successfully logged in</p>
                    <a href="viewcat.php">Go to Forum</a>
                <?php } ?>
                </div>
            </div>
        </form>
    <?php include('footer.php');
} ?>
    <?php
    
    ?>
</body>

</html>