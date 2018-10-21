<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mapa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link rel="stylesheet" type="text/css" media="screen" href="main.css" />-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700" rel="stylesheet">
    <script src='https://api.mapbox.com/mapbox-gl-js/v0.50.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v0.50.0/mapbox-gl.css' rel='stylesheet' />
    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v3.1.3/mapbox-gl-directions.js'></script>
    <link rel='stylesheet' href='mapbox-gl-directions.css' type='text/css' />
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
    <div id="nav-bar">
        <div id="logo">
            M U S E A
        </div>
        <div id="menu">
            <ol>
                <li><a href="#">M I A S T A</a>
                <ul>            
                    <li><a href="index.php?miasto=1">Warszawa</a></li>
                    <li><a href="index.php?miasto=2" name="miasto" value="Krakow">Kraków</a></li>
                    <li><a href="index.php?miasto=3" name="miasto" value="Bydgoszcz">Bydgoszcz</a></li>
                    <li><a href="index.php?miasto=4" name="miasto" value="Wroclaw">Wrocław</a></li>
                    <li><a href="index.php?miasto=5" name="miasto" value="Szczecin">Szczecin</a></li>
                    <li><a href="index.php?miasto=6" name="miasto" value="Gdansk">Gdańsk</a></li>
                    <li><a href="index.php?miasto=7" name="miasto" value="Lodz">Łódź</a></li>
                    <li><a href="index.php?miasto=8" name="miasto" value="Lublin">Lublin</a></li> 
                </ul>
            </li>
            </ol>
            <ul>
                <li><a href="" target="blank">O &nbsp; N A S</a></li>
                <li><a href="" target="blank">O &nbsp;  P R O J E K C I E</a></li> 
            </ul>
        </div>
    </div>
<div id='map' style='width: 100%; height: 100vh;'></div>
    <div id="on_navigation">
        
    </div>
    <script>
        mapboxgl.accessToken = 'pk.eyJ1Ijoic2lyZWtwaW90ciIsImEiOiJjajk4cXNiM24wZDg0MnFsZ3B1cHczc3RvIn0.15mNfH6Yh7tbIBUjgXEtoQ';
        <?php
            if(isset($_GET["miasto"]))
            {
                switch($_GET["miasto"])
                {
                    case 1:
                        echo
                        'var bounds = [
                            [20.752759,52.062795],
                            [21.315152,52.425376]
                        ];';
                        break;
                    case 2:
                        echo
                        'var bounds = [
                            [19.747109,49.971015],
                            [20.209706,50.140303]
                        ];';
                        break;
                    case 3:
                        echo
                        'var bounds = [
                            [17.839628,53.045677],
                            [18.243199,53.212946]
                        ];';
                        break;
                    case 4:
                        echo
                        'var bounds = [
                            [16.774515,50.952209],
                            [17.337318,51.235106]
                        ];';
                        break;
                    case 5:
                        echo
                        'var bounds = [
                            [14.311648,53.309878],
                            [14.815426,53.516149]
                        ];';
                        break;
                    case 6:
                        echo
                        'var bounds = [
                            [18.358781,54.233456],
                            [18.954529,54.454398]
                        ];';
                        break;
                    case 7:
                        echo
                        'var bounds = [
                            [19.152906,51.579470],
                            [19.836506,51.938180]
                        ];';
                        break;
                    case 8:
                        echo
                        'var bounds = [
                            [22.311091,51.140936],
                            [22.824477,51.358410]
                        ];';
                        break;
                }
            }
            else
            {
                echo
                'var bounds = [
                    [20.752759,52.062795], // Southwest coordinates
                    [21.315152,52.425376]  // Northeast coordinates
                ];';
            }
        ?>
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/sirekpiotr/cjncvcjwz26fk2snz4anngg10',
            center: [20.997781, 52.232871],
            zoom: 15.3,
            maxBounds: bounds
        });
        map.addControl(new mapboxgl.GeolocateControl({
            positionOptions: {
                enableHighAccuracy: true
            },
            trackUserLocation: true
        }));
        //if(!isset($_SESSION['miasto']))header('location: stronaglowna.html');
        var features = [<?php
        $c = mysqli_connect('localhost','id7563844_root','zaq1@WSX');
        mysqli_select_db($c,'id7563844_musea');
        mysqli_set_charset($c, 'utf8');
        if(isset($_GET["miasto"]))
        {
            switch($_GET["miasto"])
            {
                case 1:
                    $q = "SELECT Nazwa_Muzeum,x,y FROM `mytable` WHERE Miejscowosc='Warszawa';";
                    break;
                case 2:
                    $q = "SELECT Nazwa_Muzeum,x,y FROM `mytable` WHERE Miejscowosc='Krakow';";
                    break;
                case 3:
                    $q = "SELECT Nazwa_Muzeum,x,y FROM `mytable` WHERE Miejscowosc='Bydgoszcz';";
                    break;
                case 4:
                    $q = "SELECT Nazwa_Muzeum,x,y FROM `mytable` WHERE Miejscowosc='Wroclaw';";
                    break;
                case 5:
                    $q = "SELECT Nazwa_Muzeum,x,y FROM `mytable` WHERE Miejscowosc='Szczecin';";
                    break;
                case 6:
                    $q = "SELECT Nazwa_Muzeum,x,y FROM `mytable` WHERE Miejscowosc='Gdansk';";
                    break;
                case 7:
                    $q = "SELECT Nazwa_Muzeum,x,y FROM `mytable` WHERE Miejscowosc='Lodz';";
                    break;
                case 8:
                    $q = "SELECT Nazwa_Muzeum,x,y FROM `mytable` WHERE Miejscowosc='Lublin';";
                    break;
            }
        }
        else
        {
            $q = "SELECT Nazwa_Muzeum,x,y FROM `mytable` WHERE Miejscowosc='Warszawa';";
        }  
        $sql = mysqli_query($c,$q);
        while($dane = mysqli_fetch_assoc($sql))
        {
            echo "{'properties':{'description': '".$dane['Nazwa_Muzeum']."'}, 'interactive': true,'type':'Feature','geometry':{'type':'Point','coordinates':['".$dane['x']."','".$dane['y']."']}},\n";
        }
        mysqli_close($c);
        ?>];
        var geojson = new Object();
        geojson.type = "FeatureCollection";
        geojson.features = features;
        var source = new Object();
        source.type = "geojson";
        source.data = geojson;
        var layout = new Object();
        layout["icon-image"] = "custom-marker";
        var json = new Object();
        json.id = "markers";
        json.type = "symbol";
        json.source = source;
        json.layout = layout;
        map.on("load", function () {
        
        map.loadImage("./ikona-muzeum.png", function(error, image) { //https://i.imgur.com/MK4NUzI.png
            if (error) throw error;
            map.addImage("custom-marker", image);
            map.addLayer(json);
            });
            map.on('click', 'markers', function (e) {
                var coordinates = e.features[0].geometry.coordinates.slice();
                var description = e.features[0].properties.description;
               
                while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
                    coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
                }
                new mapboxgl.Popup()
                    .setLngLat(coordinates)
                    .setHTML(description)
                    .addTo(map);
            });
            map.on('mouseenter', 'markers', function () {
                map.getCanvas().style.cursor = 'pointer';
            });
            map.on('mouseleave', 'markers', function () {
                map.getCanvas().style.cursor = '';
            });
        });
        var directions = new MapboxDirections({
            accessToken: mapboxgl.accessToken,
            unit: 'metric',
            profile: 'mapbox/walking' // Chodzenie to dobra sprawa :)
        });
        class NavigationButton 
        {
            onAdd(map)
            {
                this._map = map;
                this._container = document.createElement('input');
                this._container.id = 'navigation';
                this._container.className = 'mapboxgl-ctrl';
                this._container.type = 'button';
                this._container.value = 'Navigation';
                this._container.style.width = '300px';
                this._container.style.height = '30px';
                this.isNavigationEnable = false;
                this._container.addEventListener('click', function()
                {
                    if(!this.isNavigationEnable)
                    {
                        map.addControl(directions, 'top-left');
                        document.getElementById('navigation').value = 'Remove';
                        this.isNavigationEnable = true;
                    }
                    else
                    {
                        map.removeControl(directions);
                        document.getElementById('navigation').value = 'Remove';
                        this.isNavigationEnable = false;
                    }
                });
                return this._container;
            }
            onRemove()
            {
                this._container.parentNode.removeChild(this._container);
                this._map = undefined;
            }
        }
        var navigation = new NavigationButton();
        map.addControl(navigation, 'top-left');
    </script>
</body>
</html>
