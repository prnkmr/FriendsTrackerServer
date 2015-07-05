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
                zoom:2  ,
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
            var titles="<?php echo $row['userid']?>";
            var marker=new google.maps.Marker({
                position:new google.maps.LatLng(<?php echo $row['latitude'].",".$row['longitude']?>),
                map:map,
                title: titles


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
    <style>
        html,body{
            height:100%;
            margin:0px;
        }
        #googleMap{
           min-height:100%;
        }
    </style>

</head>

<body>
<div id="googleMap" style="width:100%;"></div>
</body>
<script type="text/javascript">



</script>
</html>
