-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2023 at 04:59 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart_farming`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Username` varchar(50) NOT NULL,
  `Password_Admin` varchar(50) NOT NULL,
  `Nama_Admin` varchar(50) NOT NULL,
  `Level_Admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Username`, `Password_Admin`, `Nama_Admin`, `Level_Admin`) VALUES
('admin', 'admin', 'admin', 'Admin'),
('HiAdmin', '1234', 'Rifki Kurniawan', 'Admin'),
('Okey Admin', '12345', 'Rifki Kurniawan', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `ID_Bank` varchar(50) NOT NULL,
  `Nama_Bank` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`ID_Bank`, `Nama_Bank`) VALUES
('Bank001', 'Bank Jago'),
('BCA_RI', 'BCA (BANK CENTRAL ASIA)'),
('BNI_RI', 'BNI (BANK NEGARA INDONESIA)'),
('BRI_RI', 'BRI (BANK REPUBLIK INDONESIA)'),
('MNDR_RI', 'BANK Mandiri'),
('SMSBL_RI', 'Bank Sumselbabel ( Sumatra Selatan Bangka Belitung');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `Kode_Barang` varchar(50) NOT NULL,
  `Tanggal_Barang_Masuk` date NOT NULL,
  `Nama_Barang` varchar(50) NOT NULL,
  `Deskripsi_Barang` varchar(50) NOT NULL,
  `ID_Penjual` varchar(50) NOT NULL,
  `Stok_Barang` varchar(50) NOT NULL,
  `Foto_Barang` varchar(50) NOT NULL,
  `Berat_Barang` int(50) NOT NULL,
  `Harga_Barang` int(50) NOT NULL,
  `Kode_Kelompok_Barang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`Kode_Barang`, `Tanggal_Barang_Masuk`, `Nama_Barang`, `Deskripsi_Barang`, `ID_Penjual`, `Stok_Barang`, `Foto_Barang`, `Berat_Barang`, `Harga_Barang`, `Kode_Kelompok_Barang`) VALUES
('brg0032', '0000-00-00', 'kerang darah paret 5', 'sangat enak dan renyah serta sehat', 'PE1', '19', 'kerang.jpg', 20, 20000, 'KB003'),
('brg0033', '0000-00-00', 'Tuna Kuning Tanjung Gudang', 'sangat enak dan renyah serta sehat', 'PE2', '13', 'TUNA.png', 14, 30000, 'KB001'),
('fish001', '2023-01-25', 'ikan tuna sirip kuning', 'Ikan tuna merupakan ikan besar yang cukup banyak d', '098820', '4', 'TUNA.png', 12, 30000, 'KB001'),
('fish002', '2023-01-31', 'Kerang darah', 'kerang darah merupakan seafood yang sangat diminat', '098820', '11', 'kerang.jpg', 30, 30000, 'KB003'),
('fish003', '2023-01-29', 'Udang Tanjung Gudang', 'Udang tanjung gudang merupakan udang yang sangat d', '098820', '2', 'udang.jpg', 9, 50000, 'KB005'),
('fish004', '2023-01-24', 'ikan kembung', 'ikan kembung adalah ikan yang sangat banyak manfaa', 'penjual', '22', 'kembung.jpg', 30, 30000, 'KB002');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_pengiriman`
--

CREATE TABLE `daftar_pengiriman` (
  `Kode_Daftar_Pengiriman` varchar(50) NOT NULL,
  `ID_Kota_Asal` varchar(50) NOT NULL,
  `Nama_Kota_Asal` varchar(50) NOT NULL,
  `ID_Kota_Tujuan` varchar(50) NOT NULL,
  `Nama_Kota_Tujuan` varchar(50) NOT NULL,
  `Kode_Sistem_Pengiriman` varchar(50) NOT NULL,
  `ID_Kategori` varchar(50) NOT NULL,
  `Tarif_Pengiriman` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daftar_pengiriman`
--

INSERT INTO `daftar_pengiriman` (`Kode_Daftar_Pengiriman`, `ID_Kota_Asal`, `Nama_Kota_Asal`, `ID_Kota_Tujuan`, `Nama_Kota_Tujuan`, `Kode_Sistem_Pengiriman`, `ID_Kategori`, `Tarif_Pengiriman`) VALUES
('DPKIRIM001', 'Kota06', 'Bangka', 'Kota06', 'Bangka', 'SPengirim01', 'Kat001', '10000'),
('DPKIRIM002', 'Kota06', 'Bangka', 'Kota06', 'Bangka', 'SPengirim01', 'Kat002', '20000'),
('DPKIRIM003', 'Kota06', 'Bangka', 'Kota06', 'Bangka', 'SPengirim02', 'Kat002', '30000'),
('DPKIRIM004', 'Kota06', 'Bangka', 'Kota06', 'Bangka', 'SPengirim01', 'Kat001', '25000'),
('DPKIRIM005', 'Kota06', 'Bangka', 'Kota07', 'Lampung', 'SPengirim01', 'Kat001', '30000'),
('DPKIRIM006', 'Kota06', 'Bangka', 'Kota07', 'Lampung', 'SPengirim02', 'Kat001', '20000'),
('DPKIRIM007', 'kota4', 'depok', 'Kota07', 'Lampung', 'SPengirim04', 'Kat001', '30000'),
('DPKIRIM008', 'kota4', 'depok', 'Kota06', 'Bangka', 'SPengirim01', 'Kat002', '40000'),
('DPKIRIM009', 'kota4', 'depok', 'Kota06', 'Bangka', 'SPengirim04', 'Kat001', '20000'),
('DPKIRIM011', 'kota1', 'jakarta', 'Kota06', 'Bangka', 'SPengirim01', 'Kat001', '30000'),
('DPKIRIM012', 'kota1', 'jakarta', 'Kota06', 'Bangka', 'SPengirim01', 'Kat002', '45000'),
('DPKIRIM013', 'kota1', 'jakarta', 'Kota06', 'Bangka', 'SPengirim02', 'Kat002', '30000'),
('DPKIRIM014', 'kota1', 'jakarta', 'Kota07', 'Lampung', 'SPengirim01', 'Kat002', '40000'),
('DPKIRIM015', 'kota1', 'jakarta', 'kota4', 'depok', 'SPengirim01', 'Kat002', '50000'),
('DPKIRIM016', 'kota1', 'jakarta', 'kota1', 'jakarta', 'SPengirim01', 'Kat002', '20000'),
('DPKIRIM018', 'kota1', 'jakarta', 'Kota08', 'Jambi', 'SPengirim01', 'Kat002', '50000'),
('DPKIRIM020', 'kota4', 'depok', 'kota3', 'tangerang', 'SPengirim01', 'Kat002', '30000'),
('DPKIRIM021', 'kota4', 'depok', 'kota1', 'jakarta', 'SPengirim01', 'Kat002', '30000'),
('DPKRM0021', 'kota3', '', 'kota1', '', 'SPengirim01', 'Kat001', '30000'),
('DPKRM0022', 'kota1', '', 'kota3', '', 'SPengirim01', 'Kat001', '30000'),
('DPKRM0023', 'kota2', '', 'kota1', '', 'SPengirim01', 'Kat001', '30000'),
('DPKRM0024', 'kota2', '', 'kota1', '', 'SPengirim01', 'Kat001', '30000');

-- --------------------------------------------------------

--
-- Table structure for table `faktur_beli`
--

CREATE TABLE `faktur_beli` (
  `ID_Faktur_Beli` varchar(50) NOT NULL,
  `Kode_Diskon` varchar(50) NOT NULL,
  `ID_Pembeli` varchar(50) NOT NULL,
  `ID_Status_Pembayaran` varchar(50) NOT NULL,
  `Total_Barang` int(50) NOT NULL,
  `Total_Bayar` int(50) NOT NULL,
  `QTY` int(50) NOT NULL,
  `Tanggal_Faktur_Beli` date NOT NULL,
  `No_Rekening_Pembeli` varchar(50) NOT NULL,
  `No_Pembayaran` varchar(50) NOT NULL,
  `ID_Jasa_Pembayaran` varchar(50) NOT NULL,
  `Bukti_Pembayaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faktur_beli`
--

INSERT INTO `faktur_beli` (`ID_Faktur_Beli`, `Kode_Diskon`, `ID_Pembeli`, `ID_Status_Pembayaran`, `Total_Barang`, `Total_Bayar`, `QTY`, `Tanggal_Faktur_Beli`, `No_Rekening_Pembeli`, `No_Pembayaran`, `ID_Jasa_Pembayaran`, `Bukti_Pembayaran`) VALUES
('fb001', 'Dis001', 'P002', 'StatBayar02', 6, 400000, 6, '2022-12-27', '1678213138', '', 'JasaBayar1', ''),
('FBL0012', '', 'P002', 'StatBayar01', 121, 700000, 4, '2023-01-08', '', '28172938', 'JasaBayar2', '20230108064253image (7).png'),
('FBTLRIN029', '', 'P002', 'StatBayar01', 2, 150000, 2, '2023-01-11', '1678213138', 'VCSHUI003', 'JBayar002', ''),
('FKBLP002127', '', 'P002', 'StatBayar02', 2, 130000, 2, '2023-01-11', '1678213138', 'NPSD151', 'JBayar002', '2023011110584420230102091400buktitf.jpg'),
('FKBLP002313', '', 'P002', 'StatBayar02', 2, 110000, 2, '2023-01-11', '1678213138', 'NPSD887', 'JBayar002', '2023011111450720230101180758buktitf.jpg'),
('FKBLP002804', '', 'P002', 'StatBayar02', 2, 130000, 2, '2023-01-10', '1678213138', 'NPSD404', 'JBayar002', '2023011014581820230101180758buktitf.jpg'),
('FKBLP002847', '', 'P002', 'StatBayar03', 2, 130000, 2, '2023-01-11', '1678213138', 'NPSD644', 'JBayar002', '2023011111115820230102091400buktitf.jpg'),
('FKBLP002859', 'Dis000', 'P002', 'StatBayar02', 2, 140000, 2, '2023-01-08', '1678213138', 'NPSD872', 'JBayar002', '20230108150604image (9).png'),
('FKBLP002883', '', 'P002', 'StatBayar02', 2, 130000, 2, '2023-01-11', '1678213138', 'NPSD190', 'JBayar002', '2023011111082320230101180758buktitf.jpg'),
('FKBLP002885', '', 'P002', 'StatBayar02', 4, 190000, 4, '2023-01-11', '1678213138', 'NPSD821', 'JBayar002', '2023011107094920230101180758buktitf.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `faktur_rinci`
--

CREATE TABLE `faktur_rinci` (
  `ID_Faktur_Rinci` varchar(50) NOT NULL,
  `ID_Faktur_Beli` varchar(50) NOT NULL,
  `ID_Status_Pengiriman` varchar(50) NOT NULL,
  `Tanggal` varchar(50) NOT NULL,
  `Kode_Daftar_Pengiriman` varchar(50) NOT NULL,
  `ID_Status_Transfer_Penjual` varchar(50) NOT NULL,
  `ID_Penjual` varchar(50) NOT NULL,
  `Transfer_Uang_Penjual` varchar(50) NOT NULL,
  `QTY_Barang_Per_Toko` int(50) NOT NULL,
  `Total_Rinci` int(50) NOT NULL,
  `Penilaian` varchar(50) NOT NULL,
  `Bintang` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faktur_rinci`
--

INSERT INTO `faktur_rinci` (`ID_Faktur_Rinci`, `ID_Faktur_Beli`, `ID_Status_Pengiriman`, `Tanggal`, `Kode_Daftar_Pengiriman`, `ID_Status_Transfer_Penjual`, `ID_Penjual`, `Transfer_Uang_Penjual`, `QTY_Barang_Per_Toko`, `Total_Rinci`, `Penilaian`, `Bintang`) VALUES
('fr001', 'fb001', 'SPENG1', '2022-12-27', 'DPKIRIM001', 'STF001', '098820', '400000', 6, 430000, 'keren', 5),
('FTRRNC002', 'FBTLRIN029', 'SPENG2', '2023-01-11', 'DPKIRIM011', 'STF002', '098820', '0', 1, 50000, '', 0),
('FTRRNC003', 'FBTLRIN029', 'SPENG2', '2023-01-11', 'DPKIRIM008', 'STF002', 'penjual', '0', 1, 30000, '', 0),
('RNCI159', 'FKBLP002883', 'SPENG8', '2023-01-11', 'DPKIRIM008', 'STF002', 'penjual', '0', 1, 30000, '', 0),
('RNCI183', 'FKBLP002804', 'SPENG2', '2023-01-10', 'DPKIRIM008', 'STF001', 'penjual', '0', 1, 30000, '', 0),
('RNCI201', 'FKBLP002859', 'SPENG2', '2023-01-08', 'DPKIRIM007', 'STF001', 'penjual', '0', 1, 30000, '', 0),
('RNCI211', 'FKBLP002313', 'SPENG8', '2023-01-11', 'DPKRM0023', 'STF002', 'PE1', '0', 1, 20000, '', 0),
('RNCI261', 'FKBLP002847', 'SPENG8', '2023-01-11', 'DPKIRIM008', 'STF002', 'penjual', '0', 1, 30000, '', 0),
('RNCI262', 'FKBLP002127', 'SPENG2', '2023-01-11', 'DPKIRIM011', 'STF002', '098820', '0', 1, 30000, '', 0),
('RNCI282', 'FKBLP002847', 'SPENG8', '2023-01-11', 'DPKIRIM011', 'STF002', '098820', '0', 1, 30000, '', 0),
('RNCI442', 'FBL0012', 'SPENG2', '2023-01-08', 'DPKIRIM007', 'STF001', 'penjual', '0', 1, 30000, 'wow', 4),
('RNCI455', 'FKBLP002127', 'SPENG2', '2023-01-11', 'DPKIRIM008', 'STF002', 'penjual', '0', 1, 30000, '', 0),
('RNCI589', 'FKBLP002313', 'SPENG8', '2023-01-11', 'DPKRM0021', 'STF002', 'PE2', '0', 1, 30000, '', 0),
('RNCI608', 'FKBLP002859', 'SPENG2', '2023-01-08', 'DPKIRIM011', 'STF001', '098820', '0', 1, 50000, '', 0),
('RNCI640', 'FKBLP002885', 'SPENG2', '2023-01-11', 'DPKIRIM011', 'STF002', '098820', '0', 3, 90000, '', 0),
('RNCI712', 'FKBLP002804', 'SPENG2', '2023-01-10', 'DPKIRIM011', 'STF001', '098820', '0', 1, 30000, '', 0),
('RNCI830', 'FKBLP002885', 'SPENG2', '2023-01-11', 'DPKIRIM008', 'STF002', 'penjual', '0', 1, 30000, '', 0),
('RNCI961', 'FBL0012', 'SPENG4', '2023-01-08', 'DPKIRIM011', 'STF001', '098820', '0', 1, 50000, 'BARANG NYA KEREN', 0),
('RNCI991', 'FKBLP002883', 'SPENG8', '2023-01-11', 'DPKIRIM011', 'STF002', '098820', '0', 1, 30000, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jasa_kirim`
--

CREATE TABLE `jasa_kirim` (
  `ID_Jasa_Kirim` varchar(50) NOT NULL,
  `Nama_Jasa_Kirim` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jasa_kirim`
--

INSERT INTO `jasa_kirim` (`ID_Jasa_Kirim`, `Nama_Jasa_Kirim`) VALUES
('JNED121', 'SICEPAT'),
('JNED12A', 'JNE ID'),
('JNT12A', 'JNT'),
('TIKI12A', 'TIKI');

-- --------------------------------------------------------

--
-- Table structure for table `jasa_pembayaran`
--

CREATE TABLE `jasa_pembayaran` (
  `ID_Jasa_Pembayaran` varchar(50) NOT NULL,
  `Kode_Jenis_Pembayaran` varchar(50) NOT NULL,
  `Nama_Jasa_Pembayaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jasa_pembayaran`
--

INSERT INTO `jasa_pembayaran` (`ID_Jasa_Pembayaran`, `Kode_Jenis_Pembayaran`, `Nama_Jasa_Pembayaran`) VALUES
('JasaBayar1', 'JePem12345', 'BNI'),
('JasaBayar2', 'JePem003', 'BCA'),
('JBayar002', 'E-WalletK1', 'Dana');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `Kode_Jenis_Barang` varchar(50) NOT NULL,
  `Nama_Jenis_Barang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`Kode_Jenis_Barang`, `Nama_Jenis_Barang`) VALUES
('JB006', 'Seafood'),
('JB01', 'Ikan');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pembayaran`
--

CREATE TABLE `jenis_pembayaran` (
  `Kode_Jenis_Pembayaran` varchar(50) NOT NULL,
  `Nama_Jenis_Pembayaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_pembayaran`
--

INSERT INTO `jenis_pembayaran` (`Kode_Jenis_Pembayaran`, `Nama_Jenis_Pembayaran`) VALUES
('E-WalletK1', 'E-Wallet'),
('JePem003', 'COD'),
('JePem12345', 'E-Banking');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pembeli`
--

CREATE TABLE `jenis_pembeli` (
  `Kode_Jenis_Pembeli` varchar(50) NOT NULL,
  `Nama_Jenis_Pembeli` varchar(50) NOT NULL,
  `Jumlah_Potongan` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_pembeli`
--

INSERT INTO `jenis_pembeli` (`Kode_Jenis_Pembeli`, `Nama_Jenis_Pembeli`, `Jumlah_Potongan`) VALUES
('1B1', 'Classic', 0),
('1B2', 'Bronxe', 5),
('1B3', 'Silver', 7),
('1B4', 'Gold', 10);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `ID_Kategori` varchar(50) NOT NULL,
  `Nama_Kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`ID_Kategori`, `Nama_Kategori`) VALUES
('Kat001', 'Tidak Berharga'),
('Kat002', 'Berharga');

-- --------------------------------------------------------

--
-- Table structure for table `kelompok_barang`
--

CREATE TABLE `kelompok_barang` (
  `Kode_Kelompok_Barang` varchar(50) NOT NULL,
  `Nama_Kelompok_Barang` varchar(50) NOT NULL,
  `Kode_Jenis_Barang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelompok_barang`
--

INSERT INTO `kelompok_barang` (`Kode_Kelompok_Barang`, `Nama_Kelompok_Barang`, `Kode_Jenis_Barang`) VALUES
('KB001', 'Tuna', 'JB01'),
('KB002', 'Kembung', 'JB01'),
('KB003', 'Kerang', 'JB006'),
('KB004', 'Tenggiri', 'JB01'),
('KB005', 'udang', 'JB006');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `ID_Kota` varchar(50) NOT NULL,
  `Nama_Kota` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`ID_Kota`, `Nama_Kota`) VALUES
('Kota06', 'Bangka'),
('Kota07', 'Lampung'),
('Kota08', 'Jambi'),
('Kota09', 'Padang'),
('kota1', 'jakarta'),
('kota2', 'palembang'),
('kota3', 'tangerang'),
('kota4', 'depok');

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `ID_Pembeli` varchar(50) NOT NULL,
  `Nama_Pembeli` varchar(50) NOT NULL,
  `Alamat_Pembeli` varchar(50) NOT NULL,
  `Username_Pembeli` varchar(50) NOT NULL,
  `Password_Pembeli` varchar(50) NOT NULL,
  `No_Handphone_Pembeli` varchar(50) NOT NULL,
  `Kode_Jenis_Pembeli` varchar(50) NOT NULL,
  `No_Rekening_Pembeli` varchar(50) NOT NULL,
  `ID_Kota_Pembeli` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`ID_Pembeli`, `Nama_Pembeli`, `Alamat_Pembeli`, `Username_Pembeli`, `Password_Pembeli`, `No_Handphone_Pembeli`, `Kode_Jenis_Pembeli`, `No_Rekening_Pembeli`, `ID_Kota_Pembeli`) VALUES
('P002', 'reno', 'jalan kusam belinyu', 'reno', 'mantap', '082383921239', '1B3', '1678213138', 'kota1'),
('PBeli', 'Faisal', 'jalan kusam belinyu', 'faisal', 'faisal', '082381921212', '1B1', '1929122231', 'kota3');

-- --------------------------------------------------------

--
-- Table structure for table `penjual`
--

CREATE TABLE `penjual` (
  `ID_Penjual` varchar(50) NOT NULL,
  `Nama_Penjual` varchar(50) NOT NULL,
  `Username_Penjual` varchar(50) NOT NULL,
  `Password_Penjual` varchar(50) NOT NULL,
  `Alamat_Penjual` varchar(50) NOT NULL,
  `ID_Bank` varchar(50) NOT NULL,
  `No_Rekening_Penjual` varchar(50) NOT NULL,
  `No_Handphone_Penjual` varchar(50) NOT NULL,
  `ID_Kota` varchar(50) NOT NULL,
  `Tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjual`
--

INSERT INTO `penjual` (`ID_Penjual`, `Nama_Penjual`, `Username_Penjual`, `Password_Penjual`, `Alamat_Penjual`, `ID_Bank`, `No_Rekening_Penjual`, `No_Handphone_Penjual`, `ID_Kota`, `Tanggal`) VALUES
('098820', 'ILHAM Indra', 'ilham', 'ilham', 'JALAN Sekip', 'BNI_RI', '1234257162', '0822281821912', 'kota1', '2023-01-01'),
('PE1', 'REFKY MAULANA FIKRI', 'kiboo', '12345', 'DESA DELAS BANGKA SELATAN BANGKA BELITUNG', 'BCA_RI', '31241525', '085756352242632', 'kota2', '2022-01-04'),
('PE2', 'ARYA ALL FAJRI', 'arya', '12345', 'Prabumulih', 'BRI_RI', '14718772', '08193618541', 'kota3', '2023-01-05'),
('penjual', 'gio', 'reno', 'mantap', 'jalan palem', 'BCA_RI', '137612621', '082228182199288', 'kota4', '2023-01-09');

-- --------------------------------------------------------

--
-- Table structure for table `sistem_pengiriman`
--

CREATE TABLE `sistem_pengiriman` (
  `Kode_Sistem_Pengiriman` varchar(50) NOT NULL,
  `ID_Jasa_Kirim` varchar(50) NOT NULL,
  `Nama_Sistem_Pengiriman` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sistem_pengiriman`
--

INSERT INTO `sistem_pengiriman` (`Kode_Sistem_Pengiriman`, `ID_Jasa_Kirim`, `Nama_Sistem_Pengiriman`) VALUES
('SPengirim01', 'JNED121', 'Express'),
('SPengirim02', 'JNED121', 'Reguler'),
('SPengirim03', 'JNED12A', 'ON'),
('SPengirim04', 'TIKI12A', 'Kargo');

-- --------------------------------------------------------

--
-- Table structure for table `status_order`
--

CREATE TABLE `status_order` (
  `ID_Status_Order` varchar(50) NOT NULL,
  `Ket_Status_Order` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status_order`
--

INSERT INTO `status_order` (`ID_Status_Order`, `Ket_Status_Order`) VALUES
('S0rder01', 'Menunggu Pesanan di Proses Penjual'),
('S0rder02', 'Pesanan Sudah di Terima Pihak Jasa Kirim'),
('S0rder03', 'Pesanan di Batalkan Penjual'),
('S0rder04', 'Sedang Dikemas'),
('S0rder05', 'Dalam Perjalanan'),
('S0rder06', 'Telah Diterima');

-- --------------------------------------------------------

--
-- Table structure for table `status_pembayaran`
--

CREATE TABLE `status_pembayaran` (
  `ID_Status_Pembayaran` varchar(50) NOT NULL,
  `Ket_Status_Pembayaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status_pembayaran`
--

INSERT INTO `status_pembayaran` (`ID_Status_Pembayaran`, `Ket_Status_Pembayaran`) VALUES
('StatBayar01', 'Belum Bayar'),
('StatBayar02', 'Sudah Bayar'),
('StatBayar03', 'Pembayaran Sedang Diverifikasi'),
('StatBayar04', 'Pembayaran Ditolak'),
('StatBayar05', 'Pembayaran Dibatalkan');

-- --------------------------------------------------------

--
-- Table structure for table `status_pengiriman`
--

CREATE TABLE `status_pengiriman` (
  `ID_Status_Pengiriman` varchar(50) NOT NULL,
  `Ket_Status_Pengiriman` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status_pengiriman`
--

INSERT INTO `status_pengiriman` (`ID_Status_Pengiriman`, `Ket_Status_Pengiriman`) VALUES
('SPENG1', 'Dikirim'),
('SPENG2', 'Belum Dikirim'),
('SPENG3', 'Selesai'),
('SPENG4', 'Barang Diterima'),
('SPENG5', 'Retur Barang'),
('SPENG6', 'Batal'),
('SPENG8', 'Barang Dikemas');

-- --------------------------------------------------------

--
-- Table structure for table `status_transfer_penjual`
--

CREATE TABLE `status_transfer_penjual` (
  `ID_Status_Transfer_Penjual` varchar(50) NOT NULL,
  `Ket_Status_Transfer_Penjual` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status_transfer_penjual`
--

INSERT INTO `status_transfer_penjual` (`ID_Status_Transfer_Penjual`, `Ket_Status_Transfer_Penjual`) VALUES
('STF001', 'Sudah Transfer'),
('STF002', 'Belum Transfer'),
('STF003', 'Batal Transfer');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `Kode_Barang` varchar(50) NOT NULL,
  `ID_Faktur_Rinci` varchar(50) NOT NULL,
  `QTY_Barang` varchar(50) NOT NULL,
  `Sub_Total` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`Kode_Barang`, `ID_Faktur_Rinci`, `QTY_Barang`, `Sub_Total`) VALUES
('fish003', 'RNCI961', '1', '50000'),
('fish004', 'RNCI442', '1', '30000'),
('fish003', 'RNCI608', '1', '50000'),
('fish004', 'RNCI201', '1', '30000'),
('fish001', 'RNCI712', '1', '30000'),
('fish004', 'RNCI183', '1', '30000'),
('fish003', 'FTRRNC002', '1', '50000'),
('fish004', 'FTRRNC003', '1', '30000'),
('fish001', 'RNCI640', '3', '90000'),
('fish004', 'RNCI830', '1', '30000'),
('fish001', 'RNCI262', '1', '30000'),
('fish004', 'RNCI455', '1', '30000'),
('fish001', 'RNCI991', '1', '30000'),
('fish004', 'RNCI159', '1', '30000'),
('fish002', 'RNCI282', '1', '30000'),
('fish004', 'RNCI261', '1', '30000'),
('brg0032', 'RNCI211', '1', '20000'),
('brg0033', 'RNCI589', '1', '30000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Username` enum('admin','penjual','pembeli') NOT NULL,
  `Password` enum('admin','penjual','pembeli') NOT NULL,
  `Level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=sjis COLLATE=sjis_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`ID_Bank`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`Kode_Barang`),
  ADD KEY `ID_Penjual` (`ID_Penjual`),
  ADD KEY `Kode_Kelompok_Barang` (`Kode_Kelompok_Barang`);

--
-- Indexes for table `daftar_pengiriman`
--
ALTER TABLE `daftar_pengiriman`
  ADD PRIMARY KEY (`Kode_Daftar_Pengiriman`),
  ADD KEY `ID_Kota_Asal` (`ID_Kota_Asal`),
  ADD KEY `ID_Kategori` (`ID_Kategori`),
  ADD KEY `Kode_Sistem_Pengiriman` (`Kode_Sistem_Pengiriman`),
  ADD KEY `ID_Kota_Tujuan` (`ID_Kota_Tujuan`);

--
-- Indexes for table `faktur_beli`
--
ALTER TABLE `faktur_beli`
  ADD PRIMARY KEY (`ID_Faktur_Beli`),
  ADD KEY `Kode_Diskon` (`Kode_Diskon`),
  ADD KEY `ID_Penjual` (`ID_Pembeli`),
  ADD KEY `ID_Status_Pembayaran` (`ID_Status_Pembayaran`),
  ADD KEY `ID_Jasa_Pembayaran` (`ID_Jasa_Pembayaran`);

--
-- Indexes for table `faktur_rinci`
--
ALTER TABLE `faktur_rinci`
  ADD PRIMARY KEY (`ID_Faktur_Rinci`),
  ADD KEY `Kode_Status_Pengiriman` (`ID_Status_Pengiriman`),
  ADD KEY `Kode_Daftar_Pengiriman` (`Kode_Daftar_Pengiriman`),
  ADD KEY `ID_Penjual` (`ID_Penjual`),
  ADD KEY `ID_Status_Transfer_Penjual` (`ID_Status_Transfer_Penjual`),
  ADD KEY `ID_Faktur_Beli` (`ID_Faktur_Beli`);

--
-- Indexes for table `jasa_kirim`
--
ALTER TABLE `jasa_kirim`
  ADD PRIMARY KEY (`ID_Jasa_Kirim`);

--
-- Indexes for table `jasa_pembayaran`
--
ALTER TABLE `jasa_pembayaran`
  ADD PRIMARY KEY (`ID_Jasa_Pembayaran`),
  ADD UNIQUE KEY `Kode_Jenis_Pembayaran` (`Kode_Jenis_Pembayaran`);

--
-- Indexes for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`Kode_Jenis_Barang`);

--
-- Indexes for table `jenis_pembayaran`
--
ALTER TABLE `jenis_pembayaran`
  ADD PRIMARY KEY (`Kode_Jenis_Pembayaran`);

--
-- Indexes for table `jenis_pembeli`
--
ALTER TABLE `jenis_pembeli`
  ADD PRIMARY KEY (`Kode_Jenis_Pembeli`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`ID_Kategori`);

--
-- Indexes for table `kelompok_barang`
--
ALTER TABLE `kelompok_barang`
  ADD PRIMARY KEY (`Kode_Kelompok_Barang`),
  ADD KEY `Kode_Jenis_Barang` (`Kode_Jenis_Barang`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`ID_Kota`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`ID_Pembeli`),
  ADD KEY `Kode_Jenis_Pembeli` (`Kode_Jenis_Pembeli`),
  ADD KEY `ID_Kota` (`ID_Kota_Pembeli`);

--
-- Indexes for table `penjual`
--
ALTER TABLE `penjual`
  ADD PRIMARY KEY (`ID_Penjual`),
  ADD KEY `ID_Bank` (`ID_Bank`),
  ADD KEY `ID_Kota` (`ID_Kota`);

--
-- Indexes for table `sistem_pengiriman`
--
ALTER TABLE `sistem_pengiriman`
  ADD PRIMARY KEY (`Kode_Sistem_Pengiriman`),
  ADD KEY `ID_Jasa_Kirim` (`ID_Jasa_Kirim`);

--
-- Indexes for table `status_order`
--
ALTER TABLE `status_order`
  ADD PRIMARY KEY (`ID_Status_Order`);

--
-- Indexes for table `status_pembayaran`
--
ALTER TABLE `status_pembayaran`
  ADD PRIMARY KEY (`ID_Status_Pembayaran`);

--
-- Indexes for table `status_pengiriman`
--
ALTER TABLE `status_pengiriman`
  ADD PRIMARY KEY (`ID_Status_Pengiriman`);

--
-- Indexes for table `status_transfer_penjual`
--
ALTER TABLE `status_transfer_penjual`
  ADD PRIMARY KEY (`ID_Status_Transfer_Penjual`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD KEY `Kode_Barang` (`Kode_Barang`),
  ADD KEY `ID_Faktur_Rinci` (`ID_Faktur_Rinci`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`ID_Penjual`) REFERENCES `penjual` (`ID_Penjual`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_ibfk_3` FOREIGN KEY (`Kode_Kelompok_Barang`) REFERENCES `kelompok_barang` (`Kode_Kelompok_Barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `daftar_pengiriman`
--
ALTER TABLE `daftar_pengiriman`
  ADD CONSTRAINT `daftar_pengiriman_ibfk_1` FOREIGN KEY (`ID_Kategori`) REFERENCES `kategori` (`ID_Kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `daftar_pengiriman_ibfk_2` FOREIGN KEY (`ID_Kota_Asal`) REFERENCES `kota` (`ID_Kota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `daftar_pengiriman_ibfk_3` FOREIGN KEY (`ID_Kota_Tujuan`) REFERENCES `kota` (`ID_Kota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `daftar_pengiriman_ibfk_4` FOREIGN KEY (`Kode_Sistem_Pengiriman`) REFERENCES `sistem_pengiriman` (`Kode_Sistem_Pengiriman`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faktur_beli`
--
ALTER TABLE `faktur_beli`
  ADD CONSTRAINT `faktur_beli_ibfk_2` FOREIGN KEY (`ID_Pembeli`) REFERENCES `pembeli` (`ID_Pembeli`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faktur_beli_ibfk_3` FOREIGN KEY (`ID_Status_Pembayaran`) REFERENCES `status_pembayaran` (`ID_Status_Pembayaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faktur_beli_ibfk_6` FOREIGN KEY (`ID_Jasa_Pembayaran`) REFERENCES `jasa_pembayaran` (`ID_Jasa_Pembayaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faktur_rinci`
--
ALTER TABLE `faktur_rinci`
  ADD CONSTRAINT `faktur_rinci_ibfk_1` FOREIGN KEY (`ID_Status_Transfer_Penjual`) REFERENCES `status_transfer_penjual` (`ID_Status_Transfer_Penjual`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faktur_rinci_ibfk_2` FOREIGN KEY (`ID_Penjual`) REFERENCES `penjual` (`ID_Penjual`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faktur_rinci_ibfk_3` FOREIGN KEY (`ID_Status_Pengiriman`) REFERENCES `status_pengiriman` (`ID_Status_Pengiriman`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faktur_rinci_ibfk_4` FOREIGN KEY (`ID_Faktur_Beli`) REFERENCES `faktur_beli` (`ID_Faktur_Beli`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faktur_rinci_ibfk_5` FOREIGN KEY (`Kode_Daftar_Pengiriman`) REFERENCES `daftar_pengiriman` (`Kode_Daftar_Pengiriman`);

--
-- Constraints for table `jasa_pembayaran`
--
ALTER TABLE `jasa_pembayaran`
  ADD CONSTRAINT `jasa_pembayaran_ibfk_1` FOREIGN KEY (`Kode_Jenis_Pembayaran`) REFERENCES `jenis_pembayaran` (`Kode_Jenis_Pembayaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelompok_barang`
--
ALTER TABLE `kelompok_barang`
  ADD CONSTRAINT `kelompok_barang_ibfk_1` FOREIGN KEY (`Kode_Jenis_Barang`) REFERENCES `jenis_barang` (`Kode_Jenis_Barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD CONSTRAINT `pembeli_ibfk_1` FOREIGN KEY (`Kode_Jenis_Pembeli`) REFERENCES `jenis_pembeli` (`Kode_Jenis_Pembeli`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembeli_ibfk_2` FOREIGN KEY (`ID_Kota_Pembeli`) REFERENCES `kota` (`ID_Kota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penjual`
--
ALTER TABLE `penjual`
  ADD CONSTRAINT `penjual_ibfk_1` FOREIGN KEY (`ID_Bank`) REFERENCES `bank` (`ID_Bank`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penjual_ibfk_2` FOREIGN KEY (`ID_Kota`) REFERENCES `kota` (`ID_Kota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sistem_pengiriman`
--
ALTER TABLE `sistem_pengiriman`
  ADD CONSTRAINT `sistem_pengiriman_ibfk_1` FOREIGN KEY (`ID_Jasa_Kirim`) REFERENCES `jasa_kirim` (`ID_Jasa_Kirim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`Kode_Barang`) REFERENCES `barang` (`Kode_Barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`ID_Faktur_Rinci`) REFERENCES `faktur_rinci` (`ID_Faktur_Rinci`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
