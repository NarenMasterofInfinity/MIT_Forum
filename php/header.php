<!DOCTYPE html>
<html lang="en">
    <?php
    include('session.php');
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Title</title>
    <link rel = "stylesheet" href = "../css/headstyle.css">
    <script src = "./js/headscr.js" defer></script>
    <style>
        #logout{
            margin-left:3px;
            text-decoration: none;
            color:white;
        }
        #logout:hover{
            opacity:0.6;
        }
        .lii{
            position:absolute;
            top:14px;
            left:90%;
        }

        </style>
</head>
<body>
    <nav>
        <form name = 'fs' id = 'uform' method = 'post' action = 'user.php'>
        <ul class = "ul">
        <li class = "li"><a href = "../index.php">Home</a></li>
        <li class = "li"><a href = "../php/viewcat.php">Forum</a></li>
            <li class = "li"><a href = "signup.php">Sign Up</a></li>
            <li class = "li" ><a href = "../php/login.php">Login</a></li>
            <li class = "li"><a href = "../php/create_cat.php">Create category</a></li>
            <li class = "move"><a id = "no"><strong><?php echo $_SESSION['username']; ?></strong></a></li>
            <li class = 'lii'><?php if(isset($_SESSION['username'])){?> <a href = 'logout.php' id = "logout"> logout </a> <?php } ?></a></li>
            <li><input type = 'text' name = 'user' style = 'display:none' value = <?php echo $_SESSION['username'] ?>>
        </ul>
        </form>
    </nav>
</body>
</html>