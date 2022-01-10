-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 20, 2018 at 10:06 AM
-- Server version: 5.6.38-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `melonetw_sportv2`
--

-- --------------------------------------------------------

--
-- Table structure for table `challenge_frnd`
--

CREATE TABLE `challenge_frnd` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `match_id` varchar(256) NOT NULL,
  `refer_email` varchar(256) NOT NULL,
  `contest_id` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `symbol` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `symbol_format` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `code`, `symbol`, `symbol_format`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Indian Currency', 'INR', '₹', 0, 0, '2018-06-16 10:25:48', '2018-06-16 10:25:48'),
(2, 'US Dollar', 'USR', '$', 0, 0, '2018-06-16 10:26:44', '2018-06-16 10:26:44'),
(3, 'Pound', 'GBP', '£', 1, 0, '2018-06-16 10:27:39', '2018-06-16 10:27:39');

-- --------------------------------------------------------

--
-- Table structure for table `currency_settings`
--

CREATE TABLE `currency_settings` (
  `id` int(11) NOT NULL,
  `currency_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currency_settings`
--

INSERT INTO `currency_settings` (`id`, `currency_id`, `created_at`, `updated_at`) VALUES
(1, 2, '2018-06-17 15:01:03', '2018-06-18 03:31:03');

-- --------------------------------------------------------

--
-- Table structure for table `fantasy_contests`
--

CREATE TABLE `fantasy_contests` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `match_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `type` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `match_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `match_date` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `winning_pirze` int(11) DEFAULT NULL,
  `enterence_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contest_team_length` int(11) DEFAULT NULL,
  `prize_list` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rank_list` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_winner` int(11) DEFAULT NULL,
  `total_amt` int(11) DEFAULT NULL,
  `is_recommended` int(11) DEFAULT NULL,
  `is_multi_entry` int(11) DEFAULT NULL,
  `is_confirm_contest` int(11) DEFAULT NULL,
  `is_practise_contest` int(11) DEFAULT NULL,
  `cd_status` int(11) DEFAULT '0',
  `winner_length_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `is_delete` int(11) DEFAULT NULL,
  `mega_contest` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fantasy_contest_category`
--

CREATE TABLE `fantasy_contest_category` (
  `id` int(11) NOT NULL,
  `contest_category` varchar(200) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `is_active` int(11) NOT NULL,
  `is_delete` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fantasy_enquiry`
--

CREATE TABLE `fantasy_enquiry` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `mobile` varchar(256) NOT NULL,
  `message` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `fantasy_invite_friend`
--

CREATE TABLE `fantasy_invite_friend` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `friend_mail` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fantasy_news`
--

CREATE TABLE `fantasy_news` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `is_active` int(11) DEFAULT NULL,
  `is_delete` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fantasy_pointsystem`
--

CREATE TABLE `fantasy_pointsystem` (
  `id` int(11) NOT NULL,
  `each_run` varchar(200) NOT NULL,
  `each_four` varchar(200) NOT NULL,
  `each_six` varchar(200) NOT NULL,
  `century` varchar(200) NOT NULL,
  `half_century` varchar(200) NOT NULL,
  `per_wicket` varchar(200) NOT NULL,
  `catch` int(11) NOT NULL,
  `caught_bowled` varchar(200) NOT NULL,
  `dismissal_for_duck` varchar(200) NOT NULL,
  `maiden_over` varchar(200) NOT NULL,
  `wickets_4` varchar(200) NOT NULL,
  `wickets_5` varchar(200) NOT NULL,
  `stumping` varchar(200) NOT NULL,
  `run_out` varchar(200) NOT NULL,
  `economy_rate_below_4` varchar(200) NOT NULL,
  `economy_rate_4_5` varchar(200) NOT NULL,
  `economy_rate_5_6` varchar(200) NOT NULL,
  `economy_rate_6_7` varchar(200) NOT NULL,
  `economy_rate_7_9` varchar(200) NOT NULL,
  `economy_rate_above_9` varchar(200) NOT NULL,
  `strike_rate_60_70` varchar(200) NOT NULL,
  `strike_rate_50_60` varchar(200) NOT NULL,
  `strike_rate_below_50` varchar(200) NOT NULL,
  `match_type` varchar(200) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fantasy_pointsystem`
--

INSERT INTO `fantasy_pointsystem` (`id`, `each_run`, `each_four`, `each_six`, `century`, `half_century`, `per_wicket`, `catch`, `caught_bowled`, `dismissal_for_duck`, `maiden_over`, `wickets_4`, `wickets_5`, `stumping`, `run_out`, `economy_rate_below_4`, `economy_rate_4_5`, `economy_rate_5_6`, `economy_rate_6_7`, `economy_rate_7_9`, `economy_rate_above_9`, `strike_rate_60_70`, `strike_rate_50_60`, `strike_rate_below_50`, `match_type`, `created_by`, `updated_by`, `created_at`, `updated_at`, `is_active`) VALUES
(1, '1', '3', '5', '10', '5', '15', 5, '20', '-10', '2', '0', '15', '10', '15', '10', '5', '0', '-5', '-5', '-10', '0', '-5', '0', 'test', 1, 1, '2017-07-05 14:21:06', '2018-11-01 09:20:58', 1),
(2, '10', '3', '5', '10', '5', '15', 5, '20', '-5', '5', '15', '20', '10', '15', '15', '10', '0', '-5', '-10', '-15', '-5', '-10', '-5', 'odi', 1, 1, '2017-07-05 13:54:08', '2018-10-27 06:14:44', 1),
(3, '1', '3', '5', '20', '10', '15', 5, '20', '-5', '10', '20', '25', '10', '15', '20', '15', '5', '0', '-5', '-10', '-10', '-15', '-15', 'T20', 1, 1, '0000-00-00 00:00:00', '2018-10-27 06:13:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fantasy_pointupdate_test`
--

CREATE TABLE `fantasy_pointupdate_test` (
  `id` int(11) NOT NULL,
  `match_id` int(255) NOT NULL,
  `player_id` varchar(255) NOT NULL,
  `batting` varchar(255) DEFAULT NULL,
  `bowling` varchar(255) DEFAULT NULL,
  `fielding` varchar(255) DEFAULT NULL,
  `match_type` varchar(256) DEFAULT NULL,
  `test_innings` varchar(256) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fantasy_team_players`
--

CREATE TABLE `fantasy_team_players` (
  `id` int(11) NOT NULL,
  `match_id` varchar(250) NOT NULL,
  `credit_point` varchar(255) NOT NULL,
  `player_id` varchar(250) NOT NULL,
  `player_name` varchar(250) NOT NULL,
  `player_team_name` varchar(250) NOT NULL,
  `player_role` varchar(250) NOT NULL,
  `test_innings` varchar(256) DEFAULT NULL,
  `match_type` varchar(256) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fantasy_team_selected_players`
--

CREATE TABLE `fantasy_team_selected_players` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `match_id` varchar(250) NOT NULL,
  `player_id` varchar(250) NOT NULL,
  `team_no` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fantasy_upcoming_match`
--

CREATE TABLE `fantasy_upcoming_match` (
  `id` int(11) NOT NULL,
  `upcoming_match` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fantasy_user_bankdetails`
--

CREATE TABLE `fantasy_user_bankdetails` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `otp` varchar(255) NOT NULL,
  `otp_verification_status` int(11) NOT NULL,
  `pan_full_name` varchar(200) DEFAULT NULL,
  `pan_card_no` varchar(200) DEFAULT NULL,
  `date_of_birth` varchar(200) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `pan_card_image` varchar(200) DEFAULT NULL,
  `pancard_verify_status` int(11) DEFAULT NULL,
  `bank_acc_no` varchar(200) DEFAULT NULL,
  `bank_name` varchar(255) NOT NULL,
  `branch_name` varchar(200) DEFAULT NULL,
  `bank_holder_name` varchar(200) DEFAULT NULL,
  `ifsc_code` varchar(200) DEFAULT NULL,
  `bank_verify_status` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fantasy_user_contest_update`
--

CREATE TABLE `fantasy_user_contest_update` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `match_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `contest_id` int(11) NOT NULL,
  `points` varchar(200) NOT NULL,
  `rank` int(11) NOT NULL,
  `joining_date` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fantasy_user_create_team`
--

CREATE TABLE `fantasy_user_create_team` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `match_id` varchar(200) NOT NULL,
  `team_players` varchar(250) NOT NULL,
  `team_players_points` varchar(250) NOT NULL,
  `team_no` varchar(250) NOT NULL,
  `captain` varchar(250) NOT NULL,
  `vice_captain` varchar(250) NOT NULL,
  `replace_player` varchar(255) DEFAULT NULL,
  `substitute` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fantasy_user_credited_amount`
--

CREATE TABLE `fantasy_user_credited_amount` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(250) NOT NULL,
  `pincode` int(11) NOT NULL,
  `state` varchar(250) NOT NULL,
  `mobile` int(11) NOT NULL,
  `payment_method` varchar(250) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fantasy_user_creditpurchase`
--

CREATE TABLE `fantasy_user_creditpurchase` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `credit_point` int(11) NOT NULL,
  `purchase_amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fantasy_user_join_contest`
--

CREATE TABLE `fantasy_user_join_contest` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `match_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `contest_id` int(11) NOT NULL,
  `points` decimal(8,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `joining_date` timestamp NULL DEFAULT NULL,
  `non_confirm_contest` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fantasy_user_payment`
--

CREATE TABLE `fantasy_user_payment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_amount` varchar(200) NOT NULL,
  `payment_method` varchar(200) NOT NULL,
  `bank_name` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_no` varchar(200) NOT NULL,
  `transaction_id` varchar(200) DEFAULT NULL,
  `order_id` varchar(255) DEFAULT NULL,
  `card_number` varchar(200) DEFAULT NULL,
  `payment_status` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fantasy_user_wallet`
--

CREATE TABLE `fantasy_user_wallet` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fantasy_user_winning_details`
--

CREATE TABLE `fantasy_user_winning_details` (
  `id` int(255) NOT NULL,
  `match_id` varchar(255) NOT NULL,
  `contest_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `rank` varchar(255) NOT NULL,
  `amount` decimal(18,2) NOT NULL,
  `tds` varchar(255) DEFAULT NULL,
  `contest_type` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fantasy_user_withdraw`
--

CREATE TABLE `fantasy_user_withdraw` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `withdraw_amount` varchar(200) NOT NULL,
  `withdraw_request_at` text NOT NULL,
  `deposite_status` int(11) DEFAULT NULL,
  `deposited_on` datetime DEFAULT NULL,
  `user_verification_status` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `questions` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `answer` longtext COLLATE utf8_unicode_ci NOT NULL,
  `is_status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `questions`, `answer`, `is_status`, `created_at`, `updated_at`) VALUES
(3, 'What is MeloSports?', 'MeloSports  is the fantasy league which gives you an opportunity to decide and manage teams and also chances to win cash.', 0, '2018-06-04 10:58:09', '2018-06-04 10:58:09'),
(4, 'How do I sign up?', 'Once you are on MeloSports, register by filling out a short form or connect instantly with your Facebook or Google+ account.', 0, '2018-06-04 10:58:21', '2018-06-04 10:58:21'),
(5, 'How do I play on MeloSports?', 'Follow these simple steps to play on MeloSports:\r\n\r\n1 - Register/Log into MeloSports .\r\n\r\n2 - Click on the ‘Create Team’ button for the match you want to join\r\n\r\n3 - Create your team of 11 players (including a Captain & Vice-captain) within an allocated virtual budget of 100 credits from all the players in the match\r\n\r\n4 - Join free or cash contests of your choice. Cash contests let you win cash and require an entry fee, for which we provide multiple payment methods such as Credit Cards, Debit Cards, Net banking .\r\n\r\n5 - Once the live match starts, your team starts earning points based on actual performances of the players selected by you. Final points, ranks and winners are declared after the end of the match.', 0, '2018-06-04 10:58:41', '2018-06-04 10:58:41'),
(6, 'Is selection of substitute compulsory?', 'No! It is not compulsory to select a substitute. But if a substitute is selected, an additional 10 play points is required to register the team. But no points for substitute is charged for playing free contests.', 0, '2018-02-11 20:47:26', '2018-02-11 20:47:26'),
(7, 'How to add money in the wallet?', 'Money can be added to wallet using the secured payment gateway in the website through net banking / credit card / debit card.', 0, '2018-02-11 20:47:59', '2018-02-11 20:47:59'),
(8, 'What is play points?', 'Play points are required to join the cash contests. The money available in the wallet can be converted into play points. Every one rupee can be converted into 10 play points. These play points can be used to join cash contests. But wallet money once converted into play points, cannot be converted back into wallet money. Hence convert only the required money into play points. There is no charge to convert wallet money into play points and no restriction as to number of conversions. Hence convert wisely and only if required.', 0, '2018-02-11 20:48:23', '2018-02-11 20:48:23'),
(9, 'How do I win?', 'Based on the winning amount, the contestants who joined the contests will win depending on the rank they score with the selected players. The actual performance of the selected players will give you points. To know about points, check the Points System section. The top contestants will win as per the contest winning amounts.', 0, '2018-02-11 20:48:52', '2018-02-11 20:48:52'),
(10, 'Where will my winning amount reflect?', 'If the contestant is a winner, the winning amount will get added in the wallet amount.', 0, '2018-02-11 20:49:23', '2018-02-11 20:49:23'),
(11, 'What can I do with the wallet amount?', 'You can either withdraw your wallet amount or convert it into play points to play more contests.', 0, '2018-02-11 20:49:43', '2018-02-11 20:49:43'),
(12, '12', '12', 0, '2018-08-20 05:46:55', '2018-08-20 05:46:55');

-- --------------------------------------------------------

--
-- Table structure for table `frnd_user_join_contest`
--

CREATE TABLE `frnd_user_join_contest` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `match_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `frnd_contest_id` int(11) NOT NULL,
  `points` decimal(8,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `non_confirm_contest` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `series_id` int(11) DEFAULT NULL,
  `unique_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `contest_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contest_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `match_type` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `test_innings` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `is_delete` int(11) DEFAULT NULL,
  `abandon` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `name`, `series_id`, `unique_id`, `category_id`, `contest_type`, `contest_id`, `team_1`, `team_2`, `match_type`, `test_innings`, `date`, `time`, `created_by`, `updated_by`, `deleted_by`, `is_active`, `is_delete`, `abandon`, `created_at`, `updated_at`) VALUES
(1, NULL, 0, '1150547', 24, 'regular', NULL, 'England Women', 'South Africa Women', 'WomensT20I', NULL, '2018-11-16T20:00:00.000Z', NULL, 1, NULL, NULL, 1, 0, 0, '2018-11-16 18:26:59', '2018-11-16 18:26:59');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2017_05_26_094144_create_1495780904_roles_table', 1),
(3, '2017_05_26_094145_create_1495780905_users_table', 1),
(4, '2017_05_26_094359_create_1495781039_contact_companies_table', 1),
(5, '2017_05_26_094400_create_1495781040_contacts_table', 1),
(6, '2017_05_26_094407_create_1495781047_time_projects_table', 1),
(7, '2017_05_26_094407_create_1495781047_time_work_types_table', 1),
(8, '2017_05_26_094408_create_1495781048_time_entries_table', 1),
(9, '2017_05_26_094415_create_1495781055_expense_categories_table', 1),
(10, '2017_05_26_094416_create_1495781056_income_categories_table', 1),
(11, '2017_05_26_094417_create_1495781057_incomes_table', 1),
(12, '2017_05_26_094418_create_1495781058_expenses_table', 1),
(13, '2017_05_26_094422_create_1495781062_faq_categories_table', 1),
(14, '2017_05_26_094424_create_1495781064_faq_questions_table', 1),
(15, '2017_05_26_074720_create_series_table', 2),
(16, '2017_05_27_061740_create_fantasy_contests_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_settings`
--

CREATE TABLE `payment_settings` (
  `id` int(11) NOT NULL,
  `gateway_status` varchar(256) NOT NULL DEFAULT '1',
  `pay_pal_status` varchar(256) DEFAULT '1',
  `pay_pal_credential` varchar(256) DEFAULT NULL,
  `payu_status` varchar(256) DEFAULT '1',
  `payu_test` varchar(256) DEFAULT '1',
  `payu_credential` varchar(256) DEFAULT NULL,
  `instamojo_status` varchar(256) DEFAULT '1',
  `test_instamojo` varchar(256) DEFAULT '1',
  `instamojo_credential` varchar(256) DEFAULT NULL,
  `cric_api_key` varchar(256) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_settings`
--

INSERT INTO `payment_settings` (`id`, `gateway_status`, `pay_pal_status`, `pay_pal_credential`, `payu_status`, `payu_test`, `payu_credential`, `instamojo_status`, `test_instamojo`, `instamojo_credential`, `cric_api_key`, `created_at`, `updated_at`) VALUES
(1, '0', '0', '{\"key\":null}', '0', '1', '{\"merchant\":null,\"secret\":null}', '1', '1', '{\"api_key\":null,\"auth\":null,\"salt\":null}', 'ydTpAbkDdeTeVS4QOnCdnHwVtOy2', '2018-11-15 19:43:56', '2018-11-16 08:13:56');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Administrator (can create other users)', '2017-05-26 01:44:36', '2017-05-26 01:44:36'),
(2, 'Simple user', '2017-05-26 01:44:36', '2017-05-26 01:44:36');

-- --------------------------------------------------------

--
-- Table structure for table `series`
--

CREATE TABLE `series` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `is_delete` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `series`
--

INSERT INTO `series` (`id`, `name`, `created_by`, `updated_by`, `deleted_by`, `is_active`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'Indian', 1, 1, 1, 0, 1, '2017-05-26 04:10:33', '2018-08-17 12:39:24'),
(2, 'champion trophy 2017', 1, 1, 1, 0, 1, '2017-05-26 07:51:15', '2017-11-05 10:09:11'),
(3, 'ind vs asout', 1, 1, 1, 0, 1, '2017-07-04 09:33:36', '2017-11-05 10:09:19');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(11) NOT NULL,
  `site_name` varchar(256) DEFAULT NULL,
  `site_logo` varchar(256) DEFAULT NULL,
  `meta_keyword` varchar(256) DEFAULT NULL,
  `meta_description` longtext,
  `social_links` varchar(256) DEFAULT NULL,
  `website` varchar(256) DEFAULT NULL,
  `address` varchar(256) DEFAULT NULL,
  `city` varchar(256) DEFAULT NULL,
  `zip_code` varchar(256) DEFAULT NULL,
  `country` varchar(256) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `support_email` varchar(255) DEFAULT NULL,
  `phone` varchar(256) DEFAULT NULL,
  `footer_text` longtext,
  `terms_condition` longtext,
  `privacy_policy` longtext,
  `user_pts` varchar(256) DEFAULT NULL,
  `minimum_wallet_amount` int(11) DEFAULT NULL,
  `minimum_play_point` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `site_name`, `site_logo`, `meta_keyword`, `meta_description`, `social_links`, `website`, `address`, `city`, `zip_code`, `country`, `email`, `support_email`, `phone`, `footer_text`, `terms_condition`, `privacy_policy`, `user_pts`, `minimum_wallet_amount`, `minimum_play_point`, `created_at`, `updated_at`) VALUES
(1, 'MELOSPORTS -site', 'logo.png', 'MeloSports Meta Keyword', '<p>MeloSports Meta Description</p>', '{\"fb\":\"https:\\/\\/www.facebook.com\\/yoursite\",\"twi\":\"https:\\/\\/www.Twitter.com\\/yoursite\",\"goog\":\"https:\\/\\/www.Google.com\\/yoursite\",\"you\":\"https:\\/\\/www.youtube.com\\/yoursite\"}', 'www.MeloSports.com', 'sdasfadd', 'city', '500000', 'sfsaffsa', 'contact@yoursite.com', 'noreply@yoursite.com', '000000000', '<p>MeloSports and On Enterprises is in no way affiliated to and doesn&rsquo;t claim any association in any capacity with International Cricket Council (&quot;ICC&quot;) or any national cricket board or team, Board of Control for Cricket in India (&quot;BCCI&quot;), the Indian Premier League (&quot;IPL&quot;) or any IPL franchises, or any other domestic cricket tournament/league, or tournament franchise/team (other than where specifically stated). Dream Sports and Blaze Enterprises acknowledge it is not involved in any betting and doesn&rsquo;t influence any results of matches played. This is pure fantasy league and in no means has any influence on the actual matches played / to be played.</p>\r\n\r\n<p>Residents of the states of Assam, Odisha and Telangana, and where otherwise prohibited by law are not eligible to enter Dream Sports pay-to- play contests</p>', '<p>&nbsp;The Company excludes, to the fullest extent permitted by applicable laws, and save in respect of death or personal injury arising from our negligence, all liability for any claims, losses, demands and damages arising directly or indirectly out of or in any way connected with the use of the Site or their unavailability. This exclusion shall apply in respect of, without limitation, any interruption of services, lost profits, loss of contracts or business opportunity, loss of data, or any other consequential, incidental, special, or punitive damages arising out of the site, even if the Company has been advised of the possibility of such damages, whether arising in contract, tort, under statute or otherwise.</p>', '<p>&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;What personal information do we collect from the people that visit our blog, website or app?</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', '1', 100, 100, '2018-11-15 20:39:53', '2018-11-16 09:09:53');

-- --------------------------------------------------------

--
-- Table structure for table `sms_settings`
--

CREATE TABLE `sms_settings` (
  `id` int(11) NOT NULL,
  `enable_sms` varchar(256) NOT NULL DEFAULT '1',
  `ninems_status` varchar(256) NOT NULL DEFAULT '1',
  `ninems_credentials` varchar(256) DEFAULT NULL,
  `twilio_status` varchar(256) NOT NULL DEFAULT '1',
  `twilio_credentials` varchar(256) DEFAULT NULL,
  `shakthi_status` int(11) NOT NULL DEFAULT '1',
  `shakthi_credential` varchar(256) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms_settings`
--

INSERT INTO `sms_settings` (`id`, `enable_sms`, `ninems_status`, `ninems_credentials`, `twilio_status`, `twilio_credentials`, `shakthi_status`, `shakthi_credential`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '{\"auth\":null,\"s_id\":null}', '1', '{\"s_id\":null,\"token\":null,\"t_no\":null}', 1, NULL, '2018-11-15 19:44:22', '2018-11-16 08:14:22');

-- --------------------------------------------------------

--
-- Table structure for table `social_settings`
--

CREATE TABLE `social_settings` (
  `id` int(11) NOT NULL,
  `fb_status` varchar(256) NOT NULL DEFAULT '1',
  `fb_credential` varchar(256) DEFAULT NULL,
  `gmap_status` varchar(256) NOT NULL DEFAULT '1',
  `gmap_credential` varchar(256) DEFAULT NULL,
  `glogin_status` varchar(256) NOT NULL DEFAULT '1',
  `glogin_credential` varchar(256) DEFAULT NULL,
  `recapcha_status` varchar(256) NOT NULL DEFAULT '1',
  `recapcha_credential` varchar(256) DEFAULT NULL,
  `cric_api_key` varchar(256) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_settings`
--

INSERT INTO `social_settings` (`id`, `fb_status`, `fb_credential`, `gmap_status`, `gmap_credential`, `glogin_status`, `glogin_credential`, `recapcha_status`, `recapcha_credential`, `cric_api_key`, `created_at`, `updated_at`) VALUES
(1, '1', '{\"app\":\"000000000\",\"secret\":\"000000000\"}', '1', '{\"key\":\"000000000\"}', '1', '{\"id\":\"000000000\",\"secret\":\"000000000\"}', '1', '{\"api\":\"000000000\",\"secret\":\"000000000\"}', '000000000', '2018-11-15 19:44:52', '2018-11-16 08:14:52');

-- --------------------------------------------------------

--
-- Table structure for table `supports`
--

CREATE TABLE `supports` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `page_info` longtext NOT NULL,
  `meta_title` varchar(191) NOT NULL,
  `meta_keywords` varchar(191) NOT NULL,
  `meta_description` varchar(191) NOT NULL,
  `how_play` longtext,
  `how_play_link` varchar(256) DEFAULT NULL,
  `created_by` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(191) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supports`
--

INSERT INTO `supports` (`id`, `name`, `page_info`, `meta_title`, `meta_keywords`, `meta_description`, `how_play`, `how_play_link`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'contact_us', 'gdlnosngpsf', 'gfshkhd', 'dagfsg', 'adlbmfl3', '', NULL, '1', '2018-04-05 20:00:29', '1', '2018-04-06 01:29:27'),
(2, 'about_us', '<p>MeloSports a skill game of fantasy cricket, is the domain registered by Blaze Enterprises.</p>\r\n\r\n<p>MeloSports&nbsp; is the first venture by Blaze Enterprises.Our aim is to pioneer the Fantasy sports and diversify ourselves over various sports, creating interest in people to learn about different sports played across the world.</p>\r\n\r\n<p>MeloSports is aimed to provide an opportunity to the skilled people to win over the real matches played.</p>', 'acshjs', 'sjcv3', 'krgvbshy', '<ol>\r\n	<li>\r\n	<p>A team has to be selected from 100 credit points available. Each player will have different credits</p>\r\n	</li>\r\n	<li>\r\n	<p>Select your team with the below number of players &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p>Wicket Keeper, 3 to 5 Batsmen, 1 to 3 All Rounder and 3 to 5 Bowler with a total of 11 players. Various possible combinations are as follows&nbsp;</p>\r\n	</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>', 'https://www.youtube.com/watch?v=yPXAzgwwo0A', '1', '2018-10-23 17:52:45', '1', '2018-10-24 06:22:45');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `is_status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `description`, `is_status`, `created_at`, `updated_at`) VALUES
(1, 'Prasad', 'daknfkadc 5 membere', 1, '2018-01-11 14:40:01', '2018-01-11 20:10:01'),
(2, 'How to play Leaguerocks?', 'First you have registration.......', 1, '2018-01-11 17:27:48', '2018-01-11 22:57:48'),
(3, 'Mersalina211', 'The Premier League was really great for me personally because I won some great amount on MeloSports. The website’s performance is really good and I have never faced any issue playing on MeloSports. Nice experience playing on MeloSports.', 0, '2018-06-04 17:55:04', '2018-06-04 17:55:04'),
(4, 'Ahimsha', 'As I am a cricket lover, playing on MeloSports excites me even more. I have never faced any issue with withdrawal. It has been quite a good experience playing on MeloSports.', 0, '2018-06-04 17:55:26', '2018-06-04 17:55:26'),
(5, 'Riya17', 'Competing with friends is really fun. Withdrawal process is also really fast. I was playing it for the 1st time and it was a really great experience. Love playing on MeloSports!!!', 0, '2018-06-04 17:55:38', '2018-06-04 17:55:38'),
(6, 'Kingrocks18', 'I have been playing on MeloSports now. My experience has been great. I have never faced any issues with withdrawals. It has been a very smooth ride till now!!!', 0, '2018-06-04 17:55:51', '2018-06-04 17:55:51'),
(7, 'Anamika118', 'I love MeloSports because its the best Sports website and I have been enjoying the same from the day I\'ve joined it. Moreover, the transactions, joining leagues are hassle free and I haven\'t faced any issues with it. Also,the interface of the site is very appealing and easy to use.', 0, '2018-06-04 17:56:04', '2018-06-04 17:56:04'),
(8, 'Nakshathira18', 'Awesome!!! The MeloSports website most world best game. Great job all the best for your future .........  Congratulations MeloSports team....', 0, '2018-06-04 17:56:18', '2018-06-04 17:56:18'),
(9, 'Ninika2018', 'Thanks to MeloSports team. Because the world best game website in MeloSports. It will handled easy to well playing....\r\n\r\n\r\nso, I love MeloSports ......', 0, '2018-06-04 17:56:34', '2018-06-04 17:56:34'),
(10, '12', '12', 1, '2018-08-20 12:51:35', '2018-08-20 12:51:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_wallet_current_amount` decimal(18,2) NOT NULL DEFAULT '0.00',
  `credit_point` int(255) NOT NULL,
  `city` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verification_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `admin_type` int(11) DEFAULT NULL,
  `remember_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_login` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `dob`, `mobile_number`, `gender`, `address`, `user_wallet_current_amount`, `credit_point`, `city`, `state`, `pincode`, `country`, `password`, `provider`, `provider_id`, `verification_id`, `status`, `role_id`, `admin_type`, `remember_token`, `password_token`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '', '', '', '0.00', 0, '', '', '', '', '$2y$10$nKNgF0OUHIqT4akvrfjkkudA80qEstaD/TQ9EJ2PsynDGYrlUADae', '', NULL, NULL, 0, 1, NULL, 'cll0DcDhtIqX0itygCGUituf5cqZkhXnEwCqaeE0MIrwDIf9ihS5GncOxtgU', '', '2018-11-16 02:09:30', '2017-05-26 08:44:36', '2018-11-16 09:09:30'),
(2, 'demo', 'demo@demo.com', NULL, '00000', '', '', '0.00', 100, '', '', '', '', '$2y$10$nKNgF0OUHIqT4akvrfjkkudA80qEstaD/TQ9EJ2PsynDGYrlUADae', NULL, NULL, '53892382', 1, 2, NULL, 'mvaHzcxvko1HPDjB1s3QvZENNkTAcgijHUOAXurtSoZ7nuEEF3t7aCjQ9RSf', '', '2018-11-16 15:51:44', '2018-11-16 18:37:56', '2018-11-16 22:51:44');

-- --------------------------------------------------------

--
-- Table structure for table `user_frnd_contests`
--

CREATE TABLE `user_frnd_contests` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `match_id` varchar(256) NOT NULL,
  `frnd_email` longtext NOT NULL,
  `entrance_credit` varchar(256) NOT NULL,
  `user_length` varchar(256) NOT NULL,
  `winner_prize_amt` decimal(20,2) NOT NULL,
  `winner_length_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `winner_lengths`
--

CREATE TABLE `winner_lengths` (
  `id` int(11) NOT NULL,
  `team_length` varchar(256) NOT NULL,
  `position` longtext NOT NULL,
  `rank_amount` longtext NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `winner_lengths`
--

INSERT INTO `winner_lengths` (`id`, `team_length`, `position`, `rank_amount`, `status`, `created_at`, `updated_at`) VALUES
(1, '5', '[\"1\",\"2\",\"3\",\"4\",\"5\"]', '[\"30\",\"20\",\"15\",\"10\",\"5\"]', 0, '2018-09-11 17:14:03', '2018-09-11 17:14:03'),
(2, '3', '[\"1\",\"2\",\"3\"]', '[\"40\",\"20\",\"10\"]', 0, '2018-09-11 17:17:36', '2018-09-11 17:17:36'),
(3, '1', '[\"1\"]', '[\"100\"]', 0, '2018-11-15 19:15:03', '2018-11-16 07:45:03'),
(4, '2', '[\"1\",\"2\"]', '[\"35\",\"15\"]', 0, '2018-09-11 17:18:51', '2018-09-11 17:18:51'),
(5, '4', '[\"1\",\"2\",\"3\",\"4\"]', '[\"35\",\"20\",\"10\",\"5\"]', 0, '2018-09-11 17:20:12', '2018-09-11 17:20:12'),
(6, '6', '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\"]', '[\"18\",\"15\",\"12\",\"9\",\"6\",\"4\"]', 1, '2018-10-06 13:01:45', '2018-10-06 07:31:45');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_playpt`
--

CREATE TABLE `withdraw_playpt` (
  `id` int(11) NOT NULL,
  `user_id` varchar(256) NOT NULL,
  `play_pt` varchar(256) NOT NULL,
  `amount` varchar(256) NOT NULL,
  `status` varchar(256) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `challenge_frnd`
--
ALTER TABLE `challenge_frnd`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `currencies_code_index` (`id`) USING BTREE;

--
-- Indexes for table `currency_settings`
--
ALTER TABLE `currency_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `currency_id` (`currency_id`);

--
-- Indexes for table `fantasy_contests`
--
ALTER TABLE `fantasy_contests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fantasy_contest_category`
--
ALTER TABLE `fantasy_contest_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fantasy_enquiry`
--
ALTER TABLE `fantasy_enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fantasy_invite_friend`
--
ALTER TABLE `fantasy_invite_friend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fantasy_news`
--
ALTER TABLE `fantasy_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fantasy_pointsystem`
--
ALTER TABLE `fantasy_pointsystem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fantasy_pointupdate_test`
--
ALTER TABLE `fantasy_pointupdate_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fantasy_team_players`
--
ALTER TABLE `fantasy_team_players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fantasy_team_selected_players`
--
ALTER TABLE `fantasy_team_selected_players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fantasy_upcoming_match`
--
ALTER TABLE `fantasy_upcoming_match`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fantasy_user_bankdetails`
--
ALTER TABLE `fantasy_user_bankdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fantasy_user_contest_update`
--
ALTER TABLE `fantasy_user_contest_update`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fantasy_user_create_team`
--
ALTER TABLE `fantasy_user_create_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fantasy_user_credited_amount`
--
ALTER TABLE `fantasy_user_credited_amount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fantasy_user_creditpurchase`
--
ALTER TABLE `fantasy_user_creditpurchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fantasy_user_join_contest`
--
ALTER TABLE `fantasy_user_join_contest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fantasy_user_payment`
--
ALTER TABLE `fantasy_user_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fantasy_user_wallet`
--
ALTER TABLE `fantasy_user_wallet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fantasy_user_winning_details`
--
ALTER TABLE `fantasy_user_winning_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fantasy_user_withdraw`
--
ALTER TABLE `fantasy_user_withdraw`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frnd_user_join_contest`
--
ALTER TABLE `frnd_user_join_contest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`),
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_settings`
--
ALTER TABLE `payment_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_settings`
--
ALTER TABLE `sms_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_settings`
--
ALTER TABLE `social_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supports`
--
ALTER TABLE `supports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `40246_5927ce2966dd3` (`role_id`);

--
-- Indexes for table `user_frnd_contests`
--
ALTER TABLE `user_frnd_contests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `winner_lengths`
--
ALTER TABLE `winner_lengths`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw_playpt`
--
ALTER TABLE `withdraw_playpt`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `challenge_frnd`
--
ALTER TABLE `challenge_frnd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `currency_settings`
--
ALTER TABLE `currency_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fantasy_contests`
--
ALTER TABLE `fantasy_contests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fantasy_contest_category`
--
ALTER TABLE `fantasy_contest_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fantasy_enquiry`
--
ALTER TABLE `fantasy_enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fantasy_invite_friend`
--
ALTER TABLE `fantasy_invite_friend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fantasy_news`
--
ALTER TABLE `fantasy_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `fantasy_pointsystem`
--
ALTER TABLE `fantasy_pointsystem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `fantasy_pointupdate_test`
--
ALTER TABLE `fantasy_pointupdate_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fantasy_team_players`
--
ALTER TABLE `fantasy_team_players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fantasy_team_selected_players`
--
ALTER TABLE `fantasy_team_selected_players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fantasy_upcoming_match`
--
ALTER TABLE `fantasy_upcoming_match`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fantasy_user_bankdetails`
--
ALTER TABLE `fantasy_user_bankdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fantasy_user_contest_update`
--
ALTER TABLE `fantasy_user_contest_update`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fantasy_user_create_team`
--
ALTER TABLE `fantasy_user_create_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fantasy_user_credited_amount`
--
ALTER TABLE `fantasy_user_credited_amount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fantasy_user_creditpurchase`
--
ALTER TABLE `fantasy_user_creditpurchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fantasy_user_join_contest`
--
ALTER TABLE `fantasy_user_join_contest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fantasy_user_payment`
--
ALTER TABLE `fantasy_user_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fantasy_user_wallet`
--
ALTER TABLE `fantasy_user_wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fantasy_user_winning_details`
--
ALTER TABLE `fantasy_user_winning_details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `fantasy_user_withdraw`
--
ALTER TABLE `fantasy_user_withdraw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supports`
--
ALTER TABLE `supports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_frnd_contests`
--
ALTER TABLE `user_frnd_contests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `winner_lengths`
--
ALTER TABLE `winner_lengths`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `withdraw_playpt`
--
ALTER TABLE `withdraw_playpt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `challenge_frnd`
--
ALTER TABLE `challenge_frnd`
  ADD CONSTRAINT `challenge_frnd_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `40246_5927ce2966dd3` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
