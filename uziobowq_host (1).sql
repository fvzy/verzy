-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 02 Nov 2022 pada 14.33
-- Versi server: 10.2.44-MariaDB-log-cll-lve
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uziobowq_host`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bentancoder_loaithe`
--

CREATE TABLE `bentancoder_loaithe` (
  `id` int(11) NOT NULL,
  `code` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `value` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `loaithe` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `ck` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `time` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data untuk tabel `bentancoder_loaithe`
--

INSERT INTO `bentancoder_loaithe` (`id`, `code`, `value`, `loaithe`, `ck`, `time`, `status`) VALUES
(13, '8373', '2', 'MOBIFONE', '10', '03:54 03-04-2022', 'ON'),
(14, '1312', '3', 'VINAPHONE', '10', '03:54 03-04-2022', 'ON'),
(15, '7393', '1', 'VIETTEL', '9', '03:54 03-04-2022', 'ON');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bentancoder_napthe`
--

CREATE TABLE `bentancoder_napthe` (
  `id` int(11) NOT NULL,
  `seri` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `pin` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `loaithe` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `menhgia` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `thucnhan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `request_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `time` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ds_host`
--

CREATE TABLE `ds_host` (
  `id` int(11) NOT NULL,
  `ten` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `gia` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `giadaily` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `dung_luong` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `mien_khac` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `bi_danh` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `server` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `note` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `urlgoihost` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ds_host`
--

INSERT INTO `ds_host` (`id`, `ten`, `gia`, `giadaily`, `dung_luong`, `mien_khac`, `bi_danh`, `server`, `note`, `urlgoihost`) VALUES
(6, 'Ph6', '50000', NULL, NULL, NULL, NULL, 'Singapore', '<p>unlimited all</p>\r\n', 'gift');

-- --------------------------------------------------------

--
-- Struktur dari tabel `khocode`
--

CREATE TABLE `khocode` (
  `id` int(11) NOT NULL,
  `img` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `noidung` varchar(10000) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `gia` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `link` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `khocode`
--

INSERT INTO `khocode` (`id`, `img`, `title`, `noidung`, `gia`, `link`) VALUES
(8, 'https://telegra.ph/file/dea0538d264a1456821a1.jpg', 'Test Ngehe', '<p>Ngetes Web Dengan Whatsapp Gateway</p>\r\n', '15000', 'https://ditzzsenpai.wtf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lich_su_mua_code`
--

CREATE TABLE `lich_su_mua_code` (
  `id` int(11) NOT NULL,
  `trans_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `link` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `time` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `loaicode` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `gia` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lich_su_mua_code`
--

INSERT INTO `lich_su_mua_code` (`id`, `trans_id`, `username`, `link`, `time`, `status`, `loaicode`, `gia`) VALUES
(1, '5650', 'admin', 'https://itzditzzy.ga/user', '01:06 19-10-2022', 'hoantat', 'uu', '39'),
(4, '3995', 'admin', 'https://wa.me/628988293493', '01:18 21-10-2022', 'hoantat', 'Sc Web P', '10000'),
(5, '9330', 'admin', 'https://wa.me/628988293493', '05:30 30-10-2022', 'hoantat', 'Sc Web P', '10000'),
(6, '4291', 'admin', 'https://wa.me/628988293493', '05:33 30-10-2022', 'hoantat', 'Sc Web P', '10000'),
(7, '8450', 'admin', 'https://wa.me/628988293493', '05:35 30-10-2022', 'hoantat', 'Sc Web P', '10000'),
(8, '7349', 'admin', 'https://wa.me/628988293493', '05:39 30-10-2022', 'hoantat', 'Sc Web P', '10000'),
(9, '8436', 'admin', 'https://ditzzsenpai.wtf', '07:09 30-10-2022', 'hoantat', 'Test Ngehe', '15000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lich_su_mua_hosting`
--

CREATE TABLE `lich_su_mua_hosting` (
  `id` int(11) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `gia` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `tk_host` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `mk_host` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `ngay_mua` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `ngay_het` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `ns1` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `ns2` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `time` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `emailuser` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `goi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `linklogin` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `tenmien` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `server` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lich_su_mua_hosting`
--

INSERT INTO `lich_su_mua_hosting` (`id`, `username`, `gia`, `tk_host`, `mk_host`, `ngay_mua`, `ngay_het`, `ns1`, `ns2`, `status`, `note`, `time`, `emailuser`, `goi`, `linklogin`, `tenmien`, `server`) VALUES
(13, 'admin', '0', 'abc1666288667', 'nefzz1666326591', '1666288679', '1668880679', 'ns1.wibunesia.site', 'ns2.wibunesia.site', 'hoantat', 'Đang Hoạt Động', 'cpanel', 'hi@nefftzy.dev', 'wibunesi_wibu', ':2083', 'tesste.me', 'Singapore'),
(14, 'admin', '0', 'abc1666289550', 'nefzz1666312882', '1666289559', '1668881559', 'ns1.wibunesia.site', 'ns2.wibunesia.site', 'xoa', 'Bị User Xóa', 'cpanel', 'hi@nefftzy.dev', 'wibunesi_wibu', 'https://s1-ams.serversystems.eu:2083', 'hipxz.me', 'Singapore'),
(15, 'admin', '50000', 'vusr1667185126', 'vpass1667270162', '1667185128', '1669777128', 'ns1.example.com', 'ns2.example.com', 'hoantat', 'Active', 'cpanel', 'linaresfarensky@gmail.com', 'Mwhm Super', 'https://ferhostlive.viprz.my.id:2083', 'tesszzz5.my', 'Singapore'),
(16, 'admin', '50000', 'vusr1667188683', 'vpass1667283505', '1667188683', '1669780683', 'ns1.example.com', 'ns2.example.com', 'hoantat', 'Active', 'cpanel', 'linaresfarensky@gmail.com', 'Mwhm Super', 'https://ferhostlive.viprz.my.id:2083', 'konzpoz.me', 'Singapore'),
(17, 'admin', '50000', 'vusr1667377836', 'vpass1667455344', '1667377838', '1669969838', 'ns1.example.com', 'ns2.example.com', 'hoantat', 'Active', 'cpanel', 'linaresfarensky@gmail.com', 'gift', 'https://srv10159.epyc.dedi.server-hosting.expert:2083', 'koza.info', 'Singapore');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_login`
--

CREATE TABLE `log_login` (
  `id` int(11) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `content` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `time` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `log_login`
--

INSERT INTO `log_login` (`id`, `username`, `content`, `time`) VALUES
(13, 'admin', 'Login to the IP system (125.164.23.80, 172.70.189.28, 125.164.23.80).', '03:18 30-10-2022'),
(14, 'admin', 'Login to the IP system (125.164.21.146, 172.70.92.153, 125.164.21.146).', '04:24 30-10-2022'),
(15, 'admin', 'Login to the IP system (125.164.21.146, 162.158.171.22, 125.164.21.146).', '04:31 30-10-2022'),
(16, 'admin', 'Login to the IP system (125.164.17.133, 172.70.92.239, 125.164.17.133).', '04:51 30-10-2022'),
(17, 'admin', 'Login to the IP system (125.164.17.133, 172.70.93.7, 125.164.17.133).', '05:29 30-10-2022'),
(18, 'admin', 'Login to the IP system (125.164.17.133, 172.70.93.7, 125.164.17.133).', '05:31 30-10-2022'),
(19, 'admin', 'Login to the IP system (125.164.17.133, 162.158.171.10, 125.164.17.133).', '07:04 30-10-2022'),
(20, 'admin', 'Login to the IP system (125.164.16.218, 172.70.92.239, 125.164.16.218).', '07:08 30-10-2022'),
(21, 'admin', 'Login to the IP system (125.164.23.80, 172.70.188.13, 125.164.23.80).', '07:58 30-10-2022'),
(22, 'admin', 'Login to the IP system (139.99.47.232, 162.158.162.247, 139.99.47.232).', '08:03 30-10-2022'),
(23, 'admin', 'Login to the IP system (125.164.22.216).', '07:17 31-10-2022'),
(24, 'admin', 'Login to the IP system (139.99.47.232).', '09:58 31-10-2022'),
(25, 'admin', 'Login to the IP system (125.164.17.133).', '10:56 31-10-2022'),
(26, 'admin', 'Login to the IP system (125.164.17.133).', '10:57 31-10-2022'),
(27, 'admin', 'Login to the IP system (36.72.53.61, 162.158.171.10, 36.72.53.61).', '03:23 02-11-2022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nhdright_momo`
--

CREATE TABLE `nhdright_momo` (
  `id` int(11) NOT NULL,
  `uid` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `magd` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `sotien` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `code` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `loai` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `note` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `time` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nhdright_tsr`
--

CREATE TABLE `nhdright_tsr` (
  `id` int(11) NOT NULL,
  `cuphap` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `noidungnap` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `code` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `sotien` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `time` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `seri` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `noidung` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `loaithe` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `uid` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `ten_web` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `logo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `favicon` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `mo_ta` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `telegram` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `whatsapp` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `thongbao` varchar(10000) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `esmtp` text NOT NULL,
  `momo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `website` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `website_tinnhan` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `thongbao_napmomo` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `status_muahost` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `status_napthe` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `status_napmomo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `apikey_momo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `status_naptsr` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `passemail` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `partner_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `partner_key` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `color` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `trangthaimua` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `botnotif` text DEFAULT NULL,
  `apikeybot` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`id`, `ten_web`, `logo`, `favicon`, `mo_ta`, `telegram`, `whatsapp`, `thongbao`, `email`, `esmtp`, `momo`, `website`, `website_tinnhan`, `thongbao_napmomo`, `status_muahost`, `status_napthe`, `status_napmomo`, `apikey_momo`, `status_naptsr`, `passemail`, `partner_id`, `partner_key`, `color`, `trangthaimua`, `botnotif`, `apikeybot`) VALUES
(1, 'Verzy', '', 'https://telegra.ph/file/dea0538d264a1456821a1.jpg', 'Website sedang dalam development, Mungkin ada beberapa bug', 'zeccto', '628988293493', '<p><strong>Website Telah Migrasi dari php 5.6 ke 7.4, Jadi sekarang script ini support di php 5.6 dan 7.4, jika kamu menemukan bug kamu dapat chat saya di whatsapp&nbsp;</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Arigatouu~~</strong></p>\r\n', '', '', '', '', '', '<p>Vui l&ograve;ng nhập đ&uacute;ng nội dung&nbsp;để nạp auto !</p>\r\n', 'ON', 'ON', 'ON', '', 'ON', '', '4036241346', '38eca38944a953dac84d165afb689613', '#d4a5d9', '0', '6281313599427', 'gJ2umRykB6Y8D66YRuME59oK9OsAZP');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `pass2` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `level` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `tong_nap` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `money` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `bannd` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `time` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `ip` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `phone` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `api_key` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `callback_host` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `callback_domain` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `bentancoder` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `pass2`, `email`, `level`, `tong_nap`, `money`, `bannd`, `time`, `ip`, `phone`, `api_key`, `callback_host`, `callback_domain`, `bentancoder`) VALUES
(2, 'admin', 'Ditzzy', '', 'hi@nefftzy.dev', '810', '0', '224883', '0', '08:29 18-10-2022', '118.96.249.224', '628988293493', 'yz3pKOLUwf4hW6guPNVRG7CFMiBTrQcv', NULL, NULL, '1666099785');

-- --------------------------------------------------------

--
-- Struktur dari tabel `whmacct`
--

CREATE TABLE `whmacct` (
  `ip` text NOT NULL,
  `hostname` text NOT NULL,
  `ns1` text DEFAULT NULL,
  `ns2` text DEFAULT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `whmacct`
--

INSERT INTO `whmacct` (`ip`, `hostname`, `ns1`, `ns2`, `username`, `password`) VALUES
('ip', 'pakai https ya contoh - https://cp.verzy.my.id', 'ns1', 'ns2', 'user', 'pw');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bentancoder_loaithe`
--
ALTER TABLE `bentancoder_loaithe`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bentancoder_napthe`
--
ALTER TABLE `bentancoder_napthe`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ds_host`
--
ALTER TABLE `ds_host`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `khocode`
--
ALTER TABLE `khocode`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lich_su_mua_code`
--
ALTER TABLE `lich_su_mua_code`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lich_su_mua_hosting`
--
ALTER TABLE `lich_su_mua_hosting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `log_login`
--
ALTER TABLE `log_login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nhdright_momo`
--
ALTER TABLE `nhdright_momo`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nhdright_tsr`
--
ALTER TABLE `nhdright_tsr`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bentancoder_loaithe`
--
ALTER TABLE `bentancoder_loaithe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `bentancoder_napthe`
--
ALTER TABLE `bentancoder_napthe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `ds_host`
--
ALTER TABLE `ds_host`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `khocode`
--
ALTER TABLE `khocode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `lich_su_mua_code`
--
ALTER TABLE `lich_su_mua_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `lich_su_mua_hosting`
--
ALTER TABLE `lich_su_mua_hosting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `log_login`
--
ALTER TABLE `log_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `nhdright_momo`
--
ALTER TABLE `nhdright_momo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `nhdright_tsr`
--
ALTER TABLE `nhdright_tsr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
