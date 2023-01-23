-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2021 at 08:38 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medicine`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'abc@gmail.com', '123456'),
(2, 'bca@gmail.com', 'bca123');

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `card_no` varchar(30) NOT NULL,
  `exp` varchar(30) NOT NULL,
  `amount` varchar(30) NOT NULL,
  `cvv` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`id`, `name`, `card_no`, `exp`, `amount`, `cvv`) VALUES
(1, 'Preeti Harman', '9874456112346541', '25/10', '98493', 987),
(3, 'Preeti', '1234567812345678', '5/07', '250000', 852);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `p_id` varchar(50) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `p_quantity` varchar(30) NOT NULL,
  `p_price` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `state` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `payment_method` enum('cash','online') NOT NULL,
  `o_notes` text NOT NULL,
  `status` enum('a','d') NOT NULL DEFAULT 'd',
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `p_name`, `p_quantity`, `p_price`, `name`, `address`, `state`, `email`, `phone`, `payment_method`, `o_notes`, `status`, `created`) VALUES
(2, '32,2,31,', '', '2,1,1,', '1507', 'harmanpreet kaur', 'Model house', 'wert', 'harman123@gmail.com', '9876543210', 'online', 'wertyu', 'd', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Ayurvedic Medicine'),
(2, 'Homeopathic Medicine'),
(3, 'Nutrition and fitness suppliments'),
(5, 'Covid Essentials');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `Id` int(10) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Subject` varchar(50) NOT NULL,
  `Message` varchar(100) NOT NULL,
  `Created` datetime NOT NULL,
  `Status` enum('a','d') NOT NULL DEFAULT 'd'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`Id`, `fname`, `lname`, `Email`, `Subject`, `Message`, `Created`, `Status`) VALUES
(1, 'Preeti', 'Kashyap', 'preetirani1502@gmail.com', 'hello', 'hlo everyone!  hgg', '2021-06-15 16:36:55', 'd');

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(30) NOT NULL,
  `image` text NOT NULL,
  `image1` text NOT NULL,
  `description` text NOT NULL,
  `Brand` varchar(100) NOT NULL,
  `rating` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`id`, `cat_id`, `name`, `price`, `image`, `image1`, `description`, `Brand`, `rating`) VALUES
(1, 1, 'Dr.ortho', 295, 'images/1611_images.jfif', 'images/1426_DR-ORTHO-1418983738-10004053.jpg', 'Dr Ortho : Ayurvedic Pain Relief Products Dr. Ortho a complete range of joint pain reliever. This medicinal combination of effective herbs is effective to treat all types of joint pains. There are many reasons which could cause sprain such as falling, forceful struck with an object or twisting.', '', 3),
(2, 1, 'Liv-52', 69, 'images/1117_liv-52-himalaya-ayurvedic-products-500x500.jpg', 'images/1707_OIP.jpg', 'Liv 52 is a product marketed by Himalaya Drug Company. It is one of the most popular products sold for liver strengthening or liver damage repair. It is an Ayurvedic medicine and hence its ingredients are made of rare herbs which have been scientifically proven to cure liver ailments. Composition and Nature of Liv 52:', '', 0),
(3, 1, 'Kofol Chewable Tablets Sugar Free Jar ', 32, 'images/1557_kofol.jpg', 'images/889_kofol2.jpg', 'KOFOL Lozenge is a versatile combination of medicinal herbs, which have reduce throat redness and inflammation. Haldi and Sunthi are antibacterial and anti-inflammatory. Yashtimadhu and Vasa helps loosen mucus by making bronchial secretions thinner and easier to cough up. Tulsi strengthens the immune system.', '', 0),
(4, 1, 'Dabur honitus cough syrup', 75, 'images/1183_dabuur-honitus.jpg', 'images/604_dabur-honitus-syrup-100-ml-4.jpg', 'Dabur\'s Honitus Cough Syrup provides effective relief from cough without causing drowsiness. Dabur Honitus Cough Syrup is Honey-based herbal syrup that is fortified with Tulsi, Mulethi & Banapsha and other scientifically tested herbs.. Honey: Relieves Cough and Throat irritation', '', 0),
(5, 2, 'Homeopathy Acne Kit ', 499, 'images/1520_Homeopathy-Acne-Kit.jpg', 'images/196_Homeopathy-Acne-Kit2.jpg', 'Homeopathy Acne Kit addresses the root cause of acne, it controls excess sebum production. A specialist formulation that has specific anti acne herbal medicines, repairs & replenishes skin from within. Reverses negative hormonal effects. > Contains Berberis Aquifolium is indicated for acne that result in the formation of scars.', '', 0),
(6, 2, 'Healwell Gastroheal Pills for Indigestion, Abdomin', 60, 'images/1637_healwell-gastroheal-pills.jpg', 'images/698_healwell-gastroheal-pills.jpg', 'Healwell Gastroheal Pills Is primarily used to manage digestive disorders. Highly useful for people suffering ailments associated with gastritis and neutralizes excessive stomach acid build-up in the body. It is effective in managing acute cases of indigestion with flatulence, bloating and provides quick relief from severe abdominal pains.', '', 5),
(7, 3, 'D protein choclate Diabetes care powder 	', 195, 'images/1108_choco.jpg', 'images/1454_choco.jpg', 'The D Protin chocolate diabetes care powder is an ideal nutritional supplement, which has been scientifically formulated for those who have diabetes. Daily intake of this supplement along with a balanced diet and exercise will ensure that the diabetic patients lead an active and healthy lifestyle.', '', 0),
(8, 3, 'Horlicks choclate nutrition drink	', 263, 'images/107_horlicks.jpg', 'images/1898_horlicks1.jpg', 'Horlicks is a Health Drink that has nutrients to support immunity. Horlicks is clinically proven to improve 5 signs of growth and is clinically proven to make kids taller, stronger and sharper. Horlicks is scientifically proven to improve power of milk. Horlicks is now available in 4 exciting and yummy flavors - Classic malt, Chocolate, Elaichi, Kesar Badam. Enjoy with a cup of hot milk or a glass of cold milk.', '', 0),
(9, 5, 'Dabur chyawanprakash sugar free	', 178, 'images/1468_dabur.jpg', 'images/1053_dabur1.jpg', 'Dabur Chyawanprakash sugar free Dabur is another trusted brand name in the market of FMCG and healthcare products offering a wide range of products that will help you boost your immune system or cure you of basic ailments. This sugar-free chyawanprash even increases your overall energy level.', '', 0),
(10, 5, 'Dettol original handwash	', 149, 'images/1378_dettol.jpg', 'images/1580_dettol1.jpg', 'Description Dettol Original Handwash has an advanced germ protection formula that prevents the spread of disease-causing germs and protects your family. The original Dettol hand wash delicately cleanses your skin and leaves it feeling soft, hydrated and with a fresh fragrance.', '', 0),
(15, 3, 'Glucon D Orange Health Food Jar ', 157, 'images/1226_glucose1.jpg', 'images/914_glucose.jpg', 'Glucon-D is the preferred choice in summer when the scorching heat drains out body glucose. Glucon-D contains 99.4 percent glucose. It is easily absorbed by body, thus giving instant energy and rejuvenation. It restores energy 2 times faster compared to ordinary sugar based drinks.', '', 0),
(16, 3, 'Revital H Health Supplement Capsules ', 99, 'images/1657_revital.jpg', 'images/444_revitall.jpg', 'Revital H Health Supplement capsules are nutritional supplements that contain vitamins and 9 minerals as well as Ginseng. These help to get your daily dose of required nutrients and Ginseng helps to aid in mental concentration.', '', 0),
(17, 5, 'Lifebuoy Total Hand Sanitizer 250 Ml', 115, 'images/1262_life.jpg', 'images/1953_life1.jpg', '\"Boost the agents that give you hand immunity to keep fighting germs for upto 10 hours with Lifebuoy Immunity Boosting Sanitizer. It not only kills 99.99% germs instantly, but also boosts you immunity for upto 10 hours. And all this without having to use any water.', '', 0),
(18, 5, 'Liveasy Wellness Immuno Protein ', 675, 'images/1483_immunity.jpg', 'images/979_immunity1.jpg', 'LivEasy Wellness Diabetic Protein Powder contains whey protein, which has a very low glycaemic index. On consuming it, the blood sugar level does not rise. It can also help in reducing the hunger hormone Ghrelin. Complex carbohydrates contain complex chains of sugar that the human body takes a long time to break up.', '', 0),
(19, 2, 'SCHWABE BIOCOMBINATION NO 01', 500, 'images/469_alpha.jpg', 'images/1237_alpha.jpg', 'Biocombination No.01 is a special combination prepared from various biochemic remedies such as Calcarea Phosphorica 3x, Ferrum phosphoricum 3x ,Kalium Phosphoricum 3x and Natrum Muriatricum 6x in equal proportions. It is specially formulated for anemia and related problems.', '', 0),
(20, 1, 'Charak Addyzoa Capsules', 150, 'images/1087_charak.jpg', 'images/1768_charak1.jpg', 'Charak Addyzoa Capsule is a herbo-mineral spermatogenic antioxidant. Excessive oxidative stress is responsible for sperm damage. Addyzoa has multifaceted free radical scavenging action and therefore, it helps to minimize the damage to the sperm cells due to free radicals. Key Ingredients: Ashwagandha (Withania somnifera)', '', 3),
(21, 1, 'Liveasy Essentials Copper Bottle-ayurvedic', 1100, 'images/186_copper.jpg', 'images/1040_copper1.jpg', 'LivEasy Essentials Copper Bottle is made from 99.9% pure copper. Since time immemorial, Ayurveda has known the benefits and virtues of this metal. Copper has healing potential and antimicrobial properties.', '', 0),
(22, 1, 'Everherb Amla Juice-rich In Vitamin C', 300, 'images/966_juice.jpg', 'images/1250_juice1.jpg', 'EverHerb Amla Juice contains 99.9% Amla extracts which is an excellent source of vitamin C. It is an antioxidant and helps boost the body’s immune system and can protect cells from oxidative damage. EverHerb Amla Juice aids in speeding up metabolism, increasing energy levels and can help to keep body weight in control.', '', 0),
(23, 1, 'Turmaboost Turmeric Immunity Booster  ', 165, 'images/1340_turmaboost.jpg', 'images/630_turmaboost1.jpg', 'TURMABOOST is an immunity booster, which contains Curcumin (active ingredient in turmeric) and Piperine (active ingredient in black pepper) Curcumin: It is a powerful antioxidant, anti-inflammatory, antiseptic, anti-fungal, anti-bacteria agent', '', 0),
(24, 1, 'Cipla Maxirich Tulsi Drops - 30 Ml', 195, 'images/836_cipla-maxirich.jpg', 'images/805_cipla-maxirich1.jpg', 'Maxirich Tulsi Drop is made from the extract of 5 types of tulsi, shyam tulsi, vishnu tulsi, ram tulsi, nimbu tulsi and van tulsi.Tulsi is known for being a wonder herb which has innumerable health benefits like it is beneficial in skin health, heart health, joint health and digestive health.', '', 0),
(25, 1, 'Everherb Moringa-Immunity Booster C', 500, 'images/1626_everherb.jpg', 'images/1709_everherb1.jpg', 'EverHerb Moringa - a natural immunity booster, contains extracts from the leaves of plant Moringa Oleifera, also known as ‘The Miracle tree’. Moringa Oleifera is nutritionally the richest tree known. Different parts of this tree such as roots, bark, fruits, flowers and leaves are rich in vitamins, minerals and antioxidants.', '', 0),
(26, 1, 'Baidyanath Rogan Badam Oil - 50 Ml', 200, 'images/837_baidyanath-rogan-badam.jpg', 'images/1310_baidyanath-rogan-badam1.jpg', ' Baidyanath. ROGAN BADAM is an Ayurvedic & Herbal Medicine to Promote Balance of Emotions During Time of Stress & Maintain a Healthy Body & Mind. ... It is a modern take on ancient knowledge that allows us to convert sweet edible almonds to Rogan Badam oil.', '', 0),
(27, 1, 'Medlife Essentials Shilajeet Capsule 30', 300, 'images/1391_shilajeet-capsule.jpg', 'images/327_shilajeet.jpg', 'Each capsule contains the extract of Shilajeet. Pack Size Availability: 30 Capsules, 3 x 30 Capsules, 6 x 30 Capsules. Dosage: 1 capsule twice daily orally after meals or as directed by the physician. Storage conditions: Store at room temperature (25-30°C). Protect from moisture and light. Keep the container tightly closed. Keep out of reach of children.', '', 0),
(28, 1, 'Biogetica Arthrosolve Joint Support Tablets', 699, 'images/1795_biogetica.jpg', 'images/1392_biogetica-arth.jpg', 'Arthrosolve is a combination of Ayurvedic herbs traditionally used for joint support. **. Arthrosolve. Ingredient. Guggul Ghan Niryas Commiphora Mukul 60. Shallaki Ghan Niryas Boswellia Serrata 41. Rasna Ghan Leaves Pluchea Lanceolata 25. Nirgundi Ghan Leaves Vitex Negundo 18. Methika Ghan Seed Trigonella Foenumgraecum 18.', '', 0),
(29, 1, 'Kapiva Aloe Vera Immunity Booster ', 130, 'images/747_kapiva-aloe-vera-immunity-booster.jpg', 'images/920_kapiva-aloe-vera-immunity-booster-capsules-bottle.jpg', 'Kapiva Aloe Vera + Amla Juice is Safe for All Both Aloe Vera and Amla have been used in traditional Ayurvedic practices for thousands of years to help aid digestion, build immunity, help control blood pressure and much more. Kapiva’s Aloe Vera + Amla Juice does not contain any added sugar, gum, flavours or colours.', '', 0),
(30, 1, 'Zandu Haridra Pure Herbs Skin Care ', 250, 'images/247_haridra.jpg', 'images/127_haridra1.jpg', 'Zandu Haridra Pure Herb is formulated with 100% pure extracts of Haridra (turmeric). Turmeric is an Ayurvedic immunity booster that effectively protects against infections. Being an antioxidant and anti-allergic herb, turmeric is extremely beneficial in skincare, hence, regular use of this supplement will help achieve radiant skin.', '', 0),
(31, 1, 'Kapiva Milk Thistle + Anti Aging Capsules ', 650, 'images/137_Zandu Haridra.jpg', 'images/1699_kapiva-mi.jpg', 'Kapiva Ayurveda Milk Thistle Plus Anti-Aging Capsule contains Milk Thistle (300mg) and Turmeric (200mg) as major ingredients. The formulation offers tremendous results to the skin and helps in keeping the skin young and supple. Key benefits/uses of Kapiva Ayurveda Milk Thistle Plus Anti-Aging Capsule:', '', 0),
(32, 1, 'Baidyanath Kesari Royal Chyawanprash ', 394, 'images/993_baidyanath-kesari-kalp-royal.jpg', 'images/1980_baidyanath-kesari-kalp-royal.jpg', 'Baidyanath Kesari Kalp Royal Chyawanprash is enriched with Gold, Silver & Saffron with 44 herbs and minerals that help boost energy and vitality. Baidyanath Kesari Kalp Royal Chyawanprash is a unique research formula and is an Ayurvedic tonic that is formulated with the combination of rare herbs, rich spices and fruits by renowned Ayurvedic scholars and Baidyanath’s Research Foundation. ', '', 0),
(33, 1, 'Zandu Pancharishta Digestive Tonic Bottle', 195, 'images/1284_zandu-pancharishta.jpg', 'images/835_zandu-pancharishta1.jpg', 'DABUR Tulsi Drops- 50% Extra: Concentrated Extract of 5 Rare Tulsi for Natural Immunity Boosting & Cough and cold Relief: (20ml +10ml Free)       ', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `Email`, `Message`) VALUES
(2, 'Ravinder', 'ravv32@gmail.com', 'I\'ve had a good experience the consultation with doctor feature works well too.'),
(3, 'Nisha rani', 'nisha21@gmail.com', 'Would recommend it to everyone requiring fast and efficient delivery of medical products at the doorstep.');

-- --------------------------------------------------------

--
-- Table structure for table `pres_nonpres`
--

CREATE TABLE `pres_nonpres` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` enum('m','f') NOT NULL,
  `address` text NOT NULL,
  `state_country` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `ref` text NOT NULL,
  `image` text NOT NULL,
  `desc1` text NOT NULL,
  `desc2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pres_nonpres`
--

INSERT INTO `pres_nonpres` (`id`, `name`, `gender`, `address`, `state_country`, `email`, `phone`, `ref`, `image`, `desc1`, `desc2`) VALUES
(1, 'Ravinder kaur', 'f', 'rama mandi, near bridge', 'Punjab', 'ravv12@gmail.com', '9464230299', 'Dr. abc', 'images/587_prescription.jpg', '', ''),
(3, 'mandeep', 'f', 'model town', 'India', 'mandeep@gmail.com', '9876543210', 'Dr. preeti', 'images/1194_prescription.jpg', 'gopu tablets', '');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `rating` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `Id` int(10) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `State` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Phone` varchar(13) NOT NULL,
  `Created` datetime NOT NULL,
  `Status` enum('a','d') NOT NULL DEFAULT 'd'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`Id`, `fname`, `lname`, `Address`, `State`, `Email`, `Password`, `Phone`, `Created`, `Status`) VALUES
(1, 'harmanpreet', 'kaur', 'Model house', 'Punjab', 'harman123@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '9876543210', '2021-06-16 16:21:52', 'd'),
(2, 'Preeti', 'Kashyap', 'sant nagar', 'India', 'preetirani1502@gmail.com', '12345', '8264172274', '2021-06-16 16:31:35', 'd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pres_nonpres`
--
ALTER TABLE `pres_nonpres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pres_nonpres`
--
ALTER TABLE `pres_nonpres`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail`
--
ALTER TABLE `detail`
  ADD CONSTRAINT `cat_id` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
