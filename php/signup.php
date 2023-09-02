<?php
include('session.php');
include('header.php');
if(!isset($_SESSION['uexists']) && ($_SESSION['uexists'])!=''){
    $_SESSION['uexists'] = '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <script src="./js/signupvalidate.js" defer></script>
    <link rel = "stylesheet" href = "../css/signstyle.css">
</head>
<body>
    <div class="container">
    
        <h3>Sign up</h3>
        <form name = "fs" id = "fs" method = "post" action = "sign_action.php">
        <div class="user_n">
          
            <input type = "text" id = "user" placeholder = "Username" name = "username" value = ''>
            <div class="uerror">
                <p id = "unr"></p>
            </div> 
        </div>
        <div class="emailid">
            
            <input type = "email" id = "email" placeholder = "Email Id" name = "email" value = ''>
            <div class = "uerror">
            <p id = "uer"></p>
            </div>
        </div>
        <div class="department">
            <!-- <label for = "dept">Department</label> -->
            <div class="department-title">Department</div>
            <div class="department-objects">
            
                <label><input type = 'radio' name = 'dept' id = 'dept' value = "Information Technology"><span>IT</span></input></label>
                <label><input type = 'radio' name = 'dept' id = 'dept' value = "Information Technology - AI&DS"><span>IT-AI&DS </span></input></label>
                <label><input type = 'radio' name = 'dept' id = 'dept' value = "Computer Technology"><span>CT</span></input></label>
                <label><input type = 'radio' name = 'dept' id = 'dept' value = "Aerospace Engineering"><span>Aero</span></input></label>
                <label><input type = 'radio' name = 'dept' id = 'dept' value = "Production Technology"><span>PT</span></input></label>
                <label><input type = 'radio' name = 'dept' id = 'dept' value = "Production Technology - Robotics and Automation"><span>PT-R&A</span></input></label>
                <label><input type = 'radio' name = 'dept' id = 'dept' value = "Instrumentation Engineering"><span>EIE</span></input></label>
                <label><input type = 'radio' name = 'dept' id = 'dept' value = "Electrical and Communication Engineering"><span>ECE</span></input></label>
                <label><input type = 'radio' name = 'dept' id = 'dept' value = "Automobile Engineering"><span>Auto</span></input></label>
                <label><input type = 'radio' name = 'dept' id = 'dept' value = "Mechanical Engineering"><span>Mech</span></input></label>

            </div>
            <div class="uerror">
                <p id = "udr"></p>
            </div>
        </div>
        <div class="password">
          
            <input type = "password" id = "pass" placeholder = "password" name = "pass">
            <div class="uerror">
                <p id="upr"></p>
            </div>
        </div>
        <div class="cpassword">
           
            <input type = "password" id = "cpass" placeholder = "confirm password" name = "cpass">
            <div class="uerror">
                <p id="ucpr"></p>
            </div>
        </div>
        <p style = 'color:red'><?php 
        echo $_SESSION['uexists'];
        $_SESSION['uexists'] = '';?></p>
        <input type = "hidden" value = "" name = "errors" id = "error">
        <div class="submit">
            <input type = "button" value = "Sign Up" id = "submit">
        </div><br><br>
        <a>If you already have an account,</a>
        <a href = "../php/login.php">Click here to login</a>
        </form>
    </div>
    <?php
    include('footer.php');
    ?>
</body>
</html>