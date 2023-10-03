-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 01 Ağu 2022, 12:35:22
-- Sunucu sürümü: 10.4.21-MariaDB
-- PHP Sürümü: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `panel2`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `arsiv`
--

CREATE TABLE `arsiv` (
  `id` int(11) NOT NULL,
  `baslik` varchar(100) NOT NULL,
  `altbaslik` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `aktif` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `arsiv`
--

INSERT INTO `arsiv` (`id`, `baslik`, `altbaslik`, `link`, `aktif`) VALUES
(4, 'Müze Kitaplığı', 'Kitaplığı indirmek için tıklayınız', 'kitaplik.docx', '1'),
(5, 'Sohbet ve Röportaj', 'Sohbet ve Röportaj dosyasını indirmek için tıklayınız', 'sohbetveroportaj.docx', '1'),
(6, 'Kitaplar ve Dergiler', 'Kitaplar ve Dergiler belgesini indirmek için tıklayınız', 'sohbetveroportaj.docx', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `etkinlikler`
--

CREATE TABLE `etkinlikler` (
  `id` int(11) NOT NULL,
  `tarih` varchar(50) NOT NULL,
  `baslik` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `detay` varchar(100) NOT NULL,
  `aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `etkinlikler`
--

INSERT INTO `etkinlikler` (`id`, `tarih`, `baslik`, `name`, `detay`, `aktif`) VALUES
(7, '26-07-2022', 'deneme', 'isim deneme', '<p>vnjfkvlkh</p>', 0),
(8, '2022-19-19', 'deneme2', 'deneme isim', '<p>vndsjvşbkd</p>', 0),
(15, '2022-19-19', 'sddeneme', 'deneme alt başlık', '<p>dfdsf</p>', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iletisim`
--

CREATE TABLE `iletisim` (
  `id` int(11) NOT NULL,
  `adsoyad` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `telefon` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `email` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `mesaj` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `tarih` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `iletisim`
--

INSERT INTO `iletisim` (`id`, `adsoyad`, `telefon`, `email`, `mesaj`, `tarih`) VALUES
(29, 'Murathan', '53862437', 'fh@hotmail.com', 'ngşfdjklb', '2022-07-21 16:29:46'),
(32, 'fkhldafd', '05386243759', 'mseviss16@gmail.com', 'dsandklasjhfsadgfv', '2022-07-28 12:58:59'),
(33, 'kenan', '789698', 'kenan@xn--gmail-nua74e.com', 'nkjbfjdafc', '2022-07-29 10:06:29');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `id` int(11) NOT NULL,
  `kadi` char(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `parola` char(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kul_yetki` varchar(15) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`id`, `kadi`, `parola`, `kul_yetki`) VALUES
(9, 'admin', '279ea13f5766743be7053dfef11c618e', 'yetkili'),
(14, 'deneme', '279ea13f5766743be7053dfef11c618e', 'yetkisiz');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `arsiv`
--
ALTER TABLE `arsiv`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `etkinlikler`
--
ALTER TABLE `etkinlikler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `iletisim`
--
ALTER TABLE `iletisim`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `arsiv`
--
ALTER TABLE `arsiv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `etkinlikler`
--
ALTER TABLE `etkinlikler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `iletisim`
--
ALTER TABLE `iletisim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
