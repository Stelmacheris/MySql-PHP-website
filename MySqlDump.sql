-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 02, 2021 at 12:59 AM
-- Server version: 5.7.35-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `IT`
--

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `price` int(11) NOT NULL,
  `minutes` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `messages` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `internet` varchar(20) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `price`, `minutes`, `messages`, `internet`) VALUES
(100, 'Neužsakytas', 0, '', '', ''),
(106, 'Bronzinis', 6, '300', '100', '550'),
(107, 'Sidabrinis', 10, '200', '200', '1000'),
(108, 'Auksinis', 15, '300', '300', '300'),
(113, 'Purpurinis', 20, '500', '500', '550'),
(114, 'Paprastas', 6, '50', '50', '500');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `surname` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(500) CHARACTER SET utf8mb4 NOT NULL,
  `user_type` varchar(50) CHARACTER SET utf8mb4 NOT NULL DEFAULT 'user',
  `plan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `username`, `password`, `user_type`, `plan_id`) VALUES
(20, 'admin', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 100),
(21, 'manager', 'manager', 'manager', '1d0258c2440a8d19e716292b231e3190', 'manager', 100),
(22, 'Martynas', 'Stelmokas', 'marste2', '81dc9bdb52d04dc20036dbd8313ed055', 'user', 107),
(23, 'Petras', 'Petraitis', 'petper', '81dc9bdb52d04dc20036dbd8313ed055', 'user', 106),
(25, 'Francine', 'Hayner', 'FraHay', '384b03ef862ab53b7353c514493c0bcd', 'user', 107),
(26, 'Helen', 'Davenport', 'HelDav', '82b76eedf31635ac2ddb755b495f1ba5', 'user', 108),
(27, 'Joan', 'Greco', 'JoaGre', 'd251c266778d60fe9ef095eb896d3215', 'user', 107),
(28, 'Ronald', 'Crosby', 'RonCro', 'f31f321d85ad37c7db49052eadf854af', 'user', 106),
(29, 'Kenny', 'Sepe', 'KenSep', 'eaec86c9394f3aa8d72aa652070cbb60', 'user', 100),
(30, 'Gregory', 'Harris', 'GreHar', '8738f7c46077b2389452551231b122a8', 'user', 106),
(31, 'Margaret', 'Mcdonough', 'MarMcd', 'a8ad5fa96e5e841643a40f63c9fa2af7', 'user', 106),
(32, 'Joan', 'Thomas', 'JoaTho', '298c502a63cd37d1165be7a83c8f50cd', 'user', 107),
(33, 'Paul', 'Maddox', 'PauMad', '5d42e48477da89864e07425d5da59f19', 'user', 100),
(34, 'Robert', 'Alteri', 'RobAlt', '38a7fbb95cfe799f793d8decc5398a09', 'user', 108),
(35, 'Richard', 'Snowden', 'RicSno', 'e248d22049af984881e1dde045f05f11', 'user', 108),
(36, 'Margarita', 'Perez', 'MarPer', '389aea80640aa6e563b87102abcd5eea', 'user', 106),
(37, 'Maria', 'Caroll', 'MarCar', '3b4162d7ff2f09a5240d9f6a30aefeda', 'user', 107),
(38, 'Hilda', 'Grable', 'HilGra', 'd185bbf93f1dd032933b719997c3dba2', 'user', 106),
(39, 'Regina', 'Mcknight', 'RegMck', '06b5fe33af254d43f74fd14e3332d630', 'user', 107),
(40, 'Robert', 'West', 'RobWes', '97cbe443751c9f45d394bd752473bfb3', 'user', 100),
(41, 'William', 'Schwartz', 'WilSch', 'fb2109b0e97a1bce46b6dbe82687d050', 'user', 100),
(42, 'Joseph', 'Heflin', 'JosHef', '80d6f8d2aa9f53e92bafb2914d13a4f0', 'user', 107),
(43, 'Margarita', 'Whiteside', 'MarWhi', '4486994b291591b7bb47077a48ffce2b', 'user', 106),
(44, 'Melinda', 'Ceron', 'MelCer', '621081ab931b239ee6fbde4732865bc5', 'user', 108),
(45, 'Richard', 'Snowden', 'RicSno', 'e248d22049af984881e1dde045f05f11', 'user', 108),
(46, 'Margarita', 'Perez', 'MarPer', '389aea80640aa6e563b87102abcd5eea', 'user', 106),
(47, 'Maria', 'Caroll', 'MarCar', '3b4162d7ff2f09a5240d9f6a30aefeda', 'user', 107),
(48, 'Hilda', 'Grable', 'HilGra', 'd185bbf93f1dd032933b719997c3dba2', 'user', 106),
(49, 'Regina', 'Mcknight', 'RegMck', '06b5fe33af254d43f74fd14e3332d630', 'user', 107),
(50, 'Robert', 'West', 'RobWes', '97cbe443751c9f45d394bd752473bfb3', 'user', 100),
(51, 'William', 'Schwartz', 'WilSch', 'fb2109b0e97a1bce46b6dbe82687d050', 'user', 100),
(52, 'Joseph', 'Heflin', 'JosHef', '80d6f8d2aa9f53e92bafb2914d13a4f0', 'user', 107),
(53, 'Margarita', 'Whiteside', 'MarWhi', '4486994b291591b7bb47077a48ffce2b', 'user', 106),
(54, 'Melinda', 'Ceron', 'MelCer', '621081ab931b239ee6fbde4732865bc5', 'user', 108),
(55, 'Bernice', 'Morris', 'BerMor', '2ef1c07632c7685555935225cc02d8b9', 'user', 106),
(56, 'Mary', 'Pang', 'MarPan', '061a0e58da4bd7df230657e0cf6df60e', 'user', 100),
(57, 'Carole', 'Jarrett', 'CarJar', '5082251e09699473c0c2f2ac120a7472', 'user', 108),
(58, 'Frank', 'Webb', 'FraWeb', 'e4748dfd4789873e70377793b5305250', 'user', 106),
(59, 'Douglas', 'Tweed', 'DouTwe', 'd5f561192bae912961623a042ec4651b', 'user', 108),
(60, 'Teresa', 'Rizzo', 'TerRiz', '269fe0e220d39f5ceeb5cce4c7802096', 'user', 107),
(61, 'Shirley', 'Bennett', 'ShiBen', '80b3e9cfc6363574c5d0c20046f03e0f', 'user', 106),
(62, 'Rick', 'Wright', 'RicWri', 'c242d5860eea51ee68b5aae6005ccaea', 'user', 100),
(63, 'Louis', 'Griffin', 'LouGri', '70ed3d6e039f63791ed5fe8ed3fcf946', 'user', 106),
(64, 'Jesse', 'Sanderson', 'JesSan', '0266088c656e42609f5b8a8e5b02086e', 'user', 106),
(65, 'Lorraine', 'Jackson', 'LorJac', '8444a7f80e458d795b9408868fb0f354', 'user', 100),
(66, 'Kristen', 'Cesar', 'KriCes', 'd12479c18248084a6219c27fc4b06445', 'user', 106),
(67, 'Joshua', 'Nelson', 'JosNel', 'c8c31a173d638b589681eac5ac61d5f5', 'user', 107),
(68, 'Socorro', 'Grover', 'SocGro', '0d6dc243746cb410f3c018abab8a70c1', 'user', 107),
(69, 'Doris', 'Chandler', 'DorCha', '5d2906829c5ecfd7275ba1c91c9f452d', 'user', 108),
(70, 'Sofia', 'Huffman', 'SofHuf', 'fceb04514e0347041d05a248d539b6c4', 'user', 108),
(71, 'Billy', 'Ray', 'BilRay', 'ff9b976e0696b18236f2efcab6ff3206', 'user', 106),
(72, 'Sharon', 'Scott', 'ShaSco', '5140c9073825a631e4065444055e7196', 'user', 100),
(73, 'Marina', 'Dunbar', 'MarDun', '0760e2eb01fa9492a84f940e5037b416', 'user', 100),
(74, 'Aleen', 'Sylvia', 'AleSyl', '493c71e1b750c254362dee15c9a26e5c', 'user', 100),
(75, 'Phyllis', 'Swanson', 'PhySwa', 'e524650abb089ee9b61ee7b06f87d771', 'user', 108),
(76, 'Jason', 'Romero', 'JasRom', '37460d16b0472e7ef7cc30cb6b0b611c', 'user', 100),
(77, 'Fredrick', 'Cleaver', 'FreCle', '3595b6eab9200aef88444d0e27977de1', 'user', 108),
(78, 'Juan', 'Phillips', 'JuaPhi', '2acd4064d6baf235ef87a49739ead0bf', 'user', 107),
(79, 'Jo', 'White', 'JoWhi', 'e31b1d5a8f80f49f7b555d53664cd3a9', 'user', 107),
(80, 'Carolyn', 'Castaneda', 'CarCas', '1063b3172786bb589c5591767cab0685', 'user', 107),
(81, 'Jack', 'Gonzales', 'JacGon', 'e50dc831012d1d43a925eaf66e60daeb', 'user', 100),
(82, 'George', 'Alexander', 'GeoAle', '15232fcdfa6c0a41b599d894c5e16272', 'user', 108),
(83, 'Carolyn', 'Hopper', 'CarHop', 'd60cbc8253a500f880f63663046bb470', 'user', 106),
(84, 'Michael', 'Williams', 'MicWil', 'a77cd9768d498798003b180b00c6dfae', 'user', 108),
(85, 'Michael', 'Schaefer', 'MicSch', 'b1231ff7f2fbd7b36a8ec3f74c691867', 'user', 108),
(86, 'Donald', 'Stevenson', 'DonSte', 'e4d15cc925938ce6527e2fc1c96a423f', 'user', 106),
(87, 'Lillian', 'Nimox', 'LilNim', '8ce7c635b53ed8db5de779db5c1cfce0', 'user', 108),
(88, 'Cynthia', 'Mitchell', 'CynMit', 'e6426c63a1dbd189790f73d907a9c6c7', 'user', 100),
(89, 'Ramon', 'Devit', 'RamDev', '496fc8ddc5d21646dce72a52c86d2d2e', 'user', 107),
(90, 'Glenn', 'Hill', 'GleHil', '447abf4e745c053520978706be557cd2', 'user', 100),
(91, 'Richard', 'Rousselle', 'RicRou', '51a2a876cd3e9b5e8446e0c01e9af312', 'user', 106),
(92, 'Allen', 'Bishop', 'AllBis', '3e774ec4e35ffac6a8460062a50e3a15', 'user', 100),
(93, 'Ellen', 'Cauthon', 'EllCau', 'ca5d46efe6ae9283f109523de995e118', 'user', 107),
(94, 'Nathan', 'Espinoza', 'NatEsp', '5da772e556f9cbc9619a72ac9df4cde2', 'user', 108),
(95, 'Dorothy', 'Brown', 'DorBro', '83167e28493b1f94065afc422ad36d38', 'user', 108),
(96, 'James', 'Rozzi', 'JamRoz', '1fed7cd8c6e4c338c7eeeb6a9d8e0e8d', 'user', 106),
(97, 'Mary', 'Jackson', 'MarJac', 'd21c5aca44d79067cd5260cec104c189', 'user', 108),
(98, 'Angelita', 'Mendiola', 'AngMen', 'e94a365e9322c71e7b8440b1988ba8b3', 'user', 100),
(99, 'Daina', 'Farris', 'DaiFar', 'afa74910e668f09adb207bc92409f033', 'user', 106),
(100, 'Linda', 'Christopher', 'LinChr', '7f9978c8b7070fe706afbec02e7b4ee7', 'user', 106),
(101, 'Laura', 'Rega', 'LauReg', 'c9b36336a032ed2e29b644867228d1a5', 'user', 108),
(102, 'Carolyn', 'Gonzalez', 'CarGon', '1957a7ca89da2096171c06f67c635d81', 'user', 100),
(103, 'Marjorie', 'Eddy', 'MarEdd', 'd8689662052d2f79e0597b4b1b30a832', 'user', 107),
(104, 'Michelle', 'Billie', 'MicBil', '9c3651db3b934bd1cf4412dc90086ce5', 'user', 106),
(105, 'Karen', 'Carter', 'KarCar', '6a0a89cfff328df4470cd2b466d9e1a7', 'user', 106),
(106, 'Thomas', 'Morgan', 'ThoMor', '79b976ba74683fc8989b7f83fe8df391', 'user', 100),
(107, 'Edmund', 'Steed', 'EdmSte', '6709e0fe2692f1c840f396c70bc1b56e', 'user', 100),
(108, 'Scott', 'Rivera', 'ScoRiv', 'a9c23d94c286a1cc2aadc446252f73b7', 'user', 107),
(109, 'Alan', 'Myers', 'AlaMye', '56a44d7b2b5ac28ba52589555182b29c', 'user', 108),
(110, 'Helen', 'Toomey', 'HelToo', '4788c2686377798e46f6780bba1f3695', 'user', 108),
(111, 'William', 'Velasquez', 'WilVel', 'd81ce57d77d8853fb2efbf8cf6a29f5d', 'user', 108),
(112, 'Nellie', 'Williamson', 'NelWil', 'a06606cad53844fe3c9b7bc24d78dcb4', 'user', 108),
(113, 'Kenneth', 'Salter', 'KenSal', '90a1734d9b4288991e3da5cc68333c61', 'user', 106),
(114, 'Micheal', 'Harmon', 'MicHar', '4f5011ec38290de307b9ff1e6480ae82', 'user', 108),
(115, 'Matthew', 'Haverstock', 'MatHav', '66e73609955430c361a525e42db09cf4', 'user', 107),
(116, 'Jerome', 'Welch', 'JerWel', 'a7b6fd7ed83daa37f6371e946aa8cdb1', 'user', 106),
(117, 'Kathryn', 'Kloc', 'KatKlo', 'ac87821452fb642c834e4a0b422d83fc', 'user', 100),
(118, 'Joshua', 'Hornlein', 'JosHor', '2ea6cb0a962083b3fc47d7af15e16faa', 'user', 100),
(119, 'Lieselotte', 'Cassidy', 'LieCas', '033d8cf2251ba640a00765bd4f25f012', 'user', 106),
(120, 'John', 'Brown', 'JohBro', '543f7a0a2580ae0070e49d77ec47615f', 'user', 107),
(121, 'Eric', 'Ayers', 'EriAye', 'f858fb6939ea2d758cbcb64de307784c', 'user', 108),
(122, 'Benjamin', 'Kinney', 'BenKin', '98c9863af735fbb3d897ec11e063cb5f', 'user', 108),
(123, 'Michael', 'Brunner', 'MicBru', 'df2808a38ff6e30943820af1298d1234', 'user', 108),
(124, 'Linda', 'Robertson', 'LinRob', '374653eeb32e438e5d72ee43e24f7c0e', 'user', 106),
(125, 'Bobby', 'Sexton', 'BobSex', 'a8cbc59cee24febb38e1d2185ca229c5', 'user', 107),
(126, 'Leonard', 'Rogers', 'LeoRog', 'b1d514a11fe516a950b8fe622b635ceb', 'user', 106),
(127, 'Jeffrey', 'Dunleavy', 'JefDun', '4bf5351a501f6445e1466802a39e01db', 'user', 107),
(128, 'Paul', 'Gonzales', 'PauGon', '9d6d29983fb1a07a7d36ed8aad9cf59c', 'user', 108),
(129, 'John', 'Tanner', 'JohTan', '983660a4f3698507ddaf629c0c6a9048', 'user', 106),
(130, 'Frances', 'Frazier', 'FraFra', '882ef562bf813cd462d2c8111d8bfb52', 'user', 100),
(131, 'Cathy', 'Franks', 'CatFra', '68283fd0778a338f57cc8367b53e16fa', 'user', 107),
(132, 'Elaine', 'Eades', 'ElaEad', '42ecbdf71bc142a6e9f7055380ba8577', 'user', 106),
(133, 'Daniel', 'Khan', 'DanKha', 'c03d3e9d21d0d8c48eb66e42128089f7', 'user', 106),
(134, 'Angelo', 'Overby', 'AngOve', '54c03256ff68f5f42c97763fae9cac23', 'user', 106),
(136, 'rokas', 'rokaitis', 'rokrok', '3527ec72cfc4c33926e3b9055b053d77', 'user', 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `plan` (`plan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `plan` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
