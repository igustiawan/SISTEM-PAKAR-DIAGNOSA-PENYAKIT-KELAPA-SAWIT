-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 31 Jul 2018 pada 16.47
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sistempakar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `iduser` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`iduser`, `username`, `password`, `nama`) VALUES
('U001', 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `basispengetahuan`
--

CREATE TABLE `basispengetahuan` (
  `namapenyakit` varchar(100) NOT NULL,
  `gejala` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `basispengetahuan`
--

INSERT INTO `basispengetahuan` (`namapenyakit`, `gejala`) VALUES
('Penyakit Busuk Tandan Buah (marasmius palmivorus) 1', 'Benang-benang jamur yang berwarna putih mengkilat meluas dipermukaan tandan buah.'),
('Penyakit Busuk Tandan Buah (marasmius palmivorus) 1', 'Busuk basah'),
('Crown Disease (penyakit tajuk)', 'Kerusakan pada pelepah.'),
('Crown Disease (penyakit tajuk)', 'Tidak terdapat anak daun.'),
('Crown Disease (penyakit tajuk)', 'Anak daunnya kecil.'),
('Crown Disease (penyakit tajuk)', 'Daunnya robek-robek.'),
('Crown Disease (penyakit tajuk)', 'Daun tombak lebih dari satu.'),
('Penyakit busuk pangkal batang', 'Kerusakan pada pelepah.'),
('Penyakit busuk pangkal batang', 'Kelayuan menyeluruh seperti kurang air dan hara.'),
('Penyakit busuk pangkal batang', 'Nekrosis daun tua dimulai dari pelepah terbawah.'),
('Penyakit busuk pangkal batang', 'Daun tua yang mengering sengkleh.'),
('Penyakit busuk pangkal batang', 'Terbentuk buah cendawan dari pangkal batang.'),
('Penyakit cincin merah (red disease)', 'Daun yang tumbuh semakin mengecil.'),
('Penyakit cincin merah (red disease)', 'Bercak-bercak berwarna kuning sampai jingga dipetiol dan daun tombak.'),
('Penyakit cincin merah (red disease)', 'Munculnya cincin-cincin berkelir merah di batang tanaman, meskipun tidak selalu.'),
('Penyakit cincin merah (red disease)', 'Bintik-bintik hitam yang membentuk pola cincin tersebar disepanjang batang sawit.'),
('Penyakit akar', 'Daun berwarna kuning.'),
('Penyakit akar', 'Akar membusuk.'),
('Penyakit akar', 'Daun tua lebih cepat mati.'),
('Penyakit akar', 'Daun muda memudar.'),
('Penyakit akar', 'Jaringan akar yang sakit menguning dan berair.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `idgejala` varchar(10) NOT NULL,
  `gejala` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`idgejala`, `gejala`) VALUES
('G001', 'Benang-benang jamur yang berwarna putih mengkilat meluas dipermukaan tandan buah.'),
('G002', 'Busuk basah'),
('G003', 'Kerusakan pada pelepah.'),
('G004', 'Tidak terdapat anak daun.'),
('G005', 'Anak daunnya kecil.'),
('G006', 'Daunnya robek-robek.'),
('G007', 'Daun tombak lebih dari satu.'),
('G008', 'Kelayuan menyeluruh seperti kurang air dan hara.'),
('G009', 'Nekrosis daun tua dimulai dari pelepah terbawah.'),
('G010', 'Daun tua yang mengering sengkleh.'),
('G011', 'Terbentuk buah cendawan dari pangkal batang.'),
('G012', 'Daun yang tumbuh semakin mengecil.'),
('G013', 'Bercak-bercak berwarna kuning sampai jingga dipetiol dan daun tombak.'),
('G014', 'Munculnya cincin-cincin berkelir merah di batang tanaman, meskipun tidak selalu.'),
('G015', 'Bintik-bintik hitam yang membentuk pola cincin tersebar disepanjang batang sawit.'),
('G016', 'Daun berwarna kuning.'),
('G017', 'Akar membusuk.'),
('G018', 'Daun tua lebih cepat mati.'),
('G019', 'Daun muda memudar.'),
('G020', 'Jaringan akar yang sakit menguning dan berair.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit`
--

CREATE TABLE `penyakit` (
  `idpenyakit` varchar(20) NOT NULL,
  `namapenyakit` varchar(1000) NOT NULL,
  `pengendalian` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyakit`
--

INSERT INTO `penyakit` (`idpenyakit`, `namapenyakit`, `pengendalian`) VALUES
('P001', 'Penyakit Busuk Tandan Buah (marasmius palmivorus) 1', 'â€¢	Mengurangi kelembaban di kebun dengan cara menanam dengan jarak tanam yang sesuai yaitu 130 â€“ 136 pohon / ha\r\nâ€¢	Melaksanakan kastrasi pada TBM\r\nâ€¢	Membuang semua bunga dan buah yang busuk dan membakarnya ditempat terbuka\r\nâ€¢	Melaksanakan penunasan pelepah secara teratur dengan pusingan ? 9 bulan\r\nâ€¢	Melaksanakan penyiangan gulma di lingkup piringan sedikitnya 1 x 2 bulan pada tanaman muda\r\nâ€¢	Pusingan panen hendaknya tepat waktu, yaitu ? 10 hari, tandan â€“ tandan yang mencapai kriteria matang panen harus dipanen dan tidak boleh dibiarkan membusuk di pohon\r\nâ€¢	 Alternatif pengendalian terkhir adalah penyemprotan terhadap semua buah yang ada dengan fungisida dengan pusingan 14 hari.'),
('P002', 'Crown Disease (penyakit tajuk)', 'â€¢	Menggunakan bibit yang sehat dan berkualitas dan jelas asal â€“ usulnya.\r\nâ€¢	Menggunakan bibit bersertifikat yang sudah terbukti kualitasnya,\r\nâ€¢	Menyingkirkan tanaman-tanaman yang memiliki gen panyakit tajuk.\r\nâ€¢	Pastikan piringan selalu bersih dari gulma pengganggu.\r\n'),
('P003', 'Penyakit busuk pangkal batang', 'Cara mengatasi penyakit tersebut dengan Natural GLIO\r\ncara pengaplikasinya:\r\n1). Ambil 1 pack Natural Glio campur dengan 100 liter air aduk sampai merata, siramkan larutan tadi di lingkar batang tanaman sawit dengan dosis pertanaman mendapatkan 1 liter larutan tersebut.\r\n1). 1 pack Natural Glio cukup untuk 100 tanaman yang terserang penyakit tersebut.\r\n'),
('P004', 'Penyakit cincin merah (red disease)', 'Untuk saat ini diIndonesia belum pernah dilaporkan'),
('P005', 'Penyakit akar', 'Upaya yang bisa dilakukan untuk mencegah penyakit akar pada tanaman kelapa sawit adalah dengan melakukan budidaya yang baik dan benar sesuai dengan prosedur budidaya yang dianjurkan. Tindakan yang paling efesien untuk mencegah penyakit akar sebaiknya dilakukan sejak dini, yakni sejak pemilihan bibit dan persemaian.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`idgejala`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`idpenyakit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
