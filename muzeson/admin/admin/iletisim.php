<?php   include('../inc/vt.php');     ?>


<?php


                                      if (isset($_POST['iletisimbuton'])){

        
        $kaydet = $baglanti->prepare("INSERT INTO iletisim SET adsoyad=:adsoyad, telefon=:telefon, email=:email,mesaj=:mesaj;");
                                        $insert = $kaydet->execute(array(
                                            'adsoyad' => htmlspecialchars($_POST['adsoyad']),
                                            'email' => htmlspecialchars($_POST['email']),
                                            'telefon' => htmlspecialchars($_POST['telefon']),
                                            'mesaj' => htmlspecialchars($_POST['mesaj']),
                                        ));
                                        header("location:../../index.php");
                                        
                                    }

                                    ?>
