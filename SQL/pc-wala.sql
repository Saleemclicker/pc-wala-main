-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 10, 2024 at 06:21 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pc-wala`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `userid` int NOT NULL,
  `productid` int NOT NULL,
  `quantity` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`userid`, `productid`, `quantity`) VALUES
(6, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `name` varchar(1000) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `card` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`name`, `image`, `card`) VALUES
('processor', 'https://th.bing.com/th/id/R.de0d3c1bed03696aeedee32e911ac239?rik=Ql0ds7bRo%2bdLag&riu=http%3a%2f%2fcdn.shopify.com%2fs%2ffiles%2f1%2f0463%2f2539%2f9719%2fproducts%2f1_0facef5d-014d-4b3a-a907-972909111b09.png%3fv%3d1670578811&ehk=0J1p%2brJeoiikys6aThy8OW63JLwjkzeJXqGEEAtm5%2fA%3d&risl=&pid=ImgRaw&r=0', 1),
('Graphics Card', 'https://github.com/SmitRami1/pc-wala/blob/main/Images/graphics%20card.png?raw=true', 1),
('Ram', 'https://github.com/SmitRami1/pc-wala/blob/main/Images/ram.png?raw=true', 1),
('Cabinet', 'https://github.com/SmitRami1/pc-wala/blob/main/Images/cabinet.png?raw=true', 1),
('Motherboard', 'https://github.com/SmitRami1/pc-wala/blob/main/Images/motherboard.png?raw=true', 1),
('SMPS', 'https://github.com/SmitRami1/pc-wala/blob/main/Images/smps.png?raw=true', 1),
('STORAGE', 'https://github.com/SmitRami1/pc-wala/blob/main/Images/storage.png?raw=true', 1),
('Monitor', 'https://github.com/SmitRami1/pc-wala/blob/main/Images/monitor.png?raw=true', 1),
('Pre-Built', 'https://github.com/SmitRami1/pc-wala/blob/main/Images/Pre-built_pc-removebg-preview%20(1).png?raw=true', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `name` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `price` varchar(10) NOT NULL,
  `category` varchar(15) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`name`, `description`, `price`, `category`, `image`, `id`) VALUES
('I3-12100F', 'Intel Core i3 12100F 12th Gen Generation Desktop PC Processor 4 CPU with 12MB Cache and up to 4.30 GHz Clock Speed LGA 1700 Socket', '9000', 'processor', 'https://github.com/SmitRami1/pc-wala/blob/main/Images/I3-12100F.png?raw=true', 1),
('Intel Core i5-10600K', 'Intel Core i5-10600K Processor (12M Cache, up to 4.80 GHz)10th Generation Intel Core i5 ProcessorsProducts formerly Comet LakeDesktopLithography14 nmProcessor Base Frequency4.10 GHzConfigurable TDP-down95W Intel UHD Graphics 630350 MHz+', '21,999', 'processor', 'https://github.com/SmitRami1/pc-wala/blob/main/Images/Intel%20i5-10600K.png?raw=true', 2),
('Intel Core i5-11400', '', '14,499', 'processor', 'https://github.com/SmitRami1/pc-wala/blob/main/Images/Intel%20Core%20i5-11400.png?raw=true', 3),
('Intel Core I7 13700K', '', '34,999', 'processor', 'https://github.com/SmitRami1/pc-wala/blob/main/Images/Intel-Core-I7-13700K.png?raw=true', 4),
('AMD Ryzen 9 5900X', '', '29,999', 'processor', 'https://github.com/SmitRami1/pc-wala/blob/main/Images/ryzen_9_5900x.png?raw=true', 5),
('AMD Ryzen 7 5700G', '', '17,999', 'processor', 'https://github.com/SmitRami1/pc-wala/blob/main/Images/ryzen%207%205700g.png?raw=true', 6),
('AMD Ryzen 3 3300X', '', '9,999', 'processor', 'https://github.com/SmitRami1/pc-wala/blob/main/Images/ryzen%203%203300x.png?raw=true', 7),
('AMD Ryzen 5 5500', '', '7,999', 'processor', 'https://github.com/SmitRami1/pc-wala/blob/main/Images/ryzen%205%205500.png?raw=true', 8),
('GEFORCE GTX 1650', 'GIGABYTE Nvidia GeForce ® GTX 1650 D6 pci_e_x16 WINDFORCE OC 4GD Graphics Card with Integrated 4GB GDDR6 Memory (GV-N1656WF2OC-4GD)', '10,999', 'Graphics Card', 'https://github.com/SmitRami1/pc-wala/blob/main/Images/GIGABYTE_GeForce_GTX_1650-9999.png?raw=true', 9),
('GEFORCE RTX 3080', 'ASUS ROG Strix GeForce RTX 3080 OC Edition 12 GB GDDR6X RAM Graphics Card with LHR 3 Years Warranty 4K 8K Gaming 8960 CUDA Cores Editing Mining DirectX 12 Ultimate Triple Fan, pci_e_x16', '1,19,999', 'Graphics Card', 'https://github.com/SmitRami1/pc-wala/blob/main/Images/Asus%20ROG%20%20RTX%203080.png?raw=true', 10),
('ASUS Dual RX 6600', '', '18,999', 'Graphics Card', 'https://github.com/SmitRami1/pc-wala/blob/main/Images/ASUS_Dual_Radeon_RX_6600_8_GB-18999-.png?raw=true', 11),
('GEFORCE GTX 1660', '', '19,999', 'Graphics Card', 'https://github.com/SmitRami1/pc-wala/blob/main/Images/GTX_1660_Super_-19999%20.png?raw=true', 12),
('GEFORCE RTX 4060', '', '28,099', 'Graphics Card', 'https://github.com/SmitRami1/pc-wala/blob/main/Images/rtx_4060_28099.png?raw=true', 13),
('GEFORCE RTX 2060', '', '29,099', 'Graphics Card', 'https://github.com/SmitRami1/pc-wala/blob/main/Images/rtx_2060_29099.png?raw=true', 14),
('AMD RX 5500 XT', '', '18,999', 'Graphics Card', 'https://github.com/SmitRami1/pc-wala/blob/main/Images/RX_5500_XT-18999%20.png?raw=true', 15),
('GEFORCE RTX 3070', '', '79,999', 'Graphics Card', 'https://github.com/SmitRami1/pc-wala/blob/main/Images/RTX_3070_80000.png?raw=true', 16),
('CORSAIR RGB 16GB', 'CORSAIR Vengeance RGB PRO 16GB (2x8GB) CMW16GX4M2C3200C16 DDR4 3200MHz C16 LED Desktop Memory - Black', '9999', 'Ram', 'https://github.com/SmitRami1/pc-wala/blob/main/Images/CORSAIR_Vengeance_RGB_PRO_16GB__2x8GB__-9999-removebg-preview.png?raw=true', 17),
('GSKILL Trident 32GB', 'G.Skill Trident Z RGB 32GB(2x16GB) DDR4-3600MHz CL18-22-22-42 1.35V Desktop Memory RAM - F4-3600C18D-32GTZR, Black', '8200', 'Ram', 'https://github.com/SmitRami1/pc-wala/blob/main/Images/G.SKILL_Trident_Z_RGB_32GB_2_16GB-8200.png?raw=true', 18),
('Predator Vesta 32GB', '', '10,999', 'Ram', 'https://github.com/SmitRami1/pc-wala/blob/main/Images/Predator_Vesta_32gb_10999.png?raw=true', 19),
('Patriot Viper 8GB', '', '2000', 'Ram', 'https://github.com/SmitRami1/pc-wala/blob/main/Images/Patriot_Viper_Steel_2000.png?raw=true', 20),
('Team-Force 16GB', '', '4500', 'Ram', 'https://github.com/SmitRami1/pc-wala/blob/main/Images/TeamGroup_T-Force_4500.png?raw=true', 21),
('XPG ADATA 8GB', '', '2000', 'Ram', 'https://github.com/SmitRami1/pc-wala/blob/main/Images/XPG_ADATA_GAMMIX_D30_DDR4_8GB-2000.png?raw=true', 22),
('KINGSTONE 8GB RGB', '', '2500', 'Ram', 'https://github.com/SmitRami1/pc-wala/blob/main/Images/kingston_ram_8gb_ddr4-_2500-.png?raw=true', 23),
('KINGSTONE FURY 8GB', '', '2199', 'Ram', 'https://github.com/SmitRami1/pc-wala/blob/main/Images/ram.png?raw=true', 24),
('Gigabyte B550', 'GIGABYTE B550M DS3H (AM4 AMD/B550/Micro ATX/Dual M.2/SATA 6Gb/s/USB 3.2 Gen 1/PCIe 4.0/HMDI/DVI/DDR4/Motherboard)', '28,999', 'Motherboard', 'https://github.com/SmitRami1/pc-wala/blob/main/Images/Gigabyte_B550_Aorus_Pro_AC_28999.png?raw=true', 25),
('MSI MPG B550', 'MSI MPG B550 Gaming Plus AMD Am4 Ddr4 M.2 USB 3.2 Gen 2 Hdmi ATX Motherboard AMD Ryzen 5000 Series Desktop Processors', '18,099', 'Motherboard', 'https://github.com/SmitRami1/pc-wala/blob/main/Images/MSI_MPG_B550_GAMING_EDGE_WIFI_Gaming_Motherboard-18099.png?raw=true', 26),
('ASUS Prime Z590 A', '', '26,999', 'Motherboard', 'https://github.com/SmitRami1/pc-wala/blob/main/Images/ASUS_Prime_Z590-A_26999-.png?raw=true', 27),
('ASRock B560', '', '16,999', 'Motherboard', 'https://github.com/SmitRami1/pc-wala/blob/main/Images/ASRock_B560_Steel_Legend_16999-removebg-preview.png?raw=true', 28),
('Z690 AORUS ELITE', '', '28,999', 'Motherboard', 'https://github.com/SmitRami1/pc-wala/blob/main/Images/Z690-AORUS-ELITE-AX-DDR4%2028999.png?raw=true', 29),
('MSI MAG B660M', '', '18,9999', 'Motherboard', 'https://github.com/SmitRami1/pc-wala/blob/main/Images/MSI_MAG_B660M_MORTAR_WIFI_18999-removebg-preview.png?raw=true', 30),
('ASRock Z690', '', '31,500', 'Motherboard', 'https://github.com/SmitRami1/pc-wala/blob/main/Images/ASRock_Z690_Extreme_WiFi_6E_31500-removebg-preview%20(1).png?raw=true', 31),
('GIGABYTE X570', '', '33,500', 'Motherboard', 'https://github.com/SmitRami1/pc-wala/blob/main/Images/GIGABYTE_X570_AORUS_MASTER_33500-removebg-preview.png?raw=true', 32),
('FRONTECH 1000W', 'FRONTECH Pro Gaming 1000W Certified High-Efficiency Power Supply| Built-in Protections| 3X SATA| ATX 12V| 20/24 Pin Main Power| 120mm Smart Cooling Fan| PCIe Connector| Power Cable (PS-0014, Black)', '1100', 'SMPS', 'https://raw.githubusercontent.com/SmitRami1/pc-wala/main/Images/FRONTECH%201000W.png\r\n', 33),
('ZEBRONICS ZS500 500W', 'ZEBRONICS ZS500 500W Non Modular Power Supply with Silent 120mm RGB Fan, SATA x 3, 12V 28A (Max.), Over Voltage/Short Circuit Protection', '1200', 'SMPS', 'https://raw.githubusercontent.com/SmitRami1/pc-wala/main/Images/ZEBRONICS%20ZS500%20500W.png', 34),
('ZEBRONICS AGON', 'ZEBRONICS Agon Mid-Tower Premium Gaming Cabinet - Black, ATX/M-ATX/M-ITX, 1 x 120 mm RGB Inner Glow Rear Fan, LED Strip with Control Switch, Tempered Glass Side Panel, USB 3.0, USB 2.0 (Black)', '2000', 'CABINET', 'https://raw.githubusercontent.com/SmitRami1/pc-wala/main/Images/ZEBRONICS%20AGON.png', 35),
('GALAX CABINET', 'Galax (Rev-06W) Revolution 06 White with 4 RGB Fans Preinstalled, Mid Tower ATX Gaming Cabinet/Computer Case, Tempered Glass Side Panel', '3300', 'CABINET', 'https://raw.githubusercontent.com/SmitRami1/pc-wala/main/GALAX%20CABINET.png', 36),
('SAMSUNG 980 1TB', 'Samsung 980 1TB Up to 3,500 MB/s PCIe 3.0 NVMe M.2 (2280) Internal Solid State Drive (SSD) (MZ-V8V1T0)', '8500', 'STORAGE', 'https://raw.githubusercontent.com/SmitRami1/pc-wala/main/Images/Samsung%20980%201TB.png', 37),
('TOSHIBA 1TB 5400RPM', 'Toshiba 1TB 5400RPM 8MB Cache SATA 3.0Gb/s 2.5 inch Notebook Hard Drive (MQ01ABD100V) - 1 Year Warranty', '3000', 'STORAGE', 'https://raw.githubusercontent.com/SmitRami1/pc-wala/main/Images/Toshiba%201TB%205400RPM.png', 38),
('VIEWSONIC 24 Inch 2K', 'ViewSonic 24 Inch QHD 2k Monitor with SuperClear IPS, sRGB: 104%, Smooth Refresh Rate 75Hz, in-Built Cable Management, 3-Side Borderless, VESA Compatible, HDMI x 2, Display Port x 1 - VX2480-2K-SHD', '16000', 'MONITOR', 'https://raw.githubusercontent.com/SmitRami1/pc-wala/main/Images/ViewSonic%2024%20Inch%202K.png', 39),
('DELL S2421HNM', 'Dell S2421HNM (60.5cm) FHD Monitor 1920x1080 Pixels @75Hz, IPS Panel, 3-Year Warranty, 99% sRGB, Low Blue Light Technology, Ultra Thin Bezel, HDMI x2, Tilt Adjustment, AMD FreeSync', '9200', 'MONITOR', 'https://raw.githubusercontent.com/SmitRami1/pc-wala/main/Images/DELL%20S2421HNM.png', 40);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `userid` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`,`username`, `password`, `userid`) VALUES
('abc@gmail.com','ssss', 'ssss', 1),
('abcd@gmail.com','smit', '123', 2),
('abcde@gmail.com','jeel', 'jeel123', 3),
('abcdef@gmail.com','smitsmit', 'smit', 4),
('abcdefg@gmail.com','jil', '1234', 5),
('abcdefgh@gmail.com','admin', 'admin', 6),
('abcdefghi@gmail.com','sd', 'f', 7),
('abcdefghij@gmail.com','f', 'd', 8),
('abcdefghijk@gmail.com','sdsd', 'sdsd', 9),
('abcdefghijkl@gmail.com','fd', 'sd', 10),
('abcdefghijklm@gmail.com','rami', 'lkj', 11),
('abcdefghijklmn@gmail.com','dsds', 'dsd', 12),
('abcdefghijklmno@gmail.com','h', '463696', 13);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
