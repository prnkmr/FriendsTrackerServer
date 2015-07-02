<!DOCTYPE html>
<html>
<head>
    <script
        src="http://maps.googleapis.com/maps/api/js">
    </script>
    <script type="text/javascript" src="jquery-2.1.4.min.js"></script>

    <script>
        var myCenter=new google.maps.LatLng(51.508742,-0.120850);

        function initialize()
        {
            var mapProp = {
                center:myCenter,
                zoom:1  ,
                mapTypeId:google.maps.MapTypeId.ROADMAP
            };

            var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
            var markers=[];
            <?php
                require_once('praveenlib.php');
                $conn=connectSQL();
                if($conn){
                $sql="select * from lastlocation";
                $result=$conn->query($sql);
                if($result){
                    while($row=$result->fetch_array()){
                    ?>
            var marker=new google.maps.Marker({
                position:new google.maps.LatLng(<?php echo $row['latitude'].",".$row['longitude']?>),
                map:map,
                labelContent:"<?php echo $row['userid']?>"


            });
        //marker.setMap(map);
        markers.push(marker);
            <?php
                    }
                }else echo $conn->error;
                }
                ?>





            (function(){
                $.post("currentLocation.php",{},function(data,status){
                    console.log(data);
                    var userLocations=JSON.parse(data);
                    try {
                        for (var i = 0; i < userLocations.length; i++) {
                            markers[i].setPosition(new google.maps.LatLng(userLocations[i].latitude, userLocations[i].longitude));
                        }
                    }catch (e){
                        window.location.reload(1);
                    }
                    //marker.setPosition(new google.maps.LatLng(lat,lon));
                    //map.move(marker.getPosition())
                });
                setTimeout(arguments.callee, 5000);
            })();

        }


        google.maps.event.addDomListener(window, 'load', initialize);
    </script>

</head>

<body>
<div id="googleMap" style="width:500px;height:380px;"></div>
</body>
<script type="text/javascript">



</script>
</html>