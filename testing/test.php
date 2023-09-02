<?php
include('php/connect.php');


function next_reply($reply_id){
    include('php/connect.php');
    $sql = "select * from reply where reply_id = '$reply_id'";
    $query = mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($query)){
        return $row['reply_next'];
    }
    return null;
}
$visited = [];
function dfs($rid,$pid){
    static $i = 1;
    $rid = explode(" ",$rid);
    if($rid[0] != null){
        foreach($rid as $r){
            $i++;
            echo "<script>console.log($i);</script>";
            $nid = next_reply($r);
            dfs($nid,$pid);
        }
    }
}
$sql = "select * from reply where replied_to is null and reply_post = 9";
$query = mysqli_query($con,$sql);
while($row = mysqli_fetch_assoc($query)){
    $rid = $row['reply_id'];
    dfs($rid,9);
}
?>