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
                    <a class="brand" href="<?= base_url() ?>">Data Kriteria Penilaian </a>
                </div>
            </div>
        </div>
        <div class="subnavbar">
            <div class="subnavbar-inner">
                <div class="container">
                    <ul class="mainnav">
                        <li><a href="<?= base_url('Dashboard') ?>"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
                        <li><a href="<?= base_url('Alternatif') ?>"><i class="icon-user"></i><span>Alternatif</span> </a> </li>
                        <li class="active"><a href="<?= base_url('Kriteria') ?>"><i class="icon-book"></i><span>Kriteria</span> </a></li>
                        <li><a href="<?= base_url('Evaluasi') ?>"><i class="icon-tasks"></i><span>Evaluasi</span> </a> </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="main">
            <div class="main-inner">
                <div class="container">
                    <div class="row">
                        <div class="span12" id="infoKriteria">
                            <div class="widget widget-nopad">
                                <div class="widget-header"> <i class="icon-list-alt"></i>
                                    <h3> Info Kriteria</h3>
                                </div>
                                <div class="widget-content">
                                    <br>
                                    <div class='span12'>
                                        Hasil bobot dihitung dengan rumus W = W(i) / SUM(W) atau sama dengan Bobot = Bobot / Total Bobot.<br>
                                        Bobot diberikan nilai asumsi, dengan nilai sebagai berikut
                                        <ul>
                                            <li>Sangat Penting = 5</li>
                                            <li>Cukup Penting = 4</li>
                                            <li>Penting = 3</li>
                                            <li>Kurang Penting = 2</li>
                                            <li>Tidak Penting = 1</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="span6" id="divEdit" hidden>
                            <div class="widget widget-nopad">
                                <div class="widget-header"> <i class="icon-list-alt"></i>
                                    <h3> Form Edit Bobot Kriteria</h3>
                                </div>
                                <div class="widget-content">
                                    <br>
                                    <div class="form-control">
                                        <form id="formTambah" class="form-horizontal"> 
                                            <div class="control-group">											
                                                <label class="control-label">ID Kriteria : </label>
                                                <div class="controls">
                                                    <input type="text" class="span3" id="id_kriteria" readonly>
                                                </div>			
                                            </div>
                                            <div class="control-group">											
                                                <label class="control-label">Nama Kriteria : </label>
                                                <div class="controls">
                                                    <input type="text" class="span3" id="nama_kriteria">
                                                </div>			
                                            </div>
                                            <div class="control-group">											
                                                <label class="control-label">Bobot Kriteria : </label>
                                                <div class="controls">
                                                    <select name="bobot" id="nilai_bobot" class="span3">
                                                        <option value="1">1 - Tidak Penting</option>
                                                        <option value="2">2 - Kurang Penting</option>
                                                        <option value="3">3 - Penting</option>
                                                        <option value="4">4 - Cukup Penting</option>
                                                        <option value="5">5 - Sangat Penting</option>
                                                    </select>
                                                </div>			
                                            </div>
                                            <div class="control-group">	
                                                <div class="controls">
                                                    <a class="btn btn-primary" id="updateKriteria"><i class="icon-ok"></i>  Update</a>
                                                    <a class="btn btn-danger" id="cancelUpdate"><i class="icon-backward"></i>  Cancel</a>
                                                </div> 
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="span12" id="divTable">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width:5%;">ID</th>
                                        <th>Kriteria</th>
                                        <th style="width:10%;">Bobot</th>
                                        <th style="width:10%;">Hasil Bobot</th>
                                        <th style="width:5%;">Edit</th>
                                    </tr>
                                </thead>
                                <tbody id="tabelBobot">
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
    </div>
    <script src="<?= base_url('assets/js/jquery-1.7.2.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery.toast.js') ?>"></script> 
    <script>
        $(document).ready(function () {
            tampilBobot();
        });
        $(document).on('click', '.bobotEdit', function () {
            var id = $(this).attr('data-id');
            var nama = $(this).attr('data-nama_kriteria');
            var bobot = $(this).attr('data-bobot_kriteria');
            $('#divEdit').fadeOut(1000, function () {
                $('#id_kriteria').val(id);
                $('#nama_kriteria').val(nama);
                $('#nilai_bobot').val(bobot);
                $('#divEdit').fadeIn(1000);
            });
        });
        $('#cancelUpdate').click(function () {
            $('#divEdit').fadeOut(1000, function () {
                $('#infoKriteria').fadeIn(1000);
            });
        });
        $('#updateKriteria').click(function () {
            var id_kriteria = $('#id_kriteria').val();
            var nama = $('#nama_kriteria').val();
            var nilai_bobot = $('#nilai_bobot').val();
            $.ajax({
                url: '<?= base_url('Kriteria/editBobot') ?>',
                data: 'id_kriteria=' + id_kriteria + '&nama_kriteria=' + nama + '&bobot_kriteria=' + nilai_bobot,
                type: 'post',
                dataType: 'json',
                cache: false,
                success: function (response) {
                    $.toast({
                        heading: 'Information',
                        text: response.message,
                        position: 'bottom-right',
                        stack: false,
                        showHideTransition: 'slide',
                        icon: response.status
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
                    $('#divEdit').fadeOut(1000);
                    $('#divTable').fadeOut(1000, function () {
                        tampilBobot();
                        $('#divTable').fadeIn(1000);
                    });
                }
            });
        });
        function tampilBobot() {
            $.ajax({
                url: '<?= base_url('Kriteria/lihatKriteria') ?>',
                dataType: 'json',
                cache: false,
                success: function (response) {
                    if (response.length > 0) {
                        $('#tabelBobot').empty();
                        $.each(response, function (i, item) {
                            $('#tabelBobot').append("<tr>\n\
                                                        <td>" + item.id_kriteria + "</td>\n\
                                                        <td>" + item.nama_kriteria + "</td>\n\
                                                        <td>" + item.bobot_kriteria + "</td>\n\
                                                        <td>" + item.hasil_bobot + "</td>\n\
                                                        <td><a data-id='" + item.id_kriteria + "' data-nama_kriteria='" + item.nama_kriteria + "' data-bobot_kriteria='" + item.bobot_kriteria + "' class='bobotEdit btn btn-block btn-primary'><i class='btn-icon-only icon-ok'></i></a></td>\n\
                                                    </tr>");
                        });
                    } else {
                        $('#tabelBobot').empty();
                        $('#tabelBobot').append("<tr><td colspan='5'>Tidak Ada Data Kriteria</td></tr>");
                    }
                }
            });
        }
    </script>
    <script src="<?= base_url('assets/js/bootstrap.js') ?>"></script> 
</body>
</html>
