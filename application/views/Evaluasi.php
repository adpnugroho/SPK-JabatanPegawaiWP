<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Sistem Pendukung Keputusan Kenaikan Jabatan Pegawai</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
        <link href="<?= base_url('assets/css/bootstrap-responsive.min.css') ?>" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
        <link href="<?= base_url('assets/css/font-awesome.css') ?>" rel="stylesheet">
        <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
        <link href="<?= base_url('assets/css/jquery.toast.css') ?>" rel="stylesheet">
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="brand" href="<?= base_url() ?>">Evaluasi Kriteria Kandidat</a>
                </div>
            </div>
        </div>
        <div class="subnavbar">
            <div class="subnavbar-inner">
                <div class="container">
                    <ul class="mainnav">
                        <li><a href="<?= base_url('Dashboard') ?>"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
                        <li><a href="<?= base_url('Alternatif') ?>"><i class="icon-user"></i><span>Alternatif</span> </a> </li>
                        <li><a href="<?= base_url('Kriteria') ?>"><i class="icon-book"></i><span>Kriteria</span> </a></li>
                        <li class="active"><a href="<?= base_url('Evaluasi') ?>"><i class="icon-tasks"></i><span>Evaluasi</span> </a> </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="main">
            <div class="main-inner">
                <div class="container">
                    <div class="row">
                        <div class="span12" id="infoEvaluasi">
                            <div class="widget widget-nopad">
                                <div class="widget-header"> <i class="icon-list-alt"></i>
                                    <h3> Info Evaluasi</h3>
                                </div>
                                <div class="widget-content">
                                    <br>
                                     <div class="span12">
                                         <ul>
                                         <li>Silahkan input nilai evaluasi pegawai</li>    
                                         </ul>
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="span12" id="divTable">
                            <form id='evaluasiWP'>
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width:5%;">ID</th>
                                            <th>Nama</th>
                                            <th style="width:10%;">Ujian Tertulis</th>
                                            <th style="width:10%;">Prestasi</th>
                                            <th style="width:10%;">Lama Bekerja</th>
                                            <th style="width:10%;">Kedisiplinan</th>
                                            <th style="width:10%;">Pendidikan</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tabelBobot">
                                        <?php
                                        $no = 1;
                                        foreach ($alternatif as $row) {
                                            echo "<tr>"
                                            . "<td><input type='hidden' name='id_pegawai[]' value='" . $row->id_pegawai . "'>" . $no . "</td>"
                                            . "<td><input type='hidden' name='nama_pegawai[]' value='" . $row->nama_pegawai . "'>" . $row->nama_pegawai . "</td>"
                                            . "<td><select class='span2' name='ujian[]'><option value='1'>Sangat Baik</option><option value='0.75'>Baik</option><option value='0.5'>Cukup Baik</option><option value='0.25'>Buruk</option></select></td>"
                                            . "<td><select class='span2' name='prestasi[]'><option value='1'>Sangat Baik</option><option value='0.75'>Baik</option><option value='0.5'>Cukup Baik</option><option value='0.25'>Buruk</option></select></td>"
                                            . "<td><select class='span2' name='lama[]'><option value='1'>>=5 Tahun</option><option value='0.75'>3-4 Tahun</option><option value='0.5'>1-2 Tahun</option><option value='0.25'>>1 Tahun</option></select></td>"
                                            . "<td><select class='span2' name='kedisiplinan[]'><option value='1'>Sangat Baik</option><option value='0.75'>Baik</option><option value='0.5'>Cukup Baik</option><option value='0.25'>Buruk</option></select></td>"
                                            . "<td><select class='span2' name='pendidikan[]'><option value='1'>>S1</option><option value='0.75'>S1</option><option value='0.5'>D1-D3</option><option value='0.25'>SMA/SMK</option></select></td>"
                                            . "</tr>";
                                            $no++;
                                        }
                                        ?>
                                        <tr><td colspan="7"><a class="btn btn-primary" id="prosesWP"><i class="icon-ok"></i>  PROSES</a></td></tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                        <div class="span12" id="divRanking" hidden>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width:10%;">ID Pegawai</th>
                                        <th>Nama</th>
                                        <th style="width:10%;">Vektor S</th>
                                        <th style="width:10%;">Vektor V</th>
                                        <th style="width:5%;">Ranking</th>
                                    </tr>
                                </thead>
                                <tbody id="tableRanking">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="footer-inner">
                <div class="container">
                    <div class="row">
                        <div class="span12"> &copy; 2017 - STMIK STIKOM  Balikpapan (Razul Fitriana, Fitriani Anissa, Annaria Sugesti) </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?= base_url('assets/js/jquery-1.7.2.min.js') ?>"></script> 
        <script src="<?= base_url('assets/js/jquery.toast.js') ?>"></script>  
        <script>
            $(document).ready(function () {
                $('#prosesWP').click(function () {
                    $('#divRanking').fadeOut(1000, function () {
                        $('#tableRanking').empty();
                        var data = $('#evaluasiWP').serialize();
                        $.ajax({
                            url: '<?= base_url('evaluasi/calculate') ?>',
                            data: data,
                            type: 'post',
                            dataType: 'json',
                            cache: false,
                            success: function (response) {
                                $.toast({
                                    heading: 'Information',
                                    text: 'Perhitungan WeightedProduct Sudah Dilakukan                ',
                                    position: 'bottom-left',
                                    stack: false,
                                    showHideTransition: 'slide',
                                    icon: 'info'
                                });
                                var no = 1;
                                $.each(response, function (i, item) {
                                    $('#tableRanking').append('<tr>\n\
                                                                <td>' + no + '</td>\n\
                                                                <td>' + item.nama_pegawai + '</td>\n\
                                                                <td>' + item.vektor_s + '</td>\n\
                                                                <td>' + item.vektor_v + '</td>\n\
                                                                <td>' + no + '</td>\n\
                                                        </tr>');
                                    no = no + 1;
                                });
                            },
                            failed: function (xhr, ajaxOptions, thrownError) {
                                alert(xhr.status);
                                alert(thrownError);
                                alert(xhr.responseText);
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                alert(xhr.status);
                                alert(thrownError);
                                alert(xhr.responseText);
                            },
                            complete: function () {
                                $('#divRanking').fadeIn(1000);
                            }
                        });
                    });

                });
            });
        </script>
        <script src="<?= base_url('assets/js/bootstrap.js') ?>"></script> 
    </body>
</html>
