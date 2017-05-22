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
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="brand" href="<?= base_url() ?>">Dashboard SPK Kenaikan Jabatan Pegawai</a>
                </div>
            </div>
        </div>
        <div class="subnavbar">
            <div class="subnavbar-inner">
                <div class="container">
                    <ul class="mainnav">
                        <li class="active"><a href="<?= base_url('Dashboard') ?>"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
                        <li><a href="<?= base_url('Alternatif') ?>"><i class="icon-user"></i><span>Alternatif</span> </a> </li>
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
                        <div class="span12">
                            <div class="widget widget-nopad">
                                <div class="widget-header"> <i class="icon-list-alt"></i>
                                    <h3> Frequently Asked Question : </h3>
                                </div>
                                <div class="widget-content">
                                    <div class='span12'>
                                        <br>
                                        Siapa pembuat aplikasi ini ?
                                        <ul><li>Razul Fitriana (14.01.000) - Fitriani Anissa (14.01.000) - Annaria Sugesti (14.01.000)</li></ul><br>
                                        Metode apa yang dipakai di sistem pendukung keputusan ini ?
                                        <ul><li>Metode yang dipakai adalah <i>WeightedProduct</i></li></ul><br>
                                        Data penilaian apa yang dipakai dalam evaluasi kenaikan jabatan pegawai ?
                                        <ul><li>Penilaian yang dipakai adalah, Ujian Tertulis, Prestasi Kerja, Lama Bekerja, Kedisiplinan, dan Jenjang Pendidikan</li></ul><br>
                                    </div>
                                </div>
                            </div>
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
        <script src="<?= base_url('assets/js/bootstrap.js') ?>"></script> 
    </body>
</html>
