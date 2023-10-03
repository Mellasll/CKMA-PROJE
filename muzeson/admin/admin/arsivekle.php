<?php

$sayfa = "Arşiv Ekle";
include('../inc/vt.php');
include('inc/head.php');
include('inc/nav.php');
include('inc/sidebar.php');

$sorgu = $baglanti->prepare("SELECT * FROM arsiv ");
$sonuc = $sorgu->fetch();//sorgu çalıştırılıp veriler alınıyor

?>
<script src="vendor/CKEditor5/ckeditor.js"></script>
<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Arşiv Ekle</li>
        </ol>


        <!-- DataTables Example -->
        <div class="card mb-3">

            <div class="card-body">

                <form method="POST" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label>Başlık</label>
                        <input required type="text"  class="form-control" name="baslik"
                        >
                    </div>
                    <div class="form-group">
                        <label>Alt Başlık</label>
                        <input required type="text" class="form-control" name="altbaslik">
                    </div>
                    <div class="form-group">
                        <label>Link</label>
                        <input required type="text"  class="form-control" name="link">
                    </div>


                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="aktif" id="aktif">

                        <label class="form-check-label" name="aktif" for="aktif">Aktif mi?</label>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="eklebuton">Ekle</button>
                    </div>

                </form>


            </div>
        </div>





<?php 

if (isset($_POST['eklebuton'])) { 


    $baslik = $_POST['baslik']; 
    $altbaslik = $_POST['altbaslik'];
    $aktif = $_POST['aktif'];
    $link = $_POST['link'];



    $aktif = 0;
    if (isset($_POST['aktif'])) $aktif = 1;


$satir = [                  'baslik' => $baslik,
                            'altbaslik' => $altbaslik,
                            'aktif' => $aktif,
                            'link' => $link,
                        ];

                       
                        $sql = "INSERT INTO arsiv SET  baslik=:baslik,altbaslik=:altbaslik,aktif=:aktif, link=:link; ";
                        $durum = $baglanti->prepare($sql)->execute($satir);
}






?>



        <!-- /.container-fluid -->


        <script>
            $(document).ready(function () {
                $('#dataTable').DataTable({
                    language: {
                        info: "_TOTAL_ kayıttan _START_ - _END_ kayıt gösteriliyor.",
                        infoEmpty: "Gösterilecek hiç kayıt yok.",
                        loadingRecords: "Kayıtlar yükleniyor.",
                        zeroRecords: "Tablo boş",
                        search: "Arama:",
                        sLengthMenu: "Sayfada _MENU_ kayıt göster",
                        infoFiltered: "(toplam _MAX_ kayıttan filtrelenenler)",
                        buttons: {
                            copyTitle: "Panoya kopyalandı.",
                            copySuccess: "Panoya %d satır kopyalandı",
                            copy: "Kopyala",
                            print: "Yazdır",
                        },

                        paginate: {
                            first: "İlk",
                            previous: "Önceki",
                            next: "Sonraki",
                            last: "Son"
                        },
                    }
                });
            });

        </script>
        <script src="js/aktifcustom.js"></script>
        <link rel="stylesheet" type="text/css" href="css/switch.css">