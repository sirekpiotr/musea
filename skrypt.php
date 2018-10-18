<?php

    $connection = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($connection, 'muzea');

    $zapytanie = "SELECT * FROM mytable limit 2";
    $q = mysqli_query($connection,$zapytanie);
    while($row = mysqli_fetch_assoc($q))
    {
        $request = "http://open.mapquestapi.com/geocoding/v1/address?key=uFDfwtV8W4SU9JgvL6offFufMPjNYxkV&location=".$row['Miejscowosc'].",".$row['Ulica'].",".$row['Numer_domu'];
        $json = file_get_contents($request);
        $obj = json_decode($json,true);
        //echo $obj->results->0->locations->0->latLng->lat;
        //echo $obj->results->0->locations->0->latLng->lng;
        $lat = $obj['results']['0']['locations']['0']['latLng']['lat'];
        $lng = $obj['results']['0']['locations']['0']['latLng']['lng'];
        
    }
    //requestAPI -> http://open.mapquestapi.com/geocoding/v1/address?key=uFDfwtV8W4SU9JgvL6offFufMPjNYxkV&location=Opole,Minorytow,3
    //keyAPi -> uFDfwtV8W4SU9JgvL6offFufMPjNYxkV

?>