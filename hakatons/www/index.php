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

    <title></title>
    <script src="./js/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/tabula.css">
    <link rel="stylesheet" type="text/css" href="css/filter.css">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css"/>

    <script src="https://use.fontawesome.com/320ac68418.js"></script>
    <script type='text/javascript' src='http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js'></script>


    <script src="./js/bootstrap.min.js"></script>


    <script>
        $(document).ready(function () {
            $("#myInput").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $("#myTable tr:not(table_row)").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
    <script type="text/javascript" src="./js/menu.js"></script>
</head>
<body>
<div id="page-wrap">
    <header>
        <div class="name">
            <a href="index.php" title="На главную" id="title">Test-Site</a>
        </div>
        <div id="myNav" class="overlay">
            <a href="javascript:void(0)"
               class="closebtn"
               onclick="closeNav()">×</a>
            <div class="overlay-content">
                <?php
                printForm($database);
                ?>
            </div>
        </div>

        <span id="open" onclick="openNav()">☰ open</span>
    </header>
    <div id="map" style="width: 100%; height: 440px; border: 1px solid #AAA;"></div>
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
    <nav class="dws-menu">
        <div class="form-group">
            <select name="state" id="maxRows" class="form-control" style="width:150px;">
                <option value="5000">Rādīt visus</option>
                <option value="10">5</option>
                <option value="20">10</option>
                <option value="50">25</option>
                <option value="100">50</option>
                <option value="150">75</option>
                <option value="200">100</option>
            </select>
        </div>
        <input id="myInput" type="text" placeholder="Search..">
        <table width="100%" id="table">
            <thead>
            <tr>
                <th class="th_width">Nosaukums</th>
                <th class="th_width">Izglītība</th>
            </tr>
            </thead>
            <tbody id="myTable">
            <?php
            if ($schools != null) {
                require "views/table.view.php";
            };
            ?>
            <script>
                // Basic example
                $(document).ready(function () {
                    $('#dtBasicExample').DataTable({
                        "paging": false
                    });
                    $('.dataTables_length').addClass('bs-select');
                });

                $(document).ready(function () {
                    $('#dtBasicExample').DataTable({
                        "pagingType": "simple"
                    });
                    $('.dataTables_length').addClass('bs-select');
                });
            </script>
            </tbody>
        </table>
        <div class="pagination-container">
            <nav>
                <ul class="pagination"></ul>
            </nav>
        </div>
    </nav>
</div>


<script>
    var table = '#table';
    $('#maxRows').on('change', function () {
        $('.pagination').html('');
        var trnum = 0;
        var maxRows = parseInt($(this).val());
        var totalRows = $(table + ' tbody tr').length;
        $(table + ' tr:gt(0)').each(function () {
            trnum++;
            if (trnum > maxRows) {
                $(this).hide()
            }
            if (trnum <= maxRows) {
                $(this).show()
            }
        });
        if (totalRows > maxRows) {
            var pagenum = Math.ceil(totalRows / maxRows);
            for (var i = 1; i <= pagenum;) {
                $('.pagination').append('<li data-page="' + i + '">\<span>' + i++ + '<span class="sr-only">(current)</span></span>\</li>').show()
            }
        }
        $('.pagination li:first-child').addClass('active');
        $('.pagination li').on('click', function () {
            var pageNum = $(this).attr('data-page');
            var trIndex = 0;
            $('.pagination li').removeClass('active');
            $(this).addClass('active');
            $(table + ' tr:gt(0)').each(function () {
                trIndex++;
                if (trIndex > (maxRows * pageNum) || trIndex <= ((maxRows * pageNum) - maxRows)) {
                    $(this).hide()
                } else {
                    $(this).show()
                }
            })
        })
    })

</script>
</body>
</html>