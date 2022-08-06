-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 01, 2022 at 05:30 PM
-- Server version: 10.5.16-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `subbisky_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Wi-Fi', 'a7.png', NULL, NULL),
(2, 'Air Conditioner', 'a4.png', NULL, NULL),
(3, 'Swimming Pool', 'a3.png', NULL, NULL),
(4, 'Bathroom', 'a5.png', NULL, NULL),
(5, 'TV', 'a6.png', NULL, NULL),
(6, 'Spa', 'a9.png', NULL, NULL),
(7, 'Parking', 'a11.png', NULL, NULL),
(8, 'Food', 'food.png', NULL, NULL),
(9, 'Restaurant', 'restaurant.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` int(11) NOT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ifsc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upi_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `seller_id`, `account_number`, `account_name`, `ifsc`, `upi_id`, `created_at`, `updated_at`) VALUES
(5, 124, 'hhhj', 'uuu', 'uuu', 'hu', '2022-05-19 04:13:54', '2022-05-19 04:33:33'),
(6, 126, '0517101040493', 'Canara bank', 'CNRB0000517', 'bhargav.coorg52-1@okaxis', '2022-05-25 03:45:40', '2022-05-25 03:45:40');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','InActive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, '1625028644.jpg', 'Active', '2021-06-29 23:20:44', '2021-06-29 23:20:44'),
(3, '1625028647.jpg', 'Active', '2021-06-29 23:20:47', '2021-06-29 23:20:47'),
(4, '1635494195.jpg', 'Active', '2021-10-29 02:26:35', '2021-10-29 02:26:35');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seller_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `session_id`, `seller_id`, `user_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(286, 'zt9C6rQ8582ZqTLZqU8IwNYCgC1xeZ7s2kmIMx4u', 126, 263, 132, 1, '2022-05-25 03:30:09', '2022-05-25 03:30:09'),
(287, 'j01zkiNjxCUYuMydvul4oN7POwH7CTPNGa2nhc42', 126, 0, 132, 2, '2022-05-25 10:50:36', '2022-05-25 10:52:44'),
(288, 'j01zkiNjxCUYuMydvul4oN7POwH7CTPNGa2nhc42', 126, 0, 133, 2, '2022-05-25 10:50:42', '2022-05-25 10:52:22'),
(289, 'NjF9qwUvM83bwRDNvsU60Gm6UdZFHl7aKqg2GoLy', 126, 230, 133, 2, '2022-05-25 10:57:04', '2022-05-25 10:57:16'),
(290, 'NjF9qwUvM83bwRDNvsU60Gm6UdZFHl7aKqg2GoLy', 126, 230, 132, 1, '2022-05-25 10:57:31', '2022-05-25 10:57:31'),
(291, 'IeA6EnnkmoNpOaJHikzskFpuAbSCADj41q4k3Tnp', 126, 0, 132, 1, '2022-05-25 11:01:31', '2022-05-25 11:01:31'),
(292, 'IeA6EnnkmoNpOaJHikzskFpuAbSCADj41q4k3Tnp', 126, 0, 133, 2, '2022-05-25 11:01:37', '2022-05-25 11:01:39'),
(293, 'XXXPJOG2bIimtsMH9FmG6PxNkoTV58u439YARwAz', 126, 0, 133, 1, '2022-05-25 22:02:08', '2022-05-25 22:02:08');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `seller_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(61, 126, 'Coorg Homemade wine', 'Active', '2022-05-25 02:43:13', '2022-05-25 02:43:13'),
(62, 126, 'Coffe powder', 'Active', '2022-05-25 02:58:56', '2022-05-25 02:58:56'),
(63, 126, 'Tea powder', 'Inactive', '2022-05-25 02:59:23', '2022-05-25 03:32:47'),
(64, 126, 'Honey', 'Inactive', '2022-05-25 03:00:14', '2022-05-25 03:32:38'),
(65, 126, 'Coorg spices', 'Inactive', '2022-05-25 03:00:39', '2022-05-25 03:32:30');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Bangalore', NULL, NULL),
(2, 'Kodagu', '2021-09-22 04:51:27', '2021-09-22 04:51:27'),
(3, 'Madikeri', '2021-09-25 00:13:15', '2021-09-25 00:13:15'),
(4, 'INDIA', '2021-09-30 03:29:54', '2021-09-30 03:29:54');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `subject` text DEFAULT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'heta', 'hetathakkar10@gmail.com', '8347736465', 'Hi', 'hello', '2021-07-22 23:42:18', '2021-07-22 23:42:18'),
(2, 'Heta', 'hetathakkar10@gmail.com', '+918347736465', 'hii', 'hello', '2021-07-23 01:02:46', '2021-07-23 01:02:46'),
(3, 'ht', 'hetathakkar10@gmail.com', '+918347736465', 'fdg', 'dfgd', '2021-07-23 02:02:41', '2021-07-23 02:02:41'),
(4, 'thirupathi', 'thirupathigopidi9@gmail.com', '8897236467', 'Hi', 'hello', '2021-07-23 04:31:26', '2021-07-23 04:31:26'),
(5, 'thirupathi', 'thirupathigopidi9@gmail.com', '8897236467', 'hello', 'Hiiiii', '2021-07-23 06:37:12', '2021-07-23 06:37:12'),
(6, 'Melina Lathrop', 'lathrop.melina@outlook.com', '030 23 42 94', 'Hey ,\r\n\r\nIf you’re still paying for website hosting every month, pay close attention…\r\n\r\nBecause with the brand new HostZPresso cloud hosting platform you can now get\r\n\r\nUnlimited Website Hosting For Life - All For a Wildly Low One-Time Price.\r\n===>> https://hostzpresso.blogspot.com/\r\n\r\nBut it’s not just about big savings…\r\n\r\nThey’re raised the bar on quality with a suite of tools that instantly boosts your website performance with:\r\n\r\nUltra High-Speed Servers\r\n100% Uptime Guaranteed\r\nLightning Fast Load Speeds and Unlimited Bandwidth\r\nEnd-to-End SSL Encryption and Advanced Hacker Protection\r\n\r\nWhich means your websites will run cheaper and perform better…\r\n\r\nWithout any restrictions or limitations.\r\n\r\nIt’s like getting a Porsche for the price of a Honda.\r\n\r\nAnd don’t worry if the thought of website management makes your palms sweat with anxiety…\r\n\r\nHostZPresso’s “tech simple” Control Panel makes it easy for ANYONE to create and manage websites…\r\n\r\nEven if you‘ve never operated a website in your life.\r\n\r\nSo it’s time to say “enough” to the bloated web hosting fees that drain your profit every month!\r\n\r\nGo here now to read all the details on HostZPresso and lock in your Unlimited Hosting deal.\r\n===>> https://hostzpresso.blogspot.com/\r\n\r\nBrahma,\r\n\r\nP.S. The “Unlimited Hosting for $17” deal is only available through INSERT LAUNCH END DATE.  After that, the price goes up (pretty significantly).  Go here now to lock in your discount while you still can.\r\n\r\nP.P.S. You’ll also get these 3 Bonuses (worth $550+) when you join during the Early Bird Discount period.  Bonus #2 can be a complete game-changer in ANY online business.  Check them all out here.\r\n===>> https://hostzpresso.blogspot.com/\r\n\r\n\r\n.\r\n..\r\n..\r\n..\r\n.\r\n..\r\n..\r\n..\r\n.\r\n.\r\n.\r\n..\r\n...\r\n...\r\n..\r\n.\r\n.\r\nUnsuscribe Here =>> https://forms.gle/xUyfSkc355Fmmkf3A', 'Hey ,\r\n\r\nIf you’re still paying for website hosting every month, pay close attention…\r\n\r\nBecause with the brand new HostZPresso cloud hosting platform you can now get\r\n\r\nUnlimited Website Hosting For Life - All For a Wildly Low One-Time Price.\r\n===>> https://hostzpresso.blogspot.com/\r\n\r\nBut it’s not just about big savings…\r\n\r\nThey’re raised the bar on quality with a suite of tools that instantly boosts your website performance with:\r\n\r\nUltra High-Speed Servers\r\n100% Uptime Guaranteed\r\nLightning Fast Load Speeds and Unlimited Bandwidth\r\nEnd-to-End SSL Encryption and Advanced Hacker Protection\r\n\r\nWhich means your websites will run cheaper and perform better…\r\n\r\nWithout any restrictions or limitations.\r\n\r\nIt’s like getting a Porsche for the price of a Honda.\r\n\r\nAnd don’t worry if the thought of website management makes your palms sweat with anxiety…\r\n\r\nHostZPresso’s “tech simple” Control Panel makes it easy for ANYONE to create and manage websites…\r\n\r\nEven if you‘ve never operated a website in your life.\r\n\r\nSo it’s time to say “enough” to the bloated web hosting fees that drain your profit every month!\r\n\r\nGo here now to read all the details on HostZPresso and lock in your Unlimited Hosting deal.\r\n===>> https://hostzpresso.blogspot.com/\r\n\r\nBrahma,\r\n\r\nP.S. The “Unlimited Hosting for $17” deal is only available through INSERT LAUNCH END DATE.  After that, the price goes up (pretty significantly).  Go here now to lock in your discount while you still can.\r\n\r\nP.P.S. You’ll also get these 3 Bonuses (worth $550+) when you join during the Early Bird Discount period.  Bonus #2 can be a complete game-changer in ANY online business.  Check them all out here.\r\n===>> https://hostzpresso.blogspot.com/\r\n\r\n\r\n.\r\n..\r\n..\r\n..\r\n.\r\n..\r\n..\r\n..\r\n.\r\n.\r\n.\r\n..\r\n...\r\n...\r\n..\r\n.\r\n.\r\nUnsuscribe Here =>> https://forms.gle/xUyfSkc355Fmmkf3A', '2021-08-12 12:57:42', '2021-08-12 12:57:42'),
(7, 'Alva Menge', 'menge.alva@gmail.com', '078 8915 0009', 'Hi,\r\n\r\nA lot of people who try to sell anything online simply are not doing a good job of it.\r\n\r\nThis is the main reason why the vast majority of people trying to sell affiliate products simply can\'t make a living off their online marketing.\r\n\r\nIt\'s not because these people are dumb. It\'s not because they are incapable of making money online.\r\n\r\nI hate to break it to you, but the whole idea of “build it and they will come” is just a pipe dream.  \r\n \r\nIt may have worked 10 years ago. But believe me. It doesn\'t work today.\r\n\r\nClick the link below now to learn the latest sales funnel optimization strategies!\r\n\r\n>>> https://brahma.kartra.com/page/qLb26\r\n\r\nMake it a great day!\r\n\r\nBrahma\r\n\r\n\r\n.\r\n..\r\n..\r\n..\r\n.\r\n..\r\n..\r\n..\r\n.\r\n.\r\n.\r\n..\r\n...\r\n...\r\n..\r\n.\r\n.\r\nUnsuscribe Here =>> https://forms.gle/xUyfSkc355Fmmkf3A', 'Hi,\r\n\r\nA lot of people who try to sell anything online simply are not doing a good job of it.\r\n\r\nThis is the main reason why the vast majority of people trying to sell affiliate products simply can\'t make a living off their online marketing.\r\n\r\nIt\'s not because these people are dumb. It\'s not because they are incapable of making money online.\r\n\r\nI hate to break it to you, but the whole idea of “build it and they will come” is just a pipe dream.  \r\n \r\nIt may have worked 10 years ago. But believe me. It doesn\'t work today.\r\n\r\nClick the link below now to learn the latest sales funnel optimization strategies!\r\n\r\n>>> https://brahma.kartra.com/page/qLb26\r\n\r\nMake it a great day!\r\n\r\nBrahma\r\n\r\n\r\n.\r\n..\r\n..\r\n..\r\n.\r\n..\r\n..\r\n..\r\n.\r\n.\r\n.\r\n..\r\n...\r\n...\r\n..\r\n.\r\n.\r\nUnsuscribe Here =>> https://forms.gle/xUyfSkc355Fmmkf3A', '2021-08-17 03:21:44', '2021-08-17 03:21:44'),
(8, 'Kerri Levien', 'kerri.levien@gmail.com', '26-80-09-29', 'JOIN OUR COMMUNITY OF 69937 PUBLISHERS\r\n\r\nThe Moneytizer maximizes your website\'s advertising revenue. Our Header Bidding technology allows the world\'s largest advertisers to compete for each of your ad spaces. Always get the best CPM with The Moneytizer!\r\n\r\n=>> https://moneytizer-ads.blogspot.com/\r\n\r\n\r\n.\r\n..\r\n..\r\n..\r\n.\r\n..\r\n..\r\n..\r\n.\r\n.\r\n.\r\n..\r\n...\r\n...\r\n..\r\n.\r\n.\r\nUnsuscribe Here =>> https://forms.gle/xUyfSkc355Fmmkf3A', 'JOIN OUR COMMUNITY OF 69937 PUBLISHERS\r\n\r\nThe Moneytizer maximizes your website\'s advertising revenue. Our Header Bidding technology allows the world\'s largest advertisers to compete for each of your ad spaces. Always get the best CPM with The Moneytizer!\r\n\r\n=>> https://moneytizer-ads.blogspot.com/\r\n\r\n\r\n.\r\n..\r\n..\r\n..\r\n.\r\n..\r\n..\r\n..\r\n.\r\n.\r\n.\r\n..\r\n...\r\n...\r\n..\r\n.\r\n.\r\nUnsuscribe Here =>> https://forms.gle/xUyfSkc355Fmmkf3A', '2021-08-24 21:40:26', '2021-08-24 21:40:26'),
(9, 'Julia Mcbee', 'julia.mcbee@gmail.com', '08131 30 74 50', 'There are a number of layers to the Groovefunnels affiliate program that need clarifying.  \r\n\r\nUtilizing all of them can mean the difference between a couple of thousand dollars a month in affiliate commissions instead of a couple of hundred. \r\n\r\nWith Groovefunnels offering lifetime accounts for a large one-off fee (minimum $1,997), there are large commissions to be made for affiliates who are set up correctly on the platform. \r\n\r\nIn this article, we will be talking about the different GrooveFunnels affiliate commission rates,  how it works, what you need to do to earn $798 per sale, becoming part of this program, and the key rules to follow as a GrooveAffiliate.\r\n\r\nSo, let’s get started.\r\n\r\n=>> https://groovefunnelsfreelifetime.blogspot.com/\r\n\r\n\r\n.\r\n..\r\n..\r\n..\r\n.\r\n..\r\n..\r\n..\r\n.\r\n.\r\n.\r\n..\r\n...\r\n...\r\n..\r\n.\r\n.\r\nUnsuscribe Here =>> https://forms.gle/xUyfSkc355Fmmkf3A', 'There are a number of layers to the Groovefunnels affiliate program that need clarifying.  \r\n\r\nUtilizing all of them can mean the difference between a couple of thousand dollars a month in affiliate commissions instead of a couple of hundred. \r\n\r\nWith Groovefunnels offering lifetime accounts for a large one-off fee (minimum $1,997), there are large commissions to be made for affiliates who are set up correctly on the platform. \r\n\r\nIn this article, we will be talking about the different GrooveFunnels affiliate commission rates,  how it works, what you need to do to earn $798 per sale, becoming part of this program, and the key rules to follow as a GrooveAffiliate.\r\n\r\nSo, let’s get started.\r\n\r\n=>> https://groovefunnelsfreelifetime.blogspot.com/\r\n\r\n\r\n.\r\n..\r\n..\r\n..\r\n.\r\n..\r\n..\r\n..\r\n.\r\n.\r\n.\r\n..\r\n...\r\n...\r\n..\r\n.\r\n.\r\nUnsuscribe Here =>> https://forms.gle/xUyfSkc355Fmmkf3A', '2021-09-16 12:31:40', '2021-09-16 12:31:40'),
(10, 'Julianne Hallstrom', 'julianne.hallstrom@outlook.com', '52-23-66-42', 'Top 10 Online Earning Site Options to Follow\r\n\r\nIn the 21st century where everything is changing, upgrading, in which the information travels around the globe in seconds. In this internet age why to still follow the traditional ways of doing business when you can do it with one online earning site. Yes, making money through online ways is now easy.\r\n\r\n=>> https://top10onlineearningsite.blogspot.com/\r\n\r\nHow can I Generate Income Online?\r\n\r\nMaking money online is no child’s play yet it is in fact the easiest way to earn money. But at the same time, it requires effort, time, and energy to upgrade your skills to eventually achieve your financial goals. The internet, therefore, is a crazy place. It has the solution to almost every modern-day problem. Whether it is learning a craft, selling a product, or educating people over a topic, anything and everything can be found in a single click of a finger. Henceforth, there are many ways of generating income online. Blogging, affiliate marketing, online surveys, freelancing, and podcasting are some examples to mention. You can readily get your hands on these on the online earning site. These are nothing but websites offering you are a chance to earn money through them.\r\n\r\n=>> https://top10onlineearningsite.blogspot.com/', 'Top 10 Online Earning Site Options to Follow\r\n\r\nIn the 21st century where everything is changing, upgrading, in which the information travels around the globe in seconds. In this internet age why to still follow the traditional ways of doing business when you can do it with one online earning site. Yes, making money through online ways is now easy.\r\n\r\n=>> https://top10onlineearningsite.blogspot.com/\r\n\r\nHow can I Generate Income Online?\r\n\r\nMaking money online is no child’s play yet it is in fact the easiest way to earn money. But at the same time, it requires effort, time, and energy to upgrade your skills to eventually achieve your financial goals. The internet, therefore, is a crazy place. It has the solution to almost every modern-day problem. Whether it is learning a craft, selling a product, or educating people over a topic, anything and everything can be found in a single click of a finger. Henceforth, there are many ways of generating income online. Blogging, affiliate marketing, online surveys, freelancing, and podcasting are some examples to mention. You can readily get your hands on these on the online earning site. These are nothing but websites offering you are a chance to earn money through them.\r\n\r\n=>> https://top10onlineearningsite.blogspot.com/', '2021-09-23 13:36:06', '2021-09-23 13:36:06'),
(11, 'Timmy Hensley', 'timmy.hensley@msn.com', '09802 17 99 54', 'On this page you\'ll find all the best ways to make money in your spare time whilst at university based on our own experience.\r\nWe\'ll keep adding new ways to this page so go ahead and bookmark it.\r\n\r\nSo, let’s get started.\r\n\r\n=>> https://40stepsmakemoneyquickly.blogspot.com/', 'On this page you\'ll find all the best ways to make money in your spare time whilst at university based on our own experience.\r\nWe\'ll keep adding new ways to this page so go ahead and bookmark it.\r\n\r\nSo, let’s get started.\r\n\r\n=>> https://40stepsmakemoneyquickly.blogspot.com/', '2021-10-01 01:11:34', '2021-10-01 01:11:34'),
(12, 'sunil', 'sunil@gmail.com', '9122456789', 'save contect', 'enquary for android app', '2021-10-08 05:20:05', '2021-10-08 05:20:05'),
(13, 'Linnea Deegan', 'linnea.deegan7@msn.com', '801-283-6426', 'Get LIFETIME web hosting (no monthly fee)\r\n\r\nthis is a revolution in web hosting that gives you:\r\n[+] Faster loading websites than ever before\r\n[+] 100% uptime with free SSL encryption built-in\r\n[+] Unlimited sites, email accounts & more\r\n[+] Next-Generation Control Panel\r\n[+] Free one-click Wordpress installer\r\n[+] 24/7 support from marketing gurus\r\n\r\n==> https://hostzpresso.blogspot.com/', 'Get LIFETIME web hosting (no monthly fee)\r\n\r\nthis is a revolution in web hosting that gives you:\r\n[+] Faster loading websites than ever before\r\n[+] 100% uptime with free SSL encryption built-in\r\n[+] Unlimited sites, email accounts & more\r\n[+] Next-Generation Control Panel\r\n[+] Free one-click Wordpress installer\r\n[+] 24/7 support from marketing gurus\r\n\r\n==> https://hostzpresso.blogspot.com/', '2021-10-10 05:57:41', '2021-10-10 05:57:41'),
(14, 'heta', 'hetathakkar10@gmail.com', '8347736465', 'Hi', 'hello', '2021-10-11 23:57:25', '2021-10-11 23:57:25'),
(15, 'heta', 'hetathakkar10@gmail.com', '8347736465', 'Hi', 'hello', '2021-10-12 02:40:32', '2021-10-12 02:40:32'),
(16, 'sm', 'sunil@gmail.com', '9145236587', 'aaaa', 'sdfcgfvdvss', '2021-10-12 02:48:46', '2021-10-12 02:48:46'),
(17, 'GeraldoMeasp', 'denisandreev1989521a1n+jj@list.ru', '87223698186', 'Judjfefehgje hfejfwhfjkfvjegj jefkkfejfej kfejkfekgrkhrkkgrj', 'subbisky.com teyiuwoiwfheujsmdcshflisjdalfjedbfsjhsgdhwyfeudjnfwhdgjkfbefjhdwsfjvnskhfbsjfnvshfbasnjkfbdjvgbfgjkd', '2021-10-18 05:00:59', '2021-10-18 05:00:59'),
(18, 'Michaelarbic', 'delpha.goodnoe91979@yahoo.ca', '84358819913', 'Fluctuation of Bitcoin Price + AI = your passive income from $ 30,000 per day', 'We are a group of scientists from the UK, we are engaged in software development and AI training in various fields of activity. \r\nWe managed to create an AI trading robot and train it to predict the rise or fall of the price of Bitcoin, so we got something great. \r\nDuring testing, he earned us $ 167,000 from $ 500 by performing 15,790 trades in 5 days with 97% accuracy. \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc76e5G&sa=D&67=13&usg=AFQjCNFL5rEZgmQXC1gBkMY4vzA4kdArnQ \r\nWe have opened access to the system to everyone in order for our AI to constantly learn, the more people use the faster AI learns. \r\nThus, everything is in a big plus. \r\nPeople use our software and earn from $ 30,000 per day due to this our AI learns and we also use it like other people to earn money. \r\nThis is an inexhaustible source of income, since the price of Bitcoin fluctuates every minute, every second, and we all earn on this. \r\nTo get started, you need to register, make a deposit to the balance of $ 500, launch our smart robot and take from $ 150,000 every 5 days. \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc76e5G&sa=D&96=48&usg=AFQjCNFL5rEZgmQXC1gBkMY4vzA4kdArnQ', '2021-10-21 17:08:36', '2021-10-21 17:08:36'),
(19, 'Marisa Knapp', 'knapp.marisa@hotmail.com', '0653-6014630', 'Activate GooglyPay & Receive $49 Payments Over n\' Over!\r\n\r\nNo Skills Or Experience Needed... \r\nNo Waiting To Get Paid... \r\nNo Extra Fees... No BS...\r\n\r\nGet Started In 1-2 Minutes…\r\n\r\n=>> https://googlypay-mmo.ahhmovies.win/', 'Activate GooglyPay & Receive $49 Payments Over n\' Over!\r\n\r\nNo Skills Or Experience Needed... \r\nNo Waiting To Get Paid... \r\nNo Extra Fees... No BS...\r\n\r\nGet Started In 1-2 Minutes…\r\n\r\n=>> https://googlypay-mmo.ahhmovies.win/', '2021-10-27 09:10:49', '2021-10-27 09:10:49'),
(20, 'GerardHob', 'dimafokin199506780tx+42v2@inbox.ru', '88797684312', 'Good site', 'subbisky.com tyrueoswkdhfbjksdhbdvsddnajkmkxdbfsdjdfadladabfhghgdhsjkd', '2021-11-04 14:43:06', '2021-11-04 14:43:06'),
(21, 'Eric Jones', 'eric.jones.z.mail@gmail.com', '555-555-1212', 'Hey, my name’s Eric and for just a second, imagine this…\r\n\r\n- Someone does a search and winds up at subbisky.com.\r\n\r\n- They hang out for a minute to check it out.  “I’m interested… but… maybe…”\r\n\r\n- And then they hit the back button and check out the other search results instead. \r\n\r\n- Bottom line – you got an eyeball, but nothing else to show for it.\r\n\r\n- There they go.\r\n\r\nThis isn’t really your fault – it happens a LOT – studies show 7 out of 10 visitors to any site disappear without leaving a trace.\r\n\r\nBut you CAN fix that.\r\n\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It lets you know right then and there – enabling you to call that lead while they’re literally looking over your site.\r\n\r\nCLICK HERE https://talkwithwebvisitors.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nTime is money when it comes to connecting with leads – the difference between contacting someone within 5 minutes versus 30 minutes later can be huge – like 100 times better!\r\n\r\nPlus, now that you have their phone number, with our new SMS Text With Lead feature you can automatically start a text (SMS) conversation… so even if you don’t close a deal then, you can follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nStrong stuff.\r\n\r\nCLICK HERE https://talkwithwebvisitors.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nYou could be converting up to 100X more leads today!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE https://talkwithwebvisitors.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitors.com/unsubscribe.aspx?d=subbisky.com', 'Hey, my name’s Eric and for just a second, imagine this…\r\n\r\n- Someone does a search and winds up at subbisky.com.\r\n\r\n- They hang out for a minute to check it out.  “I’m interested… but… maybe…”\r\n\r\n- And then they hit the back button and check out the other search results instead. \r\n\r\n- Bottom line – you got an eyeball, but nothing else to show for it.\r\n\r\n- There they go.\r\n\r\nThis isn’t really your fault – it happens a LOT – studies show 7 out of 10 visitors to any site disappear without leaving a trace.\r\n\r\nBut you CAN fix that.\r\n\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It lets you know right then and there – enabling you to call that lead while they’re literally looking over your site.\r\n\r\nCLICK HERE https://talkwithwebvisitors.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nTime is money when it comes to connecting with leads – the difference between contacting someone within 5 minutes versus 30 minutes later can be huge – like 100 times better!\r\n\r\nPlus, now that you have their phone number, with our new SMS Text With Lead feature you can automatically start a text (SMS) conversation… so even if you don’t close a deal then, you can follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nStrong stuff.\r\n\r\nCLICK HERE https://talkwithwebvisitors.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nYou could be converting up to 100X more leads today!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE https://talkwithwebvisitors.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitors.com/unsubscribe.aspx?d=subbisky.com', '2021-11-08 16:34:10', '2021-11-08 16:34:10'),
(22, 'Eric Jones', 'eric.jones.z.mail@gmail.com', '555-555-1212', 'Hey, my name’s Eric and for just a second, imagine this…\r\n\r\n- Someone does a search and winds up at subbisky.com.\r\n\r\n- They hang out for a minute to check it out.  “I’m interested… but… maybe…”\r\n\r\n- And then they hit the back button and check out the other search results instead. \r\n\r\n- Bottom line – you got an eyeball, but nothing else to show for it.\r\n\r\n- There they go.\r\n\r\nThis isn’t really your fault – it happens a LOT – studies show 7 out of 10 visitors to any site disappear without leaving a trace.\r\n\r\nBut you CAN fix that.\r\n\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It lets you know right then and there – enabling you to call that lead while they’re literally looking over your site.\r\n\r\nCLICK HERE http://talkwithcustomer.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nTime is money when it comes to connecting with leads – the difference between contacting someone within 5 minutes versus 30 minutes later can be huge – like 100 times better!\r\n\r\nPlus, now that you have their phone number, with our new SMS Text With Lead feature you can automatically start a text (SMS) conversation… so even if you don’t close a deal then, you can follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nStrong stuff.\r\n\r\nCLICK HERE http://talkwithcustomer.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nYou could be converting up to 100X more leads today!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE http://talkwithcustomer.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithcustomer.com/unsubscribe.aspx?d=subbisky.com', 'Hey, my name’s Eric and for just a second, imagine this…\r\n\r\n- Someone does a search and winds up at subbisky.com.\r\n\r\n- They hang out for a minute to check it out.  “I’m interested… but… maybe…”\r\n\r\n- And then they hit the back button and check out the other search results instead. \r\n\r\n- Bottom line – you got an eyeball, but nothing else to show for it.\r\n\r\n- There they go.\r\n\r\nThis isn’t really your fault – it happens a LOT – studies show 7 out of 10 visitors to any site disappear without leaving a trace.\r\n\r\nBut you CAN fix that.\r\n\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It lets you know right then and there – enabling you to call that lead while they’re literally looking over your site.\r\n\r\nCLICK HERE http://talkwithcustomer.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nTime is money when it comes to connecting with leads – the difference between contacting someone within 5 minutes versus 30 minutes later can be huge – like 100 times better!\r\n\r\nPlus, now that you have their phone number, with our new SMS Text With Lead feature you can automatically start a text (SMS) conversation… so even if you don’t close a deal then, you can follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nStrong stuff.\r\n\r\nCLICK HERE http://talkwithcustomer.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nYou could be converting up to 100X more leads today!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE http://talkwithcustomer.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithcustomer.com/unsubscribe.aspx?d=subbisky.com', '2021-11-13 08:36:26', '2021-11-13 08:36:26'),
(23, 'KennethOrirm', 'ethanswaypocatello@yahoo.com.au', '85897975659', 'Confessions of a Bitcoin billionaire or passive income from $ 8877 per day', 'Make Artificial Intelligence bring you more $ 5959 in a day >>>>>>>>>>>>>>  https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc7Wvjo&sa=D&12=04&usg=AFQjCNHj_a66ufJc5MfSABppuo4GGGxh6w   <<<<<<<<<<<', '2021-11-16 03:13:26', '2021-11-16 03:13:26'),
(24, 'KennethOrirm', 'ethanswaypocatello@yahoo.com.au', '86929292687', 'Confessions of a Bitcoin billionaire or passive income from $ 8877 per day', 'Make Artificial Intelligence bring you more $ 5959 in a day >>>>>>>>>>>>>>  https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc7Wvjo&sa=D&12=04&usg=AFQjCNHj_a66ufJc5MfSABppuo4GGGxh6w   <<<<<<<<<<<', '2021-11-16 03:13:28', '2021-11-16 03:13:28'),
(25, 'KennethOrirm', 'ethanswaypocatello@yahoo.com.au', '87521155646', 'Confessions of a Bitcoin billionaire or passive income from $ 8877 per day', 'Make Artificial Intelligence bring you more $ 5959 in a day >>>>>>>>>>>>>>  https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc7Wvjo&sa=D&12=04&usg=AFQjCNHj_a66ufJc5MfSABppuo4GGGxh6w   <<<<<<<<<<<', '2021-11-16 03:13:31', '2021-11-16 03:13:31'),
(26, 'KennethOrirm', 'ethanswaypocatello@yahoo.com.au', '83541866628', 'Confessions of a Bitcoin billionaire or passive income from $ 8877 per day', 'Make Artificial Intelligence bring you more $ 5959 in a day >>>>>>>>>>>>>>  https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc7Wvjo&sa=D&12=04&usg=AFQjCNHj_a66ufJc5MfSABppuo4GGGxh6w   <<<<<<<<<<<', '2021-11-16 03:13:33', '2021-11-16 03:13:33'),
(27, 'KennethOrirm', 'ethanswaypocatello@yahoo.com.au', '87227363598', 'Confessions of a Bitcoin billionaire or passive income from $ 8877 per day', 'Make Artificial Intelligence bring you more $ 5959 in a day >>>>>>>>>>>>>>  https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc7Wvjo&sa=D&12=04&usg=AFQjCNHj_a66ufJc5MfSABppuo4GGGxh6w   <<<<<<<<<<<', '2021-11-16 03:13:36', '2021-11-16 03:13:36'),
(28, 'Eddiewrino', 'yannickchouinard@hotmail.ca', '82525787717', 'Income from one investment more $ 5899 in a day', 'Fast income from one investment more $ 5669 in a day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc7Wvjo&sa=D&95=31&usg=AFQjCNHj_a66ufJc5MfSABppuo4GGGxh6w <<<<<<<<<<<<<<<<<<<<<<<<', '2021-11-16 23:13:34', '2021-11-16 23:13:34'),
(29, 'Eddiewrino', 'yannickchouinard@hotmail.ca', '86943439457', 'Income from one investment more $ 5899 in a day', 'Fast income from one investment more $ 5669 in a day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc7Wvjo&sa=D&95=31&usg=AFQjCNHj_a66ufJc5MfSABppuo4GGGxh6w <<<<<<<<<<<<<<<<<<<<<<<<', '2021-11-16 23:13:36', '2021-11-16 23:13:36'),
(30, 'Eddiewrino', 'yannickchouinard@hotmail.ca', '81149346612', 'Income from one investment more $ 5899 in a day', 'Fast income from one investment more $ 5669 in a day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc7Wvjo&sa=D&95=31&usg=AFQjCNHj_a66ufJc5MfSABppuo4GGGxh6w <<<<<<<<<<<<<<<<<<<<<<<<', '2021-11-16 23:13:39', '2021-11-16 23:13:39'),
(31, 'Eddiewrino', 'yannickchouinard@hotmail.ca', '85355934151', 'Income from one investment more $ 5899 in a day', 'Fast income from one investment more $ 5669 in a day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc7Wvjo&sa=D&95=31&usg=AFQjCNHj_a66ufJc5MfSABppuo4GGGxh6w <<<<<<<<<<<<<<<<<<<<<<<<', '2021-11-16 23:13:42', '2021-11-16 23:13:42'),
(32, 'Eddiewrino', 'yannickchouinard@hotmail.ca', '84481823241', 'Income from one investment more $ 5899 in a day', 'Fast income from one investment more $ 5669 in a day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc7Wvjo&sa=D&95=31&usg=AFQjCNHj_a66ufJc5MfSABppuo4GGGxh6w <<<<<<<<<<<<<<<<<<<<<<<<', '2021-11-16 23:13:44', '2021-11-16 23:13:44'),
(33, 'KennethOrirm', 'hamed.mohammadi@tele2.at', '84734168297', 'Quit your job and get passive income from $ 5967 in a day', 'Make Artificial Intelligence bring you from $ 6678 per day >>>>>>>>>>>>>>  https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc7Wvjo&sa=D&70=81&usg=AFQjCNHj_a66ufJc5MfSABppuo4GGGxh6w   <<<<<<<<<<<', '2021-11-17 00:37:38', '2021-11-17 00:37:38'),
(34, 'KennethOrirm', 'hamed.mohammadi@tele2.at', '86387793367', 'Quit your job and get passive income from $ 5967 in a day', 'Make Artificial Intelligence bring you from $ 6678 per day >>>>>>>>>>>>>>  https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc7Wvjo&sa=D&70=81&usg=AFQjCNHj_a66ufJc5MfSABppuo4GGGxh6w   <<<<<<<<<<<', '2021-11-17 00:37:41', '2021-11-17 00:37:41'),
(35, 'KennethOrirm', 'hamed.mohammadi@tele2.at', '87293359359', 'Quit your job and get passive income from $ 5967 in a day', 'Make Artificial Intelligence bring you from $ 6678 per day >>>>>>>>>>>>>>  https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc7Wvjo&sa=D&70=81&usg=AFQjCNHj_a66ufJc5MfSABppuo4GGGxh6w   <<<<<<<<<<<', '2021-11-17 00:37:43', '2021-11-17 00:37:43'),
(36, 'KennethOrirm', 'hamed.mohammadi@tele2.at', '83932464154', 'Quit your job and get passive income from $ 5967 in a day', 'Make Artificial Intelligence bring you from $ 6678 per day >>>>>>>>>>>>>>  https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc7Wvjo&sa=D&70=81&usg=AFQjCNHj_a66ufJc5MfSABppuo4GGGxh6w   <<<<<<<<<<<', '2021-11-17 00:37:46', '2021-11-17 00:37:46'),
(37, 'KennethOrirm', 'hamed.mohammadi@tele2.at', '85948278661', 'Quit your job and get passive income from $ 5967 in a day', 'Make Artificial Intelligence bring you from $ 6678 per day >>>>>>>>>>>>>>  https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc7Wvjo&sa=D&70=81&usg=AFQjCNHj_a66ufJc5MfSABppuo4GGGxh6w   <<<<<<<<<<<', '2021-11-17 00:37:49', '2021-11-17 00:37:49'),
(38, 'heta', 'hetathakkar10@gmail.com', '8347736465', 'Hi', 'hello', '2021-11-18 02:33:52', '2021-11-18 02:33:52'),
(39, 'heta', 'hetathakkar10@gmail.com', '8347736465', 'Hi', 'hello', '2021-11-18 02:49:42', '2021-11-18 02:49:42'),
(40, 'heta', 'hetathakkar10@gmail.com', '8347736465', 'Hi', 'hello', '2021-11-18 02:56:11', '2021-11-18 02:56:11'),
(41, 'heta', 'hetathakkar10@gmail.com', '8347736465', 'Hi', 'hello', '2021-11-18 02:56:46', '2021-11-18 02:56:46'),
(42, 'cv', 'vh', 'yy', 'hu', 'yui', '2021-11-18 04:22:51', '2021-11-18 04:22:51'),
(43, 'c b', 'hanumantj.cipl@gmail.com', 'hol', 'gy8gsv', 'fyn', '2021-11-18 04:37:34', '2021-11-18 04:37:34'),
(44, 'ThomasDiupt', 'lealbook@shaw.ca', '88395772579', 'Bitcoin trading bot that brings Elon Musk from $ 13000 per day', 'A few weeks ago, Elon Musk, in an interview, accidentally blabbed about a cryptocurrency trading robot that brings him passive income from $ 13,000 to $ 135,000 per day and asked to remove this moment from the video after filming. \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc7Wvjo&sa=D&31=33&usg=AFQjCNHj_a66ufJc5MfSABppuo4GGGxh6w \r\nBut the operator who filmed all this remembered the name of the trading robot and tried to make money. \r\nOn the same day, he made a deposit of $ 500 and launched a trading robot and after 3 hours his account had $ 3750 and a week later $ 563700. \r\nOn the robot, you earn in the currency of your country, Europe - EUR, Australia - AUD, Canada - CAD, Sweden - SEC and so on. \r\nHurry up to register as after the influx of new users, the administrators decided to stop registering new users from next week. \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc7Wvjo&sa=D&20=22&usg=AFQjCNHj_a66ufJc5MfSABppuo4GGGxh6w', '2021-11-18 22:23:28', '2021-11-18 22:23:28'),
(45, 'ThomasDiupt', 'lealbook@shaw.ca', '81467359639', 'Bitcoin trading bot that brings Elon Musk from $ 13000 per day', 'A few weeks ago, Elon Musk, in an interview, accidentally blabbed about a cryptocurrency trading robot that brings him passive income from $ 13,000 to $ 135,000 per day and asked to remove this moment from the video after filming. \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc7Wvjo&sa=D&31=33&usg=AFQjCNHj_a66ufJc5MfSABppuo4GGGxh6w \r\nBut the operator who filmed all this remembered the name of the trading robot and tried to make money. \r\nOn the same day, he made a deposit of $ 500 and launched a trading robot and after 3 hours his account had $ 3750 and a week later $ 563700. \r\nOn the robot, you earn in the currency of your country, Europe - EUR, Australia - AUD, Canada - CAD, Sweden - SEC and so on. \r\nHurry up to register as after the influx of new users, the administrators decided to stop registering new users from next week. \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc7Wvjo&sa=D&20=22&usg=AFQjCNHj_a66ufJc5MfSABppuo4GGGxh6w', '2021-11-18 22:23:30', '2021-11-18 22:23:30'),
(46, 'ThomasDiupt', 'lealbook@shaw.ca', '82242675623', 'Bitcoin trading bot that brings Elon Musk from $ 13000 per day', 'A few weeks ago, Elon Musk, in an interview, accidentally blabbed about a cryptocurrency trading robot that brings him passive income from $ 13,000 to $ 135,000 per day and asked to remove this moment from the video after filming. \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc7Wvjo&sa=D&31=33&usg=AFQjCNHj_a66ufJc5MfSABppuo4GGGxh6w \r\nBut the operator who filmed all this remembered the name of the trading robot and tried to make money. \r\nOn the same day, he made a deposit of $ 500 and launched a trading robot and after 3 hours his account had $ 3750 and a week later $ 563700. \r\nOn the robot, you earn in the currency of your country, Europe - EUR, Australia - AUD, Canada - CAD, Sweden - SEC and so on. \r\nHurry up to register as after the influx of new users, the administrators decided to stop registering new users from next week. \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc7Wvjo&sa=D&20=22&usg=AFQjCNHj_a66ufJc5MfSABppuo4GGGxh6w', '2021-11-18 22:23:31', '2021-11-18 22:23:31'),
(47, 'ThomasDiupt', 'lealbook@shaw.ca', '83262196587', 'Bitcoin trading bot that brings Elon Musk from $ 13000 per day', 'A few weeks ago, Elon Musk, in an interview, accidentally blabbed about a cryptocurrency trading robot that brings him passive income from $ 13,000 to $ 135,000 per day and asked to remove this moment from the video after filming. \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc7Wvjo&sa=D&31=33&usg=AFQjCNHj_a66ufJc5MfSABppuo4GGGxh6w \r\nBut the operator who filmed all this remembered the name of the trading robot and tried to make money. \r\nOn the same day, he made a deposit of $ 500 and launched a trading robot and after 3 hours his account had $ 3750 and a week later $ 563700. \r\nOn the robot, you earn in the currency of your country, Europe - EUR, Australia - AUD, Canada - CAD, Sweden - SEC and so on. \r\nHurry up to register as after the influx of new users, the administrators decided to stop registering new users from next week. \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc7Wvjo&sa=D&20=22&usg=AFQjCNHj_a66ufJc5MfSABppuo4GGGxh6w', '2021-11-18 22:23:35', '2021-11-18 22:23:35'),
(48, 'ThomasDiupt', 'lealbook@shaw.ca', '81311191548', 'Bitcoin trading bot that brings Elon Musk from $ 13000 per day', 'A few weeks ago, Elon Musk, in an interview, accidentally blabbed about a cryptocurrency trading robot that brings him passive income from $ 13,000 to $ 135,000 per day and asked to remove this moment from the video after filming. \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc7Wvjo&sa=D&31=33&usg=AFQjCNHj_a66ufJc5MfSABppuo4GGGxh6w \r\nBut the operator who filmed all this remembered the name of the trading robot and tried to make money. \r\nOn the same day, he made a deposit of $ 500 and launched a trading robot and after 3 hours his account had $ 3750 and a week later $ 563700. \r\nOn the robot, you earn in the currency of your country, Europe - EUR, Australia - AUD, Canada - CAD, Sweden - SEC and so on. \r\nHurry up to register as after the influx of new users, the administrators decided to stop registering new users from next week. \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc7Wvjo&sa=D&20=22&usg=AFQjCNHj_a66ufJc5MfSABppuo4GGGxh6w', '2021-11-18 22:23:37', '2021-11-18 22:23:37'),
(49, 'BryantGlask', 'byatt@sympatico.ca', '88551971589', 'Your site subbisky.com HACKED ...', 'Hi. \r\nWe are a group of highly qualified ethical hackers who scan tens of thousands of sites every day for critical vulnerabilities and patch them for a small fee of $ 1500 per site. \r\nOn your site subbisky.com we have discovered 35 critical vulnerabilities, each of which can give attackers full access to your site, databases and the server as a whole. \r\nPay $ 1500 to this Bitcoin wallet bc1qw8uwvpx3jnz8jlyj5j6zff9z5ztlsggvyq5pfj \r\nAnd after payment within 3 hours we will fix all the vulnerabilities on your site and you can sleep peacefully without worrying about the safety of your site and server. \r\nIf we are hired by well-known corporations, then we charge from $ 50000 for our services, so you are lucky that we offer you the same service for $ 1500.', '2021-11-20 22:30:57', '2021-11-20 22:30:57'),
(50, 'BryantGlask', 'byatt@sympatico.ca', '83271795843', 'Your site subbisky.com HACKED ...', 'Hi. \r\nWe are a group of highly qualified ethical hackers who scan tens of thousands of sites every day for critical vulnerabilities and patch them for a small fee of $ 1500 per site. \r\nOn your site subbisky.com we have discovered 35 critical vulnerabilities, each of which can give attackers full access to your site, databases and the server as a whole. \r\nPay $ 1500 to this Bitcoin wallet bc1qw8uwvpx3jnz8jlyj5j6zff9z5ztlsggvyq5pfj \r\nAnd after payment within 3 hours we will fix all the vulnerabilities on your site and you can sleep peacefully without worrying about the safety of your site and server. \r\nIf we are hired by well-known corporations, then we charge from $ 50000 for our services, so you are lucky that we offer you the same service for $ 1500.', '2021-11-20 22:31:00', '2021-11-20 22:31:00'),
(51, 'BryantGlask', 'byatt@sympatico.ca', '81934594313', 'Your site subbisky.com HACKED ...', 'Hi. \r\nWe are a group of highly qualified ethical hackers who scan tens of thousands of sites every day for critical vulnerabilities and patch them for a small fee of $ 1500 per site. \r\nOn your site subbisky.com we have discovered 35 critical vulnerabilities, each of which can give attackers full access to your site, databases and the server as a whole. \r\nPay $ 1500 to this Bitcoin wallet bc1qw8uwvpx3jnz8jlyj5j6zff9z5ztlsggvyq5pfj \r\nAnd after payment within 3 hours we will fix all the vulnerabilities on your site and you can sleep peacefully without worrying about the safety of your site and server. \r\nIf we are hired by well-known corporations, then we charge from $ 50000 for our services, so you are lucky that we offer you the same service for $ 1500.', '2021-11-20 22:31:01', '2021-11-20 22:31:01'),
(52, 'BryantGlask', 'byatt@sympatico.ca', '88369518528', 'Your site subbisky.com HACKED ...', 'Hi. \r\nWe are a group of highly qualified ethical hackers who scan tens of thousands of sites every day for critical vulnerabilities and patch them for a small fee of $ 1500 per site. \r\nOn your site subbisky.com we have discovered 35 critical vulnerabilities, each of which can give attackers full access to your site, databases and the server as a whole. \r\nPay $ 1500 to this Bitcoin wallet bc1qw8uwvpx3jnz8jlyj5j6zff9z5ztlsggvyq5pfj \r\nAnd after payment within 3 hours we will fix all the vulnerabilities on your site and you can sleep peacefully without worrying about the safety of your site and server. \r\nIf we are hired by well-known corporations, then we charge from $ 50000 for our services, so you are lucky that we offer you the same service for $ 1500.', '2021-11-20 22:31:04', '2021-11-20 22:31:04'),
(53, 'BryantGlask', 'byatt@sympatico.ca', '88863885928', 'Your site subbisky.com HACKED ...', 'Hi. \r\nWe are a group of highly qualified ethical hackers who scan tens of thousands of sites every day for critical vulnerabilities and patch them for a small fee of $ 1500 per site. \r\nOn your site subbisky.com we have discovered 35 critical vulnerabilities, each of which can give attackers full access to your site, databases and the server as a whole. \r\nPay $ 1500 to this Bitcoin wallet bc1qw8uwvpx3jnz8jlyj5j6zff9z5ztlsggvyq5pfj \r\nAnd after payment within 3 hours we will fix all the vulnerabilities on your site and you can sleep peacefully without worrying about the safety of your site and server. \r\nIf we are hired by well-known corporations, then we charge from $ 50000 for our services, so you are lucky that we offer you the same service for $ 1500.', '2021-11-20 22:31:07', '2021-11-20 22:31:07'),
(54, 'Eddiewrino', 'hieket@resmed.com.au', '82964732623', 'Fast income from one investment from $ 7699 per day', 'Fast income from one investment more $ 9768 in a day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8efyS&sa=D&20=15&usg=AFQjCNE19L0R90htG4gSNamEaeldZ-6c8g <<<<<<<<<<<<<<<<<<<<<<<<', '2021-11-21 09:04:11', '2021-11-21 09:04:11'),
(55, 'Eddiewrino', 'hieket@resmed.com.au', '81841586165', 'Fast income from one investment from $ 7699 per day', 'Fast income from one investment more $ 9768 in a day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8efyS&sa=D&20=15&usg=AFQjCNE19L0R90htG4gSNamEaeldZ-6c8g <<<<<<<<<<<<<<<<<<<<<<<<', '2021-11-21 09:04:14', '2021-11-21 09:04:14'),
(56, 'Eddiewrino', 'hieket@resmed.com.au', '87647544671', 'Fast income from one investment from $ 7699 per day', 'Fast income from one investment more $ 9768 in a day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8efyS&sa=D&20=15&usg=AFQjCNE19L0R90htG4gSNamEaeldZ-6c8g <<<<<<<<<<<<<<<<<<<<<<<<', '2021-11-21 09:04:17', '2021-11-21 09:04:17'),
(57, 'Eddiewrino', 'hieket@resmed.com.au', '82829941178', 'Fast income from one investment from $ 7699 per day', 'Fast income from one investment more $ 9768 in a day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8efyS&sa=D&20=15&usg=AFQjCNE19L0R90htG4gSNamEaeldZ-6c8g <<<<<<<<<<<<<<<<<<<<<<<<', '2021-11-21 09:04:24', '2021-11-21 09:04:24'),
(58, 'Eddiewrino', 'hieket@resmed.com.au', '86822434719', 'Fast income from one investment from $ 7699 per day', 'Fast income from one investment more $ 9768 in a day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8efyS&sa=D&20=15&usg=AFQjCNE19L0R90htG4gSNamEaeldZ-6c8g <<<<<<<<<<<<<<<<<<<<<<<<', '2021-11-21 09:04:26', '2021-11-21 09:04:26'),
(59, 'Eddiewrino', 'havana7255@web.de', '82142274699', 'Make Artificial Intelligence bring you from $ 8896 in a day', 'Make Artificial Intelligence bring you from $ 7895 per day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8h3ls&sa=D&04=58&usg=AFQjCNHU-F0QOtn7o9CQDrCg8wi_ek2Ntw <<<<<<<<<<<<<<<<<<<<<<<<', '2021-11-22 23:50:58', '2021-11-22 23:50:58'),
(60, 'Eddiewrino', 'havana7255@web.de', '82874499347', 'Make Artificial Intelligence bring you from $ 8896 in a day', 'Make Artificial Intelligence bring you from $ 7895 per day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8h3ls&sa=D&04=58&usg=AFQjCNHU-F0QOtn7o9CQDrCg8wi_ek2Ntw <<<<<<<<<<<<<<<<<<<<<<<<', '2021-11-22 23:51:00', '2021-11-22 23:51:00'),
(61, 'Eddiewrino', 'havana7255@web.de', '86961921117', 'Make Artificial Intelligence bring you from $ 8896 in a day', 'Make Artificial Intelligence bring you from $ 7895 per day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8h3ls&sa=D&04=58&usg=AFQjCNHU-F0QOtn7o9CQDrCg8wi_ek2Ntw <<<<<<<<<<<<<<<<<<<<<<<<', '2021-11-22 23:51:03', '2021-11-22 23:51:03'),
(62, 'Eddiewrino', 'havana7255@web.de', '83953657728', 'Make Artificial Intelligence bring you from $ 8896 in a day', 'Make Artificial Intelligence bring you from $ 7895 per day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8h3ls&sa=D&04=58&usg=AFQjCNHU-F0QOtn7o9CQDrCg8wi_ek2Ntw <<<<<<<<<<<<<<<<<<<<<<<<', '2021-11-22 23:51:05', '2021-11-22 23:51:05'),
(63, 'Eddiewrino', 'havana7255@web.de', '87195396719', 'Make Artificial Intelligence bring you from $ 8896 in a day', 'Make Artificial Intelligence bring you from $ 7895 per day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8h3ls&sa=D&04=58&usg=AFQjCNHU-F0QOtn7o9CQDrCg8wi_ek2Ntw <<<<<<<<<<<<<<<<<<<<<<<<', '2021-11-22 23:51:08', '2021-11-22 23:51:08'),
(64, 'Donaldsig', 'therese_barrett@bigpond.com', '88322194398', 'Binance: The Best Trading Robot in the World', 'According to Binance, this is the best trading robot in the world. \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8kz55&sa=D&52=36&usg=AFQjCNEYo6mWXSP9gUinA8sLtVU0jLXlbQ \r\nBecause he is able to make 200% profit every day. \r\nFor example, you replenished your brokerage account with $ 500 (EUR, GBP, etc.) and he earned you from $ 1000 in net income within a day. Binance recommends using this particular trading robot for automated trading. \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8kz55&sa=D&08=10&usg=AFQjCNEYo6mWXSP9gUinA8sLtVU0jLXlbQ', '2021-11-24 09:02:15', '2021-11-24 09:02:15'),
(65, 'Donaldsig', 'therese_barrett@bigpond.com', '85722732878', 'Binance: The Best Trading Robot in the World', 'According to Binance, this is the best trading robot in the world. \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8kz55&sa=D&52=36&usg=AFQjCNEYo6mWXSP9gUinA8sLtVU0jLXlbQ \r\nBecause he is able to make 200% profit every day. \r\nFor example, you replenished your brokerage account with $ 500 (EUR, GBP, etc.) and he earned you from $ 1000 in net income within a day. Binance recommends using this particular trading robot for automated trading. \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8kz55&sa=D&08=10&usg=AFQjCNEYo6mWXSP9gUinA8sLtVU0jLXlbQ', '2021-11-24 09:02:17', '2021-11-24 09:02:17'),
(66, 'Donaldsig', 'therese_barrett@bigpond.com', '81454849322', 'Binance: The Best Trading Robot in the World', 'According to Binance, this is the best trading robot in the world. \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8kz55&sa=D&52=36&usg=AFQjCNEYo6mWXSP9gUinA8sLtVU0jLXlbQ \r\nBecause he is able to make 200% profit every day. \r\nFor example, you replenished your brokerage account with $ 500 (EUR, GBP, etc.) and he earned you from $ 1000 in net income within a day. Binance recommends using this particular trading robot for automated trading. \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8kz55&sa=D&08=10&usg=AFQjCNEYo6mWXSP9gUinA8sLtVU0jLXlbQ', '2021-11-24 09:02:19', '2021-11-24 09:02:19'),
(67, 'Donaldsig', 'therese_barrett@bigpond.com', '83144571912', 'Binance: The Best Trading Robot in the World', 'According to Binance, this is the best trading robot in the world. \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8kz55&sa=D&52=36&usg=AFQjCNEYo6mWXSP9gUinA8sLtVU0jLXlbQ \r\nBecause he is able to make 200% profit every day. \r\nFor example, you replenished your brokerage account with $ 500 (EUR, GBP, etc.) and he earned you from $ 1000 in net income within a day. Binance recommends using this particular trading robot for automated trading. \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8kz55&sa=D&08=10&usg=AFQjCNEYo6mWXSP9gUinA8sLtVU0jLXlbQ', '2021-11-24 09:02:24', '2021-11-24 09:02:24'),
(68, 'Donaldsig', 'therese_barrett@bigpond.com', '89773125927', 'Binance: The Best Trading Robot in the World', 'According to Binance, this is the best trading robot in the world. \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8kz55&sa=D&52=36&usg=AFQjCNEYo6mWXSP9gUinA8sLtVU0jLXlbQ \r\nBecause he is able to make 200% profit every day. \r\nFor example, you replenished your brokerage account with $ 500 (EUR, GBP, etc.) and he earned you from $ 1000 in net income within a day. Binance recommends using this particular trading robot for automated trading. \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8kz55&sa=D&08=10&usg=AFQjCNEYo6mWXSP9gUinA8sLtVU0jLXlbQ', '2021-11-24 09:02:26', '2021-11-24 09:02:26');
INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(69, 'Claudemetry', 'patrick17kupfer@web.de', '82982475866', '№(№( Binance: The Best Trading Robot in the World (&:+', 'According to Binance, this is the best trading robot in the world (=№% \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8kz55&sa=D&50=98&usg=AFQjCNEYo6mWXSP9gUinA8sLtVU0jLXlbQ \r\nBecause he is able to make 200% profit every day ?@:* \r\nFor example, you replenished your brokerage account with $ 500 (EUR, GBP, etc.) and he earned you from $ 1000 in net income within a day %**= \r\nBinance recommends using this particular trading robot for automated trading %+\"% \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8kz55&sa=D&94=46&usg=AFQjCNEYo6mWXSP9gUinA8sLtVU0jLXlbQ', '2021-11-26 22:08:45', '2021-11-26 22:08:45'),
(70, 'Claudemetry', 'patrick17kupfer@web.de', '83935131738', '№(№( Binance: The Best Trading Robot in the World (&:+', 'According to Binance, this is the best trading robot in the world (=№% \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8kz55&sa=D&50=98&usg=AFQjCNEYo6mWXSP9gUinA8sLtVU0jLXlbQ \r\nBecause he is able to make 200% profit every day ?@:* \r\nFor example, you replenished your brokerage account with $ 500 (EUR, GBP, etc.) and he earned you from $ 1000 in net income within a day %**= \r\nBinance recommends using this particular trading robot for automated trading %+\"% \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8kz55&sa=D&94=46&usg=AFQjCNEYo6mWXSP9gUinA8sLtVU0jLXlbQ', '2021-11-26 22:08:48', '2021-11-26 22:08:48'),
(71, 'Claudemetry', 'patrick17kupfer@web.de', '86764755943', '№(№( Binance: The Best Trading Robot in the World (&:+', 'According to Binance, this is the best trading robot in the world (=№% \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8kz55&sa=D&50=98&usg=AFQjCNEYo6mWXSP9gUinA8sLtVU0jLXlbQ \r\nBecause he is able to make 200% profit every day ?@:* \r\nFor example, you replenished your brokerage account with $ 500 (EUR, GBP, etc.) and he earned you from $ 1000 in net income within a day %**= \r\nBinance recommends using this particular trading robot for automated trading %+\"% \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8kz55&sa=D&94=46&usg=AFQjCNEYo6mWXSP9gUinA8sLtVU0jLXlbQ', '2021-11-26 22:08:52', '2021-11-26 22:08:52'),
(72, 'Claudemetry', 'patrick17kupfer@web.de', '89268891752', '№(№( Binance: The Best Trading Robot in the World (&:+', 'According to Binance, this is the best trading robot in the world (=№% \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8kz55&sa=D&50=98&usg=AFQjCNEYo6mWXSP9gUinA8sLtVU0jLXlbQ \r\nBecause he is able to make 200% profit every day ?@:* \r\nFor example, you replenished your brokerage account with $ 500 (EUR, GBP, etc.) and he earned you from $ 1000 in net income within a day %**= \r\nBinance recommends using this particular trading robot for automated trading %+\"% \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8kz55&sa=D&94=46&usg=AFQjCNEYo6mWXSP9gUinA8sLtVU0jLXlbQ', '2021-11-26 22:08:54', '2021-11-26 22:08:54'),
(73, 'Claudemetry', 'patrick17kupfer@web.de', '89646369736', '№(№( Binance: The Best Trading Robot in the World (&:+', 'According to Binance, this is the best trading robot in the world (=№% \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8kz55&sa=D&50=98&usg=AFQjCNEYo6mWXSP9gUinA8sLtVU0jLXlbQ \r\nBecause he is able to make 200% profit every day ?@:* \r\nFor example, you replenished your brokerage account with $ 500 (EUR, GBP, etc.) and he earned you from $ 1000 in net income within a day %**= \r\nBinance recommends using this particular trading robot for automated trading %+\"% \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8kz55&sa=D&94=46&usg=AFQjCNEYo6mWXSP9gUinA8sLtVU0jLXlbQ', '2021-11-26 22:08:56', '2021-11-26 22:08:56'),
(74, 'Edgarglamb', 'charly.bronzel@t-online.de', '86983638133', 'Blockchain: The most profitable trading robot or income from $ 5000 per day )_!%', 'Blockchain recommends to all people who are interested in additional permanent passive income of $ 5000 per day with a cryptocurrency trading robot. \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8qvzi&sa=D&16=20&usg=AFQjCNH2QAwQV6sbS1u0SgHiVXKZSKhcKQ \r\nA trading robot is capable of making from 750% to 15000% profit per day )+(( \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8qvzi&sa=D&34=13&usg=AFQjCNH2QAwQV6sbS1u0SgHiVXKZSKhcKQ \r\nThis success was achieved thanks to the advanced developments in the field of artificial intelligence №**& \r\nTens of thousands of people around the world are already using this trading robot, so start you (@%+ \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8qvzi&sa=D&87=59&usg=AFQjCNH2QAwQV6sbS1u0SgHiVXKZSKhcKQ \r\nTo start, you need to do just three things: \r\n1. Make a deposit to your brokerage account from $ 500 :%%) \r\n2. Launch the trading robot %*:_ \r\n3. Receive passive income from $ 5000 per day №%;_ \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8qvzi&sa=D&54=95&usg=AFQjCNH2QAwQV6sbS1u0SgHiVXKZSKhcKQ', '2021-11-29 12:24:16', '2021-11-29 12:24:16'),
(75, 'Edgarglamb', 'charly.bronzel@t-online.de', '84626221898', 'Blockchain: The most profitable trading robot or income from $ 5000 per day )_!%', 'Blockchain recommends to all people who are interested in additional permanent passive income of $ 5000 per day with a cryptocurrency trading robot. \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8qvzi&sa=D&16=20&usg=AFQjCNH2QAwQV6sbS1u0SgHiVXKZSKhcKQ \r\nA trading robot is capable of making from 750% to 15000% profit per day )+(( \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8qvzi&sa=D&34=13&usg=AFQjCNH2QAwQV6sbS1u0SgHiVXKZSKhcKQ \r\nThis success was achieved thanks to the advanced developments in the field of artificial intelligence №**& \r\nTens of thousands of people around the world are already using this trading robot, so start you (@%+ \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8qvzi&sa=D&87=59&usg=AFQjCNH2QAwQV6sbS1u0SgHiVXKZSKhcKQ \r\nTo start, you need to do just three things: \r\n1. Make a deposit to your brokerage account from $ 500 :%%) \r\n2. Launch the trading robot %*:_ \r\n3. Receive passive income from $ 5000 per day №%;_ \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8qvzi&sa=D&54=95&usg=AFQjCNH2QAwQV6sbS1u0SgHiVXKZSKhcKQ', '2021-11-29 12:24:18', '2021-11-29 12:24:18'),
(76, 'Edgarglamb', 'charly.bronzel@t-online.de', '83643137266', 'Blockchain: The most profitable trading robot or income from $ 5000 per day )_!%', 'Blockchain recommends to all people who are interested in additional permanent passive income of $ 5000 per day with a cryptocurrency trading robot. \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8qvzi&sa=D&16=20&usg=AFQjCNH2QAwQV6sbS1u0SgHiVXKZSKhcKQ \r\nA trading robot is capable of making from 750% to 15000% profit per day )+(( \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8qvzi&sa=D&34=13&usg=AFQjCNH2QAwQV6sbS1u0SgHiVXKZSKhcKQ \r\nThis success was achieved thanks to the advanced developments in the field of artificial intelligence №**& \r\nTens of thousands of people around the world are already using this trading robot, so start you (@%+ \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8qvzi&sa=D&87=59&usg=AFQjCNH2QAwQV6sbS1u0SgHiVXKZSKhcKQ \r\nTo start, you need to do just three things: \r\n1. Make a deposit to your brokerage account from $ 500 :%%) \r\n2. Launch the trading robot %*:_ \r\n3. Receive passive income from $ 5000 per day №%;_ \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8qvzi&sa=D&54=95&usg=AFQjCNH2QAwQV6sbS1u0SgHiVXKZSKhcKQ', '2021-11-29 12:24:20', '2021-11-29 12:24:20'),
(77, 'Edgarglamb', 'charly.bronzel@t-online.de', '83782838381', 'Blockchain: The most profitable trading robot or income from $ 5000 per day )_!%', 'Blockchain recommends to all people who are interested in additional permanent passive income of $ 5000 per day with a cryptocurrency trading robot. \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8qvzi&sa=D&16=20&usg=AFQjCNH2QAwQV6sbS1u0SgHiVXKZSKhcKQ \r\nA trading robot is capable of making from 750% to 15000% profit per day )+(( \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8qvzi&sa=D&34=13&usg=AFQjCNH2QAwQV6sbS1u0SgHiVXKZSKhcKQ \r\nThis success was achieved thanks to the advanced developments in the field of artificial intelligence №**& \r\nTens of thousands of people around the world are already using this trading robot, so start you (@%+ \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8qvzi&sa=D&87=59&usg=AFQjCNH2QAwQV6sbS1u0SgHiVXKZSKhcKQ \r\nTo start, you need to do just three things: \r\n1. Make a deposit to your brokerage account from $ 500 :%%) \r\n2. Launch the trading robot %*:_ \r\n3. Receive passive income from $ 5000 per day №%;_ \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8qvzi&sa=D&54=95&usg=AFQjCNH2QAwQV6sbS1u0SgHiVXKZSKhcKQ', '2021-11-29 12:24:21', '2021-11-29 12:24:21'),
(78, 'Edgarglamb', 'charly.bronzel@t-online.de', '82798659218', 'Blockchain: The most profitable trading robot or income from $ 5000 per day )_!%', 'Blockchain recommends to all people who are interested in additional permanent passive income of $ 5000 per day with a cryptocurrency trading robot. \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8qvzi&sa=D&16=20&usg=AFQjCNH2QAwQV6sbS1u0SgHiVXKZSKhcKQ \r\nA trading robot is capable of making from 750% to 15000% profit per day )+(( \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8qvzi&sa=D&34=13&usg=AFQjCNH2QAwQV6sbS1u0SgHiVXKZSKhcKQ \r\nThis success was achieved thanks to the advanced developments in the field of artificial intelligence №**& \r\nTens of thousands of people around the world are already using this trading robot, so start you (@%+ \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8qvzi&sa=D&87=59&usg=AFQjCNH2QAwQV6sbS1u0SgHiVXKZSKhcKQ \r\nTo start, you need to do just three things: \r\n1. Make a deposit to your brokerage account from $ 500 :%%) \r\n2. Launch the trading robot %*:_ \r\n3. Receive passive income from $ 5000 per day №%;_ \r\nhttps://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8qvzi&sa=D&54=95&usg=AFQjCNH2QAwQV6sbS1u0SgHiVXKZSKhcKQ', '2021-11-29 12:24:24', '2021-11-29 12:24:24'),
(79, 'AnthonySet', 'no.reply.feedbackform@gmail.com', '83253525211', 'The best advertising of your products and services!', 'Hi!  subbisky.com \r\n \r\nDid yоu knоw thаt it is pоssiblе tо sеnd аppеаl соmplеtеly lаwfully? \r\nWе prеsеntаtiоn а nеw uniquе wаy оf sеnding mеssаgе thrоugh соntасt fоrms. Suсh fоrms аrе lосаtеd оn mаny sitеs. \r\nWhеn suсh businеss prоpоsаls аrе sеnt, nо pеrsоnаl dаtа is usеd, аnd mеssаgеs аrе sеnt tо fоrms spесifiсаlly dеsignеd tо rесеivе mеssаgеs аnd аppеаls. \r\nаlsо, mеssаgеs sеnt thrоugh соmmuniсаtiоn Fоrms dо nоt gеt intо spаm bесаusе suсh mеssаgеs аrе соnsidеrеd impоrtаnt. \r\nWе оffеr yоu tо tеst оur sеrviсе fоr frее. Wе will sеnd up tо 50,000 mеssаgеs fоr yоu. \r\nThе соst оf sеnding оnе milliоn mеssаgеs is 49 USD. \r\n \r\nThis lеttеr is сrеаtеd аutоmаtiсаlly. Plеаsе usе thе соntасt dеtаils bеlоw tо соntасt us. \r\n \r\nContact us. \r\nTelegram - @FeedbackMessages \r\nSkype  live:contactform_18 \r\nWhatsApp - +375259112693 \r\nWe only use chat.', '2021-11-29 19:40:27', '2021-11-29 19:40:27'),
(80, 'Eddiewrino', 'laurentmorin38@wanadoo.fr', '88176971991', 'It\'s up to you how much time you want to invest in it.', 'Take a look at this >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8qvzi&sa=D&53=76&usg=AFQjCNH2QAwQV6sbS1u0SgHiVXKZSKhcKQ <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-01 22:58:14', '2021-12-01 22:58:14'),
(81, 'Eddiewrino', 'laurentmorin38@wanadoo.fr', '86357296574', 'It\'s up to you how much time you want to invest in it.', 'Take a look at this >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8qvzi&sa=D&53=76&usg=AFQjCNH2QAwQV6sbS1u0SgHiVXKZSKhcKQ <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-01 22:58:16', '2021-12-01 22:58:16'),
(82, 'Eddiewrino', 'laurentmorin38@wanadoo.fr', '83487671367', 'It\'s up to you how much time you want to invest in it.', 'Take a look at this >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8qvzi&sa=D&53=76&usg=AFQjCNH2QAwQV6sbS1u0SgHiVXKZSKhcKQ <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-01 22:58:18', '2021-12-01 22:58:18'),
(83, 'Eddiewrino', 'laurentmorin38@wanadoo.fr', '85784939122', 'It\'s up to you how much time you want to invest in it.', 'Take a look at this >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8qvzi&sa=D&53=76&usg=AFQjCNH2QAwQV6sbS1u0SgHiVXKZSKhcKQ <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-01 22:58:20', '2021-12-01 22:58:20'),
(84, 'Eddiewrino', 'laurentmorin38@wanadoo.fr', '84723754784', 'It\'s up to you how much time you want to invest in it.', 'Take a look at this >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8qvzi&sa=D&53=76&usg=AFQjCNH2QAwQV6sbS1u0SgHiVXKZSKhcKQ <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-01 22:58:22', '2021-12-01 22:58:22'),
(85, 'Eddiewrino', 'jostilrem@hotmail.com', '85985271761', 'Income from one investment from $ 9985 per day', 'Bitcoin Miiliarder told how he makes money more $ 5899 in a day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8qvzi&sa=D&98=74&usg=AFQjCNH2QAwQV6sbS1u0SgHiVXKZSKhcKQ <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-03 01:45:01', '2021-12-03 01:45:01'),
(86, 'Eddiewrino', 'jostilrem@hotmail.com', '85379784821', 'Income from one investment from $ 9985 per day', 'Bitcoin Miiliarder told how he makes money more $ 5899 in a day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8qvzi&sa=D&98=74&usg=AFQjCNH2QAwQV6sbS1u0SgHiVXKZSKhcKQ <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-03 01:45:05', '2021-12-03 01:45:05'),
(87, 'Eddiewrino', 'jostilrem@hotmail.com', '85976913235', 'Income from one investment from $ 9985 per day', 'Bitcoin Miiliarder told how he makes money more $ 5899 in a day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8qvzi&sa=D&98=74&usg=AFQjCNH2QAwQV6sbS1u0SgHiVXKZSKhcKQ <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-03 01:45:07', '2021-12-03 01:45:07'),
(88, 'Eddiewrino', 'jostilrem@hotmail.com', '84391383647', 'Income from one investment from $ 9985 per day', 'Bitcoin Miiliarder told how he makes money more $ 5899 in a day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8qvzi&sa=D&98=74&usg=AFQjCNH2QAwQV6sbS1u0SgHiVXKZSKhcKQ <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-03 01:45:09', '2021-12-03 01:45:09'),
(89, 'Eddiewrino', 'jostilrem@hotmail.com', '84468919557', 'Income from one investment from $ 9985 per day', 'Bitcoin Miiliarder told how he makes money more $ 5899 in a day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8qvzi&sa=D&98=74&usg=AFQjCNH2QAwQV6sbS1u0SgHiVXKZSKhcKQ <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-03 01:45:11', '2021-12-03 01:45:11'),
(90, 'Eddiewrino', 'mryland@gmail.com', '85888556925', 'Change your life and get passive income from $ 9796 per day', 'Passive income more $ 5857 per day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8ED7K&sa=D&43=61&usg=AFQjCNEY3K5BsQ-mUq_FMcp6hGUAytb7Og <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-05 05:14:40', '2021-12-05 05:14:40'),
(91, 'Eddiewrino', 'mryland@gmail.com', '85644598197', 'Change your life and get passive income from $ 9796 per day', 'Passive income more $ 5857 per day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8ED7K&sa=D&43=61&usg=AFQjCNEY3K5BsQ-mUq_FMcp6hGUAytb7Og <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-05 05:14:44', '2021-12-05 05:14:44'),
(92, 'Eddiewrino', 'mryland@gmail.com', '81414814216', 'Change your life and get passive income from $ 9796 per day', 'Passive income more $ 5857 per day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8ED7K&sa=D&43=61&usg=AFQjCNEY3K5BsQ-mUq_FMcp6hGUAytb7Og <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-05 05:14:49', '2021-12-05 05:14:49'),
(93, 'Eddiewrino', 'mryland@gmail.com', '83134231689', 'Change your life and get passive income from $ 9796 per day', 'Passive income more $ 5857 per day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8ED7K&sa=D&43=61&usg=AFQjCNEY3K5BsQ-mUq_FMcp6hGUAytb7Og <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-05 05:14:51', '2021-12-05 05:14:51'),
(94, 'Eddiewrino', 'mryland@gmail.com', '89486536643', 'Change your life and get passive income from $ 9796 per day', 'Passive income more $ 5857 per day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8ED7K&sa=D&43=61&usg=AFQjCNEY3K5BsQ-mUq_FMcp6hGUAytb7Og <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-05 05:14:56', '2021-12-05 05:14:56'),
(95, 'Eddiewrino', 'kris.kr.89@mail.ru', '81382635466', 'Launch Artificial Intelligence with one button and earn from $ 9676 in a day', 'Passive income from $ 7886 per day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8ED7K&sa=D&15=82&usg=AFQjCNEY3K5BsQ-mUq_FMcp6hGUAytb7Og <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-07 02:18:29', '2021-12-07 02:18:29'),
(96, 'Eddiewrino', 'kris.kr.89@mail.ru', '85823111633', 'Launch Artificial Intelligence with one button and earn from $ 9676 in a day', 'Passive income from $ 7886 per day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8ED7K&sa=D&15=82&usg=AFQjCNEY3K5BsQ-mUq_FMcp6hGUAytb7Og <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-07 02:18:31', '2021-12-07 02:18:31'),
(97, 'Eddiewrino', 'kris.kr.89@mail.ru', '81356358245', 'Launch Artificial Intelligence with one button and earn from $ 9676 in a day', 'Passive income from $ 7886 per day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8ED7K&sa=D&15=82&usg=AFQjCNEY3K5BsQ-mUq_FMcp6hGUAytb7Og <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-07 02:18:33', '2021-12-07 02:18:33'),
(98, 'Eddiewrino', 'kris.kr.89@mail.ru', '81921886198', 'Launch Artificial Intelligence with one button and earn from $ 9676 in a day', 'Passive income from $ 7886 per day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8ED7K&sa=D&15=82&usg=AFQjCNEY3K5BsQ-mUq_FMcp6hGUAytb7Og <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-07 02:18:35', '2021-12-07 02:18:35'),
(99, 'Eddiewrino', 'kris.kr.89@mail.ru', '84716152762', 'Launch Artificial Intelligence with one button and earn from $ 9676 in a day', 'Passive income from $ 7886 per day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8ED7K&sa=D&15=82&usg=AFQjCNEY3K5BsQ-mUq_FMcp6hGUAytb7Og <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-07 02:18:37', '2021-12-07 02:18:37'),
(100, 'Eddiewrino', 'alessandro96@hotmail.de', '82973479774', 'Dies ist Ihre Chance zu verdienen Vor 111000 EUR in der Woche', 'Schnelles Geld Vor 123000 EUR pro Tag >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8ED7K&sa=D&12=39&usg=AFQjCNEY3K5BsQ-mUq_FMcp6hGUAytb7Og <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-07 10:27:21', '2021-12-07 10:27:21'),
(101, 'Eddiewrino', 'alessandro96@hotmail.de', '81121348458', 'Dies ist Ihre Chance zu verdienen Vor 111000 EUR in der Woche', 'Schnelles Geld Vor 123000 EUR pro Tag >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8ED7K&sa=D&12=39&usg=AFQjCNEY3K5BsQ-mUq_FMcp6hGUAytb7Og <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-07 10:27:22', '2021-12-07 10:27:22'),
(102, 'Eddiewrino', 'alessandro96@hotmail.de', '85288184861', 'Dies ist Ihre Chance zu verdienen Vor 111000 EUR in der Woche', 'Schnelles Geld Vor 123000 EUR pro Tag >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8ED7K&sa=D&12=39&usg=AFQjCNEY3K5BsQ-mUq_FMcp6hGUAytb7Og <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-07 10:27:26', '2021-12-07 10:27:26'),
(103, 'Eddiewrino', 'alessandro96@hotmail.de', '84563482921', 'Dies ist Ihre Chance zu verdienen Vor 111000 EUR in der Woche', 'Schnelles Geld Vor 123000 EUR pro Tag >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8ED7K&sa=D&12=39&usg=AFQjCNEY3K5BsQ-mUq_FMcp6hGUAytb7Og <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-07 10:27:27', '2021-12-07 10:27:27'),
(104, 'Eddiewrino', 'alessandro96@hotmail.de', '85488614454', 'Dies ist Ihre Chance zu verdienen Vor 111000 EUR in der Woche', 'Schnelles Geld Vor 123000 EUR pro Tag >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8ED7K&sa=D&12=39&usg=AFQjCNEY3K5BsQ-mUq_FMcp6hGUAytb7Og <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-07 10:27:29', '2021-12-07 10:27:29'),
(105, 'Eddiewrino', 'brunolanderos@epost.de', '83811938388', 'Anfangen zu verdienen von 143000 EUR pro Tag', 'Anfangen zu verdienen Vor 123000 EUR in der Woche >>>>>>>>>>>>>>>>>>>>>>>>>>> http://www.google.com/url?q=http%3A%2F%2Fgo.nihawiwa.com%2F0bnl&sa=D&33=70&usg=AFQjCNEUPijOi1LFtA_rg0rU0qfVGTKd6A <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-07 13:00:22', '2021-12-07 13:00:22'),
(106, 'Eddiewrino', 'brunolanderos@epost.de', '85232548129', 'Anfangen zu verdienen von 143000 EUR pro Tag', 'Anfangen zu verdienen Vor 123000 EUR in der Woche >>>>>>>>>>>>>>>>>>>>>>>>>>> http://www.google.com/url?q=http%3A%2F%2Fgo.nihawiwa.com%2F0bnl&sa=D&33=70&usg=AFQjCNEUPijOi1LFtA_rg0rU0qfVGTKd6A <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-07 13:00:24', '2021-12-07 13:00:24'),
(107, 'Eddiewrino', 'brunolanderos@epost.de', '87663447853', 'Anfangen zu verdienen von 143000 EUR pro Tag', 'Anfangen zu verdienen Vor 123000 EUR in der Woche >>>>>>>>>>>>>>>>>>>>>>>>>>> http://www.google.com/url?q=http%3A%2F%2Fgo.nihawiwa.com%2F0bnl&sa=D&33=70&usg=AFQjCNEUPijOi1LFtA_rg0rU0qfVGTKd6A <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-07 13:00:29', '2021-12-07 13:00:29'),
(108, 'Eddiewrino', 'brunolanderos@epost.de', '89672193167', 'Anfangen zu verdienen von 143000 EUR pro Tag', 'Anfangen zu verdienen Vor 123000 EUR in der Woche >>>>>>>>>>>>>>>>>>>>>>>>>>> http://www.google.com/url?q=http%3A%2F%2Fgo.nihawiwa.com%2F0bnl&sa=D&33=70&usg=AFQjCNEUPijOi1LFtA_rg0rU0qfVGTKd6A <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-07 13:00:31', '2021-12-07 13:00:31'),
(109, 'Eddiewrino', 'brunolanderos@epost.de', '88985729187', 'Anfangen zu verdienen von 143000 EUR pro Tag', 'Anfangen zu verdienen Vor 123000 EUR in der Woche >>>>>>>>>>>>>>>>>>>>>>>>>>> http://www.google.com/url?q=http%3A%2F%2Fgo.nihawiwa.com%2F0bnl&sa=D&33=70&usg=AFQjCNEUPijOi1LFtA_rg0rU0qfVGTKd6A <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-07 13:00:35', '2021-12-07 13:00:35'),
(110, 'Eddiewrino', 'philip@philsdentureclinic.com.au', '88934229369', 'Register, press one button and get passive income from $ 8887 in a day', 'Income from one investment more $ 8755 in a day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8Prmu&sa=D&80=98&usg=AFQjCNH_EGwAiiB8MpWHxZlE1C27oj3Rvw <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-09 04:25:28', '2021-12-09 04:25:28'),
(111, 'Eddiewrino', 'philip@philsdentureclinic.com.au', '82543641346', 'Register, press one button and get passive income from $ 8887 in a day', 'Income from one investment more $ 8755 in a day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8Prmu&sa=D&80=98&usg=AFQjCNH_EGwAiiB8MpWHxZlE1C27oj3Rvw <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-09 04:25:30', '2021-12-09 04:25:30'),
(112, 'Eddiewrino', 'philip@philsdentureclinic.com.au', '81535178725', 'Register, press one button and get passive income from $ 8887 in a day', 'Income from one investment more $ 8755 in a day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8Prmu&sa=D&80=98&usg=AFQjCNH_EGwAiiB8MpWHxZlE1C27oj3Rvw <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-09 04:25:32', '2021-12-09 04:25:32'),
(113, 'Eddiewrino', 'philip@philsdentureclinic.com.au', '81418329392', 'Register, press one button and get passive income from $ 8887 in a day', 'Income from one investment more $ 8755 in a day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8Prmu&sa=D&80=98&usg=AFQjCNH_EGwAiiB8MpWHxZlE1C27oj3Rvw <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-09 04:25:33', '2021-12-09 04:25:33'),
(114, 'Eddiewrino', 'philip@philsdentureclinic.com.au', '84531449249', 'Register, press one button and get passive income from $ 8887 in a day', 'Income from one investment more $ 8755 in a day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8Prmu&sa=D&80=98&usg=AFQjCNH_EGwAiiB8MpWHxZlE1C27oj3Rvw <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-09 04:25:35', '2021-12-09 04:25:35'),
(115, 'Les Jacobs', 'lolitawinfree070@gmail.com', '88983758789', 'Donation', 'Hello Beloved \r\n \r\nCan you devote your time to run a humanitarian charity project in helping the needy and less privileged people around your community ? please reply to Mr Les:   Lesscaddingl@gmail.com', '2021-12-09 05:27:20', '2021-12-09 05:27:20'),
(116, 'Eddiewrino', 'sheranir@hotmail.nl', '83257728885', 'Bitcoin Miiliarder told how he makes money more $ 8887 in a day', 'Fast income from one investment from $ 7768 per day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8Prmu&sa=D&29=96&usg=AFQjCNH_EGwAiiB8MpWHxZlE1C27oj3Rvw <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-10 04:10:56', '2021-12-10 04:10:56'),
(117, 'Eddiewrino', 'sheranir@hotmail.nl', '84186243896', 'Bitcoin Miiliarder told how he makes money more $ 8887 in a day', 'Fast income from one investment from $ 7768 per day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8Prmu&sa=D&29=96&usg=AFQjCNH_EGwAiiB8MpWHxZlE1C27oj3Rvw <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-10 04:10:59', '2021-12-10 04:10:59'),
(118, 'Eddiewrino', 'sheranir@hotmail.nl', '84822951216', 'Bitcoin Miiliarder told how he makes money more $ 8887 in a day', 'Fast income from one investment from $ 7768 per day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8Prmu&sa=D&29=96&usg=AFQjCNH_EGwAiiB8MpWHxZlE1C27oj3Rvw <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-10 04:11:00', '2021-12-10 04:11:00'),
(119, 'Eddiewrino', 'sheranir@hotmail.nl', '87436697547', 'Bitcoin Miiliarder told how he makes money more $ 8887 in a day', 'Fast income from one investment from $ 7768 per day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8Prmu&sa=D&29=96&usg=AFQjCNH_EGwAiiB8MpWHxZlE1C27oj3Rvw <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-10 04:11:02', '2021-12-10 04:11:02'),
(120, 'Eddiewrino', 'sheranir@hotmail.nl', '82161294167', 'Bitcoin Miiliarder told how he makes money more $ 8887 in a day', 'Fast income from one investment from $ 7768 per day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8Prmu&sa=D&29=96&usg=AFQjCNH_EGwAiiB8MpWHxZlE1C27oj3Rvw <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-10 04:11:04', '2021-12-10 04:11:04'),
(121, 'Eddiewrino', 'j.g.m.h.huiskamp@tue.nl', '85989989835', 'Bitcoin Miiliarder told how he makes money more $ 6975 per day', 'Make Artificial Intelligence bring you from $ 9757 in a day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8Prmu&sa=D&52=57&usg=AFQjCNH_EGwAiiB8MpWHxZlE1C27oj3Rvw <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-10 23:17:18', '2021-12-10 23:17:18'),
(122, 'Eddiewrino', 'j.g.m.h.huiskamp@tue.nl', '86381623599', 'Bitcoin Miiliarder told how he makes money more $ 6975 per day', 'Make Artificial Intelligence bring you from $ 9757 in a day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8Prmu&sa=D&52=57&usg=AFQjCNH_EGwAiiB8MpWHxZlE1C27oj3Rvw <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-10 23:17:20', '2021-12-10 23:17:20'),
(123, 'Eddiewrino', 'j.g.m.h.huiskamp@tue.nl', '85252957544', 'Bitcoin Miiliarder told how he makes money more $ 6975 per day', 'Make Artificial Intelligence bring you from $ 9757 in a day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8Prmu&sa=D&52=57&usg=AFQjCNH_EGwAiiB8MpWHxZlE1C27oj3Rvw <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-10 23:17:22', '2021-12-10 23:17:22'),
(124, 'Eddiewrino', 'j.g.m.h.huiskamp@tue.nl', '85984317624', 'Bitcoin Miiliarder told how he makes money more $ 6975 per day', 'Make Artificial Intelligence bring you from $ 9757 in a day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8Prmu&sa=D&52=57&usg=AFQjCNH_EGwAiiB8MpWHxZlE1C27oj3Rvw <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-10 23:17:24', '2021-12-10 23:17:24'),
(125, 'Eddiewrino', 'j.g.m.h.huiskamp@tue.nl', '86374746361', 'Bitcoin Miiliarder told how he makes money more $ 6975 per day', 'Make Artificial Intelligence bring you from $ 9757 in a day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8Prmu&sa=D&52=57&usg=AFQjCNH_EGwAiiB8MpWHxZlE1C27oj3Rvw <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-10 23:17:26', '2021-12-10 23:17:26'),
(126, 'Eddiewrino', 'maduwe@bernadetteschool.nl', '89578177384', 'Confessions of a Bitcoin billionaire or passive income more $ 5989 in a day', 'Income from one investment from $ 9585 per day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8Prmu&sa=D&50=19&usg=AFQjCNH_EGwAiiB8MpWHxZlE1C27oj3Rvw <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-12 21:17:33', '2021-12-12 21:17:33'),
(127, 'Eddiewrino', 'maduwe@bernadetteschool.nl', '85796434892', 'Confessions of a Bitcoin billionaire or passive income more $ 5989 in a day', 'Income from one investment from $ 9585 per day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8Prmu&sa=D&50=19&usg=AFQjCNH_EGwAiiB8MpWHxZlE1C27oj3Rvw <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-12 21:17:35', '2021-12-12 21:17:35'),
(128, 'Eddiewrino', 'maduwe@bernadetteschool.nl', '81936472939', 'Confessions of a Bitcoin billionaire or passive income more $ 5989 in a day', 'Income from one investment from $ 9585 per day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8Prmu&sa=D&50=19&usg=AFQjCNH_EGwAiiB8MpWHxZlE1C27oj3Rvw <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-12 21:17:37', '2021-12-12 21:17:37'),
(129, 'Eddiewrino', 'maduwe@bernadetteschool.nl', '85994628147', 'Confessions of a Bitcoin billionaire or passive income more $ 5989 in a day', 'Income from one investment from $ 9585 per day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8Prmu&sa=D&50=19&usg=AFQjCNH_EGwAiiB8MpWHxZlE1C27oj3Rvw <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-12 21:17:39', '2021-12-12 21:17:39'),
(130, 'Eddiewrino', 'maduwe@bernadetteschool.nl', '85831229518', 'Confessions of a Bitcoin billionaire or passive income more $ 5989 in a day', 'Income from one investment from $ 9585 per day >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc8Prmu&sa=D&50=19&usg=AFQjCNH_EGwAiiB8MpWHxZlE1C27oj3Rvw <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-12 21:17:41', '2021-12-12 21:17:41'),
(131, 'Mike Walker', 'no-replystype@gmail.com', '85394898182', 'Get more dofollow backlinks for subbisky.com', 'Hello \r\n \r\nWe all know the importance that dofollow link have on any website`s ranks. \r\nHaving most of your linkbase filled with nofollow ones is of no good for your ranks and SEO metrics. \r\n \r\nBuy quality dofollow links from us, that will impact your ranks in a positive way \r\nhttps://www.digital-x-press.com/product/150-dofollow-backlinks/ \r\n \r\nBest regards \r\nMike Walker\r\n \r\nsupport@digital-x-press.com', '2021-12-13 01:54:03', '2021-12-13 01:54:03'),
(132, 'Donald Cole', 'lanj7962@gmail.com', '86946688946', 'Partnership', 'Good day \r\n \r\nI contacted you some days back seeking your cooperation in a matter regarding funds worth $24 Million, I urge you to get back to me through this email coledd11@cloedcolela.com if you\'re still interested. \r\n \r\nI await your response. \r\n \r\nThanks, \r\n \r\nDonald Cole', '2021-12-13 17:05:07', '2021-12-13 17:05:07'),
(133, 'Eddiewrino', 'patty.123@live.nl', '87116861723', 'Launch Artificial Intelligence with one button and earn more $ 6858 in a day', 'Change your life and get passive income more $ 5565 in a day >>>>>>>>>>>>>>>>>>>>>>>>>>> http://www.google.com/url?q=http%3A%2F%2Fgestyy.com%2Fep9CR9&sa=D&10=52&usg=AFQjCNHxHb5q4cvsPaKvJfESagxfB_AFOw <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-14 07:46:26', '2021-12-14 07:46:26'),
(134, 'Eddiewrino', 'patty.123@live.nl', '83816887572', 'Launch Artificial Intelligence with one button and earn more $ 6858 in a day', 'Change your life and get passive income more $ 5565 in a day >>>>>>>>>>>>>>>>>>>>>>>>>>> http://www.google.com/url?q=http%3A%2F%2Fgestyy.com%2Fep9CR9&sa=D&10=52&usg=AFQjCNHxHb5q4cvsPaKvJfESagxfB_AFOw <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-14 07:46:29', '2021-12-14 07:46:29'),
(135, 'Eddiewrino', 'patty.123@live.nl', '85453567631', 'Launch Artificial Intelligence with one button and earn more $ 6858 in a day', 'Change your life and get passive income more $ 5565 in a day >>>>>>>>>>>>>>>>>>>>>>>>>>> http://www.google.com/url?q=http%3A%2F%2Fgestyy.com%2Fep9CR9&sa=D&10=52&usg=AFQjCNHxHb5q4cvsPaKvJfESagxfB_AFOw <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-14 07:46:34', '2021-12-14 07:46:34'),
(136, 'Eddiewrino', 'patty.123@live.nl', '88327847966', 'Launch Artificial Intelligence with one button and earn more $ 6858 in a day', 'Change your life and get passive income more $ 5565 in a day >>>>>>>>>>>>>>>>>>>>>>>>>>> http://www.google.com/url?q=http%3A%2F%2Fgestyy.com%2Fep9CR9&sa=D&10=52&usg=AFQjCNHxHb5q4cvsPaKvJfESagxfB_AFOw <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-14 07:46:37', '2021-12-14 07:46:37'),
(137, 'Eddiewrino', 'patty.123@live.nl', '85766179359', 'Launch Artificial Intelligence with one button and earn more $ 6858 in a day', 'Change your life and get passive income more $ 5565 in a day >>>>>>>>>>>>>>>>>>>>>>>>>>> http://www.google.com/url?q=http%3A%2F%2Fgestyy.com%2Fep9CR9&sa=D&10=52&usg=AFQjCNHxHb5q4cvsPaKvJfESagxfB_AFOw <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-14 07:46:42', '2021-12-14 07:46:42'),
(138, 'Eddiewrino', 'b132077@atlascollege.nl', '82617369243', 'Make Artificial Intelligence bring you more $ 7556 in a day', 'Register, press one button and get passive income from $ 7957 per day >>>>>>>>>>>>>>>>>>>>>>>>>>> http://www.google.com/url?q=http%3A%2F%2Fgo.nirulugo.com%2F0bnl&sa=D&47=14&usg=AFQjCNErknOO8eaNhDQCQiKaUi6wsp9KfA <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-14 23:45:48', '2021-12-14 23:45:48'),
(139, 'Eddiewrino', 'b132077@atlascollege.nl', '81498239526', 'Make Artificial Intelligence bring you more $ 7556 in a day', 'Register, press one button and get passive income from $ 7957 per day >>>>>>>>>>>>>>>>>>>>>>>>>>> http://www.google.com/url?q=http%3A%2F%2Fgo.nirulugo.com%2F0bnl&sa=D&47=14&usg=AFQjCNErknOO8eaNhDQCQiKaUi6wsp9KfA <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-14 23:45:50', '2021-12-14 23:45:50'),
(140, 'Eddiewrino', 'b132077@atlascollege.nl', '82747294479', 'Make Artificial Intelligence bring you more $ 7556 in a day', 'Register, press one button and get passive income from $ 7957 per day >>>>>>>>>>>>>>>>>>>>>>>>>>> http://www.google.com/url?q=http%3A%2F%2Fgo.nirulugo.com%2F0bnl&sa=D&47=14&usg=AFQjCNErknOO8eaNhDQCQiKaUi6wsp9KfA <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-14 23:45:51', '2021-12-14 23:45:51'),
(141, 'Eddiewrino', 'b132077@atlascollege.nl', '88595226512', 'Make Artificial Intelligence bring you more $ 7556 in a day', 'Register, press one button and get passive income from $ 7957 per day >>>>>>>>>>>>>>>>>>>>>>>>>>> http://www.google.com/url?q=http%3A%2F%2Fgo.nirulugo.com%2F0bnl&sa=D&47=14&usg=AFQjCNErknOO8eaNhDQCQiKaUi6wsp9KfA <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-14 23:45:54', '2021-12-14 23:45:54'),
(142, 'Eddiewrino', 'b132077@atlascollege.nl', '83593889893', 'Make Artificial Intelligence bring you more $ 7556 in a day', 'Register, press one button and get passive income from $ 7957 per day >>>>>>>>>>>>>>>>>>>>>>>>>>> http://www.google.com/url?q=http%3A%2F%2Fgo.nirulugo.com%2F0bnl&sa=D&47=14&usg=AFQjCNErknOO8eaNhDQCQiKaUi6wsp9KfA <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-14 23:45:56', '2021-12-14 23:45:56'),
(143, 'Eddiewrino', 'car-area@web.de', '84632573119', 'Bitcoin Miiliarder told how he makes money from $ 6596 in a day', 'Fast income from one investment more $ 9797 in a day >>>>>>>>>>>>>>>>>>>>>>>>>>> http://www.google.com/url?q=http%3A%2F%2Fgo.nirulugo.com%2F0bnl&sa=D&86=35&usg=AFQjCNErknOO8eaNhDQCQiKaUi6wsp9KfA <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-16 02:03:54', '2021-12-16 02:03:54'),
(144, 'Eddiewrino', 'car-area@web.de', '84467456555', 'Bitcoin Miiliarder told how he makes money from $ 6596 in a day', 'Fast income from one investment more $ 9797 in a day >>>>>>>>>>>>>>>>>>>>>>>>>>> http://www.google.com/url?q=http%3A%2F%2Fgo.nirulugo.com%2F0bnl&sa=D&86=35&usg=AFQjCNErknOO8eaNhDQCQiKaUi6wsp9KfA <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-16 02:03:56', '2021-12-16 02:03:56'),
(145, 'Eddiewrino', 'car-area@web.de', '85435677999', 'Bitcoin Miiliarder told how he makes money from $ 6596 in a day', 'Fast income from one investment more $ 9797 in a day >>>>>>>>>>>>>>>>>>>>>>>>>>> http://www.google.com/url?q=http%3A%2F%2Fgo.nirulugo.com%2F0bnl&sa=D&86=35&usg=AFQjCNErknOO8eaNhDQCQiKaUi6wsp9KfA <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-16 02:03:57', '2021-12-16 02:03:57'),
(146, 'Eddiewrino', 'car-area@web.de', '82596822354', 'Bitcoin Miiliarder told how he makes money from $ 6596 in a day', 'Fast income from one investment more $ 9797 in a day >>>>>>>>>>>>>>>>>>>>>>>>>>> http://www.google.com/url?q=http%3A%2F%2Fgo.nirulugo.com%2F0bnl&sa=D&86=35&usg=AFQjCNErknOO8eaNhDQCQiKaUi6wsp9KfA <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-16 02:04:00', '2021-12-16 02:04:00'),
(147, 'Eddiewrino', 'car-area@web.de', '88189355837', 'Bitcoin Miiliarder told how he makes money from $ 6596 in a day', 'Fast income from one investment more $ 9797 in a day >>>>>>>>>>>>>>>>>>>>>>>>>>> http://www.google.com/url?q=http%3A%2F%2Fgo.nirulugo.com%2F0bnl&sa=D&86=35&usg=AFQjCNErknOO8eaNhDQCQiKaUi6wsp9KfA <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-16 02:04:02', '2021-12-16 02:04:02'),
(148, 'Kelli Gilmore', 'kelli.gilmore@gmail.com', '06-98775778', 'Hi , \r\n\r\nI don’t need to tell you how important it is to optimize every step in your SEO pipeline. \r\n\r\nBut unfortunately, it’s nearly impossible to cut out time or money when it comes to getting good content.\r\n\r\nAt least that’s what I thought until I came across Article Forge...\r\n\r\nBuilt by a team of AI researchers from MIT, Carnegie Mellon, Harvard, Article Forge is an artificial intelligence (AI) powered content writer that uses deep learning models to write entire articles about any topic in less than 60 seconds.\r\n\r\nTheir team trained AI models on millions of articles to teach Article Forge how to draw connections between topics so that each article it writes is relevant, interesting and useful.\r\n\r\nAll their hard work means you just enter a few keywords and Article Forge will write a complete article from scratch making sure every thought flows naturally into the next, resulting in readable, high quality, and unique content.\r\n\r\nPut simply, this is a secret weapon for anyone who needs content.\r\n\r\nI get how impossible that sounds so you need to see how Article Forge writes a complete article in less than 60 seconds! =>> https://myarticleforge.blogspot.com/\r\n\r\nI had to share this with you because I know this will be a game changer for your business.\r\n\r\nIf you’re writing your own content, Article Forge can take a long and difficult process and turn it into a single button click. \r\n\r\nIf you’re buying content, Article Forge’s flat fee, unlimited articles, and 60 second turnaround will be cheaper and faster than any other content provider. \r\n\r\nEither way, Article Forge will help you take your content creation process to the next level.\r\n\r\nMore importantly, Article Forge offers a free 5-day trial so you can see for yourself how this technology will revolutionize your content pipeline for your niche and your use case. \r\n\r\nSo what are you waiting for? Click here to get your 5-day Free Trial and start generating unlimited unique content =>> https://myarticleforge.blogspot.com/\r\n\r\nAnd make sure to thank me later when this tool has changed the way you create content :)\r\n\r\nBrahma.', 'Hi , \r\n\r\nI don’t need to tell you how important it is to optimize every step in your SEO pipeline. \r\n\r\nBut unfortunately, it’s nearly impossible to cut out time or money when it comes to getting good content.\r\n\r\nAt least that’s what I thought until I came across Article Forge...\r\n\r\nBuilt by a team of AI researchers from MIT, Carnegie Mellon, Harvard, Article Forge is an artificial intelligence (AI) powered content writer that uses deep learning models to write entire articles about any topic in less than 60 seconds.\r\n\r\nTheir team trained AI models on millions of articles to teach Article Forge how to draw connections between topics so that each article it writes is relevant, interesting and useful.\r\n\r\nAll their hard work means you just enter a few keywords and Article Forge will write a complete article from scratch making sure every thought flows naturally into the next, resulting in readable, high quality, and unique content.\r\n\r\nPut simply, this is a secret weapon for anyone who needs content.\r\n\r\nI get how impossible that sounds so you need to see how Article Forge writes a complete article in less than 60 seconds! =>> https://myarticleforge.blogspot.com/\r\n\r\nI had to share this with you because I know this will be a game changer for your business.\r\n\r\nIf you’re writing your own content, Article Forge can take a long and difficult process and turn it into a single button click. \r\n\r\nIf you’re buying content, Article Forge’s flat fee, unlimited articles, and 60 second turnaround will be cheaper and faster than any other content provider. \r\n\r\nEither way, Article Forge will help you take your content creation process to the next level.\r\n\r\nMore importantly, Article Forge offers a free 5-day trial so you can see for yourself how this technology will revolutionize your content pipeline for your niche and your use case. \r\n\r\nSo what are you waiting for? Click here to get your 5-day Free Trial and start generating unlimited unique content =>> https://myarticleforge.blogspot.com/\r\n\r\nAnd make sure to thank me later when this tool has changed the way you create content :)\r\n\r\nBrahma.', '2021-12-19 15:23:04', '2021-12-19 15:23:04'),
(149, 'Eddiewrino', 'a-l-u-s-h-o-u-s-u-t@web.de', '85138129365', 'Verdienste Vor 14500 EUR in der Woche', 'Deine Freunde verdienen bereits von 13400 EUR pro Tag >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc9jD1p&sa=D&72=01&usg=AFQjCNE5-l7dYtpQNDLSz9x2TTehrGGJ2w <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-21 00:51:52', '2021-12-21 00:51:52'),
(150, 'Eddiewrino', 'a-l-u-s-h-o-u-s-u-t@web.de', '87142252527', 'Verdienste Vor 14500 EUR in der Woche', 'Deine Freunde verdienen bereits von 13400 EUR pro Tag >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc9jD1p&sa=D&72=01&usg=AFQjCNE5-l7dYtpQNDLSz9x2TTehrGGJ2w <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-21 00:51:54', '2021-12-21 00:51:54'),
(151, 'Eddiewrino', 'a-l-u-s-h-o-u-s-u-t@web.de', '88641338897', 'Verdienste Vor 14500 EUR in der Woche', 'Deine Freunde verdienen bereits von 13400 EUR pro Tag >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc9jD1p&sa=D&72=01&usg=AFQjCNE5-l7dYtpQNDLSz9x2TTehrGGJ2w <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-21 00:51:56', '2021-12-21 00:51:56'),
(152, 'Eddiewrino', 'a-l-u-s-h-o-u-s-u-t@web.de', '85379841842', 'Verdienste Vor 14500 EUR in der Woche', 'Deine Freunde verdienen bereits von 13400 EUR pro Tag >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc9jD1p&sa=D&72=01&usg=AFQjCNE5-l7dYtpQNDLSz9x2TTehrGGJ2w <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-21 00:52:00', '2021-12-21 00:52:00'),
(153, 'Eddiewrino', 'a-l-u-s-h-o-u-s-u-t@web.de', '86223166664', 'Verdienste Vor 14500 EUR in der Woche', 'Deine Freunde verdienen bereits von 13400 EUR pro Tag >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc9jD1p&sa=D&72=01&usg=AFQjCNE5-l7dYtpQNDLSz9x2TTehrGGJ2w <<<<<<<<<<<<<<<<<<<<<<<<', '2021-12-21 00:52:02', '2021-12-21 00:52:02'),
(154, 'Charlieprupt', 'alliance.engineers.2005@yahoo.co.uk', '82267488423', '?#%- Gains rapides a partir de 1500 EUR par semaine \"%;(', 'Bonjour. \r\nSi vous etes interesse par ce type de revenus, sachez que des investissements de 500 EUR sont necessaires ici une fois. \r\nDe plus, vous recevrez a partir de 1500 EUR par semaine (@?% \r\n>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc9jD1p&sa=D&22=80&usg=AFQjCNE5-l7dYtpQNDLSz9x2TTehrGGJ2w <<<<< \r\nL\'essence du gain est de generer des revenus en negociant des crypto-monnaies en mode automatique, meme si tous les marches s\'effondrent, vous serez assure de recevoir votre argent a partir de 1500 EUR par semaine. \r\nArrangez-vous pour prendre place au soleil et inscrivez-vous %_?= \r\nOffre limitee %=:^ \r\n>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc9jD1p&sa=D&21=23&usg=AFQjCNE5-l7dYtpQNDLSz9x2TTehrGGJ2w <<<<<', '2021-12-23 02:34:58', '2021-12-23 02:34:58'),
(155, 'Charlieprupt', 'alliance.engineers.2005@yahoo.co.uk', '81861132423', '?#%- Gains rapides a partir de 1500 EUR par semaine \"%;(', 'Bonjour. \r\nSi vous etes interesse par ce type de revenus, sachez que des investissements de 500 EUR sont necessaires ici une fois. \r\nDe plus, vous recevrez a partir de 1500 EUR par semaine (@?% \r\n>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc9jD1p&sa=D&22=80&usg=AFQjCNE5-l7dYtpQNDLSz9x2TTehrGGJ2w <<<<< \r\nL\'essence du gain est de generer des revenus en negociant des crypto-monnaies en mode automatique, meme si tous les marches s\'effondrent, vous serez assure de recevoir votre argent a partir de 1500 EUR par semaine. \r\nArrangez-vous pour prendre place au soleil et inscrivez-vous %_?= \r\nOffre limitee %=:^ \r\n>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc9jD1p&sa=D&21=23&usg=AFQjCNE5-l7dYtpQNDLSz9x2TTehrGGJ2w <<<<<', '2021-12-23 02:35:00', '2021-12-23 02:35:00'),
(156, 'Charlieprupt', 'alliance.engineers.2005@yahoo.co.uk', '88189541692', '?#%- Gains rapides a partir de 1500 EUR par semaine \"%;(', 'Bonjour. \r\nSi vous etes interesse par ce type de revenus, sachez que des investissements de 500 EUR sont necessaires ici une fois. \r\nDe plus, vous recevrez a partir de 1500 EUR par semaine (@?% \r\n>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc9jD1p&sa=D&22=80&usg=AFQjCNE5-l7dYtpQNDLSz9x2TTehrGGJ2w <<<<< \r\nL\'essence du gain est de generer des revenus en negociant des crypto-monnaies en mode automatique, meme si tous les marches s\'effondrent, vous serez assure de recevoir votre argent a partir de 1500 EUR par semaine. \r\nArrangez-vous pour prendre place au soleil et inscrivez-vous %_?= \r\nOffre limitee %=:^ \r\n>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc9jD1p&sa=D&21=23&usg=AFQjCNE5-l7dYtpQNDLSz9x2TTehrGGJ2w <<<<<', '2021-12-23 02:35:02', '2021-12-23 02:35:02'),
(157, 'Charlieprupt', 'alliance.engineers.2005@yahoo.co.uk', '89835858499', '?#%- Gains rapides a partir de 1500 EUR par semaine \"%;(', 'Bonjour. \r\nSi vous etes interesse par ce type de revenus, sachez que des investissements de 500 EUR sont necessaires ici une fois. \r\nDe plus, vous recevrez a partir de 1500 EUR par semaine (@?% \r\n>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc9jD1p&sa=D&22=80&usg=AFQjCNE5-l7dYtpQNDLSz9x2TTehrGGJ2w <<<<< \r\nL\'essence du gain est de generer des revenus en negociant des crypto-monnaies en mode automatique, meme si tous les marches s\'effondrent, vous serez assure de recevoir votre argent a partir de 1500 EUR par semaine. \r\nArrangez-vous pour prendre place au soleil et inscrivez-vous %_?= \r\nOffre limitee %=:^ \r\n>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc9jD1p&sa=D&21=23&usg=AFQjCNE5-l7dYtpQNDLSz9x2TTehrGGJ2w <<<<<', '2021-12-23 02:35:04', '2021-12-23 02:35:04'),
(158, 'Charlieprupt', 'alliance.engineers.2005@yahoo.co.uk', '81332253935', '?#%- Gains rapides a partir de 1500 EUR par semaine \"%;(', 'Bonjour. \r\nSi vous etes interesse par ce type de revenus, sachez que des investissements de 500 EUR sont necessaires ici une fois. \r\nDe plus, vous recevrez a partir de 1500 EUR par semaine (@?% \r\n>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc9jD1p&sa=D&22=80&usg=AFQjCNE5-l7dYtpQNDLSz9x2TTehrGGJ2w <<<<< \r\nL\'essence du gain est de generer des revenus en negociant des crypto-monnaies en mode automatique, meme si tous les marches s\'effondrent, vous serez assure de recevoir votre argent a partir de 1500 EUR par semaine. \r\nArrangez-vous pour prendre place au soleil et inscrivez-vous %_?= \r\nOffre limitee %=:^ \r\n>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fc9jD1p&sa=D&21=23&usg=AFQjCNE5-l7dYtpQNDLSz9x2TTehrGGJ2w <<<<<', '2021-12-23 02:35:06', '2021-12-23 02:35:06'),
(159, 'JAMES COOK', 'james_cook78@yahoo.com', '85456779638', 'Dear sir/ma \r\nWe are a finance and investment company offering loans at 3% interest rate. We will be happy to make a loan available to your organisation for your project. Our terms and conditions will apply. Our term sheet/loan agreement will be sent to you for review, when we hear from you. Please reply to this email ONLY cookj5939@gmail.com \r\n \r\nRegards. \r\nJames Cook \r\nChairman & CEO Euro Finance & Commercial Ltd', 'Dear sir/ma \r\nWe are a finance and investment company offering loans at 3% interest rate. We will be happy to make a loan available to your organisation for your project. Our terms and conditions will apply. Our term sheet/loan agreement will be sent to you for review, when we hear from you. Please reply to this email ONLY cookj5939@gmail.com \r\n \r\nRegards. \r\nJames Cook \r\nChairman & CEO Euro Finance & Commercial Ltd', '2021-12-29 20:53:16', '2021-12-29 20:53:16');
INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(160, 'Miranda McLendon', 'mclendon.miranda96@googlemail.com', '0497 93 17 53', 'STOP Trying To Do Everything Yourself,\r\nClone Our $100k PROVEN Affiliate Campaigns\r\n\r\n\r\n=> https://dcas.bizoppsguide.com?traffic_source=cf&cost=0.0\r\n\r\n\r\nWith Everything, Preloaded Into This 3-In-1\r\nDFY Sales, Traffic & Website App\r\n\r\n\r\n=> https://dcas.bizoppsguide.com?traffic_source=cf&cost=0.0', 'STOP Trying To Do Everything Yourself,\r\nClone Our $100k PROVEN Affiliate Campaigns\r\n\r\n\r\n=> https://dcas.bizoppsguide.com?traffic_source=cf&cost=0.0\r\n\r\n\r\nWith Everything, Preloaded Into This 3-In-1\r\nDFY Sales, Traffic & Website App\r\n\r\n\r\n=> https://dcas.bizoppsguide.com?traffic_source=cf&cost=0.0', '2021-12-31 12:59:40', '2021-12-31 12:59:40'),
(161, 'test', 'abc@gmail.com', '1234567890', 'test', 'test', '2022-01-03 05:30:18', '2022-01-03 05:30:18'),
(162, 'dyeve', 'ybionga5@hotmail.com', '84669355377', 'I promised.', 'Hi, this is Anna. I am sending you my intimate photos as I promised. https://tinyurl.com/y3mm4yku', '2022-01-04 14:42:10', '2022-01-04 14:42:10'),
(163, 'dyeve', 'um677hs9@icloud.com', '87895432614', 'I promised.', 'Hi, this is Irina. I am sending you my intimate photos as I promised. https://tinyurl.com/y52de69l', '2022-01-05 08:13:26', '2022-01-05 08:13:26'),
(164, 'Luigi McCray', 'luigi.mccray73@googlemail.com', '441 7792', 'Hey,\r\n\r\nI\'m sure you\'re excited about the prospect of making $27 everytime you click \"Activate\". \r\n\r\nBut there\'s A LOT more to this than just that.\r\n\r\n������������ It takes less than ten minutes\r\n������������ It has NO monthly recurring fees. \r\n������������ It doesn\'t take up much space on your computer or phone either, so it doesn\'t really matter what device you use. \r\n\r\n>>  Find out more about this awesome software - https://overnightprofitsites.blogspot.com/\r\n\r\nYou don\'t need to work hard for your money. All you have to do is click \"Activate\" and we will do the rest!\r\n\r\n>> Get instant access now - https://overnightprofitsites.blogspot.com/\r\n\r\n\r\nI\'m writing because I believe you can make a lot of money with Overnight Profit Sites.\r\n\r\nOvernight Profit Sites is the groundbreaking new software that allows anyone to easily build their own online business. You don\'t need any experience or skills whatsoever - just follow the step-by-step tutorials and watch your profits grow automatically! \r\n\r\nIt\'s so easy - all you have to do is click \"Activate\" every day for 1 minute and you could be COMPOUNDING $27/day...with absolutely no hard work at all! \r\n\r\nThat doesn\'t even include our other bonuses.\r\n\r\nInterested?\r\n\r\n>> See this video of OvernightProfitSites in action here\r\n\r\n>> https://overnightprofitsites.blogspot.com/\r\n\r\n\r\nBrahma.', 'Hey,\r\n\r\nI\'m sure you\'re excited about the prospect of making $27 everytime you click \"Activate\". \r\n\r\nBut there\'s A LOT more to this than just that.\r\n\r\n������������ It takes less than ten minutes\r\n������������ It has NO monthly recurring fees. \r\n������������ It doesn\'t take up much space on your computer or phone either, so it doesn\'t really matter what device you use. \r\n\r\n>>  Find out more about this awesome software - https://overnightprofitsites.blogspot.com/\r\n\r\nYou don\'t need to work hard for your money. All you have to do is click \"Activate\" and we will do the rest!\r\n\r\n>> Get instant access now - https://overnightprofitsites.blogspot.com/\r\n\r\n\r\nI\'m writing because I believe you can make a lot of money with Overnight Profit Sites.\r\n\r\nOvernight Profit Sites is the groundbreaking new software that allows anyone to easily build their own online business. You don\'t need any experience or skills whatsoever - just follow the step-by-step tutorials and watch your profits grow automatically! \r\n\r\nIt\'s so easy - all you have to do is click \"Activate\" every day for 1 minute and you could be COMPOUNDING $27/day...with absolutely no hard work at all! \r\n\r\nThat doesn\'t even include our other bonuses.\r\n\r\nInterested?\r\n\r\n>> See this video of OvernightProfitSites in action here\r\n\r\n>> https://overnightprofitsites.blogspot.com/\r\n\r\n\r\nBrahma.', '2022-01-14 13:39:13', '2022-01-14 13:39:13'),
(165, 'Mike Harris', 'no-replystype@gmail.com', '87755214972', 'Get more dofollow backlinks for subbisky.com', 'Hello \r\n \r\nWe all know the importance that dofollow link have on any website`s ranks. \r\nHaving most of your linkbase filled with nofollow ones is of no good for your ranks and SEO metrics. \r\n \r\nBuy quality dofollow links from us, that will impact your ranks in a positive way \r\nhttps://www.digital-x-press.com/product/150-dofollow-backlinks/ \r\n \r\nBest regards \r\nMike Harris\r\n \r\nsupport@digital-x-press.com', '2022-01-15 02:38:29', '2022-01-15 02:38:29'),
(166, 'Eddiewrino', 'sebastiankahlert@t-online.de', '89586731159', 'Anfangen zu verdienen von 11500 EUR pro Tag', 'Deine Freunde verdienen bereits Vor 12200 EUR in der Woche >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fcaa7WZ&sa=D&47=47&usg=AFQjCNHeDhPmQ6da3c_t6uxfxm4yAdThqw <<<<<<<<<<<<<<<<<<<<<<<<', '2022-01-15 18:53:21', '2022-01-15 18:53:21'),
(167, 'Eddiewrino', 'sebastiankahlert@t-online.de', '86789179269', 'Anfangen zu verdienen von 11500 EUR pro Tag', 'Deine Freunde verdienen bereits Vor 12200 EUR in der Woche >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fcaa7WZ&sa=D&47=47&usg=AFQjCNHeDhPmQ6da3c_t6uxfxm4yAdThqw <<<<<<<<<<<<<<<<<<<<<<<<', '2022-01-15 18:53:27', '2022-01-15 18:53:27'),
(168, 'Eddiewrino', 'sebastiankahlert@t-online.de', '84866344865', 'Anfangen zu verdienen von 11500 EUR pro Tag', 'Deine Freunde verdienen bereits Vor 12200 EUR in der Woche >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fcaa7WZ&sa=D&47=47&usg=AFQjCNHeDhPmQ6da3c_t6uxfxm4yAdThqw <<<<<<<<<<<<<<<<<<<<<<<<', '2022-01-15 18:53:32', '2022-01-15 18:53:32'),
(169, 'Eddiewrino', 'sebastiankahlert@t-online.de', '83398981377', 'Anfangen zu verdienen von 11500 EUR pro Tag', 'Deine Freunde verdienen bereits Vor 12200 EUR in der Woche >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fcaa7WZ&sa=D&47=47&usg=AFQjCNHeDhPmQ6da3c_t6uxfxm4yAdThqw <<<<<<<<<<<<<<<<<<<<<<<<', '2022-01-15 18:53:36', '2022-01-15 18:53:36'),
(170, 'Eddiewrino', 'sebastiankahlert@t-online.de', '88646828261', 'Anfangen zu verdienen von 11500 EUR pro Tag', 'Deine Freunde verdienen bereits Vor 12200 EUR in der Woche >>>>>>>>>>>>>>>>>>>>>>>>>>> https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2Fcaa7WZ&sa=D&47=47&usg=AFQjCNHeDhPmQ6da3c_t6uxfxm4yAdThqw <<<<<<<<<<<<<<<<<<<<<<<<', '2022-01-15 18:53:50', '2022-01-15 18:53:50'),
(171, 'NataFek', 'woodthighgire1988@gmail.com', '83186889321', 'Hello Admin!', 'Hi. I\'m love sucks big dick. My profile here https://chicks-for-you.life/?u=41nkd08&o=8dhpkzk', '2022-01-19 22:12:12', '2022-01-19 22:12:12'),
(172, 'JazierDuG', 'zaveru@stromectoldc.com', '81275418934', 'Arouse with discount offensive valuation pharmacy', 'nakrutit ivermectin dogs\r\n rageland stromectol scabies dosage\r\n <a href=\"http://ivermectin-3mg.net/#\">ivermectin 12 mg pills\r\n</a> - pour on ivermectin\r\n [url=http://ivermectin-3mg.net/#]buy ivermectin 3 mg for humans\r\n[/url] vymahani stromectol users guide', '2022-01-24 02:41:07', '2022-01-24 02:41:07'),
(173, 'Clint Ludwig', 'clint.ludwig@gmail.com', '317-852-2992', 'Hi , \r\n\r\nGIVE ME FIVE MINUTES And I Will Show How You Can Generate Your First Paycheck Online!\r\n\r\n=>> https://digitals.bizoppsguide.com?traffic_source=cf&cost=0.0\r\n\r\n\r\nCreate Seven Figures Campaigns, Connect With Free Traffic, Send Follow-Up Series, Track Links, Generate Leads And Sales on Autopilot With No Monthly Fees\r\n\r\n=>> https://digitals.bizoppsguide.com?traffic_source=cf&cost=0.0\r\n\r\n\r\n\r\nYou can Copy/Paste These Winning Campaigns Used By 7-Figure Marketers \r\nTo Generate 24/7 Affiliate Income From DFY Offers\r\n\r\n=>> https://digitals.bizoppsguide.com?traffic_source=cf&cost=0.0\r\n\r\n\r\nBrahma.', 'Hi , \r\n\r\nGIVE ME FIVE MINUTES And I Will Show How You Can Generate Your First Paycheck Online!\r\n\r\n=>> https://digitals.bizoppsguide.com?traffic_source=cf&cost=0.0\r\n\r\n\r\nCreate Seven Figures Campaigns, Connect With Free Traffic, Send Follow-Up Series, Track Links, Generate Leads And Sales on Autopilot With No Monthly Fees\r\n\r\n=>> https://digitals.bizoppsguide.com?traffic_source=cf&cost=0.0\r\n\r\n\r\n\r\nYou can Copy/Paste These Winning Campaigns Used By 7-Figure Marketers \r\nTo Generate 24/7 Affiliate Income From DFY Offers\r\n\r\n=>> https://digitals.bizoppsguide.com?traffic_source=cf&cost=0.0\r\n\r\n\r\nBrahma.', '2022-01-25 16:17:02', '2022-01-25 16:17:02'),
(174, 'dyeve', 's3ud3zbu@yahoo.com', '83216166518', 'I promised.', 'Hi, this is Julia. I am sending you my intimate photos as I promised. https://tinyurl.com/y72xl9n8', '2022-01-27 00:54:01', '2022-01-27 00:54:01'),
(175, 'Steve Watson', 'steve@explainervideos4u.info', '078 4938 0361', '%file-C:\\Users\\Administrator\\Desktop\\ExplainVid Replies\\gsa-messages%', '%file-C:\\Users\\Administrator\\Desktop\\ExplainVid Replies\\gsa-messages%', '2022-02-04 06:55:49', '2022-02-04 06:55:49'),
(176, 'Login', 'elmira.razuvaeva.81@list.ru', '83961471151', 'Выплата 75 943 р', 'Прихoд 84 138 p  \r\nПодробнее по ссылке: https://forms.yandex.ru/u/610fe0c0a7a9d9645645/success/26984?AAAAAsubbisky.comBBBBB', '2022-02-11 05:42:12', '2022-02-11 05:42:12'),
(177, 'Mike Barrington', 'no-replystype@gmail.com', '82532843622', 'Get more dofollow backlinks for subbisky.com', 'Hello \r\n \r\nWe all know the importance that dofollow link have on any website`s ranks. \r\nHaving most of your linkbase filled with nofollow ones is of no good for your ranks and SEO metrics. \r\n \r\nBuy quality dofollow links from us, that will impact your ranks in a positive way \r\nhttps://www.digital-x-press.com/product/150-dofollow-backlinks/ \r\n \r\nBest regards \r\nMike Barrington\r\n \r\nsupport@digital-x-press.com', '2022-02-12 02:02:59', '2022-02-12 02:02:59'),
(178, 'dyeve', 'g23b2c0o@yahoo.com', '83317426267', 'I promised.', 'Hi, this is Julia. I am sending you my intimate photos as I promised. https://tinyurl.com/y77egq6a', '2022-02-12 07:29:39', '2022-02-12 07:29:39'),
(179, 'Mithun SharmaQ', 'seo@promote-website.com', '707 706 0205', 'Re: Get Your Website On Google Searches', 'Hi,\r\nWe are an India-based SEM & Web Development company. We are a team of 100+ IT professionals with expertise in:\r\nSearch Engine Marketing:\r\n1.      Keyword Research & Analysis\r\n2.      Web Competition Research & Analysis\r\n3.      On-page SEO\r\n4.      Off-page SEO                                                                  \r\n5.      Local SEO\r\n6.      Content Marketing\r\n7.      Backlinks Acquisition\r\nWe\'d be happy to send you  WEBSITE AUDIT REPORT our PRICING & PACKAGES details if you\'d like to assess our work.\r\nLooking forward to hearing from you.\r\nWarm Regards,\r\nMITHUN SHARMA', '2022-02-14 05:39:50', '2022-02-14 05:39:50'),
(180, 'dyeve', '31vbr12i@icloud.com', '85978559478', 'I promised.', 'Hi, this is Jenny. I am sending you my intimate photos as I promised. https://tinyurl.com/y9n9jscz', '2022-02-14 21:36:41', '2022-02-14 21:36:41'),
(181, 'Larry Roesch', 'larry.roesch@gmail.com', '05.89.03.40.71', 'Hi,\r\n\r\nIf you\'re struggling with getting \r\nyour affiliate site off the ground, \r\ncheck this out:\r\n\r\n=> https://videositesfullyautomaticmoney.blogspot.com/\r\n\r\nThis is a brand-new WordPress Premade Sites \r\nthat will help you automatically create \r\nmoney-making video sites with fresh \r\ntraffic-pulling content.\r\n\r\nYou can fill your site with hundreds\r\nof new videos every week on any topic\r\nand in any niche that you wish.\r\n\r\nThe content comes from top video platforms:\r\nYouTube, Vimeo and Dailymotion.\r\n\r\nAnd in addition to generating content,\r\nthe Sites also lets you add relevant\r\naffiliate products from Amazon and eBay,\r\nvideo ads and banners. \r\n\r\nThe price is going up fast. Go check it out\r\nand download the Premade Sites here:\r\n\r\n=> https://videositesfullyautomaticmoney.blogspot.com/\r\n\r\nRegards,\r\nBrahma', 'Hi,\r\n\r\nIf you\'re struggling with getting \r\nyour affiliate site off the ground, \r\ncheck this out:\r\n\r\n=> https://videositesfullyautomaticmoney.blogspot.com/\r\n\r\nThis is a brand-new WordPress Premade Sites \r\nthat will help you automatically create \r\nmoney-making video sites with fresh \r\ntraffic-pulling content.\r\n\r\nYou can fill your site with hundreds\r\nof new videos every week on any topic\r\nand in any niche that you wish.\r\n\r\nThe content comes from top video platforms:\r\nYouTube, Vimeo and Dailymotion.\r\n\r\nAnd in addition to generating content,\r\nthe Sites also lets you add relevant\r\naffiliate products from Amazon and eBay,\r\nvideo ads and banners. \r\n\r\nThe price is going up fast. Go check it out\r\nand download the Premade Sites here:\r\n\r\n=> https://videositesfullyautomaticmoney.blogspot.com/\r\n\r\nRegards,\r\nBrahma', '2022-02-16 14:41:23', '2022-02-16 14:41:23'),
(182, 'Michaelundum', 'gloriawifkinson71@gmail.com', '88854282629', 'Look this teen video on free porn tube', 'The largest free porn tube in the world present [url=https://www.teenfreshporn.com/]teen porn clips[/url] videos in HD, 4K on desktop or mobile.', '2022-02-16 16:23:06', '2022-02-16 16:23:06'),
(183, 'Eric Jones', 'eric.jones.z.mail@gmail.com', '555-555-1212', 'Hey there, I just found your site, quick question…\r\n\r\nMy name’s Eric, I found subbisky.com after doing a quick search – you showed up near the top of the rankings, so whatever you’re doing for SEO, looks like it’s working well.\r\n\r\nSo here’s my question – what happens AFTER someone lands on your site?  Anything?\r\n\r\nResearch tells us at least 70% of the people who find your site, after a quick once-over, they disappear… forever.\r\n\r\nThat means that all the work and effort you put into getting them to show up, goes down the tubes.\r\n\r\nWhy would you want all that good work – and the great site you’ve built – go to waste?\r\n\r\nBecause the odds are they’ll just skip over calling or even grabbing their phone, leaving you high and dry.\r\n\r\nBut here’s a thought… what if you could make it super-simple for someone to raise their hand, say, “okay, let’s talk” without requiring them to even pull their cell phone from their pocket?\r\n  \r\nYou can – thanks to revolutionary new software that can literally make that first call happen NOW.\r\n\r\nTalk With Web Visitor is a software widget that sits on your site, ready and waiting to capture any visitor’s Name, Email address and Phone Number.  It lets you know IMMEDIATELY – so that you can talk to that lead while they’re still there at your site.\r\n  \r\nYou know, strike when the iron’s hot!\r\n\r\nCLICK HERE https://jumboleadmagnet.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nWhen targeting leads, you HAVE to act fast – the difference between contacting someone within 5 minutes versus 30 minutes later is huge – like 100 times better!\r\n\r\nThat’s why you should check out our new SMS Text With Lead feature as well… once you’ve captured the phone number of the website visitor, you can automatically kick off a text message (SMS) conversation with them. \r\n \r\nImagine how powerful this could be – even if they don’t take you up on your offer immediately, you can stay in touch with them using text messages to make new offers, provide links to great content, and build your credibility.\r\n\r\nJust this alone could be a game changer to make your website even more effective.\r\n\r\nStrike when  the iron’s hot!\r\n\r\nCLICK HERE https://jumboleadmagnet.com to learn more about everything Talk With Web Visitor can do for your business – you’ll be amazed.\r\n\r\nThanks and keep up the great work!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – you could be converting up to 100x more leads immediately!   \r\nIt even includes International Long Distance Calling. \r\nStop wasting money chasing eyeballs that don’t turn into paying customers. \r\nCLICK HERE https://jumboleadmagnet.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://jumboleadmagnet.com/unsubscribe.aspx?d=subbisky.com', 'Hey there, I just found your site, quick question…\r\n\r\nMy name’s Eric, I found subbisky.com after doing a quick search – you showed up near the top of the rankings, so whatever you’re doing for SEO, looks like it’s working well.\r\n\r\nSo here’s my question – what happens AFTER someone lands on your site?  Anything?\r\n\r\nResearch tells us at least 70% of the people who find your site, after a quick once-over, they disappear… forever.\r\n\r\nThat means that all the work and effort you put into getting them to show up, goes down the tubes.\r\n\r\nWhy would you want all that good work – and the great site you’ve built – go to waste?\r\n\r\nBecause the odds are they’ll just skip over calling or even grabbing their phone, leaving you high and dry.\r\n\r\nBut here’s a thought… what if you could make it super-simple for someone to raise their hand, say, “okay, let’s talk” without requiring them to even pull their cell phone from their pocket?\r\n  \r\nYou can – thanks to revolutionary new software that can literally make that first call happen NOW.\r\n\r\nTalk With Web Visitor is a software widget that sits on your site, ready and waiting to capture any visitor’s Name, Email address and Phone Number.  It lets you know IMMEDIATELY – so that you can talk to that lead while they’re still there at your site.\r\n  \r\nYou know, strike when the iron’s hot!\r\n\r\nCLICK HERE https://jumboleadmagnet.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nWhen targeting leads, you HAVE to act fast – the difference between contacting someone within 5 minutes versus 30 minutes later is huge – like 100 times better!\r\n\r\nThat’s why you should check out our new SMS Text With Lead feature as well… once you’ve captured the phone number of the website visitor, you can automatically kick off a text message (SMS) conversation with them. \r\n \r\nImagine how powerful this could be – even if they don’t take you up on your offer immediately, you can stay in touch with them using text messages to make new offers, provide links to great content, and build your credibility.\r\n\r\nJust this alone could be a game changer to make your website even more effective.\r\n\r\nStrike when  the iron’s hot!\r\n\r\nCLICK HERE https://jumboleadmagnet.com to learn more about everything Talk With Web Visitor can do for your business – you’ll be amazed.\r\n\r\nThanks and keep up the great work!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – you could be converting up to 100x more leads immediately!   \r\nIt even includes International Long Distance Calling. \r\nStop wasting money chasing eyeballs that don’t turn into paying customers. \r\nCLICK HERE https://jumboleadmagnet.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://jumboleadmagnet.com/unsubscribe.aspx?d=subbisky.com', '2022-02-17 19:57:08', '2022-02-17 19:57:08'),
(184, 'Mike Macey', 'no-replystype@gmail.com', '89985284381', 'Increase sales for subbisky.com', 'Hi there \r\n \r\nIf you\'ll ever need a permanent increase in your website\'s Domain Authority score, We can help. \r\n \r\nMore info: \r\nhttps://www.strictlydigital.net/product/moz-da50-seo-plan/ \r\n \r\nNEW: Ahrefs DR70 plan: \r\nhttps://www.strictlydigital.net/product/ahrefs-seo-plan/ \r\n \r\n \r\nThank you \r\nMike Macey\r\n \r\nmike@strictlydigital.net', '2022-02-19 07:12:40', '2022-02-19 07:12:40'),
(185, 'Stephanie Gill', 'hello@socialbusybee.com', '4086517247', 'Hey there!\r\n\r\nWe were looking at your Twitter account https://www.twitter.com/https://twitter.com/subbisky and it could use a little growth boost considering in the past 30 days it\'s growth has been only %twitter_followers_30d% new followers.\r\n\r\nWe are one of the best Twitter growth marketing companies out there, and we can help you grow your account quickly and ethically. We have a number of services to either increase growth, improve engagement & sales, or both.\r\n\r\nOur goal is simple, to get more targeted traffic, more engagement, and ultimately more business from your Twitter and, ultimately your website.\r\n\r\nInterested? Take a look here https://socialbusybee.com/twitter\r\n\r\nWith Regards,\r\n\r\nStephanie Gill\r\nTwitter Specialist Account Manager - Social Busy Bee\r\nhttps://socialbusybee.com', 'Hey there!\r\n\r\nWe were looking at your Twitter account https://www.twitter.com/https://twitter.com/subbisky and it could use a little growth boost considering in the past 30 days it\'s growth has been only %twitter_followers_30d% new followers.\r\n\r\nWe are one of the best Twitter growth marketing companies out there, and we can help you grow your account quickly and ethically. We have a number of services to either increase growth, improve engagement & sales, or both.\r\n\r\nOur goal is simple, to get more targeted traffic, more engagement, and ultimately more business from your Twitter and, ultimately your website.\r\n\r\nInterested? Take a look here https://socialbusybee.com/twitter\r\n\r\nWith Regards,\r\n\r\nStephanie Gill\r\nTwitter Specialist Account Manager - Social Busy Bee\r\nhttps://socialbusybee.com', '2022-02-21 12:33:44', '2022-02-21 12:33:44'),
(186, 'Jessica Newman', 'jessicanewmannhz@yahoo.com', '02079460433', 'Hi,\r\n\r\nWe\'d like to introduce to you our explainer video service, which we feel can benefit your site subbisky.com.\r\n\r\nCheck out some of our existing videos here:\r\nhttps://www.youtube.com/watch?v=ivTmAwuli14\r\nhttps://www.youtube.com/watch?v=uywKJQvfeAM\r\nhttps://www.youtube.com/watch?v=oPNdmMo40pI\r\nhttps://www.youtube.com/watch?v=6gRb-HPo_ck\r\n\r\nAll of our videos are in a similar animated format as the above examples, and we have voice over artists with US/UK/Australian/Canadian accents.\r\nWe can also produce voice overs in languages other than English.\r\n\r\nThey can show a solution to a problem or simply promote one of your products or services. They are concise, can be uploaded to video sites such as YouTube, and can be embedded into your website or featured on landing pages.\r\n\r\nOur prices are as follows depending on video length:\r\nUp to 1 minute = $259\r\n1-2 minutes = $379\r\n2-3 minutes = $489\r\n\r\n*All prices above are in USD and include an engaging, captivating video with full script and voice-over.\r\n\r\nIf this is something you would like to discuss further, don\'t hesitate to reply.\r\n\r\nKind Regards,\r\nJessica', 'Hi,\r\n\r\nWe\'d like to introduce to you our explainer video service, which we feel can benefit your site subbisky.com.\r\n\r\nCheck out some of our existing videos here:\r\nhttps://www.youtube.com/watch?v=ivTmAwuli14\r\nhttps://www.youtube.com/watch?v=uywKJQvfeAM\r\nhttps://www.youtube.com/watch?v=oPNdmMo40pI\r\nhttps://www.youtube.com/watch?v=6gRb-HPo_ck\r\n\r\nAll of our videos are in a similar animated format as the above examples, and we have voice over artists with US/UK/Australian/Canadian accents.\r\nWe can also produce voice overs in languages other than English.\r\n\r\nThey can show a solution to a problem or simply promote one of your products or services. They are concise, can be uploaded to video sites such as YouTube, and can be embedded into your website or featured on landing pages.\r\n\r\nOur prices are as follows depending on video length:\r\nUp to 1 minute = $239\r\n1-2 minutes = $339\r\n2-3 minutes = $439\r\n\r\n*All prices above are in USD and include an engaging, captivating video with full script and voice-over.\r\n\r\nIf this is something you would like to discuss further, don\'t hesitate to reply.\r\n\r\nKind Regards,\r\nJessica', '2022-02-22 11:52:55', '2022-02-22 11:52:55'),
(187, 'Kylie Hart', 'kyliehartila@yahoo.com', '06-27262554', 'Hi, \r\n\r\nWe\'re wondering if you\'d be interested in a \'dofollow\' backlink to subbisky.com from our website that has a Moz Domain Authority of 50?\r\n\r\nWe charge just $30 (USD) to be paid via Paypal, card, or Payoneer. This is a one-time fee, so there are no extra charges and the link is permanent.\r\n\r\nIf you\'d like to know more about the site, please reply to this email and we can discuss further.\r\n\r\nKind Regards,\r\nKylie', 'Hi, \r\n\r\nWe\'re wondering if you\'d be interested in a backlink to subbisky.com from our website that has a Moz Domain Authority of 50?\r\n\r\nWe charge just $40 (USD) to be paid via Paypal, card, or Payoneer. This is a one-time fee, so there are no extra charges and the link is permanent.\r\n\r\nIf you\'d like to know more about the site, please reply to this email and we can discuss further.\r\n\r\nKind Regards,\r\nKylie', '2022-02-25 09:45:47', '2022-02-25 09:45:47'),
(188, 'Mike Mansfield', 'no-replystype@gmail.com', '87156944539', 'Competitors not playing the SEO game fair?', 'Negative SEO attack Services. Deindex bad competitors from Google. It works with any Website, video, blog, product or service. \r\nhttps://www.seo-treff.de/product/derank-seo-service/', '2022-03-05 13:26:50', '2022-03-05 13:26:50'),
(189, 'Stephanie Gill', 'hello@socialbusybee.com', '4086517247', 'Hey there!\r\n\r\nWe were looking at your Twitter account https://www.twitter.com/https://twitter.com/subbisky and it could use a little growth boost considering in the past 30 days it\'s growth has been only %twitter_followers_30d% new followers.\r\n\r\nWe are one of the best Twitter growth marketing companies out there, and we can help you grow your account quickly and ethically. We have a number of services to either increase growth, improve engagement & sales, or both.\r\n\r\nOur goal is simple, to get more targeted traffic, more engagement, and ultimately more business from your Twitter and, ultimately your website.\r\n\r\nInterested? Take a look here https://socialbusybee.com/twitter\r\n\r\nWith Regards,\r\n\r\nStephanie Gill\r\nTwitter Specialist Account Manager - Social Busy Bee\r\nhttps://socialbusybee.com', 'Hey there!\r\n\r\nWe were looking at your Twitter account https://www.twitter.com/https://twitter.com/subbisky and it could use a little growth boost considering in the past 30 days it\'s growth has been only %twitter_followers_30d% new followers.\r\n\r\nWe are one of the best Twitter growth marketing companies out there, and we can help you grow your account quickly and ethically. We have a number of services to either increase growth, improve engagement & sales, or both.\r\n\r\nOur goal is simple, to get more targeted traffic, more engagement, and ultimately more business from your Twitter and, ultimately your website.\r\n\r\nInterested? Take a look here https://socialbusybee.com/twitter\r\n\r\nWith Regards,\r\n\r\nStephanie Gill\r\nTwitter Specialist Account Manager - Social Busy Bee\r\nhttps://socialbusybee.com', '2022-03-10 16:09:26', '2022-03-10 16:09:26'),
(190, 'MichaelZow', 'chubenkodaniiaz+1418@mail.ru', '86168379392', 'Hello world', 'subbisky.com uriefeodeighrkfldjiijofofjmvkdnsisdiehiusfiajfhweiuioidjsjsbfiadjasifaijdfifijsaaiwghifadja', '2022-03-16 17:00:19', '2022-03-16 17:00:19'),
(191, 'AlbertCatry', 'orca-tell07@yahoo.ca', '83234783274', 'Compensation from $ 6700 per day for all', 'Get from $ 7500 per day >>>>>>>>>>>>>>  https://telegra.ph/Actual-income-from-5000-per-day---only-in-our-certified-licensed-system-03-20?49387   <<<<<<<<<<<', '2022-03-20 09:58:49', '2022-03-20 09:58:49'),
(192, 'AlbertCatry', 'orca-tell07@yahoo.ca', '84782523281', 'Compensation from $ 6700 per day for all', 'Get from $ 7500 per day >>>>>>>>>>>>>>  https://telegra.ph/Actual-income-from-5000-per-day---only-in-our-certified-licensed-system-03-20?49387   <<<<<<<<<<<', '2022-03-20 09:58:52', '2022-03-20 09:58:52'),
(193, 'AlbertCatry', 'orca-tell07@yahoo.ca', '88518265655', 'Compensation from $ 6700 per day for all', 'Get from $ 7500 per day >>>>>>>>>>>>>>  https://telegra.ph/Actual-income-from-5000-per-day---only-in-our-certified-licensed-system-03-20?49387   <<<<<<<<<<<', '2022-03-20 09:58:54', '2022-03-20 09:58:54'),
(194, 'AlbertCatry', 'orca-tell07@yahoo.ca', '81564892315', 'Compensation from $ 6700 per day for all', 'Get from $ 7500 per day >>>>>>>>>>>>>>  https://telegra.ph/Actual-income-from-5000-per-day---only-in-our-certified-licensed-system-03-20?49387   <<<<<<<<<<<', '2022-03-20 09:58:56', '2022-03-20 09:58:56'),
(195, 'AlbertCatry', 'orca-tell07@yahoo.ca', '82539955658', 'Compensation from $ 6700 per day for all', 'Get from $ 7500 per day >>>>>>>>>>>>>>  https://telegra.ph/Actual-income-from-5000-per-day---only-in-our-certified-licensed-system-03-20?49387   <<<<<<<<<<<', '2022-03-20 09:58:58', '2022-03-20 09:58:58'),
(196, 'Rodolfo Parks', 'emilystantron@gmail.com', '(02) 4076 1424', 'Hi,\r\n\r\nWho would I contact at subbisky.com that handles ordering your logo products, t-shirts, and promotional items?\r\n\r\nFor over 20 years we have been helping our clients with all their custom logo merchandise.\r\n\r\nWe can put your logo onto anything including:\r\n\r\n-Custom Printed T-shirts / Hoodies\r\n-Pens\r\n-Mugs\r\n-Bags\r\n-Banners\r\n-Table Covers\r\n-Key chains\r\n-USB flash drives \r\n-Plus 350,000 other items!\r\n\r\nAre there any upcoming projects that you need logo items for?\r\n\r\nThanks in advance for your time.\r\n\r\nRegards,\r\n\r\n\r\n\r\nCustom Branded Product Specialist\r\nIn business since 2005', 'Hi,\r\n\r\nWho would I contact at subbisky.com that handles ordering your logo products, t-shirts, and promotional items?\r\n\r\nFor over 20 years we have been helping our clients with all their custom logo merchandise.\r\n\r\nWe can put your logo onto anything including:\r\n\r\n-Custom Printed T-shirts / Hoodies\r\n-Pens\r\n-Mugs\r\n-Bags\r\n-Banners\r\n-Table Covers\r\n-Key chains\r\n-USB flash drives \r\n-Plus 350,000 other items!\r\n\r\nAre there any upcoming projects that you need logo items for?\r\n\r\nThanks in advance for your time.\r\n\r\nRegards,\r\n\r\n\r\n\r\nCustom Branded Product Specialist\r\nIn business since 2005', '2022-03-21 17:11:38', '2022-03-21 17:11:38'),
(197, 'Eric Jones', 'eric.jones.z.mail@gmail.com', '555-555-1212', 'Hey there, I just found your site, quick question…\r\n\r\nMy name’s Eric, I found subbisky.com after doing a quick search – you showed up near the top of the rankings, so whatever you’re doing for SEO, looks like it’s working well.\r\n\r\nSo here’s my question – what happens AFTER someone lands on your site?  Anything?\r\n\r\nResearch tells us at least 70% of the people who find your site, after a quick once-over, they disappear… forever.\r\n\r\nThat means that all the work and effort you put into getting them to show up, goes down the tubes.\r\n\r\nWhy would you want all that good work – and the great site you’ve built – go to waste?\r\n\r\nBecause the odds are they’ll just skip over calling or even grabbing their phone, leaving you high and dry.\r\n\r\nBut here’s a thought… what if you could make it super-simple for someone to raise their hand, say, “okay, let’s talk” without requiring them to even pull their cell phone from their pocket?\r\n  \r\nYou can – thanks to revolutionary new software that can literally make that first call happen NOW.\r\n\r\nTalk With Web Visitor is a software widget that sits on your site, ready and waiting to capture any visitor’s Name, Email address and Phone Number.  It lets you know IMMEDIATELY – so that you can talk to that lead while they’re still there at your site.\r\n  \r\nYou know, strike when the iron’s hot!\r\n\r\nCLICK HERE https://jumboleadmagnet.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nWhen targeting leads, you HAVE to act fast – the difference between contacting someone within 5 minutes versus 30 minutes later is huge – like 100 times better!\r\n\r\nThat’s why you should check out our new SMS Text With Lead feature as well… once you’ve captured the phone number of the website visitor, you can automatically kick off a text message (SMS) conversation with them. \r\n \r\nImagine how powerful this could be – even if they don’t take you up on your offer immediately, you can stay in touch with them using text messages to make new offers, provide links to great content, and build your credibility.\r\n\r\nJust this alone could be a game changer to make your website even more effective.\r\n\r\nStrike when  the iron’s hot!\r\n\r\nCLICK HERE https://jumboleadmagnet.com to learn more about everything Talk With Web Visitor can do for your business – you’ll be amazed.\r\n\r\nThanks and keep up the great work!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – you could be converting up to 100x more leads immediately!   \r\nIt even includes International Long Distance Calling. \r\nStop wasting money chasing eyeballs that don’t turn into paying customers. \r\nCLICK HERE https://jumboleadmagnet.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://jumboleadmagnet.com/unsubscribe.aspx?d=subbisky.com', 'Hey there, I just found your site, quick question…\r\n\r\nMy name’s Eric, I found subbisky.com after doing a quick search – you showed up near the top of the rankings, so whatever you’re doing for SEO, looks like it’s working well.\r\n\r\nSo here’s my question – what happens AFTER someone lands on your site?  Anything?\r\n\r\nResearch tells us at least 70% of the people who find your site, after a quick once-over, they disappear… forever.\r\n\r\nThat means that all the work and effort you put into getting them to show up, goes down the tubes.\r\n\r\nWhy would you want all that good work – and the great site you’ve built – go to waste?\r\n\r\nBecause the odds are they’ll just skip over calling or even grabbing their phone, leaving you high and dry.\r\n\r\nBut here’s a thought… what if you could make it super-simple for someone to raise their hand, say, “okay, let’s talk” without requiring them to even pull their cell phone from their pocket?\r\n  \r\nYou can – thanks to revolutionary new software that can literally make that first call happen NOW.\r\n\r\nTalk With Web Visitor is a software widget that sits on your site, ready and waiting to capture any visitor’s Name, Email address and Phone Number.  It lets you know IMMEDIATELY – so that you can talk to that lead while they’re still there at your site.\r\n  \r\nYou know, strike when the iron’s hot!\r\n\r\nCLICK HERE https://jumboleadmagnet.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nWhen targeting leads, you HAVE to act fast – the difference between contacting someone within 5 minutes versus 30 minutes later is huge – like 100 times better!\r\n\r\nThat’s why you should check out our new SMS Text With Lead feature as well… once you’ve captured the phone number of the website visitor, you can automatically kick off a text message (SMS) conversation with them. \r\n \r\nImagine how powerful this could be – even if they don’t take you up on your offer immediately, you can stay in touch with them using text messages to make new offers, provide links to great content, and build your credibility.\r\n\r\nJust this alone could be a game changer to make your website even more effective.\r\n\r\nStrike when  the iron’s hot!\r\n\r\nCLICK HERE https://jumboleadmagnet.com to learn more about everything Talk With Web Visitor can do for your business – you’ll be amazed.\r\n\r\nThanks and keep up the great work!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – you could be converting up to 100x more leads immediately!   \r\nIt even includes International Long Distance Calling. \r\nStop wasting money chasing eyeballs that don’t turn into paying customers. \r\nCLICK HERE https://jumboleadmagnet.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://jumboleadmagnet.com/unsubscribe.aspx?d=subbisky.com', '2022-03-22 14:54:57', '2022-03-22 14:54:57'),
(198, 'Ronnyurife', 'yourmail@gmail.com', '81362719671', 'Your website subbisky.com was hacked by Ukrainian hackers.', 'Hello. We are Ukrainian hackers and we hacked your site subbisky.com \r\nWhat do we want? We want you to make a donation in support of Ukraine to this Bitcoin (BTC) wallet by March 25 in the amount of 0.05 BTC, this is a small amount: bc1qtutdrvshe8cvf0kz06r4hqjdu565a6dprtm9z5 \r\nIf you do not make a donation, then a huge full-screen banner will appear on your site asking all visitors to your site to help Ukraine (your site will not be visible, only our banner), if you remove it, we will hang it again, if you fix the vulnerability, then we find a new one and hang the banner again. \r\nAs a last resort, we will have the domain name registrar block your domain permanently.', '2022-03-22 21:50:14', '2022-03-22 21:50:14'),
(199, 'Ronnyurife', 'yourmail@gmail.com', '85539224327', 'Your website subbisky.com was hacked by Ukrainian hackers.', 'Hello. We are Ukrainian hackers and we hacked your site subbisky.com \r\nWhat do we want? We want you to make a donation in support of Ukraine to this Bitcoin (BTC) wallet by March 25 in the amount of 0.05 BTC, this is a small amount: bc1qtutdrvshe8cvf0kz06r4hqjdu565a6dprtm9z5 \r\nIf you do not make a donation, then a huge full-screen banner will appear on your site asking all visitors to your site to help Ukraine (your site will not be visible, only our banner), if you remove it, we will hang it again, if you fix the vulnerability, then we find a new one and hang the banner again. \r\nAs a last resort, we will have the domain name registrar block your domain permanently.', '2022-03-22 21:50:17', '2022-03-22 21:50:17'),
(200, 'Ronnyurife', 'yourmail@gmail.com', '81194143474', 'Your website subbisky.com was hacked by Ukrainian hackers.', 'Hello. We are Ukrainian hackers and we hacked your site subbisky.com \r\nWhat do we want? We want you to make a donation in support of Ukraine to this Bitcoin (BTC) wallet by March 25 in the amount of 0.05 BTC, this is a small amount: bc1qtutdrvshe8cvf0kz06r4hqjdu565a6dprtm9z5 \r\nIf you do not make a donation, then a huge full-screen banner will appear on your site asking all visitors to your site to help Ukraine (your site will not be visible, only our banner), if you remove it, we will hang it again, if you fix the vulnerability, then we find a new one and hang the banner again. \r\nAs a last resort, we will have the domain name registrar block your domain permanently.', '2022-03-22 21:50:19', '2022-03-22 21:50:19'),
(201, 'Ronnyurife', 'yourmail@gmail.com', '88196429384', 'Your website subbisky.com was hacked by Ukrainian hackers.', 'Hello. We are Ukrainian hackers and we hacked your site subbisky.com \r\nWhat do we want? We want you to make a donation in support of Ukraine to this Bitcoin (BTC) wallet by March 25 in the amount of 0.05 BTC, this is a small amount: bc1qtutdrvshe8cvf0kz06r4hqjdu565a6dprtm9z5 \r\nIf you do not make a donation, then a huge full-screen banner will appear on your site asking all visitors to your site to help Ukraine (your site will not be visible, only our banner), if you remove it, we will hang it again, if you fix the vulnerability, then we find a new one and hang the banner again. \r\nAs a last resort, we will have the domain name registrar block your domain permanently.', '2022-03-22 21:50:21', '2022-03-22 21:50:21'),
(202, 'Ronnyurife', 'yourmail@gmail.com', '83713147986', 'Your website subbisky.com was hacked by Ukrainian hackers.', 'Hello. We are Ukrainian hackers and we hacked your site subbisky.com \r\nWhat do we want? We want you to make a donation in support of Ukraine to this Bitcoin (BTC) wallet by March 25 in the amount of 0.05 BTC, this is a small amount: bc1qtutdrvshe8cvf0kz06r4hqjdu565a6dprtm9z5 \r\nIf you do not make a donation, then a huge full-screen banner will appear on your site asking all visitors to your site to help Ukraine (your site will not be visible, only our banner), if you remove it, we will hang it again, if you fix the vulnerability, then we find a new one and hang the banner again. \r\nAs a last resort, we will have the domain name registrar block your domain permanently.', '2022-03-22 21:50:24', '2022-03-22 21:50:24'),
(203, 'CarlosJoype', 'dreitausend-pascal@glueck-im-netz.de', '83513981733', '$370770 credited to your card', 'When you collect your $367600 >>>>>>>>>>>>>>  https://telegra.ph/Confirm-you-are-not-a-bot-03-24-5?17195   <<<<<<<<<<<', '2022-03-24 22:22:14', '2022-03-24 22:22:14'),
(204, 'CarlosJoype', 'dreitausend-pascal@glueck-im-netz.de', '86218577435', '$370770 credited to your card', 'When you collect your $367600 >>>>>>>>>>>>>>  https://telegra.ph/Confirm-you-are-not-a-bot-03-24-5?17195   <<<<<<<<<<<', '2022-03-24 22:22:17', '2022-03-24 22:22:17'),
(205, 'CarlosJoype', 'dreitausend-pascal@glueck-im-netz.de', '89896958563', '$370770 credited to your card', 'When you collect your $367600 >>>>>>>>>>>>>>  https://telegra.ph/Confirm-you-are-not-a-bot-03-24-5?17195   <<<<<<<<<<<', '2022-03-24 22:22:21', '2022-03-24 22:22:21'),
(206, 'CarlosJoype', 'dreitausend-pascal@glueck-im-netz.de', '83265139253', '$370770 credited to your card', 'When you collect your $367600 >>>>>>>>>>>>>>  https://telegra.ph/Confirm-you-are-not-a-bot-03-24-5?17195   <<<<<<<<<<<', '2022-03-24 22:22:23', '2022-03-24 22:22:23'),
(207, 'CarlosJoype', 'dreitausend-pascal@glueck-im-netz.de', '84435734738', '$370770 credited to your card', 'When you collect your $367600 >>>>>>>>>>>>>>  https://telegra.ph/Confirm-you-are-not-a-bot-03-24-5?17195   <<<<<<<<<<<', '2022-03-24 22:22:25', '2022-03-24 22:22:25'),
(208, 'Hermanhag', 'k.varnhorn@dwenger-gruenthal.de', '88745162982', 'Quick earnings on Forex from $300750', 'Only your Cryptocurrency income from $357555 >>>>>>>>>>>>>>  https://telegra.ph/Confirm-you-are-not-a-bot-03-24-2?34537   <<<<<<<<<<<', '2022-03-25 09:49:53', '2022-03-25 09:49:53'),
(209, 'Hermanhag', 'k.varnhorn@dwenger-gruenthal.de', '85987766419', 'Quick earnings on Forex from $300750', 'Only your Cryptocurrency income from $357555 >>>>>>>>>>>>>>  https://telegra.ph/Confirm-you-are-not-a-bot-03-24-2?34537   <<<<<<<<<<<', '2022-03-25 09:49:55', '2022-03-25 09:49:55'),
(210, 'Hermanhag', 'k.varnhorn@dwenger-gruenthal.de', '82828639611', 'Quick earnings on Forex from $300750', 'Only your Cryptocurrency income from $357555 >>>>>>>>>>>>>>  https://telegra.ph/Confirm-you-are-not-a-bot-03-24-2?34537   <<<<<<<<<<<', '2022-03-25 09:49:57', '2022-03-25 09:49:57'),
(211, 'Hermanhag', 'k.varnhorn@dwenger-gruenthal.de', '86755255584', 'Quick earnings on Forex from $300750', 'Only your Cryptocurrency income from $357555 >>>>>>>>>>>>>>  https://telegra.ph/Confirm-you-are-not-a-bot-03-24-2?34537   <<<<<<<<<<<', '2022-03-25 09:49:59', '2022-03-25 09:49:59'),
(212, 'Hermanhag', 'k.varnhorn@dwenger-gruenthal.de', '88555173387', 'Quick earnings on Forex from $300750', 'Only your Cryptocurrency income from $357555 >>>>>>>>>>>>>>  https://telegra.ph/Confirm-you-are-not-a-bot-03-24-2?34537   <<<<<<<<<<<', '2022-03-25 09:50:02', '2022-03-25 09:50:02'),
(213, 'Hermanhag', 'ho.falkenberg@t-online.de', '83955737971', 'Reliable and automatic income on Binary Options from $366507', 'Only your Cryptocurrency income from $389576 >>>>>>>>>>>>>>  https://telegra.ph/Confirm-you-are-not-a-bot-03-24-5?78369   <<<<<<<<<<<', '2022-03-27 09:10:52', '2022-03-27 09:10:52'),
(214, 'Hermanhag', 'ho.falkenberg@t-online.de', '85691391481', 'Reliable and automatic income on Binary Options from $366507', 'Only your Cryptocurrency income from $389576 >>>>>>>>>>>>>>  https://telegra.ph/Confirm-you-are-not-a-bot-03-24-5?78369   <<<<<<<<<<<', '2022-03-27 09:10:55', '2022-03-27 09:10:55'),
(215, 'Hermanhag', 'ho.falkenberg@t-online.de', '86126894752', 'Reliable and automatic income on Binary Options from $366507', 'Only your Cryptocurrency income from $389576 >>>>>>>>>>>>>>  https://telegra.ph/Confirm-you-are-not-a-bot-03-24-5?78369   <<<<<<<<<<<', '2022-03-27 09:10:56', '2022-03-27 09:10:56'),
(216, 'Hermanhag', 'ho.falkenberg@t-online.de', '89241245365', 'Reliable and automatic income on Binary Options from $366507', 'Only your Cryptocurrency income from $389576 >>>>>>>>>>>>>>  https://telegra.ph/Confirm-you-are-not-a-bot-03-24-5?78369   <<<<<<<<<<<', '2022-03-27 09:10:58', '2022-03-27 09:10:58'),
(217, 'Hermanhag', 'ho.falkenberg@t-online.de', '81792791168', 'Reliable and automatic income on Binary Options from $366507', 'Only your Cryptocurrency income from $389576 >>>>>>>>>>>>>>  https://telegra.ph/Confirm-you-are-not-a-bot-03-24-5?78369   <<<<<<<<<<<', '2022-03-27 09:11:00', '2022-03-27 09:11:00'),
(218, 'ArnoldEpilk', 'leoncrafter@web.de', '86282298969', 'SMM premium quality cheap and without intermediaries', 'Elite SMM Panel - Best and Cheapest SMM Panel >>>>>>>>>>>>>>  https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2FccgQZt&sa=D&sntz=1&usg=AOvVaw07lL_kc7zZcksNSSYY3kMA   <<<<<<<<<<<', '2022-03-29 19:58:23', '2022-03-29 19:58:23'),
(219, 'ArnoldEpilk', 'leoncrafter@web.de', '82546682921', 'SMM premium quality cheap and without intermediaries', 'Elite SMM Panel - Best and Cheapest SMM Panel >>>>>>>>>>>>>>  https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2FccgQZt&sa=D&sntz=1&usg=AOvVaw07lL_kc7zZcksNSSYY3kMA   <<<<<<<<<<<', '2022-03-29 19:58:27', '2022-03-29 19:58:27'),
(220, 'ArnoldEpilk', 'leoncrafter@web.de', '81278724685', 'SMM premium quality cheap and without intermediaries', 'Elite SMM Panel - Best and Cheapest SMM Panel >>>>>>>>>>>>>>  https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2FccgQZt&sa=D&sntz=1&usg=AOvVaw07lL_kc7zZcksNSSYY3kMA   <<<<<<<<<<<', '2022-03-29 19:58:29', '2022-03-29 19:58:29'),
(221, 'ArnoldEpilk', 'leoncrafter@web.de', '85142198481', 'SMM premium quality cheap and without intermediaries', 'Elite SMM Panel - Best and Cheapest SMM Panel >>>>>>>>>>>>>>  https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2FccgQZt&sa=D&sntz=1&usg=AOvVaw07lL_kc7zZcksNSSYY3kMA   <<<<<<<<<<<', '2022-03-29 19:58:31', '2022-03-29 19:58:31'),
(222, 'ArnoldEpilk', 'leoncrafter@web.de', '82893171461', 'SMM premium quality cheap and without intermediaries', 'Elite SMM Panel - Best and Cheapest SMM Panel >>>>>>>>>>>>>>  https://www.google.com/url?q=https%3A%2F%2Fvk.cc%2FccgQZt&sa=D&sntz=1&usg=AOvVaw07lL_kc7zZcksNSSYY3kMA   <<<<<<<<<<<', '2022-03-29 19:58:34', '2022-03-29 19:58:34'),
(223, 'Steve Watson', 'steve@explainervideos4u.info', '078 4938 0361', 'Hi,\r\n\r\nWe\'d like to introduce to you our explainer video service, which we feel can benefit your site subbisky.com.\r\n\r\nCheck out some of our existing videos here:\r\nhttps://www.youtube.com/watch?v=ivTmAwuli14\r\nhttps://www.youtube.com/watch?v=uywKJQvfeAM\r\nhttps://www.youtube.com/watch?v=oPNdmMo40pI\r\nhttps://www.youtube.com/watch?v=6gRb-HPo_ck\r\n\r\nAll of our videos are in a similar animated format as the above examples, and we have voice over artists with US/UK/Australian/Canadian accents.\r\nWe can also produce voice overs in languages other than English.\r\n\r\nThey can show a solution to a problem or simply promote one of your products or services. They are concise, can be uploaded to video sites such as YouTube, and can be embedded into your website or featured on landing pages.\r\n\r\nOur prices are as follows depending on video length:\r\nUp to 1 minute = $239\r\n1-2 minutes = $339\r\n2-3 minutes = $439\r\n\r\n*All prices above are in USD and include an engaging, captivating video with full script and voice-over.\r\n\r\nIf this is something you would like to discuss further, don\'t hesitate to reply.\r\n\r\nKind Regards,\r\nSteve', 'Hi,\r\n\r\nWe\'d like to introduce to you our explainer video service, which we feel can benefit your site subbisky.com.\r\n\r\nCheck out some of our existing videos here:\r\nhttps://www.youtube.com/watch?v=zvGF7uRfH04\r\nhttps://www.youtube.com/watch?v=cZPsp217Iik\r\nhttps://www.youtube.com/watch?v=JHfnqS2zpU8\r\n\r\nAll of our videos are in a similar animated format as the above examples, and we have voice over artists with US/UK/Australian/Canadian accents.\r\nWe can also produce voice overs in languages other than English.\r\n\r\nThey can show a solution to a problem or simply promote one of your products or services. They are concise, can be uploaded to video sites such as YouTube, and can be embedded into your website or featured on landing pages.\r\n\r\nOur prices are as follows depending on video length:\r\nUp to 1 minute = $259\r\n1-2 minutes = $379\r\n2-3 minutes = $489\r\n\r\n*All prices above are in USD and include an engaging, captivating video with full script and voice-over.\r\n\r\nIf this is something you would like to discuss further, don\'t hesitate to reply.\r\n\r\nKind Regards,\r\nSteve', '2022-03-30 19:20:01', '2022-03-30 19:20:01'),
(224, 'DavidCom', 'eericwadie@yahoo.com', '83398635671', 'Vos gains a partir de 1500 euros par jour', 'Revenu passif a partir de 1500 euros par jour >>>>>>>>>>>>>>  https://telegra.ph/Derni%C3%A8res-nouvelles--Alors-que-les-prix-augmentent-les-Europ%C3%A9ens-commencent-%C3%A0-arr%C3%AAter-de-fumer-en-masse-et-gagnent-en-plus-%C3%A0-par-04-01-2?ea4   <<<<<<<<<<<', '2022-04-01 07:31:54', '2022-04-01 07:31:54'),
(225, 'DavidCom', 'eericwadie@yahoo.com', '83636527465', 'Vos gains a partir de 1500 euros par jour', 'Revenu passif a partir de 1500 euros par jour >>>>>>>>>>>>>>  https://telegra.ph/Derni%C3%A8res-nouvelles--Alors-que-les-prix-augmentent-les-Europ%C3%A9ens-commencent-%C3%A0-arr%C3%AAter-de-fumer-en-masse-et-gagnent-en-plus-%C3%A0-par-04-01-2?ea4   <<<<<<<<<<<', '2022-04-01 07:31:56', '2022-04-01 07:31:56');
INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(226, 'DavidCom', 'eericwadie@yahoo.com', '87967268584', 'Vos gains a partir de 1500 euros par jour', 'Revenu passif a partir de 1500 euros par jour >>>>>>>>>>>>>>  https://telegra.ph/Derni%C3%A8res-nouvelles--Alors-que-les-prix-augmentent-les-Europ%C3%A9ens-commencent-%C3%A0-arr%C3%AAter-de-fumer-en-masse-et-gagnent-en-plus-%C3%A0-par-04-01-2?ea4   <<<<<<<<<<<', '2022-04-01 07:31:58', '2022-04-01 07:31:58'),
(227, 'DavidCom', 'eericwadie@yahoo.com', '81427636193', 'Vos gains a partir de 1500 euros par jour', 'Revenu passif a partir de 1500 euros par jour >>>>>>>>>>>>>>  https://telegra.ph/Derni%C3%A8res-nouvelles--Alors-que-les-prix-augmentent-les-Europ%C3%A9ens-commencent-%C3%A0-arr%C3%AAter-de-fumer-en-masse-et-gagnent-en-plus-%C3%A0-par-04-01-2?ea4   <<<<<<<<<<<', '2022-04-01 07:32:01', '2022-04-01 07:32:01'),
(228, 'DavidCom', 'eericwadie@yahoo.com', '83848396374', 'Vos gains a partir de 1500 euros par jour', 'Revenu passif a partir de 1500 euros par jour >>>>>>>>>>>>>>  https://telegra.ph/Derni%C3%A8res-nouvelles--Alors-que-les-prix-augmentent-les-Europ%C3%A9ens-commencent-%C3%A0-arr%C3%AAter-de-fumer-en-masse-et-gagnent-en-plus-%C3%A0-par-04-01-2?ea4   <<<<<<<<<<<', '2022-04-01 07:32:04', '2022-04-01 07:32:04'),
(229, 'DavidCom', 'sao_tirasporting@hotmail.com', '89127347981', 'You received a transfer of 1567 USDT per day', 'Your income on the Trading Robot from 1576 USDT per day >>>>>>>>>>>>>>  https://telegra.ph/More-than-1500-USDT-per-day-on-automated-cryptocurrency-trading-04-02-3?yz4   <<<<<<<<<<<', '2022-04-02 10:29:00', '2022-04-02 10:29:00'),
(230, 'DavidCom', 'sao_tirasporting@hotmail.com', '86858664518', 'You received a transfer of 1567 USDT per day', 'Your income on the Trading Robot from 1576 USDT per day >>>>>>>>>>>>>>  https://telegra.ph/More-than-1500-USDT-per-day-on-automated-cryptocurrency-trading-04-02-3?yz4   <<<<<<<<<<<', '2022-04-02 10:29:02', '2022-04-02 10:29:02'),
(231, 'DavidCom', 'sao_tirasporting@hotmail.com', '82747435135', 'You received a transfer of 1567 USDT per day', 'Your income on the Trading Robot from 1576 USDT per day >>>>>>>>>>>>>>  https://telegra.ph/More-than-1500-USDT-per-day-on-automated-cryptocurrency-trading-04-02-3?yz4   <<<<<<<<<<<', '2022-04-02 10:29:04', '2022-04-02 10:29:04'),
(232, 'DavidCom', 'sao_tirasporting@hotmail.com', '81433348844', 'You received a transfer of 1567 USDT per day', 'Your income on the Trading Robot from 1576 USDT per day >>>>>>>>>>>>>>  https://telegra.ph/More-than-1500-USDT-per-day-on-automated-cryptocurrency-trading-04-02-3?yz4   <<<<<<<<<<<', '2022-04-02 10:29:06', '2022-04-02 10:29:06'),
(233, 'DavidCom', 'sao_tirasporting@hotmail.com', '87392917183', 'You received a transfer of 1567 USDT per day', 'Your income on the Trading Robot from 1576 USDT per day >>>>>>>>>>>>>>  https://telegra.ph/More-than-1500-USDT-per-day-on-automated-cryptocurrency-trading-04-02-3?yz4   <<<<<<<<<<<', '2022-04-02 10:29:07', '2022-04-02 10:29:07'),
(234, 'Jan Hockensmith', 'hockensmith.jan@hotmail.com', '81-78-84-50', 'Hi there,\r\n\r\nHave you ever wondered why new tokens listed on Uniswap, Pancakeswap or any decentralized exchange are always subject to insane price volatility?\r\n\r\nDid you know that front running bots have been dominating the market and profiting due to that?\r\n\r\nCheck out our new Youtube video for a free and detailed tutorial on how to deploy your own front running bot:\r\nhttps://youtu.be/SQHFveYdjV8\r\n\r\nKind Regards,\r\nJan', 'Hi there,\r\n\r\nHave you ever wondered why new tokens listed on Uniswap, Pancakeswap or any decentralized exchange are always subject to insane price volatility?\r\n\r\nDid you know that front running bots have been dominating the market and profiting due to that?\r\n\r\nCheck out our new Youtube video for a free and detailed tutorial on how to deploy your own front running bot:\r\nhttps://youtu.be/SQHFveYdjV8\r\n\r\nKind Regards,\r\nJan', '2022-04-15 19:54:40', '2022-04-15 19:54:40'),
(235, 'MichaelFug', 'beeonthetop.com@gmail.com', '82946868391', 'Buy Followers, Likes and Views', 'Buy Followers, Likes and Views \r\n \r\nGet Thousands of Followers, Likes, Views and more for all you social media channels. \r\nInstagram, Facebook, Tiktok and more.. \r\n \r\nBoost your sales, and get more leads. \r\nhttps://www.beeonthetop.com', '2022-04-16 13:31:50', '2022-04-16 13:31:50'),
(236, 'Marlys Richardson', 'pmtaking@163.com', '02.73.29.68.79', 'The price of sea freight is getting down!!!\r\n\r\nWe are the Top 100 freight forwarder in China,We can handle the shipment from Shenzhen, Guangzhou,Xiamen, Shanghai, Ningbo, Qingdao and so on.\r\n \r\n Here below is our main services:\r\n1. Air freight&Ocean freight forwarding\r\n2. FBA shipping\r\n3. Consolidation,Warehousing\r\n4. Customs broker\r\n5. Insurance\r\n6. DDU&DDP\r\n\r\nsome price for your reference:\r\nChina ports to the LA/West ports in the USA&Canada  :USD8000-9500/40HQ\r\nChina ports to the NY/East ports in the USA: USD9000-12500/40HQ\r\nChina ports to Toronto,Montreal,East ports in Canada:USD12000-15000/40HQ\r\nChina ports to Australia Ports: USD5000-6500/40HQ\r\nChina ports to Europe Ports:USD8500-11000/40HQ\r\nChina ports to Latin America: USD8000-9500/40HQ\r\n\r\nAir freight from China to USA&Canada :+500kgs USD4.1-6.5/kgs\r\nAir freight from China to Europe (UK,Germany and so on):+500kgs USD4.5--6.5/kgs\r\n\r\nWould you like tell me which is your depart ports in China and which is your destination ports?We will offer the best price for you.\r\n\r\n\r\nThanks&Best Regards,\r\n\r\nKroes     \r\npmtaking@163.com\r\n\r\n\r\nUnsubcribe Here     http://ilovu.top/unsubscribe-2/\r\n\r\n-------------------------------------------\r\nsubbisky.com\r\nhttps://subbisky.com\r\nSubbisky', 'The price of sea freight is getting down!!!\r\n\r\nWe are the Top 100 freight forwarder in China,We can handle the shipment from Shenzhen, Guangzhou,Xiamen, Shanghai, Ningbo, Qingdao and so on.\r\n \r\n Here below is our main services:\r\n1. Air freight&Ocean freight forwarding\r\n2. FBA shipping\r\n3. Consolidation,Warehousing\r\n4. Customs broker\r\n5. Insurance\r\n6. DDU&DDP\r\n\r\nsome price for your reference:\r\nChina ports to the LA/West ports in the USA&Canada  :USD8000-9500/40HQ\r\nChina ports to the NY/East ports in the USA: USD9000-12500/40HQ\r\nChina ports to Toronto,Montreal,East ports in Canada:USD12000-15000/40HQ\r\nChina ports to Australia Ports: USD5000-6500/40HQ\r\nChina ports to Europe Ports:USD8500-11000/40HQ\r\nChina ports to Latin America: USD8000-9500/40HQ\r\n\r\nAir freight from China to USA&Canada :+500kgs USD4.1-6.5/kgs\r\nAir freight from China to Europe (UK,Germany and so on):+500kgs USD4.5--6.5/kgs\r\n\r\nWould you like tell me which is your depart ports in China and which is your destination ports?We will offer the best price for you.\r\n\r\n\r\nThanks&Best Regards,\r\n\r\nKroes     \r\npmtaking@163.com\r\n\r\n\r\nUnsubcribe Here     http://ilovu.top/unsubscribe-2/\r\n\r\n-------------------------------------------\r\nsubbisky.com\r\nhttps://subbisky.com\r\nSubbisky', '2022-04-17 13:54:49', '2022-04-17 13:54:49'),
(237, 'Eric Jones', 'eric.jones.z.mail@gmail.com', '555-555-1212', 'My name’s Eric and I just found your site subbisky.com.\r\n\r\nIt’s got a lot going for it, but here’s an idea to make it even MORE effective.\r\n\r\nTalk With Web Visitor – CLICK HERE http://jumboleadmagnet.com for a live demo now.\r\n\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It signals you the moment they let you know they’re interested – so that you can talk to that lead while they’re literally looking over your site.\r\n\r\nAnd once you’ve captured their phone number, with our new SMS Text With Lead feature, you can automatically start a text (SMS) conversation… and if they don’t take you up on your offer then, you can follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nCLICK HERE http://jumboleadmagnet.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nThe difference between contacting someone within 5 minutes versus a half-hour means you could be converting up to 100X more leads today!\r\n\r\nEric\r\nPS: Studies show that 70% of a site’s visitors disappear and are gone forever after just a moment. Don’t keep losing them. \r\nTalk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE http://jumboleadmagnet.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://jumboleadmagnet.com/unsubscribe.aspx?d=subbisky.com', 'My name’s Eric and I just found your site subbisky.com.\r\n\r\nIt’s got a lot going for it, but here’s an idea to make it even MORE effective.\r\n\r\nTalk With Web Visitor – CLICK HERE http://jumboleadmagnet.com for a live demo now.\r\n\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It signals you the moment they let you know they’re interested – so that you can talk to that lead while they’re literally looking over your site.\r\n\r\nAnd once you’ve captured their phone number, with our new SMS Text With Lead feature, you can automatically start a text (SMS) conversation… and if they don’t take you up on your offer then, you can follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nCLICK HERE http://jumboleadmagnet.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nThe difference between contacting someone within 5 minutes versus a half-hour means you could be converting up to 100X more leads today!\r\n\r\nEric\r\nPS: Studies show that 70% of a site’s visitors disappear and are gone forever after just a moment. Don’t keep losing them. \r\nTalk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE http://jumboleadmagnet.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://jumboleadmagnet.com/unsubscribe.aspx?d=subbisky.com', '2022-04-24 22:46:57', '2022-04-24 22:46:57'),
(238, 'Michaelhek', 'KsenofontMaidanov+4a3f@mail.ru', '86562765861', 'Hello Moto', '<html> \r\n<a href=\"https://google.com\"><img src=\"https://blogger.googleusercontent.com/img/a/AVvXsEgXM4xrSRAnQQOLZImSaLdACcB-BosbLfsYEsXB-lLBl71Ma4AFA4xbB22ruqkub9W8nQCJVUXuXvJQeNLG2yoUL-OxTbhSvuyduxRSQI5RsQSu6DbfkMCVMuCuRB1uzs4KNkp3gZjcKQeubD_3RZ6p3xDAEpOwy6LnNnGhSa3h4V04dq3zc3oZajp_=s16000\"></a> \r\n</br> \r\nsubbisky.com griufheufhruifejyut5784467489rfugrgjedw0ooegjokoeghtitg3r94tuirjgoerfkeoghiytgjierjtirhyj \r\n</html>', '2022-04-24 23:40:21', '2022-04-24 23:40:21'),
(239, 'dyeve', '22l1kzav@yahoo.com', '82415213581', 'I promised.', 'Hi, this is Jenny. I am sending you my intimate photos as I promised. https://tinyurl.com/y2dfmvay', '2022-04-28 04:08:23', '2022-04-28 04:08:23'),
(240, 'Steve Watson', 'steve@explainervideos4u.info', '078 4938 0361', 'Hi,\r\n\r\nWe\'d like to introduce to you our explainer video service, which we feel can benefit your site subbisky.com.\r\n\r\nCheck out some of our existing videos here:\r\nhttps://www.youtube.com/watch?v=2GvqwoG1Mrc\r\nhttps://www.youtube.com/watch?v=7TFiXX8PUGA\r\nhttps://www.youtube.com/watch?v=DibihevhSBU\r\n\r\nAll of our videos are in a similar animated format as the above examples, and we have voice over artists with US/UK/Australian/Canadian accents.\r\nWe can also produce voice overs in languages other than English.\r\n\r\nThey can show a solution to a problem or simply promote one of your products or services. They are concise, can be uploaded to video sites such as YouTube, and can be embedded into your website or featured on landing pages.\r\n\r\nOur prices are as follows depending on video length:\r\nUp to 1 minute = $239\r\n1-2 minutes = $339\r\n2-3 minutes = $439\r\n\r\n*All prices above are in USD and include an engaging, captivating video with full script and voice-over.\r\n\r\nIf this is something you would like to discuss further, don\'t hesitate to reply.\r\n\r\nKind Regards,\r\nSteve', 'Hi,\r\n\r\nWe\'d like to introduce to you our explainer video service, which we feel can benefit your site subbisky.com.\r\n\r\nCheck out some of our existing videos here:\r\nhttps://www.youtube.com/watch?v=zvGF7uRfH04\r\nhttps://www.youtube.com/watch?v=cZPsp217Iik\r\nhttps://www.youtube.com/watch?v=JHfnqS2zpU8\r\n\r\nAll of our videos are in a similar animated format as the above examples, and we have voice over artists with US/UK/Australian/Canadian accents.\r\nWe can also produce voice overs in languages other than English.\r\n\r\nThey can show a solution to a problem or simply promote one of your products or services. They are concise, can be uploaded to video sites such as YouTube, and can be embedded into your website or featured on landing pages.\r\n\r\nOur prices are as follows depending on video length:\r\nUp to 1 minute = $259\r\n1-2 minutes = $379\r\n2-3 minutes = $489\r\n\r\n*All prices above are in USD and include an engaging, captivating video with full script and voice-over.\r\n\r\nIf this is something you would like to discuss further, don\'t hesitate to reply.\r\n\r\nKind Regards,\r\nSteve', '2022-04-30 04:25:02', '2022-04-30 04:25:02'),
(241, 'Arlette Delgadillo', 'pmtaking@163.com', '077 7307 0268', 'Hi Dear,\r\n\r\nHow is your week? Hope you are glad to find me. \r\nWe are the Class A China shipping agency, keep on offering nice services and useful info for our valuble cuatomer.\r\n\r\nAnd with the boom May comes, we are also ready to offer fast and responsible shipping spaces for you: \r\n\r\nThis below is our price for your reference.\r\n\r\nSome price for your reference:\r\nChina ports to the LA/West ports in the USA&Canada  :USD8,100-9,600/40HQ  (FMC NVOCC)\r\nChina ports to the NY/East ports in the USA: USD9,000-12,500/40HQ\r\nChina ports to Toronto,Montreal,East ports in Canada:USD12000-15000/40HQ\r\nChina ports to Australia Ports: USD4,000-6,500/40HQ\r\nChina ports to Europe main Ports:USD8,500-10,000/40HQ\r\n\r\nAir freight from China to USA&Canada :+500kgs USD4.1-7.5/kgs\r\nAir freight from China to Europe (UK,Germany and so on):+500kgs USD4.5--7.5/kgs\r\n\r\nWould you like tell me which is your depart ports in China and which is your destination ports?We will offer the best price for you.\r\n\r\n\r\nThanks&Best Regards,\r\n\r\nKroes     \r\npmtaking@163.com\r\n\r\n\r\nUnsubcribe Here     http://ilovu.top/unsubscribe-2/\r\n\r\n-------------------------------------------\r\nsubbisky.com\r\nhttps://subbisky.com\r\nwebsite', 'Hi Dear,\r\n\r\nHow is your week? Hope you are glad to find me. \r\nWe are the Class A China shipping agency, keep on offering nice services and useful info for our valuble cuatomer.\r\n\r\nAnd with the boom May comes, we are also ready to offer fast and responsible shipping spaces for you: \r\n\r\nThis below is our price for your reference.\r\n\r\nSome price for your reference:\r\nChina ports to the LA/West ports in the USA&Canada  :USD8,100-9,600/40HQ  (FMC NVOCC)\r\nChina ports to the NY/East ports in the USA: USD9,000-12,500/40HQ\r\nChina ports to Toronto,Montreal,East ports in Canada:USD12000-15000/40HQ\r\nChina ports to Australia Ports: USD4,000-6,500/40HQ\r\nChina ports to Europe main Ports:USD8,500-10,000/40HQ\r\n\r\nAir freight from China to USA&Canada :+500kgs USD4.1-7.5/kgs\r\nAir freight from China to Europe (UK,Germany and so on):+500kgs USD4.5--7.5/kgs\r\n\r\nWould you like tell me which is your depart ports in China and which is your destination ports?We will offer the best price for you.\r\n\r\n\r\nThanks&Best Regards,\r\n\r\nKroes     \r\npmtaking@163.com\r\n\r\n\r\nUnsubcribe Here     http://ilovu.top/unsubscribe-2/\r\n\r\n-------------------------------------------\r\nsubbisky.com\r\nhttps://subbisky.com\r\nSubbisky', '2022-05-01 10:00:43', '2022-05-01 10:00:43'),
(242, 'immambink', 'immambink@sufmail.xyz', '85287823362', 'maximum dosage of cialis', '[url=https://newfasttadalafil.com/]buy cialis generic online cheap[/url] cheap cialis strips sale online Xryakt <a href=https://newfasttadalafil.com/>cialis coupons</a> Lrzuzo https://newfasttadalafil.com/ - buy cialis online forum Rghdca', '2022-05-08 06:15:49', '2022-05-08 06:15:49'),
(243, 'Jeffery Scanlan', 'pmtaking@163.com', '081 618 94 56', 'Good day hope to find you well today,\r\n\r\nHope your business is going smoothly well in 2022,\r\n\r\nWe are the Class A freight forwarder from China. We have operations at several international sea ports around the world, and work with an established network of sea freight transport providers to ensure that your freight is transported via the most time and cost effective means. We support full and partial container loads, and handle all customs documents for countries of origin and destination. I got your email address through the Internet and hope to introduce ourselves through this opportunity.\r\n\r\nOUR ADVANTAGES:\r\n\r\n1,            Our service routes throughout the world\'s major ports (sea &air), can satisfy the customer\'s business requirements, On these routes from China,Asia to  European & American&Oceania , we can offer you the best service and prices.\r\n\r\n2,      Here below is our main services:\r\n\r\n           1). Air freight&Ocean freight forwarding (steady Air freight , FMC contracted sea freight for 20ft ,40ft and 40hq)\r\n\r\n            2). FBA shipping\r\n\r\n            3). Consolidation,Warehousing\r\n\r\n            4). Customs broker\r\n\r\n           5). Insurance\r\n\r\n           6). DDU&DDP Door to Door delivery shipping\r\n\r\n\r\nSome price for your reference:\r\nChina ports to the LA/West ports in the USA&Canada  :USD8,000-9,500/40HQ  (FMC NVOCC)\r\nChina ports to the NY/East ports in the USA: USD9,000-12,000/40HQ\r\nChina ports to Toronto,Montreal,East ports in Canada:USD12000-15000/40HQ\r\nChina ports to Australia Ports: USD4,000-6,500/40HQ\r\nChina ports to Europe Ports:USD8,500-10,500/40HQ\r\n\r\nAir freight from China to USA&Canada :+500kgs USD4.1-7.5/kgs\r\nAir freight from China to Europe (UK,Germany and so on):+500kgs USD4.5--7.5/kgs\r\n\r\nWould you like tell me which is your depart ports in China and which is your destination ports?We will offer the best price for you.\r\n\r\n\r\nThanks&Best Regards,\r\n\r\nKroes     \r\npmtaking@163.com\r\n\r\n\r\nUnsubcribe Here     http://ilovu.top/unsubscribe-2/\r\n\r\n-------------------------------------------\r\nsubbisky.com\r\nhttps://subbisky.com\r\nSubbisky', 'Good day hope to find you well today,\r\n\r\nHope your business is going smoothly well in 2022,\r\n\r\nWe are the Class A freight forwarder from China. We have operations at several international sea ports around the world, and work with an established network of sea freight transport providers to ensure that your freight is transported via the most time and cost effective means. We support full and partial container loads, and handle all customs documents for countries of origin and destination. I got your email address through the Internet and hope to introduce ourselves through this opportunity.\r\n\r\nOUR ADVANTAGES:\r\n\r\n1,            Our service routes throughout the world\'s major ports (sea &air), can satisfy the customer\'s business requirements, On these routes from China,Asia to  European & American&Oceania , we can offer you the best service and prices.\r\n\r\n2,      Here below is our main services:\r\n\r\n           1). Air freight&Ocean freight forwarding (steady Air freight , FMC contracted sea freight for 20ft ,40ft and 40hq)\r\n\r\n            2). FBA shipping\r\n\r\n            3). Consolidation,Warehousing\r\n\r\n            4). Customs broker\r\n\r\n           5). Insurance\r\n\r\n           6). DDU&DDP Door to Door delivery shipping\r\n\r\n\r\nSome price for your reference:\r\nChina ports to the LA/West ports in the USA&Canada  :USD8,000-9,500/40HQ  (FMC NVOCC)\r\nChina ports to the NY/East ports in the USA: USD9,000-12,000/40HQ\r\nChina ports to Toronto,Montreal,East ports in Canada:USD12000-15000/40HQ\r\nChina ports to Australia Ports: USD4,000-6,500/40HQ\r\nChina ports to Europe Ports:USD8,500-10,500/40HQ\r\n\r\nAir freight from China to USA&Canada :+500kgs USD4.1-7.5/kgs\r\nAir freight from China to Europe (UK,Germany and so on):+500kgs USD4.5--7.5/kgs\r\n\r\nWould you like tell me which is your depart ports in China and which is your destination ports?We will offer the best price for you.\r\n\r\n\r\nThanks&Best Regards,\r\n\r\nKroes     \r\npmtaking@163.com\r\n\r\n\r\nUnsubcribe Here     http://ilovu.top/unsubscribe-2/\r\n\r\n-------------------------------------------\r\nsubbisky.com\r\nhttps://subbisky.com\r\nwebsite', '2022-05-11 19:10:13', '2022-05-11 19:10:13'),
(244, 'Emelia Johnson', 'julietteemelia@gmail.com', '(02) 4990 8791', 'Hi, \r\n\r\nWe\'re wondering if you\'d be interested in a very strong backlink for your site subbisky.com?\r\n\r\nWe currently run 2934 sites, covering all subjects and each backlink is priced from just $70.\r\n\r\nIf your budget allows and you\'d like to know more, please reply to this email and we can discuss further.\r\n\r\nKind Regards,\r\nEmelia\r\n\r\n-----------------------------------------------------------------------------------\r\nIf you do not wish to hear from us again, just reply with \'NO\' in the subject line.', 'Hi, \r\n\r\nWe\'re wondering if you\'d be interested in a very strong backlink for your site subbisky.com?\r\n\r\nWe currently run 2934 sites, covering all subjects and each backlink is priced from just $70.\r\n\r\nIf your budget allows and you\'d like to know more, please reply to this email and we can discuss further.\r\n\r\nKind Regards,\r\nEmelia\r\n\r\n-----------------------------------------------------------------------------------\r\nIf you do not wish to hear from us again, just reply with \'NO\' in the subject line.', '2022-05-14 18:19:37', '2022-05-14 18:19:37'),
(245, 'Teresita Billson', 'pmtaking@163.com', '078 3581 7075', 'Hi Dear,\r\n\r\nHow is your week? Hope you are glad to find me. \r\nWe are the Class A China shipping agency, keep on offering nice services and useful info for our valuble cuatomer.\r\n\r\nAnd with the boom May comes, we are also ready to offer fast and responsible shipping spaces for you: \r\n\r\nThis below is our price for your reference.\r\n\r\nSome price for your reference:\r\nChina ports to the LA/West ports in the USA&Canada  :USD8,100-9,600/40HQ  (FMC NVOCC)\r\nChina ports to the NY/East ports in the USA: USD9,000-12,500/40HQ\r\nChina ports to Toronto,Montreal,East ports in Canada:USD12000-15000/40HQ\r\nChina ports to Australia Ports: USD4,000-6,500/40HQ\r\nChina ports to Europe main Ports:USD8,500-10,000/40HQ\r\n\r\nAir freight from China to USA&Canada :+500kgs USD4.1-7.5/kgs\r\nAir freight from China to Europe (UK,Germany and so on):+500kgs USD4.5--7.5/kgs\r\n\r\nWould you like tell me which is your depart ports in China and which is your destination ports?We will offer the best price for you.\r\n\r\n\r\nThanks&Best Regards,\r\n\r\nKroes     \r\npmtaking@163.com\r\n\r\n\r\nUnsubcribe Here     http://ilovu.top/unsubscribe-2/\r\n\r\n-------------------------------------------\r\nsubbisky.com\r\nhttps://subbisky.com/\r\nSubbisky', 'Hi Dear,\r\n\r\nHow is your week? Hope you are glad to find me. \r\nWe are the Class A China shipping agency, keep on offering nice services and useful info for our valuble cuatomer.\r\n\r\nAnd with the boom May comes, we are also ready to offer fast and responsible shipping spaces for you: \r\n\r\nThis below is our price for your reference.\r\n\r\nSome price for your reference:\r\nChina ports to the LA/West ports in the USA&Canada  :USD8,100-9,600/40HQ  (FMC NVOCC)\r\nChina ports to the NY/East ports in the USA: USD9,000-12,500/40HQ\r\nChina ports to Toronto,Montreal,East ports in Canada:USD12000-15000/40HQ\r\nChina ports to Australia Ports: USD4,000-6,500/40HQ\r\nChina ports to Europe main Ports:USD8,500-10,000/40HQ\r\n\r\nAir freight from China to USA&Canada :+500kgs USD4.1-7.5/kgs\r\nAir freight from China to Europe (UK,Germany and so on):+500kgs USD4.5--7.5/kgs\r\n\r\nWould you like tell me which is your depart ports in China and which is your destination ports?We will offer the best price for you.\r\n\r\n\r\nThanks&Best Regards,\r\n\r\nKroes     \r\npmtaking@163.com\r\n\r\n\r\nUnsubcribe Here     http://ilovu.top/unsubscribe-2/\r\n\r\n-------------------------------------------\r\nsubbisky.com\r\nhttps://subbisky.com/\r\nSubbisky', '2022-05-20 04:21:01', '2022-05-20 04:21:01'),
(246, 'Jarrod Fryar', 'pmtaking@163.com', '08731 49 43 09', 'Hi Dear,\r\n\r\nHow is your week? Hope you are glad to find me. \r\nWe are the Class A China shipping agency, keep on offering nice services and useful info for our valuble cuatomer.\r\n\r\nAnd with the boom May comes, we are also ready to offer fast and responsible shipping spaces for you: \r\n\r\nThis below is our price for your reference.\r\n\r\nSome price for your reference:\r\nChina ports to the LA/West ports in the USA&Canada  :USD8,100-9,600/40HQ  (FMC NVOCC)\r\nChina ports to the NY/East ports in the USA: USD9,000-12,500/40HQ\r\nChina ports to Toronto,Montreal,East ports in Canada:USD12000-15000/40HQ\r\nChina ports to Australia Ports: USD4,000-6,500/40HQ\r\nChina ports to Europe main Ports:USD8,500-10,000/40HQ\r\n\r\nAir freight from China to USA&Canada :+500kgs USD4.1-7.5/kgs\r\nAir freight from China to Europe (UK,Germany and so on):+500kgs USD4.5--7.5/kgs\r\n\r\nWould you like tell me which is your depart ports in China and which is your destination ports?We will offer the best price for you.\r\n\r\n\r\nThanks&Best Regards,\r\n\r\nKroes     \r\npmtaking@163.com\r\n\r\n\r\nUnsubcribe Here     http://ilovu.top/unsubscribe-2/\r\n\r\n-------------------------------------------\r\nsubbisky.com\r\nhttps://subbisky.com\r\nSubbisky', 'Hi Dear,\r\n\r\nHow is your week? Hope you are glad to find me. \r\nWe are the Class A China shipping agency, keep on offering nice services and useful info for our valuble cuatomer.\r\n\r\nAnd with the boom May comes, we are also ready to offer fast and responsible shipping spaces for you: \r\n\r\nThis below is our price for your reference.\r\n\r\nSome price for your reference:\r\nChina ports to the LA/West ports in the USA&Canada  :USD8,100-9,600/40HQ  (FMC NVOCC)\r\nChina ports to the NY/East ports in the USA: USD9,000-12,500/40HQ\r\nChina ports to Toronto,Montreal,East ports in Canada:USD12000-15000/40HQ\r\nChina ports to Australia Ports: USD4,000-6,500/40HQ\r\nChina ports to Europe main Ports:USD8,500-10,000/40HQ\r\n\r\nAir freight from China to USA&Canada :+500kgs USD4.1-7.5/kgs\r\nAir freight from China to Europe (UK,Germany and so on):+500kgs USD4.5--7.5/kgs\r\n\r\nWould you like tell me which is your depart ports in China and which is your destination ports?We will offer the best price for you.\r\n\r\n\r\nThanks&Best Regards,\r\n\r\nKroes     \r\npmtaking@163.com\r\n\r\n\r\nUnsubcribe Here     http://ilovu.top/unsubscribe-2/\r\n\r\n-------------------------------------------\r\nsubbisky.com\r\nhttps://subbisky.com\r\nSubbisky', '2022-05-20 19:55:38', '2022-05-20 19:55:38'),
(247, 'Lilly Pelzer', 'pmtaking@163.com', '06-59028675', 'Good day hope to find you well today,\r\n\r\nHope your business is going smoothly well in 2022,\r\n\r\nWe are the Class A freight forwarder from China. We have operations at several international sea ports around the world, and work with an established network of sea freight transport providers to ensure that your freight is transported via the most time and cost effective means. We support full and partial container loads, and handle all customs documents for countries of origin and destination. I got your email address through the Internet and hope to introduce ourselves through this opportunity.\r\n\r\nOUR ADVANTAGES:\r\n\r\n1,            Our service routes throughout the world\'s major ports (sea &air), can satisfy the customer\'s business requirements, On these routes from China,Asia to  European & American&Oceania , we can offer you the best service and prices.\r\n\r\n2,      Here below is our main services:\r\n\r\n           1). Air freight&Ocean freight forwarding (steady Air freight , FMC contracted sea freight for 20ft ,40ft and 40hq)\r\n\r\n            2). FBA shipping\r\n\r\n            3). Consolidation,Warehousing\r\n\r\n            4). Customs broker\r\n\r\n           5). Insurance\r\n\r\n           6). DDU&DDP Door to Door delivery shipping\r\n\r\n\r\nSome price for your reference:\r\nChina ports to the LA/West ports in the USA&Canada  :USD8,000-9,500/40HQ  (FMC NVOCC)\r\nChina ports to the NY/East ports in the USA: USD9,000-12,000/40HQ\r\nChina ports to Toronto,Montreal,East ports in Canada:USD12000-15000/40HQ\r\nChina ports to Australia Ports: USD4,000-6,500/40HQ\r\nChina ports to Europe Ports:USD8,500-10,500/40HQ\r\n\r\nAir freight from China to USA&Canada :+500kgs USD4.1-7.5/kgs\r\nAir freight from China to Europe (UK,Germany and so on):+500kgs USD4.5--7.5/kgs\r\n\r\nWould you like tell me which is your depart ports in China and which is your destination ports?We will offer the best price for you.\r\n\r\n\r\nThanks&Best Regards,\r\n\r\nKroes     \r\npmtaking@163.com\r\n\r\n\r\nUnsubcribe Here     http://ilovu.top/unsubscribe-2/\r\n\r\n-------------------------------------------\r\nsubbisky.com\r\nhttps://subbisky.com/\r\nSubbisky', 'Good day hope to find you well today,\r\n\r\nHope your business is going smoothly well in 2022,\r\n\r\nWe are the Class A freight forwarder from China. We have operations at several international sea ports around the world, and work with an established network of sea freight transport providers to ensure that your freight is transported via the most time and cost effective means. We support full and partial container loads, and handle all customs documents for countries of origin and destination. I got your email address through the Internet and hope to introduce ourselves through this opportunity.\r\n\r\nOUR ADVANTAGES:\r\n\r\n1,            Our service routes throughout the world\'s major ports (sea &air), can satisfy the customer\'s business requirements, On these routes from China,Asia to  European & American&Oceania , we can offer you the best service and prices.\r\n\r\n2,      Here below is our main services:\r\n\r\n           1). Air freight&Ocean freight forwarding (steady Air freight , FMC contracted sea freight for 20ft ,40ft and 40hq)\r\n\r\n            2). FBA shipping\r\n\r\n            3). Consolidation,Warehousing\r\n\r\n            4). Customs broker\r\n\r\n           5). Insurance\r\n\r\n           6). DDU&DDP Door to Door delivery shipping\r\n\r\n\r\nSome price for your reference:\r\nChina ports to the LA/West ports in the USA&Canada  :USD8,000-9,500/40HQ  (FMC NVOCC)\r\nChina ports to the NY/East ports in the USA: USD9,000-12,000/40HQ\r\nChina ports to Toronto,Montreal,East ports in Canada:USD12000-15000/40HQ\r\nChina ports to Australia Ports: USD4,000-6,500/40HQ\r\nChina ports to Europe Ports:USD8,500-10,500/40HQ\r\n\r\nAir freight from China to USA&Canada :+500kgs USD4.1-7.5/kgs\r\nAir freight from China to Europe (UK,Germany and so on):+500kgs USD4.5--7.5/kgs\r\n\r\nWould you like tell me which is your depart ports in China and which is your destination ports?We will offer the best price for you.\r\n\r\n\r\nThanks&Best Regards,\r\n\r\nKroes     \r\npmtaking@163.com\r\n\r\n\r\nUnsubcribe Here     http://ilovu.top/unsubscribe-2/\r\n\r\n-------------------------------------------\r\nsubbisky.com\r\nhttps://subbisky.com/\r\nwebsite', '2022-05-26 13:23:03', '2022-05-26 13:23:03'),
(248, 'Ada Howerton', 'pmtaking@163.com', '(02) 6603 3368', 'Good day hope to find you well today,\r\n\r\nHope your business is going smoothly well in 2022,\r\n\r\nWe are the Class A freight forwarder from China. We have operations at several international sea ports around the world, and work with an established network of sea freight transport providers to ensure that your freight is transported via the most time and cost effective means. We support full and partial container loads, and handle all customs documents for countries of origin and destination. I got your email address through the Internet and hope to introduce ourselves through this opportunity.\r\n\r\nOUR ADVANTAGES:\r\n\r\n1,            Our service routes throughout the world\'s major ports (sea &air), can satisfy the customer\'s business requirements, On these routes from China,Asia to  European & American&Oceania , we can offer you the best service and prices.\r\n\r\n2,      Here below is our main services:\r\n\r\n           1). Air freight&Ocean freight forwarding (steady Air freight , FMC contracted sea freight for 20ft ,40ft and 40hq)\r\n\r\n            2). FBA shipping\r\n\r\n            3). Consolidation,Warehousing\r\n\r\n            4). Customs broker\r\n\r\n           5). Insurance\r\n\r\n           6). DDU&DDP Door to Door delivery shipping\r\n\r\n\r\nSome price for your reference:\r\nChina ports to the LA/West ports in the USA&Canada  :USD8,000-9,500/40HQ  (FMC NVOCC)\r\nChina ports to the NY/East ports in the USA: USD9,000-12,000/40HQ\r\nChina ports to Toronto,Montreal,East ports in Canada:USD12000-15000/40HQ\r\nChina ports to Australia Ports: USD4,000-6,500/40HQ\r\nChina ports to Europe Ports:USD8,500-10,500/40HQ\r\n\r\nAir freight from China to USA&Canada :+500kgs USD4.1-7.5/kgs\r\nAir freight from China to Europe (UK,Germany and so on):+500kgs USD4.5--7.5/kgs\r\n\r\nWould you like tell me which is your depart ports in China and which is your destination ports?We will offer the best price for you.\r\n\r\n\r\nThanks&Best Regards,\r\n\r\nKroes     \r\npmtaking@163.com\r\n\r\n\r\nUnsubcribe Here     http://ilovu.top/unsubscribe-2/\r\n\r\n-------------------------------------------\r\nsubbisky.com\r\nhttps://subbisky.com\r\nSubbisky', 'Good day hope to find you well today,\r\n\r\nHope your business is going smoothly well in 2022,\r\n\r\nWe are the Class A freight forwarder from China. We have operations at several international sea ports around the world, and work with an established network of sea freight transport providers to ensure that your freight is transported via the most time and cost effective means. We support full and partial container loads, and handle all customs documents for countries of origin and destination. I got your email address through the Internet and hope to introduce ourselves through this opportunity.\r\n\r\nOUR ADVANTAGES:\r\n\r\n1,            Our service routes throughout the world\'s major ports (sea &air), can satisfy the customer\'s business requirements, On these routes from China,Asia to  European & American&Oceania , we can offer you the best service and prices.\r\n\r\n2,      Here below is our main services:\r\n\r\n           1). Air freight&Ocean freight forwarding (steady Air freight , FMC contracted sea freight for 20ft ,40ft and 40hq)\r\n\r\n            2). FBA shipping\r\n\r\n            3). Consolidation,Warehousing\r\n\r\n            4). Customs broker\r\n\r\n           5). Insurance\r\n\r\n           6). DDU&DDP Door to Door delivery shipping\r\n\r\n\r\nSome price for your reference:\r\nChina ports to the LA/West ports in the USA&Canada  :USD8,000-9,500/40HQ  (FMC NVOCC)\r\nChina ports to the NY/East ports in the USA: USD9,000-12,000/40HQ\r\nChina ports to Toronto,Montreal,East ports in Canada:USD12000-15000/40HQ\r\nChina ports to Australia Ports: USD4,000-6,500/40HQ\r\nChina ports to Europe Ports:USD8,500-10,500/40HQ\r\n\r\nAir freight from China to USA&Canada :+500kgs USD4.1-7.5/kgs\r\nAir freight from China to Europe (UK,Germany and so on):+500kgs USD4.5--7.5/kgs\r\n\r\nWould you like tell me which is your depart ports in China and which is your destination ports?We will offer the best price for you.\r\n\r\n\r\nThanks&Best Regards,\r\n\r\nKroes     \r\npmtaking@163.com\r\n\r\n\r\nUnsubcribe Here     http://ilovu.top/unsubscribe-2/\r\n\r\n-------------------------------------------\r\nsubbisky.com\r\nhttps://subbisky.com\r\nwebsite', '2022-05-27 14:25:43', '2022-05-27 14:25:43');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `checkin_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checkout_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_location` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `amenities` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bed_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_square_feet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `available_rooms` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `imageTwo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imageThree` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imageFour` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `childrenExtra` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '800',
  `adultExtra` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '800',
  `imageFive` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_block` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_block` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roomCapacity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '3',
  `priceDescription` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `seller_id`, `name`, `description`, `price`, `checkin_time`, `checkout_time`, `image`, `google_location`, `status`, `amenities`, `bed_size`, `room_square_feet`, `available_rooms`, `created_at`, `updated_at`, `imageTwo`, `imageThree`, `imageFour`, `childrenExtra`, `adultExtra`, `imageFive`, `from_block`, `to_block`, `roomCapacity`, `priceDescription`) VALUES
(21, 106, 'Coorg Homestay', 'Rooms available', 1500, '12:00 PM', '11:00 AM', '6267966a75f06.jpg', 'https://www.google.com/maps/dir//coorg+dial/data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0x3ba5007546c508b5:0x5f20dceb5534f701?sa=X&ved=2ahUKEwijtaiTkbH3AhXPp1YBHe6iB_4Q9Rd6BAhjEAU', 'Active', '4,8,7,5', 'King', '400', 4, '2022-04-26 01:21:22', '2022-04-26 01:21:22', '6267966a77045.jpg', '6267966a77500.jpg', '6267966a77961.jpg', '500', '1500', '6267966a7686b.jpg', NULL, NULL, '3', '1500 per head'),
(24, 119, 'Bendhu Bidara plantation stay', 'Located in  kadagadal .Estate walk .Bird watching ,campfire', 2000, '12:00 PM', '11:00 AM', '627f5e4913013.jpg', 'https://www.google.com/search?q=12.392189%2C75.779839&oq=12.392189%2C75.779839&aqs=chrome..69i57.28874j0j7&sourceid=chrome&ie=UTF-8', 'Inactive', '4,8,7,3', 'Queen', '250', 2, '2022-05-14 02:16:17', '2022-05-14 02:35:04', '627f5e4913aea.jpg', '627f5e4913dc1.jpg', '627f5e4914077.jpg', '1000', '2000', '627f5e49136d3.jpg', NULL, NULL, '5', '2000rs Per person inculding breckfast and dinner'),
(30, 125, 'gh', 'g', 6, '12:00 PM', '11:00 AM', '62945e2bc3e14.', 'h', 'Active', '[2, 4, 8, 7, 9, 6, 3, 5, 1]', 'Queen Size', '9', 3, '2022-05-30 00:33:23', '2022-05-30 00:33:23', '62945e2bc4342.', '62945e2bc4538.', '62945e2bc4707.', '69', '9', '62945e2bc413b.', NULL, NULL, '3', 'h'),
(32, 125, 'gh', 'g', 6, '12:00 PM', '11:00 AM', '62945e3d75d20.', 'h', 'Active', '[2, 4, 8, 7, 9, 6, 3, 5, 1]', 'Queen Size', '9', 3, '2022-05-30 00:33:41', '2022-05-30 00:33:41', '62945e3d762cd.', '62945e3d764f0.', '62945e3d76727.', '69', '9', '62945e3d76076.', NULL, NULL, '3', 'h'),
(33, 125, 'b', 'bb', 9, '12:00 PM', '11:00 AM', '6294622fdae3e.', 'bb', 'Active', '[2, 4, 8, 7, 6, 5, 3, 1]', 'Queen Size', '8', 8, '2022-05-30 00:50:31', '2022-05-30 00:50:31', '6294622fdbe98.', '6294622fdc396.', '6294622fdc9e7.', '9', '9', '6294622fdb9b8.', NULL, NULL, '9', 'b'),
(34, 125, 'b', 'bb', 9, '12:00 PM', '11:00 AM', '6294623b0ff27.', 'bb', 'Active', '[2, 4, 8, 7, 6, 5, 3, 1]', 'Queen Size', '8', 8, '2022-05-30 00:50:43', '2022-05-30 00:50:43', '6294623b1057b.', '6294623b107d8.', '6294623b10a60.', '9', '9', '6294623b10372.', NULL, NULL, '9', 'b');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_06_30_015601_create_roles_table', 1),
(5, '2020_11_05_070816_create_banners_table', 2),
(6, '2021_06_30_051058_create_services_table', 3),
(7, '2021_06_30_095641_create_cities_table', 4),
(9, '2021_07_03_042234_create_categories_table', 5),
(10, '2021_07_02_103937_create_sellers_table', 6),
(11, '2021_07_03_075902_create_products_table', 7),
(12, '2021_07_15_022155_create_carts_table', 8),
(13, '2021_07_15_050617_create_order_lists_table', 9),
(14, '2021_07_15_050833_create_orders_table', 9),
(15, '2021_07_17_093921_create_quotes_table', 10),
(16, '2021_07_17_102539_create_reviews_table', 11),
(17, '2021_07_17_113948_create_wallets_table', 12),
(18, '2021_07_17_120154_create_banks_table', 13),
(19, '2016_06_01_000001_create_oauth_auth_codes_table', 14),
(20, '2016_06_01_000002_create_oauth_access_tokens_table', 14),
(21, '2016_06_01_000003_create_oauth_refresh_tokens_table', 14),
(22, '2016_06_01_000004_create_oauth_clients_table', 14),
(23, '2016_06_01_000005_create_oauth_personal_access_clients_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('002969a2c1deba3895bc4e84a53fd0cf3361578c87fc5d16869c223070b619473d591ecc84161e5c', 67, 1, 'Personal Access Token', '[]', 0, '2021-11-22 04:43:12', '2021-11-22 04:43:12', '2022-11-22 10:13:12'),
('00e93a1e14e1aded38251db01f4526f64dca166dca35e6a209154dcb954d5c6f6c93d2ef99109857', 66, 1, 'Personal Access Token', '[]', 1, '2022-01-16 23:15:10', '2022-01-16 23:15:10', '2023-01-17 04:45:10'),
('01b9c8cf9e5a0803baf3187e3228f01f4a3347bc5d314564ad9a7ed1e7c041cccfdf947429a7377f', 66, 1, 'Personal Access Token', '[]', 0, '2021-12-29 00:39:26', '2021-12-29 00:39:26', '2022-01-05 06:09:26'),
('023eb01815240856625e4504812d98aec4b7fe712e0a52e7b43d23e2bb91c075864db04dbf3a92a6', 16, 1, 'Personal Access Token', '[]', 0, '2021-10-12 00:57:05', '2021-10-12 00:57:05', '2021-10-19 06:27:06'),
('0278950793a05f903ab84d673e281d1838e42813d68869769d611aca7a3103ef549f609b37407a3d', 69, 1, 'Personal Access Token', '[]', 0, '2021-12-18 10:24:27', '2021-12-18 10:24:27', '2022-12-18 15:54:27'),
('02afd7806f71956a9a6220de0a3af0b6e8e8c511373e954eac740f497c5c239d65d7683ec3ab2225', 72, 1, 'Personal Access Token', '[]', 1, '2022-01-17 01:22:54', '2022-01-17 01:22:54', '2023-01-17 06:52:54'),
('02e89c12869c294768d6ee562cb31a196ad2fa1678bd57ad994820fd999fb11a26b8af28113c8394', 72, 1, 'Personal Access Token', '[]', 0, '2022-01-12 08:49:17', '2022-01-12 08:49:17', '2023-01-12 14:19:17'),
('03b1d52a1299caded2ad9efc119fd6eabcadbfbe162c6c4f425c1600856a29afd81ca1eb7b090d0d', 146, 1, 'Personal Access Token', '[]', 1, '2021-12-03 02:51:02', '2021-12-03 02:51:02', '2022-12-03 08:21:02'),
('03b2c689e55ba17be3b691b4fef55791e8074cbdeae1bef8d889385f86b281a4ec228e42e8a250f7', 101, 1, 'Personal Access Token', '[]', 1, '2021-11-17 03:51:26', '2021-11-17 03:51:26', '2021-11-24 09:21:26'),
('046c6081bbc2c06397afd7456d8e38110cd9682f3c24f4ab5d84c70746fb2e367b90350418f3bc59', 101, 1, 'Personal Access Token', '[]', 0, '2021-11-16 07:07:21', '2021-11-16 07:07:21', '2021-11-23 12:37:21'),
('04eada023c5d89ab62041c48743b95ab0c12698b0e11f47cb003f554851418d0f7075ee60ce6c47a', 146, 1, 'Personal Access Token', '[]', 1, '2021-11-29 00:48:03', '2021-11-29 00:48:03', '2022-11-29 06:18:03'),
('04ef82ac0c3fd1e64575742c194f1a4e4b16652e9f14a527dd9b16e1cc699cf944a01b790526a06a', 117, 1, 'Personal Access Token', '[]', 1, '2021-11-17 06:15:01', '2021-11-17 06:15:01', '2022-11-17 11:45:01'),
('0503d382b1f0de654e40696d68fccce0ef3f248c9a3daf434a516ca6afb4a62f6b252cac741dfcbb', 66, 1, 'Personal Access Token', '[]', 1, '2021-12-29 04:09:02', '2021-12-29 04:09:02', '2022-12-29 09:39:02'),
('05fa911e2639dbd629bf2a78ed782cb5c250ad83f081a088a01d21723555be5ae8c8dfdcb77681eb', 72, 1, 'Personal Access Token', '[]', 1, '2022-01-17 05:58:55', '2022-01-17 05:58:55', '2023-01-17 11:28:55'),
('060261756190228cff2b30317625345fd3a46f78aea9b15cbd976a9c4a53a23d9a1bd5894812c703', 146, 1, 'Personal Access Token', '[]', 0, '2021-11-30 04:07:57', '2021-11-30 04:07:57', '2021-12-07 09:37:57'),
('0624d6a2ea21b9521ab524afdd0a195db34bd51fb661775bffe8d99728b4535e6587dc6d2d4c3dc2', 69, 1, 'Personal Access Token', '[]', 0, '2021-12-18 10:24:27', '2021-12-18 10:24:27', '2022-12-18 15:54:27'),
('07135167506fb6ff352280c7e001d810a6527623db7a2c2f9fca1bbc6fadb7aabba206410674b9f2', 123, 1, 'Personal Access Token', '[]', 0, '2021-11-20 06:23:36', '2021-11-20 06:23:36', '2022-11-20 11:53:36'),
('08605968e961b3106874e9451607d53791a2133dea211cf2ab71077606fa127948009710b7973fa0', 123, 1, 'Personal Access Token', '[]', 1, '2021-11-21 02:37:56', '2021-11-21 02:37:56', '2022-11-21 08:07:56'),
('0987676e6ab90edf397236c63109a050e2ffb9aca1cb72b2c4041ddbcd730b804e6cccf413cdffb9', 146, 1, 'Personal Access Token', '[]', 1, '2021-12-06 04:16:26', '2021-12-06 04:16:26', '2022-12-06 09:46:26'),
('09e58020a41e3264d9247e9fae0381f0e996be470e73fc1a81624d7d44e8d8f9682e49c00cfe0203', 67, 1, 'Personal Access Token', '[]', 1, '2021-12-17 20:59:30', '2021-12-17 20:59:30', '2022-12-18 02:29:30'),
('0a0fae25830ba226aea4243b9706e7439025db061431af758add5c6969ae8d31505308efae409f5c', 73, 1, 'Personal Access Token', '[]', 0, '2022-01-06 09:12:16', '2022-01-06 09:12:16', '2023-01-06 14:42:16'),
('0a148346dac6cc35b9b35d38505245660c9f1c176c6c2dc27a30cdccb3294b093546419f15991dd6', 66, 1, 'Personal Access Token', '[]', 0, '2021-12-06 03:08:21', '2021-12-06 03:08:21', '2021-12-13 08:38:21'),
('0a8bb00aac8137a0a6d6711a1ecb6af3360ee127b1950bf36e451e3c5de25ef1ec2ed59a52d81dfa', 66, 1, 'Personal Access Token', '[]', 1, '2021-11-09 07:36:21', '2021-11-09 07:36:21', '2022-11-09 13:06:21'),
('0adf80080306f58c6c1241c75315432b066402d9aa0667b979f71495e153cfc30e0ceeae48441717', 70, 1, 'Personal Access Token', '[]', 1, '2022-01-27 01:03:57', '2022-01-27 01:03:57', '2023-01-27 06:33:57'),
('0b13bf34c1583f79fcda16680a6936fb0e39d941f6f5dfe41845f6da7da8d2a0591444230cc8c072', 218, 1, 'Personal Access Token', '[]', 1, '2022-05-13 22:56:37', '2022-05-13 22:56:37', '2023-05-14 04:26:37'),
('0b90b79944f75786c977a2de9d0737e9d345cebea4989d348afbaa9c6bc1ab560deb2a42f5b55e16', 72, 1, 'Personal Access Token', '[]', 1, '2021-12-31 08:19:11', '2021-12-31 08:19:11', '2022-12-31 13:49:11'),
('0b9c258741d909cdfe1d1189555c492b1ea7fa5b98ecdd3c8840ed002c789036ae4c2ca12f048028', 69, 1, 'Personal Access Token', '[]', 1, '2022-01-21 00:34:18', '2022-01-21 00:34:18', '2023-01-21 06:04:18'),
('0c28bcc98bba46bcdb733e882419b800219b698cc1dc00ba877a13aebcf0b478cfbcf40169371332', 66, 1, 'Personal Access Token', '[]', 0, '2022-01-02 19:35:56', '2022-01-02 19:35:56', '2023-01-03 01:05:56'),
('0c6440c566efed9805d33e3078c92a4dcba5a931319e6ba089752d11fe2be36c323de05a9fb7a6d8', 123, 1, 'Personal Access Token', '[]', 0, '2021-11-20 06:31:25', '2021-11-20 06:31:25', '2022-11-20 12:01:25'),
('0c8fa5a2d71c3f1fd1544ddfe899bfc713771e133a1cb70c69f68cb0ed58651bea141c0989466ab7', 123, 1, 'Personal Access Token', '[]', 1, '2021-12-10 06:13:57', '2021-12-10 06:13:57', '2022-12-10 11:43:57'),
('0ca5252c349fe742e866bede3d8a15b2a8c850eefab13575a0e8a15f6beccdec3c5f3c861504832b', 218, 1, 'Personal Access Token', '[]', 1, '2022-03-04 02:18:51', '2022-03-04 02:18:51', '2023-03-04 07:48:51'),
('0cdfda45c648fb0f50f53f81187f4dd22e7ba901f48f89ed80db08ff864305c3cef3012e69dea3f9', 5, 1, 'Personal Access Token', '[]', 0, '2021-10-12 05:12:21', '2021-10-12 05:12:21', '2021-10-19 10:42:21'),
('0d4012beb68980db297ffb8563b7be88215b481513870854a2b23650ea907b8f645b8814f226f2d8', 69, 1, 'Personal Access Token', '[]', 0, '2022-01-21 04:51:55', '2022-01-21 04:51:55', '2023-01-21 10:21:55'),
('0d45df4945953f10c55cb6e514dba72e210a5cc1d3474823a531466176dc1c19e87febf3937f2fc5', 123, 1, 'Personal Access Token', '[]', 0, '2021-11-20 07:35:14', '2021-11-20 07:35:14', '2022-11-20 13:05:14'),
('0dfdba223e4bf55ec53fe9a4b238ac1841de2cbc1fc23454089f4f3c58a42d5b92f337ffa0365045', 94, 1, 'Personal Access Token', '[]', 1, '2021-12-04 00:04:29', '2021-12-04 00:04:29', '2022-12-04 05:34:29'),
('0e25d3d39d092283e6a01b6dd7dcd1583902d2b29ea4db68d829c8adc30717a94957c3f3d5c95d3f', 225, 1, 'Personal Access Token', '[]', 0, '2022-03-09 22:38:09', '2022-03-09 22:38:09', '2022-03-17 04:08:09'),
('0e6178247010e54db0a7277060011a74e73f5de11f3fa10156a56b1222a76f03eac9f3a65c73964f', 67, 1, 'Personal Access Token', '[]', 1, '2021-11-22 01:50:50', '2021-11-22 01:50:50', '2022-11-22 07:20:50'),
('0f30ffa4b5499795dc7d09a6220e5056a91923150cdfaee9272c7823dfaee4e17963ad7015a1efa6', 123, 1, 'Personal Access Token', '[]', 1, '2021-11-21 02:52:23', '2021-11-21 02:52:23', '2022-11-21 08:22:23'),
('115299c0b02c34b79a852f8c533595e3446c166daee28be1008ed33a1e20cc58179246ad19f1703c', 94, 1, 'Personal Access Token', '[]', 1, '2021-12-10 00:03:02', '2021-12-10 00:03:02', '2022-12-10 05:33:02'),
('11645e788db293ac0b18cca3ce68d65623f77fbe987c3b7c12f4411e1409a2cca5c4e412f7e953a7', 220, 1, 'Personal Access Token', '[]', 0, '2022-03-02 10:29:06', '2022-03-02 10:29:06', '2023-03-02 15:59:06'),
('11a3b8342d3ea7918619e843e9b74201e7271beffedb14953bf13b89a39382798b3234b0ccea31e4', 227, 1, 'Personal Access Token', '[]', 1, '2022-03-02 23:45:41', '2022-03-02 23:45:41', '2023-03-03 05:15:41'),
('11c1a5c4653192a85eb0ee62957fe44326fd9b187b9b18b81952ed404be25781cb5ea430fe8f33d5', 69, 1, 'Personal Access Token', '[]', 1, '2022-01-18 00:05:16', '2022-01-18 00:05:16', '2023-01-18 05:35:16'),
('128249d62d482972948c125ebf17c3ebedcaa00b9a40eb29dc123fc1e1222aad1768a52428269021', 190, 1, 'Personal Access Token', '[]', 0, '2021-12-30 05:29:11', '2021-12-30 05:29:11', '2022-12-30 10:59:11'),
('135b3bbe8d6a43b91a72075470546bdc6c05dbd899d89e7a4a24d19afb3d9d06a8fc670c1f23a674', 146, 1, 'Personal Access Token', '[]', 0, '2021-11-29 06:24:16', '2021-11-29 06:24:16', '2022-11-29 11:54:16'),
('13ea449e423a46226f232b63d810cfac580763d45b858a6ab1a8e3548b083eb2a1ffffd8ae7827a7', 72, 1, 'Personal Access Token', '[]', 0, '2022-01-05 04:13:51', '2022-01-05 04:13:51', '2023-01-05 09:43:51'),
('141b90d0d5346b5e75d3d819473dd28e0e62ffc8d35218b5e1d1f4f165b512c6ee798ea093f44f6d', 72, 1, 'Personal Access Token', '[]', 0, '2022-01-03 09:13:03', '2022-01-03 09:13:03', '2023-01-03 14:43:03'),
('146ab311eab3553b1f763203c8b6ae4157fd227be7b0f4e70f237d4ee9a4406b30efd8970035c5d8', 84, 1, 'Personal Access Token', '[]', 0, '2021-12-22 03:20:01', '2021-12-22 03:20:01', '2022-12-22 08:50:01'),
('1474efc18d248b8974eccf2368897b78e908af67688e906803ff8a8c65bb6ebc456500f1a30b7277', 220, 1, 'Personal Access Token', '[]', 1, '2022-02-25 05:09:25', '2022-02-25 05:09:25', '2023-02-25 10:39:25'),
('158b401984719fb0a68ff058b384a30f69114fa0507a668abbf3c56f4a12dac23e1eed8b4f3c6a4b', 117, 1, 'Personal Access Token', '[]', 0, '2021-11-17 06:15:00', '2021-11-17 06:15:00', '2022-11-17 11:45:00'),
('15a54d1cbf6b2d3dddaacffba427ad6527313911cb0a02ef8fdd01e8638374949b2c9a39c5b68001', 225, 1, 'Personal Access Token', '[]', 1, '2022-02-25 01:08:24', '2022-02-25 01:08:24', '2023-02-25 06:38:24'),
('15bf8d81cf0b37b36dcfe3a10dcdfacd37f27d97475bc9181329a8c1d48e80106307e53c28714461', 220, 1, 'Personal Access Token', '[]', 0, '2022-03-07 09:00:35', '2022-03-07 09:00:35', '2023-03-07 14:30:35'),
('15c2568604e7d0abf5379f2908fa807f8675836115c7657bb726868da4be7c93ef467b090babd264', 66, 1, 'Personal Access Token', '[]', 0, '2022-01-16 23:06:59', '2022-01-16 23:06:59', '2023-01-17 04:36:59'),
('15f98c68780d3691cd645ca439b5c4bb495aa0f69050123d9a4095ac18166a410a9fc727d803a3a4', 67, 1, 'Personal Access Token', '[]', 0, '2021-11-24 03:03:05', '2021-11-24 03:03:05', '2022-11-24 08:33:05'),
('161bcefef16b9267776d4a30d604b05975e6698df7da8ca108a091ba5f9e7920a00a845e72c71562', 123, 1, 'Personal Access Token', '[]', 1, '2021-11-21 02:50:34', '2021-11-21 02:50:34', '2022-11-21 08:20:34'),
('1701a775f5e5ecd5bbf1a2c030837d6299f61d96053eba703d013e5727af625b8766a9be9e2bf5e6', 69, 1, 'Personal Access Token', '[]', 0, '2021-12-21 08:54:49', '2021-12-21 08:54:49', '2022-12-21 14:24:49'),
('17170d45adae007b61c5f4b1d887571ca9d67f5a65d673bafece4b626d1b940407803de4d8c9e36b', 123, 1, 'Personal Access Token', '[]', 1, '2021-11-20 06:00:36', '2021-11-20 06:00:36', '2022-11-20 11:30:36'),
('17d05cf9194f1997025f867580bc5f8b0b70abfdf6a9cdbc1e640998b1eb24c16ad6936e28334427', 66, 1, 'Personal Access Token', '[]', 1, '2021-12-29 04:19:47', '2021-12-29 04:19:47', '2022-12-29 09:49:47'),
('17d98ac3838f11f30b66167085e26ff53b1d37deafc24e0e3ed0b746a0874bdb20ad128fddc6b592', 69, 1, 'Personal Access Token', '[]', 1, '2022-02-02 23:11:43', '2022-02-02 23:11:43', '2023-02-03 04:41:43'),
('17fd7c042cbfc00cf6a26855f14af3c0490f5ffb18e47f0c585581da5e87a775014e92046ee483aa', 66, 1, 'Personal Access Token', '[]', 1, '2022-01-14 00:16:54', '2022-01-14 00:16:54', '2023-01-14 05:46:54'),
('180dcea97d197809a003ead20ff81a84af9924f3da34d10c1283a59e2ace3e0302f31dd5b857fa89', 67, 1, 'Personal Access Token', '[]', 0, '2021-11-23 02:38:38', '2021-11-23 02:38:38', '2022-11-23 08:08:38'),
('1853d09ec1ffb9a0ecc3f89355156347e07510e8c340cde171781370020ae693f9dd4fc34eb4cf42', 69, 1, 'Personal Access Token', '[]', 0, '2022-02-02 23:13:01', '2022-02-02 23:13:01', '2023-02-03 04:43:01'),
('18e24756483b0a83b3c0255ed322e98fcd134f0c7a19bffe87cb743531ef96da36fcc94965c6a68b', 66, 1, 'Personal Access Token', '[]', 0, '2022-01-16 23:15:08', '2022-01-16 23:15:08', '2023-01-17 04:45:08'),
('191bd47e7c73d8ac93fddb01c23a0bf39d2f9eefc7dbd673f09c8dd17469dc976a6ae2562dcddded', 67, 1, 'Personal Access Token', '[]', 0, '2021-11-27 00:46:03', '2021-11-27 00:46:03', '2022-11-27 06:16:03'),
('193e32b503fa67a45b4e9a7275193f3b33d051a62bcbc35d9c92a45370c8ae0643c40f0474abc396', 218, 1, 'Personal Access Token', '[]', 0, '2022-05-13 22:56:15', '2022-05-13 22:56:15', '2023-05-14 04:26:15'),
('194bdd6480c64a4cbe6f2935b7e5d0ddf1a2e6c744f06696a90d15b56b927ce22f26eb85ad5078b2', 218, 1, 'Personal Access Token', '[]', 1, '2022-02-26 00:03:25', '2022-02-26 00:03:25', '2023-02-26 05:33:25'),
('19e74ff016b07c4b0a36f91fb3e8962251d820d5891d83d56a8de35db379ed2e076c801023856c34', 66, 1, 'Personal Access Token', '[]', 1, '2021-12-02 06:28:44', '2021-12-02 06:28:44', '2022-12-02 11:58:44'),
('1a3e88dbdf558b84fba41606723d51e2530c72ba7e95b89545fd41db0266805ecb0d07afe324b175', 146, 1, 'Personal Access Token', '[]', 0, '2021-11-18 07:20:01', '2021-11-18 07:20:01', '2021-11-25 12:50:01'),
('1aba5fd3d3252d010a8eedf8cd0768e51d2f3a12b3b4cc0962d84fb415f819b21d1f03df333d971a', 66, 1, 'Personal Access Token', '[]', 1, '2021-10-22 02:14:55', '2021-10-22 02:14:55', '2022-10-22 07:44:55'),
('1abd57d1256f109ce76063ce4a00591f34da31b28e81cbb0fc451776182997c57ce7da38f7a74075', 220, 1, 'Personal Access Token', '[]', 1, '2022-03-07 09:08:31', '2022-03-07 09:08:31', '2023-03-07 14:38:31'),
('1ad3ff93cb2290c54a55c0a90c9743efc0a66910b416fbeb7d23eb8adbf12343224c84787097cc61', 227, 1, 'Personal Access Token', '[]', 1, '2022-02-25 05:51:37', '2022-02-25 05:51:37', '2023-02-25 11:21:37'),
('1b02e435d7abaf79d8af401f8f532777a48daa2c4c6a8acbc5702526135fe4206af2990f22ec49aa', 66, 1, 'Personal Access Token', '[]', 0, '2022-01-17 01:04:51', '2022-01-17 01:04:51', '2022-01-24 06:34:51'),
('1b0ab722084980f72ab0d7e7e95632d60913cd76873828a4e623d2f8d754de8257b3fc2eb7533eab', 123, 1, 'Personal Access Token', '[]', 1, '2021-11-22 04:44:44', '2021-11-22 04:44:44', '2022-11-22 10:14:44'),
('1b359578171c0716b5779857987e803ff6fee769b22a6bec80dcc184adec5a19a4acdd056594c06c', 5, 1, 'Personal Access Token', '[]', 0, '2021-10-12 03:06:25', '2021-10-12 03:06:25', '2021-10-19 08:36:25'),
('1bd5aa628e279aae02a293a45f74900cec301041ee2c0d08e76f9dbe3d78ef4caea45af037d5432f', 66, 1, 'Personal Access Token', '[]', 1, '2022-01-03 08:43:47', '2022-01-03 08:43:47', '2023-01-03 14:13:47'),
('1c1f85643d3db762fce26553dd3f466a116a7fb1230ba23eca4af6ffece4acd80be2d12c7be1914f', 73, 1, 'Personal Access Token', '[]', 0, '2022-01-06 09:12:16', '2022-01-06 09:12:16', '2023-01-06 14:42:16'),
('1c408e5b80dddc58c918a7f98e3e912cb2a719a811967a133224d616a977b4f64c374148f3499a19', 66, 1, 'Personal Access Token', '[]', 1, '2021-12-06 06:35:21', '2021-12-06 06:35:21', '2022-12-06 12:05:21'),
('1e789125f3e364ce13df02eb02033b889fa0cc75096e8d4ddd72164431f2f80a0568288626b8ea59', 5, 1, 'Personal Access Token', '[]', 0, '2021-10-02 04:57:21', '2021-10-02 04:57:21', '2022-10-02 10:27:21'),
('1eb36a464ab712c970b78f932f02cbc651bf3394f140cf1e57a494372b13d9dc1fc01cd2ad62458d', 220, 1, 'Personal Access Token', '[]', 1, '2022-02-07 00:52:57', '2022-02-07 00:52:57', '2023-02-07 06:22:57'),
('1f1df4210027ccf7bd6fce6000863ee8c63cb4f330156ebe797349485280952882886686a60a6083', 262, 1, 'Personal Access Token', '[]', 1, '2022-05-23 03:38:00', '2022-05-23 03:38:00', '2023-05-23 09:08:00'),
('1f5d6ecf3f68edee35c439e5253994e5bb10d36bb5f8621844e673c286e949163f03fa0de4ccadf5', 123, 1, 'Personal Access Token', '[]', 1, '2021-11-27 04:48:45', '2021-11-27 04:48:45', '2022-11-27 10:18:45'),
('2008de9ea14300aedd5ea81e38e4a9391c6327b8684a499c7a0416c16e40f5a48df632d3a2e63ee1', 227, 1, 'Personal Access Token', '[]', 0, '2022-03-02 04:03:32', '2022-03-02 04:03:32', '2023-03-02 09:33:32'),
('204038e6753cbedd5bc7fa0f286273a407ed8e5a2d59efb908d62df1f861b4c991adf1472dbb56b4', 72, 1, 'Personal Access Token', '[]', 1, '2022-01-13 00:33:04', '2022-01-13 00:33:04', '2023-01-13 06:03:04'),
('20a1e6ec212731417714cd0a7f3a5a747f3e2d712e3c57cd2ab15bb7c4d146204377bb167d9ba7f2', 67, 1, 'Personal Access Token', '[]', 1, '2021-11-10 04:30:04', '2021-11-10 04:30:04', '2022-11-10 10:00:04'),
('20dcb98d5065255e96f69da32980d8b2aa28407f278fc0e919c54baa7fb44be6d40539891177e96e', 178, 1, 'Personal Access Token', '[]', 0, '2021-11-29 00:47:40', '2021-11-29 00:47:40', '2022-11-29 06:17:40'),
('20fdf55e0e62979ccd7b21e700f8fcc77719d2ba3322773bb66c23cff6a265dbed67cf875b468f37', 218, 1, 'Personal Access Token', '[]', 1, '2022-03-04 23:19:43', '2022-03-04 23:19:43', '2023-03-05 04:49:43'),
('212cefb7321d6b2e134eafc578489d7a17712df1be21bd9552dd78348fa8128967736bffce90b912', 69, 1, 'Personal Access Token', '[]', 1, '2022-01-06 09:07:32', '2022-01-06 09:07:32', '2023-01-06 14:37:32'),
('21ced47549ff02b5ff2ea5c7f8e6102b7ebda9626f9270c407a619357bece1f8b67cf00b780b8fea', 66, 1, 'Personal Access Token', '[]', 0, '2021-11-18 02:08:25', '2021-11-18 02:08:25', '2021-11-25 07:38:25'),
('224ac4a76acd38b34af630e81001d8005a8e1770854a3ab41ada0ef9e119bb6f48af5b4eb5b6356c', 123, 1, 'Personal Access Token', '[]', 1, '2021-11-23 00:06:32', '2021-11-23 00:06:32', '2022-11-23 05:36:32'),
('2284c8626be2864ad7cf67015c81458e3fb133332ccad046d2524ad640121f04b68d829dd3954873', 72, 1, 'Personal Access Token', '[]', 0, '2022-01-04 00:39:35', '2022-01-04 00:39:35', '2023-01-04 06:09:35'),
('232bccbaad4affaa50294c7940efb533e372d61b593e60a37d2ad009e7c473caf3c37dfb5ea30aa2', 66, 1, 'Personal Access Token', '[]', 0, '2021-11-10 01:25:34', '2021-11-10 01:25:34', '2022-11-10 06:55:34'),
('23d507826c23c57bd96b5740cf4a7dc8168a487e7adf145c3a6d7339985a2897cca0b944bc70604c', 66, 1, 'Personal Access Token', '[]', 1, '2022-01-13 00:04:08', '2022-01-13 00:04:08', '2023-01-13 05:34:08'),
('246431ba66fe09c8d511b3cd077e1cff3aba1d80cbe0bce00537c201ae5384b9c32eadb2e7b70f66', 220, 1, 'Personal Access Token', '[]', 1, '2022-03-02 09:12:54', '2022-03-02 09:12:54', '2023-03-02 14:42:54'),
('246cca01b728b2d5cfeeb93c7bb864b693a366575529bb9c4b030a3792a13e0f1b8c3ce4e20a85b7', 262, 1, 'Personal Access Token', '[]', 0, '2022-05-23 09:34:29', '2022-05-23 09:34:29', '2023-05-23 15:04:29'),
('254fbdca5469ac5228c75be4e17daa0ec396b326d79586e68ab057f86f1d5161c02671cd508a799f', 66, 1, 'Personal Access Token', '[]', 1, '2021-12-08 04:43:45', '2021-12-08 04:43:45', '2022-12-08 10:13:45'),
('2576f242297e591068a580b3e3418e30e76d61a3fff42c24c059507e6e32bd92323055a4d31313c1', 66, 1, 'Personal Access Token', '[]', 1, '2022-01-17 01:03:33', '2022-01-17 01:03:33', '2023-01-17 06:33:33'),
('25aa52aad5ea1bfef575623a9203255f94a81bfbad94f64727a3c68df005420112b6096e4ef82077', 69, 1, 'Personal Access Token', '[]', 0, '2022-01-06 03:03:58', '2022-01-06 03:03:58', '2023-01-06 08:33:58'),
('266f8e05b8d2f9cb162f63b6666a7ba5f4b9f30587a90d0ff4d13c6c8b9dcaca73fc0bad263fdce1', 260, 1, 'Personal Access Token', '[]', 1, '2022-05-23 05:59:17', '2022-05-23 05:59:17', '2023-05-23 11:29:17'),
('272b212dcf5f3c4d2adf34aec2508d1b37fc9ba0f05ecfe8f224c16b80aaf864d6e6c124d47c66ec', 146, 1, 'Personal Access Token', '[]', 0, '2021-11-19 01:10:43', '2021-11-19 01:10:43', '2022-11-19 06:40:43'),
('289fcdebf395ad3ff44efbf751d015df9615aeef03440c18a198854042762fc4432495f95ecd8f53', 72, 1, 'Personal Access Token', '[]', 1, '2021-12-31 08:43:56', '2021-12-31 08:43:56', '2022-12-31 14:13:56'),
('28dcc426a237f78b0cbe1e6f253af5f584098255eaf28306565bd7e1858930fcde2aa015c4146d77', 178, 1, 'Personal Access Token', '[]', 0, '2021-12-01 04:39:09', '2021-12-01 04:39:09', '2021-12-08 10:09:09'),
('2905ef619e05f5af40d92b8ed5ab31ca5d9b57b91b8616b51456af706fd1b8331ca138ddb7985d99', 123, 1, 'Personal Access Token', '[]', 0, '2021-12-03 00:14:15', '2021-12-03 00:14:15', '2022-12-03 05:44:15'),
('291daf3234e7053a9629060b2488c61de0ef2f694262d193af0b75876044a118510ef3436228f5d0', 72, 1, 'Personal Access Token', '[]', 1, '2021-12-31 08:48:12', '2021-12-31 08:48:12', '2022-12-31 14:18:12'),
('2a0b26100d47916b49a83598a27267538dbb4f53feb456e6ba0dec302dea882eb66c6acf910151c7', 66, 1, 'Personal Access Token', '[]', 0, '2021-12-10 06:04:26', '2021-12-10 06:04:26', '2022-12-10 11:34:26'),
('2a6c2c2293671f5d151252ba79bfa037ab473416b6bc460e4c3c14caee5c603055219952ddf0009b', 262, 1, 'Personal Access Token', '[]', 1, '2022-05-19 07:16:50', '2022-05-19 07:16:50', '2023-05-19 12:46:50'),
('2ad139c0e85bc2b4d0c8ae4a1accc26add478d343873a3211ce2dc32cb6ddfb3b57d2bab1725c5f4', 72, 1, 'Personal Access Token', '[]', 1, '2022-01-04 01:30:06', '2022-01-04 01:30:06', '2023-01-04 07:00:06'),
('2aebb96245207e1e68d2fdc917cf8e48fe220dfab61485d2bb8ed28be53f9af876a11cd337a63f51', 69, 1, 'Personal Access Token', '[]', 1, '2022-01-27 01:36:54', '2022-01-27 01:36:54', '2023-01-27 07:06:54'),
('2b1aaa9a0831fb5485bba6056b0259ba29375189ca66668a5559ddb650b29b44093891e9b33bc043', 217, 1, 'Personal Access Token', '[]', 1, '2022-02-20 23:29:59', '2022-02-20 23:29:59', '2023-02-21 04:59:59'),
('2b2668f8321de70078348f51b827e836006507d3f09da9d529a88043c5472236926f4bb358fb1407', 66, 1, 'Personal Access Token', '[]', 1, '2021-12-10 07:49:33', '2021-12-10 07:49:33', '2022-12-10 13:19:33'),
('2ba033cc687f1278c93ae4f5c5d41df13da00da2722a1f62410f314a09f87e4c85ea1b01cc2710f6', 5, 1, 'Personal Access Token', '[]', 0, '2021-10-02 04:56:07', '2021-10-02 04:56:07', '2022-10-02 10:26:07'),
('2c1d6f86a07525bbd0b042328c4000666d4caae34c8a5c8edbe1990578255d06a72f6a2f2f340e74', 225, 1, 'Personal Access Token', '[]', 1, '2022-02-24 19:49:45', '2022-02-24 19:49:45', '2023-02-25 01:19:45'),
('2c3f1b54e8aee4a737ae34f1b18c6277454adf0eb30ec7ab810ea95f84c9adf6788ad8170a7370fc', 5, 1, 'Personal Access Token', '[]', 0, '2021-10-10 07:08:09', '2021-10-10 07:08:09', '2022-10-10 12:38:09'),
('2c631e67ea084d3278653950349099257360f27b9911ccc87ac6f86a370e9dac09a08c2eedfc2397', 220, 1, 'Personal Access Token', '[]', 0, '2022-03-02 20:04:04', '2022-03-02 20:04:04', '2023-03-03 01:34:04'),
('2ca7ae0d3a51a28db0d5004d37bebb0a04036e15a48ae486eda6abd7b935ae05fb572aaa53b89c48', 123, 1, 'Personal Access Token', '[]', 0, '2021-11-18 04:15:10', '2021-11-18 04:15:10', '2022-11-18 09:45:10'),
('2cfeaca0c78348c86dccbd99ba6cbc37987b71c0b1280cb903bb9ee94f61b1f2340eb71e9074af4a', 5, 1, 'Personal Access Token', '[]', 0, '2021-10-02 05:21:00', '2021-10-02 05:21:00', '2022-10-02 10:51:00'),
('2dacfacae54b6b8de352aee1414ef5fbad6f89c231c632c53ebe11c8b6d4b2dcf0c529de6fc6f2cd', 48, 1, 'Personal Access Token', '[]', 0, '2021-10-12 00:46:11', '2021-10-12 00:46:11', '2022-10-12 06:16:11'),
('2dda0a6524def53623d1fb81afefc1ed4c9557992c646c15634a8b039ac1c50e283483cabb746ac9', 101, 1, 'Personal Access Token', '[]', 0, '2021-11-16 07:08:35', '2021-11-16 07:08:35', '2022-11-16 12:38:35'),
('2e0b71ec09efb0c973fa1b66e94abcb29113d4b35d8e788f28f4898ec93efd28d81331699c6fde75', 220, 1, 'Personal Access Token', '[]', 0, '2022-03-02 23:47:10', '2022-03-02 23:47:10', '2023-03-03 05:17:10'),
('2e500bb99eb60fd57cdf27597f2269edf2d58e7695016b723724a2f3c3c8252670561f4767ed74b0', 72, 1, 'Personal Access Token', '[]', 1, '2022-01-03 05:50:57', '2022-01-03 05:50:57', '2023-01-03 11:20:57'),
('2e7dc4d79af9c834458b459cba93be21f00937cf3ab97eb64dc52b4f8aa63c60de1f5228f5a8b864', 66, 1, 'Personal Access Token', '[]', 0, '2021-12-07 04:54:27', '2021-12-07 04:54:27', '2021-12-14 10:24:27'),
('2ecf43e6c70bc47127f97cddaaae3b38709d1a03c732bb1323bf4e57150c3b34b5cfc757d3a80761', 116, 1, 'Personal Access Token', '[]', 0, '2021-11-17 05:09:43', '2021-11-17 05:09:43', '2022-11-17 10:39:43'),
('2fa089deb4fe1df6d5d9617395718c899c7d353f84499c58217b4a5d6a472cd407af064ca963d7aa', 218, 1, 'Personal Access Token', '[]', 1, '2022-03-04 23:38:30', '2022-03-04 23:38:30', '2023-03-05 05:08:30'),
('2fa8329e53c269eee9ad38b6e0f573c12d4d6d8376e3c7d796cbb59e2c81a370fbaf40d301154324', 66, 1, 'Personal Access Token', '[]', 0, '2021-12-02 23:44:47', '2021-12-02 23:44:47', '2021-12-10 05:14:47'),
('2fc601e0556eb1eb68d34ac63d4d62b87c48f9009c27c800008c5d6ab66023c30828eef0913cb5ff', 123, 1, 'Personal Access Token', '[]', 0, '2021-11-19 06:35:25', '2021-11-19 06:35:25', '2022-11-19 12:05:25'),
('2fde9a4b38961f689cc416bd75e32cc7575e4072245f9daa6af0f419c0596383bb57a16d0668f107', 220, 1, 'Personal Access Token', '[]', 1, '2022-03-02 23:47:55', '2022-03-02 23:47:55', '2023-03-03 05:17:55'),
('2fe21b86c46d37fcefd244292aa4ab175cb71d61441c81b1532e1d168340eeb6c0c212b859445f94', 66, 1, 'Personal Access Token', '[]', 0, '2021-11-11 05:16:42', '2021-11-11 05:16:42', '2022-11-11 10:46:42'),
('2ff95e1e055362ca6729d4601d92bf077d2ca55e4c7f6d6a71f0a88871dd0f2646289babdbf15828', 94, 1, 'Personal Access Token', '[]', 1, '2022-02-03 05:25:57', '2022-02-03 05:25:57', '2023-02-03 10:55:57'),
('302a399c7e96248a27dff4aec4980c6406309f55b759deb0076aff9cda9be1da3e99de019aeb1232', 146, 1, 'Personal Access Token', '[]', 1, '2021-12-01 23:22:08', '2021-12-01 23:22:08', '2022-12-02 04:52:08'),
('30354ad88275140ccb9ae6cdd3756cb9523017c96c8831896136434989fc065c169d06ff4db00a67', 72, 1, 'Personal Access Token', '[]', 1, '2021-12-31 08:10:53', '2021-12-31 08:10:53', '2022-12-31 13:40:53'),
('3036f8406863ea2379db6bb3989574c5ad6ad26a884a8ce35f7f1709c0330c3418bde90969b16b6b', 101, 1, 'Personal Access Token', '[]', 0, '2021-11-17 06:27:13', '2021-11-17 06:27:13', '2021-11-24 11:57:13'),
('317fde213979b9f9baa27daef3020a656bf8e5338c1c6cbf8bec8f726185782ff21db3456edd23ea', 69, 1, 'Personal Access Token', '[]', 0, '2022-01-02 23:14:00', '2022-01-02 23:14:00', '2023-01-03 04:44:00'),
('3188e7278e43bea738286d08ed993d58884fe8e4937aade0d483e5b1b8b657c4f9d3de9378ca197c', 72, 1, 'Personal Access Token', '[]', 0, '2022-01-27 05:16:34', '2022-01-27 05:16:34', '2023-01-27 10:46:34'),
('32d73a4a414d8c0bd8c69b9f1023f2f12ced2fab895ddc631be553d2c0531e24ef461e07d6fdbad9', 220, 1, 'Personal Access Token', '[]', 0, '2022-03-05 00:12:35', '2022-03-05 00:12:35', '2023-03-05 05:42:35'),
('3311011007fc27811c11684cd82137c4ff1e95101dee8ad2ce2a144cddc346062eca1f8871a264fb', 72, 1, 'Personal Access Token', '[]', 1, '2021-12-31 05:49:57', '2021-12-31 05:49:57', '2022-12-31 11:19:57'),
('334d70d4097c495ed93aeb8a0908c1e3356a92520462e2b40abfe9f431b4f04766d36e9528e877c5', 220, 1, 'Personal Access Token', '[]', 0, '2022-03-02 23:31:11', '2022-03-02 23:31:11', '2023-03-03 05:01:11'),
('3450a0aafe6b7f3c7f11174410c23710ec832d7446bcdacfe3b529527b444e79936d0f86f0777ae6', 242, 1, 'Personal Access Token', '[]', 1, '2022-05-10 00:00:45', '2022-05-10 00:00:45', '2023-05-10 05:30:45'),
('34d7e4bc1a29001d402297d787232b8e74de5408fce5cbfa1baf7fff27a20357ac8af6b24e27312b', 67, 1, 'Personal Access Token', '[]', 1, '2021-11-26 23:17:22', '2021-11-26 23:17:22', '2022-11-27 04:47:22'),
('34f89f3cd030d96386a019ce632e8f1bcf912b75f27febf97e71649b4a6cb3eb3a49a6672410818f', 69, 1, 'Personal Access Token', '[]', 1, '2022-01-12 22:54:47', '2022-01-12 22:54:47', '2023-01-13 04:24:47'),
('3581b08d30f24e9a8ca19a86ef5174a77e25df04cfd243c500fb5cf25fe54f9cfeb9dcbb2cdb4855', 218, 1, 'Personal Access Token', '[]', 1, '2022-02-15 00:36:54', '2022-02-15 00:36:54', '2023-02-15 06:06:54'),
('3586d972a818a9127a36c214281c6eb836d6049ac6db1be50835a6ba702652ffab582ee89c2ef585', 67, 1, 'Personal Access Token', '[]', 0, '2021-11-20 01:47:54', '2021-11-20 01:47:54', '2022-11-20 07:17:54'),
('364b16e8e3e10301fa7a73c51e98fb613e4ac924b7c6335c9a4bbff9548df448697450009bc1b183', 262, 1, 'Personal Access Token', '[]', 1, '2022-05-20 00:10:37', '2022-05-20 00:10:37', '2023-05-20 05:40:37'),
('3685653d2500db4422b378c4eb138de314fa3e6ad6d0eaf606ce50bf33fbc7720ec05c6f7a434bad', 220, 1, 'Personal Access Token', '[]', 1, '2022-05-16 07:25:19', '2022-05-16 07:25:19', '2023-05-16 12:55:19'),
('36b6406c455ed28455f5c9aecc5dd86c8534ae70078fcf9f7936929137b1ceec1ff2bcd115d0eb0d', 74, 1, 'Personal Access Token', '[]', 0, '2021-10-13 04:13:48', '2021-10-13 04:13:48', '2022-10-13 09:43:48'),
('374f0c8f80e8895244e60a12276e25fb1e61124a55da198b919117f3abb04b67556938e5654262ec', 116, 1, 'Personal Access Token', '[]', 0, '2021-11-17 04:00:51', '2021-11-17 04:00:51', '2022-11-17 09:30:51'),
('377758e7458b16ace4ab5667eb7bff64a248e46dc7f38862b609aa979ee751c4e1c6390c33aad647', 67, 1, 'Personal Access Token', '[]', 1, '2021-11-22 02:47:33', '2021-11-22 02:47:33', '2022-11-22 08:17:33'),
('37ac8704f124717925a57926a6018680d72c2dd5b92441f5fcde4031998c95a4e6a87fcfb5704374', 66, 1, 'Personal Access Token', '[]', 1, '2022-01-02 23:41:26', '2022-01-02 23:41:26', '2023-01-03 05:11:26'),
('37d210e8a2cf0f182444af01e9e3b077e046db7cd4116574776934ae25da4d3fdbde691e17e7104a', 67, 1, 'Personal Access Token', '[]', 1, '2021-11-27 05:14:57', '2021-11-27 05:14:57', '2022-11-27 10:44:57'),
('37f2974bc2fbe0e865ae5f46e7092a632155fa03bd946052d32185f1b940075a7e82ecb51eab5325', 227, 1, 'Personal Access Token', '[]', 0, '2022-03-02 23:03:09', '2022-03-02 23:03:09', '2023-03-03 04:33:09'),
('381190acffbbf08e445c2c7e776ce55f1548c7f7fd9790fe6a63e76c1ef3c374cffafb3104958148', 69, 1, 'Personal Access Token', '[]', 1, '2022-01-09 23:21:47', '2022-01-09 23:21:47', '2023-01-10 04:51:47'),
('383789094ba599b76038b8451186065e22187f475287175ca372cfb1f19c2b760f6edf54ab15b3b3', 66, 1, 'Personal Access Token', '[]', 0, '2022-01-16 23:06:59', '2022-01-16 23:06:59', '2023-01-17 04:36:59'),
('3897944676cd62afd0164b27dc4a88475d5c625e4a6dd46736a2fa91030ad5748e6b3e5427e3bd06', 72, 1, 'Personal Access Token', '[]', 0, '2022-01-05 06:58:24', '2022-01-05 06:58:24', '2023-01-05 12:28:24'),
('38c9c9ed70675cb8507a6f98bdae5af19c40bcccdcfbac0899b39682e2fc7145af64b8c00628a785', 262, 1, 'Personal Access Token', '[]', 1, '2022-05-19 08:09:58', '2022-05-19 08:09:58', '2023-05-19 13:39:58'),
('38f410ebb94b375d7c7d805833cd7ff67361a8e13599b53d97376eb33d8e98331267bcdcd24dfc91', 66, 1, 'Personal Access Token', '[]', 1, '2021-11-09 04:56:32', '2021-11-09 04:56:32', '2022-11-09 10:26:32'),
('393c7f521dce1e2f1c2f9de8f28bdeb530480832aa1e6f6754330c910121a4b4a7ac885265a76b6a', 66, 1, 'Personal Access Token', '[]', 0, '2021-12-03 00:27:05', '2021-12-03 00:27:05', '2021-12-10 05:57:05'),
('3946a2cb5af8745277db1d0b194aab0b6055c81ec9c17ea28074adae289771f633a1bfb20922ff84', 123, 1, 'Personal Access Token', '[]', 0, '2021-11-18 05:22:28', '2021-11-18 05:22:28', '2022-11-18 10:52:28'),
('39b36fde5dd11f51b27da60eb9d2985aa118e323c544178263a3ea15fe6a4b2d8c316d91bca0be2c', 73, 1, 'Personal Access Token', '[]', 1, '2022-01-06 09:12:19', '2022-01-06 09:12:19', '2023-01-06 14:42:19'),
('39ffefb4f0fe701b41b75f9487e2666357749b6c6358037d719227aff3b24f7179f4649aee2885ac', 101, 1, 'Personal Access Token', '[]', 0, '2021-11-16 07:12:12', '2021-11-16 07:12:12', '2022-11-16 12:42:12'),
('3a271c376afd6eb044f2d98efabf10936172fc83f11c8f606103c97b4484bdb0154a0f2c44f9688c', 67, 1, 'Personal Access Token', '[]', 1, '2021-11-27 03:50:06', '2021-11-27 03:50:06', '2022-11-27 09:20:06'),
('3af88129ab1ee4b32e5e1f9ceba8e3cf26114edf47d43abc35968067996c87e1bc1924e28d5b47e6', 218, 1, 'Personal Access Token', '[]', 1, '2022-02-10 04:31:38', '2022-02-10 04:31:38', '2023-02-10 10:01:38'),
('3b0293c72aca1a9303891385c47e0e069048b7e56dfb71034970d42f9ce289ad652e5241796f25e8', 66, 1, 'Personal Access Token', '[]', 0, '2022-02-03 05:29:01', '2022-02-03 05:29:01', '2023-02-03 10:59:01'),
('3b13a25db3a691876b6f03b6138b05110c57a810dca7fb2f31f8a9dce8d6b921c0bc65096179e31f', 72, 1, 'Personal Access Token', '[]', 0, '2022-01-03 09:25:20', '2022-01-03 09:25:20', '2023-01-03 14:55:20'),
('3b56c738b09b385709f48fb1f51ec5cef3a5cf4d49648aa93912b6f12e323d7a4d0ff04cb5012d3a', 146, 1, 'Personal Access Token', '[]', 0, '2021-11-19 01:10:43', '2021-11-19 01:10:43', '2022-11-19 06:40:43'),
('3bab99905398ec6b8d5817543584ced7d632213f86d930eaa6dd00b0bf8c0102a75ddd0d90ebc539', 5, 1, 'Personal Access Token', '[]', 0, '2021-10-12 03:03:42', '2021-10-12 03:03:42', '2021-10-19 08:33:42'),
('3c42b4c9a4a390ed0dce460424281c81c4b948ece9fd6ce69f2469f40f0f32ff3a56047abda75789', 69, 1, 'Personal Access Token', '[]', 1, '2022-01-06 03:02:33', '2022-01-06 03:02:33', '2023-01-06 08:32:33'),
('3c64b793f9cdffbb0c8cd69dfc5b6677c6a7099f0a91a191d7c75b769539a5e8c6f206b223dd4f07', 123, 1, 'Personal Access Token', '[]', 0, '2021-11-18 04:51:40', '2021-11-18 04:51:40', '2022-11-18 10:21:40'),
('3d9b9d64bae42709bcac92435f5922101de76aab13cd40a61afa4ec088c72dcef645215b61d7bef7', 66, 1, 'Personal Access Token', '[]', 0, '2022-01-11 03:04:10', '2022-01-11 03:04:10', '2022-01-18 08:34:10'),
('3dd1c9560ecce7ff0f43891b112532efa9ce8ebf3c1bba8f12b8ded0533ad4c4a6531dde5bd60020', 94, 1, 'Personal Access Token', '[]', 0, '2021-12-03 23:56:52', '2021-12-03 23:56:52', '2022-12-04 05:26:52'),
('3e1f334ab156a4217adea42189f5ba8c0b570168c9ef2501718968eca5d78033b6757704a8ea8b16', 66, 1, 'Personal Access Token', '[]', 1, '2022-01-13 00:13:07', '2022-01-13 00:13:07', '2023-01-13 05:43:07'),
('3f163e2fdd2e58fb79d7a77dd49f69724c97b95fa70cb53c2688a05e70463790508f59892782aa00', 116, 1, 'Personal Access Token', '[]', 1, '2021-11-17 05:35:20', '2021-11-17 05:35:20', '2022-11-17 11:05:20'),
('3f37ba3a3fcdf226200f7376f37a1f2a3334e8cca768447dde4d92a2bcd21fa317993955fe4703d6', 72, 1, 'Personal Access Token', '[]', 0, '2022-01-03 09:33:59', '2022-01-03 09:33:59', '2023-01-03 15:03:59'),
('3f6ec28cecfa62f181a27b63b1401cb280e35bcdc18e240f78dfb2808d3c98641a9368da171292de', 72, 1, 'Personal Access Token', '[]', 0, '2022-01-05 07:46:00', '2022-01-05 07:46:00', '2023-01-05 13:16:00'),
('3fc51d7d48fe52e3c584c6cbe2d34412b58389191769da84c369c4221ec1e9a677997df6e8a8305f', 66, 1, 'Personal Access Token', '[]', 1, '2022-01-16 23:45:43', '2022-01-16 23:45:43', '2023-01-17 05:15:43'),
('3fda3ed6e2afdad9ab3c8c63265eeaac00a9b0183d02cbc7e283b8cc06f59fea1e1f7c0f7d64778c', 260, 1, 'Personal Access Token', '[]', 1, '2022-05-20 00:03:53', '2022-05-20 00:03:53', '2023-05-20 05:33:53'),
('3fe61901385e6ea3eb25a7c307d41e7b28805ff32019f68610f5825a4b1fe9d19a74675dd8e33106', 66, 1, 'Personal Access Token', '[]', 0, '2021-12-10 01:51:21', '2021-12-10 01:51:21', '2022-12-10 07:21:21'),
('3fef777b75fba5b5a003d850a08fb2a7181aaca8afe525ebb2e6ab6426a97dabd793bc2aa3224375', 66, 1, 'Personal Access Token', '[]', 0, '2022-01-05 04:12:24', '2022-01-05 04:12:24', '2022-01-12 09:42:24'),
('4007c23551fb3359064ec3c63f0b106fac4df7f780da63d4429f242580ac08b630bf014262c83214', 225, 1, 'Personal Access Token', '[]', 0, '2022-03-08 07:01:59', '2022-03-08 07:01:59', '2023-03-08 12:31:59'),
('401514d9821033836f51ab4fc9f3743dbfe0d362e60484703dfcd297e8842e7b0a9c8ad2a22ad6a4', 66, 1, 'Personal Access Token', '[]', 0, '2021-12-06 23:52:22', '2021-12-06 23:52:22', '2022-12-07 05:22:22'),
('403502398188eb6ff245995ae1ffb04d274107e552123ce9246e69e8beb7e793922f0d03397ee225', 218, 1, 'Personal Access Token', '[]', 1, '2022-02-07 00:31:27', '2022-02-07 00:31:27', '2023-02-07 06:01:27'),
('40b8949b8ee0d0533e2f065c1eb0b1f447ebb2fd16a54a9b3b3bf66df4b4346f0da6460a629a309b', 67, 1, 'Personal Access Token', '[]', 0, '2021-12-09 10:12:16', '2021-12-09 10:12:16', '2022-12-09 15:42:16'),
('40ca470d1007fe847873da730fd15e86824273e88d6d7c18bf904d59d4f78612b12c80e870f5a667', 5, 1, 'Personal Access Token', '[]', 0, '2021-10-02 04:43:15', '2021-10-02 04:43:15', '2022-10-02 10:13:15'),
('40f983cb3225706f8324c183885666c9a42a174e02851ef01d7442145bf8e8cc8365906eb7cde11d', 123, 1, 'Personal Access Token', '[]', 1, '2021-12-10 06:01:36', '2021-12-10 06:01:36', '2022-12-10 11:31:36'),
('42a5d90a64fea48c0b1f81db5599e5a4721721cc10f8dfea2dcc08ced8ec9af2ac51ab63954e5646', 66, 1, 'Personal Access Token', '[]', 0, '2021-12-03 00:27:13', '2021-12-03 00:27:13', '2021-12-10 05:57:13'),
('4345c9827ff3eb91a17818e64d594207c98610b5eadff66c9c145a0952ac4ee216d8c79a9a8aeefc', 101, 1, 'Personal Access Token', '[]', 0, '2021-11-16 06:54:57', '2021-11-16 06:54:57', '2022-11-16 12:24:57'),
('43eb71b6cb6b712a5a0c91b894dc6cd1b4eddd0481238f500981df9bc2b957f9ca2c5a9064e5d8a1', 94, 1, 'Personal Access Token', '[]', 0, '2021-12-04 00:00:06', '2021-12-04 00:00:06', '2022-12-04 05:30:06'),
('441951515e0e419ea383e21fc890ca2a179065f6ab1aa3a802c8996838a0522a86df98041b67d456', 72, 1, 'Personal Access Token', '[]', 0, '2021-12-31 05:46:31', '2021-12-31 05:46:31', '2022-12-31 11:16:31'),
('44624502ef9497b86080b46683f07c73e81540b0035c0af86d388c7a0f14b0ad061e74d120ea1027', 146, 1, 'Personal Access Token', '[]', 0, '2021-12-10 07:17:35', '2021-12-10 07:17:35', '2022-12-10 12:47:35'),
('45444eab6e044b519bf4927c1a4ee28fad309272a6180c54ebca9d3dd56bd4598843f75922cdd0f1', 218, 1, 'Personal Access Token', '[]', 1, '2022-02-17 05:45:16', '2022-02-17 05:45:16', '2023-02-17 11:15:16'),
('454e320a1c93f04ffc010871e1609065b39cf1224f41da5b3768f5bdc8f754d1df840e6457113196', 67, 1, 'Personal Access Token', '[]', 0, '2021-11-29 06:21:02', '2021-11-29 06:21:02', '2022-11-29 11:51:02'),
('45726b0967142a3d87b8244b8cf4af419fef9deddc9f819c26103b4fd6bdb643e312fb1c7b3a29d6', 70, 1, 'Personal Access Token', '[]', 1, '2021-12-26 23:20:41', '2021-12-26 23:20:41', '2022-12-27 04:50:41'),
('465f3f27ca4c9dc364ad7572fec2e2bd8a0b55028efe9a810791a5c70a28b8779c8049693ed012c8', 230, 1, 'Personal Access Token', '[]', 1, '2022-05-06 02:29:30', '2022-05-06 02:29:30', '2023-05-06 07:59:30'),
('46bde28044408e8a603283215a7add2e17dba1d090d0695befcb44e5bf153a453a95556e096108f9', 72, 1, 'Personal Access Token', '[]', 0, '2022-01-05 01:28:32', '2022-01-05 01:28:32', '2023-01-05 06:58:32'),
('46efa1dbc88e7bdc13f4257bffa5486c77e8ff4cbcb6dc8f5439fc2023cfe0f7ebeee17c1a8e09b8', 72, 1, 'Personal Access Token', '[]', 0, '2022-01-24 05:36:24', '2022-01-24 05:36:24', '2023-01-24 11:06:24'),
('4792e9f2e65571f31829f20b0228135725577a5b9a944896785fba8b637198021050b68cf1e1e3d6', 72, 1, 'Personal Access Token', '[]', 1, '2021-12-31 08:17:34', '2021-12-31 08:17:34', '2022-12-31 13:47:34'),
('487be9a8b6f7e81bf751b0fc8c668474ce3a9b6a83afed44fdc6848ee833de03e2b4d8a80ad9326f', 146, 1, 'Personal Access Token', '[]', 0, '2021-11-19 01:10:43', '2021-11-19 01:10:43', '2022-11-19 06:40:43'),
('48ba27a89f7ac178bdd275cfb17db4a5da1882969ddc6b2426d05c298c6bb25ab54e50efb0edea62', 66, 1, 'Personal Access Token', '[]', 1, '2021-12-06 06:48:12', '2021-12-06 06:48:12', '2022-12-06 12:18:12'),
('48bfb23a6b056a9b01b8016848a41006e92d49cc9c08dcea2740432f4679da2184fd39406e4b692d', 101, 1, 'Personal Access Token', '[]', 0, '2021-11-16 06:53:29', '2021-11-16 06:53:29', '2022-11-16 12:23:29'),
('48eb3f4075a654016a934d925239c29474f7a03870bc19804c1c4bcb6a779a7b1f60482c6178259d', 70, 1, 'Personal Access Token', '[]', 0, '2021-12-17 23:24:52', '2021-12-17 23:24:52', '2022-12-18 04:54:52'),
('493991dde286a719ed31373a3abfc386ab2fbd4259f51692323dc7a8e18213f58fd71bc2f9509c98', 69, 1, 'Personal Access Token', '[]', 0, '2022-01-09 23:25:58', '2022-01-09 23:25:58', '2023-01-10 04:55:58'),
('4a216f38b25361d95921f885a2eac2e0e1309d7e0958f0fe6cef20b7bfafcaf3e87b84f41ae2bff2', 48, 1, 'Personal Access Token', '[]', 0, '2021-10-12 03:01:51', '2021-10-12 03:01:51', '2022-10-12 08:31:51'),
('4b6461cea1c5c5d347fc11a0e3ffa7dfd7d96ac4472d89430266f948a176a9cc74cf4782dffdb244', 66, 1, 'Personal Access Token', '[]', 1, '2022-01-13 23:42:51', '2022-01-13 23:42:51', '2023-01-14 05:12:51'),
('4c69b4f2052e01d7e19bdfe429e1018a91c666ab47221646187e5d796ae250e2318d999a693d059f', 69, 1, 'Personal Access Token', '[]', 1, '2022-01-06 03:01:22', '2022-01-06 03:01:22', '2023-01-06 08:31:22'),
('4ce7f1c582bbde57e90b49e14b20a589dc89fb60e28df51f67abed4bd364f07c10271dddd25aa656', 69, 1, 'Personal Access Token', '[]', 0, '2022-01-04 23:38:54', '2022-01-04 23:38:54', '2023-01-05 05:08:54'),
('4cfee2ab3d71461539f08edc5a8659c91882daa782939e61150c98f1c9b6d004de8a0bbb3dde13bf', 146, 1, 'Personal Access Token', '[]', 0, '2021-11-28 23:19:44', '2021-11-28 23:19:44', '2021-12-06 04:49:44'),
('4d0eddfb71fa550c8f963147b83286aca309a4abb7f524a699a5fcf59923999af305e48ff703d969', 123, 1, 'Personal Access Token', '[]', 1, '2021-11-20 03:35:45', '2021-11-20 03:35:45', '2022-11-20 09:05:45'),
('4d1d531263cdbffdc29d754e1f4668e0090718891080fad3cd4f9769b96e7ae4266c5cc83c90e36f', 67, 1, 'Personal Access Token', '[]', 1, '2021-12-08 02:11:38', '2021-12-08 02:11:38', '2022-12-08 07:41:38'),
('4d3ed635070ea93287d29c583b5a61ab1fa19ed36d4fcff76ebc6f0afa846c9f09967197b42a7633', 220, 1, 'Personal Access Token', '[]', 0, '2022-03-02 09:33:06', '2022-03-02 09:33:06', '2023-03-02 15:03:06'),
('4d4f68efca478109fb8cb6bb9f70ac77b32f2cdd596d78b23c682bcc76cd5f8044b933faa07d80c1', 67, 1, 'Personal Access Token', '[]', 1, '2021-11-22 02:27:13', '2021-11-22 02:27:13', '2022-11-22 07:57:13'),
('4da8d79af7fa6740ebf1b95caaa8650518016010b2127b2b782b40a8ea608cd77deaf94219fb4a17', 227, 1, 'Personal Access Token', '[]', 0, '2022-03-02 23:44:58', '2022-03-02 23:44:58', '2023-03-03 05:14:58'),
('4dfd192ee6e90dd72c6124b68a37e52b46da5ebd26dbac881490dbcbf354e70a808c2bd5f3f3f100', 146, 1, 'Personal Access Token', '[]', 0, '2021-12-01 07:51:40', '2021-12-01 07:51:40', '2021-12-08 13:21:40'),
('4ea451f5c24290eb14b1c7dd8614c9674ed0091a25400a40dac2b05c1099f17ab0287774854a27c1', 69, 1, 'Personal Access Token', '[]', 1, '2021-12-17 23:08:27', '2021-12-17 23:08:27', '2022-12-18 04:38:27'),
('4ed008f86b0deadcafb6bd01673e53ce821249e9cafd86f9d6015fddb9d26edf186084f17a44e3e4', 220, 1, 'Personal Access Token', '[]', 0, '2022-05-19 07:17:34', '2022-05-19 07:17:34', '2023-05-19 12:47:34'),
('4f683710d2b76088a49442a4adcee2db79b43381ced20a79b51b5d7e24043a6f17b514c0d7bdafa4', 123, 1, 'Personal Access Token', '[]', 1, '2021-11-20 11:40:56', '2021-11-20 11:40:56', '2022-11-20 17:10:56'),
('4fad634e01d7cf104886ad719744a3ef7db58329d228f883c077ce3e9426418238369ea58e26534c', 74, 1, 'Personal Access Token', '[]', 0, '2021-10-14 01:09:29', '2021-10-14 01:09:29', '2022-10-14 06:39:29'),
('500439adc6aebdb61c28d83356461fc220c683b778d74eb6370c5080f20d92592e3446cdb68cfb32', 262, 1, 'Personal Access Token', '[]', 0, '2022-05-30 01:07:42', '2022-05-30 01:07:42', '2023-05-30 06:37:42'),
('5025716d1bca1e6300ef604c5b3a75513bd77281415c20282c5dddaf67a98ea355616923c83f7304', 66, 1, 'Personal Access Token', '[]', 1, '2022-01-17 00:03:04', '2022-01-17 00:03:04', '2023-01-17 05:33:04'),
('51bf67900bf6d049d900d9ab57399f48c51f574fc9e93a2e5e57afa39ce562a2ace340c56c974d13', 66, 1, 'Personal Access Token', '[]', 0, '2021-12-29 01:45:38', '2021-12-29 01:45:38', '2022-12-29 07:15:38'),
('51e8586ed0ec7b565c796e564932ec6581a5ff18b62dc3f39183fe3ca15d3e81263a2d11e76cb5d7', 66, 1, 'Personal Access Token', '[]', 1, '2022-01-17 00:10:43', '2022-01-17 00:10:43', '2023-01-17 05:40:43'),
('522bdd8bdf31d55e06c1139d4d42fff4541dfb2d74aed42358b886d727011d25d0ddfc228ed75a26', 67, 1, 'Personal Access Token', '[]', 0, '2021-12-24 23:23:45', '2021-12-24 23:23:45', '2022-12-25 04:53:45'),
('528ab3ab8c4ff67994b681cb642aaddcfeb861ff72b3e59ccb2ec6a62f4f545ea0d7a0f7a41ecef4', 146, 1, 'Personal Access Token', '[]', 0, '2021-11-19 01:10:43', '2021-11-19 01:10:43', '2022-11-19 06:40:43'),
('528e54613e079292c2e1d35b63510e7bac902d73321b7f51d871d61535ebea6e57734b9653a2a102', 262, 1, 'Personal Access Token', '[]', 0, '2022-05-23 23:27:27', '2022-05-23 23:27:27', '2023-05-24 04:57:27'),
('52a453188e5705983ce6b510e849cf678d5ad46977d1297c005cca3532b2d68e6a9147236aa6a2bd', 123, 1, 'Personal Access Token', '[]', 1, '2021-12-03 01:59:48', '2021-12-03 01:59:48', '2022-12-03 07:29:48'),
('52e8240298466088a4a8602e6395592a8add1f74ffcdee8b7efce8c1e622d2b60a9eef1325323915', 146, 1, 'Personal Access Token', '[]', 0, '2021-12-10 05:39:47', '2021-12-10 05:39:47', '2022-12-10 11:09:47'),
('52ffacf4f09b4c1f868e99469651b40ea60df5f688746f4573672670ec2f3a8e009e3c130a017528', 123, 1, 'Personal Access Token', '[]', 1, '2021-12-06 08:41:46', '2021-12-06 08:41:46', '2022-12-06 14:11:46'),
('5418570bf8760a8e2c76c001d8132bce696da75ec2b668fc38312ce6f02370c298f1dd89c2831076', 225, 1, 'Personal Access Token', '[]', 0, '2022-02-26 13:18:12', '2022-02-26 13:18:12', '2023-02-26 18:48:12'),
('5521b704082853c10736e21d03cb441c2d9afd1009be70113d47f0e2cd487190942e23bc5ab63569', 5, 1, 'Personal Access Token', '[]', 0, '2021-10-10 01:47:12', '2021-10-10 01:47:12', '2022-10-10 07:17:12'),
('555f5cd77c162c95a25878ce20417c553faf1be726014b42056de6b1e22cb350da716241feddb5d1', 66, 1, 'Personal Access Token', '[]', 1, '2021-11-06 02:41:41', '2021-11-06 02:41:41', '2022-11-06 08:11:41'),
('556eb60b6fa29eb727054e80e2c9e0b8a5538a965e38bd2ff8f23f42b6c0a377d6bb8ebcba5a4890', 70, 1, 'Personal Access Token', '[]', 1, '2021-12-17 23:41:25', '2021-12-17 23:41:25', '2022-12-18 05:11:25'),
('55a45b6df2db8fa4dc5a69cfe3c92e912185a9e8e759c27d917258242cc6e7013a7f2c64a9012ba0', 67, 1, 'Personal Access Token', '[]', 1, '2021-11-27 05:29:50', '2021-11-27 05:29:50', '2022-11-27 10:59:50'),
('55cb38040292a0a0d4c1baefc4b7dd98392f323bbd6d6cb9a8622a0fbb827504e71b72e90efa86d4', 66, 1, 'Personal Access Token', '[]', 1, '2021-11-10 02:33:16', '2021-11-10 02:33:16', '2022-11-10 08:03:16'),
('565c4921768de249f23011f54a97a7b610bc0786c4ec8863dde8fafa7d79f54eff5cb2b2144b60c1', 69, 1, 'Personal Access Token', '[]', 1, '2022-01-27 02:27:33', '2022-01-27 02:27:33', '2023-01-27 07:57:33'),
('572113d71ed29f9d97f7599739c132bcc0065b38bcfcbd6010a1a7df2209cafc26f1b4637bb16964', 66, 1, 'Personal Access Token', '[]', 0, '2021-12-02 04:47:15', '2021-12-02 04:47:15', '2021-12-09 10:17:15'),
('577e2b77baf1515dd2affcc6f968c1f1158a155447ec8cb6cb644be58f0e1fb3f4be843ebeb3cb63', 70, 1, 'Personal Access Token', '[]', 1, '2021-12-18 00:12:00', '2021-12-18 00:12:00', '2022-12-18 05:42:00'),
('57bb162a4b6ee64252a0ed717164ede21ec4c8759610003379389d44d71932afa2d700970bcc3b0c', 123, 1, 'Personal Access Token', '[]', 1, '2021-11-20 06:58:44', '2021-11-20 06:58:44', '2022-11-20 12:28:44'),
('5824f5b0e0fe36832738a3ce70f9b2f3fa7afdc1662e197b5e88327dbb2c5e93455222d9fac32e70', 72, 1, 'Personal Access Token', '[]', 1, '2021-12-31 07:55:32', '2021-12-31 07:55:32', '2022-12-31 13:25:32'),
('58a0e36803bb96b02d5cb1938cf8600abfdae3ecb68436d8b14c3240692a226a39aef6c0bd585a4e', 67, 1, 'Personal Access Token', '[]', 0, '2021-11-27 02:02:17', '2021-11-27 02:02:17', '2022-11-27 07:32:17'),
('58ef48faef64439ca182a3e9781c6e56844c15997ece3b5352bff49f86a260adce55dfa2a252a95d', 66, 1, 'Personal Access Token', '[]', 0, '2021-12-06 23:52:22', '2021-12-06 23:52:22', '2022-12-07 05:22:22'),
('58effaafcf76ffbc433bdf16200dffddf3065841dcd641c3460a893db34ad7e2c02a15b46e0a95a2', 70, 1, 'Personal Access Token', '[]', 1, '2022-01-21 04:54:39', '2022-01-21 04:54:39', '2023-01-21 10:24:39'),
('59810360ad882677779b30571d1ead35f07de4103bc7eb5347a891ca4506e8c26ef7ddae699bfcf1', 123, 1, 'Personal Access Token', '[]', 0, '2021-11-18 02:09:13', '2021-11-18 02:09:13', '2022-11-18 07:39:13'),
('59bd798b5f226e98b029c406114cc036a7cf2dc838a77bff6b29997065d9771791fdd40ef094c9bb', 220, 1, 'Personal Access Token', '[]', 0, '2022-03-07 09:08:26', '2022-03-07 09:08:26', '2023-03-07 14:38:26'),
('59dd3392ce19ca7c3b8e1c69bd754e8095e934d003b05c1e219e5ef76b1cf0ec8a5ad179928cf645', 203, 1, 'Personal Access Token', '[]', 1, '2022-01-13 01:23:04', '2022-01-13 01:23:04', '2023-01-13 06:53:04'),
('5a52e2b10c81f14ef34d2296cf66b110781074e8b7b00d588ebc5398beb2250543a8f4d1d1cbb239', 69, 1, 'Personal Access Token', '[]', 1, '2022-01-11 02:34:27', '2022-01-11 02:34:27', '2023-01-11 08:04:27'),
('5abbc101795fca91a49d8a4498ce0eb455660fe1ad635c454e1384f23fbcb8281ac7530087a1b699', 262, 1, 'Personal Access Token', '[]', 1, '2022-05-23 06:14:47', '2022-05-23 06:14:47', '2023-05-23 11:44:47'),
('5ac07bbf17b558783c17f7b8b526cd80546b64baae1b98f065bd0c1baa3e1f12c278edb943e8f6e2', 123, 1, 'Personal Access Token', '[]', 0, '2021-11-23 07:48:01', '2021-11-23 07:48:01', '2022-11-23 13:18:01'),
('5afa87cb241ed181919bd44500dcf36f0216b4cfdc936b50ac4afb364cee32a7bcc8237b910cdf07', 67, 1, 'Personal Access Token', '[]', 0, '2021-12-17 20:59:30', '2021-12-17 20:59:30', '2022-12-18 02:29:30'),
('5c578c03355a91d0231b33e59187ed0660f43a1dad2a21f50cad192a9569bfc60aad55d8c5bec516', 123, 1, 'Personal Access Token', '[]', 1, '2021-11-29 06:09:17', '2021-11-29 06:09:17', '2022-11-29 11:39:17'),
('5c9d98823391d28fcbad1307faa00e66beb6c19983e359bcb53ada0707ab55cfc69f4a0967534690', 220, 1, 'Personal Access Token', '[]', 1, '2022-05-06 00:02:55', '2022-05-06 00:02:55', '2023-05-06 05:32:55'),
('5cb985dcc59d175288e498943bf9d6a8c6cdc6529eeb71cf9838f63e4d0322cd96aff6d35e53efc9', 69, 1, 'Personal Access Token', '[]', 0, '2022-01-04 02:30:23', '2022-01-04 02:30:23', '2023-01-04 08:00:23'),
('5dfb96d01f7380ad52e89a5d1a34df6fdb64a8a8c5699c4e42ab6c6f44be91283d3e7432ef4e7483', 72, 1, 'Personal Access Token', '[]', 0, '2022-01-03 08:57:32', '2022-01-03 08:57:32', '2023-01-03 14:27:32'),
('5e04574e3241f9f10d122d5db33c7efeef0fec7369f83e9ec99774497b0d1ce4413ca2003bb8be70', 67, 1, 'Personal Access Token', '[]', 1, '2022-01-01 00:05:35', '2022-01-01 00:05:35', '2023-01-01 05:35:35'),
('5f281e2f7f9ea25ea0ca1c1ba45ea5addf044d11c432e3f24120719c13a157a20da0311f9ad50c2b', 123, 1, 'Personal Access Token', '[]', 0, '2021-11-22 03:04:32', '2021-11-22 03:04:32', '2022-11-22 08:34:32'),
('5f9a506423997306d6470468e5a9a9ad98b493de056d5e32734686899f2e01f0ef0c8d5160ac4d3d', 66, 1, 'Personal Access Token', '[]', 1, '2022-01-16 23:49:37', '2022-01-16 23:49:37', '2023-01-17 05:19:37'),
('5fcefbf94963a5a0edfa9bce73d32228e17e305e30a668380db24a3bc66ebfa4c51c624a02eeb476', 220, 1, 'Personal Access Token', '[]', 1, '2022-02-25 05:10:55', '2022-02-25 05:10:55', '2023-02-25 10:40:55'),
('606cc54a268596ec8ab4a99dd5c794b940157564a5ee71299c6056903a8025c53af617454af7716b', 72, 1, 'Personal Access Token', '[]', 0, '2022-01-17 05:57:59', '2022-01-17 05:57:59', '2023-01-17 11:27:59'),
('60ac5474d6b86bc5a3bfad51773b416d4adbbea4181c05d0dde3c292a8f63ba4c8da1c787dc86b73', 262, 1, 'Personal Access Token', '[]', 1, '2022-05-20 00:59:22', '2022-05-20 00:59:22', '2023-05-20 06:29:22'),
('60ad9082e6e1c27546860297895cc352995be8f2d81e5dac64b577bf32218685b7d9676f12b19590', 72, 1, 'Personal Access Token', '[]', 1, '2021-12-31 07:45:02', '2021-12-31 07:45:02', '2022-12-31 13:15:02'),
('614336f8c19033c332ff192bbeb3f3d70383e2a0baea0ad864d8788733839bdbd6e5eb0b962ff226', 66, 1, 'Personal Access Token', '[]', 1, '2022-01-13 00:10:28', '2022-01-13 00:10:28', '2023-01-13 05:40:28'),
('616bed31dda20373e69edaaa879885e5594da8a59727a0b1daff0a3fbbf96c9d148c6948f1219509', 73, 1, 'Personal Access Token', '[]', 1, '2022-01-06 03:09:00', '2022-01-06 03:09:00', '2023-01-06 08:39:00');
INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('61d274f83ae50edf5162b67f96b68154001d5757607a09a904170f796950d4f303b107d8444566cf', 146, 1, 'Personal Access Token', '[]', 0, '2021-12-01 23:30:16', '2021-12-01 23:30:16', '2021-12-09 05:00:16'),
('61f714e4b25612b8ccbafeaa98243f47e28ca5e1d4fb17b63b16d8effd047677a51b2ebbb8eed3f5', 67, 1, 'Personal Access Token', '[]', 0, '2021-11-26 23:46:55', '2021-11-26 23:46:55', '2022-11-27 05:16:55'),
('620e9ce604477900cfb3e467fc06650033f906b3b93049cd3cf02c365abe2840b57d07165c0eef6a', 101, 1, 'Personal Access Token', '[]', 0, '2021-11-16 05:22:00', '2021-11-16 05:22:00', '2021-11-23 10:52:00'),
('62194847c64f2ee71bfdf5f9a2787a3459af776460b09442f7ab6fa6348bd1cf92ecdc377e028933', 220, 1, 'Personal Access Token', '[]', 0, '2022-03-07 08:51:13', '2022-03-07 08:51:13', '2023-03-07 14:21:13'),
('624ac8db5c9b5554f8de581ae9f1875885dfe31d9e4e6e58dfc53d470e300a5aa43e7af7477f4019', 66, 1, 'Personal Access Token', '[]', 1, '2022-01-13 00:17:01', '2022-01-13 00:17:01', '2023-01-13 05:47:01'),
('62c088f4558a2d451a0e09d00d26ac5ad23fdc95d5d04ddfc6511cc8e1504b36425584fb7d3df6bf', 123, 1, 'Personal Access Token', '[]', 1, '2021-11-20 06:36:06', '2021-11-20 06:36:06', '2022-11-20 12:06:06'),
('62dae780c9b384dd22acd94ccd41d4c01f37991ed610b235eedeaddf747439559156cef93bfa5e87', 72, 1, 'Personal Access Token', '[]', 0, '2022-01-27 00:39:54', '2022-01-27 00:39:54', '2023-01-27 06:09:54'),
('6364ff2d19326fe9236b877d150e146f3f2ab0bb6afa0b8301a510a20768b14bb75ed85c5ea3ded0', 218, 1, 'Personal Access Token', '[]', 1, '2022-03-08 00:59:30', '2022-03-08 00:59:30', '2023-03-08 06:29:30'),
('6377e7ddaed18d90990a471c4d2a3b3d720c98040b3a7e97c111b4582afdb6a2a4d94ca8a549f034', 123, 1, 'Personal Access Token', '[]', 0, '2021-11-26 23:18:50', '2021-11-26 23:18:50', '2022-11-27 04:48:50'),
('64095191ba619a3849cf9d684cc6381677eee79cebae678a18de88f063ad878e3735157db6c7c88c', 5, 1, 'Personal Access Token', '[]', 0, '2021-10-03 07:29:55', '2021-10-03 07:29:55', '2022-10-03 12:59:55'),
('64d967ddb81aa756fe2bbc2de3cb8ed1d7b3bd28e2bc8f6ad8fd2a3cc5b0aa2143215d1cdaac566a', 183, 1, 'Personal Access Token', '[]', 0, '2021-12-17 10:50:47', '2021-12-17 10:50:47', '2022-12-17 16:20:47'),
('651f4a83dc2f6415564816a1d17fb95152cb03fa51b3b91da47d5ed48a830abbcf3030b927a2db2a', 72, 1, 'Personal Access Token', '[]', 0, '2022-01-05 04:23:27', '2022-01-05 04:23:27', '2023-01-05 09:53:27'),
('652c824d97569d297b79ffdb4b98aa5ebf71b5e50c8acb0f656728ed1b8bd85883c3560fba59faed', 67, 1, 'Personal Access Token', '[]', 0, '2021-11-01 06:13:50', '2021-11-01 06:13:50', '2022-11-01 11:43:50'),
('6553ca6aa81542f63e5a0b6e58fc37a6503cc176d66afa836c68664c7aac4d8e8e00331455c2e494', 67, 1, 'Personal Access Token', '[]', 1, '2021-12-06 04:31:59', '2021-12-06 04:31:59', '2022-12-06 10:01:59'),
('65793fc342e5d21dbb7f81f0f33e55aee909cbdaca9f0681acb6bed203a1042ec2f6a1c6b2216748', 69, 1, 'Personal Access Token', '[]', 0, '2022-01-22 02:30:18', '2022-01-22 02:30:18', '2023-01-22 08:00:18'),
('6594ca939f2be1c397565519abc7250f7d915229a3bba1754c5a729bb5186b5c1d281b8bb4c518fe', 67, 1, 'Personal Access Token', '[]', 0, '2021-11-27 01:03:09', '2021-11-27 01:03:09', '2022-11-27 06:33:09'),
('65c0a11052b6bc10088769a45625d4a84cabed1a08333fbc96590c2789514e6b56ef7244781a6029', 5, 1, 'Personal Access Token', '[]', 0, '2021-10-02 04:45:00', '2021-10-02 04:45:00', '2022-10-02 10:15:00'),
('65ca97784704c82b808e0f656de78417a8f46d0d18432d4296ce47fce1d5bb4195bc190f341cadc9', 146, 1, 'Personal Access Token', '[]', 0, '2021-12-01 05:57:26', '2021-12-01 05:57:26', '2022-12-01 11:27:26'),
('66572faae174c391a9088dfd4b7d85c5cd4f36df1b9795c61c5f5f04980662571811d26473aa4431', 67, 1, 'Personal Access Token', '[]', 1, '2021-11-22 02:12:50', '2021-11-22 02:12:50', '2022-11-22 07:42:50'),
('675b53cc28e6a934a500ada1b51145528e8b8f4d54a6647168cfef5f8dd2018888ede468a0d0ed8a', 66, 1, 'Personal Access Token', '[]', 1, '2022-01-17 06:00:29', '2022-01-17 06:00:29', '2023-01-17 11:30:29'),
('67930f533ad8f906123f5cd601aa551cb3455a1031124917c41914374edefd8b9ead2410c815f342', 123, 1, 'Personal Access Token', '[]', 1, '2021-12-03 01:16:53', '2021-12-03 01:16:53', '2022-12-03 06:46:53'),
('682f468d358fac5e3069389adccb787a36a1a8c2cf47f00f4483df5e475209a6ac57eb3a8461c3b4', 70, 1, 'Personal Access Token', '[]', 1, '2022-01-04 23:41:27', '2022-01-04 23:41:27', '2023-01-05 05:11:27'),
('690768f0d8c58b3b407180d7ea50518f7f0eec3b20c938858348f6f109161586269a43df8e595c9d', 67, 1, 'Personal Access Token', '[]', 1, '2021-11-27 06:55:45', '2021-11-27 06:55:45', '2022-11-27 12:25:45'),
('694d405e54d28afbeca85ed642b075dd295bc67ebf5f8d2aa0d90b9dc1c2d4a9a3ee147b8983c12f', 101, 1, 'Personal Access Token', '[]', 0, '2021-11-16 06:51:31', '2021-11-16 06:51:31', '2022-11-16 12:21:31'),
('6992ed21bcd58b22a6ad3f16a8a70a835e01276d8331f71952ed7d6373bf1949438047a4fd7018b6', 146, 1, 'Personal Access Token', '[]', 1, '2021-12-03 03:42:50', '2021-12-03 03:42:50', '2022-12-03 09:12:50'),
('6a2ee05b818605baff12c0bbcfacf5f4a8f06671688e439a02e25db90ca59cb7a31d34c00c513d2f', 69, 1, 'Personal Access Token', '[]', 1, '2022-01-10 22:39:32', '2022-01-10 22:39:32', '2023-01-11 04:09:32'),
('6a6696c8e7d44f8cecd13243824480610351f6c4831a3dfb04f24cc4b0e9e6aec1df34d0c0237da5', 227, 1, 'Personal Access Token', '[]', 1, '2022-02-25 05:31:06', '2022-02-25 05:31:06', '2023-02-25 11:01:06'),
('6b60876c4d916de03bd55ccc413b63ca1e28b04b614346c21641a8d6189cb0bdb207473b39a68866', 72, 1, 'Personal Access Token', '[]', 1, '2021-12-31 08:24:51', '2021-12-31 08:24:51', '2022-12-31 13:54:51'),
('6bcb584c56d25ff311dd5c9ecd07bc93c597cbdfe6bdc33a76da14cc5c63f9dfb60a719cd2b3e854', 72, 1, 'Personal Access Token', '[]', 0, '2022-01-03 09:42:29', '2022-01-03 09:42:29', '2023-01-03 15:12:29'),
('6c63a3ea0b4a2db2dd2c90ad0231918dd114a9e2b4b98737aefe878fffcb7f58fb49c3976a89a5c8', 66, 1, 'Personal Access Token', '[]', 0, '2021-12-10 00:35:58', '2021-12-10 00:35:58', '2022-12-10 06:05:58'),
('6d288047bef62288aa49f11bfd140e03b148101b242b4950d12312b7add59de62688adeb3b802f07', 225, 1, 'Personal Access Token', '[]', 1, '2022-02-24 06:32:26', '2022-02-24 06:32:26', '2023-02-24 12:02:26'),
('6d9d2cca6bbe0a8abf1ed7bd8a9690d194bfbab4d913b5d76aec54654ba0880309a16b26ef27ed8c', 66, 1, 'Personal Access Token', '[]', 1, '2022-01-12 09:02:18', '2022-01-12 09:02:18', '2023-01-12 14:32:18'),
('6dd3fe1e016384e031bac0c15b7f55b2b44b71cb2401152ee1d83ddad9660f6e88b170db04e50063', 67, 1, 'Personal Access Token', '[]', 0, '2021-12-24 23:23:32', '2021-12-24 23:23:32', '2022-12-25 04:53:32'),
('6de0cfe12234b994f7459d8c4b3e4f063514c8b625d9bb6093a36aca0f23c563dbd65bfc79f7cd59', 225, 1, 'Personal Access Token', '[]', 0, '2022-02-24 22:16:12', '2022-02-24 22:16:12', '2022-03-04 03:46:12'),
('6e0c412e0ef4511ddc21bb66f0952a9b62134c232ddf9147735ae095b1ea6ebddb0022dafd38a5ee', 123, 1, 'Personal Access Token', '[]', 0, '2021-11-18 23:28:13', '2021-11-18 23:28:13', '2022-11-19 04:58:13'),
('6e253c9b28c3a50334216ff08158965a8e89e4c1e811d2ccb33f6bcdba6edbe773d7efab4802a38e', 260, 1, 'Personal Access Token', '[]', 1, '2022-05-19 06:49:45', '2022-05-19 06:49:45', '2023-05-19 12:19:45'),
('6e508acac3bf3df03a983aae574205d8587fd45357614e39f6a91c2e78421d0cfd635168e1bb6d3c', 66, 1, 'Personal Access Token', '[]', 1, '2021-12-07 01:55:41', '2021-12-07 01:55:41', '2022-12-07 07:25:41'),
('6e647628f11fdb86d40122e22c3226af0721f1e065319815dc5908b7fd2bafbf896b0dafe9dd2869', 66, 1, 'Personal Access Token', '[]', 0, '2021-12-17 04:02:37', '2021-12-17 04:02:37', '2022-12-17 09:32:37'),
('6f130cae03904bbe12403f96982e7a846e68c86cd29f1affe01798eab17a02231351ea4a5b365af8', 218, 1, 'Personal Access Token', '[]', 1, '2022-04-22 06:08:08', '2022-04-22 06:08:08', '2023-04-22 11:38:08'),
('6f42d6ef801adebfb323871c15380e1dae57093afdb0ba098ba3626286aa784d27d01854194c03f0', 66, 1, 'Personal Access Token', '[]', 0, '2022-01-17 01:26:03', '2022-01-17 01:26:03', '2022-01-24 06:56:03'),
('6f6ef9eb42e512947b437962d374f8f412566edf620356bd102ea944429fd2dc98563e08aca11fdd', 67, 1, 'Personal Access Token', '[]', 0, '2021-12-08 00:43:40', '2021-12-08 00:43:40', '2022-12-08 06:13:40'),
('6fb59bff6cd3a13ae0e3c99a60246006af8e94ac18b9a47c05e7dac8d0db1bccad07ddf03efb2292', 262, 1, 'Personal Access Token', '[]', 0, '2022-05-29 23:39:00', '2022-05-29 23:39:00', '2022-06-06 05:09:00'),
('6ff64d8088e9f544fc27ad76887b5b56831f245f8674e0a8b5064040806651a9729d5caee4b9af57', 66, 1, 'Personal Access Token', '[]', 0, '2022-01-03 05:34:33', '2022-01-03 05:34:33', '2023-01-03 11:04:33'),
('700bd022eaba9e2c5490ce96510f65205f5ba939c1bc77994636bed2574c0b7870bc2d4fe7bbc99b', 66, 1, 'Personal Access Token', '[]', 0, '2022-01-03 04:02:36', '2022-01-03 04:02:36', '2022-01-10 09:32:36'),
('703644c5038ffcbe22045adc4ce99551121fae5459ac9ae3cfb604dabd1aa576015844633f265577', 5, 1, 'Personal Access Token', '[]', 0, '2021-10-02 04:56:54', '2021-10-02 04:56:54', '2022-10-02 10:26:54'),
('7059c458e236cff7e6d3eabb14d6db0e4a1f22e5d99b0ed65bfa8b43c0928b50b0e1ce4c8fafe1ce', 66, 1, 'Personal Access Token', '[]', 1, '2022-01-13 23:48:37', '2022-01-13 23:48:37', '2023-01-14 05:18:37'),
('708ecc4c03067b74e5598eeb0b662ac5f5881614e58d9b8dc5baa77b6963c0e9a670dd9475887849', 69, 1, 'Personal Access Token', '[]', 1, '2021-12-18 00:21:11', '2021-12-18 00:21:11', '2022-12-18 05:51:11'),
('70ac912980ba044164fd0ba38b77d073fd4575d62a975302dd7a4d587f9f6cf25e3006013a93b772', 67, 1, 'Personal Access Token', '[]', 0, '2021-11-25 06:55:10', '2021-11-25 06:55:10', '2022-11-25 12:25:10'),
('711449e19f5d410ce61f45b952801fecc6fafb49ab70706fe2e380b05f3141d312cc7d44fddf8d5a', 66, 1, 'Personal Access Token', '[]', 1, '2022-01-04 04:42:29', '2022-01-04 04:42:29', '2023-01-04 10:12:29'),
('711b5811f390e75e31a24e5a99588683c15e6997b0f26bae35198891e6d7d7cd09ec2f390046e8f8', 123, 1, 'Personal Access Token', '[]', 1, '2021-11-20 06:56:41', '2021-11-20 06:56:41', '2022-11-20 12:26:41'),
('7167da71f30a7692e203900a380d7202a88cfcbfe97b9a0e254ac6bcc77554c32b22e3d76d2fc01d', 66, 1, 'Personal Access Token', '[]', 1, '2021-10-22 23:00:08', '2021-10-22 23:00:08', '2022-10-23 04:30:08'),
('747415d0d8008bca0587b0b1c8cfc5d87e2ae5bb665222f5f8ac97c08de20fa0d355d0701fb94480', 72, 1, 'Personal Access Token', '[]', 1, '2021-12-31 08:30:01', '2021-12-31 08:30:01', '2022-12-31 14:00:01'),
('7481fa1c6162ac40ce52ed30551f1b80faa54faea04fba032d42557199c3085710953ab20118c99d', 123, 1, 'Personal Access Token', '[]', 1, '2021-11-20 05:46:08', '2021-11-20 05:46:08', '2022-11-20 11:16:08'),
('74b008b9d5703c8091f9b27e398835686342d0af63c27d58712e864e5b2e4bdc394f6004ab170152', 69, 1, 'Personal Access Token', '[]', 1, '2022-01-17 03:16:43', '2022-01-17 03:16:43', '2023-01-17 08:46:43'),
('74c49c103e11dd46e599a3c4064d14d2577125b038a4944222c3d995a766b6c92fc3979327bc5af3', 66, 1, 'Personal Access Token', '[]', 0, '2021-11-10 04:01:09', '2021-11-10 04:01:09', '2022-11-10 09:31:09'),
('7536ac414b2ef0ad6854b9b0999f067cf64c87cd9e65f93777b8edd545bed0350040930f887b1ed6', 66, 1, 'Personal Access Token', '[]', 0, '2022-01-02 23:12:50', '2022-01-02 23:12:50', '2023-01-03 04:42:50'),
('7587acaef8e59a0d52a72c4407246ee2665e31636c2e26d4f5edf36af8dff28d600fb48f5019dd8b', 76, 1, 'Personal Access Token', '[]', 0, '2021-10-14 04:03:44', '2021-10-14 04:03:44', '2022-10-14 09:33:44'),
('76a3f273dc8d8c127bfad9a2f9ef24d4d0d8da790786024194f5a99910aa8088e8fd5aee893d092f', 123, 1, 'Personal Access Token', '[]', 0, '2021-11-22 00:38:01', '2021-11-22 00:38:01', '2022-11-22 06:08:01'),
('784b75af03483db65415d500bc86c6bd50b526c89214326a303644ec12f9351ce1e6ae9e0bb378cc', 230, 1, 'Personal Access Token', '[]', 1, '2022-03-10 01:53:53', '2022-03-10 01:53:53', '2023-03-10 07:23:53'),
('78555810b6a803108f3970fc3458763c8b7a0aea3881b84933ae7a4fc35a328a9aa2bbe8d5812355', 220, 1, 'Personal Access Token', '[]', 0, '2022-03-02 10:13:50', '2022-03-02 10:13:50', '2023-03-02 15:43:50'),
('78bbc8d5b295d2cac6cd7a3b9d6dbee219906f9c10a5551fff7f9ea188942414e5351e3856172780', 5, 1, 'Personal Access Token', '[]', 0, '2021-10-07 07:13:28', '2021-10-07 07:13:28', '2022-10-07 12:43:28'),
('7954e2b68dde8b3fab514f5286d690f1561e4e7aeea43a34a04f2cafe6a05f8f1a272aaa4906c033', 66, 1, 'Personal Access Token', '[]', 0, '2021-12-29 01:52:28', '2021-12-29 01:52:28', '2022-12-29 07:22:28'),
('798c4c93b9c4e4f8cfd9cdc3c842d561002adc0422d666c259326ddb7ede4595a4260147f4f0a0b2', 66, 1, 'Personal Access Token', '[]', 0, '2021-12-16 01:51:28', '2021-12-16 01:51:28', '2022-12-16 07:21:28'),
('7afc07cc350e85e0e4d3e19d059d7f000628bba781f7b7131350027ffe5defb6da96f50c47f71523', 66, 1, 'Personal Access Token', '[]', 0, '2022-01-02 19:57:41', '2022-01-02 19:57:41', '2023-01-03 01:27:41'),
('7b94bc8299ff136ccae251bcd3a355a3455972b9b3c691a4696ffb49941910e52a1fbd41d15332ad', 217, 1, 'Personal Access Token', '[]', 1, '2022-03-08 01:00:23', '2022-03-08 01:00:23', '2023-03-08 06:30:23'),
('7bf4a9312205012ea90663ba4500f3cb28aeec7c0c92bfa3b90413b83fcf9500a2539c43367c5323', 66, 1, 'Personal Access Token', '[]', 1, '2022-01-13 19:48:11', '2022-01-13 19:48:11', '2023-01-14 01:18:11'),
('7c1831a24c2697bb9683e9e8a1cd00e2d390fb42f5f47738dd6c9d9545b1242599a0933ba3b7bf64', 225, 1, 'Personal Access Token', '[]', 0, '2022-03-09 22:58:43', '2022-03-09 22:58:43', '2022-03-17 04:28:43'),
('7c5807f9d2376f47d1bd69793c083047205872880ff8d66b1b1637c073efe8496c881ed4fc0eac73', 220, 1, 'Personal Access Token', '[]', 0, '2022-03-07 08:51:28', '2022-03-07 08:51:28', '2023-03-07 14:21:28'),
('7d26807d3fb09baa1189094adff4b03b7c2aeced857bb77304460649830166031ed587f5f7c60aeb', 72, 1, 'Personal Access Token', '[]', 1, '2021-12-31 08:08:25', '2021-12-31 08:08:25', '2022-12-31 13:38:25'),
('7d916bb108e6fb54d98936d6a22c87062cf80d027aa99a12da03ed94fbfaddce485342eb54af1618', 72, 1, 'Personal Access Token', '[]', 0, '2021-12-31 05:49:57', '2021-12-31 05:49:57', '2022-12-31 11:19:57'),
('7dcf51562eeca020a3558776507db6d715e075442d7520dedbd5bfd8a7760b0b494a20ffbfbb6d6a', 72, 1, 'Personal Access Token', '[]', 0, '2022-01-17 04:18:06', '2022-01-17 04:18:06', '2023-01-17 09:48:06'),
('7e1199b055704878d6ec94a45e845801584912a1f6368f29ae0515c36561a09e29c76e0f3bfdb62a', 67, 1, 'Personal Access Token', '[]', 0, '2021-12-06 04:42:18', '2021-12-06 04:42:18', '2022-12-06 10:12:18'),
('7e68c054dcdf7d59139a098ae4adc7e67e6ba18dccfbf723864c3fd5625fdd33f52bceaf434e3a32', 66, 1, 'Personal Access Token', '[]', 0, '2021-12-05 23:43:30', '2021-12-05 23:43:30', '2021-12-13 05:13:30'),
('7ecca2a043044b03f933e6ffa0e334efcbd9ca2bc1cb4dfb18a7f72fab5836a68865279990c4e8bb', 70, 1, 'Personal Access Token', '[]', 1, '2022-01-01 00:10:07', '2022-01-01 00:10:07', '2023-01-01 05:40:07'),
('7f34ec7b48b86cda519cb84200cd98621097f263ea0aa286a6e543feb1399fda8ee32e1ab61d6142', 38, 1, 'Personal Access Token', '[]', 0, '2021-10-08 05:04:51', '2021-10-08 05:04:51', '2021-10-15 10:34:51'),
('7f3dd27c34361cf0462eac4630dad086dffab0b32703124b2544876274637e204febfa5afe85e392', 69, 1, 'Personal Access Token', '[]', 0, '2022-01-04 23:19:44', '2022-01-04 23:19:44', '2023-01-05 04:49:44'),
('7f5c7f5550230aa4c40d62947eb607cd1432e521da170abad691f6e27f30f06b60a910614db91825', 123, 1, 'Personal Access Token', '[]', 0, '2021-11-20 07:27:04', '2021-11-20 07:27:04', '2022-11-20 12:57:04'),
('7fb6662ad25302c977fd7a502e1f3a85bcb1901b65b091f73c55f0ed4a9a15df54681a12f6599222', 220, 1, 'Personal Access Token', '[]', 1, '2022-05-19 07:11:30', '2022-05-19 07:11:30', '2023-05-19 12:41:30'),
('7fc1eb05b369353fcfa311f0bdf351c0c82a029409c959bdf611aebd6e803a094a24c063400e2179', 5, 1, 'Personal Access Token', '[]', 0, '2021-10-07 23:38:49', '2021-10-07 23:38:49', '2022-10-08 05:08:49'),
('806334d3b940f379538d22f78237503a0d353dfaa51bd848fc7a56733b3d47f2c8e472d7f0179377', 66, 1, 'Personal Access Token', '[]', 0, '2022-01-06 02:25:53', '2022-01-06 02:25:53', '2023-01-06 07:55:53'),
('8087f04d65aff6cac7d109710fcf3100d96e8141dd05d0f7d5811a01618aa67447654fa9c2fcc4c2', 220, 1, 'Personal Access Token', '[]', 1, '2022-05-19 06:56:56', '2022-05-19 06:56:56', '2023-05-19 12:26:56'),
('8113ff14bb26ba11b0269bae620271e9c7e03ac15076fffb07f862968ff23ad6d8ba0f40db0578f8', 69, 1, 'Personal Access Token', '[]', 0, '2022-01-27 02:48:12', '2022-01-27 02:48:12', '2023-01-27 08:18:12'),
('811f3d8c9cf6cfa47332c819a1140186a3bb821ecbf31cf9ec75a1365f8acac6b25eb9b60ac25e5f', 66, 1, 'Personal Access Token', '[]', 1, '2022-01-16 23:17:01', '2022-01-16 23:17:01', '2023-01-17 04:47:01'),
('818c1c92ff8f05528d45729f8fc9b8cf9e5899d2a1de02c7ac594def11a91a7f9d4995637156e818', 123, 1, 'Personal Access Token', '[]', 0, '2021-11-19 05:57:00', '2021-11-19 05:57:00', '2022-11-19 11:27:00'),
('81b85dea6162673bc00eff193e183d1024b59f9c50657e095a6758b9112ed190f55a8f28fa5376d4', 5, 1, 'Personal Access Token', '[]', 0, '2021-10-02 04:36:52', '2021-10-02 04:36:52', '2022-10-02 10:06:52'),
('81e1b78c8243d54bb50458dfc297b0da8b950cb737f65e5e122ff6e4981737092ac597b978dab198', 225, 1, 'Personal Access Token', '[]', 0, '2022-03-11 05:57:30', '2022-03-11 05:57:30', '2023-03-11 11:27:30'),
('831205b3ba6d881a9c8375b787da3986bc74c185633dc5791afc7e081eb030eeb22f8116c187b35e', 227, 1, 'Personal Access Token', '[]', 0, '2022-03-02 23:41:38', '2022-03-02 23:41:38', '2023-03-03 05:11:38'),
('83338a8e2523fa83395b4ce6d2b093cec9b8dd647fe90273948e7c11748e27e321f27cb2fc37b502', 225, 1, 'Personal Access Token', '[]', 0, '2022-02-24 19:50:27', '2022-02-24 19:50:27', '2023-02-25 01:20:27'),
('83a3217b019fc388e732546edb2592e7b0af1048b09be9585b38b8930e5a9d81799a4c11542ee668', 70, 1, 'Personal Access Token', '[]', 0, '2022-01-21 00:30:53', '2022-01-21 00:30:53', '2023-01-21 06:00:53'),
('83acb82439accce880813de007d0d0fa33c8a05962b46144d4ff256051c661618eb64b612e7a11d0', 66, 1, 'Personal Access Token', '[]', 0, '2021-12-29 03:54:04', '2021-12-29 03:54:04', '2022-12-29 09:24:04'),
('83e358b5136a3e122e2692d1cdd286c73749e51b33715916ba7b97a593b5e9cfc2055a9cbbf11365', 70, 1, 'Personal Access Token', '[]', 1, '2022-01-21 00:30:54', '2022-01-21 00:30:54', '2023-01-21 06:00:54'),
('83fa954a29b4d3f8956d12c69f409b0b628facfb9315cdb95342766432faa18944bdcdb798152e12', 199, 1, 'Personal Access Token', '[]', 1, '2022-01-12 09:07:25', '2022-01-12 09:07:25', '2023-01-12 14:37:25'),
('8406929a44fdb23514989c7e8697f216118f1840a838adc5aa4d06493e4dcdd35093d48f29aab4d6', 101, 1, 'Personal Access Token', '[]', 0, '2021-11-16 06:29:16', '2021-11-16 06:29:16', '2022-11-16 11:59:16'),
('84473f1af9857c9f8760171e524a350556e620a2a5dd031bb3072ba31e057e8d38284ec0d49ff42e', 67, 1, 'Personal Access Token', '[]', 1, '2021-12-17 23:07:29', '2021-12-17 23:07:29', '2022-12-18 04:37:29'),
('844b286131fe8bc4282e7f365726a44be2d8ee2e88ac4caeb911e78f0d92817765f3b265152dd08f', 123, 1, 'Personal Access Token', '[]', 1, '2021-12-03 01:08:37', '2021-12-03 01:08:37', '2022-12-03 06:38:37'),
('8466bc62faf35189a1e411ec66703ff6f4ef7ec0509fb5928be6c8234a00eeec3a150d8bc266d880', 181, 1, 'Personal Access Token', '[]', 0, '2021-12-03 23:26:23', '2021-12-03 23:26:23', '2022-12-04 04:56:23'),
('84c3ebaba077be74e3f1384504438d9fcfd4b070bcc0c527d71f218307b6491be6e1046cde73699d', 101, 1, 'Personal Access Token', '[]', 0, '2021-11-17 06:33:35', '2021-11-17 06:33:35', '2021-11-24 12:03:35'),
('84da3679b3a47fd2e2f3ef30fd08240f4112830760e3ae7795bc0490e30f361f07cde5d9a96d2303', 70, 1, 'Personal Access Token', '[]', 0, '2021-12-17 23:24:51', '2021-12-17 23:24:51', '2022-12-18 04:54:51'),
('854c0fc597262057e3a88ef9e217ff8241ad5aa4b281ae6bfdcfe58ab8926a4a50256ec19abd92a7', 72, 1, 'Personal Access Token', '[]', 0, '2022-01-03 09:34:00', '2022-01-03 09:34:00', '2023-01-03 15:04:00'),
('854ee8fe04deda404ba9820f8b351e06c8988dac0778e9adce30064a9fab090864578db5aba8f40b', 123, 1, 'Personal Access Token', '[]', 0, '2021-11-20 07:14:02', '2021-11-20 07:14:02', '2022-11-20 12:44:02'),
('868ec9737dc3efeb4254adddb1280d0fa8179016abedbd443c8c8d55e65979de277416ad4a9d738e', 66, 1, 'Personal Access Token', '[]', 0, '2021-12-02 04:52:41', '2021-12-02 04:52:41', '2021-12-09 10:22:41'),
('8772270f81c2142a73825d6d09ae199256c31bc37712b214943969afea412a4a39be2a8b7aa24034', 66, 1, 'Personal Access Token', '[]', 0, '2022-01-17 01:28:10', '2022-01-17 01:28:10', '2022-01-24 06:58:10'),
('8789665fea8298020c32e38e3370ac9372d40bb97f64998354d7e35557dbeef9aaa8b63b20b866a8', 72, 1, 'Personal Access Token', '[]', 1, '2021-12-31 08:28:39', '2021-12-31 08:28:39', '2022-12-31 13:58:39'),
('881e34cca60ccdbab49ac944a1c10a177c58c9c8075255dff2be63ccf1fb5d6c5efb67616ceff1e0', 69, 1, 'Personal Access Token', '[]', 1, '2022-01-06 03:04:12', '2022-01-06 03:04:12', '2023-01-06 08:34:12'),
('886776df6b8711bac012e081c23b4d23f9955bc2dff48cf2b34060ec72b323502e929cb2e026181b', 251, 1, 'Personal Access Token', '[]', 0, '2022-05-14 00:38:14', '2022-05-14 00:38:14', '2023-05-14 06:08:14'),
('886c674ebf76d24e3a1cf48e2260990257e1abccfc4ef8387863b87df3315447a2d9a667afeb60b5', 66, 1, 'Personal Access Token', '[]', 1, '2021-11-11 01:00:43', '2021-11-11 01:00:43', '2022-11-11 06:30:43'),
('888c59c6630a4f03da84c74b45616a60a72ef01e1bbcdf7cfd6f8a0c8acde9f9e9990ff74a62bf43', 123, 1, 'Personal Access Token', '[]', 1, '2021-11-29 06:18:12', '2021-11-29 06:18:12', '2022-11-29 11:48:12'),
('88e613f5e4a41d8b3e7538b65c328dc7caa58a6f566304ac44d7e9143f3e83ee5ff208fed7f5d302', 218, 1, 'Personal Access Token', '[]', 1, '2022-02-28 00:20:11', '2022-02-28 00:20:11', '2023-02-28 05:50:11'),
('891a16054a7b75c0f3f19ecda881fdc01f8e953fc77049dba4c1cee233d45042c42b9ea60a6fce0e', 72, 1, 'Personal Access Token', '[]', 0, '2022-01-03 09:02:55', '2022-01-03 09:02:55', '2023-01-03 14:32:55'),
('892be1494a3836548461593612f63b9cb1f3faae42b000728223a95ffcd673a2c122ceb90fa4cbb5', 69, 1, 'Personal Access Token', '[]', 0, '2022-01-12 22:54:46', '2022-01-12 22:54:46', '2023-01-13 04:24:46'),
('89ba229caae1a73ee4e741c3981f15ff9688821e9b2d7d351686822fa250b6cac118ff3809ab1a5e', 220, 1, 'Personal Access Token', '[]', 0, '2022-03-10 08:38:43', '2022-03-10 08:38:43', '2023-03-10 14:08:43'),
('8aa14f376b623185a53cfb577bef1527a89051168368b13377f22a64b8dc9e644c1d1f607bc5dff3', 123, 1, 'Personal Access Token', '[]', 1, '2021-12-06 04:26:22', '2021-12-06 04:26:22', '2022-12-06 09:56:22'),
('8ac264eb1cea8a705d8c522dcdbc8ebd71942925b88a66dacc2a443ddce9e33af8ba464d0038344f', 72, 1, 'Personal Access Token', '[]', 0, '2022-01-04 23:44:08', '2022-01-04 23:44:08', '2023-01-05 05:14:08'),
('8b9009333b2f7a71cb5d062f77c335df648d9eabd22cd960e4c3c77470620e14ef67d8a6a5ad4359', 225, 1, 'Personal Access Token', '[]', 0, '2022-03-03 03:54:18', '2022-03-03 03:54:18', '2023-03-03 09:24:18'),
('8c133269fef81471b56037a36c509b383537c329f37e8ca9700a95ffc337ce9215309f3670d9253a', 5, 1, 'Personal Access Token', '[]', 0, '2021-10-07 23:38:59', '2021-10-07 23:38:59', '2022-10-08 05:08:59'),
('8c3454cc08ed120e1f792ff144646c49c3f3e1f08e0816d904ea5e20422169208ec4e14073d37c84', 69, 1, 'Personal Access Token', '[]', 0, '2022-01-12 22:54:46', '2022-01-12 22:54:46', '2023-01-13 04:24:46'),
('8c3bad84367e7fa7c4cd6159b465ef8b8f6b8562858649bfed776a31c6ba85b94229ced673b0776a', 262, 1, 'Personal Access Token', '[]', 1, '2022-05-19 07:06:41', '2022-05-19 07:06:41', '2023-05-19 12:36:41'),
('8cdfdf330b91ce5d6bf870dc2f9eaabade5af56bf26468afeb03cb6286a57086e95098b2d1d4846d', 66, 1, 'Personal Access Token', '[]', 1, '2021-11-09 08:04:59', '2021-11-09 08:04:59', '2022-11-09 13:34:59'),
('8d84f6e7faacd19f7eb514b077f63efa7dfec85659f977cb7fe7f44db864cc4b9bcd4fa3dc35f8d4', 240, 1, 'Personal Access Token', '[]', 0, '2022-05-09 04:49:14', '2022-05-09 04:49:14', '2023-05-09 10:19:14'),
('8f09a738624bda3cf85fa9e6e74e6aa82c45f242e214196eecfdb3912ba389e960b9a9aae93a3f1c', 123, 1, 'Personal Access Token', '[]', 0, '2021-11-25 00:32:28', '2021-11-25 00:32:28', '2022-11-25 06:02:28'),
('8fc0a048105d6ef4f1e3f460ea6b7ec5c0e0213abb2f6ce51d95f78241561b278621822cd5736e1b', 123, 1, 'Personal Access Token', '[]', 0, '2021-11-20 06:43:15', '2021-11-20 06:43:15', '2022-11-20 12:13:15'),
('902d6bdfb5a385d638eac3a372be305a615f6faea7d40f47512ad7eec9c505f1777e305552c0e015', 67, 1, 'Personal Access Token', '[]', 0, '2021-11-27 04:40:18', '2021-11-27 04:40:18', '2022-11-27 10:10:18'),
('90a397f5266979332dd4409e6fe17a38a9414b1f6a1547ac267487a9b50625669486d7bd574b6573', 69, 1, 'Personal Access Token', '[]', 0, '2022-01-12 22:54:46', '2022-01-12 22:54:46', '2023-01-13 04:24:46'),
('90d23ad9735836a3947b04aab88e8955a5869eff7db08e558bf45410b2d275fa407ac98b80e8d335', 67, 1, 'Personal Access Token', '[]', 1, '2021-10-22 23:10:09', '2021-10-22 23:10:09', '2022-10-23 04:40:09'),
('916b2357c4fb937dfc506959e3e979abe932c72460945d78fcb5c58fafa4aa06ff4bf0b3a58df1d2', 123, 1, 'Personal Access Token', '[]', 1, '2021-11-22 00:22:57', '2021-11-22 00:22:57', '2022-11-22 05:52:57'),
('91ab943cc85213a8b7e2d4d2b20ea45455f3254035f40226e4a0c03ad2d4a18559fff0bd7dfa0201', 66, 1, 'Personal Access Token', '[]', 0, '2021-12-10 05:56:44', '2021-12-10 05:56:44', '2022-12-10 11:26:44'),
('91e59c292af53639d7ac12f9936941c1520b72587fe8ff55d904f633d0a8f1faf49b1eebc49d0181', 220, 1, 'Personal Access Token', '[]', 1, '2022-05-06 00:05:18', '2022-05-06 00:05:18', '2023-05-06 05:35:18'),
('924dd5ea815088eee16b25ef4989cfd629f35afb164df01a3c8ee0cec9c62e5170cbdfd99813058e', 72, 1, 'Personal Access Token', '[]', 0, '2022-01-05 04:16:44', '2022-01-05 04:16:44', '2023-01-05 09:46:44'),
('926df1c96c17a628dbf6f3f94a825be4b873cc5f6ba9e8824e91160f9240d12038c8eab4e4e95d61', 72, 1, 'Personal Access Token', '[]', 0, '2022-01-27 00:39:54', '2022-01-27 00:39:54', '2023-01-27 06:09:54'),
('92b8171beb919823210629f95020c95b3f0cbb348f700675042bff8602bbb2831815ed0b781fdf28', 66, 1, 'Personal Access Token', '[]', 0, '2021-12-02 01:18:40', '2021-12-02 01:18:40', '2022-12-02 06:48:40'),
('92c312b4131f25c20130778c69d061755f5a5e9d3f12fb6a1a0564adeb0bdf9a2b1a8e9b38e4aabb', 72, 1, 'Personal Access Token', '[]', 1, '2022-01-13 00:05:29', '2022-01-13 00:05:29', '2023-01-13 05:35:29'),
('932ff195bfbc4745dd93ad8dda6b8b101fa2672130d172758c0eb74e427618cf7eff30150dd0c43f', 5, 1, 'Personal Access Token', '[]', 0, '2021-10-07 07:15:56', '2021-10-07 07:15:56', '2022-10-07 12:45:56'),
('938b44e29045710a79e6d92dbf1855f78864d76db0f5f28efbe315f5e5a072c4a9133e016b2925e5', 66, 1, 'Personal Access Token', '[]', 0, '2021-10-26 01:09:16', '2021-10-26 01:09:16', '2021-11-02 06:39:16'),
('939a2faf06022e487b7895e6d0193ab03fe27e907d0096f7dc4c7352881ea962fb914994ba4f419d', 66, 1, 'Personal Access Token', '[]', 0, '2022-01-16 23:07:01', '2022-01-16 23:07:01', '2023-01-17 04:37:01'),
('939fe69f519642883a8e682b2ce725f5834f53adb928d48e6498b69c31094dcf3187f59ad5e1eaf1', 225, 1, 'Personal Access Token', '[]', 1, '2022-02-25 05:53:56', '2022-02-25 05:53:56', '2023-02-25 11:23:56'),
('93b18b5ddd3bf9f4ac53fb59ab2c0838f37416c12be51809565ae5c4639e45d0f7775fea0f984e65', 72, 1, 'Personal Access Token', '[]', 1, '2022-01-27 00:38:53', '2022-01-27 00:38:53', '2023-01-27 06:08:53'),
('93b50cae9e5d42659c3c3654f1caea8cccfd2d747d3eb9f454cb1dcf8f6c55fa90c5430d518b6c74', 220, 1, 'Personal Access Token', '[]', 0, '2022-03-07 08:51:28', '2022-03-07 08:51:28', '2023-03-07 14:21:28'),
('93bf98c25a0eb3ec2f69b2acc6285745d72e22088d5261fa31887b21fbca9087ca1eadeb79999fa3', 72, 1, 'Personal Access Token', '[]', 0, '2022-01-17 07:57:30', '2022-01-17 07:57:30', '2023-01-17 13:27:30'),
('93dd7379faec0d34e68ab3afca4dbd470328f7088813194b86e5a035a6734655cf4b777090f38b60', 67, 1, 'Personal Access Token', '[]', 1, '2021-12-06 06:44:36', '2021-12-06 06:44:36', '2022-12-06 12:14:36'),
('95590bdaf53dc6927884f8984873b98187c84e2f0fa39dd58362f529f3ecaf04b73208cba7562b85', 69, 1, 'Personal Access Token', '[]', 0, '2021-12-27 05:57:28', '2021-12-27 05:57:28', '2022-12-27 11:27:28'),
('956532a9fbecbb5f61b9791760bcf3ed497924e41ace7156a54053cc1e919821734c06d43d08c718', 67, 1, 'Personal Access Token', '[]', 0, '2021-12-08 01:53:26', '2021-12-08 01:53:26', '2022-12-08 07:23:26'),
('95c114528528b09428ff2d39cb9850fc93e97b588c482bfe662201e9dd3983dff382dc66e3f435f7', 123, 1, 'Personal Access Token', '[]', 0, '2021-11-27 04:41:39', '2021-11-27 04:41:39', '2022-11-27 10:11:39'),
('960be67cac89b3d5dc0c7c75c08a9921a675af4715fa9cd55d6501658563260fee85e3af7d6d3f3a', 66, 1, 'Personal Access Token', '[]', 1, '2022-01-16 23:54:21', '2022-01-16 23:54:21', '2023-01-17 05:24:21'),
('966a2a2cb711b6908c2616e5b43eb78f1f09eb2d17d5eff6c54cc890aae1f52ddd38f11e63fb1402', 48, 1, 'Personal Access Token', '[]', 0, '2021-10-11 07:05:51', '2021-10-11 07:05:51', '2022-10-11 12:35:51'),
('96d13250aad2d9746267b2973a7733cc6f2a0b315988dcef8fc2c0eccb4c1085e8575bb1c9406ffd', 66, 1, 'Personal Access Token', '[]', 1, '2021-12-29 00:44:33', '2021-12-29 00:44:33', '2022-12-29 06:14:33'),
('96db985fbf2ff4bfdefcb7ebe20f45e9af160a7f7474f21d2a26292effd11342197682c6b1b3b898', 5, 1, 'Personal Access Token', '[]', 0, '2021-10-02 04:59:45', '2021-10-02 04:59:45', '2022-10-02 10:29:45'),
('97a95f7f7d2bc965801d5933a163721ec6cc5e6228b099a79f21a5174b96725b8030a1b5a69c6f31', 101, 1, 'Personal Access Token', '[]', 0, '2021-11-16 06:25:16', '2021-11-16 06:25:16', '2021-11-23 11:55:16'),
('97b41ae1848d2d10757a50e7b0994ee7c65af71cc7cf880e73449db598e8035f2c38cb93f006c4d8', 72, 1, 'Personal Access Token', '[]', 1, '2021-12-31 08:22:16', '2021-12-31 08:22:16', '2022-12-31 13:52:16'),
('98ca8fc018c28599f37aaf1200b04b204c71fe007248f6c413b992d7e836f36080c7d0c25ab91de1', 72, 1, 'Personal Access Token', '[]', 1, '2022-01-17 02:23:25', '2022-01-17 02:23:25', '2023-01-17 07:53:25'),
('992b248d154b64ff6f8a3f4fb28807e9a6bb816e9a6772269718f4e62a201a8d1c0c51699e4defbb', 70, 1, 'Personal Access Token', '[]', 1, '2022-01-21 23:33:13', '2022-01-21 23:33:13', '2023-01-22 05:03:13'),
('994f38a102ac8d6aeb1179b5d99b74d1295f56828d9c28aafac67b1f1f81b6893d71af3ecd9e8ec9', 66, 1, 'Personal Access Token', '[]', 0, '2022-01-02 19:57:41', '2022-01-02 19:57:41', '2023-01-03 01:27:41'),
('99b1573b6c8e32432db4e5abde9505c60449915c8ba9a9bf6f0f357c66d10bf95e7a45b5d3430403', 123, 1, 'Personal Access Token', '[]', 1, '2021-11-22 10:59:29', '2021-11-22 10:59:29', '2022-11-22 16:29:29'),
('99fcd17da7ee853cd68bf70dcdcd6987603e61113fff1409c27db80ce04e9a4bb626ec9564694515', 220, 1, 'Personal Access Token', '[]', 0, '2022-03-02 23:47:45', '2022-03-02 23:47:45', '2023-03-03 05:17:45'),
('9a000d084dc527c2fae13c4847bed675b646d609885a379f70327bd8842c95d46e2354a72c7d0b34', 66, 1, 'Personal Access Token', '[]', 0, '2022-01-02 23:12:50', '2022-01-02 23:12:50', '2023-01-03 04:42:50'),
('9bc769d49d5402ff5c0a558edaf9b5b43b2e88b6f5fa283a1e5f309fd061365f283e91c16cfbfabc', 5, 1, 'Personal Access Token', '[]', 0, '2021-10-12 05:04:24', '2021-10-12 05:04:24', '2021-10-19 10:34:24'),
('9c515d760a6b44e69d9c004cae7ec9e4c7217c6d7372dc14b394346daed77d47e2ed6adf0cf0e0ec', 67, 1, 'Personal Access Token', '[]', 0, '2021-12-06 10:46:01', '2021-12-06 10:46:01', '2022-12-06 16:16:01'),
('9c72c8bbbf677ec89a25fe6849354e2cf8333c1469c7707ef177d3a42f66f27531256f48609f874c', 66, 1, 'Personal Access Token', '[]', 1, '2021-11-09 23:42:02', '2021-11-09 23:42:02', '2022-11-10 05:12:02'),
('9ce6c3b94d9502a991c9a3c5222dda7146b871044da8b0c06f7b8fd11feb8f6807e554c80b9c9b44', 72, 1, 'Personal Access Token', '[]', 1, '2022-01-13 23:49:52', '2022-01-13 23:49:52', '2023-01-14 05:19:52'),
('9d072abbf2fbc792c29eb03331493e57d3c9bb1a002021f40983ea0ba90cd309a05e747ac03e0206', 220, 1, 'Personal Access Token', '[]', 1, '2022-02-25 05:29:44', '2022-02-25 05:29:44', '2023-02-25 10:59:44'),
('9d4fc84ee24fc4ed5f89b515f3b7efec04549fae2c1f6fd373220b21f2fdf048a35eb92ffcbbf7bd', 66, 1, 'Personal Access Token', '[]', 1, '2021-10-22 23:13:37', '2021-10-22 23:13:37', '2022-10-23 04:43:37'),
('9d5f4e367264f25b7b5f222bdd8536cb53ee6a0000e38e0040d078134081139932a9c4afd8865569', 69, 1, 'Personal Access Token', '[]', 1, '2022-01-22 02:28:40', '2022-01-22 02:28:40', '2023-01-22 07:58:40'),
('9da11a106ca8ba688234735346da94986b7d57298a798ed7edaa135183ad3306b2835ff7bcff0664', 70, 1, 'Personal Access Token', '[]', 0, '2022-01-01 00:10:07', '2022-01-01 00:10:07', '2023-01-01 05:40:07'),
('9da574300b4c1cffb2adc0ee926f61c917ba9b955cb4158f98f1c36ab08e0d1c23ee2f1e889f09e5', 94, 1, 'Personal Access Token', '[]', 0, '2021-12-03 04:00:39', '2021-12-03 04:00:39', '2022-12-03 09:30:39'),
('9daa09a011f35391ee8227e75f33fd8e22667a9c59103c39626a340f7294c1d74e70ed3e33804fa4', 70, 1, 'Personal Access Token', '[]', 1, '2021-12-27 10:29:24', '2021-12-27 10:29:24', '2022-12-27 15:59:24'),
('9dade5af71125de6163da1f8747e2c53153fca337f5e768f7d0c36fa1805e9a90bc83cd7060a20f1', 69, 1, 'Personal Access Token', '[]', 1, '2021-12-17 23:39:06', '2021-12-17 23:39:06', '2022-12-18 05:09:06'),
('9ed2f317321a75e33a46593c29baad9c1c344235bbd3b7844bc109b27a8d7664c8e76dab6cd35bbb', 66, 1, 'Personal Access Token', '[]', 1, '2022-01-13 23:46:12', '2022-01-13 23:46:12', '2023-01-14 05:16:12'),
('9ef97367cd40e1210069c51143594c981cdd63f72b1b73753eab973ca64cc885cd7363fde9f59c97', 123, 1, 'Personal Access Token', '[]', 1, '2021-12-08 01:57:06', '2021-12-08 01:57:06', '2022-12-08 07:27:06'),
('9f20251d88ef76da2aa393cc595039e765af795cb8a1f7bfce82d41e1a3ce4072db996d10b91c2b1', 123, 1, 'Personal Access Token', '[]', 1, '2021-11-18 05:06:41', '2021-11-18 05:06:41', '2022-11-18 10:36:41'),
('9fe837498604fceb3c025465df250cb2bfc70c77fc90471a853144285793e000c734655b752a2799', 123, 1, 'Personal Access Token', '[]', 0, '2021-11-20 02:10:58', '2021-11-20 02:10:58', '2022-11-20 07:40:58'),
('a0d47f9450e2e633a5b3f4c9c55f5d03c3305f49e333506c02c5bafa7eca0afee5361498e29e77be', 220, 1, 'Personal Access Token', '[]', 0, '2022-03-02 20:31:17', '2022-03-02 20:31:17', '2023-03-03 02:01:17'),
('a11f5f169129b4eef5f1b2b412d9570a55d8d864cc4ab2ef4bf955af89baebee27c30fd563c88a1b', 67, 1, 'Personal Access Token', '[]', 1, '2021-12-08 00:49:51', '2021-12-08 00:49:51', '2022-12-08 06:19:51'),
('a149859d831a0d9731b03b8c88ecdf93c0154718529e95468ba3fe33d1a352603103682f597b2d98', 72, 1, 'Personal Access Token', '[]', 0, '2022-01-05 07:56:35', '2022-01-05 07:56:35', '2023-01-05 13:26:35'),
('a1b45593de219eff8cf854275f8e43cc372d185f8195a73dc109c6bcc04c8a5f82def59cf52735b8', 178, 1, 'Personal Access Token', '[]', 0, '2021-11-29 06:02:05', '2021-11-29 06:02:05', '2021-12-06 11:32:05'),
('a1f001d0b0f97a627b6bd3738803c187a4da7ded18bd22f4f6a75ac35ac8870c89f69a7ee653ca1d', 220, 1, 'Personal Access Token', '[]', 1, '2022-05-19 07:19:58', '2022-05-19 07:19:58', '2023-05-19 12:49:58'),
('a21826bc312298e26797870b0ab144c83d7e32317b3521a45150bbd7104177e81a706b5d3eaacac5', 220, 1, 'Personal Access Token', '[]', 1, '2022-03-10 10:12:31', '2022-03-10 10:12:31', '2023-03-10 15:42:31'),
('a225f0bef474858c79092d02d595e61b21eb835ad360f217d77ee6ea406f5b714b8ccce511c03506', 123, 1, 'Personal Access Token', '[]', 1, '2021-11-18 05:59:47', '2021-11-18 05:59:47', '2022-11-18 11:29:47'),
('a2dd56217a68b2f36dfcfce63b9bc006e3399a170fa93efbef66c29415302fe58003648cbd0407d7', 116, 1, 'Personal Access Token', '[]', 1, '2021-11-17 05:16:10', '2021-11-17 05:16:10', '2022-11-17 10:46:10'),
('a3002c9cfbe458f734930b1fee02a8723ecf8e7b087ab989bfed22742f83bbadbc98d40877c2fc5c', 123, 1, 'Personal Access Token', '[]', 1, '2021-11-21 02:46:05', '2021-11-21 02:46:05', '2022-11-21 08:16:05'),
('a32264e044837e20323d0a9727a76ba4559fb489d8011405a36b8e4ea4f34ea94e43b6e5a73e9884', 66, 1, 'Personal Access Token', '[]', 0, '2021-12-07 23:43:31', '2021-12-07 23:43:31', '2021-12-15 05:13:31'),
('a33d03750300279120bb1ca7fb2409abf09bfde3c45df4eba5af1cb5bfda5fa0191d225b79d02db1', 66, 1, 'Personal Access Token', '[]', 1, '2022-01-03 06:08:33', '2022-01-03 06:08:33', '2023-01-03 11:38:33'),
('a3e7e32a1357a0440d99d24470fdbe8616b2471851a78b0dfe285257cfeb3b0d1e620c559a3f64a0', 5, 1, 'Personal Access Token', '[]', 0, '2021-10-12 05:18:12', '2021-10-12 05:18:12', '2022-10-12 10:48:12'),
('a464d2e9f1f8b74aa5373bc03a660f34a32a99caa806e67a8e200bb4bce370c5fc49570d233e952d', 66, 1, 'Personal Access Token', '[]', 1, '2021-11-18 05:47:41', '2021-11-18 05:47:41', '2022-11-18 11:17:41'),
('a49666ea48f89c6aa39b1f460f2966fd0ef71af0a78549fce245c40a4698e7098afe68f7e9653c74', 220, 1, 'Personal Access Token', '[]', 1, '2022-05-06 00:06:06', '2022-05-06 00:06:06', '2023-05-06 05:36:06'),
('a4dea50b9440226f0c2cce34785ece2aaa5e8e659cc52b100b73adcebd439ae347a66891ce805117', 123, 1, 'Personal Access Token', '[]', 1, '2021-11-21 02:40:03', '2021-11-21 02:40:03', '2022-11-21 08:10:03'),
('a57c4a3815c3300f09c6c84a762ea21887878178cd0663daab75132d155fcf8e5dd0c4f17c9c4fba', 72, 1, 'Personal Access Token', '[]', 1, '2022-01-04 04:39:59', '2022-01-04 04:39:59', '2023-01-04 10:09:59'),
('a614ef07699443d345fff19a4a08a3f864a1caae8ebd56d37bc80be111bb2a4faa511582362cca53', 123, 1, 'Personal Access Token', '[]', 1, '2021-11-20 07:22:33', '2021-11-20 07:22:33', '2022-11-20 12:52:33'),
('a6326ad7287259470ec57defe2c2afa8ee22048d5c6c9873ab90bb08704ba6e790c83f8804f6d5ef', 264, 1, 'Personal Access Token', '[]', 0, '2022-05-31 23:47:07', '2022-05-31 23:47:07', '2023-06-01 05:17:07'),
('a69ef6eef4ad493905ea66b3be5bb562a95253135ea7d5fd388d7c8ad089ca53f3d102fece83a4d5', 66, 1, 'Personal Access Token', '[]', 0, '2022-01-17 01:04:53', '2022-01-17 01:04:53', '2022-01-24 06:34:53'),
('a6fb900b35100ba7decb40848e9b4622f97a424d00ebbb3096102356fda486f6186254deb9b120b4', 72, 1, 'Personal Access Token', '[]', 1, '2022-01-27 00:45:02', '2022-01-27 00:45:02', '2023-01-27 06:15:02'),
('a74f6b4f9381396b868d0fe73ed6e32fe503a8e14de3d59c794e4d0b7068f01df00cb627f69b8aed', 66, 1, 'Personal Access Token', '[]', 1, '2022-01-12 09:01:34', '2022-01-12 09:01:34', '2023-01-12 14:31:34'),
('a7730ab4cbe9eb8c9a1fae4e9aea8f3f4799c7c706bf823524c9a449a0387c492341c98be6dd7962', 72, 1, 'Personal Access Token', '[]', 0, '2022-01-17 01:09:32', '2022-01-17 01:09:32', '2023-01-17 06:39:32'),
('a77ebef5f6ab7cd46d95e7dfe76c77e69cb96b13ad6acdbcd97736a1e9bf637f0004c2f120c6b9f4', 146, 1, 'Personal Access Token', '[]', 0, '2021-11-18 23:19:43', '2021-11-18 23:19:43', '2021-11-26 04:49:43'),
('a791e7409d037c7541d3bf517b7c9a377f450f5134706446dc268c9033ad76e1f37518098af8f868', 101, 1, 'Personal Access Token', '[]', 0, '2021-11-16 06:50:35', '2021-11-16 06:50:35', '2021-11-23 12:20:35'),
('a824396548f4e407a32f3f836dcc6d4a89790641a8851e08137fd428efafdc1e167450e50e93e5cd', 181, 1, 'Personal Access Token', '[]', 0, '2021-12-04 00:02:40', '2021-12-04 00:02:40', '2022-12-04 05:32:40'),
('a842536ca8fb3ffdc4109f0bbfb7e81ba8b52898b2746f3aef1eb3254ab6e2ebd807bfc22298113d', 66, 1, 'Personal Access Token', '[]', 0, '2021-12-08 06:25:50', '2021-12-08 06:25:50', '2021-12-15 11:55:50'),
('a907f591a94cf07299a66a392473315056666384e438366b3d3e8f2072db013af811b5ecceb2d206', 69, 1, 'Personal Access Token', '[]', 1, '2021-12-18 00:05:40', '2021-12-18 00:05:40', '2022-12-18 05:35:40'),
('a9b1037c0b664dfdf6724d18d8ef50725bb8c466e538643795ab065af8fab2634a50deb39ec8762d', 67, 1, 'Personal Access Token', '[]', 1, '2021-12-08 00:41:30', '2021-12-08 00:41:30', '2022-12-08 06:11:30'),
('aaaba448e1554acbf0dfaa547446bbaa0337211bf763ff5fa212923fab248b3f345f3b3d7b7087b6', 66, 1, 'Personal Access Token', '[]', 1, '2021-12-10 06:11:46', '2021-12-10 06:11:46', '2022-12-10 11:41:46'),
('ab085f25ccd3cf62ddb66044e88a9bf4211fbf418cf90523e5c19cc6f7820a03ef9e67a2e3f2bd26', 225, 1, 'Personal Access Token', '[]', 1, '2022-05-09 00:29:52', '2022-05-09 00:29:52', '2023-05-09 05:59:52'),
('ab3d213bcc2d83f3593b3eb976010b40e67cfbeec18b528c62fd3905901d87baaede22a00877d4f3', 178, 1, 'Personal Access Token', '[]', 0, '2021-11-29 00:53:56', '2021-11-29 00:53:56', '2022-11-29 06:23:56'),
('ab7546a6636c94e58a60f48dec1ca2607548506a5f820c66fac9c89efe58e903921aed5978c23362', 220, 1, 'Personal Access Token', '[]', 0, '2022-03-02 23:31:01', '2022-03-02 23:31:01', '2023-03-03 05:01:01'),
('ab8e5541bb67c26b405d4d87ebf47f5ab72ef1e235b7ba71d7376323d7f33d48cd1898ad12df648f', 72, 1, 'Personal Access Token', '[]', 0, '2022-01-03 09:48:45', '2022-01-03 09:48:45', '2023-01-03 15:18:45'),
('abd34e91236c7d3d3460668e69f57e950ee4da27f3ef49c62d5d7a7d433dc30463935728b93e41f7', 123, 1, 'Personal Access Token', '[]', 1, '2021-11-20 07:27:53', '2021-11-20 07:27:53', '2022-11-20 12:57:53'),
('abe0ae3e5f764c8975e8aa275a0ca78a7604a192fd1275e6cb0ddc1ced5753d8c4f66da47f6590bc', 72, 1, 'Personal Access Token', '[]', 1, '2022-01-27 00:47:08', '2022-01-27 00:47:08', '2023-01-27 06:17:08'),
('abe33feb3eff6a10448a7a6aa3decf0e79a2e0f2cb7310a851244464c3b37185f844b8875cd5c50a', 220, 1, 'Personal Access Token', '[]', 1, '2022-02-25 05:01:26', '2022-02-25 05:01:26', '2023-02-25 10:31:26'),
('ac52d5b6426fc69da8cbf58b7ce593c97e33d7df35700b797842eb2e848e15e09f1e70bde930b58c', 67, 1, 'Personal Access Token', '[]', 1, '2021-11-18 06:36:46', '2021-11-18 06:36:46', '2022-11-18 12:06:46'),
('ac8312c2bdbfa860adca5a78d9632d5ef1a6477e8ba85834e6ff990edab333fa62ed19f4927fc7d1', 72, 1, 'Personal Access Token', '[]', 1, '2021-12-31 07:54:40', '2021-12-31 07:54:40', '2022-12-31 13:24:40'),
('ad1031f2a4905e10af46cd7acda5010fd865788c72ec4ce03964fe84af3ee97097437349c198f7cb', 69, 1, 'Personal Access Token', '[]', 1, '2022-01-12 23:24:36', '2022-01-12 23:24:36', '2023-01-13 04:54:36'),
('ad379579da600abc4f1b9e2df05d4c503cfcff76f844b7565a57072a2b9415a55581c7e17005d8ea', 262, 1, 'Personal Access Token', '[]', 0, '2022-05-31 11:34:03', '2022-05-31 11:34:03', '2022-06-07 17:04:03'),
('ae3b74e6b3f7485f82332699397cf94a21d883a7c9068fba0535a08ed12184f09235f1120817c112', 66, 1, 'Personal Access Token', '[]', 0, '2022-01-04 04:11:53', '2022-01-04 04:11:53', '2023-01-04 09:41:53'),
('ae3df5d50921fb9d9cb561c351b5d573254093e4252379454b9fc81213754e3a12e936ffe9bdb756', 67, 1, 'Personal Access Token', '[]', 0, '2021-11-27 03:12:53', '2021-11-27 03:12:53', '2022-11-27 08:42:53'),
('ae748a390541cebf7cb364bf70a0d659df75ff3a3652f7b83ed4865c567e08602a08ef9e96af1aea', 123, 1, 'Personal Access Token', '[]', 1, '2021-11-18 03:57:59', '2021-11-18 03:57:59', '2022-11-18 09:27:59'),
('afc44539abc3b7ee4e268cbe6d3efc80df364515b03c5bdb38974ace97154a8625a30039923f0c8c', 72, 1, 'Personal Access Token', '[]', 0, '2022-01-03 08:57:32', '2022-01-03 08:57:32', '2023-01-03 14:27:32'),
('afc7858876f83a7db6d474dda14dd6144de3609c4e2393a4d1a979f2502a7b4dd7d9ae7707ac9917', 66, 1, 'Personal Access Token', '[]', 1, '2021-12-10 05:59:57', '2021-12-10 05:59:57', '2022-12-10 11:29:57'),
('afd006f4197d3b9d7ae17e63400f47b7348ad03765901f29083da22356dd9da572ece01cfd140725', 260, 1, 'Personal Access Token', '[]', 1, '2022-05-22 23:39:10', '2022-05-22 23:39:10', '2023-05-23 05:09:10'),
('b01dcf184944446830e0f48ec9e3b6e536ede91c22b61a2b0a9b002be1ea548b6977cdcad8b86e93', 94, 1, 'Personal Access Token', '[]', 0, '2021-12-03 23:27:56', '2021-12-03 23:27:56', '2022-12-04 04:57:56'),
('b07ca2862e057cedd2c4482e32f224eb89403f255899280ed1e1e5275590125c2b012ac812a15003', 123, 1, 'Personal Access Token', '[]', 0, '2021-11-18 04:27:23', '2021-11-18 04:27:23', '2022-11-18 09:57:23'),
('b1db47638c5e7c29095d230affcab5062e7d5d6f2c405b19faec3e5987096b725a9e7d2c84bb985e', 220, 1, 'Personal Access Token', '[]', 1, '2022-05-19 06:56:23', '2022-05-19 06:56:23', '2023-05-19 12:26:23'),
('b2ea7b44e89e70b42c400adb822e06ab343113ad0db0d3c7cd5191570118e7c7f1d2144abc83f8e9', 66, 1, 'Personal Access Token', '[]', 0, '2021-12-17 04:02:37', '2021-12-17 04:02:37', '2022-12-17 09:32:37'),
('b2f987d3fd1369feef15e58efbd260d187d78bf927f77813c231c4b4fdea431efae83eeddd550741', 72, 1, 'Personal Access Token', '[]', 0, '2022-01-03 09:20:03', '2022-01-03 09:20:03', '2023-01-03 14:50:03'),
('b34d06c6e0b05dc28a6308e58fcab85a571973114909d73264a2be9867518308a117cdea1e6da870', 67, 1, 'Personal Access Token', '[]', 1, '2021-11-22 02:42:22', '2021-11-22 02:42:22', '2022-11-22 08:12:22'),
('b36acc1fbd65cc8721e357adb4753ea8578e95ed969500fc77a0954eee134031882ab318023e7f6b', 123, 1, 'Personal Access Token', '[]', 1, '2021-11-22 02:50:57', '2021-11-22 02:50:57', '2022-11-22 08:20:57'),
('b39374b23b89193146d607e5565a4c7292ed1865a81da8053e8aa2a81bfd1e1c9fb97789381d8e77', 218, 1, 'Personal Access Token', '[]', 1, '2022-02-13 23:59:59', '2022-02-13 23:59:59', '2023-02-14 05:29:59'),
('b39c260e7859fb3142a8de561af06712037d097619ab2c91fce446d8c27f29b59e62b6055cd63a17', 123, 1, 'Personal Access Token', '[]', 1, '2021-11-21 02:26:00', '2021-11-21 02:26:00', '2022-11-21 07:56:00'),
('b3afee6f14fea9db404b8018b017cb74ef91e9e6fc60a33b4d010d1ab1c4e003af80074270c7ff5d', 237, 1, 'Personal Access Token', '[]', 1, '2022-05-09 23:52:05', '2022-05-09 23:52:05', '2023-05-10 05:22:05'),
('b3b4e3ad6979e083f07f0d138ef8355e084776c767c29cb8af6e2d67be91724a488f44a3602a0f53', 70, 1, 'Personal Access Token', '[]', 1, '2021-12-17 23:25:58', '2021-12-17 23:25:58', '2022-12-18 04:55:58'),
('b4de8a3d4a1bae8c1d633561ebf229657849b3c9642d32b83f8547983ddf7f4680db3e286164ac72', 218, 1, 'Personal Access Token', '[]', 1, '2022-02-06 23:34:03', '2022-02-06 23:34:03', '2023-02-07 05:04:03'),
('b5357d42166fbd37e70bd7b666f940dd026ec78f5066b1d7ff8b7808ac91767c40b8164492365b44', 5, 1, 'Personal Access Token', '[]', 0, '2021-10-02 05:20:47', '2021-10-02 05:20:47', '2022-10-02 10:50:47'),
('b5479ef2231c408b63a09159c9d12ee8b777328b335cdb604ab3fd7ef38ae2ad4445b08bcfd0a3ae', 69, 1, 'Personal Access Token', '[]', 0, '2022-01-27 01:01:20', '2022-01-27 01:01:20', '2023-01-27 06:31:20'),
('b65ad11862ac87e8d36bb26f44756caf682ef6d8fc95ac12e72d04b0e3911dad633b2a8c73ff20f1', 66, 1, 'Personal Access Token', '[]', 1, '2022-01-13 23:45:04', '2022-01-13 23:45:04', '2023-01-14 05:15:04'),
('b65f1f5bd976828e3ee3ed27e7892f16c8dbc738d9dee1cce5e614e5685ca0900b0016b415c398fd', 123, 1, 'Personal Access Token', '[]', 1, '2021-12-03 01:14:39', '2021-12-03 01:14:39', '2022-12-03 06:44:39'),
('b6fe7a5d62d85630319959ab992a939f28399b63a38f36ef3877ee09483592d396899abbc143d7c8', 69, 1, 'Personal Access Token', '[]', 0, '2021-12-18 10:24:27', '2021-12-18 10:24:27', '2022-12-18 15:54:27'),
('b78956f018e67cb26ccd959b9fe275fe2cb6ca99baccf431a904d28173f6dc3b1237cbec4db62c79', 66, 1, 'Personal Access Token', '[]', 1, '2021-11-18 23:48:55', '2021-11-18 23:48:55', '2022-11-19 05:18:55'),
('b79cbe3c5139a65a2325a94ab326e92d7d4322b2ef46af9830f3418262c73b94f28b603fdbb4c290', 66, 1, 'Personal Access Token', '[]', 1, '2022-01-01 08:33:13', '2022-01-01 08:33:13', '2023-01-01 14:03:13'),
('b79f337d31729af8fcf6903a6ca33ea8a24ed328288ffd040002a4e296ed29e8273ed3d2bb35e437', 218, 1, 'Personal Access Token', '[]', 1, '2022-02-21 23:08:37', '2022-02-21 23:08:37', '2023-02-22 04:38:37'),
('b7bebe495f5b70193ed2824944bce4e99ad120346ad33cc0b5ad019638a20d33b5f74323c0761305', 67, 1, 'Personal Access Token', '[]', 0, '2021-11-27 04:30:47', '2021-11-27 04:30:47', '2022-11-27 10:00:47'),
('b7ee43e47bf13a0907eed05f543c172e7e093c33745a1dbcf0d210afb16e336f88d0141421d48ffa', 220, 1, 'Personal Access Token', '[]', 1, '2022-03-02 23:33:59', '2022-03-02 23:33:59', '2023-03-03 05:03:59'),
('b7ffb6774439d9c2f44c4dc4b5ba89420032258b7257ad20abf14bcc466f2fdc97c56a64cec94b27', 123, 1, 'Personal Access Token', '[]', 0, '2021-11-23 01:03:57', '2021-11-23 01:03:57', '2022-11-23 06:33:57'),
('b80a094fb5f0efaf8d56407212edfab472156f08e207f79836398163c86c6fcdda2deb4b6da0d1f1', 116, 1, 'Personal Access Token', '[]', 1, '2021-11-17 05:35:45', '2021-11-17 05:35:45', '2022-11-17 11:05:45'),
('b8900b745434e75536bab8249e3051a0f7626cb0a48c650ed39502c80270e8ab4c1dfcb09781683c', 66, 1, 'Personal Access Token', '[]', 1, '2022-01-16 23:07:46', '2022-01-16 23:07:46', '2023-01-17 04:37:46'),
('b90cc100e7c30aa0c7d9b658641d60c9be6e1aa6d8766ee18088fb2fcfce19a2432095c66e015005', 123, 1, 'Personal Access Token', '[]', 0, '2021-11-18 01:57:19', '2021-11-18 01:57:19', '2022-11-18 07:27:19'),
('b93bc1102080b5789f8465a8f742839b7e38b5b1f56debe6d0f69c1068025d7da12d6cde3e292731', 123, 1, 'Personal Access Token', '[]', 1, '2021-11-20 07:03:30', '2021-11-20 07:03:30', '2022-11-20 12:33:30'),
('b94e63007cfc30df2caec37702d3facf2f850d0b82ba3b1a71833980f57fde003c2d42a001a519c6', 101, 1, 'Personal Access Token', '[]', 0, '2021-11-17 04:57:44', '2021-11-17 04:57:44', '2021-11-24 10:27:44'),
('b9563d5f100d90305cd3d48fc4219f6f5686a2eab354ea5306e5208ef60830e7f3303bde80546622', 101, 1, 'Personal Access Token', '[]', 0, '2021-11-16 03:56:00', '2021-11-16 03:56:00', '2021-11-23 09:26:00'),
('b957a9ef35b58668e96ab89f347bd34108b1d5dc9e16722f36db93c27b0f4975814d12d83e36e8c7', 66, 1, 'Personal Access Token', '[]', 0, '2021-12-07 02:01:10', '2021-12-07 02:01:10', '2021-12-14 07:31:10'),
('ba35f59a35439fe13f7c38ab22622281b5c1919c7ef0fb6a47710152d5bc6fe4a7e6db8599eda7de', 38, 1, 'Personal Access Token', '[]', 0, '2021-10-08 05:08:49', '2021-10-08 05:08:49', '2021-10-15 10:38:49'),
('bac25a5f0112186c289dca16c4486fe8d1e469f25ff388a4e176a3e187badf75ef9c7348b7e4ae3f', 123, 1, 'Personal Access Token', '[]', 0, '2021-11-26 02:44:39', '2021-11-26 02:44:39', '2022-11-26 08:14:39'),
('bacb481c00b91ea45292ac4cd7f9034d16830398eab5bfef7ee537d407d25aed03e77698f81e626e', 262, 1, 'Personal Access Token', '[]', 0, '2022-05-19 07:22:11', '2022-05-19 07:22:11', '2023-05-19 12:52:11'),
('baf7ea985544354569b7ee1607b62818cbefc1e1688233b4a9d54d93eaa0df603adff722b117fc6a', 66, 1, 'Personal Access Token', '[]', 1, '2022-01-13 01:59:27', '2022-01-13 01:59:27', '2023-01-13 07:29:27'),
('bc246bd40978868fc761f2e64792be999fc3d6b4863d4d2a95a5e48332178f4e694832b5ff713c0f', 220, 1, 'Personal Access Token', '[]', 1, '2022-02-15 21:40:44', '2022-02-15 21:40:44', '2023-02-16 03:10:44'),
('bcc0c2ca8ff2027e336a7b4338fd266aa6bff7c4559b04710de048d1ab87a2842705e5282f8baa4e', 218, 1, 'Personal Access Token', '[]', 1, '2022-05-13 23:24:14', '2022-05-13 23:24:14', '2023-05-14 04:54:14'),
('bcf7be05819ba26fa556565b4b9a65513417fc53149018f406d68d526ce072ec25f6a1828c5438bc', 66, 1, 'Personal Access Token', '[]', 0, '2022-01-03 08:43:08', '2022-01-03 08:43:08', '2023-01-03 14:13:08'),
('bd78749619d2b8b874254566375c17295d3bb3311342f4db4663829906290cd79b8506f347e83409', 67, 1, 'Personal Access Token', '[]', 0, '2021-11-25 00:51:25', '2021-11-25 00:51:25', '2022-11-25 06:21:25'),
('bdb0a316a4b9d7be1676d599bf03db24b9b334ca44448ee523139ef3a7b4ed7165a65df5bd5a7266', 177, 1, 'Personal Access Token', '[]', 1, '2021-11-28 23:35:13', '2021-11-28 23:35:13', '2022-11-29 05:05:13'),
('bdf424fa8ca5f1a44a908af31ad883e36fdc3e76b4f2c344a7c9691f1f9cd692dd24cb714bb54adb', 66, 1, 'Personal Access Token', '[]', 1, '2021-12-04 20:00:18', '2021-12-04 20:00:18', '2022-12-05 01:30:18'),
('beb25da34304a937f1d2fa0443de367e4bd1f62698401030e863d73ca0cd75f43f61b86a6616d015', 72, 1, 'Personal Access Token', '[]', 0, '2022-01-17 07:01:55', '2022-01-17 07:01:55', '2023-01-17 12:31:55');
INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('bebd0f8cbfd30145abbe86cc57e9bf6b41d5df5c250bf621bbcbac3d3b99caae4512f4b29130ddb6', 218, 1, 'Personal Access Token', '[]', 1, '2022-02-06 23:35:05', '2022-02-06 23:35:05', '2023-02-07 05:05:05'),
('bf2275f3e91ebbda1050dcf6cd0a77bcbe44a691a6bf2101441dd0f6c3b054c3671e399e820c9088', 72, 1, 'Personal Access Token', '[]', 0, '2021-12-31 05:48:02', '2021-12-31 05:48:02', '2022-12-31 11:18:02'),
('bf648e9ca154390287f00b7d1421c6490133171a0c87c346295c1d30ad161bf8b9e9118433d68996', 177, 1, 'Personal Access Token', '[]', 0, '2021-11-28 23:19:14', '2021-11-28 23:19:14', '2022-11-29 04:49:14'),
('bf8f13e4df4b0cab189a89f87f9eff35dedd7f3f37fcb49a4487ad92982fa4134c5fa80baa5cf18e', 123, 1, 'Personal Access Token', '[]', 1, '2021-11-21 02:43:00', '2021-11-21 02:43:00', '2022-11-21 08:13:00'),
('bfb762a6b22b91613691715a441e1a274137c03f5ad731aad2e105f2c0fce3354d98d59fd4b56dc8', 217, 1, 'Personal Access Token', '[]', 1, '2022-02-20 23:36:16', '2022-02-20 23:36:16', '2023-02-21 05:06:16'),
('c096785a18ee1e9fe547b36a1e88abf645aeb85107d0b4d5eb2ca172d480a338572466cabe0882b5', 66, 1, 'Personal Access Token', '[]', 1, '2022-01-13 23:43:25', '2022-01-13 23:43:25', '2023-01-14 05:13:25'),
('c0ee07f1ba4648b957d0f40f11b162b31112a7f99f1baab494c8fa343897c1b861ce8c084acfe512', 76, 1, 'Personal Access Token', '[]', 0, '2021-10-14 02:05:12', '2021-10-14 02:05:12', '2022-10-14 07:35:12'),
('c1545f985578702e6e425a08e53dcdb202e2f69a1e354ac9f68a95c2db7917980c4a9a1fe97f919a', 123, 1, 'Personal Access Token', '[]', 0, '2021-11-26 23:48:51', '2021-11-26 23:48:51', '2022-11-27 05:18:51'),
('c20242a51c21cb5d0e4fca90a2fa4cdb52cf95f77fc9d4df3a8a76e0796ea2549ad93312b272fa43', 69, 1, 'Personal Access Token', '[]', 0, '2022-01-10 22:33:11', '2022-01-10 22:33:11', '2023-01-11 04:03:11'),
('c28cb4078fd635ef53f361dfba672a45ed2cd0ef4825864bb7f484e7e62fbe36b5a61e3f8973211c', 69, 1, 'Personal Access Token', '[]', 0, '2022-01-04 02:32:37', '2022-01-04 02:32:37', '2023-01-04 08:02:37'),
('c2cffcf09b3d4b801ac6f873995cd5379c69a3e78cedc0bb5bf99b563c3eb5cff3da5f253311b9f8', 184, 1, 'Personal Access Token', '[]', 0, '2021-12-17 10:54:57', '2021-12-17 10:54:57', '2022-12-17 16:24:57'),
('c2d06940205f694a4ad18a10182dccbb502e872cb920704fd03bb611561b8231d630d1b360e36ec2', 228, 1, 'Personal Access Token', '[]', 0, '2022-03-09 02:11:42', '2022-03-09 02:11:42', '2023-03-09 07:41:42'),
('c2d54f9a886052f34219d3153b5dbfb42ad0efcca464ab96d51ed1ea9792c7bf88980a14cb4515f4', 123, 1, 'Personal Access Token', '[]', 1, '2021-12-03 03:55:57', '2021-12-03 03:55:57', '2022-12-03 09:25:57'),
('c32056677b42f69bbb0804f8b12c12c60d03cc735935de025210af18c71a6a3d0ee2a228773e7b9d', 262, 1, 'Personal Access Token', '[]', 1, '2022-05-30 00:01:52', '2022-05-30 00:01:52', '2023-05-30 05:31:52'),
('c3bb422d5200d8b31659c7398cb5d1c85d3cbe4e960f7b0575c9e823e8eef4409bf87c385c0c2281', 66, 1, 'Personal Access Token', '[]', 0, '2022-01-17 01:04:56', '2022-01-17 01:04:56', '2022-01-24 06:34:56'),
('c3cd2cebd3159afa0b663d7cd0b2bb374569fa8ad44517694251887c5c6d34a95e3903d90f6625db', 69, 1, 'Personal Access Token', '[]', 0, '2022-01-06 09:00:03', '2022-01-06 09:00:03', '2023-01-06 14:30:03'),
('c41549e5816cff9dca234624603af054e6edf8f9b1407294b547b072cec2788096b93ca1961af318', 123, 1, 'Personal Access Token', '[]', 0, '2021-11-26 06:44:57', '2021-11-26 06:44:57', '2022-11-26 12:14:57'),
('c41783e6db705c62eee7e4ed85147dc5ea2cea8a127837e6470be4bc83de38111d663e4008b20873', 67, 1, 'Personal Access Token', '[]', 1, '2021-11-29 06:21:23', '2021-11-29 06:21:23', '2022-11-29 11:51:23'),
('c4766b66bc6ea8190a05afee1d6d68a933d2239c2376976b2039c5c78209af0c40d0a6884f8eb9cc', 123, 1, 'Personal Access Token', '[]', 1, '2021-11-22 07:35:08', '2021-11-22 07:35:08', '2022-11-22 13:05:08'),
('c4d3def271721028688a279e08065d6927b620ea4a7889801608c2a1bf2932d2cedcfa521ed0176b', 72, 1, 'Personal Access Token', '[]', 1, '2022-01-12 08:37:10', '2022-01-12 08:37:10', '2023-01-12 14:07:10'),
('c5097b3cb8643758361c11617d728fd3614ca6fa4958383f442168011bbd77dbf0676f82f40d9d4d', 67, 1, 'Personal Access Token', '[]', 1, '2021-11-27 00:32:32', '2021-11-27 00:32:32', '2022-11-27 06:02:32'),
('c6e43fc21c94eab82455e272a99796031e37ea594c8bb7404501c7384f05e4f5f6036b94b22f9826', 220, 1, 'Personal Access Token', '[]', 1, '2022-02-07 00:52:12', '2022-02-07 00:52:12', '2023-02-07 06:22:12'),
('c783538c166bc1f578d2651722b5747016bb606dc251e71a1c886d8aefc1aee2d58cb11f6386d670', 217, 1, 'Personal Access Token', '[]', 1, '2022-02-07 00:04:36', '2022-02-07 00:04:36', '2023-02-07 05:34:36'),
('c788edf8f49446791957b9658ef1b8a36851bccda157ce3193eda02de83657502c9e2ee61d814b46', 67, 1, 'Personal Access Token', '[]', 0, '2021-11-25 00:32:11', '2021-11-25 00:32:11', '2022-11-25 06:02:11'),
('c80733ab749c9a31171a50c5d4e7beb8471e5f272af9d3045cb38bbb6f61dc6a29630f090bfdce88', 66, 1, 'Personal Access Token', '[]', 1, '2021-11-09 05:52:04', '2021-11-09 05:52:04', '2022-11-09 11:22:04'),
('c839b85ae0a8d5de1abf407d4b8e822cc5e0593e22248b2e81b0b0251f5233429500dc640cfc791e', 69, 1, 'Personal Access Token', '[]', 1, '2022-01-17 04:15:33', '2022-01-17 04:15:33', '2023-01-17 09:45:33'),
('c869a64645fe7686eec416e4e8ff398ca82efe6d8bfb6ba09d4a268de2aff1346f5bcb9c9a251168', 66, 1, 'Personal Access Token', '[]', 1, '2022-01-04 04:15:11', '2022-01-04 04:15:11', '2023-01-04 09:45:11'),
('c8843fdbece6b9390e4a948864d217c1364f2b82317ea5834a919d3252e47c23874dabcbb9e16802', 72, 1, 'Personal Access Token', '[]', 1, '2022-01-13 00:13:45', '2022-01-13 00:13:45', '2023-01-13 05:43:45'),
('c9581a4d9ec02f9afcb892ce1607a56f7deaf06c648aed12dced5bd8c02a9fca322cd3ce5c8ab279', 72, 1, 'Personal Access Token', '[]', 1, '2022-01-03 09:09:32', '2022-01-03 09:09:32', '2023-01-03 14:39:32'),
('c9b68093c2542855f4f401db46565c872f240ae636776f84f2fc66ca30a2726dc8b86438ee404e46', 66, 1, 'Personal Access Token', '[]', 1, '2021-12-03 02:52:04', '2021-12-03 02:52:04', '2022-12-03 08:22:04'),
('c9eea59a2b786af676ce9b65d0cdc699048c97aeb6e38307b10a79739a3f58cb20814aeed032cfdd', 101, 1, 'Personal Access Token', '[]', 0, '2021-11-16 07:17:13', '2021-11-16 07:17:13', '2021-11-23 12:47:13'),
('ca4f56d37dfaef9906a408644a9a0e1440dec004634d2b43eea2f4eac6ae4213c36d69441eb402e7', 66, 1, 'Personal Access Token', '[]', 0, '2021-12-06 10:45:14', '2021-12-06 10:45:14', '2021-12-13 16:15:14'),
('cb56360e177efad113c717f90c494cf072fc37bec40a2a4c5ab786872524640ccb5e588b498cc1a0', 66, 1, 'Personal Access Token', '[]', 1, '2022-01-02 23:12:50', '2022-01-02 23:12:50', '2023-01-03 04:42:50'),
('cbaee3effbc093656a75ae5fb7acb7047e9e3b975f946aed8a008ff1fda1f79502f67bba43d4776e', 260, 1, 'Personal Access Token', '[]', 1, '2022-05-19 00:35:03', '2022-05-19 00:35:03', '2023-05-19 06:05:03'),
('cc1b54d2b6f894bdf8a64f129b93e2f523bb4ff8d6ee607541b6468c6841164729dc51fd508ebb06', 227, 1, 'Personal Access Token', '[]', 0, '2022-03-02 23:42:06', '2022-03-02 23:42:06', '2023-03-03 05:12:06'),
('ccd99c041183837502eb803e8ed05d8893dc27ff860a59c4751ce52cb524e9ac981c08c9db57d0f6', 123, 1, 'Personal Access Token', '[]', 1, '2021-11-27 07:27:56', '2021-11-27 07:27:56', '2022-11-27 12:57:56'),
('ccfd750fcfa66c77568e73a36e02d6fb4b40e868b6ea00c3e8bbdbaa253dac48e21ea50d489c5594', 66, 1, 'Personal Access Token', '[]', 0, '2021-12-10 00:35:53', '2021-12-10 00:35:53', '2022-12-10 06:05:53'),
('cd590e520407b01b03865d63bde85e43e044ea3bee8a7cb34ed349a0d0f309d56a51c7cfd42becee', 66, 1, 'Personal Access Token', '[]', 0, '2022-01-16 23:33:41', '2022-01-16 23:33:41', '2023-01-17 05:03:41'),
('ce079e186e0549f355d3bf3c0e043f95719170f803cf49b31bc09e355407321f43ca3b92c26be74d', 146, 1, 'Personal Access Token', '[]', 0, '2021-12-01 23:00:31', '2021-12-01 23:00:31', '2022-12-02 04:30:31'),
('ceb2131eaf0dea03d6a2b9b4efd932c38128e10dd26c8d0f76356d17de8892daf3237e2e083fc497', 66, 1, 'Personal Access Token', '[]', 1, '2022-01-13 00:18:19', '2022-01-13 00:18:19', '2023-01-13 05:48:19'),
('cfbd7d18f1e3759f411358d34ef73bc0173c38817fca8f3990605894e327445be24cc884d45dab5c', 123, 1, 'Personal Access Token', '[]', 0, '2021-11-19 03:51:54', '2021-11-19 03:51:54', '2022-11-19 09:21:54'),
('cfc435bb5730e56ed12d79b21c9df90d8853fb1dd91fcad8fb9f46b2ed5730b6f9d4aa3f7c551c58', 123, 1, 'Personal Access Token', '[]', 1, '2021-11-18 04:38:09', '2021-11-18 04:38:09', '2022-11-18 10:08:09'),
('d0681692e1719f8b22afef7932a0c1afc58bc5f8a4f4fc63bcf1d220997113596b23bd08c094b4cc', 66, 1, 'Personal Access Token', '[]', 0, '2022-01-17 01:04:08', '2022-01-17 01:04:08', '2022-01-24 06:34:08'),
('d13b0fd04d5cd7f6dcb985af1a7f638393724a4c1800b5a778c7c0140bb7d8327e9eb7ae42dde06c', 72, 1, 'Personal Access Token', '[]', 0, '2022-01-03 09:19:58', '2022-01-03 09:19:58', '2023-01-03 14:49:58'),
('d251c1b59c59aeb22115f0016ee62b2d11914fefad6e316cb48e2658b57e2084f2b303cb8cb8bbe5', 67, 1, 'Personal Access Token', '[]', 1, '2021-11-22 02:38:51', '2021-11-22 02:38:51', '2022-11-22 08:08:51'),
('d2873a7f031e73f8c99a986e7b3477b975bf1b54d6eca1425a18dd68948882bd0afb5f07dbcc118e', 220, 1, 'Personal Access Token', '[]', 0, '2022-05-06 00:39:03', '2022-05-06 00:39:03', '2023-05-06 06:09:03'),
('d296746a93b0f32056b9d14ff1168a03cb1515d84ae090bc9c5b6f6123d6d2f033d6f0569b990b54', 72, 1, 'Personal Access Token', '[]', 1, '2021-12-31 08:33:47', '2021-12-31 08:33:47', '2022-12-31 14:03:47'),
('d2d2f74cc60059d6c7826cb123ef489767104cd25f8926a29addb2a0896882571348ad42fc9d7c69', 242, 1, 'Personal Access Token', '[]', 1, '2022-05-09 23:58:53', '2022-05-09 23:58:53', '2023-05-10 05:28:53'),
('d3449b8f48a36e14a6e5df24176df369b36e78c5c86867275b88963784e006eb55caf539c081c314', 123, 1, 'Personal Access Token', '[]', 0, '2021-11-27 01:58:04', '2021-11-27 01:58:04', '2022-11-27 07:28:04'),
('d37718cfcfbbb9da95e7e57ff8831a0a20868f6bf1acb3446cc601c226d656d8e5642697815d27bd', 66, 1, 'Personal Access Token', '[]', 1, '2021-12-29 01:52:36', '2021-12-29 01:52:36', '2022-12-29 07:22:36'),
('d4275e1eca91481fa28049842cf93a8b5d65f3670f023671ab5088aec0b91e9cd1b6e99478a39592', 123, 1, 'Personal Access Token', '[]', 1, '2021-11-27 01:10:21', '2021-11-27 01:10:21', '2022-11-27 06:40:21'),
('d44f3e4ca7d09e60f1b8207c2672cf4b800560466421ff8d31992d185dc02b571fa6bb3ff47f098b', 66, 1, 'Personal Access Token', '[]', 1, '2022-01-13 23:42:17', '2022-01-13 23:42:17', '2023-01-14 05:12:17'),
('d5d1d00bdaeccb8b3880d02e20c3c27a5249b4d09ea9bc28090b73e56e590d18b70ebec520289733', 194, 1, 'Personal Access Token', '[]', 0, '2022-01-08 08:52:31', '2022-01-08 08:52:31', '2023-01-08 14:22:31'),
('d5d3cfc4fb62accb82a3dddefa809d56f2782c5a497fc8c159a4f01684c7cb618b104855985bfd69', 67, 1, 'Personal Access Token', '[]', 1, '2021-12-26 23:28:29', '2021-12-26 23:28:29', '2022-12-27 04:58:29'),
('d5e9ba4d3ac1e192784551533838e4590efb6674e0fd8661353d8fb9662edfaf48a89f01940da4d2', 67, 1, 'Personal Access Token', '[]', 1, '2021-12-08 00:30:36', '2021-12-08 00:30:36', '2022-12-08 06:00:36'),
('d66a3deadda06ea9e5ad261094cc68664e5a3e50e44f6d580fb8f113e55e514695462d4af7e24431', 220, 1, 'Personal Access Token', '[]', 1, '2022-02-25 05:35:04', '2022-02-25 05:35:04', '2023-02-25 11:05:04'),
('d69fba70c832d1a9001ab4be65c829b2775412cfb1b44a7d044c20b5959df202639665aa70bca97e', 66, 1, 'Personal Access Token', '[]', 0, '2022-01-16 23:06:59', '2022-01-16 23:06:59', '2023-01-17 04:36:59'),
('d6d2ddc45f74f4ddde2e9c75fb98cad9e847ba5d4dcef1c04c10cf5af3e1995f12db199df1f27941', 72, 1, 'Personal Access Token', '[]', 1, '2022-01-17 00:43:44', '2022-01-17 00:43:44', '2023-01-17 06:13:44'),
('d6d8bfca0dcfc7fbdd5fe7ad8dd81e48cc8c37fd1c107617013168a1c5942211d61c0b377c31b24f', 67, 1, 'Personal Access Token', '[]', 0, '2021-11-25 00:49:34', '2021-11-25 00:49:34', '2022-11-25 06:19:34'),
('d6fd021959363881e5b253c11be22bdd37940df4905bebb50ad332a5b7c03b6019d100a38b910385', 220, 1, 'Personal Access Token', '[]', 0, '2022-03-02 23:46:47', '2022-03-02 23:46:47', '2023-03-03 05:16:47'),
('d75e72510a4ae13cccc2603b63a6163de4c2da3d7578dc732d70be7680cc96352c3f826ec28ba66d', 69, 1, 'Personal Access Token', '[]', 0, '2022-01-12 22:54:46', '2022-01-12 22:54:46', '2023-01-13 04:24:46'),
('d821bad25c7f67d97ce56ab37228ed1eeba5e82b2b8c618c059d77b8d2400b4043973dc9185d9a0b', 66, 1, 'Personal Access Token', '[]', 1, '2022-01-17 02:00:41', '2022-01-17 02:00:41', '2023-01-17 07:30:41'),
('d85438cc5d59f0e6137a76f9b4028dda991ad21bd62e6c5cd089bc947762a79ae43e3f18c11a51b0', 69, 1, 'Personal Access Token', '[]', 0, '2022-01-04 02:32:38', '2022-01-04 02:32:38', '2023-01-04 08:02:38'),
('d8d1d38b8efd4099fe939297e9aa541ace236d8d5cc7e7175a51ec2852dd3e4106a31420db50dc8b', 220, 1, 'Personal Access Token', '[]', 1, '2022-02-07 01:52:00', '2022-02-07 01:52:00', '2023-02-07 07:22:00'),
('d8e659afdc0fe8bcd0462fb088a8ab42681f18bc902d553afc441a9c96f91ea85700544ab64e0e4a', 123, 1, 'Personal Access Token', '[]', 0, '2021-12-08 02:00:40', '2021-12-08 02:00:40', '2022-12-08 07:30:40'),
('d952ebc7b855303afc5cb60883af199d2e9a3d969201dcc5b421458b1ae94f0631a7221a62742871', 178, 1, 'Personal Access Token', '[]', 0, '2021-11-28 23:47:46', '2021-11-28 23:47:46', '2022-11-29 05:17:46'),
('d9a09b0a17a0803eea46cb16f145c8bc94fc7911ae619971da11006f75017363459ca770a646a896', 123, 1, 'Personal Access Token', '[]', 1, '2021-12-03 02:01:53', '2021-12-03 02:01:53', '2022-12-03 07:31:53'),
('da308db5df9c0b78aba5449c81557c51dfecfd7632eaec573d061967aae26f7d33dae7ece8aebe3f', 146, 1, 'Personal Access Token', '[]', 1, '2021-11-28 23:37:50', '2021-11-28 23:37:50', '2022-11-29 05:07:50'),
('da376236a8b6d75855cf77d1ed90e4777172c1f76461aeaa8035a0c8585444c9d6e4a50cd6a46bc0', 146, 1, 'Personal Access Token', '[]', 0, '2021-12-06 04:14:55', '2021-12-06 04:14:55', '2022-12-06 09:44:55'),
('da7e6a21a255598e8f40e4f1d5aaa4a98b0dedc4e925b2546649ae3030a4ae17b706957b6f878fac', 69, 1, 'Personal Access Token', '[]', 1, '2022-01-22 02:30:49', '2022-01-22 02:30:49', '2023-01-22 08:00:49'),
('dc2a7d20cd0655b6953c6c7ef1a717128e8e59bb4acfff8ee93b467f29ef0809714405e279301692', 183, 1, 'Personal Access Token', '[]', 0, '2022-01-05 00:01:59', '2022-01-05 00:01:59', '2023-01-05 05:31:59'),
('dd2dc65ea343bccdd5d472988277cbca4886a4b06fd43cbfba3af2a0a6422a2ac87c73197bc703e1', 66, 1, 'Personal Access Token', '[]', 1, '2022-01-17 00:11:58', '2022-01-17 00:11:58', '2023-01-17 05:41:58'),
('dd974cec0a8e0a927b3601ff6c3497126f174dd496dc5a0cd7b732ea3e12e6365d9cc98b1dd15697', 123, 1, 'Personal Access Token', '[]', 1, '2021-11-18 03:50:58', '2021-11-18 03:50:58', '2022-11-18 09:20:58'),
('de14c1c24476e76018dac03231c7eed55cc018e3f590e0b9226321cbceb4313c0a8d9a401b61ad5c', 218, 1, 'Personal Access Token', '[]', 1, '2022-02-21 23:11:08', '2022-02-21 23:11:08', '2023-02-22 04:41:08'),
('de2e1f4e023fb9c018459c819b01faf6f2243944c55943f6c0d99f2cf657a30562ae3a2cd6241ea2', 123, 1, 'Personal Access Token', '[]', 1, '2021-11-18 04:27:11', '2021-11-18 04:27:11', '2022-11-18 09:57:11'),
('de949ca4de5528aa54606d0b06d49808e2d0253928b8990cc5b5cc46019e795bff464dc6d9bfbec5', 66, 1, 'Personal Access Token', '[]', 0, '2021-12-06 12:46:44', '2021-12-06 12:46:44', '2022-12-06 18:16:44'),
('def47cf6a1d53962678e465e24024b86f6d723fe472a48e3f7a17f4c3407c6e9c47ec36c168b9538', 5, 1, 'Personal Access Token', '[]', 0, '2021-10-10 01:25:40', '2021-10-10 01:25:40', '2022-10-10 06:55:40'),
('df1b0089f31327e16d1d18aabc47d7ed64650a32fefb8dd9947fd0afea03fd8038d53cd89c18ad5f', 123, 1, 'Personal Access Token', '[]', 0, '2021-11-18 23:46:21', '2021-11-18 23:46:21', '2022-11-19 05:16:21'),
('df5db6418220526ee2f8aa5310c99634ecd8c2942f2344c636528eda031863ce6ad87e9ebd3a4bd4', 69, 1, 'Personal Access Token', '[]', 1, '2022-01-10 22:29:44', '2022-01-10 22:29:44', '2023-01-11 03:59:44'),
('e03d85aa0cbaf72e63c99239a22d3ded8a9171c85c5a47a3ff985306973260adac3ccc3d31fed0be', 69, 1, 'Personal Access Token', '[]', 1, '2022-01-17 00:22:33', '2022-01-17 00:22:33', '2023-01-17 05:52:33'),
('e0e6c5fa0bb8d7c6feb5c6d90f9415ca588b6f77c4a8fb16ec144864544764eb8732dc835caba33a', 101, 1, 'Personal Access Token', '[]', 0, '2021-11-16 06:30:33', '2021-11-16 06:30:33', '2021-11-23 12:00:33'),
('e145e50186194635b09028f31ba49e1c6884d80849cc61c1cd3d819799feb1271e54cb2e928ac088', 66, 1, 'Personal Access Token', '[]', 1, '2021-12-29 03:52:59', '2021-12-29 03:52:59', '2022-12-29 09:22:59'),
('e156adbab8dc99e2f5c07a15e7e9ded698f781109a669c1a9b71ad2e7f55db4cbe0b6995f273a099', 146, 1, 'Personal Access Token', '[]', 1, '2021-11-18 07:37:37', '2021-11-18 07:37:37', '2022-11-18 13:07:37'),
('e1705bc81be7411f6b18356615b21d64064a44a96c66ab693a98d37f5186c0d431ab42d38d113154', 217, 1, 'Personal Access Token', '[]', 1, '2022-03-08 01:12:25', '2022-03-08 01:12:25', '2023-03-08 06:42:25'),
('e1797fd270d50fd59e71eb0ad6e8303de1dfb5345e984cb1a946dea254bd72024c90b4e5adfd6704', 67, 1, 'Personal Access Token', '[]', 0, '2021-11-22 01:53:58', '2021-11-22 01:53:58', '2022-11-22 07:23:58'),
('e18b7a362fd005dc5bd9afbd4c05568bf29c885cc8e1b36196dd2e8ed66997df83dc7f772d64b40a', 84, 1, 'Personal Access Token', '[]', 0, '2021-12-27 03:03:18', '2021-12-27 03:03:18', '2022-12-27 08:33:18'),
('e1f64caf6a2371ff491df3d4cb933bfb2f388bdc0404664504cc282646f09c61ae80754cc7a1fc9a', 67, 1, 'Personal Access Token', '[]', 0, '2021-11-26 07:11:38', '2021-11-26 07:11:38', '2022-11-26 12:41:38'),
('e218db7eb269c90c6e5d56d045ffdbfd247c0238c4ed9c827011d97796c049eb939ae417af5a1c29', 262, 1, 'Personal Access Token', '[]', 0, '2022-05-23 23:47:35', '2022-05-23 23:47:35', '2023-05-24 05:17:35'),
('e21f37a729e5847db9fa7c2921f061173549e15d2897c7c0d235dd86ae931831103055470cda3f92', 123, 1, 'Personal Access Token', '[]', 0, '2021-11-22 03:03:14', '2021-11-22 03:03:14', '2022-11-22 08:33:14'),
('e251e3f9b7e98063a90c9969483eb13c73933091b295cbbb7ca7c3fba6f4695187d326610dab7f45', 72, 1, 'Personal Access Token', '[]', 0, '2022-01-05 04:16:06', '2022-01-05 04:16:06', '2023-01-05 09:46:06'),
('e264e70043e0ebb43e5b79c9b8059984f760fc03988cc5ee6243415d9f03d8cd650951ba32305d28', 123, 1, 'Personal Access Token', '[]', 1, '2021-11-20 05:52:13', '2021-11-20 05:52:13', '2022-11-20 11:22:13'),
('e26a63310b8fa7a32a5beea2f05b0fa96e0204d5e8a48383ff685d9ad8c4cd9254b804d1f02a780c', 70, 1, 'Personal Access Token', '[]', 1, '2022-01-27 01:05:53', '2022-01-27 01:05:53', '2023-01-27 06:35:53'),
('e3267f121dc72a1a89985cab66485bdea07c72b51533e438f61cb4b7c868025520c07d418685438b', 66, 1, 'Personal Access Token', '[]', 0, '2021-12-17 04:02:37', '2021-12-17 04:02:37', '2022-12-17 09:32:37'),
('e33de37fa19ab9538b3ae6927d7b1e8c9c116caa67be9e6564abc66c48524b9f7a0f2217164ddab0', 260, 1, 'Personal Access Token', '[]', 0, '2022-05-19 04:13:01', '2022-05-19 04:13:01', '2023-05-19 09:43:01'),
('e378a976cc7b19bff749859fa19b7ddbebf30bad1758a483f76b54019a2ba067835e4168471d9cd2', 66, 1, 'Personal Access Token', '[]', 0, '2021-12-03 03:43:39', '2021-12-03 03:43:39', '2022-12-03 09:13:39'),
('e38bec0fa16c41c89dc7905a0bce2280135244c3ab14f7285a0b90edd04edfcdfe828c6f68bca0c1', 66, 1, 'Personal Access Token', '[]', 1, '2022-01-16 23:33:41', '2022-01-16 23:33:41', '2023-01-17 05:03:41'),
('e50308b55fc8482efba71ecab96d001ef49ebde409a91fea621e8ccf0b5f4d505692baa6b71c8e54', 123, 1, 'Personal Access Token', '[]', 1, '2021-11-18 04:25:45', '2021-11-18 04:25:45', '2022-11-18 09:55:45'),
('e50a22445648d2f78011c241c5d92fe1896431c94658c33d71da6cf259e74259f292f94bcc8feae8', 123, 1, 'Personal Access Token', '[]', 1, '2021-11-20 07:01:35', '2021-11-20 07:01:35', '2022-11-20 12:31:35'),
('e61cc578ad7f67df49f0991c9001b599621abcb0ea8c972b86650a471842d4cfdb544bd3e3d5b828', 67, 1, 'Personal Access Token', '[]', 1, '2021-12-06 04:27:19', '2021-12-06 04:27:19', '2022-12-06 09:57:19'),
('e778215300b3c1756f44036782b9c52217f8f360e0e20c4a6470c9dec6da53eeb3b02a58fd875b0e', 67, 1, 'Personal Access Token', '[]', 0, '2021-11-25 06:59:28', '2021-11-25 06:59:28', '2022-11-25 12:29:28'),
('e82eca32759062b2802ed22a8320e0ad23ea1ccef458067ec2584fc522506ea652ee752d430c4c83', 69, 1, 'Personal Access Token', '[]', 0, '2022-01-01 00:07:15', '2022-01-01 00:07:15', '2023-01-01 05:37:15'),
('e85d842899830c806fc4c5090ebaa98550d01c73d17c4d05172ac0973badcf5bd5befac41f7e9176', 66, 1, 'Personal Access Token', '[]', 0, '2021-11-27 04:38:31', '2021-11-27 04:38:31', '2021-12-04 10:08:31'),
('e8e4373986ce0bbe721fd738ffade1dc1c5424a5723a8439524caf0309a9438f90b003e44395beb5', 260, 1, 'Personal Access Token', '[]', 1, '2022-05-30 01:05:43', '2022-05-30 01:05:43', '2023-05-30 06:35:43'),
('e8edf80787612de8a0a46f6a89c0c5add1f030057c6de132594f39eb795b7fe71750de6639c3045a', 218, 1, 'Personal Access Token', '[]', 1, '2022-03-08 01:13:11', '2022-03-08 01:13:11', '2023-03-08 06:43:11'),
('e95bbbac5afedccf0789f70e94c468a2caa29716cd557d4939231e5ee1b6de260616102f06e8728d', 16, 1, 'Personal Access Token', '[]', 0, '2021-10-11 23:29:09', '2021-10-11 23:29:09', '2021-10-19 04:59:09'),
('e9ee6879623e24e649df94d83baad2b164736d9fefffef86a7d90a4feae8b5ae7d810a5868c882a3', 69, 1, 'Personal Access Token', '[]', 0, '2022-01-03 02:17:17', '2022-01-03 02:17:17', '2023-01-03 07:47:17'),
('eacfc0c2174fd7607e8f7e29c448c5ff3ccf69c2110c99b4c194c398551d0c0a1b81cc84e98fd2f5', 66, 1, 'Personal Access Token', '[]', 1, '2021-12-29 04:02:29', '2021-12-29 04:02:29', '2022-12-29 09:32:29'),
('eaf05300f45aa0f95adccbba4cad23299db00594f1df4a0c3f255c17d766f95c68447aa4f413ff42', 66, 1, 'Personal Access Token', '[]', 1, '2021-12-04 01:31:05', '2021-12-04 01:31:05', '2022-12-04 07:01:05'),
('eb1cd0f3ebf5fad71470603871b33e064a4ce99c1a97c31e056b7a5a7800113937fbb9b84f5b2807', 263, 1, 'Personal Access Token', '[]', 0, '2022-05-25 02:37:04', '2022-05-25 02:37:04', '2023-05-25 08:07:04'),
('eb287205ab8bbe1fcbda3695e2f2c7a00f371bdd0ac286670e239ef23be6f0403f84f079a892d9ab', 67, 1, 'Personal Access Token', '[]', 1, '2021-12-24 23:24:05', '2021-12-24 23:24:05', '2022-12-25 04:54:05'),
('eb4ab313842fc21dbf42dbfe0baa2ec89731962d75548a6d323e404e8297b8be16a983a576558f96', 69, 1, 'Personal Access Token', '[]', 0, '2022-01-04 23:40:48', '2022-01-04 23:40:48', '2023-01-05 05:10:48'),
('eb5450155e20a43e52d22d80a3be8ac049357d8307c61853102078d622bd4e38c09300d7c1e7826a', 72, 1, 'Personal Access Token', '[]', 1, '2022-01-04 04:18:38', '2022-01-04 04:18:38', '2023-01-04 09:48:38'),
('ec3bc3356fdbda89c29ac96988c548980616dbd0dafe5cdae4abf6093f5ee4666ff8200d9a112889', 66, 1, 'Personal Access Token', '[]', 0, '2022-02-03 05:28:28', '2022-02-03 05:28:28', '2022-02-10 10:58:28'),
('ec6cbd9928e19f6daff9e73520902b4efd3ef2cb43d43175a1e839fe19c62f0f180835104200117d', 5, 1, 'Personal Access Token', '[]', 0, '2021-10-02 04:50:40', '2021-10-02 04:50:40', '2022-10-02 10:20:40'),
('ee559fd6d9841e84ae2737db6ade4e53aa54f7c016dd0bcfd7b76c4719264e9e7e85f9655d7a1321', 98, 1, 'Personal Access Token', '[]', 0, '2021-11-17 06:30:31', '2021-11-17 06:30:31', '2021-11-24 12:00:31'),
('ee9cbef7a1c7f2cb681c03ac3661b099cd58c4948f40aac5312f341d0b91915f8c5ab4d29b59737b', 69, 1, 'Personal Access Token', '[]', 0, '2022-01-01 00:08:36', '2022-01-01 00:08:36', '2023-01-01 05:38:36'),
('eed5fad834616d1a2fd3b4af8c9b115bc06bc4745e94540dc626fb39c595e5450241412968c7099d', 67, 1, 'Personal Access Token', '[]', 0, '2021-11-27 06:41:51', '2021-11-27 06:41:51', '2022-11-27 12:11:51'),
('ef21bc99a1aafe15a5ae5a92ffe5ec088b99a53429e2549c9af7d3a10c1bec9e615b80eb3b59ac53', 220, 1, 'Personal Access Token', '[]', 1, '2022-05-06 02:45:39', '2022-05-06 02:45:39', '2023-05-06 08:15:39'),
('ef78050ffd75470d1408de1732308266a87990eef11973c198a8c65bc9f0ec6866963c5a934f0906', 217, 1, 'Personal Access Token', '[]', 1, '2022-02-26 00:01:59', '2022-02-26 00:01:59', '2023-02-26 05:31:59'),
('efa4754956218f94f806134e13d165f96a19b2758fecab2ab0145802b453d5f0ece34943e657be3d', 225, 1, 'Personal Access Token', '[]', 0, '2022-03-11 04:27:55', '2022-03-11 04:27:55', '2023-03-11 09:57:55'),
('efea714ae10e5aa31d5a261c47398b69277aa401fb5ef22a5ac83254c97fa88e77f0486a13a85677', 5, 1, 'Personal Access Token', '[]', 0, '2021-10-07 22:41:20', '2021-10-07 22:41:20', '2022-10-08 04:11:20'),
('eff4cc4f8bc810cf0a13003d793623c84dbf5fe56067722ee782079d694ac1a115ccb1cdf06276c7', 146, 1, 'Personal Access Token', '[]', 1, '2021-11-28 23:45:57', '2021-11-28 23:45:57', '2022-11-29 05:15:57'),
('f0a984c5535bafac38c943a084c9d67908bd7b0dc502575e2e0aa728dcae0d367e10cd73ae76ba49', 66, 1, 'Personal Access Token', '[]', 0, '2021-11-06 02:14:32', '2021-11-06 02:14:32', '2022-11-06 07:44:32'),
('f0bc1a415df3c223edd0d9317732f0da11a40144f3a34434509b50e745dabe47fbca373f770a40a6', 227, 1, 'Personal Access Token', '[]', 1, '2022-03-03 05:14:05', '2022-03-03 05:14:05', '2023-03-03 10:44:05'),
('f0e35f7970bc5d8b046a6c692f7aca0076f5e2b5cd5e8eaa0fc3bf7d78ef1b527b17e5de72f56ebf', 72, 1, 'Personal Access Token', '[]', 0, '2022-01-17 02:23:23', '2022-01-17 02:23:23', '2023-01-17 07:53:23'),
('f1513339b0cb44d442f0929ea2f3a6e6822133e871ba89fe834a0eb5bd1e50e79de875f08db9da31', 225, 1, 'Personal Access Token', '[]', 1, '2022-02-25 06:15:37', '2022-02-25 06:15:37', '2023-02-25 11:45:37'),
('f20337d27692b18213b40094a038160643cfe032eb5a059215dc3600532eb229b7d24230fb6cd922', 69, 1, 'Personal Access Token', '[]', 1, '2022-01-10 22:35:08', '2022-01-10 22:35:08', '2023-01-11 04:05:08'),
('f270001ba9be387f260bcebce2a9e30c4762413c5807cf6f4dce04380678e3038e31baa5d2f7465c', 66, 1, 'Personal Access Token', '[]', 0, '2021-12-02 02:17:03', '2021-12-02 02:17:03', '2021-12-09 07:47:03'),
('f34a275c2d7d14f3c21db5ea27c37546466b008954ba968150143824e2993840e722961ddca21dc0', 69, 1, 'Personal Access Token', '[]', 0, '2022-01-21 04:53:00', '2022-01-21 04:53:00', '2023-01-21 10:23:00'),
('f417ae89d123c775f64e690acecbd17a6290784e4a7bc32bc4db7e3a1c993472c2e8859cb9828cbf', 123, 1, 'Personal Access Token', '[]', 1, '2021-11-20 07:10:02', '2021-11-20 07:10:02', '2022-11-20 12:40:02'),
('f4a1f8b3b86a5c8e3c487103429ac021b9a1251390598480f1a5749b60a645f1e5b869768b6bbaef', 72, 1, 'Personal Access Token', '[]', 0, '2022-01-05 04:22:42', '2022-01-05 04:22:42', '2023-01-05 09:52:42'),
('f592471d15b0a6a19e601b10d49c33429e6866cdf69b025d768c971f288152d265132a980d000c27', 123, 1, 'Personal Access Token', '[]', 1, '2021-11-20 07:14:02', '2021-11-20 07:14:02', '2022-11-20 12:44:02'),
('f606f03a1b2f8e9bcb1994f0a7587ca3e43c5b46e533f939acde892c6aa211a3cfdaad1fecdaa19f', 66, 1, 'Personal Access Token', '[]', 1, '2022-01-17 06:32:33', '2022-01-17 06:32:33', '2023-01-17 12:02:33'),
('f665c3ff0d9ef74c0f0158cb69372a4eafc66800c1cd17353517fe203cc2aaa9a6bc9fdedb4d3fd5', 59, 1, 'Personal Access Token', '[]', 0, '2021-10-12 05:20:53', '2021-10-12 05:20:53', '2021-10-19 10:50:53'),
('f6e9743ed2439ed7d0f0fa62d4fd180c817cc4c75bf5f45bb49dbf1690bf5cfbce4ac619c3b800ab', 123, 1, 'Personal Access Token', '[]', 0, '2021-12-08 01:44:55', '2021-12-08 01:44:55', '2022-12-08 07:14:55'),
('f70465b74a3ac71f344bb1b9c3533d8917a868b667cfbb7c1dba949207a9069018f4ca6fd7dae131', 72, 1, 'Personal Access Token', '[]', 1, '2021-12-31 08:35:45', '2021-12-31 08:35:45', '2022-12-31 14:05:45'),
('f7297ffcf18a04a49cd6621576e42fe14f2d4884ec72f382e1686e6c1642784add165ac8f609da0a', 227, 1, 'Personal Access Token', '[]', 1, '2022-03-08 00:54:35', '2022-03-08 00:54:35', '2023-03-08 06:24:35'),
('f78ee84f250cc910ca5b9a26a70c5c269da445ed92ba4e5069c258328d5a72d1aa887b68eba4db1c', 227, 1, 'Personal Access Token', '[]', 0, '2022-03-10 11:16:49', '2022-03-10 11:16:49', '2023-03-10 16:46:49'),
('f7d1cf7d3e3bcd9f20dec7e94a602cd3278f0eab210f23db3145d0b60fc71f7038fc11fb0695a27a', 66, 1, 'Personal Access Token', '[]', 0, '2021-12-10 02:00:03', '2021-12-10 02:00:03', '2022-12-10 07:30:03'),
('f7f46848ce688a870b3f47e21b8498ece9793209feff1fed9be5bd379e2201206b4ddb8a4ecddd00', 220, 1, 'Personal Access Token', '[]', 1, '2022-05-20 00:15:24', '2022-05-20 00:15:24', '2023-05-20 05:45:24'),
('f8ab83887cfa07244b54bdcd73bc4fc2d899f55b7e81b4bf3d8732415dd4e28a3799a1bcddbca02f', 178, 1, 'Personal Access Token', '[]', 1, '2021-11-29 05:30:03', '2021-11-29 05:30:03', '2022-11-29 11:00:03'),
('f911e55cfa620e669885d4f0261cfef9424845509f4cd2626185a844ffbf25a7af9bf95009dd4c0d', 231, 1, 'Personal Access Token', '[]', 0, '2022-04-03 08:56:13', '2022-04-03 08:56:13', '2023-04-03 14:26:13'),
('f974bd036da91edc9e711369d739ef3fe0edbfe20a489a74bfab9240d6a96cf2ae0d5692578b478a', 66, 1, 'Personal Access Token', '[]', 1, '2022-01-12 08:35:37', '2022-01-12 08:35:37', '2023-01-12 14:05:37'),
('f9c3b1752dff4995e850749933a80c8cf4b27719228a598713cb876a9f7f4fbeef67a6cfa0941031', 227, 1, 'Personal Access Token', '[]', 1, '2022-02-25 03:12:49', '2022-02-25 03:12:49', '2023-02-25 08:42:49'),
('fa6e690c40f1491c96b87a45e072cba4356fe066835384bf0b8f408a0f101469d01bcf99edb0dd39', 59, 1, 'Personal Access Token', '[]', 0, '2021-10-12 05:45:00', '2021-10-12 05:45:00', '2021-10-19 11:15:00'),
('fab035d0e08431db0a09382054c2e9ab8f9a337a0d2a5d3e97c28310b7fa6e80264bfceeab7df875', 218, 1, 'Personal Access Token', '[]', 1, '2022-02-25 23:16:33', '2022-02-25 23:16:33', '2023-02-26 04:46:33'),
('fb63f8e0f15b03e2dcd6d845f7564d044130fa220ad4e8d8c537537b32dc2878fb95e1e48844df58', 5, 1, 'Personal Access Token', '[]', 0, '2021-10-02 05:21:01', '2021-10-02 05:21:01', '2022-10-02 10:51:01'),
('fbeb701bd5e5f162df3ead7acdb855e462a64309d7fcaf82e7c15c63afc1906fcd7224fd42847de7', 76, 1, 'Personal Access Token', '[]', 0, '2021-10-14 04:05:24', '2021-10-14 04:05:24', '2022-10-14 09:35:24'),
('fcb45a976fe0d24469f8a9accc399e0cb975b979112b054c82169aa04553bbc2529078c2cd430d1b', 225, 1, 'Personal Access Token', '[]', 0, '2022-03-03 09:25:46', '2022-03-03 09:25:46', '2023-03-03 14:55:46'),
('fd1f78f05dd8935c6e20905b8ce26cd46b1d21cacfbc1997b5f9c357debff09718155f7f4fb802c9', 67, 1, 'Personal Access Token', '[]', 0, '2021-11-25 06:19:56', '2021-11-25 06:19:56', '2022-11-25 11:49:56'),
('fd8644c6e2f26bab00ef121fc3bc2e05b0a74667a394f133a3527055f7ad3131684c154b988c58da', 123, 1, 'Personal Access Token', '[]', 1, '2021-11-20 07:05:53', '2021-11-20 07:05:53', '2022-11-20 12:35:53'),
('fd90c97648ca15b3cb8f6073fbba942df02c8abe1b18be6385a2c84944382993619a55d92e98c7d8', 72, 1, 'Personal Access Token', '[]', 1, '2021-12-31 07:47:59', '2021-12-31 07:47:59', '2022-12-31 13:17:59'),
('fe4d9914bea7c794f57003d54d685ffd9be6a9cd71d3607b44f20d549909d088721a2b8500026ce9', 230, 1, 'Personal Access Token', '[]', 0, '2022-05-11 08:26:11', '2022-05-11 08:26:11', '2023-05-11 13:56:11'),
('fe73d295e6d9a82e2ab1895160d13ba2ba1a65f7a75f9f142edf2641ae77991227450fa3d330361d', 262, 1, 'Personal Access Token', '[]', 0, '2022-05-23 06:13:04', '2022-05-23 06:13:04', '2023-05-23 11:43:04'),
('feb5889c2b98f0c87ce9de747b96023852b1e7eb853243a18336cc41cd9d995e1c47f59ac83ebbc2', 220, 1, 'Personal Access Token', '[]', 0, '2022-03-02 10:24:08', '2022-03-02 10:24:08', '2023-03-02 15:54:08'),
('fef875942b45700a595f5df89b1a6fe3b6d88eed2431ba23117f835367ee1a05d2b5911e9b230431', 48, 1, 'Personal Access Token', '[]', 0, '2021-10-12 00:52:45', '2021-10-12 00:52:45', '2022-10-12 06:22:45'),
('ff5177dbb2dc510e85c26ce932e2b832cbce3aa0f0f592ec3fe529ff0d3dbe66928a6567aca6c848', 69, 1, 'Personal Access Token', '[]', 0, '2022-01-12 22:54:46', '2022-01-12 22:54:46', '2023-01-13 04:24:46'),
('ff9ba3b8dc5864a9d14db7dd1699e336d6e9f0a7023f30d03f823e495df26c3415542ee300bc3d23', 177, 1, 'Personal Access Token', '[]', 0, '2021-11-28 23:20:49', '2021-11-28 23:20:49', '2022-11-29 04:50:49'),
('ffdb832bcfaf94f6de63e5a5e7ecb017b683247d83fb9f8a31f9dff3a11bccc41dd1b1d091f20916', 220, 1, 'Personal Access Token', '[]', 0, '2022-03-10 10:44:57', '2022-03-10 10:44:57', '2022-03-17 16:14:57'),
('ffdc14f8d7baf28517b2a2de9db65613881d5e15c376bd410aa97fb056fdb21a4511747d9c341fdf', 72, 1, 'Personal Access Token', '[]', 1, '2021-12-31 08:20:23', '2021-12-31 08:20:23', '2022-12-31 13:50:23'),
('fff2d592c4fae5bad5b890ec9d6b932f0e64c79e50d8e383f8f152dd58cdfd34f8052457f7b55595', 123, 1, 'Personal Access Token', '[]', 1, '2021-11-20 07:18:26', '2021-11-20 07:18:26', '2022-11-20 12:48:26');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'tZtAuJ4XIvosFdHP3HM8gPafDFRvRh2ql3Qv4GNf', NULL, 'http://localhost', 1, 0, 0, '2021-07-19 22:59:44', '2021-07-19 22:59:44'),
(2, NULL, 'Laravel Password Grant Client', '2Xunds9AtSyB2SANdzF1lYULuoMOqDbmYuTL6Bje', 'users', 'http://localhost', 0, 1, 0, '2021-07-19 22:59:44', '2021-07-19 22:59:44');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-07-19 22:59:44', '2021-07-19 22:59:44');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seller_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `landmark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payable_price` int(11) NOT NULL,
  `commision_amount` int(11) DEFAULT NULL,
  `comission_percentage` int(11) DEFAULT NULL,
  `payable_amount_seller` int(11) DEFAULT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_mode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivered_date` timestamp NULL DEFAULT NULL,
  `sellerService_id` int(11) DEFAULT NULL,
  `hotel_from_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hotel_to_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hotel_adult_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hotel_children_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `childrenExtraCharge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adultExtraCharge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hotel_room_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hotel_nos_of_days` int(11) DEFAULT NULL,
  `hotel_id` int(11) DEFAULT NULL,
  `appointment_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appointment_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `takeAway` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_lists`
--

CREATE TABLE `order_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `mrp_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_rooms`
--

CREATE TABLE `order_rooms` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `adult` varchar(255) NOT NULL DEFAULT '0',
  `children` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_rooms`
--

INSERT INTO `order_rooms` (`id`, `order_id`, `adult`, `children`, `created_at`, `updated_at`) VALUES
(197, '138', '5', '1', '2022-05-06 02:31:15', '2022-05-06 02:31:15'),
(201, '142', '1', '2', '2022-05-06 02:49:22', '2022-05-06 02:49:22'),
(202, '142', '1', '2', '2022-05-06 02:49:23', '2022-05-06 02:49:23'),
(203, '142', '1', '2', '2022-05-06 02:49:24', '2022-05-06 02:49:24'),
(212, '146', '2', '1', '2022-05-09 23:33:04', '2022-05-09 23:33:04'),
(213, '146', '2', '1', '2022-05-09 23:33:08', '2022-05-09 23:33:08'),
(214, '146', '2', '1', '2022-05-09 23:33:09', '2022-05-09 23:33:09'),
(215, '146', '2', '1', '2022-05-09 23:33:11', '2022-05-09 23:33:11'),
(216, '146', '2', '1', '2022-05-09 23:33:14', '2022-05-09 23:33:14'),
(217, '146', '2', '1', '2022-05-09 23:33:15', '2022-05-09 23:33:15'),
(218, '146', '2', '1', '2022-05-09 23:33:20', '2022-05-09 23:33:20'),
(219, '147', '2', '1', '2022-05-09 23:35:23', '2022-05-09 23:35:23'),
(220, '147', '2', '1', '2022-05-09 23:35:33', '2022-05-09 23:35:33'),
(221, '147', '2', '1', '2022-05-09 23:35:34', '2022-05-09 23:35:34'),
(222, '147', '2', '1', '2022-05-09 23:35:35', '2022-05-09 23:35:35'),
(223, '147', '2', '1', '2022-05-09 23:35:35', '2022-05-09 23:35:35'),
(224, '147', '2', '1', '2022-05-09 23:35:37', '2022-05-09 23:35:37'),
(225, '147', '2', '1', '2022-05-09 23:35:37', '2022-05-09 23:35:37'),
(226, '147', '2', '1', '2022-05-09 23:35:38', '2022-05-09 23:35:38'),
(227, '147', '2', '1', '2022-05-09 23:35:39', '2022-05-09 23:35:39'),
(228, '147', '2', '1', '2022-05-09 23:35:39', '2022-05-09 23:35:39'),
(229, '147', '2', '1', '2022-05-09 23:35:39', '2022-05-09 23:35:39'),
(230, '147', '2', '1', '2022-05-09 23:35:41', '2022-05-09 23:35:41'),
(234, '151', '2', '2', '2022-05-18 22:45:10', '2022-05-18 22:45:10');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`, `updated_at`) VALUES
(7, 'samchangappa@gmail.com', '$2y$10$ik41/Nk8iXycKn.JylmsMeHKZ9JVEqFHXCAOzSz2vvzoqjzl9lWwy', '2021-09-12 23:18:33', NULL),
(10, 'thirupathigopidi9@gmail.com', '833061', '2021-10-01 00:20:17', '2021-10-01 00:20:17'),
(11, 'test@gmail.com', '128446', '2021-10-08 06:26:31', '2021-10-08 08:14:37'),
(12, 'rk8590568@gmail.com', '534475', '2021-11-16 07:16:50', '2021-11-16 07:17:48'),
(18, 'hetathakkar10@gmail.com', '823733', '2021-12-16 04:35:21', '2022-03-04 10:30:07'),
(19, 'kavyadevaiah02@gmail.com', '$2y$10$tvPIRL91oDc3HwgHVhUvfOURwZkrGk4BV96d4kz1ndI7aUz9LjBsu', '2022-01-27 23:40:22', NULL),
(20, 'suhasini10g@gmail.com', '$2y$10$YVXIOGEop4gDUCFnQOEeNOZn4bkeKqbCI2Ll/qKDXaq6SCuaEKKoK', '2022-02-02 00:00:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pickupdrop`
--

CREATE TABLE `pickupdrop` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `pickUpAddress` text NOT NULL,
  `pickUplatitude` varchar(255) NOT NULL,
  `pickUplogitude` varchar(255) NOT NULL,
  `sellerService_id` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `distance` int(11) NOT NULL,
  `dropLongitude` varchar(255) NOT NULL,
  `dropLatitude` varchar(255) NOT NULL,
  `dropAddress` text NOT NULL,
  `deliveryContact` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `mrp_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `seller_id`, `name`, `image`, `description`, `stock`, `mrp_price`, `selling_price`, `unit`, `status`, `created_at`, `updated_at`) VALUES
(129, 0, 124, 'tst', '628728b5e3558.', 'test', 10, 10, 10, '10', 'Active', '2022-05-20 00:05:49', '2022-05-20 00:05:49'),
(131, 0, 124, 'test', '628b72ccf2fbf.', 'tt', 2, 18, 10, '5', 'Active', '2022-05-23 06:11:00', '2022-05-23 06:11:00'),
(132, 62, 126, 'Arebica coffee powder (250grams)', '628ded0725b76.jpg', 'Medium dark roasted coffee powder with 25% chicory', 500, 300, 200, '500', 'Active', '2022-05-25 03:17:03', '2022-05-25 03:17:03'),
(133, 61, 126, 'Red wine(750ml)', '628defe6e42a5.jpg', 'Natural grape wine\r\nIngredients -cinnamon, cardamom,cloves, boiled water, furit extract etc...', 600, 850, 700, '600', 'Active', '2022-05-25 03:29:18', '2022-05-25 03:29:18');

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Sent','Received') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`id`, `seller_id`, `name`, `email`, `phone`, `message`, `status`, `created_at`, `updated_at`) VALUES
(31, 3, 'heta', 'hetathakkar10@gmail.com', '8347736465', 'hello', NULL, '2022-02-25 05:29:19', '2022-02-25 05:29:19'),
(35, 3, 'heta', 'hetathakkar10@gmail.com', '8347736465', 'hello', NULL, '2022-03-02 03:13:23', '2022-03-02 03:13:23'),
(38, 106, 'Hemanth Mandappa', 'hemanth.mandappa@gmail.com', '9535210699', 'Room', 'Received', '2022-05-09 05:19:00', '2022-05-09 05:19:00'),
(39, 124, 'twst', 'santhoshkhan091@gmail.com', '9790459551', 'hii', 'Sent', '2022-05-20 00:04:07', '2022-05-20 00:04:07'),
(40, 125, 'Thirupathi', 'thirupathigopidi91@gmail.com', '8897236466', 'hii', 'Sent', '2022-05-20 00:10:57', '2022-05-20 00:10:57'),
(41, 125, 'Thirupathi', 'thirupathigopidi91@gmail.com', '8897236466', 'hii', 'Sent', '2022-05-20 00:10:59', '2022-05-20 00:10:59');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'Seller', NULL, NULL),
(3, 'User', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `seller_id` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `user_id`, `seller_id`, `created_at`, `updated_at`) VALUES
(138, '230', '106', '2022-05-06 02:31:15', '2022-05-06 02:31:15'),
(142, '220', '106', '2022-05-06 02:49:22', '2022-05-06 02:49:22'),
(146, '230', '106', '2022-05-09 23:33:04', '2022-05-09 23:33:04'),
(147, '230', '106', '2022-05-09 23:35:23', '2022-05-09 23:35:23'),
(151, '220', '106', '2022-05-18 22:45:10', '2022-05-18 22:45:10');

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `shop_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Inactive',
  `show_mobile_email` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `shop_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_id` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_parent_id` int(11) NOT NULL,
  `iframe` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `open_close_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deliveryStatus` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Inactive',
  `deliveryCharge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `room_capacity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '6',
  `cod` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `user_id`, `shop_name`, `shop_address`, `status`, `show_mobile_email`, `shop_image`, `service_id`, `description`, `service_parent_id`, `iframe`, `open_close_time`, `deliveryStatus`, `deliveryCharge`, `room_capacity`, `cod`, `created_at`, `updated_at`) VALUES
(105, 236, NULL, NULL, 'Inactive', 'No', NULL, 34, NULL, 26, NULL, NULL, 'Inactive', '0', '6', 'Active', '2022-04-24 23:02:33', '2022-05-06 05:11:40'),
(106, 237, 'Coorg Homestay', 'Madikeri', 'Active', 'No', '626795af42389.jpg', 34, 'test', 26, NULL, NULL, 'Inactive', '0', '4', 'Active', '2022-04-25 22:58:37', '2022-05-09 23:53:23'),
(109, 242, 'Coorg Food', 'Mahadevpet madikeri', 'Active', 'No', '6279f018dff2e.jpg', 9, 'Coorg style food s  are available', 3, NULL, '10am', 'Inactive', '0', '6', 'Active', '2022-05-09 23:19:06', '2022-05-09 23:24:48'),
(110, 243, NULL, NULL, 'Inactive', 'No', NULL, 7, NULL, 5, NULL, NULL, 'Inactive', '0', '6', 'Active', '2022-05-10 01:02:42', '2022-05-10 01:02:42'),
(111, 244, NULL, NULL, 'Inactive', 'No', NULL, 34, NULL, 26, NULL, NULL, 'Inactive', '0', '6', 'Active', '2022-05-10 04:48:39', '2022-05-10 04:48:39'),
(112, 245, NULL, NULL, 'Inactive', 'No', NULL, 7, NULL, 5, NULL, NULL, 'Inactive', '0', '6', 'Active', '2022-05-10 06:31:17', '2022-05-10 06:31:17'),
(113, 246, NULL, NULL, 'Inactive', 'No', NULL, 27, NULL, 26, NULL, NULL, 'Inactive', '0', '6', 'Active', '2022-05-10 07:42:12', '2022-05-10 07:42:12'),
(114, 247, NULL, NULL, 'Inactive', 'No', NULL, 9, NULL, 3, NULL, NULL, 'Inactive', '0', '6', 'Active', '2022-05-10 07:48:26', '2022-05-10 07:48:26'),
(115, 248, NULL, NULL, 'Inactive', 'No', NULL, 9, NULL, 3, NULL, NULL, 'Inactive', '0', '6', 'Active', '2022-05-10 07:52:46', '2022-05-10 07:52:46'),
(117, 250, 'Woodsman', 'Kadagadal villeage and post madikeri', 'Active', 'Yes', '627f39f368fa0.jpg', 107, 'An exotic product range from coorg . All products are home grown and without any pesticides', 4, NULL, '10am', 'Inactive', '0', '6', 'Active', '2022-05-13 23:32:38', '2022-05-13 23:42:57'),
(118, 251, 'Madhvi\'s Store', 'Kadagadal village and post, Madikeri', 'Active', 'No', '627f3fb696aea.jpg', 42, 'Fashion', 4, NULL, '10am', 'Active', 'Minimum 100/-', '6', 'Inactive', '2022-05-13 23:50:17', '2022-05-14 01:09:44'),
(119, 252, 'Bendhu Bidara', 'Kadagadal villege and post . madikeri 571248', 'Active', 'Yes', '627f48c1deb78.jpg', 34, 'Bendhu Bidara plantation stay', 26, NULL, NULL, 'Inactive', '0', '4', 'Active', '2022-05-14 00:32:19', '2022-05-14 00:44:25'),
(120, 253, NULL, NULL, 'Active', 'Yes', NULL, 34, NULL, 26, NULL, NULL, 'Inactive', '0', '6', 'Active', '2022-05-14 01:11:19', '2022-05-14 01:24:28'),
(121, 255, NULL, NULL, 'Inactive', 'No', NULL, 49, NULL, 3, NULL, NULL, 'Inactive', '0', '6', 'Active', '2022-05-17 01:48:31', '2022-05-17 01:48:31'),
(122, 258, NULL, NULL, 'Inactive', 'No', NULL, 9, NULL, 3, NULL, NULL, 'Inactive', '0', '6', 'Active', '2022-05-18 03:42:32', '2022-05-18 03:42:32'),
(123, 259, NULL, NULL, 'Inactive', 'No', NULL, 9, NULL, 3, NULL, NULL, 'Inactive', '0', '6', 'Active', '2022-05-18 23:22:05', '2022-05-18 23:22:05'),
(124, 260, 'test', 'tret', 'Active', 'Yes', '628616bd4025b.png', 9, 'yhh', 3, 'trtgg', NULL, 'Inactive', '0', '6', 'Active', '2022-05-18 23:24:10', '2022-05-19 04:36:53'),
(125, 262, 'test', 'test', 'Active', 'Yes', '62876da518dd3.png', 27, 'test', 26, 'test', NULL, 'Inactive', '0', '6', 'Active', '2022-05-19 07:05:08', '2022-05-20 04:59:57'),
(126, 263, 'Shakthi enterprises', 'Madikeri', 'Active', 'Yes', NULL, 39, 'Natural coorg spices and wines', 4, NULL, '8am to 6.30pm', 'Inactive', '0', '6', 'Active', '2022-05-25 02:15:17', '2022-05-25 02:55:07');

-- --------------------------------------------------------

--
-- Table structure for table `sellerservices`
--

CREATE TABLE `sellerservices` (
  `id` int(11) NOT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commission` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `parent_id`, `name`, `slug`, `image`, `status`, `type`, `commission`, `created_at`, `updated_at`) VALUES
(3, NULL, 'Food', 'food', '61c2f991d6635.png', 'Active', 'ecom', 5, '2021-06-30 00:51:19', '2022-01-13 03:15:18'),
(4, NULL, 'Shop', 'buy-sell', '61c2f97c5de43.png', 'Active', 'ecom', 5, '2021-06-30 00:51:52', '2022-01-13 03:14:57'),
(5, NULL, 'Daily Needs', 'daily-needs', '61c2f967671d2.png', 'Active', 'ecom', 5, '2021-06-30 00:52:20', '2022-01-13 03:13:57'),
(7, 5, 'Fresh Fruits', 'fruits', NULL, 'Active', NULL, NULL, '2021-06-30 00:54:08', '2021-09-25 03:40:12'),
(8, 5, 'Vegetables', 'vegetables', NULL, 'Active', NULL, NULL, '2021-06-30 00:54:13', '2021-09-25 03:41:48'),
(9, 3, 'Restaurant', 'restaurant', NULL, 'Active', NULL, NULL, '2021-06-30 00:58:54', '2021-06-30 00:58:54'),
(10, 3, 'Cafe', 'cafe', NULL, 'Active', NULL, NULL, '2021-06-30 00:59:00', '2021-06-30 00:59:00'),
(12, NULL, 'Services', 'services', '61c2f9516a919.png', 'Active', 'service', 10, '2021-07-23 06:06:40', '2021-12-22 04:39:21'),
(13, 12, 'Man Power Service', 'man-power-services', NULL, 'Active', NULL, 0, '2021-07-23 06:07:36', '2021-08-06 00:07:26'),
(14, 12, 'Plumber', 'plumber', NULL, 'Active', NULL, 0, '2021-07-23 06:07:52', '2021-08-06 00:07:01'),
(16, NULL, 'Education', 'education', '61c2f93b9cad9.png', 'Active', 'education', 5, '2021-08-06 00:50:20', '2021-12-22 04:38:59'),
(17, NULL, 'Health', 'health', '61c2f926ed803.png', 'Active', 'health', 5, '2021-08-06 00:50:45', '2021-12-22 04:38:38'),
(18, NULL, 'Professional', 'professional', '61c2f91292b82.png', 'Active', 'professional', 10, '2021-08-06 00:51:56', '2021-12-22 04:38:18'),
(19, NULL, 'Pick and Drop', 'pick-and-drop', '61c2f8ffcbe25.png', 'Active', 'pd', 10, '2021-08-06 00:53:28', '2022-01-13 03:13:22'),
(20, 16, 'Schools', 'schools', NULL, 'Active', NULL, 0, '2021-08-06 01:02:47', '2021-08-06 01:02:47'),
(21, 16, 'Colleges', 'colleges', NULL, 'Active', NULL, 0, '2021-08-06 01:03:07', '2021-08-06 01:03:07'),
(22, 17, 'Eye Hospitals', 'eye-hospitals', NULL, 'Active', NULL, 0, '2021-08-06 02:26:27', '2021-08-06 05:16:28'),
(23, 17, 'Multi Speciality Hospitals', 'multi-speciality-hospitals', NULL, 'Active', NULL, 0, '2021-08-06 02:27:40', '2021-08-06 02:27:40'),
(24, 18, 'Advocates', 'advocates', NULL, 'Active', NULL, 0, '2021-08-06 03:58:08', '2021-08-06 03:58:08'),
(25, 18, 'Engineers', 'engineers', NULL, 'Active', NULL, 0, '2021-08-06 03:58:41', '2021-08-06 03:58:41'),
(26, NULL, 'Stay Booking', 'stay-booking', '61c2f87ed9760.png', 'Active', 'staybooking', 20, '2021-08-17 23:15:39', '2021-12-22 04:35:50'),
(27, 26, 'Hotels & Resorts', 'hotels', NULL, 'Active', NULL, 0, '2021-08-17 23:16:02', '2021-09-25 00:26:30'),
(28, 19, 'Goods', 'goods', NULL, 'Active', NULL, 0, '2021-08-20 00:00:39', '2021-08-20 00:00:39'),
(29, 19, 'Food', 'foods', NULL, 'Active', NULL, 0, '2021-08-20 00:01:11', '2021-09-25 00:16:41'),
(30, 19, 'Passengers', 'passengers', NULL, 'Active', NULL, 0, '2021-08-20 00:01:43', '2021-08-20 00:01:43'),
(34, 26, 'Home stays', 'home-stays', NULL, 'Active', NULL, 0, '2021-09-25 00:28:10', '2021-09-25 00:28:10'),
(35, 26, 'Lodges', 'lodges', NULL, 'Active', NULL, 0, '2021-09-25 00:28:26', '2021-09-25 00:28:26'),
(36, 26, 'Planation stays', 'planation-stays', NULL, 'Active', NULL, 0, '2021-09-25 00:28:44', '2021-09-25 00:28:44'),
(37, 26, 'Guest House', 'guest-house', NULL, 'Active', NULL, 0, '2021-09-25 00:31:17', '2021-09-25 00:31:17'),
(38, 26, 'Tent & Dormitory', 'tent--dormitory', NULL, 'Active', NULL, 0, '2021-09-25 00:32:11', '2021-09-25 00:32:11'),
(39, 4, 'Spices', 'spices', NULL, 'Active', NULL, 0, '2021-09-25 00:33:48', '2021-09-25 00:33:48'),
(40, 4, 'Electronics & Home Appliances', 'electronics--home-appliances', NULL, 'Active', NULL, 0, '2021-09-25 00:35:37', '2021-09-25 00:35:37'),
(41, 4, 'Textiles & Readymade garment', 'textiles--readymade-garment', NULL, 'Active', NULL, 0, '2021-09-25 00:39:05', '2021-09-25 00:39:05'),
(42, 4, 'Fashion', 'fashion', NULL, 'Active', NULL, 0, '2021-09-25 00:39:18', '2021-09-25 00:39:18'),
(43, 4, 'Mobiles & Accessories', 'mobiles--accessories', NULL, 'Active', NULL, 0, '2021-09-25 00:39:53', '2021-09-25 00:39:53'),
(44, 4, 'Books & Stationery', 'books--stationery', NULL, 'Active', NULL, 0, '2021-09-25 00:40:39', '2021-09-25 00:40:39'),
(45, 4, 'Sports & Fitness', 'sports-shop', NULL, 'Active', NULL, 0, '2021-09-25 00:41:51', '2021-09-25 00:55:14'),
(46, 4, 'Furniture', 'furniture', NULL, 'Active', NULL, 0, '2021-09-25 00:43:15', '2021-09-25 00:43:15'),
(47, 4, 'Work from Home Essentials', 'work-from-home-essentials', NULL, 'Active', NULL, 0, '2021-09-25 00:45:17', '2021-09-25 00:45:17'),
(49, 3, 'Hotels', 'natural', NULL, 'Active', NULL, 0, '2021-09-25 00:47:14', '2021-09-25 05:10:19'),
(50, 17, 'Health & Wellness', 'health--wellness', NULL, 'Active', NULL, 0, '2021-09-25 00:47:53', '2021-09-25 00:47:53'),
(51, 4, 'Mom & Baby', 'mom--baby', NULL, 'Active', NULL, 0, '2021-09-25 00:48:07', '2021-09-25 00:48:07'),
(52, 4, 'Gift & fancy store', 'gift--fancy-store', NULL, 'Active', NULL, 0, '2021-09-25 00:49:23', '2021-09-25 00:49:23'),
(53, 4, 'Auto Spare & Accessories', 'auto-spare--accessories', NULL, 'Active', NULL, 0, '2021-09-25 00:50:49', '2021-09-25 00:50:49'),
(54, 4, 'Footwear', 'footwear', NULL, 'Active', NULL, 0, '2021-09-25 00:51:31', '2021-09-25 00:51:31'),
(55, 18, 'Auditors', 'auditors', NULL, 'Active', NULL, 0, '2021-09-25 00:58:19', '2021-09-25 00:58:19'),
(56, 18, 'Architect & Interior Designers', 'architect--interior-designers', NULL, 'Active', NULL, 0, '2021-09-25 00:59:18', '2021-09-25 00:59:18'),
(57, 17, 'Eye Care', 'eye-care', NULL, 'Active', NULL, 0, '2021-09-25 01:11:55', '2021-09-25 01:11:55'),
(58, 17, 'Clinic', 'clinic', NULL, 'Active', NULL, 0, '2021-09-25 01:12:48', '2021-09-25 01:12:48'),
(59, 17, 'Veterinary', 'veterinary', NULL, 'Active', NULL, 0, '2021-09-25 01:13:19', '2021-09-25 01:13:19'),
(60, 17, 'Ayurvedic', 'ayurvedic', NULL, 'Active', NULL, 0, '2021-09-25 01:13:57', '2021-09-25 01:13:57'),
(61, 17, 'Diagnostics', 'diagnostics', NULL, 'Active', NULL, 0, '2021-09-25 01:14:54', '2021-09-25 01:14:54'),
(62, 16, 'Hotel Management', 'medical-equipment', NULL, 'Active', NULL, 0, '2021-09-25 01:17:10', '2021-09-25 01:25:27'),
(63, 17, 'Children Hospital', 'children-hospital', NULL, 'Active', NULL, 0, '2021-09-25 03:20:56', '2021-09-25 03:20:56'),
(64, 17, 'Dentist', 'dentist', NULL, 'Active', NULL, 0, '2021-09-25 03:24:46', '2021-09-25 03:24:46'),
(65, 17, 'Gynecologist/Obstetrician', 'gynecologistobstetrician', NULL, 'Active', NULL, 0, '2021-09-25 03:25:41', '2021-09-25 03:25:41'),
(66, 17, 'General Physician', 'general-physician', NULL, 'Active', NULL, 0, '2021-09-25 03:26:11', '2021-09-25 03:26:11'),
(67, 17, 'Dermatologist', 'dermatologist', NULL, 'Active', NULL, 0, '2021-09-25 03:26:35', '2021-09-25 03:26:35'),
(68, 17, 'Ear-Nose-Throat( ENT) Specialist', 'ear-nose-throat-ent-specialist', NULL, 'Active', NULL, 0, '2021-09-25 03:27:21', '2021-09-25 03:27:21'),
(69, 17, 'Pediatrician', 'pediatrician', NULL, 'Active', NULL, 0, '2021-09-25 03:47:11', '2021-09-25 03:47:11'),
(70, 17, 'Dietitian / Nutrition', 'dietitian--nutrition', NULL, 'Active', NULL, 0, '2021-09-25 03:48:12', '2021-09-25 03:48:12'),
(71, 12, 'Engineering Works', 'engineering-works', NULL, 'Active', NULL, 0, '2021-09-25 04:04:29', '2021-09-25 04:04:29'),
(72, 12, 'Painters', 'painters', NULL, 'Active', NULL, 0, '2021-09-25 04:04:48', '2021-09-25 04:04:48'),
(73, 12, 'Courier', 'courier', NULL, 'Active', NULL, 0, '2021-09-25 04:05:05', '2021-09-25 04:05:05'),
(74, 12, 'Electronics Service Center', 'electronics-service-center', NULL, 'Active', NULL, 0, '2021-09-25 04:08:07', '2021-09-25 04:08:07'),
(75, 12, 'Cable Operators', 'cable-operators', NULL, 'Active', NULL, 0, '2021-09-25 04:08:27', '2021-09-25 04:08:27'),
(76, 12, 'Xerox & Printing', 'xerox--printing', NULL, 'Active', NULL, 0, '2021-09-25 04:09:17', '2021-09-25 04:09:17'),
(77, 17, 'Bone & Joint Doctors', 'bone--joint-doctors', NULL, 'Active', NULL, 0, '2021-09-25 04:15:57', '2021-09-25 04:15:57'),
(78, 12, 'A C Service', 'a-c-service', NULL, 'Active', NULL, 0, '2021-09-25 04:18:48', '2021-09-25 04:18:48'),
(79, 12, 'Electricians', 'electricians', NULL, 'Active', NULL, 0, '2021-09-25 04:19:10', '2021-09-25 04:19:10'),
(80, 12, 'Gardener', 'gardener', NULL, 'Active', NULL, 0, '2021-09-25 04:19:28', '2021-09-25 04:19:28'),
(81, 12, 'Automobile', 'automobile', NULL, 'Active', NULL, 0, '2021-09-25 04:21:58', '2021-09-25 04:21:58'),
(82, 12, 'Beauty Services', 'beauty-services', NULL, 'Active', NULL, 0, '2021-09-25 04:23:33', '2021-09-25 04:23:33'),
(83, 12, 'SPA', 'spa', NULL, 'Active', NULL, 0, '2021-09-25 04:23:47', '2021-09-25 04:23:47'),
(84, 18, 'Income Tax Consultants', 'income-tax-consultants', NULL, 'Active', NULL, 0, '2021-09-25 04:24:19', '2021-09-25 04:24:19'),
(85, 18, 'GST Consultants', 'gst-consultants', NULL, 'Active', NULL, 0, '2021-09-25 04:25:00', '2021-09-25 04:25:00'),
(86, 12, 'DTH Services', 'dth-services', NULL, 'Active', NULL, 0, '2021-09-25 04:26:11', '2021-09-25 04:26:11'),
(87, 12, 'Borewell & Earth Movers', 'borewell--earth-movers', NULL, 'Active', NULL, 0, '2021-09-25 04:28:07', '2021-09-25 04:28:07'),
(88, 12, 'Builders & Developers', 'builders--developers', NULL, 'Active', NULL, 0, '2021-09-25 04:34:21', '2021-09-25 04:34:21'),
(89, 4, 'Agricultural Equipment', 'agricultural-equipment', NULL, 'Active', NULL, 0, '2021-09-25 04:35:18', '2021-09-25 04:35:18'),
(90, 4, 'Agricultural Machinery', 'agricultural-machinery', NULL, 'Active', NULL, 0, '2021-09-25 04:35:53', '2021-09-25 04:35:53'),
(91, 4, 'Construction Machinery', 'construction-machinery', NULL, 'Active', NULL, 0, '2021-09-25 04:36:36', '2021-09-25 04:36:36'),
(92, 5, 'Grocery', 'grocery', NULL, 'Active', NULL, 0, '2021-09-25 04:37:50', '2021-09-25 04:37:50'),
(93, 5, 'Milk & Milk Products', 'milk--milk-products', NULL, 'Active', NULL, 0, '2021-09-25 04:38:17', '2021-09-25 04:38:17'),
(94, 5, 'Meat & Fish', 'meat--fish', NULL, 'Active', NULL, 0, '2021-09-25 04:40:25', '2021-09-25 04:40:25'),
(95, 5, 'Super Market', 'super-market', NULL, 'Active', NULL, 0, '2021-09-25 04:41:42', '2021-09-25 04:41:42'),
(96, 12, 'Laundry', 'laundry', NULL, 'Active', NULL, 0, '2021-09-25 04:56:10', '2021-09-25 04:56:10'),
(97, 12, 'Tailor', 'tailor', NULL, 'Active', NULL, 0, '2021-09-25 04:57:05', '2021-09-25 04:57:05'),
(98, 12, 'Decorators', 'decorators', NULL, 'Active', NULL, 0, '2021-09-25 04:59:41', '2021-09-25 04:59:41'),
(99, 12, 'Event Management', 'event-management', NULL, 'Active', NULL, 0, '2021-09-25 04:59:59', '2021-09-25 04:59:59'),
(100, 3, 'Catering Services', 'catering-services', NULL, 'Active', NULL, 0, '2021-09-25 05:01:22', '2021-09-25 05:01:22'),
(101, 3, 'Juices & Beverages', 'juices--beverages', NULL, 'Active', NULL, 0, '2021-09-25 05:01:56', '2021-09-25 05:01:56'),
(102, 12, 'Packers & Movers', 'packers--movers', NULL, 'Active', NULL, 0, '2021-09-25 05:02:11', '2021-09-25 05:02:11'),
(103, 12, 'Real Estate & Properties', 'real-estate--properties', NULL, 'Active', NULL, 0, '2021-09-25 05:02:35', '2021-09-25 05:02:35'),
(104, 26, 'Adventure & Activities', 'adventure--activities', NULL, 'Active', NULL, 0, '2021-09-25 05:03:26', '2021-09-25 05:06:34'),
(105, 12, 'Bike & Car Mechanic', 'bike--car-mechanic', NULL, 'Active', NULL, 0, '2021-09-25 05:03:54', '2021-09-25 05:03:54'),
(106, 5, 'Farm Grown', 'farm-grown', NULL, 'Active', NULL, 0, '2021-09-25 05:05:19', '2021-09-25 05:05:19'),
(107, 4, 'Home Made Products', 'home-made-products', NULL, 'Active', NULL, 0, '2021-09-25 05:07:45', '2021-10-29 02:22:59'),
(108, 3, 'Home Made', 'home-made', NULL, 'Active', NULL, 0, '2021-10-29 02:22:25', '2021-10-29 02:22:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci DEFAULT 'Inactive',
  `city_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `landmark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verify` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `verifyOtp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `remember_token`, `status`, `city_id`, `pincode`, `landmark`, `address`, `otp`, `verify`, `verifyOtp`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'admin@admin.com', NULL, NULL, '$2y$12$DyHuJZWDUAOIkb9n4DIpzO2lUZXJLeqi/HLDJjhx8TE.A9ifc3NVO', NULL, 'Active', '0', NULL, NULL, NULL, NULL, 'No', '', NULL, NULL),
(218, 3, 'sam', 'samchangappa@gmail.com', '6366330167', NULL, '$2y$10$vEjZwEXay/OpQYcAJebo7OJmJf7S552K.mDiWOxSYp7Wg7HiE6zA2', NULL, 'Active', NULL, '571201', 'near kannika jewellery', 'kannika jewllery buliding mahadevpet madikeri', '796858', 'Yes', '301654', '2022-02-06 23:33:13', '2022-05-13 23:23:52'),
(219, 3, 'saba usmani', 'sabachand1@gmail.com', '6207510818', NULL, '$2y$10$/gQVkmatx3UanAzo.OCxfeJrUl/mZqOdTLt9QcO0xNq0GaHsAsVP.', NULL, 'Active', NULL, NULL, NULL, NULL, NULL, 'No', '540375', '2022-02-07 00:30:36', '2022-02-07 00:30:38'),
(220, 3, 'test', 'abctest@gmail.com', '9943626292', NULL, '$2y$10$w6eQ8OJa2Oc/ExnTYg1N3O9kAgjJ1pV8knrEN3pe0HgnSZudFeCJe', NULL, 'Active', 'chennai', '12345678', 'test', 'test', '659226', 'Yes', '761237', '2022-02-07 00:51:23', '2022-05-06 00:37:16'),
(221, 3, 'saba', 'as1043459@gmail.com', '8789383298', NULL, '$2y$10$JbxtZASgPzPU1K1RROx3qOFA/BVjmhAIVaawfuKfyD87B/JK1ERSW', NULL, 'Active', 'bangalore', '560068', 'btm 1 stage', 'btm 1 stage', NULL, 'Yes', '988896', '2022-02-07 02:07:47', '2022-02-07 02:11:32'),
(224, 3, 'sonika', 'sonikasonu871@gmail.com', '9483766438', NULL, '$2y$10$cv6HHhu31PKxWG/RoAOytuFOd0isFKX/zq9UsrLOFRDf0WsCOZXqG', NULL, 'Active', NULL, NULL, NULL, NULL, NULL, 'Yes', '701025', '2022-02-11 04:03:54', '2022-02-11 04:09:00'),
(225, 3, 'Heta thakkar', 'hetatakkar10@gmail.com', '9228441858', NULL, '$2y$10$E7H8DTOl09qH6H1n/TbQ3ODBHNtJAdbEA4Zj8BY5DIrX7yEUPEmxO', NULL, 'Active', 'Bhuj', '370001', 'Airport', 'kutch', NULL, 'Yes', '976842', '2022-02-16 02:01:16', '2022-03-09 22:35:38'),
(230, 3, 'Devaiah koravanda', 'devaiahkoravanda87@gmail.com', '8971833497', NULL, '$2y$10$wcWKUXuk7WqqMuzQA6nime9szOrgg2IRRVfExyk7LsubDO89KA4bC', NULL, 'Active', NULL, NULL, NULL, NULL, '673541', 'Yes', '347391', '2022-03-10 01:52:49', '2022-05-25 10:54:55'),
(231, 3, 'hitesh', 'hitesh.k.bhatia@gmail.com', '9845134334', NULL, '$2y$10$O/kAwDLIauP3L3mQqXA3KOF8fK7xrQc2/RLeiHUMPkH4gyYKY7f2.', NULL, 'Active', NULL, NULL, NULL, NULL, NULL, 'Yes', '247005', '2022-04-03 08:55:40', '2022-04-03 08:56:01'),
(232, 3, 'Thimmaiah K M', 'thimmaiahkoravanda11@gmail.com', '7411392566', NULL, '$2y$10$jbWrsLJT8JFqejvgHeVomeyLMPsTVLHm09g7dmaA/rfmwyMj24eD2', NULL, 'Active', NULL, NULL, NULL, NULL, NULL, 'No', '274197', '2022-04-18 03:10:53', '2022-04-18 03:11:21'),
(233, 3, 'Akhil', 'Appaiahakhil@gmail.com', '8217667210', NULL, '$2y$10$k4RZQ4L9raylL/NS1t5uG.vVeLHwfmvmRpecxKbLvAaDninGPo8Ii', NULL, 'Active', 'Madikeri', '571201', 'Boikeri', 'Ibnivalavadi post', '605887', 'No', '280623', '2022-04-18 03:11:36', '2022-04-22 06:09:29'),
(234, 3, 'Anishgowda Anishgowd', 'anisharambooru@gmail.com', '8722824284', NULL, '$2y$10$7gZpRYlEBiCPPMymCWPR5.hBRv3gk7s6.zzeyZ6OwgK3ipN.K4PqS', NULL, 'Active', NULL, NULL, NULL, NULL, NULL, 'No', '252647', '2022-04-18 03:48:41', '2022-04-18 03:48:42'),
(235, 3, 'Yathish Belliappa', 'yathishbelliappa90@gmail.com', '9483825705', NULL, '$2y$10$U.hKyrXKuSgsfwkEa7PyWuQedIqW9TYPWHVrGn/K5cE52i94T4Nyi', NULL, 'Active', NULL, NULL, NULL, NULL, NULL, 'No', '548593', '2022-04-19 00:08:33', '2022-04-19 00:08:35'),
(236, 2, 'MAHESH', 'maheshssm36@gmail.com', '9741026935', NULL, '$2y$10$.LaVVp4YX1FDSsdHIeRnA.9//H9HDkwDGTntfKEJXDzcPxf6YvjE6', NULL, 'Inactive', '2', NULL, NULL, NULL, NULL, 'No', '420825', '2022-04-24 23:02:33', '2022-05-06 05:11:40'),
(237, 2, 'roshan', 'roshanappaiah1995@gmail.com', '9845771938', NULL, '$2y$10$7HheVIcryjI91A/zUL3uIur065UNnUMp7E5jq5tMzvBQdGnoojupO', NULL, 'Active', '3', NULL, NULL, NULL, '517032', 'Yes', '642737', '2022-04-25 22:58:37', '2022-05-10 00:00:27'),
(238, 3, 'Heta thakkar', 'hetakothari19@gmail.com', '8160437992', NULL, '$2y$10$mMAT6kXY1j2ofo/wCi7lb.6rZJXSPIOhC7SWkjm/QyzGZBlSUzrCO', NULL, 'Active', NULL, NULL, NULL, NULL, NULL, 'No', '975010', '2022-05-05 03:07:04', '2022-05-05 03:07:06'),
(241, 3, 'Hemanth Mandappa', 'hemanth.mandappa@gmail.com', '9535210699', NULL, '$2y$10$3sT0e6by0S2RagdGaJ9pJ.XFLex70wlGnfxW1RB/Bv5QhE8w2MlNm', NULL, 'Active', NULL, NULL, NULL, NULL, '285758', 'Yes', '390077', '2022-05-09 05:09:52', '2022-05-09 05:30:22'),
(242, 2, 'Harshitha', 'harshitharaj760@gmail.com', '8431399505', NULL, '$2y$10$fkAIM9Je5AS4SlUOrPm50O0E2Acdukuu2qV72n31OmrSn6FfzpHnm', NULL, 'Active', '1', NULL, NULL, NULL, '835496', 'Yes', '669167', '2022-05-09 23:19:06', '2022-05-10 00:00:43'),
(243, 2, 'Heta', 'abcdtest@gmail.com', '9444656429', NULL, '$2y$10$O3fc1XpYi1TNanPs.FzPnOwNdvOObE6fFh8ecGpZ12nh5L1NFt6CS', NULL, 'Inactive', '1', NULL, NULL, NULL, NULL, 'No', '910937', '2022-05-10 01:02:42', '2022-05-10 01:02:44'),
(244, 2, 'santhosh', 'support@coorgdial.com', '8762282244', NULL, '$2y$10$8aqicZGbQVESHytLuR3eCey6F2YbWViMvkIpXu1MSbtZEPBiEYVdW', NULL, 'Inactive', '3', NULL, NULL, NULL, NULL, 'Yes', '259472', '2022-05-10 04:48:39', '2022-05-10 04:48:56'),
(245, 2, 'Heta', 'test1@gmail.com', '9150042001', NULL, '$2y$10$LX0KBoJFfkiHGOs3j4fjJuIbm5fEeQ9esen8ZT5nNj7zqg04zTS22', NULL, 'Inactive', '1', NULL, NULL, NULL, NULL, 'No', '563035', '2022-05-10 06:31:17', '2022-05-10 06:31:18'),
(246, 2, 'Heta', 'test2@gmail.com', '9150042002', NULL, '$2y$10$aEaSaaos5Yu2AJhtO6DwrOIiGTEvhnxWersTG4pc4etH.Gj1MH5bS', NULL, 'Inactive', '1', NULL, NULL, NULL, NULL, 'No', '356503', '2022-05-10 07:42:12', '2022-05-10 07:42:14'),
(247, 2, 'test', 'test3@gmail.com', '9150042003', NULL, '$2y$10$KZCFjZ2eoiJHnmStoSRqO.ONLsQS6tTlLUdfUvBS1c25tV.X4J8B2', NULL, 'Inactive', '1', NULL, NULL, NULL, NULL, 'No', '843603', '2022-05-10 07:48:26', '2022-05-10 07:48:28'),
(248, 2, 'heta', 'test4@gmail.com', '9150042004', NULL, '$2y$10$IQ3cEnQWiIuT1EbpNpAuxulLNOn5hyFefIgRfKr/RCJwvnsMWkud.', NULL, 'Inactive', '1', NULL, NULL, NULL, NULL, 'Yes', '501335', '2022-05-10 07:52:46', '2022-05-10 07:53:54'),
(250, 2, 'Anok Bopanna', 'anokbopanna7@gmail.com', '9606766900', NULL, '$2y$10$KvN/eDXRpgTwD2Uae/4owOCBfoo6XEpAr0zqaAJl9mkjLTnqiyhja', NULL, 'Active', '2', NULL, NULL, NULL, NULL, 'Yes', '175414', '2022-05-13 23:32:38', '2022-05-13 23:34:22'),
(251, 2, 'Netra', 'deshpande_netra@yahoo.co.in', '9606766800', NULL, '$2y$10$Bh4.R21EthSePUnzZAqGceVAVKLGm5kLsd9x8./1XjbuNcO9RlXxC', NULL, 'Active', 'Kodagu', NULL, NULL, NULL, NULL, 'Yes', '965805', '2022-05-13 23:50:17', '2022-05-14 00:46:19'),
(252, 2, 'Binny belliappa', 'bendhubidara@gmail.com', '9880225525', NULL, '$2y$10$nbUHL6ira2w61UMxSKJgquUY67jTmg7OoqATyREeTEa0bpHs3yPRa', NULL, 'Active', '3', NULL, NULL, NULL, NULL, 'Yes', '685858', '2022-05-14 00:32:19', '2022-05-14 00:34:29'),
(253, 2, 'Darshan Changappa', 'darshanchangappa3@gmail.com', '9480605487', NULL, '$2y$10$aPPfhRKZjFhc5XmohY3bd.eyUQ2tuLN7Hl1/ZrNVFckveaT.lNjy6', NULL, 'Active', '2', NULL, NULL, NULL, NULL, 'Yes', '605018', '2022-05-14 01:11:19', '2022-05-14 01:24:28'),
(255, 2, 'Heta thakkar', 'hetathakkar10@gmail.com', '8347736465', NULL, '$2y$10$E7qkpUp.eWcaq.zwdWO4/ubBk2TSS44F3B8zh9A4vp6am66AtxfBC', NULL, 'Inactive', '1', NULL, NULL, NULL, '646080', 'Yes', '202479', '2022-05-17 01:48:31', '2022-05-17 03:02:15'),
(256, 3, 'Heta', 'hetathakar10@gmail.com', '8347736465', NULL, '$2y$10$7HglStL8ojTK5RS573jFFOqT9TYy5Oawt7iOKMVNO7a8T9LNiVtOW', NULL, 'Active', NULL, NULL, NULL, NULL, '886958', 'Yes', '918278', '2022-05-17 01:54:31', '2022-05-17 03:01:15'),
(257, 3, 'roshan', 'santhoshchangappa9741026935@gmail.com', '9845771938', NULL, '$2y$10$65M1IREVZAhJC77wMczSZuQcLTwgTZDzI8Su.YULHaf1HudQkjzUC', NULL, 'Active', NULL, NULL, NULL, NULL, NULL, 'Yes', '255866', '2022-05-18 03:40:31', '2022-05-18 03:40:48'),
(258, 2, 'sam', 'naani07@gmail.com', '6366330167', NULL, '$2y$10$6vYF3omzl5ivPnZ/NEyaLuKH.adNl3iK8CJAIW0hrEdMUBRAGRQF.', NULL, 'Inactive', '1', NULL, NULL, NULL, NULL, 'Yes', '582075', '2022-05-18 03:42:32', '2022-05-18 03:42:50'),
(259, 2, 'test', 'santhoshkhan099@gmail.com', '9943626293', NULL, '$2y$10$z95EtQlqRJzXG056dr0hReDXlJlJxSRrO3FmsG2mpKsNzuCFfKwkK', NULL, 'Inactive', '1', NULL, NULL, NULL, NULL, 'No', '511536', '2022-05-18 23:22:05', '2022-05-18 23:22:07'),
(260, 2, 'twst', 'santhoshkhan091@gmail.com', '9790459551', NULL, '$2y$10$U2Ciqe2kcE61d6bSfkpLmOQkOWtq0rSwyECyRmV12zTVPUsYJI7gG', NULL, 'Active', 'Bangalore', NULL, NULL, NULL, NULL, 'Yes', '689764', '2022-05-18 23:24:10', '2022-05-19 04:36:53'),
(261, 3, 'Thirupathi', 'thirupathigopidi9@gmail.com', '8897236467', NULL, '$2y$10$e6BCDWnsUgIm2WHvOs8BROrRNv8JJxosSu1eZH.D2Jb968jMfd3pK', NULL, 'Active', NULL, NULL, NULL, NULL, NULL, 'No', '758168', '2022-05-19 06:31:46', '2022-05-19 06:31:47'),
(262, 2, 'Thirupathi', 'thirupathigopidi91@gmail.com', '8897236466', NULL, '$2y$10$9qiJuSQ3FGiMIwj1rZSse.opctkOrIR99tKRyu6BGarUWVZgnknnK', NULL, 'Active', 'Bangalore', NULL, NULL, NULL, NULL, 'Yes', '781248', '2022-05-19 07:05:08', '2022-05-19 23:59:33'),
(263, 2, 'Bhargav C J', 'enterprisesshakthi8@gmail.com', '9019698376', NULL, '$2y$10$4FJBEjWcc8.t/WuV.QvDNelvCjiQkTNPoq8h0L2sY7gRShRNFtNUi', NULL, 'Active', '3', NULL, NULL, NULL, '427311', 'Yes', '238996', '2022-05-25 02:15:17', '2022-05-25 03:59:50'),
(264, 3, 'Mohammed Fayz shafi', 'mfayzshafi@gmail.com', '7338185340', NULL, '$2y$10$ctMlLfRIBqRhfLJi6gztdOpfXQ/zmEiaOvqQ7WtFsNC3erslJNMci', NULL, 'Active', NULL, NULL, NULL, NULL, NULL, 'Yes', '134640', '2022-05-31 23:46:04', '2022-05-31 23:46:47');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seller_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_lists`
--
ALTER TABLE `order_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_rooms`
--
ALTER TABLE `order_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pickupdrop`
--
ALTER TABLE `pickupdrop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sellerservices`
--
ALTER TABLE `sellerservices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=294;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `order_lists`
--
ALTER TABLE `order_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `order_rooms`
--
ALTER TABLE `order_rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pickupdrop`
--
ALTER TABLE `pickupdrop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `sellerservices`
--
ALTER TABLE `sellerservices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=265;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
