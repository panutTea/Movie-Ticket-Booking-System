-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2022 at 02:22 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id_movie` int(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `detail` varchar(3000) NOT NULL,
  `image` varchar(200) NOT NULL,
  `length` int(5) NOT NULL,
  `genre` varchar(25) NOT NULL,
  `begin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id_movie`, `name`, `detail`, `image`, `length`, `genre`, `begin`) VALUES
(1, 'วันสุดท้าย..ก่อนบายเธอ', '“One for the Road วันสุดท้าย..ก่อนบายเธอ” จากผู้กำกับ ‘บาส นัฐวุฒิ พูนพิริยะ’ ดูแลงานสร้างโดย ‘หว่องกาไว’   ภาพยนตร์รักสุดเหงาเรื่องล่าสุดของ GDH เรื่องราว ‘วันสุดท้าย’ ของชีวิต? เมื่อชีวิตมาถึงโค้งสุดท้ายเร็วกว่าที่คิด ‘อู๊ด’ (ไอซ์ซึ ณัฐรัตน์) ตัดสินใจ ชวน ‘บอส’ (ต่อ ธนภพ) เพื่อนรักเจ้าของบาร์ จากนิวยอร์ก มาช่วยเขาออกตามหา ‘เธอ’ ทั้งหลายในอดีตที่ติดอยู่ในความทรงจำ ทั้ง ’เธอ’ ที่เคยรัก ‘เธอ’ ที่ยังคิดถึง และ ’เธอ’ ที่อยากขอบคุณ และขอโทษเป็นครั้งสุดท้าย ก่อนที่ทริปของเพื่อนรักทั้งสองจะต้องสิ้นสุดลง ‘เธอ’ รับบทโดย วี วิโอเลต, พลอย หอวัง, ออกแบบ ชุติมณฑน์, นุ่น ศิรพันธ์ และ หญิง รฐา ', 'https://cdn.majorcineplex.com/uploads/movie/3328/thumb_3328.jpg?170220220600', 129, 'ชีวิต , ไทย', '2022-02-10'),
(2, 'ยอดนักสืบจิ๋วโคนัน เดอะมูฟวี่ 24 กระสุนสีเพลิง', 'พบกับมหกรรมกีฬาระดับโลก World Sports Games (WSG) ที่จะจัดขึ้นทุก ๆ 4 ปี โดยในปีนี้กรุงโตเกียวก็ได้ถูกรับเลือกให้เป็นเจ้าภาพในการจัดงานกีฬาครั้งยิ่งใหญ่ นอกจากนั้นแล้วยังมีการเปิดตัวรถไฟความเร็วสูง Hyper  Linear ที่มาพร้อมกับเทคโนโลยีใหม่ครั้งแรกของโลก สามารถวิ่งด้วยความเร็วได้สูงถึง 1,000 กม./ชม. ซึ่งเป็นอีกหนึ่งการเปิดตัวที่เป็นที่สนใจของสื่อต่าง ๆอย่างมาก\r\n\r\nแต่แล้วก็มีเหตุการณ์ไม่คาดฝันเกิดขึ้น บุคคลสำคัญระดับสูงพร้อมทั้งเหล่าสปอนเซอร์รายใหญ่ของงานได้ถูกลักพาตัวไปทีละคน โดยไม่มีใครรู้ว่าใครเป็นผู้อยู่เบื้องหลัง ซึ่งเป็นเหตุการณ์ที่คล้ายกับเหตุการณ์ที่เคยเกิดขึ้นในสหรัฐอเมริกาเมื่อ 15 ปีก่อน\r\n\r\nเมื่อโคนัน และ ”ชูอิจิ อากากิ” ได้รู้ว่าอดีตเจ้าหน้าที่ FBI “อลัน แม็คเคนซี่” ที่ตอนนี้ได้กลายมาเป็นประธานของ WSG จะทำการขึ้นรถไฟขบวนปฐมฤกษ์ ทั้งสองจึงทำการติดตามไปไขข้อสงสัย ในขณะที่น้องสาวของอากาอิ “มาสึมิ เซระ” และแม่ของอากาอิ “แมรี่ เซระ” ก็ได้ทำการติดตามสืบคดีนี้อยู่เช่นเดียวกัน แต่ที่น่าสนใจไปมากกว่านั้น ก็คือการที่น้องชายของอากาอิ “ชูคิจิ ฮาเนดะ” นักเล่นหมากรุกมืออาชีพก็กำลังจะเดินทางจากนาโกย่าไปยังโตเกียว ซึ่งเป็นจุดเริ่มของขบวนรถไฟขบวนนี้เช่นเดียวกัน\r\n\r\n', 'https://cdn.majorcineplex.com/uploads/movie/3204/thumb_3204.jpg?030120222200', 111, 'แอนิเมชัน', '2021-12-09'),
(3, 'กล่องเกมมรณะ', 'เมื่อคนแปลกหน้าทั้ง 6 คนพบว่าตัวเองติดอยู่ในห้องทรงลูกบาศก์ ซึ่งมีประตูทั้งหกด้านที่นำไปสู่กับดักหฤโหดสุดอันตราย และทางรอดเดียวที่มีคือ ทุกคนต้องร่วมมือกันไขปมปริศนาลึกลับต่าง ๆ ที่ดาหน้าเข้ามาแทบทุกนาที เพราะไม่เช่นนั้นทั้ง 6 ชีวิตจะต้องกลายเป็นบุคคลสาบสูญที่ติดอยู่ในลูกบาศก์มรณะนี้ไปตลอดกาล สูดหายใจมิดปอด กอดกายไว้ให้แน่น และเร่งฝีเท้าสู่เกมเย้ยความตายที่ทุกคนมี \"ชีวิต\" เป็นของตัวเอง ผลงานเดือดสุดจากผู้สร้าง High & Low และ Tokyo Ghoul จับมือผู้สร้าง Cube ต้นฉบับ !', 'https://cdn.majorcineplex.com/uploads/movie/3252/thumb_3252.jpg?180220220836', 108, 'สยองขวัญ , วิทยาศาสตร์', '2022-02-25');

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `price` int(4) NOT NULL,
  `id_round` varchar(9) NOT NULL,
  `id_user` varchar(5) NOT NULL,
  `seat_no` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`price`, `id_round`, `id_user`, `seat_no`) VALUES
(300, '202201271', '00001', 2),
(300, '202201272', '00002', 1),
(300, '202201272', '00002', 9),
(300, '202201272', '00002', 17),
(300, '202201291', '00002', 1),
(300, '202201291', '00001', 6),
(300, '202201291', '00002', 9);

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE `time` (
  `id_movie` int(11) NOT NULL,
  `round` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `id_round` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`id_movie`, `round`, `date`, `id_round`) VALUES
(3, '8.00-11.00', '2022-01-27', '202201271'),
(3, '11.00-13.00', '2022-01-27', '202201272'),
(3, '15.00-17.00', '2022-01-28', '202201281'),
(2, '8.00-11.00', '2022-01-29', '202201291');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(5) NOT NULL,
  `password` varchar(20) NOT NULL,
  `icon` varchar(1500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `password`, `icon`) VALUES
('00001', '00001', 'https://images.uncyc.org/th/thumb/e/e1/%E0%B8%AD%E0%B8%B2%E0%B8%88%E0%B8%B2%E0%B8%A3%E0%B8%A2%E0%B9%8C%E0%B9%81%E0%B8%94%E0%B8%87.jpg/300px-%E0%B8%AD%E0%B8%B2%E0%B8%88%E0%B8%B2%E0%B8%A3%E0%B8%A2%E0%B9%8C%E0%B9%81%E0%B8%94%E0%B8%87.jpg\r\n'),
('00002', '00002', 'https://c.tenor.com/F2oYLdhgMC0AAAAC/%E0%B8%9E%E0%B8%B5%E0%B9%88%E0%B9%82%E0%B8%95png.gif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id_movie`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`id_round`,`seat_no`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_round` (`id_round`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`id_round`),
  ADD KEY `id_movie` (`id_movie`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `seat`
--
ALTER TABLE `seat`
  ADD CONSTRAINT `id_round` FOREIGN KEY (`id_round`) REFERENCES `time` (`id_round`),
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `time`
--
ALTER TABLE `time`
  ADD CONSTRAINT `id_movie` FOREIGN KEY (`id_movie`) REFERENCES `movie` (`id_movie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
