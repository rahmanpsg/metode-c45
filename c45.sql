-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2021 at 08:25 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `c45`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attribut`
--

CREATE TABLE `tbl_attribut` (
  `id` int(2) NOT NULL,
  `attribut` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_attribut`
--

INSERT INTO `tbl_attribut` (`id`, `attribut`) VALUES
(1, 'pekerjaan'),
(2, 'penghasilan'),
(3, 'plafond'),
(4, 'saldo'),
(5, 'tujuan'),
(6, 'jaminan'),
(7, 'jangka waktu');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data`
--

CREATE TABLE `tbl_data` (
  `id` int(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `umur` int(3) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `penghasilan` int(16) NOT NULL,
  `plafond` int(16) NOT NULL,
  `saldo` int(16) NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `jaminan` int(1) NOT NULL,
  `waktu_peminjaman` date NOT NULL,
  `batas_peminjaman` date NOT NULL,
  `jangka_waktu` int(2) NOT NULL,
  `kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_data`
--

INSERT INTO `tbl_data` (`id`, `nama`, `tanggal_lahir`, `umur`, `pekerjaan`, `penghasilan`, `plafond`, `saldo`, `tujuan`, `jaminan`, `waktu_peminjaman`, `batas_peminjaman`, `jangka_waktu`, `kelas`) VALUES
(1, 'ASHADI TAJUDDIN', '1985-05-17', 34, 'KARYAWAN SWASTA', 7000000, 500000000, 160128465, 'PRODUKTIF', 2, '2018-10-11', '2022-10-11', 4, 'LANCAR'),
(2, 'ARDIANSA', '1990-10-22', 29, 'KARYAWAN SWASTA', 5200000, 217000000, 208162480, 'KONSUMTIF', 1, '2016-03-19', '2020-03-19', 4, 'LANCAR'),
(3, 'SUMIATI', '1990-06-20', 29, 'KARYAWAN SWASTA', 5200000, 217000000, 208162480, 'KONSUMTIF', 2, '2016-10-01', '2020-10-01', 4, 'LANCAR'),
(4, 'YAKOLINA S. TASIK', '1983-10-23', 36, 'PNS', 5000000, 290000000, 263764578, 'PRODUKTIF', 2, '2016-11-20', '2021-11-20', 5, 'LANCAR'),
(5, 'ABDUL MAJID S.PD', '1984-09-06', 35, 'PNS', 5000000, 228000000, 221902505, 'KONSUMTIF', 1, '2019-09-24', '2025-09-24', 6, 'LANCAR'),
(6, 'ROSMIDA', '1969-06-30', 50, 'PNS', 4800000, 130000000, 51792142, 'PRODUKTIF', 1, '2017-06-17', '2020-06-17', 3, 'LANCAR'),
(7, 'SYAHRIR MAGGA', '1969-05-23', 50, 'KARYAWAN SWASTA', 4700000, 78000000, 61805036, 'PRODUKTIF', 1, '2016-12-15', '2017-12-15', 1, 'LANCAR'),
(8, 'ZAENAB', '1983-09-05', 36, 'KARYAWAN SWASTA', 4600000, 65000000, 47909942, 'PRODUKTIF', 2, '2017-04-20', '2018-04-20', 1, 'LANCAR'),
(9, 'ATJO NADJAMUDDIN', '1968-08-24', 51, 'PNS', 4500000, 470000000, 281482566, 'PRODUKTIF', 2, '2016-12-26', '2022-12-26', 6, 'LANCAR'),
(10, 'HAERUDDIN', '1965-05-10', 54, 'PNS', 4300000, 259000000, 247220616, 'KONSUMTIF', 2, '2019-10-31', '2021-10-31', 2, 'LANCAR'),
(11, 'FATMAH MUHAMMAD', '1977-05-12', 42, 'PNS', 4200000, 200000000, 162213920, 'PRODUKTIF', 1, '2019-06-20', '2025-06-20', 6, 'LANCAR'),
(12, 'MUSA', '1961-09-23', 58, 'PNS', 4100000, 237000000, 230661818, 'KONSUMTIF', 2, '2017-02-12', '2019-02-12', 2, 'LANCAR'),
(13, 'NURMIATY', '1980-07-27', 39, 'KARYAWAN SWASTA', 4000000, 370000000, 368522076, 'PRODUKTIF', 2, '2018-09-04', '2021-09-04', 3, 'LANCAR'),
(14, 'LAODE IMRAN', '1968-08-14', 51, 'PNS', 4000000, 228000000, 224908836, 'KONSUMTIF', 1, '2018-02-23', '2022-02-23', 4, 'LANCAR'),
(15, 'ACO BAKHTIAR', '1982-12-28', 37, 'PNS', 4000000, 155000000, 140977620, 'PRODUKTIF', 1, '2018-04-19', '2021-04-19', 3, 'LANCAR'),
(16, 'SUPRIYONO NAPEN SUSANTO', '1986-12-04', 33, 'KARYAWAN SWASTA', 4000000, 80000000, 67701732, 'KONSUMTIF', 1, '2017-01-07', '2019-01-07', 2, 'LANCAR'),
(17, 'BUSTAN', '1969-08-31', 50, 'PNS', 3800000, 280000000, 248037543, 'PRODUKTIF', 2, '2018-08-20', '2023-08-20', 5, 'LANCAR'),
(18, 'SARINIWATI', '1983-04-07', 36, 'PNS', 3800000, 260000000, 237830531, 'PRODUKTIF', 1, '2016-02-04', '2020-02-04', 4, 'LANCAR'),
(19, 'SYAHRIA SARIJAN, SH', '1970-04-07', 49, 'PNS', 3800000, 170000000, 159915350, 'PRODUKTIF', 1, '2017-03-09', '2020-03-09', 3, 'LANCAR'),
(20, 'SYAFRIADI', '1971-09-11', 48, 'PNS', 3800000, 193000000, 130000000, 'KONSUMTIF', 1, '2018-05-26', '2022-05-26', 4, 'LANCAR'),
(21, 'ROSMYATI', '1964-11-01', 55, 'PNS', 3700000, 92000000, 75523978, 'PRODUKTIF', 1, '2016-09-04', '2018-09-04', 2, 'LANCAR'),
(22, 'RINI SETIAWATY', '1989-04-22', 30, 'PNS', 3700000, 70000000, 54210856, 'PRODUKTIF', 1, '2019-10-13', '2020-10-13', 1, 'LANCAR'),
(23, 'BAHARUDDIN S', '1965-03-20', 54, 'KARYAWAN SWASTA', 3500000, 500000000, 500000000, 'PRODUKTIF', 2, '2019-06-16', '2021-06-16', 2, 'LANCAR'),
(24, 'KUSMAN', '1973-01-24', 47, 'PNS', 3500000, 265000000, 265000000, 'PRODUKTIF', 2, '2018-08-17', '2023-08-17', 5, 'LANCAR'),
(25, 'ZAINAL ABIDIN', '1989-09-02', 30, 'KARYAWAN SWASTA', 3500000, 250000000, 246388592, 'PRODUKTIF', 1, '2018-02-10', '2020-02-10', 2, 'LANCAR'),
(26, 'JUMALIAH', '1966-01-06', 54, 'PNS', 3500000, 60000000, 48174143, 'PRODUKTIF', 1, '2018-07-26', '2019-07-26', 1, 'LANCAR'),
(27, 'SUPRI SISE', '1966-01-22', 54, 'PNS', 3500000, 41000000, 38400271, 'PRODUKTIF', 1, '2018-11-04', '2019-11-04', 1, 'LANCAR'),
(28, 'NURHIDAYAH MAJID', '1994-04-25', 25, 'PNS', 3200000, 260000000, 250635162, 'KONSUMTIF', 2, '2017-04-04', '2021-04-04', 4, 'LANCAR'),
(29, 'JUMAISA', '1994-06-20', 25, 'PNS', 3200000, 260000000, 250635162, 'KONSUMTIF', 1, '2017-12-19', '2022-12-19', 5, 'LANCAR'),
(30, 'ROSMAWATI', '1985-04-14', 34, 'KARYAWAN SWASTA', 3200000, 100000000, 120000000, 'PRODUKTIF', 1, '2018-04-06', '2021-04-06', 3, 'LANCAR'),
(31, 'DRG.HJ.MEGAWATI WAHAB', '1984-12-25', 35, 'PNS', 3000000, 300000000, 269493772, 'PRODUKTIF', 2, '2016-10-14', '2021-10-14', 5, 'LANCAR'),
(32, 'LAETITIA RANDAN', '1988-05-09', 31, 'PNS', 3000000, 255000000, 245815259, 'KONSUMTIF', 1, '2019-02-21', '2022-02-21', 3, 'MACET'),
(33, 'SURIANA', '1988-07-23', 31, 'KARYAWAN SWASTA', 3000000, 255000000, 245815259, 'PRODUKTIF', 1, '2016-10-08', '2021-10-08', 5, 'LANCAR'),
(34, 'IRMASARI', '1984-05-23', 35, 'KARYAWAN SWASTA', 3000000, 220000000, 220000000, 'PRODUKTIF', 1, '2016-05-21', '2021-05-21', 5, 'LANCAR'),
(35, 'SITTI NURHAYATI', '1966-11-10', 53, 'KARYAWAN SWASTA', 3000000, 120000000, 43831464, 'PRODUKTIF', 1, '2016-06-21', '2019-06-21', 3, 'MACET'),
(36, 'HJ. NURHAYATI, SH', '1970-06-15', 49, 'PNS', 3000000, 140000000, 43729782, 'PRODUKTIF', 1, '2016-09-20', '2020-09-20', 4, 'LANCAR'),
(37, 'YOAN LAURA TAMPILANG', '1990-06-04', 29, 'PNS', 2800000, 240000000, 214468722, 'KONSUMTIF', 1, '2016-06-27', '2021-06-27', 5, 'LANCAR'),
(38, 'MULIADI', '1970-06-20', 49, 'PNS', 2800000, 200000000, 180773460, 'PRODUKTIF', 1, '2018-07-11', '2020-07-11', 2, 'MACET'),
(39, 'BASUKI BUSRAH, SE', '1969-12-25', 50, 'KARYAWAN SWASTA', 2800000, 145000000, 139094745, 'PRODUKTIF', 2, '2016-02-22', '2019-02-22', 3, 'LANCAR'),
(40, 'ANDI ARMANSYAH', '1991-05-26', 28, 'PNS', 2800000, 140000000, 132960506, 'PRODUKTIF', 1, '2018-02-23', '2022-02-23', 4, 'LANCAR'),
(41, 'HAMSINAR', '1976-04-03', 43, 'PNS', 2800000, 75000000, 65094760, 'PRODUKTIF', 1, '2018-09-04', '2020-09-04', 2, 'MACET'),
(42, 'KORNELIA SAULE, AMK', '1975-01-16', 45, 'PNS', 2700000, 245000000, 230292541, 'PRODUKTIF', 1, '2018-08-27', '2023-08-27', 5, 'MACET'),
(43, 'HJ. RENY ANOMSARI', '1965-05-23', 54, 'PNS', 2700000, 240000000, 218287932, 'KONSUMTIF', 1, '2018-12-10', '2022-12-10', 4, 'LANCAR'),
(44, 'SARFIAH', '1992-03-10', 27, 'PNS', 2700000, 220000000, 204605556, 'PRODUKTIF', 1, '2017-02-22', '2019-02-22', 2, 'LANCAR'),
(45, 'MUHAMMAD NAIM', '1988-10-17', 31, 'PNS', 2700000, 210000000, 202436094, 'PRODUKTIF', 1, '2018-11-12', '2021-11-12', 3, 'LANCAR'),
(46, 'WAY ROSMITA  K', '1992-01-28', 28, 'PNS', 2700000, 205000000, 200454219, 'PRODUKTIF', 2, '2018-02-24', '2021-02-24', 3, 'MACET'),
(47, 'WAHYUNI UMAR', '1982-01-07', 38, 'PNS', 2700000, 215000000, 195549618, 'PRODUKTIF', 1, '2019-10-27', '2024-10-27', 5, 'MACET'),
(48, 'NURLIAH', '1969-02-15', 50, 'KARYAWAN SWASTA', 2700000, 215000000, 195549618, 'PRODUKTIF', 1, '2016-11-30', '2021-11-30', 5, 'LANCAR'),
(49, 'MUSTAMIN', '1966-12-18', 53, 'PNS', 2700000, 184000000, 183176377, 'PRODUKTIF', 1, '2017-04-30', '2019-04-30', 2, 'LANCAR'),
(50, 'IRMA', '1989-09-18', 30, 'PNS', 2700000, 178000000, 160027720, 'KONSUMTIF', 2, '2017-07-28', '2020-07-28', 3, 'MACET'),
(51, 'NILMA FITRIA', '1992-01-05', 28, 'PNS', 2700000, 140000000, 130203542, 'KONSUMTIF', 2, '2016-06-26', '2018-06-26', 2, 'MACET'),
(52, 'FITRIAH', '1987-03-02', 32, 'PNS', 2700000, 35000000, 33608028, 'KONSUMTIF', 1, '2018-01-22', '2025-01-22', 7, 'LANCAR'),
(53, 'ABDUL SALAM SULAEMAN', '1986-07-04', 33, 'PNS', 2500000, 213000000, 212046567, 'PRODUKTIF', 2, '2016-03-01', '2021-03-01', 4, 'MACET'),
(54, 'LINDA IRIANI RAFLUS, S.KED', '1995-03-03', 24, 'PNS', 2500000, 225000000, 208120152, 'KONSUMTIF', 2, '2019-02-08', '2022-02-08', 3, 'MACET'),
(55, 'SABIR AHMAD', '1974-12-30', 45, 'KARYAWAN SWASTA', 2500000, 200000000, 199300992, 'PRODUKTIF', 1, '2019-09-15', '2022-09-15', 3, 'MACET'),
(56, 'ARDIANSYAH', '1988-07-29', 31, 'PNS', 2500000, 220000000, 198941883, 'PRODUKTIF', 1, '2018-12-22', '2021-12-22', 3, 'LANCAR'),
(57, 'HERY KADANG', '1986-12-08', 33, 'PNS', 2500000, 210000000, 195305307, 'PRODUKTIF', 2, '2018-08-23', '2022-08-23', 4, 'LANCAR'),
(58, 'SRY WAHYUNI S', '1988-07-02', 31, 'PNS', 2500000, 205000000, 184290290, 'PRODUKTIF', 1, '2018-06-04', '2023-06-04', 5, 'LANCAR'),
(59, 'RUSDA ARSYAD KARIM', '1967-12-11', 52, 'PNS', 2500000, 175000000, 158249221, 'PRODUKTIF', 1, '2018-12-10', '2021-12-10', 3, 'MACET'),
(60, 'HAWALUDDIN', '1971-07-14', 48, 'KARYAWAN SWASTA', 2500000, 157000000, 141163962, 'PRODUKTIF', 2, '2017-06-17', '2022-06-17', 5, 'LANCAR'),
(61, 'MARYAM GANI', '1980-03-11', 39, 'PNS', 2500000, 200000000, 53693820, 'KONSUMTIF', 1, '2019-05-08', '2024-05-08', 5, 'LANCAR'),
(62, 'HASNAH, SKM', '1994-04-20', 25, 'PNS', 2400000, 235000000, 220892846, 'PRODUKTIF', 1, '2019-07-31', '2025-07-31', 6, 'LANCAR'),
(63, 'IRFANDI', '1970-12-24', 49, 'PNS', 2400000, 165000000, 162002960, 'PRODUKTIF', 1, '2017-05-22', '2019-05-22', 2, 'LANCAR'),
(64, 'ANASTASIA ANI', '1993-11-20', 26, 'PNS', 2400000, 150000000, 126507325, 'PRODUKTIF', 1, '2016-11-10', '2018-11-10', 2, 'LANCAR'),
(65, 'FITRIYANI', '1982-09-01', 37, 'PNS', 2300000, 212000000, 201340190, 'PRODUKTIF', 1, '2017-03-09', '2020-03-09', 3, 'MACET'),
(66, 'ANWAR HALEDE. S.PD', '1975-08-24', 44, 'PNS', 2300000, 215000000, 196913038, 'PRODUKTIF', 1, '2018-09-17', '2020-09-17', 2, 'MACET'),
(67, 'HERNI', '1991-05-16', 28, 'KARYAWAN SWASTA', 2300000, 197000000, 192505613, 'PRODUKTIF', 2, '2019-03-28', '2022-03-28', 3, 'LANCAR'),
(68, 'HERLINA RANTE SALU', '1991-05-24', 28, 'KARYAWAN SWASTA', 2300000, 200000000, 173745043, 'PRODUKTIF', 1, '2019-07-10', '2022-07-10', 3, 'LANCAR'),
(69, 'HERMA HASNAL', '1989-12-18', 30, 'PNS', 2300000, 170000000, 158104297, 'PRODUKTIF', 1, '2019-08-28', '2022-08-28', 3, 'LANCAR'),
(70, 'BURHANUDDIN', '1973-12-27', 46, 'PNS', 2300000, 151000000, 147651644, 'KONSUMTIF', 1, '2018-08-06', '2021-08-06', 3, 'LANCAR'),
(71, 'RAHMIATI', '1970-08-23', 49, 'PNS', 2200000, 185000000, 172054670, 'PRODUKTIF', 2, '2016-08-09', '2019-08-09', 3, 'MACET'),
(72, 'KARTINI', '1991-02-19', 28, 'PNS', 2200000, 183000000, 168338252, 'PRODUKTIF', 1, '2018-08-29', '2020-08-29', 2, 'LANCAR'),
(73, 'AMIRULLAH', '1973-03-03', 46, 'PNS', 2100000, 25000000, 24060357, 'PRODUKTIF', 1, '2015-11-24', '2020-11-24', 5, 'LANCAR'),
(74, 'NURCAYA', '1986-06-25', 33, 'PNS', 2000000, 207000000, 202277468, 'PRODUKTIF', 1, '2019-07-16', '2022-07-16', 3, 'LANCAR'),
(75, 'NAHARUDDIN TAMRIN', '1977-09-29', 42, 'KARYAWAN SWASTA', 2000000, 200000000, 177169663, 'PRODUKTIF', 1, '2018-06-20', '2022-06-20', 4, 'LANCAR'),
(76, 'ANDI ULFA', '1982-04-13', 37, 'KARYAWAN SWASTA', 2000000, 200000000, 175904513, 'PRODUKTIF', 1, '2018-01-09', '2022-01-09', 4, 'LANCAR'),
(77, 'MUNANDAR', '1978-05-16', 41, 'KARYAWAN SWASTA', 2000000, 170000000, 157246334, 'PRODUKTIF', 2, '2018-08-07', '2020-08-07', 2, 'LANCAR'),
(78, 'HJ  MEGAWATI PAWE', '1965-03-01', 54, 'PNS', 2000000, 150000000, 96051787, 'PRODUKTIF', 1, '2018-12-10', '2022-12-10', 4, 'MACET'),
(79, 'NURSAM BUSRAH', '1969-01-09', 51, 'KARYAWAN SWASTA', 2000000, 100000000, 5061265, 'PRODUKTIF', 1, '2018-06-28', '2020-06-28', 2, 'LANCAR'),
(80, 'SYARIFUDDIN', '1978-01-07', 42, 'KARYAWAN SWASTA', 1500000, 130000000, 42584891, 'PRODUKTIF', 1, '2018-05-12', '2020-05-12', 2, 'MACET');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keputusan`
--

CREATE TABLE `tbl_keputusan` (
  `id` int(10) NOT NULL,
  `detail` text NOT NULL,
  `attribut` text NOT NULL,
  `entropy` text NOT NULL,
  `gain` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_keputusan`
--

INSERT INTO `tbl_keputusan` (`id`, `detail`, `attribut`, `entropy`, `gain`) VALUES
(1, '{\"0\":\"Semua Data\",\"1\":\"\",\"LANCAR\":62,\"MACET\":18,\"total\":\"0.76919\"}', '[{\"0\":\"pekerjaan\",\"KARYAWAN SWASTA\":{\"LANCAR\":21,\"MACET\":3},\"PNS\":{\"LANCAR\":41,\"MACET\":15}},{\"0\":\"penghasilan\",\">= 4.500.000\":{\"LANCAR\":9},\"3.500.000 - 4.499.999\":{\"LANCAR\":18},\"1.000.000 - 3.499.999\":{\"LANCAR\":35,\"MACET\":18}},{\"0\":\"plafond\",\">= 300.000.000\":{\"LANCAR\":5},\"150.000.000 - 299.999.999\":{\"LANCAR\":41,\"MACET\":13},\"50.000.000 - 149.999.999\":{\"LANCAR\":13,\"MACET\":5},\"<= 49.999.999\":{\"LANCAR\":3}},{\"0\":\"saldo\",\"100.000.000 - 199.999.999\":{\"LANCAR\":24,\"MACET\":8},\">= 200.000.000\":{\"LANCAR\":25,\"MACET\":6},\"<= 99.999.999\":{\"LANCAR\":13,\"MACET\":4}},{\"0\":\"tujuan\",\"PRODUKTIF\":{\"LANCAR\":47,\"MACET\":14},\"KONSUMTIF\":{\"LANCAR\":15,\"MACET\":4}},{\"0\":\"jaminan\",\"TIDAK SESUAI\":{\"LANCAR\":18,\"MACET\":6},\"SESUAI\":{\"LANCAR\":44,\"MACET\":12}},{\"0\":\"jangka waktu\",\"4 - 5 Tahun\":{\"LANCAR\":13,\"MACET\":2},\">= 5 Tahun\":{\"LANCAR\":18,\"MACET\":2},\"3 - 4 Tahun\":{\"LANCAR\":13,\"MACET\":9},\"1 - 2 Tahun\":{\"LANCAR\":18,\"MACET\":5}}]', '{\"KARYAWAN SWASTA\":\"0.54356\",\"PNS\":\"0.83837\",\">= 4.500.000\":\"0.00000\",\"3.500.000 - 4.499.999\":\"0.00000\",\"1.000.000 - 3.499.999\":\"0.92446\",\">= 300.000.000\":\"0.00000\",\"150.000.000 - 299.999.999\":\"0.79627\",\"50.000.000 - 149.999.999\":\"0.85241\",\"<= 49.999.999\":\"0.00000\",\"100.000.000 - 199.999.999\":\"0.81128\",\">= 200.000.000\":\"0.70884\",\"<= 99.999.999\":\"0.78713\",\"PRODUKTIF\":\"0.77715\",\"KONSUMTIF\":\"0.74249\",\"TIDAK SESUAI\":\"0.81128\",\"SESUAI\":\"0.74960\",\"4 - 5 Tahun\":\"0.56651\",\">= 5 Tahun\":\"0.46900\",\"3 - 4 Tahun\":\"0.97602\",\"1 - 2 Tahun\":\"0.75538\"}', '[\"0.01926\",\"0.15674\",\"0.03992\",\"0.00274\",\"0.00027\",\"0.00109\",\"0.06015\"]'),
(2, '{\"0\":\"penghasilan\",\"1\":\"1.000.000 - 3.499.999\",\"LANCAR\":35,\"MACET\":18,\"total\":\"0.92446\"}', '[{\"0\":\"pekerjaan\",\"PNS\":{\"LANCAR\":23,\"MACET\":15},\"KARYAWAN SWASTA\":{\"LANCAR\":12,\"MACET\":3}},{\"0\":\"plafond\",\"150.000.000 - 299.999.999\":{\"LANCAR\":26,\"MACET\":13},\"50.000.000 - 149.999.999\":{\"LANCAR\":6,\"MACET\":5},\">= 300.000.000\":{\"LANCAR\":1},\"<= 49.999.999\":{\"LANCAR\":2}},{\"0\":\"saldo\",\">= 200.000.000\":{\"LANCAR\":11,\"MACET\":6},\"100.000.000 - 199.999.999\":{\"LANCAR\":19,\"MACET\":8},\"<= 99.999.999\":{\"MACET\":4,\"LANCAR\":5}},{\"0\":\"tujuan\",\"KONSUMTIF\":{\"LANCAR\":7,\"MACET\":4},\"PRODUKTIF\":{\"LANCAR\":28,\"MACET\":14}},{\"0\":\"jaminan\",\"TIDAK SESUAI\":{\"LANCAR\":7,\"MACET\":6},\"SESUAI\":{\"LANCAR\":28,\"MACET\":12}},{\"0\":\"jangka waktu\",\"4 - 5 Tahun\":{\"LANCAR\":7,\"MACET\":2},\">= 5 Tahun\":{\"LANCAR\":12,\"MACET\":2},\"3 - 4 Tahun\":{\"LANCAR\":9,\"MACET\":9},\"1 - 2 Tahun\":{\"MACET\":5,\"LANCAR\":7}}]', '{\"PNS\":\"0.96779\",\"KARYAWAN SWASTA\":\"0.72193\",\"150.000.000 - 299.999.999\":\"0.91830\",\"50.000.000 - 149.999.999\":\"0.99403\",\">= 300.000.000\":\"0.00000\",\"<= 49.999.999\":\"0.00000\",\">= 200.000.000\":\"0.93667\",\"100.000.000 - 199.999.999\":\"0.87672\",\"<= 99.999.999\":\"0.99108\",\"KONSUMTIF\":\"0.94566\",\"PRODUKTIF\":\"0.91830\",\"TIDAK SESUAI\":\"0.99573\",\"SESUAI\":\"0.88129\",\"4 - 5 Tahun\":\"0.76420\",\">= 5 Tahun\":\"0.59167\",\"3 - 4 Tahun\":\"1.00000\",\"1 - 2 Tahun\":\"0.97987\"}', '[\"0.02625\",\"0.04242\",\"0.00909\",\"0.00048\",\"0.01510\",\"0.07692\"]'),
(3, '{\"0\":\"jangka waktu\",\"1\":\"4 - 5 Tahun\",\"LANCAR\":7,\"MACET\":2,\"total\":\"0.76420\"}', '[{\"0\":\"pekerjaan\",\"PNS\":{\"LANCAR\":5,\"MACET\":2},\"KARYAWAN SWASTA\":{\"LANCAR\":2}},{\"0\":\"plafond\",\"150.000.000 - 299.999.999\":{\"LANCAR\":5,\"MACET\":1},\"50.000.000 - 149.999.999\":{\"LANCAR\":2,\"MACET\":1}},{\"0\":\"saldo\",\">= 200.000.000\":{\"LANCAR\":2,\"MACET\":1},\"<= 99.999.999\":{\"LANCAR\":1,\"MACET\":1},\"100.000.000 - 199.999.999\":{\"LANCAR\":4}},{\"0\":\"tujuan\",\"KONSUMTIF\":{\"LANCAR\":2},\"PRODUKTIF\":{\"LANCAR\":5,\"MACET\":2}},{\"0\":\"jaminan\",\"TIDAK SESUAI\":{\"LANCAR\":2,\"MACET\":1},\"SESUAI\":{\"LANCAR\":5,\"MACET\":1}}]', '{\"PNS\":\"0.86312\",\"KARYAWAN SWASTA\":\"0.00000\",\"150.000.000 - 299.999.999\":\"0.65002\",\"50.000.000 - 149.999.999\":\"0.91830\",\">= 200.000.000\":\"0.91830\",\"<= 99.999.999\":\"1.00000\",\"100.000.000 - 199.999.999\":\"0.00000\",\"KONSUMTIF\":\"0.00000\",\"PRODUKTIF\":\"0.86312\",\"TIDAK SESUAI\":\"0.91830\",\"SESUAI\":\"0.65002\"}', '[\"0.09289\",\"0.02476\",\"0.23588\",\"0.09289\",\"0.02476\"]'),
(4, '{\"0\":\"saldo\",\"1\":\">= 200.000.000\",\"LANCAR\":2,\"MACET\":1,\"total\":\"0.91830\"}', '[{\"0\":\"pekerjaan\",\"PNS\":{\"LANCAR\":2,\"MACET\":1}},{\"0\":\"plafond\",\"150.000.000 - 299.999.999\":{\"LANCAR\":2,\"MACET\":1}},{\"0\":\"tujuan\",\"KONSUMTIF\":{\"LANCAR\":2},\"PRODUKTIF\":{\"MACET\":1}},{\"0\":\"jaminan\",\"TIDAK SESUAI\":{\"LANCAR\":1,\"MACET\":1},\"SESUAI\":{\"LANCAR\":1}}]', '{\"PNS\":\"0.91830\",\"150.000.000 - 299.999.999\":\"0.91830\",\"KONSUMTIF\":\"0.00000\",\"PRODUKTIF\":\"0.00000\",\"TIDAK SESUAI\":\"1.00000\",\"SESUAI\":\"0.00000\"}', '[\"0.00000\",\"0.00000\",\"0.91830\",\"0.25163\"]'),
(5, '{\"0\":\"saldo\",\"1\":\"<= 99.999.999\",\"LANCAR\":1,\"MACET\":1,\"total\":\"1.00000\"}', '[{\"0\":\"pekerjaan\",\"PNS\":{\"LANCAR\":1,\"MACET\":1}},{\"0\":\"plafond\",\"50.000.000 - 149.999.999\":{\"LANCAR\":1,\"MACET\":1}},{\"0\":\"tujuan\",\"PRODUKTIF\":{\"LANCAR\":1,\"MACET\":1}},{\"0\":\"jaminan\",\"SESUAI\":{\"LANCAR\":1,\"MACET\":1}}]', '{\"PNS\":\"1.00000\",\"50.000.000 - 149.999.999\":\"1.00000\",\"PRODUKTIF\":\"1.00000\",\"SESUAI\":\"1.00000\"}', '[\"0.00000\",\"0.00000\",\"0.00000\",\"0.00000\"]'),
(6, '{\"0\":\"pekerjaan\",\"1\":\"PNS\",\"LANCAR\":1,\"MACET\":1,\"total\":\"1.00000\"}', '[{\"0\":\"plafond\",\"50.000.000 - 149.999.999\":{\"LANCAR\":1,\"MACET\":1}},{\"0\":\"tujuan\",\"PRODUKTIF\":{\"LANCAR\":1,\"MACET\":1}},{\"0\":\"jaminan\",\"SESUAI\":{\"LANCAR\":1,\"MACET\":1}}]', '{\"50.000.000 - 149.999.999\":\"1.00000\",\"PRODUKTIF\":\"1.00000\",\"SESUAI\":\"1.00000\"}', '[\"0.00000\",\"0.00000\",\"0.00000\"]'),
(7, '{\"0\":\"plafond\",\"1\":\"50.000.000 - 149.999.999\",\"LANCAR\":1,\"MACET\":1,\"total\":\"1.00000\"}', '[{\"0\":\"tujuan\",\"PRODUKTIF\":{\"LANCAR\":1,\"MACET\":1}},{\"0\":\"jaminan\",\"SESUAI\":{\"LANCAR\":1,\"MACET\":1}}]', '{\"PRODUKTIF\":\"1.00000\",\"SESUAI\":\"1.00000\"}', '[\"0.00000\",\"0.00000\"]'),
(8, '{\"0\":\"tujuan\",\"1\":\"PRODUKTIF\",\"LANCAR\":1,\"MACET\":1,\"total\":\"1.00000\"}', '[{\"0\":\"jaminan\",\"SESUAI\":{\"LANCAR\":1,\"MACET\":1}}]', '{\"SESUAI\":\"1.00000\"}', '[\"0.00000\"]'),
(9, '{\"0\":\"jangka waktu\",\"1\":\">= 5 Tahun\",\"LANCAR\":12,\"MACET\":2,\"total\":\"0.59167\"}', '[{\"0\":\"pekerjaan\",\"PNS\":{\"LANCAR\":8,\"MACET\":2},\"KARYAWAN SWASTA\":{\"LANCAR\":4}},{\"0\":\"plafond\",\"150.000.000 - 299.999.999\":{\"LANCAR\":9,\"MACET\":2},\">= 300.000.000\":{\"LANCAR\":1},\"<= 49.999.999\":{\"LANCAR\":2}},{\"0\":\"saldo\",\">= 200.000.000\":{\"LANCAR\":6,\"MACET\":1},\"100.000.000 - 199.999.999\":{\"MACET\":1,\"LANCAR\":3},\"<= 99.999.999\":{\"LANCAR\":3}},{\"0\":\"tujuan\",\"KONSUMTIF\":{\"LANCAR\":4},\"PRODUKTIF\":{\"LANCAR\":8,\"MACET\":2}},{\"0\":\"jaminan\",\"SESUAI\":{\"LANCAR\":10,\"MACET\":2},\"TIDAK SESUAI\":{\"LANCAR\":2}}]', '{\"PNS\":\"0.72193\",\"KARYAWAN SWASTA\":\"0.00000\",\"150.000.000 - 299.999.999\":\"0.68404\",\">= 300.000.000\":\"0.00000\",\"<= 49.999.999\":\"0.00000\",\">= 200.000.000\":\"0.59167\",\"100.000.000 - 199.999.999\":\"0.81128\",\"<= 99.999.999\":\"0.00000\",\"KONSUMTIF\":\"0.00000\",\"PRODUKTIF\":\"0.72193\",\"SESUAI\":\"0.65002\",\"TIDAK SESUAI\":\"0.00000\"}', '[\"0.07601\",\"0.05421\",\"0.06404\",\"0.07601\",\"0.03451\"]'),
(10, '{\"0\":\"pekerjaan\",\"1\":\"PNS\",\"LANCAR\":8,\"MACET\":2,\"total\":\"0.72193\"}', '[{\"0\":\"plafond\",\"150.000.000 - 299.999.999\":{\"LANCAR\":5,\"MACET\":2},\">= 300.000.000\":{\"LANCAR\":1},\"<= 49.999.999\":{\"LANCAR\":2}},{\"0\":\"saldo\",\">= 200.000.000\":{\"LANCAR\":4,\"MACET\":1},\"100.000.000 - 199.999.999\":{\"MACET\":1,\"LANCAR\":1},\"<= 99.999.999\":{\"LANCAR\":3}},{\"0\":\"tujuan\",\"KONSUMTIF\":{\"LANCAR\":4},\"PRODUKTIF\":{\"LANCAR\":4,\"MACET\":2}},{\"0\":\"jaminan\",\"SESUAI\":{\"LANCAR\":7,\"MACET\":2},\"TIDAK SESUAI\":{\"LANCAR\":1}}]', '{\"150.000.000 - 299.999.999\":\"0.86312\",\">= 300.000.000\":\"0.00000\",\"<= 49.999.999\":\"0.00000\",\">= 200.000.000\":\"0.72193\",\"100.000.000 - 199.999.999\":\"1.00000\",\"<= 99.999.999\":\"0.00000\",\"KONSUMTIF\":\"0.00000\",\"PRODUKTIF\":\"0.91830\",\"SESUAI\":\"0.76420\",\"TIDAK SESUAI\":\"0.00000\"}', '[\"0.11774\",\"0.16096\",\"0.17095\",\"0.03414\"]'),
(11, '{\"0\":\"tujuan\",\"1\":\"PRODUKTIF\",\"LANCAR\":4,\"MACET\":2,\"total\":\"0.91830\"}', '[{\"0\":\"plafond\",\">= 300.000.000\":{\"LANCAR\":1},\"150.000.000 - 299.999.999\":{\"MACET\":2,\"LANCAR\":2},\"<= 49.999.999\":{\"LANCAR\":1}},{\"0\":\"saldo\",\">= 200.000.000\":{\"LANCAR\":2,\"MACET\":1},\"100.000.000 - 199.999.999\":{\"MACET\":1,\"LANCAR\":1},\"<= 99.999.999\":{\"LANCAR\":1}},{\"0\":\"jaminan\",\"TIDAK SESUAI\":{\"LANCAR\":1},\"SESUAI\":{\"MACET\":2,\"LANCAR\":3}}]', '{\">= 300.000.000\":\"0.00000\",\"150.000.000 - 299.999.999\":\"1.00000\",\"<= 49.999.999\":\"0.00000\",\">= 200.000.000\":\"0.91830\",\"100.000.000 - 199.999.999\":\"1.00000\",\"<= 99.999.999\":\"0.00000\",\"TIDAK SESUAI\":\"0.00000\",\"SESUAI\":\"0.97095\"}', '[\"0.25163\",\"0.12581\",\"0.10917\"]'),
(12, '{\"0\":\"plafond\",\"1\":\"150.000.000 - 299.999.999\",\"MACET\":2,\"LANCAR\":2,\"total\":\"1.00000\"}', '[{\"0\":\"saldo\",\">= 200.000.000\":{\"MACET\":1,\"LANCAR\":1},\"100.000.000 - 199.999.999\":{\"MACET\":1,\"LANCAR\":1}},{\"0\":\"jaminan\",\"SESUAI\":{\"MACET\":2,\"LANCAR\":2}}]', '{\">= 200.000.000\":\"1.00000\",\"100.000.000 - 199.999.999\":\"1.00000\",\"SESUAI\":\"1.00000\"}', '[\"0.00000\",\"0.00000\"]'),
(13, '{\"0\":\"saldo\",\"1\":\">= 200.000.000\",\"MACET\":1,\"LANCAR\":1,\"total\":\"1.00000\"}', '[{\"0\":\"jaminan\",\"SESUAI\":{\"MACET\":1,\"LANCAR\":1}}]', '{\"SESUAI\":\"1.00000\"}', '[\"0.00000\"]'),
(14, '{\"0\":\"saldo\",\"1\":\"100.000.000 - 199.999.999\",\"MACET\":1,\"LANCAR\":1,\"total\":\"1.00000\"}', '[{\"0\":\"jaminan\",\"SESUAI\":{\"MACET\":1,\"LANCAR\":1}}]', '{\"SESUAI\":\"1.00000\"}', '[\"0.00000\"]'),
(15, '{\"0\":\"jangka waktu\",\"1\":\"3 - 4 Tahun\",\"LANCAR\":9,\"MACET\":9,\"total\":\"1.00000\"}', '[{\"0\":\"pekerjaan\",\"KARYAWAN SWASTA\":{\"LANCAR\":4,\"MACET\":2},\"PNS\":{\"MACET\":7,\"LANCAR\":5}},{\"0\":\"plafond\",\"50.000.000 - 149.999.999\":{\"LANCAR\":2,\"MACET\":1},\"150.000.000 - 299.999.999\":{\"MACET\":8,\"LANCAR\":7}},{\"0\":\"saldo\",\"100.000.000 - 199.999.999\":{\"LANCAR\":7,\"MACET\":4},\">= 200.000.000\":{\"MACET\":4,\"LANCAR\":2},\"<= 99.999.999\":{\"MACET\":1}},{\"0\":\"tujuan\",\"PRODUKTIF\":{\"LANCAR\":8,\"MACET\":6},\"KONSUMTIF\":{\"MACET\":3,\"LANCAR\":1}},{\"0\":\"jaminan\",\"SESUAI\":{\"LANCAR\":7,\"MACET\":5},\"TIDAK SESUAI\":{\"LANCAR\":2,\"MACET\":4}}]', '{\"KARYAWAN SWASTA\":\"0.91830\",\"PNS\":\"0.97987\",\"50.000.000 - 149.999.999\":\"0.91830\",\"150.000.000 - 299.999.999\":\"0.99679\",\"100.000.000 - 199.999.999\":\"0.94566\",\">= 200.000.000\":\"0.91830\",\"<= 99.999.999\":\"0.00000\",\"PRODUKTIF\":\"0.98523\",\"KONSUMTIF\":\"0.81128\",\"SESUAI\":\"0.97987\",\"TIDAK SESUAI\":\"0.91830\"}', '[\"0.04066\",\"0.01629\",\"0.11600\",\"0.05343\",\"0.04066\"]'),
(16, '{\"0\":\"saldo\",\"1\":\"100.000.000 - 199.999.999\",\"LANCAR\":7,\"MACET\":4,\"total\":\"0.94566\"}', '[{\"0\":\"pekerjaan\",\"KARYAWAN SWASTA\":{\"LANCAR\":4,\"MACET\":1},\"PNS\":{\"MACET\":3,\"LANCAR\":3}},{\"0\":\"plafond\",\"50.000.000 - 149.999.999\":{\"LANCAR\":2},\"150.000.000 - 299.999.999\":{\"MACET\":4,\"LANCAR\":5}},{\"0\":\"tujuan\",\"PRODUKTIF\":{\"LANCAR\":6,\"MACET\":3},\"KONSUMTIF\":{\"MACET\":1,\"LANCAR\":1}},{\"0\":\"jaminan\",\"SESUAI\":{\"LANCAR\":5,\"MACET\":2},\"TIDAK SESUAI\":{\"LANCAR\":2,\"MACET\":2}}]', '{\"KARYAWAN SWASTA\":\"0.72193\",\"PNS\":\"1.00000\",\"50.000.000 - 149.999.999\":\"0.00000\",\"150.000.000 - 299.999.999\":\"0.99108\",\"PRODUKTIF\":\"0.91830\",\"KONSUMTIF\":\"1.00000\",\"SESUAI\":\"0.86312\",\"TIDAK SESUAI\":\"1.00000\"}', '[\"0.07206\",\"0.13478\",\"0.01251\",\"0.03277\"]'),
(17, '{\"0\":\"plafond\",\"1\":\"150.000.000 - 299.999.999\",\"MACET\":4,\"LANCAR\":5,\"total\":\"0.99108\"}', '[{\"0\":\"pekerjaan\",\"PNS\":{\"MACET\":3,\"LANCAR\":3},\"KARYAWAN SWASTA\":{\"MACET\":1,\"LANCAR\":2}},{\"0\":\"tujuan\",\"KONSUMTIF\":{\"MACET\":1,\"LANCAR\":1},\"PRODUKTIF\":{\"MACET\":3,\"LANCAR\":4}},{\"0\":\"jaminan\",\"TIDAK SESUAI\":{\"MACET\":2,\"LANCAR\":1},\"SESUAI\":{\"MACET\":2,\"LANCAR\":4}}]', '{\"PNS\":\"1.00000\",\"KARYAWAN SWASTA\":\"0.91830\",\"KONSUMTIF\":\"1.00000\",\"PRODUKTIF\":\"0.98523\",\"TIDAK SESUAI\":\"0.91830\",\"SESUAI\":\"0.91830\"}', '[\"0.01831\",\"0.00257\",\"0.07278\"]'),
(18, '{\"0\":\"jaminan\",\"1\":\"TIDAK SESUAI\",\"MACET\":2,\"LANCAR\":1,\"total\":\"0.91830\"}', '[{\"0\":\"pekerjaan\",\"PNS\":{\"MACET\":2},\"KARYAWAN SWASTA\":{\"LANCAR\":1}},{\"0\":\"tujuan\",\"KONSUMTIF\":{\"MACET\":1},\"PRODUKTIF\":{\"LANCAR\":1,\"MACET\":1}}]', '{\"PNS\":\"0.00000\",\"KARYAWAN SWASTA\":\"0.00000\",\"KONSUMTIF\":\"0.00000\",\"PRODUKTIF\":\"1.00000\"}', '[\"0.91830\",\"0.25163\"]'),
(19, '{\"0\":\"jaminan\",\"1\":\"SESUAI\",\"MACET\":2,\"LANCAR\":4,\"total\":\"0.91830\"}', '[{\"0\":\"pekerjaan\",\"KARYAWAN SWASTA\":{\"MACET\":1,\"LANCAR\":1},\"PNS\":{\"LANCAR\":3,\"MACET\":1}},{\"0\":\"tujuan\",\"PRODUKTIF\":{\"MACET\":2,\"LANCAR\":3},\"KONSUMTIF\":{\"LANCAR\":1}}]', '{\"KARYAWAN SWASTA\":\"1.00000\",\"PNS\":\"0.81128\",\"PRODUKTIF\":\"0.97095\",\"KONSUMTIF\":\"0.00000\"}', '[\"0.04411\",\"0.10917\"]'),
(20, '{\"0\":\"tujuan\",\"1\":\"PRODUKTIF\",\"MACET\":2,\"LANCAR\":3,\"total\":\"0.97095\"}', '[{\"0\":\"pekerjaan\",\"KARYAWAN SWASTA\":{\"MACET\":1,\"LANCAR\":1},\"PNS\":{\"LANCAR\":2,\"MACET\":1}}]', '{\"KARYAWAN SWASTA\":\"1.00000\",\"PNS\":\"0.91830\"}', '[\"0.01997\"]'),
(21, '{\"0\":\"saldo\",\"1\":\">= 200.000.000\",\"MACET\":4,\"LANCAR\":2,\"total\":\"0.91830\"}', '[{\"0\":\"pekerjaan\",\"PNS\":{\"MACET\":4,\"LANCAR\":2}},{\"0\":\"plafond\",\"150.000.000 - 299.999.999\":{\"MACET\":4,\"LANCAR\":2}},{\"0\":\"tujuan\",\"KONSUMTIF\":{\"MACET\":2},\"PRODUKTIF\":{\"LANCAR\":2,\"MACET\":2}},{\"0\":\"jaminan\",\"SESUAI\":{\"MACET\":2,\"LANCAR\":2},\"TIDAK SESUAI\":{\"MACET\":2}}]', '{\"PNS\":\"0.91830\",\"150.000.000 - 299.999.999\":\"0.91830\",\"KONSUMTIF\":\"0.00000\",\"PRODUKTIF\":\"1.00000\",\"SESUAI\":\"1.00000\",\"TIDAK SESUAI\":\"0.00000\"}', '[\"0.00000\",\"0.00000\",\"0.25163\",\"0.25163\"]'),
(22, '{\"0\":\"tujuan\",\"1\":\"PRODUKTIF\",\"LANCAR\":2,\"MACET\":2,\"total\":\"1.00000\"}', '[{\"0\":\"pekerjaan\",\"PNS\":{\"LANCAR\":2,\"MACET\":2}},{\"0\":\"plafond\",\"150.000.000 - 299.999.999\":{\"LANCAR\":2,\"MACET\":2}},{\"0\":\"jaminan\",\"SESUAI\":{\"LANCAR\":2,\"MACET\":1},\"TIDAK SESUAI\":{\"MACET\":1}}]', '{\"PNS\":\"1.00000\",\"150.000.000 - 299.999.999\":\"1.00000\",\"SESUAI\":\"0.91830\",\"TIDAK SESUAI\":\"0.00000\"}', '[\"0.00000\",\"0.00000\",\"0.31128\"]'),
(23, '{\"0\":\"jaminan\",\"1\":\"SESUAI\",\"LANCAR\":2,\"MACET\":1,\"total\":\"0.91830\"}', '[{\"0\":\"pekerjaan\",\"PNS\":{\"LANCAR\":2,\"MACET\":1}},{\"0\":\"plafond\",\"150.000.000 - 299.999.999\":{\"LANCAR\":2,\"MACET\":1}}]', '{\"PNS\":\"0.91830\",\"150.000.000 - 299.999.999\":\"0.91830\"}', '[\"0.00000\",\"0.00000\"]'),
(24, '{\"0\":\"pekerjaan\",\"1\":\"PNS\",\"LANCAR\":2,\"MACET\":1,\"total\":\"0.91830\"}', '[{\"0\":\"plafond\",\"150.000.000 - 299.999.999\":{\"LANCAR\":2,\"MACET\":1}}]', '{\"150.000.000 - 299.999.999\":\"0.91830\"}', '[\"0.00000\"]'),
(25, '{\"0\":\"jangka waktu\",\"1\":\"1 - 2 Tahun\",\"MACET\":5,\"LANCAR\":7,\"total\":\"0.97987\"}', '[{\"0\":\"pekerjaan\",\"PNS\":{\"MACET\":4,\"LANCAR\":5},\"KARYAWAN SWASTA\":{\"LANCAR\":2,\"MACET\":1}},{\"0\":\"plafond\",\"150.000.000 - 299.999.999\":{\"MACET\":2,\"LANCAR\":5},\"50.000.000 - 149.999.999\":{\"MACET\":3,\"LANCAR\":2}},{\"0\":\"saldo\",\"100.000.000 - 199.999.999\":{\"MACET\":3,\"LANCAR\":5},\"<= 99.999.999\":{\"MACET\":2,\"LANCAR\":1},\">= 200.000.000\":{\"LANCAR\":1}},{\"0\":\"tujuan\",\"PRODUKTIF\":{\"MACET\":4,\"LANCAR\":7},\"KONSUMTIF\":{\"MACET\":1}},{\"0\":\"jaminan\",\"SESUAI\":{\"MACET\":4,\"LANCAR\":6},\"TIDAK SESUAI\":{\"MACET\":1,\"LANCAR\":1}}]', '{\"PNS\":\"0.99108\",\"KARYAWAN SWASTA\":\"0.91830\",\"150.000.000 - 299.999.999\":\"0.86312\",\"50.000.000 - 149.999.999\":\"0.97095\",\"100.000.000 - 199.999.999\":\"0.95443\",\"<= 99.999.999\":\"0.91830\",\">= 200.000.000\":\"0.00000\",\"PRODUKTIF\":\"0.94566\",\"KONSUMTIF\":\"0.00000\",\"SESUAI\":\"0.97095\",\"TIDAK SESUAI\":\"1.00000\"}', '[\"0.00699\",\"0.07182\",\"0.11401\",\"0.11301\",\"0.00408\"]'),
(26, '{\"0\":\"saldo\",\"1\":\"100.000.000 - 199.999.999\",\"MACET\":3,\"LANCAR\":5,\"total\":\"0.95443\"}', '[{\"0\":\"pekerjaan\",\"PNS\":{\"MACET\":3,\"LANCAR\":4},\"KARYAWAN SWASTA\":{\"LANCAR\":1}},{\"0\":\"plafond\",\"150.000.000 - 299.999.999\":{\"MACET\":2,\"LANCAR\":4},\"50.000.000 - 149.999.999\":{\"MACET\":1,\"LANCAR\":1}},{\"0\":\"tujuan\",\"PRODUKTIF\":{\"MACET\":2,\"LANCAR\":5},\"KONSUMTIF\":{\"MACET\":1}},{\"0\":\"jaminan\",\"SESUAI\":{\"MACET\":2,\"LANCAR\":4},\"TIDAK SESUAI\":{\"MACET\":1,\"LANCAR\":1}}]', '{\"PNS\":\"0.98523\",\"KARYAWAN SWASTA\":\"0.00000\",\"150.000.000 - 299.999.999\":\"0.91830\",\"50.000.000 - 149.999.999\":\"1.00000\",\"PRODUKTIF\":\"0.86312\",\"KONSUMTIF\":\"0.00000\",\"SESUAI\":\"0.91830\",\"TIDAK SESUAI\":\"1.00000\"}', '[\"0.09236\",\"0.01571\",\"0.19920\",\"0.01571\"]'),
(27, '{\"0\":\"tujuan\",\"1\":\"PRODUKTIF\",\"MACET\":2,\"LANCAR\":5,\"total\":\"0.86312\"}', '[{\"0\":\"pekerjaan\",\"PNS\":{\"MACET\":2,\"LANCAR\":4},\"KARYAWAN SWASTA\":{\"LANCAR\":1}},{\"0\":\"plafond\",\"150.000.000 - 299.999.999\":{\"MACET\":2,\"LANCAR\":4},\"50.000.000 - 149.999.999\":{\"LANCAR\":1}},{\"0\":\"jaminan\",\"SESUAI\":{\"MACET\":2,\"LANCAR\":4},\"TIDAK SESUAI\":{\"LANCAR\":1}}]', '{\"PNS\":\"0.91830\",\"KARYAWAN SWASTA\":\"0.00000\",\"150.000.000 - 299.999.999\":\"0.91830\",\"50.000.000 - 149.999.999\":\"0.00000\",\"SESUAI\":\"0.91830\",\"TIDAK SESUAI\":\"0.00000\"}', '[\"0.07601\",\"0.07601\",\"0.07601\"]'),
(28, '{\"0\":\"pekerjaan\",\"1\":\"PNS\",\"MACET\":2,\"LANCAR\":4,\"total\":\"0.91830\"}', '[{\"0\":\"plafond\",\"150.000.000 - 299.999.999\":{\"MACET\":2,\"LANCAR\":3},\"50.000.000 - 149.999.999\":{\"LANCAR\":1}},{\"0\":\"jaminan\",\"SESUAI\":{\"MACET\":2,\"LANCAR\":4}}]', '{\"150.000.000 - 299.999.999\":\"0.97095\",\"50.000.000 - 149.999.999\":\"0.00000\",\"SESUAI\":\"0.91830\"}', '[\"0.10917\",\"0.00000\"]'),
(29, '{\"0\":\"plafond\",\"1\":\"150.000.000 - 299.999.999\",\"MACET\":2,\"LANCAR\":3,\"total\":\"0.97095\"}', '[{\"0\":\"jaminan\",\"SESUAI\":{\"MACET\":2,\"LANCAR\":3}}]', '{\"SESUAI\":\"0.97095\"}', '[\"0.00000\"]'),
(30, '{\"0\":\"saldo\",\"1\":\"<= 99.999.999\",\"MACET\":2,\"LANCAR\":1,\"total\":\"0.91830\"}', '[{\"0\":\"pekerjaan\",\"PNS\":{\"MACET\":1},\"KARYAWAN SWASTA\":{\"LANCAR\":1,\"MACET\":1}},{\"0\":\"plafond\",\"50.000.000 - 149.999.999\":{\"MACET\":2,\"LANCAR\":1}},{\"0\":\"tujuan\",\"PRODUKTIF\":{\"MACET\":2,\"LANCAR\":1}},{\"0\":\"jaminan\",\"SESUAI\":{\"MACET\":2,\"LANCAR\":1}}]', '{\"PNS\":\"0.00000\",\"KARYAWAN SWASTA\":\"1.00000\",\"50.000.000 - 149.999.999\":\"0.91830\",\"PRODUKTIF\":\"0.91830\",\"SESUAI\":\"0.91830\"}', '[\"0.25163\",\"0.00000\",\"0.00000\",\"0.00000\"]'),
(31, '{\"0\":\"pekerjaan\",\"1\":\"KARYAWAN SWASTA\",\"LANCAR\":1,\"MACET\":1,\"total\":\"1.00000\"}', '[{\"0\":\"plafond\",\"50.000.000 - 149.999.999\":{\"LANCAR\":1,\"MACET\":1}},{\"0\":\"tujuan\",\"PRODUKTIF\":{\"LANCAR\":1,\"MACET\":1}},{\"0\":\"jaminan\",\"SESUAI\":{\"LANCAR\":1,\"MACET\":1}}]', '{\"50.000.000 - 149.999.999\":\"1.00000\",\"PRODUKTIF\":\"1.00000\",\"SESUAI\":\"1.00000\"}', '[\"0.00000\",\"0.00000\",\"0.00000\"]'),
(32, '{\"0\":\"plafond\",\"1\":\"50.000.000 - 149.999.999\",\"LANCAR\":1,\"MACET\":1,\"total\":\"1.00000\"}', '[{\"0\":\"tujuan\",\"PRODUKTIF\":{\"LANCAR\":1,\"MACET\":1}},{\"0\":\"jaminan\",\"SESUAI\":{\"LANCAR\":1,\"MACET\":1}}]', '{\"PRODUKTIF\":\"1.00000\",\"SESUAI\":\"1.00000\"}', '[\"0.00000\",\"0.00000\"]'),
(33, '{\"0\":\"tujuan\",\"1\":\"PRODUKTIF\",\"LANCAR\":1,\"MACET\":1,\"total\":\"1.00000\"}', '[{\"0\":\"jaminan\",\"SESUAI\":{\"LANCAR\":1,\"MACET\":1}}]', '{\"SESUAI\":\"1.00000\"}', '[\"0.00000\"]');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_klasifikasi`
--

CREATE TABLE `tbl_klasifikasi` (
  `id` int(2) NOT NULL,
  `attribut` varchar(25) NOT NULL,
  `operator` varchar(25) NOT NULL,
  `value` text NOT NULL,
  `klasifikasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_klasifikasi`
--

INSERT INTO `tbl_klasifikasi` (`id`, `attribut`, `operator`, `value`, `klasifikasi`) VALUES
(5, 'Pekerjaan', '=', 'PNS', 'PNS'),
(7, 'Penghasilan', 'Between', '[\"1000000\",\"3499999\"]', '1.000.000 - 3.499.999'),
(8, 'Penghasilan', 'Between', '[\"3500000\",\"4499999\"]', '3.500.000 - 4.499.999'),
(9, 'Penghasilan', '>=', '4500000', '>= 4.500.000'),
(10, 'Plafond', '<', '50000000', '<= 49.999.999'),
(11, 'Plafond', 'Between', '[\"50000000\",\"150000000\"]', '50.000.000 - 149.999.999'),
(12, 'Plafond', 'Between', '[\"150000000\",\"299999999\"]', '150.000.000 - 299.999.999'),
(13, 'Plafond', '>=', '300000000', '>= 300.000.000'),
(14, 'Saldo', '<', '100000000', '<= 99.999.999'),
(15, 'Saldo', 'Between', '[\"100000000\",\"199999999\"]', '100.000.000 - 199.999.999'),
(16, 'Saldo', '>=', '200000000', '>= 200.000.000'),
(17, 'Tujuan', '=', 'PRODUKTIF', 'PRODUKTIF'),
(18, 'Tujuan', '=', 'KONSUMTIF', 'KONSUMTIF'),
(19, 'Jaminan', '=', '1', 'SESUAI'),
(21, 'Jangka Waktu', '<=', '2', '1 - 2 Tahun'),
(22, 'Jangka Waktu', '=', '3', '3 - 4 Tahun'),
(41, 'Jaminan', '=', '2', 'TIDAK SESUAI'),
(42, 'Jangka Waktu', '>=', '5', '>= 5 Tahun'),
(43, 'Jangka Waktu', '=', '4', '4 - 5 Tahun'),
(44, 'Pekerjaan', '=', 'KARYAWAN SWASTA', 'KARYAWAN SWASTA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pohon`
--

CREATE TABLE `tbl_pohon` (
  `id` int(3) NOT NULL,
  `root` text NOT NULL,
  `attribut` text NOT NULL,
  `forward` text NOT NULL,
  `parent_id` int(3) NOT NULL,
  `kelas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pohon`
--

INSERT INTO `tbl_pohon` (`id`, `root`, `attribut`, `forward`, `parent_id`, `kelas`) VALUES
(1, 'penghasilan', '>= 4.500.000', '', 0, 'LANCAR'),
(2, 'penghasilan', '3.500.000 - 4.499.999', '', 0, 'LANCAR'),
(3, 'penghasilan', '1.000.000 - 3.499.999', '', 0, '-'),
(4, 'jangka waktu', '4 - 5 Tahun', 'penghasilan', 3, '-'),
(5, 'saldo', '>= 200.000.000', 'jangka waktu', 4, '-'),
(6, 'tujuan', 'KONSUMTIF', 'saldo', 5, 'LANCAR'),
(7, 'tujuan', 'PRODUKTIF', 'saldo', 5, 'MACET'),
(8, 'saldo', '<= 99.999.999', 'jangka waktu', 4, '-'),
(9, 'pekerjaan', 'PNS', 'saldo', 8, '-'),
(10, 'plafond', '50.000.000 - 149.999.999', 'pekerjaan', 9, '-'),
(11, 'tujuan', 'PRODUKTIF', 'plafond', 10, '-'),
(12, 'jaminan', 'SESUAI', 'tujuan', 11, '-'),
(13, 'saldo', '100.000.000 - 199.999.999', 'jangka waktu', 4, 'LANCAR'),
(14, 'jangka waktu', '>= 5 Tahun', 'penghasilan', 3, '-'),
(15, 'pekerjaan', 'PNS', 'jangka waktu', 14, '-'),
(16, 'tujuan', 'KONSUMTIF', 'pekerjaan', 15, 'LANCAR'),
(17, 'tujuan', 'PRODUKTIF', 'pekerjaan', 15, '-'),
(18, 'plafond', '>= 300.000.000', 'tujuan', 17, 'LANCAR'),
(19, 'plafond', '150.000.000 - 299.999.999', 'tujuan', 17, '-'),
(20, 'saldo', '>= 200.000.000', 'plafond', 19, '-'),
(21, 'jaminan', 'SESUAI', 'saldo', 20, '-'),
(22, 'saldo', '100.000.000 - 199.999.999', 'plafond', 19, '-'),
(23, 'jaminan', 'SESUAI', 'saldo', 22, '-'),
(24, 'plafond', '<= 49.999.999', 'tujuan', 17, 'LANCAR'),
(25, 'pekerjaan', 'KARYAWAN SWASTA', 'jangka waktu', 14, 'LANCAR'),
(26, 'jangka waktu', '3 - 4 Tahun', 'penghasilan', 3, '-'),
(27, 'saldo', '100.000.000 - 199.999.999', 'jangka waktu', 26, '-'),
(28, 'plafond', '50.000.000 - 149.999.999', 'saldo', 27, 'LANCAR'),
(29, 'plafond', '150.000.000 - 299.999.999', 'saldo', 27, '-'),
(30, 'jaminan', 'TIDAK SESUAI', 'plafond', 29, '-'),
(31, 'pekerjaan', 'PNS', 'jaminan', 30, 'MACET'),
(32, 'pekerjaan', 'KARYAWAN SWASTA', 'jaminan', 30, 'LANCAR'),
(33, 'jaminan', 'SESUAI', 'plafond', 29, '-'),
(34, 'tujuan', 'PRODUKTIF', 'jaminan', 33, '-'),
(35, 'pekerjaan', 'KARYAWAN SWASTA', 'tujuan', 34, '-'),
(36, 'pekerjaan', 'PNS', 'tujuan', 34, '-'),
(37, 'tujuan', 'KONSUMTIF', 'jaminan', 33, 'LANCAR'),
(38, 'saldo', '>= 200.000.000', 'jangka waktu', 26, '-'),
(39, 'tujuan', 'KONSUMTIF', 'saldo', 38, 'MACET'),
(40, 'tujuan', 'PRODUKTIF', 'saldo', 38, '-'),
(41, 'jaminan', 'SESUAI', 'tujuan', 40, '-'),
(42, 'pekerjaan', 'PNS', 'jaminan', 41, '-'),
(43, 'plafond', '150.000.000 - 299.999.999', 'pekerjaan', 42, '-'),
(44, 'jaminan', 'TIDAK SESUAI', 'tujuan', 40, 'MACET'),
(45, 'saldo', '<= 99.999.999', 'jangka waktu', 26, 'MACET'),
(46, 'jangka waktu', '1 - 2 Tahun', 'penghasilan', 3, '-'),
(47, 'saldo', '100.000.000 - 199.999.999', 'jangka waktu', 46, '-'),
(48, 'tujuan', 'PRODUKTIF', 'saldo', 47, '-'),
(49, 'pekerjaan', 'PNS', 'tujuan', 48, '-'),
(50, 'plafond', '150.000.000 - 299.999.999', 'pekerjaan', 49, '-'),
(51, 'jaminan', 'SESUAI', 'plafond', 50, '-'),
(52, 'plafond', '50.000.000 - 149.999.999', 'pekerjaan', 49, 'LANCAR'),
(53, 'pekerjaan', 'KARYAWAN SWASTA', 'tujuan', 48, 'LANCAR'),
(54, 'tujuan', 'KONSUMTIF', 'saldo', 47, 'MACET'),
(55, 'saldo', '<= 99.999.999', 'jangka waktu', 46, '-'),
(56, 'pekerjaan', 'PNS', 'saldo', 55, 'MACET'),
(57, 'pekerjaan', 'KARYAWAN SWASTA', 'saldo', 55, '-'),
(58, 'plafond', '50.000.000 - 149.999.999', 'pekerjaan', 57, '-'),
(59, 'tujuan', 'PRODUKTIF', 'plafond', 58, '-'),
(60, 'jaminan', 'SESUAI', 'tujuan', 59, '-'),
(61, 'saldo', '>= 200.000.000', 'jangka waktu', 46, 'LANCAR');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pohonkeputusan`
--

CREATE TABLE `tbl_pohonkeputusan` (
  `id` int(3) NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pohonkeputusan`
--

INSERT INTO `tbl_pohonkeputusan` (`id`, `data`) VALUES
(1, '{\"penghasilan\":\"1.000.000 - 3.499.999\",\"jangka waktu\":\"1 - 2 Tahun\",\"saldo\":\">= 200.000.000\",\"nilai\":\"LANCAR\"}'),
(2, '{\"penghasilan\":\"1.000.000 - 3.499.999\",\"jangka waktu\":\"1 - 2 Tahun\",\"saldo\":\"<= 99.999.999\",\"pekerjaan\":\"PNS\",\"nilai\":\"MACET\"}'),
(3, '{\"penghasilan\":\"1.000.000 - 3.499.999\",\"jangka waktu\":\"1 - 2 Tahun\",\"saldo\":\"100.000.000 - 199.999.999\",\"tujuan\":\"KONSUMTIF\",\"nilai\":\"MACET\"}'),
(4, '{\"penghasilan\":\"1.000.000 - 3.499.999\",\"jangka waktu\":\"1 - 2 Tahun\",\"saldo\":\"100.000.000 - 199.999.999\",\"tujuan\":\"PRODUKTIF\",\"pekerjaan\":\"KARYAWAN SWASTA\",\"nilai\":\"LANCAR\"}'),
(5, '{\"penghasilan\":\"1.000.000 - 3.499.999\",\"jangka waktu\":\"1 - 2 Tahun\",\"saldo\":\"100.000.000 - 199.999.999\",\"tujuan\":\"PRODUKTIF\",\"pekerjaan\":\"PNS\",\"plafond\":\"50.000.000 - 149.999.999\",\"nilai\":\"LANCAR\"}'),
(6, '{\"penghasilan\":\"1.000.000 - 3.499.999\",\"jangka waktu\":\"3 - 4 Tahun\",\"saldo\":\"<= 99.999.999\",\"nilai\":\"MACET\"}'),
(7, '{\"penghasilan\":\"1.000.000 - 3.499.999\",\"jangka waktu\":\"3 - 4 Tahun\",\"saldo\":\">= 200.000.000\",\"tujuan\":\"PRODUKTIF\",\"jaminan\":\"TIDAK SESUAI\",\"nilai\":\"MACET\"}'),
(8, '{\"penghasilan\":\"1.000.000 - 3.499.999\",\"jangka waktu\":\"3 - 4 Tahun\",\"saldo\":\">= 200.000.000\",\"tujuan\":\"KONSUMTIF\",\"nilai\":\"MACET\"}'),
(9, '{\"penghasilan\":\"1.000.000 - 3.499.999\",\"jangka waktu\":\"3 - 4 Tahun\",\"saldo\":\"100.000.000 - 199.999.999\",\"plafond\":\"150.000.000 - 299.999.999\",\"jaminan\":\"SESUAI\",\"tujuan\":\"KONSUMTIF\",\"nilai\":\"LANCAR\"}'),
(10, '{\"penghasilan\":\"1.000.000 - 3.499.999\",\"jangka waktu\":\"3 - 4 Tahun\",\"saldo\":\"100.000.000 - 199.999.999\",\"plafond\":\"150.000.000 - 299.999.999\",\"jaminan\":\"TIDAK SESUAI\",\"pekerjaan\":\"KARYAWAN SWASTA\",\"nilai\":\"LANCAR\"}'),
(11, '{\"penghasilan\":\"1.000.000 - 3.499.999\",\"jangka waktu\":\"3 - 4 Tahun\",\"saldo\":\"100.000.000 - 199.999.999\",\"plafond\":\"150.000.000 - 299.999.999\",\"jaminan\":\"TIDAK SESUAI\",\"pekerjaan\":\"PNS\",\"nilai\":\"MACET\"}'),
(12, '{\"penghasilan\":\"1.000.000 - 3.499.999\",\"jangka waktu\":\"3 - 4 Tahun\",\"saldo\":\"100.000.000 - 199.999.999\",\"plafond\":\"50.000.000 - 149.999.999\",\"nilai\":\"LANCAR\"}'),
(13, '{\"penghasilan\":\"1.000.000 - 3.499.999\",\"jangka waktu\":\">= 5 Tahun\",\"pekerjaan\":\"KARYAWAN SWASTA\",\"nilai\":\"LANCAR\"}'),
(14, '{\"penghasilan\":\"1.000.000 - 3.499.999\",\"jangka waktu\":\">= 5 Tahun\",\"pekerjaan\":\"PNS\",\"tujuan\":\"PRODUKTIF\",\"plafond\":\"<= 49.999.999\",\"nilai\":\"LANCAR\"}'),
(15, '{\"penghasilan\":\"1.000.000 - 3.499.999\",\"jangka waktu\":\">= 5 Tahun\",\"pekerjaan\":\"PNS\",\"tujuan\":\"PRODUKTIF\",\"plafond\":\">= 300.000.000\",\"nilai\":\"LANCAR\"}'),
(16, '{\"penghasilan\":\"1.000.000 - 3.499.999\",\"jangka waktu\":\">= 5 Tahun\",\"pekerjaan\":\"PNS\",\"tujuan\":\"KONSUMTIF\",\"nilai\":\"LANCAR\"}'),
(17, '{\"penghasilan\":\"1.000.000 - 3.499.999\",\"jangka waktu\":\"4 - 5 Tahun\",\"saldo\":\"100.000.000 - 199.999.999\",\"nilai\":\"LANCAR\"}'),
(18, '{\"penghasilan\":\"1.000.000 - 3.499.999\",\"jangka waktu\":\"4 - 5 Tahun\",\"saldo\":\">= 200.000.000\",\"tujuan\":\"PRODUKTIF\",\"nilai\":\"MACET\"}'),
(19, '{\"penghasilan\":\"1.000.000 - 3.499.999\",\"jangka waktu\":\"4 - 5 Tahun\",\"saldo\":\">= 200.000.000\",\"tujuan\":\"KONSUMTIF\",\"nilai\":\"LANCAR\"}'),
(20, '{\"penghasilan\":\"3.500.000 - 4.499.999\",\"nilai\":\"LANCAR\"}'),
(21, '{\"penghasilan\":\">= 4.500.000\",\"nilai\":\"LANCAR\"}');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ujidata`
--

CREATE TABLE `tbl_ujidata` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `attribut` text NOT NULL,
  `entropy` float NOT NULL,
  `kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_attribut`
--
ALTER TABLE `tbl_attribut`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_data`
--
ALTER TABLE `tbl_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_keputusan`
--
ALTER TABLE `tbl_keputusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_klasifikasi`
--
ALTER TABLE `tbl_klasifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pohon`
--
ALTER TABLE `tbl_pohon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pohonkeputusan`
--
ALTER TABLE `tbl_pohonkeputusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ujidata`
--
ALTER TABLE `tbl_ujidata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_attribut`
--
ALTER TABLE `tbl_attribut`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_data`
--
ALTER TABLE `tbl_data`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `tbl_keputusan`
--
ALTER TABLE `tbl_keputusan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_klasifikasi`
--
ALTER TABLE `tbl_klasifikasi`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_pohon`
--
ALTER TABLE `tbl_pohon`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tbl_pohonkeputusan`
--
ALTER TABLE `tbl_pohonkeputusan`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_ujidata`
--
ALTER TABLE `tbl_ujidata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
