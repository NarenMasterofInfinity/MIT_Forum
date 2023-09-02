<!DOCTYPE html>
<html lang="en">
    <?php
    include('php/session.php');
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Title</title>
    <link rel = "stylesheet" href = "headstyle.css">
    <script src = "headscr.js" defer></script>
</head>
<body>
    <nav id = 'navbar'>
        <form name = 'fs' id = 'uform' method = 'post' action = 'php/user.php'>
        <ul class = "ul">
        <li class = "li"><a href = "index.php">Home</a></li>
        <li class = "li"><a href = "php/viewcat.php">Forum</a></li>
            <li class = "li"><a href = "php/signup.php">Sign Up</a></li>
            <li class = "li" ><a href = "php/login.php">Login</a></li>
            <li class = "li"><a href = "php/create_cat.php">Create category</a></li>
            <li class = "move"><a id = "no"><strong><?php echo $_SESSION['username']; ?></strong></a></li>
            <li><input type = 'text' name = 'user' style = 'display:none' value = <?php echo $_SESSION['username'] ?>>
        </ul>
        </form>
    </nav>
</body>
</html>