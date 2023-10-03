
<?php

$sayfa = "Etkinlik Güncelle";
error_reporting(0);
include('inc/head.php');
include('inc/nav.php');
include('inc/sidebar.php');
include('../inc/vt.php');

$sorgu = $baglanti->prepare("SELECT * FROM etkinlikler Where id=:id");
$sorgu->execute(['id' => (int)$_GET["id"]]);
$sonuc = $sorgu->fetch();//sorgu çalıştırılıp veriler alınıyor

       if ($_POST) { // Post olup olmadığını kontrol ediyoruz.
               $tarih = $_POST['tarih']; 
               $baslik = $_POST['baslik'];
               $name = $_POST['name'];
               $detay = $_POST['detay'];
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
            <li class="breadcrumb-item active">Makale Güncelle</li>
        </ol>


        <!-- DataTables Example -->
        <div class="card mb-3">

            <div class="card-body">

                <form method="post" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label>Tarih</label>
                        <input required type="text" value="<?= $sonuc["tarih"] ?>" class="form-control" name="tarih"
                        placeholder="Başlık">
                    </div>
                    <div class="form-group">
                        <label>Başlık</label>
                        <input required type="text" value="<?= $sonuc["baslik"] ?>" class="form-control" name="baslik">
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input required type="text" value="<?= $sonuc["name"] ?>" class="form-control" name="name">
                    </div>

                    <div class="form-group">
                        <label for="detay">Detay</label>
                        <textarea  name="detay" id="detay">
                            <?= $sonuc["detay"] ?>
                        </textarea>

                        <script>
                            ClassicEditor
                            .create(document.querySelector('#detay'))
                            .then(editor => {
                                console.log(editor);
                            })
                            .catch(error => {
                                console.error(error);
                            });
                        </script>

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
                 'tarih' => $tarih,
                 'baslik' => $baslik,
                 'name' => $name,
                 'detay' => $detay,
                 'aktif' => $aktif,
             ];
                // Veri güncelleme sorgumuzu yazıyoruz.
             $sql = "UPDATE etkinlikler SET tarih=:tarih, baslik=:baslik,aktif=:aktif, detay=:detay, name=:name WHERE id=:id;";             
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