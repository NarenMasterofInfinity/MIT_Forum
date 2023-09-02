<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <link rel = 'stylesheet' href  = 'index.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src = "index.js" defer>

    </script>
</head>
    <?php
    include('header.php');
    ?>
<body class = 'bd'>
    <div class="container">
    <div class="start">
        <div class="text">
            <h1>MIT Forum</h1>
        </div>
        <div class="scroll">
            <!-- <h2 style = "color:white">affafd</h2> -->
            <h3 class = "white">Scroll down for more</h3>
            <i class="fa fa-angle-down fa-bounce" style="color: #e3e3e3;"></i>
        </div>
    </div>
    <div class='one'>
                <div class="left">
                    <h2><span class = 'focus'>MIT</span>Forum</h2>
                </div>
                <div class='right'>
                    <div class="center">
                    <h1>We welcome YOU to YOUR forum</h1>
                    <p>The forum for the MITians, by the MITians.</p>
                    </div>
                </div>
                    
    </div>
    <div class='two white'>
        <div class="lamp-container">
            <div class="lamp">
                <img src = 'assets/img/lamp.png' alt = 'lamp' id = 'lamp'>
            </div>
                <h1 id = 'turnon'>Turn on the light</h1>
              
            <div class="light">
                <img src = 'assets/img/light.png' alt = 'light' id = 'light'>
            </div>
        </div>
     <div class="content2">
        <p>We got something for everybody, may it be academics, sports or even if you want to just socialise, we have got you covered.</p> 
        <p>Connect with like minded people. Want to protest for something? Request for a category and preach your heart out</p>
        <p id = 'highlight'>Be the change you want to be</p>
        </div>
     
        
    </div>
    
    <div class='three white'>
        <div class='Ithree'>
            <br><br><br>

                <h1 style="color: white; font-size:350%;"><pre> Frequently asked questions</pre></h1>
            <div class='Ttwo'>
                <h2>1.What do I do here??</h2>
                <p>You can browse the various categories available and interact with the posts present in them</p>
                <h2>2.Can I create my own posts?</h2>
                <p>Yes, it works like any other other forum. You will be able to create posts and comment on other's posts</p>
                <h2>3.Can I create my own categories?</h2>
                <p>No, only admins will be create and moderate posts, but it is possible for the user to request for a category which they would like to see in the forum</p>
                <h2>4.Should I be logged in to create a post?</h2>
                <p>Yes, you should be logged-in in order to create and react to posts. This is done to reduce spamming and keep the content in our website reliable</p>

                <?php
                include('php/footer.php');
                ?>
            </div>
        </div>    
    </div>
</div>
</body>
</html>
