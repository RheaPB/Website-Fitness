-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2024 at 07:50 PM
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
-- Database: `fitness_revolution`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`, `name`) VALUES
(2, 'riri@gmail.com', '*B58E170ABE215615C78497E482275A762DADEEEC', 'riri'),
(4, 'admin@example.com', '$2y$10$rrwV0u4y315QTkuIXu0Kye9pyM6yOkLHNNgnHLv6ytpjgxxayJbia', '');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(10) NOT NULL,
  `class_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `class_id`, `user_id`) VALUES
(1, 3, 3),
(2, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `gym_review`
--

CREATE TABLE `gym_review` (
  `gym_review_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `title` varchar(10) NOT NULL,
  `cleanliness` int(11) NOT NULL,
  `comment` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `gym_review`
--

INSERT INTO `gym_review` (`gym_review_id`, `name`, `title`, `cleanliness`, `comment`) VALUES
(3, 'Farhaan nauzeer', 'Male', 5, 'Great environment'),
(4, 'Rhea', 'Female', 1, 'i cant lift any weight!!!!!'),
(5, 'ayushee', 'Female', 4, 'can be better'),
(6, 'farhaan', 'Male', 3, 'Can do better'),
(7, 'altaf', 'Male', 2, 'gay');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `user_id` int(10) NOT NULL,
  `JoinDate` date NOT NULL,
  `typeId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`user_id`, `JoinDate`, `typeId`) VALUES
(2, '2024-08-13', 2),
(6, '2024-08-09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `membership_type`
--

CREATE TABLE `membership_type` (
  `price` double(10,2) NOT NULL,
  `duration` varchar(10) NOT NULL,
  `plan_name` varchar(300) NOT NULL,
  `type_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `membership_type`
--

INSERT INTO `membership_type` (`price`, `duration`, `plan_name`, `type_id`) VALUES
(999.00, '', 'Basic Membership Plans\r\n-Cardio and strength equipment\r\n-Locker room access\r\n-1 free fitness assessment\r\n-Basic group classes\r\n-Gym access only during opening hours', 1),
(2500.00, '', 'Premium Membership Plans\r\n-All-access pass to facilities\r\n-Premium group classes\r\n-Monthly personal training\r\n-Complimentary guest passes\r\n-Wellness and recovery services\r\n-24/7 gym access', 2);

-- --------------------------------------------------------

--
-- Table structure for table `optionalclass`
--

CREATE TABLE `optionalclass` (
  `class_id` int(10) NOT NULL,
  `class_name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `price` double(5,2) NOT NULL,
  `trainer_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `optionalclass`
--

INSERT INTO `optionalclass` (`class_id`, `class_name`, `description`, `price`, `trainer_id`) VALUES
(3, 'Cardio Class', 'High-intensity indoor cycling workouts that focus on endurance, strength, and cardiovascular fitness.', 550.00, 2),
(4, 'Flexibility and Balance Class', 'Focuses on flexibility, strength, balance, and mental relaxation through various postures and breathing techniques.', 550.00, 3);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_id`, `product_id`, `quantity`) VALUES
(1, 4, 1),
(1, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `order_id` int(10) NOT NULL,
  `order_date` date NOT NULL,
  `total_amount` double(10,2) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`order_id`, `order_date`, `total_amount`, `user_id`) VALUES
(1, '2024-08-28', 3500.00, 3),
(2, '2024-10-12', 1200.00, 25),
(3, '2024-10-12', 1600.00, 25),
(4, '2024-10-12', 3050.00, 25),
(5, '2024-10-12', 1200.00, 25),
(6, '2024-10-12', 1500.00, 25),
(7, '2024-10-12', 2200.00, 25),
(8, '2024-10-12', 2400.00, 29),
(9, '2024-10-12', 7600.00, 30);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(10) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` varchar(400) NOT NULL,
  `price` double(10,2) NOT NULL,
  `stock` int(10) NOT NULL,
  `image` varchar(50) NOT NULL,
  `category` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `description`, `price`, `stock`, `image`, `category`) VALUES
(1, 'Adjustable Dumbbells', 'Adjustable dumbbells allow you to change the weight easily, combining multiple sets of weights into one. They typically range from 5 to 50 pounds each, making them versatile for different exercises like bicep curls, chest presses, and lunges. The com', 1200.00, 10, 'image\\Adjustable_dumbells.png', 'Supplement'),
(2, 'Treadmill', 'A treadmill is a staple cardio machine that allows you to walk, jog, or run indoors. Modern treadmills often feature adjustable incline settings, various pre-programmed workouts, heart rate monitors, and touchscreen displays. They are great for impro', 25000.00, 5, 'image\\treadmil.png', 'Equipment'),
(3, 'Multivitamin (30-60 tablets)', 'A multivitamin supplement provides a comprehensive mix of essential vitamins and minerals to support overall health, immune function, and energy levels. Multivitamins are tailored for different demographics, including men, women, and athletes, and are usually taken once daily with food.', 550.00, 30, 'image\\biotech-multivitamin-for-men.jpg', 'Supplement'),
(4, 'Whey Protein Powder 2 lbs', 'Whey protein is a high-quality protein derived from milk, known for its fast absorption and rich amino acid profile. It supports muscle recovery and growth, making it ideal for post-workout nutrition. Whey protein powders often come in various flavors, like chocolate, vanilla, and strawberry, and are typically mixed with water or milk.', 1200.00, 15, 'image\\wheyprotein2lbs.jpg', 'Supplement'),
(5, 'Casein Protein 2 lbs', 'Casein is a slow-digesting protein also derived from milk, providing a steady release of amino acids over several hours. It’s often used before bed to support muscle recovery during sleep. Casein protein powders are usually creamy and can be consumed as a shake or used in recipes like protein puddings.', 1500.00, 15, 'image\\casein.webp', 'Supplement'),
(6, 'BCAA (Branched-Chain Amino Acids) 30 servings', 'BCAAs are essential amino acids (leucine, isoleucine, and valine) that support muscle protein synthesis and reduce muscle breakdown during exercise. They are often consumed before, during, or after workouts to enhance performance and recovery. BCAA supplements are usually flavored and come in powder or capsule form.', 2200.00, 15, 'image\\bcaa.webp', 'Supplement'),
(7, 'Creatine Monohydrate 300g', 'Creatine is one of the most researched and effective supplements for increasing strength, power, and muscle mass. It works by replenishing ATP (adenosine triphosphate) levels in muscles, allowing for more intense and longer workouts. Creatine monohydrate is typically mixed with water or a shake and taken daily.', 850.00, 40, 'images\\creat.jpeg', 'Supplement'),
(8, ' Pre-Workout Supplement (30 servings)', 'Pre-workout supplements are designed to boost energy, focus, and endurance during workouts. They typically contain a blend of ingredients like caffeine, beta-alanine, creatine, and nitric oxide boosters. Pre-workouts come in flavored powders and are consumed 20-30 minutes before exercise.', 1600.00, 15, 'image\\pre-workout.jpg', 'Supplement'),
(9, ' Protein Bars (12 bars)', 'Protein bars are convenient, on-the-go snacks that provide a high protein content, usually around 15-25 grams per bar. They are great for post-workout recovery or as a meal replacement. Protein bars come in various flavors like chocolate, peanut butter, and cookies & cream, and often include additional nutrients like fiber and vitamins.', 1800.00, 35, 'image\\proteinbars.webp', 'Supplement'),
(10, 'Ultra Mass Gainer', 'Ultra Mass Gainer is formulated to help you gain weight and build muscle effectively. Each serving contains a blend of high-quality protein, complex carbohydrates, and essential vitamins and minerals. It\'s designed for athletes and bodybuilders who require additional calories to support their training goals. Enjoy a delicious, creamy shake with a range of flavors to choose from.', 3500.00, 5, 'image\\Ultramassgainer.jpg', 'Supplement'),
(12, 'Bulk-Up Blend', 'Bulk-Up Blend is a powerful mass gainer with over 1,000 calories per serving. It\'s loaded with high-quality protein and complex carbs to help you achieve your muscle-building goals. Available in multiple flavors!', 4000.00, 5, 'image\\Bulkup.webp', 'Supplement'),
(13, ' Omega-3 Fish Oil (120 capsules)', 'Omega-3 fatty acids derived from fish oil to support cardiovascular health, reduce inflammation, and aid in joint recovery for athletes.', 900.00, 10, 'image\\Omega3.avif', 'Supplement'),
(14, 'L-Glutamine Powder (500g)', 'A supplement to enhance muscle recovery and reduce muscle breakdown. Perfect for athletes looking to improve recovery between intense workout sessions.', 1200.00, 10, 'image\\glutamine.jpg', 'Supplement'),
(15, ' Whey Protein Isolate (2 lbs)', 'High-quality whey protein isolate with 90% protein content per serving. It’s low in carbs and fat, making it ideal for post-workout recovery and lean muscle gain.', 1800.00, 45, 'image\\whey_isolate.jpg', 'Supplement'),
(16, 'BCAA 2:1:1 (200g)', 'Branched-Chain Amino Acids in a 2:1:1 ratio of Leucine, Isoleucine, and Valine to enhance muscle recovery, reduce fatigue, and promote muscle protein synthesis.', 1500.00, 10, '', 'Supplement'),
(17, 'Vegan Protein Powder (2 lbs)', 'A plant-based protein powder made from pea and brown rice proteins, perfect for vegans and those who are lactose intolerant. Contains 20g of protein per serving.', 1600.00, 15, '', 'Supplement'),
(18, 'Pre-Workout Energy Booster (30 servings)', 'A pre-workout supplement designed to increase energy, focus, and stamina during training sessions. Contains caffeine, beta-alanine, and nitric oxide boosters for optimal performance.', 1700.00, 5, '', 'Supplement'),
(19, 'ZMA (Zinc Magnesium Aspartate) (90 capsules)', 'A combination of Zinc, Magnesium, and Vitamin B6 to support muscle recovery, boost testosterone levels, and improve sleep quality.', 1000.00, 15, '', 'Supplement'),
(20, 'Electrolyte Hydration Tablets (20 tablets)', 'Tablets designed to rehydrate and replenish electrolytes lost during intense physical activity. Helps prevent cramping and maintain optimal muscle function', 400.00, 30, '', 'Supplement'),
(21, 'Creatine Monohydrate (500g)', 'A powerful supplement to enhance strength and power output during weight training. Creatine helps increase energy production in muscle cells, leading to better performance and faster recovery.', 850.00, 15, '', 'Supplement');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(10) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `rating` int(10) NOT NULL,
  `date` date NOT NULL,
  `user_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `status` enum('pending','accepted','banned') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `text`, `rating`, `date`, `user_id`, `product_id`, `status`) VALUES
(3, 'Very good!!', 10, '2024-08-28', 2, 6, 'accepted'),
(4, 'Poor quality', 1, '2024-08-27', 6, 8, 'accepted'),
(5, 'Very good quality.', 9, '2024-10-12', 25, 1, 'banned'),
(6, 'mari top', 10, '2024-10-12', 29, 13, 'accepted'),
(7, 'i bulked thx', 10, '2024-10-12', 30, 12, 'banned'),
(8, 'i feel stromg', 10, '2024-10-12', 30, 5, 'banned'),
(9, 'i feel like a fish', 1, '2024-10-12', 30, 13, 'accepted'),
(10, 'good vegan option!', 9, '2024-10-12', 30, 17, 'banned'),
(11, 'great running option', 10, '2024-10-12', 30, 2, 'banned'),
(12, 'yak', 1, '2024-10-12', 30, 5, 'accepted'),
(13, 'amino acid love it', 9, '2024-10-12', 30, 6, 'banned'),
(14, 'nice love happy good', 9, '2024-10-12', 30, 6, 'accepted'),
(15, 'ew', 1, '2024-10-12', 30, 6, 'accepted'),
(16, 'yay', 10, '2024-10-12', 30, 6, 'accepted'),
(17, 'nah', 10, '2024-10-12', 30, 6, 'accepted'),
(18, 'fishy', 1, '2024-10-12', 30, 13, 'banned'),
(19, 'loveeeeeeee', 10, '2024-10-12', 30, 13, 'accepted'),
(20, 'proteinn bars nice', 10, '2024-10-12', 30, 9, 'accepted'),
(21, 'proteinn bars yak', 1, '2024-10-12', 30, 9, 'banned'),
(22, 'proteinn bars ok', 5, '2024-10-12', 30, 9, 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
  `trainer_id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`trainer_id`, `name`) VALUES
(2, 'Gps'),
(3, 'Kamlala');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phoneNumber` int(25) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `phoneNumber`, `password`) VALUES
(1, 'Rhea Bhurtun', 'Bunix10@gmail.com', 58271985, 'Rheaisasmallhuman'),
(2, 'Farhaan Nauzeer', 'Farhaannauzeer17@gmail.com', 58271980, 'farhaannauzeeraleuom'),
(3, 'Sahil', 'Sahilisahill@gmail.com', 52837471, 'Sahil#$sajdjhh3423'),
(4, 'Rayush sanasi', 'sanasirayush@gmail.com', 52945019, 'Ssanasi1762$'),
(6, 'Aniket ramkissomn', 'Ramrom@gmail.com', 59274283, 'Niketramki3448'),
(7, 'aliya nauzeer', 'aliyaNauzeer123@gmail.com', 51298464, 'AliyaNauzeer123'),
(8, 'tejal', 'tejalenefol@gmail.com', 50952783, 'Tejalene ofl123'),
(9, 'ayushee simran', 'usheesimran@gmail.com', 57261984, 'Ayusheesiminia'),
(11, 'fadiilah', 'fadiilah@gmail.com', 57501077, 'grtgrtghrg'),
(15, 'raiss ramdianee', 'raiss18@gmail.com', 59238147, 'RRamdianee'),
(17, 'kaushar nauzeer', 'kool18777@gmail.com', 57501077, 'uheuwfboru'),
(21, 'andy ', 'andy@gmail.com', 58127365, 'gergerger'),
(24, 'rico lewis', 'ricolewis@gmail.com', 58271874, '$2y$10$hfUCwb5..ZusT1TDbdkCWOtuWGhMVceQDZ0pW3aXoGGrKmd9.mFkO'),
(25, 'julia', 'julia@gmail.com', 58361674, '$2y$10$wxN1rNgixZNSAQLvKq9deO0vlE.R9KfFgONGXL8BJXtB.RZk1OVWW'),
(26, 'tanoo', 'tanoo@gmail.com', 59281784, '$2y$10$x1zipDeqEGAL4tU6jLgMWO5UccVQ7tcdiSContBABFbyqSpLs5t5a'),
(27, 'aniket guraz', 'aniket@gmail.com', 58271945, '$2y$10$EHo7GRw4CwWWtjz0z/eLje1T99iSWZ9fwNuOKs0129fjSIQ1Myxv6'),
(29, 'Rheauser', 'r@gmail.com', 12341, '$2y$10$076uTGZfV9yksicgQmCIBulhtRbcjqO3Pv/gQCAqPMrNsl4j47Wcu'),
(30, 'Farhu', 'farhu@gmail.com', 123, '$2y$10$Iiaa41wBVMCmGhvIAX0/TeZFXiJwdUFAZc0f46UeE8fiR.sakjVgm'),
(31, 'baba', 'baba@gmail.com', 59287465, '$2y$10$i7ThtSXw1.be.9tcefFfzOk6dc7u6n/H4eTJ5/wlE1I/MTSCegW72'),
(32, 'cassie1', 'cassie1@gmail.com', 59283751, '$2y$10$Qhdj3XPNfFysZolcZ6FuXODopglES63QNRYDJTT/Pf8pp4y7TL2da'),
(37, 'selena', 'selena@gmail.com', 59287354, '$2y$10$YEwpmKZx7YSo5TOYgY7tbeslmectohcCSsTdGm6rqT/xCmX.IMxPi'),
(38, 'sahil', 'sahil@gmail.com', 58276753, '$2y$10$tkiY8l9jMJ7p9N3jSgPGL.j1b1my8gAmO4ZZGQORNITrcp8EK4v1W'),
(39, 'tommy', 'tommy@gmail.com', 58273614, '$2y$10$dlHFLizuIq1mRtUYJKlqiuMftljj36e3U6qUjP.xOiBraUEoGEO82');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `gym_review`
--
ALTER TABLE `gym_review`
  ADD PRIMARY KEY (`gym_review_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `typeId` (`typeId`);

--
-- Indexes for table `membership_type`
--
ALTER TABLE `membership_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `optionalclass`
--
ALTER TABLE `optionalclass`
  ADD PRIMARY KEY (`class_id`),
  ADD KEY `trainer_id` (`trainer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`trainer_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gym_review`
--
ALTER TABLE `gym_review`
  MODIFY `gym_review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `membership_type`
--
ALTER TABLE `membership_type`
  MODIFY `type_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `trainer`
--
ALTER TABLE `trainer`
  MODIFY `trainer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `optionalclass` (`class_id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`typeId`) REFERENCES `membership_type` (`type_id`);

--
-- Constraints for table `optionalclass`
--
ALTER TABLE `optionalclass`
  ADD CONSTRAINT `optionalclass_ibfk_1` FOREIGN KEY (`trainer_id`) REFERENCES `trainer` (`trainer_id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `order_table` (`order_id`);

--
-- Constraints for table `order_table`
--
ALTER TABLE `order_table`
  ADD CONSTRAINT `order_table_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
