-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2025 at 07:55 AM
-- Server version: 10.11.10-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u943886398_myDb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `mobile_number` bigint(20) NOT NULL,
  `otp` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`, `admin_name`, `mobile_number`, `otp`) VALUES
(1, 'salvishiv04@gmail.com', 'shiv1234', 'Admin', 9876543210, 281638),
(2, 'kishan8866866105@gmail.com', 'Polo@1476', 'Krish', 1234567890, 0),
(3, 'ps6186274@gmail.com', 'Polo@1476', 'Patel Shiv', 9104802392, 273061),
(4, 'harshsoni.5900@gmail.com', 'Polo@1476', 'Harsh', 9574507505, 778805);

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `area_id` int(11) NOT NULL,
  `area_name` varchar(100) NOT NULL,
  `pincode` int(11) NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`area_id`, `area_name`, `pincode`, `city_id`) VALUES
(1, 'Adajan', 395009, 1),
(2, 'Pal', 394510, 1),
(3, 'Rander', 395005, 1),
(4, 'Mahidharpura', 395003, 1),
(5, 'Zampabajar', 395003, 1),
(6, 'Salabatpura', 395002, 1),
(7, 'Rampura', 394445, 1),
(8, 'Jahangirpura', 395005, 1),
(9, 'Vesu', 395007, 1);

-- --------------------------------------------------------

--
-- Table structure for table `availability`
--

CREATE TABLE `availability` (
  `availability_id` int(11) NOT NULL,
  `vender_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vender_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `event_date` date NOT NULL,
  `status` int(100) NOT NULL,
  `amount_paid` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_policy`
--

CREATE TABLE `booking_policy` (
  `policy_id` int(11) NOT NULL,
  `policy_name` varchar(50) NOT NULL,
  `vender_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `business_info`
--

CREATE TABLE `business_info` (
  `business_id` int(11) NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `mobile_number` varchar(20) DEFAULT NULL,
  `email_id` varchar(255) DEFAULT NULL,
  `visiting_card` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `business_license` varchar(255) DEFAULT NULL,
  `vender_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_info`
--

INSERT INTO `business_info` (`business_id`, `business_name`, `location`, `area_id`, `mobile_number`, `email_id`, `visiting_card`, `logo`, `business_license`, `vender_id`) VALUES
(1, 'Asian Paint', 'bhagal', 1, '986543210', 'ap@gmail.com', 'Asian Paint_', 'Asian Paint_ap.png', 'Asian Paint_', 1),
(2, 'enterprise', 'pal', 2, '8000911043', 'rahul@gmail.com', 'enterprise_', 'enterprise_enterprise.jpeg', 'enterprise_', 2),
(3, 'maruti suzuki enterprise', 'rampura', 7, '8866866104', 'bhadresh12@gmail.com', 'maruti suzuki enterprise_', 'maruti suzuki enterprise_maruti.webp', 'maruti suzuki enterprise_', 4),
(4, 'netx cards shop', 'adajan ganmora complex ', 2, '9664642646', 'krish1208@gmail.com', 'netx cards shop_user.jpg', 'netx cards shop_icard.jpg', 'netx cards shop_passpic.jpg', 5),
(5, 'Krishna beauty parlour', 'rander', 5, '8980122120', 'kishan123@gmail.com', 'Krishna beauty parlour_', 'Krishna beauty parlour_download.jpg', 'Krishna beauty parlour_', 6),
(6, 'zalak beauty parlour', 'sagrampura,surat', 5, '9512535286', 'krishna@gmail.com', 'zalak beauty parlour_Screenshot (47).png', 'zalak beauty parlour_download.jpg', 'zalak beauty parlour_Screenshot 2025-02-22 183131.png', 6),
(7, 'Lucky Mehandi Art', 'Adajan', 5, '9876543210', 'lucky@gmail.com', 'Lucky Mehandi Art_', 'Lucky Mehandi Art_', 'Lucky Mehandi Art_', 6),
(8, 'DJ Prem', 'Bhagal Bundelawad', 5, '986532147', 'djprem@gmail.com', 'DJ Prem_', 'DJ Prem_', 'DJ Prem_', 7),
(9, 'pandit kevin', 'bhagal', 7, '7862837867', 'panditkevin@gmail.com', 'pandit kevin_', 'pandit kevin_', 'pandit kevin_', 8),
(10, 'kevin caterers', '3/3333, kanbi seri', 5, '1234567890', 'kevin@gmail.com', 'kevin caterers_4.jpeg', 'kevin caterers_CCC.jpg', 'kevin caterers_4.jpeg', 9),
(11, 'kalu caterers', '3/3332, dudhara seri', 4, '9087456123', 'kalu@gmail.com', 'kalu caterers_4.jpeg', 'kalu caterers_4.jpeg', 'kalu caterers_4.jpeg', 10),
(12, 'sodhi garage', 'pal', 2, '7894563210', 'sodhi123@gmail.com', 'sodhi garage_', 'sodhi garage_car-rent.jpg', 'sodhi garage_car-renta.jpg', 12);

-- --------------------------------------------------------

--
-- Table structure for table `business_social_info`
--

CREATE TABLE `business_social_info` (
  `business_id` int(11) NOT NULL,
  `insta_id` int(11) NOT NULL,
  `facebook_id` int(11) NOT NULL,
  `telegram_link` varchar(200) NOT NULL,
  `whatsapp_business` varchar(200) NOT NULL,
  `youtube_chennel` varchar(250) NOT NULL,
  `website_url` varchar(200) NOT NULL,
  `google_my_business` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_social_info`
--

INSERT INTO `business_social_info` (`business_id`, `insta_id`, `facebook_id`, `telegram_link`, `whatsapp_business`, `youtube_chennel`, `website_url`, `google_my_business`) VALUES
(9, 0, 0, '', '', '', '', ''),
(10, 0, 0, '', '', '', '', ''),
(11, 0, 0, '', '', '', '', ''),
(12, 0, 0, '', '', '', '', ''),
(13, 0, 0, '', '', '', '', ''),
(14, 0, 0, '', '', '', '', ''),
(16, 0, 0, '', '', '', '', ''),
(17, 0, 0, '', '', '', '', ''),
(19, 0, 0, '', '', '', '', ''),
(20, 0, 0, '', '', '', '', ''),
(21, 0, 0, '', '', '', '', ''),
(22, 0, 0, '', '', '', '', ''),
(23, 0, 0, '', '', '', '', ''),
(1, 0, 0, '', '', '', '', ''),
(2, 0, 0, '', '', '', '', ''),
(3, 0, 0, '', '', '', '', ''),
(4, 0, 0, '', '', '', '', ''),
(5, 0, 0, '', '', '', '', ''),
(6, 0, 0, '', '', '', '', ''),
(7, 0, 0, '', '', '', '', ''),
(8, 0, 0, '', '', '', '', ''),
(9, 0, 0, '', '', '', '', ''),
(10, 0, 0, '', '', '', '', ''),
(11, 0, 0, '', '', '', '', ''),
(12, 0, 0, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`) VALUES
(1, 'surat');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `amount` bigint(20) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vender_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review_text` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(100) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `service_name`, `category_id`, `description`) VALUES
(2, 'veg/non-veg caterng', 5, 'non veg catering is provide'),
(3, 'Buffet setup', 5, 'Buffet setup s provided '),
(5, 'Bridal Makeup', 2, 'Bridal Makeup could be done by ladius'),
(6, 'Party Makeup', 2, 'Party Makeup could be made by artists.'),
(7, 'Airbrush Makeup', 2, 'Airbrush Makeup could be done by brushing'),
(8, 'Hair styling', 2, 'Hair styling makeup   services '),
(9, 'Bollywood DJ', 3, 'Bollywood Dj uses for only bollywood songs'),
(10, 'Club Music', 3, 'club music service are available'),
(11, 'Sangeet Night ', 3, 'in sangeet night Dj only sangeet music are uses\r\n '),
(12, 'Traditional Dholi', 3, 'Traditional dhol are available for dholak'),
(13, 'Floral Decorators', 7, 'floral decorators are used for flower decorators'),
(14, 'Stage setup', 7, 'Stage decorators used for decorating multiple flowers'),
(15, 'Themed  Wedding', 7, 'in wedding multiple themes are available for it'),
(17, 'Bridal Mehandi', 4, 'bridal mehandi is a type of womens mehandi like arabic , dulhan mehandi.'),
(18, 'Full wedding planning', 10, 'full wedding planners plan for weddings.'),
(19, 'Budget Planning', 10, 'budget planning are set the budget after select catagories'),
(20, 'Destination wedding', 10, 'A destination wedding is a wedding ceremony held in a location'),
(21, '3d Mehandi', 4, '3D Mehndi designs create an illusion of depth with bold outlines, shading, and layering techniques. These designs often feature raised patterns, intricate detailing, and a mix of traditional and modern motifs.'),
(22, 'Pre-wedding shoot', 11, 'A pre-wedding shoot is a professional photography session that takes place before the wedding day,'),
(23, 'wedding photography', 11, ' Wedding photography is the art of capturing the most cherished moments of a couple’s special day,'),
(24, 'Candid photography', 11, 'Candid photography is all about capturing natural, unposed moments'),
(25, 'videography', 11, 'videography is a one part of video shooting'),
(26, 'Banquet hall', 9, 'A banquet hall is a spacious and well-equipped venue designed to host weddings, receptions, corporate events, and special celebrations.'),
(27, 'Outdoor lawns', 9, 'An outdoor lawn is a beautiful and spacious venue option for weddings, receptions, and special events, offering a scenic and open-air setting'),
(28, 'Destination venue', 9, 'A destination wedding venue is a special location'),
(29, 'Hotels and villas', 9, 'Choosing between a hotel or a villa for your wedding or event depends on the size, style,'),
(30, 'Hindu Religion', 13, 'A Hindu Pandit (or Priest) plays a vital role in conducting religious rituals, especially during weddings and other significant ceremonies.\r\n'),
(31, 'Christian Religion', 13, 'Christian is the religious leader who conducts the wedding ceremony. '),
(32, 'Wedding Rituals', 13, 'Wedding rituals are the sacred and symbolic traditions that make the union of two individuals meaningful. '),
(34, 'Diamond Designer Jewellery', 14, 'Diamond Designer Jewellery is a luxurious and exclusive collection of handcrafted pieces, featuring diamonds as the central element, often combined with intricate designs and precious metals like gold, platinum, or silver.'),
(35, 'Gold Jewellery', 14, 'Gold Jewellery is a timeless and elegant collection of accessories made primarily from gold, a precious metal known for its beauty, durability, and value.'),
(36, 'Gold Antique Jewellery', 14, 'Gold Antique Jewellery refers to heirloom pieces made from gold that have been crafted in ancient or vintage styles, often with intricate detailing, ornate designs, and a sense of history.'),
(37, 'Silver Fusion and Antique Jewellery', 14, 'Silver Fusion and Antique Jewelry blends the elegance of silver with unique, vintage, or traditional elements, creating pieces that reflect both contemporary and classic designs. These pieces often incorporate a mix of metals, gemstones, and artistic'),
(38, 'Traditional wedding cards', 8, 'printed, handmade ,calligraphy'),
(39, 'Digital wedding', 8, 'pdf,animated,e-invites\r\n'),
(40, 'whatsapp and email invitation', 8, 'to invites by whatsapp and email'),
(41, 'Multi language wedding cards', 8, 'multi languages to invite cards such as hindi,english etc.'),
(42, 'Luxury cars', 17, 'in wedding ceremony ,luxury cars are available for rental'),
(43, 'Baarat Entry Cars', 17, 'TO RENT THE CARS BY ENTRY '),
(44, 'Live band', 16, 'live band provides services for entertainment\r\n'),
(45, 'Fireworks', 16, 'in wedding ceremony, to provide fireworks '),
(46, 'Wedding favors', 15, 'Wedding favors are small gifts given to guests as a token of appreciation for attending the wedding.'),
(47, 'Cusotmized hampers', 15, 'Customized hampers are a fantastic wedding favor idea!'),
(48, 'Bridal lehangas', 12, 'Bridal lehengas are a statement piece for any wedding,'),
(49, 'Groom sherwanies', 12, 'Groom sherwanis are the epitome of elegance and tradition, making the groom stand out on his big day'),
(50, 'on rent', 12, 'to wearing clothes for wedding ceremony it will gives the clothes on rent \r\n'),
(51, 'bridal & groom couple dance', 6, 'A bride and groom’s first dance is one of the most magical moments of a wedding'),
(52, 'Family and group performance', 6, 'A family and group dance at a wedding is a fantastic way to bring energy and excitement to the celebration!'),
(58, 'n b ', 6, 'b vb\r\n'),
(59, 'Birthday celebration', 7, 'many type celebration'),
(60, 'live counter', 5, 'live food can be served'),
(61, 'live counter', 5, 'live food can be served'),
(63, 'horse carriage ', 17, 'riding on carriage instead of walking'),
(64, 'Mehandi Design', 4, ' Mehandi (henna) is an integral part of wedding ceremonies in many cultures. It is applied to the bride’s hands and feet in intricate designs that symbolize love, prosperity, and happiness'),
(71, 'Arabian Mehandi', 4, 'It Is Unique Types Of Mehandi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` bigint(50) NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `name`, `phone`, `created_at`) VALUES
(1, 'salvishiv04@gmail.com', 'shiv12345', 'shiv', 9099763322, '0000-00-00 00:00:00'),
(2, 'devrana109@gmail.com', 'dev@1357', 'dev rana', 9874560321, '2025-02-27 05:28:42'),
(3, 'harshsoni.5900@gmail.com', '123456', 'harsh', 9876543210, '0000-00-00 00:00:00'),
(4, 'patelma519@gmail.com', 'patel@12345', 'mayur', 9865471230, '0000-00-00 00:00:00'),
(5, 'ombaruwala@gmail.com', 'om@123', 'om', 3692581470, '0000-00-00 00:00:00'),
(6, 'fahadvohra143@gmail.com', '123456', 'fahad', 8401495064, '0000-00-00 00:00:00'),
(7, 'kthakkar56@gmail.com', 'krish@1234', 'krish', 2581473690, '0000-00-00 00:00:00'),
(8, 'patelma519@gmail.com', 'mayur@1234', 'mayur', 7894561230, '0000-00-00 00:00:00'),
(9, 'krish@gmail.com', '123456', 'krish', 123456, '0000-00-00 00:00:00'),
(10, 'abc@gmail.com', '1234', 'abc12', 9999999999, '0000-00-00 00:00:00'),
(11, 'kishantailor@gmail.com', '123456', 'kishan', 8866866104, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vender_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile_number` bigint(50) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `address` varchar(150) NOT NULL,
  `area_id` int(11) DEFAULT NULL,
  `profile_pic` varchar(200) NOT NULL,
  `verification_status` int(11) NOT NULL,
  `aadhar_photo` varchar(150) NOT NULL,
  `pancard_photo` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL,
  `varify_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vender_id`, `email`, `password`, `name`, `mobile_number`, `category_id`, `address`, `area_id`, `profile_pic`, `verification_status`, `aadhar_photo`, `pancard_photo`, `created_at`, `varify_at`) VALUES
(1, 'asianpaint@gmail.com', 'Polo@120', 'Asian Paint', 9876543210, 7, 'Delhi gate', 1, '', 1, '', '', '2025-03-01 00:00:00', '0000-00-00 00:00:00'),
(2, 'rahul@gmail.com', '123456', 'rahul', 8000911043, 3, 'rander', 3, '', 1, '', '', '2025-03-01 00:00:00', '0000-00-00 00:00:00'),
(3, 'om123@gmail.com', 'Polo@120', 'om', 12345600, 11, 'bhagal main road', 5, '', 0, '', '', '2025-03-03 00:00:00', '0000-00-00 00:00:00'),
(4, 'bhadresh@gmail.com', '12345', 'Bhadresh286', 9512535286, 17, 'sagrampura,surat', 2, '', 0, '', '', '2025-03-05 05:43:05', '2025-03-05 05:43:05'),
(5, 'krish1208@gmail.com', '12345', 'krish', 1234567890, 8, 'tn &tv school near by Rampura', 7, '', 0, '', '', '2025-03-03 00:00:00', '0000-00-00 00:00:00'),
(6, 'aarti@gmail.com', 'Polo@120', 'Aarti', 9876546321, 4, 'Begampura', 6, '', 0, '', '', '2025-03-04 00:00:00', '0000-00-00 00:00:00'),
(7, 'prem@gmail.com', '123456', 'Prem', 9876543210, 3, 'Mancharpura', 7, '', 0, '', '', '2025-03-05 00:00:00', '0000-00-00 00:00:00'),
(8, 'kevin1208@gmail.com', '123456', 'kevin', 7862837897, 13, 'malhar seri', 7, '', 0, '', '', '2025-03-05 00:00:00', '0000-00-00 00:00:00'),
(9, 'kevin@gmail.com', '123456', 'kevin', 1234567890, 5, '3/3333, kanbi seri', 6, '', 0, '', '', '2025-03-06 00:00:00', '0000-00-00 00:00:00'),
(10, 'kalu@gmail.com', '123456', 'prem kalu', 9087456123, 5, '3/3332, dudhara seri', 4, '', 0, '', '', '2025-03-06 00:00:00', '0000-00-00 00:00:00'),
(11, 'ramu12@gmail.com', 'ramu123', 'Ramu', 9874563121, 8, '4/2007,Dangi sheri,surat', 2, '', 0, '', '', '2025-03-07 00:00:00', '0000-00-00 00:00:00'),
(12, 'sodhi123@gmail.com', 'sodhi123', 'sodhi ', 7894562130, 17, 'a-201,gokuldham society,powder gali', 2, '', 0, '', '', '2025-03-07 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_categories`
--

CREATE TABLE `vendor_categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_image` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_categories`
--

INSERT INTO `vendor_categories` (`category_id`, `category_name`, `category_image`, `description`) VALUES
(2, 'Makeup Artist', '../images/vendors_service/bridal-makeup-artists.jpg', 'make up are bad for health'),
(3, 'DJ', '../images/vendors_service/dj.jpg', 'Direct Jannat'),
(4, 'Mehandi Artist', '../images/vendors_service/mehndi-artists.jpg', 'demo'),
(5, 'CATERING', '../images/vendors_service/catering.jpg', 'good vegetarian '),
(6, 'choreographers', '../images/vendors_service/choreographers.jpg', 'VERIOUS TYPES AVILABLE'),
(7, 'decorators', '../images/vendors_service/wedding-decorators.jpg', 'VARIOUS TYPES MANDAP DECORECATION OPTION AVILABEL'),
(8, 'cards', '../images/vendors_service/wedding-cards.jpg', 'DIFFERENT TYPE LOGO AVILABEL'),
(9, 'venues', '../images/vendors_service/wedding-venues.jpg', 'MANY PLACES AVILABLE'),
(10, 'planners', '../images/vendors_service/wedding-planners.jpg', 'DIFRENT PLANNER AVILABLE'),
(11, 'photographers', '../images/vendors_service/wedding-photographers.jpg', 'MANY TYPES OF PHOTOGRAPHY'),
(12, 'wear', '../images/vendors_service/wedding-wear.jpg', 'DIFFERNT TYPES CLOTHES AVILABLE'),
(13, 'pandits', '../images/vendors_service/wedding-pandits.jpg', 'DIFFERENT TYPES RELIGON PANDIT AVILABLE'),
(14, 'jewellery', '../images/vendors_service/wedding-jewellery.jpg', 'DIFFERENT TPES JEWELLERY AVILABLE'),
(15, 'gifts', '../images/vendors_service/wedding-gifts.jpg', 'VARIOUS TYPES GIFTS AVILABLE'),
(16, 'entertainment', '../images/vendors_service/wedding-entertainment.jpg', 'VARIOUS TYPES ENTERTAINMENT'),
(17, 'cars-rental', '../images/vendors_service/wedding-cars-rental.jpg', 'MANY TYPES OF CAR AVILABLE');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_wise_business`
--

CREATE TABLE `vendor_wise_business` (
  `vender_id` int(50) NOT NULL,
  `business_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_wise_business`
--

INSERT INTO `vendor_wise_business` (`vender_id`, `business_id`) VALUES
(1, 3),
(2, 1),
(1, 4),
(3, 5),
(4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_wise_services`
--

CREATE TABLE `vendor_wise_services` (
  `vendor_ws_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `vender_id` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `description` varchar(100) NOT NULL,
  `cover_image` varchar(100) NOT NULL DEFAULT 'cover_image/no.jpg',
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_wise_services`
--

INSERT INTO `vendor_wise_services` (`vendor_ws_id`, `service_id`, `vender_id`, `price`, `description`, `cover_image`, `status`) VALUES
(1, 0, 7, 0, '', 'conver_image/no.jpg', 1),
(2, 9, 7, 150000, '', 'cover_image/no.jpg', 1),
(3, 10, 7, 12000, '', 'cover_image/no.jpg', 1),
(4, 11, 7, 0, '', 'cover_image/no.jpg', 0),
(5, 12, 7, 0, '', 'cover_image/no.jpg', 0),
(7, 14, 1, 22000, '', 'cover_image/ss.jpg', 1),
(8, 15, 1, 5000, '', 'cover_image/2.jpg', 1),
(10, 30, 8, 10000, '', 'cover_image/pandit.jpg', 1),
(11, 31, 8, 2000, '', 'cover_image/mn.jpg', 1),
(12, 32, 8, 30000, '', 'cover_image/pandit1.jpg', 1),
(13, 17, 6, 12000, '', 'cover_image/mm.jpg', 1),
(14, 21, 6, 5000, '', 'cover_image/no.jpg', 0),
(15, 64, 6, 4000, '', 'cover_image/no.jpg', 1),
(16, 71, 6, 6000, '', 'cover_image/no.jpg', 0),
(17, 13, 1, 0, '', 'cover_image/flor.jpg', 0),
(18, 59, 1, 0, '', 'cover_image/birthday.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_wise_work_image`
--

CREATE TABLE `vendor_wise_work_image` (
  `image_id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  `image_url` varchar(200) DEFAULT NULL,
  `image_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_wise_work_image`
--

INSERT INTO `vendor_wise_work_image` (`image_id`, `album_id`, `image_url`, `image_name`) VALUES
(9, 8, NULL, 'bridal mehandi.jpg'),
(10, 2, NULL, 'birthday.webp'),
(11, 2, NULL, '111.png'),
(14, 8, NULL, 'IMG_20230115_202152.webp'),
(16, 8, NULL, '1000063658.jpg'),
(19, 9, NULL, '2.avif'),
(20, 9, NULL, '3.webp'),
(21, 9, NULL, '4.avif'),
(22, 9, NULL, '5.avif'),
(23, 9, NULL, '6.webp'),
(24, 10, NULL, '11.avif'),
(25, 10, NULL, '12.jpg'),
(26, 10, NULL, '13.jpg'),
(27, 10, NULL, '15.jpg'),
(28, 10, NULL, 'IMG_20230115_201827.jpg'),
(29, 8, NULL, 'IMG_20230115_201814.jpg'),
(30, 8, NULL, 'IMG_20230115_201715.webp'),
(31, 8, NULL, 'IMG_20230115_202202.avif'),
(32, 8, NULL, 'IMG_20230115_201652.jpg'),
(33, 1, NULL, 'stage1.avif'),
(34, 1, NULL, 'stage2.avif'),
(35, 1, NULL, 'stage3.webp'),
(36, 1, NULL, 'stage4.avif'),
(37, 11, NULL, 'bridal.avif'),
(38, 1, NULL, 'stage5.webp'),
(39, 1, NULL, 'stage6.webp'),
(40, 11, NULL, 'bridal1.webp'),
(41, 12, NULL, 'des1.avif'),
(42, 12, NULL, 'des2.jpg'),
(43, 12, NULL, 'des3.jpg'),
(44, 12, NULL, 'des4.jpg'),
(45, 12, NULL, 'des5.avif'),
(46, 12, NULL, 'des6.avif'),
(47, 13, NULL, 'bmw.jpeg'),
(48, 13, NULL, 'cars.avif'),
(49, 14, NULL, 'meh1.jpg'),
(50, 14, NULL, 'meh2.jpg'),
(51, 14, NULL, 'meh3.jpg'),
(52, 14, NULL, 'meh5.jpg'),
(53, 14, NULL, 'meh4.jpg'),
(54, 15, NULL, 'cabe.jpeg'),
(55, 15, NULL, 'taxi.jpg'),
(56, 14, NULL, 'meh6.jpg'),
(57, 13, NULL, 'hyndai.avif'),
(58, 13, NULL, 'odi.jpg'),
(59, 17, NULL, 'pre-wed.jpg'),
(60, 17, NULL, 'pre-wedding.jpg'),
(61, 16, NULL, 'wed1.jpg'),
(62, 16, NULL, 'wed2.jpg'),
(63, 16, NULL, 'wed3.jpg'),
(64, 16, NULL, 'wed4.jpg'),
(65, 16, NULL, 'wed5.jpg'),
(66, 16, NULL, 'wed6.jpg'),
(67, 16, NULL, 'wed7.jpg'),
(68, 16, NULL, 'wed8.jpg'),
(69, 16, NULL, 'wed9.jpg'),
(70, 16, NULL, 'wed10.jpg'),
(71, 16, NULL, 'wed11.jpg'),
(72, 16, NULL, 'wed12.jpg'),
(73, 16, NULL, 'wed13.jpg'),
(74, 16, NULL, 'wed15.jpg'),
(75, 16, NULL, 'wed16.jpg'),
(76, 16, NULL, 'wed17.jpg'),
(77, 16, NULL, 'wed18.jpg'),
(78, 16, NULL, 'wed14.jpg'),
(83, 7, NULL, 'bollywood dj.jpeg'),
(84, 7, NULL, 'bollywood dj-1.jpg'),
(85, 7, NULL, 'club music.jpg'),
(87, 7, NULL, 'club music-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_wise_work_video`
--

CREATE TABLE `vendor_wise_work_video` (
  `album_id` int(11) NOT NULL,
  `video_url` varchar(200) NOT NULL,
  `video_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_work_album`
--

CREATE TABLE `vendor_work_album` (
  `album_id` int(11) NOT NULL,
  `album_name` varchar(100) NOT NULL,
  `vender_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_work_album`
--

INSERT INTO `vendor_work_album` (`album_id`, `album_name`, `vender_id`) VALUES
(1, 'Stage Decoration Work', 1),
(2, 'Birthday Celebration Work', 1),
(7, 'Dj vala album', 2),
(8, 'Mehandi Design', 6),
(9, '3d Mehandi design', 6),
(10, 'Arabin Mehandi design', 6),
(11, 'Bridal mehandi', 6),
(12, 'destination wedding work', 1),
(13, 'Car-rental ', 4),
(14, 'Mehndi Stage Work', 1),
(15, 'cab wale', 4),
(16, 'Wedding Decoration', 1),
(17, 'Pre-wedding photo shoot', 3),
(18, 'Baby shower', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `availability`
--
ALTER TABLE `availability`
  ADD PRIMARY KEY (`availability_id`),
  ADD KEY `vendor_id` (`vender_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `vendor_id` (`vender_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `booking_policy`
--
ALTER TABLE `booking_policy`
  ADD PRIMARY KEY (`policy_id`),
  ADD KEY `vendor_id` (`vender_id`);

--
-- Indexes for table `business_info`
--
ALTER TABLE `business_info`
  ADD PRIMARY KEY (`business_id`),
  ADD KEY `business_info_ibfk_1` (`vender_id`);

--
-- Indexes for table `business_social_info`
--
ALTER TABLE `business_social_info`
  ADD KEY `business_id` (`business_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `booking_id` (`booking_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `vendor_id` (`vender_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `Category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vender_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `area_id` (`area_id`);

--
-- Indexes for table `vendor_categories`
--
ALTER TABLE `vendor_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `vendor_wise_services`
--
ALTER TABLE `vendor_wise_services`
  ADD PRIMARY KEY (`vendor_ws_id`);

--
-- Indexes for table `vendor_wise_work_image`
--
ALTER TABLE `vendor_wise_work_image`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `vendor_wise_work_image_ibfk_1` (`album_id`);

--
-- Indexes for table `vendor_work_album`
--
ALTER TABLE `vendor_work_album`
  ADD PRIMARY KEY (`album_id`),
  ADD KEY `vender_id` (`vender_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `availability`
--
ALTER TABLE `availability`
  MODIFY `availability_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `business_info`
--
ALTER TABLE `business_info`
  MODIFY `business_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vender_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `vendor_categories`
--
ALTER TABLE `vendor_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `vendor_wise_services`
--
ALTER TABLE `vendor_wise_services`
  MODIFY `vendor_ws_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `vendor_wise_work_image`
--
ALTER TABLE `vendor_wise_work_image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `vendor_work_album`
--
ALTER TABLE `vendor_work_album`
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `availability`
--
ALTER TABLE `availability`
  ADD CONSTRAINT `availability_ibfk_1` FOREIGN KEY (`vender_id`) REFERENCES `vendor` (`vender_id`);

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`vender_id`) REFERENCES `vendor` (`vender_id`),
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`service_id`) REFERENCES `service` (`service_id`);

--
-- Constraints for table `booking_policy`
--
ALTER TABLE `booking_policy`
  ADD CONSTRAINT `booking_policy_ibfk_1` FOREIGN KEY (`vender_id`) REFERENCES `vendor` (`vender_id`);

--
-- Constraints for table `business_social_info`
--
ALTER TABLE `business_social_info`
  ADD CONSTRAINT `business_social_info_ibfk_1` FOREIGN KEY (`business_id`) REFERENCES `business_info` (`business_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`booking_id`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`vender_id`) REFERENCES `vendor` (`vender_id`);

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `Category_id` FOREIGN KEY (`category_id`) REFERENCES `vendor_categories` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `vendor`
--
ALTER TABLE `vendor`
  ADD CONSTRAINT `vendor_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `vendor_categories` (`category_id`),
  ADD CONSTRAINT `vendor_ibfk_2` FOREIGN KEY (`area_id`) REFERENCES `area` (`area_id`);

--
-- Constraints for table `vendor_wise_services`
--
ALTER TABLE `vendor_wise_services`
  ADD CONSTRAINT `vendor_wise_services_ibfk_1` FOREIGN KEY (`vender_id`) REFERENCES `vendor` (`vender_id`);

--
-- Constraints for table `vendor_wise_work_image`
--
ALTER TABLE `vendor_wise_work_image`
  ADD CONSTRAINT `vendor_wise_work_image_ibfk_1` FOREIGN KEY (`album_id`) REFERENCES `vendor_work_album` (`album_id`);

--
-- Constraints for table `vendor_work_album`
--
ALTER TABLE `vendor_work_album`
  ADD CONSTRAINT `vendor_work_album_ibfk_1` FOREIGN KEY (`vender_id`) REFERENCES `vendor` (`vender_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
