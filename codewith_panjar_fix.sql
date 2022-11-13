-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 13, 2022 at 08:50 PM
-- Server version: 10.5.18-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codewith_panjar`
--

-- --------------------------------------------------------

--
-- Table structure for table `ref_kecamatan`
--

CREATE TABLE `ref_kecamatan` (
  `KD_KOTA` varchar(2) NOT NULL,
  `KD_KEC` varchar(6) NOT NULL,
  `NM_KEC` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ref_kecamatan`
--

INSERT INTO `ref_kecamatan` (`KD_KOTA`, `KD_KEC`, `NM_KEC`) VALUES
('14', '1401', 'POHJENTREK'),
('14', '1402', 'KRATON'),
('14', '1403', 'KEJAYAN'),
('14', '1404', 'LEKOK'),
('14', '1405', 'REJOSO'),
('14', '1406', 'GRATI'),
('14', '1407', 'NGULING'),
('14', '1408', 'GONDANGWETAN'),
('14', '1409', 'WINONGAN'),
('14', '1410', 'PASREPAN'),
('14', '1411', 'LUMBANG'),
('14', '1412', 'PUSPO'),
('14', '1413', 'TOSARI'),
('17', '1700', ''),
('17', '1701', 'LUAR PASURUAN'),
('75', '7501', 'GADINGREJO'),
('75', '7502', 'PURWOREJO'),
('75', '7503', 'BUGULKIDUL'),
('75', '7504', 'PANGGUNGREJO');

-- --------------------------------------------------------

--
-- Table structure for table `ref_kelurahan`
--

CREATE TABLE `ref_kelurahan` (
  `KD_KEC` varchar(8) NOT NULL,
  `KD_KEL` varchar(8) NOT NULL,
  `NM_KEL` varchar(255) NOT NULL,
  `RADIUS` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ref_kelurahan`
--

INSERT INTO `ref_kelurahan` (`KD_KEC`, `KD_KEL`, `NM_KEL`, `RADIUS`) VALUES
('1401', '140101', 'PLERET', 2),
('1401', '140102', 'SUKOREJO', 2),
('1401', '140103', 'LOGOWOK', 2),
('1401', '140104', 'PARASREJO', 2),
('1401', '140105', 'SUNGIKULON', 2),
('1401', '140106', 'SUNGIWETAN', 2),
('1401', '140107', 'SUSUKANREJO', 2),
('1401', '140108', 'TIDU', 2),
('1401', '140109', 'WARUNGDOWO', 2),
('1402', '140201', 'KALIREJO', 2),
('1402', '140202', 'KRATON', 2),
('1402', '140203', 'SEMARE', 2),
('1402', '140204', 'TAMBAKREJO', 2),
('1402', '140205', 'ASEMKANDANG', 2),
('1402', '140206', 'BENDUNGAN', 2),
('1402', '140207', 'CURAHDUKUH', 2),
('1402', '140208', 'DHOMPO', 2),
('1402', '140209', 'GAMBIRKUNING', 2),
('1402', '140210', 'GERONGAN', 2),
('1402', '140211', 'JERUK', 2),
('1402', '140212', 'KARANGANYAR', 2),
('1402', '140213', 'KLAMPISREJO', 2),
('1402', '140214', 'KEBOTOHAN', 2),
('1402', '140215', 'MULYOREJO', 2),
('1402', '140216', 'NGABAR', 2),
('1402', '140217', 'NGEMPIT', 2),
('1402', '140218', 'PLINGGISAN', 2),
('1402', '140219', 'PUKUL', 2),
('1402', '140220', 'PULORKERTO', 2),
('1402', '140221', 'REJOSARI', 2),
('1402', '140222', 'SELOTAMBAK', 2),
('1402', '140223', 'SIDOGIRI', 2),
('1402', '140224', 'SLAMBRIT', 2),
('1402', '140225', 'TAMBAKSARI', 2),
('1403', '140301', 'KELKEJAYAN', 3),
('1403', '140302', 'COBANJOYO', 3),
('1403', '140303', 'KEDUNGPENGARON', 3),
('1403', '140304', 'KEPUH', 3),
('1403', '140305', 'KETANGIREJO', 3),
('1403', '140306', 'KLINTER', 3),
('1403', '140307', 'KURUNG', 3),
('1403', '140308', 'LOROKAN', 3),
('1403', '140309', 'LUWUK', 3),
('1403', '140310', 'AMBAL-AMBIL', 3),
('1403', '140311', 'PACARKELING', 3),
('1403', '140312', 'PATEBON', 3),
('1403', '140313', 'RANDUGONG', 3),
('1403', '140314', 'TANGGULANGIN', 3),
('1403', '140315', 'TUNDOSURU', 3),
('1403', '140316', 'SLADI', 3),
('1403', '140317', 'SUMBERBANTENG', 3),
('1403', '140318', 'WANGKALWETAN', 3),
('1403', '140319', 'WRATI', 3),
('1403', '140320', 'BENERWOJO', 3),
('1403', '140321', 'KADEMUNGAN', 3),
('1403', '140322', 'KLANGRONG', 3),
('1403', '140323', 'LINGGO', 3),
('1403', '140324', 'ORO-OROPULE', 3),
('1403', '140325', 'SUMBERSUKO', 3),
('1404', '140401', 'ALASTLOGO', 4),
('1404', '140402', 'BALUNGANYAR', 3),
('1404', '140403', 'BRANANG', 3),
('1404', '140404', 'GEJUGJATI', 3),
('1404', '140405', 'JATIREJO', 3),
('1404', '140406', 'PASINAN', 3),
('1404', '140407', 'ROWOGEMPOL', 3),
('1404', '140408', 'TAMBAKLEKOK', 3),
('1404', '140409', 'TAMPUNG', 3),
('1404', '140410', 'SEMEDUSARI', 4),
('1404', '140411', 'WATES', 4),
('1405', '140501', 'JARANGAN', 2),
('1405', '140502', 'KEDUNGBAKO', 2),
('1405', '140503', 'MANIKREJO', 2),
('1405', '140504', 'SAMBIREJO', 2),
('1405', '140505', 'ARJOSARI', 2),
('1405', '140506', 'KARANGPANDAN', 2),
('1405', '140507', 'KAWISREJO', 2),
('1405', '140508', 'KEMANTRENREJO', 2),
('1405', '140509', 'KETEGAN', 2),
('1405', '140510', 'PANDANREJO', 2),
('1405', '140511', 'PATUGURAN', 2),
('1405', '140512', 'REJOSOKIDUL', 2),
('1405', '140513', 'REJOSOLOR', 2),
('1405', '140514', 'SADENGREJO', 2),
('1405', '140515', 'SEGOROPURO', 3),
('1405', '140516', 'TOYANING', 3),
('1406', '140601', ' GRATITUNON', 3),
('1406', '140602', ' CUKURGONDANG', 3),
('1406', '140603', ' KALIPANG', 3),
('1406', '140604', ' KAMBINGANREJO', 3),
('1406', '140605', ' KARANGKLIWON', 3),
('1406', '140606', ' KARANGLO', 3),
('1406', '140607', ' KEBONREJO', 3),
('1406', '140608', ' KEDAWUNGWETAN', 3),
('1406', '140609', ' KEDAWUNGKULON', 3),
('1406', '140610', ' PLOSOSARI', 3),
('1406', '140611', ' RANUKLINDUNGAN', 3),
('1406', '140612', ' REBALAS', 3),
('1406', '140613', ' SUMBERAGUNG', 3),
('1406', '140614', ' SUMBERDAWESARI', 3),
('1406', '140615', ' TREWUNG', 3),
('1407', '140701', ' DANDANGGENDIS', 3),
('1407', '140702', ' KEDAWANG', 4),
('1407', '140703', ' NGULING', 3),
('1407', '140704', ' PENUNGGUL', 4),
('1407', '140705', ' RANDUATI', 3),
('1407', '140706', ' SANGANOM', 4),
('1407', '140707', ' SUDIMULYO', 3),
('1407', '140708', ' SUMBERANYAR', 3),
('1407', '140709', ' WATESTANI', 3),
('1407', '140710', ' WOTGALIH', 3),
('1407', '140711', ' KAPASAN', 4),
('1407', '140712', ' MLATEN', 4),
('1407', '140713', ' SEBALONG', 4),
('1407', '140714', ' SEDARUM', 3),
('1407', '140715', ' WATUPRAPAT', 4),
('1408', '140801', ' GONDANGWETAN', 2),
('1408', '140802', ' BAJANGAN', 2),
('1408', '140803', ' BAYEMAN', 2),
('1408', '140804', ' BRAMBANG', 2),
('1408', '140805', ' GAYAM', 2),
('1408', '140806', ' GROGOL', 2),
('1408', '140807', ' GONDANGREJO', 2),
('1408', '140808', ' KALIREJO', 2),
('1408', '140809', ' KARANGSENTUL', 2),
('1408', '140810', ' KEBONCANDI', 2),
('1408', '140811', ' KERSIKAN', 2),
('1408', '140812', ' LAJUK', 2),
('1408', '140813', ' PATEGUHAN', 2),
('1408', '140814', ' PEKANGKUNGAN', 2),
('1408', '140815', ' RANGGEH', 2),
('1408', '140816', ' SEKARPUTIH', 2),
('1408', '140817', ' TEBAS', 2),
('1408', '140818', ' TENGGILISREJO', 2),
('1408', '140819', ' WONOJATI', 2),
('1408', '140820', ' WONOSARI', 2),
('1409', '140901', ' BANDARAN', 3),
('1409', '140902', ' GADING', 3),
('1409', '140903', ' JELADRI', 3),
('1409', '140904', ' KANDUNG', 3),
('1409', '140905', ' KARANGTENGAH', 3),
('1409', '140906', ' KEDUNGREJO', 3),
('1409', '140907', ' LEBAK', 3),
('1409', '140908', ' MENDALAN', 3),
('1409', '140909', ' MENYARIK', 3),
('1409', '140910', ' MINGGIR', 3),
('1409', '140911', ' PENATAAN', 3),
('1409', '140912', ' PRODO', 3),
('1409', '140913', ' SIDEPAN', 3),
('1409', '140914', ' SUMBEREJO', 3),
('1409', '140915', ' SRUWI', 3),
('1409', '140916', ' UMBULAN', 3),
('1409', '140917', ' WINONGAN KIDUL', 3),
('1409', '140918', ' WINONGAN LOR', 3),
('1410', '141001', ' CONGKRONG', 3),
('1410', '141002', ' JOGOREPUH', 3),
('1410', '141003', ' KLAKAH', 3),
('1410', '141004', ' LEMAHBANG', 3),
('1410', '141005', ' MANGGUAN', 3),
('1410', '141006', ' NGANTUNGAN', 4),
('1410', '141007', ' PASREPAN', 3),
('1410', '141008', ' POHGADING', 3),
('1410', '141009', ' POHGEDANG', 3),
('1410', '141010', ' REJOSALAM', 3),
('1410', '141011', ' SIBON', 3),
('1410', '141012', ' TAMBAKREJO', 3),
('1410', '141013', ' AMPELSARI', 3),
('1410', '141014', ' GALIH', 4),
('1410', '141015', ' PETUNG', 4),
('1410', '141016', ' SAPULANTE', 4),
('1410', '141017', ' TEMPURAN', 4),
('1411', '141101', ' BANJARIMBO', 4),
('1411', '141102', ' BULUKANDANG', 4),
('1411', '141103', ' CUKURGULING', 4),
('1411', '141104', ' KARANGASEM', 4),
('1411', '141105', ' KARANGJATI', 4),
('1411', '141106', ' KRONTO', 4),
('1411', '141107', ' LUMBANG', 4),
('1411', '141108', ' PANCUR', 4),
('1411', '141109', ' PANDITAN', 4),
('1411', '141110', ' WATULUMBUNG', 4),
('1411', '141111', ' WELULANG', 4),
('1411', '141112', ' WONOREJO', 4),
('1412', '141201', ' JANJANG WULUNG', 4),
('1412', '141202', ' JIMBARAN', 4),
('1412', '141203', ' KEDUWUNG', 4),
('1412', '141204', ' KEMIRI', 4),
('1412', '141205', ' PALANGSARI', 4),
('1412', '141206', ' PUSPO', 4),
('1412', '141207', ' PUSUNGMALANG', 4),
('1413', '141301', ' BALEDONO', 5),
('1413', '141302', ' KANDANGAN', 5),
('1413', '141303', ' MOROREJO', 5),
('1413', '141304', ' NGADIWONO', 5),
('1413', '141305', ' PODOKOYO', 5),
('1413', '141306', ' SEDAENG', 5),
('1413', '141307', ' TOSARI', 5),
('1413', '141308', ' WONOKITRI', 5),
('1701', '170101', 'LUAR PASURUAN', 5),
('7501', '750101', 'BUKIR', 1),
('7501', '750102', 'GADING REJO', 1),
('7501', '750103', 'GENTONG', 1),
('7501', '750104', 'KARANGKETUG', 1),
('7501', '750105', 'KRAPYAKREJO', 1),
('7501', '750106', 'PETAHUNAN', 1),
('7501', '750107', 'RANDUSARI', 1),
('7501', '750108', 'SEBANI', 1),
('7502', '750201', 'KEBONAGUNG', 1),
('7502', '750202', 'POHJENTREK', 1),
('7502', '750203', 'PURUTREJO', 1),
('7502', '750204', 'PURWOREJO', 1),
('7502', '750205', 'SEKARDAWUNG', 1),
('7502', '750206', 'TEMBOKREJO', 1),
('7502', '750207', 'WIROGUNAN', 1),
('7503', '750301', 'BAKALAN', 1),
('7503', '750302', 'BLANDONGAN', 1),
('7503', '750303', 'BUGULKIDUL', 1),
('7503', '750304', 'KEPEL', 1),
('7503', '750305', 'KRAPYANGAN', 1),
('7503', '750306', 'TAPAAN', 1),
('7504', '750401', 'BANGILAN', 1),
('7504', '750402', 'BUGULLOR', 1),
('7504', '750403', 'KADANGSAPI', 1),
('7504', '750404', 'KARANGANYAR', 1),
('7504', '750405', 'KEBONSARI', 1),
('7504', '750406', 'MANDARANREJO', 1),
('7504', '750407', 'MAYANGAN', 1),
('7504', '750408', 'NGEMPLAKREJO', 1),
('7504', '750409', 'PANGGUNGREJO', 1),
('7504', '750410', 'PETAMANAN', 1),
('7504', '750411', 'PEKUNCEN', 1),
('7504', '750412', 'TAMBAKAN', 1),
('7504', '750413', 'TRAJENG', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ref_kota`
--

CREATE TABLE `ref_kota` (
  `KD_PROV` varchar(2) NOT NULL,
  `KD_KOTA` varchar(2) NOT NULL,
  `NM_KOTA` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ref_kota`
--

INSERT INTO `ref_kota` (`KD_PROV`, `KD_KOTA`, `NM_KOTA`) VALUES
('35', '14', 'KABUPATEN PASURUAN'),
('35', '17', 'LUAR PASURUAN'),
('35', '75', 'KOTA PASURUAN');

-- --------------------------------------------------------

--
-- Table structure for table `ref_radius`
--

CREATE TABLE `ref_radius` (
  `radius` int(1) NOT NULL,
  `biaya` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ref_radius`
--

INSERT INTO `ref_radius` (`radius`, `biaya`) VALUES
(1, 100000),
(2, 125000),
(3, 150000),
(4, 180000),
(5, 200000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ref_kecamatan`
--
ALTER TABLE `ref_kecamatan`
  ADD PRIMARY KEY (`KD_KEC`);

--
-- Indexes for table `ref_kelurahan`
--
ALTER TABLE `ref_kelurahan`
  ADD PRIMARY KEY (`KD_KEL`);

--
-- Indexes for table `ref_kota`
--
ALTER TABLE `ref_kota`
  ADD PRIMARY KEY (`KD_PROV`,`KD_KOTA`);

--
-- Indexes for table `ref_radius`
--
ALTER TABLE `ref_radius`
  ADD PRIMARY KEY (`radius`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
