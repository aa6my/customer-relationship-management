-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2014 at 04:00 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `crmv2`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
`address_id` smallint(10) unsigned NOT NULL,
  `address_line1` varchar(255) NOT NULL,
  `address_line2` varchar(255) DEFAULT NULL,
  `address_state` varchar(100) DEFAULT NULL,
  `address_postcode` varchar(10) NOT NULL,
  `country_id` smallint(10) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1003 ;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `address_line1`, `address_line2`, `address_state`, `address_postcode`, `country_id`, `last_update`) VALUES
(1002, '', NULL, NULL, '', 0, '2014-10-26 12:06:11');

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE IF NOT EXISTS `calendar` (
  `date` date NOT NULL,
  `data` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`date`, `data`) VALUES
('2014-10-15', 'Test123'),
('2014-10-21', 'Raining'),
('2014-10-23', 'tst');

-- --------------------------------------------------------

--
-- Table structure for table `catproduct`
--

CREATE TABLE IF NOT EXISTS `catproduct` (
`catproduct_id` int(5) NOT NULL,
  `catproduct_name` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `catproduct`
--

INSERT INTO `catproduct` (`catproduct_id`, `catproduct_name`) VALUES
(1, 'Electronic'),
(2, 'COSMETIC'),
(3, 'SERVICES');

-- --------------------------------------------------------

--
-- Table structure for table `config_data`
--

CREATE TABLE IF NOT EXISTS `config_data` (
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config_data`
--

INSERT INTO `config_data` (`key`, `value`) VALUES
('charset', 'utf-8'),
('debug', 'FALSE'),
('email', 'YOUR EMAIL'),
('emailpassword', 'YOUR EMAIL PASSWORD'),
('mailtype', 'html'),
('newline', '\\r\\n'),
('protocol', 'smtp'),
('sitedescription', 'Hell Yeah!'),
('sitename', 'SeGi MiDae'),
('smtp_host', 'ssl://smtp.googlemail.com'),
('smtp_port', '465'),
('smtp_timeout', '30'),
('timezone', 'Asia/Kuala_Lumpur'),
('wordwrap', 'TRUE');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
`contact_id` int(10) NOT NULL,
  `contact_fname` varchar(50) NOT NULL,
  `contact_lname` int(50) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `contact_phone` varchar(20) NOT NULL,
  `contact_mobile` varchar(20) NOT NULL,
  `contact_fax` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
`country_id` int(11) NOT NULL,
  `country_iso` char(2) NOT NULL,
  `country_name` varchar(80) NOT NULL,
  `country_nicename` varchar(80) NOT NULL,
  `country_iso3` char(3) DEFAULT NULL,
  `country_numcode` smallint(6) DEFAULT NULL,
  `country_phonecode` int(5) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=240 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_iso`, `country_name`, `country_nicename`, `country_iso3`, `country_numcode`, `country_phonecode`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL, 0),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, 0),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, 246),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56),
(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, 61),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, 672),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 242),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506),
(53, 'CI', 'COTE D''IVOIRE', 'Cote D''Ivoire', 'CIV', 384, 225),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250, 33),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, 0),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, 0),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354),
(99, 'IN', 'INDIA', 'India', 'IND', 356, 91),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE''S REPUBLIC OF', 'Korea, Democratic People''s Republic of', 'PRK', 408, 850),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996),
(116, 'LA', 'LAO PEOPLE''S DEMOCRATIC REPUBLIC', 'Lao People''s Democratic Republic', 'LAO', 418, 856),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, 269),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, 970),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595),
(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612, 0),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 70),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, 381),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL, 0),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, 670),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, 1),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
`customer_id` int(5) NOT NULL,
  `customer_name` varchar(250) NOT NULL,
  `customer_firstname` varchar(50) NOT NULL,
  `customer_lastname` varchar(50) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_phone` varchar(20) NOT NULL,
  `customer_mobile` varchar(20) NOT NULL,
  `customer_fax` varchar(20) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_postcode` varchar(7) NOT NULL,
  `customer_state` varchar(30) NOT NULL,
  `country_id` smallint(10) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_firstname`, `customer_lastname`, `customer_email`, `customer_phone`, `customer_mobile`, `customer_fax`, `customer_address`, `customer_postcode`, `customer_state`, `country_id`, `last_update`) VALUES
(1, 'Johny1', 'Johny jr1', 'Deep1', 'jr@yahoo1.com', '0987676561', '0167876761', '0987876761', 'kb test1', '16801', 'kelantan1', 129, '2014-11-05 04:12:33'),
(2, 'abu', '', '', '', '', '', '', '', '', '', 0, '2014-11-24 01:47:37');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
`id` int(10) unsigned NOT NULL,
  `title` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `body` text COLLATE utf8_spanish_ci NOT NULL,
  `class` varchar(45) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'info',
  `start` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `end` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
`file_id` int(5) NOT NULL,
  `file_name` varchar(30) NOT NULL,
  `file_content` mediumblob NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`file_id`, `file_name`, `file_content`, `last_update`) VALUES
(1, 'asdad', 0x35313732622d6c6963656e73652e747874, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE IF NOT EXISTS `invoices` (
`invoice_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL COMMENT 'from customer table',
  `invoice_subject` text NOT NULL,
  `invoice_date_created` date NOT NULL,
  `invoice_number` varchar(50) NOT NULL,
  `invoice_customer_notes` longtext NOT NULL,
  `invoice_valid_until` date NOT NULL,
  `invoice_status` int(5) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`invoice_id`, `customer_id`, `invoice_subject`, `invoice_date_created`, `invoice_number`, `invoice_customer_notes`, `invoice_valid_until`, `invoice_status`) VALUES
(11, 1, 'website development1', '2014-11-25', '10001', 'this is quotaion1', '2014-11-24', 1),
(12, 1, 'website development1', '2014-11-25', '10002', 'this is quotaion1', '2014-11-24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoices_test`
--

CREATE TABLE IF NOT EXISTS `invoices_test` (
`invoice_id` int(5) NOT NULL,
  `invoice_total` mediumint(9) NOT NULL,
  `invoice_date` date NOT NULL,
  `invoice_status` varchar(20) NOT NULL COMMENT '1-paid, 2-unpaid'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=121 ;

--
-- Dumping data for table `invoices_test`
--

INSERT INTO `invoices_test` (`invoice_id`, `invoice_total`, `invoice_date`, `invoice_status`) VALUES
(1, 100, '2014-11-18', '1'),
(2, 2000, '2014-11-13', '2'),
(3, 100, '2014-11-15', '1'),
(4, 2000, '2014-11-03', '2'),
(5, 300, '2014-10-22', '1'),
(6, 800, '2014-11-07', '2'),
(7, 700, '2014-11-01', '1'),
(8, 400, '2014-11-02', '2'),
(9, 900, '2014-11-03', '1'),
(10, 2000, '2014-11-04', '2'),
(11, 3400, '2014-11-05', '1'),
(12, 56000, '2014-11-06', '2'),
(13, 700, '2014-11-07', '1'),
(14, 700, '2014-11-08', '1'),
(15, 400, '2014-11-09', '2'),
(16, 900, '2014-11-10', '1'),
(17, 2000, '2014-11-11', '2'),
(18, 3400, '2014-11-12', '1'),
(19, 56000, '2014-11-13', '2'),
(20, 700, '2014-11-14', '1'),
(21, 9000, '2014-11-15', '2'),
(22, 5400, '2014-11-16', '1'),
(23, 12000, '2014-11-17', '2'),
(24, 2300, '2014-11-18', '1'),
(25, 5000, '2014-11-19', '2'),
(26, 6600, '2014-11-20', '1'),
(27, 7800, '2014-11-21', '2'),
(28, 100, '2014-11-22', '1'),
(29, 2000, '2014-11-23', '2'),
(30, 100, '2014-11-23', '1'),
(31, 2000, '2014-11-24', '2'),
(32, 100, '2014-11-25', '1'),
(33, 2000, '2014-11-26', '2'),
(34, 100, '2014-11-27', '1'),
(35, 3200, '2014-11-28', '2'),
(36, 3400, '2014-11-29', '1'),
(37, 4000, '2014-11-30', '2'),
(38, 800, '2014-10-01', '1'),
(39, 600, '2014-10-02', '2'),
(40, 900, '2014-10-03', '1'),
(41, 8900, '2014-10-04', '2'),
(42, 560, '2014-10-05', '1'),
(43, 2000, '2014-10-06', '2'),
(44, 100, '2014-10-07', '1'),
(45, 2000, '2014-10-08', '2'),
(46, 100, '2014-10-09', '1'),
(47, 2000, '2014-10-11', '2'),
(48, 100, '2014-10-12', '1'),
(50, 120, '2013-04-01', '1'),
(51, 4500, '2013-04-02', '2'),
(52, 780, '2013-04-03', '1'),
(53, 5600, '2013-04-04', '2'),
(54, 3400, '2013-04-05', '1'),
(55, 2100, '2013-04-06', '2'),
(56, 340, '2013-04-07', '1'),
(57, 6700, '2013-04-08', '2'),
(58, 100, '2013-04-09', '1'),
(59, 2000, '2013-04-10', '2'),
(60, 100, '2013-04-11', '1'),
(61, 2000, '2013-04-12', '2'),
(62, 100, '2013-04-13', '1'),
(63, 2000, '2013-04-14', '2'),
(64, 100, '2013-04-15', '1'),
(65, 2000, '2013-04-16', '2'),
(66, 100, '2013-04-17', '1'),
(67, 600, '2013-04-18', '2'),
(68, 100, '2013-05-01', '1'),
(69, 5600, '2013-05-02', '2'),
(70, 100, '2013-05-03', '1'),
(71, 2000, '2013-05-04', '2'),
(72, 100, '2013-05-05', '1'),
(73, 2000, '2013-05-06', '2'),
(74, 340, '2013-05-07', '1'),
(75, 2300, '2013-05-08', '2'),
(76, 100, '2013-05-09', '1'),
(77, 2000, '2013-05-10', '2'),
(78, 100, '2013-05-11', '1'),
(79, 2000, '2013-05-12', '2'),
(80, 100, '2013-05-13', '1'),
(81, 2000, '2013-05-14', '2'),
(82, 100, '2013-05-15', '1'),
(83, 2000, '2013-05-16', '2'),
(84, 100, '2013-05-17', '1'),
(85, 2000, '2013-05-18', '2'),
(86, 100, '2013-05-19', '1'),
(87, 2000, '2013-05-20', '2'),
(88, 340, '2013-05-21', '1'),
(89, 2000, '2013-05-22', '2'),
(90, 100, '2013-05-23', '1'),
(91, 2000, '2013-05-24', '2'),
(92, 5600, '2013-05-25', '1'),
(93, 3400, '2012-07-01', '2'),
(94, 100, '2012-07-02', '1'),
(95, 7800, '2012-07-03', '2'),
(96, 100, '2012-07-04', '1'),
(97, 2000, '2012-07-05', '2'),
(98, 100, '2012-07-06', '1'),
(99, 2000, '2012-07-07', '2'),
(100, 100, '2012-07-08', '1'),
(101, 2600, '2012-07-09', '2'),
(102, 120, '2012-07-10', '1'),
(103, 2000, '2012-07-11', '2'),
(104, 1220, '2012-07-12', '1'),
(105, 3400, '2012-07-13', '2'),
(106, 700, '2012-07-14', '1'),
(107, 700, '2012-07-15', '1'),
(108, 400, '2012-07-16', '2'),
(109, 900, '2012-07-17', '1'),
(110, 2000, '2012-07-18', '2'),
(111, 3400, '2012-07-19', '1'),
(112, 56000, '2012-07-20', '2'),
(113, 700, '2012-07-21', '1'),
(114, 9000, '2012-07-22', '2'),
(115, 5400, '2012-07-23', '1'),
(116, 12000, '2012-07-24', '2'),
(117, 2300, '2012-07-25', '1'),
(118, 5000, '2012-07-26', '2'),
(119, 6600, '2012-07-27', '1'),
(120, 7800, '2012-07-28', '2');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_items`
--

CREATE TABLE IF NOT EXISTS `invoice_items` (
`invoice_item_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL COMMENT 'from invoice table',
  `product_id` int(5) NOT NULL DEFAULT '0' COMMENT 'from product table',
  `invoice_item_name` varchar(300) NOT NULL,
  `invoice_item_description` text NOT NULL,
  `invoice_item_price` double NOT NULL,
  `invoice_item_quantity` double NOT NULL,
  `invoice_item_discount` double NOT NULL,
  `invoice_item_subtotal` int(5) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `invoice_items`
--

INSERT INTO `invoice_items` (`invoice_item_id`, `invoice_id`, `product_id`, `invoice_item_name`, `invoice_item_description`, `invoice_item_price`, `invoice_item_quantity`, `invoice_item_discount`, `invoice_item_subtotal`) VALUES
(5, 11, 1, '[Electronic] Gerrad Lamp', 'Lamp...', 23, 4, 0, 92),
(6, 11, 3, '[COSMETIC] JAMU', 'Give strength for your body', 45, 7, 0, 315),
(7, 12, 1, '[Electronic] Gerrad Lamp', 'Lamp...', 23, 4, 0, 92),
(8, 12, 3, '[COSMETIC] JAMU', 'Give strength for your body', 45, 7, 0, 315);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
`job_id` int(5) NOT NULL,
  `customer_id` int(5) NOT NULL,
  `website_id` int(5) NOT NULL,
  `job_title` varchar(20) NOT NULL,
  `job_date_start` date NOT NULL,
  `job_start_time` time NOT NULL,
  `job_end_time` time NOT NULL,
  `job_due_date` date NOT NULL,
  `job_complete_date` date NOT NULL,
  `user_id` int(5) NOT NULL COMMENT 'from user_meta table',
  `job_tax` int(5) NOT NULL,
  `job_currency` int(5) NOT NULL,
  `job_type_id` int(5) NOT NULL COMMENT 'from table JOB_TYPES',
  `job_status` varchar(10) NOT NULL,
  `job_description` text NOT NULL,
  `job_note` text NOT NULL,
  `job_hour` double NOT NULL,
  `job_amount` int(5) NOT NULL,
  `job_quote_date` date NOT NULL,
  `job_renewal_date` date NOT NULL,
  `job_task_type` int(5) NOT NULL,
  `job_discount_amount` int(5) NOT NULL,
  `job_discount_name` varchar(50) NOT NULL,
  `job_discount_type` int(5) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `customer_id`, `website_id`, `job_title`, `job_date_start`, `job_start_time`, `job_end_time`, `job_due_date`, `job_complete_date`, `user_id`, `job_tax`, `job_currency`, `job_type_id`, `job_status`, `job_description`, `job_note`, `job_hour`, `job_amount`, `job_quote_date`, `job_renewal_date`, `job_task_type`, `job_discount_amount`, `job_discount_name`, `job_discount_type`, `last_update`) VALUES
(14, 1, 1, 'web services1', '2014-11-07', '12:45:00', '11:23:00', '2014-11-12', '2014-11-13', 1, 5, 0, 2, '1', 'do a lot of CRM tasks', 'we need to regroup this one', 5, 0, '2014-11-06', '2014-11-15', 1, 5, 'this is discount name', 1, '2014-11-16 16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `jobs_task`
--

CREATE TABLE IF NOT EXISTS `jobs_task` (
`job_task_id` int(5) NOT NULL,
  `job_id` int(5) NOT NULL COMMENT 'from JOBS table',
  `product_id` int(5) NOT NULL DEFAULT '0',
  `job_task_hour` int(5) NOT NULL,
  `job_task_amount` int(5) NOT NULL,
  `job_task_due_date` date NOT NULL,
  `user_id` int(5) NOT NULL COMMENT 'from USER_META table',
  `job_task_percentage` int(5) NOT NULL COMMENT '0-untick(0 percent), 1-tick(100 percent)',
  `job_task_description` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=233 ;

--
-- Dumping data for table `jobs_task`
--

INSERT INTO `jobs_task` (`job_task_id`, `job_id`, `product_id`, `job_task_hour`, `job_task_amount`, `job_task_due_date`, `user_id`, `job_task_percentage`, `job_task_description`) VALUES
(223, 14, 3, 7, 45, '0000-00-00', 1, 0, '[COSMETIC] JAMU'),
(225, 14, 0, 4, 20, '2014-11-12', 1, 1, 'fghfgh'),
(226, 14, 2, 3, 34, '0000-00-00', 1, 0, '[Electronic] shaklee'),
(229, 14, 4, 5, 12, '0000-00-00', 1, 0, '[SERVICES] MOVE STUFF');

-- --------------------------------------------------------

--
-- Table structure for table `job_types`
--

CREATE TABLE IF NOT EXISTS `job_types` (
`job_type_id` int(5) NOT NULL,
  `job_type_name` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `job_types`
--

INSERT INTO `job_types` (`job_type_id`, `job_type_name`) VALUES
(1, 'Web development'),
(2, 'Developing CRM');

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE IF NOT EXISTS `leads` (
`lead_id` smallint(6) NOT NULL,
  `lead_name` varchar(250) NOT NULL,
  `lead_firstname` varchar(50) NOT NULL,
  `lead_lastname` varchar(50) NOT NULL,
  `lead_email` varchar(50) NOT NULL,
  `lead_phone` varchar(20) NOT NULL,
  `lead_mobile` varchar(20) NOT NULL,
  `lead_fax` varchar(20) NOT NULL,
  `lead_address` text NOT NULL,
  `lead_postcode` varchar(7) NOT NULL,
  `lead_state` varchar(30) NOT NULL,
  `country_id` smallint(10) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`lead_id`, `lead_name`, `lead_firstname`, `lead_lastname`, `lead_email`, `lead_phone`, `lead_mobile`, `lead_fax`, `lead_address`, `lead_postcode`, `lead_state`, `country_id`, `last_update`) VALUES
(1, 'hazmi', 'norli', 'lihazmey', 'nnn@yahoo.com', '0126787656', '0126787656', '09876545', 'sdfsdf\r\n', '16800', 'kelantan', 129, '2014-11-05 02:06:01');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
`member_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL DEFAULT '',
  `last_name` varchar(255) NOT NULL DEFAULT '',
  `business` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `phone` varchar(255) NOT NULL DEFAULT '',
  `mobile` varchar(255) NOT NULL DEFAULT '',
  `date_created` date NOT NULL,
  `date_updated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`product_id` int(5) NOT NULL,
  `product_sku` varchar(20) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_desc` text NOT NULL,
  `product_quantity` int(5) NOT NULL,
  `product_amount` int(5) NOT NULL,
  `catproduct_id` int(5) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_sku`, `product_name`, `product_desc`, `product_quantity`, `product_amount`, `catproduct_id`) VALUES
(1, 'GLS3310', 'Gerrad Lamp', 'Lamp...', 4, 23, 1),
(2, '234234234', 'shaklee', 'all the medicine related', 3, 34, 1),
(3, '555555', 'JAMU', 'Give strength for your body', 7, 45, 2),
(4, '999999', 'MOVE STUFF', 'Move your stuff into another place', 5, 12, 3);

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE IF NOT EXISTS `quotes` (
`quote_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL COMMENT 'from customer table',
  `quote_subject` varchar(300) NOT NULL,
  `quote_date_created` date NOT NULL,
  `quote_valid_until` date NOT NULL,
  `quote_discount` double NOT NULL,
  `quote_customer_notes` text NOT NULL,
  `quote_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0-draft,1-approved,2-rejected,3-canceled'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`quote_id`, `customer_id`, `quote_subject`, `quote_date_created`, `quote_valid_until`, `quote_discount`, `quote_customer_notes`, `quote_status`) VALUES
(10, 1, 'website development1', '2014-11-23', '2014-11-24', 0, 'this is quotaion1', 1),
(11, 0, 'fgg', '2014-11-25', '2014-11-27', 0, 'ttt', 0);

-- --------------------------------------------------------

--
-- Table structure for table `quote_items`
--

CREATE TABLE IF NOT EXISTS `quote_items` (
`quote_item_id` int(11) NOT NULL,
  `quote_id` int(11) NOT NULL COMMENT 'from quote table',
  `product_id` int(5) NOT NULL DEFAULT '0' COMMENT 'from product table',
  `quote_item_name` varchar(300) NOT NULL,
  `quote_item_description` text NOT NULL,
  `quote_item_price` double NOT NULL,
  `quote_item_quantity` double NOT NULL,
  `quote_item_discount` double NOT NULL,
  `quote_item_subtotal` int(5) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `quote_items`
--

INSERT INTO `quote_items` (`quote_item_id`, `quote_id`, `product_id`, `quote_item_name`, `quote_item_description`, `quote_item_price`, `quote_item_quantity`, `quote_item_discount`, `quote_item_subtotal`) VALUES
(10, 10, 1, '[Electronic] Gerrad Lamp', 'Lamp...', 23, 4, 0, 92),
(11, 10, 3, '[COSMETIC] JAMU', 'Give strength for your body', 45, 7, 0, 315),
(12, 11, 1, '[Electronic] Gerrad Lamp', 'Lamp...', 23, 4, 2, 90),
(13, 11, 3, '[COSMETIC] JAMU', 'Give strength for your body', 45, 7, 3, 312);

-- --------------------------------------------------------

--
-- Table structure for table `system_users`
--

CREATE TABLE IF NOT EXISTS `system_users` (
`id` bigint(20) unsigned NOT NULL,
  `email` varchar(254) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(160) COLLATE utf8_bin DEFAULT NULL,
  `salt` varchar(160) COLLATE utf8_bin DEFAULT NULL,
  `user_role_id` int(10) DEFAULT NULL,
  `last_login` datetime DEFAULT '0000-00-00 00:00:00',
  `last_login_ip` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `reset_request_code` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `reset_request_time` datetime DEFAULT NULL,
  `reset_request_ip` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `verification_status` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `system_users`
--

INSERT INTO `system_users` (`id`, `email`, `password`, `salt`, `user_role_id`, `last_login`, `last_login_ip`, `reset_request_code`, `reset_request_time`, `reset_request_ip`, `verification_status`, `status`) VALUES
(1, 'admin@admin.com', '8e666f12a66c17a952a1d5e273428e478e02d943', '4f6cdddc4979b8.51434094', 1, '2014-11-25 01:52:30', '::1', NULL, NULL, NULL, 1, 1),
(2, 'test@test.com', '75452472672901921027f997beb8d48a8a955aca', '546c71c87ea164.62588652', 1, '2014-11-19 11:33:12', '::1', NULL, NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_map`
--

CREATE TABLE IF NOT EXISTS `user_access_map` (
  `user_role_id` int(10) NOT NULL,
  `controller` varchar(255) COLLATE utf8_bin NOT NULL,
  `permission` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user_access_map`
--

INSERT INTO `user_access_map` (`user_role_id`, `controller`, `permission`) VALUES
(1, 'admin/welcome', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_autologin`
--

CREATE TABLE IF NOT EXISTS `user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `user_meta`
--

CREATE TABLE IF NOT EXISTS `user_meta` (
  `user_id` bigint(20) unsigned NOT NULL,
  `first_name` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `last_name` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user_meta`
--

INSERT INTO `user_meta` (`user_id`, `first_name`, `last_name`, `phone`) VALUES
(1, 'Saiful', 'Nizam', NULL),
(2, 'First', 'Last', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
`id` int(5) unsigned NOT NULL,
  `role_name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `default_access` varchar(10) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role_name`, `default_access`) VALUES
(1, 'Admin', '11111'),
(2, 'Staff', '11111');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE IF NOT EXISTS `vendors` (
`vendor_id` smallint(10) unsigned NOT NULL,
  `vendor_name` varchar(250) NOT NULL,
  `vendor_firstname` varchar(50) NOT NULL,
  `vendor_lastname` varchar(50) NOT NULL,
  `vendor_email` varchar(50) NOT NULL,
  `vendor_phone` varchar(20) NOT NULL,
  `vendor_mobile` varchar(20) NOT NULL,
  `vendor_fax` varchar(20) NOT NULL,
  `vendor_address` text NOT NULL,
  `vendor_postcode` varchar(7) NOT NULL,
  `vendor_state` varchar(30) NOT NULL,
  `country_id` smallint(10) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=211 ;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`vendor_id`, `vendor_name`, `vendor_firstname`, `vendor_lastname`, `vendor_email`, `vendor_phone`, `vendor_mobile`, `vendor_fax`, `vendor_address`, `vendor_postcode`, `vendor_state`, `country_id`, `last_update`) VALUES
(208, 'Johnas Co. Ltd.', 'Saiful Nizam', 'Nordin', 'aa6my@qq.com', '+601111538495', '+601111538495', '+601111538495', 'NO 12A, Jalan UB2,\r\nTaman Ukay Bestari,\r\nHulu Kelang', '68000', 'Selangor', 129, '2014-10-30 11:02:26'),
(209, 'Perfect Wire Ltd.', 'Michael', 'Ng', 'michaelng@perfectwire.com', '+6233333333', '+6233333333', '+6233333333', 'Test Test\r\nTest Test\r\nTest Test', '80000', 'Singapore', 192, '2014-10-30 11:04:56'),
(210, 'Abrahain Co. Ltd', 'John', 'Bandon', 'test@test.com', '+60175358455', '+60175358455', '+60175358455', 'Test Test\r\nTest Test\r\nTest Test', '80000', 'Selangor', 129, '2014-10-30 11:06:09');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_address`
--

CREATE TABLE IF NOT EXISTS `vendor_address` (
  `address_id` int(10) NOT NULL,
  `vendor_id` int(10) NOT NULL,
  `priority` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `websites`
--

CREATE TABLE IF NOT EXISTS `websites` (
`website_id` int(5) NOT NULL,
  `website_url` varchar(20) NOT NULL,
  `website_name` varchar(20) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `websites`
--

INSERT INTO `websites` (`website_id`, `website_url`, `website_name`, `last_update`) VALUES
(1, 'aaaa1.com', 'aaa1 ventures', '2014-11-05 02:32:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
 ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
 ADD PRIMARY KEY (`date`);

--
-- Indexes for table `catproduct`
--
ALTER TABLE `catproduct`
 ADD PRIMARY KEY (`catproduct_id`);

--
-- Indexes for table `config_data`
--
ALTER TABLE `config_data`
 ADD PRIMARY KEY (`key`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
 ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
 ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
 ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
 ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
 ADD PRIMARY KEY (`invoice_id`), ADD UNIQUE KEY `invoice_number` (`invoice_number`);

--
-- Indexes for table `invoices_test`
--
ALTER TABLE `invoices_test`
 ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `invoice_items`
--
ALTER TABLE `invoice_items`
 ADD PRIMARY KEY (`invoice_item_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
 ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `jobs_task`
--
ALTER TABLE `jobs_task`
 ADD PRIMARY KEY (`job_task_id`);

--
-- Indexes for table `job_types`
--
ALTER TABLE `job_types`
 ADD PRIMARY KEY (`job_type_id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
 ADD PRIMARY KEY (`lead_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
 ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
 ADD PRIMARY KEY (`quote_id`);

--
-- Indexes for table `quote_items`
--
ALTER TABLE `quote_items`
 ADD PRIMARY KEY (`quote_item_id`);

--
-- Indexes for table `system_users`
--
ALTER TABLE `system_users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_map`
--
ALTER TABLE `user_access_map`
 ADD PRIMARY KEY (`user_role_id`,`controller`);

--
-- Indexes for table `user_autologin`
--
ALTER TABLE `user_autologin`
 ADD PRIMARY KEY (`key_id`,`user_id`);

--
-- Indexes for table `user_meta`
--
ALTER TABLE `user_meta`
 ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
 ADD PRIMARY KEY (`vendor_id`);

--
-- Indexes for table `websites`
--
ALTER TABLE `websites`
 ADD PRIMARY KEY (`website_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
MODIFY `address_id` smallint(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1003;
--
-- AUTO_INCREMENT for table `catproduct`
--
ALTER TABLE `catproduct`
MODIFY `catproduct_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
MODIFY `contact_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=240;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
MODIFY `customer_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
MODIFY `file_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `invoices_test`
--
ALTER TABLE `invoices_test`
MODIFY `invoice_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=121;
--
-- AUTO_INCREMENT for table `invoice_items`
--
ALTER TABLE `invoice_items`
MODIFY `invoice_item_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
MODIFY `job_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `jobs_task`
--
ALTER TABLE `jobs_task`
MODIFY `job_task_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=233;
--
-- AUTO_INCREMENT for table `job_types`
--
ALTER TABLE `job_types`
MODIFY `job_type_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
MODIFY `lead_id` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `product_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
MODIFY `quote_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `quote_items`
--
ALTER TABLE `quote_items`
MODIFY `quote_item_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `system_users`
--
ALTER TABLE `system_users`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
MODIFY `id` int(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
MODIFY `vendor_id` smallint(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=211;
--
-- AUTO_INCREMENT for table `websites`
--
ALTER TABLE `websites`
MODIFY `website_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
