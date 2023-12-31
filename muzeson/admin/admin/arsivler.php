<?php
$sayfa = "Arşiv";
include('../inc/vt.php');
include('inc/head.php');
include('inc/nav.php');
include('inc/sidebar.php');


if(isset($_POST['sil'])) {
  $silinecekler = implode(', ', $_POST['sil']);
  $sorgu=$baglanti->prepare('DELETE FROM `arsiv` WHERE `id` IN ('.$silinecekler.')');
  $sorgu->execute();
}


$sorgu = $baglanti->prepare("SELECT * FROM arsiv");
$sorgu->execute();




?>
<head>
<script language="javascript"> function confirmDel() { var agree=confirm("Silmek istediğinizden emin misiniz?\nBu işlem geri alınamaz!"); if (agree) { return true ; } else { return false ;} } </script>
 <script src = "js/tumunusil.js" ></script>
</head>

<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Arşivler</li>
        </ol>
 <form action="" method="post">
    <a class="btn btn-primary" href="arsivekle.php">Yeni Arşiv Ekle</a>
        <button type="submit" value="" onclick="return confirmDel();" class="btn btn-danger font-18"><i class="fa fa-trash"></i> Seçilenleri Sil</button><br><br>
        

        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Arşiv
            </div>
            <div class="card-body">


                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>
                                <div class="checkbox">
                            <input type="checkbox" id="select_all" onclick="TumunuSec();" value="">
                            <label for=""></label>
                          </div></th>
                            <th>ID</th>
                            <th>Başlık</th>
                            <th>Alt Başlık</th>
                            <th>Link</th>
                            <th>Aktiflik</th>
                            <th>Düzenle</th>
                            <th>Sil</th>
                            

                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th></th>
                            <th>ID</th>
                            <th>Başlık</th>
                            <th>Alt Başlık</th>
                            <th>Link</th>
                            <th>Aktiflik</th>
                            <th>Düzenle</th>
                            <th>Sil</th>
                            

                        </tr>
                        </tfoot>
                        <tbody>

                        <?php while ($sonuc = $sorgu->fetch()) { ?>
                            <tr>
                                <td>
                                <div class="checkbox">
                              <input class="chck" type="checkbox" name="sil[]" value="<?php echo $sonuc['id']; ?>">
                              <label for="<?php echo $sonuc['id']; ?>"></label>
                                </div>
                                </td>
                                <td><?= $sonuc["id"] ?></td>
                                <td><?= $sonuc["baslik"] ?></td>
                                <td><?= $sonuc["altbaslik"] ?></td>
                               
                                <td><?= $sonuc["link"] ?></td>

                                <td><?= $sonuc["aktif"] ?></td>
                                
                                <td><a class="btn btn" href="arsivguncelle.php?id=<?= $sonuc["id"] ?>"><span
                                                    class="fa fa-edit fa-2x"></span></a></td>
                                 <td>
                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                       data-target="#sil<?= $sonuc["id"] ?>"><span class="fa fa-trash fa-2x"></span></a>


                                    <!-- Logout Modal-->
                                    <div class="modal fade" id="sil<?= $sonuc["id"] ?>" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Sil</h5>
                                                    <button class="close" type="button" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">Mesajı silmek istediğinizden emin misiniz?</div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary pull-left mx-4" type="button"
                                                            data-dismiss="modal">İptal
                                                    </button>
                                                    <a class="btn btn-danger pull-right mx-4"
                                                       href="mesajSil.php?sayfa=iletisim&id=<?= $sonuc["id"] ?>">Sil</a>



                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </td>
                               
                              
                                
                                
                            </tr>
                            <?php
                        } //while bitimi
                        ?>


                        </tbody>
                    </table>
                </form>
                </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

    </div>
    <!-- /.container-fluid -->
    <?php
    include('inc/footer.php');
    ?>
      <script type="text/javascript">
  $(document).ready(function(){
    $('#select_all').on('click',function(){
      if($('#select_all:checked').length == $('#select_all').length){
        $('input.chck:checkbox').prop('checked',true);
      }else{
        $('input.chck:checkbox').prop('checked',false);

      }
    });
  });
</script>
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
    
    <link rel="stylesheet" type="text/css" href="css/switch.css">


    