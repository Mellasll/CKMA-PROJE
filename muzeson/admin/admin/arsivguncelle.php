<?php
$sayfa = "Arşiv Güncelle";
include('inc/head.php');
include('inc/nav.php');
include('inc/sidebar.php');
include('../inc/vt.php');

$sorgu = $baglanti->prepare("SELECT * FROM arsiv Where id=:id");
$sorgu->execute(['id' => (int)$_GET["id"]]);
$sonuc = $sorgu->fetch();//sorgu çalıştırılıp veriler alınıyor

       if ($_POST) { // Post olup olmadığını kontrol ediyoruz.
               $baslik = $_POST['baslik']; 
               $altbaslik = $_POST['altbaslik'];
               $link = $_POST['link'];
               $aktif = 0;
               if (isset($_POST['aktif'])) $aktif = 1;


        }
?>
<script src="vendor/CKEditor5/ckeditor.js"></script>
<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Arşiv Güncelle</li>
        </ol>


        <!-- DataTables Example -->
        <div class="card mb-3">

            <div class="card-body">

                <form method="post" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label>Başlık</label>
                        <input required type="text" value="<?= $sonuc["baslik"] ?>" class="form-control" name="baslik"
                        placeholder="Başlık">
                    </div>
                    <div class="form-group">
                        <label>Alt Başlık</label>
                        <input required type="text" value="<?= $sonuc["altbaslik"] ?>" class="form-control" name="altbaslik">
                    </div>
                    <div class="form-group">
                        <label>link</label>
                        <input required type="text" value="<?= $sonuc["link"] ?>" class="form-control" name="link">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="aktif" id="aktif"
                        <?php
                        if ($sonuc["aktif"] == 1) echo "checked";
                        ?>
                        >
                        <label class="form-check-label" for="aktif">Aktif mi?</label>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="guncellebuton">Güncelle</button>
                    </div>

                </form>


            </div>
        </div>





<?php 
if (isset($_POST['guncellebuton'])) { 
                //Değişecek veriler
                $satir = [
                 'id' => $_GET['id'],
                 'baslik' => $baslik,
                 'altbaslik' => $altbaslik,
                 'link' => $link,
                 'aktif' => $aktif,
             ];
                // Veri güncelleme sorgumuzu yazıyoruz.
             $sql = "UPDATE arsiv SET baslik=:baslik, altbaslik=:altbaslik, aktif=:aktif, link=:link WHERE id=:id;";             
             $durum = $baglanti->prepare($sql)->execute($satir);

             if ($durum)
             {
                echo '<script>swal("Başarılı","Ürün güncellendi","success").then((value)=>{ window.location.href = "makale.php"});

                </script>';    
            } else {
                    echo 'Düzenleme hatası oluştu: '; // id bulunamadıysa veya sorguda hata varsa hata yazdırıyoruz.
                }
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