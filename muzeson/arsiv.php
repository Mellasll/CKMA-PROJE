<!DOCTYPE html>
<?php include('vt.php') ;?>
<html lang="tr">

<head>
  <meta charset="utf-8">
  <title>Kent Müzesi ve Arşivi</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/venobox/venobox.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
</head>

<body>

  <!--==========================
    Header
  ============================-->
  <header id="header" class="header-fixed">
    <div class="container">

      <div id="logo" class="pull-left">
        <a href="index.php#intro" class="scrollto"><img src="img/logo.png" alt="" title="" style="height:88px; width: 70px;"></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="index.php">Anasayfa</a></li>
          <li><a href="index.php#about">Hakkımızda</a></li>
          <li><a href="etkinlikler.php">Etkinlikler</a></li>
          <li><a href="arsiv.php">Arşiv</a></li>
          <li><a href="index.php#gallery">Galeri</a></li>
          <li><a href="kardeskent.php">Kardeş Kent</a></li>
          <li><a href="index.php#faq">S.S.S</a></li>
          <li><a href="index.php#contact">İletişim</a></li>
          <li class="buy-tickets"><a href="#">English</a></li>
          <li class="buy-tickets"><a href="#">Deutsch</a></li>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <main id="main" class="main-page">

    <section id="faq" class="wow fadeInUp">

      <div class="container">

       
    <section id="speakers-details" class="wow fadeIn">
      <div class="container">
        <div class="section-header">
          <h2>Çanakkale Kent Müzesi ve Arşivi</h2>
          <p>Arşiv</p>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-9">
              <ul id="faq-list">
                
                <?php 
             $say=0;
             $sorgu=$baglanti->prepare("SELECT * FROM arsiv where aktif=1");
             $sorgu->execute();

           

             while ($select=$sorgu->fetch(PDO::FETCH_ASSOC)) { $say++?>

                <li>
                  <a data-toggle="collapse" class="collapsed" href="#faq3"><?php echo $select['baslik']; ?> <i class="fa fa-minus-circle"></i></a>
                  <div id="faq3" class="collapse" data-parent="#faq-list">
                    <p><a href="arsiv/<?php echo $select['link']; ?>"><?php echo $select['altbaslik']; ?></a>
                    </p>
                  </div>
                </li>
<?php } ?>  

<!-- while bitişi -->
              </ul>
          </div>
        </div
      </div>
    </section>
      </div>
    </section>
  </main>


  <!--==========================
    Footer
  ============================--> <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

         

          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Linkler</h4>
            <ul>
              <li><i class="fa fa-angle-right"></i> <a href="index.php">Anasayfa</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="index.php#about">Hakkımızda</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="etkinlikler.php">Etkinlikler</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="arsiv.php">Arşiv</a></li>
             <li><i class="fa fa-angle-right"></i><a href="index.php#gallery">Galeri</a></li>
             <li><i class="fa fa-angle-right"></i><a href="index.php#faq">S.S.S</a></li>
            </ul>
          </div>

         
          <div class="col-lg-4 col-md-6 footer-contact">
            <h4>İletişim</h4>
            <p>
            <p>
              Kemalpaşa Mah. <br>
              Fetvane Sok. No:31<br>
              Merkez/Çanakkale<br>
              <strong>Telefon:</strong> (0286) 214 34 17<br>
              <strong>Email:</strong> canakkalekentmuzesi@gmail.com<br>
            </p>

             <div class="social-links">
              <a href="#footer" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="https://www.facebook.com/canakkalekentmuzesi.arsivi/" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="https://www.instagram.com/canakkalekentmuzesi" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="mailto:=canakkalekentmuzesi@gmail.com" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#footer" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>
            <div class="col-lg-4 col-md-6 footer-links">
            <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d1078.2364292884597!2d26.40038857344899!3d40.14867262499766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x14b1a9c8b7457e81%3A0x1494f6c528fa8374!2zS2VtYWxwYcWfYSwgw4dhbmFra2FsZSBLZW50IE3DvHplc2kgdmUgQXLFn2l2aSwgRmV0dmFuZSBTb2thaywgw4dhbmFra2FsZSBNZXJrZXovw4dhbmFra2FsZQ!3m2!1d40.1487504!2d26.4008237!5e0!3m2!1str!2str!4v1658350596423!5m2!1str!2str"
             width="400" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright 2022
      </div>
      <div class="credits">Designers: Murathan SEVİNÇ & Melisa ASLAN
      </div>
    </div>
  </footer>
  <!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

  <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/venobox/venobox.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!--  Main Javascript File -->
  <script src="js/main.js"></script>
</body>

</html>
