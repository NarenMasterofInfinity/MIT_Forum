<?php

include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link rel="stylesheet" href="../css/catstyle.css">
    <script src = "./js/cat_post.js" defer>
    </script>
</head>
<?php
include('header.php');
//print_r($_COOKIE);
?>
<body class = 'catbody'>
    
        <form id = 'fs' method = 'post' action = 'viewpost.php'>
        <div class="container">
        <input type = 'text' style = 'display:none' id = 'cat_post' name = 'cat_post' value = ''>
        <?php
        $sql = "select * from category";
        $result = mysqli_query($con, $sql);
        if (!$result) {
            echo "Backend Error";
        } else {
            $count = mysqli_num_rows($result);
            if ($count == 0) {
                echo "No category has been added yet";
            } else {
                while ($row = mysqli_fetch_assoc($result)) {
                    $cat_id = $row['cat_id'];
                    $cat_name = $row['cat_name'];
                    $cat_desp = $row['cat_desp'];
                    $cat_img = $row['cat_img'];
        ?>

                    <div class="catcontainer">
                        <div class="image">
                            <a>
                                <img src='../<?php echo $cat_img ?>' alt='image could not be loaded'>
                            </a>
                        </div>
                        <div class="title">
                            <a>
                                <a class="redirect">
                                    <input type="text" style="display:none" value=<?php echo $cat_id ?>>
                                    <h3><?php echo $cat_name ?></h3>
                                </a>

                            </a>
                        </div>
                        <div class="desp">
                            <a class="desp_cont">
                                <?php 
                                $cat_to_show = substr($cat_desp,0,125);
                                ?>
                                <a><?php echo $cat_to_show ?> <span id='do' class = "dots">....</span></a>
                                <?php
                                $cat_to_hide = substr($cat_desp,126,strlen($cat_to_show)-1);
                                echo $cat_to_show;
                                echo "<div id='hid'>";
                                echo $cat_to_hide;
                                echo "</div>";
                                
                                ?> <!-- figure out a way to contain it within a box -->
                            </a>
                            <?php if(strlen($cat_desp) > 200){ ?>
                            
                            <?php } ?>
                        </div>
                    </div>

        <?php
                }
            }
        }
        ?>
        </div>
        </form>
    <?php include('footer.php'); ?>
</body>

</html>