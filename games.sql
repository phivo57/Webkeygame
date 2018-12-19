-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 19, 2018 at 06:34 AM
-- Server version: 5.7.23
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `games`
--

-- --------------------------------------------------------

--
-- Table structure for table `ct_hoa_don`
--

DROP TABLE IF EXISTS `ct_hoa_don`;
CREATE TABLE IF NOT EXISTS `ct_hoa_don` (
  `ma_ct_hoa_don` int(11) NOT NULL AUTO_INCREMENT,
  `ma_hoa_don` int(11) NOT NULL,
  `ma_game` int(11) NOT NULL,
  `don_gia` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `tong_tien` int(11) NOT NULL,
  PRIMARY KEY (`ma_ct_hoa_don`),
  KEY `FK_cthd_game` (`ma_game`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ct_hoa_don`
--

INSERT INTO `ct_hoa_don` (`ma_ct_hoa_don`, `ma_hoa_don`, `ma_game`, `don_gia`, `so_luong`, `tong_tien`) VALUES
(9, 9, 1, 450000, 2, 900000),
(10, 10, 1, 450000, 2, 900000),
(11, 10, 2, 200000, 1, 200000),
(12, 11, 5, 450000, 1, 450000),
(13, 12, 5, 450000, 2, 900000),
(14, 12, 2, 200000, 1, 200000);

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

DROP TABLE IF EXISTS `games`;
CREATE TABLE IF NOT EXISTS `games` (
  `ma_game` int(11) NOT NULL AUTO_INCREMENT,
  `key_game` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ma_the_loai` int(11) NOT NULL,
  `ten_game` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `don_gia_nhap` int(11) NOT NULL,
  `don_gia_ban` int(11) NOT NULL,
  `mo_ta_tom_tat` varchar(955) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_ta_chi_tiet` varchar(955) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cau_hinh` varchar(888) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cau_hinh_yeu_cau` varchar(888) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ngay_nhap` date NOT NULL,
  `ma_trang_thai` int(11) NOT NULL,
  `hinh` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ma_game`),
  KEY `FK_game_loaigame` (`ma_the_loai`),
  KEY `FK_game_trangthai` (`ma_trang_thai`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`ma_game`, `key_game`, `ma_the_loai`, `ten_game`, `don_gia_nhap`, `don_gia_ban`, `mo_ta_tom_tat`, `mo_ta_chi_tiet`, `cau_hinh`, `cau_hinh_yeu_cau`, `ngay_nhap`, `ma_trang_thai`, `hinh`) VALUES
(1, 'ab12-56gv', 1, 'PlayerUnkown BattleGround', 300000, 450000, 'Bạn muốn sinh tồn, nhưng không muốn cày quá lâu, đây sẽ là sự lựa chọn tuyệt vời vì ...', 'Bạn muốn sinh tồn, nhưng không muốn cày quá lâu, đây sẽ là sự lựa chọn tuyệt vời vì game không chỉ sinh tồn mà còn là một loại game Battle Royale đang được sự ưa chuộng của mọi game. Bạn sẽ được thả trên một hòn đảo cùng với 100 người chơi khác. Bạn tìm đạn dược và máu để bắt đầu cuộc hành trình sống còn và trở thành người chơi cuôi cùng trên hòn đảo.', 'MINIMUM:\r\nRequires a 64-bit processor and operating system\r\nOS: 64-bit Windows 7, Windows 8.1, Windows 10\r\nProcessor: Intel Core i5-4430 / AMD FX-6300\r\nMemory: 8 GB RAM\r\nGraphics: NVIDIA GeForce GTX 960 2GB / AMD Radeon R7 370 2GB\r\nDirectX: Version 11\r\nNetwork: Broadband Internet connection\r\nStorage: 30 GB available space', 'Requires a 64-bit processor and operating system\r\nOS: 64-bit Windows 7, Windows 8.1, Windows 10\r\nProcessor: Intel Core i5-6600K / AMD Ryzen 5 1600\r\nMemory: 16 GB RAM\r\nGraphics: NVIDIA GeForce GTX 1060 3GB / AMD Radeon RX 580 4GB\r\nDirectX: Version 11\r\nNetwork: Broadband Internet connection\r\nStorage: 30 GB available space', '2018-11-27', 1, 'images/pubg/pubg_2.jpg'),
(2, '8749dfgh-249dth', 2, 'Company of hero 2', 60000, 200000, 'Lấy bối cảnh chiến tranh thế giới thứ 2 , trò chơi sễ cho ta thấy góc nhìn chân thực về thế chiến ...', 'Lấy bối cảnh chiến tranh thế giới thứ 2 , trò chơi sễ cho ta thấy góc nhìn chân thực về thế chiến. Game mô phỏng chi tiết về thế chiến được đánh giá 9/10 về hình ảnh và cả lối chơi chiến thuật.', 'Minimum:\r\nMemory: 2GB RAM\r\nProcessor: 2Ghz Intel Core2 Duo or equivalent\r\nGraphics: 512MB Direct3D 10 capable video card (GeForce 8800 GT or Radeon HD 2900XT)\r\nOS: 32bit Vista\r\nInternet: Broadband Internet connection\r\nHard Drive: 30GB free Hard disc space', 'Recommended:\r\nMemory: 4GB RAM\r\nProcessor: 3Ghz Intel i5 quad core or equivalent\r\nGraphics: 1024 MB Direct3D 11 capable video card (GeForce GTX 470 or Radeon HD 5850)\r\nOS: 64bit Windows 7 and above\r\nInternet: Broadband Internet connection\r\nHard Drive: 30GB free Hard disc space', '2018-11-01', 1, 'images/coh/coh_1.jpg'),
(3, 'gaw423-54vxx', 4, 'izbot', 22000, 120000, 'một chú robot tìm cách thoát khỏi những thử thách ...', 'một chú robot tìm cách thoát khỏi những thử thách đầy khó khăn với lối chơi 2D và nhiều màng chơi khác nhau sẽ đưa bạn đến những thử thách chưa từng gặp và giải trí sau một ngày mệt mỏi.', 'MINIMUM:\r\nOS: Windows Vista or Later\r\nProcessor: Intel Core™ Duo or faster\r\nMemory: 2 GB RAM\r\nStorage: 100 MB available space\r\nAdditional Notes: Gamepad highly recommended', '', '2018-11-01', 3, 'images/iz/iz_3.jpg'),
(4, '3218s-hv36x', 3, 'Monster Hunter World', 350000, 450000, 'Sau hơn 5 năm, cuối cùng capcom đã ra siêu phẩm tiếp theo seri monster hunter của mình ...', 'Sau hơn 5 năm, cuối cùng capcom đã ra siêu phẩm tiếp theo seri monster hunter của mình. Hơn cả mong đợi, MHW đã mang đên sự thỏa mãn cho người chơi. Lối chơi thuần của seri MHW và thêm 2 vũ khí mới đây sẽ là lựa chọn không hề sai với tất cả các fan hâm mộ của seri Monster hunter.', 'MINIMUM:\r\nRequires a 64-bit processor and operating system\r\nOS: WINDOWS® 7, 8, 8.1, 10 (64-bit required)\r\nProcessor: Intel® Core™ i5-4460, 3.20GHz or AMD FX™-6300\r\nMemory: 8 GB RAM\r\nGraphics: NVIDIA® GeForce® GTX 760 or AMD Radeon™ R7 260x (VRAM 2GB)\r\nDirectX: Version 11\r\nNetwork: Broadband Internet connection\r\nStorage: 20 GB available space\r\nSound Card: DirectSound (DirectX® 9.0c)\r\nAdditional Notes: 1080p/30fps when graphics settings are set to \"Low\"', 'RECOMMENDED:\r\nRequires a 64-bit processor and operating system\r\nOS: WINDOWS® 7, 8, 8.1, 10 (64-bit required)\r\nProcessor: Intel® Core™ i7 3770 3.4GHz or Intel® Core™ i3 8350 4GHz or AMD Ryzen™ 5 1500X\r\nMemory: 8 GB RAM\r\nGraphics: NVIDIA® GeForce® GTX 1060 (VRAM 3GB) or AMD Radeon™ RX 570 (VRAM 4GB)\r\nDirectX: Version 11\r\nNetwork: Broadband Internet connection\r\nStorage: 20 GB available space\r\nSound Card: DirectSound (DirectX® 9.0c or better)\r\nAdditional Notes: 1080p/30fps when graphics settings are set to \"High\"', '2018-11-01', 2, 'images/mhw/mhw_4.jpeg'),
(5, 'hagr1-8fa4', 3, 'TOM CLANCY\'S RAINBOW SIX® SIEGE', 320000, 450000, 'Game bắn súng chiến thuật đỉnh cao của mọi người. Cứ nghỉ game bắn súng là chỉ chạy...', 'Game bắn súng chiến thuật đỉnh cao của mọi người. Cứ nghỉ game bắn súng là chỉ chạy và bắn, chỉ cần nhanh và chính xác không cần chiến thuật. Vậy thì bạn đã sai, với Rainbow six thì một trận đấu 5vs5 sẽ cần kỳ gây căng thẳng cho bạn. Sự phối hợp của đồng đội và các giữa class rất quan trọng trong Rainbow six.', 'MINIMUM:\r\nOS: Windows 7, Windows 8.1, Windows 10 (64bit versions required)\r\nProcessor: Intel Core i3 560 @ 3.3 GHz or AMD Phenom II X4 945 @ 3.0 GHz\r\nMemory: 6 GB RAM\r\nGraphics: NVIDIA GeForce GTX 460 or AMD Radeon HD 5870 (DirectX-11 compliant with 1GB of VRAM)\r\nNetwork: Broadband Internet connection\r\nStorage: 61 GB available space\r\nSound Card: DirectX® 9.0c compatible sound card with latest drivers\r\nAdditional Notes: SUPPORTED VIDEO CARDS AT TIME OF RELEASE: GeForce GTX 460 or better, GTX 560 or better, GTX 650 or better, GTX 750 or better, or any card from the GT900 and Titan Series, Radeon HD5870 or better, HD6870 or better, HD7770 or better, R7 260X or better, or any card from the R-300 series and Fury X. Laptop models of these cards may work but are not supported. These chipsets are the only ones that will run this game. ', 'RECOMMENDED:\r\nOS: Windows 7 SP1, Windows 8.1, Windows 10 (64bit versions required)\r\nProcessor: Intel Core i5-2500K @ 3.3 GHz or better or AMD FX-8120 @ 3.1 Ghz or better\r\nMemory: 8 GB RAM\r\nGraphics: NVIDIA GeForce GTX 670 (or GTX 760 / GTX 960) or AMD Radeon HD 7970 (or R9 280x [2GB VRAM] / R9 380 / Fury X)\r\nNetwork: Broadband Internet connection\r\nStorage: 61 GB available space\r\nSound Card: DirectX® 9.0c compatible sound card 5.1 with latest drivers\r\nAdditional Notes: SUPPORTED VIDEO CARDS AT TIME OF RELEASE: GeForce GTX 460 or better, GTX 560 or better, GTX 650 or better, GTX 750 or better, or any card from the GT900 and Titan Series, Radeon HD5870 or better, HD6870 or better, HD7770 or better, R7 260X or better, or any card from the R-300 series and Fury X. Laptop models of these cards may work but are not supported. These chipsets are the only ones that will run this game.', '2018-11-01', 3, 'images/r6/r6_1.jpg'),
(6, 'bcyj7-tme2y', 5, 'The Forest', 60000, 100000, 'Bạn bị rơi máy bay trên một hòn đảo, tất cả mọi thứ điều hư hỏng, bạn không thể liên lạc được với thế giới bên ngoài bạn chỉ ...', 'Bạn bị rơi máy bay trên một hòn đảo, tất cả mọi thứ điều hư hỏng, bạn không thể liên lạc được với thế giới bên ngoài bạn chỉ có một câu hỏi duy nhất, làm sao để sinh tồn? Cuộc phiêu lưu bắt đầu và bạn nhận ra bạn không một mình trên hòn đảo.', 'MINIMUM:\r\nOS: Windows 7\r\nProcessor: Intel Dual-Core 2.4 GHz\r\nMemory: 4 GB RAM\r\nGraphics: NVIDIA GeForce 8800GT\r\nDirectX: Version 9.0\r\nStorage: 5 GB available space\r\nSound Card: DirectX®-compatible\r\nAdditional Notes: 32bit windows users need to ensure they have at least 4gb of ram usable on their system.', 'RECOMMENDED:\r\nOS: Windows 7\r\nProcessor: Quad Core Processor\r\nMemory: 4 GB RAM\r\nGraphics: NVIDIA GeForce GTX 560\r\nDirectX: Version 9.0\r\nStorage: 5 GB available space\r\nSound Card: DirectX®-compatible', '2018-11-01', 3, 'images/tf/tf_4.jpg'),
(7, 'ijr-7eg5f', 3, 'Ark', 220000, 320000, 'Bạn được chọn để đưa lên hòn đảo, và hòn đảo không bình thường, đó là kỷ nguyên của khủng long, những con vật với bản năng săn mồi ...', 'Bạn được chọn để đưa lên hòn đảo, và hòn đảo không bình thường, đó là kỷ nguyên của khủng long, những con vật với bản năng săn mồi, bạn tìm cách trốn thoát ư?Không bạn thống trị kỷ nguyên khủng long, trở thành người đứng đầu dãn dắt những người chơi còn lại.', 'MINIMUM:\r\nOS: Windows 7/8.1/10 (64-bit versions)\r\nProcessor: Intel Core i5-2400/AMD FX-8320 or better\r\nMemory: 8 GB RAM\r\nGraphics: NVIDIA GTX 670 2GB/AMD Radeon HD 7870 2GB or better\r\nDirectX: Version 10\r\nStorage: 60 GB available space\r\nAdditional Notes: Requires broadband internet connection for multiplayer', '', '2018-11-01', 3, 'images/ark/ark_3.jpg'),
(8, 'zbe14-hb124', 1, 'Counter Strike:Global Offensive', 60000, 100000, 'Bạn đã biết quá nhiều, đâu cần phải giới thiệu ...', 'Bạn đã biết quá nhiều, đâu cần phải giới thiệu, đã bao là biết quá nhiều rồi, xem cái gì, mua đi!!!', 'MINIMUM:\r\nOS: Windows® 7/Vista/XP\r\nProcessor: Intel® Core™ 2 Duo E6600 or AMD Phenom™ X3 8750 processor or better\r\nMemory: 2 GB RAM\r\nGraphics: Video card must be 256 MB or more and should be a DirectX 9-compatible with support for Pixel Shader 3.0\r\nDirectX: Version 9.0c\r\nStorage: 15 GB available space', '', '2018-12-01', 1, 'images/csgo/csgo_3.jpg'),
(9, 'ah1e6-65euj', 3, 'GRAND THEFT AUTO V', 320000, 440000, 'Nhắc đến siêu phẩm ư, siêu phẩm là đây,RockStar cha để của seri GRAND THEFT AUTO ...', 'Nhắc đến siêu phẩm ư, siêu phẩm là đây,RockStar cha để của seri GRAND THEFT AUTO đã mang dến cho chúng ta một siêu phẩm không thể chối từ được.Lần này RockStar cho bạn vào vai cả 3 nhân vật trong một băng nhóm tội phạm, họ cùng nhau trải qua nhiều chuyện. Phần 5 này có cơ chế Online tuyệt vời, hay mua và thưởng thức siêu phẩm của RockStar ', 'MINIMUM:\r\nRequires a 64-bit processor and operating system\r\nOS: Windows 10 64 Bit, Windows 8.1 64 Bit, Windows 8 64 Bit, Windows 7 64 Bit Service Pack 1\r\nProcessor: Intel Core 2 Quad CPU Q6600 @ 2.40GHz (4 CPUs) / AMD Phenom 9850 Quad-Core Processor (4 CPUs) @ 2.5GHz\r\nMemory: 4 GB RAM\r\nGraphics: NVIDIA 9800 GT 1GB / AMD HD 4870 1GB (DX 10, 10.1, 11)\r\nStorage: 72 GB available space\r\nSound Card: 100% DirectX 10 compatible', 'RECOMMENDED:\r\nRequires a 64-bit processor and operating system\r\nOS: Windows 10 64 Bit, Windows 8.1 64 Bit, Windows 8 64 Bit, Windows 7 64 Bit Service Pack 1\r\nProcessor: Intel Core i5 3470 @ 3.2GHz (4 CPUs) / AMD X8 FX-8350 @ 4GHz (8 CPUs)\r\nMemory: 8 GB RAM\r\nGraphics: NVIDIA GTX 660 2GB / AMD HD 7870 2GB\r\nStorage: 72 GB available space\r\nSound Card: 100% DirectX 10 compatible', '2018-12-01', 3, 'images/gta/gta_3.jpg'),
(10, 'daw78-98abv', 6, 'Road Redemption', 60000, 120000, 'Một tựa game tuổi thơ đã được làm lại vói đồ họa ...', 'Một tựa game tuổi thơ đã được làm lại vói đồ họa cao giúp bạn trở thành tay đua chuyên nghiệp tren những cung đường với những pha hành động gây cấn để chọn ra người cuối cùng để gianh được chiếc cúp vô địch của những tay đô đường phố.', 'MINIMUM:\r\nRequires a 64-bit processor and operating system\r\nOS: Windows XP, Vista\r\nProcessor: 1.4GHz processor or faster\r\nMemory: 8 GB RAM\r\nGraphics: DirectX 9-compatible graphics card with at least 1.5GB of video memory\r\nDirectX: Version 9.0\r\nStorage: 1000 MB available space', 'RECOMMENDED:\r\nRequires a 64-bit processor and operating system\r\nOS: Windows 7, 8, 10\r\nProcessor: 2GHz processor or faster\r\nMemory: 8 GB RAM\r\nGraphics: DirectX 9-compatible graphics card with at least 2GB of video memory\r\nDirectX: Version 9.0\r\nStorage: 2500 MB available space', '2018-12-05', 3, 'images/rr/rr_1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hinh_games`
--

DROP TABLE IF EXISTS `hinh_games`;
CREATE TABLE IF NOT EXISTS `hinh_games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ma_game` int(11) NOT NULL,
  `hinh` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_hinh_game` (`ma_game`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hinh_games`
--

INSERT INTO `hinh_games` (`id`, `ma_game`, `hinh`) VALUES
(1, 1, 'images/pubg/pubg_1.jpg'),
(2, 1, 'images/pubg/pubg_2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hoa_don`
--

DROP TABLE IF EXISTS `hoa_don`;
CREATE TABLE IF NOT EXISTS `hoa_don` (
  `ma_hoa_don` int(11) NOT NULL AUTO_INCREMENT,
  `ma_khach_hang` int(11) NOT NULL,
  `ngay_dat` date NOT NULL,
  `tong_tien` int(11) NOT NULL,
  `ma_trang_thai` int(11) NOT NULL,
  PRIMARY KEY (`ma_hoa_don`),
  KEY `FK_hoadon_khachhang` (`ma_khach_hang`),
  KEY `FK_hoadon_trangthai` (`ma_trang_thai`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hoa_don`
--

INSERT INTO `hoa_don` (`ma_hoa_don`, `ma_khach_hang`, `ngay_dat`, `tong_tien`, `ma_trang_thai`) VALUES
(9, 3, '2018-12-11', 900000, 4),
(10, 3, '2018-12-11', 1100000, 4),
(11, 4, '2018-12-11', 450000, 4),
(12, 4, '2018-12-11', 1100000, 4);

-- --------------------------------------------------------

--
-- Table structure for table `khach_hang`
--

DROP TABLE IF EXISTS `khach_hang`;
CREATE TABLE IF NOT EXISTS `khach_hang` (
  `ma_khach_hang` int(11) NOT NULL AUTO_INCREMENT,
  `ten_khach_hang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mat_khau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ma_khach_hang`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `khach_hang`
--

INSERT INTO `khach_hang` (`ma_khach_hang`, `ten_khach_hang`, `email`, `mat_khau`) VALUES
(3, 'Tú Nguyễn', 'nttu307@gmail.com', '698d51a19d8a121ce581499d7b701668'),
(4, 'pivo', 'nhoxphivo@gmail.com', '0acf4539a14b3aa27deeb4cbdf6e989f'),
(5, 'Phi', 'phi@gmail.com', '0acf4539a14b3aa27deeb4cbdf6e989f');

-- --------------------------------------------------------

--
-- Table structure for table `loai_games`
--

DROP TABLE IF EXISTS `loai_games`;
CREATE TABLE IF NOT EXISTS `loai_games` (
  `ma_the_loai` int(11) NOT NULL,
  `ten_the_loai` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ma_the_loai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loai_games`
--

INSERT INTO `loai_games` (`ma_the_loai`, `ten_the_loai`) VALUES
(1, 'RPG'),
(2, 'Chiến thuật'),
(3, 'Hành động'),
(4, 'Giải trí'),
(5, 'Sinh tồn'),
(6, 'Đua xe');

-- --------------------------------------------------------

--
-- Table structure for table `trang_thai`
--

DROP TABLE IF EXISTS `trang_thai`;
CREATE TABLE IF NOT EXISTS `trang_thai` (
  `ma_trang_thai` int(11) NOT NULL,
  `ten_trang_thai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ma_trang_thai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trang_thai`
--

INSERT INTO `trang_thai` (`ma_trang_thai`, `ten_trang_thai`) VALUES
(1, 'Noi bat'),
(2, 'Game moi'),
(3, 'Game cu'),
(4, 'Dang xu ly'),
(5, 'Hoan thanh');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ten_user` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`ten_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ten_user`, `email`, `password`) VALUES
('Tú', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ct_hoa_don`
--
ALTER TABLE `ct_hoa_don`
  ADD CONSTRAINT `FK_cthd_game` FOREIGN KEY (`ma_game`) REFERENCES `games` (`ma_game`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `FK_game_loaigame` FOREIGN KEY (`ma_the_loai`) REFERENCES `loai_games` (`ma_the_loai`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_game_trangthai` FOREIGN KEY (`ma_trang_thai`) REFERENCES `trang_thai` (`ma_trang_thai`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `hinh_games`
--
ALTER TABLE `hinh_games`
  ADD CONSTRAINT `FK_hinh_games` FOREIGN KEY (`ma_game`) REFERENCES `games` (`ma_game`);

--
-- Constraints for table `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD CONSTRAINT `FK_hoadon_khachhang` FOREIGN KEY (`ma_khach_hang`) REFERENCES `khach_hang` (`ma_khach_hang`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_hoadon_trangthai` FOREIGN KEY (`ma_trang_thai`) REFERENCES `trang_thai` (`ma_trang_thai`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
