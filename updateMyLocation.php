<?php
require_once('datas.php');
require_once('praveenlib.php');

$conn=connectSQL($dbdetails);
if($conn){
    $userid=safeString($conn,$_POST['userid']);
    $lat=safeString($conn,$_POST['lat']);
    $lon=safeString($conn,$_POST['lon']);
    $sql="update lastlocation set latitude='{$lat}', longitude='{$lon}' where userid={$userid}";
    //echo $sql."\n";
    $rs=$conn->query($sql);
    if($rs){


            echo "success";

    }else{
        echo $conn->error;
    }
}
else{
    echo $conn->error;
}
