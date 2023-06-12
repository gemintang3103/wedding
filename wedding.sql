-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 01 Jun 2023 pada 14.13
-- Versi server: 5.7.36
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wedding`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(150) NOT NULL,
  `username_admin` varchar(150) NOT NULL,
  `password_admin` varchar(150) NOT NULL,
  `email_admin` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username_admin`, `password_admin`, `email_admin`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.com', '2017-02-21 04:14:16', '2017-03-06 13:42:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ci_session`
--

CREATE TABLE `ci_session` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) NOT NULL,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `ci_session`
--

INSERT INTO `ci_session` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('0i1omvqlrkopldpftspeks9h8tfttp25', '::1', 1685461237, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353436313233373b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('10i30u6m4kkng7kp18q07vk0p11vqsf2', '::1', 1685460190, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353436303139303b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('11hneh6ih36q19ia5h1es3afsv952fc1', '::1', 1685463437, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353436333433373b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('2b9gvo39bc5edj3bq7hlt5lkho9jpo0a', '::1', 1685458796, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353435383739363b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('2h7lrnj0anevsvddlsgatrlmmgqii6p4', '::1', 1685465978, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353436353936333b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('2p1psina8irv0tn5tjtjv8sdjthbuid6', '::1', 1685626122, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353632363039353b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('2pe3qq84g31jujtcs24qou0h5d5r552j', '127.0.0.1', 1685589698, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353538393639383b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('37ln6jprepne5qjvpcofkukpt266qtmc', '::1', 1685622804, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353632323830343b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('438sj8t9us7f1e7qjhguh7ub45n1id2e', '127.0.0.1', 1685592317, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353539323331373b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('4bagd9a2dqmtcr7lfjujaupuelilr70b', '127.0.0.1', 1685592976, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353539323937363b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('4nn228r6j0sevpdis2fv15t5a97uhn89', '::1', 1685622503, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353632323530333b),
('4qn92v332sqvpr7jbedpbatt9k9c2kfu', '::1', 1685458490, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353435383439303b),
('50ddq8f9fpg2v0dik31uhbhhvt487deg', '127.0.0.1', 1685597787, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353539373738373b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('68rfk939rgv0vokrtksc142mr2977tp0', '::1', 1685624292, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353632343239323b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b6d73677c733a3137363a223c64697620636c6173733d22756b2d616c6572742d737563636573732220756b2d616c6572743e0d0a202020200909093c6120636c6173733d22756b2d616c6572742d636c6f73652220756b2d636c6f73653e3c2f613e0d0a202020200909093c703e546572696d61206b6173696820616e6461207375646168206b6f6e6669726d6173692064616e206d656e676973692055636170616e2026616d703b20446f613c2f703e0d0a09093c2f6469763e223b5f5f63695f766172737c613a313a7b733a333a226d7367223b733a333a226e6577223b7d),
('6hpggeccu3t5st7o66lprffa7m34na0i', '127.0.0.1', 1685457077, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353435373031363b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('6nljcc8qbe21emdqtr5pban8okoeambj', '127.0.0.1', 1685591321, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353539313332313b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('75vhm3qgpd03bp4espra856s627l7k7n', '::1', 1685459863, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353435393836333b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('8jsaeqo46ugcua4uik5vkuvospik9a6e', '::1', 1685622077, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353632323037373b),
('8omrclqj37hgpo4a2lhh19h7bhb0p9lg', '::1', 1685460741, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353436303734313b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('90jsrkc7adcuksus82fnp67g44lil16a', '127.0.0.1', 1685597467, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353539373436373b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('9ld6l2433f0mhn4h4mcht4k1rdbotjl5', '127.0.0.1', 1685588911, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353538383931313b),
('9s6250s9ojcr3jt5v7c4vv00gmhmbk4l', '::1', 1685621334, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353632313333343b),
('adueemv36jimm8qfreqkgne59uele6rn', '::1', 1685624624, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353632343632343b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('blhjjcd9b8qncgrkfvf8k5ppm2q4kpn6', '127.0.0.1', 1685594144, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353539343134343b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('c3i748tl03d3adsk54uq6ttr4qvqh5sl', '127.0.0.1', 1685590996, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353539303939363b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('cjmcnj15kkjmnv8652vpifrt6ljo9aqe', '127.0.0.1', 1685598462, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353539383436323b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('cnqabs7u2iio4264rca8mansu53h1l4u', '::1', 1685461688, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353436313638383b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('ctvqbbum2bfmmn9kgr96ru05dd3f8j47', '127.0.0.1', 1685601578, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353630313537383b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('d8qlkdp6009nms29sln0k8hdv2m77krq', '127.0.0.1', 1685598090, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353539383039303b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('ep2lh7u756mutv9d72omjdi2qcq59q5p', '::1', 1685621714, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353632313731343b),
('euh9l8q3hnpkjt9aav9u6v6i6mbd7rup', '127.0.0.1', 1685591642, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353539313634323b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('f25vuli7cqg57pg843t8p2a0i951p4ck', '::1', 1685465257, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353436353235373b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('fda66fruu8i52ge1a2k4drdss035825b', '127.0.0.1', 1685457016, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353435373031363b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('h7k92b8td2qqur8mb9k563lugj0qecsq', '::1', 1685462980, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353436323938303b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('hddt05vm8o4r24lm3926vg23tiigfakd', '127.0.0.1', 1685591969, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353539313936393b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('hmu791apkilhm01icr5j7ftj2dhau02b', '::1', 1685464528, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353436343532383b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('i64hv8sg90etmaadh2927qkgv9gsgv8r', '127.0.0.1', 1685589186, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353538393138363b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('irro3d1vaj5cq151m3hp6j5ukq2ukgda', '::1', 1685625299, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353632353239393b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('jn1tr1819tuhjv8kpsgodq4s88hmmvms', '::1', 1685626095, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353632363039353b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('jvt8r9f4p2t8rstfpal71j9vvrip84bh', '::1', 1685624929, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353632343932393b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('kks0g5d0bkro2he9qfnbh1rhq1jpqvcs', '127.0.0.1', 1685593443, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353539333434333b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('l829im74orukup2qeqd64g1gtlv8avoj', '::1', 1685465963, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353436353936333b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('lcs9mi22v0f8f37bnbci60o6erotlqip', '127.0.0.1', 1685595070, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353539353037303b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('ljfna66le3q9lff9ranu6h7oepgh1eaq', '127.0.0.1', 1685590020, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353539303032303b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('mmog8ttevfkvhtk9vtn04c0lkbrbfvgu', '127.0.0.1', 1685456694, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353435363639343b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('n09frr9fskss7q0j2lehqev40nnvrdgm', '127.0.0.1', 1685593754, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353539333735343b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('n6o7kqcjesl5ktf54d1qqpcub4gu6b22', '127.0.0.1', 1685598767, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353539383736373b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('nh8ek8iusmlag0afq7ac9gcf9l0c4lmb', '::1', 1685457807, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353435373830373b),
('nrk5nftcag1ceb9o85nuj7e3o55fiakb', '::1', 1685464049, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353436343034393b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('o0sb7pbg83a2vrp545eka5q2p9rvh7qv', '127.0.0.1', 1685596413, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353539363431333b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('oasdjjobsglifq5d771cvotc82tb9r9g', '127.0.0.1', 1685596721, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353539363732313b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('p98jpmgmm35hcv61m7n8m28o8h30ltmd', '127.0.0.1', 1685456329, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353435363332393b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('pi6vqn11opevf1cioasfraeg3es1hr2u', '::1', 1685465626, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353436353632363b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('qeddehev3j508dea8mkacqsc7s6pob4q', '::1', 1685464859, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353436343835393b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('ql3i1093s0olv3r0b76692rl0ut54v8o', '127.0.0.1', 1685588773, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353538383737333b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('ruhv4qccr77amdntbt6th0la48ke0i4v', '::1', 1685463740, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353436333734303b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('tjaqrn32sfjar0njgc78paf5jfde5p2h', '127.0.0.1', 1685601578, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353630313537383b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('tqf41eel38910as9ocf4b4h6gjq32uho', '::1', 1685625692, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353632353639323b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('u1eaeuf2mjg5ukc74uqppv3bd8rkn7fn', '127.0.0.1', 1685596004, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353539363030343b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('u8shpjqh789i013o742rkbfhqv3pd0vp', '::1', 1685623187, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353632333138373b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('ucgna6e3nap7ejffuqg9jlrkpajj03bf', '127.0.0.1', 1685594621, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353539343632313b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b),
('v9rh6ncvl9o79ucq3kvp3r4gtook2gi6', '127.0.0.1', 1685597033, 0x5f5f63695f6c6173745f726567656e65726174657c693a313638353539373033333b69647c733a313a2231223b757365726e616d657c733a353a2261646d696e223b70617373776f72647c733a33323a223231323332663239376135376135613734333839346130653461383031666333223b6e616d617c733a31333a2241646d696e6973747261746f72223b);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hadir`
--

CREATE TABLE `hadir` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_orang` varchar(100) NOT NULL DEFAULT '',
  `tanggal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `hadir`
--

INSERT INTO `hadir` (`id`, `id_orang`, `tanggal`) VALUES
(1, '10003', '2023-06-01 20:27:14'),
(2, '10002', '2023-06-01 20:27:40'),
(3, '10001', '2023-06-01 20:27:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT '0',
  `is_private_key` tinyint(1) NOT NULL DEFAULT '0',
  `ip_addresses` text,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 1, '123123', 1, 0, 0, NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orang`
--

CREATE TABLE `orang` (
  `id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `nama` varchar(50) DEFAULT NULL,
  `nohp` varchar(50) DEFAULT NULL,
  `jenis_kelamin` enum('Pria','Wanita') DEFAULT NULL,
  `alamat` text,
  `email` varchar(255) DEFAULT NULL,
  `qr_code` varchar(50) DEFAULT NULL,
  `ucapan` text,
  `foto` varchar(100) DEFAULT NULL,
  `konfirmasi` enum('hadir','tidak-hadir','ragu-ragu') DEFAULT NULL,
  `grup` varchar(100) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `vip` varchar(50) DEFAULT NULL,
  `konfirmasi2` enum('Hadir','Tidak Bisa','Masih Dalam Pertimbangan') DEFAULT 'Masih Dalam Pertimbangan',
  `tgl_dibuat` datetime DEFAULT NULL,
  `tgl_diubah` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `orang`
--

INSERT INTO `orang` (`id`, `nama`, `nohp`, `jenis_kelamin`, `alamat`, `email`, `qr_code`, `ucapan`, `foto`, `konfirmasi`, `grup`, `link`, `vip`, `konfirmasi2`, `tgl_dibuat`, `tgl_diubah`) VALUES
(10001, 'andre', '088976971550', 'Pria', 'alamat', 'irwanrahmaditkj@gmail.com', 'images/qrcode/10001.png', 'Semoga Sakinah Mawaddah Warahmah', NULL, NULL, NULL, NULL, NULL, 'Hadir', '2023-05-29 22:28:59', NULL),
(10002, 'irwan', '092392929', 'Pria', 'alamat', 'irwan@gmail.com', 'images/qrcode/10002.png', 'Selamat Menempuh Hidup Baru', NULL, NULL, NULL, NULL, NULL, 'Hadir', '2023-05-29 23:04:42', NULL),
(10003, 'syukron', '088768592222', 'Pria', 'kjaksjdijiapwodpaw', 'syukron@gmail.com', 'images/qrcode/10003.png', 'Semoga Samawa dan Diberikan Keturunan yang Sholeh/Sholehah', NULL, NULL, NULL, NULL, NULL, 'Hadir', '2023-05-29 23:05:07', NULL),
(10004, 'Kitaro', '628123456789', 'Pria', 'Jl. Raya Banyumas No.1 ', 'kitaro@gmail.com', 'images/qrcode/10004.png', NULL, NULL, NULL, NULL, NULL, NULL, 'Masih Dalam Pertimbangan', '2023-06-01 12:52:27', NULL),
(10006, 'Kitaro', '628123456789', 'Pria', 'Jl. Raya Banyumas No.1 ', 'kitaro@gmail.com', 'images/qrcode/10006.png', NULL, NULL, NULL, NULL, NULL, NULL, 'Masih Dalam Pertimbangan', '2023-06-01 20:28:39', NULL),
(20005, 'Hana', '628125544880', 'Wanita', 'Purwokerto', 'hana@caraka.com', 'images/qrcode/20005.png', NULL, NULL, NULL, NULL, NULL, NULL, 'Masih Dalam Pertimbangan', '2023-06-01 12:52:27', NULL),
(20007, 'Hana', '628125544880', 'Wanita', 'Purwokerto', 'hana@caraka.com', 'images/qrcode/20007.png', NULL, NULL, NULL, NULL, NULL, NULL, 'Masih Dalam Pertimbangan', '2023-06-01 20:28:39', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id` int(11) NOT NULL,
  `nama_web` varchar(30) NOT NULL,
  `nama_pengantin` varchar(40) NOT NULL,
  `tempat_tanggal` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(100) NOT NULL,
  `img_background` varchar(255) DEFAULT NULL,
  `email_from` varchar(255) DEFAULT NULL,
  `email_cc` varchar(255) DEFAULT NULL,
  `smtp_host` varchar(255) DEFAULT NULL,
  `smtp_port` varchar(255) DEFAULT NULL,
  `smtp_user` varchar(255) DEFAULT NULL,
  `smtp_pass` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `nama_web`, `nama_pengantin`, `tempat_tanggal`, `alamat`, `foto`, `img_background`, `email_from`, `email_cc`, `smtp_host`, `smtp_port`, `smtp_user`, `smtp_pass`, `updated_at`) VALUES
(1, 'The Wedding', 'Andika & Dyah', 'ASTON PURWOKERTO, 24 Desember 2021', 'Hotel Aston Purwokerto. Jl. Overste Isdiman No.33, Glempang, Bancarkembar, Kec. Purwokerto Utara, Kabupaten Banyumas, Jawa Tengah', 'images/953f60c7dc7efaf0b777eb48d8996dfe.jpg', 'images/05dfcdcc6b6e0fa73eba9947326c00c8.jpg', 'hariwicaksono87@gmail.com', '', 'ssl://smtp.gmail.com', '465', 'your@yourcompany.co.id', 'yourpassword', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `undangan`
--

CREATE TABLE `undangan` (
  `id` int(11) NOT NULL,
  `nama_pria` varchar(50) NOT NULL,
  `nama_panggilan_pria` varchar(50) NOT NULL,
  `nama_ibu_pria` varchar(50) NOT NULL,
  `nama_ayah_pria` varchar(50) NOT NULL,
  `nama_wanita` varchar(50) NOT NULL,
  `nama_panggilan_wanita` varchar(50) NOT NULL,
  `nama_ibu_wanita` varchar(50) NOT NULL,
  `nama_ayah_wanita` varchar(50) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `maps` text,
  `video` text,
  `kunci` varchar(100) NOT NULL,
  `salam_pembuka` text NOT NULL,
  `backsound` varchar(255) DEFAULT NULL,
  `tanggal_akad` varchar(50) NOT NULL,
  `jam_akad` varchar(50) NOT NULL,
  `tempat_akad` varchar(100) NOT NULL,
  `alamat_akad` text NOT NULL,
  `tanggal_resepsi` varchar(50) NOT NULL,
  `jam_resepsi` varchar(50) NOT NULL,
  `tempat_resepsi` varchar(100) NOT NULL,
  `alamat_resepsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `undangan`
--

INSERT INTO `undangan` (`id`, `nama_pria`, `nama_panggilan_pria`, `nama_ibu_pria`, `nama_ayah_pria`, `nama_wanita`, `nama_panggilan_wanita`, `nama_ibu_wanita`, `nama_ayah_wanita`, `updated_at`, `maps`, `video`, `kunci`, `salam_pembuka`, `backsound`, `tanggal_akad`, `jam_akad`, `tempat_akad`, `alamat_akad`, `tanggal_resepsi`, `jam_resepsi`, `tempat_resepsi`, `alamat_resepsi`) VALUES
(1, 'Andika Perkasa', 'Andika', 'Sri Mulyani', 'Perkasa', 'Dyah Erwiany', 'Dyah', 'Megawati', 'Soekarno', '2021-12-08 19:48:46', NULL, NULL, '', 'Assalamu\'alaikum warahmatullahi wabarakatuh\r\n\r\nDengan memohon rahmat dan ridho Allah SWT, Kami akan menyelenggarakan resepsi pernikahan Putra-Putri kami :', 'assets/sound/music.mp3', '2021-12-11', '08:00', 'KUA', 'Purwokerto', '2021-12-11', '11:00', 'HOTEL ASTON PURWOKERTO', 'Purwokerto');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_hadir`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_hadir` (
`nama` varchar(50)
,`tanggal` datetime
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_konfirmasi`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_konfirmasi` (
`id` int(11) unsigned
,`nama` varchar(50)
,`konfirmasi2` enum('Hadir','Tidak Bisa','Masih Dalam Pertimbangan')
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_rekaphadir`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_rekaphadir` (
`Hadir` bigint(21)
,`Absen` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_rekapkonfirmasi`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_rekapkonfirmasi` (
`Hadir` bigint(21)
,`Tidak_Bisa` bigint(21)
,`Masih_Pertimbangan` bigint(21)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `v_hadir`
--
DROP TABLE IF EXISTS `v_hadir`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_hadir`  AS SELECT `orang`.`nama` AS `nama`, `hadir`.`tanggal` AS `tanggal` FROM (`orang` join `hadir`) WHERE (`orang`.`id` = `hadir`.`id_orang`) GROUP BY `hadir`.`id``id`  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_konfirmasi`
--
DROP TABLE IF EXISTS `v_konfirmasi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_konfirmasi`  AS SELECT `orang`.`id` AS `id`, `orang`.`nama` AS `nama`, `orang`.`konfirmasi2` AS `konfirmasi2` FROM `orang``orang`  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_rekaphadir`
--
DROP TABLE IF EXISTS `v_rekaphadir`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_rekaphadir`  AS SELECT (select count(distinct `hadir`.`id_orang`) from `hadir`) AS `Hadir`, (select count(`orang`.`id`) from `orang` where (not(`orang`.`id` in (select `hadir`.`id_orang` from `hadir`)))) AS `Absen``Absen`  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_rekapkonfirmasi`
--
DROP TABLE IF EXISTS `v_rekapkonfirmasi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_rekapkonfirmasi`  AS SELECT (select count(0) from `orang` where (`orang`.`konfirmasi2` = 'Hadir')) AS `Hadir`, (select count(0) from `orang` where (`orang`.`konfirmasi2` = 'Tidak Bisa')) AS `Tidak_Bisa`, (select count(0) from `orang` where (`orang`.`konfirmasi2` = 'Masih Dalam Pertimbangan')) AS `Masih_Pertimbangan``Masih_Pertimbangan`  ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `ci_session`
--
ALTER TABLE `ci_session`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hadir`
--
ALTER TABLE `hadir`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tanggal` (`tanggal`);

--
-- Indeks untuk tabel `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orang`
--
ALTER TABLE `orang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `undangan`
--
ALTER TABLE `undangan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `hadir`
--
ALTER TABLE `hadir`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `undangan`
--
ALTER TABLE `undangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
