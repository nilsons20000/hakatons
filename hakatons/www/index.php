<?php
require "functions/Database.php";
include "functions/filter.php";
//require_once"functions/functions.php";
$database = new Database();
$schools = null;

if ($_SERVER['REQUEST_METHOD'] === "GET") {
    $schools = $database->getSchools();
} else {
    $schools = filter($_POST, $database);
}

include "functions/functions.php";

?>
<!DOCTYPE html>
<html lang="lv" xmlns="http://www.w3.org/1999/html">
<head>
    <title>Atrodi Skolu</title>
    <script type="text/javascript" src="./js/jquery.js"></script>
    <script type="text/javascript" src="./js/menu.js"></script>
    <script src="https://use.fontawesome.com/320ac68418.js"></script>
    <script type='text/javascript' src='http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js'></script>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/tabula.css">
    <link rel="stylesheet" type="text/css" href="css/filter.css">
    <link rel="stylesheet" type="text/css" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body style="overflow-x:hidden">
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar-collapsed">
        <div class="d-none d-sm-block">
            <a class="navbar-brand" href="index.php">
                <img  src="css/img/large-logo.png" alt="atrodiskolu logo">
            </a>
        </div>
        <div class="d-block d-sm-none">
            <a class="navbar-brand" href="#">
                <img  src="css/img/small-logo.png" alt="atrodiskolu logo">
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>



        <div class="collapse navbar-collapse" id="navbarSupportedContent">


                <?php
                require 'views/form.view.php';
                ?>

            <script>
                $(document).ready(function () {
                    $("#myInput").on("keyup", function () {
                        var value = $(this).val().toLowerCase();
                        $("#myTable tr").filter(function () {
                            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                        });
                    });
                });
            </script>

        </div>
    </nav>
    <div class="row" id="content">
        <div class="col-xl-12" id="map" style="width: 100%; height: 70vh;">
            <script>
                var map = L.map('map', {
                    center: [57.08233, 25.24116],
                    minZoom: 0.5,
                    zoom: 7
                });

                L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
                    subdomains: ['a', 'b', 'c']
                }).addTo(map);
                var tempArray = JSON.parse('<?php getSavedLocations($schools); ?>');
                for (var i = 0; i < tempArray.length; ++i) {
                    L.marker(tempArray[i]).addTo(map).bindPopup(tempArray[i][2]);
                }
            </script>
        </div>
        <div class="text-center col-xl-12 col-center">
            <?php
            if ($schools != null) {
                require "views/table.view.php";
            };
            ?>
            
            </div>
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>