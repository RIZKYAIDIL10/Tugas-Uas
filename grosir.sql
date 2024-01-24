-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jan 2024 pada 15.39
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grosir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(5, 'Beras'),
(7, 'Minuman'),
(8, 'Roti'),
(9, 'Minyak Goreng'),
(11, 'Tepung'),
(12, 'Margarin'),
(13, 'rokok'),
(14, 'makanan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `kategori_id` int(11) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` varchar(100) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `detai` text DEFAULT NULL,
  `stok` varchar(3) NOT NULL,
  `gambar` blob DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`kategori_id`, `nama`, `harga`, `foto`, `detai`, `stok`, `gambar`, `id`) VALUES
(NULL, 'SANIA BERAS', '70000', NULL, ' 5KG', '50', 0x696d675f36353964306631386434653632302e39363137383730362e6a7067, 10),
(NULL, 'BERAS RAJA ULTIMA ', '70000', NULL, '5KG ', '40', 0x696d675f36353964313032666333376130342e34353935303233352e6a7067, 11),
(NULL, 'BERAS ROJOLELE ', '350000', NULL, '25KG', '20', 0x696d675f36353964313138386436623236302e33383333333838322e706e67, 12),
(NULL, 'Beras Bmw Cianjur ', '650000', NULL, '50KG', '15', 0x696d675f36353964313165363533363132322e35353534383831322e6a7067, 13),
(NULL, 'Roti Gandum', '35000', NULL, 'GLUTEN FREE RICE FLOUR BREAD (Roti bebas gluten)', '100', 0x696d675f36353964313239373135346238332e36383436373937312e6a7067, 14),
(NULL, 'MyRoti Danish Bread Choco', '15000', NULL, 'Chocolate 200 gram', '40', 0x696d675f36353964313331353330333836312e38313037323537322e6a7067, 15),
(NULL, 'Roti AO Buns ', '93500', NULL, '1 box ', '35', 0x696d675f36353964313339333537393238352e33373836333738392e6a7067, 16),
(NULL, 'Roti Maryam', '25000', NULL, '1 Bungkus 12 Roti', '17', 0x696d675f36353964313432353766366439372e30303730313930302e6a7067, 17),
(NULL, 'POCARI SWEAT', '198000', NULL, ' 500 ml Karton isi 24', '10', 0x696d675f36353964313530306366356135342e32373232353933342e706e67, 18),
(NULL, 'Teh Botol Kotak Sosro', '61500', NULL, ' 250ml / 250 Ml 1 Dus isi 24', '17', 0x696d675f36353964313539303062313363352e31343833353538382e6a7067, 19),
(NULL, 'Fanta soda water ', '33000', NULL, '1 krat isi 12x 250 ml ', '20', 0x696d675f36353964313635383666633830362e38373438393031372e6a7067, 20),
(NULL, 'NutriSari Jus Mangga', '40000', NULL, ' 420gr - Minuman Juice', '30', 0x696d675f36353964313735383837323437372e35333439383033382e6a7067, 21),
(NULL, 'Sunco Minyak Goreng ', '99000', NULL, 'Botol 5 Liter', '23', 0x696d675f36353964313766623863633361332e36313938333136362e6a7067, 22),
(NULL, 'Minyak Goreng Segi Tiga ', '31000', NULL, ' 2Liter', '23', 0x696d675f36353964313835663738373961302e38343239383032372e6a7067, 23),
(NULL, 'Filma Minyak Sawit', '34000', NULL, '2 liter', '30', 0x696d675f36353964313861303839316134302e39353336393430332e706e67, 24),
(NULL, 'Kara Minyak Goreng Kelapa', '128000', NULL, '5 Liter', '13', 0x696d675f36353964313866333663303730352e34363336373735372e6a7067, 25),
(NULL, 'Tepung Terigu Cakra Kemba', '150000', NULL, '1 kg dus isi 12 kg Protein Tinggi Dos Karton', '25', 0x696d675f36353966376566623666383433342e38313432373839352e6a7067, 26),
(NULL, 'Blue Band Master', '140000', NULL, ' Margarine Tin 2kg', '15', 0x696d675f36353966383031336537323263352e38343237313836352e6a7067, 27),
(NULL, 'rokok model sampoerna ', '30000', NULL, ' isi 50btg', '30', 0x696d675f36353966383161663638393239372e33363432383730332e6a7067, 28),
(NULL, 'DENDENG AMERIKA', '89000', NULL, '100GRAM', '16', 0x696d675f36356230396162643032383030342e32373439363230302e6a7067, 29);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_tbl`
--

CREATE TABLE `user_tbl` (
  `userID` int(5) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT 'default_image.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user_tbl`
--

INSERT INTO `user_tbl` (`userID`, `username`, `password`, `nama`, `no_hp`, `profile_image`) VALUES
(0, 'rico', 'rico2311', 'RicoAediansyah', '082267423365', '.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kategori_id` (`kategori_id`);

--
-- Indeks untuk tabel `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
