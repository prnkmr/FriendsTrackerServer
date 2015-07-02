<?php
/**
 * Created by PhpStorm.
 * User: Praveen kumar
 * Date: 07/06/2015
 * Time: 04:59 PM
 */

$conn=mysqli_connect("mysql.freehostingnoads.net","u149044957_track","database","u149044957_track");
if($conn){
    $query="select * from loc limit 1";
    $result=$conn->query($query);

    if($result){
        $row=$result->fetch_array();
        echo $row['lat'].",".$row['lon'];
    }

}