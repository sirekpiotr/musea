<?php
    $c = mysqli_connect('localhost','root','');
    mysqli_select_db($c,'muzea');
    $q = "SELECT Nazwa_Muzeum,x,y FROM `mytable` WHERE Miejscowosc='Warszawa';";
    $sql = mysqli_query($c,$q);
    while($dane = mysqli_fetch_assoc($sql))
    {
        echo "{'properties':{'description': '".$dane['Nazwa_Muzeum']."'}, 'interactive': true,'type':'Feature','geometry':{'type':'Point','coordinates':['".$dane['x']."','".$dane['y']."']}},\n";
    }
    mysqli_close($c);
?>