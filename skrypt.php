<?php

    $connection = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($connection, 'muzea');
    $zapytanie = "SELECT * FROM mytable WHERE Miejscowosc='Warszawa'";
    $q = mysqli_query($connection,$zapytanie);
    while($row = mysqli_fetch_assoc($q))
    {
        $request = "http://open.mapquestapi.com/geocoding/v1/address?key=uFDfwtV8W4SU9JgvL6offFufMPjNYxkV&location=".$row['Kod_pocztowy'].",".$row['Miejscowosc'].",".$row['Ulica'].",".$row['Numer_domu'];
        $json = file_get_contents($request);
        $obj = json_decode($json,true);
        $lat = $obj['results']['0']['locations']['0']['latLng']['lat'];
        $lng = $obj['results']['0']['locations']['0']['latLng']['lng'];
        $update = "UPDATE mytable SET x=$lng, y=$lat WHERE Lp=".$row['Lp'];
        mysqli_query($connection,$update);
        echo $update."<br>";
    }
    //requestAPI -> http://open.mapquestapi.com/geocoding/v1/address?key=uFDfwtV8W4SU9JgvL6offFufMPjNYxkV&location=Opole,Minorytow,3
    //keyAPi -> uFDfwtV8W4SU9JgvL6offFufMPjNYxkV

?>