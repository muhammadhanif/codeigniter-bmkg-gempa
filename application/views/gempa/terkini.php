<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Gempabumi Terkini</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?php echo base_url('assets/fontawesome-free/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/adminLTE/css/adminlte.min.css'); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="" class="nav-link">Gempabumi</a>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="" class="brand-link">
                <img src="<?php echo base_url('assets/image/globe-icon.png'); ?>" alt="Gempabumi" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Gempabumi</span>
            </a>

            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-header">Menu Utama</li>
                        <li class="nav-item">
                            <a href="<?php echo base_url("gempa"); ?>" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Gempabumi Terkini
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url("gempa/m5"); ?>" class="nav-link">
                                <i class="nav-icon fas fa-wave-square"></i>
                                <p>
                                    Gempabumi M 5.0+
                                </p>
                            </a>
                        </li>

                        <li class="nav-item active">
                            <a href="<?php echo base_url("gempa/dirasakan"); ?>" class="nav-link">
                                <i class="nav-icon fas fa-water"></i>
                                <p>
                                    Gempabumi Dirasakan
                                </p>
                            </a>
                        </li>

                        <li class="nav-item active">
                            <a href="<?php echo base_url("gempa/api"); ?>" class="nav-link">
                                <i class="nav-icon fas fa-database"></i>
                                <p>
                                    API Data Gempabumi
                                </p>
                            </a>
                        </li>

                        <li class="nav-header">Informasi</li>
                        <li class="nav-item">
                            <a target="_blank" href="https://github.com/muhammadhanif/codeigniter-bmkg-gempa/tree/ci-3" class="nav-link">
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
                            <h1>Gempabumi Terkini</h1>
                        </div>

                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4">
                            <div class="card card-outline card-danger">
                                <div class="card-header">
                                    Peta Gempa
                                </div>
                                <div class="card-body p-0">
                                    <div id="loading" class="text-center"><small>Loading data</small></div>
                                    <img id="eqmap" class="img-fluid" src="" />
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8">
                            <div class="card card-outline card-danger">
                                <div class="card-header">
                                    Data Gempa
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <th>Tanggal</th>
                                                    <td id="tanggal"><small>Loading data</small></td>
                                                </tr>
                                                <tr>
                                                    <th>Magnitude</th>
                                                    <td id="magnitude"><small>Loading data</small></td>
                                                </tr>
                                                <tr>
                                                    <th>Kedalaman</th>
                                                    <td id="kedalaman"><small>Loading data</small></td>
                                                </tr>
                                                <tr>
                                                    <th>Koordinat</th>
                                                    <td id="koordinat"><small>Loading data</small></td>
                                                </tr>
                                                <tr>
                                                    <th>Wilayah</th>
                                                    <td>
                                                        <ul>
                                                            <li id="wilayah1"><small>Loading data</small></li>
                                                            <li id="wilayah2"><small>Loading data</small></li>
                                                            <li id="wilayah3"><small>Loading data</small></li>
                                                            <li id="wilayah4"><small>Loading data</small></li>
                                                            <li id="wilayah5"><small>Loading data</small></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Potensi</th>
                                                    <td id="potensi"><small>Loading data</small></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <footer class="main-footer text-center">
            <small>Sumber data: BMKG (Badan Meteorologi, Klimatologi, dan Geofisika)</small>
        </footer>
    </div>
    <script src="<?php echo base_url('assets/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/adminLTE/js/adminlte.min.js'); ?>"></script>

    <script>
        $(document).ready(function() {
            jQuery.ajax({
                type: 'GET',
                url: '<?php echo base_url('data/gempaterkini'); ?>',
                dataType: 'json',
                success: function(response) {
                    console.log(response.data.gempa);
                    $('#tanggal').text(response.data.gempa.Tanggal + ' ' + response.data.gempa.Jam);
                    $('#magnitude').text(response.data.gempa.Magnitude);
                    $('#kedalaman').text(response.data.gempa.Kedalaman);
                    $('#koordinat').text(response.data.gempa.Lintang + ' ' + response.data.gempa.Bujur);
                    $('#potensi').text(response.data.gempa.Potensi);
                    $('#wilayah1').text(response.data.gempa.Wilayah1);
                    $('#wilayah2').text(response.data.gempa.Wilayah2);
                    $('#wilayah3').text(response.data.gempa.Wilayah3);
                    $('#wilayah4').text(response.data.gempa.Wilayah4);
                    $('#wilayah5').text(response.data.gempa.Wilayah5);
                    $("#eqmap").attr('src', response.data.eqmap);
                    $('#loading').hide();
                },
                error: function() {}
            });
        });
    </script>
</body>

</html>