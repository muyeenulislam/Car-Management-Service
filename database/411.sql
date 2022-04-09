-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2021 at 02:57 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `411`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`id`, `admin_name`, `email`, `password`, `phone`) VALUES
(5, 'muyeen', 'muyeen@gmail.com', 'asd', '12323');

-- --------------------------------------------------------

--
-- Table structure for table `buy_car`
--

CREATE TABLE `buy_car` (
  `id` int(11) NOT NULL,
  `csku` varchar(255) NOT NULL,
  `car_name` varchar(255) NOT NULL,
  `car_model` varchar(255) NOT NULL,
  `car_type` varchar(255) NOT NULL,
  `engine_power` varchar(255) NOT NULL,
  `transmission` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `passenger_capacity` varchar(255) NOT NULL,
  `drive` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `car_img` varchar(255) NOT NULL,
  `mileage` varchar(255) NOT NULL,
  `fuel_type` varchar(255) NOT NULL,
  `Car_description` longtext NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buy_car`
--

INSERT INTO `buy_car` (`id`, `csku`, `car_name`, `car_model`, `car_type`, `engine_power`, `transmission`, `color`, `passenger_capacity`, `drive`, `price`, `car_img`, `mileage`, `fuel_type`, `Car_description`, `quantity`) VALUES
(22, 'audi.1', 'Audi A8L', '2021', 'Sedan', '3.0L Twin-Turbocharged FSI V6 MHEV, 2995 cc, 6 Cylinders In V Shape, 4 Valves/Cylinder, DOHC', '4 speed automatic', 'black', '4', 'AWD', 36400000, 'audi.jpg', '14.88 km/l', 'Petrol', 'The Audi A8 has 1 Petrol Engine on offer. The Petrol engine is 2995 cc . It is available with Automatic transmission.Depending upon the variant and fuel type the A8 has a mileage of 11.7 kmpl . The A8 is a 5 seater 6 cylinder car and has length of 5302mm, width of 1945mm and a wheelbase of 3127mm.', 12),
(23, 'allion.1', 'Toyota Allion A15', '2006', 'Sedan', 'Inline 4, 1497 cm3 or 91.4 cu-in, 16 Valves', 'Automatic', 'White', '4', 'FWD', 1250000, 'allion2006.jpg', '16.4km/l', 'Petrol', 'With a curb weight of 2513 lbs (1140 kgs), the Allion A15 has a naturally-aspirated Inline 4 cylinder engine, Petrol motor, with the engine code 1ZZ-FE. This engine produces a maximum power of 109 PS (108 bhp - 80 kW) at 6200 rpm and a maximum torque of 141.0 Nm (103 lb.ft) at 6200 rpm. The power is transmitted to the road by the front wheel drive (FWD) with a 4 speed Automatic gearbox. On the topic of chassis details responsible for road holding, handling behavior and ride comfort, the Allion has Coil springs. front suspension and Coil springs. Torsion bar. rear suspension. For stopping power, the Allion A15 braking system includes Vented Discs at the front and Drums at the rear.', 10),
(25, 'premio.1', 'Toyota Premio F', '2006', 'Sedan', 'Inline 4, 1496 cm3 or 91.3 cu-in', '4 Speed Automatic', 'White', '4', 'FWD', 1550000, 'premio2006.jpg', '16.4km/l', 'petrol', 'With a curb weight of 2513 lbs (1140 kgs), the Allion A15 has a naturally-aspirated Inline 4 cylinder engine, Petrol motor, with the engine code 1ZZ-FE. This engine produces a maximum power of 109 PS (108 bhp - 80 kW) at 6200 rpm and a maximum torque of 141.0 Nm (103 lb.ft) at 6200 rpm. The power is transmitted to the road by the front wheel drive (FWD) with a 4 speed Automatic gearbox. On the topic of chassis details responsible for road holding, handling behavior and ride comfort, the Allion has Coil springs. front suspension and Coil springs. Torsion bar. rear suspension. For stopping power, the Allion A15 braking system includes Vented Discs at the front and Drums at the rear.', 13);

-- --------------------------------------------------------

--
-- Table structure for table `buy_transactions`
--

CREATE TABLE `buy_transactions` (
  `client_id` int(11) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `amount` float NOT NULL,
  `email` varchar(255) NOT NULL,
  `csku` varchar(255) NOT NULL,
  `nationalid` int(11) NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buy_transactions`
--

INSERT INTO `buy_transactions` (`client_id`, `transaction_id`, `amount`, `email`, `csku`, `nationalid`, `regdate`) VALUES
(96, 'nkvtrp6d', 1250000, 'muyeenulislamsakif@gmail.com', 'allion.1', 46784, '2021-12-15 11:29:35'),
(97, 'ov87p530', 1550000, 'muyeenulislamsakif@gmail.com', 'premio.1', 34256436, '2021-12-15 11:32:51');

-- --------------------------------------------------------

--
-- Table structure for table `client_buy`
--

CREATE TABLE `client_buy` (
  `client_id` int(11) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `nationalid` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `csku` varchar(255) NOT NULL,
  `paying_amount` int(11) NOT NULL,
  `paid_amount` int(11) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_buy`
--

INSERT INTO `client_buy` (`client_id`, `client_name`, `email`, `phone`, `nationalid`, `address`, `csku`, `paying_amount`, `paid_amount`, `transaction_id`, `status`) VALUES
(96, 'sakif', 'muyeenulislamsakif@gmail.com', '14524', 46784, '368/A, Madhubagh, Nayatola, Nayatola, Dhaka', 'allion.1', 1250000, 1250000, 'nkvtrp6d', 'Approved'),
(97, 'asdfasd', 'muyeenulislamsakif@gmail.com', '14524', 34256436, '3346 Blue Spruce Lane', 'premio.1', 1550000, 1550000, 'ov87p530', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `client_rent`
--

CREATE TABLE `client_rent` (
  `client_id` int(11) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `nationalid` int(11) NOT NULL,
  `rent_datetime` datetime NOT NULL,
  `rent_hour` float NOT NULL,
  `starting_address` varchar(255) NOT NULL,
  `destination_address` varchar(255) NOT NULL,
  `crsku` varchar(255) NOT NULL,
  `paying_amount` int(11) NOT NULL,
  `paid_amount` int(11) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_rent`
--

INSERT INTO `client_rent` (`client_id`, `client_name`, `email`, `phone`, `nationalid`, `rent_datetime`, `rent_hour`, `starting_address`, `destination_address`, `crsku`, `paying_amount`, `paid_amount`, `transaction_id`, `status`) VALUES
(30, 'sakif', 'muyeenulislamsakif@gmail.com', '14524', 34251435, '2021-12-15 17:32:00', 10, 'Flat no - 7-C, House No - C-2 C-4,  Road No.- 18, Block - C', 'Banasree, Rampura', 'civic.1', 20000, 20000, 'olu92kvb', 'Approved'),
(31, 'asdfasd', 'muyeenulislamsakif@gmail.com', '12325', 34646875, '2021-12-15 17:34:00', 5, '368/A, Madhubagh, Nayatola, Nayatola, Dhaka', 'asdf', 'allion.1', 5000, 5000, 'n12uwtkf', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `deleteid`
--

CREATE TABLE `deleteid` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rent_car`
--

CREATE TABLE `rent_car` (
  `id` int(11) NOT NULL,
  `crsku` varchar(255) NOT NULL,
  `car_name` varchar(255) NOT NULL,
  `car_model` varchar(255) NOT NULL,
  `car_type` varchar(255) NOT NULL,
  `engine_power` varchar(255) NOT NULL,
  `passenger_capacity` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `transmission` varchar(255) NOT NULL,
  `car_img` varchar(255) NOT NULL,
  `drive` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `mileage` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rent_car`
--

INSERT INTO `rent_car` (`id`, `crsku`, `car_name`, `car_model`, `car_type`, `engine_power`, `passenger_capacity`, `color`, `transmission`, `car_img`, `drive`, `price`, `mileage`, `quantity`) VALUES
(2, 'premio.1', 'Toyota Premio F', '2006', 'Sedan', 'Inline 4, 1496 cm3 or 91.3 cu-in', '4', 'White', '4 Speed Automatic', 'premio2006.jpg', 'FWD', 1200, '16.4km/l', 3),
(3, 'allion.1', 'Toyota Allion A15', '2006', 'Sedan', 'Inline 4, 1497 cm3 or 91.4 cu-in, 16 Valves', '4', 'White', '4 speed automatic', 'allion2006.jpg', 'FWD', 1000, '16.4km/l', 0),
(4, 'civic.1', '	Honda Civic', '2022', 'Sedan', '2.0-litre, 16-valve, Port Injection, DOHC, i-VTEC® 4-cylinder', '4', 'red', 'Continuously variable-speed automatic', 'honda civic 2021.jpg', 'FWD', 2000, '14.88 km/l', 3),
(5, 'audi.1', 'Audi A8L', '2021', 'Sedan', '3.0L Twin-Turbocharged FSI V6 MHEV, 2995 cc, 6 Cylinders In V Shape, 4 Valves/Cylinder, DOHC', '4', 'black', '4 speed automatic', 'audi.jpg', 'AWD', 10000, '14.88 km/l', 3);

-- --------------------------------------------------------

--
-- Table structure for table `rent_transactions`
--

CREATE TABLE `rent_transactions` (
  `client_id` int(11) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `amount` float NOT NULL,
  `email` varchar(255) NOT NULL,
  `crsku` varchar(255) NOT NULL,
  `nationalid` int(11) NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rent_transactions`
--

INSERT INTO `rent_transactions` (`client_id`, `transaction_id`, `amount`, `email`, `crsku`, `nationalid`, `regdate`) VALUES
(31, 'n12uwtkf', 5000, 'muyeenulislamsakif@gmail.com', 'allion.1', 34646875, '2021-12-15 11:31:58'),
(30, 'olu92kvb', 20000, 'muyeenulislamsakif@gmail.com', 'civic.1', 34251435, '2021-12-15 11:30:41');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `otp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `userid`, `username`, `email`, `password`, `otp`) VALUES
(29, 14, 'abc', 'muyeenulislamsakif@gmail.com', '7815696ecbf1c96e6894b779456d330e', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buy_car`
--
ALTER TABLE `buy_car`
  ADD PRIMARY KEY (`id`,`csku`);

--
-- Indexes for table `buy_transactions`
--
ALTER TABLE `buy_transactions`
  ADD PRIMARY KEY (`transaction_id`,`client_id`);

--
-- Indexes for table `client_buy`
--
ALTER TABLE `client_buy`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `client_rent`
--
ALTER TABLE `client_rent`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `deleteid`
--
ALTER TABLE `deleteid`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `rent_car`
--
ALTER TABLE `rent_car`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rent_transactions`
--
ALTER TABLE `rent_transactions`
  ADD PRIMARY KEY (`transaction_id`,`client_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`,`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `buy_car`
--
ALTER TABLE `buy_car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `client_buy`
--
ALTER TABLE `client_buy`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `client_rent`
--
ALTER TABLE `client_rent`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `deleteid`
--
ALTER TABLE `deleteid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `rent_car`
--
ALTER TABLE `rent_car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
