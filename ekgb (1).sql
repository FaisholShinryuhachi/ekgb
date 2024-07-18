-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 17, 2024 at 04:43 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ekgb`
--

-- --------------------------------------------------------

--
-- Table structure for table `ekgbs`
--

CREATE TABLE `ekgbs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pangkat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kgb_terakhir` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gaji` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendukung` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendukung2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ekgbs`
--

INSERT INTO `ekgbs` (`id`, `nip`, `id_user`, `jabatan`, `pangkat`, `kgb_terakhir`, `status`, `gaji`, `pendukung`, `pendukung2`, `created_at`, `updated_at`) VALUES
(2, '197306142000122004', 2, 'Sekretaris', 'Pembina Tingkat I', '2022-06-01', 'Sudah Diproses', '4463001', 'dIBt31zztxrTUhQnC2ADvfMOrSExQNSptPe2ow7V.pdf', 'oLxXk6O3PlCSynxqMrKrq0amLAx2Df6EhylA2H1q.pdf', '2021-10-26 00:15:16', '2024-07-17 06:20:29'),
(3, '197710192002121009', 3, 'Kepala Bidang Cipta Karya', 'Pembina/IV.a', '2022-12-01', 'Sudah Diproses', '4151091', 'v0u30Ro7jjjxVQpHCx1CCPlrTjE3MzOUDnwBAUzz.pdf', 'vPUxz93sI6CjGUQJleYnjMlnP7o0ERqcb0FOYwr6.pdf', '2021-10-26 08:33:53', '2023-01-03 19:01:17'),
(4, '197108092002121005', 4, 'Kepala Bidang Sumber Daya Air', 'Pembina/IV.a', '2023-02-01', 'Sudah Diproses', '4024400', 'C0b1MczyLI2CKRZaJ5kOra3lwuYoSyTQp1SHZxJC.pdf', 'tGckVc2WG5WKi20V6eJoehlt9Dbk8gsT3FFEkrIt.pdf', '2021-10-26 20:32:52', '2023-03-14 20:27:02'),
(7, '197303132002121013', 7, 'Pembina Jasa Konstruksi Ahli Muda', 'Penata Tingkat I/III.d', '2022-12-01', 'Sudah Diproses', '3982580', '2kdoSdXX8oKfRblhhEQyKDf2eTcBrQJ47pXAg9l4.pdf', 'QLfTzJ581LrICLqi8CuYPKxB0yVARLlkLV1fDLVT.pdf', '2021-10-26 20:52:48', '2023-01-03 19:02:34'),
(8, '197503012006041014', 8, 'Kepala Sub Bagian Perencanaan dan Keuangan', 'Penata Tk. I/III.d', '2023-03-01', 'Sudah Diproses', '3982600', 'VoUg6MLnFu9BthWBlRTsUiySlh441CtXrbA143pc.pdf', 'y4N2eNrJGFoMsbaRJ9j5Zv6e04v1pgV6MiMr5S2o.pdf', '2021-10-26 20:54:52', '2023-03-14 20:33:31'),
(9, '196812241989031008', 9, 'Teknik Pengairan Ahli Muda', 'Penata Tingkat I/III.d', '2024-03-01', 'Sudah Diproses', '5022500', 'DBRlycthBxVNfZ1rZFwbwkUoUo7hS5TnWQBJlKnb.pdf', 'uLbya8HQNcrOjuckSo0ld7cgndsCvJbaHi5YUXEm.pdf', '2021-10-26 22:11:55', '2024-04-28 22:44:54'),
(10, '198010032008031001', 10, 'Penata Ruang Ahli Muda', 'Penata Tingkat I/III.d', '2024-03-01', 'Sudah Diproses', '4042500', 'PRGTXFK2QVZVF0KSzq2YGCdou00z1gKS1x8QYkS2.pdf', 'jGJBEsQyckENFEfwjGvo5ClNthtGmnX82JoT6VqC.pdf', '2021-10-26 22:16:21', '2024-04-28 22:35:35'),
(12, '198602062010011011', 12, 'Penata Ruang Ahli Muda', 'Penata/III.c', '2024-01-01', 'Sudah Diproses', '3919100', 'OsBbvXv2KbAclUseZDzWdIEByo5uaoacCYAaDEy4.pdf', '10vJ4RA3Bz4r18pHf70Vro3VTA6se9Z9ZSoc28JZ.pdf', '2021-10-26 22:22:49', '2024-04-28 22:37:57'),
(13, '198610032010011004', 13, 'Kepala Bidang Penataan Ruang', 'Penata Tk. I/III.d', '2024-01-01', 'Sudah Diproses', '3919100', 'ZInrXakpvGguqKdZOggl3oQUFSHdEVAjO1TENwg2.pdf', 'LTNvLrFvmf69T2pMgi30rmMX1o4cYAHk0fL214Cd.pdf', '2021-10-26 22:25:08', '2024-04-28 22:39:30'),
(14, '198007042006042030', 14, 'Penata Keuangan', 'Penata/III.c', '2024-06-01', 'Sudah Diproses', '4000600', '7UJDL5aQkcrkePdvPlKWYavkvTfhhc2QACnnD2Mu.pdf', 'qvO0a3VUMCH3ozuJZfPyXC02f7kmwuoSC1vFV6qw.pdf', '2021-10-26 22:26:38', '2024-05-29 20:27:09'),
(15, '198210152010011020', 15, 'Pengawas Jalan dan Jembatan', 'Penata Tk. I /III.d', '2024-01-01', 'Sudah Diproses', '3919100', 'vZDQRchUVGjKr9UPxQbOewFKvDay0MpHq6FQFu9c.pdf', 'T8GO2EQX4FC8btfHUBMNwHbHvyr8HXdKNVeiKlbN.pdf', '2021-10-26 22:28:12', '2024-05-29 21:59:56'),
(16, '198606102014031003', 16, 'Teknik Jalan Dan Jembatan Ahli Muda', 'Penata/III.c', '2024-03-01', 'Sudah Diproses', '3533900', 'hrQOPanri8MrobOAVCN9O5ItpU0mr15G6kQpoWNL.pdf', 'Nn6ailNDG54kxapxCpJd1HhtfhQx4RDOTUCttRMy.pdf', '2021-10-27 08:48:00', '2024-04-28 22:46:28'),
(18, '198307202008031002', 18, 'Teknik Jalan dan Jembatan Ahli Muda', 'Penata/III.c', '2024-03-01', 'Sudah Diproses', '3760100', 'UcwgVOwM2rDX7OJVzYgZGJmpMmXK3743g76tSFxs.pdf', 'hmmtA2XCZWxe4PX4TZICVitLL0R84uKWz15Rfcxm.pdf', '2021-10-27 08:53:26', '2024-05-29 22:04:05'),
(19, '198210152006042030', 19, 'Bendahara', 'Penata / III.c', '2023-05-01', 'Sudah Diproses', '3445500', 'InXqZZaFSQozCneXa2aY1wpF15K13ZYnomyj16TC.pdf', 'DDPzApPXUxULkR9Wm0RSk0BVHLT00GZxtktmep91.pdf', '2021-10-27 08:54:58', '2024-04-22 21:20:50'),
(20, '198009212010011017', 20, 'Pengelola Geospasial', 'Penata Muda Tk. I/III.b', '2024-01-01', 'Sudah Diproses', '3497300', 'Xw4chmzscI8Q6Z1ykAqzrhlLHXbtOcHbOjytRsWF.pdf', '0u0lNCBszuy5HjBbQwZ18xBSeQNvRlsvo1pRwoxB.pdf', '2021-10-27 08:59:26', '2024-04-28 22:49:23'),
(24, '197003142002121003', 24, 'Penilik Jalan', 'Penata Muda Tk. I /III.b', '2023-12-01', 'Sudah Diproses', '3445500', 'AQA0dlGh2YwV9rOWJj9UZO1q380ExOcOexv1pq4h.pdf', '2xyNltRkbV9bmTorBu2o09ZK5m4f8prEkaHIPRCG.pdf', '2021-10-27 20:00:30', '2024-04-28 22:43:10'),
(26, '198205052007012025', 26, 'Penata Keuangan', 'Penata Muda/III.a', '2023-06-01', 'Sudah Diproses', '3305700', 'feMuFTMgU7GLRs33HSjssM9KnxYTlrfDBkHObPa6.pdf', 'hk9kLBHGsA6X7Jq9wm3Gn4pFejsUo46MG2BczMDg.pdf', '2021-10-27 20:04:03', '2023-06-05 22:36:47'),
(27, '199401102019031004', 27, 'Teknik Jalan Dan Jembatan Ahli Pertama', 'Penata Muda/III.a', '2023-03-01', 'Sudah Diproses', '2744500', 'jTSvFIPTABAI7fw2KMZKXXsn5NuuLz6xZVCh1qw8.pdf', 'ZwoHBEPkow6gpi2CofOS0Fxf8Ud6bgDJgLugfKdf.pdf', '2021-10-27 20:06:48', '2023-03-14 20:32:25'),
(28, '198409172019031001', 28, 'Teknik Pengairan Ahli Pertama', 'Penata Muda/III.a', '2023-03-01', 'Sudah Diproses', '2744500', 'cJ80wFHUPbFdPMPQCd8Z3o76jYmYH1VQFA4BAw9O.pdf', 'aQQ3TGCE4337CuEwt19ZDvzlmiHwWBnPgBCSvDq9.pdf', '2021-10-27 20:09:23', '2023-03-14 20:34:22'),
(29, '199403212019031005', 29, 'Penata Ruang Ahli Pertama', 'Penata Muda/III.a', '2023-03-01', 'Sudah Diproses', '2744500', 'tePOxa3NuaiwvAaW5lBUXLknTaSqGr4RTfVP8AYl.pdf', 'FEyghJMwDnTm8DVCrk4F4MG7sM420xMI0iXpM287.pdf', '2021-10-27 20:11:42', '2023-03-14 22:09:19'),
(30, '199307262019031009', 30, 'Teknik Penyehatan Lingkungan Ahli Pertama', 'Penata Muda/III.a', '2023-03-01', 'Sudah Diproses', '2744500', 'rNubU36yhIugOGdaBq80G1XLL8hkRQbwDVK5krgu.pdf', 'enW7P267Idz5E7KpGBv4rXhcD3iSFcEf3zQn5iPD.pdf', '2021-10-27 20:15:42', '2023-03-14 20:35:26'),
(31, '199101042019032002', 31, 'Teknik Tata Bangunan dan Perumahan Ahli Pertama', 'Penata Muda/III.a', '2023-03-01', 'Sudah Diproses', '2744500', 'n5sAns8AnxOOe801jiRfIkOx52reEAIl72U48M46.pdf', 'ZlbQfVa1Lj6Yn93bhlxOhMIo8pHK806Dqrq2ZeRE.pdf', '2021-10-27 20:17:33', '2023-03-14 20:31:50'),
(32, '199407152020121009', 32, 'Pranata Komputer Ahli Pertama', 'Penata Muda Tk. I /III.b', '2022-12-01', 'Sudah Diproses', '2995000', 'eoJNZbWdpv0nFmfF6J2xzOtjxNn4CPet4fpib9wi.pdf', 'vYEl25TUVfoiqjH92lnMPrFN3LGZr7D1AChi82Xv.pdf', '2021-10-27 20:18:39', '2024-05-29 20:32:47'),
(33, '199412242020121009', 33, 'Teknik Jalan Dan Jembatan Ahli Pertama', 'Penata Muda Tk.I /III.b', '2022-12-01', 'Sudah Diproses', '2995000', 'xNCz4nq2a0rwIZx09jWqOm9Wwlxn0FL97ZNX8q28.pdf', 'krlY6S3OjVzRiFyms28OHl0TgMQ3Gq1rIjS2V5dd.pdf', '2021-10-27 20:20:04', '2024-04-22 20:36:35'),
(34, '199205042020121009', 34, 'Teknik Jalan Dan Jembatan Ahli Pertama', 'Penata Muda/III.a', '2022-12-01', 'Sudah Diproses', '2660700', 'GvsDg15VV59RLZZbUVh7lU3BFLDq4q0bNq6A4KsM.pdf', 'XR730V8gumcCWX2jfZVvlkaKffmwyKdcA6txLdO2.pdf', '2021-10-27 20:21:30', '2023-01-03 19:15:45'),
(35, '199509062020121011', 35, 'Penata Ruang Ahli Pertama', 'Penata Muda/III.a', '2022-12-01', 'Sudah Diproses', '2660700', 'WzgpofbjvW2zuKek71PbvFPLbK6rCnJhtxrkKMlm.pdf', 'GIPBW51QhT816BWu0fCUGM4hXggxVITc2ctCWvk3.pdf', '2021-10-27 20:23:27', '2023-01-03 19:18:13'),
(36, '197009212007011018', 36, 'Pengadministrasi Keuangan', 'Penata Muda/III.a', '2024-06-01', 'Sudah Diproses', '3682500', '6BMJnEpPmJAsMpv2agCosF8HAo4pUVm6QQQApTYs.pdf', '3oxXyEJR0Hnk4yNTOd0ch0qxnYLzb00hreKARQFp.pdf', '2021-10-27 20:25:54', '2024-05-29 22:03:41'),
(37, '198102072007012014', 37, 'Pengadministrasi Keuangan', 'Penata Muda/III.a', '2023-06-01', 'Sudah Diproses', '3171500', '28JiMqtUp4k0XPHhHk1GlylszGb1W6QaI5IzVFv8.pdf', 'z02bSU5Momb3W2PCJJ1Em9wtBBygyLcmTWLJJn8n.pdf', '2021-10-27 20:27:48', '2023-07-31 23:24:39'),
(38, '197508162002121005', 38, 'Pemelihara Penerangan Jalan', 'Penata Muda/III.a', '2022-10-01', 'Sudah Diproses', '3106900', 'ZQOc2Y8CcLGWHi7bgHbS4sbmKewLJWHEaC8U0UZo.pdf', '4sC5XRgI8vYYPE8ZzI2iohcSXzfP3ezo3cUTbe3u.pdf', '2021-10-27 20:30:10', '2023-01-03 19:22:46'),
(40, '198009092006041023', 41, 'Pengadministrasi Data dan Informasi', 'Penata Muda/III.a', '2023-05-01', 'Sudah Diproses', '3305700', 'qkzrpsgfAAkBCIu9SkJ2aS9c471RXrPJD2skxbD4.pdf', 'h5H90aqT6OnjRBT1ZdCH5fF5eRQ1XJi6sieQ5SaK.pdf', '2021-10-27 20:49:01', '2023-06-05 22:36:05'),
(41, '197704242006041029', 42, 'Pengadministrasi Umum', 'Penata Muda/III.a', '2023-05-01', 'Sudah Diproses', '3305700', 'Ic3NLNniWbGyg4xKGTqosOxnvSY31jmy6pVojZcO.pdf', 'Kv3wpZXgClnRPwOmuV2ULDnyiLOLV7MhCO0ZVDEp.pdf', '2021-10-27 20:51:24', '2023-07-31 23:51:42'),
(43, '198010142002121004', 44, 'Pengadministrasi Umum', 'Pengatur Tingkat I', '2023-12-01', 'Belum Diproses', '3074700', 'uObcuGxC6XVe8jSTWwYMk7FN9TJChjd9uG3jQFRx.pdf', 'UUtgDVuvZhqCO54MjmvOE5ANnCUusyYSulNwdXmB.pdf', '2021-10-27 20:58:07', '2024-07-02 09:24:14'),
(44, '199312172019031005', 45, 'Teknik Jalan Dan Jembatan Terampil Pelaksana', 'Pengatur/II.c', '2023-03-01', 'Belum Diproses', '2449100', 'CALjJFn2dbgBzPmQemdJNRILJR2mWscLiUGlYXT2.pdf', 'q7L2w6bSJdxai0WPy5vvzTRSYrZgaCUIgnCGCbRq.pdf', '2021-10-27 21:12:54', '2023-03-14 20:30:49'),
(45, '198611152019031003', 46, 'Teknik Pengairan Terampil Pelaksana', 'Pengatur/II.c', '2023-03-01', 'Sudah Diproses', '2449100', 'gJu9ErcOVfgFadFOyvvkyLcT9H2kFONE8eLuS0o7.pdf', 'Hk6JlDl2XOxcAtjSZRotihtTlmBZJ1u6wYxDO1qN.pdf', '2021-10-27 21:14:13', '2023-03-14 20:36:17'),
(46, '199508102019032009', 47, 'Pengelola Pengendalian Pemanfaatan Ruang', 'Pengatur/II.c', '2023-03-01', 'Sudah Diproses', '2449100', 'ccWTYPvJS6RrZqzkoXTFI7O6Xwv0n0zmkZMxuCx3.pdf', 'OW8KT4YG01ZwxMoRQv8cX7K4DwNIjSXSL4Zz0Keh.pdf', '2021-10-27 21:15:50', '2023-03-14 20:45:32'),
(47, '199306262020121009', 48, 'Teknik Jalan Dan Jembatan Terampil', 'Pengatur/II.c', '2022-12-01', 'Sudah Diproses', '2374300', 'nA5j0gDI6tN8FM2SI8m4dFiCC0H35ibmJdLqCxAG.pdf', 'Gq7gFyuYmYXYl9cbyHbLw7zkv1NGPc5sLORS6X8T.pdf', '2021-10-27 21:17:16', '2023-01-03 19:28:29'),
(48, '199006192020122007', 49, 'Teknik Jalan Dan Jembatan Terampil', 'Pengatur/II.c', '2022-12-01', 'Sudah Diproses', '2374300', 'RmxzS9hXZeetvEmk9w2kO70x15QwG8ySG1UHVaMF.pdf', 'zi8RtdOwm1tWCq7TPefew7ueZTw9nHfnpG9cUy4c.pdf', '2021-10-27 21:18:35', '2023-01-03 19:29:15'),
(49, '197401072006041019', 50, 'Pengadmistrasi Umum', 'Pengatur Muda Tk. I/II.b', '2023-02-01', 'Sudah Diproses', '2772500', 'yCj0Fssi1JcuYBJVRXWX4Ppcid9pzIUpMzUQ83XO.pdf', 'xD7zBoBdEZ03UwEa6A3IaVceKKUFLfOPVMUHAEvA.pdf', '2021-10-27 21:20:34', '2023-03-14 20:38:41'),
(50, '197912062009011006', 51, 'Pengadministrasi Kepegawaian', 'Pengatur Muda/II.b', '2023-10-01', 'Sudah Diproses', '2578800', 'GUgGf5dkWEZA5D1qKQnkakZLPjOIN2pjUx2FQjLW.pdf', 'NbHOVEN4olikXqSrbA3a0vp1FAZwNdPSL6bkIUS4.pdf', '2021-10-27 21:23:36', '2023-10-05 18:57:42'),
(51, '198301202006041014', 39, 'Pengadministrsi Kepegawaian', 'Penata Muda/III.a', '2023-10-01', 'Sudah Diproses', '3204700', 'CGdMEkURz10cSuq1ukZ1DD3aGV4SbIObvLKN3DX9.pdf', 'aDJlEcYVmVxGdC4hfRNDFUha35L7Ij1dgr8w3QVl.pdf', '2021-10-27 21:35:25', '2023-10-05 18:56:41'),
(58, '197004191990031003', 58, 'Kepala Dinas', 'Pembina Utama Muda/IV.c', '2022-10-01', 'Sudah Diproses', '5105300', '8JcYVPvItdb1JhPgAAVrzCPjzi1jyqTQvMtxY8hW.pdf', '5aqOtJKifbFslW4NZVEk5NzqPO0wyMaB2NTXacBI.pdf', '2022-02-06 21:40:40', '2023-11-09 19:51:17'),
(59, '199305022019032008', 59, 'Teknik Penyehatan Lingkungan Pelaksana', 'Pengatur/II.c', '2023-03-01', 'Sudah Diproses', '2449100', 'lmOgLpHeeCiAoPLEWlCgSF1p3oTfTSsWTIXn4OAH.pdf', 'dQQciNY4elpKCyKY4sckVUhYKb3mgnI4WfahwrFS.pdf', '2022-04-18 20:14:21', '2023-03-14 20:44:16'),
(60, '198412142008032002', 60, 'Teknik Tata Bangunan dan Perumahan Muda', 'Pembina/IV.a', '2024-03-01', 'Sudah Diproses', '4213500', '3mMZ327Q8TyQ0GIJCX2qCDw60NmzPCXDByllw7JF.pdf', 'Z5RJHAvTb5i6VHACCmK9FPol6Nn4h1lTzR2cz3yd.pdf', '2022-04-18 20:18:54', '2024-05-29 22:05:14'),
(61, '198802262019031003', 61, 'Teknik Tata Bangunan dan Perumahan Pelaksana', 'Pengatur/II.c', '2023-03-01', 'Sudah Diproses', '2449100', '89ejciOiZ7JzSQc6UcGRC39QHktfPVzq7kUKNwWu.pdf', 'Eync0WIWcQJZTAH0vkxRxI3Zy5GDxWWAl7PQe8ZF.pdf', '2022-04-18 20:25:11', '2023-03-14 20:42:57'),
(62, '197603292002122003', 62, 'Kepala UPT Pengelolaan Air Limbah Domestik', 'Penata Tingkat I/III.d', '2022-12-01', 'Sudah Diproses', '3982600', 's7APslduPC7Ir2hKMFQnClc51B81oPfSj8AzpVee.pdf', 'ABwlX1qSji7RCC7UM2idxjCZQ0MtUhxIm6eM9Gk2.pdf', '2022-04-18 20:29:58', '2022-11-16 23:38:54'),
(63, '198202112009032005', 63, 'Teknik Penyehatan Lingkungan Muda', 'Penata Tingkat I/III.d', '2023-03-01', 'Sudah Diproses', '3628900', 'BCy6Hh8pW8iePndpOL4nznluP7kX1gS1yuDGZEUR.pdf', 'W76CaWsjjuUk2ghXEXGkQVMalBviRNMsYGLkHDHi.pdf', '2022-04-18 20:33:24', '2023-03-14 20:38:12'),
(64, '198506062014031001', 64, 'Teknik Tata Bangunan dan Perumahan Muda', 'Penata/III.c', '2024-10-01', 'Sudah Diproses', '3172300', 'ljEEuV1wraW3WbHxZH5ZrRjoRsZObs3RwfaEEKYG.pdf', '7Scq9GB1NI7ismeR9BVcv8nTdoMIZGraAiDghcCU.pdf', '2022-04-18 20:38:29', '2023-03-14 20:41:19'),
(65, '198709042019031002', 65, 'Teknik Tata Bangunan dan Perumahan Pertama', 'Penata Muda/III.a', '2023-03-01', 'Sudah Diproses', '2744500', 'q1YFYmGQemVMyt7mmE97ct9qUwSaVAMSsXMPFFwq.pdf', 'VDfCzDjMrLuf6FEnbtCh57czStPDQ9TFby0TpA2M.pdf', '2022-04-18 20:41:55', '2023-06-05 22:37:16'),
(66, '197809142000121005', 66, 'Analis Bangunan dan Perumahan', 'Penata Muda Tingkat I/III.b', '2022-12-01', 'Sudah Diproses', '3340300', 'baaAZ9CgBRSJAgrrHYxnOpdDmljMRzCvSUm1Ybxr.pdf', 'tyUCft0CQvnwQEq37b9OmLKJGDabpq0EOA3iYHcS.pdf', '2022-04-18 20:46:26', '2023-01-03 19:41:01'),
(67, '196901012003121014', 67, 'Analis Pengembangan Sumber Daya Air', 'Penata Muda/III.a', '2023-04-01', 'Sudah Diproses', '3106900', 'PAHLXwX5IeklSuylzOxPRX2crYvzEHMD7aqBdju2.pdf', 'QwQ09HV3Fc8dXUM9D741hJrKV4hUyeOgaO19NnEu.pdf', '2022-04-19 23:53:34', '2023-06-05 22:32:36'),
(68, '198705112019031004', 56, 'Penata Ruang Ahli Pertama', 'Penata Muda/III.a', '2023-03-01', 'Sudah Diproses', '2744500', 'CxkXQoYgnvbcUqotz5bp9PkulfKG1zfKtcNxRnGp.pdf', 'NHfYZ6WYzEbweos23VM7s0UzGPvyCYIE6cXeeVEQ.pdf', '2022-04-21 00:56:52', '2023-03-14 20:43:37'),
(69, '198001082008011013', 68, 'Analis Pengelolaan Sumber Daya Air', 'Pembina/IV.a', '2022-10-01', 'Belum Diproses', '3743100', '3sgoIQsxXMfgRoEmbVlsh5QmltE8FQIzWr68vFzH.pdf', 'BRY5imYwRMWKmxRYmUbYEiWeVW7Q1LHZ3w0YS91d.pdf', '2022-05-16 21:06:04', '2023-06-06 01:17:51'),
(70, '19842032019032005', 69, 'Teknik Penyehatan Lingkungan Pertama', 'Penata Muda/III.a', '2023-03-01', 'Sudah Diproses', '2744500', 'SVS26JmVrLcDeAE2YRxUPzat47JLPCm5NaeihQf8.pdf', 'Xu8O63xmKaS9mnTVompAxXRrXKlJxB8kZTWHUTa6.pdf', '2022-05-31 00:30:22', '2023-03-14 20:40:03'),
(72, '198111032008032002', 75, 'Teknik Tata Bangunan dan Perumahan Muda', 'Penata Tingkat I/III.d', '2024-03-01', 'Sudah Diproses', '4042500', 'GLYqTtC4LdQSiABkvykJuDLFGwkuN6YdyncQGLom.pdf', 'FNOnSK1ZPU7EmeEDnlUjk5R9G7QnxA3f5Sc2EqXI.pdf', '2022-09-21 00:28:57', '2024-04-28 23:28:24'),
(73, '199109062020121014', 76, 'Surveyor Pemetaan Ahli Pertama', 'Penata Muda/III.a', '2022-12-01', 'Sudah Diproses', '2660700', 'dv9ygwRA8Llh4kpa2YcoK06OYti92iCvTS3TW8B6.pdf', '8Hz9scNjny5S6R7oFAV9DhF8FpI48ZaWfBBLTYIo.pdf', '2023-10-03 19:32:46', '2023-10-03 19:32:46'),
(74, '199801092022032002', 73, 'Pengawas Jalan dan Jembatan', 'Penata Muda/III.a', '2024-03-01', 'Sudah Diproses', '2873500', 'tqD3fMRrlFHjGbFa8wi800RGnLooxVPs5vwARPXW.pdf', 'tlffg6qi0Ccm0iAqEihs1kr7N5QQ1rhSEfA7EyO4.pdf', '2023-10-03 19:35:17', '2024-04-28 23:30:16'),
(75, '198908162022032003', 72, 'Penata Ruang Ahli Pertama', 'Penata Muda/III.a', '2024-03-01', 'Sudah Diproses', '2873500', 'kTAfw29ylqrLHXLemuDuSFs3TrkshyirL1MCJLYz.pdf', 'sVbl4VkRgzbXFEZBNtQDFUlnGq0Ua2QpgpvSQ1Pp.pdf', '2023-10-03 20:06:56', '2024-04-28 23:50:12'),
(76, '197510022006041007', 77, 'Surveyor Pemetaan Ahli Muda', 'Penata/III.c', '2024-04-01', 'Sudah Diproses', '3878500', '2aRkMNYB2kBMZPTKWNFZFjsJk7apokLu4gcyH558.pdf', 'l93mp5mGTYBvyKlkRu1CYzCEhpwfLliwcFvwiF12.pdf', '2023-10-03 20:48:14', '2024-05-29 22:00:58'),
(77, '197807262006042010', 6, 'Perencana Ahli Madya', 'Pembina/IV.a', '2024-04-01', 'Sudah Diproses', '4346200', 'S3sV0DDiVBWmrujcegzJEFnDAbtKqK40Ymv3Eq0Q.pdf', 'WErvph9mOJaStQgR1yvQ0iQ3JUhXjfkEEWaK9q52.pdf', '2023-10-05 19:05:55', '2024-05-29 22:02:27'),
(78, '197909182002122010', 78, 'Kasubbag Umum dan Kepegawaian', 'Penata Tk. I/III.d', '2023-11-01', 'Sudah Diproses', '3743100', 'XmJOfsXXow2ypRX69HfivFx3DZ9pw7aag1L1szck.pdf', 'hVEJkX2EHy8paDeYojBIRZbSBbICNlbZ9PxxmQaH.pdf', '2024-04-22 21:19:48', '2024-04-22 21:19:48'),
(79, '2323232', 11, 'Pembina Utama', 'Penata Muda Tk. I /III.b', '2022-05-17', 'Belum Diproses', '12121212121', 'zWMIeHChsGuBNfH4yLBrG5hwAv4ArJaJH5GTzi2y.pdf', 'Yabnatr8fN4DPhwynA4vvcKGJkoI4JIkpbY4dXlu.pdf', '2024-07-13 09:46:12', '2024-07-13 09:46:12');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kgbs`
--

CREATE TABLE `kgbs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_09_30_062602_create_pegawai_table', 1),
(6, '2021_09_30_125751_create_kgbs_table', 2),
(9, '2021_09_30_130047_create_ekgbs_table', 3),
(10, '2021_10_06_181142_add_column_pendukung2', 4),
(11, '2021_10_14_142438_add_column_ekg_gaji_and_user', 5),
(12, '2021_10_17_182219_drop_column_ekgb_nama_pegawai', 5),
(13, '2021_10_22_133030_add_column_user_profile', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pegawai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pangkat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kgb_terakhir` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` bigint(20) UNSIGNED NOT NULL,
  `nomor_surat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_surat` date NOT NULL,
  `penanda_tangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `daftar_pegawai` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`daftar_pegawai`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `nomor_surat`, `tanggal_surat`, `penanda_tangan`, `daftar_pegawai`, `created_at`, `updated_at`) VALUES
(8, '800.1.11.13/PUPR-UP1/XI/2024', '2024-07-18', 'Drs. H. AGUS SUPARDI, M.Si', '\"[\\\"2\\\",\\\"11\\\"]\"', '2024-07-13 12:55:39', '2024-07-13 12:55:39');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profile` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `profile`) VALUES
(1, 'Helmi Wahyuda, S.E', 'helmiwahyuda@dpuprntn.com', '2021-09-30 05:33:12', '$2y$10$uadaQpLcutcRN9A3DJyA3.RCEaeCcLY5CtF7s87NHsppJ4tz/B61G', 'pegawai', NULL, '2021-09-30 05:33:12', '2021-10-25 23:50:30', '5bA5XjQ5a0I2AnzEJZHDCM6LhBVLuymE6SjIj8FB.jpg'),
(2, 'Nila Misdartina, S.H., M.A.P.', 'nilamisdartiana@dpuprntn.com', '2021-10-03 22:19:31', '$2y$10$LDa6LuV.29DDQVtFYXKfMO6wQASVG3ay7xmNq7p41/LipYp8.Td1i', 'pegawai', NULL, '2021-10-03 22:19:31', '2023-10-03 20:11:34', NULL),
(3, 'Riswandi, ST., MP', 'riswandi@dpuprntn.com', '2021-10-21 05:31:57', '$2y$10$GTC903hi2Pynx/Ujt6ISIulIXwfzDXCvSDSYR8SlmOkIg3eErgqfm', 'pegawai', NULL, '2021-10-21 05:31:57', '2021-11-10 22:22:09', 'zAPZ5lQt1NIcnh92OSi0ZpryPJ2oEwwT4r4aRe7K.jpg'),
(4, 'Nanang Agus Hidayat, ST., MM', 'nanangagushidayat@dpuprntn.com', NULL, '$2y$10$IWPsvu/Dp9HvUpPeYY4mcOfOdWBSlrzjGrARC01EQKLX5z5g9hmaG', 'pegawai', NULL, '2021-10-21 07:14:08', '2021-10-25 23:51:29', NULL),
(5, 'Marzuki, ST., MM', 'marzuki@dpuprntn.com', NULL, '$2y$10$ajN53Hkc22p5kKtuTXvSi.niqWfkQ5ahCE2LeMOvf5y1RfkNWTlb6', 'pegawai', NULL, '2021-10-21 08:20:05', '2021-11-07 18:38:42', 'uZlOj01cXWuJDiiVtBCzfcJWi15gweHgqDid8tE1.jpg'),
(6, 'Yulifianti, ST., M.Eng', 'yulifianti@dpuprntn.com', NULL, '$2y$10$4jCno2.mHUCoWQs/5tccXOyOUr97Y6wOmE.6XVpZ6BBqq5AyJfHHi', 'pegawai', NULL, '2021-10-21 08:23:14', '2023-10-03 20:10:06', NULL),
(7, 'Erzan Safrizal, ST', 'erzansafrizal@dpuprntn.com', NULL, '$2y$10$VNK7gtypedGyvBRbpDh4GunTKOge0NgFipEd388BVWfqLBh9RhJxi', 'pegawai', NULL, '2021-10-21 08:23:44', '2021-10-25 23:52:29', NULL),
(8, 'Heri Hendrayatno, SP', 'herihendrayatno@dpuprntn.com', NULL, '$2y$10$KvGgMqyIjSz8olYWxSQ/ruXKKYaLPNUzcCUNol/99h6ukuuATBI9.', 'pegawai', NULL, '2021-10-21 08:24:21', '2021-10-25 23:52:49', NULL),
(9, 'Heriansyah', 'heriansyah@dpuprntn.com', NULL, '$2y$10$IvHlsXVs/N0Vrf8nbDz0j.ldR1I8yZq82.cNWdynAfqNWCL94Op8C', 'pegawai', NULL, '2021-10-21 08:25:15', '2021-10-25 23:53:06', NULL),
(10, 'Muhammad Harizal, ST', 'muhammadharizal@dpuprntn.com', NULL, '$2y$10$Z77R5NaVlpbrxXNGt/FcwufcIB0xAq2pTD5KosJqanH4tv20nn5Hy', 'pegawai', NULL, '2021-10-21 08:25:43', '2021-11-10 21:54:33', 'E8BM0GQnM1u1WzfX6YygMkoLdhFiWuiCsxdHvKEz.pdf'),
(11, 'Heru Setiawan, S.IP', 'herusetiawan@dpuprntn.com', NULL, '$2y$10$U75nkC4cZXsQhxS.3x.YCeXf9iSwfzFa9DxWEt7LkLwQaX4RLTzDu', 'pegawai', NULL, '2021-10-21 08:26:04', '2021-10-30 18:57:21', 'h5Nh7AAChYg4F6n0RBEG66vFGx3zKMnVK59BTfjp.jpg'),
(12, 'Irdaus, S.Sos., MM', 'irdaus@dpuprntn.com', NULL, '$2y$10$OGnPfGUEofC4rAPuECLUDuC6p4LvU0eg.SC.ZQH5neNKqyGDDWaKy', 'pegawai', NULL, '2021-10-21 08:26:24', '2021-10-25 23:54:51', NULL),
(13, 'Rudiansyah, ST', 'rudiansyah@dpuprntn.com', NULL, '$2y$10$FgAav.kdBn.y4/OU/TVIsOj2ldPmoUQxEumL4halNUMENgbw6LEs.', 'pegawai', NULL, '2021-10-21 08:26:43', '2021-10-25 23:55:26', NULL),
(14, 'Nur Deniana, S.IP', 'nurdeniana@dpuprntn.com', NULL, '$2y$10$ZM.DEdVnRWR84eX3HsQhhe6jvYkuOwSgAzoDnvYSaWkYeL6FLdQaG', 'pegawai', NULL, '2021-10-21 08:27:16', '2021-10-25 23:56:07', NULL),
(15, 'Wan Aswin Winardi, ST., M.Sc', 'wanaswinw@dpuprntn.com', NULL, '$2y$10$C3Xp4G49oIFm5a0XeCA7.ekZ692sLAiTSi6Ec0rUhOu2McZm1ranO', 'pegawai', NULL, '2021-10-21 08:27:42', '2021-11-02 19:45:44', 'K6xIlbYTziO4bk0eiUDb9IOetZQFcf1r9BE0p87V.jpg'),
(16, 'Kusnadi, ST', 'kusnadi@dpuprntn.com', NULL, '$2y$10$TubqDAga4WS/UM8XcC6uleu3dibzOe07Q3AC2igfPmES/aYd/455.', 'pegawai', NULL, '2021-10-22 23:52:08', '2021-10-25 23:57:17', NULL),
(17, 'Herri Apriyanto', 'herriapriyanto@dpuprntn.com', NULL, '$2y$10$d1VZGPmdMyB2mFlBWyLwiOLaFtu55NuRxNIonmJ9DgWE5qTil1Wh.', 'pegawai', NULL, '2021-10-25 23:08:45', '2021-10-25 23:57:46', NULL),
(18, 'Wira, ST', 'wira@dpuprntn.com', NULL, '$2y$10$qguGopNDLA/NzI2Y8lT/8O1KPUkLVNfk6aPPuKv7o7EVCvzCbcUwS', 'pegawai', NULL, '2021-10-25 23:10:16', '2021-11-02 19:20:22', 'SpuUUDLDYPzLKamZj57fz25yorrnp7dHIcFWA4Nq.jpg'),
(19, 'Harmaini, S.IP', 'harmaini@dpuprntn.com', NULL, '$2y$10$qU8GZlFNLP/ccjKV0Z0lu.ONH2IDTzk/jI5/e67g8WKoWKcuIh3JC', 'pegawai', NULL, '2021-10-25 23:10:50', '2021-10-25 23:58:22', NULL),
(20, 'Frengky A. Tuapattinaya, A.Md', 'frengkyat@dpuprntn.com', NULL, '$2y$10$jk4AC5pwlMPjk1sMdoNcj.k1FhDQcacYmp9t77lIWwvBlpQ9Qm5Ea', 'pegawai', NULL, '2021-10-25 23:12:04', '2021-10-25 23:58:37', NULL),
(21, 'Habibi Agussami', 'habibiagussami@dpuprntn.com', NULL, '$2y$10$p5EeGfNXqs1Vr73AHBXS3uCvVzVi2EHPVwGcIPZ985R4yn6SiFYFG', 'pegawai', NULL, '2021-10-25 23:13:13', '2021-10-25 23:58:55', NULL),
(22, 'Hendrizan', 'hendrizan@dpuprntn.com', NULL, '$2y$10$uD/ndT7rUFcYyAj9K0TW.ejmxkYagVB2j8TIpgtjbQem5WM901EvG', 'pegawai', NULL, '2021-10-25 23:14:40', '2021-10-25 23:59:18', NULL),
(23, 'Chandra Pribadi, A.Md', 'chandrapribadi@dpuprntn.com', NULL, '$2y$10$SGZV.qUIa6rc.wqB3loyMOk5V.MJxALphWSPoj8ei0qElRtuHV2fK', 'pegawai', NULL, '2021-10-25 23:15:44', '2021-10-25 23:15:44', NULL),
(24, 'Hokli Simamora', 'hoklisimamora@dpuprntn.com', NULL, '$2y$10$DzEBdcl0mXLN6pyMSWN4dOFndib7Y5ppM64936UHpyjoM1bJltOXy', 'pegawai', NULL, '2021-10-25 23:16:18', '2021-10-25 23:16:18', NULL),
(25, 'Anuar', 'anuar@dpuprntn.com', NULL, '$2y$10$qERVs/SK4HBR6B1DgVPgke3SYnAK29CrrqVKJbIPQbxa2fs4CwohO', 'pegawai', NULL, '2021-10-25 23:16:51', '2021-11-11 19:09:15', 'Khxu5oUnfRCifYrjSQKTHW77ZI5abs8aSlOyv6NZ.jpg'),
(26, 'Suryana, S.IP', 'suryana@dpuprntn.com', NULL, '$2y$10$7.0fo.47aekg7bAqRyNju.UB4DWojJZlsHZs1AmFiWE5cr9vQrvIi', 'pegawai', NULL, '2021-10-25 23:17:54', '2023-10-03 20:09:54', NULL),
(27, 'Roki, ST', 'roki@dpuprntn.com', NULL, '$2y$10$6deLRNw9RxzZRbGIai.JpustpOdN2a.UEUUOXHDMKGCESAJ3NuZtm', 'pegawai', NULL, '2021-10-25 23:18:32', '2021-10-25 23:18:32', NULL),
(28, 'Edwin Prasetyo, ST', 'edwinprasetyo@dpuprntn.com', NULL, '$2y$10$JVyoXvKIO4OkR7exglKpgey5./XOCsTUN/4JJ50t9qrUW1OHdH4XS', 'pegawai', NULL, '2021-10-25 23:19:09', '2021-10-25 23:19:09', NULL),
(29, 'Fitra Andryansyah, ST', 'fitraandryansyah@dpuprntn.com', NULL, '$2y$10$cH0B0KMWnVGwQZRJvss.iOHlbUQ3kBbRndtK.2CsdKzk2jRCcaj.C', 'pegawai', NULL, '2021-10-25 23:20:11', '2021-11-11 23:33:30', '79qi1wovZ2E8CjduyzzmlcrVqRHDxdwxepFhmK0T.jpg'),
(30, 'Bayu Inra Setiawan, ST', 'bayuinras@dpuprntn.com', NULL, '$2y$10$fSBBhMyoVP3x3R29cQTfA.Z0RghDp9GwiQZWMmBhlvXhtkYfcCnoC', 'pegawai', NULL, '2021-10-25 23:20:54', '2021-10-25 23:20:54', NULL),
(31, 'Putri Juwita Simamora, ST', 'putrijuwitas@dpuprntn.com', NULL, '$2y$10$fVda9ef1aoLV7ZIKxj9emOfOuMUY0K/DkAe1XDAsjqY6FT8CKWKDu', 'pegawai', NULL, '2021-10-25 23:21:34', '2021-11-10 21:36:39', 'XZiU93OQMFnMzyINPlHsZsWq9ytRatw5fuP7dHkr.jpg'),
(32, 'Adhitya Pratama, S.Kom', 'adhityapratama@dpuprntn.com', NULL, '$2y$10$tCk.fGGs4j9s29CWpeb5UefDGWfbiKR1UHZ.nzdUzIBht6JqrhLQm', 'pegawai', NULL, '2021-10-25 23:22:10', '2023-02-17 09:18:59', 'wTAI7poLxGSErnWLjDYhr4xV28qKm5kGL70vtXR2.jpg'),
(33, 'Fachry Enzeta, ST', 'fachryenzeta@dpuprntn.com', NULL, '$2y$10$MyVNBE2Fx6BiJGoFuzMLa.c5AirL9sFGdduGr5H97uv022rbJP/A6', 'pegawai', NULL, '2021-10-25 23:22:54', '2024-01-30 03:16:30', 'N3EgrhrrZAY06hVMuuCUVIIf2Haaq0TnIoNSKSRg.jpg'),
(34, 'Dany Elisa Victory, S.ST', 'danyelisav@dpuprntn.com', NULL, '$2y$10$1bPZ203ALYFdyTj7UABJKeexAfphvJxERbzKsAz6Wh2cgI8xn43q.', 'pegawai', NULL, '2021-10-25 23:23:45', '2021-10-25 23:23:45', NULL),
(35, 'Eza Rizky Ar Sandy, S.P.W.K', 'ezarizkyarsandy@dpuprntn.com', NULL, '$2y$10$M2rpbArktwZCWH4/x8x3FeAur4rMZBeP8558D/scg.VBmmMd2suZO', 'pegawai', NULL, '2021-10-25 23:24:38', '2021-11-11 21:31:49', 'eKMz73JO5mR4jLolfUwokS1ZtlYmd4jsLaL8rpa1.jpg'),
(36, 'Mulyadi', 'mulyadi@dpuprntn.com', NULL, '$2y$10$jI5xleyyEN84ROBjsEdwzu2STkqZoK9e.8EdtrspsrfeP/aMspnJa', 'pegawai', NULL, '2021-10-25 23:25:08', '2021-10-25 23:25:08', NULL),
(37, 'Ermiyati', 'ermiyati@dpuprntn.com', NULL, '$2y$10$yiuNh0eoNc5vVWCtCdq23OtqLWBWlODw3ZCDlmO2asDOOLZq9IyBe', 'pegawai', NULL, '2021-10-25 23:26:01', '2021-10-31 18:34:47', 'WimMtq8EHdcwx5zYizX0vbUAwvnpwkf2rkxXs2WW.jpg'),
(38, 'Raja Hidayad', 'rajahidayad@dpuprntn.com', NULL, '$2y$10$yBzLP9LiBAE57py0Y7EYNOo0V7TPx.M8lu.Jq/72eZONsUPQ871.6', 'pegawai', NULL, '2021-10-25 23:26:37', '2021-11-11 19:08:46', 'pyEGlESLL0oIl1DpQv0zi9T4KXDr2JHfN7JRwYHM.jpg'),
(39, 'Supriadi', 'supriadi@dpuprntn.com', NULL, '$2y$10$NkndkR4TA1tlAePcAO5bU.ecPM1fL5r0SVyUm4.339BWkZSORwh.u', 'pegawai', NULL, '2021-10-25 23:27:04', '2021-11-02 19:59:08', 'hKFSDSZ2E5Qb6XaBZuN3Rol6X7hZMav4DfYlecf5.jpg'),
(40, 'Agus Fardi', 'agusfardi@dpuprntn.com', NULL, '$2y$10$sol6APq1VHbboqkt/Egqg.jv/p0oEFKVxOMI.xHKlC2X7Y.KF6in2', 'pegawai', NULL, '2021-10-25 23:31:38', '2021-10-25 23:31:38', NULL),
(41, 'Muhammad Zain', 'muhzain@dpuprntn.com', NULL, '$2y$10$C3YN.IOPHKIqoz4TBVRt8eUJC0a5MYkNap2X5sRqdoAtAEQNFY7p.', 'pegawai', NULL, '2021-10-25 23:32:30', '2021-11-02 23:33:41', '8UQqXbt2Bu0OYAEG1slXWAAvEYHEyNW2ctzrKJZQ.jpg'),
(42, 'Adi Lazuar', 'adilazuar@dpuprntn.com', NULL, '$2y$10$qwAiIkcR2Ec/5rdt60gePeyqv39pTwPJt7FhQ/n.gzzvcpDLSzbwK', 'pegawai', NULL, '2021-10-25 23:33:05', '2021-11-02 19:48:48', 'w7672qsqIBiDfEfMwMWTkA0zcocIIN6iANS4uulN.jpg'),
(43, 'Mahrani Madia Lubis, A.Md', 'mahranimadialubis@dpuprntn.com', NULL, '$2y$10$0bRiZIBFe9AcGF/QKMx9F.nS6q4R7xPkdrwf2Nssuo2lZ2nATfdZS', 'pegawai', NULL, '2021-10-25 23:34:01', '2021-11-02 20:15:44', 'dvpqiJBTRQ3sfYGGlBlagJEaGg2zUMByFyb1N2I0.jpg'),
(44, 'Rinto', 'rinto@dpuprntn.com', NULL, '$2y$10$K/U8DiS5DGOVatlY6wYMPeyFLSuAv/4iFsijs3s2Puv7YdwGrVtjS', 'pegawai', NULL, '2021-10-25 23:34:22', '2021-10-25 23:34:22', NULL),
(45, 'Hanjar Tri Putra, A.Md', 'hanjartriputra@dpuprntn.com', NULL, '$2y$10$icWTniM6vxsaLDYVUeBZTetlDuXB574JhEiokwgJuBOAA9ukAk4Gi', 'pegawai', NULL, '2021-10-25 23:42:39', '2021-11-11 19:47:15', 'dZqWpWkCDyH58KaWpjGD5uQtEDphxpcMNRQClG4k.jpg'),
(46, 'Gatot Warisman, A.Md', 'gatotwarisman@dpuprntn.com', NULL, '$2y$10$NohoVHGHUcDuVU2cwI1AluZuc.4JsmVUZNZP8XP/i6GSvKyZfvRjy', 'pegawai', NULL, '2021-10-25 23:44:50', '2021-11-09 20:01:44', 'QJidJ4l7D9UzmYRoegcoqsNE8G2exuykW7G7u5PH.jpg'),
(47, 'Linda Pratiwi Siahaan, A.Md', 'lindapratiwisiahaan@dpuprntn.com', NULL, '$2y$10$uZ8Hn9XkfEb/F/Z.Ezsm..s0026vQgXHEEailVQi.wrMLPdxsq2.y', 'pegawai', NULL, '2021-10-25 23:46:16', '2021-11-02 19:53:58', 'CmZyyYbUF7nMnpkaB7sj2rEhrMznCxzEaHWGslLb.jpg'),
(48, 'Tri Ardi Gunawan, A.Md', 'triardigunawan@dpuprntn.com', NULL, '$2y$10$KGufshUVw3mrIapdsSx0hOP9cPRnFUsZqmxouTQiXHelRwBcM7Gri', 'pegawai', NULL, '2021-10-25 23:47:58', '2021-11-02 19:50:18', 'BeZzOJgp7CK8R47ngRd8xrNncD9SADLNLIZNIYxF.jpg'),
(49, 'Delima Widya K.P, A.Md', 'Delimawidyakp@dpuprntn.com', NULL, '$2y$10$248dx/BwkC5sBP3xX3S9bea7/G39FfQO/7a8BCH8hMNTPo.pTe9aq', 'pegawai', NULL, '2021-10-25 23:48:31', '2021-11-10 21:38:59', 'Z1KKenncjyDrXHSrs2PLtkAf7gEb2V4knS9RQCj4.jpg'),
(50, 'Ngadiyana', 'ngadiyana@dpuprntn.com', NULL, '$2y$10$LFsf4kG812HDZjvgZ3rxsevCcgdFcqOf8VqswUzoHPRx0n7zSKfVy', 'pegawai', NULL, '2021-10-25 23:49:23', '2021-10-25 23:49:23', NULL),
(51, 'Alfian', 'alfian@dpuprntn.com', NULL, '$2y$10$HvfxBuzbgYrDcjKcIptRAep93XiKKt3mQH56hhGYUIlLdFkU28FZm', 'pegawai', NULL, '2021-10-25 23:49:47', '2021-10-25 23:49:47', NULL),
(52, 'Super Admin', 'admin@dpuprntn.com', NULL, '$2y$10$aEsL/VHFfpe9zBsZIetfVeQ7vcGlDGdmGv0uHwkf1oVBUdMMRk7ma', 'admin', NULL, '2021-10-26 00:00:22', '2021-10-26 00:00:22', NULL),
(56, 'Ilham Nuddin, ST', 'ilhamnuddin@dpuprntn.com', NULL, '$2y$10$T3Th4QTKe5tM.pbuFGhyxuU.bQSfBTkhE8VkmwBG9GYd73c3JQriy', 'pegawai', NULL, '2021-11-04 18:16:26', '2023-03-16 15:58:52', 'Cij5C1ggjoYH89eEdssXFrYg95PGfibNBm53LDds.jpg'),
(57, 'dev', 'dev@gmail.com', NULL, '$2y$10$4FKuBn.PG8qbMhgXEqYe0eSz7onqJxAAgcxTOawdMRce84Vnmm5h6', 'admin', NULL, '2021-12-21 11:26:00', '2021-12-21 11:26:00', NULL),
(58, 'Drs. H. Agus Supardi', 'agussupardi@dpuprntn.com', NULL, '$2y$10$ru.Q.IgGijJ4zHmgdfncxOi7dYYrY0Y.pME/uNUGJ3tm13K9fLE42', 'pegawai', NULL, '2022-01-07 09:22:51', '2022-02-06 21:47:52', NULL),
(59, 'Mei Lisa, A.Md', 'meilisa@dpuprntn.com', NULL, '$2y$10$SJgnsjJorHLBhCiI3oQZlOM5.4YdwCPfwT.G7UNriQV71c0LhEBru', 'pegawai', NULL, '2022-03-03 20:06:31', '2022-03-03 20:06:31', NULL),
(60, 'Rani Ananda Pratama, ST., M.A.P', 'raniap@dpuprntn.com', NULL, '$2y$10$kU02XV8py/htjOccn2S9ou8QxPeeX0OEDXRczxlHtVaMm2KNkm1Yu', 'pegawai', NULL, '2022-03-03 20:08:39', '2023-10-03 20:10:19', NULL),
(61, 'Fery Haryadi, A.Md', 'feryh@dpuprntn.com', NULL, '$2y$10$yQLv64YK/ITGMOGlo4FpbOQGBTJYL704VV9Wwh8y7Q1FwnuoAQjnG', 'pegawai', NULL, '2022-03-03 20:28:10', '2022-03-03 20:28:10', NULL),
(62, 'Marlisa, ST', 'marlisa@dpuprntn.com', NULL, '$2y$10$ZDUG7iKPZOzPdheu3clEJudWOcHthi8SY39Dn3AbT4ppM4.VWqPkK', 'pegawai', NULL, '2022-03-03 20:28:41', '2022-03-03 20:28:41', NULL),
(63, 'Yana Pebrianti, ST', 'yanap@dpuprntn.com', NULL, '$2y$10$tKHCAQMuJOF5gR5aPpa.3.XHwry8jF3E6kNrzKDSAvnvWZOfg1gJC', 'pegawai', NULL, '2022-03-03 20:36:05', '2022-03-03 20:36:05', NULL),
(64, 'Heri Kuswandi, ST', 'herikuswandi@dpuprntn.com', NULL, '$2y$10$U.iJ/LEK8Qd5CAy01/ajYevt7hh8xjLX/46jXABvHd.S1/lWqjY8G', 'pegawai', NULL, '2022-03-03 20:37:18', '2022-03-03 20:37:18', NULL),
(65, 'Raja Asyuro Idi, ST', 'rajaasyuro@dpuprntn.com', NULL, '$2y$10$vbm.BXlflFurypGd5TfZCeKgLlH69ERO2cX.v.mtLJvu.cqbYh9em', 'pegawai', NULL, '2022-03-03 20:38:06', '2022-03-03 20:38:06', NULL),
(66, 'Ahamidi, ST', 'ahamidi@dpuprntn.com', NULL, '$2y$10$I9G92apEsA2614ftpCxxGeEJqSmmsbzBMunvAL4n9aK8JrWUKmfza', 'pegawai', NULL, '2022-04-18 20:43:17', '2022-04-18 20:43:17', NULL),
(67, 'David Abdi, A.Md', 'davidabdi@dpuprntn.com', NULL, '$2y$10$PyOXaHSNL/uHVHM9CiJq2evJdkN1JOFOl8RuyyoZ2EZyXkBpU34rq', 'pegawai', NULL, '2022-04-19 18:46:35', '2022-04-19 18:46:35', NULL),
(68, 'TJITJO MASYHUR MALAMO SYAH, ST', 'tjitjo@dpuprntn.com', NULL, '$2y$10$np.mWRA.kEjADDYZ7ouPBeClumu2NfFWbzJgNiMpFoFmBOji9L2La', 'pegawai', NULL, '2022-04-19 23:50:02', '2022-04-19 23:50:02', NULL),
(69, 'Layla Rahmatullah, ST', 'laylarahmahtullah@dpuprntn.com', NULL, '$2y$10$3iumWW1L/jZ7QKYDK1MU..kYwbWtkxIwDAEvdGGO3Qz3fJtMiEPam', 'pegawai', NULL, '2022-05-31 00:15:10', '2022-05-31 00:15:10', NULL),
(71, 'Efendi, S.A.P', 'efendi@dpuprntn.com', NULL, '$2y$10$PL5HW0NuhBSsVmyKzi7Zs.QuGkfDgXJqVnNBBsYkWMzQZu6zU3Mmm', 'pegawai', NULL, '2022-08-22 01:32:39', '2022-08-22 01:32:39', NULL),
(72, 'Mulyawati, ST', 'mulyawati@dpupr.com', NULL, '$2y$10$nSbxCI2zahNiCWJ8dutKD.4AofIDFHZmfoCVjsrLYbcMKz2.Fkm0e', 'pegawai', NULL, '2022-08-30 21:01:24', '2023-10-03 20:04:51', NULL),
(73, 'Yolanda Anggraini, ST', 'yolandaa@dpuprntn.com', NULL, '$2y$10$3yn330C8eMQd97HSykC3fu0SfHsMM7RpuUWAHduABgSiv4TXDzQhW', 'pegawai', NULL, '2022-08-30 21:03:29', '2023-10-03 19:36:47', NULL),
(75, 'Monalisa, ST', 'monalisa@dpuprntn.com', NULL, '$2y$10$bPS3Q9aNYDwGvfU0jR26Xe50B4HC7MidGCZ7WmpxEWtUVnnmxfk92', 'pegawai', NULL, '2022-09-12 20:20:36', '2022-09-12 20:20:36', NULL),
(76, 'Ryannaldo, S.T', 'ryannaldo@dpupr.com', NULL, '$2y$10$p7AMBkTg8OzWkiaZyjg.q.m8bb6WcELsjHVn7tiBjPFFyGrO7ySe6', 'pegawai', NULL, '2023-10-03 19:29:49', '2023-10-03 19:29:49', NULL),
(77, 'Rio Firdaus, S.T', 'rio.firdaus@dpupr.com', NULL, '$2y$10$MYGgO1XarG5yJQSEU2/5R.1HCCMpODJxaFL3RD1CeJqSVFcf.VDRS', 'pegawai', NULL, '2023-10-03 20:46:37', '2023-10-03 20:46:37', NULL),
(78, 'Fazimar, SE', 'fazimar@natunakab.go.id', NULL, '$2y$10$qhSVlrPOE8AGMZktzUM6j.q46yiF1rWOTDccew8QfD3GSX7KMuPDu', 'pegawai', NULL, '2024-04-22 21:16:28', '2024-04-22 21:16:28', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ekgbs`
--
ALTER TABLE `ekgbs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kgbs`
--
ALTER TABLE `kgbs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ekgbs`
--
ALTER TABLE `ekgbs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kgbs`
--
ALTER TABLE `kgbs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
