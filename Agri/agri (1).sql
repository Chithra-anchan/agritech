-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2023 at 12:36 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agri`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `aemail` varchar(250) NOT NULL,
  `apass` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `aemail`, `apass`) VALUES
(1, 'prathamkulal19@gmail.com', 'Prathu@77'),
(2, 'tusharktushar3@gmail.com', 'tushar@123'),
(3, 'chithra973c@gmail.com', 'chithu@5');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `quantity` int(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int(11) NOT NULL,
  `cname` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `cname`) VALUES
(1, 'Fungicides'),
(2, 'Insecticides'),
(3, 'Fertilizers'),
(12, 'Seeds');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fid` int(11) NOT NULL,
  `cusid` int(250) NOT NULL,
  `rating` varchar(250) NOT NULL,
  `message` varchar(250) NOT NULL,
  `fdate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fid`, `cusid`, `rating`, `message`, `fdate`) VALUES
(11, 9, 'Very good', 'good delivery service', '2023-07-10'),
(12, 19, 'Good', 'good product more usefull', '2023-07-10');

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `info_id` int(11) NOT NULL,
  `info_title` varchar(250) NOT NULL,
  `info_img` varchar(250) NOT NULL,
  `info_msg` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`info_id`, `info_title`, `info_img`, `info_msg`) VALUES
(35, 'Know about Pm-Kisan Samman Nidhi and where to apply.', 'upload/pmkisan.jpg', 'PM Kisan is a Central Sector scheme with 100% funding from Government of India.It has become operational from 1.12.2018.Under the scheme an income support of 6,000/- per year in three equal installments will be provided to all landholding farmer families.Definition of family for the scheme is husband, wife and minor children.State Government and UT administration will identify the farmer families which are eligible for support as per scheme guidelines.The fund will be directly transferred to the bank accounts of the beneficiaries.There are various Exclusion Categories for the scheme.\r\nApply for PmKissan in:https://pmkisan.gov.in'),
(36, 'The Raita Vidya Nidhi Scholarship Scheme ', 'upload/raita-vidhya.png', 'The Raita Vidya Nidhi Scholarship Scheme was inaugurated by the Karnataka government on August 7, 2021. Scholarships are awarded to the children of farmers through this program. Children of farmers who are seeking higher education would receive scholarships ranging from Rs 2500 to Rs 11000.\r\nwhere to Apply:raitamitra.karnataka.gov.in');

-- --------------------------------------------------------

--
-- Table structure for table `order1`
--

CREATE TABLE `order1` (
  `oid` int(11) NOT NULL,
  `cusid` int(250) NOT NULL,
  `pid` int(250) NOT NULL,
  `or_quantity` int(100) NOT NULL,
  `or_total` int(100) NOT NULL,
  `or_status` varchar(250) NOT NULL,
  `or_date` date NOT NULL DEFAULT current_timestamp(),
  `unid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order1`
--

INSERT INTO `order1` (`oid`, `cusid`, `pid`, `or_quantity`, `or_total`, `or_status`, `or_date`, `unid`) VALUES
(32, 9, 5, 1, 369, 'Delivered', '2023-07-09', '64aa88b88a6eb'),
(33, 9, 11, 1, 2602, 'Delivered', '2023-07-09', '64aa88b88a6eb'),
(34, 9, 20, 1, 280, 'pending', '2023-07-10', '64aba4acefd72'),
(35, 19, 13, 1, 350, 'Delivered', '2023-07-10', '64abb412779f5'),
(36, 19, 15, 1, 215, 'Delivered', '2023-07-10', '64abb412779f5');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payid` int(11) NOT NULL,
  `cid` int(250) NOT NULL,
  `oid` int(250) NOT NULL,
  `pay_type` varchar(250) NOT NULL,
  `trans_id` int(100) NOT NULL,
  `cardname` varchar(250) NOT NULL,
  `card_no` int(250) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `unid` text NOT NULL,
  `amt` int(250) NOT NULL,
  `pay_status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payid`, `cid`, `oid`, `pay_type`, `trans_id`, `cardname`, `card_no`, `date`, `unid`, `amt`, `pay_status`) VALUES
(33, 9, 32, 'cash', 0, '', 0, '2023-07-09', '64aa88b88a6eb', 369, 'paid'),
(34, 9, 33, 'cash', 0, '', 0, '2023-07-09', '64aa88b88a6eb', 2602, 'paid'),
(35, 9, 34, 'cash', 0, '', 0, '2023-07-10', '64aba4acefd72', 280, 'paid'),
(36, 19, 35, 'card', 0, 'chithra', 2147483647, '2023-07-10', '64abb412779f5', 350, 'paid'),
(37, 19, 36, 'card', 0, 'chithra', 2147483647, '2023-07-10', '64abb412779f5', 215, 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(11) NOT NULL,
  `pname` varchar(250) NOT NULL,
  `product_img` varchar(250) NOT NULL,
  `product_description` varchar(1000) NOT NULL,
  `product_price` int(200) NOT NULL,
  `product_stock` int(200) NOT NULL,
  `cid` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `pname`, `product_img`, `product_description`, `product_price`, `product_stock`, `cid`) VALUES
(4, 'Syngenta - Abic - ( 1 Kg )', 'upload/agri_6150a472156d8.png', 'Details: Abic helps to control brown and black rust, blight of wheat, leaf blight & downy mildew of maize, blast of paddy, and leaf spot of sorghum among other pests.\r\nMode Of Action: Abic M-45 offers non-systematic, contact and protective action.\r\nDosage: Foliar Spray – 600gm/acre, Seed Treatment – 3gm/kg of seeds.', 384, 150, 1),
(5, 'Upl - Saaf - ( 500 gm )', 'upload/SAAF.jpg', '𝐃𝐞𝐭𝐚𝐢𝐥𝐬: Saaf is a proven & classic fungicide with systemic & contact action. Most trusted & widely used dual mode of action fungicide( systemic and contact) and application helps to protect the plant for a lengthy period of time.\r\n𝐌𝐨𝐝𝐞 𝐎𝐟 𝐀𝐜𝐭𝐢𝐨𝐧: Systemic and Contact. Carbendazim involves interference in the biosynthesis of DNA during fungal cell division :\r\n Mancozeb provides a protective film over plant surfaces hence inhibits germination of the spores.\r\n𝐃𝐨𝐬𝐚𝐠𝐞: 300-400g/acre, 2-3 g/lit.', 369, 150, 1),
(11, 'Syngenta - Amistar - ( 500 ml )', 'upload/agri_6150b10886b4e.png', '𝐃𝐞𝐭𝐚𝐢𝐥𝐬:AMISTAR contains azoxystrobin for the control of a range of fungal diseases in a range of crops\r\n𝐌𝐨𝐝𝐞 𝐎𝐟 𝐀𝐜𝐭𝐢𝐨𝐧:Amistar works on the Respiratory system of the fungus, thus depriving the fungus of the energy required to grow, thus effectively killing the fungus.\r\n𝐃𝐨𝐬𝐚𝐠𝐞:2-3ml/lit,', 2602, 10, 1),
(12, 'Syngenta - Actara - ( 100 Gm )', 'upload/agri_6150aa0b98fb1.png', '𝐃𝐞𝐭𝐚𝐢𝐥𝐬: Actara Insecticide is a second-generation neonicotinoid for controlling foliar and soil pests in many crops at low use rates Highly systemic and thus well suited for application as a foliar spray.\r\n𝐌𝐨𝐝𝐞 𝐎𝐟 𝐀𝐜𝐭𝐢𝐨𝐧:Systemic Insecticide For Sucking Pest.\r\n𝐃𝐨𝐬𝐚𝐠𝐞:40g/200-300 litre of water and Tomato - 80g/200 liter of water.\r\n', 208, 130, 2),
(13, 'Bayer - Aliette - ( 500 Gm )', 'upload/agri_6150aa55dd9a2.png', '𝐃𝐞𝐭𝐚𝐢𝐥𝐬:Aliette is a systemic fungicide effective against Oomcytes fungi like downy mildew diseases of grapes and damping off and Azhukal diseases of cardamom.\r\n𝐌𝐨𝐝𝐞 𝐎𝐟 𝐀𝐜𝐭𝐢𝐨𝐧:A systemic fungicide rapidly absorbed through the plant leaves or roots, with translocation both acropetally and basipetally.\r\n𝐃𝐨𝐬𝐚𝐠𝐞:Spray: 2-4 gm/liter of water, 3gm/L of water (Drenching), 600gm per acre.', 350, 50, 1),
(14, 'Basf - Acrobat Complete - ( 1 Kg )', 'upload/agri_6150aeb7ad597.jpg', '𝐃𝐞𝐭𝐚𝐢𝐥𝐬: Acrobat complete is a Complete solution for Downy Mildew and resistance management.Dimethomorph and Metiram.\r\n𝐌𝐨𝐝𝐞 𝐎𝐟 𝐀𝐜𝐭𝐢𝐨𝐧: Acrobat Complete, BASFs latest fungicide which is a unique, balanced blend of two most trusted potential actives Dimethomorph and Metiram. \r\n𝐃𝐨𝐬𝐚𝐠𝐞:4 gm per Litre, Based on Intensity of the disease.\r\n', 660, 150, 1),
(15, 'Mahadhan-19-19-19- ( 1 Kg )', 'upload/agri_6150b65d13be4.png', '𝐃𝐞𝐭𝐚𝐢𝐥𝐬:𝐃𝐞𝐭𝐚𝐢𝐥𝐬:NPK 19:19:19 is a complete water soluble, ideal fertilizer which provides all major macronutrients𝐜𝐨𝐦𝐩𝐨𝐬𝐢𝐭𝐢𝐨𝐧:Nitrogen, Phosphorus, Potassium & Sulphur𝐃𝐨𝐬𝐚𝐠𝐞:5 kg per Acre. And 0.5-1.0 % solution in water', 215, 150, 3),
(16, ' Criyagen - Boron 20% - ( 1 Kg )', 'upload/agri_6150a51d710b1.png', '𝐃𝐞𝐭𝐚𝐢𝐥𝐬:Boron is an essential micronutrient that is needed for all crops.\r\n𝐜𝐨𝐦𝐩𝐨𝐬𝐢𝐭𝐢𝐨𝐧:Boron : 20%      \r\n𝐃𝐨𝐬𝐚𝐠𝐞::5 kg per Acre', 250, 50, 3),
(18, 'Criyagen Amino-G Bucket - ( 10 Kg )', 'upload/agri_617b968c27580.png', '𝐃𝐞𝐭𝐚𝐢𝐥𝐬:Amino-G is a Plant Growth Promoting Amino acid based organic fertilizer, which helps in comprehensive nutrient uptake, crop growth and good yield.\r\n𝐜𝐨𝐦𝐩𝐨𝐬𝐢𝐭𝐢𝐨𝐧:Amino acid\r\nPlant growth promotors \r\nMineral nutrients\r\nCarrier material \r\n𝐃𝐨𝐬𝐚𝐠𝐞:Field crops: 10 to 20 kg/ acre.', 620, 50, 3),
(19, 'Mahadan- 12-61-00(1 Kg) - ( 1 Kg )', 'upload/agri_630ee98c9db94.png', '𝐃𝐞𝐭𝐚𝐢𝐥𝐬:12-61-00 (Monoammonium Phosphate) is one of the best source of potasium.Its is a 100% water-soluble.\r\n𝐜𝐨𝐦𝐩𝐨𝐬𝐢𝐭𝐢𝐨𝐧:Nitrogen : 12%\r\nPhosphorus : 61%\r\n', 210, 33, 3),
(20, 'Coromandel - 00-52-34 - ( 1 Kg )', 'upload/agri_6150a9abc2f3d.png', '𝐃𝐞𝐭𝐚𝐢𝐥𝐬: Mono Potassium Phosphate Water Soluble Fertilizer is used for proper ripening and attractive colour formation of rind in fruits\r\n𝐜𝐨𝐦𝐩𝐨𝐬𝐢𝐭𝐢𝐨𝐧:Mono Potassium Phospate (P2O5 - 52% & K2O - 34%)\r\n𝐃𝐨𝐬𝐚𝐠𝐞:Fertigation : 1-3 kg/acre, Use dosage based on results of the soil analysis, crop and its growth stage. However, do not mix with calcium and magnesium fertilizers.\r\nFoliar application : 4-5 g/l of water', 280, 40, 3),
(21, 'Hpm - 7 Star - ( 5 Gm )', 'upload/agri_641d283e701c3.jpg', '𝐃𝐞𝐭𝐚𝐢𝐥𝐬:It has unique chemical properties , which result in excellent control of many sucking and chewing pests\r\n𝐜𝐨𝐦𝐩𝐨𝐬𝐢𝐭𝐢𝐨𝐧:Thiomethoxam 25% WG\r\n𝐃𝐨𝐬𝐚𝐠𝐞:40g/acre', 150, 10, 2),
(22, 'Baye - Alanto - ( 500 ml )', 'upload/agri_618b9e090b2c3.png', '𝐃𝐞𝐭𝐚𝐢𝐥𝐬:Thiacloprid is a member of the chemical class of neonicotinoid insecticides. It is an effective tool for the control of a broad spectrum of pests which are otherwise difficult to control. Thiacloprid, due to its rain-fastness property, is stable even under conditions of heavy rains and sunlight providing longer persistence.\r\n𝐜𝐨𝐦𝐩𝐨𝐬𝐢𝐭𝐢𝐨𝐧:Thiacloprid : 240 SC (21.7% w/w)\r\n𝐃𝐨𝐬𝐚𝐠𝐞:Spray: 2 mL/ liter of water.', 1636, 15, 2),
(23, 'Tropical - Action 500 - ( 500 Ml )', 'upload/agri_6150aa33e0211.png', '𝐃𝐞𝐭𝐚𝐢𝐥𝐬:Action 500 is effective in controlling cutworms, corn root worms, root grubs, flea beetles, caterpillars, etc.\r\n𝐜𝐨𝐦𝐩𝐨𝐬𝐢𝐭𝐢𝐨𝐧:  chloropyriphos 50 %EC\r\n𝐃𝐨𝐬𝐚𝐠𝐞:150 - 250 ml per acre, 1ml/lit  \r\n', 350, 500, 2),
(26, 'Basf - Acrobat - ( 200 Gm )', 'upload/agri_6166d6784548b.jpg', 'Acrobat is a systemic fungicide that protects plants from fungi in the water mould family, such as Late blight and Downy mildew.', 129, 200, 1),
(29, 'Syngenta - Amistar Top - ( 500 Ml )', 'upload/agri_622af99a26ef6.png', 'It controls a wide range of Ascomycetes, Deuteromycetes including important diseases such as Powdery Mildews, Downey mildews , blights and leaf spot occurring in Wheat, Rice, corn  vegetables. It ensures more grains per panicle and healthy crop at reproductive stage leading to high quality yield amistar provides Long Duration Control.', 2351, 33, 1),
(30, 'Bayer - Antracol - ( 250 gm )', 'upload/agri_6150affd7ea69.png', 'Along with preventing fungal activity, availability of zinc has positive effect on crop as a whole and improves immunity of plants resulting in higher yields and improvement in quality.', 239, 150, 1),
(31, 'Syngenta - Apron Xl - ( 250 Ml )', 'upload/agri_639c42c5ee426.png', 'Apron XL is a modern systemic seed treatment fungicide. Apron XL is specially developed for seed treatment and contains 35% mefenoxam.', 661, 200, 1),
(32, 'Upl - Avancer Glow - ( 300 Gm )', 'upload/agri_6150b66031ef0.png', 'Avancer Glow is an excellent fungicide which provides superior disease control along with remarkable phytotonic benefit.', 500, 150, 1),
(33, 'Indofil - AVTAR - ( 100 Gm )', 'upload/agri_617b8fb49fbe8.png', 'Zineb is a broad-spectrum fungicide with protective action. \r\nHexaconazole is a systemic fungicide with protective and curative action. ', 130, 150, 1),
(34, 'Modesto Crop Protection(600gm)', 'upload/agri_645bdcf3679b0.jpg', 'AZEB gives effective control on Late blight with increased quality and better yield due to its excellent phytotonic effect.\r\nIt is a contact as well as systemic broad spectrum fungicide with protective action .', 899, 10, 1),
(35, 'Indofil - Baan- ( 120 Gm )', 'upload/agri_63514600d27e8.jpg', 'It is a specialty systemic fungicide. The product is rapidly absorbed by rice plant and translocated towards leaf tips. It is a protectant fungicide that prevents the fungus from penetrating the plant. ', 243, 20, 1),
(36, 'Crystal - Bavistin - ( 250 Gm )', 'upload/agri_617b9004f2fba.png', 'A Systemic Fungicide, Bavistin protects and preserves Maize, Pea, Cucumber, Brinjal and Beet from Leaf Spot, Blight and Powdery Mildew.\r\nBavistin is absorbed by the plant and acts on fungal pathogen.', 300, 500, 1),
(37, 'Crystal - Blue Copper - ( 500 Gm )', 'upload/agri_61cd84a5731cc.png', 'Blue copper is a copper based broad spectrum fungicide which controls the fungal as well as bacterial diseases by its contact action.', 446, 200, 1),
(38, 'Dhanuka - Aaatank - ( 1 Litre )', 'upload/agri_64a5160aac6f7.jpg', 'Aaatank (Carbosulfan 25% EC) is a world-renowned insecticide of carbonate group, which by its dual contact and stomach poison action, gives effective control of insects.', 1350, 150, 2),
(39, 'Agastya Agro Ltd - Aalgent - ( 500 Ml )', 'upload/agri_63da16d574870.png', 'Broad spectrum insecticide which can prevent many kinds of harmful insects effectively.', 510, 10, 2),
(40, 'Crystal - Abacin - ( 500 Ml )', 'upload/agri_6150af2d8ec34.png', 'Abacin is a broad spectrum Miticide and Insecticide.Strong translaminar activity with contact and stomach action therefore it gives the best control.', 2910, 40, 2),
(41, 'Bayer - Admire - ( 30 Gm )', 'upload/agri_6150add89ed51.png', 'admire is a systemic insecticide belonging to the chemical class of neonicotinoids and is very effective against various insect pests.\r\nSpray: 0.3-0.4 gm/ liter of water or 60 gm/acre :\r\nSeed treatment: 3-5gm/ kg of seeds. :', 395, 150, 2),
(42, 'Adama - Agas - ( 250 Gm )', 'upload/agri_6150b0bfe4eca.png', 'Agas belongs to the thiourea group. It acts as an insecticide as well as an acaricide. Agas kills larvae, nymphs and adults by contact and / or stomach action and also shows some ovicidal action.', 675, 30, 2),
(43, ' Previous Next Indofil - Agent plus - ( 500 Ml )', 'upload/agri_63e63baecc657.png', 'Agent Plus is a Stomach & contact insecticide. Which is effective for control of pest like Bollworm, Thrips, Jassids, Stem & fruit borer, etc. on cotton, rice,', 350, 150, 2),
(44, 'Nichino - Akio - ( 500 Ml )', 'upload/agri_6351459db85f0.png', 'Very difficult to identify the mite, but Akio can control many types of Mite. (Red spider, Pink, Purple, Yellow mite.),Any time you can spray because Akio can control all stage of mite.', 680, 10, 2),
(45, 'Syngenta - Alika - ( 200 Ml )', 'upload/agri_6150a97dada17.png', 'Mixture of contact & systemic insecticide. It is a broad-spectrum insecticide that provides excellent control of sucking and chewing pests in potato, stringbeans, eggplant, ampalaya, corn, mango, banana, and rice.', 601, 150, 2),
(46, 'Gharda - Alpaguard - ( 500 Ml )', 'upload/agri_6369f628b97a3.png', 'DESCRIPTION ALPHAGUARD 10EC is a broad spectrum insecticide containing Alphacypermethrin which is a Synthetic Pyrethroid for control of Beanflower Thrips on French Beans.', 215, 100, 2),
(47, 'Adama - Amnon - ( 250 Gm )', 'upload/agri_6150b07e7bef7.png', 'Amnon is an insecticide which belongs to avermectin group. It is an insecticide with stomach action and should be ingested by the larvae to be most effective. Affected larvae become paralyzed and stop feeding shortly after exposure to Emamectin benzoate 5% SG and subsequently die after 2-4 days. Amnon is highly effective in various lepidopteran pest.', 785, 50, 2),
(48, 'Syngenta - Ampligo - ( 25 Ml )', 'upload/agri_6150b65ecfe64.png', 'Excellent insecticide mixture containing Chloratranilprole (10 %)+ Lambdacyhalothrin (5%) ZC, Visibly fast acting insecticide mixture having ovi - larvicidal action too.\r\n80 to 100 ml per acre(0.4ml/liter of water) ', 249, 100, 2),
(49, 'Criyagen - MgSO4 9.6% - ( 1 Kg )', 'upload/agri_615c221335af6 (1).png', 'Magnesium sulphate is the best magnesium source available for foliar feeding. It significantly increases magnesium absorption as compared to feeding by soil application.', 50, 400, 3),
(50, 'Iffco - Boron Fertiliser (14.5% B) - ( 1000 gm )', 'upload/agri_63b952e12dd75.jpg', 'IFFCO Boron (14.5%) can be used for foliar spray @ 1-2 gm / liter of water.', 110, 200, 3),
(52, 'Criyagen - ZnSO4  - ( 1 Kg )', 'upload/agri_6150a5b7eecb7.png', 'Zinc is an essential micronutrient required by several enzyme systems, auxins and protein synthesis. ', 135, 50, 3),
(53, 'Mahadhan - Flowering Special - ( 1 Kg )', 'upload/agri_63513da00f0e3.png', 'Tailor made NPK formulation for flowering crops,Promotes better establishment and boosts flowering,Enhanced with extra Sulphur, Boron & Molybdenum combination,100% water-soluble foliar fertiliser.', 200, 200, 3),
(54, 'Criyagen - MgSO4-(10 Kg) ', 'upload/agri_61fe682792d64.png', 'Magnesium sulphate is the best magnesium source available for foliar feeding. It significantly increases magnesium absorption as compared to feeding by soil application.', 250, 300, 3),
(55, 'Yara - 00-00-50 - ( 25 Kg )', 'upload/agri_630ee7657c1ea.png', 'sulphate of potash Granular is a 00-00-50 white granule that provides 50% potash and 17.5% sulfur to crops. This potasium sulpfate 7 is chloride-free.', 1900, 250, 3),
(56, ' Previous Next Criyagen - FeSO4 - ( 1 Kg )', 'upload/agri_6150a54aebb08.png', 'Ferrous is an important constituent of enzyme systems, it regulates respiration, photosynthesis, reduction of nitrates and sulphate.', 80, 40, 3),
(57, 'Crystal - Nutrozen - ( 200 Ml )', 'upload/agri_630f07dfeb27d.png', 'Nutrozen is a plant derived nutrition, which includes 22 elements - micro and macro elements along with the necessary hormones, vitamins and sea weed extract for better growth and to boost metabolic activity.', 900, 70, 3),
(58, 'Pi Industries - BIOVITA (Granules) - ( 4 Kg )', 'upload/agri_63fc936d33960.png', 'BIOVITA is based on seaweed Ascophyllum nodosum, the finest marine plant available for agricultural use and is recognized worldwide as an excellent natural fertilizer and source of organic matter. BIOVITA application enables plants to receive direct benefits from the naturally balanced nutrients and plant growth substances available in the seaweed extract.', 430, 150, 3),
(60, 'Manganese Sulfate.', 'upload/agri_6150a596488aa.png', 'Manganese Sulfate - Manganese is a critical component to the health of any plant.', 210, 35, 3);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `shipid` int(11) NOT NULL,
  `oid` int(250) NOT NULL,
  `cid` int(200) NOT NULL,
  `pid` int(100) NOT NULL,
  `f_name` varchar(250) NOT NULL,
  `l_name` varchar(250) NOT NULL,
  `s_email` varchar(250) NOT NULL,
  `s_phone` varchar(250) NOT NULL,
  `s_address` varchar(250) NOT NULL,
  `s_state` varchar(250) NOT NULL,
  `s_zip` int(250) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `unid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`shipid`, `oid`, `cid`, `pid`, `f_name`, `l_name`, `s_email`, `s_phone`, `s_address`, `s_state`, `s_zip`, `date`, `unid`) VALUES
(32, 32, 9, 5, 'pratham', 'kulal', 'prathamkulal19@gmail.com', '6361552409', 'kairangala', 'karnataka', 574153, '2023-07-09', '64aa88b88a6eb'),
(33, 33, 9, 11, 'pratham', 'kulal', 'prathamkulal19@gmail.com', '6361552409', 'kairangala', 'karnataka', 574153, '2023-07-09', '64aa88b88a6eb'),
(34, 34, 9, 20, 'pratham', 'kulal', 'prathamkulal19@gmail.com', '6361552409', 'ffgfdgfdgdfg', 'karnataka', 574153, '2023-07-10', '64aba4acefd72'),
(35, 35, 19, 13, 'chithra', 'anchan', 'chithra973c@gmail.com', '9539771079', 'bajal', 'karnataka', 575009, '2023-07-10', '64abb412779f5'),
(36, 36, 19, 15, 'chithra', 'anchan', 'chithra973c@gmail.com', '9539771079', 'bajal', 'karnataka', 575009, '2023-07-10', '64abb412779f5');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(250) NOT NULL,
  `u_email` varchar(250) NOT NULL,
  `u_pass` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `u_email`, `u_pass`) VALUES
(14, 'Tushar', 'tusharktushar3@gmail.com', 'tushar@123'),
(18, 'pratham', 'prathamkulal19@gmail.com', 'Prathu@77'),
(19, 'chithra973c@gmail.com', 'chithra973c@gmail.com', 'chithu@5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`info_id`);

--
-- Indexes for table `order1`
--
ALTER TABLE `order1`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`shipid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `order1`
--
ALTER TABLE `order1`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `shipid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
