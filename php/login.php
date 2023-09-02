<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="./js/loginvalidate.js" defer></script>
    <link rel = "stylesheet" href = "../css/loginstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <?php
    include('header.php');
    include('session.php');

    ?>
    <h2> Login </h2>
    <div class="container">
        <form name = "fs" id = "fs" action = "login_action.php" method = "post">
            <div class="username">
                
                <input type = "text" name = "uname" id = "uname" placeholder = 'Username' value = "">
                <div class="uerror">
                    <p id = "une"></p>
                </div>
            </div>
            <div class="password">
                
                <input type = "password" name = "pass" placeholder = 'Password' id = "pass" value = "">
                <label>
                <input type = "checkbox" id = "showpass" style = "display:none">
                <i class="fa-solid fa-eye-slash" id = "eye" style="color:black; cursor: pointer;"></i>
                
                </label>
                <div class="uerror">
                    <p id = "uee"></p>
                </div>
            </div><br>
            
            
            <button type = "button" id = "login" value = "login">Login</button><br><br>
            <p id = "err" style = "color:red"></p>
            <p>If you don't have an account,</p>
            <a href = "../php/signup.php">Click here to register</a>
            <input type = "hidden" name = "error" id = "error" value = "">
        </form>
    </div>
    <?php
    include('footer.php');
    ?>
</body>
</html>