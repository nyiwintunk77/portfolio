-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2017 at 02:33 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `travelandtour`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `AdminName` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `AdminID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `re_password` varchar(50) NOT NULL,
  PRIMARY KEY (`AdminID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminName`, `Email`, `AdminID`, `username`, `password`, `re_password`) VALUES
('NyiNyi', 'nyinyi77@gmail.com', 1, 'NyiNyi', 'nyinyi007', ''),
('TunTun', 'tuntun66@gmail.com', 2, 'TunTun', 'tuntun006', '');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `package_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `passengers` varchar(50) NOT NULL,
  `departure` datetime NOT NULL,
  `payment_type` varchar(30) NOT NULL,
  `deleted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `package_id`, `user_id`, `status`, `passengers`, `departure`, `payment_type`, `deleted`) VALUES
(3, 5, 3, 'Booking', '12', '1899-11-11 00:00:00', '', 0),
(4, 5, 3, 'Pending', '12', '2015-03-21 23:41:00', '', 0),
(5, 5, 3, 'Paid', '12', '2016-03-12 21:32:00', '', 0),
(6, 5, 3, 'Paid', '23', '2211-03-31 11:23:00', '', 0),
(7, 5, 5, 'Booking', '23', '2017-03-12 23:43:00', '', 1),
(8, 5, 5, 'Booking', '20', '0000-00-00 00:00:00', '', 1),
(9, 5, 5, 'Booking', '15', '0000-00-00 00:00:00', '', 1),
(10, 6, 5, 'Booking', '20', '2017-04-23 23:47:00', '', 0),
(11, 5, 7, 'Paid', '12', '2017-03-21 12:23:00', 'Paypal', 0),
(12, 5, 7, 'Paid', '12', '2015-03-12 12:31:00', '', 0),
(13, 6, 8, 'Paid', '2', '2017-03-23 23:42:00', 'Paypal', 0),
(14, 5, 8, 'Paid', '2', '2017-03-22 22:33:00', 'Paypal', 0),
(15, 5, 8, 'Paid', '2', '2017-02-23 12:32:00', 'Paypal', 0),
(16, 5, 5, 'Booking', '3', '0000-00-00 00:00:00', '', 1),
(17, 6, 8, 'Booking', '2', '2017-03-12 12:33:00', '', 1),
(18, 6, 8, 'Booking', '2', '0000-00-00 00:00:00', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE IF NOT EXISTS `car` (
  `CarNo` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `services` varchar(200) NOT NULL,
  `availibility` varchar(50) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`CarNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`CarNo`, `type`, `name`, `services`, `availibility`, `deleted`) VALUES
(1, 'Express Car', 'Mandalr Tun (5K/ 9213)', 'Available Cleaning Tower / Water Bottle/ Blanket/ Pillows/ TV/ High Class Car / Good Air con and Air fresher/ Comfortable Seats', '20', 0),
(2, 'Express Car', 'Madalar Minn (3J/89999)', 'Available Cleaning Tower / Water Bottle/ Blanket/ Pillows/ TV/ High Class Car / Good Air con and Air fresher/ Comfortable Seats', '20', 0),
(3, 'Express Car', 'JJ Express (5L/434323)', 'Available Cleaning Tower / Water Bottle/ Blanket/ Pillows/ TV/ High Class Car / Good Air con and Air fresher/ Comfortable Seats', '20', 0),
(4, 'Express Car', 'Elite Express Car (6E/88889)', 'Available Cleaning Tower / Water Bottle/ Blanket/ Pillows/ TV/ High Class Car / Good Air con and Air fresher/ Comfortable Seats', '20', 0),
(5, 'Express Car', 'Mandalar Minn (4I/78979)', 'Available Cleaning Tower / Water Bottle/ Blanket/ Pillows/ TV/ High Class Car / Good Air con and Air fresher/ Comfortable Seats', '20', 0),
(6, 'Express Car', 'Shwe Li (6H/89789)', 'Available Cleaning Tower / Water Bottle/ Blanket/ Pillows/ TV/ High Class Car / Good Air con and Air fresher/ Comfortable Seats', '20', 0),
(7, 'Express Car', 'Nagar Pyan (3E/3566)', 'Available Cleaning Tower / Water Bottle/ Blanket/ Pillows/ TV/ High Class Car / Good Air con and Air fresher/ Comfortable Seats', '20', 0),
(8, 'Express Car', 'Elite(4K/23434)', 'Available Cleaning Tower / Water Bottle/ Blanket/ Pillows/ TV/ High Class Car / Good Air con and Air fresher/ Comfortable Seats', '20', 0),
(9, 'Express Car', 'Mandalar Minn(8U/45435)', 'Available Cleaning Tower / Water Bottle/ Blanket/ Pillows/ TV/ High Class Car / Good Air con and Air fresher/ Comfortable Seats', '20', 0),
(10, 'Express Car', 'JJ Express(6N/95349)', 'Available Cleaning Tower / Water Bottle/ Blanket/ Pillows/ TV/ High Class Car / Good Air con and Air fresher/ Comfortable Seats', '20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `gender` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `nrc` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `deleted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `address`, `gender`, `phone`, `nrc`, `email`, `pass`, `deleted`) VALUES
(3, 'Htoo MIn shein', '234324324', 'Male', '2342343', '234324', 'mail@google.com', 'aaaaaa', 0),
(4, 'Nyi Win Tun', 'Lanmadaw Township, Yangon', 'Male', '09250359208', '12/LaMaTa(E)09999', 'nyi97@gmail.com', '1234567', 0),
(5, 'Nyi Nyi', 'nananana', 'Male', '1234323', 'nananana', 'nyinyi@gmail.com', '1234567', 0),
(6, 'Smith', 'jsdjfl', 'Female', '234234', '423423', 'smith@gmail.com', '1234567', 0),
(7, 'offlineusr', 'werwerewr', 'Male', 'werwerwer', 'werwer', 'offline@gmail.com', 'aaaaaa', 0),
(8, 'tun tun', 'sfsdf', 'Male', '09778865', 'sdljflsd', 'tuntun@gmail.com', '1234567', 0);

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE IF NOT EXISTS `delivery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `duration` varchar(50) NOT NULL,
  `person` varchar(50) NOT NULL,
  `fees` float NOT NULL,
  `deleted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id`, `duration`, `person`, `fees`, `deleted`) VALUES
(1, '2 to 10 days', 'jojo', 10, 0),
(2, '2 to 5 days', 'dd', 20, 0),
(3, '5 Days / 4 Nights', 'bb', 200, 0);

-- --------------------------------------------------------

--
-- Table structure for table `destination`
--

CREATE TABLE IF NOT EXISTS `destination` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `places` text NOT NULL,
  `duration` text NOT NULL,
  `description` text NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `destination`
--

INSERT INTO `destination` (`id`, `places`, `duration`, `description`, `deleted`) VALUES
(1, 'Mogouker', 'Mogouker', 'Mogouker', 1),
(2, 'Myanmar ( Yangon , Mandalay, Bagan , Inle Lake , Pindaya , Kalaw , Popa )', '12 Days / 11 Nights', 'For those looking to experience Myanmarâ€™ classic destinations, along with Ayarwaddy River Trails, and off beaten track, Myanmar Natural Scenery offers the perfect combine of culture, adventure and unique travel styles.', 0),
(3, 'Myanmar (Yangon , Bagan, Mandalay)', '5 Days / 4 Nights', 'Those with limited time, and still willing to learn Myanmarâ€™ unique culture and legend history, why not book our â€œDiscovering the art cities of Myanmarâ€.\r\n\r\n\r\nService Includes\r\n\r\n    Accommodation with Breakfast (Twin Sharing Basic)\r\n    Domestic airfares\r\n    Transfer & Sightseeing with Private A/C coach or car\r\n    Entrance fees\r\n    English speaking station Guide fees\r\n    Express boat from Mandalay â€“ Bagan\r\n    Boat fees\r\n    Airport pre check in for international flight.\r\n\r\n', 0),
(4, 'Myanmar ( Bago , Kyaikhtiyo ) ', '2 Days / 1 Nights', 'Located about 160 km from Yangon, Kyaikhtiyo is the largest domestic tourism centre. It stands on a gilded boulder precariously perched on the edge of the hill over 3615 feet above sealevel. There are many legends about the pagoda and Nat (Spirit Gods) shrines along the way from the base camp to the pagoda. There is also a popular belief that a person gains in wealth every time he climbs the hill. It is a test of one''s endurance and is very exhilarating once a person has reached the summit. Kyaikhto Hotel located on the hill side is the full view of the pagoda. The season of pilgrimage is from October to May. Our coach has to stop at Kinpun Base camp. From there we have to usr an open truck which is normally used for hilly track up to the mountain to. To Yathae Hill, you can also reach by trekking from the base camp. Porters and palanquins are available to carry luggage and pilgrims who are too old or weak.\r\n\r\n\r\nService Includes\r\n\r\n    Accommodation with breakfast at twin or double room.\r\n    Transfer & sightseeing with private A/C car or coach.\r\n    Entrance fee as per program.\r\n    English speaking throughout guide fee\r\n    2 bottles mineral water and one snow towel per day will be provided\r\n\r\n', 0),
(5, 'Yangon â€“ Ngapali Beach â€“ Yangon', '4 Days / 3 Nights', 'Enchanting on Ngapali''s Golden Beach Balmy''s days are over to end the tough tour of Myanmar''s inland. Luxury palm trees, soft waves, excellent cuisine, comfortable chalets make Ngapali Beach a more favorable place. Nogapari is a resort dreamed by people who love the sea. Not only enjoy the sea, the sandy beach, the quiet countryside, it is not quiet and idyllic. We offer many services such as the international standard beach resort, the international restaurant, pool bar, hairdresser and so on. In the local restaurant, I enjoy magically fresh fish at a cheap price. There is a regular express service between Ngapali and Yangon.', 0),
(6, 'Yangon â€“ Ngwe Saung Beach - Yangon', '4 Days / 3 Nights', 'A relatively new destination on Myanmarâ€™s tourism map, Ngwe Saung Beach offers its visitors unspoiled beaches and tranquility on the edge of the Bay of Bengal. Hoteliers at the beach recently marked the 10th anniversary of its establishment as a tourism destination and from humble beginnings Ngwe Saung boats more than a dozen top-class hotels. The beach can be reached by car from the capital Yangon in approximately five hours and the journey takes travelers across the wide alluvial Ayeyarwaddy delta region. A stop can be included in Pathein, a busy trading town on the banks of the Pathein River. As an alternative to road travel, it is possible to travel from Yangon to Pathein by boat, which will see you float through picturesque scenery, passing by the many houses and villages that dot the river banks. The vast and fertile Ayeyarwaddy Delta is connected to countless larger and smaller river tributaries; itâ€™s an ideal area for rice cultivation. Ngwe Saung Beach is a jewel for independent travelers seeking nothing more but sand, sea and tranquility.', 0),
(7, 'Myanmar ( Kampalet - Mindat )', '5 Days / 4 Nights', 'CHIN HILL EXTENSION from Bagan.\r\nCHIN HILL Mt Victoria of 3400 meter high is the perfect place for nature lovers. Soft trekking, butterfly and bird watching are available. The old tradition of tattooing face is fading fast but still can be seen in some villages.Roads are still very bad so this excursion is not recommended for rainy season ( May to Oct ). As for accommodations, only very simple guest house are available so this excursion is suitable only for the adventurous clients.\r\n\r\nService Includes\r\n\r\n    Accommodations with daily breakfast .(Twin or double sharing basis).\r\n    Experienced trekking guide fees.\r\n\r\n', 0),
(8, 'Yangon- Kyaikhtiyo- Hpa an- Mawlamyine', '6days/5nights', 'Myanmar Scenic Southern Part Tour will take you two different states of Myanmar; Hpa-An (Capital of Kayin State) and Mawlamyine (capital of Mon State). A very scenic drive to the countryside, The holiest KYAIKHTIYO Pagoda (that stands on a gilded boulder precariously perched on the edge of the hill), A pleasant town Hpa-An - surrounded with beautiful caves that are filled with religious Buddha Images & Stupas, An old British Colonial Town â€“ Mawlamyine, and its nearby town:-Thanphyuzayut (famous for its Death Railway of WWII) and Bilu Island that produced amazing unique handicrafts of Myanmar are the main highlights. Moreover, you will have a chance to learn and try different cultures of two States, their traditional cuisines and their ways of life. Finally, make your return trip complete en route stop at Ancient Royal City; Bago.\r\n\r\nService Includes\r\n\r\n    Accommodation with breakfast\r\n    Transfer & sightseeing with private A/C car or coach.\r\n    Boat to Bilu Island\r\n    Entrance Fees\r\n    English speaking guide fee\r\n    Local truck fees at Kyaikhtiyo\r\n    2 bottles mineral water and one snow towel per day will be provided\r\n\r\n', 0),
(9, 'Yangon â€“ Kyaikhtiyo â€“ Bago â€“ Mandalay â€“ Pyin Oo Lwin - Monywa â€“ Bagan â€“ Kalaw â€“ Pindaya â€“ Inle     Lake â€“ Yangon', '17 Days / 16 Nights', 'Day 1 Arrival Yangon\r\nDay 2 Yangon â€“ Kyaiktiyo\r\nDay 3 Kyaiktiyo â€“ Bago â€“ Yangon\r\nDay 4 Yangon â€“ Mandalay\r\nDay 5 Mandalay â€“ Mingun â€“ Mandalay\r\nDay 6 Mandalay â€“ Pyin Oo Lwin (Maymyo) â€“ Mandalay\r\nDay 7 Mandalay â€“ Monywa\r\nDay 8 Monywa â€“ Pakkoku â€“ Private Boat to Bagan\r\nDay 9 Bagan\r\nDay 10 Bagan\r\nDay 11 Bagan â€“ Popa â€“ Kalaw (Overland)\r\nDay 12 Kalaw (Trekking) â€“ Pindaya\r\nDay 14 Inle Lake\r\nDay 15 Maing Thauk â€“ Indein\r\nDay 16 Inle Lake â€“ Yangon\r\nDay 17 Yangon departure', 0),
(10, 'Yangon â€“ Sittwe â€“ Myauk U â€“ Yangon', '5 Days / 4 Nights', 'Day 1 Arrival Yangon\r\nDay 2 Yangon â€“ Sittwe\r\nDay 3 Sittwe â€“ Mrauk-Oo\r\nDay 4 Mrauk-Oo â€“ Sittwe\r\nDay 5 Sittwe â€“ Yangon', 0),
(11, 'Kyaing Tong', '4days / 3Nights', 'The most scenic town in the Shan State, Kyaing Tong lies about midway between the Thanlwin River and Mekong River valleys. It is situated 456 kilometres northeast of Taunggyi and 163 kilometres north of the border town of Tachilek opposite Mae Sai, (Thailand). It is 56 miles away from Mong Lar, a Chinese border town. Kyaing Tong means "Walled City of Tong" and Tong is a reference to the kingdom''s mythical founder, a hermit named Tungkalasi. Historic center for the state''s Khun culture, the town is surrounded by Wa, Shan, Akha and Lahu villages. Kyaing Tong is also known for colorful tribes.\r\n\r\nService Includes\r\n\r\n    Accommodation with full breakfast\r\n    All airport transfer & sightseeing (with A/C coach or car)\r\n    Trekking Guide\r\n    English speaking stationed guide fee\r\n    Entrance fee\r\n\r\n', 0),
(12, 'fsdfsdfsd', 'dfsddf', 'dsfsdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE IF NOT EXISTS `hotel` (
  `hotelno` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `roomtype` varchar(50) NOT NULL,
  `CheckIn` datetime NOT NULL,
  `CheckOut` datetime NOT NULL,
  `num_of_room` int(11) NOT NULL,
  `location` text NOT NULL,
  `standard` text NOT NULL,
  `service` text NOT NULL,
  `phone` varchar(50) NOT NULL,
  `staff_name` varchar(50) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`hotelno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotelno`, `name`, `roomtype`, `CheckIn`, `CheckOut`, `num_of_room`, `location`, `standard`, `service`, `phone`, `staff_name`, `deleted`) VALUES
(3, 'Chatrium Hotel', 'Master Bedroom', '0112-02-19 22:00:00', '0112-02-19 21:00:00', 30, 'Chatrium Hotel Royal Lake Yangon is nearby many tour attractions  and business building such as the world oldest Shwedagon Pagoda, Kandawgyi Royal Lake , Japanese Embassy, United Nations Buildings and so on. It is 15 min drive to historic city centre and 45 min drive from Yangon International Airport.', '4Starb3324', 'Chatrium Hotel Royal Lake Yangon is a 5-star Luxury City Resort located on the historic Kandawgyi Lake (Royal Lake) in the very heart of Yangon.  This remarkable legacy property with its distinctive blend of colonial style and Asian revival architecture is ideal for both business and leisure travelers.\r\nChatrium Hotel Royal Lake Yangon is a deluxe offering from Chatrium Hotels and Residences, a remarkable collection of accommodations ranging from luxury suites to select serviced extended stay residences, each exemplified by a culture of excellence, value and outstanding service, and encompassing our personalities, values, and traditions to create an experience that exceeds guests'' expectations. Properties of Chatrium Hotels and Residences include Chatrium Hotel Royal Lake Yangon, Chatrium Hotel Riverside Bangkok, Emporium Suites by Chatrium, Chatrium Residence Sathon Bangkok and Chatrium Residence Riverside Bangkok.', '09192394443', 'John Doe', 1),
(4, 'Amazing Kengtong Resort', 'Double Room', '2017-11-16 21:00:00', '2017-11-20 21:00:00', 20, 'Kyaing Tong, Eastern Shan State, Myanmar. ', '4 Stars', 'Free Breakfast Buffet at Hotel. Wifi Available. ', ' (+95 84) 21620, (+95 84) 21621 ', 'Sai Lou Sai', 0),
(5, 'Mandalay Hill Resort Hotel', 'Double Rooms', '2017-12-24 21:00:00', '2017-12-26 21:00:00', 20, 'No.9, Kwin 416B 10th Street, 10th Street, Mandalay,', '5Stars', 'Luxury resort in Mandalay with 3 restaurants, spa /\r\nFree hot/cold buffet breakfast and free WiFi', '+65-6823-2330 ', 'U Maung Thein ', 0),
(6, 'Bagan Thande Hotel', 'Double Rooms', '2017-12-21 21:00:00', '2017-12-23 21:00:00', 20, 'Bagan Archiological Zone, Old Bagan, Old Bagan MANDALAY DIVISION, MYANMAR', '3-star Hotel', 'Casual rooms with vintage-style furnishings feature balconies, TVs, minifridges and coffeemakers.  Add separate living/dining rooms and private bars. Room service is available.\r\n\r\nThere''s a restaurant with a wood-paneled dining room, open-air seating. Other amenities include a poolside bar, a spa, an outdoor pool, a hot tub and gardens. Bike and boat rentals are available.', '061 60 025', 'Hein Zaw', 0),
(7, 'Novotel Inle Lake Myat Min', 'Double Rooms ', '2017-12-26 21:00:00', '2017-12-27 21:00:00', 20, 'Mine Thauk Village Inle Lake, 11121 Nyaung Shwe, Myanmar', '4Stars', 'Featuring free WiFi, a restaurant and an outdoor pool, Novotel Inle Lake Myat Min offers accommodations in Nyaung Shwe. The hotel has a terrace and views of the lake, and guests can enjoy a drink at the bar.', '+959 4909384099', 'Nan Khan Sam', 0),
(8, 'Popa Mountain Resort', 'Special Rooms', '2017-12-24 21:00:00', '2017-12-26 21:00:00', 20, 'Near Mt.Pop', '4Stars', 'The swimming pool at the hotel / Beautiful resort hotel atop a mountain with stunning views, gorgeous infinity pool, cooling weather and serene surroundings', '+65-6844-2350 ', 'Ye Lin', 0),
(9, '360 Kalaw Hotel', 'Single Rooms + Double Rooms', '2017-12-12 23:00:00', '2017-12-14 23:00:00', 20, '128, Wingabar Lane, 9 Ward Opposite of Golf Range, 11111 Kalaw, Myanmar', '4Stars', 'e View at 360 Kalaw Hotel is really 360. Very nice place to relax. Great View. Lovely service. Good taste. Free WiFi is provided and free private parking is available on site.', '09 45033 3360', 'U Lauk Lan', 0),
(10, 'Kyaik Hto Hotel - The Golden Rock Pagoda', 'Deluxe Twin Rooms  ', '2017-09-20 22:00:00', '2017-09-22 23:05:00', 20, 'Kyaik Htee Yoe Pagoda, Kyai-khto Township Mon State, Myanmar, 10111 Kyaikto, Myanmar', '3Stars', 'Free! WiFi is available in all areas and is free of charge. Available Bar, Ironing Service (additional charge), Room Service ', '09984734857', 'U Min Shein', 0),
(11, 'Sane Let Tin Resort Myanmar ', 'Superior Double or Twin Room', '2017-08-27 22:30:00', '2017-08-28 22:30:00', 20, 'No.104 Milestone, Yangon-Mawlamyaing Highway, Mon State, Myanmar, 11131 Kyaikto, Myanmar', '3Stars', 'Available Bar, Pool and Spa, Free! WiFi is available in the hotel rooms and is free of charge, Restaurant (Ã  la carte & buffet) ', '01 333 5331', 'Thant Htoo Zin ', 0),
(12, 'Hotel Pyin Oo Lwin', 'Deluxe Twin Rooms', '2017-11-17 22:10:00', '2017-11-19 22:10:00', 20, ' No. 9 Nanda Rd, Near Botanical Gardens, á€‡á€®á€á€€á€œá€™á€ºá€¸, Pyin Oo Lwin', '4Stars', 'Free wifi, Morning Free Breakfast, Flowering Garden views', '085 21 226', 'Ma Thuzar', 0),
(13, 'Amara Gold', 'Superior Twin Rooms', '9062-10-20 21:00:00', '9072-10-20 21:00:00', 20, 'Bago', '3Stars', ' Helpful staff; free water bottles; garden seating area, Asian and western breakfast choices. Free Wifi Availables', ' 522201077', 'Aung Lwin', 0),
(14, 'Ngapali Paradise Hotel', 'Deluxe Twin Room', '2017-10-20 22:15:00', '2017-10-24 22:15:00', 20, 'Ngapali Main Road Zee Phyu Gone, Ngapali Beach, Rakhine State, Thandwe 11221', '5Stars', 'Outdoor Swimming Poor, Free Wifi Available, Morning Breakfast Buffet', ' 01 227 784', 'John Natham', 0),
(15, 'Emerald Sea Resort', 'Deluxe Twin Rooms', '1202-10-20 22:20:00', '1252-10-20 20:20:00', 20, 'Ngwesaung', '4stars', 'Night Dinner Buffet, Available Wifi Free, Outside Swimming Pool. ', '042 40 247', 'Wine Kalayar', 0),
(16, 'Royal Hinthar Hotel', 'Superior Twin Rooms', '2017-02-21 23:03:00', '2017-02-25 23:43:00', 20, 'No. 3-B, Myo Shaung Road, Myae No Gone Block 11221, Mawlamyine MMR011001701', '4stars', ' Have Bar, High Class Restaurant, Gym, Beauty Spa and Swimming Pool for guests', '09 45555 9810', 'Lynn Nyo', 0),
(17, 'Hotel Angels Land', 'Double Rooms', '4232-10-20 00:00:00', '4252-10-20 00:00:00', 20, ' Hpa-An, 4/600, Padauk Road, (4) Quarter , Hpa-an, Kayin State, Myanmar: 11121', '3Stars', ' Helpful staff; free water bottles; garden seating area, Asian and western breakfast choices. Free Wifi Availables', ' 09 497 71885', 'Ma nandar', 0),
(18, 'Mrauk U Palace Hotel', 'Single Rooms + Double Rooms', '2017-03-21 23:42:00', '2017-03-24 23:43:00', 20, 'Mrauk-U', '3Stars', 'Free breakfast; hot water, towels, waterand terrible Wi-Fi', '09 853 2277', 'U Mya Thein', 0),
(19, 'Shwe Thazin Hotel', 'Single Rooms + Double Rooms', '2017-03-12 23:42:00', '2017-03-15 12:33:00', 20, ' 250 Main Rd, Sittwe', '2Stars', 'Free Wifi Available, Free Morning Breakfast ', '043 23 579', 'Kathy', 0),
(20, 'Novotel Yangon Max', 'Deluxe Twin Rooms / Double Rooms', '0000-00-00 00:00:00', '2018-02-02 13:24:00', 20, '459 Pyay Road Kamayut Tsp, Yangon', '4Stars', 'Available Swimming Pools, Spas, beauty saloon, Grand Restaurant Halls, Yoga course, Strong Wifi Provided, Buffet Meals ', ' 01 230 5858', 'Alan Smith', 0);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE IF NOT EXISTS `restaurant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `place` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `contactperson` varchar(50) NOT NULL,
  `meal_type` varchar(50) NOT NULL,
  `treatment_type` varchar(50) NOT NULL,
  `datetime` datetime NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`id`, `name`, `place`, `contact`, `contactperson`, `meal_type`, `treatment_type`, `datetime`, `deleted`) VALUES
(2, 'Kohaku Japanese Restaurant', 'eeeee', 'eeeee', 'eeeee', 'eeeee', 'eeeee', '2017-03-31 23:32:00', 1),
(3, 'Signature Restaurant', 'Kan Yeik Thar Street, Kandawgyi Relaxation Zone, B', '01 558 827', 'Soe Thiha Naing', 'Chinese meal / European Meal  ', 'Buffet', '2017-03-12 12:31:00', 0),
(4, 'Kyaw Swa', '1, Bago', '522230220', 'Hnin Si ', 'Chinese Meal / Thai Meal / Euporean Meal / Seafood', 'Not Buffet ', '2017-04-23 23:34:00', 0),
(5, 'Marie Min Restaurant', ' 27th St, Mandalay', '234234', 'Gotham', 'Burmese Food / Chinese Food / Euporean Food  ', 'Not Buffet', '2017-03-12 23:43:00', 0),
(6, 'Golden Orange Restaurant', 'Monywa', '098842766435', 'James', 'Burmese Meal / Chinese meal / European Meal  ', 'Not Buffet', '2017-03-21 13:33:00', 0),
(7, 'Emerald Sea Resort', 'NgweSaung', '042 40 247', 'Wine Kalayar', 'Burmese Food / Chinese Food / Euporean Food / Seaf', 'Buffet', '2017-12-31 23:42:00', 0),
(8, 'Ngapali Paradise Hotel', 'Ngapali', '01227784', 'John Natham', 'Burmese Food / Chinese Food / Euporean Food / Seaf', 'Buffet', '2017-03-31 23:37:00', 0),
(9, 'Bone Gyi Restaurant', ' Strand Rd, Mawlamyine', '057 26 528', 'Paul', 'Burmese Food / Chinese Food / Euporean Food / Indi', 'Not Buffet', '2016-02-01 00:00:00', 0),
(10, 'Shwe Man Gyi Myanmar Restaurant', 'Main Rd, Hpa-An', '058 21 618', 'Nay Lin', 'Burmese Food/ Traditional Food ', 'Not buffet ', '2017-03-12 23:43:00', 0),
(11, 'River Valley Restaurant', 'Mrauk-U', 'Mrauk-U', 'Arkar Hein ', 'Burmese Food/ Traditional Food ', 'Not Buffet', '0000-00-00 00:00:00', 0),
(12, 'Kyaing Tong Restaurant ', 'Kyaing Tong', '230803', 'Nan Theingi', 'Shan Traditional Food ', 'Not Buffet', '2017-11-02 12:33:00', 0),
(13, 'Pann Myo Thu Inn', ' Kin Pun Sakhan, Kyaikhto, Kyaiktiyo Pagoda Rd, Ki', ' 09 44924 9498', 'Tun Tun', 'Burmese Food ', 'Not Buffet', '0000-00-00 00:00:00', 0),
(14, 'Royal Restaurant', 'Golden palace compound, near Tharaba gate, Old Bag', '0987436643', 'Pan Myo Myat', 'Burmese Food/ Traditional Food/ European Food ', 'Not Buffet', '0000-00-00 00:00:00', 0),
(15, 'Inle Heart View Restaurant', 'Taunggyi', '09 42831 4979', 'Nan Myat Phyo', 'Shan traditional Food / Burmese Food ', 'Not Buffet', '2017-03-31 23:44:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE IF NOT EXISTS `ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `delivery_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `seat_no` varchar(30) NOT NULL,
  `deleted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `delivery_id`, `booking_id`, `seat_no`, `deleted`) VALUES
(1, 3, 3423, 'B98999', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tourpackage`
--

CREATE TABLE IF NOT EXISTS `tourpackage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `itinerary` text NOT NULL,
  `cost` float NOT NULL,
  `car_id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `photo` varchar(30) NOT NULL,
  `detail_desc` text NOT NULL,
  `deleted` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tourpackage`
--

INSERT INTO `tourpackage` (`id`, `name`, `type`, `itinerary`, `cost`, `car_id`, `destination_id`, `restaurant_id`, `hotel_id`, `photo`, `detail_desc`, `deleted`) VALUES
(5, 'Myanmar Ancient Places', 'Long Day Trip', '------Myanmarâ€™ main highlights with Myanmar Ancient Places and Yangon''s main witness scenery, the ancient city, Bagan has scattering thousands of pagodas and temples, Mandalay Lake surrounding ancients capital, the nature of Lake .             \r\n------Those with limited time, and still willing to learn Myanmarâ€™ unique culture and legend history, why not book our â€œDiscovering the art cities of Myanmarâ€.', 500, 2, 3, 10, 20, 'ph-1510901395174.jpg', '*****Day 1 Arrival\r\n\r\nyangon-Welcome to the Novotel Yangon Max.\r\n\r\nWe will arrive at the Car either in the morning or afternoon to Yangon Express Highway Station. Our representatives of agency will provide welcoming gifts such as Myanmar''s traditional postcards, shan bags, maps and more. Then transfer you to the hotel. Here we would like to secure enough time to take a good rest that you may need after a long boring express car. Therefore, tourism in Yangon is postponed before the departure day and you can enjoy it the whole day.\r\n\r\n\r\n\r\n*****Day 2 and 3 Yangon-Bagan\r\n\r\nAfter breakfast at Bagan Thande hotel, transfer to Express Highway Car to Bagan. Upon arrival you will be taken to Shwezigon Pagoda a prototype of the next Myanmar stupa. Then at Wetkyi, in the temple of Gubyaukkyi with beautiful murals of Jataka scenes. After transfer to Hotel for check-in.\r\n\r\nThe afternoon tour continues with visits to the paint industry where you can study the traditional lace manufacturing in Myanmar, the Manuha Temple with giant Buddha images, the impression of a prison life of the prisoner king; Nanpaya, an ancient style temple with the finest stone sculptures. Even if spot lights are installed, it would be safer to bring your portable torch while the power supply may be interrupted from time to time.\r\n\r\nIn the evening you will visit the Temple of Ananda, an architectural masterpiece recalling a Greek cross. Overnight at Hotel.\r\n\r\n\r\n\r\n*****Day 4 Bagan- Mandalay\r\n\r\nMandalay-After breakfast at the hotel, you will transfer to Express Highway Station to Mandalay. On arrival to Mandalay Express Highway Station you will be travelling to famous Mahamuni Pagoda, one of the most sacret Buddha Image in Mandalay. Then a short visit to Gold foil making cottage industry. Check-in at Mandalay Hill Resort hotel and followed by afternoon sightseeing that begins with Shwenandaw Monastery, saved for its exquisite wood carvings; Kuthodaw Pagoda, known as the World''s Biggest Book for its stone slabs of Buddhist scriptures. Tour continues to Mandalay Hill, a vantage point for a city panoramic view and a spectacular sunset view.It is worthy to have a stroll up the Mandalay hill enjoying panoramic views from different location. Return can be made with car as there is also a car track by the base of elevator just before the platform. Overnight at Mandalay Hill Resort hotel. \r\n\r\n*****Day 5 Departure\r\nAfter breakfast, sightseeing in Yangon includes visits to some major highlights like Gaba Aye ( World Peace ) pagoda, Shwedagon Pagoda and Mahapasana Cave and transfer to Yangon Express Highway Station departure. \r\n\r\n                                                                                                                                                                                                                                                                                                                                                                                                                                             ', 0),
(6, 'Myanmar Natural Scenery ', 'Long Day Trip', 'For those looking to experience Myanmarâ€™ classic destinations, along with Ayarwaddy River Trails, and off beaten track, Myanmar Natural Scenery offers the perfect combine of culture, adventure and unique travel styles.', 900, 2, 2, 15, 5, 'ph-1510902819660.jpg', '******* yangon - Welcome to the beautiful city Yangon.\r\n\r\n\r\n \r\n***** Day 1 Yangon - Mandalay\r\nAfter arriving at Mandalay and having breakfast at the hotel, proceed to the famous Mahamuni Pagoda, Mandalay''s most holy Buddha statue. After that, a short visit to the gold leaf making the cottage industry. Check in at the hotel and continue the sightseeing starting with Shwenandaw Monastery.Shwenandaw Monastery is famous for exquisite wood carving. Kuthodaw Pagoda is known for the stone of the world''s largest Buddhist shrine. The tour to Mandalay Hill is a splendid point with panoramic views of the city and spectacular sunset views.\r\n\r\nYou can enjoy panoramic views from various places. There is a car orbit by the base of the elevator just before the platform so you can return by car. Overnight at hotel.\r\n \r\n***** Day 2 Mandalay - Amarapura - Inwa\r\namarapura-02 After breakfast, we will visit the ancient city of Amarapura 11 km south of Mandalay and introduce Bagaya Monastery with famous Buddha statues of various times. Maha Gandayon Monastery; wooden bridge of U bin with a length of 1.2 kilometers.\r\n\r\nAfter that, the tour to Inwa (Ava) will continue. It does not take 3 hours here to catch a native carriage to sightsee Awaji.\r\n\r\nInwa is the historical capital city established by King Thado Minbya in 1364. There will be a long-term stay in Myanmar''s stone architecture and monasteries in Main Wick and Bagaya Monastery, a wonderful example of the old tower. Overnight at Mandalay Hill resort hotel in Mandalay.\r\n \r\n***** Day 3 Mandalay - Bagan\r\n\r\nIn Bagan- Early morning breakfast (breakfast is recommended) will travel to the pier for a day at the majestic Ayeyarwaddy River from Mandalay to Bagan.\r\n\r\nEnjoy the picturesque Ayeyarwaddy riverside fantastic landscapes and interesting spots on the boat of Shwe Kein Nayee at air-conditioned hall with (200) passenger capacity and comfortable reclining seats. (Shwe Kein Nayee boat operates daily except Sun & Wed. On Sun & Wed. Carrying cargo, old boat without air conditioning equipment works).\r\n\r\nI arrive at Bagan Pier in the evening and move to the hotel. Overnight at hotel. \r\n\r\n \r\n***** Day 4 Bagan\r\n\r\nbagan - 14 After breakfast, we go to Shwezigon Pagoda and become the prototype of the pagoda of Myanmar later. Then, in the Wetkyi-in Gubyaukkyi Temple, you can hear the pain of the fine wall of the Jataka scene. After that, we will move to the hotel for check-in.\r\n\r\nThe afternoon sightseeing tour will visit the traditional lacquerware industry in Myanmar, the Manda temple with a huge Buddha statue, the lacquer industry looking at the impression of living in a detained king''s prison. Early style temple with the finest stone sculpture Nanpaya. Although spotlights are installed, it is safer to bring your own torch as power supply is shut off from time to time.\r\n\r\nIn the evening, you will visit the Ananda temple, a masterpiece of architecture similar to the Greek Cross and overnight at hotel.\r\n\r\n(There are more than 2000 temples and pagodas in Bagan, but it is difficult to cover all the temples within a limited time, so we have carefully selected several major temples to avoid busy sightseeing Please inform your guide and driver, you can see as many temples as possible during your stay.)\r\n \r\n***** Day 6 Bagan - Popa - Kalaw\r\n\r\nIn Bagan, after breakfast checkout, proceed to Kalaw via Mount Popa. It is an extinct volcano and is commonly known as the legendary nuts and dwelling of God Spirito. An annual festival will be held in Nyon of Myanmar''s Na Young\r\n\r\n At the top of the mountain there are towers, monastries and shrines. After that, I will head to Kalaw via Meik Htila. (Total driving time will take about 9 hours) Overnight at hotel. (B)\r\n \r\n***** Day 7 Kalaw (trekking to the Palaung hills) - Pindaya\r\nIn Pindaya, after breakfast, trek to Palaung Hills around Kalaw and visit the mountain village with colorful costumes. Then drive about 1 hour and 30 minutes to the small quiet town Pindaya, which enjoys beautiful views of the countryside along the way to Pindaya and spends Overnight at hotel.\r\n\r\n \r\n***** Day 8 Pindaya - Nyaung Shwe (Inle Lake)\r\n\r\nBreakfast at the inle-16 hotel will take place after visiting the famous Pindaya cave of Limestone carved Buddha statue. It is right next to Banyan trees more than 250 years ago. Mulberry paper mill, bamboo hat factory. Then drive to Nyaung Shwe with Inle Lake. Check in at the hotel and spends overnight at hotel.\r\n \r\n***** Day 9 Nyaung Shue (Inle Lake)\r\n\r\nYour morning excursion at inle-17 Inle                   ', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
