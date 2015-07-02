<?php
require_once('datas.php');
require_once('praveenlib.php');

$conn=connectSQL($dbdetails);
if($conn){
    $username=safeString($conn,$_POST['username']);
    $password=safeString($conn,$_POST['password']);
    $sql="select userid from login where username='{$username}' and password='{$password}'";
    //echo $sql."\n";
    $rs=$conn->query($sql);
    if($rs){
        if($rs->num_rows === 1){
            $row=$rs->fetch_array();
            echo "success`".$row['userid'];
        }else{
            echo "fail";
        }

    }else{
        echo $conn->error;
    }
}
else{
    echo $conn->error;
}
