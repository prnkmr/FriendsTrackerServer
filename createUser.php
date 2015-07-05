<?php
require_once('praveenlib.php');

$conn=connectSQL();
if($conn){
    $username=safeString($conn,$_POST['username']);
    $password=safeString($conn,$_POST['password']);
    $sql="insert into login (username, password) values('$username','$password'); ";

    $conn->query($sql);
    if(!$conn->errno){
        $id=mysqli_insert_id($conn);
        $sql="insert into lastlocation VALUES ($id,'$username','0','0')";
        $conn->query($sql);
    }
}else{
    echo $conn->error;
}