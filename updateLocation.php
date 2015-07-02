<?php
if(isset($_POST['lat'])&&isset($_POST['lon'])){
    $conn=mysqli_connect("mysql.freehostingnoads.net","u149044957_track","database","u149044957_track");
    if($conn){
        $query="update loc set lat={$_POST['lat']}, lon={$_POST['lon']} where 1";
        $result=$conn->query($query);
        if($result){
            echo "updated";
        }
    }
}
?>