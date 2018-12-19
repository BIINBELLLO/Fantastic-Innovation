-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2018 at 04:32 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bsms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `allocation`
--

CREATE TABLE `allocation` (
  `S/No` int(25) NOT NULL,
  `Parent_Email` varchar(255) NOT NULL,
  `Babysitter_Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `babies`
--

CREATE TABLE `babies` (
  `id` int(11) NOT NULL,
  `parent_email` varchar(255) NOT NULL,
  `parent_phone` varchar(255) NOT NULL,
  `baby_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `babies`
--

INSERT INTO `babies` (`id`, `parent_email`, `parent_phone`, `baby_name`, `gender`, `age`, `location`, `photo`) VALUES
(1, 'hbunza2@gmail.com', '08065452311', 'Ahmed Abdullahi', 'Male', '2', 'Maiduguri', ''),
(3, 'hbunza2@gmail.com', '08065452311', 'Musa Arafat', 'Male', 'Under 1 Year', 'Abuja', ''),
(4, 'hbunza2@gmail.com', '07032456788', 'Gift Thomas', 'Female', 'Above 5 Years', 'Kaduna', 'img/uploads/_1540013899IMG_6279.JPG'),
(5, 'hbunza2@gmail.com', '08123456677', 'Aisha Musa', 'Female', '1 Year', 'Lagos', 'img/uploads/_1540018028IMG_6284.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `babysitter`
--

CREATE TABLE `babysitter` (
  `S/No` int(25) NOT NULL,
  `First_Name` varchar(255) NOT NULL,
  `Other_Names` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone_No` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `State_of_origin` varchar(255) NOT NULL,
  `Local_Govt` varchar(255) NOT NULL,
  `Tribe` varchar(255) NOT NULL,
  `Gender` varchar(25) NOT NULL,
  `Photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `babysitter`
--

INSERT INTO `babysitter` (`S/No`, `First_Name`, `Other_Names`, `Email`, `Phone_No`, `Address`, `State_of_origin`, `Local_Govt`, `Tribe`, `Gender`, `Photo`) VALUES
(4, 'Hafizu', 'Hassan Bunza', 'hbunza@gmail.com', '09087654334', 'Kaduna State', 'Jigawa', 'Kaduna North', 'Hausa', 'Male', 'img/uploads/_1539436708ds.jpg'),
(5, 'Maryam ', 'Yusuf', 'maryam@gmail.com', '08123445566', 'Adamawa', 'Adamawa', 'Osisioma', 'Hausa', 'Female', ''),
(6, 'Aisha', 'Yusuf', 'eesha@gmail.com', '08099876655', 'Sokoto', 'Sokoto', 'Osisioma', 'Gbari', 'Female', ''),
(7, 'Sahabi', 'Dalhatu', 'sahabi@gmail.com', '08023445566', 'Abuja', 'Imo', 'Umuahia South', 'Kanuri', 'Male', '');

-- --------------------------------------------------------

--
-- Table structure for table `log_in`
--

CREATE TABLE `log_in` (
  `S/No` int(25) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `User_Type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_in`
--

INSERT INTO `log_in` (`S/No`, `Email`, `Password`, `User_Type`) VALUES
(7, 'hbunza@gmail.com', 'asdf1234', 'Babysitter'),
(8, 'hbunza2@gmail.com', 'asdfqwerty', 'Parent'),
(9, 'sule@gmail.com', '12345678', 'Parent'),
(10, 'maryam@gmail.com', '12345678', 'Babysitter'),
(11, 'eesha@gmail.com', '12345678', 'Babysitter'),
(12, 'sahabi@gmail.com', '12345678', 'Babysitter');

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `S/No` int(25) NOT NULL,
  `First_Name` varchar(255) NOT NULL,
  `Other_Names` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone_No` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `State_of_origin` varchar(255) NOT NULL,
  `Local_Govt` varchar(255) NOT NULL,
  `Tribe` varchar(255) NOT NULL,
  `Gender` varchar(25) NOT NULL,
  `Photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`S/No`, `First_Name`, `Other_Names`, `Email`, `Phone_No`, `Address`, `State_of_origin`, `Local_Govt`, `Tribe`, `Gender`, `Photo`) VALUES
(1, 'Hafizu', 'Hassana Umar', 'hbunza2@gmail.com', '09087654334', 'Kaduna State', 'Enugu', 'Umu - Nneochi', 'Igbo', 'Male', 'img/uploads/_1539842947jewelry19.jpg'),
(2, 'Suleiman ', 'Auwal', 'sule@gmail.com', '09099887766', ' Nasarawa', 'Nasarawa', 'Demsa', 'Kanuri', 'Male', '');

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

CREATE TABLE `qualification` (
  `id` int(25) NOT NULL,
  `Babysitter_Email` varchar(25) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `School` varchar(255) NOT NULL,
  `Year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qualification`
--

INSERT INTO `qualification` (`id`, `Babysitter_Email`, `Name`, `School`, `Year`) VALUES
(1, 'hbunza@gmail.com', 'Primary School Certificate ', 'Greater Heights International School', '2004');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `sitter_name` varchar(255) NOT NULL,
  `sitter_other_names` varchar(255) NOT NULL,
  `sitter_email` varchar(255) NOT NULL,
  `sitter_tel` varchar(11) NOT NULL,
  `sitter_add` varchar(255) NOT NULL,
  `sitter_tribe` varchar(255) NOT NULL,
  `sitter_gender` varchar(50) NOT NULL,
  `parent_email` varchar(255) NOT NULL,
  `parent_phone` varchar(100) NOT NULL,
  `parent_add` varchar(255) NOT NULL,
  `parent_tribe` varchar(255) NOT NULL,
  `parent_gender` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `sitter_name`, `sitter_other_names`, `sitter_email`, `sitter_tel`, `sitter_add`, `sitter_tribe`, `sitter_gender`, `parent_email`, `parent_phone`, `parent_add`, `parent_tribe`, `parent_gender`, `status`) VALUES
(1, 'Hafizu', 'Hassan Bunza', 'hbunza@gmail.com', '09087654334', 'Kaduna State', 'Hausa', 'Male', 'hbunza2@gmail.com', '08098765644', 'Wamako', 'Hausa', 'Female', 'accepted'),
(2, 'Hafizu', 'Hassan Bunza', 'hbunza@gmail.com', '09087654334', 'Kaduna State', 'Hausa', 'Male', 'hbunza2@gmail.com', '09099887721', 'Kano', 'Yoruba', 'Male', 'accepted'),
(3, 'Maryam ', 'Yusuf', 'maryam@gmail.com', '08123445566', 'Adamawa', 'Hausa', 'Female', 'sule@gmail.com', '07065432211', 'Kwara', 'Igala', 'Female', 'accepted'),
(4, 'Sahabi', 'Dalhatu', 'sahabi@gmail.com', '08023445566', 'Abuja', 'Kanuri', 'Male', 'hbunza2@gmail.com', '09087654334', 'Kaduna State', 'Igbo', 'Male', 'accepted'),
(5, 'Hafizu', 'Hassan Bunza', 'hbunza@gmail.com', '09087654334', 'Kaduna State', 'Hausa', 'Male', 'hbunza2@gmail.com', '09087654334', 'Kaduna State', 'Igbo', 'Male', '');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `S/No` int(25) NOT NULL,
  `Parent_Email` varchar(255) NOT NULL,
  `Babysitter_Email` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `states_lga`
--

CREATE TABLE `states_lga` (
  `code` varchar(4) DEFAULT NULL,
  `name` varchar(11) DEFAULT NULL,
  `lga` varchar(31) DEFAULT NULL,
  `sn` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `states_lga`
--

INSERT INTO `states_lga` (`code`, `name`, `lga`, `sn`) VALUES
('AB', 'Abia', 'Aba North', 2),
('AB', 'Abia', 'Aba South', 3),
('AB', 'Abia', 'Arochukwu', 4),
('AB', 'Abia', 'Bende', 5),
('AB', 'Abia', 'Ikwuano', 6),
('AB', 'Abia', 'Isiala Ngwa North', 7),
('AB', 'Abia', 'Isiala Ngwa South', 8),
('AB', 'Abia', 'Isuikwuato', 9),
('AB', 'Abia', 'Obingwa', 10),
('AB', 'Abia', 'Ohafia', 11),
('AB', 'Abia', 'Osisioma', 12),
('AB', 'Abia', 'Ugwunagbo', 13),
('AB', 'Abia', 'Ukwa East', 14),
('AB', 'Abia', 'Ukwa  West', 15),
('AB', 'Abia', 'Umuahia North', 16),
('AB', 'Abia', 'Umuahia  South', 17),
('AB', 'Abia', 'Umu - Nneochi', 18),
('AD', 'Adamawa', 'Demsa', 19),
('AD', 'Adamawa', 'Fufore', 20),
('AD', 'Adamawa', 'Ganye', 21),
('AD', 'Adamawa', 'Gire 1', 22),
('AD', 'Adamawa', 'Gombi', 23),
('AD', 'Adamawa', 'Guyuk', 24),
('AD', 'Adamawa', 'Hong', 25),
('AD', 'Adamawa', 'Jada', 26),
('AD', 'Adamawa', 'Lamurde', 27),
('AD', 'Adamawa', 'Madagali', 28),
('AD', 'Adamawa', 'Maiha', 29),
('AD', 'Adamawa', 'Mayo - Belwa', 30),
('AD', 'Adamawa', 'Michika', 31),
('AD', 'Adamawa', 'Mubi North', 32),
('AD', 'Adamawa', 'Mubi South', 33),
('AD', 'Adamawa', 'Numan', 34),
('AD', 'Adamawa', 'Shelleng', 35),
('AD', 'Adamawa', 'Song', 36),
('AD', 'Adamawa', 'Toungo', 37),
('AD', 'Adamawa', 'Yola North', 38),
('AD', 'Adamawa', 'Yola South', 39),
('AK', 'Akwa Ibom', 'Abak', 40),
('AK', 'Akwa Ibom', 'Eastern Obolo', 41),
('AK', 'Akwa Ibom', 'Eket', 42),
('AK', 'Akwa Ibom', 'Esit Eket (uquo)', 43),
('AK', 'Akwa Ibom', 'Essien Udim', 44),
('AK', 'Akwa Ibom', 'Etim Ekpo', 45),
('AK', 'Akwa Ibom', 'Etinan', 46),
('AK', 'Akwa Ibom', 'Ibeno', 47),
('AK', 'Akwa Ibom', 'Ibesikpo Asutan', 48),
('AK', 'Akwa Ibom', 'Ibiono Ibom', 49),
('AK', 'Akwa Ibom', 'Ika', 50),
('AK', 'Akwa Ibom', 'Ikono', 51),
('AK', 'Akwa Ibom', 'Ikot Abasi', 52),
('AK', 'Akwa Ibom', 'Ikot Ekpene', 53),
('AK', 'Akwa Ibom', 'Ini', 54),
('AK', 'Akwa Ibom', 'Itu', 55),
('AK', 'Akwa Ibom', 'Mbo', 56),
('AK', 'Akwa Ibom', 'Mkpat Enin', 57),
('AK', 'Akwa Ibom', 'Nsit Atai', 58),
('AK', 'Akwa Ibom', 'Nsit Ibom', 59),
('AK', 'Akwa Ibom', 'Nsit Ubium', 60),
('AK', 'Akwa Ibom', 'Obot Akara', 61),
('AK', 'Akwa Ibom', 'Okobo', 62),
('AK', 'Akwa Ibom', 'Onna', 63),
('AK', 'Akwa Ibom', 'Oron', 64),
('AK', 'Akwa Ibom', 'Oruk Anam', 65),
('AK', 'Akwa Ibom', 'Udung Uko', 66),
('AK', 'Akwa Ibom', 'Ukanafun', 67),
('AK', 'Akwa Ibom', 'Uruan', 68),
('AK', 'Akwa Ibom', 'Urue Offong/oruko', 69),
('AK', 'Akwa Ibom', 'Uyo', 70),
('AN', 'Anambra', 'Aguata', 71),
('AN', 'Anambra', 'Ayamelum', 72),
('AN', 'Anambra', 'Anambra East', 73),
('AN', 'Anambra', 'Anambra West', 74),
('AN', 'Anambra', 'Anaocha', 75),
('AN', 'Anambra', 'Awka North', 76),
('AN', 'Anambra', 'Awka South', 77),
('AN', 'Anambra', 'Dunukofia', 78),
('AN', 'Anambra', 'Ekwusigo', 79),
('AN', 'Anambra', 'Idemili North', 80),
('AN', 'Anambra', 'Idemili-south', 81),
('AN', 'Anambra', 'Ihala', 82),
('AN', 'Anambra', 'Njikoka', 83),
('AN', 'Anambra', 'Nnewi North', 84),
('AN', 'Anambra', 'Nnewi South', 85),
('AN', 'Anambra', 'Ogbaru', 86),
('AN', 'Anambra', 'Onitsha-north', 87),
('AN', 'Anambra', 'Onitsha -south', 88),
('AN', 'Anambra', 'Orumba North', 89),
('AN', 'Anambra', 'Orumba  South', 90),
('AN', 'Anambra', 'Oyi', 91),
('BA', 'Bauchi', 'Alkaleri', 92),
('BA', 'Bauchi', 'Bauchi', 93),
('BA', 'Bauchi', 'Bogoro', 94),
('BA', 'Bauchi', 'Dambam', 95),
('BA', 'Bauchi', 'Darazo', 96),
('BA', 'Bauchi', 'Dass', 97),
('BA', 'Bauchi', 'Gamawa', 98),
('BA', 'Bauchi', 'Ganjuwa', 99),
('BA', 'Bauchi', 'Giade', 100),
('BA', 'Bauchi', 'Itas/gadau', 101),
('BA', 'Bauchi', 'JAMA''ARE', 102),
('BA', 'Bauchi', 'Katagum', 103),
('BA', 'Bauchi', 'Kirfi', 104),
('BA', 'Bauchi', 'Misau', 105),
('BA', 'Bauchi', 'Ningi', 106),
('BA', 'Bauchi', 'Shira', 107),
('BA', 'Bauchi', 'Tafawa Balewa', 108),
('BA', 'Bauchi', 'Toro', 109),
('BA', 'Bauchi', 'Warji', 110),
('BA', 'Bauchi', 'Zaki', 111),
('BY', 'Bayelsa', 'Brass', 112),
('BY', 'Bayelsa', 'Ekeremor', 113),
('BY', 'Bayelsa', 'Kolokuma/opokuma', 114),
('BY', 'Bayelsa', 'Nembe', 115),
('BY', 'Bayelsa', 'Ogbia', 116),
('BY', 'Bayelsa', 'Sagbama', 117),
('BY', 'Bayelsa', 'Southern Ijaw', 118),
('BY', 'Bayelsa', 'Yenagoa', 119),
('BN', 'Benue', 'Ado', 120),
('BN', 'Benue', 'Agatu', 121),
('BN', 'Benue', 'Apa', 122),
('BN', 'Benue', 'Buruku', 123),
('BN', 'Benue', 'Gboko', 124),
('BN', 'Benue', 'Guma', 125),
('BN', 'Benue', 'Gwer East', 126),
('BN', 'Benue', 'Gwer West', 127),
('BN', 'Benue', 'Katsina-ala', 128),
('BN', 'Benue', 'Konshisha', 129),
('BN', 'Benue', 'Kwande', 130),
('BN', 'Benue', 'Logo', 131),
('BN', 'Benue', 'Makurdi', 132),
('BN', 'Benue', 'Obi', 133),
('BN', 'Benue', 'Ogbadibo', 134),
('BN', 'Benue', 'Oju', 135),
('BN', 'Benue', 'Ohimini', 136),
('BN', 'Benue', 'Okpokwu', 137),
('BN', 'Benue', 'Otukpo', 138),
('BN', 'Benue', 'Tarka', 139),
('BN', 'Benue', 'Ukum', 140),
('BN', 'Benue', 'Ushongo', 141),
('BN', 'Benue', 'Vandeikya', 142),
('BO', 'Borno', 'Abadam', 143),
('BO', 'Borno', 'Askira / Uba', 144),
('BO', 'Borno', 'Bama', 145),
('BO', 'Borno', 'Bayo', 146),
('BO', 'Borno', 'Biu', 147),
('BO', 'Borno', 'Chibok', 148),
('BO', 'Borno', 'Damboa', 149),
('BO', 'Borno', 'Dikwa', 150),
('BO', 'Borno', 'Gubio', 151),
('BO', 'Borno', 'Guzamala', 152),
('BO', 'Borno', 'Gwoza', 153),
('BO', 'Borno', 'Hawul', 154),
('BO', 'Borno', 'Jere', 155),
('BO', 'Borno', 'Kaga', 156),
('BO', 'Borno', 'Kala Balge', 157),
('BO', 'Borno', 'Konduga', 158),
('BO', 'Borno', 'Kukawa', 159),
('BO', 'Borno', 'Kwaya / Kusar', 160),
('BO', 'Borno', 'Mafa', 161),
('BO', 'Borno', 'Magumeri', 162),
('BO', 'Borno', 'Maiduguri M. C.', 163),
('BO', 'Borno', 'Marte', 164),
('BO', 'Borno', 'Mobbar', 165),
('BO', 'Borno', 'Monguno', 166),
('BO', 'Borno', 'Ngala', 167),
('BO', 'Borno', 'Nganzai', 168),
('BO', 'Borno', 'Shani', 169),
('CR', 'Cross River', 'Abi', 170),
('CR', 'Cross River', 'Akamkpa', 171),
('CR', 'Cross River', 'Akpabuyo', 172),
('CR', 'Cross River', 'Bakassi', 173),
('CR', 'Cross River', 'Bekwarra', 174),
('CR', 'Cross River', 'Biase', 175),
('CR', 'Cross River', 'Boki', 176),
('CR', 'Cross River', 'Calabar Municipality', 177),
('CR', 'Cross River', 'Calabar South', 178),
('CR', 'Cross River', 'Etung', 179),
('CR', 'Cross River', 'Ikom', 180),
('CR', 'Cross River', 'Obanliku', 181),
('CR', 'Cross River', 'Obubra', 182),
('CR', 'Cross River', 'Obudu', 183),
('CR', 'Cross River', 'Odukpani', 184),
('CR', 'Cross River', 'Ogoja', 185),
('CR', 'Cross River', 'Yakurr', 186),
('CR', 'Cross River', 'Yala', 187),
('DT', 'Delta', 'Aniocha North', 188),
('DT', 'Delta', 'Aniocha - South', 189),
('DT', 'Delta', 'Bomadi', 190),
('DT', 'Delta', 'Burutu', 191),
('DT', 'Delta', 'Ethiope  East', 192),
('DT', 'Delta', 'Ethiope  West', 193),
('DT', 'Delta', 'Ika North- East', 194),
('DT', 'Delta', 'Ika - South', 195),
('DT', 'Delta', 'Isoko North', 196),
('DT', 'Delta', 'Isoko South', 197),
('DT', 'Delta', 'Ndokwa East', 198),
('DT', 'Delta', 'Ndokwa West', 199),
('DT', 'Delta', 'Okpe', 200),
('DT', 'Delta', 'Oshimili - North', 201),
('DT', 'Delta', 'Oshimili - South', 202),
('DT', 'Delta', 'Patani', 203),
('DT', 'Delta', 'Sapele', 204),
('DT', 'Delta', 'Udu', 205),
('DT', 'Delta', 'Ughelli North', 206),
('DT', 'Delta', 'Ughelli South', 207),
('DT', 'Delta', 'Ukwuani', 208),
('DT', 'Delta', 'Uvwie', 209),
('DT', 'Delta', 'Warri  North', 210),
('DT', 'Delta', 'Warri South', 211),
('DT', 'Delta', 'Warri South  West', 212),
('EB', 'Ebonyi', 'Abakaliki', 213),
('EB', 'Ebonyi', 'Afikpo North', 214),
('EB', 'Ebonyi', 'Afikpo  South', 215),
('EB', 'Ebonyi', 'Ebonyi', 216),
('EB', 'Ebonyi', 'Ezza North', 217),
('EB', 'Ebonyi', 'Ezza South', 218),
('EB', 'Ebonyi', 'Ikwo', 219),
('EB', 'Ebonyi', 'Ishielu', 220),
('EB', 'Ebonyi', 'Ivo', 221),
('EB', 'Ebonyi', 'Izzi', 222),
('EB', 'Ebonyi', 'Ohaozara', 223),
('EB', 'Ebonyi', 'Ohaukwu', 224),
('EB', 'Ebonyi', 'Onicha', 225),
('ED', 'Edo', 'Akoko Edo', 226),
('ED', 'Edo', 'Egor', 227),
('ED', 'Edo', 'Esan Central', 228),
('ED', 'Edo', 'Esan North East', 229),
('ED', 'Edo', 'Esan South East', 230),
('ED', 'Edo', 'Esan West', 231),
('ED', 'Edo', 'Etsako Central', 232),
('ED', 'Edo', 'Etsako East', 233),
('ED', 'Edo', 'Etsako  West', 234),
('ED', 'Edo', 'Igueben', 235),
('ED', 'Edo', 'Ikpoba/okha', 236),
('ED', 'Edo', 'Oredo', 237),
('ED', 'Edo', 'Orhionmwon', 238),
('ED', 'Edo', 'Ovia North East', 239),
('ED', 'Edo', 'Ovia South West', 240),
('ED', 'Edo', 'Owan East', 241),
('ED', 'Edo', 'Owan West', 242),
('ED', 'Edo', 'Uhunmwode', 243),
('EK', 'Ekiti', 'Ado Ekiti', 244),
('EK', 'Ekiti', 'Efon', 245),
('EK', 'Ekiti', 'Ekiti East', 246),
('EK', 'Ekiti', 'Ekiti West', 247),
('EK', 'Ekiti', 'Ekiti South West', 248),
('EK', 'Ekiti', 'Emure', 249),
('EK', 'Ekiti', 'Gbonyin', 250),
('EK', 'Ekiti', 'Ido / Osi', 251),
('EK', 'Ekiti', 'Ijero', 252),
('EK', 'Ekiti', 'Ikere', 253),
('EK', 'Ekiti', 'Ikole', 254),
('EK', 'Ekiti', 'Ilejemeje', 255),
('EK', 'Ekiti', 'Irepodun / Ifelodun', 256),
('EK', 'Ekiti', 'Ise / Orun', 257),
('EK', 'Ekiti', 'Moba', 258),
('EK', 'Ekiti', 'Oye', 259),
('EN', 'Enugu', 'Aninri', 260),
('EN', 'Enugu', 'Awgu', 261),
('EN', 'Enugu', 'Enugu East', 262),
('EN', 'Enugu', 'Enugu North', 263),
('EN', 'Enugu', 'Enugu South', 264),
('EN', 'Enugu', 'Ezeagu', 265),
('EN', 'Enugu', 'Igbo Etiti', 266),
('EN', 'Enugu', 'Igbo Eze North', 267),
('EN', 'Enugu', 'Igbo Eze South', 268),
('EN', 'Enugu', 'Isi Uzo', 269),
('EN', 'Enugu', 'Nkanu East', 270),
('EN', 'Enugu', 'Nkanu West', 271),
('EN', 'Enugu', 'Nsukka', 272),
('EN', 'Enugu', 'Oji-river', 273),
('EN', 'Enugu', 'Udenu', 274),
('EN', 'Enugu', 'Udi', 275),
('EN', 'Enugu', 'Uzo-uwani', 276),
('FC', 'Fct', 'Abaji', 277),
('FC', 'Fct', 'Bwari', 278),
('FC', 'Fct', 'Gwagwalada', 279),
('FC', 'Fct', 'Kuje', 280),
('FC', 'Fct', 'Kwali', 281),
('FC', 'Fct', 'Municipal', 282),
('GM', 'Gombe', 'Akko', 283),
('GM', 'Gombe', 'Balanga', 284),
('GM', 'Gombe', 'Billiri', 285),
('GM', 'Gombe', 'Dukku', 286),
('GM', 'Gombe', 'Funakaye', 287),
('GM', 'Gombe', 'Gombe', 288),
('GM', 'Gombe', 'Kaltungo', 289),
('GM', 'Gombe', 'Kwami', 290),
('GM', 'Gombe', 'Nafada', 291),
('GM', 'Gombe', 'Shongom', 292),
('GM', 'Gombe', 'Yalmaltu/ Deba', 293),
('IM', 'Imo', 'Aboh Mbaise', 294),
('IM', 'Imo', 'Ahiazu Mbaise', 295),
('IM', 'Imo', 'Ehime Mbano', 296),
('IM', 'Imo', 'Ezinihitte Mbaise', 297),
('IM', 'Imo', 'Ideato North', 298),
('IM', 'Imo', 'Ideato South', 299),
('IM', 'Imo', 'Ihitte/uboma (isinweke)', 300),
('IM', 'Imo', 'Ikeduru (iho)', 301),
('IM', 'Imo', 'Isiala Mbano (umuelemai)', 302),
('IM', 'Imo', 'Isu (umundugba)', 303),
('IM', 'Imo', 'Mbaitoli (nwaorieubi)', 304),
('IM', 'Imo', 'Ngor Okpala (umuneke)', 305),
('IM', 'Imo', 'Njaba (nnenasa)', 306),
('IM', 'Imo', 'Nkwerre', 307),
('IM', 'Imo', 'Nwangele (onu-nwangele Amaigbo)', 308),
('IM', 'Imo', 'Obowo (otoko)', 309),
('IM', 'Imo', 'Oguta (oguta)', 310),
('IM', 'Imo', 'Ohaji/egbema (mmahu-egbema)', 311),
('IM', 'Imo', 'Okigwe  (okigwe)', 312),
('IM', 'Imo', 'Onuimo (okwe)', 313),
('IM', 'Imo', 'Orlu', 314),
('IM', 'Imo', 'Orsu (awo Idemili)', 315),
('IM', 'Imo', 'Oru-east', 316),
('IM', 'Imo', 'Oru West (mgbidi)', 317),
('IM', 'Imo', 'Owerri Municipal', 318),
('IM', 'Imo', 'Owerri North (orie Uratta)', 319),
('IM', 'Imo', 'Owerri West (umuguma)', 320),
('JG', 'Jigawa', 'Auyo', 321),
('JG', 'Jigawa', 'Babura', 322),
('JG', 'Jigawa', 'Birnin Kudu', 323),
('JG', 'Jigawa', 'Birniwa', 324),
('JG', 'Jigawa', 'Buji', 325),
('JG', 'Jigawa', 'Dutse', 326),
('JG', 'Jigawa', 'Garki', 327),
('JG', 'Jigawa', 'Gagarawa', 328),
('JG', 'Jigawa', 'Gumel', 329),
('JG', 'Jigawa', 'Guri', 330),
('JG', 'Jigawa', 'Gwaram', 331),
('JG', 'Jigawa', 'Gwiwa', 332),
('JG', 'Jigawa', 'Hadejia', 333),
('JG', 'Jigawa', 'Jahun', 334),
('JG', 'Jigawa', 'Kafin Hausa', 335),
('JG', 'Jigawa', 'Kaugama', 336),
('JG', 'Jigawa', 'Kazaure', 337),
('JG', 'Jigawa', 'Kirika Samma', 338),
('JG', 'Jigawa', 'Kiyawa', 339),
('JG', 'Jigawa', 'Maigatari', 340),
('JG', 'Jigawa', 'Malam Madori', 341),
('JG', 'Jigawa', 'Miga', 342),
('JG', 'Jigawa', 'Ringim', 343),
('JG', 'Jigawa', 'Roni', 344),
('JG', 'Jigawa', 'Sule-tankarkar', 345),
('JG', 'Jigawa', 'Taura', 346),
('JG', 'Jigawa', 'Yankwashi', 347),
('KD', 'Kaduna', 'Birnin Gwari', 348),
('KD', 'Kaduna', 'Chikun', 349),
('KD', 'Kaduna', 'Giwa', 350),
('KD', 'Kaduna', 'Igabi', 351),
('KD', 'Kaduna', 'Ikara', 352),
('KD', 'Kaduna', 'Jaba', 353),
('KD', 'Kaduna', 'JEMA''A', 354),
('KD', 'Kaduna', 'Kachia', 355),
('KD', 'Kaduna', 'Kaduna North', 356),
('KD', 'Kaduna', 'Kaduna South', 357),
('KD', 'Kaduna', 'Kagarko', 358),
('KD', 'Kaduna', 'Kajuru', 359),
('KD', 'Kaduna', 'Kaura', 360),
('KD', 'Kaduna', 'Kauru', 361),
('KD', 'Kaduna', 'Kubau', 362),
('KD', 'Kaduna', 'Kudan', 363),
('KD', 'Kaduna', 'Lere', 364),
('KD', 'Kaduna', 'Makarfi', 365),
('KD', 'Kaduna', 'Sabon Gari', 366),
('KD', 'Kaduna', 'Sanga', 367),
('KD', 'Kaduna', 'Soba', 368),
('KD', 'Kaduna', 'Zangon Kataf', 369),
('KD', 'Kaduna', 'Zaria', 370),
('KN', 'Kano', 'Ajingi', 371),
('KN', 'Kano', 'Albasu', 372),
('KN', 'Kano', 'Bagwai', 373),
('KN', 'Kano', 'Bebeji', 374),
('KN', 'Kano', 'Bichi', 375),
('KN', 'Kano', 'Bunkure', 376),
('KN', 'Kano', 'Dala', 377),
('KN', 'Kano', 'Danbata', 378),
('KN', 'Kano', 'Dawaki Kudu', 379),
('KN', 'Kano', 'Dawaki Tofa', 380),
('KN', 'Kano', 'Doguwa', 381),
('KN', 'Kano', 'Fagge', 382),
('KN', 'Kano', 'Gabasawa', 383),
('KN', 'Kano', 'Garko', 384),
('KN', 'Kano', 'Garun Malam', 385),
('KN', 'Kano', 'Gaya', 386),
('KN', 'Kano', 'Gezawa', 387),
('KN', 'Kano', 'Gwale', 388),
('KN', 'Kano', 'Gwarzo', 389),
('KN', 'Kano', 'Kabo', 390),
('KN', 'Kano', 'Kano Municipal', 391),
('KN', 'Kano', 'Karaye', 392),
('KN', 'Kano', 'Kibiya', 393),
('KN', 'Kano', 'Kiru', 394),
('KN', 'Kano', 'Kumbotso', 395),
('KN', 'Kano', 'Kunchi', 396),
('KN', 'Kano', 'Kura', 397),
('KN', 'Kano', 'Madobi', 398),
('KN', 'Kano', 'Makoda', 399),
('KN', 'Kano', 'Minjibir', 400),
('KN', 'Kano', 'Nasarawa', 401),
('KN', 'Kano', 'Rano', 402),
('KN', 'Kano', 'Rimin Gado', 403),
('KN', 'Kano', 'Rogo', 404),
('KN', 'Kano', 'Shanono', 405),
('KN', 'Kano', 'Sumaila', 406),
('KN', 'Kano', 'Takai', 407),
('KN', 'Kano', 'Tarauni', 408),
('KN', 'Kano', 'Tofa', 409),
('KN', 'Kano', 'Tsanyawa', 410),
('KN', 'Kano', 'Tudun Wada', 411),
('KN', 'Kano', 'Ungogo', 412),
('KN', 'Kano', 'Warawa', 413),
('KN', 'Kano', 'Wudil', 414),
('KT', 'Katsina', 'Bakori', 415),
('KT', 'Katsina', 'Batagarawa', 416),
('KT', 'Katsina', 'Batsari', 417),
('KT', 'Katsina', 'Baure', 418),
('KT', 'Katsina', 'Bindawa', 419),
('KT', 'Katsina', 'Charanchi', 420),
('KT', 'Katsina', 'Dandume', 421),
('KT', 'Katsina', 'Danja', 422),
('KT', 'Katsina', 'Dan Musa', 423),
('KT', 'Katsina', 'Daura', 424),
('KT', 'Katsina', 'Dutsi', 425),
('KT', 'Katsina', 'Dutsin-ma', 426),
('KT', 'Katsina', 'Faskari', 427),
('KT', 'Katsina', 'Funtua', 428),
('KT', 'Katsina', 'Ingawa', 429),
('KT', 'Katsina', 'Jibia', 430),
('KT', 'Katsina', 'Kafur', 431),
('KT', 'Katsina', 'Kaita', 432),
('KT', 'Katsina', 'Kankara', 433),
('KT', 'Katsina', 'Kankia', 434),
('KT', 'Katsina', 'Katsina', 435),
('KT', 'Katsina', 'Kurfi', 436),
('KT', 'Katsina', 'Kusada', 437),
('KT', 'Katsina', 'MAI''ADUA', 438),
('KT', 'Katsina', 'Malufashi', 439),
('KT', 'Katsina', 'Mani', 440),
('KT', 'Katsina', 'Mashi', 441),
('KT', 'Katsina', 'Matazu', 442),
('KT', 'Katsina', 'Musawa', 443),
('KT', 'Katsina', 'Rimi', 444),
('KT', 'Katsina', 'Sabuwa', 445),
('KT', 'Katsina', 'Safana', 446),
('KT', 'Katsina', 'Sandamu', 447),
('KT', 'Katsina', 'Zango', 448),
('KB', 'Kebbi', 'Aliero', 449),
('KB', 'Kebbi', 'Arewa', 450),
('KB', 'Kebbi', 'Argungu', 451),
('KB', 'Kebbi', 'Augie', 452),
('KB', 'Kebbi', 'Bagudo', 453),
('KB', 'Kebbi', 'Birnin Kebbi', 454),
('KB', 'Kebbi', 'Bunza', 455),
('KB', 'Kebbi', 'Dandi', 456),
('KB', 'Kebbi', 'Fakai', 457),
('KB', 'Kebbi', 'Gwandu', 458),
('KB', 'Kebbi', 'Jega', 459),
('KB', 'Kebbi', 'Kalgo', 460),
('KB', 'Kebbi', 'Koko/besse', 461),
('KB', 'Kebbi', 'Maiyama', 462),
('KB', 'Kebbi', 'Ngaski', 463),
('KB', 'Kebbi', 'Sakaba', 464),
('KB', 'Kebbi', 'Shanga', 465),
('KB', 'Kebbi', 'Suru', 466),
('KB', 'Kebbi', 'Wasagu/danko', 467),
('KB', 'Kebbi', 'Yauri', 468),
('KB', 'Kebbi', 'Zuru', 469),
('KG', 'Kogi', 'Adavi', 470),
('KG', 'Kogi', 'Ajaokuta', 471),
('KG', 'Kogi', 'Ankpa', 472),
('KG', 'Kogi', 'Bassa', 473),
('KG', 'Kogi', 'Dekina', 474),
('KG', 'Kogi', 'Ibaji', 475),
('KG', 'Kogi', 'Idah', 476),
('KG', 'Kogi', 'Igalamela/odolu', 477),
('KG', 'Kogi', 'Ijumu', 478),
('KG', 'Kogi', 'Kabba/bunu', 479),
('KG', 'Kogi', 'Kogi . K. K.', 480),
('KG', 'Kogi', 'Lokoja', 481),
('KG', 'Kogi', 'Mopa Moro', 482),
('KG', 'Kogi', 'Ofu', 483),
('KG', 'Kogi', 'Ogori Mangogo', 484),
('KG', 'Kogi', 'Okehi', 485),
('KG', 'Kogi', 'Okene', 486),
('KG', 'Kogi', 'Olamaboro', 487),
('KG', 'Kogi', 'Omala', 488),
('KG', 'Kogi', 'Yagba East', 489),
('KG', 'Kogi', 'Yagba West', 490),
('KW', 'Kwara', 'Asa', 491),
('KW', 'Kwara', 'Baruten', 492),
('KW', 'Kwara', 'Edu', 493),
('KW', 'Kwara', 'Ekiti', 494),
('KW', 'Kwara', 'Ifelodun', 495),
('KW', 'Kwara', 'Ilorin East', 496),
('KW', 'Kwara', 'Ilorin-south', 497),
('KW', 'Kwara', 'Ilorin-west', 498),
('KW', 'Kwara', 'Irepodun', 499),
('KW', 'Kwara', 'Isin', 500),
('KW', 'Kwara', 'Kaiama', 501),
('KW', 'Kwara', 'Moro', 502),
('KW', 'Kwara', 'Offa', 503),
('KW', 'Kwara', 'Oke - Ero', 504),
('KW', 'Kwara', 'Oyun', 505),
('KW', 'Kwara', 'Patigi', 506),
('LA', 'Lagos', 'Agege', 507),
('LA', 'Lagos', 'Ajeromi/ifelodun', 508),
('LA', 'Lagos', 'Alimosho', 509),
('LA', 'Lagos', 'Amuwo-odofin', 510),
('LA', 'Lagos', 'Apapa', 511),
('LA', 'Lagos', 'Badagry', 512),
('LA', 'Lagos', 'Epe', 513),
('LA', 'Lagos', 'Eti-osa', 514),
('LA', 'Lagos', 'Ibeju/lekki', 515),
('LA', 'Lagos', 'Ifako-ijaye', 516),
('LA', 'Lagos', 'Ikeja', 517),
('LA', 'Lagos', 'Ikorodu', 518),
('LA', 'Lagos', 'Kosofe', 519),
('LA', 'Lagos', 'Lagos Island', 520),
('LA', 'Lagos', 'Lagos Mainland', 521),
('LA', 'Lagos', 'Mushin', 522),
('LA', 'Lagos', 'Ojo', 523),
('LA', 'Lagos', 'Oshodi/isolo', 524),
('LA', 'Lagos', 'Somolu', 525),
('LA', 'Lagos', 'Surulere', 526),
('NS', 'Nasarawa', 'Akwanga', 527),
('NS', 'Nasarawa', 'Awe', 528),
('NS', 'Nasarawa', 'Doma', 529),
('NS', 'Nasarawa', 'Karu', 530),
('NS', 'Nasarawa', 'Keana', 531),
('NS', 'Nasarawa', 'Keffi', 532),
('NS', 'Nasarawa', 'Kokona', 533),
('NS', 'Nasarawa', 'Lafia', 534),
('NS', 'Nasarawa', 'Nasarawa', 535),
('NS', 'Nasarawa', 'Nasarawa Eggon', 536),
('NS', 'Nasarawa', 'Obi', 537),
('NS', 'Nasarawa', 'Toto', 538),
('NS', 'Nasarawa', 'Wamba', 539),
('NG', 'Niger', 'Agaie', 540),
('NG', 'Niger', 'Agwara', 541),
('NG', 'Niger', 'Bida', 542),
('NG', 'Niger', 'Borgu', 543),
('NG', 'Niger', 'Bosso', 544),
('NG', 'Niger', 'Chanchaga', 545),
('NG', 'Niger', 'Edatti', 546),
('NG', 'Niger', 'Gbako', 547),
('NG', 'Niger', 'Gurara', 548),
('NG', 'Niger', 'Katcha', 549),
('NG', 'Niger', 'Kontagora', 550),
('NG', 'Niger', 'Lapai', 551),
('NG', 'Niger', 'Lavun', 552),
('NG', 'Niger', 'Magama', 553),
('NG', 'Niger', 'Mariga', 554),
('NG', 'Niger', 'Mashegu', 555),
('NG', 'Niger', 'Mokwa', 556),
('NG', 'Niger', 'Munya', 557),
('NG', 'Niger', 'Paikoro', 558),
('NG', 'Niger', 'Rafi', 559),
('NG', 'Niger', 'Rijau', 560),
('NG', 'Niger', 'Shiroro', 561),
('NG', 'Niger', 'Suleja', 562),
('NG', 'Niger', 'Tafa', 563),
('NG', 'Niger', 'Wushishi', 564),
('OG', 'Ogun', 'Abeokuta North', 565),
('OG', 'Ogun', 'Abeokuta South', 566),
('OG', 'Ogun', 'Ado Odo-ota', 567),
('OG', 'Ogun', 'Egbado North', 568),
('OG', 'Ogun', 'Egbado South', 569),
('OG', 'Ogun', 'Ewekoro', 570),
('OG', 'Ogun', 'Ifo', 571),
('OG', 'Ogun', 'Ijebu East', 572),
('OG', 'Ogun', 'Ijebu North', 573),
('OG', 'Ogun', 'Ijebu North East', 574),
('OG', 'Ogun', 'Ijebu Ode', 575),
('OG', 'Ogun', 'Ikenne', 576),
('OG', 'Ogun', 'Imeko/afon', 577),
('OG', 'Ogun', 'Ipokia', 578),
('OG', 'Ogun', 'Obafemi/owode', 579),
('OG', 'Ogun', 'Odeda', 580),
('OG', 'Ogun', 'Odogbolu', 581),
('OG', 'Ogun', 'Ogun Water Side', 582),
('OG', 'Ogun', 'Remo North', 583),
('OG', 'Ogun', 'Sagamu', 584),
('OD', 'Ondo', 'Akoko North East', 585),
('OD', 'Ondo', 'Akoko North West', 586),
('OD', 'Ondo', 'Akoko South East', 587),
('OD', 'Ondo', 'Akoko South West', 588),
('OD', 'Ondo', 'Akure North', 589),
('OD', 'Ondo', 'Akure South', 590),
('OD', 'Ondo', 'Ese-odo', 591),
('OD', 'Ondo', 'Idanre', 592),
('OD', 'Ondo', 'Ifedore', 593),
('OD', 'Ondo', 'Ilaje', 594),
('OD', 'Ondo', 'Ileoluji/okeigbo', 595),
('OD', 'Ondo', 'Irele', 596),
('OD', 'Ondo', 'Odigbo', 597),
('OD', 'Ondo', 'Okitipupa', 598),
('OD', 'Ondo', 'Ondo East', 599),
('OD', 'Ondo', 'Ondo West', 600),
('OD', 'Ondo', 'Ose', 601),
('OD', 'Ondo', 'Owo', 602),
('OS', 'Osun', 'Atakumosa East', 603),
('OS', 'Osun', 'Atakumosa West', 604),
('OS', 'Osun', 'Ayedaade', 605),
('OS', 'Osun', 'Ayedire', 606),
('OS', 'Osun', 'Boluwaduro', 607),
('OS', 'Osun', 'Boripe', 608),
('OS', 'Osun', 'Ede North', 609),
('OS', 'Osun', 'Ede South', 610),
('OS', 'Osun', 'Egbedore', 611),
('OS', 'Osun', 'Ejigbo', 612),
('OS', 'Osun', 'Ife Central', 613),
('OS', 'Osun', 'Ifedayo', 614),
('OS', 'Osun', 'Ife East', 615),
('OS', 'Osun', 'Ifelodun', 616),
('OS', 'Osun', 'Ife North', 617),
('OS', 'Osun', 'Ife South', 618),
('OS', 'Osun', 'Ila', 619),
('OS', 'Osun', 'Ilesa East', 620),
('OS', 'Osun', 'Ilesa West', 621),
('OS', 'Osun', 'Irepodun', 622),
('OS', 'Osun', 'Irewole', 623),
('OS', 'Osun', 'Isokan', 624),
('OS', 'Osun', 'Iwo', 625),
('OS', 'Osun', 'Obokun', 626),
('OS', 'Osun', 'Odo-otin', 627),
('OS', 'Osun', 'Ola-oluwa', 628),
('OS', 'Osun', 'Olorunda', 629),
('OS', 'Osun', 'Oriade', 630),
('OS', 'Osun', 'Orolu', 631),
('OS', 'Osun', 'Osogbo', 632),
('OY', 'Oyo', 'Afijio', 633),
('OY', 'Oyo', 'Akinyele', 634),
('OY', 'Oyo', 'Atiba', 635),
('OY', 'Oyo', 'Atisbo', 636),
('OY', 'Oyo', 'Egbeda', 637),
('OY', 'Oyo', 'Ibadan North', 638),
('OY', 'Oyo', 'Ibadan North East', 639),
('OY', 'Oyo', 'Ibadan North West', 640),
('OY', 'Oyo', 'Ibadan South-east', 641),
('OY', 'Oyo', 'Ibadan South West', 642),
('OY', 'Oyo', 'Ibarapa Central', 643),
('OY', 'Oyo', 'Ibarapa East', 644),
('OY', 'Oyo', 'Ibarapa North', 645),
('OY', 'Oyo', 'Ido', 646),
('OY', 'Oyo', 'Irepo', 647),
('OY', 'Oyo', 'Iseyin', 648),
('OY', 'Oyo', 'Itesiwaju', 649),
('OY', 'Oyo', 'Iwajowa', 650),
('OY', 'Oyo', 'Kajola', 651),
('OY', 'Oyo', 'Lagelu', 652),
('OY', 'Oyo', 'Ogbomoso North', 653),
('OY', 'Oyo', 'Ogbomoso South', 654),
('OY', 'Oyo', 'Ogo-oluwa', 655),
('OY', 'Oyo', 'Olorunsogo', 656),
('OY', 'Oyo', 'Oluyole', 657),
('OY', 'Oyo', 'Ona-ara', 658),
('OY', 'Oyo', 'Oorelope', 659),
('OY', 'Oyo', 'Ori Ire', 660),
('OY', 'Oyo', 'Oyo East', 661),
('OY', 'Oyo', 'Oyo West', 662),
('OY', 'Oyo', 'Saki East', 663),
('OY', 'Oyo', 'Saki West', 664),
('OY', 'Oyo', 'Surulere', 665),
('PL', 'Plateau', 'Jos North', 666),
('PL', 'Plateau', 'Barikin Ladi', 667),
('PL', 'Plateau', 'Bassa', 668),
('PL', 'Plateau', 'Bokkos', 669),
('PL', 'Plateau', 'Jos East', 670),
('PL', 'Plateau', 'Jos South', 671),
('PL', 'Plateau', 'Kanam', 672),
('PL', 'Plateau', 'Kanke', 673),
('PL', 'Plateau', 'Langtang North', 674),
('PL', 'Plateau', 'Langtang South', 675),
('PL', 'Plateau', 'Mangu', 676),
('PL', 'Plateau', 'Mikang', 677),
('PL', 'Plateau', 'Pankshin', 678),
('PL', 'Plateau', 'QUA''AN PAN', 679),
('PL', 'Plateau', 'Riyom', 680),
('PL', 'Plateau', 'Shendam', 681),
('PL', 'Plateau', 'Wase', 682),
('RV', 'Rivers', 'Abua-odual', 683),
('RV', 'Rivers', 'Ahoada East', 684),
('RV', 'Rivers', 'Ahoada West', 685),
('RV', 'Rivers', 'Akuku Toru', 686),
('RV', 'Rivers', 'Andoni', 687),
('RV', 'Rivers', 'Asari-toru', 688),
('RV', 'Rivers', 'Bonny', 689),
('RV', 'Rivers', 'Degema', 690),
('RV', 'Rivers', 'Eleme', 691),
('RV', 'Rivers', 'Emohua', 692),
('RV', 'Rivers', 'Etche', 693),
('RV', 'Rivers', 'Gokana', 694),
('RV', 'Rivers', 'Ikwerre', 695),
('RV', 'Rivers', 'Khana', 696),
('RV', 'Rivers', 'Obio/akpor', 697),
('RV', 'Rivers', 'Ogba/egbema/ndoni', 698),
('RV', 'Rivers', 'Ogu/bolo', 699),
('RV', 'Rivers', 'Okrika', 700),
('RV', 'Rivers', 'Omuma', 701),
('RV', 'Rivers', 'Opobo/nekoro', 702),
('RV', 'Rivers', 'Oyigbo', 703),
('RV', 'Rivers', 'Port Harcourt', 704),
('RV', 'Rivers', 'Tai', 705),
('SO', 'Sokoto', 'Binji', 706),
('SO', 'Sokoto', 'Bodinga', 707),
('SO', 'Sokoto', 'Dange/shuni', 708),
('SO', 'Sokoto', 'Gada', 709),
('SO', 'Sokoto', 'Goronyo', 710),
('SO', 'Sokoto', 'Gudu', 711),
('SO', 'Sokoto', 'Gwadabawa', 712),
('SO', 'Sokoto', 'Illela', 713),
('SO', 'Sokoto', 'Isa', 714),
('SO', 'Sokoto', 'Kware', 715),
('SO', 'Sokoto', 'Kebbe', 716),
('SO', 'Sokoto', 'Rabah', 717),
('SO', 'Sokoto', 'S/birni', 718),
('SO', 'Sokoto', 'Shagari', 719),
('SO', 'Sokoto', 'Silame', 720),
('SO', 'Sokoto', 'Sokoto North', 721),
('SO', 'Sokoto', 'Sokoto South', 722),
('SO', 'Sokoto', 'Tambuwal', 723),
('SO', 'Sokoto', 'Tangaza', 724),
('SO', 'Sokoto', 'Tureta', 725),
('SO', 'Sokoto', 'Wamakko', 726),
('SO', 'Sokoto', 'Wurno', 727),
('SO', 'Sokoto', 'Yabo', 728),
('TR', 'Taraba', 'Ardo - Kola', 729),
('TR', 'Taraba', 'Bali', 730),
('TR', 'Taraba', 'Donga', 731),
('TR', 'Taraba', 'Gashaka', 732),
('TR', 'Taraba', 'Gassol', 733),
('TR', 'Taraba', 'Ibi', 734),
('TR', 'Taraba', 'Jalingo', 735),
('TR', 'Taraba', 'Karim-lamido', 736),
('TR', 'Taraba', 'Kurmi', 737),
('TR', 'Taraba', 'Lau', 738),
('TR', 'Taraba', 'Sardauna', 739),
('TR', 'Taraba', 'Takum', 740),
('TR', 'Taraba', 'Ussa', 741),
('TR', 'Taraba', 'Wukari', 742),
('TR', 'Taraba', 'Yorro', 743),
('TR', 'Taraba', 'Zing', 744),
('YB', 'Yobe', 'Bade', 745),
('YB', 'Yobe', 'Bursari', 746),
('YB', 'Yobe', 'Damaturu', 747),
('YB', 'Yobe', 'Fika', 748),
('YB', 'Yobe', 'Fune', 749),
('YB', 'Yobe', 'Geidam', 750),
('YB', 'Yobe', 'Gujba', 751),
('YB', 'Yobe', 'Gulani', 752),
('YB', 'Yobe', 'Jakusko', 753),
('YB', 'Yobe', 'Karasawa', 754),
('YB', 'Yobe', 'Machina', 755),
('YB', 'Yobe', 'Nangere', 756),
('YB', 'Yobe', 'Nguru', 757),
('YB', 'Yobe', 'Potiskum', 758),
('YB', 'Yobe', 'Tarmuwa', 759),
('YB', 'Yobe', 'Yunusari', 760),
('YB', 'Yobe', 'Yusufari', 761),
('ZM', 'Zamfara', 'Anka', 762),
('ZM', 'Zamfara', 'Bakura', 763),
('ZM', 'Zamfara', 'Birnin Magaji', 764),
('ZM', 'Zamfara', 'Bukkuyum', 765),
('ZM', 'Zamfara', 'Bungudu', 766),
('ZM', 'Zamfara', 'Gummi', 767),
('ZM', 'Zamfara', 'Gusau', 768),
('ZM', 'Zamfara', 'Kaura Namoda', 769),
('ZM', 'Zamfara', 'Maradun', 770),
('ZM', 'Zamfara', 'Maru', 771),
('ZM', 'Zamfara', 'Shinkafi', 772),
('ZM', 'Zamfara', 'Talata Mafara', 773),
('ZM', 'Zamfara', 'Tsafe', 774),
('ZM', 'Zamfara', 'Zurmi', 775);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allocation`
--
ALTER TABLE `allocation`
  ADD PRIMARY KEY (`S/No`);

--
-- Indexes for table `babies`
--
ALTER TABLE `babies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `babysitter`
--
ALTER TABLE `babysitter`
  ADD PRIMARY KEY (`S/No`);

--
-- Indexes for table `log_in`
--
ALTER TABLE `log_in`
  ADD PRIMARY KEY (`S/No`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`S/No`);

--
-- Indexes for table `qualification`
--
ALTER TABLE `qualification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`S/No`);

--
-- Indexes for table `states_lga`
--
ALTER TABLE `states_lga`
  ADD PRIMARY KEY (`sn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allocation`
--
ALTER TABLE `allocation`
  MODIFY `S/No` int(25) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `babies`
--
ALTER TABLE `babies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `babysitter`
--
ALTER TABLE `babysitter`
  MODIFY `S/No` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `log_in`
--
ALTER TABLE `log_in`
  MODIFY `S/No` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `S/No` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `qualification`
--
ALTER TABLE `qualification`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `S/No` int(25) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `states_lga`
--
ALTER TABLE `states_lga`
  MODIFY `sn` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=776;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
