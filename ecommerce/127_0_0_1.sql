-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2024 at 10:54 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `23189650`
--
CREATE DATABASE IF NOT EXISTS `23189650` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `23189650`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `userpassword` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `username`, `userpassword`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `Id` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `PName` varchar(255) NOT NULL,
  `PPrice` decimal(10,2) NOT NULL,
  `PQuantity` int(11) NOT NULL,
  `TotalPrice` decimal(10,2) GENERATED ALWAYS AS (`PPrice` * `PQuantity`) STORED,
  `status` varchar(50) DEFAULT 'in cart',
  `added_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`Id`, `UserId`, `PName`, `PPrice`, `PQuantity`, `status`, `added_date`) VALUES
(2, 5, 'Premium Drumset', 150000.00, 1, 'in cart', '2024-06-19 11:42:02'),
(3, 5, 'Fender Telecaster', 80000.00, 1, 'in cart', '2024-06-19 12:04:06'),
(4, 5, 'Acoustic Bass', 35000.00, 1, 'in cart', '2024-06-19 12:10:13'),
(7, 5, 'lespaul', 200000.00, 1, 'in cart', '2024-06-19 20:53:59'),
(8, 8, 'lespaul', 200000.00, 2, 'in cart', '2024-06-19 23:59:25'),
(9, 8, 'Fender Telecaster', 80000.00, 1, 'in cart', '2024-06-19 23:53:56'),
(10, 5, 'Fender Stratocaster', 4200.00, 4, 'in cart', '2024-06-22 11:45:16'),
(11, 5, 'vox amplifier', 895.00, 1, 'in cart', '2024-06-21 23:08:07'),
(12, 5, 'Lespaul Guitar', 5600.00, 1, 'in cart', '2024-06-21 23:17:41');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Id` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `PName` varchar(255) NOT NULL,
  `PPrice` decimal(10,2) NOT NULL,
  `PQuantity` int(11) NOT NULL,
  `TotalPrice` decimal(10,2) NOT NULL,
  `status` varchar(50) NOT NULL,
  `ordered_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Id`, `UserId`, `PName`, `PPrice`, `PQuantity`, `TotalPrice`, `status`, `ordered_date`) VALUES
(1, 1, 'Fender guitar', 120000.00, 1, 120000.00, 'Delivered', '2024-06-15 15:27:38'),
(2, 0, 'Fender guitar', 120000.00, 1, 120000.00, 'On the Way', '2024-06-16 17:41:50'),
(3, 0, 'Fender guitar', 120000.00, 2, 240000.00, 'Delivered', '2024-06-17 10:07:58'),
(4, 5, 'Fender guitar', 120000.00, 3, 360000.00, 'orderplace', '2024-06-17 10:11:42'),
(5, 5, 'ac dc guitar', 90000.00, 3, 270000.00, 'orderplace', '2024-06-19 05:05:05'),
(6, 5, 'ac dc guitar', 90000.00, 1, 90000.00, 'orderplace', '2024-06-19 05:22:42'),
(7, 5, 'Fender Telecaster', 80000.00, 1, 80000.00, 'orderplace', '2024-06-19 05:24:51'),
(8, 5, 'Fender Telecaster', 80000.00, 1, 80000.00, 'orderplace', '2024-06-19 06:19:08'),
(9, 5, 'Acoustic Bass', 35000.00, 1, 35000.00, 'orderplace', '2024-06-19 06:25:44'),
(10, 8, 'lespaul', 200000.00, 1, 200000.00, 'orderplace', '2024-06-19 18:07:43'),
(11, 8, 'Fender Telecaster', 80000.00, 1, 80000.00, 'orderplace', '2024-06-19 18:09:00'),
(12, 8, 'lespaul', 200000.00, 1, 200000.00, 'On the Way', '2024-06-19 18:14:29'),
(13, 5, 'Fender Stratocaster', 4200.00, 2, 8400.00, 'On the Way', '2024-06-20 19:11:14'),
(14, 5, 'Fender Stratocaster', 4200.00, 1, 4200.00, 'On the Way', '2024-06-21 17:22:34'),
(15, 5, 'Lespaul Guitar', 5600.00, 1, 5600.00, 'Delivered', '2024-06-21 17:32:44'),
(16, 5, 'Fender Stratocaster', 4200.00, 1, 4200.00, 'orderplace', '2024-06-22 06:00:25');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Id` int(11) NOT NULL,
  `PName` varchar(255) NOT NULL,
  `PPrice` decimal(10,2) NOT NULL,
  `PImage` varchar(255) NOT NULL,
  `PCategory` varchar(50) NOT NULL,
  `PDescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Id`, `PName`, `PPrice`, `PImage`, `PCategory`, `PDescription`) VALUES
(30, 'Lespaul Guitar', 5800.00, 'Uploadimage/guitar5.png', 'Guitar', '\"Les Paul,\" is one of the most iconic electric guitars in the history of music. Known for its distinctive appearance and rich, resonant sound, the Les Paul Sunburst has been a favorite among guitarists since its introduction by Gibson in the 1950s.'),
(31, 'Fender Stratocaster', 4200.00, 'Uploadimage/Guitar-3.png', 'Guitar', '\"Strat,\" is one of the most iconic and enduring electric guitars in the world. Known for its sleek design, versatile sound, and groundbreaking features, the Stratocaster has left an indelible mark on music since its introduction by Fender in 1954.'),
(32, 'Fender Telecaster', 4600.00, 'Uploadimage/guitar4.png', 'Guitar', '\"Tele,\" is one of the most influential and iconic electric guitars in the history of modern music. Introduced by Fender in the early 1950s.'),
(43, 'Taylor F44', 898.00, 'Uploadimage/614ce-LTD Armrest Natural.jpg', 'Guitar', 'The Taylor guitar boasts a Classic Dreadnought body that produces a powerful and expansive sound. Its solid torrefied spruce top provides warmth and bold projection, simulating the resonant qualities of a well-aged instrument. Designed with a Taylor neck, it offers a comfortable fretting experience, facilitating smooth playability across the fretboard. The Plus edition of this guitar comes equipped with upgraded appointments and includes an AeroCase for added protection and convenience. Additionally, it features a built-in ES2 acoustic pickup, allowing for effortless amplification whether performing live or recording in a studio setting.'),
(44, 'Ibanez K-11', 698.00, 'Uploadimage/Ibanez PF Series PF15ECE Dreadnought Cutaway Acoustic-Electric Cutaway Guitar Gloss Blac.jpg', 'Guitar', 'Slim, single-cutaway bodies of the AEG Series produce a balanced, strong acoustic sound whether used unplugged or via an amplifier or public address system. These guitars are high-quality workhorse acoustic guitars that can handle any situation thanks to their simple electronics, traditional solid and sunburst finishes, and easy playing. Ibanez preamps with inbuilt tuners and premium under-saddle pickups produce brilliant tones that sound fantastic in any setting.'),
(45, 'Ibanez PA-02', 1400.00, 'Uploadimage/Top 11 Best Acoustic Guitars Under $500 (2023 Review & Guide).jpg', 'Guitar', 'The new PA acoustic series from Ibanez aims to bring a new level of fine-tuned playability and tone to modern fingerstyle players. This line features a uniquely shaped asymmetrical jumbo body with slightly more surface area on the upper side of the body. This shape generates a rich low end, and offers easier access on the treble side for tapping, making this an optimal design for incorporating percussive elements. The bridge, and body cutaway are also specially shaped making them better suited as tapping surfaces so that multiple sounds and dynamic variations can be incorporated into the percussive playing elements. The PA series also utilizes a multiple pickup system featuring a contact pickup and stereo outputs. This electronics package creates an incredible array of sounds and the pickups are positioned in prime locations to capture the multifaceted nuances of fingerstyle playing.'),
(46, 'Marshall speaker', 900.00, 'Uploadimage/amp2.png', 'Amplifier', 'Designed to effortlessly integrate with FX pedals, the AS50D empowers you to craft a personalized tone. Combine this with the built-in digital FX of the amplifier, and you can effortlessly shape and refine your ideal sound.'),
(47, 'vox amplifier', 895.00, 'Uploadimage/amp3.png', 'Amplifier', 'The VOX Hand-wired amplifiers use careful design improvements to strive for a faithful reproduction of the iconic vintage VOX sound. They minimize ghost notes while balancing stability with the characteristic \"compression\" and \"sag\" of vintage amps by making revisions to the power supply circuit. Authentic vintage tones can be achieved by enhancing harmonic richness with custom output transformers. Furnished with historically authentic materials, the cabinet design additionally guarantees authentic sound reproduction. Modern guitarists desiring both heritage and functionality in their amplifiers are catered to with useful features including speaker out options, an FX loop for clean effects integration, and a premium spring reverb.\r\n'),
(51, 'Fender Amplifier', 980.00, 'Uploadimage/amp1.png', 'Amplifier', 'Pro guitarists across a wide range of genres who want expressive current high-gain from a single, no-frills tube amp and exquisite Fender clean tone favor Super-Sonic amplifiers. The 1x12\" Super-Sonic 22 Combo, ideal for both stage and studio applications, combines the natural tone and modest power of the vintage Deluxe Reverb® amp with this adaptability. Without distorting your guitar\'s natural tone, the vintage channel produces classic Fender tone, while the fantastic burn channel rips through overdrive, from bluesy to flame-throwing. Available in two timeless styles: Black/Silver and Blonde/Oxblood in the manner of 1961. Both include a flowing 1960s Fender amp emblem and ivory \"radio\" knobs.'),
(52, 'Lynyrd Skynrd Edition', 5000.00, 'Uploadimage/drum2.png', 'Drums', 'The Pearl Masters Maple Gum series combines maple and gum wood for a balanced, warm tone with enhanced low-end presence. Crafted using Pearl\'s SST process, these drums offer precise shell construction and uniform thickness. Available in various configurations and finishes, they provide versatility for drummers across genres. Featuring OptiMount suspension for resonance and MasterCast hoops for stability, the Masters Maple Gum series delivers professional-quality sound and performance.'),
(53, 'Gretsch Drum', 3560.00, 'Uploadimage/drum1.png', 'Drums', 'Gretsch drums, renowned for their distinctive sound and craftsmanship, have been a staple in the drumming world since the early 20th century. Known for their warm, focused tones and vintage aesthetic, Gretsch drums are crafted using high-quality materials like maple, mahogany, and birch. Their innovative designs, such as the famous \"Broadkaster\" and \"Renown\" series, cater to a wide range of drumming styles from jazz to rock. With features like 30-degree bearing edges for enhanced shell resonance and the iconic silver sealer interior finish, Gretsch drums continue to be a preferred choice among professional and amateur drummers alike, embodying a legacy of excellence in sound and construction.'),
(54, 'ESP Bass', 600.00, 'Uploadimage/ESP E-II BTL-4 Bass Guitar Black Natural Burst - Bass Player Center.jpg', 'Bass', 'The ESP LTD B Series bass guitars represent a pinnacle of modern instrument design, combining sleek aesthetics with powerful performance capabilities. Crafted with solid mahogany bodies and fast-playing maple necks adorned with either rosewood or ebony fingerboards, these bass guitars deliver a rich, resonant tone and exceptional playability. Equipped with high-output active pickups like the EMG 35DC, the B Series basses produce a dynamic sound suitable for a wide range of musical genres, from heavy rock to jazz fusion. Designed for comfort and balance, they feature ergonomic contours and reliable hardware, including ESP\'s proprietary bridge systems and precise tuning mechanisms. Whether on stage or in the studio, the ESP LTD B Series stands as a versatile choice for bassists seeking professional-grade instruments with uncompromising quality and performance.'),
(57, 'Yamaha Bass', 698.00, 'Uploadimage/Yamaha TRBX504 Bass Translucent Brown NAMM 2014.jpg', 'Bass', 'The Yamaha TRBX Series bass guitars exemplify Yamaha\'s commitment to crafting instruments that balance versatility, performance, and aesthetic appeal. Featuring solid mahogany bodies with sculpted contours for comfort, these basses offer a resonant and well-rounded tone suitable for various musical styles. Equipped with Yamaha\'s versatile YGD pickups, the TRBX series ensures clarity and depth in its sound, enhanced further by active/passive circuitry options for added flexibility. The sleek, modern design includes ergonomic neck profiles and smooth-playing rosewood or maple fingerboards, complemented by reliable hardware such as high-mass bridges and precise tuners. Whether in the studio or on stage, the Yamaha TRBX Series bass guitars are trusted by musicians worldwide for their exceptional sound quality, comfort, and reliable performance.'),
(58, 'Erine Ball Bass', 678.00, 'Uploadimage/Ernie Ball Music Man StingRay Special H Bass Guitar.jpg', 'Bass', 'Ernie Ball\'s Music Man StingRay series stands as a testament to innovation and precision in bass guitar craftsmanship. Known for its distinctive styling and powerful tone, the StingRay series has been a staple since its debut in the 1970s. Featuring a humbucking pickup with active electronics, the StingRay delivers a bold, punchy sound with ample low-end definition and clarity. Its sleek, contoured body design ensures comfort during extended playing sessions, while the smooth maple neck provides effortless playability. Whether used in studio recordings or live performances, the Music Man StingRay series continues to be a top choice among professional bassists for its reliability, versatility, and iconic sound.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Number` varchar(200) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `ProfilePicture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `UserName`, `Email`, `Number`, `Password`, `created_at`, `ProfilePicture`) VALUES
(5, 'azrael', 'azrael@gmail.com', '98654211456', '$2y$10$3zkJlRHi/A5gm5zz02RZ6uXdiaW2swXkEj1To7XBxQJYWia8EVAmq', '2024-06-16 09:13:04', 'uploads/mayers.png'),
(8, 'saks', 'sakshyam@gmail.com', '984154066', '$2y$10$8tBdHcEWx3C8Wyh9CMAuWuTcO7UnE8bFh4Y5prXvptrUjlOcluciu', '2024-06-19 18:07:01', 'uploads/amp2.png'),
(9, 'Bibek', 'bibeksapkota@gmail.com', '9863027811', '$2y$10$jGj/a.Rf/obpo..26E5GCereTClUMUCFHnMIDLK0snilH.Q6O1jpi', '2024-06-21 17:54:43', 'uploads/Group152.png'),
(12, 'Solo', 'solomon@gmail.com', '9869374141', '$2y$10$LyMAyEK5JJ7tzB9a5MBDWuCZ4h/m.xUyFndP5/bNT/ijODMxAbw6W', '2024-06-22 07:35:46', 'uploads/298332624_1412456482552443_8790562974765891199_n.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `UserName` (`UserName`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
