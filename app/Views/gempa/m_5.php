<!DOCTYPE html>
<html>

<head>
    <title>Gempa M 5.0+</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?php echo base_url('assets/fontawesome-free/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/adminLTE/css/adminlte.min.css'); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">
    <link rel="stylesheet" href="<?php echo base_url('assets/leaflet/leaflet.css'); ?>" />

    <style>
        table.dataTable thead th,
        table.dataTable tfoot th,
        table.dataTable tbody td {
            vertical-align: middle;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="" class="nav-link">Gempa</a>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="" class="brand-link">
                <img src="<?php echo base_url('assets/image/globe-icon.png'); ?>" alt="Gempa" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">GEMPA</span>
            </a>

            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-header">Menu Utama</li>
                        <li class="nav-item">
                            <a href="<?php echo base_url("gempa"); ?>" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Gempa M 5.0+ Terkini
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url("gempa/m-5"); ?>" class="nav-link active">
                                <i class="nav-icon fas fa-wave-square"></i>
                                <p>
                                    Gempa M 5.0+
                                </p>
                            </a>
                        </li>

                        <li class="nav-item active">
                            <a href="<?php echo base_url("gempa/dirasakan"); ?>" class="nav-link">
                                <i class="nav-icon fas fa-water"></i>
                                <p>
                                    Gempa Dirasakan
                                </p>
                            </a>
                        </li>

                        <li class="nav-item active">
                            <a href="<?php echo base_url("gempa/api-endpoint"); ?>" class="nav-link">
                                <i class="nav-icon fas fa-database"></i>
                                <p>
                                    API Endpoint
                                </p>
                            </a>
                        </li>

                        <li class="nav-header">Informasi</li>
                        <li class="nav-item">
                            <a target="_blank" href="https://github.com/muhammadhanif/codeigniter-bmkg-gempa" class="nav-link">
                                <i class="nav-icon fab fa-github-alt"></i>
                                <p>
                                    Kode Sumber
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a target="_blank" href="https://hanifmu.com" class="nav-link">
                                <i class="nav-icon fas fa-globe-asia"></i>
                                <p>
                                    hanifmu.com
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>

        </aside>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Gempa M 5.0+</h1>
                        </div>

                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">Peta Titik Gempa M 5.0+</div>
                                <div class="card-body p-0">
                                    <div id="mapid" style="width: 100%; height: 400px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    Data Gempa M 5.0+
                                    <a href="<?php echo base_url('api/' . $api_version  . '/gempa/m-5'); ?>" target="_blank">
                                        <button type="button" class="btn btn-success btn-sm float-right">API Endpoint</button>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="gempaTerkini" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tanggal dan Waktu</th>
                                                    <th>Magnitudo</th>
                                                    <th>Kedalaman</th>
                                                    <th>Koordinat</th>
                                                    <th>Wilayah</th>
                                                    <th>Potensi</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tanggal dan Waktu</th>
                                                    <th>Magnitudo</th>
                                                    <th>Kedalaman</th>
                                                    <th>Koordinat</th>
                                                    <th>Wilayah</th>
                                                    <th>Potensi</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>

                                <div class="card-footer text-center">
                                    Sumber Data: <a target="_blank" href="https://bmkg.go.id/">BMKG (Badan
                                        Meteorologi, Klimatologi, dan Geofisika)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <footer class="main-footer text-center">
            <strong>
                DEVELOPED BY <a target="_blank" href="https://hanifmu.com">MUHAMMAD HANIF</a>
            </strong>
        </footer>
    </div>


    <script src="<?php echo base_url('assets/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/datatables/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/datatables-responsive/js/dataTables.responsive.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/datatables-responsive/js/responsive.bootstrap4.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/adminLTE/js/adminlte.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/leaflet/leaflet.js'); ?>"></script>

    <script>
        $(document).ready(function() {
            jQuery.ajax({
                type: 'GET',
                url: '<?php echo base_url('api/' . $api_version  . '/gempa/m-5'); ?>',
                dataType: 'json',
                success: function(response) {
                    earthquakeMap(response.data.gempa, response.success);
                },
                error: function(response) {
                    console.log('Galat, bos!');
                    earthquakeMap(response, false);
                }
            });
        });
    </script>

    <script>
        function earthquakeMap(earthquake, success) {
            var mymap = L.map("mapid").setView([-1.263325, 118.606436], 4);

            L.tileLayer(
                "https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw", {
                    maxZoom: 18,
                    minZoom: 2,
                    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                    id: "mapbox/dark-v10",
                    tileSize: 512,
                    zoomOffset: -1,
                    accessToken: ''
                }
            ).addTo(mymap);

            if (success == true) {
                earthquake.forEach(function(item) {
                    var dateTime = item.Tanggal + " " + item.Jam;
                    var magnitude = item.Magnitude
                    var coordinates = item.point.coordinates.split(',');
                    var longitude = parseFloat(coordinates[1].trim());
                    var latitude = parseFloat(coordinates[0].trim());

                    L.circle([latitude, longitude], {
                            color: "red"
                        })
                        .addTo(mymap).bindTooltip(dateTime + " / " + magnitude);
                });
            }

        }
    </script>

    <script>
        $(function() {
            var t = $('#gempaTerkini').DataTable({
                "responsive": true,
                "autoWidth": false,
                "language": {
                    "url": "<?php echo base_url('assets/datatables/Indonesian.json'); ?>"
                },
                "ajax": {
                    "url": "<?php echo base_url('api/' . $api_version  . '/gempa/m-5'); ?>",
                    "dataSrc": "data.gempa",
                    "deferRender": true
                },
                "paging": true,
                "columnDefs": [{
                    "searchable": false,
                    "orderable": false,
                    "targets": 0,
                }],
                "columns": [{
                        "data": null,
                        "sClass": "text-center"
                    }, {
                        "data": "Tanggal",
                        "sClass": "text-center",
                        "render": function(data, type, row) {
                            return data +
                                ' ' + row.Jam;
                        }
                    },
                    {
                        "data": "Magnitude",
                        "sClass": "text-center"
                    },
                    {
                        "data": "Kedalaman",
                        "sClass": "text-center"
                    },
                    {
                        "data": "",
                        "sClass": "text-center",
                        "render": function(data, type, row) {
                            return row.Lintang +
                                ' ' + row.Bujur;
                        }
                    },
                    {
                        "data": "Wilayah",
                        "sClass": "text-center"
                    },
                    {
                        "data": "Potensi",
                        "sClass": "text-center"
                    }
                ]
            });

            t.on('draw.dt', function() {
                var PageInfo = $('#gempaTerkini').DataTable().page.info();
                t.column(0, {
                    page: 'current'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1 + PageInfo.start;
                });
            });
        });
    </script>
</body>

</html>