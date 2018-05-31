-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 31 May 2018, 22:54:30
-- Sunucu sürümü: 5.7.19
-- PHP Sürümü: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `yemeksiparis`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(25) COLLATE utf32_turkish_ci NOT NULL,
  `parola` varchar(25) COLLATE utf32_turkish_ci NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf32 COLLATE=utf32_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori`
--

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE IF NOT EXISTS `kategori` (
  `kategoriID` int(11) NOT NULL AUTO_INCREMENT,
  `kategoriAdi` varchar(25) COLLATE utf32_turkish_ci NOT NULL,
  PRIMARY KEY (`kategoriID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf32 COLLATE=utf32_turkish_ci;

--
-- Tablo döküm verisi `kategori`
--

INSERT INTO `kategori` (`kategoriID`, `kategoriAdi`) VALUES
(3, 'Çorbalar'),
(4, 'Burgerler'),
(5, 'Pizzalar'),
(6, 'Pideler'),
(7, 'Izgaralar'),
(8, 'Tatlılar'),
(9, 'İçecekler');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `musteri`
--

DROP TABLE IF EXISTS `musteri`;
CREATE TABLE IF NOT EXISTS `musteri` (
  `musteriID` int(11) NOT NULL AUTO_INCREMENT,
  `ad` varchar(25) COLLATE utf32_turkish_ci NOT NULL,
  `email` varchar(50) COLLATE utf32_turkish_ci NOT NULL,
  `masaNo` int(11) NOT NULL,
  PRIMARY KEY (`musteriID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf32 COLLATE=utf32_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `restoran`
--

DROP TABLE IF EXISTS `restoran`;
CREATE TABLE IF NOT EXISTS `restoran` (
  `RestoranAdi` varchar(50) COLLATE utf32_turkish_ci NOT NULL,
  `adres` varchar(100) COLLATE utf32_turkish_ci NOT NULL,
  `telefon` int(11) NOT NULL,
  PRIMARY KEY (`RestoranAdi`)
) ENGINE=MyISAM DEFAULT CHARSET=utf32 COLLATE=utf32_turkish_ci;

--
-- Tablo döküm verisi `restoran`
--

INSERT INTO `restoran` (`RestoranAdi`, `adres`, `telefon`) VALUES
('Oda Cafe', 'Siren caddesi SİVAS', 537766951);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparis`
--

DROP TABLE IF EXISTS `siparis`;
CREATE TABLE IF NOT EXISTS `siparis` (
  `siparisID` int(11) NOT NULL AUTO_INCREMENT,
  `adet` int(11) NOT NULL,
  `siparisTutari` double NOT NULL,
  PRIMARY KEY (`siparisID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf32 COLLATE=utf32_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yemekler`
--

DROP TABLE IF EXISTS `yemekler`;
CREATE TABLE IF NOT EXISTS `yemekler` (
  `yemekID` int(11) NOT NULL AUTO_INCREMENT,
  `kategoriID` int(11) NOT NULL,
  `yemekResim` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `yemekAdi` varchar(100) CHARACTER SET latin1 NOT NULL,
  `yemekAciklama` text CHARACTER SET utf32 NOT NULL,
  `yemekFiyat` float NOT NULL,
  PRIMARY KEY (`yemekID`),
  KEY `yemekToKategori` (`kategoriID`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `yemekler`
--

INSERT INTO `yemekler` (`yemekID`, `kategoriID`, `yemekResim`, `yemekAdi`, `yemekAciklama`, `yemekFiyat`) VALUES
(1, 4, 'hamburgermenu.jpg', 'Hamburger Menü', 'Hamburger,Patates kızartması,Kola', 15),
(2, 4, 'tavukburgermenu.jpg', 'Tavuk Burger Menü', 'Tavuk Burger,Patates kızartması,Kola', 10),
(3, 9, 'su.jpg', 'Su', '0,5L', 1.25),
(4, 3, 'tarhanacorbasi.jpg', 'Tarhana Corbasi', 'Evinizdeki Tarhana..', 5),
(6, 3, 'tavukcorbasi.jpg', 'Tavuk Corbasi', 'Kremalı Tavuk Çorbası', 5),
(7, 3, 'mercimekcorbasi.jpg', 'Mercimek Corbasi', 'Salçalı Mercimek Çorbası', 5),
(8, 5, 'okanpizza.jpg', 'Okan Pizza', 'Domates sosu, Salam, Sosis, Mısır\r\n', 25),
(9, 5, 'baliklipizza.jpg', 'Balik Pizza', 'Ton Balığı,Sosis,Salam,Domates Sosu', 22),
(10, 5, 'sosyalpizza.jpg', 'Sosyal Pizza', 'Pizza Sosu,Sucuk,Sosis,Zeytin,Mısır\r\n', 20),
(11, 5, 'vejeteryanpizza.jpg', 'Vejeteryan Pizza', 'Domates Sosu, Mozerella, Zeytin, Mısır\r\n', 20),
(13, 4, 'sefinspeciali.jpg', 'Sefin Speciali', 'Special Burger,Patates kızartması,Kola', 15),
(14, 6, 'tavuklukasarlipide.jpg', 'Tavuklu Kasarli Pide', 'Tavuk,Kaşar', 7),
(15, 6, 'kiymalipide.jpg', 'Kiymali Pide', 'Kıyma', 10),
(16, 6, 'kusbasilipide.jpg', 'Kusbasili Pide', 'Kuşbaşı et', 11),
(17, 6, 'peynirlipide.jpg', 'Peynirli Pide', 'Nefis Peynir', 5),
(18, 7, 'tavukizgara.jpg', 'Tavuk Izgara', 'Nefis Tavuk Izgara', 15),
(19, 7, 'izgarakofte.jpg', 'Köfte Izgara', 'Nefis Köfte Izgara', 18),
(20, 7, 'karisikizgara.jpg', 'Karisik Izgara', 'Köfte, Tavuk, Adana', 25),
(21, 8, 'mozaikpasta.jpg', 'Mozaik Pasta', 'Nefis Ev Yapımı Lezzet', 5),
(22, 8, 'tiramisu.jpg', 'Tiramisu', 'Nefis Ev Yapımı Lezzet', 5),
(23, 8, 'cheesecake.jpg', 'Cheesecake', 'Limon, Frambuaz, Çikolata', 8),
(24, 9, 'cola.jpg', 'Kola', 'CocaCola 300ml', 3),
(25, 9, 'ayran.jpg', 'Ayran', 'Kücük', 2),
(26, 9, 'ayran2.jpg', 'Ayran', 'büyük ', 2.75);

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `yemekler`
--
ALTER TABLE `yemekler`
  ADD CONSTRAINT `yemekToKategori` FOREIGN KEY (`kategoriID`) REFERENCES `kategori` (`kategoriID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
