<?php
$onServer=false;
if($onServer) {
    $dbURL = "mysql.freehostingnoads.net";
    $dbName = "u149044957_track";
    $dbusername = "u149044957_track";
    $dbpassword = "database";
}else{
    $dbURL = "localhost";
    $dbName = "track";
    $dbusername = "root";
    $dbpassword = "";
}
$dbdetails = array(
    'url' => $dbURL,
    'name' => $dbName,
    'username' => $dbusername,
    'password' => $dbpassword
);


?>
