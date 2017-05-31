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
                    <a class="brand" href="<?= base_url() ?>">Data Kandidat Kenaikan Jabatan Pegawai</a>
                </div>
            </div>
        </div>
        <div class="subnavbar">
            <div class="subnavbar-inner">
                <div class="container">
                    <ul class="mainnav">
                        <li><a href="<?= base_url('Dashboard') ?>"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
                        <li class="active"><a href="<?= base_url('Alternatif') ?>"><i class="icon-user"></i><span>Alternatif</span> </a> </li>
                        <li><a href="<?= base_url('Kriteria') ?>"><i class="icon-book"></i><span>Kriteria</span> </a></li>
                        <li><a href="<?= base_url('Evaluasi') ?>"><i class="icon-tasks"></i><span>Evaluasi</span> </a> </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="main">
            <div class="main-inner">
                <div class="container">
                    <div class="row">
                        <div class="span6" id="divTambah">
                            <div class="widget widget-nopad">
                                <div class="widget-header"> <i class="icon-list-alt"></i>
                                    <h3> Form Alternatif</h3>
                                </div>
                                <div class="widget-content">
                                    <br>
                                    <div class="form-control">
                                        <form id="formTambah" class="form-horizontal"> 
                                            <div class="control-group">											
                                                <label class="control-label">Nama Pegawai : </label>
                                                <div class="controls">
                                                    <input type="text" class="span4" id="nama_pegawai">
                                                </div>			
                                            </div>
                                            <div class="control-group">						
                                                <label class="control-label">
                                                    <a class="btn btn-primary" id="simpanAlternatif"><i class="icon-ok"></i>  Simpan</a>
                                                </label>
                                            </div> 
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="span6" id="divEdit" hidden>
                            <div class="widget widget-nopad">
                                <div class="widget-header"> <i class="icon-list-alt"></i>
                                    <h3> Form Edit Alternatif</h3>
                                </div>
                                <div class="widget-content">
                                    <br>
                                    <div class="form-control">
                                        <form id="formEdit" class="form-horizontal">
                                            <fieldset>
                                                <div class="control-group">											
                                                    <label class="control-label">ID Pegawai : </label>
                                                    <div class="controls">
                                                        <input type="text" class="span4" id="id_pegawai" readonly>
                                                    </div>			
                                                </div>
                                                <div class="control-group">											
                                                    <label class="control-label">Nama Pegawai : </label>
                                                    <div class="controls">
                                                        <input type="text" class="span4" id="edit_namapegawai">
                                                    </div>			
                                                </div>
                                                <div class="control-group">	
                                                    <div class="controls">
                                                        <a class="btn btn-success" id="updateAlternatif"><i class="icon-ok"></i>  Update</a>
                                                        <a class="btn btn-danger" id="cancelEdit"><i class="icon-backward"></i>  Cancel</a>
                                                    </div>
                                                </div>
                                            </fieldset>
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
                                        <th>Nama</th>
                                        <th  style="width:20%;" colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tabelAlternatif">
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
                $('#tabelAlternatif').empty();
                tampilAlternatif();
            });
            $('#simpanAlternatif').click(function () {
                var nama = $('#nama_pegawai').val();
                if (nama.length < 1) {
                    $.toast({
                        heading: 'ERROR', text: "Input Nama Harus Di Isi", position: 'bottom-right', stack: false,
                        showHideTransition: 'slide', icon: "error"
                    });
                    $('#nama_pegawai').focus();
                } else {
                    $.ajax({
                        url: '<?= base_url('alternatif/addAlternatif') ?>',
                        data: 'nama=' + nama,
                        type: 'post',
                        cache: false,
                        dataType: 'json',
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
                            $('#divTambah').fadeOut(1000);
                            $('#nama_pegawai').val('');
                            $('#divTable').fadeOut(1000, function () {
                                $('#tabelAlternatif').empty();
                                tampilAlternatif();
                                $('#divTambah').fadeIn(1000);
                                $('#divTable').fadeIn(1000);
                            });
                        }
                    });
                }
            });
            $('#updateAlternatif').click(function () {
                var nama = $('#edit_namapegawai').val();
                var id = $('#id_pegawai').val();
                if (nama.length < 1) {
                    $.toast({
                        heading: 'ERROR', text: "Input Nama Harus Di Isi", position: 'bottom-right', stack: false,
                        showHideTransition: 'slide', icon: "error"
                    });
                    $('#edit_namapegawai').focus();
                } else {
                    $.ajax({
                        url: '<?= base_url('alternatif/editAlternatif') ?>',
                        data: 'id=' + id + '&nama=' + nama,
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
                            $('#nama_pegawai').val('');
                            $('#divTable').fadeOut(1000, function () {
                                $('#tabelAlternatif').empty();
                                tampilAlternatif();
                                $('#divTambah').fadeIn(1000);
                                $('#divTable').fadeIn(1000);
                            });
                        }
                    });
                }
            });
            $('#cancelEdit').click(function () {
                $('#divEdit').fadeOut(1000, function () {
                    $('#nama_pegawai').val('');
                    $('#divTambah').fadeOut(1000, function () {
                        $('#divTambah').fadeIn(1000);
                    });
                });
            });
            function tampilAlternatif() {
                $.ajax({
                    url: '<?= base_url('Alternatif/lihatAlternatif') ?>',
                    dataType: 'json',
                    cache: 'false',
                    success: function (response) {
                        if (response.length > 0) {
                            $('#tabelAlternatif').empty();
                            var no = 1;
                            $.each(response, function (i, item) {
                                $('#tabelAlternatif').append("<tr>\n\
                                                                <td>" + no + "</td>\n\
                                                                <td>" + item.nama_pegawai + "</td>\n\
                                                                <td><a data-id='" + item.id_pegawai + "' data-nama='" + item.nama_pegawai + "' class='pegawaiEdit btn btn-block btn-primary'><i class='btn-icon-only icon-ok'></i> Edit</a></td>\n\
                                                                <td><a data-id='" + item.id_pegawai + "' class='pegawaiHapus btn btn-block btn-danger'><i class='btn-icon-only icon-trash'></i> Hapus</a></td>\n\
                                                            </tr>");
                                                                    no = no+1;
                            });
                        } else {
                            console.log('test 2');
                            $('#tabelAlternatif').empty();
                            $('#tabelAlternatif').append('<tr><td colspan="4"><center>Tidak Ada Data Alternatif Pegawai</center></td></tr>');
                        }
                    }
                });
            }
            $(document).on('click', '.pegawaiEdit', function () {
                var id = $(this).attr('data-id');
                var nama = $(this).attr('data-nama');
                $('#divEdit').fadeOut(1000, function () {
                    $('#divTambah').fadeOut(1000, function () {
                        $('#id_pegawai').val(id);
                        $('#edit_namapegawai').val(nama);
                        $('#divEdit').fadeIn(1000);
                    });
                });
            });
            $(document).on('click', '.pegawaiHapus', function () {
                var id = $(this).attr('data-id');
                $.ajax({
                    url: '<?= base_url('alternatif/hapusAlternatif') ?>',
                    data: 'id=' + id,
                    type: 'post',
                    dataType: 'json',
                    cache: 'false',
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
                        $('#divTable').fadeOut(1000, function () {
                            $('#tabelAlternatif').empty();
                            tampilAlternatif();
                            $('#divTable').fadeIn(1000);
                        });
                    }

                });
            });
        </script>
        <script src="<?= base_url('assets/js/bootstrap.js') ?>"></script>
    </body>
</html>
