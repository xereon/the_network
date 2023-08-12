-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 02, 2023 at 10:24 AM
-- Server version: 8.0.33-0ubuntu0.20.04.2
-- PHP Version: 7.4.3-4ubuntu2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sn`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `name`, `msg`, `date`) VALUES
(193, 'ben g', 'hello', '2023-07-01 23:25:22'),
(194, 'Hello', 'World\r\n', '2023-07-01 23:25:44'),
(195, 'Hello', 'World\r\n', '2023-07-01 23:53:24'),
(196, 'cool', 'ok', '2023-07-01 23:53:40'),
(197, 'hello', 'cool', '2023-07-01 23:54:25'),
(198, 'Ben', 'hi', '2023-07-02 00:21:21'),
(199, 'Hello', 'ok', '2023-07-02 00:22:14');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int NOT NULL,
  `post_id` int NOT NULL,
  `user_id` int NOT NULL,
  `comment` text NOT NULL,
  `comment_author` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `user_id`, `comment`, `comment_author`) VALUES
(9, 138, 45, 'sweet!', 'xereon'),
(10, 138, 45, 'sweet!', ''),
(11, 138, 45, 'sweet!', ''),
(12, 138, 45, 'sweet!', ''),
(13, 138, 45, '', ''),
(14, 138, 45, 'cool\r\n', ''),
(15, 138, 45, 'cool\r\n', ''),
(16, 138, 45, 'cool\r\n', '45'),
(17, 138, 45, 'lol', '45'),
(18, 138, 45, 'lol', '45'),
(19, 138, 45, 'lol\r\n', '45'),
(20, 138, 45, 'lol\r\n', '45'),
(21, 138, 45, 'cool', '45'),
(22, 138, 45, 'cool', 'cool'),
(23, 138, 45, 'cool', 'cool'),
(24, 138, 45, 'kldfgjhioshkjn[hiopsaehgpaerjhgiopahgio[ahnfko[hjio[zsdjhiojdri', 'cool'),
(25, 138, 45, 'kldfgjhioshkjn[hiopsaehgpaerjhgiopahgio[ahnfko[hjio[zsdjhiojdri', 'cool'),
(26, 137, 0, 'hello\r\n', 'Adminitrator'),
(27, 137, 0, 'hello\r\n', 'xereon'),
(28, 137, 0, 'hello again', 'xereon'),
(29, 137, 0, 'accending or desc\r\n', 'xereon'),
(30, 137, 0, 'accending or desc\r\n', 'xereon'),
(31, 137, 0, 'ok', 'xereon'),
(32, 137, 0, 'ok', 'xereon'),
(33, 137, 0, 'ok', ''),
(34, 138, 45, 'cool this post should be by xereon\r\n', 'xereon'),
(35, 138, 45, 'Hello this post rocks!!', 'xereon'),
(36, 138, 45, 'Hello this post rocks!!', 'xereon'),
(37, 138, 45, 'Hello this post rocks!!', 'xereon'),
(38, 135, 0, 'hello?', 'xereon'),
(39, 135, 0, 'hello?', 'xereon'),
(40, 134, 0, 'testing\r\n', 'xereon'),
(41, 134, 0, 'testing\r\n', 'xereon'),
(42, 134, 0, 'testing\r\n', 'xereon'),
(43, 134, 0, 'hello?\r\n', 'xereon'),
(44, 134, 0, 'hello?\r\n', 'xereon'),
(45, 17, 39, 'Hi Bob!', 'xereon'),
(46, 17, 39, 'hello2', 'xereon'),
(47, 17, 39, 'Hi Bob!', 'xereon'),
(48, 137, 0, 'hi ok lol', 'xereon'),
(49, 137, 0, 'hi ok lol', 'xereon'),
(50, 141, 44, 'hello\r\n', 'xereon'),
(51, 141, 44, '', 'xereon'),
(52, 141, 44, 'fkn cool', 'xereon'),
(53, 141, 44, 'Pretty cool', 'xereon'),
(54, 141, 44, '', 'xereon'),
(55, 141, 44, '', 'xereon'),
(56, 141, 44, '', 'xereon'),
(57, 140, 44, 'wow', 'xereon'),
(58, 140, 44, 'wow', 'xereon'),
(59, 140, 44, 'cool', 'xereon'),
(60, 140, 44, 'cool', 'xereon'),
(61, 140, 44, '', 'xereon'),
(62, 140, 44, '', 'xereon'),
(63, 142, 44, 'cool', 'xereon'),
(64, 140, 44, '', 'xereon'),
(65, 140, 44, '', 'xereon');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int NOT NULL,
  `user_id` int NOT NULL,
  `topic_id` int NOT NULL,
  `post_title` text NOT NULL,
  `post_content` text NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `topic_id`, `post_title`, `post_content`) VALUES
(1, 39, 0, 'GUMNUTS', 'lol'),
(2, 39, 2, 'GUMNUTS', 'cool'),
(3, 39, 2, 'Cannaboss', 'Leading the world.'),
(4, 39, 0, 'How cool is this!!!', 'This is a new post with some text. It contains some really cool information!'),
(5, 39, 1, 'This is a title of a post.', 'This is the details of the post'),
(6, 39, 3, 'This is a really long post.', 'Vanilla JS Browser Default Java Script.	Tutorial	Demo	Download\r\nCustom Audio Player with Jquery Audio Controls Plugin	Tutorial	Demo	Download\r\nGoogle Charts with Jquery Ajax	Tutorial	Demo	Download\r\nAudio Recording with Custom Audio Player using Jquery and HTML5	Tutorial	Demo	Download\r\nFacebook Style Background Image Upload and Position Adjustment.	Tutorial	Demo	Download\r\nDetect Shake in Phone using Jquery	Tutorial	Demo	Download\r\nCreate a RESTful services using Slim PHP Framework	Tutorial	Demo	Download\r\nGoogle New reCaptcha using PHP - Are you a Robot?	Tutorial	Demo	Download\r\niOS Style Switch Button using CSS3 and Jquery.	Tutorial	Demo	Download\r\nWall Script 7 The Social Network Clone Script.	Tutorial	Demo	Download\r\nFacebook Style Notification Popup using CSS and Jquery.	Tutorial	Demo	Download\r\nAjax Upload and Resize an Image with PHP.	Tutorial	Demo	Download\r\nGoogle Blogger 404 Page Redirection	Tutorial	Demo	\r\nAjax PHP Login Page with Shake Animation Effect.	Tutorial	Demo	Download\r\nTimeline Design using CSS and Jquery	Tutorial	Demo	Download\r\nCSS3 Animation Effects with Keyframes	Tutorial	Demo	Download\r\nWeb PDF Viewer for Monetization.	Tutorial	Demo	Download\r\nTwitter OAuth Status Update using PHP.	Tutorial	Demo	Download\r\nLogin with GitHub OAuth using PHP	Tutorial	Demo	Download\r\nSocial Meta Tags for Google, Twitter and Facebook	Tutorial	Demo	\r\nBlock Uploads of Adult or Nude Images using PHP.	Tutorial	Demo	Download\r\nGetting Started with Redis, Chatting Application	Tutorial	Demo	Download\r\nHtaccess File Tutorial and Tips.	Tutorial	Demo	Download\r\nPHP Email Verification Script.	Tutorial	Demo	Download\r\nCustomizing Google Maps	Tutorial	Demo	Download\r\nAjax Select and Upload Multiple Images with Jquery	Tutorial	Demo	Download\r\nAngularJS Tutorial Two Way Data Binding	Tutorial	Demo	Download\r\nCreate Custom Facebook Application	Tutorial	Demo	\r\nAngularJS Tutorial RESTful JSON Parsing	Tutorial	Demo	Download\r\nMultiple Ajax Image Upload without Refreshing Page using Jquery.	Tutorial	Demo	Download\r\nWall Script 6.0	Tutorial	Demo	Download\r\nJquery Timeago Implementation with PHP.	Tutorial	Demo	Download\r\nFacebook Like System with Jquery, MySQL and PHP.	Tutorial	Demo	Download\r\nFacebook Style Messaging System Database Design.	Tutorial	Demo	\r\nPlay Notification Sound using Jquery.	Tutorial	Demo	Download\r\nHTML5 Template Design for Blog.	Tutorial	Demo	Download\r\nHTML5 Application Cache.	Tutorial	Demo	Download\r\nOauth Login for Linkedin, Facebook, Google and Microsoft	Tutorial	Demo	Download\r\niPhone Application Table View	Tutorial		Download\r\nJSON Input String using JavaScript.	Tutorial	Demo	Download\r\nLogin with Microsoft Live OAuth Connect	Tutorial	Demo	Download\r\nHTML5 Input Types for Mobile.	Tutorial	Demo	Download\r\nMongoDB PHP Tutorial	Tutorial		Download\r\nResponsive Web Design for Menu, Image and Advertisements	Tutorial	Demo	Download\r\nResponsive Web Design using CSS3	Tutorial	Demo	Download\r\nJquery Photo Zoom Plugin	Tutorial	Demo	Download\r\nBackbone.js Router Hashing Tutorial	Tutorial	Demo	Download\r\nAppfog Free Hosting for Beginners.	Tutorial	Demo	\r\nLogin with Facebook and Google.	Tutorial	Demo	Download\r\nLogin with Google Account OAuth	Tutorial	Demo	Download\r\nRESTful Web Services API using Java and MySQL	Tutorial		Download\r\nMultiple File Drag and Drop Upload using HTML5 and Jquery	Tutorial	Demo	Download\r\nJava MySQL JSON Display Records using Jquery.	Tutorial		Download\r\nCreate Animated GIF Banner using Photoshop.	Tutorial	Demo	Download\r\nFacebook Wall Script 5.0	Tutorial	Demo	Download\r\nUpload Files to Amazon S3 using PHP	Tutorial	Demo	Download\r\nJava MySQL Insert Record using Jquery.	Tutorial		Download\r\nECommerce Menu Design with JSON Data.	Tutorial	Demo	Download\r\nSSL Certificate Installation.	Tutorial	Demo	\r\nFacebook Invite Friends API	Tutorial	Demo	Download\r\nGoogle Apps Standard for Free	Tutorial	Demo	\r\nSimple Drop Down Menu with Jquery and CSS	Tutorial	Demo	Download\r\nCreating ZIP File with PHP.	Tutorial	Demo	Download\r\nFacebook Style Dynamic Timeline for Wall Script.	Tutorial	Demo	Download\r\nGravatar Login Box Design with Jquery, CSS and PHP.	Tutorial	Demo	Download\r\nLogin with Instagram OAuth using PHP.	Tutorial	Demo	Download\r\nCreate a RESTful Services API in PHP.	Tutorial		Download\r\nFacebook Style Emotions Jquery Plugin	Tutorial	Demo	Download\r\nBootstrap Registration Form Tutorial.	Tutorial	Demo	Download\r\nFile Upload Progress Bar with Jquery and PHP.	Tutorial	Demo	Download\r\nBootstrap Tutorial for Blog Design.	Tutorial	Demo	Download\r\nAccess Websense Blocked Articles.	Tutorial	Demo	Download\r\nAmazon Simple Email Service SMTP using PHP Mailer.	Tutorial	Demo	Download\r\nMemcached with PHP.	Tutorial	Demo	\r\nThe New 9lessons Labs Application.	Tutorial	Demo	\r\nFacebook Timeline Design using JQuery and CSS.	Tutorial	Demo	Download\r\nCSS3 Logo Design	Tutorial	Demo	Download\r\nJquery AnchorCloud Expanding Link Plugin.	Tutorial	Demo	Download\r\njQuery Mobile Framework Tutorial.	Tutorial	Demo	Download\r\nText Effects using CSS3	Tutorial	Demo	Download\r\nPHP Image and Text Watermark	Tutorial	Demo	Download\r\nLogin with Google Plus OAuth.	Tutorial	Demo	Download\r\ndfhdfghdf\r\n'),
(7, 39, 0, 'That was a really long post.', 'Pretty cool posting system. aye?'),
(8, 39, 0, 'Lets check the posts.', 'Here is another post.'),
(9, 39, 0, 'How cool is this!!!', 'Vanilla JS Browser Default Java Script.	Tutorial	Demo	Download\r\nCustom Audio Player with Jquery Audio Controls Plugin	Tutorial	Demo	Download\r\nGoogle Charts with Jquery Ajax	Tutorial	Demo	Download\r\nAudio Recording with Custom Audio Player using Jquery and HTML5	Tutorial	Demo	Download\r\nFacebook Style Background Image Upload and Position Adjustment.	Tutorial	Demo	Download\r\nDetect Shake in Phone using Jquery	Tutorial	Demo	Download\r\nCreate a RESTful services using Slim PHP Framework	Tutorial	Demo	Download\r\nGoogle New reCaptcha using PHP - Are you a Robot?	Tutorial	Demo	Download\r\niOS Style Switch Button using CSS3 and Jquery.	Tutorial	Demo	Download\r\nWall Script 7 The Social Network Clone Script.	Tutorial	Demo	Download\r\nFacebook Style Notification Popup using CSS and Jquery.	Tutorial	Demo	Download\r\nAjax Upload and Resize an Image with PHP.	Tutorial	Demo	Download\r\nGoogle Blogger 404 Page Redirection	Tutorial	Demo	\r\nAjax PHP Login Page with Shake Animation Effect.	Tutorial	Demo	Download\r\nTimeline Design using CSS and Jquery	Tutorial	Demo	Download\r\nCSS3 Animation Effects with Keyframes	Tutorial	Demo	Download\r\nWeb PDF Viewer for Monetization.	Tutorial	Demo	Download\r\nTwitter OAuth Status Update using PHP.	Tutorial	Demo	Download\r\nLogin with GitHub OAuth using PHP	Tutorial	Demo	Download\r\nSocial Meta Tags for Google, Twitter and Facebook	Tutorial	Demo	\r\nBlock Uploads of Adult or Nude Images using PHP.	Tutorial	Demo	'),
(10, 39, 0, 'This is a really long post.', 'Vanilla JS Browser Default Java Script.	Tutorial	Demo	Download\r\nCustom Audio Player with Jquery Audio Controls Plugin	Tutorial	Demo	Download\r\nGoogle Charts with Jquery Ajax	Tutorial	Demo	Download\r\nAudio Recording with Custom Audio Player using Jquery and HTML5	Tutorial	Demo	Download\r\nFacebook Style Background Image Upload and Position Adjustment.	Tutorial	Demo	Download\r\nDetect Shake in Phone using Jquery	Tutorial	Demo	Download\r\nCreate a RESTful services using Slim PHP Framework	Tutorial	Demo	Download\r\nGoogle New reCaptcha using PHP - Are you a Robot?	Tutorial	Demo	Download\r\niOS Style Switch Button using CSS3 and Jquery.	Tutorial	Demo	Download\r\nWall Script 7 The Social Network Clone Script.	Tutorial	Demo	Download\r\nFacebook Style Notification Popup using CSS and Jquery.	Tutorial	Demo	Download\r\nAjax Upload and Resize an Image with PHP.	Tutorial	Demo	Download\r\nGoogle Blogger 404 Page Redirection	Tutorial	Demo	\r\nAjax PHP Login Page with Shake Animation Effect.	Tutorial	Demo	Download\r\nTimeline Design using CSS and Jquery	Tutorial	Demo	Download\r\nCSS3 Animation Effects with Keyframes	Tutorial	Demo	Download\r\nWeb PDF Viewer for Monetization.	Tutorial	Demo	Download\r\nTwitter OAuth Status Update using PHP.	Tutorial	Demo	Download\r\nLogin with GitHub OAuth using PHP	Tutorial	Demo	Download\r\nSocial Meta Tags for Google, Twitter and Facebook	Tutorial	Demo	\r\nBlock Uploads of Adult or Nude Images using PHP.	Tutorial	Demo	'),
(11, 39, 0, 'This is a really long post.', 'Vanilla JS Browser Default Java Script.	Tutorial	Demo	Download\r\nCustom Audio Player with Jquery Audio Controls Plugin	Tutorial	Demo	Download\r\nGoogle Charts with Jquery Ajax	Tutorial	Demo	Download\r\nAudio Recording with Custom Audio Player using Jquery and HTML5	Tutorial	Demo	Download\r\nFacebook Style Background Image Upload and Position Adjustment.	Tutorial	Demo	Download\r\nDetect Shake in Phone using Jquery	Tutorial	Demo	Download\r\nCreate a RESTful services using Slim PHP Framework	Tutorial	Demo	Download\r\nGoogle New reCaptcha using PHP - Are you a Robot?	Tutorial	Demo	Download\r\niOS Style Switch Button using CSS3 and Jquery.	Tutorial	Demo	Download\r\nWall Script 7 The Social Network Clone Script.	Tutorial	Demo	Download\r\nFacebook Style Notification Popup using CSS and Jquery.	Tutorial	Demo	Download\r\nAjax Upload and Resize an Image with PHP.	Tutorial	Demo	Download\r\nGoogle Blogger 404 Page Redirection	Tutorial	Demo	\r\nAjax PHP Login Page with Shake Animation Effect.	Tutorial	Demo	Download\r\nTimeline Design using CSS and Jquery	Tutorial	Demo	Download\r\nCSS3 Animation Effects with Keyframes	Tutorial	Demo	Download\r\nWeb PDF Viewer for Monetization.	Tutorial	Demo	Download\r\nTwitter OAuth Status Update using PHP.	Tutorial	Demo	Download\r\nLogin with GitHub OAuth using PHP	Tutorial	Demo	Download\r\nSocial Meta Tags for Google, Twitter and Facebook	Tutorial	Demo	\r\nBlock Uploads of Adult or Nude Images using PHP.	Tutorial	Demo	'),
(12, 39, 0, 'That was a really long post.', 'Vanilla JS Browser Default Java Script.	Tutorial	Demo	Download\r\nCustom Audio Player with Jquery Audio Controls Plugin	Tutorial	Demo	Download\r\nGoogle Charts with Jquery Ajax	Tutorial	Demo	Download\r\nAudio Recording with Custom Audio Player using Jquery and HTML5	Tutorial	Demo	Download\r\nFacebook Style Background Image Upload and Position Adjustment.	Tutorial	Demo	Download\r\nDetect Shake in Phone using Jquery	Tutorial	Demo	Download\r\nCreate a RESTful services using Slim PHP Framework	Tutorial	Demo	Download\r\nGoogle New reCaptcha using PHP - Are you a Robot?	Tutorial	Demo	Download\r\niOS Style Switch Button using CSS3 and Jquery.	Tutorial	Demo	Download\r\nWall Script 7 The Social Network Clone Script.	Tutorial	Demo	Download\r\nFacebook Style Notification Popup using CSS and Jquery.	Tutorial	Demo	Download\r\nAjax Upload and Resize an Image with PHP.	Tutorial	Demo	Download\r\nGoogle Blogger 404 Page Redirection	Tutorial	Demo	\r\nAjax PHP Login Page with Shake Animation Effect.	Tutorial	Demo	Download\r\nTimeline Design using CSS and Jquery	Tutorial	Demo	Download\r\nCSS3 Animation Effects with Keyframes	Tutorial	Demo	Download\r\nWeb PDF Viewer for Monetization.	Tutorial	Demo	Download\r\nTwitter OAuth Status Update using PHP.	Tutorial	Demo	Download\r\nLogin with GitHub OAuth using PHP	Tutorial	Demo	Download\r\nSocial Meta Tags for Google, Twitter and Facebook	Tutorial	Demo	\r\nBlock Uploads of Adult or Nude Images using PHP.	Tutorial	Demo	'),
(13, 39, 0, 'That was a really long post.', 'Vanilla JS Browser Default Java Script.	Tutorial	Demo	Download\r\nCustom Audio Player with Jquery Audio Controls Plugin	Tutorial	Demo	Download\r\nGoogle Charts with Jquery Ajax	Tutorial	Demo	Download\r\nAudio Recording with Custom Audio Player using Jquery and HTML5	Tutorial	Demo	Download\r\nFacebook Style Background Image Upload and Position Adjustment.	Tutorial	Demo	Download\r\nDetect Shake in Phone using Jquery	Tutorial	Demo	Download\r\nCreate a RESTful services using Slim PHP Framework	Tutorial	Demo	Download\r\nGoogle New reCaptcha using PHP - Are you a Robot?	Tutorial	Demo	Download\r\niOS Style Switch Button using CSS3 and Jquery.	Tutorial	Demo	Download\r\nWall Script 7 The Social Network Clone Script.	Tutorial	Demo	Download\r\nFacebook Style Notification Popup using CSS and Jquery.	Tutorial	Demo	Download\r\nAjax Upload and Resize an Image with PHP.	Tutorial	Demo	Download\r\nGoogle Blogger 404 Page Redirection	Tutorial	Demo	\r\nAjax PHP Login Page with Shake Animation Effect.	Tutorial	Demo	Download\r\nTimeline Design using CSS and Jquery	Tutorial	Demo	Download\r\nCSS3 Animation Effects with Keyframes	Tutorial	Demo	Download\r\nWeb PDF Viewer for Monetization.	Tutorial	Demo	Download\r\nTwitter OAuth Status Update using PHP.	Tutorial	Demo	Download\r\nLogin with GitHub OAuth using PHP	Tutorial	Demo	Download\r\nSocial Meta Tags for Google, Twitter and Facebook	Tutorial	Demo	\r\nBlock Uploads of Adult or Nude Images using PHP.	Tutorial	Demo	'),
(14, 39, 0, 'How cool is this!!!', 'Vanilla JS Browser Default Java Script.	Tutorial	Demo	Download\r\nCustom Audio Player with Jquery Audio Controls Plugin	Tutorial	Demo	Download\r\nGoogle Charts with Jquery Ajax	Tutorial	Demo	Download\r\nAudio Recording with Custom Audio Player using Jquery and HTML5	Tutorial	Demo	Download\r\nFacebook Style Background Image Upload and Position Adjustment.	Tutorial	Demo	Download\r\nDetect Shake in Phone using Jquery	Tutorial	Demo	Download\r\nCreate a RESTful services using Slim PHP Framework	Tutorial	Demo	Download\r\nGoogle New reCaptcha using PHP - Are you a Robot?	Tutorial	Demo	Download\r\niOS Style Switch Button using CSS3 and Jquery.	Tutorial	Demo	Download\r\nWall Script 7 The Social Network Clone Script.	Tutorial	Demo	Download\r\nFacebook Style Notification Popup using CSS and Jquery.	Tutorial	Demo	Download\r\nAjax Upload and Resize an Image with PHP.	Tutorial	Demo	Download\r\nGoogle Blogger 404 Page Redirection	Tutorial	Demo	\r\nAjax PHP Login Page with Shake Animation Effect.	Tutorial	Demo	Download\r\nTimeline Design using CSS and Jquery	Tutorial	Demo	Download\r\nCSS3 Animation Effects with Keyframes	Tutorial	Demo	Download\r\nWeb PDF Viewer for Monetization.	Tutorial	Demo	Download\r\nTwitter OAuth Status Update using PHP.	Tutorial	Demo	Download\r\nLogin with GitHub OAuth using PHP	Tutorial	Demo	Download\r\nSocial Meta Tags for Google, Twitter and Facebook	Tutorial	Demo	\r\nBlock Uploads of Adult or Nude Images using PHP.	Tutorial	Demo	'),
(15, 39, 0, 'Lets check the posts.', 'rthVanilla JS Browser Default Java Script.	Tutorial	Demo	Download\r\nCustom Audio Player with Jquery Audio Controls Plugin	Tutorial	Demo	Download\r\nGoogle Charts with Jquery Ajax	Tutorial	Demo	Download\r\nAudio Recording with Custom Audio Player using Jquery and HTML5	Tutorial	Demo	Download\r\nFacebook Style Background Image Upload and Position Adjustment.	Tutorial	Demo	Download\r\nDetect Shake in Phone using Jquery	Tutorial	Demo	Download\r\nCreate a RESTful services using Slim PHP Framework	Tutorial	Demo	Download\r\nGoogle New reCaptcha using PHP - Are you a Robot?	Tutorial	Demo	Download\r\niOS Style Switch Button using CSS3 and Jquery.	Tutorial	Demo	Download\r\nWall Script 7 The Social Network Clone Script.	Tutorial	Demo	Download\r\nFacebook Style Notification Popup using CSS and Jquery.	Tutorial	Demo	Download\r\nAjax Upload and Resize an Image with PHP.	Tutorial	Demo	Download\r\nGoogle Blogger 404 Page Redirection	Tutorial	Demo	\r\nAjax PHP Login Page with Shake Animation Effect.	Tutorial	Demo	Download\r\nTimeline Design using CSS and Jquery	Tutorial	Demo	Download\r\nCSS3 Animation Effects with Keyframes	Tutorial	Demo	Download\r\nWeb PDF Viewer for Monetization.	Tutorial	Demo	Download\r\nTwitter OAuth Status Update using PHP.	Tutorial	Demo	Download\r\nLogin with GitHub OAuth using PHP	Tutorial	Demo	Download\r\nSocial Meta Tags for Google, Twitter and Facebook	Tutorial	Demo	\r\nBlock Uploads of Adult or Nude Images using PHP.	Tutorial	Demo	'),
(16, 39, 0, 'This is a really long post.', 'Vanilla JS Browser Default Java Script.	Tutorial	Demo	Download\r\nCustom Audio Player with Jquery Audio Controls Plugin	Tutorial	Demo	Download\r\nGoogle Charts with Jquery Ajax	Tutorial	Demo	Download\r\nAudio Recording with Custom Audio Player using Jquery and HTML5	Tutorial	Demo	Download\r\nFacebook Style Background Image Upload and Position Adjustment.	Tutorial	Demo	Download\r\nDetect Shake in Phone using Jquery	Tutorial	Demo	Download\r\nCreate a RESTful services using Slim PHP Framework	Tutorial	Demo	Download\r\nGoogle New reCaptcha using PHP - Are you a Robot?	Tutorial	Demo	Download\r\niOS Style Switch Button using CSS3 and Jquery.	Tutorial	Demo	Download\r\nWall Script 7 The Social Network Clone Script.	Tutorial	Demo	Download\r\nFacebook Style Notification Popup using CSS and Jquery.	Tutorial	Demo	Download\r\nAjax Upload and Resize an Image with PHP.	Tutorial	Demo	Download\r\nGoogle Blogger 404 Page Redirection	Tutorial	Demo	\r\nAjax PHP Login Page with Shake Animation Effect.	Tutorial	Demo	Download\r\nTimeline Design using CSS and Jquery	Tutorial	Demo	Download\r\nCSS3 Animation Effects with Keyframes	Tutorial	Demo	Download\r\nWeb PDF Viewer for Monetization.	Tutorial	Demo	Download\r\nTwitter OAuth Status Update using PHP.	Tutorial	Demo	Download\r\nLogin with GitHub OAuth using PHP	Tutorial	Demo	Download\r\nSocial Meta Tags for Google, Twitter and Facebook	Tutorial	Demo	\r\nBlock Uploads of Adult or Nude Images using PHP.	Tutorial	Demo	'),
(17, 39, 0, 'How cool is this!!!', 'Vanilla JS Browser Default Java Script.	Tutorial	Demo	Download\r\nCustom Audio Player with Jquery Audio Controls Plugin	Tutorial	Demo	Download\r\nGoogle Charts with Jquery Ajax	Tutorial	Demo	Download\r\nAudio Recording with Custom Audio Player using Jquery and HTML5	Tutorial	Demo	Download\r\nFacebook Style Background Image Upload and Position Adjustment.	Tutorial	Demo	Download\r\nDetect Shake in Phone using Jquery	Tutorial	Demo	Download\r\nCreate a RESTful services using Slim PHP Framework	Tutorial	Demo	Download\r\nGoogle New reCaptcha using PHP - Are you a Robot?	Tutorial	Demo	Download\r\niOS Style Switch Button using CSS3 and Jquery.	Tutorial	Demo	Download\r\nWall Script 7 The Social Network Clone Script.	Tutorial	Demo	Download\r\nFacebook Style Notification Popup using CSS and Jquery.	Tutorial	Demo	Download\r\nAjax Upload and Resize an Image with PHP.	Tutorial	Demo	Download\r\nGoogle Blogger 404 Page Redirection	Tutorial	Demo	\r\nAjax PHP Login Page with Shake Animation Effect.	Tutorial	Demo	Download\r\nTimeline Design using CSS and Jquery	Tutorial	Demo	Download\r\nCSS3 Animation Effects with Keyframes	Tutorial	Demo	Download\r\nWeb PDF Viewer for Monetization.	Tutorial	Demo	Download\r\nTwitter OAuth Status Update using PHP.	Tutorial	Demo	Download\r\nLogin with GitHub OAuth using PHP	Tutorial	Demo	Download\r\nSocial Meta Tags for Google, Twitter and Facebook	Tutorial	Demo	\r\nBlock Uploads of Adult or Nude Images using PHP.	Tutorial	Demo	'),
(18, 39, 2, 'That was a really long post.', 'Vanilla JS Browser Default Java Script.	Tutorial	Demo	Download\r\nCustom Audio Player with Jquery Audio Controls Plugin	Tutorial	Demo	Download\r\nGoogle Charts with Jquery Ajax	Tutorial	Demo	Download\r\nAudio Recording with Custom Audio Player using Jquery and HTML5	Tutorial	Demo	Download\r\nFacebook Style Background Image Upload and Position Adjustment.	Tutorial	Demo	Download\r\nDetect Shake in Phone using Jquery	Tutorial	Demo	Download\r\nCreate a RESTful services using Slim PHP Framework	Tutorial	Demo	Download\r\nGoogle New reCaptcha using PHP - Are you a Robot?	Tutorial	Demo	Download\r\niOS Style Switch Button using CSS3 and Jquery.	Tutorial	Demo	Download\r\nWall Script 7 The Social Network Clone Script.	Tutorial	Demo	Download\r\nFacebook Style Notification Popup using CSS and Jquery.	Tutorial	Demo	Download\r\nAjax Upload and Resize an Image with PHP.	Tutorial	Demo	Download\r\nGoogle Blogger 404 Page Redirection	Tutorial	Demo	\r\nAjax PHP Login Page with Shake Animation Effect.	Tutorial	Demo	Download\r\nTimeline Design using CSS and Jquery	Tutorial	Demo	Download\r\nCSS3 Animation Effects with Keyframes	Tutorial	Demo	Download\r\nWeb PDF Viewer for Monetization.	Tutorial	Demo	Download\r\nTwitter OAuth Status Update using PHP.	Tutorial	Demo	Download\r\nLogin with GitHub OAuth using PHP	Tutorial	Demo	Download\r\nSocial Meta Tags for Google, Twitter and Facebook	Tutorial	Demo	\r\nBlock Uploads of Adult or Nude Images using PHP.	Tutorial	Demo	'),
(19, 39, 3, 'Lets check the posts.', 'Vanilla JS Browser Default Java Script.	Tutorial	Demo	Download\r\nCustom Audio Player with Jquery Audio Controls Plugin	Tutorial	Demo	Download\r\nGoogle Charts with Jquery Ajax	Tutorial	Demo	Download\r\nAudio Recording with Custom Audio Player using Jquery and HTML5	Tutorial	Demo	Download\r\nFacebook Style Background Image Upload and Position Adjustment.	Tutorial	Demo	Download\r\nDetect Shake in Phone using Jquery	Tutorial	Demo	Download\r\nCreate a RESTful services using Slim PHP Framework	Tutorial	Demo	Download\r\nGoogle New reCaptcha using PHP - Are you a Robot?	Tutorial	Demo	Download\r\niOS Style Switch Button using CSS3 and Jquery.	Tutorial	Demo	Download\r\nWall Script 7 The Social Network Clone Script.	Tutorial	Demo	Download\r\nFacebook Style Notification Popup using CSS and Jquery.	Tutorial	Demo	Download\r\nAjax Upload and Resize an Image with PHP.	Tutorial	Demo	Download\r\nGoogle Blogger 404 Page Redirection	Tutorial	Demo	\r\nAjax PHP Login Page with Shake Animation Effect.	Tutorial	Demo	Download\r\nTimeline Design using CSS and Jquery	Tutorial	Demo	Download\r\nCSS3 Animation Effects with Keyframes	Tutorial	Demo	Download\r\nWeb PDF Viewer for Monetization.	Tutorial	Demo	Download\r\nTwitter OAuth Status Update using PHP.	Tutorial	Demo	Download\r\nLogin with GitHub OAuth using PHP	Tutorial	Demo	Download\r\nSocial Meta Tags for Google, Twitter and Facebook	Tutorial	Demo	\r\nBlock Uploads of Adult or Nude Images using PHP.	Tutorial	Demo	'),
(20, 39, 1, 'That was a really long post.', 'Vanilla JS Browser Default Java Script.	Tutorial	Demo	Download\r\nCustom Audio Player with Jquery Audio Controls Plugin	Tutorial	Demo	Download\r\nGoogle Charts with Jquery Ajax	Tutorial	Demo	Download\r\nAudio Recording with Custom Audio Player using Jquery and HTML5	Tutorial	Demo	Download\r\nFacebook Style Background Image Upload and Position Adjustment.	Tutorial	Demo	Download\r\nDetect Shake in Phone using Jquery	Tutorial	Demo	Download\r\nCreate a RESTful services using Slim PHP Framework	Tutorial	Demo	Download\r\nGoogle New reCaptcha using PHP - Are you a Robot?	Tutorial	Demo	Download\r\niOS Style Switch Button using CSS3 and Jquery.	Tutorial	Demo	Download\r\nWall Script 7 The Social Network Clone Script.	Tutorial	Demo	Download\r\nFacebook Style Notification Popup using CSS and Jquery.	Tutorial	Demo	Download\r\nAjax Upload and Resize an Image with PHP.	Tutorial	Demo	Download\r\nGoogle Blogger 404 Page Redirection	Tutorial	Demo	\r\nAjax PHP Login Page with Shake Animation Effect.	Tutorial	Demo	Download\r\nTimeline Design using CSS and Jquery	Tutorial	Demo	Download\r\nCSS3 Animation Effects with Keyframes	Tutorial	Demo	Download\r\nWeb PDF Viewer for Monetization.	Tutorial	Demo	Download\r\nTwitter OAuth Status Update using PHP.	Tutorial	Demo	Download\r\nLogin with GitHub OAuth using PHP	Tutorial	Demo	Download\r\nSocial Meta Tags for Google, Twitter and Facebook	Tutorial	Demo	\r\nBlock Uploads of Adult or Nude Images using PHP.	Tutorial	Demo	'),
(21, 39, 2, 'This is a really long post.', 'Vanilla JS Browser Default Java Script.	Tutorial	Demo	Download\r\nCustom Audio Player with Jquery Audio Controls Plugin	Tutorial	Demo	Download\r\nGoogle Charts with Jquery Ajax	Tutorial	Demo	Download\r\nAudio Recording with Custom Audio Player using Jquery and HTML5	Tutorial	Demo	Download\r\nFacebook Style Background Image Upload and Position Adjustment.	Tutorial	Demo	Download\r\nDetect Shake in Phone using Jquery	Tutorial	Demo	Download\r\nCreate a RESTful services using Slim PHP Framework	Tutorial	Demo	Download\r\nGoogle New reCaptcha using PHP - Are you a Robot?	Tutorial	Demo	Download\r\niOS Style Switch Button using CSS3 and Jquery.	Tutorial	Demo	Download\r\nWall Script 7 The Social Network Clone Script.	Tutorial	Demo	Download\r\nFacebook Style Notification Popup using CSS and Jquery.	Tutorial	Demo	Download\r\nAjax Upload and Resize an Image with PHP.	Tutorial	Demo	Download\r\nGoogle Blogger 404 Page Redirection	Tutorial	Demo	\r\nAjax PHP Login Page with Shake Animation Effect.	Tutorial	Demo	Download\r\nTimeline Design using CSS and Jquery	Tutorial	Demo	Download\r\nCSS3 Animation Effects with Keyframes	Tutorial	Demo	Download\r\nWeb PDF Viewer for Monetization.	Tutorial	Demo	Download\r\nTwitter OAuth Status Update using PHP.	Tutorial	Demo	Download\r\nLogin with GitHub OAuth using PHP	Tutorial	Demo	Download\r\nSocial Meta Tags for Google, Twitter and Facebook	Tutorial	Demo	\r\nBlock Uploads of Adult or Nude Images using PHP.	Tutorial	Demo	'),
(22, 39, 3, 'This is a title of a post.', 'Vanilla JS Browser Default Java Script.	Tutorial	Demo	Download\r\nCustom Audio Player with Jquery Audio Controls Plugin	Tutorial	Demo	Download\r\nGoogle Charts with Jquery Ajax	Tutorial	Demo	Download\r\nAudio Recording with Custom Audio Player using Jquery and HTML5	Tutorial	Demo	Download\r\nFacebook Style Background Image Upload and Position Adjustment.	Tutorial	Demo	Download\r\nDetect Shake in Phone using Jquery	Tutorial	Demo	Download\r\nCreate a RESTful services using Slim PHP Framework	Tutorial	Demo	Download\r\nGoogle New reCaptcha using PHP - Are you a Robot?	Tutorial	Demo	Download\r\niOS Style Switch Button using CSS3 and Jquery.	Tutorial	Demo	Download\r\nWall Script 7 The Social Network Clone Script.	Tutorial	Demo	Download\r\nFacebook Style Notification Popup using CSS and Jquery.	Tutorial	Demo	Download\r\nAjax Upload and Resize an Image with PHP.	Tutorial	Demo	Download\r\nGoogle Blogger 404 Page Redirection	Tutorial	Demo	\r\nAjax PHP Login Page with Shake Animation Effect.	Tutorial	Demo	Download\r\nTimeline Design using CSS and Jquery	Tutorial	Demo	Download\r\nCSS3 Animation Effects with Keyframes	Tutorial	Demo	Download\r\nWeb PDF Viewer for Monetization.	Tutorial	Demo	Download\r\nTwitter OAuth Status Update using PHP.	Tutorial	Demo	Download\r\nLogin with GitHub OAuth using PHP	Tutorial	Demo	Download\r\nSocial Meta Tags for Google, Twitter and Facebook	Tutorial	Demo	\r\nBlock Uploads of Adult or Nude Images using PHP.	Tutorial	Demo	'),
(23, 39, 4, 'Lets check the posts.', 'Vanilla JS Browser Default Java Script.	Tutorial	Demo	Download\r\nCustom Audio Player with Jquery Audio Controls Plugin	Tutorial	Demo	Download\r\nGoogle Charts with Jquery Ajax	Tutorial	Demo	Download\r\nAudio Recording with Custom Audio Player using Jquery and HTML5	Tutorial	Demo	Download\r\nFacebook Style Background Image Upload and Position Adjustment.	Tutorial	Demo	Download\r\nDetect Shake in Phone using Jquery	Tutorial	Demo	Download\r\nCreate a RESTful services using Slim PHP Framework	Tutorial	Demo	Download\r\nGoogle New reCaptcha using PHP - Are you a Robot?	Tutorial	Demo	Download\r\niOS Style Switch Button using CSS3 and Jquery.	Tutorial	Demo	Download\r\nWall Script 7 The Social Network Clone Script.	Tutorial	Demo	Download\r\nFacebook Style Notification Popup using CSS and Jquery.	Tutorial	Demo	Download\r\nAjax Upload and Resize an Image with PHP.	Tutorial	Demo	Download\r\nGoogle Blogger 404 Page Redirection	Tutorial	Demo	\r\nAjax PHP Login Page with Shake Animation Effect.	Tutorial	Demo	Download\r\nTimeline Design using CSS and Jquery	Tutorial	Demo	Download\r\nCSS3 Animation Effects with Keyframes	Tutorial	Demo	Download\r\nWeb PDF Viewer for Monetization.	Tutorial	Demo	Download\r\nTwitter OAuth Status Update using PHP.	Tutorial	Demo	Download\r\nLogin with GitHub OAuth using PHP	Tutorial	Demo	Download\r\nSocial Meta Tags for Google, Twitter and Facebook	Tutorial	Demo	\r\nBlock Uploads of Adult or Nude Images using PHP.	Tutorial	Demo	'),
(24, 39, 3, 'Lets check the posts.', 'Vanilla JS Browser Default Java Script.	Tutorial	Demo	Download\r\nCustom Audio Player with Jquery Audio Controls Plugin	Tutorial	Demo	Download\r\nGoogle Charts with Jquery Ajax	Tutorial	Demo	Download\r\nAudio Recording with Custom Audio Player using Jquery and HTML5	Tutorial	Demo	Download\r\nFacebook Style Background Image Upload and Position Adjustment.	Tutorial	Demo	Download\r\nDetect Shake in Phone using Jquery	Tutorial	Demo	Download\r\nCreate a RESTful services using Slim PHP Framework	Tutorial	Demo	Download\r\nGoogle New reCaptcha using PHP - Are you a Robot?	Tutorial	Demo	Download\r\niOS Style Switch Button using CSS3 and Jquery.	Tutorial	Demo	Download\r\nWall Script 7 The Social Network Clone Script.	Tutorial	Demo	Download\r\nFacebook Style Notification Popup using CSS and Jquery.	Tutorial	Demo	Download\r\nAjax Upload and Resize an Image with PHP.	Tutorial	Demo	Download\r\nGoogle Blogger 404 Page Redirection	Tutorial	Demo	\r\nAjax PHP Login Page with Shake Animation Effect.	Tutorial	Demo	Download\r\nTimeline Design using CSS and Jquery	Tutorial	Demo	Download\r\nCSS3 Animation Effects with Keyframes	Tutorial	Demo	Download\r\nWeb PDF Viewer for Monetization.	Tutorial	Demo	Download\r\nTwitter OAuth Status Update using PHP.	Tutorial	Demo	Download\r\nLogin with GitHub OAuth using PHP	Tutorial	Demo	Download\r\nSocial Meta Tags for Google, Twitter and Facebook	Tutorial	Demo	\r\nBlock Uploads of Adult or Nude Images using PHP.	Tutorial	Demo	'),
(25, 39, 0, 'cool', 'items_per_group'),
(26, 39, 3, 'Lets check the posts.', 'Vanilla JS Browser Default Java Script.	Tutorial	Demo	Download\r\nCustom Audio Player with Jquery Audio Controls Plugin	Tutorial	Demo	Download\r\nGoogle Charts with Jquery Ajax	Tutorial	Demo	Download\r\nAudio Recording with Custom Audio Player using Jquery and HTML5	Tutorial	Demo	Download\r\nFacebook Style Background Image Upload and Position Adjustment.	Tutorial	Demo	Download\r\nDetect Shake in Phone using Jquery	Tutorial	Demo	Download\r\nCreate a RESTful services using Slim PHP Framework	Tutorial	Demo	Download\r\nGoogle New reCaptcha using PHP - Are you a Robot?	Tutorial	Demo	Download\r\niOS Style Switch Button using CSS3 and Jquery.	Tutorial	Demo	Download\r\nWall Script 7 The Social Network Clone Script.	Tutorial	Demo	Download\r\nFacebook Style Notification Popup using CSS and Jquery.	Tutorial	Demo	Download\r\nAjax Upload and Resize an Image with PHP.	Tutorial	Demo	Download\r\nGoogle Blogger 404 Page Redirection	Tutorial	Demo	\r\nAjax PHP Login Page with Shake Animation Effect.	Tutorial	Demo	Download\r\nTimeline Design using CSS and Jquery	Tutorial	Demo	Download\r\nCSS3 Animation Effects with Keyframes	Tutorial	Demo	Download\r\nWeb PDF Viewer for Monetization.	Tutorial	Demo	Download\r\nTwitter OAuth Status Update using PHP.	Tutorial	Demo	Download\r\nLogin with GitHub OAuth using PHP	Tutorial	Demo	Download\r\nSocial Meta Tags for Google, Twitter and Facebook	Tutorial	Demo	\r\nBlock Uploads of Adult or Nude Images using PHP.	Tutorial	Demo	'),
(27, 39, 3, 'Lets check the posts.', 'Vanilla JS Browser Default Java Script.	Tutorial	Demo	Download\r\nCustom Audio Player with Jquery Audio Controls Plugin	Tutorial	Demo	Download\r\nGoogle Charts with Jquery Ajax	Tutorial	Demo	Download\r\nAudio Recording with Custom Audio Player using Jquery and HTML5	Tutorial	Demo	Download\r\nFacebook Style Background Image Upload and Position Adjustment.	Tutorial	Demo	Download\r\nDetect Shake in Phone using Jquery	Tutorial	Demo	Download\r\nCreate a RESTful services using Slim PHP Framework	Tutorial	Demo	Download\r\nGoogle New reCaptcha using PHP - Are you a Robot?	Tutorial	Demo	Download\r\niOS Style Switch Button using CSS3 and Jquery.	Tutorial	Demo	Download\r\nWall Script 7 The Social Network Clone Script.	Tutorial	Demo	Download\r\nFacebook Style Notification Popup using CSS and Jquery.	Tutorial	Demo	Download\r\nAjax Upload and Resize an Image with PHP.	Tutorial	Demo	Download\r\nGoogle Blogger 404 Page Redirection	Tutorial	Demo	\r\nAjax PHP Login Page with Shake Animation Effect.	Tutorial	Demo	Download\r\nTimeline Design using CSS and Jquery	Tutorial	Demo	Download\r\nCSS3 Animation Effects with Keyframes	Tutorial	Demo	Download\r\nWeb PDF Viewer for Monetization.	Tutorial	Demo	Download\r\nTwitter OAuth Status Update using PHP.	Tutorial	Demo	Download\r\nLogin with GitHub OAuth using PHP	Tutorial	Demo	Download\r\nSocial Meta Tags for Google, Twitter and Facebook	Tutorial	Demo	\r\nBlock Uploads of Adult or Nude Images using PHP.	Tutorial	Demo	'),
(28, 39, 3, 'Lets check the posts.', 'Vanilla JS Browser Default Java Script.	Tutorial	Demo	Download\r\nCustom Audio Player with Jquery Audio Controls Plugin	Tutorial	Demo	Download\r\nGoogle Charts with Jquery Ajax	Tutorial	Demo	Download\r\nAudio Recording with Custom Audio Player using Jquery and HTML5	Tutorial	Demo	Download\r\nFacebook Style Background Image Upload and Position Adjustment.	Tutorial	Demo	Download\r\nDetect Shake in Phone using Jquery	Tutorial	Demo	Download\r\nCreate a RESTful services using Slim PHP Framework	Tutorial	Demo	Download\r\nGoogle New reCaptcha using PHP - Are you a Robot?	Tutorial	Demo	Download\r\niOS Style Switch Button using CSS3 and Jquery.	Tutorial	Demo	Download\r\nWall Script 7 The Social Network Clone Script.	Tutorial	Demo	Download\r\nFacebook Style Notification Popup using CSS and Jquery.	Tutorial	Demo	Download\r\nAjax Upload and Resize an Image with PHP.	Tutorial	Demo	Download\r\nGoogle Blogger 404 Page Redirection	Tutorial	Demo	\r\nAjax PHP Login Page with Shake Animation Effect.	Tutorial	Demo	Download\r\nTimeline Design using CSS and Jquery	Tutorial	Demo	Download\r\nCSS3 Animation Effects with Keyframes	Tutorial	Demo	Download\r\nWeb PDF Viewer for Monetization.	Tutorial	Demo	Download\r\nTwitter OAuth Status Update using PHP.	Tutorial	Demo	Download\r\nLogin with GitHub OAuth using PHP	Tutorial	Demo	Download\r\nSocial Meta Tags for Google, Twitter and Facebook	Tutorial	Demo	\r\nBlock Uploads of Adult or Nude Images using PHP.	Tutorial	Demo	'),
(29, 39, 3, 'Lets check the posts.', 'Vanilla JS Browser Default Java Script.	Tutorial	Demo	Download\r\nCustom Audio Player with Jquery Audio Controls Plugin	Tutorial	Demo	Download\r\nGoogle Charts with Jquery Ajax	Tutorial	Demo	Download\r\nAudio Recording with Custom Audio Player using Jquery and HTML5	Tutorial	Demo	Download\r\nFacebook Style Background Image Upload and Position Adjustment.	Tutorial	Demo	Download\r\nDetect Shake in Phone using Jquery	Tutorial	Demo	Download\r\nCreate a RESTful services using Slim PHP Framework	Tutorial	Demo	Download\r\nGoogle New reCaptcha using PHP - Are you a Robot?	Tutorial	Demo	Download\r\niOS Style Switch Button using CSS3 and Jquery.	Tutorial	Demo	Download\r\nWall Script 7 The Social Network Clone Script.	Tutorial	Demo	Download\r\nFacebook Style Notification Popup using CSS and Jquery.	Tutorial	Demo	Download\r\nAjax Upload and Resize an Image with PHP.	Tutorial	Demo	Download\r\nGoogle Blogger 404 Page Redirection	Tutorial	Demo	\r\nAjax PHP Login Page with Shake Animation Effect.	Tutorial	Demo	Download\r\nTimeline Design using CSS and Jquery	Tutorial	Demo	Download\r\nCSS3 Animation Effects with Keyframes	Tutorial	Demo	Download\r\nWeb PDF Viewer for Monetization.	Tutorial	Demo	Download\r\nTwitter OAuth Status Update using PHP.	Tutorial	Demo	Download\r\nLogin with GitHub OAuth using PHP	Tutorial	Demo	Download\r\nSocial Meta Tags for Google, Twitter and Facebook	Tutorial	Demo	\r\nBlock Uploads of Adult or Nude Images using PHP.	Tutorial	Demo	'),
(30, 39, 3, 'Lets check the posts.', 'Vanilla JS Browser Default Java Script.	Tutorial	Demo	Download\r\nCustom Audio Player with Jquery Audio Controls Plugin	Tutorial	Demo	Download\r\nGoogle Charts with Jquery Ajax	Tutorial	Demo	Download\r\nAudio Recording with Custom Audio Player using Jquery and HTML5	Tutorial	Demo	Download\r\nFacebook Style Background Image Upload and Position Adjustment.	Tutorial	Demo	Download\r\nDetect Shake in Phone using Jquery	Tutorial	Demo	Download\r\nCreate a RESTful services using Slim PHP Framework	Tutorial	Demo	Download\r\nGoogle New reCaptcha using PHP - Are you a Robot?	Tutorial	Demo	Download\r\niOS Style Switch Button using CSS3 and Jquery.	Tutorial	Demo	Download\r\nWall Script 7 The Social Network Clone Script.	Tutorial	Demo	Download\r\nFacebook Style Notification Popup using CSS and Jquery.	Tutorial	Demo	Download\r\nAjax Upload and Resize an Image with PHP.	Tutorial	Demo	Download\r\nGoogle Blogger 404 Page Redirection	Tutorial	Demo	\r\nAjax PHP Login Page with Shake Animation Effect.	Tutorial	Demo	Download\r\nTimeline Design using CSS and Jquery	Tutorial	Demo	Download\r\nCSS3 Animation Effects with Keyframes	Tutorial	Demo	Download\r\nWeb PDF Viewer for Monetization.	Tutorial	Demo	Download\r\nTwitter OAuth Status Update using PHP.	Tutorial	Demo	Download\r\nLogin with GitHub OAuth using PHP	Tutorial	Demo	Download\r\nSocial Meta Tags for Google, Twitter and Facebook	Tutorial	Demo	\r\nBlock Uploads of Adult or Nude Images using PHP.	Tutorial	Demo	'),
(31, 39, 3, 'Lets check the posts.', 'Vanilla JS Browser Default Java Script.	Tutorial	Demo	Download\r\nCustom Audio Player with Jquery Audio Controls Plugin	Tutorial	Demo	Download\r\nGoogle Charts with Jquery Ajax	Tutorial	Demo	Download\r\nAudio Recording with Custom Audio Player using Jquery and HTML5	Tutorial	Demo	Download\r\nFacebook Style Background Image Upload and Position Adjustment.	Tutorial	Demo	Download\r\nDetect Shake in Phone using Jquery	Tutorial	Demo	Download\r\nCreate a RESTful services using Slim PHP Framework	Tutorial	Demo	Download\r\nGoogle New reCaptcha using PHP - Are you a Robot?	Tutorial	Demo	Download\r\niOS Style Switch Button using CSS3 and Jquery.	Tutorial	Demo	Download\r\nWall Script 7 The Social Network Clone Script.	Tutorial	Demo	Download\r\nFacebook Style Notification Popup using CSS and Jquery.	Tutorial	Demo	Download\r\nAjax Upload and Resize an Image with PHP.	Tutorial	Demo	Download\r\nGoogle Blogger 404 Page Redirection	Tutorial	Demo	\r\nAjax PHP Login Page with Shake Animation Effect.	Tutorial	Demo	Download\r\nTimeline Design using CSS and Jquery	Tutorial	Demo	Download\r\nCSS3 Animation Effects with Keyframes	Tutorial	Demo	Download\r\nWeb PDF Viewer for Monetization.	Tutorial	Demo	Download\r\nTwitter OAuth Status Update using PHP.	Tutorial	Demo	Download\r\nLogin with GitHub OAuth using PHP	Tutorial	Demo	Download\r\nSocial Meta Tags for Google, Twitter and Facebook	Tutorial	Demo	\r\nBlock Uploads of Adult or Nude Images using PHP.	Tutorial	Demo	'),
(32, 39, 3, 'Lets check the posts.', 'Vanilla JS Browser Default Java Script.	Tutorial	Demo	Download\r\nCustom Audio Player with Jquery Audio Controls Plugin	Tutorial	Demo	Download\r\nGoogle Charts with Jquery Ajax	Tutorial	Demo	Download\r\nAudio Recording with Custom Audio Player using Jquery and HTML5	Tutorial	Demo	Download\r\nFacebook Style Background Image Upload and Position Adjustment.	Tutorial	Demo	Download\r\nDetect Shake in Phone using Jquery	Tutorial	Demo	Download\r\nCreate a RESTful services using Slim PHP Framework	Tutorial	Demo	Download\r\nGoogle New reCaptcha using PHP - Are you a Robot?	Tutorial	Demo	Download\r\niOS Style Switch Button using CSS3 and Jquery.	Tutorial	Demo	Download\r\nWall Script 7 The Social Network Clone Script.	Tutorial	Demo	Download\r\nFacebook Style Notification Popup using CSS and Jquery.	Tutorial	Demo	Download\r\nAjax Upload and Resize an Image with PHP.	Tutorial	Demo	Download\r\nGoogle Blogger 404 Page Redirection	Tutorial	Demo	\r\nAjax PHP Login Page with Shake Animation Effect.	Tutorial	Demo	Download\r\nTimeline Design using CSS and Jquery	Tutorial	Demo	Download\r\nCSS3 Animation Effects with Keyframes	Tutorial	Demo	Download\r\nWeb PDF Viewer for Monetization.	Tutorial	Demo	Download\r\nTwitter OAuth Status Update using PHP.	Tutorial	Demo	Download\r\nLogin with GitHub OAuth using PHP	Tutorial	Demo	Download\r\nSocial Meta Tags for Google, Twitter and Facebook	Tutorial	Demo	\r\nBlock Uploads of Adult or Nude Images using PHP.	Tutorial	Demo	'),
(33, 39, 3, 'Lets check the posts.', 'Vanilla JS Browser Default Java Script.	Tutorial	Demo	Download\r\nCustom Audio Player with Jquery Audio Controls Plugin	Tutorial	Demo	Download\r\nGoogle Charts with Jquery Ajax	Tutorial	Demo	Download\r\nAudio Recording with Custom Audio Player using Jquery and HTML5	Tutorial	Demo	Download\r\nFacebook Style Background Image Upload and Position Adjustment.	Tutorial	Demo	Download\r\nDetect Shake in Phone using Jquery	Tutorial	Demo	Download\r\nCreate a RESTful services using Slim PHP Framework	Tutorial	Demo	Download\r\nGoogle New reCaptcha using PHP - Are you a Robot?	Tutorial	Demo	Download\r\niOS Style Switch Button using CSS3 and Jquery.	Tutorial	Demo	Download\r\nWall Script 7 The Social Network Clone Script.	Tutorial	Demo	Download\r\nFacebook Style Notification Popup using CSS and Jquery.	Tutorial	Demo	Download\r\nAjax Upload and Resize an Image with PHP.	Tutorial	Demo	Download\r\nGoogle Blogger 404 Page Redirection	Tutorial	Demo	\r\nAjax PHP Login Page with Shake Animation Effect.	Tutorial	Demo	Download\r\nTimeline Design using CSS and Jquery	Tutorial	Demo	Download\r\nCSS3 Animation Effects with Keyframes	Tutorial	Demo	Download\r\nWeb PDF Viewer for Monetization.	Tutorial	Demo	Download\r\nTwitter OAuth Status Update using PHP.	Tutorial	Demo	Download\r\nLogin with GitHub OAuth using PHP	Tutorial	Demo	Download\r\nSocial Meta Tags for Google, Twitter and Facebook	Tutorial	Demo	\r\nBlock Uploads of Adult or Nude Images using PHP.	Tutorial	Demo	'),
(34, 39, 3, 'Lets check the posts.', 'Vanilla JS Browser Default Java Script.	Tutorial	Demo	Download\r\nCustom Audio Player with Jquery Audio Controls Plugin	Tutorial	Demo	Download\r\nGoogle Charts with Jquery Ajax	Tutorial	Demo	Download\r\nAudio Recording with Custom Audio Player using Jquery and HTML5	Tutorial	Demo	Download\r\nFacebook Style Background Image Upload and Position Adjustment.	Tutorial	Demo	Download\r\nDetect Shake in Phone using Jquery	Tutorial	Demo	Download\r\nCreate a RESTful services using Slim PHP Framework	Tutorial	Demo	Download\r\nGoogle New reCaptcha using PHP - Are you a Robot?	Tutorial	Demo	Download\r\niOS Style Switch Button using CSS3 and Jquery.	Tutorial	Demo	Download\r\nWall Script 7 The Social Network Clone Script.	Tutorial	Demo	Download\r\nFacebook Style Notification Popup using CSS and Jquery.	Tutorial	Demo	Download\r\nAjax Upload and Resize an Image with PHP.	Tutorial	Demo	Download\r\nGoogle Blogger 404 Page Redirection	Tutorial	Demo	\r\nAjax PHP Login Page with Shake Animation Effect.	Tutorial	Demo	Download\r\nTimeline Design using CSS and Jquery	Tutorial	Demo	Download\r\nCSS3 Animation Effects with Keyframes	Tutorial	Demo	Download\r\nWeb PDF Viewer for Monetization.	Tutorial	Demo	Download\r\nTwitter OAuth Status Update using PHP.	Tutorial	Demo	Download\r\nLogin with GitHub OAuth using PHP	Tutorial	Demo	Download\r\nSocial Meta Tags for Google, Twitter and Facebook	Tutorial	Demo	\r\nBlock Uploads of Adult or Nude Images using PHP.	Tutorial	Demo	'),
(35, 39, 3, 'Lets check the posts.', 'Vanilla JS Browser Default Java Script.	Tutorial	Demo	Download\r\nCustom Audio Player with Jquery Audio Controls Plugin	Tutorial	Demo	Download\r\nGoogle Charts with Jquery Ajax	Tutorial	Demo	Download\r\nAudio Recording with Custom Audio Player using Jquery and HTML5	Tutorial	Demo	Download\r\nFacebook Style Background Image Upload and Position Adjustment.	Tutorial	Demo	Download\r\nDetect Shake in Phone using Jquery	Tutorial	Demo	Download\r\nCreate a RESTful services using Slim PHP Framework	Tutorial	Demo	Download\r\nGoogle New reCaptcha using PHP - Are you a Robot?	Tutorial	Demo	Download\r\niOS Style Switch Button using CSS3 and Jquery.	Tutorial	Demo	Download\r\nWall Script 7 The Social Network Clone Script.	Tutorial	Demo	Download\r\nFacebook Style Notification Popup using CSS and Jquery.	Tutorial	Demo	Download\r\nAjax Upload and Resize an Image with PHP.	Tutorial	Demo	Download\r\nGoogle Blogger 404 Page Redirection	Tutorial	Demo	\r\nAjax PHP Login Page with Shake Animation Effect.	Tutorial	Demo	Download\r\nTimeline Design using CSS and Jquery	Tutorial	Demo	Download\r\nCSS3 Animation Effects with Keyframes	Tutorial	Demo	Download\r\nWeb PDF Viewer for Monetization.	Tutorial	Demo	Download\r\nTwitter OAuth Status Update using PHP.	Tutorial	Demo	Download\r\nLogin with GitHub OAuth using PHP	Tutorial	Demo	Download\r\nSocial Meta Tags for Google, Twitter and Facebook	Tutorial	Demo	\r\nBlock Uploads of Adult or Nude Images using PHP.	Tutorial	Demo	'),
(36, 39, 3, 'Lets check the posts.', 'Vanilla JS Browser Default Java Script.	Tutorial	Demo	Download\r\nCustom Audio Player with Jquery Audio Controls Plugin	Tutorial	Demo	Download\r\nGoogle Charts with Jquery Ajax	Tutorial	Demo	Download\r\nAudio Recording with Custom Audio Player using Jquery and HTML5	Tutorial	Demo	Download\r\nFacebook Style Background Image Upload and Position Adjustment.	Tutorial	Demo	Download\r\nDetect Shake in Phone using Jquery	Tutorial	Demo	Download\r\nCreate a RESTful services using Slim PHP Framework	Tutorial	Demo	Download\r\nGoogle New reCaptcha using PHP - Are you a Robot?	Tutorial	Demo	Download\r\niOS Style Switch Button using CSS3 and Jquery.	Tutorial	Demo	Download\r\nWall Script 7 The Social Network Clone Script.	Tutorial	Demo	Download\r\nFacebook Style Notification Popup using CSS and Jquery.	Tutorial	Demo	Download\r\nAjax Upload and Resize an Image with PHP.	Tutorial	Demo	Download\r\nGoogle Blogger 404 Page Redirection	Tutorial	Demo	\r\nAjax PHP Login Page with Shake Animation Effect.	Tutorial	Demo	Download\r\nTimeline Design using CSS and Jquery	Tutorial	Demo	Download\r\nCSS3 Animation Effects with Keyframes	Tutorial	Demo	Download\r\nWeb PDF Viewer for Monetization.	Tutorial	Demo	Download\r\nTwitter OAuth Status Update using PHP.	Tutorial	Demo	Download\r\nLogin with GitHub OAuth using PHP	Tutorial	Demo	Download\r\nSocial Meta Tags for Google, Twitter and Facebook	Tutorial	Demo	\r\nBlock Uploads of Adult or Nude Images using PHP.	Tutorial	Demo	'),
(37, 39, 3, 'Lets check the posts.', 'Vanilla JS Browser Default Java Script.	Tutorial	Demo	Download\r\nCustom Audio Player with Jquery Audio Controls Plugin	Tutorial	Demo	Download\r\nGoogle Charts with Jquery Ajax	Tutorial	Demo	Download\r\nAudio Recording with Custom Audio Player using Jquery and HTML5	Tutorial	Demo	Download\r\nFacebook Style Background Image Upload and Position Adjustment.	Tutorial	Demo	Download\r\nDetect Shake in Phone using Jquery	Tutorial	Demo	Download\r\nCreate a RESTful services using Slim PHP Framework	Tutorial	Demo	Download\r\nGoogle New reCaptcha using PHP - Are you a Robot?	Tutorial	Demo	Download\r\niOS Style Switch Button using CSS3 and Jquery.	Tutorial	Demo	Download\r\nWall Script 7 The Social Network Clone Script.	Tutorial	Demo	Download\r\nFacebook Style Notification Popup using CSS and Jquery.	Tutorial	Demo	Download\r\nAjax Upload and Resize an Image with PHP.	Tutorial	Demo	Download\r\nGoogle Blogger 404 Page Redirection	Tutorial	Demo	\r\nAjax PHP Login Page with Shake Animation Effect.	Tutorial	Demo	Download\r\nTimeline Design using CSS and Jquery	Tutorial	Demo	Download\r\nCSS3 Animation Effects with Keyframes	Tutorial	Demo	Download\r\nWeb PDF Viewer for Monetization.	Tutorial	Demo	Download\r\nTwitter OAuth Status Update using PHP.	Tutorial	Demo	Download\r\nLogin with GitHub OAuth using PHP	Tutorial	Demo	Download\r\nSocial Meta Tags for Google, Twitter and Facebook	Tutorial	Demo	\r\nBlock Uploads of Adult or Nude Images using PHP.	Tutorial	Demo	'),
(38, 39, 2, 'This is a new post Number 38', 'This is post 38'),
(39, 39, 2, 'Lets check the posts.', 'This is a cool post!'),
(40, 39, 2, 'Lets check the posts.', 'This is a cool post!'),
(41, 39, 2, 'Lets check the posts.', 'This is a cool post!'),
(42, 39, 2, 'Lets check the posts.', 'This is a cool post!'),
(43, 39, 2, 'Lets check the posts.', 'This is a cool post!'),
(44, 39, 2, 'Lets check the posts.', 'This is a cool post!'),
(45, 39, 2, 'Lets check the posts.', 'This is a cool post!'),
(46, 39, 0, 'Lets check the posts.', 'ljkhgjhgjlguioguilguiguigigyiguygturftydyuruyfg'),
(47, 39, 0, 'Lets check the posts.', 'ljkhgjhgjlguioguilguiguigigyiguygturftydyuruyfg'),
(48, 39, 0, 'Lets check the posts.', 'ljkhgjhgjlguioguilguiguigigyiguygturftydyuruyfg'),
(49, 39, 0, 'Lets check the posts.', 'ljkhgjhgjlguioguilguiguigigyiguygturftydyuruyfg'),
(51, 42, 0, 'This is a post by admin.', 'This post was made by admin.'),
(52, 42, 0, 'This is a post by admin.', 'This post was made by admin.'),
(53, 42, 0, 'This is a post by admin.', 'This post was made by admin.'),
(54, 42, 0, 'This is a post by admin.', 'This post was made by admin.'),
(55, 42, 0, 'This is a post by admin.', 'This post was made by admin.'),
(56, 42, 0, 'This is a post by admin.', 'This post was made by admin.'),
(57, 42, 0, 'This is a post by admin.', 'This post was made by admin.'),
(58, 42, 0, 'This is a post by admin.', 'This post was made by admin.'),
(59, 42, 0, 'This is a post by admin.', 'This post was made by admin.'),
(60, 42, 0, 'This is a post by admin.', 'This post was made by admin.'),
(61, 42, 0, 'This is a post by admin.', 'This post was made by admin.'),
(62, 42, 0, 'This is a post by admin.', 'This post was made by admin.'),
(63, 42, 0, 'This is a post by admin.', 'This post was made by admin.'),
(64, 42, 0, 'This is a post by admin.', 'This post was made by admin.'),
(65, 42, 0, 'This is a post by admin.', 'This post was made by admin.'),
(66, 42, 0, 'This is a post by admin.', 'This post was made by admin.');
INSERT INTO `posts` (`post_id`, `user_id`, `topic_id`, `post_title`, `post_content`) VALUES
(67, 42, 0, 'This is a post by admin.', 'This post was made by admin.'),
(68, 42, 0, 'This is a post by admin.', 'This post was made by admin.'),
(71, 39, 1, 'This is another post', 'here is the post\r\n'),
(72, 39, 1, 'This is another post', 'here is the post\r\n'),
(73, 39, 1, 'This is another post', 'here is the post\r\n'),
(74, 39, 1, 'This is another post', 'here is the post\r\n'),
(75, 39, 1, 'This is another post', 'here is the post\r\n'),
(79, 39, 1, 'This is another post', 'here is the post\r\n'),
(80, 39, 0, 'How cool is this!!!', '.\\\\+*?[^]($)'),
(81, 39, 0, 'How cool is this!!!', '.\\+*?[^]($)'),
(82, 39, 0, '\\+*?[^]($)', '\\+*?[^]($)'),
(83, 39, 0, '\\+*?[^]($)', '\\+*?[^]($)'),
(84, 39, 0, 'ko thi\'s is \'a test\'\'', 'ko thi\'s is \'a test\'\''),
(85, 39, 0, 'ko thi\'s is \'a test\'\'', 'ko thi\'s is \'a test\'\''),
(88, 39, 0, 'Lets check the posts.', 'hi'),
(89, 39, 0, 'Lets check the posts.', 'hi'),
(91, 39, 0, 'This is a really long post.', 'Hello world!!!'),
(92, 39, 0, 'This is a really long post.', 'Hello world!!!'),
(93, 39, 0, 'This is a title of a post.', 'testing\r\n'),
(94, 39, 0, 'This is a new post!', 'new post.'),
(95, 39, 0, 'This is a really long post.', 'gyktktg.'),
(96, 39, 0, 'This is a really long post.', 'gyktktg.'),
(97, 39, 0, 'Lets check the posts.', 'hello'),
(98, 39, 0, 'Lets check the posts.', 'hello'),
(99, 39, 0, 'Lets check the posts.', 'hello'),
(100, 39, 0, 'Lets check the posts.', 'hello'),
(101, 39, 0, 'Lets check the posts.', '1'),
(102, 39, 0, 'Lets check the posts.', '1'),
(103, 39, 0, 'testing', 'testing'),
(104, 39, 0, 'testing', 'testing'),
(105, 39, 0, 'Lets check the posts.', 'lol\r\n'),
(106, 39, 0, 'Lets check the posts.', 'lol\r\n'),
(124, 0, 0, 'Lets check the posts.', ''),
(125, 0, 0, 'Lets check the posts.', ''),
(126, 0, 0, 'here\'s a link:', 'http://127.0.0.1/social_network/home.php?id=0'),
(127, 0, 0, 'here\'s a link:', 'http://127.0.0.1/social_network/home.php?id=0'),
(128, 0, 0, 'here\'s a link:', 'http://127.0.0.1/social_network/home.php?id=0'),
(129, 0, 0, 'here\'s a link:', 'http://127.0.0.1/social_network/home.php?id=0'),
(130, 0, 0, 'here\'s a link:', 'http://127.0.0.1/social_network/home.php?id=0'),
(131, 0, 0, 'here\'s a link:', 'http://127.0.0.1/social_network/home.php?id=0'),
(132, 0, 0, 'here\'s a link:', 'http://127.0.0.1/social_network/home.php?id=0'),
(133, 0, 0, 'here\'s a link:', 'http://127.0.0.1/social_network/home.php?id=0'),
(134, 0, 0, 'here\'s a link:', 'http://127.0.0.1/social_network/home.php?id=0'),
(135, 0, 0, 'here\'s a link:', 'http://127.0.0.1/social_network/home.php?id=0'),
(136, 0, 0, 'here\'s a link:', 'http://127.0.0.1/social_network/home.php?id=0'),
(137, 0, 0, 'here\'s a link:', 'http://127.0.0.1/social_network/home.php?id=0'),
(138, 45, 0, 'cool', ''),
(139, 44, 1, 'ok', 'wow'),
(140, 44, 1, 'WOW', 'Just fkn wow.'),
(141, 44, 1, 'WOW', 'Just fkn wow.'),
(142, 44, 1, 'cool', 'cool'),
(143, 45, 2, 'ok', 'hello'),
(144, 45, 1, 'ok', ''),
(145, 45, 1, 'ok', 'cool'),
(146, 46, 1, ':)', 'Cool!');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `topic_id` int NOT NULL,
  `topic_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topic_id`, `topic_title`) VALUES
(1, 'HTML'),
(2, 'PHP'),
(3, 'javascript'),
(4, 'OOP');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `user_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `user_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `user_country` varchar(100) NOT NULL,
  `user_gender` varchar(100) NOT NULL,
  `dob_day` varchar(100) NOT NULL,
  `dob_month` varchar(100) NOT NULL,
  `dob_year` varchar(100) NOT NULL,
  `user_image` text NOT NULL,
  `user_register_date` date NOT NULL,
  `user_lastlogin` date NOT NULL,
  `status` text NOT NULL,
  `posts` text NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `user_name`, `user_pass`, `user_email`, `user_country`, `user_gender`, `dob_day`, `dob_month`, `dob_year`, `user_image`, `user_register_date`, `user_lastlogin`, `status`, `posts`) VALUES
(0, 'Ben', 'Gilbey', 'ADMINISTRATOR', '00000000', 'stopdropanroll@gmail.com', 'Australia', 'Male', '0', '', '0000', 'default_user.jpg', '2016-01-17', '2016-01-17', 'unverified', 'yes'),
(39, 'Ben', 'Gilbey', 'bob', '00000000', 'bengilbey@allg.com', 'AUS', 'Male', '31', 'March', '1981', 'default_user.jpg', '2016-01-22', '2016-01-22', 'unverified', 'yes'),
(41, 'bob', 'bill', 'bobbill', '00000000', 'bob@bill.com', 'BHS', 'Male', '31', 'March', '1964', 'default_user.jpg', '2016-01-23', '2016-01-23', 'unverified', 'No'),
(42, 'Ben', 'Gilbey', 'bill', '00000000', 'wdawd@fgh', '- Country -', 'Male', '- Day -', '- Month -', '- Year -', 'default_user.jpg', '2016-01-23', '2016-01-23', 'unverified', 'yes'),
(43, 'blah', 'blah', 'blah', '00000000', 'blah@blah.com', 'AFG', 'Male', '- Day -', 'January', '- Year -', 'default_user.jpg', '2016-01-23', '2016-01-23', 'unverified', 'No'),
(44, 'Ben', 'Gilbey', 'xereon', '00000000', 'ben@localhost.com', 'AUS', 'Male', '31', 'March', '1981', 'default_user.jpg', '2016-01-26', '2016-01-26', 'unverified', 'yes'),
(45, 'cool', 'cool', 'cool', '00000000', 'cool@cool.cool', 'CHL', 'Male', '- Day -', '- Month -', '- Year -', 'default_user.jpg', '2016-01-26', '2016-01-26', 'unverified', 'yes'),
(46, 'hello', 'hello', 'hello', '00000000', 'hello@hello', 'AUS', 'Male', '31', 'March', '1981', 'default_user.jpg', '2023-07-02', '2023-07-02', 'unverified', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
