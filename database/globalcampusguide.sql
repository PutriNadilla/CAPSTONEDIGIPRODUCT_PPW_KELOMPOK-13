-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 10, 2024 at 08:54 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `globalcampusguide`
--

-- --------------------------------------------------------

--
-- Table structure for table `favorit`
--

CREATE TABLE `favorit` (
  `idfavorit` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `iduniversitas` int(11) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `foto` text NOT NULL,
  `level` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `email`, `password`, `foto`, `level`) VALUES
(1, 'Administrator', 'admin@gmail.com', 'admin', 'user.png', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `universitas`
--

CREATE TABLE `universitas` (
  `iduniversitas` int(11) NOT NULL,
  `rangkingdunia` varchar(5) NOT NULL,
  `namauniversitas` text NOT NULL,
  `negara` varchar(50) NOT NULL,
  `rangkingnasional` varchar(5) NOT NULL,
  `kualitaspendidikan` varchar(5) NOT NULL,
  `pegawaialumni` varchar(5) NOT NULL,
  `kualitasfakultas` varchar(5) NOT NULL,
  `publikasi` varchar(5) NOT NULL,
  `pengaruh` varchar(5) NOT NULL,
  `kutipan` varchar(5) NOT NULL,
  `dampak` varchar(5) NOT NULL,
  `hakpaten` varchar(5) NOT NULL,
  `skor` varchar(5) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `deskripsi` text NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `universitas`
--

INSERT INTO `universitas` (`iduniversitas`, `rangkingdunia`, `namauniversitas`, `negara`, `rangkingnasional`, `kualitaspendidikan`, `pegawaialumni`, `kualitasfakultas`, `publikasi`, `pengaruh`, `kutipan`, `dampak`, `hakpaten`, `skor`, `tahun`, `deskripsi`, `file`) VALUES
(16, '1', 'Harvard University', 'USA', '1', '7', '9', '1', '1', '1', '1', '', '5', '100', '2012', 'Harvard University, terletak di Cambridge, Massachusetts, adalah salah satu universitas terkemuka di dunia. Dikenal karena reputasi akademiknya yang luar biasa, Harvard menawarkan berbagai program studi yang mencakup semua bidang, mulai dari humaniora hingga ilmu pengetahuan eksakta. Fasilitas penelitian canggih dan jaringan alumni yang luas membuat Harvard menjadi pilihan yang menarik bagi calon mahasiswa yang mencari lingkungan belajar yang dinamis dan beragam.', 'harvard.png'),
(17, '2', 'Massachusetts Institute of Technology', 'USA', '2', '9', '17', '3', '12', '4', '4', '', '1', '91.67', '2.012', 'MIT terletak di Cambridge, Massachusetts, dan merupakan pusat keunggulan dalam sains, teknologi, dan rekayasa. Dikenal karena pendekatan inovatifnya terhadap pendidikan dan penelitian, MIT menawarkan kesempatan untuk belajar dari para pemimpin pemikiran dalam berbagai bidang. Kolaborasi lintas disiplin, fasilitas penelitian yang mutakhir, dan koneksi industri yang kuat membuat MIT menjadi pilihan yang menarik bagi calon mahasiswa yang bersemangat tentang inovasi dan penemuan ilmiah.', 'mit.svg'),
(18, '3', 'Stanford University', 'USA', '3', '17', '11', '5', '4', '2', '2', '', '15', '89.5', '2.012', 'Stanford University, terletak di Silicon Valley, California, adalah pusat inovasi dan teknologi. Dengan lingkungan yang mendukung dan program studi yang luas, Stanford menawarkan pengalaman belajar yang unik bagi calon mahasiswa yang tertarik dalam bidang teknologi, bisnis, dan kewirausahaan. Koneksi dengan industri teknologi terkemuka dan kesempatan untuk terlibat dalam proyek penelitian yang relevan membuat Stanford menjadi pilihan yang menarik bagi mereka yang ingin mengubah dunia melalui teknologi.', 'stanford.png'),
(19, '4', 'University of Cambridge', 'United Kingdom', '1', '10', '24', '4', '16', '16', '11', '', '50', '86.17', '2.012', 'University of Cambridge adalah salah satu universitas tertua dan paling terkenal di dunia, terletak di Inggris. Dengan tradisi akademik yang kaya dan reputasi global yang kuat, Cambridge menawarkan lingkungan belajar yang dinamis dan beragam. Program studi yang terkemuka dalam berbagai disiplin ilmu, fasilitas penelitian yang canggih, dan jaringan alumni yang luas membuat Cambridge menjadi destinasi yang menarik bagi calon mahasiswa yang mencari pengalaman pendidikan yang tak tertandingi.', 'universitycambridge.png'),
(20, '5', 'California Institute of Technology', 'USA', '4', '2', '29', '7', '37', '22', '22', '', '18', '85.21', '2,012', 'Caltech terletak di Pasadena, California, dan dikenal karena keunggulannya dalam sains dan rekayasa. Dengan rasio mahasiswa-staf yang rendah dan fokus pada penelitian yang berdampak, Caltech menawarkan kesempatan untuk terlibat dalam penemuan ilmiah yang menarik dan berpengaruh. Kolaborasi antara mahasiswa dan fakultas, serta akses ke fasilitas penelitian yang mutakhir, membuat Caltech menjadi pilihan yang menarik bagi calon mahasiswa yang bersemangat tentang eksplorasi ilmiah.', 'caltec.png'),
(21, '6', 'Princeton University', 'USA', '5', '8', '14', '2', '53', '33', '26', '', '101', '82.5', '2,012', 'Princeton University, terletak di New Jersey, adalah universitas Ivy League dengan fokus kuat pada pendidikan liberal arts dan penelitian ilmiah. Dengan kurikulum fleksibel dan lingkungan belajar yang kolaboratif, Princeton menawarkan kesempatan untuk belajar dari para ahli terkemuka dalam berbagai bidang. Komitmen pada keunggulan akademik dan pembelajaran seumur hidup membuat Princeton menjadi destinasi yang menarik bagi calon mahasiswa yang mencari pengalaman pendidikan yang mendalam dan bermakna.', 'princeton.png'),
(22, '7', 'University of Oxford', 'United Kingdom', '2', '13', '28', '9', '15', '13', '19', '', '26', '82.34', '2,012', 'University of Oxford adalah salah satu universitas tertua di dunia, terletak di Inggris. Dikenal karena reputasi akademiknya yang kuat dan tradisi akademik yang kaya, Oxford menawarkan lingkungan belajar yang dinamis dan beragam. Dengan kurikulum yang menantang dan fasilitas penelitian yang canggih, Oxford adalah tempat yang ideal bagi calon mahasiswa yang ingin mengembangkan pemikiran kritis dan perspektif yang luas.', 'oxford.webp'),
(23, '8', 'Yale University', 'USA', '6', '14', '31', '12', '14', '6', '15', '', '66', '79.14', '2,012', 'Yale University, terletak di New Haven, Connecticut, adalah universitas Ivy League dengan fokus kuat pada pendidikan liberal arts. Dengan kombinasi program studi yang luas, fasilitas penelitian yang canggih, dan komunitas yang beragam, Yale menawarkan kesempatan untuk terlibat dalam pembelajaran yang mendalam dan berarti. Jaringan alumni yang kuat dan akses ke peluang karier yang beragam membuat Yale menjadi pilihan yang menarik bagi calon mahasiswa yang mencari pengalaman pendidikan yang kaya dan beragam.', 'yale.png'),
(24, '9', 'Columbia University', 'USA', '7', '23', '21', '10', '13', '12', '14', '', '5', '78.86', '2,012', 'Columbia University, terletak di New York City, adalah universitas Ivy League dengan fokus kuat pada penelitian dan pendidikan yang berdampak. Dengan lokasinya yang strategis dan program studi yang beragam, Columbia menawarkan kesempatan untuk terlibat dalam proyek penelitian yang relevan dan kolaborasi lintas disiplin. Komitmen pada keunggulan akademik dan integrasi dengan industri membuat Columbia menjadi pilihan yang menarik bagi calon mahasiswa yang ingin mengembangkan keterampilan dan pengetahuan yang relevan untuk masa depan yang sukses.', 'colombia.png'),
(25, '10', 'University of California, Berkeley', 'USA', '8', '16', '52', '6', '6', '5', '3', '', '16', '78.55', '2,012', 'University of California, Berkeley, adalah salah satu kampus publik terkemuka di AS, terletak di Bay Area, California. Dikenal karena keunggulan dalam sains, teknologi, dan humaniora, Berkeley menawarkan lingkungan belajar yang dinamis dan beragam. Dengan akses ke fasilitas penelitian yang mutakhir dan kolaborasi dengan industri dan komunitas lokal, Berkeley adalah tempat yang ideal bagi calon mahasiswa yang mencari pengalaman pendidikan yang berorientasi pada praktik dan inovasi.', 'berkeley.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favorit`
--
ALTER TABLE `favorit`
  ADD PRIMARY KEY (`idfavorit`),
  ADD KEY `iduniversitas` (`iduniversitas`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `universitas`
--
ALTER TABLE `universitas`
  ADD PRIMARY KEY (`iduniversitas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `favorit`
--
ALTER TABLE `favorit`
  MODIFY `idfavorit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `universitas`
--
ALTER TABLE `universitas`
  MODIFY `iduniversitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorit`
--
ALTER TABLE `favorit`
  ADD CONSTRAINT `favorit_ibfk_1` FOREIGN KEY (`id`) REFERENCES `pengguna` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorit_ibfk_2` FOREIGN KEY (`iduniversitas`) REFERENCES `universitas` (`iduniversitas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
