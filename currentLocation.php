
<?php

require_once('praveenlib.php');
$conn=connectSQL();
if($conn){
    $query="select * from lastlocation";
    $result=$conn->query($query);
    $assoc=array();
    if($result){
        while($row=$result->fetch_array()) {
            $userData=array( 'userid'=> $row['userid'],'latitude'=>$row['latitude'],'longitude'=>$row['longitude']);
            $assoc[]=$userData;

            //echo $row['userid'] . "," . $row['latitude'].",".$row['longitude']."`";
        }
       // $assoc=array("userLocation"=>$assoc);
        echo json_encode($assoc);
    }

}
?>