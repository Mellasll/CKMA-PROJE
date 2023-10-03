<div id="wrapper">
    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
			        <li class="nav-item" >
            <a class="nav-link" href="etkinlik.php">
        <i class="fas fa-columns"></i>
                <span>Etkinlikler</span></a>
        </li>
				 

		 
		<li class="nav-item ">
            <a class="nav-link" href="mesaj.php">
               <i class="fas fa-comment"></i>
                <span>Mesajlar</span></a>
        </li>

        <li class="nav-item" >
            <a class="nav-link" href="arsivler.php">
        <i class="fas fa-columns"></i>
                <span>Arşiv</span></a>
        </li>

        <?php 
        if (yetkikontrol()=="yetkili") {?>
        <li class="nav-item ">
            <a class="nav-link" href="kullanicilar.php">
               <i class="fas fa-address-card"></i>
                <span>Kullanıcılar</span></a>
                <?php } ?>
        </li>
        <?php 
        if (yetkikontrol()=="yetkili") {?>
        <li class="nav-item ">
            <a class="nav-link" href="kullaniciekle.php">
               <i class="fas fa-address-card"></i>
                <span>Kullanıcı Ekle</span></a>
        </li>
    <?php } ?>

		        <li class="nav-item">
            <a class="nav-link"  class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-ban"></i>
                <span>Çıkış Yap</span></a>
        </li>


    </ul>

<?php

function yetkikontrol() {
    if (empty($_SESSION['kadi'])) {
        $kadi="x";
    } else {
        $kadi=$_SESSION['kadi'];
    }
    
    include '../inc/vt.php';
    $yetki=$baglanti->prepare("SELECT kul_yetki FROM kullanicilar where kadi=:kadi");
    $yetki->execute(array(
        'kadi' => $kadi
    ));
    $yetkicek=$yetki->fetch(PDO::FETCH_ASSOC);

    if ($yetkicek['kul_yetki']=='yetkili') {
        $sonuc="yetkili";
        return $sonuc;
    } else {
        $sonuc="yetkisiz";
        return $sonuc;
    }
};





 ?>