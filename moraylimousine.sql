-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2023 at 07:27 AM
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
-- Database: `checkdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `vehicle_type_id` bigint(20) UNSIGNED NOT NULL,
  `lat_pck` double NOT NULL,
  `long_pck` double NOT NULL,
  `lat_drop` double DEFAULT NULL,
  `long_drop` double DEFAULT NULL,
  `pick_address` varchar(300) NOT NULL,
  `drop_address` varchar(300) DEFAULT NULL,
  `travel_amount` decimal(8,2) NOT NULL,
  `extra_options_amount` decimal(8,2) DEFAULT NULL,
  `net_amount` decimal(8,2) DEFAULT NULL,
  `payment_status` enum('paid','pending','canceled') NOT NULL DEFAULT 'pending',
  `estimated_distance` double(8,2) DEFAULT NULL,
  `estimated_time` double(8,2) DEFAULT NULL,
  `pick_time` time NOT NULL,
  `pick_date` date NOT NULL,
  `booking_type` enum('distance','time','fixed') NOT NULL,
  `booking_status` enum('pending','approved','disapproved','canceled','completed') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `orderId` varchar(150) DEFAULT NULL,
  `userDetail` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `booking_city` varchar(70) DEFAULT NULL,
  `tax_amount` float DEFAULT NULL,
  `grand_total` decimal(10,0) DEFAULT NULL,
  `partner_payment_status` tinyint(4) DEFAULT 0,
  `flight_no` varchar(250) DEFAULT NULL,
  `sign_board` varchar(250) DEFAULT NULL,
  `reference_code` varchar(250) DEFAULT NULL,
  `book_for_someone` int(11) NOT NULL DEFAULT 0,
  `pending_payment` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `user_id`, `vehicle_type_id`, `lat_pck`, `long_pck`, `lat_drop`, `long_drop`, `pick_address`, `drop_address`, `travel_amount`, `extra_options_amount`, `net_amount`, `payment_status`, `estimated_distance`, `estimated_time`, `pick_time`, `pick_date`, `booking_type`, `booking_status`, `created_at`, `updated_at`, `orderId`, `userDetail`, `booking_city`, `tax_amount`, `grand_total`, `partner_payment_status`, `flight_no`, `sign_board`, `reference_code`, `book_for_someone`, `pending_payment`) VALUES
(45, 295, 3, 50.1138454, 8.6661778, 50.05154269999999, 8.586883499999997, 'Niedenau 60, Frankfurt am Main, Deutschland', 'Flughafen Frankfurt (FRA), Terminal 2, Frankfurt am Main, Deutschland', 66.26, 46.00, 112.26, 'pending', 7.60, 0.28, '03:45:00', '2020-07-08', 'distance', 'disapproved', '2020-07-06 07:31:33', '2021-10-07 06:25:48', NULL, NULL, 'Frankfurt am Main', 9, NULL, 0, 'X34604', NULL, NULL, 0, NULL),
(46, 12, 3, 50.1138454, 8.6661778, 50.05154269999999, 8.586883499999997, 'Niedenau 60, Frankfurt am Main, Deutschland', 'Terminal 2, Frankfurt, Deutschland', 66.26, NULL, NULL, 'pending', 7.60, 0.28, '03:45:00', '2020-07-08', 'distance', 'disapproved', '2020-07-06 13:24:37', '2020-07-06 18:20:12', NULL, NULL, 'Frankfurt am Main', 9, NULL, 0, NULL, NULL, NULL, 0, NULL),
(47, 12, 3, 50.1138454, 8.6661778, 50.05154269999999, 8.586883499999997, 'Niedenau 60, Frankfurt am Main, Deutschland', 'Terminal 2, Frankfurt am Main, Deutschland', 66.26, NULL, NULL, 'pending', 7.60, 0.28, '03:45:00', '2020-07-08', 'distance', 'completed', '2020-07-06 13:49:15', '2021-07-08 08:00:11', NULL, NULL, 'Frankfurt am Main', 9, NULL, 0, NULL, NULL, NULL, 0, NULL),
(48, 12, 2, 50.0379326, 8.5621518, 50.1098974, 8.7018798, 'Frankfurt Airport (FRA), Frankfurt am Main, Deutschland', 'Europäische Zentralbank (EZB), Sonnemannstraße, Frankfurt am Main, Deutschland', 66.84, NULL, NULL, 'pending', 14.80, 0.50, '14:00:00', '2020-07-10', 'distance', 'completed', '2020-07-09 14:30:20', '2021-07-09 08:26:23', NULL, NULL, 'Frankfurt am Main', 8, NULL, 0, NULL, NULL, NULL, 0, NULL),
(49, 12, 2, 49.4039382, 8.6758143, 50.1098974, 8.7018798, 'Heidelberg Hbf, Willy-Brandt-Platz, Heidelberg, Deutschland', 'Europäische Zentralbank (EZB), Sonnemannstraße, Frankfurt am Main, Deutschland', 195.19, NULL, NULL, 'pending', 88.00, 1.14, '14:00:00', '2020-07-10', 'distance', 'disapproved', '2020-07-09 14:34:11', '2021-07-15 05:49:45', NULL, NULL, 'Heidelberg', 24, NULL, 0, NULL, NULL, NULL, 0, NULL),
(50, 12, 2, 50.14381119999999, 8.726460299999998, 50.1105995, 8.664137499999999, 'Wilhelmshöher Straße 134, Frankfurt am Main, Deutschland', 'myLIFT - Die günstige Alternative zum Taxi Frankfurt, Mainzer Landstraße, Frankfurt am Main, Deutschland', 2.28, 0.00, 2.28, 'paid', 4.50, 0.37, '18:50:00', '2020-07-10', 'distance', 'completed', '2020-07-09 14:57:04', '2020-08-07 10:36:03', '1L5576768X060040B', '{\n    \"create_time\": \"2020-07-09T16:58:30Z\",\n    \"update_time\": \"2020-07-09T17:01:00Z\",\n    \"id\": \"1L5576768X060040B\",\n    \"intent\": \"CAPTURE\",\n    \"status\": \"COMPLETED\",\n    \"payer\": {\n        \"email_address\": \"shehryarkhalid@outlook.com\",\n        \"payer_id\": \"Z6SUV97CQZ8FJ\",\n        \"address\": {\n            \"country_code\": \"DE\"\n        },\n        \"name\": {\n            \"given_name\": \"shehryar\",\n            \"surname\": \"khalid\"\n        }\n    },\n    \"purchase_units\": [\n        {\n            \"reference_id\": \"default\",\n            \"soft_descriptor\": \"PAYPAL *MORAY GROUP\",\n            \"amount\": {\n                \"value\": \"2.28\",\n                \"currency_code\": \"EUR\"\n            },\n            \"payee\": {\n                \"email_address\": \"info@moray-group.com\",\n                \"merchant_id\": \"YW7MU8SFWX9SL\"\n            },\n            \"shipping\": {\n                \"name\": {\n                    \"full_name\": \"shehryar khalid\"\n                },\n                \"address\": {\n                    \"address_line_1\": \"wilhelmsh\\u00f6herstr 134\",\n                    \"admin_area_2\": \"frankfurt am main\",\n                    \"postal_code\": \"60389\",\n                    \"country_code\": \"DE\"\n                }\n            },\n            \"payments\": {\n                \"captures\": [\n                    {\n                        \"status\": \"COMPLETED\",\n                        \"id\": \"8U064927S6736782E\",\n                        \"final_capture\": true,\n                        \"create_time\": \"2020-07-09T17:01:00Z\",\n                        \"update_time\": \"2020-07-09T17:01:00Z\",\n                        \"amount\": {\n                            \"value\": \"2.28\",\n                            \"currency_code\": \"EUR\"\n                        },\n                        \"seller_protection\": {\n                            \"status\": \"ELIGIBLE\",\n                            \"dispute_categories\": [\n                                \"ITEM_NOT_RECEIVED\",\n                                \"UNAUTHORIZED_TRANSACTION\"\n                            ]\n                        },\n                        \"links\": [\n                            {\n                                \"href\": \"https:\\/\\/api.paypal.com\\/v2\\/payments\\/captures\\/8U064927S6736782E\",\n                                \"rel\": \"self\",\n                                \"method\": \"GET\",\n                                \"title\": \"GET\"\n                            },\n                            {\n                                \"href\": \"https:\\/\\/api.paypal.com\\/v2\\/payments\\/captures\\/8U064927S6736782E\\/refund\",\n                                \"rel\": \"refund\",\n                                \"method\": \"POST\",\n                                \"title\": \"POST\"\n                            },\n                            {\n                                \"href\": \"https:\\/\\/api.paypal.com\\/v2\\/checkout\\/orders\\/1L5576768X060040B\",\n                                \"rel\": \"up\",\n                                \"method\": \"GET\",\n                                \"title\": \"GET\"\n                            }\n                        ]\n                    }\n                ]\n            }\n        }\n    ],\n    \"links\": [\n        {\n            \"href\": \"https:\\/\\/api.paypal.com\\/v2\\/checkout\\/orders\\/1L5576768X060040B\",\n            \"rel\": \"self\",\n            \"method\": \"GET\",\n            \"title\": \"GET\"\n        }\n    ]\n}', 'Frankfurt am Main', 0, NULL, 0, NULL, NULL, NULL, 0, NULL),
(51, 12, 2, 50.14381119999999, 8.726460299999998, 50.1105995, 8.664137499999999, 'Wilhelmshöher Straße 134, Frankfurt am Main, Deutschland', 'myLIFT - Die günstige Alternative zum Taxi Frankfurt, Mainzer Landstraße, Frankfurt am Main, Deutschland', 2.28, 0.00, 2.28, 'pending', 4.50, 0.37, '18:50:00', '2020-07-10', 'distance', 'completed', '2020-07-09 15:18:10', '2021-07-09 09:05:40', NULL, NULL, 'Frankfurt am Main', 0, NULL, 0, NULL, NULL, NULL, 0, NULL),
(52, 299, 2, 50.098039, 8.679208899999997, 50.1218744, 8.6618164, 'Holbeinstraße 61, Frankfurt am Main, Deutschland', 'Feldbergstraße 35, Frankfurt am Main, Deutschland', 2.28, 0.00, 2.28, 'paid', 3.80, 0.22, '07:15:00', '2020-07-13', 'distance', 'completed', '2020-07-11 11:52:40', '2020-08-07 10:41:33', '4UN54923TF906133Y', '{\n    \"create_time\": \"2020-07-11T13:53:18Z\",\n    \"update_time\": \"2020-07-11T13:53:33Z\",\n    \"id\": \"4UN54923TF906133Y\",\n    \"intent\": \"CAPTURE\",\n    \"status\": \"COMPLETED\",\n    \"payer\": {\n        \"email_address\": \"mradermacher@gmx.de\",\n        \"payer_id\": \"LYUKMDNR9AV8Y\",\n        \"address\": {\n            \"country_code\": \"DE\"\n        },\n        \"name\": {\n            \"prefix\": \"Mr\",\n            \"given_name\": \"Michael\",\n            \"surname\": \"Radermacher\"\n        }\n    },\n    \"purchase_units\": [\n        {\n            \"reference_id\": \"default\",\n            \"soft_descriptor\": \"PAYPAL *MORAY GROUP\",\n            \"amount\": {\n                \"value\": \"2.28\",\n                \"currency_code\": \"EUR\"\n            },\n            \"payee\": {\n                \"email_address\": \"info@moray-group.com\",\n                \"merchant_id\": \"YW7MU8SFWX9SL\"\n            },\n            \"shipping\": {\n                \"name\": {\n                    \"full_name\": \"Timm Michael Radermacher\"\n                },\n                \"address\": {\n                    \"address_line_1\": \"Belfortstra\\u00dfe 13\",\n                    \"admin_area_2\": \"Heidelberg\",\n                    \"postal_code\": \"69115\",\n                    \"country_code\": \"DE\"\n                }\n            },\n            \"payments\": {\n                \"captures\": [\n                    {\n                        \"status\": \"COMPLETED\",\n                        \"id\": \"32817538P7810320H\",\n                        \"final_capture\": true,\n                        \"create_time\": \"2020-07-11T13:53:33Z\",\n                        \"update_time\": \"2020-07-11T13:53:33Z\",\n                        \"amount\": {\n                            \"value\": \"2.28\",\n                            \"currency_code\": \"EUR\"\n                        },\n                        \"seller_protection\": {\n                            \"status\": \"ELIGIBLE\",\n                            \"dispute_categories\": [\n                                \"ITEM_NOT_RECEIVED\",\n                                \"UNAUTHORIZED_TRANSACTION\"\n                            ]\n                        },\n                        \"links\": [\n                            {\n                                \"href\": \"https:\\/\\/api.paypal.com\\/v2\\/payments\\/captures\\/32817538P7810320H\",\n                                \"rel\": \"self\",\n                                \"method\": \"GET\",\n                                \"title\": \"GET\"\n                            },\n                            {\n                                \"href\": \"https:\\/\\/api.paypal.com\\/v2\\/payments\\/captures\\/32817538P7810320H\\/refund\",\n                                \"rel\": \"refund\",\n                                \"method\": \"POST\",\n                                \"title\": \"POST\"\n                            },\n                            {\n                                \"href\": \"https:\\/\\/api.paypal.com\\/v2\\/checkout\\/orders\\/4UN54923TF906133Y\",\n                                \"rel\": \"up\",\n                                \"method\": \"GET\",\n                                \"title\": \"GET\"\n                            }\n                        ]\n                    }\n                ]\n            }\n        }\n    ],\n    \"links\": [\n        {\n            \"href\": \"https:\\/\\/api.paypal.com\\/v2\\/checkout\\/orders\\/4UN54923TF906133Y\",\n            \"rel\": \"self\",\n            \"method\": \"GET\",\n            \"title\": \"GET\"\n        }\n    ]\n}', 'Frankfurt am Main', 0, NULL, 0, NULL, NULL, NULL, 0, NULL),
(53, 81, 2, 50.0379326, 8.5621518, 50.10719109999999, 8.6649714, 'Frankfurt Flughafen (FRA), Frankfurt am Main, Deutschland', 'Am Hauptbahnhof, Frankfurt am Main, Deutschland', 54.62, 0.00, 54.62, 'pending', 13.30, 0.38, '11:35:00', '2020-08-29', 'distance', 'completed', '2020-08-26 20:27:50', '2021-07-09 08:30:25', NULL, NULL, 'Frankfurt am Main', 7, NULL, 0, NULL, NULL, NULL, 0, 100),
(54, 708, 2, 50.12613580000001, 8.450129799999997, 50.12493999999999, 8.67184, 'Waldplateau 86, Kelkheim (Taunus), Deutschland', 'Lessing-Gymnasium, Fürstenbergerstraße, Frankfurt am Main, Deutschland', 54.62, 0.00, 54.62, 'paid', 14.30, 0.32, '07:20:00', '2020-10-26', 'distance', 'completed', '2020-10-25 17:57:48', '2021-07-07 07:14:41', '7DE60036AN854980J', '{\n    \"create_time\": \"2020-10-25T18:58:59Z\",\n    \"update_time\": \"2020-10-25T18:59:22Z\",\n    \"id\": \"7DE60036AN854980J\",\n    \"intent\": \"CAPTURE\",\n    \"status\": \"COMPLETED\",\n    \"payer\": {\n        \"email_address\": \"Marcus.Hermanns@gmx.de\",\n        \"payer_id\": \"P9VUQLJTPK5NA\",\n        \"address\": {\n            \"country_code\": \"DE\"\n        },\n        \"name\": {\n            \"given_name\": \"Marcus\",\n            \"surname\": \"Hermanns\"\n        }\n    },\n    \"purchase_units\": [\n        {\n            \"reference_id\": \"default\",\n            \"amount\": {\n                \"value\": \"54.62\",\n                \"currency_code\": \"EUR\"\n            },\n            \"payee\": {\n                \"email_address\": \"info@moray-group.com\",\n                \"merchant_id\": \"YW7MU8SFWX9SL\"\n            },\n            \"shipping\": {\n                \"name\": {\n                    \"full_name\": \"Marcus Hermanns\"\n                },\n                \"address\": {\n                    \"address_line_1\": \"Waldplateau 86\",\n                    \"admin_area_2\": \"Kelkheim\",\n                    \"admin_area_1\": \"Hessen\",\n                    \"postal_code\": \"65779\",\n                    \"country_code\": \"DE\"\n                }\n            },\n            \"payments\": {\n                \"captures\": [\n                    {\n                        \"status\": \"COMPLETED\",\n                        \"id\": \"6D9008577C8836446\",\n                        \"final_capture\": true,\n                        \"create_time\": \"2020-10-25T18:59:22Z\",\n                        \"update_time\": \"2020-10-25T18:59:22Z\",\n                        \"amount\": {\n                            \"value\": \"54.62\",\n                            \"currency_code\": \"EUR\"\n                        },\n                        \"seller_protection\": {\n                            \"status\": \"ELIGIBLE\",\n                            \"dispute_categories\": [\n                                \"ITEM_NOT_RECEIVED\",\n                                \"UNAUTHORIZED_TRANSACTION\"\n                            ]\n                        },\n                        \"links\": [\n                            {\n                                \"href\": \"https:\\/\\/api.paypal.com\\/v2\\/payments\\/captures\\/6D9008577C8836446\",\n                                \"rel\": \"self\",\n                                \"method\": \"GET\",\n                                \"title\": \"GET\"\n                            },\n                            {\n                                \"href\": \"https:\\/\\/api.paypal.com\\/v2\\/payments\\/captures\\/6D9008577C8836446\\/refund\",\n                                \"rel\": \"refund\",\n                                \"method\": \"POST\",\n                                \"title\": \"POST\"\n                            },\n                            {\n                                \"href\": \"https:\\/\\/api.paypal.com\\/v2\\/checkout\\/orders\\/7DE60036AN854980J\",\n                                \"rel\": \"up\",\n                                \"method\": \"GET\",\n                                \"title\": \"GET\"\n                            }\n                        ]\n                    }\n                ]\n            }\n        }\n    ],\n    \"links\": [\n        {\n            \"href\": \"https:\\/\\/api.paypal.com\\/v2\\/checkout\\/orders\\/7DE60036AN854980J\",\n            \"rel\": \"self\",\n            \"method\": \"GET\",\n            \"title\": \"GET\"\n        }\n    ]\n}', 'Kelkheim (Taunus)', 7, NULL, 0, NULL, NULL, NULL, 0, NULL),
(55, 846, 2, 50.07358, 8.23979, 50.11427, 8.66593, 'Adolfsallee 31, Wiesbaden, Germany', 'Niedenau 45, Frankfurt, Germany', 84.39, 0.00, 84.39, 'paid', 32.20, 0.57, '10:30:00', '2021-02-09', 'distance', 'completed', '2021-02-08 21:04:39', '2021-02-08 21:28:19', '3DR658022A0559832', '{\n    \"create_time\": \"2021-02-08T22:13:58Z\",\n    \"update_time\": \"2021-02-08T22:19:41Z\",\n    \"id\": \"3DR658022A0559832\",\n    \"intent\": \"CAPTURE\",\n    \"status\": \"COMPLETED\",\n    \"payer\": {\n        \"email_address\": \"john@s-d-management.com\",\n        \"payer_id\": \"PBLES53W9GCC4\",\n        \"address\": {\n            \"country_code\": \"DE\"\n        },\n        \"name\": {\n            \"given_name\": \"Stefan\",\n            \"surname\": \"Dabruck\"\n        }\n    },\n    \"purchase_units\": [\n        {\n            \"reference_id\": \"default\",\n            \"soft_descriptor\": \"PAYPAL *MORAY GROUP\",\n            \"amount\": {\n                \"value\": \"84.39\",\n                \"currency_code\": \"EUR\"\n            },\n            \"payee\": {\n                \"email_address\": \"info@moray-group.com\",\n                \"merchant_id\": \"YW7MU8SFWX9SL\"\n            },\n            \"shipping\": {\n                \"name\": {\n                    \"full_name\": \"Stefan Dabruck\"\n                },\n                \"address\": {\n                    \"address_line_1\": \"Niedenau 45\",\n                    \"admin_area_2\": \"Frankfurt am Main\",\n                    \"postal_code\": \"60325\",\n                    \"country_code\": \"DE\"\n                }\n            },\n            \"payments\": {\n                \"captures\": [\n                    {\n                        \"status\": \"COMPLETED\",\n                        \"id\": \"4XF76944E79200327\",\n                        \"final_capture\": true,\n                        \"create_time\": \"2021-02-08T22:19:41Z\",\n                        \"update_time\": \"2021-02-08T22:19:41Z\",\n                        \"amount\": {\n                            \"value\": \"84.39\",\n                            \"currency_code\": \"EUR\"\n                        },\n                        \"seller_protection\": {\n                            \"status\": \"ELIGIBLE\",\n                            \"dispute_categories\": [\n                                \"ITEM_NOT_RECEIVED\",\n                                \"UNAUTHORIZED_TRANSACTION\"\n                            ]\n                        },\n                        \"links\": [\n                            {\n                                \"href\": \"https:\\/\\/api.paypal.com\\/v2\\/payments\\/captures\\/4XF76944E79200327\",\n                                \"rel\": \"self\",\n                                \"method\": \"GET\",\n                                \"title\": \"GET\"\n                            },\n                            {\n                                \"href\": \"https:\\/\\/api.paypal.com\\/v2\\/payments\\/captures\\/4XF76944E79200327\\/refund\",\n                                \"rel\": \"refund\",\n                                \"method\": \"POST\",\n                                \"title\": \"POST\"\n                            },\n                            {\n                                \"href\": \"https:\\/\\/api.paypal.com\\/v2\\/checkout\\/orders\\/3DR658022A0559832\",\n                                \"rel\": \"up\",\n                                \"method\": \"GET\",\n                                \"title\": \"GET\"\n                            }\n                        ]\n                    }\n                ]\n            }\n        }\n    ],\n    \"links\": [\n        {\n            \"href\": \"https:\\/\\/api.paypal.com\\/v2\\/checkout\\/orders\\/3DR658022A0559832\",\n            \"rel\": \"self\",\n            \"method\": \"GET\",\n            \"title\": \"GET\"\n        }\n    ]\n}', 'Wiesbaden', 10, NULL, 0, NULL, NULL, NULL, 0, NULL),
(56, 866, 3, 50.10631009999999, 8.576834999999999, NULL, NULL, 'Nied, Frankfurt am Main, Germany', NULL, 133.13, NULL, NULL, 'pending', 50.00, 2.00, '15:00:00', '2021-05-31', 'time', 'disapproved', '2021-03-03 22:03:40', '2021-07-15 05:49:47', NULL, NULL, 'Frankfurt am Main', 16, NULL, 0, NULL, NULL, NULL, 0, NULL),
(57, 873, 2, 50.1089718, 8.6475936, NULL, NULL, 'Premier Inn Frankfurt Messe hotel, Europa-Allee, Frankfurt, Germany', NULL, 86.57, 0.00, 86.57, 'pending', 25.00, 1.00, '18:05:00', '2021-03-06', 'time', 'completed', '2021-03-06 15:49:05', '2021-07-09 08:37:50', NULL, NULL, 'Frankfurt am Main', 10, NULL, 0, NULL, NULL, NULL, 0, 200),
(58, 945, 4, 50.1113253, 8.7174304, NULL, NULL, '60314 Frankfurt, Germany', NULL, 147.21, 0.00, 147.21, 'pending', 50.00, 2.00, '16:00:00', '2021-04-03', 'time', 'completed', '2021-03-19 15:40:30', '2021-07-09 08:40:35', NULL, NULL, 'Frankfurt am Main', 18, NULL, 0, NULL, NULL, NULL, 0, NULL),
(59, 84, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1052.42, 64.00, 1116.42, 'pending', 540.80, 5.68, '02:10:00', '2021-04-22', 'distance', 'completed', '2021-04-22 08:02:42', '2021-07-09 08:46:32', NULL, NULL, 'Berlin', 128, NULL, 0, NULL, NULL, NULL, 0, NULL),
(60, 84, 2, 50.1109221, 8.6821267, 52.52000659999999, 13.404954, 'Frankfurt, Germany', 'Berlin, Germany', 1057.04, 22.00, 1079.04, 'pending', 543.20, 5.70, '09:35:00', '2021-04-27', 'distance', 'completed', '2021-04-26 04:30:29', '2021-07-09 08:48:43', NULL, NULL, 'Frankfurt am Main', 128, NULL, 0, NULL, NULL, NULL, 0, NULL),
(61, 84, 2, 50.1109221, 8.6821267, 51.165691, 10.451526, 'Frankfurt, Germany', 'Germany', 433.46, 0.00, 433.46, 'pending', 214.00, 2.60, '02:15:00', '2021-04-30', 'distance', 'completed', '2021-04-29 03:10:23', '2021-07-27 03:21:21', NULL, NULL, 'Frankfurt am Main', 53, NULL, 0, NULL, NULL, NULL, 0, 0),
(62, 1167, 4, 50.114418, 8.6871131, 50.3253182, 8.7952783, 'Konstablerwache, Frankfurt, Deutschland', 'Ossenheim, Friedberg (Hessen), Deutschland', 108.30, 0.00, 108.30, 'pending', 28.20, 0.66, '19:00:00', '2021-05-29', 'distance', 'completed', '2021-05-23 10:03:37', '2021-07-27 03:39:16', NULL, NULL, 'Frankfurt am Main', 13, NULL, 0, NULL, NULL, NULL, 0, 0),
(63, 83, 2, 50.1109221, 8.6821267, 49.24015720000001, 6.996932699999999, 'Frankfurt, Deutschland', 'Saarbrücken, Deutschland', 364.71, 0.00, 364.71, 'pending', 177.10, 2.06, '11:05:00', '2021-06-09', 'distance', 'completed', '2021-06-09 07:06:01', '2021-07-27 03:56:11', NULL, NULL, 'Frankfurt am Main', 44, NULL, 0, NULL, NULL, NULL, 0, 20),
(64, 83, 2, 50.1109221, 8.6821267, 49.24015720000001, 6.996932699999999, 'Frankfurt, Deutschland', 'Saarbrücken, Deutschland', 364.71, 0.00, 364.71, 'pending', 177.10, 2.06, '09:00:00', '2021-06-12', 'distance', 'completed', '2021-06-11 09:47:51', '2021-07-27 04:01:13', NULL, NULL, 'Frankfurt am Main', 44, NULL, 0, NULL, NULL, NULL, 0, NULL),
(65, 83, 2, 50.0379326, 8.5621518, 49.24015720000001, 6.996932699999999, 'Flughafen Frankfurt (FRA), Frankfurt, Deutschland', 'Saarbrücken, Deutschland', 344.97, 0.00, 344.97, 'pending', 164.30, 1.83, '10:00:00', '2021-06-16', 'distance', 'completed', '2021-06-15 07:38:06', '2021-07-27 04:03:57', NULL, NULL, 'Frankfurt am Main', 48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(66, 83, 2, 50.1109221, 8.6821267, 52.52000659999999, 13.404954, 'Frankfurt, Deutschland', 'Berlin, Deutschland', 1076.94, 22.00, 1098.94, 'pending', 543.10, 5.71, '12:05:00', '2021-06-16', 'distance', 'completed', '2021-06-15 12:07:59', '2021-07-27 04:18:19', NULL, NULL, 'Frankfurt am Main', 148, NULL, 0, NULL, NULL, NULL, 0, NULL),
(67, 12, 2, 50.1109221, 8.6821267, 49.24015720000001, 6.996932699999999, 'Frankfurt, Deutschland', 'Saarbrücken, Deutschland', 371.67, 0.00, 371.67, 'pending', 177.10, 2.06, '12:00:00', '2021-06-17', 'distance', 'completed', '2021-06-16 10:33:05', '2021-07-27 04:43:03', NULL, NULL, 'Frankfurt am Main', 51, NULL, 0, NULL, NULL, NULL, 0, NULL),
(68, 1249, 5, 50.0379326, 8.5621518, 50.1109221, 8.6821267, 'Frankfurt Airport (FRA), Frankfurt, Germany', '60528 Frankfurt, Germany', 85.76, NULL, NULL, 'pending', 11.40, 0.35, '17:05:00', '2021-06-30', 'distance', 'completed', '2021-06-20 12:41:04', '2021-07-28 12:46:08', NULL, NULL, 'Frankfurt am Main', 12, NULL, 0, NULL, NULL, NULL, 0, 10),
(69, 1251, 2, 51.5073509, -0.1277583, 52.5590838, 13.349771, 'London, UK', 'Bristolstraße, Berlin, Germany', 2156.06, NULL, NULL, 'pending', 1.00, 12.10, '15:30:00', '2021-06-27', 'distance', 'approved', '2021-06-23 06:31:57', '2021-07-28 13:00:31', NULL, NULL, NULL, 297, NULL, 0, NULL, NULL, NULL, 0, NULL),
(70, 1258, 2, 48.1492918, 11.607824, 50.1203378, 8.6565337, 'Pixisstraße 2A, München, Deutschland', 'KfW Bankengruppe, Palmengartenstraße, Frankfurt am Main, Deutschland', 789.15, 0.00, 789.15, 'pending', 395.60, 4.23, '13:30:00', '2021-06-25', 'distance', 'approved', '2021-06-23 07:06:29', '2021-07-28 13:01:26', NULL, NULL, 'München', 109, NULL, 0, NULL, NULL, NULL, 0, NULL),
(71, 81, 2, 50.0379326, 8.5621518, 50.1105995, 8.664137499999999, 'Frankfurt Airport (FRA) (FRA), Frankfurt am Main, Deutschland', 'QABBY, Mainzer Landstraße, Frankfurt am Main, Deutschland', 55.66, 0.00, 55.66, 'pending', 10.30, 0.28, '13:30:00', '2021-06-27', 'distance', 'approved', '2021-06-27 09:53:20', '2021-07-29 06:29:26', NULL, NULL, 'Frankfurt am Main', 8, NULL, 0, NULL, NULL, NULL, 0, NULL),
(72, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, 0.00, 1065.75, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 06:25:10', '2021-06-28 07:47:00', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(73, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 07:52:28', '2021-06-28 07:52:28', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(74, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 07:52:32', '2021-06-28 07:52:32', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(75, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'completed', '2021-06-28 07:52:35', '2021-07-27 04:09:37', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, 0),
(76, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 07:53:13', '2021-06-28 07:53:13', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(77, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 07:54:08', '2021-06-28 07:54:08', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(78, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, 0.00, 1065.75, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 07:55:19', '2021-06-28 07:57:10', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(79, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:02:50', '2021-06-28 08:02:50', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(80, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:02:53', '2021-06-28 08:02:53', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(81, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:03:45', '2021-06-28 08:03:45', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(82, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:04:13', '2021-06-28 08:04:13', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(83, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:04:37', '2021-06-28 08:04:37', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(84, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:06:51', '2021-06-28 08:06:51', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(85, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:07:16', '2021-06-28 08:07:16', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(86, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:07:19', '2021-06-28 08:07:19', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(87, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:08:31', '2021-06-28 08:08:31', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(88, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:10:03', '2021-06-28 08:10:03', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(89, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:10:34', '2021-06-28 08:10:34', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(90, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:10:34', '2021-06-28 08:10:34', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(91, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:10:35', '2021-06-28 08:10:35', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(92, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:10:35', '2021-06-28 08:10:35', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(93, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:10:35', '2021-06-28 08:10:35', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(94, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:10:35', '2021-06-28 08:10:35', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(95, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:10:35', '2021-06-28 08:10:35', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(96, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:10:36', '2021-06-28 08:10:36', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(97, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, 0.00, 1065.75, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:10:36', '2021-06-28 08:10:52', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(98, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:11:24', '2021-06-28 08:11:24', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(99, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:11:25', '2021-06-28 08:11:25', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(100, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:11:25', '2021-06-28 08:11:25', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(101, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, 0.00, 1065.75, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:11:25', '2021-06-28 08:12:43', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(102, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:19:59', '2021-06-28 08:19:59', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(103, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, 0.00, 1065.75, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:21:02', '2021-06-28 08:21:27', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(104, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, 0.00, 1065.75, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:22:35', '2021-06-28 08:23:14', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(105, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:24:05', '2021-06-28 08:24:05', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(106, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, 0.00, 1065.75, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:25:10', '2021-06-28 08:25:41', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(107, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:25:55', '2021-06-28 08:25:55', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(108, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:25:55', '2021-06-28 08:25:55', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(109, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:25:55', '2021-06-28 08:25:55', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(110, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:25:55', '2021-06-28 08:25:55', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(111, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:25:56', '2021-06-28 08:25:56', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(112, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:25:56', '2021-06-28 08:25:56', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(113, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:25:56', '2021-06-28 08:25:56', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(114, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:25:56', '2021-06-28 08:25:56', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(115, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, 0.00, 1065.75, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:25:56', '2021-06-28 08:26:15', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(116, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:26:19', '2021-06-28 08:26:19', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(117, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, 0.00, 1065.75, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:26:19', '2021-06-28 08:27:19', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(118, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:27:30', '2021-06-28 08:27:30', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(119, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:27:41', '2021-06-28 08:27:41', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(120, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:27:41', '2021-06-28 08:27:41', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(121, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:27:41', '2021-06-28 08:27:41', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(122, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:27:42', '2021-06-28 08:27:42', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(123, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:27:42', '2021-06-28 08:27:42', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(124, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:27:42', '2021-06-28 08:27:42', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(125, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:27:42', '2021-06-28 08:27:42', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(126, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:27:42', '2021-06-28 08:27:42', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(127, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:27:43', '2021-06-28 08:27:43', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(128, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, 0.00, 1065.75, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:27:43', '2021-06-28 08:28:20', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(129, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:30:32', '2021-06-28 08:30:32', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(130, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:33:05', '2021-06-28 08:33:05', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(131, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:34:00', '2021-06-28 08:34:00', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(132, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:35:22', '2021-06-28 08:35:22', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(133, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:35:22', '2021-06-28 08:35:22', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(134, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:35:22', '2021-06-28 08:35:22', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(135, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:35:22', '2021-06-28 08:35:22', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(136, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:35:22', '2021-06-28 08:35:22', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(137, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:35:23', '2021-06-28 08:35:23', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(138, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:35:23', '2021-06-28 08:35:23', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(139, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:35:23', '2021-06-28 08:35:23', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(140, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:35:23', '2021-06-28 08:35:23', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(141, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:35:23', '2021-06-28 08:35:23', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(142, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:35:23', '2021-06-28 08:35:23', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(143, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:35:23', '2021-06-28 08:35:23', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(144, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, 0.00, 1065.75, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:35:24', '2021-06-28 08:35:38', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(145, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:36:08', '2021-06-28 08:36:08', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(146, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:36:09', '2021-06-28 08:36:09', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(147, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:36:09', '2021-06-28 08:36:09', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(148, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, 0.00, 1065.75, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:36:09', '2021-06-28 08:36:23', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(149, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:40:00', '2021-06-28 08:40:00', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(150, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:40:21', '2021-06-28 08:40:21', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(151, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:41:23', '2021-06-28 08:41:23', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL);
INSERT INTO `booking` (`id`, `user_id`, `vehicle_type_id`, `lat_pck`, `long_pck`, `lat_drop`, `long_drop`, `pick_address`, `drop_address`, `travel_amount`, `extra_options_amount`, `net_amount`, `payment_status`, `estimated_distance`, `estimated_time`, `pick_time`, `pick_date`, `booking_type`, `booking_status`, `created_at`, `updated_at`, `orderId`, `userDetail`, `booking_city`, `tax_amount`, `grand_total`, `partner_payment_status`, `flight_no`, `sign_board`, `reference_code`, `book_for_someone`, `pending_payment`) VALUES
(152, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:42:10', '2021-06-28 08:42:10', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(153, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:42:10', '2021-06-28 08:42:10', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(154, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:42:10', '2021-06-28 08:42:10', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(155, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:42:10', '2021-06-28 08:42:10', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(156, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:43:10', '2021-06-28 08:43:10', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(157, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:45:49', '2021-06-28 08:45:49', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(158, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:46:56', '2021-06-28 08:46:56', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(159, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:48:20', '2021-06-28 08:48:20', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(160, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:48:58', '2021-06-28 08:48:58', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(161, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:49:01', '2021-06-28 08:49:01', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(162, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:49:49', '2021-06-28 08:49:49', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(163, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:50:01', '2021-06-28 08:50:01', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(164, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:51:07', '2021-06-28 08:51:07', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(165, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:51:39', '2021-06-28 08:51:39', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(166, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:55:18', '2021-06-28 08:55:18', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(167, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 08:55:48', '2021-06-28 08:55:48', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(168, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 09:00:19', '2021-06-28 09:00:19', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(169, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, NULL, NULL, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 09:06:20', '2021-06-28 09:06:20', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(170, 12, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Germany', 'Frankfurt, Germany', 1065.75, 0.00, 1065.75, 'pending', 537.40, 5.74, '14:30:00', '2021-06-29', 'distance', 'pending', '2021-06-28 09:07:22', '2021-06-28 10:14:16', NULL, NULL, 'Berlin', 147, NULL, 0, NULL, NULL, NULL, 0, NULL),
(171, 81, 2, 50.11675590000001, 8.677302899999997, 50.0379326, 8.5621518, 'Hilton Frankfurt City Centre, Hochstraße, Frankfurt, Deutschland', 'Frankfurt Airport (FRA) (FRA), Frankfurt am Main, Deutschland', 55.66, NULL, NULL, 'pending', 15.60, 0.36, '17:00:00', '2021-06-29', 'distance', 'pending', '2021-06-28 15:13:34', '2021-06-28 15:13:34', NULL, NULL, 'Frankfurt am Main', 8, NULL, 0, NULL, NULL, NULL, 0, NULL),
(172, 81, 2, 50.11675590000001, 8.677302899999997, 50.0379326, 8.5621518, 'Hilton Frankfurt City Centre, Hochstraße, Frankfurt, Deutschland', 'Frankfurt Airport (FRA) (FRA), Frankfurt am Main, Deutschland', 55.66, NULL, NULL, 'pending', 15.60, 0.36, '17:00:00', '2021-06-29', 'distance', 'pending', '2021-06-28 15:18:52', '2021-06-28 15:18:52', NULL, NULL, 'Frankfurt am Main', 8, NULL, 0, NULL, NULL, NULL, 0, NULL),
(173, 81, 2, 50.11675590000001, 8.677302899999997, 50.0379326, 8.5621518, 'Hilton Frankfurt City Centre, Hochstraße, Frankfurt, Deutschland', 'Frankfurt Airport (FRA) (FRA), Frankfurt am Main, Deutschland', 55.66, 0.00, 55.66, 'pending', 15.60, 0.36, '19:00:00', '2021-06-29', 'distance', 'pending', '2021-06-28 15:20:25', '2021-06-28 15:32:55', NULL, NULL, 'Frankfurt am Main', 8, NULL, 0, NULL, NULL, NULL, 0, NULL),
(174, 1251, 2, 50.1109221, 8.6821267, 50.0379326, 8.5621518, 'Frankfurt, Germany', 'Frankfurt Airport (FRA) (FRA), Frankfurt, Germany', 55.66, NULL, NULL, 'pending', 10.90, 0.34, '18:30:00', '2021-06-30', 'distance', 'pending', '2021-06-29 05:14:41', '2021-06-29 05:14:41', NULL, NULL, 'Frankfurt am Main', 8, NULL, 0, NULL, NULL, NULL, 0, NULL),
(175, 1251, 2, 50.1109221, 8.6821267, 52.5132996, 13.4795171, 'Frankfurt, Germany', 'Frankfurter Allee, Berlin, Germany', 1100.88, NULL, NULL, 'pending', 555.20, 5.88, '18:50:00', '2021-06-30', 'distance', 'pending', '2021-06-29 05:15:31', '2021-06-29 05:15:31', NULL, NULL, 'Frankfurt am Main', 152, NULL, 0, NULL, NULL, NULL, 0, NULL),
(176, 1251, 2, 50.1109221, 8.6821267, 52.5132996, 13.4795171, 'Frankfurt, Germany', 'Frankfurter Allee, Berlin, Germany', 1100.88, NULL, NULL, 'pending', 555.20, 5.88, '18:50:00', '2021-06-30', 'distance', 'pending', '2021-06-29 05:16:44', '2021-06-29 05:16:44', NULL, NULL, 'Frankfurt am Main', 152, NULL, 0, NULL, NULL, NULL, 0, NULL),
(177, 1251, 2, 50.1109221, 8.6821267, 50.10652899999999, 8.662161800000002, 'Frankfurt, Germany', 'Frankfurt (Main) Hauptbahnhof, Am Hauptbahnhof, Frankfurt, Germany', 55.66, 0.00, 55.66, 'pending', 1.90, 0.10, '18:50:00', '2021-06-30', 'distance', 'pending', '2021-06-29 05:18:27', '2021-06-29 05:19:07', NULL, NULL, 'Frankfurt am Main', 8, NULL, 0, NULL, NULL, NULL, 0, NULL),
(179, 1251, 2, 50.1109221, 8.6821267, 50.0379326, 8.5621518, 'Frankfurt, Germany', 'Frankfurt Airport (FRA) (FRA), Frankfurt, Germany', 55.66, 0.00, 55.66, 'pending', 10.90, 0.34, '17:00:00', '2021-06-30', 'distance', 'pending', '2021-06-29 09:03:10', '2021-06-29 09:03:52', NULL, NULL, 'Frankfurt am Main', 8, NULL, 0, NULL, NULL, NULL, 0, NULL),
(180, 81, 2, 50.11675590000001, 8.677302899999997, 50.0379326, 8.5621518, 'Hilton Frankfurt City Centre, Hochstraße, Frankfurt, Deutschland', 'Frankfurt Airport (FRA) (FRA), Frankfurt am Main, Deutschland', 55.66, 0.00, 55.66, 'pending', 15.60, 0.36, '14:00:00', '2021-06-30', 'distance', 'pending', '2021-06-29 09:11:18', '2021-06-29 09:12:48', NULL, NULL, 'Frankfurt am Main', 8, NULL, 0, 'LH2020', 'Mr. Hussain', '12345566878', 0, NULL),
(182, 81, 2, 50.11675590000001, 8.677302899999997, 50.041381, 8.5800547, 'Hilton Frankfurt City Centre, Hochstraße, Frankfurt, Deutschland', 'Frankfurt-Flughafen, Frankfurt am Main, Deutschland', 55.66, 0.00, 55.66, 'pending', 9.60, 0.34, '15:00:00', '2021-06-30', 'distance', 'pending', '2021-06-29 11:56:40', '2021-06-29 11:57:35', NULL, NULL, 'Frankfurt am Main', 8, NULL, 0, 'LH2929', 'Mr. Hussain', '124578898', 0, NULL),
(183, 81, 2, 50.11675590000001, 8.677302899999997, 50.0379326, 8.5621518, 'Hilton Frankfurt City Centre, Hochstraße, Frankfurt, Deutschland', 'Flughafen Frankfurt (FRA), Frankfurt, Deutschland', 55.66, 0.00, 55.66, 'paid', 15.60, 0.36, '17:00:00', '2021-06-30', 'distance', 'completed', '2021-06-29 12:02:13', '2021-07-08 06:25:20', '3K342658T4989362Y', '{\n    \"id\": \"3K342658T4989362Y\",\n    \"intent\": \"CAPTURE\",\n    \"status\": \"COMPLETED\",\n    \"purchase_units\": [\n        {\n            \"reference_id\": \"default\",\n            \"amount\": {\n                \"currency_code\": \"EUR\",\n                \"value\": \"55.66\"\n            },\n            \"payee\": {\n                \"email_address\": \"info@moray-group.com\",\n                \"merchant_id\": \"YW7MU8SFWX9SL\"\n            },\n            \"soft_descriptor\": \"PAYPAL *MORAY GROUP\",\n            \"shipping\": {\n                \"name\": {\n                    \"full_name\": \"Moheb Hussain\"\n                },\n                \"address\": {\n                    \"address_line_1\": \"Mainzer Landstra\\u00dfe 49\",\n                    \"admin_area_2\": \"Frankfurt am Main\",\n                    \"postal_code\": \"60329\",\n                    \"country_code\": \"DE\"\n                }\n            },\n            \"payments\": {\n                \"captures\": [\n                    {\n                        \"id\": \"1UU54660D6174252F\",\n                        \"status\": \"COMPLETED\",\n                        \"amount\": {\n                            \"currency_code\": \"EUR\",\n                            \"value\": \"55.66\"\n                        },\n                        \"final_capture\": true,\n                        \"seller_protection\": {\n                            \"status\": \"ELIGIBLE\",\n                            \"dispute_categories\": [\n                                \"ITEM_NOT_RECEIVED\",\n                                \"UNAUTHORIZED_TRANSACTION\"\n                            ]\n                        },\n                        \"create_time\": \"2021-06-29T14:05:48Z\",\n                        \"update_time\": \"2021-06-29T14:05:48Z\"\n                    }\n                ]\n            }\n        }\n    ],\n    \"payer\": {\n        \"name\": {\n            \"given_name\": \"Moheb\",\n            \"surname\": \"Hussain\"\n        },\n        \"email_address\": \"info@qabby.de\",\n        \"payer_id\": \"PY4ZH2VS2CV3Y\",\n        \"address\": {\n            \"country_code\": \"DE\"\n        }\n    },\n    \"create_time\": \"2021-06-29T14:02:59Z\",\n    \"update_time\": \"2021-06-29T14:05:48Z\",\n    \"links\": [\n        {\n            \"href\": \"https:\\/\\/api.paypal.com\\/v2\\/checkout\\/orders\\/3K342658T4989362Y\",\n            \"rel\": \"self\",\n            \"method\": \"GET\"\n        }\n    ]\n}', 'Frankfurt am Main', 8, NULL, 0, 'LH2020', 'Mr-Hussain', '12235678976', 0, NULL),
(184, 1263, 5, 50.1045988, 8.6666867, 49.96332929999999, 8.642322499999999, 'Roomers, Frankfurt, a Member of Design Hotels, Gutleutstraße, Frankfurt am Main, Deutschland', 'Frankfurt-Egelsbach Airport, Egelsbach, Deutschland', 95.50, NULL, NULL, 'pending', 18.90, 0.40, '11:45:00', '2021-07-03', 'distance', 'canceled', '2021-06-29 15:28:45', '2021-06-29 15:50:42', NULL, NULL, 'Frankfurt am Main', 13, NULL, 0, NULL, NULL, NULL, 0, NULL),
(185, 1263, 5, 50.1045988, 8.6666867, 49.96332929999999, 8.642322499999999, 'Roomers, Frankfurt, a Member of Design Hotels, Gutleutstraße, Frankfurt am Main, Deutschland', 'Frankfurt-Egelsbach Airport, Egelsbach, Deutschland', 95.50, NULL, NULL, 'pending', 18.90, 0.40, '11:45:00', '2021-07-03', 'distance', 'canceled', '2021-06-29 15:29:35', '2021-06-29 15:50:45', NULL, NULL, 'Frankfurt am Main', 13, NULL, 0, NULL, NULL, NULL, 0, NULL),
(186, 1263, 5, 50.1045988, 8.6666867, 49.96332929999999, 8.642322499999999, 'Roomers, Frankfurt, a Member of Design Hotels, Gutleutstraße, Frankfurt am Main, Deutschland', 'Frankfurt-Egelsbach Airport, Egelsbach, Deutschland', 95.50, NULL, NULL, 'pending', 18.90, 0.40, '11:45:00', '2021-07-03', 'distance', 'canceled', '2021-06-29 15:30:35', '2021-06-29 15:50:37', NULL, NULL, 'Frankfurt am Main', 13, NULL, 0, NULL, NULL, NULL, 0, NULL),
(187, 1263, 5, 50.1045988, 8.6666867, 49.9631312, 8.648577399999999, 'Roomers, Frankfurt, a Member of Design Hotels, Gutleutstraße, Frankfurt am Main, Deutschland', 'Hans-Fleißner-Straße 50, Egelsbach, Deutschland', 95.50, 0.00, 95.50, 'paid', 18.30, 0.38, '11:30:00', '2021-07-03', 'distance', 'completed', '2021-06-29 15:47:02', '2021-07-01 12:56:52', '7P8675634P4881128', '{\n    \"id\": \"7P8675634P4881128\",\n    \"intent\": \"CAPTURE\",\n    \"status\": \"COMPLETED\",\n    \"purchase_units\": [\n        {\n            \"reference_id\": \"default\",\n            \"amount\": {\n                \"currency_code\": \"EUR\",\n                \"value\": \"95.50\"\n            },\n            \"payee\": {\n                \"email_address\": \"info@moray-group.com\",\n                \"merchant_id\": \"YW7MU8SFWX9SL\"\n            },\n            \"shipping\": {\n                \"name\": {\n                    \"full_name\": \"G\\u00f6khan Cirag\"\n                },\n                \"address\": {\n                    \"address_line_1\": \"Am Alten Bahnhof 2B\",\n                    \"admin_area_2\": \"H\\u00f6hr-Grenzhausen\",\n                    \"postal_code\": \"56203\",\n                    \"country_code\": \"DE\"\n                }\n            },\n            \"payments\": {\n                \"captures\": [\n                    {\n                        \"id\": \"1TC40666NJ100824F\",\n                        \"status\": \"COMPLETED\",\n                        \"amount\": {\n                            \"currency_code\": \"EUR\",\n                            \"value\": \"95.50\"\n                        },\n                        \"final_capture\": true,\n                        \"seller_protection\": {\n                            \"status\": \"ELIGIBLE\",\n                            \"dispute_categories\": [\n                                \"ITEM_NOT_RECEIVED\",\n                                \"UNAUTHORIZED_TRANSACTION\"\n                            ]\n                        },\n                        \"create_time\": \"2021-06-29T17:49:34Z\",\n                        \"update_time\": \"2021-06-29T17:49:34Z\"\n                    }\n                ]\n            }\n        }\n    ],\n    \"payer\": {\n        \"name\": {\n            \"given_name\": \"G\\u00f6khan\",\n            \"surname\": \"Cirag\"\n        },\n        \"email_address\": \"neomiles.official@gmail.com\",\n        \"payer_id\": \"29AA2JRP2PDDW\",\n        \"address\": {\n            \"country_code\": \"DE\"\n        }\n    },\n    \"create_time\": \"2021-06-29T17:49:12Z\",\n    \"update_time\": \"2021-06-29T17:49:34Z\",\n    \"links\": [\n        {\n            \"href\": \"https:\\/\\/api.paypal.com\\/v2\\/checkout\\/orders\\/7P8675634P4881128\",\n            \"rel\": \"self\",\n            \"method\": \"GET\"\n        }\n    ]\n}', 'Frankfurt am Main', 13, NULL, 0, NULL, NULL, NULL, 0, NULL),
(188, 1251, 2, 50.1109221, 8.6821267, 50.0379326, 8.5621518, 'Frankfurt, Germany', 'Frankfurt Airport (FRA) (FRA), Frankfurt, Germany', 55.66, 0.00, 55.66, 'pending', 10.90, 0.34, '15:30:00', '2021-07-02', 'distance', 'pending', '2021-06-30 04:23:39', '2021-06-30 04:59:19', NULL, NULL, 'Frankfurt am Main', 8, NULL, 0, '123', '123', '123', 0, NULL),
(189, 1251, 2, 50.1109221, 8.6821267, 50.0379326, 8.5621518, 'Frankfurt, Germany', 'Frankfurt Airport (FRA) (FRA), Frankfurt, Germany', 55.66, 0.00, 55.66, 'pending', 10.90, 0.34, '23:50:00', '2021-07-08', 'distance', 'pending', '2021-06-30 04:25:32', '2021-06-30 04:25:59', NULL, NULL, 'Frankfurt am Main', 8, NULL, 0, '123', '123', '123', 0, NULL),
(190, 1251, 2, 50.1109221, 8.6821267, 50.0528675, 8.569846199999997, 'Frankfurt, Germany', 'Frankfurt Airport Long distance rail station, Hugo-Eckener-Ring, Frankfurt, Germany', 55.66, 0.00, 55.66, 'pending', 8.40, 0.29, '10:50:00', '2021-07-15', 'distance', 'pending', '2021-06-30 04:28:26', '2021-06-30 05:51:08', NULL, NULL, 'Frankfurt am Main', 8, NULL, 0, '123', '123', '123', 0, NULL),
(191, 1251, 2, 50.1109221, 8.6821267, 50.0379326, 8.5621518, 'Frankfurt, Germany', 'Frankfurt Airport (FRA) (FRA), Frankfurt, Germany', 55.66, 0.00, 55.66, 'pending', 10.90, 0.34, '01:05:00', '2021-07-08', 'distance', 'pending', '2021-06-30 05:26:25', '2021-06-30 05:40:32', NULL, NULL, 'Frankfurt am Main', 8, NULL, 0, '123', '123', '123', 0, NULL),
(193, 81, 2, 50.05319799999999, 8.571603, 50.0379326, 8.5621518, 'Hilton Garden Inn Frankfurt Airport, The Squaire, Frankfurt, Deutschland', 'Frankfurt Airport (FRA) (FRA), Frankfurt am Main, Deutschland', 55.66, 0.00, 55.66, 'pending', 4.50, 0.12, '18:00:00', '2021-06-30', 'distance', 'pending', '2021-06-30 08:59:17', '2021-06-30 09:00:00', NULL, NULL, 'Frankfurt am Main', 8, NULL, 0, 'Lh2020', 'Mr. Hussain', '12345678', 0, NULL),
(194, 1251, 2, 50.1109221, 8.6821267, 52.5132996, 13.4795171, 'Frankfurt, Germany', 'Frankfurter Allee, Berlin, Germany', 1100.88, 0.00, 1100.88, 'pending', 555.20, 5.88, '23:30:00', '2021-06-30', 'distance', 'pending', '2021-06-30 09:17:30', '2021-06-30 09:17:40', NULL, NULL, 'Frankfurt am Main', 152, NULL, 0, '123', '123', '123', 0, NULL),
(195, 12, 2, 50.1109221, 8.6821267, 50.1109221, 8.6821267, 'Frankfurt, Germany', 'Frankfurt, Germany', 55.66, 0.00, 55.66, 'pending', 0.00, 0.00, '18:55:00', '2021-07-16', 'distance', 'pending', '2021-06-30 11:59:16', '2021-06-30 12:17:37', NULL, NULL, 'Frankfurt am Main', 8, NULL, 0, '123', '123', '123', 0, NULL),
(196, 1251, 2, 50.1109221, 8.6821267, 50.0528675, 8.569846199999997, 'Frankfurt, Germany', 'Frankfurt Airport Long distance rail station, Hugo-Eckener-Ring, Frankfurt, Germany', 55.66, 0.00, 55.66, 'pending', 8.40, 0.29, '19:30:00', '2021-07-01', 'distance', 'pending', '2021-06-30 12:16:21', '2021-06-30 12:20:26', NULL, NULL, 'Frankfurt am Main', 8, NULL, 0, '123', '123', '123', 0, NULL),
(198, 12, 2, 50.1109221, 8.6821267, 50.0379326, 8.5621518, 'Frankfurt, Germany', 'Frankfurt Airport (FRA) (FRA), Frankfurt, Germany', 55.66, 0.00, 55.66, 'pending', 10.90, 0.34, '10:50:00', '2021-07-02', 'distance', 'pending', '2021-07-01 06:03:57', '2021-07-01 06:14:59', NULL, NULL, 'Frankfurt am Main', 8, NULL, 0, '123', '132', '132', 0, NULL),
(200, 81, 2, 50.1109221, 8.6821267, 52.52000659999999, 13.404954, 'Frankfurt, Deutschland', 'Berlin, Deutschland', 1077.03, NULL, NULL, 'pending', 543.10, 5.71, '16:00:00', '2021-07-01', 'distance', 'pending', '2021-07-01 12:15:04', '2021-07-01 12:15:04', NULL, NULL, 'Frankfurt am Main', 148, NULL, 0, NULL, NULL, NULL, 0, NULL),
(201, 81, 2, 50.1109221, 8.6821267, 52.52000659999999, 13.404954, 'Frankfurt, Deutschland', 'Berlin, Deutschland', 1077.03, NULL, NULL, 'pending', 543.10, 5.71, '14:00:00', '2021-07-02', 'distance', 'pending', '2021-07-01 13:43:55', '2021-07-01 13:43:55', NULL, NULL, 'Frankfurt am Main', 148, NULL, 0, NULL, NULL, NULL, 0, NULL),
(202, 81, 2, 50.1109221, 8.6821267, 47.6617648, 9.4800113, 'Frankfurt, Deutschland', 'Friedrichshafen, Deutschland', 759.83, NULL, NULL, 'pending', 380.90, 4.14, '02:10:00', '2021-07-02', 'distance', 'pending', '2021-07-01 13:44:24', '2021-07-01 13:44:24', NULL, NULL, 'Frankfurt am Main', 105, NULL, 0, NULL, NULL, NULL, 0, NULL),
(203, 81, 2, 50.1109221, 8.6821267, 47.6617648, 9.4800113, 'Frankfurt, Deutschland', 'Friedrichshafen, Deutschland', 759.83, NULL, NULL, 'pending', 380.90, 4.14, '19:45:00', '2021-07-02', 'distance', 'pending', '2021-07-01 13:46:48', '2021-07-01 13:46:48', NULL, NULL, 'Frankfurt am Main', 105, NULL, 0, NULL, NULL, NULL, 0, NULL),
(204, 81, 2, 50.1109221, 8.6821267, 52.52000659999999, 13.404954, 'Frankfurt, Deutschland', 'Berlin, Deutschland', 1077.03, NULL, NULL, 'pending', 543.10, 5.71, '23:00:00', '2021-07-01', 'distance', 'pending', '2021-07-01 14:01:29', '2021-07-01 14:01:29', NULL, NULL, 'Frankfurt am Main', 148, NULL, 0, NULL, NULL, NULL, 0, NULL),
(205, 81, 2, 50.1109221, 8.6821267, 53.5510846, 9.9936818, 'Frankfurt, Deutschland', 'Hamburg, Deutschland', 961.45, NULL, NULL, 'pending', 484.80, 5.27, '14:00:00', '2021-07-02', 'distance', 'pending', '2021-07-01 14:02:47', '2021-07-01 14:02:47', NULL, NULL, 'Frankfurt am Main', 132, NULL, 0, NULL, NULL, NULL, 0, NULL),
(206, 12, 2, 50.1109221, 8.6821267, 52.5196332, 13.3879643, 'Frankfurt, Deutschland', 'Nalini Kirk, Friedrichstraße, Berlin, Deutschland', 1074.58, NULL, NULL, 'pending', 541.90, 5.66, '23:00:00', '2021-07-01', 'distance', 'pending', '2021-07-01 14:08:13', '2021-07-01 14:08:13', NULL, NULL, 'Frankfurt am Main', 148, NULL, 0, NULL, NULL, NULL, 0, NULL),
(207, 81, 2, 50.1109221, 8.6821267, 52.52000659999999, 13.404954, 'Frankfurt, Deutschland', 'Berlin, Deutschland', 1077.03, NULL, NULL, 'pending', 543.10, 5.71, '23:00:00', '2021-07-01', 'distance', 'pending', '2021-07-01 14:10:58', '2021-07-01 14:10:58', NULL, NULL, 'Frankfurt am Main', 148, NULL, 0, NULL, NULL, NULL, 0, NULL),
(210, 81, 2, 50.11675590000001, 8.677302899999997, 50.041381, 8.5800547, 'Hilton Frankfurt City Centre, Hochstraße, Frankfurt, Deutschland', 'Frankfurt-Flughafen, Frankfurt am Main, Deutschland', 55.66, NULL, NULL, 'pending', 10.00, 0.34, '08:00:00', '2021-07-06', 'distance', 'pending', '2021-07-05 09:48:06', '2021-07-05 09:48:06', NULL, NULL, 'Frankfurt am Main', 8, NULL, 0, NULL, NULL, NULL, 0, NULL),
(211, 81, 2, 50.11675590000001, 8.677302899999997, 50.041381, 8.5800547, 'Hilton Frankfurt City Centre, Hochstraße, Frankfurt, Deutschland', 'Frankfurt-Flughafen, Frankfurt am Main, Deutschland', 55.66, NULL, NULL, 'pending', 10.00, 0.34, '01:00:00', '2021-07-06', 'distance', 'pending', '2021-07-05 10:07:22', '2021-07-05 10:07:22', NULL, NULL, 'Frankfurt am Main', 8, NULL, 0, NULL, NULL, NULL, 0, NULL),
(212, 12, 2, 50.1109221, 8.6821267, 52.52000659999999, 13.404954, 'Frankfurt, Germany', 'Berlin, Germany', 1077.03, NULL, NULL, 'pending', 543.10, 5.71, '14:50:00', '2021-07-09', 'distance', 'pending', '2021-07-05 10:14:40', '2021-07-05 10:14:40', NULL, NULL, 'Frankfurt am Main', 148, NULL, 0, NULL, NULL, NULL, 0, NULL),
(213, 12, 2, 50.1109221, 8.6821267, 52.52000659999999, 13.404954, 'Frankfurt, Germany', 'Berlin, Germany', 1077.03, NULL, NULL, 'pending', 543.10, 5.71, '14:50:00', '2021-07-09', 'distance', 'pending', '2021-07-05 10:19:44', '2021-07-05 10:19:44', NULL, NULL, 'Frankfurt am Main', 148, NULL, 0, NULL, NULL, NULL, 0, NULL),
(214, 81, 2, 50.1109221, 8.6821267, 52.52000659999999, 13.404954, 'Frankfurt, Deutschland', 'Berlin, Deutschland', 1077.03, NULL, NULL, 'pending', 543.10, 5.71, '14:00:00', '2021-07-06', 'distance', 'pending', '2021-07-05 10:20:52', '2021-07-05 10:20:52', NULL, NULL, 'Frankfurt am Main', 148, NULL, 0, NULL, NULL, NULL, 0, NULL),
(215, 81, 2, 50.11675590000001, 8.677302899999997, 50.0379326, 8.5621518, 'Hilton Frankfurt City Centre, Hochstraße, Frankfurt, Deutschland', 'Flughafen Frankfurt (FRA), Frankfurt, Deutschland', 55.66, 0.00, 55.66, 'pending', 15.60, 0.36, '09:00:00', '2021-07-06', 'distance', 'pending', '2021-07-05 11:58:20', '2021-07-05 11:58:47', NULL, NULL, 'Frankfurt am Main', 8, NULL, 0, NULL, NULL, NULL, 0, NULL),
(216, 1291, 2, 50.1109221, 8.6821267, 52.52000659999999, 13.404954, 'Frankfurt, Deutschland', 'Berlin, Deutschland', 1077.03, NULL, NULL, 'pending', 543.10, 5.71, '14:00:00', '2021-07-07', 'distance', 'pending', '2021-07-06 10:09:14', '2021-07-06 10:09:14', NULL, NULL, 'Frankfurt am Main', 148, NULL, 0, NULL, NULL, NULL, 0, NULL),
(217, 1291, 2, 50.1109221, 8.6821267, 52.52000659999999, 13.404954, 'Frankfurt, Deutschland', 'Berlin, Deutschland', 1077.03, 0.00, 1077.03, 'pending', 543.10, 5.71, '14:00:00', '2021-07-07', 'distance', 'pending', '2021-07-06 10:10:30', '2021-07-06 10:11:08', NULL, NULL, 'Frankfurt am Main', 148, NULL, 0, NULL, NULL, NULL, 0, NULL),
(218, 1292, 2, 50.1109221, 8.6821267, 52.52000659999999, 13.404954, 'Frankfurt, Deutschland', 'Berlin, Deutschland', 1077.03, 0.00, 1077.03, 'pending', 543.10, 5.71, '14:00:00', '2021-07-07', 'distance', 'pending', '2021-07-06 10:27:32', '2021-07-06 10:27:45', NULL, NULL, 'Frankfurt am Main', 148, NULL, 0, NULL, NULL, NULL, 0, NULL),
(219, 1277, 2, 50.1109221, 8.6821267, 48.7758459, 9.1829321, 'Frankfurt, Germany', 'Stuttgart, Germany', 408.29, 22.00, 430.29, 'pending', 195.60, 2.32, '11:23:00', '2021-07-10', 'distance', 'pending', '2021-07-07 04:24:06', '2021-07-07 04:25:09', NULL, NULL, 'Frankfurt am Main', 56, NULL, 0, 'dsf', 'sdf', 'df', 0, NULL),
(220, 1277, 2, 50.1109221, 8.6821267, 48.7758459, 9.1829321, 'Frankfurt, Germany', 'Stuttgart, Germany', 408.29, NULL, NULL, 'pending', 195.60, 2.32, '12:12:00', '2021-07-08', 'distance', 'pending', '2021-07-07 05:12:51', '2021-07-07 05:12:51', NULL, NULL, 'Frankfurt am Main', 56, NULL, 0, NULL, NULL, NULL, 0, NULL),
(291, 1274, 2, 50.1109221, 8.6821267, 52.5132996, 13.4795171, 'Frankfurt, Germany', 'Frankfurter Allee, Berlin, Germany', 1126.27, 99.00, 1225.27, 'pending', 548.90, 5.93, '01:49:00', '2021-07-17', 'distance', 'completed', '2021-07-08 18:49:53', '2021-07-09 10:01:53', NULL, NULL, 'Frankfurt am Main', 188, NULL, 0, 'Dolore officiis labore et deserunt atque pariatur Et aut ei', 'Molestiae omnis optio labore dignissimos placeat alias par', 'Dignissimos dolorum placeat sit nihil et consequatur volupt', 0, NULL),
(293, 12, 4, 48.3509684, 11.7764347, 52.5003422, 13.3470147, 'Munich International Airport, Nordallee, München-Flughafen, Germany', 'Hotel Riu Plaza Berlin, Martin-Luther-Straße, Berlin, Germany', 1518.80, 0.00, 1518.80, 'pending', 562.50, 5.65, '18:35:00', '2021-07-18', 'distance', 'pending', '2021-07-09 04:27:17', '2021-07-09 04:35:25', NULL, NULL, 'München-Flughafen', 253, NULL, 0, NULL, NULL, NULL, 0, NULL),
(321, 1274, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, 174.00, 721.88, 'pending', 261.60, 2.85, '15:50:00', '2021-07-10', 'distance', 'completed', '2021-07-09 07:30:03', '2021-07-09 08:55:29', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, 'Aliquam est ut molestias ea quasi reprehenderit facilis', 'Quas quisquam exercitation amet nisi officia numquam aut er', 'Dolore tempor mollit quae irure in quis blanditiis cumque ne', 0, NULL),
(322, 1274, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 552.48, 133.00, 685.48, 'pending', 261.60, 2.85, '06:30:00', '2021-07-17', 'distance', 'pending', '2021-07-09 09:16:24', '2021-07-09 09:19:14', NULL, NULL, 'Frankfurt am Main', 92.08, NULL, 0, 'Vel omnis et dolor minima doloremque sunt proident quae sus', 'Quas et earum quis velit labore sed impedit nihil omnis al', 'Dolores eveniet et impedit tempora illo obcaecati', 0, NULL),
(323, 1274, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 552.48, 108.00, 660.48, 'pending', 261.60, 2.85, '06:30:00', '2021-07-17', 'distance', 'pending', '2021-07-09 09:20:38', '2021-07-09 09:20:51', NULL, NULL, 'Frankfurt am Main', 92.08, NULL, 0, 'Labore quasi est quia dolores reprehenderit labore velit pr', 'Corrupti magnam nemo commodo delectus sapiente enim unde r', 'Est numquam accusantium laborum ipsam quo delectus quaerat', 0, NULL),
(324, 1274, 3, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 652.93, 31.00, 683.93, 'pending', 261.60, 2.85, '06:30:00', '2021-07-17', 'distance', 'pending', '2021-07-09 09:21:17', '2021-07-09 09:21:25', NULL, NULL, 'Frankfurt am Main', 108.82, NULL, 0, 'Modi vitae harum natus est explicabo Ea ad proident atque', 'Dolorem quia aut facere consequatur excepteur alias officii', 'Iusto non duis adipisicing cupidatat ut sed', 0, NULL),
(325, 1274, 2, 50.1109221, 8.6821267, 52.5132996, 13.4795171, 'Frankfurt, Germany', 'Frankfurter Allee, Berlin, Germany', 1116.88, 130.00, 1246.88, 'pending', 548.90, 5.93, '10:50:00', '2021-07-10', 'distance', 'pending', '2021-07-09 09:24:11', '2021-07-09 09:24:28', NULL, NULL, 'Frankfurt am Main', 178.33, NULL, 0, 'Perferendis ipsum enim quo nobis id similique ut', 'Voluptas non accusantium consectetur vel aliquid', 'Molestiae laborum in obcaecati in est explicabo Adipisci no', 0, NULL),
(326, 1274, 2, 50.1109221, 8.6821267, 52.5132996, 13.4795171, 'Frankfurt, Germany', 'Frankfurter Allee, Berlin, Germany', 1116.88, 130.00, 1246.88, 'pending', 548.90, 5.93, '10:50:00', '2021-07-10', 'distance', 'completed', '2021-07-09 09:25:54', '2021-07-09 09:51:19', NULL, NULL, 'Frankfurt am Main', 178.33, NULL, 0, 'Dolor laborum Animi exercitationem fugit et iusto id mini', 'Et laborum Et labore eum accusamus non cumque necessitatibu', 'Velit sed nulla eos irure excepturi tempora et vero in est', 0, NULL),
(327, 1274, 3, 50.1109221, 8.6821267, 52.5132996, 13.4795171, 'Frankfurt, Germany', 'Frankfurter Allee, Berlin, Germany', 1325.89, 152.00, 1477.89, 'pending', 548.90, 5.93, '10:50:00', '2021-07-10', 'distance', 'completed', '2021-07-09 09:26:56', '2021-07-09 09:56:23', NULL, NULL, 'Frankfurt am Main', 211.7, NULL, 0, 'Aut et possimus ipsum sunt velit ut dolor', 'Enim placeat dolore anim quam qui', 'Enim dolore qui inventore sunt quibusdam voluptas dolorum v', 0, NULL),
(328, 1274, 2, 50.1109221, 8.6821267, 52.5132996, 13.4795171, 'Frankfurt, Germany', 'Frankfurter Allee, Berlin, Germany', 1116.88, NULL, NULL, 'pending', 548.90, 5.93, '11:55:00', '2021-07-10', 'distance', 'pending', '2021-07-09 09:29:51', '2021-07-09 09:29:51', NULL, NULL, 'Frankfurt am Main', 178.33, NULL, 0, NULL, NULL, NULL, 0, NULL),
(347, 1274, 2, 50.1109221, 8.6821267, 52.5132996, 13.4795171, 'Frankfurt, Germany', 'Frankfurter Allee, Berlin, Germany', 1116.88, 0.00, 1116.88, 'pending', 548.90, 5.93, '07:35:00', '2021-07-10', 'distance', 'pending', '2021-07-09 10:55:36', '2021-07-09 10:56:24', NULL, NULL, 'Frankfurt am Main', 178.33, NULL, 0, 'sfsd', NULL, NULL, 0, NULL),
(348, 1274, 2, 50.1109221, 8.6821267, 52.5132996, 13.4795171, 'Frankfurt, Germany', 'Frankfurter Allee, Berlin, Germany', 1116.88, 54.00, 1170.88, 'pending', 548.90, 5.93, '07:35:00', '2021-07-10', 'distance', 'pending', '2021-07-09 10:57:00', '2021-07-09 10:57:06', NULL, NULL, 'Frankfurt am Main', 178.33, NULL, 0, 'sfsd', NULL, NULL, 0, NULL),
(352, 1274, 2, 50.1109221, 8.6821267, 52.5132996, 13.4795171, 'Frankfurt, Germany', 'Frankfurter Allee, Berlin, Germany', 1129.62, 54.00, 1183.62, 'pending', 555.10, 5.88, '11:55:00', '2021-07-10', 'distance', 'pending', '2021-07-09 11:13:36', '2021-07-09 11:14:02', NULL, NULL, 'Frankfurt am Main', 180.36, NULL, 0, NULL, NULL, NULL, 0, NULL),
(355, 1274, 2, 50.1109221, 8.6821267, 52.5132996, 13.4795171, 'Frankfurt, Germany', 'Frankfurter Allee, Berlin, Germany', 1129.62, 22.00, 1151.62, 'pending', 555.10, 5.88, '11:55:00', '2021-07-17', 'distance', 'pending', '2021-07-09 14:37:47', '2021-07-09 14:38:16', NULL, NULL, 'Frankfurt am Main', 184.54, NULL, 0, 'sd', 'asd', 'sd', 0, NULL),
(356, 1274, 4, 50.1109221, 8.6821267, 52.5132996, 13.4795171, 'Frankfurt, Germany', 'Frankfurter Allee, Berlin, Germany', 1873.54, 152.00, 2025.54, 'pending', 555.10, 5.88, '06:30:00', '2021-07-11', 'distance', 'pending', '2021-07-09 14:41:51', '2021-07-09 14:42:19', NULL, NULL, 'Frankfurt am Main', 700.51, NULL, 0, 'Dolor commodo deserunt obcaecati eligendi architecto commodi', 'Mollit magnam excepteur dolore cumque omnis aspernatur optio', 'Magni sint ducimus porro unde nostrud incidunt voluptas no', 0, NULL),
(370, 1345, 2, 52.3655921, 13.5107466, 52.5003422, 13.3470147, 'Airport Region Berlin Brandenburg, Willy-Brandt-Platz, Schönefeld, Germany', 'Hotel Riu Plaza Berlin, Martin-Luther-Straße, Berlin, Germany', 60.52, 0.00, 60.52, 'pending', 21.20, 0.46, '04:28:00', '2021-07-24', 'distance', 'pending', '2021-07-12 09:29:15', '2021-07-12 09:36:31', NULL, NULL, 'Schönefeld', 9.66, NULL, 0, NULL, NULL, NULL, 1, NULL),
(372, 1274, 2, 50.1109221, 8.6821267, 52.5132996, 13.4795171, 'Frankfurt, Germany', 'Frankfurter Allee, Berlin, Germany', 1129.62, NULL, NULL, 'pending', 555.10, 5.88, '17:10:00', '2021-07-15', 'distance', 'pending', '2021-07-12 10:51:33', '2021-07-12 10:51:33', NULL, NULL, 'Frankfurt am Main', 180.36, NULL, 0, NULL, NULL, NULL, 0, NULL),
(373, 81, 2, 50.1109221, 8.6821267, 52.52000659999999, 13.404954, 'Frankfurt, Deutschland', 'Berlin, Deutschland', 1105.20, 0.00, 1105.20, 'pending', 543.10, 5.71, '15:00:00', '2021-07-13', 'distance', 'canceled', '2021-07-12 11:33:36', '2021-07-12 13:33:48', NULL, NULL, 'Frankfurt am Main', 176.46, NULL, 0, NULL, NULL, NULL, 0, NULL),
(374, 81, 2, 50.1109221, 8.6821267, 52.52000659999999, 13.404954, 'Frankfurt, Deutschland', 'Berlin, Deutschland', 1105.20, 0.00, 1105.20, 'pending', 543.10, 5.71, '12:00:00', '2021-07-13', 'distance', 'canceled', '2021-07-12 12:40:29', '2021-07-12 13:39:26', NULL, NULL, 'Frankfurt am Main', 176.46, NULL, 0, NULL, NULL, NULL, 0, NULL),
(376, 81, 2, 50.1109221, 8.6821267, 52.52000659999999, 13.404954, 'Frankfurt, Deutschland', 'Berlin, Deutschland', 1105.20, NULL, NULL, 'pending', 543.10, 5.71, '16:00:00', '2021-07-13', 'distance', 'canceled', '2021-07-12 12:44:15', '2021-07-12 13:40:07', NULL, NULL, 'Frankfurt am Main', 176.46, NULL, 0, NULL, NULL, NULL, 0, NULL),
(377, 81, 2, 50.1109221, 8.6821267, 52.52000659999999, 13.404954, 'Frankfurt, Deutschland', 'Berlin, Deutschland', 1105.20, NULL, NULL, 'pending', 543.10, 5.71, '01:00:00', '2021-07-13', 'distance', 'pending', '2021-07-12 12:50:04', '2021-07-12 12:50:04', NULL, NULL, 'Frankfurt am Main', 176.46, NULL, 0, NULL, NULL, NULL, 0, NULL),
(378, 81, 2, 52.52000659999999, 13.404954, 50.1109221, 8.6821267, 'Berlin, Deutschland', 'Frankfurt, Deutschland', 1093.63, 0.00, 1093.63, 'pending', 537.40, 5.73, '12:00:00', '2021-07-15', 'distance', 'canceled', '2021-07-12 13:37:10', '2021-07-14 12:35:53', NULL, NULL, 'Berlin', 174.61, NULL, 0, NULL, NULL, NULL, 0, NULL),
(380, 1347, 2, 52.3655921, 13.5107466, 52.5003422, 13.3470147, 'Airport Region Berlin Brandenburg, Willy-Brandt-Platz, Schönefeld, Germany', 'Hotel Riu Plaza Berlin, Martin-Luther-Straße, Berlin, Germany', 60.52, 0.00, 60.52, 'pending', 21.20, 0.46, '22:48:00', '2021-07-21', 'distance', 'pending', '2021-07-13 03:49:03', '2021-07-13 03:49:19', NULL, NULL, 'Schönefeld', 9.66, NULL, 0, NULL, NULL, NULL, 0, NULL),
(381, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, 0.00, 547.88, 'pending', 261.60, 2.85, '22:50:00', '2021-07-17', 'distance', 'pending', '2021-07-15 07:37:55', '2021-07-15 07:39:51', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(382, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '12:50:00', '2021-07-17', 'distance', 'pending', '2021-07-16 04:52:20', '2021-07-16 04:52:20', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(383, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 02:40:20', '2021-07-19 02:40:20', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(384, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 02:42:32', '2021-07-19 02:42:32', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(385, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 02:43:55', '2021-07-19 02:43:55', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(386, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 02:44:29', '2021-07-19 02:44:29', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(387, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 02:55:37', '2021-07-19 02:55:37', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(388, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 03:04:41', '2021-07-19 03:04:41', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(389, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 03:05:47', '2021-07-19 03:05:47', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(390, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 03:07:21', '2021-07-19 03:07:21', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(391, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 03:07:49', '2021-07-19 03:07:49', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(392, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 03:08:10', '2021-07-19 03:08:10', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(393, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 03:08:47', '2021-07-19 03:08:47', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(394, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 03:09:08', '2021-07-19 03:09:08', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(395, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 03:09:36', '2021-07-19 03:09:36', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(396, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 03:11:33', '2021-07-19 03:11:33', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(397, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 03:12:19', '2021-07-19 03:12:19', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(398, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 03:12:45', '2021-07-19 03:12:45', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(399, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 03:12:59', '2021-07-19 03:12:59', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(400, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 03:13:21', '2021-07-19 03:13:21', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(401, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 03:14:00', '2021-07-19 03:14:00', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(402, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 03:15:04', '2021-07-19 03:15:04', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(403, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 03:15:31', '2021-07-19 03:15:31', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(404, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 03:16:42', '2021-07-19 03:16:42', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(405, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 03:17:30', '2021-07-19 03:17:30', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(406, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 03:18:18', '2021-07-19 03:18:18', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(407, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 03:18:59', '2021-07-19 03:18:59', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(408, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 03:19:34', '2021-07-19 03:19:34', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(409, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 03:21:09', '2021-07-19 03:21:09', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(410, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 03:22:32', '2021-07-19 03:22:32', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(411, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 04:11:28', '2021-07-19 04:11:28', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(412, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 04:53:24', '2021-07-19 04:53:24', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(413, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 04:59:27', '2021-07-19 04:59:27', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(414, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 05:10:09', '2021-07-19 05:10:09', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(415, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 05:11:49', '2021-07-19 05:11:49', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(416, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 05:12:43', '2021-07-19 05:12:43', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(417, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 05:13:30', '2021-07-19 05:13:30', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(418, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 05:16:25', '2021-07-19 05:16:25', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(419, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 05:18:24', '2021-07-19 05:18:24', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL);
INSERT INTO `booking` (`id`, `user_id`, `vehicle_type_id`, `lat_pck`, `long_pck`, `lat_drop`, `long_drop`, `pick_address`, `drop_address`, `travel_amount`, `extra_options_amount`, `net_amount`, `payment_status`, `estimated_distance`, `estimated_time`, `pick_time`, `pick_date`, `booking_type`, `booking_status`, `created_at`, `updated_at`, `orderId`, `userDetail`, `booking_city`, `tax_amount`, `grand_total`, `partner_payment_status`, `flight_no`, `sign_board`, `reference_code`, `book_for_someone`, `pending_payment`) VALUES
(420, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 05:19:10', '2021-07-19 05:19:10', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(421, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 05:20:23', '2021-07-19 05:20:23', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(422, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 05:21:10', '2021-07-19 05:21:10', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(423, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 05:21:56', '2021-07-19 05:21:56', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(424, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 05:25:37', '2021-07-19 05:25:37', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(425, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 05:29:03', '2021-07-19 05:29:03', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(426, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 05:31:03', '2021-07-19 05:31:03', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(427, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 05:31:25', '2021-07-19 05:31:25', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(428, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 05:31:43', '2021-07-19 05:31:43', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(429, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 05:32:02', '2021-07-19 05:32:02', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(430, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 05:34:58', '2021-07-19 05:34:58', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(431, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, 0.00, 547.88, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 07:27:25', '2021-07-19 07:32:28', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(432, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, 0.00, 547.88, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 07:32:52', '2021-07-19 07:33:13', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(433, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, 0.00, 547.88, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 07:34:17', '2021-07-19 07:38:19', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(434, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, 0.00, 547.88, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 07:38:59', '2021-07-19 07:42:04', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(435, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, 0.00, 547.88, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 07:43:36', '2021-07-19 07:43:53', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(436, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, 0.00, 547.88, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 07:47:01', '2021-07-19 07:50:50', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(437, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, 0.00, 547.88, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 07:51:41', '2021-07-19 07:56:41', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(438, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 07:56:53', '2021-07-19 07:56:53', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(439, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, NULL, NULL, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 07:56:58', '2021-07-19 07:56:58', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(440, 1377, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 547.88, 0.00, 547.88, 'pending', 261.60, 2.85, '10:50:00', '2021-07-20', 'distance', 'pending', '2021-07-19 07:57:12', '2021-07-19 08:04:08', NULL, NULL, 'Frankfurt am Main', 87.48, NULL, 0, NULL, NULL, NULL, 0, NULL),
(441, 81, 2, 50.1109221, 8.6821267, 52.52000659999999, 13.404954, 'Frankfurt, Deutschland', 'Berlin, Deutschland', 1105.18, NULL, NULL, 'pending', 543.10, 5.72, '17:00:00', '2021-07-29', 'distance', 'pending', '2021-07-28 12:50:12', '2021-07-28 12:50:12', NULL, NULL, 'Frankfurt am Main', 176.46, NULL, 0, NULL, NULL, NULL, 0, NULL),
(442, 81, 2, 50.1109221, 8.6821267, 51.3396955, 12.3730747, 'Frankfurt, Deutschland', 'Leipzig, Deutschland', 794.42, 0.00, 794.42, 'pending', 388.10, 4.06, '17:00:00', '2021-07-29', 'distance', 'pending', '2021-07-28 12:51:30', '2021-07-28 12:53:45', NULL, NULL, 'Frankfurt am Main', 126.84, NULL, 0, NULL, NULL, NULL, 0, NULL),
(443, 1474, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 548.98, 0.00, 548.98, 'pending', 262.10, 2.87, '14:50:00', '2021-10-08', 'distance', 'approved', '2021-10-07 03:06:58', '2021-10-07 03:16:11', NULL, NULL, 'Frankfurt am Main', 87.65, NULL, 0, NULL, NULL, NULL, 0, NULL),
(444, 1474, 3, 50.1138454, 8.6661778, 50.05154269999999, 8.586883499999997, 'Niedenau 60, Frankfurt am Main, Deutschland', 'Flughafen Frankfurt (FRA), Terminal 2, Frankfurt am Main, Deutschland', 66.26, 46.00, NULL, 'pending', 7.60, 0.28, '03:45:00', '2020-07-08', 'distance', 'approved', NULL, NULL, NULL, NULL, 'Frankfurt am Main', 9, NULL, 0, 'X34604', NULL, NULL, 0, NULL),
(445, 1474, 2, 50.1109221, 8.6821267, 47.9990077, 7.842104299999999, 'Frankfurt, Germany', 'Freiburg im Breisgau, Germany', 548.98, NULL, NULL, 'pending', 262.10, 2.87, '13:30:00', '2021-10-08', 'distance', 'approved', '2021-10-07 06:24:54', '2021-10-07 06:28:28', NULL, NULL, 'Frankfurt am Main', 87.65, NULL, 0, NULL, NULL, NULL, 0, NULL),
(446, 1474, 2, 50.1109221, 8.6821267, 52.52198139999999, 13.413306, 'Frankfurt, Germany', 'Alexanderplatz, Berlin, Germany', 1115.27, 44.00, 1159.27, 'pending', 544.00, 5.81, '02:10:00', '2021-10-09', 'distance', 'approved', '2021-10-08 03:25:22', '2021-10-08 04:08:41', NULL, NULL, 'Frankfurt am Main', 185.09, NULL, 0, NULL, NULL, NULL, 0, NULL),
(447, 79, 2, 50.1109221, 8.6821267, 52.5132996, 13.4795171, 'Frankfurt, Germany', 'Frankfurter Allee, Berlin, Germany', 1130.82, NULL, NULL, 'pending', 555.70, 5.93, '14:30:00', '2021-10-13', 'distance', 'pending', '2021-10-12 06:30:25', '2021-10-12 06:30:25', NULL, NULL, 'Frankfurt am Main', 180.55, NULL, 0, NULL, NULL, NULL, 0, NULL),
(448, 1489, 4, 33.6844202, 73.04788479999999, 33.5968788, 73.0528412, 'Islamabad, Pakistan', 'Saddar, Rawalpindi, Pakistan', 103.89, 31.00, 134.89, 'pending', 16.40, 0.49, '01:10:00', '2023-05-02', 'distance', 'pending', '2023-05-03 11:56:11', '2023-05-03 14:33:26', NULL, NULL, 'Islamabad', 21.54, NULL, 0, '06-Apr-1986', 'Irure commodi quibusdam inventore amet animi dignissimos e', 'Sed odit unde anim dolores vero voluptatem Ex dicta sed', 0, NULL),
(449, 1489, 3, 33.6844202, 73.04788479999999, 33.5968788, 73.0528412, 'Islamabad, Pakistan', 'Saddar, Rawalpindi, Pakistan', 102.02, 193.00, 295.02, 'pending', 16.40, 0.49, '01:10:00', '2023-05-02', 'distance', 'pending', '2023-05-03 14:36:20', '2023-05-03 14:36:43', NULL, NULL, 'Islamabad', 47.1, NULL, 0, '02-Jun-1977', 'Voluptas libero nihil velit rem facere mollitia debitis null', 'Nihil nostrud qui doloremque saepe excepteur animi', 0, NULL),
(450, 1489, 4, 33.6844202, 73.04788479999999, 33.5968788, 73.0528412, 'Islamabad, Pakistan', 'Saddar, Rawalpindi, Pakistan', 108.07, 53.00, 161.07, 'pending', 16.40, 0.49, '01:10:00', '2023-05-02', 'distance', 'pending', '2023-05-03 14:39:16', '2023-05-03 14:39:40', NULL, NULL, 'Islamabad', 25.72, NULL, 0, '20-Jul-2013', 'Quo incidunt dolorum amet voluptatem accusamus est cumque', 'Laboriosam libero sint animi illo', 0, NULL),
(451, 1489, 2, 33.5645513, 72.8382771, 33.6600116, 73.0833224, 'Airport, Islamabad Airport Road, Islamabad Gandhara International Airport, Islamabad, Pakistan', 'Faizabad, Rawalpindi, Pakistan', 123.62, 153.00, 276.62, 'pending', 34.50, 0.69, '14:25:00', '2023-05-03', 'distance', 'pending', '2023-05-03 16:42:45', '2023-05-03 16:43:19', NULL, NULL, 'Islamabad', 44.17, NULL, 0, '23-May-1989', 'Quis unde porro id rerum eiusmod aspernatur odit sit dolore', 'Voluptate facilis nostrud ut quod officiis vel optio est ip', 0, NULL),
(452, 1489, 2, 33.6600116, 73.0833224, NULL, NULL, 'Faizabad, Rawalpindi, Pakistan', NULL, 116.95, 139.00, 255.95, 'pending', 50.00, 2.00, '14:40:00', '2023-05-03', 'time', 'pending', '2023-05-03 16:45:30', '2023-05-03 16:45:47', NULL, NULL, 'Rawalpindi', 40.87, NULL, 0, '08-Jan-1989', 'Quia iusto sint sint officia sit in consequatur Eligendi', 'Voluptatem et aliquip fugiat voluptatum earum enim ea ex dig', 0, NULL),
(453, 1489, 5, 33.5651107, 73.0169135, NULL, NULL, 'Rawalpindi, Pakistan', NULL, 289.78, 118.00, 407.78, 'pending', 75.00, 3.00, '17:10:00', '2023-05-03', 'time', 'pending', '2023-05-03 19:34:46', '2023-05-03 19:35:02', NULL, NULL, 'Rawalpindi', 65.11, NULL, 0, '30-Apr-2018', 'Nobis illum reprehenderit exercitationem unde cumque est de', 'Consequuntur dicta culpa eius nihil tempor molestiae conseq', 0, NULL),
(454, 1489, 2, 33.5968788, 73.0528412, 33.6036188, 73.0482751, 'Saddar, Rawalpindi, Pakistan', 'Rawalpindi Railway Station, Station Road, Saddar, Rawalpindi, Pakistan', 84.29, 143.00, 227.29, 'pending', 1.40, 0.13, '18:30:00', '2023-05-03', 'distance', 'pending', '2023-05-03 19:40:05', '2023-05-03 19:40:31', NULL, NULL, 'Rawalpindi', 36.29, NULL, 0, '26-Oct-2001', 'Tempora reprehenderit vitae ea sit', 'Quis quibusdam exercitation ut numquam quidem quos debitis e', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `booking_billing_address`
--

CREATE TABLE `booking_billing_address` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `billing_address` text NOT NULL,
  `billing_postal_code` varchar(10) NOT NULL,
  `billing_city` varchar(50) NOT NULL,
  `billing_country` varchar(50) NOT NULL,
  `vat_no` varchar(15) DEFAULT NULL,
  `skype_id` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

--
-- Dumping data for table `booking_billing_address`
--

INSERT INTO `booking_billing_address` (`id`, `booking_id`, `user_id`, `first_name`, `last_name`, `billing_address`, `billing_postal_code`, `billing_city`, `billing_country`, `vat_no`, `skype_id`, `created_at`, `updated_at`) VALUES
(1, 277, 1262, 'obaid', 'Afridi', 'abdul', '46000', '132', 'Pakistan', NULL, NULL, '2021-07-08 08:19:28', '2021-07-08 08:19:28');

-- --------------------------------------------------------

--
-- Table structure for table `booking_user`
--

CREATE TABLE `booking_user` (
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `assigned_at` timestamp NOT NULL DEFAULT '2019-11-22 07:31:04',
  `booking_date` date DEFAULT NULL,
  `commission` decimal(8,2) DEFAULT NULL,
  `calculated_price` decimal(8,2) DEFAULT NULL,
  `driver_status` enum('pending','accepted','rejected','approved') DEFAULT 'pending',
  `assigned_to` enum('pending','accepted') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_vehicle`
--

CREATE TABLE `booking_vehicle` (
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `booking_date` date DEFAULT NULL,
  `assigned_at` timestamp NOT NULL DEFAULT '2019-11-22 07:31:02'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `city_wise_pricing`
--

CREATE TABLE `city_wise_pricing` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_faqs`
--

CREATE TABLE `cms_faqs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `title2` varchar(100) DEFAULT NULL,
  `faq_question` varchar(190) NOT NULL,
  `faq_answer` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_home_page`
--

CREATE TABLE `cms_home_page` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_name` varchar(700) NOT NULL,
  `item_content` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_home_page`
--

INSERT INTO `cms_home_page` (`id`, `item_name`, `item_content`, `created_at`, `updated_at`) VALUES
(25, 'phone_number', '+49 (0) 15906406598', '2020-01-10 13:06:39', '2021-10-06 19:40:27'),
(26, 'email', 'info@moray-limousines.com', '2020-01-10 13:06:39', '2021-10-06 19:40:27'),
(27, 'address', '<p>Moray Limousines&nbsp;</p><p>Friedrich-Ebert-Anlage 36</p><p>60325 Frankfurt am Main</p>', '2020-01-10 13:06:39', '2021-10-06 19:40:27'),
(28, 'slider_image_text', 'Buchen Sie Ihr Fahrzeug mit Chauffeur', '2020-01-10 13:06:40', '2021-10-06 19:40:27'),
(29, 'our_fleet_title', 'Flotte', '2020-01-10 13:06:40', '2021-10-06 19:40:27'),
(30, 'your_advantage_title', 'Vorteile', '2020-01-10 13:06:40', '2021-10-06 19:40:27'),
(31, 'your_advantage_description', NULL, '2020-01-10 13:06:41', '2021-10-06 19:40:27'),
(32, 'your_advantage_col1_title', 'Online Buchung', '2020-01-10 13:06:41', '2021-10-06 19:40:27'),
(33, 'your_advantage_col1_description', 'Bequem und einfach Ihre online Buchen und Verwalten.', '2020-01-10 13:06:41', '2021-10-06 19:40:27'),
(34, 'your_advantage_col2_title', 'Professionelle Fahrer', '2020-01-10 13:06:42', '2021-10-06 19:40:27'),
(35, 'your_advantage_col2_description', 'Unsere professionellen Fahrer sind lizenziert und versichert und sind verpflichtet, lokale Gesetze und Vorschriften einzuhalten.', '2020-01-10 13:06:42', '2021-10-06 19:40:27'),
(36, 'your_advantage_col3_title', 'Garantierte Festpreise', '2020-01-10 13:06:42', '2021-10-06 19:40:27'),
(37, 'your_advantage_col3_description', 'Bei Moray Limousines gibt es keine versteckten Kosten. Unsere Preise beinhalten sämtliche Gebühren und Steuern und werden Ihnen mit der Buchung garantiert.', '2020-01-10 13:06:43', '2021-10-06 19:40:27'),
(38, 'about_us_title', 'Über uns', '2020-01-10 13:06:43', '2021-10-06 19:40:27'),
(39, 'about_us_description', 'Wir von Moray Limousines haben uns zum Ziel gesetzt das Premiumreisen auf der Straße noch komfortabler und luxuriöser zu gestalten. Dabei steht das Wohlbefinden unserer Gäste stets an erster Stelle. Wir freuen uns bald auch Sie als Fahrgast  an Board begrüßen zu dürfen!', '2020-01-10 13:06:43', '2021-10-06 19:40:27'),
(40, 'our_services_title', 'Services', '2020-01-10 13:06:44', '2021-10-06 19:40:27'),
(41, 'our_services_description', 'Unser exklusiver Service mit Moray Limousines', '2020-01-10 13:06:44', '2021-10-06 19:40:27'),
(42, 'our_services_col1_title', 'Limousinenservice', '2020-01-10 13:06:44', '2021-10-06 19:40:27'),
(43, 'our_services_col1_description', 'Stundenweise buchen mit größtmöglicher Flexibilität und Fahrer der ständig für Sie in Bereitschaft steht oder Sie buchen mit Transfer für Fahrten von A nach B, um entspannt und ausgeruht Ihr Wunschziel zu erreichen.\r\n\r\nBis zu 1 Stunde kostenlose Wartezeit bei Abholungen am Flughafen sodass Sie Stressfrei Ihr Chauffeur empfangen kann.\r\n\r\nExklusiver Chauffeurservice mit Daten Ihres persönlichen Fahrers 24 Stunden vor Abholung sowie geschulte Fahrer mit Business Fahrzeug.', '2020-01-10 13:06:45', '2021-10-06 19:40:27'),
(44, 'our_services_col2_title', 'Flughafentransfer', '2020-01-10 13:06:45', '2021-10-06 19:40:27'),
(45, 'our_services_col2_description', 'Bis zu 1 Stunde kostenlose Wartezeit bei Abholung am Flughafen sodass Sie Stressfrei Ihren Chauffeurservice erreichen.', '2020-01-10 13:06:45', '2021-10-06 19:40:27'),
(46, 'our_services_col3_title', 'Chauffeurservice', '2020-01-10 13:06:46', '2021-10-06 19:40:27'),
(47, 'our_services_col3_description', 'Exklusiver Chauffeurservice mit Daten Ihres persönlichen Fahrers 24 Stunden vor Abholung sowie geschulte Fahrer mit Business Fahrzeug.', '2020-01-10 13:06:46', '2021-10-06 19:40:27'),
(48, 'slider_image', 'images/cms/home/19380839051578648774.jpg', '2020-01-10 13:06:46', '2020-01-10 14:32:55'),
(49, 'text_under_search', NULL, '2020-02-03 00:43:04', '2021-10-06 19:40:27'),
(50, 'your_advantage_col4_title', 'Kostenlose Wartezeit', '2020-02-03 00:43:04', '2021-10-06 19:40:27'),
(51, 'your_advantage_col4_description', 'Bei einer Abholung vom Flughafen warten wir 60 Minuten auf Sie. Bei allen anderen Abholungen beträgt die kostenlose Wartezeit 15 Minuten.', '2020-02-03 00:43:04', '2021-10-06 19:40:27'),
(52, 'our_services_col3_image', 'images/cms/home/11741558631580710623.png', '2020-02-03 00:43:04', '2020-02-03 05:17:03'),
(53, 'your_advantage_col4_image', 'images/cms/home/6908067631580710448.png', '2020-02-03 00:48:08', '2020-02-03 05:14:08'),
(54, 'footer_page_one', '<p>Impressum</p><p>​</p><p>Anbieter:<br>Moray Limousines</p><p>(Eine Marke der Morays Group UG)</p><p>Friedrich-Ebert-Anlage 36</p><p>60325 Frankfurt am Main</p><p>​</p><p>Geschäftsführer:</p><p>Moheb R. Hussain</p><p>&nbsp;</p><p>Kontakt:</p><p>Tel: + 49 (0) 69 330 889 08<br><br>E-Mail:<a href=\"mailto:info@moray-limousines.de\">info@moray-limousines.com</a><br>Website:<a href=\"http://www.moray-limousines.de/\">www.moray-limousines.com</a></p><p>​​</p><p>USt-IdNr.: DE336366477</p><p>&nbsp;</p><p>Bei redaktionellen Inhalten:</p><p>Verantwortlich nach § 55 Abs.2 RStV</p><p>Morays Group UG</p><p>Friedrich-Ebert-Anlage 36</p><p>60325 Frankfurt am Main</p>', '2020-02-05 07:46:24', '2021-10-06 19:40:27'),
(55, 'footer_page_two', '<h2>DATSCHUTZERKLÄRUNG</h2><p>Verantwortliche Stelle im Sinne der Datenschutzgesetze, insbesondere der EU-Datenschutzgrundverordnung (DSGVO), ist:</p><p>Morays Group UG</p><p>​</p><h2>Ihre Betroffenenrechte</h2><p>Unter den angegebenen Kontaktdaten unseres Datenschutzbeauftragten können Sie jederzeit folgende Rechte ausüben:</p><p>Auskunft über Ihre bei uns gespeicherten Daten und deren Verarbeitung (Art. 15 DSGVO),</p><p>Berichtigung unrichtiger personenbezogener Daten (Art. 16 DSGVO),</p><p>Löschung Ihrer bei uns gespeicherten Daten (Art. 17 DSGVO),</p><p>Einschränkung der Datenverarbeitung, sofern wir Ihre Daten aufgrund gesetzlicher Pflichten noch nicht löschen dürfen (Art. 18 DSGVO),</p><p>Widerspruch gegen die Verarbeitung Ihrer Daten bei uns (Art. 21 DSGVO) und</p><p>Datenübertragbarkeit, sofern Sie in die Datenverarbeitung eingewilligt haben oder einen Vertrag mit uns abgeschlossen haben (Art. 20 DSGVO).</p><p>Sofern Sie uns eine Einwilligung erteilt haben, können Sie diese jederzeit mit Wirkung für die Zukunft widerrufen.</p><p>Sie können sich jederzeit mit einer Beschwerde an eine Aufsichtsbehörde wenden, z. B. an die zuständige Aufsichtsbehörde des Bundeslands Ihres Wohnsitzes oder an die für uns als verantwortliche Stelle zuständige Behörde.</p><p>Eine Liste der Aufsichtsbehörden (für den nichtöffentlichen Bereich) mit Anschrift finden Sie unter:&nbsp;<a href=\"https://www.bfdi.bund.de/DE/Infothek/Anschriften_Links/anschriften_links-node.html\">https://www.bfdi.bund.de/DE/Infothek/Anschriften_Links/anschriften_links-node.html</a>.</p><p>​</p><p>​</p><h2>Erfassung allgemeiner Informationen beim Besuch unserer Website</h2><h3>&nbsp;</h3><h3>Art und Zweck der Verarbeitung:</h3><p>Wenn Sie auf unsere Website zugreifen, d.h., wenn Sie sich nicht registrieren oder anderweitig Informationen übermitteln, werden automatisch Informationen allgemeiner Natur erfasst. Diese Informationen (Server-Logfiles) beinhalten etwa die Art des Webbrowsers, das verwendete Betriebssystem, den Domainnamen Ihres Internet-Service-Providers, Ihre IP-Adresse und ähnliches.</p><p>Sie werden insbesondere zu folgenden Zwecken verarbeitet:</p><p>Sicherstellung eines problemlosen Verbindungsaufbaus der Website,</p><p>Sicherstellung einer reibungslosen Nutzung unserer Website,</p><p>Auswertung der Systemsicherheit und -stabilität sowie</p><p>zu weiteren administrativen Zwecken.</p><p>Wir verwenden Ihre Daten nicht, um Rückschlüsse auf Ihre Person zu ziehen. Informationen dieser Art werden von uns ggfs. statistisch ausgewertet, um unseren Internetauftritt und die dahinterstehende Technik zu optimieren.</p><h3>&nbsp;</h3><h3>Rechtsgrundlage:</h3><p>Die Verarbeitung erfolgt gemäß Art. 6 Abs. 1 lit. f DSGVO auf Basis unseres berechtigten Interesses an der Verbesserung der Stabilität und Funktionalität unserer Website.</p><h3>&nbsp;</h3><h3>Empfänger:</h3><p>Empfänger der Daten sind ggf. technische Dienstleister, die für den Betrieb und die Wartung unserer Webseite als Auftragsverarbeiter tätig werden.</p><h3>&nbsp;</h3><h3>Speicherdauer:</h3><p>Die Daten werden gelöscht, sobald diese für den Zweck der Erhebung nicht mehr erforderlich sind. Dies ist für die Daten, die der Bereitstellung der Webseite dienen, grundsätzlich der Fall, wenn die jeweilige Sitzung beendet ist.</p><h3>Bereitstellung vorgeschrieben</h3><h3>oder erforderlich:</h3><p>Die Bereitstellung der vorgenannten personenbezogenen Daten ist weder gesetzlich noch vertraglich vorgeschrieben. Ohne die IP-Adresse ist jedoch der Dienst und die Funktionsfähigkeit unserer Website nicht gewährleistet. Zudem können einzelne Dienste und Services nicht verfügbar oder eingeschränkt sein. Aus diesem Grund ist ein Widerspruch ausgeschlossen.</p><h2>&nbsp;</h2><h2>Erbringung kostenpflichtiger Leistungen</h2><h3>Art und Zweck der Verarbeitung:</h3><p>&nbsp;</p><p>Zur Erbringung kostenpflichtiger Leistungen werden von uns zusätzliche Daten erfragt, wie z.B. Zahlungsangaben, um Ihre Bestellung ausführen zu können.</p><p>​</p><h3>Rechtsgrundlage:</h3><p>Die Verarbeitung der Daten, die für den Abschluss des Vertrages erforderlich ist, basiert auf Art. 6 Abs. 1 lit. b DSGVO.</p><h3>&nbsp;</h3><h3>Empfänger:</h3><p>Empfänger der Daten sind ggf. Auftragsverarbeiter.</p><p>​</p><h3>Speicherdauer:</h3><p>Wir speichern diese Daten in unseren Systemen bis die gesetzlichen Aufbewahrungsfristen abgelaufen sind. Diese betragen grundsätzlich 6 oder 10 Jahre aus Gründen der ordnungsmäßigen Buchführung und steuerrechtlichen Anforderungen.</p><h3>&nbsp;</h3><h3>Bereitstellung vorgeschrieben oder erforderlich:</h3><p>Die Bereitstellung Ihrer personenbezogenen Daten erfolgt freiwillig. Ohne die Bereitstellung Ihrer personenbezogenen Daten können wir Ihnen keinen Zugang auf unsere angebotenen Inhalte und Leistungen gewähren.</p><h2>&nbsp;</h2><h2>Kontaktformular</h2><h3>Art und Zweck der Verarbeitung:</h3><p>Die von Ihnen eingegebenen Daten werden zum Zweck der individuellen Kommunikation mit Ihnen gespeichert. Hierfür ist die Angabe einer validen E-Mail-Adresse sowie Ihres Namens erforderlich. Diese dient der Zuordnung der Anfrage und der anschließenden Beantwortung derselben. Die Angabe weiterer Daten ist optional.</p><h3>&nbsp;</h3><h3>Rechtsgrundlage:</h3><p>Die Verarbeitung der in das Kontaktformular eingegebenen Daten erfolgt auf der Grundlage eines berechtigten Interesses (Art. 6 Abs. 1 lit. f DSGVO).</p><p>Durch Bereitstellung des Kontaktformulars möchten wir Ihnen eine unkomplizierte Kontaktaufnahme ermöglichen. Ihre gemachten Angaben werden zum Zwecke der Bearbeitung der Anfrage sowie für mögliche Anschlussfragen gespeichert.</p><p>Sofern Sie mit uns Kontakt aufnehmen, um ein Angebot zu erfragen, erfolgt die Verarbeitung der in das Kontaktformular eingegebenen Daten zur Durchführung vorvertraglicher Maßnahmen (Art. 6 Abs. 1 lit. b DSGVO).</p><h3>&nbsp;</h3><h3>Empfänger:</h3><p>Empfänger der Daten sind ggf. Auftragsverarbeiter.</p><h3>&nbsp;</h3><h3>Speicherdauer:</h3><p>Daten werden spätestens 6 Monate nach Bearbeitung der Anfrage gelöscht.</p><p>Sofern es zu einem Vertragsverhältnis kommt, unterliegen wir den gesetzlichen Aufbewahrungsfristen nach HGB und löschen Ihre Daten nach Ablauf dieser Fristen.</p>', '2020-02-05 07:46:24', '2021-10-06 19:40:27');

-- --------------------------------------------------------

--
-- Table structure for table `cms_services`
--

CREATE TABLE `cms_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `service_title` varchar(90) NOT NULL,
  `service_title2` varchar(90) DEFAULT NULL,
  `short_description` varchar(120) NOT NULL,
  `short_description2` varchar(120) DEFAULT NULL,
  `service_image` varchar(120) NOT NULL,
  `long_description` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_services`
--

INSERT INTO `cms_services` (`id`, `service_title`, `service_title2`, `short_description`, `short_description2`, `service_image`, `long_description`, `created_at`, `updated_at`) VALUES
(1, 'Flughafentransfer', '.', '.', '.', '1579979993airport-transfer-banner.jpg', '<h2>Ihr Flughafentransfer in die Stadt</h2><p>&nbsp;</p><p>Der Flughafentransfer von Moray Limousines bietet Ihnen die Möglichkeit sich nach der Landung von den Strapazen Ihres Fluges zu erholen. Verlassen Sie sich auf uns - Wir bringen Sie komfortabel vom Flughafen in die Innenstadt, ohne dass Sie U-Bahn-Pläne studieren oder in einer langen Schlange auf ein Taxi warten müssen. Unsere professionellen Fahrer werden dank Flight-Tracking über den Flugverlauf informiert und sind auch bei abweichendes Flugplänen rechzeitig für Sie vor Ort. Sie sind zuverlässig wie ortskundig und stehen Ihnen mit Rat und Tat zur Seite.</p><p>&nbsp;</p><h2>Ein Flughafenshuttle für die ganze Welt</h2><p>&nbsp;</p><p><a href=\"http://moray-limousines.de/service/details/5\">Der Chauffeurservice von Moray Limousines</a> hat sich zum Ziel gesetzt, die allerhöchsten Standards zu erfüllen. Ob Sie auf Geschäftsreise in New York sind oder am Ende Ihres Dubaiurlaubs zum Flughafen von Dubai gebracht werden möchten, der Flughafentransferservice von Moray Limousines sorgt dafür, dass Sie Ihr Ziel pünktlich und entspannt erreichen. Dabei bietet Ihnen unser Fuhpark verschiedene Fahrzeugkategorien, welche sich Ihren Bedürfnissen und Wünschen anpassen. Die beliebteste Kategorie ist unsere Business Class, welche sich vor allem für einfache Fahrten von A nach B eignet. Reisen Sie mit der Familie oder mit Kollegen? Der Business Van/SUV von Moray Limousines ist für Gruppen bis zu 5 Personen geeignet und bietet viel Platz für Gepäck. Für die besonderen Anlässe empfehlen wir Ihnen unsere First Class.</p><p>&nbsp;</p><h2>Der flexible und zuverlässige Fahrservice</h2><p>&nbsp;</p><p>Die Buchung des <a href=\"http://moray-limousines.de/service/details/3\">Limousinenservice von Moray Limousines</a> ist besonders einfach und dauert nur wenige Minuten. Reservieren Sie den Flughafentransfer in der Stadt Ihrer Wahl über die Moray Limousines Website. Geben Sie einfach den Abholort und das Ziel ein, wählen Sie die Fahrzeugkategorie und bestätigen Sie den angegebenen Fahrpreis. Nach kurzer Zeit erhalten Sie eine Buchungsbestätigung per E-Mail. Dabei ist Moray Limousines zu jeder Zeit absolut transparent: Es gibt keine versteckten Gebühren, Steuern oder Trinkgelder - Sie bezahlen nur den angezeigten Preis.</p>', '2020-01-26 00:19:53', '2020-02-06 10:29:44'),
(2, 'Corporate Events', '.', '.', '.', '1580013664AET-Chauffeurs-Corporate-Services.jpg', '<h2>Roadshows, Business Meetings, Firmenveranstaltung und PR Events</h2><p>&nbsp;</p><figure class=\"image image-style-side\"><img src=\"https://www.mylift.de/wp-content/uploads/2019/05/corporate-travel-1.jpg\" alt=\"moray limousines corporate travel chauffeurserivce\" srcset=\"https://www.mylift.de/wp-content/uploads/2019/05/corporate-travel-1.jpg 960w, https://www.mylift.de/wp-content/uploads/2019/05/corporate-travel-1-600x400.jpg 600w, https://www.mylift.de/wp-content/uploads/2019/05/corporate-travel-1-300x200.jpg 300w, https://www.mylift.de/wp-content/uploads/2019/05/corporate-travel-1-768x512.jpg 768w, https://www.mylift.de/wp-content/uploads/2019/05/corporate-travel-1-700x467.jpg 700w, https://www.mylift.de/wp-content/uploads/2019/05/corporate-travel-1-100x67.jpg 100w\" sizes=\"100vw\" width=\"960\"></figure><p>&nbsp;</p><h4>Leitende Angestellte , Würdenträger, Persönlichkeiten des öffentlichen Lebens, Prominente und Unternehmer sollten sich auch während einer Fahrt auf das wesentliche Konzentrieren dürfen, um für ihre Besprechungen bereit zu sein. Mit uns an ihrer Seite, können Sie sich darauf verlassen, dass Sie sich nicht um die kleinen Dinge kümmern müssen. Mit über 20.000 jährlichen Business Transfers kann unser Team die Erforderliche Erfahrung vorweisen! Wir sind bemüht, Ihre Erwartungen zu übertreffen.</h4><h4>&nbsp;</h4><h4>Was wir anbieten</h4><ul><li>- Umfassende Bodentransportlösungen von Anfang bis Ende</li><li>- Frankfurt Airport Service und eigener Chauffeur Coordinator (das einzige Unternehmen in Frankfurt, das diesen Service anbietet)</li><li>- GPS-Ortung von Fahrzeugen für Ihren Seelenfrieden</li><li>- Kompetente und diskrete Chauffeure</li></ul><h4>&nbsp;</h4><h4>Wohin Sie auch gehen, lehnen Sie sich zurück, entspannen Sie sich und überlassen Sie es uns. Moray Limousines, die Profis mit der persönlichen Note.</h4><h4>&nbsp;</h4><h4>Business</h4><figure class=\"image image-style-side\"><img src=\"https://www.mylift.de/wp-content/uploads/2019/05/corporate-services-businesses.jpg\" alt=\"chauffeurservices on tour business meeting\" srcset=\"https://www.mylift.de/wp-content/uploads/2019/05/corporate-services-businesses.jpg 1000w, https://www.mylift.de/wp-content/uploads/2019/05/corporate-services-businesses-600x400.jpg 600w, https://www.mylift.de/wp-content/uploads/2019/05/corporate-services-businesses-300x200.jpg 300w, https://www.mylift.de/wp-content/uploads/2019/05/corporate-services-businesses-768x512.jpg 768w, https://www.mylift.de/wp-content/uploads/2019/05/corporate-services-businesses-700x467.jpg 700w, https://www.mylift.de/wp-content/uploads/2019/05/corporate-services-businesses-100x67.jpg 100w\" sizes=\"100vw\" width=\"1000\"></figure><p>&nbsp;</p><p>Wir arbeiten mit Ihren persönlichen und leitenden Mitarbeitern zusammen, um Ihnen den zuverlässigsten 5-Sterne-Service zu bieten. Moray Limousines bietet Ihnen eine breite Palette von Mietwagen mit Chauffeur, von der Mercedes E-Klasse bis zum luxuriösen Mercedes Maybach sowie Mercedes S-Klasse, Mercedes V-Klasse, Range Rover, Bentley und Rolls Royce.</p><h4>&nbsp;</h4><h4>Executive-Service&nbsp;</h4><figure class=\"image image-style-side\"><img src=\"https://www.mylift.de/wp-content/uploads/2019/05/corporate-services-executive-travel.jpg\" alt=\"corporate services executive travel\" srcset=\"https://www.mylift.de/wp-content/uploads/2019/05/corporate-services-executive-travel.jpg 1000w, https://www.mylift.de/wp-content/uploads/2019/05/corporate-services-executive-travel-600x400.jpg 600w, https://www.mylift.de/wp-content/uploads/2019/05/corporate-services-executive-travel-300x200.jpg 300w, https://www.mylift.de/wp-content/uploads/2019/05/corporate-services-executive-travel-768x512.jpg 768w, https://www.mylift.de/wp-content/uploads/2019/05/corporate-services-executive-travel-700x467.jpg 700w, https://www.mylift.de/wp-content/uploads/2019/05/corporate-services-executive-travel-100x67.jpg 100w\" sizes=\"100vw\" width=\"1000\"></figure><p>&nbsp;</p><p>Wir sind der festen Überzeugung, dass Führungskräfte keine Zeit und Energie damit verschwenden sollten, Termine oder Flüge pünktlich und stilvoll zu erreichen.</p><p>&nbsp;</p><h4>Roadshows</h4><figure class=\"image image-style-side\"><img src=\"https://www.mylift.de/wp-content/uploads/2019/05/corporate-services-roadshows.jpg\" alt=\"corporate services roadshows\" srcset=\"https://www.mylift.de/wp-content/uploads/2019/05/corporate-services-roadshows.jpg 1000w, https://www.mylift.de/wp-content/uploads/2019/05/corporate-services-roadshows-600x400.jpg 600w, https://www.mylift.de/wp-content/uploads/2019/05/corporate-services-roadshows-300x200.jpg 300w, https://www.mylift.de/wp-content/uploads/2019/05/corporate-services-roadshows-768x512.jpg 768w, https://www.mylift.de/wp-content/uploads/2019/05/corporate-services-roadshows-700x467.jpg 700w, https://www.mylift.de/wp-content/uploads/2019/05/corporate-services-roadshows-100x67.jpg 100w\" sizes=\"100vw\" width=\"1000\"></figure><p>&nbsp;</p><p>Unser internes Team steht Ihnen rund um die Uhr zur Verfügung, um Ihnen bei der Erstellung, Anpassung und Verwaltung eines effizienten und optimierten Reiseverlaufs für Roadshows behilflich zu sein.</p><p>&nbsp;</p><h4>Events</h4><figure class=\"image image-style-side\"><img src=\"https://www.mylift.de/wp-content/uploads/2019/05/Corporate-Services-Corporate-Events.jpg\" alt=\"Corporate Services Corporate Events\" srcset=\"https://www.mylift.de/wp-content/uploads/2019/05/Corporate-Services-Corporate-Events.jpg 1000w, https://www.mylift.de/wp-content/uploads/2019/05/Corporate-Services-Corporate-Events-600x400.jpg 600w, https://www.mylift.de/wp-content/uploads/2019/05/Corporate-Services-Corporate-Events-300x200.jpg 300w, https://www.mylift.de/wp-content/uploads/2019/05/Corporate-Services-Corporate-Events-768x512.jpg 768w, https://www.mylift.de/wp-content/uploads/2019/05/Corporate-Services-Corporate-Events-700x467.jpg 700w, https://www.mylift.de/wp-content/uploads/2019/05/Corporate-Services-Corporate-Events-100x67.jpg 100w\" sizes=\"100vw\" width=\"1000\"></figure><p>Wir sind spezialisiert auf die Zusammenarbeit mit PR-, Medien- und Eventunternehmen. Haben Sie einen besonderen Gast im Sinn? Wir können Ihnen dabei helfen, das Ergebnis zu Ihren Gunsten zu beeinflussen, indem Sie Ihren besonderen Gast in einem unserer Luxusfahrzeuge reisen lassen.</p><p>&nbsp;</p><h4>Koferenzen</h4><figure class=\"image image-style-side\"><img src=\"https://www.mylift.de/wp-content/uploads/2019/05/AET-Chauffeurs-Corporate-Services.jpg\" alt=\"Corporate Services\" srcset=\"https://www.mylift.de/wp-content/uploads/2019/05/AET-Chauffeurs-Corporate-Services.jpg 1600w, https://www.mylift.de/wp-content/uploads/2019/05/AET-Chauffeurs-Corporate-Services-600x244.jpg 600w, https://www.mylift.de/wp-content/uploads/2019/05/AET-Chauffeurs-Corporate-Services-300x122.jpg 300w, https://www.mylift.de/wp-content/uploads/2019/05/AET-Chauffeurs-Corporate-Services-768x312.jpg 768w, https://www.mylift.de/wp-content/uploads/2019/05/AET-Chauffeurs-Corporate-Services-700x284.jpg 700w, https://www.mylift.de/wp-content/uploads/2019/05/AET-Chauffeurs-Corporate-Services-100x41.jpg 100w\" sizes=\"100vw\" width=\"1600\"></figure><p>&nbsp;</p><p>Wir bieten umfassende Erfahrung im Management der Transportlogistik von kleinen bis zu großen Konferenzen mit der Option, einen Koordinator vor Ort zu haben. Ihre Anforderungen an die Unternehmenskultur sind uns wichtig. Ob Sie an einem Meeting, einer Firmen- oder Sportveranstaltung, einer Medientour, einer Preisverleihung, einer Premiere oder einer Produkteinführung teilnehmen, wir können Sie dabei unterstützen, Ihre professionelle Präsentation zu optimieren.</p><p>&nbsp;</p><p>&nbsp;</p><h3>Ihre Vorteile</h3><p>&nbsp;</p><p>&nbsp;</p><p>Kostenlose Wartezeit</p><figure class=\"image image-style-side\"><img src=\"https://www.mylift.de/wp-content/uploads/2019/05/complimentary-wait-time.png\" alt=\"complimentary wait time\"></figure><p>Nehmen Sie sich die Zeit, unsere Firmenkunden mit Standby Buchung profiteren von Kostenloser Wartezeit.</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>All-inclusive Tarife</p><figure class=\"image image-style-side\"><img src=\"https://www.mylift.de/wp-content/uploads/2019/05/all_inclusive_rates.png\" alt=\"all inclusive rates\"></figure><p>Es gibt keine versteckten Kosten. Ihr erschwinglicher All-Inclusive-Tarif – der vor Ihrer Buchung bestätigt wurde – beinhaltet alle Steuern, Gebühren und Trinkgelder.</p><p>&nbsp;</p><p>&nbsp;</p><p>Professionelle Chauffeure</p><figure class=\"image image-style-side\"><img src=\"https://www.mylift.de/wp-content/uploads/2019/05/professional-chauffeurs.png\" alt=\"professional chauffeurs\"></figure><p>Sie können sich darauf verlassen, dass alle Mory Limousines-Chauffeure zugelassen, versichert, lizensiert, freundlich und pünktlich sind.</p><p>&nbsp;</p><p>&nbsp;</p><p>Kostenlose Stornierung</p><figure class=\"image image-style-side\"><img src=\"https://www.mylift.de/wp-content/uploads/2019/05/free-cancellation.png\" alt=\"free cancellation\"></figure><p>Pläne ändern sich! Kein Problem! Stornierungen sind bis 1 Stunde vor der Fahrt oder bis 24 Stunden vor der stündlichen Buchung kostenlos.</p>', '2020-01-26 09:41:04', '2023-05-02 13:53:20'),
(3, 'Limousinenservice', '.', '.', '.', '1580053655Luxury-in-motion-chauffeur-service-surrey-airport-transfers-meet-and-greet-service-image.jpg', '<h2>Der Limousinenservice in der City</h2><p>&nbsp;</p><p>&nbsp;</p><figure class=\"image image-style-side\"><img src=\"https://media.gettyimages.com/videos/chauffeur-opens-back-door-of-black-limousine-with-discretion-senior-video-id1167901631?s=640x640\" alt=\"Bildergebnis für chauffeurservice door open\"></figure><p>Nach der Ankunft in einer neuen Stadt stellt sich häufig die Frage, wie Sie Ihre neue Umgebung erkunden möchten. Mit dem Limousinenservice von Moray sorgt ein professioneller Fahrer dafür, dass Sie immer auf dem richtigen Weg sind. Sie können Moray Limousines stundenweise buchen, wobei Sie die größtmögliche Flexibilität genießen: Ein Fahrer ist ständig für Sie in Bereitschaft und geleitet Sie in einer Businesslimousine durch die&nbsp;</p><p>&nbsp;</p><p>Innenstadt. Oder Sie buchen Moray Limousines für Fahrten von A nach B, um entspannt und ausgeruht Ihr Wunschziel zu erreichen. Moray ist weltweit präsent. Behalten Sie uns also im Hinterkopf, wenn Sie auf Reisen sind.</p><p>&nbsp;</p><p>&nbsp;</p><h2>Der Moray Limousines Standard</h2><p>&nbsp;</p><p>&nbsp;</p><figure class=\"image image-style-side\"><img src=\"https://i.ebayimg.com/00/s/NzIwWDEwODA=/z/iUkAAOSwIfBcmGoj/$_45.JPG\" alt=\"Ähnliches Foto\"></figure><p>Erkunden Sie mit dem Limousinenservice von Moray stilvoll und unkompliziert alles was die Stadt zu bieten hat. Die Buchung über die benutzerfreundliche Website besonders einfach und dauert nur wenige Sekunden. Ehrlichkeit und Transparenz gehören zu den Grundprinzipien bei Moray, weswegen wir Ihnen bereits während der Buchung einen Festpreis garantieren, der sämtliche Kosten und Trinkgelder enthält. Auf diese Weise kennen Sie Ihre genauen Ausgaben schon vor dem eigentlichen Reiseantritt, was insbesondere unsere Geschäftskunden zu schätzen wissen. Was auch immer der Anlass für Ihre Reise ist, mit dem <a href=\"http://moray-limousines.de/service/details/5\">Chauffeurservice von Moray Limousines</a> sind sie stets stilvoll und komfortabel unterwegs. Unsere Fahrer sind handverlesen und bestechen vor allem durch ihre Professionalität und Ortskenntisse. Unser Fuhrpark bietet Ihnen hochwertige Fahrzeuge, welche den aktuellen Sicherheitsstandarts entsprechen und innen wie außen durch ihre Eleganz bestechen. Lehnen Sie sich beispielsweise in einer Mercedes S-Klasse zurück und überlassen Sie das Steuer einem ortskundigen Chauffeur.</p><p>&nbsp;</p>', '2020-01-26 20:47:35', '2020-02-03 07:53:19'),
(4, 'Business Solutions', '.', '.', '.', '1580055256mercedes-benz-v-class-wallpapers-32415-3003157.jpg', '<h2>Weltweit umfassender Service für entspanntes Reisen</h2><p>&nbsp;</p><p>Wir bieten den Moray Limousines Standard weltweit an. Sodass Sie stets gleichbleibenden Service erhalten. Egal ob Berlin, Amsterdam, New York oder Sidney. Wir freuen uns stets sie an Board unserer Fahrzeuge begrüßen zu dürfen.</p><h2>&nbsp;</h2><h2>Kleine und mittelständische Unternehmen</h2><p>Organisieren Sie Transfers und Stundenbuchungen so unkompliziert wie nie zuvor.</p><ul><li>- Login für Ihre Mitarbeiter</li><li>- Weltweite Verfügbarkeit von lizenzierten und versicherten Chauffeuren</li><li>- Accounts mit unterschiedlichen Benutzerrollen, um jede Firmenstruktur abzubilden</li><li>- Erfüllung der Sorgfaltspflicht gegenüber Ihren Reisenden durch sicherheitsorientierten Service</li></ul><p><a href=\"https://moray-limousines.de/register\">Account erstellen</a></p><h2>&nbsp;</h2><h2>Großunternehmen</h2><p>Perfekt maßgeschneiderte Lösungen für das Reisemanagement Ihres Unternehmens.</p><ul><li>- Zuständiger Key Account Manager</li><li>- Login für jeden Mitarbeiter</li><li>- Weltweite Erfahrung bei Ausschreibungen</li><li>- Volle Sorgfaltspflicht und sicherheitsorientierter Service</li><li>- Unternehmensrabatte</li><li>- OBE-Einbindung möglich</li></ul><p><a href=\"http://moray-limousines.de/service/details/6\">Kontakt aufnehmen</a></p><h2>&nbsp;</h2><h2>Weltweite Lösungen für Events</h2><p>Überlassen Sie die Koordination von Transfers oder Shuttle-Services für Ihre Veranstaltungen unserem erfahrenen Eventteam.</p><ul><li>Maßgeschneiderte Lösungen für Ihre Bedürfnisse und Anforderungen</li><li>Wir übernehmen Planung, Implementierung und Vor-Ort-Koordination</li><li>Experten mit 100%iger Erfüllungsrate bei jährlich mehr als 250 Veranstaltungen</li></ul><p><a href=\"http://moray-limousines.de/service/details/7\">Mehr erfahren</a></p><p>&nbsp;</p><h2>Airlines</h2><p>Bieten Sie Ihren anspruchsvollen Passagieren kostenlose Flughafentransfers.</p><p><a href=\"http://moray-limousines.de/contact-us\">Kontakt aufnehmen</a></p>', '2020-01-26 21:14:16', '2020-02-13 07:37:19'),
(5, 'Chauffeurservice', '.', '.', '.', '1580107089214d3edfa505975446d816629213fd87.png', '<p>Sie müssen zu einem geschäftlichen Termin in Frankfurt oder einer anderen Stadt?<br><strong>Wir holen Sie gerne am Flughafen, Bahnhof oder im Büro ab und bringen Sie pünktlich zu Ihrem Meeting.</strong></p><p>Auch im privaten Bereich gibt es genug Gründe das eigene Auto stehen zu lassen und einen unserer Chauffeure mit der gewünschten Limousine zu buchen.</p><p><strong>Ob zu einer Shoppingtour, einer Feier oder einfach nur ins Restaurant mit der Familie. Um die Parkplatzsuche oder wieviel Wein Sie trinken dürfen, müssen Sie sich mit uns keine Gedanken machen!</strong></p>', '2020-01-27 11:33:24', '2020-02-07 13:57:05'),
(6, 'Großunternehmen', '.', '.', '.', '1580721885deutschebank.jpeg', '<p>Zu unseren Kunden gehören Renommierte Unternehmen. Der Service für Ihre Mitarbeiter ist uns sehr wichtig. Daher bieten wir maßgeschneiderte Lösungen für Unternehmen und Großkunden an.</p>', '2020-02-03 08:24:45', '2020-02-13 07:39:17'),
(7, 'Weltweite Event Lösung', '.', '.', '.', '1580723916event.jpg', '<p>Egal ob Roadshows oder Events, wir planen von A bis Z gerne Ihren Chauffeurservice und bieten Ihnen angepasst an Ihre anforderungen den Service an.</p>', '2020-02-03 08:58:36', '2020-02-13 07:40:39'),
(8, 'VIP Chauffeur Security', '.', '.', '.', '158072418110111442-security-chauffeur-service-1024x682.jpg', '<p>Unsere speziell geschulten Fahrer für Politiker, Diplomaten, Delegationen sowie Staatsbesuche sorgen nicht nur für einen reibungslosen Chauffeurservice sondern bieten diskret dennoch offensiv den erforderlichen Personenschutz je nach Sicherheitslage. Dafür wird vorab ein Sicherheitskonzept erstellt und strikt nach diesem gehandelt.</p>', '2020-02-03 09:03:01', '2020-02-13 07:43:18');

-- --------------------------------------------------------

--
-- Table structure for table `configurations`
--

CREATE TABLE `configurations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `map_api` varchar(200) NOT NULL,
  `tax_rate` decimal(8,2) NOT NULL,
  `paypal_account` varchar(150) DEFAULT NULL,
  `user_name` varchar(30) DEFAULT NULL,
  `paypal_key` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `service_list_img` varchar(500) DEFAULT NULL,
  `service_detail_img` varchar(500) DEFAULT NULL,
  `our_fleet_img` varchar(500) DEFAULT NULL,
  `cancel_hour` float DEFAULT NULL,
  `extend_hour_limit` float DEFAULT NULL,
  `extra_column` float DEFAULT NULL,
  `master_hour` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configurations`
--

INSERT INTO `configurations` (`id`, `map_api`, `tax_rate`, `paypal_account`, `user_name`, `paypal_key`, `created_at`, `updated_at`, `service_list_img`, `service_detail_img`, `our_fleet_img`, `cancel_hour`, `extend_hour_limit`, `extra_column`, `master_hour`) VALUES
(1, 'AIzaSyDeHpSgm-hy0_G_NC6PynKEYgASntQIi1Y', 19.00, 'test acccount', 'test account', 'test', NULL, '2021-07-12 03:20:54', '1580564722service.png', '15800567404._Chauffeurservice_mlbby7.png', NULL, 1, 1, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contactuses`
--

CREATE TABLE `contactuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cellno` varchar(255) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contactuses`
--

INSERT INTO `contactuses` (`id`, `first_name`, `last_name`, `email`, `cellno`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'Peter', 'Brunkhorst', 'eventffm@gmx.de', '6134189949', 'Sehr geehrte Damen und Herren. Ich suche momentan eine Anstellung als Fahrer / Chauffeur. Ich habe jahrelange Erfahrung u.a. im Statistischen Bundesamt gesammelt. Gerne würde ich mich näher bei Ihnen vorstellen.\r\nMit freundlichen Grüßen\r\nPeter Brunkhorst', '2020-02-05 17:27:39', '2020-02-05 17:27:39'),
(2, 'Hafiz', 'Shahid', 'mc100402525@gmail.com', '03157474084', 'Hi this is just testing an email', '2020-03-19 06:33:52', '2020-03-19 06:33:52'),
(3, 'Hafiz', 'Shahid', 'h.shahidgrw@gmail.com', '03157474084', 'testing email features of limo site', '2020-05-29 09:56:04', '2020-05-29 09:56:04'),
(4, 'Usman', 'Maher', 'umaher13@gmail.com', '+9230344556677', 'test', '2020-05-29 10:00:34', '2020-05-29 10:00:34'),
(5, 'jammal', 'rahim', 'nasir4716@gmail.com', '45456456465', 'test', '2020-05-29 10:37:48', '2020-05-29 10:37:48'),
(6, 'Hafiz', 'Shahid', 'h.shahidgrw@gmail.com', '03157474084', 'testing email again via contact us with booking@moray-limosines.com account', '2020-05-29 10:49:43', '2020-05-29 10:49:43'),
(7, 'Zeshan', 'Raja', 'zeshan@gmail.com', '123456789', 'abcdef', '2023-04-28 19:29:10', '2023-04-28 19:29:10'),
(8, 'Zeshan', 'Raja', 'zeshan@gmail.com', '123456789', 'abcdef', '2023-04-28 19:36:31', '2023-04-28 19:36:31'),
(9, 'Zeshan', 'Raja', 'zeshan@gmail.com', '123456789', 'abcdef', '2023-04-28 19:39:14', '2023-04-28 19:39:14'),
(10, 'Zeshan', 'Raja', 'zeshan@gmail.com', '123456789', 'abcdef', '2023-04-28 19:40:05', '2023-04-28 19:40:05'),
(11, 'Zeshan', 'Rabnawaz', 'zeshan123@gmail.com', '123456789', 'abcdef', '2023-05-02 16:45:15', '2023-05-02 16:45:15'),
(12, 'Zeshan', 'Rabnawaz', 'zeshan123@gmail.com', '123456789', 'abcdef', '2023-05-02 16:45:38', '2023-05-02 16:45:38'),
(13, 'Zeshan', 'Rabnawaz', 'zeshan123@gmail.com', '03045100845', 'abcdef', '2023-05-02 17:23:19', '2023-05-02 17:23:19'),
(14, 'Zeshan', 'Rabnawaz', 'zeshanrabnwz@gmail.com', '03045100845', 'dvwrsfff', '2023-05-02 19:35:50', '2023-05-02 19:35:50'),
(15, 'Zeshan', 'Rabnawaz', 'checking123@gmail.com', '03045100845', 'checking', '2023-05-03 19:42:08', '2023-05-03 19:42:08'),
(16, 'Zeshan', 'Rabnawaz', 'checking123@gmail.com', '03045100845232', 'checking', '2023-05-03 19:42:16', '2023-05-03 19:42:16');

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `price_up_rate` int(11) DEFAULT NULL,
  `discount_rate` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('active','blocked','dis_active') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`id`, `category_id`, `start_date`, `end_date`, `start_time`, `end_time`, `price_up_rate`, `discount_rate`, `created_at`, `updated_at`, `status`) VALUES
(1, 2, '2020-01-27', '2020-12-31', '22:00:00', '05:59:00', 15, NULL, '2020-01-25 04:31:57', '2021-07-08 09:23:16', 'dis_active'),
(2, 3, '2020-01-27', '2020-12-31', '22:00:00', '05:59:00', 15, NULL, '2020-01-25 04:35:55', '2020-01-25 04:35:55', 'active'),
(3, 4, '2020-01-27', '2020-12-31', '22:00:00', '05:59:00', 15, NULL, '2020-01-25 04:36:47', '2020-01-25 04:36:47', 'active'),
(4, 5, '2020-01-27', '2020-12-31', '00:00:00', '23:59:00', 15, NULL, '2020-01-26 20:27:06', '2020-01-26 20:33:43', 'active'),
(5, 5, '2020-01-27', '2020-12-31', '22:00:00', '05:59:00', 15, NULL, '2020-01-26 20:34:59', '2020-01-26 20:34:59', 'active'),
(9, 5, '2021-07-08', '2021-07-09', '08:16:09', '08:16:09', NULL, NULL, '2021-07-07 06:16:09', '2021-07-07 06:16:09', 'active'),
(10, 5, '2021-07-08', '2021-07-09', '13:16:00', '12:38:00', NULL, NULL, '2021-07-07 06:17:05', '2021-07-07 06:17:05', 'active'),
(11, 2, '2021-07-07', '2021-07-09', '13:17:00', '13:17:00', NULL, 15, '2021-07-07 06:17:50', '2021-07-07 06:17:50', 'active'),
(12, 3, '2021-07-08', '2021-07-10', '13:17:00', '13:55:00', NULL, 50, '2021-07-07 06:18:48', '2021-07-07 06:18:48', 'active'),
(13, 4, '2021-07-08', '2021-07-09', '08:43:52', '08:43:52', NULL, NULL, '2021-07-07 06:43:53', '2021-07-07 06:43:53', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `document_title` varchar(50) DEFAULT NULL,
  `document_img` varchar(200) DEFAULT NULL,
  `applied_on` enum('driver','partner','vehicle','end_user') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `document_title`, `document_img`, `applied_on`, `created_at`, `updated_at`) VALUES
(1, 'Company Legal Registration / Gewerbeanmeldung', 'Document Image', 'partner', '2020-01-24 14:17:40', '2020-01-24 14:17:40'),
(2, 'Driving License', 'Document Image', 'driver', '2021-06-16 10:45:27', '2021-06-16 10:45:27');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `whats_app` varchar(15) DEFAULT NULL,
  `skype_id` varchar(25) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `permanent_address` varchar(250) DEFAULT NULL,
  `default_location` varchar(150) DEFAULT NULL,
  `additional_information` text DEFAULT NULL,
  `vehicle_licence_no` varchar(100) DEFAULT NULL,
  `vehicle_licence_expiry` date DEFAULT NULL,
  `pco_licence_no` varchar(100) DEFAULT NULL,
  `pco_licence_expiry` date DEFAULT NULL,
  `id_card_number` varchar(100) DEFAULT NULL,
  `id_card_image` varchar(150) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `endusers`
--

CREATE TABLE `endusers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `skype_id` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `whats_app` varchar(20) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `image_name` varchar(200) DEFAULT NULL,
  `default_pickup_location` varchar(300) DEFAULT NULL,
  `default_drop_location` varchar(300) DEFAULT NULL,
  `zip_code` varchar(300) DEFAULT NULL,
  `billing_address` varchar(200) DEFAULT NULL,
  `billing_postal_code` varchar(200) DEFAULT NULL,
  `billing_city` varchar(200) DEFAULT NULL,
  `billing_country` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `vat_no` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `endusers`
--

INSERT INTO `endusers` (`id`, `user_id`, `skype_id`, `date_of_birth`, `phone_number`, `whats_app`, `address`, `gender`, `image_name`, `default_pickup_location`, `default_drop_location`, `zip_code`, `billing_address`, `billing_postal_code`, `billing_city`, `billing_country`, `created_at`, `updated_at`, `vat_no`) VALUES
(1, 84, 'Google', '2020-02-07', '03078257570', '123456789', 'Berlin, Germany', 'male', NULL, NULL, NULL, NULL, 'Mall Road, P&T Colony, The Mall, Shimla, Himachal Pradesh, India', '171001', 'Shimla', 'India', '2020-02-03 17:00:23', '2020-02-03 17:02:44', 'DE3939'),
(2, 1262, '123', '2021-07-09', '+49 123456789', NULL, '123', 'male', NULL, NULL, NULL, NULL, 'abdul', 'basit', '132', '321', '2021-07-08 03:44:04', '2021-07-08 03:44:04', NULL),
(3, 1260, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '123', '440001', NULL, 'Canada', '2021-07-08 09:52:00', '2021-07-12 12:48:10', NULL),
(4, 1274, 'Brennan Drake LLC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ea voluptatem conse', 'Doloribus do quo non', 'Ullamco lorem tempor', 'Duis non in sunt es', '2021-07-08 18:51:02', '2021-07-09 14:42:19', 'Fuga Velit voluptat'),
(5, 1273, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-09 03:50:20', '2021-07-12 04:27:36', NULL),
(6, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-09 04:27:40', '2021-07-09 04:35:25', NULL),
(7, 1323, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kohat', '46000', 'pehsawar', 'Pakistan', '2021-07-09 04:52:08', '2021-07-09 04:52:08', NULL),
(8, 1324, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kohat', '46000', 'peshawar', 'Pakistan', '2021-07-09 05:05:15', '2021-07-09 05:32:10', NULL),
(9, 1332, 'accrual', '2021-07-09', '03336506505', NULL, 'kohat', 'male', NULL, NULL, NULL, NULL, 'Ronaq Restaurant, Bahria Enclave,Kuri Road, Islamabad.', '46000', 'Islamabad', 'Pakistan', '2021-07-09 10:50:08', '2021-07-12 08:15:30', '1234'),
(10, 81, 'No Company', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mainzer Landstraße 49', '60329', 'Frankfurt am Main', 'Deutschland', '2021-07-12 11:34:48', '2021-07-28 12:53:45', 'no VAT'),
(11, 1347, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-13 03:49:19', '2021-07-13 03:49:19', NULL),
(12, 1377, 'accrual', '2021-07-19', '03336506505', NULL, 'kohat', 'male', NULL, NULL, NULL, NULL, 'Ronaq Restaurant, Bahria Enclave,Kuri Road, Islamabad.', '44000', 'Islamabad', 'Pakistan', '2021-07-15 07:39:51', '2021-07-19 07:56:41', '1234'),
(13, 1474, 'asdasd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dasd', '465', 'asdd', 'asdas', '2021-10-07 03:16:11', '2021-10-08 03:25:40', '5'),
(14, 1489, 'Reyes and Craig LLC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sed tempor voluptatu', 'Eos cillum earum de', 'Qui asperiores porro', 'Ad ut reiciendis per', '2023-05-03 12:22:51', '2023-05-03 19:40:31', 'Pariatur Perspiciat'),
(15, 1490, 'Mccormick Beck LLC', '2006-01-15', '123456789', NULL, 'Aut iure impedit explicabo Inventore debitis quo omnis do voluptas', 'male', NULL, NULL, NULL, NULL, 'Aut ad ducimus ex adipisicing quis aliqua Quia nisi cupidatat', 'Ut aliquip aliquam n', 'Omnis pariatur Distinctio Est sit dolor vel', 'Irure et harum ut iusto sint dolore ea architecto dolor numq', '2023-05-03 19:47:48', '2023-05-03 19:47:48', 'Quis omnis hic dolor porro pariatur Ipsam');

-- --------------------------------------------------------

--
-- Table structure for table `extend_bookings`
--

CREATE TABLE `extend_bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `previous_drop_location` varchar(150) NOT NULL,
  `new_drop_location` varchar(150) NOT NULL,
  `extended_distance` double(8,2) NOT NULL,
  `extended_duration` double(8,2) NOT NULL,
  `new_drop_lat` double NOT NULL,
  `new_drop_long` double NOT NULL,
  `previous_net_amount` decimal(8,2) NOT NULL,
  `extended_amount` decimal(8,2) NOT NULL,
  `new_net_amount` decimal(8,2) NOT NULL,
  `payment_status` enum('paid','unpaid','pending') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `orderId` varchar(150) DEFAULT NULL,
  `userDetail` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `tax_amount` decimal(10,0) DEFAULT NULL,
  `grand_total` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `extraoptions`
--

CREATE TABLE `extraoptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_name` varchar(150) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `title` varchar(70) NOT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `is_active` enum('yes','no') DEFAULT 'no',
  `max_quantity` int(11) DEFAULT NULL,
  `is_quantity` enum('yes','no') DEFAULT 'yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `extraoptions`
--

INSERT INTO `extraoptions` (`id`, `image_name`, `description`, `title`, `price`, `is_active`, `max_quantity`, `is_quantity`, `created_at`, `updated_at`) VALUES
(1, '15798658536a41446f4ce4febff9eec57de1cf3842.jpg', 'MaxiCosi', 'Child seat 3-6 years', 22.00, 'no', 2, 'yes', '2020-01-24 16:37:34', '2020-01-24 16:45:19'),
(2, '1579866107babyschale-protect-von-united-kids-gruppe-0-0-13-kg-kingsilver.jpg', 'Baby seat', 'Baby seat 0-2 years', 32.00, 'no', 2, 'yes', '2020-01-24 16:41:47', '2020-01-24 16:45:32'),
(3, '157986627941irK3O97FL.jpg', 'Booster seat', 'Booster 6-12 years', 12.00, 'no', 2, 'yes', '2020-01-24 16:44:39', '2020-01-24 16:44:39'),
(6, '15878212972011-Audi-A8-with-its-own-WiFi-hotspot.jpg', '2 GB Volume für Highspeed 4G Internet Connection', 'In Car Wifi - 2 GB', 9.00, 'no', NULL, 'yes', '2020-04-25 11:28:17', '2020-04-25 11:28:17'),
(7, '15878213612011-Audi-A8-with-its-own-WiFi-hotspot.jpg', '10 GB Volume für Highspeed 4G Internet Connection', 'In Car Wifi - 10 GB', 19.00, 'no', NULL, 'yes', '2020-04-25 11:29:21', '2020-04-25 11:29:21'),
(8, '15878213972011-Audi-A8-with-its-own-WiFi-hotspot.jpg', '50 GB Volume für Highspeed 4G Internet Connection', 'In Car Wifi - 50 GB', 99.00, 'no', NULL, 'yes', '2020-04-25 11:29:57', '2020-04-25 11:29:57');

-- --------------------------------------------------------

--
-- Table structure for table `happy_clients`
--

CREATE TABLE `happy_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_image` varchar(120) DEFAULT NULL,
  `client_title` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `happy_clients`
--

INSERT INTO `happy_clients` (`id`, `client_image`, `client_title`, `created_at`, `updated_at`) VALUES
(4, '1579885867logo1.jpg', NULL, '2020-01-24 22:11:07', '2020-01-24 22:11:07'),
(5, '1579885874logo2.jpg', NULL, '2020-01-24 22:11:14', '2020-01-24 22:11:14'),
(6, '1579885881logo3.jpg', NULL, '2020-01-24 22:11:21', '2020-01-24 22:11:21');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `booking_id`, `invoice_number`, `created_at`, `updated_at`) VALUES
(1, 4, '4122230626', '2020-01-29 09:08:31', '2020-01-29 09:08:31'),
(2, 1, 'ML-576180', '2020-01-29 09:14:45', '2020-01-29 09:14:45'),
(3, 9, 'ML- 249168', '2020-02-01 17:16:48', '2020-02-01 17:16:48'),
(4, 10, 'ML- 223911', '2020-02-01 17:18:47', '2020-02-01 17:18:47'),
(5, 11, 'ML- 660307', '2020-02-01 13:02:18', '2020-02-01 13:02:18'),
(6, 7, 'ML- 992903', '2020-02-01 13:02:33', '2020-02-01 13:02:33'),
(7, 4, 'ML- 516391', '2020-02-04 16:55:00', '2020-02-04 16:55:00'),
(8, 50, 'ML- 389093', '2020-08-07 10:36:03', '2020-08-07 10:36:03'),
(9, 52, 'ML- 738721', '2020-08-07 10:41:33', '2020-08-07 10:41:33'),
(10, 55, 'ML- 489730', '2021-02-08 21:28:19', '2021-02-08 21:28:19'),
(11, 187, 'ML- 924461', '2021-07-01 12:56:52', '2021-07-01 12:56:52'),
(12, 54, 'ML- 670588', '2021-07-07 07:14:41', '2021-07-07 07:14:41'),
(13, 183, 'ML- 351161', '2021-07-08 06:25:20', '2021-07-08 06:25:20'),
(14, 183, 'ML- 630993', '2021-07-08 06:25:42', '2021-07-08 06:25:42'),
(15, 47, 'ML- 614952', '2021-07-08 08:00:11', '2021-07-08 08:00:11'),
(16, 277, 'ML- 892172', '2021-07-08 08:02:34', '2021-07-08 08:02:34'),
(17, 48, 'ML- 352376', '2021-07-09 08:26:23', '2021-07-09 08:26:23'),
(18, 53, 'ML- 252650', '2021-07-09 08:30:25', '2021-07-09 08:30:25'),
(19, 320, 'ML- 516809', '2021-07-09 08:52:52', '2021-07-09 08:52:52'),
(20, 320, 'ML- 103467', '2021-07-09 08:53:12', '2021-07-09 08:53:12'),
(21, 321, 'ML- 971234', '2021-07-09 08:55:29', '2021-07-09 08:55:29'),
(22, 289, 'ML- 451536', '2021-07-09 09:01:28', '2021-07-09 09:01:28'),
(23, 289, 'ML- 309973', '2021-07-09 09:01:45', '2021-07-09 09:01:45'),
(24, 289, 'ML- 970263', '2021-07-09 09:02:07', '2021-07-09 09:02:07'),
(25, 51, 'ML- 243151', '2021-07-09 09:05:40', '2021-07-09 09:05:40'),
(26, 290, 'ML- 241773', '2021-07-09 09:11:05', '2021-07-09 09:11:05'),
(27, 326, 'ML- 371072', '2021-07-09 09:51:19', '2021-07-09 09:51:19'),
(28, 327, 'ML- 362030', '2021-07-09 09:56:23', '2021-07-09 09:56:23'),
(29, 327, 'ML- 350320', '2021-07-09 09:56:47', '2021-07-09 09:56:47'),
(30, 327, 'ML- 414543', '2021-07-09 09:57:48', '2021-07-09 09:57:48'),
(31, 327, 'ML- 588754', '2021-07-09 09:58:02', '2021-07-09 09:58:02'),
(32, 327, 'ML- 630457', '2021-07-09 09:59:25', '2021-07-09 09:59:25'),
(33, 291, 'ML- 301307', '2021-07-09 10:01:53', '2021-07-09 10:01:53'),
(34, 291, 'ML- 521551', '2021-07-09 10:03:43', '2021-07-09 10:03:43'),
(35, 61, 'ML- 436281', '2021-07-27 03:21:21', '2021-07-27 03:21:21'),
(36, 61, 'ML- 504264', '2021-07-27 03:25:08', '2021-07-27 03:25:08'),
(37, 61, 'ML- 122307', '2021-07-27 03:25:48', '2021-07-27 03:25:48'),
(38, 61, 'ML- 149593', '2021-07-27 03:26:21', '2021-07-27 03:26:21'),
(39, 61, 'ML- 504875', '2021-07-27 03:32:27', '2021-07-27 03:32:27'),
(40, 61, 'ML- 713344', '2021-07-27 03:38:03', '2021-07-27 03:38:03'),
(41, 62, 'ML- 459041', '2021-07-27 03:39:16', '2021-07-27 03:39:16'),
(42, 62, 'ML- 350972', '2021-07-27 03:44:30', '2021-07-27 03:44:30'),
(43, 62, 'ML- 654173', '2021-07-27 03:49:03', '2021-07-27 03:49:03'),
(44, 62, 'ML- 749704', '2021-07-27 03:49:33', '2021-07-27 03:49:33'),
(45, 62, 'ML- 908389', '2021-07-27 03:49:36', '2021-07-27 03:49:36'),
(46, 62, 'ML- 997560', '2021-07-27 03:50:10', '2021-07-27 03:50:10'),
(47, 62, 'ML- 197869', '2021-07-27 03:50:54', '2021-07-27 03:50:54'),
(48, 62, 'ML- 810086', '2021-07-27 03:52:12', '2021-07-27 03:52:12'),
(49, 62, 'ML- 324700', '2021-07-27 03:53:18', '2021-07-27 03:53:18'),
(50, 62, 'ML- 942027', '2021-07-27 03:53:57', '2021-07-27 03:53:57'),
(51, 62, 'ML- 383259', '2021-07-27 03:54:38', '2021-07-27 03:54:38'),
(52, 63, 'ML- 903080', '2021-07-27 03:56:11', '2021-07-27 03:56:11'),
(53, 64, 'ML- 186445', '2021-07-27 04:01:13', '2021-07-27 04:01:13'),
(54, 63, 'ML- 309664', '2021-07-27 04:02:37', '2021-07-27 04:02:37'),
(55, 65, 'ML- 204521', '2021-07-27 04:03:57', '2021-07-27 04:03:57'),
(56, 63, 'ML- 623818', '2021-07-27 04:06:58', '2021-07-27 04:06:58'),
(57, 63, 'ML- 357902', '2021-07-27 04:07:21', '2021-07-27 04:07:21'),
(58, 63, 'ML- 518775', '2021-07-27 04:09:10', '2021-07-27 04:09:10'),
(59, 75, 'ML- 766811', '2021-07-27 04:09:37', '2021-07-27 04:09:37'),
(60, 75, 'ML- 960612', '2021-07-27 04:10:00', '2021-07-27 04:10:00'),
(61, 75, 'ML- 712808', '2021-07-27 04:12:29', '2021-07-27 04:12:29'),
(62, 75, 'ML- 198146', '2021-07-27 04:14:14', '2021-07-27 04:14:14'),
(63, 66, 'ML- 910842', '2021-07-27 04:18:19', '2021-07-27 04:18:19'),
(64, 66, 'ML- 383091', '2021-07-27 04:20:09', '2021-07-27 04:20:09'),
(65, 66, 'ML- 679736', '2021-07-27 04:36:19', '2021-07-27 04:36:19'),
(66, 66, 'ML- 300554', '2021-07-27 04:37:18', '2021-07-27 04:37:18'),
(67, 66, 'ML- 949692', '2021-07-27 04:41:57', '2021-07-27 04:41:57'),
(68, 67, 'ML- 847416', '2021-07-27 04:43:03', '2021-07-27 04:43:03'),
(69, 67, 'ML- 797662', '2021-07-27 04:45:19', '2021-07-27 04:45:19'),
(70, 68, 'ML- 450073', '2021-07-28 12:46:08', '2021-07-28 12:46:08');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `default_location` varchar(150) NOT NULL,
  `location_lat` double DEFAULT NULL,
  `location_long` double DEFAULT NULL,
  `location_city` varchar(80) NOT NULL,
  `location_state` varchar(50) DEFAULT NULL,
  `location_country` varchar(50) DEFAULT NULL,
  `is_top_city` tinyint(4) DEFAULT 0,
  `zip_code` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `default_location`, `location_lat`, `location_long`, `location_city`, `location_state`, `location_country`, `is_top_city`, `zip_code`, `created_at`, `updated_at`) VALUES
(1, 'Frankfurt, Deutschland', 50.11092209999999, 8.6821267, 'Frankfurt am Main', 'Hessen', 'Deutschland', 1, NULL, '2020-01-24 15:59:04', '2020-02-01 19:45:37'),
(2, 'München, Deutschland', 48.1351253, 11.5819805, 'München', 'Bayern', 'Deutschland', 1, NULL, '2020-01-25 23:22:38', '2020-02-01 19:45:44'),
(3, 'Stuttgart, Deutschland', 48.7758459, 9.182932099999999, 'Stuttgart', 'Baden-Württemberg', 'Deutschland', 0, NULL, '2020-01-25 23:22:48', '2020-01-25 23:22:48'),
(4, 'Köln, Deutschland', 50.937531, 6.9602786, 'Köln', 'Nordrhein-Westfalen', 'Deutschland', 0, NULL, '2020-01-25 23:23:21', '2020-02-01 19:38:47'),
(5, 'Düsseldorf, Deutschland', 51.2277411, 6.773455599999998, 'Düsseldorf', 'Nordrhein-Westfalen', 'Deutschland', 0, NULL, '2020-01-25 23:23:28', '2020-01-25 23:23:28'),
(6, 'Hamburg, Deutschland', 53.5510846, 9.9936819, 'Hamburg', 'Hamburg', 'Deutschland', 0, NULL, '2020-01-25 23:23:57', '2020-02-01 19:39:05'),
(7, 'Berlin, Deutschland', 52.52000659999999, 13.404954, 'Berlin', 'Berlin', 'Deutschland', 1, NULL, '2020-01-25 23:24:11', '2020-01-25 23:24:51'),
(8, 'Nürnberg, Deutschland', 49.4521018, 11.0766654, 'Nürnberg', 'Bayern', 'Deutschland', 0, NULL, '2020-01-25 23:24:30', '2020-01-25 23:24:30'),
(9, 'München-Flughafen, Deutschland', 48.35469789999999, 11.782909, 'München-Flughafen', 'Bayern', 'Deutschland', 0, NULL, '2020-02-01 19:36:37', '2020-02-01 19:36:37'),
(10, 'Amsterdam, Niederlande', 52.3666969, 4.8945398, 'Amsterdam', 'Noord-Holland', 'Niederlande', 1, NULL, '2020-02-01 19:37:53', '2020-02-01 19:39:10'),
(11, 'Zürich, Schweiz', 47.3768866, 8.541694, 'Zürich', 'Zürich', 'Schweiz', 1, NULL, '2020-02-01 19:38:01', '2020-02-01 19:39:23'),
(16, 'Mannheim, Deutschland', 49.4874592, 8.4660395, 'Mannheim', 'Baden-Württemberg', 'Deutschland', 0, NULL, '2020-02-06 09:29:54', '2020-02-06 09:29:54'),
(17, 'Heidelberg, Deutschland', 49.3987524, 8.6724335, 'Heidelberg', 'Baden-Württemberg', 'Deutschland', 0, NULL, '2020-02-06 09:29:59', '2020-02-06 09:29:59'),
(19, 'Bad Wiessee, Deutschland', 47.7166662, 11.7198942, 'Bad Wiessee', 'Bayern', 'Deutschland', 0, NULL, '2020-02-10 22:15:35', '2020-02-10 22:15:35'),
(20, 'Tegernsee, Deutschland', 47.71315240000001, 11.758016, 'Tegernsee', 'Bayern', 'Deutschland', 0, NULL, '2020-02-10 22:16:25', '2020-02-10 22:16:25'),
(21, 'Kitzbühel, Österreich', 47.4492375, 12.3925407, 'Kitzbühel', 'Tirol', 'Österreich', 0, NULL, '2020-02-10 22:16:48', '2020-02-10 22:16:48'),
(22, 'Rottach-Egern, Deutschland', 47.6892024, 11.7704106, 'Rottach-Egern', 'Bayern', 'Deutschland', 0, NULL, '2020-02-10 22:17:28', '2020-02-10 22:17:28'),
(23, 'Gmund am Tegernsee, Deutschland', 47.75058139999999, 11.7384537, 'Gmund am Tegernsee', 'Bayern', 'Deutschland', 0, NULL, '2020-02-10 22:17:49', '2020-02-10 22:17:49'),
(24, 'Abu Dhabi - Vereinigte Arabische Emirate', 24.453884, 54.3773438, 'Abu Dhabi', 'Abu Dhabi', 'Vereinigte Arabische Emirate', 0, NULL, '2020-02-11 12:22:55', '2020-02-11 12:22:55'),
(25, 'Osnabrück, Deutschland', 52.2799112, 8.0471788, 'Osnabrück', 'Niedersachsen', 'Deutschland', 0, NULL, '2020-02-28 10:08:04', '2020-02-28 10:08:04'),
(26, 'Greven, Deutschland', 52.09651789999999, 7.617109999999999, 'Greven', 'Nordrhein-Westfalen', 'Deutschland', 0, NULL, '2020-02-28 10:10:02', '2020-02-28 10:10:02'),
(27, 'Schönefeld, Deutschland', 52.3923169, 13.5170006, 'Schönefeld', 'Brandenburg', 'Deutschland', 0, NULL, '2020-02-28 10:18:52', '2020-02-28 10:18:52'),
(28, 'Freiburg im Breisgau, Deutschland', 47.9990077, 7.842104299999999, 'Freiburg im Breisgau', 'Baden-Württemberg', 'Deutschland', 0, NULL, '2020-02-28 10:19:56', '2020-02-28 10:19:56'),
(29, 'Saint-Louis, Frankreich', 47.5859949, 7.563934000000001, 'Saint-Louis', 'Grand Est', 'Frankreich', 0, NULL, '2020-02-28 10:48:56', '2020-02-28 10:48:56'),
(30, 'Hannover, Deutschland', 52.3758916, 9.732010400000002, 'Hannover', 'Niedersachsen', 'Deutschland', 0, NULL, '2020-02-28 10:49:54', '2020-02-28 10:49:54'),
(31, 'Langenhagen, Deutschland', 52.4528001, 9.7443992, 'Langenhagen', 'Niedersachsen', 'Deutschland', 0, NULL, '2020-02-28 10:50:46', '2020-02-28 10:50:46'),
(32, 'Hahn, Deutschland', 49.9632914, 7.270699700000001, 'Hahn', 'Rheinland-Pfalz', 'Deutschland', 0, NULL, '2020-02-28 10:52:04', '2020-02-28 10:52:04'),
(33, 'Lautzenhausen, Deutschland', 49.9382136, 7.271479200000001, 'Lautzenhausen', 'Rheinland-Pfalz', 'Deutschland', 0, NULL, '2020-02-28 10:52:29', '2020-02-28 10:52:29'),
(34, 'Bremen, Deutschland', 53.07929619999999, 8.8016936, 'Bremen', 'Bremen', 'Deutschland', 0, NULL, '2020-02-28 10:53:01', '2020-02-28 10:53:01'),
(35, 'Schkeuditz, Deutschland', 51.39446969999999, 12.2240071, 'Schkeuditz', 'Sachsen', 'Deutschland', 0, NULL, '2020-02-28 10:53:37', '2020-02-28 10:53:37'),
(36, 'Leipzig, Deutschland', 51.3396955, 12.3730747, 'Leipzig', 'Sachsen', 'Deutschland', 0, NULL, '2020-02-28 10:53:52', '2020-02-28 10:53:52'),
(37, 'Dortmund, Deutschland', 51.5135872, 7.465298100000001, 'Dortmund', 'Nordrhein-Westfalen', 'Deutschland', 0, NULL, '2020-02-28 10:54:13', '2020-02-28 10:54:13'),
(38, 'Baden-Baden, Deutschland', 48.76564, 8.228524199999999, 'Baden-Baden', 'Baden-Württemberg', 'Deutschland', 0, NULL, '2020-02-28 10:55:01', '2020-02-28 10:55:01'),
(39, 'Rheinmünster, Deutschland', 48.7525614, 8.009578099999999, 'Rheinmünster', 'Baden-Württemberg', 'Deutschland', 0, NULL, '2020-02-28 10:55:33', '2020-02-28 10:55:33'),
(40, 'Dresden, Deutschland', 51.05040880000001, 13.7372621, 'Dresden', 'Sachsen', 'Deutschland', 0, NULL, '2020-02-28 10:56:04', '2020-02-28 10:56:04'),
(41, 'Memmingerberg, Deutschland', 47.990581, 10.2130265, 'Memmingerberg', 'Bayern', 'Deutschland', 0, NULL, '2020-02-28 10:57:00', '2020-02-28 10:57:00'),
(42, 'Ladbergen, Deutschland', 52.1376843, 7.741188200000001, 'Ladbergen', 'Nordrhein-Westfalen', 'Deutschland', 0, NULL, '2020-02-28 10:58:43', '2020-02-28 10:58:43'),
(43, '88046 Friedrichshafen, Deutschland', 47.6617648, 9.480011299999997, 'Friedrichshafen', 'Baden-Württemberg', 'Deutschland', 0, NULL, '2020-02-28 10:59:51', '2020-02-28 10:59:51'),
(44, 'Erfurt, Deutschland', 50.98476789999999, 11.02988, 'Erfurt', 'Thüringen', 'Deutschland', 0, NULL, '2020-02-28 11:00:30', '2020-02-28 11:00:30'),
(45, 'Rostock, Deutschland', 54.0924406, 12.0991466, 'Rostock', 'Mecklenburg-Vorpommern', 'Deutschland', 0, NULL, '2020-02-28 11:00:55', '2020-02-28 11:00:55'),
(46, 'Laage, Deutschland', 53.932222, 12.346667, 'Laage', 'Mecklenburg-Vorpommern', 'Deutschland', 0, NULL, '2020-02-28 11:01:16', '2020-02-28 11:01:16'),
(47, 'Ibiza, Spanien', 38.9067339, 1.4205983, 'Ibiza', 'Islas Baleares', 'Spanien', 0, NULL, '2020-02-28 11:04:16', '2020-02-28 11:04:16'),
(48, 'Saint-Tropez, Frankreich', 43.26768079999999, 6.6407109, 'Saint-Tropez', 'Provence-Alpes-Côte d\'Azur', 'Frankreich', 0, NULL, '2020-02-28 11:05:31', '2020-02-28 11:05:31'),
(49, 'La Môle, Frankreich', 43.2071759, 6.465116999999999, 'La Mole', 'Provence-Alpes-Côte d\'Azur', 'Frankreich', 0, NULL, '2020-02-28 11:06:04', '2020-02-28 11:06:04'),
(50, 'Nizza, Frankreich', 43.7101728, 7.261953200000002, 'Nice', 'Provence-Alpes-Côte d\'Azur', 'Frankreich', 0, NULL, '2020-02-28 11:06:28', '2020-02-28 11:06:28'),
(51, 'Dubai - Vereinigte Arabische Emirate', 25.2048493, 55.2707828, 'Dubai', 'Dubai', 'Vereinigte Arabische Emirate', 1, NULL, '2020-02-28 11:44:31', '2020-02-28 11:47:46'),
(52, 'Freising, Deutschland', 48.4028796, 11.7411846, 'Freising', 'Bayern', 'Deutschland', 0, NULL, '2020-02-29 18:18:35', '2020-02-29 18:18:35'),
(53, '9940 Evergem, Belgium', 51.10997079999999, 3.706722099999999, 'Evergem', 'Vlaanderen', 'Belgien', 0, NULL, '2020-04-25 11:04:26', '2020-04-25 11:04:26'),
(54, 'Brüssel, Belgien', 50.8503396, 4.3517103, 'Brussel', 'Brussels Hoofdstedelijk Gewest', 'Belgien', 0, NULL, '2020-04-25 11:04:33', '2020-04-25 11:04:33');

-- --------------------------------------------------------

--
-- Table structure for table `location_booking_hours`
--

CREATE TABLE `location_booking_hours` (
  `id` bigint(255) UNSIGNED NOT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `location_vehicle`
--

CREATE TABLE `location_vehicle` (
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `location_vehicle`
--

INSERT INTO `location_vehicle` (`location_id`, `vehicle_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-02-04 16:50:37', '2020-02-04 16:50:37');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('c84dc7cd-311a-453e-bf52-40f446877f36', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 78, '{\"greeting\":\"Your Account Is Approved by Moray Limousine\",\"body\":\"Your Account is Registered On Moray Limousines as Partner is  Approved by Admin . ! Enjoy With Us \",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/driver\\/dashboard\"}', NULL, '2020-01-24 14:17:33', '2020-01-24 14:17:33'),
('455b6865-4d2f-4736-b828-8c8f352501ea', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 78, '{\"greeting\":\"You Have a New Notification Moray Limousine\",\"body\":\"Respected Sir\\r\\n your account on moray lamousines as partner has been approved\",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/partner\\/profile\"}', NULL, '2020-01-24 14:18:36', '2020-01-24 14:18:36'),
('9a3fa84a-7599-463d-81a2-a66ce7971b46', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 79, '{\"greeting\":\"Your request is submitted successfully\",\"body\":\"Hello  ! Your booking request For Pick Address  Is Received We Will Let You Know When a Driver & Vehicle will be assigned to your booking. \",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', '2020-05-29 09:56:38', '2020-01-31 19:28:00', '2020-05-29 09:56:38'),
('c0db7e23-aa85-464d-80ec-06e9fd9d37ef', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request .\",\"body\":\"BOOKING DETAILS\\n                Pick Date  -   2020-02-02\\n                Pick Address  -   Frankfurt Airport (FRA), Frankfurt, Germany\\n                Drop Address  -   Berliner Dom, Am Lustgarten, Berlin, Germany\\n                Selected Class  -   Berliner Dom, Am Lustgarten, Berlin, Germany\\n                Travel Amount  -  1115.07\\n                Net Amount  -  1137.07\\n                Payment Status  -   paid\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/booking\\/details\\/4\"}', '2020-02-01 10:32:03', '2020-01-31 19:28:01', '2020-02-01 10:32:03'),
('43267208-25b4-462c-9e10-e39087c06fbc', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 79, '{\"greeting\":\"Your request is submitted successfully\",\"body\":\"Hello  ! Your booking request For Pick Address  Is Received We Will Let You Know When a Driver & Vehicle will be assigned to your booking. \",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', '2020-05-29 09:56:38', '2020-02-01 10:29:48', '2020-05-29 09:56:38'),
('6e4a8ccd-2d02-4466-b02c-029f70d392ed', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request .\",\"body\":\"BOOKING DETAILS\\n                Pick Date  -   2020-02-08\\n                Pick Address  -   Frankfurt Airport (FRA), Frankfurt, Germany\\n                Drop Address  -   \\n                Selected Class  -   \\n                Travel Amount  -  155.40\\n                Net Amount  -  177.40\\n                Payment Status  -   paid\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/booking\\/details\\/7\"}', '2020-02-01 10:32:02', '2020-02-01 10:29:49', '2020-02-01 10:32:02'),
('fbaedce6-7246-4fea-9b09-4cb1b35c3650', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 80, '{\"greeting\":\"Your request is submitted successfully\",\"body\":\"Hello  ! Your booking request For Pick Address  Is Received We Will Let You Know When a Driver & Vehicle will be assigned to your booking. \",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', '2020-02-01 16:05:22', '2020-02-01 16:04:55', '2020-02-01 16:05:22'),
('f0e63300-2ed0-4ce4-8b2a-7a1609f533ba', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request .\",\"body\":\"BOOKING DETAILS\\n                Pick Date  -   2020-02-01\\n                Pick Address  -   Berlin, Germany\\n                Drop Address  -   Frankfurt, Germany\\n                Selected Class  -   Frankfurt, Germany\\n                Travel Amount  -  1090.98\\n                Net Amount  -  1178.98\\n                Payment Status  -   paid\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/booking\\/details\\/9\"}', '2020-02-01 21:18:14', '2020-02-01 16:04:56', '2020-02-01 21:18:14'),
('b70e97b4-589e-4d83-b817-d561942eebe0', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 79, '{\"greeting\":\"Your request is submitted successfully\",\"body\":\"Hello  ! Your booking request For Pick Address  Is Received We Will Let You Know When a Driver & Vehicle will be assigned to your booking. \",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', '2020-05-29 09:56:38', '2020-02-01 17:11:59', '2020-05-29 09:56:38'),
('1a4b8599-b498-4cae-86a4-c6766152ccdc', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request .\",\"body\":\"BOOKING DETAILS\\n                Pick Date  -   2020-02-08\\n                Pick Address  -   Koblenzer Stra\\u00dfe 2, Frankfurt am Main, Germany\\n                Drop Address  -   Frankfurt-Flughafen, Frankfurt, Germany\\n                Selected Class  -   Frankfurt-Flughafen, Frankfurt, Germany\\n                Travel Amount  -  58.00\\n                Net Amount  -  134.00\\n                Payment Status  -   paid\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/booking\\/details\\/10\"}', '2020-02-01 21:18:14', '2020-02-01 17:12:01', '2020-02-01 21:18:14'),
('9a3995bd-146d-4841-92fb-d0106d9b646d', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 81, '{\"greeting\":\"Your request is submitted successfully\",\"body\":\"Hello  ! Your booking request For Pick Address  Is Received We Will Let You Know When a Driver & Vehicle will be assigned to your booking. \",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', '2020-02-01 12:58:59', '2020-02-01 12:58:12', '2020-02-01 12:58:59'),
('242c495e-1753-41c7-b14e-1df7f7c786eb', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request .\",\"body\":\"BOOKING DETAILS\\n                Pick Date  -   2020-02-15\\n                Pick Address  -   Koblenzer Stra\\u00dfe 2, Frankfurt am Main, Deutschland\\n                Drop Address  -   Frankfurt-Flughafen, Frankfurt am Main, Deutschland\\n                Selected Class  -   Frankfurt-Flughafen, Frankfurt am Main, Deutschland\\n                Travel Amount  -  58.00\\n                Net Amount  -  124.00\\n                Payment Status  -   paid\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/booking\\/details\\/11\"}', '2020-02-01 21:18:14', '2020-02-01 12:58:12', '2020-02-01 21:18:14'),
('630cda46-3862-4b56-b8d2-2cd61e2e7d04', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 82, '{\"greeting\":\"Your Account Is Registered on Moray Limousine By Using This Email Address\",\"body\":\"You are Registered On Moray Limousines by Admin As a Partner. Please Check your account By using password : \\\" Moraygroup321 \\\"  ! Enjoy With Us.  \",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', NULL, '2020-02-03 00:15:17', '2020-02-03 00:15:17'),
('86dfdeb2-703e-4fd2-8e87-86e5ca5809db', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 82, '{\"greeting\":\"Your Account Is Approved by Moray Limousine\",\"body\":\"Your Account is Registered On Moray Limousines as Partner is  Approved by Admin . ! Enjoy With Us \",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/driver\\/dashboard\"}', NULL, '2020-02-03 00:16:37', '2020-02-03 00:16:37'),
('9804bc02-1208-47f6-929a-3ba435901c7a', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 83, '{\"greeting\":\"Your Account Is Registered on Moray Limousine By Using This Email Address\",\"body\":\"You are Registered On Moray Limousines by Admin As a Partner. Please Check your account By using password : \\\" Moraygroup321 \\\"  ! Enjoy With Us.  \",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', NULL, '2020-02-03 00:30:09', '2020-02-03 00:30:09'),
('f978b05d-76d7-4a10-ba6e-eda05da7e005', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 83, '{\"greeting\":\"Your Account Is Approved by Moray Limousine\",\"body\":\"Your Account is Registered On Moray Limousines as Partner is  Approved by Admin . ! Enjoy With Us \",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/driver\\/dashboard\"}', NULL, '2020-02-03 00:30:15', '2020-02-03 00:30:15'),
('8fa7883c-caeb-48a2-a21c-a3736f1c9c55', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 83, '{\"greeting\":\"New Vehicle is Added Successfully\",\"body\":\"You Add a new Vehicle On Moray Limousines  Please Upload Vehicle Documents In order to get Approved By Admin ! Enjoy With Us.  \",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"partner\\/dashboard\"}', NULL, '2020-02-04 16:50:38', '2020-02-04 16:50:38'),
('dd160770-854b-412b-bed5-4e37d6ce6e3c', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 12, '{\"greeting\":\"A New Vehicle Successfully Added on Moray-Limousines\",\"body\":\"A New Vehicle Added on Moray-Limousines Please check the Details of vehicle by visiting the web site\",\"thanks_text\":\"Moray Limousine Site\",\"actionLink\":\"View My Site\",\"0\":\"admin\\/vehicle\\/vehicleDetail\\/1\"}', '2020-02-06 16:14:17', '2020-02-04 16:50:39', '2020-02-06 16:14:17'),
('78ca015b-058d-4516-a3f9-de2ee3e11759', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 85, '{\"greeting\":\"Your Account Is Approved by Moray Limousine\",\"body\":\"Your Account is Registered On Moray Limousines is Approved by Admin . ! Enjoy With Us.  \",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/driver\\/dashboard\"}', NULL, '2020-02-04 16:52:50', '2020-02-04 16:52:50'),
('23775435-0027-4be2-a466-9e0b71efba10', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 12, '{\"greeting\":\"You have a new enquiry from a user on Moray Limousines\",\"body\":\"Sehr geehrte Damen und Herren. Ich suche momentan eine Anstellung als Fahrer \\/ Chauffeur. Ich habe jahrelange Erfahrung u.a. im Statistischen Bundesamt gesammelt. Gerne w\\u00fcrde ich mich n\\u00e4her bei Ihnen vorstellen.\\r\\nMit freundlichen Gr\\u00fc\\u00dfen\\r\\nPeter Brunkhorst\",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"admin\\/index\"}', '2020-02-06 16:14:17', '2020-02-05 17:27:39', '2020-02-06 16:14:17'),
('1b7706d1-3a6b-40a5-bb4b-49fe163d60e5', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 86, '{\"greeting\":\"Your enquiry is received on Moray Limousines\",\"body\":\"Your enquiry is received on Moray Limousines Thanks for your response we will respond you ( if needed ) soon.\",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"user\\/profile\"}', NULL, '2020-02-05 17:27:40', '2020-02-05 17:27:40'),
('c76edf3d-c12c-4029-804b-1a91f8f39e36', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 12, '{\"greeting\":\"You have a new enquiry from a user on Moray Limousines\",\"body\":\"Hi this is just testing an email\",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"admin\\/index\"}', '2020-06-30 13:34:04', '2020-03-19 06:33:53', '2020-06-30 13:34:04'),
('f54334d6-0cb7-473f-92be-4f2bdd88932a', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 12, '{\"greeting\":\"Your enquiry is received on Moray Limousines\",\"body\":\"Your enquiry is received on Moray Limousines Thanks for your response we will respond you ( if needed ) soon.\",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"user\\/profile\"}', '2020-06-30 13:34:04', '2020-03-19 06:33:55', '2020-06-30 13:34:04'),
('b1925542-6cf7-44fb-9aef-95bb031f4d29', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 157, '{\"greeting\":\"Your request is submitted successfully\",\"body\":\"Hello  ! Your booking request For Pick Address  Is Received We Will Let You Know When a Driver & Vehicle will be assigned to your booking. \",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', NULL, '2020-04-30 15:46:28', '2020-04-30 15:46:28'),
('2ed273ad-c27c-4ae3-a324-65dd57c9d5fb', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request .\",\"body\":\"BOOKING DETAILS\\n                Pick Date  -   2020-05-03\\n                Pick Address  -   Mainufer Frankfurt, Frankfurt am Main, Deutschland\\n                Drop Address  -   Bahnhof Eschborn, Eschborn, Deutschland\\n                Selected Class  -   Bahnhof Eschborn, Eschborn, Deutschland\\n                Travel Amount  -  85.76\\n                Net Amount  -  85.76\\n                Payment Status  -   paid\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/booking\\/details\\/35\"}', '2020-06-30 13:34:04', '2020-04-30 15:46:29', '2020-06-30 13:34:04'),
('7b238513-2fb6-4da0-a696-e12d766893bd', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 12, '{\"greeting\":\"You have a new enquiry from a user on Moray Limousines\",\"body\":\"testing email features of limo site\",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"admin\\/index\"}', '2020-06-30 13:34:04', '2020-05-29 09:56:05', '2020-06-30 13:34:04'),
('6a048c82-6005-46e6-9821-e1466463bf85', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 79, '{\"greeting\":\"Your enquiry is received on Moray Limousines\",\"body\":\"Your enquiry is received on Moray Limousines Thanks for your response we will respond you ( if needed ) soon.\",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"user\\/profile\"}', '2020-05-29 09:56:38', '2020-05-29 09:56:05', '2020-05-29 09:56:38'),
('95e557a3-66f7-4313-99f2-db4835bb33fd', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 12, '{\"greeting\":\"You have a new enquiry from a user on Moray Limousines\",\"body\":\"test\",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"admin\\/index\"}', '2020-06-30 13:34:04', '2020-05-29 10:00:34', '2020-06-30 13:34:04'),
('556546ba-df04-4432-aff7-36b034b73568', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 84, '{\"greeting\":\"Your enquiry is received on Moray Limousines\",\"body\":\"Your enquiry is received on Moray Limousines Thanks for your response we will respond you ( if needed ) soon.\",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"user\\/profile\"}', '2020-05-29 10:04:58', '2020-05-29 10:00:37', '2020-05-29 10:04:58'),
('3c05215b-802b-4a79-9e6c-6e43a759ac91', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 12, '{\"greeting\":\"You have a new enquiry from a user on Moray Limousines\",\"body\":\"test\",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"admin\\/index\"}', '2020-06-30 13:34:04', '2020-05-29 10:37:49', '2020-06-30 13:34:04'),
('f0369774-271e-48d3-9370-bb0dfe8b6ef3', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 81, '{\"greeting\":\"Your enquiry is received on Moray Limousines\",\"body\":\"Your enquiry is received on Moray Limousines Thanks for your response we will respond you ( if needed ) soon.\",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"user\\/profile\"}', '2021-06-27 09:14:42', '2020-05-29 10:37:50', '2021-06-27 09:14:42'),
('e34f1a52-5c74-4f49-baed-b09f5a0e7aa2', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 12, '{\"greeting\":\"You have a new enquiry from a user on Moray Limousines\",\"body\":\"testing email again via contact us with booking@moray-limosines.com account\",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"admin\\/index\"}', '2020-06-30 13:34:04', '2020-05-29 10:49:43', '2020-06-30 13:34:04'),
('21530d0b-0f74-4706-a6be-c71c40c14d2e', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 79, '{\"greeting\":\"Your enquiry is received on Moray Limousines\",\"body\":\"Your enquiry is received on Moray Limousines Thanks for your response we will respond you ( if needed ) soon.\",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"user\\/profile\"}', NULL, '2020-05-29 10:49:44', '2020-05-29 10:49:44'),
('4bf32f49-0591-4a44-9b51-a4dc05ce410a', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 238, '{\"greeting\":\"Your request is submitted successfully\",\"body\":\"Hello  ! Your booking request For Pick Address  Is Received We Will Let You Know When a Driver & Vehicle will be assigned to your booking. \",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', NULL, '2020-06-07 13:35:53', '2020-06-07 13:35:53'),
('c26ffaf7-89b7-4cb4-b417-329f83558957', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request .\",\"body\":\"BOOKING DETAILS\\n                Pick Date  -   2020-06-08\\n                Pick Address  -   Flughafen Berlin-Tegel (TXL), Saatwinkler Damm, Berlin, Deutschland\\n                Drop Address  -   Hotel Barnimer Hof, Am Markt, Wandlitz, Deutschland\\n                Selected Class  -   Hotel Barnimer Hof, Am Markt, Wandlitz, Deutschland\\n                Travel Amount  -  67.96\\n                Net Amount  -  67.96\\n                Payment Status  -   paid\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/booking\\/details\\/40\"}', '2020-06-30 13:34:04', '2020-06-07 13:35:53', '2020-06-30 13:34:04'),
('3a51d9a7-a443-427f-8365-9ba7ff2e0714', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 84, '{\"greeting\":\"Your request is submitted successfully\",\"body\":\"Hello  ! Your booking request For Pick Address  Is Received We Will Let You Know When a Driver & Vehicle will be assigned to your booking. \",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', '2020-08-07 10:35:16', '2020-06-30 13:28:08', '2020-08-07 10:35:16'),
('d6e19e2c-8508-48f0-b43e-0f894d4a4d6c', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request .\",\"body\":\"BOOKING DETAILS\\n                Pick Date  -   2020-07-02\\n                Pick Address  -   Frankfurt Airport (FRA), Frankfurt, Germany\\n                Drop Address  -   Berlin Hauptbahnhof, Europaplatz, Berlin, Germany\\n                Selected Class  -   Berlin Hauptbahnhof, Europaplatz, Berlin, Germany\\n                Travel Amount  -  1099.01\\n                Net Amount  -  1198.01\\n                Payment Status  -   paid\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/booking\\/details\\/43\"}', '2020-06-30 13:34:04', '2020-06-30 13:28:09', '2020-06-30 13:34:04'),
('9e469369-0878-4439-ae2b-cd23b8dafbd6', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 295, '{\"greeting\":\"Your Booking Request is approved by Moray Limousine\",\"body\":\"Your Booking Request is approved by Moray Limousine which Niedenau 60, Frankfurt am Main, Deutschland And Pick Time is  03:45:00 ! Enjoy With Us.  \",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', NULL, '2020-07-06 10:08:11', '2020-07-06 10:08:11'),
('1588bb63-9c30-440d-8d13-36829f726c48', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 12, '{\"greeting\":\"Your Booking Request is  not approved by Moray Limousine\",\"body\":\"Your Booking Request is not approved by Moray Limousine which Niedenau 60, Frankfurt am Main, Deutschland And Pick Time is  03:45:00\",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', '2020-08-07 10:41:39', '2020-07-06 18:20:12', '2020-08-07 10:41:39'),
('c9b6bc49-a46c-489b-8113-2dce9652eaca', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 12, '{\"greeting\":\"Your request is submitted successfully\",\"body\":\"Hello  ! Your booking request For Pick Address  Is Received We Will Let You Know When a Driver & Vehicle will be assigned to your booking. \",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', '2020-08-07 10:41:39', '2020-07-09 15:01:02', '2020-08-07 10:41:39'),
('4706de05-eae2-46c6-8d55-de6a40f70e76', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request .\",\"body\":\"BOOKING DETAILS\\n                Pick Date  -   2020-07-10\\n                Pick Address  -   Wilhelmsh\\u00f6her Stra\\u00dfe 134, Frankfurt am Main, Deutschland\\n                Drop Address  -   myLIFT - Die g\\u00fcnstige Alternative zum Taxi Frankfurt, Mainzer Landstra\\u00dfe, Frankfurt am Main, Deutschland\\n                Selected Class  -   myLIFT - Die g\\u00fcnstige Alternative zum Taxi Frankfurt, Mainzer Landstra\\u00dfe, Frankfurt am Main, Deutschland\\n                Travel Amount  -  2.28\\n                Net Amount  -  2.28\\n                Payment Status  -   paid\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/booking\\/details\\/50\"}', '2020-08-07 10:41:39', '2020-07-09 15:01:05', '2020-08-07 10:41:39'),
('053503a3-273c-487f-831c-0c088e875c0b', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 299, '{\"greeting\":\"Your request is submitted successfully\",\"body\":\"Hello  ! Your booking request For Pick Address  Is Received We Will Let You Know When a Driver & Vehicle will be assigned to your booking. \",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', NULL, '2020-07-11 11:53:36', '2020-07-11 11:53:36'),
('beaf30bf-56b0-4dee-84d0-f63ed5014d54', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request .\",\"body\":\"BOOKING DETAILS\\n                Pick Date  -   2020-07-13\\n                Pick Address  -   Holbeinstra\\u00dfe 61, Frankfurt am Main, Deutschland\\n                Drop Address  -   Feldbergstra\\u00dfe 35, Frankfurt am Main, Deutschland\\n                Selected Class  -   Feldbergstra\\u00dfe 35, Frankfurt am Main, Deutschland\\n                Travel Amount  -  2.28\\n                Net Amount  -  2.28\\n                Payment Status  -   paid\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/booking\\/details\\/52\"}', '2020-08-07 10:41:39', '2020-07-11 11:53:37', '2020-08-07 10:41:39'),
('33f99f6f-4a53-434a-82b1-99f03723e636', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 12, '{\"greeting\":\"Your Booking Request is  not approved by Moray Limousine\",\"body\":\"Your Booking Request is not approved by Moray Limousine which Wilhelmsh\\u00f6her Stra\\u00dfe 134, Frankfurt am Main, Deutschland And Pick Time is  18:50:00\",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', '2020-08-07 10:41:39', '2020-07-11 11:58:21', '2020-08-07 10:41:39'),
('49a31688-79ff-423b-aac8-4803465b241a', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 299, '{\"greeting\":\"Your Booking Request is  not approved by Moray Limousine\",\"body\":\"Your Booking Request is not approved by Moray Limousine which Holbeinstra\\u00dfe 61, Frankfurt am Main, Deutschland And Pick Time is  07:15:00\",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', NULL, '2020-07-11 12:00:53', '2020-07-11 12:00:53'),
('70d49de6-d83d-47c0-b849-dd694e8a20ae', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 708, '{\"greeting\":\"Your request is submitted successfully\",\"body\":\"Hello  ! Your booking request For Pick Address  Is Received We Will Let You Know When a Driver & Vehicle will be assigned to your booking. \",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', NULL, '2020-10-25 17:59:24', '2020-10-25 17:59:24'),
('9a1dc459-e944-433a-995c-92a418aa2645', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request .\",\"body\":\"BOOKING DETAILS\\n                Pick Date  -   2020-10-26\\n                Pick Address  -   Waldplateau 86, Kelkheim (Taunus), Deutschland\\n                Drop Address  -   Lessing-Gymnasium, F\\u00fcrstenbergerstra\\u00dfe, Frankfurt am Main, Deutschland\\n                Selected Class  -   Lessing-Gymnasium, F\\u00fcrstenbergerstra\\u00dfe, Frankfurt am Main, Deutschland\\n                Travel Amount  -  54.62\\n                Net Amount  -  54.62\\n                Payment Status  -   paid\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/booking\\/details\\/54\"}', '2021-06-11 10:02:36', '2020-10-25 17:59:25', '2021-06-11 10:02:36'),
('1c26ec4c-b4a4-4e06-bb20-b503e581b6e5', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 846, '{\"greeting\":\"Your request is submitted successfully\",\"body\":\"Hello  ! Your booking request For Pick Address  Is Received We Will Let You Know When a Driver & Vehicle will be assigned to your booking. \",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', NULL, '2021-02-08 21:19:45', '2021-02-08 21:19:45'),
('cda93e88-8471-4901-a78a-e52b5af9211c', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request .\",\"body\":\"BOOKING DETAILS\\n                Pick Date  -   2021-02-09\\n                Pick Address  -   Adolfsallee 31, Wiesbaden, Germany\\n                Drop Address  -   Niedenau 45, Frankfurt, Germany\\n                Selected Class  -   Niedenau 45, Frankfurt, Germany\\n                Travel Amount  -  84.39\\n                Net Amount  -  84.39\\n                Payment Status  -   paid\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/booking\\/details\\/55\"}', '2021-06-11 10:02:36', '2021-02-08 21:19:47', '2021-06-11 10:02:36'),
('b196f4fc-c999-4165-a780-963848037e6e', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 846, '{\"greeting\":\"Your Booking Request is  not approved by Moray Limousine\",\"body\":\"Your Booking Request is not approved by Moray Limousine which Adolfsallee 31, Wiesbaden, Germany And Pick Time is  10:30:00\",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', NULL, '2021-02-08 21:27:50', '2021-02-08 21:27:50'),
('1f2415c5-cd54-49be-892b-7a272b7f6438', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 1231, '{\"greeting\":\"Your Account Is Approved by Moray Limousine\",\"body\":\"Your Account is Registered On Moray Limousines is Approved by Admin . ! Enjoy With Us.  \",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/driver\\/dashboard\"}', NULL, '2021-06-15 07:43:49', '2021-06-15 07:43:49'),
('c5961ba3-09dc-4a35-8937-11bc37a40f3f', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 81, '{\"greeting\":\"Your request is submitted successfully\",\"body\":\"Hello  ! Your booking request For Pick Address  Is Received We Will Let You Know When a Driver & Vehicle will be assigned to your booking. \",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', '2021-06-29 12:08:12', '2021-06-29 12:05:49', '2021-06-29 12:08:12'),
('9313cf82-d0fc-4a83-bb21-cae5fe9892c5', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request .\",\"body\":\"BOOKING DETAILS\\n                Pick Date  -   2021-06-30\\n                Pick Address  -   Hilton Frankfurt City Centre, Hochstra\\u00dfe, Frankfurt, Deutschland\\n                Drop Address  -   Flughafen Frankfurt (FRA), Frankfurt, Deutschland\\n                Selected Class  -   Flughafen Frankfurt (FRA), Frankfurt, Deutschland\\n                Travel Amount  -  55.66\\n                Net Amount  -  55.66\\n                Payment Status  -   paid\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/booking\\/details\\/183\"}', '2021-06-30 08:56:19', '2021-06-29 12:05:50', '2021-06-30 08:56:19'),
('6a6c183b-bde2-4797-82fc-5703b8e54755', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 1263, '{\"greeting\":\"Your request is submitted successfully\",\"body\":\"Hello  ! Your booking request For Pick Address  Is Received We Will Let You Know When a Driver & Vehicle will be assigned to your booking. \",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', NULL, '2021-06-29 15:49:35', '2021-06-29 15:49:35'),
('6ad16872-a7c7-4eec-9e8e-a1cddd7a301a', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request .\",\"body\":\"BOOKING DETAILS\\n                Pick Date  -   2021-07-03\\n                Pick Address  -   Roomers, Frankfurt, a Member of Design Hotels, Gutleutstra\\u00dfe, Frankfurt am Main, Deutschland\\n                Drop Address  -   Hans-Flei\\u00dfner-Stra\\u00dfe 50, Egelsbach, Deutschland\\n                Selected Class  -   Hans-Flei\\u00dfner-Stra\\u00dfe 50, Egelsbach, Deutschland\\n                Travel Amount  -  95.50\\n                Net Amount  -  95.50\\n                Payment Status  -   paid\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/booking\\/details\\/187\"}', '2021-06-30 08:56:19', '2021-06-29 15:49:36', '2021-06-30 08:56:19'),
('d9be5c43-0ee0-4dee-8482-e97b83307fb3', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 1263, '{\"greeting\":\"Booking Canceled\",\"body\":\"You Cancelled Your Booking Request On Moray Limousine Which Pick Address Is   Roomers, Frankfurt, a Member of Design Hotels, Gutleutstra\\u00dfe, Frankfurt am Main, Deutschland And Pick Time Was  11:45:00\",\"thanks_text\":\"Thanks For being Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/admin\\/index\"}', NULL, '2021-06-29 15:50:37', '2021-06-29 15:50:37'),
('ec57f556-53aa-4884-9961-44d7e6f7f4c8', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 1263, '{\"greeting\":\"Booking Canceled\",\"body\":\"You Cancelled Your Booking Request On Moray Limousine Which Pick Address Is   Roomers, Frankfurt, a Member of Design Hotels, Gutleutstra\\u00dfe, Frankfurt am Main, Deutschland And Pick Time Was  11:45:00\",\"thanks_text\":\"Thanks For being Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/admin\\/index\"}', NULL, '2021-06-29 15:50:42', '2021-06-29 15:50:42'),
('8ec72c4c-609b-4f9e-bcbb-39dcec245fc7', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 1263, '{\"greeting\":\"Booking Canceled\",\"body\":\"You Cancelled Your Booking Request On Moray Limousine Which Pick Address Is   Roomers, Frankfurt, a Member of Design Hotels, Gutleutstra\\u00dfe, Frankfurt am Main, Deutschland And Pick Time Was  11:45:00\",\"thanks_text\":\"Thanks For being Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/admin\\/index\"}', NULL, '2021-06-29 15:50:45', '2021-06-29 15:50:45'),
('c637fb12-415c-44b6-a2f0-de8b47aa7b1d', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 1267, '{\"greeting\":\"Your Account Is Registered on Moray Limousine By Using This Email Address\",\"body\":\"You are Registered On Moray Limousines by Admin As a Partner. Please Check your account By using password : \\\" 123456 \\\"  ! Enjoy With Us.  \",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', NULL, '2021-06-30 09:11:04', '2021-06-30 09:11:04'),
('19b60142-62bb-416d-a2ee-c677dfea1ba2', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 1263, '{\"greeting\":\"Your Booking Request is  not approved by Moray Limousine\",\"body\":\"Your Booking Request is not approved by Moray Limousine which Roomers, Frankfurt, a Member of Design Hotels, Gutleutstra\\u00dfe, Frankfurt am Main, Deutschland And Pick Time is  11:30:00\",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', NULL, '2021-06-30 09:23:52', '2021-06-30 09:23:52'),
('fc87045d-860a-477d-94f4-123eae589915', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 1267, '{\"greeting\":\"Your Account Is Approved by Moray Limousine\",\"body\":\"Your Account is Registered On Moray Limousines as Partner is  Approved by Admin . ! Enjoy With Us \",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/driver\\/dashboard\"}', NULL, '2021-06-30 09:24:28', '2021-06-30 09:24:28'),
('cc95302b-9993-4bed-bb98-da7083dd0c1d', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request .\",\"body\":\"BOOKING DETAILS\\n                Pick Date  -   22-13-2018\\n                Pick Address  -   pindi road kohat\\n                Drop Address  -   babribanda kohat\\n                Selected Class  -   islamabad is \\n                Travel Amount  -  300\\n                Net Amount  -    600\\n                Payment Status  -   px_set_targetencoding(pxdoc, encoding)\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\"}', NULL, '2021-07-01 09:33:48', '2021-07-01 09:33:48'),
('8ae26c2a-5b4a-4dab-bb8b-0a0877c04502', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request .\",\"body\":\"BOOKING DETAILS\\n                Pick Date  -   22-13-2018\\n                Pick Address  -   pindi road kohat\\n                Drop Address  -   babribanda kohat\\n                Selected Class  -   islamabad is \\n                Travel Amount  -  300\\n                Net Amount  -    600\\n                Payment Status  -   px_set_targetencoding(pxdoc, encoding)\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\"}', NULL, '2021-07-01 09:36:11', '2021-07-01 09:36:11'),
('3b04c2aa-21af-4308-8f09-f8fac7ccb19b', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"<b>You Have a New Booking Request<\\/b> .\",\"body\":\"BOOKING DETAILS\\n                Pick Date  -   22-13-2018\\n                Pick Address  -   pindi road kohat\\n                Drop Address  -   babribanda kohat\\n                Selected Class  -   islamabad is \\n                Travel Amount  -  300\\n                Net Amount  -    600\\n                Payment Status  -   px_set_targetencoding(pxdoc, encoding)\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\"}', NULL, '2021-07-01 09:36:53', '2021-07-01 09:36:53'),
('32a85daa-4818-472e-9f1a-9920147de3bb', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"<b>You Have a New Booking Request.<\\/b>\",\"body\":\"BOOKING DETAILS\\n                Pick Date  -   22-13-2018\\n                Pick Address  -   pindi road kohat\\n                Drop Address  -   babribanda kohat\\n                Selected Class  -   islamabad is \\n                Travel Amount  -  300\\n                Net Amount  -    600\\n                Payment Status  -   px_set_targetencoding(pxdoc, encoding)\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\"}', NULL, '2021-07-01 09:42:38', '2021-07-01 09:42:38'),
('7efb0942-8c0c-4b5c-b1bf-be134dd6b10a', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"<b>You Have a New Booking Request.<\\/b>\",\"body\":\"BOOKING DETAILS\\n                Pick Date  -   22-13-2018\\n                Pick Address  -   pindi road kohat\\n                Drop Address  -   babribanda kohat\\n                Selected Class  -   islamabad is \\n                Travel Amount  -  300\\n                Net Amount  -    600\\n                Payment Status  -   px_set_targetencoding(pxdoc, encoding)\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\"}', NULL, '2021-07-01 09:43:05', '2021-07-01 09:43:05'),
('63a8eed4-afad-4979-b207-d3be31190e75', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"<b>You Have a New Booking Request.<\\/b>\",\"body\":\"BOOKING DETAILS\\n                Pick Date  -   22-13-2018\\n                Pick Address  -   pindi road kohat\\n                Drop Address  -   babribanda kohat\\n                Selected Class  -   islamabad is \\n                Travel Amount  -  300\\n                Net Amount  -    600\\n                Payment Status  -   px_set_targetencoding(pxdoc, encoding)\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\"}', NULL, '2021-07-01 09:43:49', '2021-07-01 09:43:49'),
('ccc557b5-b692-4ab2-850b-f238f7e733d1', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"<b>You Have a New Booking Request.<\\/b>\",\"body\":\"BOOKING DETAILS\\n                Pick Date  -   <b>22-13-2018<\\/b>\\n                Pick Address  -   pindi road kohat\\n                Drop Address  -   babribanda kohat\\n                Selected Class  -   islamabad is \\n                Travel Amount  -  300\\n                Net Amount  -    600\\n                Payment Status  -   px_set_targetencoding(pxdoc, encoding)\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\"}', NULL, '2021-07-01 09:44:35', '2021-07-01 09:44:35'),
('5d49da54-1be9-47e6-9541-30ef555c7996', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"<b>You Have a New Booking Request.<\\/b>\",\"body\":\"<p style=\'text-align:left\'>BOOKING DETAILS\\n                Pick Date  -   <b>22-13-2018<\\/b>\\n                Pick Address  -   pindi road kohat\\n                Drop Address  -   babribanda kohat\\n                Selected Class  -   islamabad is \\n                Travel Amount  -  300\\n                Net Amount  -    600\\n                Payment Status  -   px_set_targetencoding(pxdoc, encoding)<\\/p>\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\"}', NULL, '2021-07-01 09:52:33', '2021-07-01 09:52:33'),
('e4b9102d-a11d-403b-a791-8655228cb699', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"<b>You Have a New Booking Request.<\\/b>\",\"body\":\"<center>>BOOKING DETAILS\\n                Pick Date  -   <b>22-13-2018<\\/b>\\n                Pick Address  -   pindi road kohat\\n                Drop Address  -   babribanda kohat\\n                Selected Class  -   islamabad is \\n                Travel Amount  -  300\\n                Net Amount  -    600\\n                Payment Status  -   px_set_targetencoding(pxdoc, encoding)<\\/ceter>\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\"}', NULL, '2021-07-01 09:53:17', '2021-07-01 09:53:17'),
('0a567f10-b6d2-4502-9235-fa341f09a70f', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"<b>You Have a New Booking Request.<\\/b>\",\"body\":\"<center>BOOKING DETAILS\\n                Pick Date  -   <b>22-13-2018<\\/b>\\n                Pick Address  -   pindi road kohat\\n                Drop Address  -   babribanda kohat\\n                Selected Class  -   islamabad is \\n                Travel Amount  -  300\\n                Net Amount  -    600\\n                Payment Status  -   px_set_targetencoding(pxdoc, encoding)<\\/ceter>\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\"}', NULL, '2021-07-01 09:53:38', '2021-07-01 09:53:38'),
('a5196ae1-81b9-48b4-a4b0-bfa0a2a8fbd1', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"<b>You Have a New Booking Request.<\\/b>\",\"body\":\"<p style=\'float:left\'>BOOKING DETAILS\\n                Pick Date  -   <b>22-13-2018<\\/b>\\n                Pick Address  -   pindi road kohat\\n                Drop Address  -   babribanda kohat\\n                Selected Class  -   islamabad is \\n                Travel Amount  -  300\\n                Net Amount  -    600\\n                Payment Status  -   px_set_targetencoding(pxdoc, encoding)<\\/p>\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\"}', NULL, '2021-07-01 09:55:58', '2021-07-01 09:55:58'),
('922b0a98-6887-4d67-9c9d-ec2af6626349', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":\"BOOKING DETAILS\\n                Pick Date  -   <b>22-13-2018<\\/b>\\n                Pick Address  -   pindi road kohat\\n                Drop Address  -   babribanda kohat\\n                Selected Class  -   islamabad is \\n                Travel Amount  -  300\\n                Net Amount  -    600\\n                Payment Status  -   px_set_targetencoding(pxdoc, encoding)\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\"}', NULL, '2021-07-01 10:03:50', '2021-07-01 10:03:50'),
('0f63bd14-b319-431e-93ef-504bef189d35', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":\"BOOKING DETAILS\\n                Pick Date  -   <b>22-13-2018<\\/b>\\n                Pick Address  -   pindi road kohat\\n                Drop Address  -   babribanda kohat\\n                Selected Class  -   islamabad is \\n                Travel Amount  -  300\\n                Net Amount  -    600\\n                Payment Status  -   px_set_targetencoding(pxdoc, encoding)\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\"}', NULL, '2021-07-01 10:06:11', '2021-07-01 10:06:11'),
('33f8ea4a-4d7a-4f33-956e-85169a5e8ff8', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":\"BOOKING DETAILS\\n                Pick Date  -   <b>22-13-2018<\\/b>\\n                Pick Address  -   pindi road kohat\\n                Drop Address  -   babribanda kohat\\n                Selected Class  -   islamabad is \\n                Travel Amount  -  300\\n                Net Amount  -    600\\n                Payment Status  -   px_set_targetencoding(pxdoc, encoding)\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\"}', NULL, '2021-07-01 10:06:33', '2021-07-01 10:06:33'),
('602e9578-7e87-442a-a017-1859cc107199', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":\"BOOKING DETAILS\\n                Pick Date  -   <b>22-13-2018<\\/b>\\n                Pick Address  -   pindi road kohat\\n                Drop Address  -   babribanda kohat\\n                Selected Class  -   islamabad is \\n                Travel Amount  -  300\\n                Net Amount  -    600\\n                Payment Status  -   px_set_targetencoding(pxdoc, encoding)\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\"}', NULL, '2021-07-01 10:06:36', '2021-07-01 10:06:36'),
('717425f6-cc0b-4a91-86ab-d84d282aa314', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":\"BOOKING DETAILS\\n                Pick Date  -   <b>22-13-2018<\\/b>\\n                Pick Address  -   pindi road kohat\\n                Drop Address  -   babribanda kohat\\n                Selected Class  -   islamabad is \\n                Travel Amount  -  300\\n                Net Amount  -    600\\n                Payment Status  -   px_set_targetencoding(pxdoc, encoding)\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\"}', NULL, '2021-07-01 10:08:01', '2021-07-01 10:08:01'),
('1818a4d4-35db-4aea-a654-dd0240004a12', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":\"BOOKING DETAILS\\n                Pick Date  -   22-13-2018\'\\n\'\\n                Pick Address  -   pindi road kohat\'\\n\'\\n                Drop Address  -   babribanda kohat\'\\n\'\\n                Selected Class  -   islamabad is \'\\n\'\\n                Travel Amount  -  300\'\\n\'\\n                Net Amount  -    600\'\\n\'\\n                Payment Status  -   px_set_targetencoding(pxdoc, encoding)\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\"}', NULL, '2021-07-01 10:15:47', '2021-07-01 10:15:47'),
('7c9bb6ff-05c7-4d5f-b254-aa0c65e116aa', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":\"BOOKING DETAILS\\n                Pick Date  -   22-13-2018<br>\\n                Pick Address  -   pindi road kohat\'\\n\'\\n                Drop Address  -   babribanda kohat\'\\n\'\\n                Selected Class  -   islamabad is \'\\n\'\\n                Travel Amount  -  300\'\\n\'\\n                Net Amount  -    600\'\\n\'\\n                Payment Status  -   px_set_targetencoding(pxdoc, encoding)\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\"}', NULL, '2021-07-01 10:18:34', '2021-07-01 10:18:34'),
('be74101f-6ac6-4928-89d8-bbb6801e6e25', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":\"BOOKING DETAILS\\n                Pick Date  -   22-13-2018<br>\\n                Pick Address  -   pindi road kohat\'\\n\'\\n                Drop Address  -   babribanda kohat\'\\n\'\\n                Selected Class  -   islamabad is \'\\n\'\\n                Travel Amount  -  300\'\\n\'\\n                Net Amount  -    600\'\\n\'\\n                Payment Status  -   px_set_targetencoding(pxdoc, encoding)\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\"}', NULL, '2021-07-01 10:20:35', '2021-07-01 10:20:35'),
('3f5537cc-a5ee-4825-bad2-7c113b5902b5', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":\"BOOKING DETAILS\\n                Pick Date  -   22-13-2018\'\\/n\'\\n                Pick Address  -   pindi road kohat\'\\n\'\\n                Drop Address  -   babribanda kohat\'\\n\'\\n                Selected Class  -   islamabad is \'\\n\'\\n                Travel Amount  -  300\'\\n\'\\n                Net Amount  -    600\'\\n\'\\n                Payment Status  -   px_set_targetencoding(pxdoc, encoding)\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\"}', NULL, '2021-07-01 10:22:41', '2021-07-01 10:22:41'),
('cd8932b0-a1a1-4d60-badb-dcbb523dc63c', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":\"BOOKING DETAILS\\n                Pick Date  -   22-13-2018\\n                Pick Address  -   pindi road kohat\\n                Drop Address  -   babribanda kohat\\n                Selected Class  -   islamabad is \\n                Travel Amount  -  300\'\\n                Net Amount  -    600\\n                Payment Status  -   px_set_targetencoding(pxdoc, encoding)\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\"}', NULL, '2021-07-01 10:25:37', '2021-07-01 10:25:37'),
('94dda3ef-d8ec-419b-b2bb-43ff439a6512', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":\"BOOKING DETAILS\\n\\n                Pick Date  -   22-13-2018\\n                Pick Address  -   pindi road kohat\\n                Drop Address  -   babribanda kohat\\n                Selected Class  -   islamabad is \\n                Travel Amount  -  300\'\\n                Net Amount  -    600\\n                Payment Status  -   px_set_targetencoding(pxdoc, encoding)\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\"}', NULL, '2021-07-01 10:27:09', '2021-07-01 10:27:09');
INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('8df8ab23-7845-4b09-9852-d1cb5be63e9d', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":\"BOOKING DETAILS\'\\n\'\\n                Pick Date  -   22-13-2018\\n                Pick Address  -   pindi road kohat\\n                Drop Address  -   babribanda kohat\\n                Selected Class  -   islamabad is \\n                Travel Amount  -  300\'\\n                Net Amount  -    600\\n                Payment Status  -   px_set_targetencoding(pxdoc, encoding)\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\"}', NULL, '2021-07-01 10:27:39', '2021-07-01 10:27:39'),
('ad05f738-4ae3-4f7f-9ff2-6fca63693c50', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":\"BOOKING DETAILS<br>\\n                Pick Date  -   22-13-2018\\n                Pick Address  -   pindi road kohat\\n                Drop Address  -   babribanda kohat\\n                Selected Class  -   islamabad is \\n                Travel Amount  -  300\'\\n                Net Amount  -    600\\n                Payment Status  -   px_set_targetencoding(pxdoc, encoding)\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\"}', NULL, '2021-07-01 10:29:23', '2021-07-01 10:29:23'),
('af7b5add-a4d7-49a8-af3c-5c4f3f4e741b', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":\"BOOKING DETAILS<br>\\n                Pick Date  -   22-13-2018<br>\\n                Pick Address  -   pindi road kohat<br>\\n                Drop Address  -   babribanda kohat<br>\\n                Selected Class  -   islamabad is <br>\\n                Travel Amount  -  300\'<br>\\n                Net Amount  -    600<br>\\n                Payment Status  -   px_set_targetencoding(pxdoc, encoding)\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\"}', NULL, '2021-07-01 10:30:26', '2021-07-01 10:30:26'),
('23aaf2e3-87a6-4ac7-b6a1-e7a418bb5340', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":\"<h2>BOOKING DETAILS<\\/h2><br>\\n                Pick Date  -   22-13-2018<br>\\n                Pick Address  -   pindi road kohat<br>\\n                Drop Address  -   babribanda kohat<br>\\n                Selected Class  -   islamabad is <br>\\n                Travel Amount  -  300\'<br>\\n                Net Amount  -    600<br>\\n                Payment Status  -   px_set_targetencoding(pxdoc, encoding)\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\"}', NULL, '2021-07-01 10:40:55', '2021-07-01 10:40:55'),
('e81917dc-86a0-439c-8cdb-8461dd362d2a', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":\"<h2>BOOKING DETAILS<\\/h2><br>\\n                Pick Date  -   22-13-2018<br>\\n                Pick Address  -   pindi road kohat<br>\\n                Drop Address  -   babribanda kohat<br>\\n                Selected Class  -   islamabad is <br>\\n                Travel Amount  -  300\'<br>\\n                Net Amount  -    600<br>\\n                Payment Status  -   px_set_targetencoding(pxdoc, encoding)\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\"}', NULL, '2021-07-01 10:40:57', '2021-07-01 10:40:57'),
('82d3ce65-9899-46eb-bd7a-7232521c72e4', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":\"<h4>BOOKING DETAILS<\\/h4><br>\\n                <strong>Pick Date <\\/strong> -   22-13-2018<br>\\n                <strong>Pick Address <\\/strong> -   pindi road kohat<br>\\n                <strong>Drop Address <\\/strong> -   babribanda kohat<br>\\n                <strong> Selected Class <\\/strong>  -   islamabad is <br>\\n                <strong>Travel Amount <\\/strong> -  300\'<br>\\n                <strong>Net Amount  - <\\/strong>   600<br>\\n                <strong>Payment Status <\\/strong> -   px_set_targetencoding(pxdoc, encoding)\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\"}', NULL, '2021-07-01 10:42:06', '2021-07-01 10:42:06'),
('d4f637ba-a3fb-42b6-b7e8-2ddfc7fde83b', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":\"<h4>BOOKING DETAILS<\\/h4><br>\\n                <strong>Pick Date <\\/strong> -   22-13-2018<br>\\n                <strong>Pick Address <\\/strong> -   pindi road kohat<br>\\n                <strong>Drop Address <\\/strong> -   babribanda kohat<br>\\n                <strong> Selected Class <\\/strong>  -   islamabad is <br>\\n                <strong>Travel Amount <\\/strong> -  300\'<br>\\n                <strong>Net Amount  - <\\/strong>   600<br>\\n                <strong>Payment Status <\\/strong> -   px_set_targetencoding(pxdoc, encoding)\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\"}', NULL, '2021-07-01 10:45:39', '2021-07-01 10:45:39'),
('b1bd0537-8ddd-4b83-b117-50fb35f76db2', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":\"<h4>BOOKING DETAILS<\\/h4><br>\\n                <strong>Pick Date <\\/strong> -   22-13-2018<br>\\n                <strong>Pick Address <\\/strong> -   pindi road kohat<br>\\n                <strong>Drop Address <\\/strong> -   babribanda kohat<br>\\n                <strong> Selected Class <\\/strong>  -   islamabad is <br>\\n                <strong>Travel Amount <\\/strong> -  300\'<br>\\n                <strong>Net Amount  - <\\/strong>   600<br>\\n                <strong>Payment Status <\\/strong> -   px_set_targetencoding(pxdoc, encoding)\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\"}', NULL, '2021-07-01 10:46:30', '2021-07-01 10:46:30'),
('efc9a320-0dbd-4713-9e04-99493a0f55e3', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":\"<h4>BOOKING DETAILS<\\/h4><br>\\n                <strong>Pick Date <\\/strong> -   22-13-2018<br>\\n                <strong>Pick Address <\\/strong> -   pindi road kohat<br>\\n                <strong>Drop Address <\\/strong> -   babribanda kohat<br>\\n                <strong> Selected Class <\\/strong>  -   islamabad is <br>\\n                <strong>Travel Amount <\\/strong> -  300<br>\\n                <strong>Net Amount  - <\\/strong>   600<br>\\n                <strong>Payment Status <\\/strong> -   px_set_targetencoding(pxdoc, encoding)\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\"}', NULL, '2021-07-01 10:48:24', '2021-07-01 10:48:24'),
('570550bd-df9a-4650-870b-b4cc7cc94cdb', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":\"<h4>BOOKING DETAILS<\\/h4><br>\\n                <strong>Pick Date <\\/strong> -   22-13-2018<br>\\n                <strong>Pick Address <\\/strong> -   pindi road kohat<br>\\n                <strong>Drop Address <\\/strong> -   babribanda kohat<br>\\n                <strong> Selected Class <\\/strong>  -   islamabad is <br>\\n                <strong>Travel Amount <\\/strong> -  300<br>\\n                <strong>Net Amount  - <\\/strong>   600<br>\\n                <strong>Payment Status <\\/strong> -   px_set_targetencoding(pxdoc, encoding)\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\"}', NULL, '2021-07-01 10:49:38', '2021-07-01 10:49:38'),
('f306b632-0b7b-4ee5-915b-c3fbae19a5fd', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":\"<h4>BOOKING DETAILS<\\/h4><br>\\n                <strong>Pick Date <\\/strong> -   22-13-2018<br>\\n                <strong>Pick Address <\\/strong> -   pindi road kohat<br>\\n                <strong>Drop Address <\\/strong> -   babribanda kohat<br>\\n                <strong> Selected Class <\\/strong>  -   islamabad is <br>\\n                <strong>Travel Amount <\\/strong> -  300<br>\\n                <strong>Net Amount  - <\\/strong>   600<br>\\n                <strong>Payment Status <\\/strong> -   px_set_targetencoding(pxdoc, encoding)\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\"}', NULL, '2021-07-01 10:50:59', '2021-07-01 10:50:59'),
('728e7ac4-2234-4ac3-bc67-a37995e8b196', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":\"<h4>BOOKING DETAILS<\\/h4><br>\\n                <strong>Pick Date <\\/strong> -   22-13-2018<br>\\n                <strong>Pick Address <\\/strong> -   pindi road kohat<br>\\n                <strong>Drop Address <\\/strong> -   babribanda kohat<br>\\n                <strong> Selected Class <\\/strong>  -   islamabad is <br>\\n                <strong>Travel Amount <\\/strong> -  300<br>\\n                <strong>Net Amount  - <\\/strong>   600<br>\\n                <strong>Payment Status <\\/strong> -   px_set_targetencoding(pxdoc, encoding)\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"https:\\/\\/moray-limousines.de\\/booking\\/details\\/187\"}', NULL, '2021-07-01 10:52:23', '2021-07-01 10:52:23'),
('698ee2ef-c0af-47c4-a451-1099d97ed73c', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":\"<h4>BOOKING DETAILS<\\/h4><br>\\n                <strong>Pick Date <\\/strong> -   22-13-2018<br>\\n                <strong>Pick Address <\\/strong> -   pindi road kohat<br>\\n                <strong>Drop Address <\\/strong> -   babribanda kohat<br>\\n                <strong> Selected Class <\\/strong>  -   islamabad is <br>\\n                <strong>Travel Amount <\\/strong> -  300<br>\\n                <strong>Net Amount  - <\\/strong>   600<br>\\n                <strong>Payment Status <\\/strong> -   px_set_targetencoding(pxdoc, encoding)\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"https:\\/\\/moray-limousines.de\\/booking\\/details\\/187\"}', NULL, '2021-07-01 10:53:05', '2021-07-01 10:53:05'),
('d5f9ce63-178d-4b83-8fed-ff30d20f4e4b', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":\"<h4>BOOKING DETAILS<\\/h4><br>\\n                <strong>Pick Date <\\/strong> -   22-13-2018<br>\\n                <strong>Pick Address <\\/strong> -   pindi road kohat<br>\\n                <strong>Drop Address <\\/strong> -   babribanda kohat<br>\\n                <strong> Selected Class <\\/strong>  -   islamabad is <br>\\n                <strong>Travel Amount <\\/strong> -  300<br>\\n                <strong>Net Amount  - <\\/strong>   600<br>\\n                <strong>Payment Status <\\/strong> -   px_set_targetencoding(pxdoc, encoding)\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"https:\\/\\/moray-limousines.de\\/booking\\/details\\/187\"}', NULL, '2021-07-01 10:54:25', '2021-07-01 10:54:25'),
('2c3df3aa-e310-4d7a-ade2-34180a801f85', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":\"<h4>BOOKING DETAILS<\\/h4><br>\\n                <strong>Pick Date <\\/strong> -   22-13-2018<br>\\n                <strong>Pick Address <\\/strong> -   pindi road kohat<br>\\n                <strong>Drop Address <\\/strong> -   babribanda kohat<br>\\n                <strong> Selected Class <\\/strong>  -   islamabad is <br>\\n                <strong>Travel Amount <\\/strong> -  300<br>\\n                <strong>Net Amount  - <\\/strong>   600<br>\\n                <strong>Payment Status <\\/strong> -   px_set_targetencoding(pxdoc, encoding)\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"https:\\/\\/moray-limousines.de\\/booking\\/details\\/187\"}', NULL, '2021-07-01 10:55:09', '2021-07-01 10:55:09'),
('c88cfc7e-5477-418f-89b5-a8070881e35f', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":\"<h4>BOOKING DETAILS<\\/h4><br>\\n                <strong>Pick Date <\\/strong> -   22-13-2018<br>\\n                <strong>Pick Address <\\/strong> -   pindi road kohat<br>\\n                <strong>Drop Address <\\/strong> -   babribanda kohat<br>\\n                <strong> Selected Class <\\/strong>  -   islamabad is <br>\\n                <strong>Travel Amount <\\/strong> -  300<br>\\n                <strong>Net Amount  - <\\/strong>   600<br>\\n                <strong>Payment Status <\\/strong> -   px_set_targetencoding(pxdoc, encoding)\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"https:\\/\\/moray-limousines.de\\/booking\\/details\\/187\"}', NULL, '2021-07-01 10:58:41', '2021-07-01 10:58:41'),
('e3e11336-b843-49b0-b249-6b7d90b59300', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":\"<h4>BOOKING DETAILS<\\/h4><br>\\n                <strong>Pick Date <\\/strong> -   22-13-2018<br>\\n                <strong>Pick Address <\\/strong> -   pindi road kohat<br>\\n                <strong>Drop Address <\\/strong> -   babribanda kohat<br>\\n                <strong> Selected Class <\\/strong>  -   islamabad is <br>\\n                <strong>Travel Amount <\\/strong> -  300<br>\\n                <strong>Net Amount  - <\\/strong>   600<br>\\n                <strong>Payment Status <\\/strong> -   px_set_targetencoding(pxdoc, encoding)\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"https:\\/\\/moray-limousines.de\\/booking\\/details\\/187\"}', NULL, '2021-07-01 10:58:59', '2021-07-01 10:58:59'),
('38bc2e03-da42-4a58-943f-28012757ed22', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":\"<h4>BOOKING DETAILS<\\/h4><br>\\n                <strong>Pick Date <\\/strong> -   22-13-2018<br>\\n                <strong>Pick Address <\\/strong> -   pindi road kohat<br>\\n                <strong>Drop Address <\\/strong> -   babribanda kohat<br>\\n                <strong> Selected Class <\\/strong>  -   islamabad is <br>\\n                <strong>Travel Amount <\\/strong> -  300<br>\\n                <strong>Net Amount  - <\\/strong>   600<br>\\n                <strong>Payment Status <\\/strong> -   px_set_targetencoding(pxdoc, encoding)\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"https:\\/\\/moray-limousines.de\\/booking\\/details\\/187\"}', NULL, '2021-07-01 11:01:22', '2021-07-01 11:01:22'),
('d1744831-ff6f-4d53-80b3-9bd5f5e37987', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":\"<h4>BOOKING DETAILS<\\/h4><br>\\n                <strong>Pick Date <\\/strong> -   22-13-2018<br>\\n                <strong>Pick Address <\\/strong> -   pindi road kohat<br>\\n                <strong>Drop Address <\\/strong> -   babribanda kohat<br>\\n                <strong> Selected Class <\\/strong>  -   islamabad is <br>\\n                <strong>Travel Amount <\\/strong> -  300<br>\\n                <strong>Net Amount  - <\\/strong>   600<br>\\n                <strong>Payment Status <\\/strong> -   px_set_targetencoding(pxdoc, encoding)\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"https:\\/\\/moray-limousines.de\\/booking\\/details\\/187\"}', NULL, '2021-07-01 11:01:52', '2021-07-01 11:01:52'),
('5987fe6e-cc63-4470-a4ce-6687d9d92330', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":\"<h4>BOOKING DETAILS<\\/h4><br>\\n                <strong>Pick Date <\\/strong> -   22-13-2018<br>\\n                <strong>Pick Address <\\/strong> -   pindi road kohat<br>\\n                <strong>Drop Address <\\/strong> -   babribanda kohat<br>\\n                <strong> Selected Class <\\/strong>  -   islamabad is <br>\\n                <strong>Travel Amount <\\/strong> -  300<br>\\n                <strong>Net Amount  - <\\/strong>   600<br>\\n                <strong>Payment Status <\\/strong> -   px_set_targetencoding(pxdoc, encoding)\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"https:\\/\\/moray-limousines.de\\/booking\\/details\\/187\"}', NULL, '2021-07-01 11:02:49', '2021-07-01 11:02:49'),
('ff2b35e4-ded0-4118-81d8-9cbc26559690', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":\"<h4>BOOKING DETAILS<\\/h4><br>\\n                <strong>Pick Date <\\/strong> -   22-13-2018<br>\\n                <strong>Pick Address <\\/strong> -   pindi road kohat<br>\\n                <strong>Drop Address <\\/strong> -   babribanda kohat<br>\\n                <strong> Selected Class <\\/strong>  -   islamabad is <br>\\n                <strong>Travel Amount <\\/strong> -  300<br>\\n                <strong>Net Amount  - <\\/strong>   600<br>\\n                <strong>Payment Status <\\/strong> -   px_set_targetencoding(pxdoc, encoding)\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"https:\\/\\/moray-limousines.de\\/booking\\/details\\/187\"}', NULL, '2021-07-01 11:03:08', '2021-07-01 11:03:08'),
('807a5eaa-65d6-485a-96b1-0faf84bb5a41', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":\"<h4>BOOKING DETAILS<\\/h4><br>\\n                <strong>Pick Date <\\/strong> -   22-13-2018<br>\\n                <strong>Pick Address <\\/strong> -   pindi road kohat<br>\\n                <strong>Drop Address <\\/strong> -   babribanda kohat<br>\\n                <strong> Selected Class <\\/strong>  -   islamabad is <br>\\n                <strong>Travel Amount <\\/strong> -  300<br>\\n                <strong>Net Amount  - <\\/strong>   600<br>\\n                <strong>Payment Status <\\/strong> -   px_set_targetencoding(pxdoc, encoding)\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"https:\\/\\/moray-limousines.de\\/booking\\/details\\/187\"}', NULL, '2021-07-01 11:03:29', '2021-07-01 11:03:29'),
('5708dc14-4010-4124-81d2-797f59617c0d', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":\"<h4>BOOKING DETAILS<\\/h4><br>\\n                <strong>Pick Date <\\/strong> -   22-13-2018<br>\\n                <strong>Pick Address <\\/strong> -   pindi road kohat<br>\\n                <strong>Drop Address <\\/strong> -   babribanda kohat<br>\\n                <strong> Selected Class <\\/strong>  -   islamabad is <br>\\n                <strong>Travel Amount <\\/strong> -  300<br>\\n                <strong>Net Amount  - <\\/strong>   600<br>\\n                <strong>Payment Status <\\/strong> -   px_set_targetencoding(pxdoc, encoding)\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"https:\\/\\/moray-limousines.de\\/booking\\/details\\/187\"}', NULL, '2021-07-01 11:04:25', '2021-07-01 11:04:25'),
('5ad7c4c2-de71-4345-aba5-9eca524843fd', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":\"<h4>BOOKING DETAILS<\\/h4><br>\\n                <strong>Pick Date <\\/strong> -   22-13-2018<br>\\n                <strong>Pick Address <\\/strong> -   pindi road kohat<br>\\n                <strong>Drop Address <\\/strong> -   babribanda kohat<br>\\n                <strong> Selected Class <\\/strong>  -   islamabad is <br>\\n                <strong>Travel Amount <\\/strong> -  300<br>\\n                <strong>Net Amount  - <\\/strong>   600<br>\\n                <strong>Payment Status <\\/strong> -   px_set_targetencoding(pxdoc, encoding)\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"https:\\/\\/moray-limousines.de\\/booking\\/details\\/187\"}', NULL, '2021-07-01 11:19:03', '2021-07-01 11:19:03'),
('9e5760d6-0583-4f49-b2e8-4b3511997de7', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":\"<h4>BOOKING DETAILS<\\/h4><br>\\n                <strong>Pick Date <\\/strong> -   22-13-2018<br>\\n                <strong>Pick Address <\\/strong> -   pindi road kohat<br>\\n                <strong>Drop Address <\\/strong> -   babribanda kohat<br>\\n                <strong> Selected Class <\\/strong>  -   islamabad is <br>\\n                <strong>Travel Amount <\\/strong> -  300<br>\\n                <strong>Net Amount  - <\\/strong>   600<br>\\n                <strong>Payment Status <\\/strong> -   px_set_targetencoding(pxdoc, encoding)\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"https:\\/\\/moray-limousines.de\\/booking\\/details\\/187\"}', NULL, '2021-07-01 11:19:47', '2021-07-01 11:19:47'),
('0e0f46de-4db2-4673-9e12-0ae5a7206860', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":\"<h4>BOOKING DETAILS<\\/h4><br>\\n                <strong>Pick Date <\\/strong> -   22-13-2018<br>\\n                <strong>Pick Address <\\/strong> -   pindi road kohat<br>\\n                <strong>Drop Address <\\/strong> -   babribanda kohat<br>\\n                <strong> Selected Class <\\/strong>  -   islamabad is <br>\\n                <strong>Travel Amount <\\/strong> -  300<br>\\n                <strong>Net Amount  - <\\/strong>   600<br>\\n                <strong>Payment Status <\\/strong> -   px_set_targetencoding(pxdoc, encoding)\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"https:\\/\\/moray-limousines.de\\/booking\\/details\\/187\"}', NULL, '2021-07-01 11:28:05', '2021-07-01 11:28:05'),
('15543505-3c73-4896-b308-bf8177b36898', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":\"<h4>BOOKING DETAILS<\\/h4><br>\\n                <strong>Pick Date <\\/strong> -   22-13-2018<br>\\n                <strong>Pick Address <\\/strong> -   pindi road kohat<br>\\n                <strong>Drop Address <\\/strong> -   babribanda kohat<br>\\n                <strong> Selected Class <\\/strong>  -   islamabad is <br>\\n                <strong>Travel Amount <\\/strong> -  300<br>\\n                <strong>Net Amount  - <\\/strong>   600<br>\\n                <strong>Payment Status <\\/strong> -   px_set_targetencoding(pxdoc, encoding)\",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"https:\\/\\/moray-limousines.de\\/booking\\/details\\/187\"}', NULL, '2021-07-01 11:31:25', '2021-07-01 11:31:25'),
('99b6e103-a834-4146-bb16-d089f2b7d8dd', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":\"<h4>BOOKING DETAILS<\\/h4><br>\\n                <strong>Pick Date <\\/strong> -   22-13-2018<br>\\n                <strong>Pick Address <\\/strong> -   pindi road kohat<br>\\n                <strong>Drop Address <\\/strong> -   babribanda kohat<br>\\n                <strong> Selected Class <\\/strong>  -   islamabad is <br>\\n                <strong>Travel Amount <\\/strong> -  300<br>\\n                <strong>Net Amount  - <\\/strong>   600<br>\\n                <strong>Payment Status <\\/strong> -   px_set_targetencoding(pxdoc, encoding)\\n                <table border=\\\"0\\\" cellspacing=\\\"0\\\" cellpadding=\\\"0\\\" width=\\\"100%\\\" style=\\\"width:100.0%; background:#efefef; border-collapse:collapse\\\"><tbody><tr><td width=\\\"35%\\\" valign=\\\"top\\\" style=\\\"width:35.0%; border:solid white 1.0pt; padding:3.75pt 3.75pt 3.75pt 3.75pt\\\"><p class=\\\"x_MsoNormal\\\"><b><span style=\\\"font-size:10.0pt; font-family:&quot;Source Sans Pro&quot;,sans-serif; color:black\\\">Buchungsnummer:<\\/span><\\/b><b><span style=\\\"font-size:10.0pt; font-family:&quot;Source Sans Pro&quot;,sans-serif\\\"><u><\\/u><u><\\/u><\\/span><\\/b><\\/p><\\/td><td valign=\\\"top\\\" style=\\\"border:solid white 1.0pt; border-left:none; padding:3.75pt 3.75pt 3.75pt 3.75pt\\\"><p class=\\\"x_MsoNormal\\\"><span style=\\\"font-size:10.0pt; font-family:&quot;Source Sans Pro&quot;,sans-serif; color:black\\\">604981325 <\\/span><span style=\\\"font-size:10.0pt; font-family:&quot;Source Sans Pro&quot;,sans-serif\\\"><u><\\/u><u><\\/u><\\/span><\\/p><\\/td><\\/tr><tr><td width=\\\"35%\\\" valign=\\\"top\\\" style=\\\"width:35.0%; border:solid white 1.0pt; border-top:none; background:#fdfdfd; padding:3.75pt 3.75pt 3.75pt 3.75pt\\\"><\\/td><td valign=\\\"top\\\" style=\\\"border-top:none; border-left:none; border-bottom:solid white 1.0pt; border-right:solid white 1.0pt; background:#fdfdfd; padding:3.75pt 3.75pt 3.75pt 3.75pt\\\"><\\/td><\\/tr><tr><td width=\\\"35%\\\" valign=\\\"top\\\" style=\\\"width:35.0%; border:solid white 1.0pt; border-top:none; padding:3.75pt 3.75pt 3.75pt 3.75pt\\\"><p class=\\\"x_MsoNormal\\\"><b><span style=\\\"font-size:10.0pt; font-family:&quot;Source Sans Pro&quot;,sans-serif; color:black\\\">Datum und Zeit:<\\/span><\\/b><b><span style=\\\"font-size:10.0pt; font-family:&quot;Source Sans Pro&quot;,sans-serif\\\"><u><\\/u><u><\\/u><\\/span><\\/b><\\/p><\\/td><td valign=\\\"top\\\" style=\\\"border-top:none; border-left:none; border-bottom:solid white 1.0pt; border-right:solid white 1.0pt; padding:3.75pt 3.75pt 3.75pt 3.75pt\\\"><p class=\\\"x_MsoNormal\\\"><span style=\\\"font-size:10.0pt; font-family:&quot;Source Sans Pro&quot;,sans-serif; color:black\\\">02 Feb 2019 14:20<\\/span><span style=\\\"font-size:10.0pt; font-family:&quot;Source Sans Pro&quot;,sans-serif\\\"><u><\\/u><u><\\/u><\\/span><\\/p><\\/td><\\/tr><tr><td width=\\\"35%\\\" valign=\\\"top\\\" style=\\\"width:35.0%; border:solid white 1.0pt; border-top:none; padding:3.75pt 3.75pt 3.75pt 3.75pt\\\"><p class=\\\"x_MsoNormal\\\"><b><span style=\\\"font-size:10.0pt; font-family:&quot;Source Sans Pro&quot;,sans-serif; color:black\\\">Von:<\\/span><\\/b><b><span style=\\\"font-size:10.0pt; font-family:&quot;Source Sans Pro&quot;,sans-serif\\\"><u><\\/u><u><\\/u><\\/span><\\/b><\\/p><\\/td><td valign=\\\"top\\\" style=\\\"border-top:none; border-left:none; border-bottom:solid white 1.0pt; border-right:solid white 1.0pt; padding:3.75pt 3.75pt 3.75pt 3.75pt\\\"><p class=\\\"x_MsoNormal\\\"><span style=\\\"font-size:10.0pt; font-family:&quot;Source Sans Pro&quot;,sans-serif; color:black\\\">Via Alessio di Tocqueville 9, 20154 Milano, Lombardia<\\/span><span style=\\\"font-size:10.0pt; font-family:&quot;Source Sans Pro&quot;,sans-serif\\\"><u><\\/u><u><\\/u><\\/span><\\/p><\\/td><\\/tr><\\/tbody><\\/table>\\n                \",\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"https:\\/\\/moray-limousines.de\\/booking\\/details\\/187\"}', NULL, '2021-07-02 03:38:14', '2021-07-02 03:38:14'),
('306df849-529e-4dd7-b65d-b2d616ff988d', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 708, '{\"greeting\":\"Your Booking Request is  not approved by Moray Limousine\",\"body\":\"Your Booking Request is not approved by Moray Limousine which Waldplateau 86, Kelkheim (Taunus), Deutschland And Pick Time is  07:20:00\",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', NULL, '2021-07-02 04:25:26', '2021-07-02 04:25:26'),
('9dc35da0-4cb0-4f96-bb8f-67ed80a76d36', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 708, '{\"greeting\":\"Your Booking Request is approved by Moray Limousine\",\"body\":\"Your Booking Request is approved by Moray Limousine which Waldplateau 86, Kelkheim (Taunus), Deutschland And Pick Time is  07:20:00 ! Enjoy With Us.  \",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', NULL, '2021-07-02 04:25:47', '2021-07-02 04:25:47'),
('a3abd8f0-ed01-44ea-86e8-8b0d7302aa9f', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":{\"booking\":\"BOOKING DETAILS\",\"Pick Date\":\"22-13-2018\",\"Pick Address\":\"pindi road kohat\",\"Drop Address\":\"babribanda kohat\",\"Selected Class\":\"islamabad is\",\"Travel Amount\":300,\"Net Amount\":600,\"Payment Status\":\"pending\"},\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"https:\\/\\/moray-limousines.de\\/booking\\/details\\/187\"}', NULL, '2021-07-02 04:32:31', '2021-07-02 04:32:31'),
('2f889fa6-258d-45b9-b3e8-78c707b6025d', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":{\"booking\":\"BOOKING DETAILS\",\"Pick Date\":\"22-13-2018\",\"Pick Address\":\"pindi road kohat\",\"Drop Address\":\"babribanda kohat\",\"Selected Class\":\"islamabad is\",\"Travel Amount\":300,\"Net Amount\":600,\"Payment Status\":\"pending\"},\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"https:\\/\\/moray-limousines.de\\/booking\\/details\\/187\"}', NULL, '2021-07-02 04:37:10', '2021-07-02 04:37:10'),
('dcebacf1-16a8-47bf-b634-d7bc8673498f', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":{\"booking\":\"BOOKING DETAILS\",\"Pick Date\":\"22-13-2018\",\"Pick Address\":\"pindi road kohat\",\"Drop Address\":\"babribanda kohat\",\"Selected Class\":\"islamabad is\",\"Travel Amount\":300,\"Net Amount\":600,\"Payment Status\":\"pending\"},\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"https:\\/\\/moray-limousines.de\\/booking\\/details\\/187\"}', NULL, '2021-07-02 04:37:35', '2021-07-02 04:37:35'),
('26d090bc-e2bf-4340-9634-167621d2c546', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 1271, '{\"greeting\":\"Your Account Is Blocked on Moray Limousine\",\"body\":\"Your Account Is Blocked By Admin On Moray Limousine\",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', NULL, '2021-07-02 05:03:35', '2021-07-02 05:03:35'),
('5210c1af-4916-4a2a-bb8a-9a48af8acd81', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":{\"booking\":\"BOOKING DETAILS\",\"Pick Date\":\"22-13-2018\",\"Pick Address\":\"pindi road kohat\",\"Drop Address\":\"babribanda kohat\",\"Selected Class\":\"islamabad is\",\"Travel Amount\":300,\"Net Amount\":600,\"Payment Status\":\"pending\"},\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"https:\\/\\/moray-limousines.de\\/booking\\/details\\/187\"}', NULL, '2021-07-02 05:21:23', '2021-07-02 05:21:23'),
('93f070ad-f312-428d-ac7e-ed55ece776e4', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":{\"booking\":\"BOOKING DETAILS\",\"Pick Date\":\"22-13-2018\",\"Pick Address\":\"pindi road kohat\",\"Drop Address\":\"babribanda kohat\",\"Selected Class\":\"islamabad is\",\"Travel Amount\":300,\"Net Amount\":600,\"Payment Status\":\"pending\"},\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"https:\\/\\/moray-limousines.de\\/booking\\/details\\/187\"}', NULL, '2021-07-02 05:22:02', '2021-07-02 05:22:02'),
('20101412-125e-456d-9120-e73937ffa14b', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":{\"booking\":\"BOOKING DETAILS\",\"Pick Date\":\"22-13-2018\",\"Pick Address\":\"pindi road kohat\",\"Drop Address\":\"babribanda kohat\",\"Selected Class\":\"islamabad is\",\"Travel Amount\":300,\"Net Amount\":600,\"Payment Status\":\"pending\"},\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"https:\\/\\/moray-limousines.de\\/booking\\/details\\/187\"}', NULL, '2021-07-02 05:27:24', '2021-07-02 05:27:24'),
('15ddc31c-28a6-4843-8525-675dfd9d0d52', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":{\"booking\":\"BOOKING DETAILS\",\"Pick Date\":\"22-13-2018\",\"Pick Address\":\"pindi road kohat\",\"Drop Address\":\"babribanda kohat\",\"Selected Class\":\"islamabad is\",\"Travel Amount\":300,\"Net Amount\":600,\"Payment Status\":\"pending\"},\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"https:\\/\\/moray-limousines.de\\/booking\\/details\\/187\"}', NULL, '2021-07-02 05:35:11', '2021-07-02 05:35:11'),
('55ae5076-cbb4-4733-af74-a0a7dd61689f', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":{\"booking\":\"BOOKING DETAILS\",\"Pick Date\":\"22-13-2018\",\"Pick Address\":\"pindi road kohat\",\"Drop Address\":\"babribanda kohat\",\"Selected Class\":\"islamabad is\",\"Travel Amount\":300,\"Net Amount\":600,\"Payment Status\":\"pending\"},\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"https:\\/\\/moray-limousines.de\\/booking\\/details\\/187\"}', NULL, '2021-07-02 05:36:48', '2021-07-02 05:36:48'),
('76216325-41da-4baf-ae51-3650a9e1b533', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":{\"booking\":\"BOOKING DETAILS\",\"Pick Date\":\"22-13-2018\",\"Pick Address\":\"pindi road kohat\",\"Drop Address\":\"babribanda kohat\",\"Selected Class\":\"islamabad is\",\"Travel Amount\":300,\"Net Amount\":600,\"Payment Status\":\"pending\"},\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"https:\\/\\/moray-limousines.de\\/booking\\/details\\/187\"}', NULL, '2021-07-02 05:38:41', '2021-07-02 05:38:41'),
('d9c56421-f88a-424c-a53c-707d423d03f6', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":{\"booking\":\"BOOKING DETAILS\",\"Pick Date\":\"22-13-2018\",\"Pick Address\":\"pindi road kohat\",\"Drop Address\":\"babribanda kohat\",\"Selected Class\":\"islamabad is\",\"Travel Amount\":300,\"Net Amount\":600,\"Payment Status\":\"pending\"},\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"https:\\/\\/moray-limousines.de\\/booking\\/details\\/187\"}', NULL, '2021-07-02 05:47:20', '2021-07-02 05:47:20'),
('8307aa2e-4c28-4d3f-a5b1-e60305a0c12b', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":{\"booking\":\"BOOKING DETAILS\",\"Pick Date\":\"22-13-2018\",\"Pick Address\":\"pindi road kohat\",\"Drop Address\":\"babribanda kohat\",\"Selected Class\":\"islamabad is\",\"Travel Amount\":300,\"Net Amount\":600,\"Payment Status\":\"pending\"},\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"https:\\/\\/moray-limousines.de\\/booking\\/details\\/187\"}', NULL, '2021-07-02 05:48:52', '2021-07-02 05:48:52'),
('7fe71767-ceed-4dfd-aa22-1e5d4fbf55ab', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":{\"booking\":\"BOOKING DETAILS\",\"Pick Date\":\"22-13-2018\",\"Pick Address\":\"pindi road kohat\",\"Drop Address\":\"babribanda kohat\",\"Selected Class\":\"islamabad is\",\"Travel Amount\":300,\"Net Amount\":600,\"Payment Status\":\"pending\"},\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"https:\\/\\/moray-limousines.de\\/booking\\/details\\/187\"}', NULL, '2021-07-02 05:50:37', '2021-07-02 05:50:37'),
('0e29c6ff-1095-45ef-88ed-814f44651ad2', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":{\"booking\":\"BOOKING DETAILS\",\"Pick Date\":\"22-13-2018\",\"Pick Address\":\"pindi road kohat\",\"Drop Address\":\"babribanda kohat\",\"Selected Class\":\"islamabad is\",\"Travel Amount\":300,\"Net Amount\":600,\"Payment Status\":\"pending\"},\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"https:\\/\\/moray-limousines.de\\/booking\\/details\\/187\"}', NULL, '2021-07-02 05:50:40', '2021-07-02 05:50:40'),
('091d67e9-0d11-4f5b-960e-7425bbc97fe7', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":{\"booking\":\"BOOKING DETAILS\",\"Pick Date\":\"22-13-2018\",\"Pick Address\":\"pindi road kohat\",\"Drop Address\":\"babribanda kohat\",\"Selected Class\":\"islamabad is\",\"Travel Amount\":300,\"Net Amount\":600,\"Payment Status\":\"pending\"},\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"https:\\/\\/moray-limousines.de\\/booking\\/details\\/187\"}', NULL, '2021-07-02 05:52:55', '2021-07-02 05:52:55'),
('e413cbb8-3459-45fa-8c2f-d190519298f0', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":{\"booking\":\"BOOKING DETAILS\",\"Pick Date\":\"22-13-2018\",\"Pick Address\":\"pindi road kohat\",\"Drop Address\":\"babribanda kohat\",\"Selected Class\":\"islamabad is\",\"Travel Amount\":300,\"Net Amount\":600,\"Payment Status\":\"pending\"},\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"https:\\/\\/moray-limousines.de\\/booking\\/details\\/187\"}', NULL, '2021-07-02 05:52:57', '2021-07-02 05:52:57'),
('c2e74b57-a675-4413-8fe1-a2913a6548de', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":{\"booking\":\"BOOKING DETAILS\",\"Pick Date\":\"22-13-2018\",\"Pick Address\":\"pindi road kohat\",\"Drop Address\":\"babribanda kohat\",\"Selected Class\":\"islamabad is\",\"Travel Amount\":300,\"Net Amount\":600,\"Payment Status\":\"pending\"},\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"https:\\/\\/moray-limousines.de\\/booking\\/details\\/187\"}', NULL, '2021-07-02 05:53:48', '2021-07-02 05:53:48'),
('20444b82-f8d4-46bc-81cf-554a5eac55e7', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":{\"booking\":\"BOOKING DETAILS\",\"Pick Date\":\"22-13-2018\",\"Pick Address\":\"pindi road kohat\",\"Drop Address\":\"babribanda kohat\",\"Selected Class\":\"islamabad is\",\"Travel Amount\":300,\"Net Amount\":600,\"Payment Status\":\"pending\"},\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"https:\\/\\/moray-limousines.de\\/booking\\/details\\/187\"}', NULL, '2021-07-02 05:55:19', '2021-07-02 05:55:19'),
('d0f0928f-1868-4e47-83bc-08dcbfbe8fb1', 'App\\Notifications\\BookingNotification', 'App\\User', 12, '{\"greeting\":\"You Have a New Booking Request.\",\"body\":{\"booking\":\"BOOKING DETAILS\",\"Pick Date\":\"22-13-2018\",\"Pick Address\":\"pindi road kohat\",\"Drop Address\":\"babribanda kohat\",\"Selected Class\":\"islamabad is\",\"Travel Amount\":300,\"Net Amount\":600,\"Payment Status\":\"pending\"},\"thanks_text\":\"Thanks For Choosing Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"https:\\/\\/moray-limousines.de\\/booking\\/details\\/187\"}', '2021-07-07 15:25:16', '2021-07-02 05:56:17', '2021-07-07 15:25:16'),
('dfa24424-3b66-4907-8e8b-e588f39e8fa8', 'App\\Notifications\\InvoiceNotifications', 'App\\User', 1274, '{\"greeting\":\"A Booking With Booking IdAssigned To Driver By a Partner Successfully Accepted By Driver On Moray-Limousines\",\"body\":\"A Booking With Booking Id Assigned To Driver By a Partner Successfully Accepted By Driver For Details Of booking Follow The link Given Blow Or Login And check Booking Details With Booking Id\",\"thanks_text\":\"Thanks For Using Moray Limousines\",\"actionLink\":\"View My Site\",\"0\":\"\\/booking\\/details\\/\"}', NULL, '2021-07-09 08:55:29', '2021-07-09 08:55:29'),
('a6c4c561-ffbd-4740-9579-a097a528f28f', 'App\\Notifications\\InvoiceNotifications', 'App\\User', 1260, '{\"greeting\":\"Invoice\",\"body\":\"Inovice body should be here\",\"thanks_text\":\"Thanks For Using Moray Limousines\",\"actionLink\":\"\",\"0\":\"\"}', NULL, '2021-07-09 09:01:45', '2021-07-09 09:01:45'),
('c5148316-5116-464e-8451-3af987983760', 'App\\Notifications\\InvoiceNotifications', 'App\\User', 1260, '{\"greeting\":\"Invoice\",\"body\":\"Inovice body should be here\",\"thanks_text\":\"Thanks For Using Moray Limousines\",\"actionLink\":\"\",\"0\":\"\"}', NULL, '2021-07-09 09:02:07', '2021-07-09 09:02:07'),
('2c64a22d-b0e0-4b08-b54d-d32ee3c81bdc', 'App\\Notifications\\InvoiceNotifications', 'App\\User', 12, '{\"greeting\":\"Invoice\",\"body\":\"Inovice body should be here\",\"thanks_text\":\"Thanks For Using Moray Limousines\",\"actionLink\":\"\",\"0\":\"\"}', NULL, '2021-07-09 09:05:40', '2021-07-09 09:05:40'),
('66083200-1f18-433f-9b2a-ccd2caaf50d2', 'App\\Notifications\\InvoiceNotifications', 'App\\User', 1260, '{\"greeting\":\"Invoice\",\"body\":\"Inovice body should be here\",\"thanks_text\":\"Thanks For Using Moray Limousines\",\"actionLink\":\"\",\"0\":\"\"}', NULL, '2021-07-09 09:11:05', '2021-07-09 09:11:05'),
('6cdf2ea7-1ff7-4da6-aa9a-93395d962d1e', 'App\\Notifications\\InvoiceNotifications', 'App\\User', 1274, '{\"greeting\":\"Invoice\",\"body\":\"Inovice body should be here\",\"thanks_text\":\"Thanks For Using Moray Limousines\",\"actionLink\":\"\",\"0\":\"\"}', NULL, '2021-07-09 09:51:19', '2021-07-09 09:51:19'),
('867d332a-cf13-4e81-9ab0-549a5a4d6c2d', 'App\\Notifications\\InvoiceNotifications', 'App\\User', 1274, '{\"greeting\":\"Invoice\",\"body\":\"Inovice body should be here\",\"thanks_text\":\"Thanks For Using Moray Limousines\",\"actionLink\":\"\",\"0\":\"\"}', NULL, '2021-07-09 09:56:23', '2021-07-09 09:56:23'),
('e740a790-675a-42c5-80df-ca149fc086c6', 'App\\Notifications\\InvoiceNotifications', 'App\\User', 1274, '{\"greeting\":\"Invoice\",\"body\":\"Inovice body should be here\",\"thanks_text\":\"Thanks For Using Moray Limousines\",\"actionLink\":\"\",\"0\":\"\"}', NULL, '2021-07-09 09:56:47', '2021-07-09 09:56:47'),
('7b16d007-76ee-4aa3-b87d-485e93e15e5e', 'App\\Notifications\\InvoiceNotifications', 'App\\User', 1274, '{\"greeting\":\"Invoice\",\"body\":{\"booking\":\"BOOKING DETAILS\",\"Pick Date\":\"2021-07-10\",\"Pick Address\":\"Frankfurt, Germany\",\"Drop Address\":\"Frankfurter Allee, Berlin, Germany\",\"Selected Class\":\"Frankfurter Allee, Berlin, Germany\",\"Travel Amount\":\"1325.89\",\"Net Amount\":\"1477.89\",\"Payment Status\":\"pending\"},\"thanks_text\":\"Thanks For Using Moray Limousines\",\"actionLink\":\"\",\"0\":\"\"}', NULL, '2021-07-09 09:59:25', '2021-07-09 09:59:25'),
('4bb47111-92c0-4d64-ae67-f6aaa182a900', 'App\\Notifications\\InvoiceNotifications', 'App\\User', 1274, '{\"greeting\":\"Invoice\",\"body\":{\"booking\":\"BOOKING DETAILS\",\"Pick Date\":\"2021-07-17\",\"Pick Address\":\"Frankfurt, Germany\",\"Drop Address\":\"Frankfurter Allee, Berlin, Germany\",\"Selected Class\":\"Frankfurter Allee, Berlin, Germany\",\"Travel Amount\":\"1126.27\",\"Net Amount\":\"1225.27\",\"Payment Status\":\"pending\",\"invoicenumber\":\"ML- 521551\",\"bookingid\":\"291\"},\"thanks_text\":\"Thanks For Using Moray Limousines\",\"actionLink\":\"\",\"0\":\"\"}', NULL, '2021-07-09 10:03:43', '2021-07-09 10:03:43'),
('e90218c4-efcc-4da1-b930-0258ade237f0', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 1273, '{\"greeting\":\"Booking Canceled\",\"body\":\"You Cancelled Your Booking Request On Moray Limousine Which Pick Address Is   Hotel Riu Plaza Berlin, Martin-Luther-Stra\\u00dfe, Berlin, Germany And Pick Time Was  15:35:00\",\"thanks_text\":\"Thanks For being Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/admin\\/index\"}', NULL, '2021-07-12 04:13:02', '2021-07-12 04:13:02'),
('2f083775-b37b-4299-9095-7e94faa68459', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 1273, '{\"greeting\":\"Booking Canceled\",\"body\":\"You Cancelled Your Booking Request On Moray Limousine Which Pick Address Is   Airport Region Berlin Brandenburg, Willy-Brandt-Platz, Sch\\u00f6nefeld, Germany And Pick Time Was  15:10:00\",\"thanks_text\":\"Thanks For being Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/admin\\/index\"}', NULL, '2021-07-12 04:21:26', '2021-07-12 04:21:26'),
('4a926083-a5be-46dc-9730-285bf7260e26', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 1260, '{\"greeting\":\"Booking Canceled\",\"body\":\"You Cancelled Your Booking Request On Moray Limousine Which Pick Address Is   Frankfurt, Germany And Pick Time Was  14:50:00\",\"thanks_text\":\"Thanks For being Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/admin\\/index\"}', NULL, '2021-07-12 06:07:34', '2021-07-12 06:07:34'),
('8239cb62-0475-49dd-b63e-c74b9f205eb6', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 1332, '{\"greeting\":\"Booking Canceled\",\"body\":\"You Cancelled Your Booking Request On Moray Limousine Which Pick Address Is   Frankfurt, Germany And Pick Time Was  13:25:00\",\"thanks_text\":\"Thanks For being Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/admin\\/index\"}', NULL, '2021-07-12 06:23:22', '2021-07-12 06:23:22'),
('08b870a7-cedf-40df-8659-a87b8641c9f6', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 1273, '{\"greeting\":\"Booking Canceled\",\"body\":\"You Cancelled Your Booking Request On Moray Limousine Which Pick Address Is   Airport Region Berlin Brandenburg, Willy-Brandt-Platz, Sch\\u00f6nefeld, Germany And Pick Time Was  11:15:00\",\"thanks_text\":\"Thanks For being Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/admin\\/index\"}', NULL, '2021-07-12 07:55:29', '2021-07-12 07:55:29'),
('933ccd53-13f0-4946-a684-2f15e32b5f05', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 1332, '{\"greeting\":\"Booking Canceled\",\"body\":\"You Cancelled Your Booking Request On Moray Limousine Which Pick Address Is   Frankfurt, Germany And Pick Time Was  13:25:00\",\"thanks_text\":\"Thanks For being Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/admin\\/index\"}', NULL, '2021-07-12 07:59:40', '2021-07-12 07:59:40'),
('40acc091-a62b-4555-a311-d018b26b38f7', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 1332, '{\"greeting\":\"Booking Canceled\",\"body\":\"You Cancelled Your Booking Request On Moray Limousine Which Pick Address Is   Frankfurt, Germany And Pick Time Was  14:05:00\",\"thanks_text\":\"Thanks For being Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/admin\\/index\"}', NULL, '2021-07-12 08:00:54', '2021-07-12 08:00:54'),
('82496645-839d-49ee-bce9-4fd5f8fa24ce', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 1273, '{\"greeting\":\"Booking Cancelled\",\"body\":\"You Cancelled Your Booking Request On Moray Limousine Which Pick Address Is   Airport Region Berlin Brandenburg, Willy-Brandt-Platz, Sch\\u00f6nefeld, Germany And Pick Time Was  10:23:00\",\"thanks_text\":\"Thanks For being Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/admin\\/index\"}', NULL, '2021-07-12 08:03:06', '2021-07-12 08:03:06'),
('9087f7a3-6720-4fa7-8ca1-4d2374a9772c', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 81, '{\"greeting\":\"Booking Cancelled\",\"body\":\"You Cancelled Your Booking Request On Moray Limousine Which Pick Address Is   Frankfurt, Deutschland And Pick Time Was  15:00:00\",\"thanks_text\":\"Thanks For being Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/admin\\/index\"}', '2021-07-12 13:34:24', '2021-07-12 13:33:48', '2021-07-12 13:34:24'),
('d90bf5e3-6c11-4e58-b9be-772951045fd0', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 81, '{\"greeting\":\"Booking Cancelled\",\"body\":\"You Cancelled Your Booking Request On Moray Limousine Which Pick Address Is   Frankfurt, Deutschland And Pick Time Was  12:00:00\",\"thanks_text\":\"Thanks For being Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/admin\\/index\"}', '2021-07-14 12:34:55', '2021-07-12 13:39:26', '2021-07-14 12:34:55'),
('f4e76ccf-e917-45ea-a497-01759f17f161', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 81, '{\"greeting\":\"Booking Cancelled\",\"body\":\"You Cancelled Your Booking Request On Moray Limousine Which Pick Address Is   Frankfurt, Deutschland And Pick Time Was  16:00:00\",\"thanks_text\":\"Thanks For being Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/admin\\/index\"}', '2021-07-14 12:34:55', '2021-07-12 13:40:07', '2021-07-14 12:34:55');
INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('f2819ec5-4c3c-48a3-b528-b1e2382a2f09', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 1260, '{\"greeting\":\"Booking Cancelled\",\"body\":\"You Cancelled Your Booking Request On Moray Limousine Which Pick Address Is   Frankfurt, Germany And Pick Time Was  10:50:00\",\"thanks_text\":\"Thanks For being Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/admin\\/index\"}', NULL, '2021-07-13 03:14:39', '2021-07-13 03:14:39'),
('35f20268-c6b5-4a39-8f45-980d29e79dd4', 'App\\Notifications\\Emailvarification', 'App\\User', 1364, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-07-14 08:05:47', '2021-07-14 08:05:47'),
('b6b04b0c-c82a-4f30-ad24-94cf2d7d49ab', 'App\\Notifications\\Emailvarification', 'App\\User', 1365, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-07-14 08:11:53', '2021-07-14 08:11:53'),
('c6aec89d-e904-4148-9c4b-07639d08eb3c', 'App\\Notifications\\Emailvarification', 'App\\User', 1366, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-07-14 08:12:37', '2021-07-14 08:12:37'),
('426fefa6-83d9-4de5-86c2-1d7a4c0f1e16', 'App\\Notifications\\Emailvarification', 'App\\User', 1367, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-07-14 08:14:05', '2021-07-14 08:14:05'),
('1103081e-7143-4de6-ab87-bd373aa4da01', 'App\\Notifications\\Emailvarification', 'App\\User', 1368, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-07-14 08:19:02', '2021-07-14 08:19:02'),
('e38055ee-24ca-44e1-b78e-0409fcd64b46', 'App\\Notifications\\Emailvarification', 'App\\User', 1373, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-07-14 08:46:01', '2021-07-14 08:46:01'),
('7ac5dd8a-e3a4-4985-9a88-d8a7ff42f179', 'App\\Notifications\\Emailvarification', 'App\\User', 1374, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-07-14 08:53:16', '2021-07-14 08:53:16'),
('c6dea5dd-c26f-4002-b31d-46801b9d6797', 'App\\Notifications\\Emailvarification', 'App\\User', 1375, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-07-14 08:55:07', '2021-07-14 08:55:07'),
('f8e41a70-2538-4501-86a4-8cb6df9c0474', 'App\\Notifications\\Emailvarification', 'App\\User', 1376, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-07-14 08:57:24', '2021-07-14 08:57:24'),
('1a3f13d8-4544-42e9-a53e-f579756f4ad1', 'App\\Notifications\\Emailvarification', 'App\\User', 1377, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-07-14 09:30:46', '2021-07-14 09:30:46'),
('d5b84a4b-9048-4abc-871c-86c717d48291', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 81, '{\"greeting\":\"Booking Cancelled\",\"body\":\"You Cancelled Your Booking Request On Moray Limousine Which Pick Address Is   Berlin, Deutschland And Pick Time Was  12:00:00\",\"thanks_text\":\"Thanks For being Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/admin\\/index\"}', '2021-07-14 12:36:10', '2021-07-14 12:35:54', '2021-07-14 12:36:10'),
('311946ce-8ee2-46d5-bd29-fa2dee50998c', 'App\\Notifications\\Emailvarification', 'App\\User', 1378, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-07-14 16:29:24', '2021-07-14 16:29:24'),
('64ea060f-e0dd-4e80-85d0-fcabdf609f8c', 'App\\Notifications\\Emailvarification', 'App\\User', 1379, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-07-14 18:13:20', '2021-07-14 18:13:20'),
('aca7ee9f-db8c-4e51-a63d-d1c42b40fbcf', 'App\\Notifications\\Emailvarification', 'App\\User', 1380, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-07-14 19:48:31', '2021-07-14 19:48:31'),
('93918ea1-b9aa-46c4-9454-0bf254c19d6e', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 12, '{\"greeting\":\"Your Booking Request is  not approved by Moray Limousine\",\"body\":\"Your Booking Request is not approved by Moray Limousine which Heidelberg Hbf, Willy-Brandt-Platz, Heidelberg, Deutschland And Pick Time is  14:00:00\",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', NULL, '2021-07-15 05:49:45', '2021-07-15 05:49:45'),
('3904deeb-5b09-4fd3-ba78-a3cebb51ab76', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 866, '{\"greeting\":\"Your Booking Request is  not approved by Moray Limousine\",\"body\":\"Your Booking Request is not approved by Moray Limousine which Nied, Frankfurt am Main, Germany And Pick Time is  15:00:00\",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', NULL, '2021-07-15 05:49:47', '2021-07-15 05:49:47'),
('1b686d52-2b8c-423e-833f-b3b347ec99c5', 'App\\Notifications\\Emailvarification', 'App\\User', 1381, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-07-15 06:27:12', '2021-07-15 06:27:12'),
('9f9e71d2-b24e-45aa-8962-79bfbcf4bda1', 'App\\Notifications\\Emailvarification', 'App\\User', 1382, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-07-15 14:27:15', '2021-07-15 14:27:15'),
('1d1b201e-a647-4412-8b24-f6ffb38f7b50', 'App\\Notifications\\Emailvarification', 'App\\User', 1383, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-07-16 05:46:09', '2021-07-16 05:46:09'),
('02ccb78e-3ba2-4555-ae1d-2a820428439e', 'App\\Notifications\\Emailvarification', 'App\\User', 1384, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-07-16 11:25:30', '2021-07-16 11:25:30'),
('fb9d778b-8169-4288-a29c-f485da46ef26', 'App\\Notifications\\Emailvarification', 'App\\User', 1385, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-07-16 22:42:23', '2021-07-16 22:42:23'),
('bd14b35d-ed6f-4d8c-8261-c383f5eb5dbf', 'App\\Notifications\\Emailvarification', 'App\\User', 1386, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-07-18 19:28:11', '2021-07-18 19:28:11'),
('c8b3ecc1-f4af-4381-8da3-65a054368c06', 'App\\Notifications\\Emailvarification', 'App\\User', 1387, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', '2021-07-19 05:56:57', '2021-07-19 05:01:07', '2021-07-19 05:56:57'),
('900ae3b7-88d3-4f94-aa88-6efc77595aa2', 'App\\Notifications\\Emailvarification', 'App\\User', 1388, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-07-19 11:17:55', '2021-07-19 11:17:55'),
('c1818629-b0f8-4a13-8637-190d76bf53a5', 'App\\Notifications\\Emailvarification', 'App\\User', 1389, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-07-19 13:39:38', '2021-07-19 13:39:38'),
('b4cb0cb5-63f4-4e15-a35a-5c97286b23ff', 'App\\Notifications\\Emailvarification', 'App\\User', 1390, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-07-20 00:00:26', '2021-07-20 00:00:26'),
('6b8af83f-5454-47e9-b2e3-ce44c1d870ce', 'App\\Notifications\\Emailvarification', 'App\\User', 1391, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-07-20 13:58:37', '2021-07-20 13:58:37'),
('acc520c3-6088-4b79-b793-f4b9719bd754', 'App\\Notifications\\Emailvarification', 'App\\User', 1392, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-07-20 14:58:58', '2021-07-20 14:58:58'),
('83bdcd6d-53aa-4bd5-b5ee-bdb1314999d3', 'App\\Notifications\\Emailvarification', 'App\\User', 1393, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-07-20 15:09:14', '2021-07-20 15:09:14'),
('c5818d59-3610-430d-b408-d913085957c2', 'App\\Notifications\\Emailvarification', 'App\\User', 1394, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-07-20 15:23:51', '2021-07-20 15:23:51'),
('9f2491ee-9354-47ff-9563-c29c6a30b3c4', 'App\\Notifications\\Emailvarification', 'App\\User', 1395, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-07-20 20:10:23', '2021-07-20 20:10:23'),
('1e980bf4-795b-4f97-831c-a7ad763ba54a', 'App\\Notifications\\Emailvarification', 'App\\User', 1396, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-07-21 01:26:46', '2021-07-21 01:26:46'),
('3b1217f7-f81d-42ac-9a68-246bab72a0a4', 'App\\Notifications\\Emailvarification', 'App\\User', 1397, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-07-21 09:32:32', '2021-07-21 09:32:32'),
('524d6452-24ac-4e06-8f5c-cc1e6f8f6e01', 'App\\Notifications\\Emailvarification', 'App\\User', 1398, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-07-21 17:18:16', '2021-07-21 17:18:16'),
('d8564252-bbd5-4dd9-b76b-2549efff6a2e', 'App\\Notifications\\Emailvarification', 'App\\User', 1399, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-07-21 18:47:03', '2021-07-21 18:47:03'),
('7da0ead3-0e1e-4431-b4d9-33ba3d2ccbbe', 'App\\Notifications\\Emailvarification', 'App\\User', 1400, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-07-22 05:10:20', '2021-07-22 05:10:20'),
('e361dbdc-9e5a-4379-a411-9fd06a07ae55', 'App\\Notifications\\Emailvarification', 'App\\User', 1401, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-07-22 17:05:11', '2021-07-22 17:05:11'),
('1aa8bcf3-c53b-44e1-8665-1383d3b9741a', 'App\\Notifications\\Emailvarification', 'App\\User', 1402, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-07-22 18:57:41', '2021-07-22 18:57:41'),
('975f9ff7-b977-4a00-9a61-a79b085a2179', 'App\\Notifications\\Emailvarification', 'App\\User', 1403, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-07-22 21:13:46', '2021-07-22 21:13:46'),
('fb0ef2d3-a129-4509-ab8a-43946451b33d', 'App\\Notifications\\Emailvarification', 'App\\User', 1404, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-07-23 01:24:21', '2021-07-23 01:24:21'),
('05b648ac-209a-4b8a-93df-96728e7d2c1e', 'App\\Notifications\\Emailvarification', 'App\\User', 1405, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-07-23 18:45:37', '2021-07-23 18:45:37'),
('861816ce-5e94-425f-9030-411cbd39c6b1', 'App\\Notifications\\Emailvarification', 'App\\User', 1406, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-07-23 18:47:43', '2021-07-23 18:47:43'),
('13e251f8-b26f-4ce3-a7b7-ad25d59d857f', 'App\\Notifications\\Emailvarification', 'App\\User', 1407, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-07-24 05:05:17', '2021-07-24 05:05:17'),
('a4e069b4-2a6c-41a9-88a5-b3bdb6a977a0', 'App\\Notifications\\Emailvarification', 'App\\User', 1408, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-07-24 08:24:29', '2021-07-24 08:24:29'),
('54993971-8af0-41f0-b1ad-b1bada9c46b7', 'App\\Notifications\\Emailvarification', 'App\\User', 1409, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-07-24 20:53:55', '2021-07-24 20:53:55'),
('b45ca02f-07fe-4cb4-bf04-c0346f76c974', 'App\\Notifications\\InvoiceNotifications', 'App\\User', 83, '{\"greeting\":\"Invoice\",\"body\":{\"booking\":\"BOOKING DETAILS\",\"Pick Date\":\"2021-06-09\",\"Pick Address\":\"Frankfurt, Deutschland\",\"Drop Address\":\"Saarbr\\u00fccken, Deutschland\",\"Selected Class\":\"Saarbr\\u00fccken, Deutschland\",\"Travel Amount\":\"364.71\",\"extra Amount\":\"0.00\",\"Payment Status\":\"pending\",\"invoicenumber\":\"ML- 903080\",\"bookingid\":\"63\",\"pendingamount\":\"20\",\"filename\":\"invoice63.pdf\"},\"thanks_text\":\"Thanks For Using Moray Limousines\",\"actionLink\":\"\",\"0\":\"\"}', NULL, '2021-07-27 03:56:11', '2021-07-27 03:56:11'),
('9cc447b8-2245-4016-bf3b-da739dcabdda', 'App\\Notifications\\InvoiceNotifications', 'App\\User', 83, '{\"greeting\":\"Invoice\",\"body\":{\"booking\":\"BOOKING DETAILS\",\"Pick Date\":\"2021-06-12\",\"Pick Address\":\"Frankfurt, Deutschland\",\"Drop Address\":\"Saarbr\\u00fccken, Deutschland\",\"Selected Class\":\"Saarbr\\u00fccken, Deutschland\",\"Travel Amount\":\"364.71\",\"extra Amount\":\"0.00\",\"Payment Status\":\"pending\",\"invoicenumber\":\"ML- 186445\",\"bookingid\":\"64\",\"pendingamount\":null,\"filename\":\"invoice64.pdf\"},\"thanks_text\":\"Thanks For Using Moray Limousines\",\"actionLink\":\"\",\"0\":\"\"}', NULL, '2021-07-27 04:01:13', '2021-07-27 04:01:13'),
('927f7f2a-69da-4246-bfd3-73f7183be8eb', 'App\\Notifications\\InvoiceNotifications', 'App\\User', 83, '{\"greeting\":\"Invoice\",\"body\":{\"booking\":\"BOOKING DETAILS\",\"Pick Date\":\"2021-06-09\",\"Pick Address\":\"Frankfurt, Deutschland\",\"Drop Address\":\"Saarbr\\u00fccken, Deutschland\",\"Selected Class\":\"Saarbr\\u00fccken, Deutschland\",\"Travel Amount\":\"364.71\",\"extra Amount\":\"0.00\",\"Payment Status\":\"pending\",\"invoicenumber\":\"ML- 309664\",\"bookingid\":\"63\",\"pendingamount\":\"20\",\"filename\":\"invoice63.pdf\"},\"thanks_text\":\"Thanks For Using Moray Limousines\",\"actionLink\":\"\",\"0\":\"\"}', NULL, '2021-07-27 04:02:38', '2021-07-27 04:02:38'),
('716c8c86-e9aa-47a1-af4c-577e4febb553', 'App\\Notifications\\InvoiceNotifications', 'App\\User', 83, '{\"greeting\":\"Invoice\",\"body\":{\"booking\":\"BOOKING DETAILS\",\"Pick Date\":\"2021-06-16\",\"Pick Address\":\"Flughafen Frankfurt (FRA), Frankfurt, Deutschland\",\"Drop Address\":\"Saarbr\\u00fccken, Deutschland\",\"Selected Class\":\"Saarbr\\u00fccken, Deutschland\",\"Travel Amount\":\"344.97\",\"extra Amount\":\"0.00\",\"Payment Status\":\"pending\",\"invoicenumber\":\"ML- 204521\",\"bookingid\":\"65\",\"pendingamount\":null,\"filename\":\"invoice65.pdf\"},\"thanks_text\":\"Thanks For Using Moray Limousines\",\"actionLink\":\"\",\"0\":\"\"}', NULL, '2021-07-27 04:03:58', '2021-07-27 04:03:58'),
('8f9317ef-68b1-4aaf-b96a-f3f7314c8bcd', 'App\\Notifications\\InvoiceNotifications', 'App\\User', 12, '{\"greeting\":\"Invoice\",\"body\":{\"booking\":\"BOOKING DETAILS\",\"Pick Date\":\"2021-06-29\",\"Pick Address\":\"Berlin, Germany\",\"Drop Address\":\"Frankfurt, Germany\",\"Selected Class\":\"Frankfurt, Germany\",\"Travel Amount\":\"1065.75\",\"extra Amount\":null,\"Payment Status\":\"pending\",\"invoicenumber\":\"ML- 712808\",\"bookingid\":\"75\",\"pendingamount\":\"0\",\"filename\":\"invoice75.pdf\"},\"thanks_text\":\"Thanks For Using Moray Limousines\",\"actionLink\":\"\",\"0\":\"\"}', NULL, '2021-07-27 04:12:29', '2021-07-27 04:12:29'),
('f361f90f-9e23-4cc8-bdab-76ff761a34e6', 'App\\Notifications\\InvoiceNotifications', 'App\\User', 12, '{\"greeting\":\"Invoice\",\"body\":{\"booking\":\"BOOKING DETAILS\",\"Pick Date\":\"2021-06-29\",\"Pick Address\":\"Berlin, Germany\",\"Drop Address\":\"Frankfurt, Germany\",\"Selected Class\":\"Frankfurt, Germany\",\"Travel Amount\":\"1065.75\",\"extra Amount\":null,\"Payment Status\":\"pending\",\"invoicenumber\":\"ML- 198146\",\"bookingid\":\"75\",\"pendingamount\":\"0\",\"filename\":\"invoice75.pdf\"},\"thanks_text\":\"Thanks For Using Moray Limousines\",\"actionLink\":\"\",\"0\":\"\"}', NULL, '2021-07-27 04:14:14', '2021-07-27 04:14:14'),
('5c69beca-e83a-48b9-a011-0c595fec606a', 'App\\Notifications\\InvoiceNotifications', 'App\\User', 83, '{\"greeting\":\"Invoice\",\"body\":{\"booking\":\"BOOKING DETAILS\",\"Pick Date\":\"2021-06-16\",\"Pick Address\":\"Frankfurt, Deutschland\",\"Drop Address\":\"Berlin, Deutschland\",\"Selected Class\":\"Berlin, Deutschland\",\"Travel Amount\":\"1076.94\",\"extra Amount\":\"22.00\",\"Payment Status\":\"pending\",\"invoicenumber\":\"ML- 910842\",\"bookingid\":\"66\",\"pendingamount\":null,\"filename\":\"invoice66.pdf\"},\"thanks_text\":\"Thanks For Using Moray Limousines\",\"actionLink\":\"\",\"0\":\"\"}', NULL, '2021-07-27 04:18:20', '2021-07-27 04:18:20'),
('7cc86e9c-94a1-47f9-ba17-173485a297ef', 'App\\Notifications\\InvoiceNotifications', 'App\\User', 83, '{\"greeting\":\"Invoice\",\"body\":{\"booking\":\"BOOKING DETAILS\",\"Pick Date\":\"2021-06-16\",\"Pick Address\":\"Frankfurt, Deutschland\",\"Drop Address\":\"Berlin, Deutschland\",\"Selected Class\":\"Berlin, Deutschland\",\"Travel Amount\":\"1076.94\",\"extra Amount\":\"22.00\",\"Payment Status\":\"pending\",\"invoicenumber\":\"ML- 383091\",\"bookingid\":\"66\",\"pendingamount\":null,\"filename\":\"invoice66.pdf\"},\"thanks_text\":\"Thanks For Using Moray Limousines\",\"actionLink\":\"\",\"0\":\"\"}', NULL, '2021-07-27 04:20:09', '2021-07-27 04:20:09'),
('f42b3b4b-ef29-4ac3-934c-c35a16265070', 'App\\Notifications\\InvoiceNotifications', 'App\\User', 83, '{\"greeting\":\"Invoice\",\"body\":{\"booking\":\"BOOKING DETAILS\",\"Pick Date\":\"2021-06-16\",\"Pick Address\":\"Frankfurt, Deutschland\",\"Drop Address\":\"Berlin, Deutschland\",\"Selected Class\":\"Berlin, Deutschland\",\"Travel Amount\":\"1076.94\",\"extra Amount\":\"22.00\",\"Payment Status\":\"pending\",\"invoicenumber\":\"ML- 679736\",\"bookingid\":\"66\",\"pendingamount\":null,\"filename\":\"invoice66.pdf\"},\"thanks_text\":\"Thanks For Using Moray Limousines\",\"actionLink\":\"\",\"0\":\"\"}', NULL, '2021-07-27 04:36:19', '2021-07-27 04:36:19'),
('1b459728-40c5-48a5-8443-c1317e2dfd66', 'App\\Notifications\\InvoiceNotifications', 'App\\User', 83, '{\"greeting\":\"Invoice\",\"body\":{\"booking\":\"BOOKING DETAILS\",\"Pick Date\":\"2021-06-16\",\"Pick Address\":\"Frankfurt, Deutschland\",\"Drop Address\":\"Berlin, Deutschland\",\"Selected Class\":\"Berlin, Deutschland\",\"Travel Amount\":\"1076.94\",\"extra Amount\":\"22.00\",\"Payment Status\":\"pending\",\"invoicenumber\":\"ML- 300554\",\"bookingid\":\"66\",\"pendingamount\":null,\"filename\":\"invoice66.pdf\"},\"thanks_text\":\"Thanks For Using Moray Limousines\",\"actionLink\":\"\",\"0\":\"\"}', NULL, '2021-07-27 04:37:18', '2021-07-27 04:37:18'),
('93d6b34b-cd55-4205-a29e-382d5d97671d', 'App\\Notifications\\InvoiceNotifications', 'App\\User', 83, '{\"greeting\":\"Invoice\",\"body\":{\"booking\":\"BOOKING DETAILS\",\"Pick Date\":\"2021-06-16\",\"Pick Address\":\"Frankfurt, Deutschland\",\"Drop Address\":\"Berlin, Deutschland\",\"Selected Class\":\"Berlin, Deutschland\",\"Travel Amount\":\"1076.94\",\"extra Amount\":\"22.00\",\"Payment Status\":\"pending\",\"invoicenumber\":\"ML- 949692\",\"bookingid\":\"66\",\"pendingamount\":null,\"filename\":\"invoice66.pdf\"},\"thanks_text\":\"Thanks For Using Moray Limousines\",\"actionLink\":\"\",\"0\":\"\"}', NULL, '2021-07-27 04:41:57', '2021-07-27 04:41:57'),
('8c221c27-b6f6-49c6-8c05-d7064cb5c6a8', 'App\\Notifications\\InvoiceNotifications', 'App\\User', 12, '{\"greeting\":\"Invoice\",\"body\":{\"booking\":\"BOOKING DETAILS\",\"Pick Date\":\"2021-06-17\",\"Pick Address\":\"Frankfurt, Deutschland\",\"Drop Address\":\"Saarbr\\u00fccken, Deutschland\",\"Selected Class\":\"Saarbr\\u00fccken, Deutschland\",\"Travel Amount\":\"371.67\",\"extra Amount\":\"0.00\",\"Payment Status\":\"pending\",\"invoicenumber\":\"ML- 847416\",\"bookingid\":\"67\",\"pendingamount\":null,\"filename\":\"invoice67.pdf\"},\"thanks_text\":\"Thanks For Using Moray Limousines\",\"actionLink\":\"\",\"0\":\"\"}', '2021-10-08 03:42:43', '2021-07-27 04:43:03', '2021-10-08 03:42:43'),
('b7090c17-853f-4378-acec-44b0a4afe413', 'App\\Notifications\\InvoiceNotifications', 'App\\User', 12, '{\"greeting\":\"Invoice\",\"body\":{\"booking\":\"BOOKING DETAILS\",\"Pick Date\":\"2021-06-17\",\"Pick Address\":\"Frankfurt, Deutschland\",\"Drop Address\":\"Saarbr\\u00fccken, Deutschland\",\"Selected Class\":\"Saarbr\\u00fccken, Deutschland\",\"Travel Amount\":\"371.67\",\"extra Amount\":\"0.00\",\"Payment Status\":\"pending\",\"invoicenumber\":\"ML- 797662\",\"bookingid\":\"67\",\"pendingamount\":null,\"filename\":\"invoice67.pdf\"},\"thanks_text\":\"Thanks For Using Moray Limousines\",\"actionLink\":\"\",\"0\":\"\"}', '2021-10-07 08:04:24', '2021-07-27 04:45:19', '2021-10-07 08:04:24'),
('446f6eab-d091-4a16-b8b0-c4de748a52fc', 'App\\Notifications\\Emailvarification', 'App\\User', 1410, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-07-27 04:46:18', '2021-07-27 04:46:18'),
('fbfb77b4-1cac-48f5-8757-e24d26259cfa', 'App\\Notifications\\Emailvarification', 'App\\User', 1411, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-07-27 06:56:51', '2021-07-27 06:56:51'),
('7906558a-abce-47ab-856d-93cffd0197ab', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 1249, '{\"greeting\":\"Your Booking Request is approved by Moray Limousine\",\"body\":\"Your Booking Request is approved by Moray Limousine which Frankfurt Airport (FRA), Frankfurt, Germany And Pick Time is  17:05:00 ! Enjoy With Us.  \",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', NULL, '2021-07-28 12:45:21', '2021-07-28 12:45:21'),
('c4b5fe5c-34ca-4822-832c-90635fb526dd', 'App\\Notifications\\InvoiceNotifications', 'App\\User', 1249, '{\"greeting\":\"Invoice\",\"body\":{\"booking\":\"BOOKING DETAILS\",\"Pick Date\":\"2021-06-30\",\"Pick Address\":\"Frankfurt Airport (FRA), Frankfurt, Germany\",\"Drop Address\":\"60528 Frankfurt, Germany\",\"Selected Class\":\"60528 Frankfurt, Germany\",\"Travel Amount\":\"85.76\",\"extra Amount\":null,\"Payment Status\":\"pending\",\"invoicenumber\":\"ML- 450073\",\"bookingid\":\"68\",\"pendingamount\":\"10\",\"filename\":\"invoice68.pdf\"},\"thanks_text\":\"Thanks For Using Moray Limousines\",\"actionLink\":\"\",\"0\":\"\"}', NULL, '2021-07-28 12:46:08', '2021-07-28 12:46:08'),
('0d008000-ccbc-4053-b985-cb2e00199d00', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 1251, '{\"greeting\":\"Your Booking Request is approved by Moray Limousine\",\"body\":\"Your Booking Request is approved by Moray Limousine which London, UK And Pick Time is  15:30:00 ! Enjoy With Us.  \",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', NULL, '2021-07-28 13:00:31', '2021-07-28 13:00:31'),
('4bdc5cc4-cbf4-41cd-a5c9-67b02891231b', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 1251, '{\"greeting\":\"Your Booking Request is approved by Moray Limousine\",\"body\":\"Your Booking Request is approved by Moray Limousine which London, UK And Pick Time is  15:30:00 ! Enjoy With Us.  \",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', NULL, '2021-07-28 13:01:13', '2021-07-28 13:01:13'),
('52c52e27-1762-4673-9547-36a8357d6348', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 1258, '{\"greeting\":\"Your Booking Request is approved by Moray Limousine\",\"body\":\"Your Booking Request is approved by Moray Limousine which Pixisstra\\u00dfe 2A, M\\u00fcnchen, Deutschland And Pick Time is  13:30:00 ! Enjoy With Us.  \",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', NULL, '2021-07-28 13:01:26', '2021-07-28 13:01:26'),
('46b06bb6-a51c-485d-93a3-e6430bf7ef55', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 1258, '{\"greeting\":\"Your Booking Request is approved by Moray Limousine\",\"body\":\"Your Booking Request is approved by Moray Limousine which Pixisstra\\u00dfe 2A, M\\u00fcnchen, Deutschland And Pick Time is  13:30:00 ! Enjoy With Us.  \",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', NULL, '2021-07-28 13:04:59', '2021-07-28 13:04:59'),
('cfcd9b4f-44b0-4088-b853-c8b9da8a5346', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 1258, '{\"greeting\":\"Your Booking Request is approved by Moray Limousine\",\"body\":\"Your Booking Request is approved by Moray Limousine which Pixisstra\\u00dfe 2A, M\\u00fcnchen, Deutschland And Pick Time is  13:30:00 ! Enjoy With Us.  \",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', NULL, '2021-07-28 13:05:44', '2021-07-28 13:05:44'),
('eb4b613d-782d-4d2d-b7df-7c9dc0833dbb', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 81, '{\"greeting\":\"Your Booking Request is approved by Moray Limousine\",\"body\":\"Your Booking Request is approved by Moray Limousine which Frankfurt Airport (FRA) (FRA), Frankfurt am Main, Deutschland And Pick Time is  13:30:00 ! Enjoy With Us.  \",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', NULL, '2021-07-29 06:29:26', '2021-07-29 06:29:26'),
('e6f7f71d-6aec-4920-b105-95842d335121', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 81, '{\"greeting\":\"Your Booking Request is approved by Moray Limousine\",\"body\":\"Your Booking Request is approved by Moray Limousine which Frankfurt Airport (FRA) (FRA), Frankfurt am Main, Deutschland And Pick Time is  13:30:00 ! Enjoy With Us.  \",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', NULL, '2021-07-29 06:30:57', '2021-07-29 06:30:57'),
('b97b3f35-3ac7-4000-a2c4-c773d3f5e6dc', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 81, '{\"greeting\":\"Your Booking Request is approved by Moray Limousine\",\"body\":\"Your Booking Request is approved by Moray Limousine which Frankfurt Airport (FRA) (FRA), Frankfurt am Main, Deutschland And Pick Time is  13:30:00 ! Enjoy With Us.  \",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', NULL, '2021-07-29 06:31:01', '2021-07-29 06:31:01'),
('67ae3b5c-115a-4afc-ac5a-e43989488319', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 81, '{\"greeting\":\"Your Booking Request is approved by Moray Limousine\",\"body\":\"Your Booking Request is approved by Moray Limousine which Frankfurt Airport (FRA) (FRA), Frankfurt am Main, Deutschland And Pick Time is  13:30:00 ! Enjoy With Us.  \",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', NULL, '2021-07-29 06:31:09', '2021-07-29 06:31:09'),
('3ab10346-9bde-4f4b-b631-2ed85a484802', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 81, '{\"greeting\":\"Your Booking Request is approved by Moray Limousine\",\"body\":\"Your Booking Request is approved by Moray Limousine which Frankfurt Airport (FRA) (FRA), Frankfurt am Main, Deutschland And Pick Time is  13:30:00 ! Enjoy With Us.  \",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', NULL, '2021-07-29 06:32:19', '2021-07-29 06:32:19'),
('c7bf808d-204e-49bb-9011-614a2d8c8922', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 81, '{\"greeting\":\"Your Booking Request is approved by Moray Limousine\",\"body\":\"Your Booking Request is approved by Moray Limousine which Frankfurt Airport (FRA) (FRA), Frankfurt am Main, Deutschland And Pick Time is  13:30:00 ! Enjoy With Us.  \",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', NULL, '2021-07-29 06:33:13', '2021-07-29 06:33:13'),
('c4d3b24f-43f1-4d86-bff1-c871e584e0a5', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 81, '{\"greeting\":\"Your Booking Request is approved by Moray Limousine\",\"body\":\"Your Booking Request is approved by Moray Limousine which Frankfurt Airport (FRA) (FRA), Frankfurt am Main, Deutschland And Pick Time is  13:30:00 ! Enjoy With Us.  \",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', NULL, '2021-07-29 06:34:06', '2021-07-29 06:34:06'),
('6a937de3-d760-4627-9b78-85b817e3fb89', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 81, '{\"greeting\":\"Your Booking Request is approved by Moray Limousine\",\"body\":\"Your Booking Request is approved by Moray Limousine which Frankfurt Airport (FRA) (FRA), Frankfurt am Main, Deutschland And Pick Time is  13:30:00 ! Enjoy With Us.  \",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', NULL, '2021-07-29 06:34:22', '2021-07-29 06:34:22'),
('5aaba14e-cfd2-417e-8737-134dbd2ce865', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 81, '{\"greeting\":\"Your Booking Request is approved by Moray Limousine\",\"body\":\"Your Booking Request is approved by Moray Limousine which Frankfurt Airport (FRA) (FRA), Frankfurt am Main, Deutschland And Pick Time is  13:30:00 ! Enjoy With Us.  \",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', NULL, '2021-07-29 06:34:32', '2021-07-29 06:34:32'),
('6e6344a5-ed10-4eed-b527-518a01ec0fcb', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 81, '{\"greeting\":\"Your Booking Request is approved by Moray Limousine\",\"body\":\"Your Booking Request is approved by Moray Limousine which Frankfurt Airport (FRA) (FRA), Frankfurt am Main, Deutschland And Pick Time is  13:30:00 ! Enjoy With Us.  \",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', NULL, '2021-07-29 07:06:19', '2021-07-29 07:06:19'),
('815c6dbf-3f96-4d8b-8c7d-66673b0c1eba', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 81, '{\"greeting\":\"Your Booking Request is approved by Moray Limousine\",\"body\":\"Your Booking Request is approved by Moray Limousine which Frankfurt Airport (FRA) (FRA), Frankfurt am Main, Deutschland And Pick Time is  13:30:00 ! Enjoy With Us.  \",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', NULL, '2021-07-29 08:16:17', '2021-07-29 08:16:17'),
('1bc3a738-3bf4-4b85-bf84-97a4d0f73798', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 81, '{\"greeting\":\"Your Booking Request is approved by Moray Limousine\",\"body\":\"Your Booking Request is approved by Moray Limousine which Frankfurt Airport (FRA) (FRA), Frankfurt am Main, Deutschland And Pick Time is  13:30:00 ! Enjoy With Us.  \",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', NULL, '2021-07-29 08:20:20', '2021-07-29 08:20:20'),
('909d0136-40de-4fd1-9d76-073a940144b6', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 81, '{\"greeting\":\"Your Booking Request is approved by Moray Limousine\",\"body\":\"Your Booking Request is approved by Moray Limousine which Frankfurt Airport (FRA) (FRA), Frankfurt am Main, Deutschland And Pick Time is  13:30:00 ! Enjoy With Us.  \",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', NULL, '2021-07-29 08:21:48', '2021-07-29 08:21:48'),
('289dfd91-ce4c-413b-96d0-5791de32b58f', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 81, '{\"greeting\":\"Your Booking Request is approved by Moray Limousine\",\"body\":\"Your Booking Request is approved by Moray Limousine which Frankfurt Airport (FRA) (FRA), Frankfurt am Main, Deutschland And Pick Time is  13:30:00 ! Enjoy With Us.  \",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', NULL, '2021-07-29 09:20:04', '2021-07-29 09:20:04'),
('bdbdb668-d675-4a1a-9c99-1357e0117fee', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 81, '{\"greeting\":\"Your Booking Request is approved by Moray Limousine\",\"body\":\"Your Booking Request is approved by Moray Limousine which Frankfurt Airport (FRA) (FRA), Frankfurt am Main, Deutschland And Pick Time is  13:30:00 ! Enjoy With Us.  \",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', NULL, '2021-07-29 09:20:54', '2021-07-29 09:20:54'),
('73d9fcac-f896-4c95-b5e2-88c107b070ec', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 81, '{\"greeting\":\"Your Booking Request is approved by Moray Limousine\",\"body\":\"Your Booking Request is approved by Moray Limousine which Frankfurt Airport (FRA) (FRA), Frankfurt am Main, Deutschland And Pick Time is  13:30:00 ! Enjoy With Us.  \",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', NULL, '2021-07-29 09:20:57', '2021-07-29 09:20:57'),
('d9c3d76c-cdbd-471a-b383-630dc94c8e07', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 81, '{\"greeting\":\"Your Booking Request is approved by Moray Limousine\",\"body\":\"Your Booking Request is approved by Moray Limousine which Frankfurt Airport (FRA) (FRA), Frankfurt am Main, Deutschland And Pick Time is  13:30:00 ! Enjoy With Us.  \",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', NULL, '2021-07-29 09:30:15', '2021-07-29 09:30:15'),
('f192af63-a80f-4451-8723-2dfb58589b8d', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 81, '{\"greeting\":\"Your Booking Request is approved by Moray Limousine\",\"body\":\"Your Booking Request is approved by Moray Limousine which Frankfurt Airport (FRA) (FRA), Frankfurt am Main, Deutschland And Pick Time is  13:30:00 ! Enjoy With Us.  \",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', NULL, '2021-07-29 09:30:18', '2021-07-29 09:30:18'),
('3ea600d9-b268-4bfa-a811-474c447044de', 'App\\Notifications\\Emailvarification', 'App\\User', 1412, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-08-13 05:23:07', '2021-08-13 05:23:07'),
('53b40e73-a63b-471e-86ff-647372400484', 'App\\Notifications\\Emailvarification', 'App\\User', 1413, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-08-17 10:22:18', '2021-08-17 10:22:18'),
('0d166b74-8424-4b83-8f4f-2474f8769c85', 'App\\Notifications\\Emailvarification', 'App\\User', 1414, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-08-17 12:04:47', '2021-08-17 12:04:47'),
('e5a7f83d-8537-4c85-8407-a3a4da740a55', 'App\\Notifications\\Emailvarification', 'App\\User', 1415, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-08-17 13:26:48', '2021-08-17 13:26:48'),
('e7544a2c-79c4-4379-8cc6-f8776f6cfc11', 'App\\Notifications\\Emailvarification', 'App\\User', 1416, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-08-17 13:32:39', '2021-08-17 13:32:39'),
('61d9e9fa-c6bc-4813-a36b-ee3b4c2dbbc9', 'App\\Notifications\\Emailvarification', 'App\\User', 1417, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-08-17 13:37:55', '2021-08-17 13:37:55'),
('83761e08-529b-4649-a267-60a8d5088aa2', 'App\\Notifications\\Emailvarification', 'App\\User', 1418, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-08-17 13:44:20', '2021-08-17 13:44:20'),
('5c93cab2-64fd-457a-b0a2-2c54eb1c8949', 'App\\Notifications\\Emailvarification', 'App\\User', 1419, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-08-23 04:02:20', '2021-08-23 04:02:20'),
('5b61035a-b857-4132-add2-28fef7fa6b4d', 'App\\Notifications\\Emailvarification', 'App\\User', 1420, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-08-23 04:54:07', '2021-08-23 04:54:07'),
('4d85a96f-7798-4c1d-99fa-b9f38b0c176e', 'App\\Notifications\\Emailvarification', 'App\\User', 1421, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-08-23 06:21:31', '2021-08-23 06:21:31'),
('2c99a27a-8fcd-4dec-b71c-876c688165b2', 'App\\Notifications\\Emailvarification', 'App\\User', 1422, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-08-23 06:24:16', '2021-08-23 06:24:16'),
('59a0f659-d6cd-44a4-9c0b-4f53e7f83134', 'App\\Notifications\\Emailvarification', 'App\\User', 1423, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-08-23 06:26:17', '2021-08-23 06:26:17'),
('ff927547-91ef-49a6-b541-2b45b02e38e8', 'App\\Notifications\\Emailvarification', 'App\\User', 1424, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-08-23 06:41:29', '2021-08-23 06:41:29'),
('1c7589b0-250b-4064-98c6-2d226ce7d428', 'App\\Notifications\\Emailvarification', 'App\\User', 1425, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-08-23 06:47:07', '2021-08-23 06:47:07'),
('9e3d9fc2-8517-4eb1-a474-eec0b47f132d', 'App\\Notifications\\Emailvarification', 'App\\User', 1426, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-08-23 07:20:32', '2021-08-23 07:20:32'),
('8b254a6d-d8ca-489b-b415-d829f106ae3b', 'App\\Notifications\\Emailvarification', 'App\\User', 1427, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-08-23 08:24:02', '2021-08-23 08:24:02'),
('29dd1d21-e3d3-42fe-91d0-9675e11d2e27', 'App\\Notifications\\Emailvarification', 'App\\User', 1428, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-08-23 08:27:05', '2021-08-23 08:27:05'),
('61ef9508-09f1-4860-8a35-9566f124ba7b', 'App\\Notifications\\Emailvarification', 'App\\User', 1429, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-08-23 08:30:08', '2021-08-23 08:30:08'),
('248b732a-8738-4039-96ce-2bca97da13cb', 'App\\Notifications\\Emailvarification', 'App\\User', 1430, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-08-23 09:10:56', '2021-08-23 09:10:56'),
('c45c9f66-df50-427d-91cf-7d99bbb96c04', 'App\\Notifications\\Emailvarification', 'App\\User', 1431, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-08-23 09:13:12', '2021-08-23 09:13:12'),
('78eae54d-a1b8-4a82-9f48-aef09fc8e55d', 'App\\Notifications\\Emailvarification', 'App\\User', 1432, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-08-23 09:13:47', '2021-08-23 09:13:47'),
('6425a60e-2e0a-4559-bb0f-241aa7fed2a6', 'App\\Notifications\\Emailvarification', 'App\\User', 1433, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-08-23 10:08:29', '2021-08-23 10:08:29'),
('8bcf5054-1e89-440d-b83d-1749336df968', 'App\\Notifications\\Emailvarification', 'App\\User', 1434, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-08-23 10:11:05', '2021-08-23 10:11:05'),
('44062e8e-fc58-4bd4-9bac-455b1e2610b6', 'App\\Notifications\\Emailvarification', 'App\\User', 1435, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-08-23 10:12:01', '2021-08-23 10:12:01'),
('cfded7fd-0729-4a33-83b7-b8d765192a93', 'App\\Notifications\\Emailvarification', 'App\\User', 1436, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-08-23 10:12:57', '2021-08-23 10:12:57'),
('6d90060e-1193-4f65-93d7-1a539065d536', 'App\\Notifications\\Emailvarification', 'App\\User', 1437, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-08-23 10:13:31', '2021-08-23 10:13:31'),
('f7426cf5-35df-40c0-ac5f-282848b876a3', 'App\\Notifications\\Emailvarification', 'App\\User', 1438, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-08-23 10:14:36', '2021-08-23 10:14:36'),
('bfe9b162-e0f9-4356-a044-e4a5c858331e', 'App\\Notifications\\Emailvarification', 'App\\User', 1439, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-08-23 10:14:55', '2021-08-23 10:14:55'),
('bc1beb7b-ed0b-453b-b96e-257166b20168', 'App\\Notifications\\Emailvarification', 'App\\User', 1440, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-09-06 03:32:29', '2021-09-06 03:32:29'),
('a44d2288-66ac-4de1-ab80-4c06024d6725', 'App\\Notifications\\Emailvarification', 'App\\User', 1441, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-09-06 03:32:53', '2021-09-06 03:32:53'),
('a1427140-3f94-4e3d-a2eb-d3b2994cfa17', 'App\\Notifications\\Emailvarification', 'App\\User', 1442, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-09-06 03:34:54', '2021-09-06 03:34:54'),
('8db4641a-cff3-4f93-8a44-e772b4af6214', 'App\\Notifications\\Emailvarification', 'App\\User', 1443, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-09-06 03:52:57', '2021-09-06 03:52:57'),
('7ab2a3a7-e646-47e5-9192-bd13510b0185', 'App\\Notifications\\Emailvarification', 'App\\User', 1444, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-09-06 03:59:54', '2021-09-06 03:59:54'),
('8b3c7311-444c-4aab-9105-a1e1fb73e009', 'App\\Notifications\\Emailvarification', 'App\\User', 1445, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-09-06 04:04:26', '2021-09-06 04:04:26'),
('8d447ed8-04bc-48ae-bbba-caedd7d611cd', 'App\\Notifications\\Emailvarification', 'App\\User', 1446, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-09-13 12:21:10', '2021-09-13 12:21:10'),
('a8b564e5-fee5-4d92-8bcf-9b6db08da3b3', 'App\\Notifications\\Emailvarification', 'App\\User', 1447, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-09-15 03:32:08', '2021-09-15 03:32:08'),
('7f8ae2b4-ef80-4c18-818c-169e35c2a2ce', 'App\\Notifications\\Emailvarification', 'App\\User', 1448, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-09-15 03:36:33', '2021-09-15 03:36:33'),
('5055a0fa-a6da-4cf5-806a-7b8dbb487e4d', 'App\\Notifications\\Emailvarification', 'App\\User', 1449, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-09-15 03:40:28', '2021-09-15 03:40:28'),
('bb1dad09-f2dd-4668-b0f2-68e9b5446a4a', 'App\\Notifications\\Emailvarification', 'App\\User', 1450, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-09-15 03:40:44', '2021-09-15 03:40:44'),
('2e66f995-ad2b-4fc7-85b9-032d8fdf88c6', 'App\\Notifications\\Emailvarification', 'App\\User', 1451, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-09-15 03:45:19', '2021-09-15 03:45:19'),
('e1c3b1e8-50af-4dad-a576-68d8eeab354e', 'App\\Notifications\\Emailvarification', 'App\\User', 1452, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-09-15 03:47:22', '2021-09-15 03:47:22'),
('429b3f61-a830-41e5-9eee-7af35be82da6', 'App\\Notifications\\Emailvarification', 'App\\User', 1453, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-09-15 03:55:07', '2021-09-15 03:55:07'),
('73e9b93b-e642-4e39-b34a-bc392886d717', 'App\\Notifications\\Emailvarification', 'App\\User', 1454, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-09-15 03:56:50', '2021-09-15 03:56:50'),
('e7376624-3f9e-481d-9ac5-8a63d7b03a76', 'App\\Notifications\\Emailvarification', 'App\\User', 1455, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-09-15 04:19:35', '2021-09-15 04:19:35'),
('849dce93-aff6-4429-ab7a-304ba6e19c4a', 'App\\Notifications\\Emailvarification', 'App\\User', 1456, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-09-15 04:20:36', '2021-09-15 04:20:36'),
('53f6add8-b908-4797-950e-c855e54ec97f', 'App\\Notifications\\Emailvarification', 'App\\User', 1457, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-09-15 04:23:23', '2021-09-15 04:23:23'),
('341588e8-bab0-4656-b487-dc75530e94fb', 'App\\Notifications\\Emailvarification', 'App\\User', 1458, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-09-18 07:09:44', '2021-09-18 07:09:44'),
('2c68860f-d804-4143-b32c-ef0e5a71a769', 'App\\Notifications\\Emailvarification', 'App\\User', 1459, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-09-18 07:11:33', '2021-09-18 07:11:33'),
('06a1b421-3cf6-4540-9b20-ae5f618262ae', 'App\\Notifications\\Emailvarification', 'App\\User', 1460, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-09-18 07:12:49', '2021-09-18 07:12:49'),
('9d9e0413-fc90-4ab1-a448-ea95e9e3275c', 'App\\Notifications\\Emailvarification', 'App\\User', 1461, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-09-18 08:26:42', '2021-09-18 08:26:42'),
('21ff3859-cf78-48fb-809d-cbe3924c7048', 'App\\Notifications\\Emailvarification', 'App\\User', 1462, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-09-24 07:48:48', '2021-09-24 07:48:48'),
('1ccd1212-e385-44e2-ba59-f102f1d8a577', 'App\\Notifications\\Emailvarification', 'App\\User', 1462, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-09-24 07:55:37', '2021-09-24 07:55:37'),
('498907ed-32f5-4d2e-8565-3888187fdfed', 'App\\Notifications\\Emailvarification', 'App\\User', 1463, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-09-27 14:21:38', '2021-09-27 14:21:38'),
('f8101ab5-e5ec-4f0a-b99c-b8beaacf14f3', 'App\\Notifications\\Emailvarification', 'App\\User', 1464, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-10-01 10:18:10', '2021-10-01 10:18:10'),
('10bf71ca-2e20-4d24-b0d6-bd692f5227fe', 'App\\Notifications\\Emailvarification', 'App\\User', 1465, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-10-06 09:53:16', '2021-10-06 09:53:16'),
('89e34d81-9909-4bf1-ae14-60ca5d0b6acd', 'App\\Notifications\\Emailvarification', 'App\\User', 1466, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-10-06 09:55:12', '2021-10-06 09:55:12'),
('b0060c31-e3d6-467f-8969-2d5693731ad9', 'App\\Notifications\\Emailvarification', 'App\\User', 1467, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-10-06 09:55:42', '2021-10-06 09:55:42'),
('a012f50c-dece-4a24-bf8a-288e4570f62a', 'App\\Notifications\\Emailvarification', 'App\\User', 1468, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-10-06 09:56:42', '2021-10-06 09:56:42'),
('f3f33ec3-4f02-4e8a-9c9a-06ec546c1d3c', 'App\\Notifications\\Emailvarification', 'App\\User', 1469, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-10-06 10:01:58', '2021-10-06 10:01:58'),
('225df6ce-0992-467d-8a7c-21ee46f562f2', 'App\\Notifications\\Emailvarification', 'App\\User', 1470, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-10-06 10:03:29', '2021-10-06 10:03:29'),
('47350adb-c9ad-46fb-9ed7-08647b51814e', 'App\\Notifications\\Emailvarification', 'App\\User', 1471, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-10-06 10:12:41', '2021-10-06 10:12:41'),
('4adc4df3-737a-4bb1-b953-3524956acb48', 'App\\Notifications\\Emailvarification', 'App\\User', 1473, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-10-06 15:08:15', '2021-10-06 15:08:15'),
('0ddcc15d-082e-4ba6-8748-df0bb928ad82', 'App\\Notifications\\Emailvarification', 'App\\User', 1474, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', '2021-10-08 03:42:18', '2021-10-07 02:51:31', '2021-10-08 03:42:18'),
('3a487977-fbf1-451e-90a9-fa5537760d52', 'App\\Notifications\\Emailvarification', 'App\\User', 1471, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-10-07 03:05:58', '2021-10-07 03:05:58'),
('306e779e-1158-46da-ab29-8875a052d9af', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 295, '{\"greeting\":\"Your Booking Request is  not approved by Moray Limousine\",\"body\":\"Your Booking Request is not approved by Moray Limousine which Niedenau 60, Frankfurt am Main, Deutschland And Pick Time is  03:45:00\",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', NULL, '2021-10-07 06:25:48', '2021-10-07 06:25:48'),
('ec271722-8707-4061-b084-9e0cad9198ee', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 1474, '{\"greeting\":\"Your Booking Request is approved by Moray Limousine\",\"body\":\"Your Booking Request is approved by Moray Limousine which Frankfurt, Germany And Pick Time is  13:30:00 ! Enjoy With Us.  \",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', '2021-10-08 03:42:18', '2021-10-07 06:28:28', '2021-10-08 03:42:18');
INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('bc601dad-6d81-451b-86ab-cab77b0dff9a', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 1475, '{\"greeting\":\"Your Account Is Registered on Moray Limousine By Using This Email Address\",\"body\":\"You are Registered On Moray Limousines by Admin As a Partner. Please Check your account By using password : \\\" areeb@123 \\\"  ! Enjoy With Us.  \",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', NULL, '2021-10-08 03:30:48', '2021-10-08 03:30:48'),
('02f4fe35-ce5e-44c2-9cf3-c53b53d6b86b', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 1475, '{\"greeting\":\"Your Account Is Approved by Moray Limousine\",\"body\":\"Your Account is Registered On Moray Limousines as Partner is  Approved by Admin . ! Enjoy With Us \",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/driver\\/dashboard\"}', NULL, '2021-10-08 03:31:07', '2021-10-08 03:31:07'),
('cd699210-9075-4add-a9e4-07b220a59685', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 1475, '{\"greeting\":\"You Have a New Notification Moray Limousine\",\"body\":\"Hello partner !!\",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/partner\\/profile\"}', NULL, '2021-10-08 03:31:29', '2021-10-08 03:31:29'),
('0e406ff4-6781-4707-9f0e-9a920710d749', 'App\\Notifications\\Emailvarification', 'App\\User', 1475, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-10-08 03:36:10', '2021-10-08 03:36:10'),
('02bc25ae-cda1-4a44-9362-8f76bdc6ae60', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 1475, '{\"greeting\":\"You Have a New Notification Moray Limousine\",\"body\":\"test\",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/partner\\/profile\"}', NULL, '2021-10-08 03:47:09', '2021-10-08 03:47:09'),
('4dce5695-8d70-40d3-b24c-c8ea44c93e29', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 1476, '{\"greeting\":\"Your Account Is Approved by Moray Limousine\",\"body\":\"Your Account is Registered On Moray Limousines is Approved by Admin . ! Enjoy With Us.  \",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/driver\\/dashboard\"}', NULL, '2021-10-08 03:58:36', '2021-10-08 03:58:36'),
('e3423504-3f44-4288-a185-40b9a8dc939f', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 1476, '{\"greeting\":\"You Have a New Notification Moray Limousine\",\"body\":\"hello driver \\r\\nMessage sent by admin(through sending message option  )\",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/partner\\/profile\"}', NULL, '2021-10-08 04:01:09', '2021-10-08 04:01:09'),
('d6d14f81-26bb-4a35-a62d-873413b1b2c8', 'App\\Notifications\\MorayLimousineNotifications', 'App\\User', 1474, '{\"greeting\":\"Your Booking Request is approved by Moray Limousine\",\"body\":\"Your Booking Request is approved by Moray Limousine which Frankfurt, Germany And Pick Time is  02:10:00 ! Enjoy With Us.  \",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"\\/home\"}', NULL, '2021-10-08 04:08:41', '2021-10-08 04:08:41'),
('e5be20b6-9fc4-4fc3-be51-fc0b223708d3', 'App\\Notifications\\Emailvarification', 'App\\User', 1477, '{\"greeting\":\"\",\"body\":\"\",\"thanks_text\":\"\",\"actionLink\":\"\"}', NULL, '2021-10-08 04:10:52', '2021-10-08 04:10:52'),
('a357ba7b-3b21-45d1-9897-01a338bce418', 'App\\Notifications\\MorayLimousineNotifications', 'App\\Models\\User', 12, '{\"greeting\":\"You have a new enquiry from a user on Moray Limousines\",\"body\":\"abcdef\",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"admin\\/index\"}', NULL, '2023-04-28 19:29:10', '2023-04-28 19:29:10'),
('a6974c20-9b59-45d5-ab3d-e250b42302e1', 'App\\Notifications\\MorayLimousineNotifications', 'App\\Models\\User', 12, '{\"greeting\":\"You have a new enquiry from a user on Moray Limousines\",\"body\":\"abcdef\",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"admin\\/index\"}', NULL, '2023-04-28 19:36:32', '2023-04-28 19:36:32'),
('ad54294b-79cd-49b9-9eca-293c4f2409ed', 'App\\Notifications\\MorayLimousineNotifications', 'App\\Models\\User', 12, '{\"greeting\":\"You have a new enquiry from a user on Moray Limousines\",\"body\":\"abcdef\",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"admin\\/index\"}', NULL, '2023-04-28 19:39:14', '2023-04-28 19:39:14'),
('253bf670-f5ca-4969-832d-e135c378a88a', 'App\\Notifications\\MorayLimousineNotifications', 'App\\Models\\User', 12, '{\"greeting\":\"You have a new enquiry from a user on Moray Limousines\",\"body\":\"abcdef\",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"admin\\/index\"}', NULL, '2023-04-28 19:40:05', '2023-04-28 19:40:05'),
('d420b97e-251d-4dd4-b5d0-ae3e7610fb82', 'App\\Notifications\\MorayLimousineNotifications', 'App\\Models\\User', 12, '{\"greeting\":\"You have a new enquiry from a user on Moray Limousines\",\"body\":\"abcdef\",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"admin\\/index\"}', NULL, '2023-05-02 16:45:15', '2023-05-02 16:45:15'),
('9e51dcc9-4e32-453e-92ab-c815e742b7db', 'App\\Notifications\\MorayLimousineNotifications', 'App\\Models\\User', 12, '{\"greeting\":\"You have a new enquiry from a user on Moray Limousines\",\"body\":\"abcdef\",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"admin\\/index\"}', NULL, '2023-05-02 16:45:38', '2023-05-02 16:45:38'),
('3ba418c5-7831-478f-93bf-4dcd788e5e02', 'App\\Notifications\\MorayLimousineNotifications', 'App\\Models\\User', 12, '{\"greeting\":\"You have a new enquiry from a user on Moray Limousines\",\"body\":\"abcdef\",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"admin\\/index\"}', NULL, '2023-05-02 17:23:19', '2023-05-02 17:23:19'),
('49107393-8ade-455b-8c01-0838fe78ca28', 'App\\Notifications\\MorayLimousineNotifications', 'App\\Models\\User', 1479, '{\"greeting\":\"Your enquiry is received on Moray Limousines\",\"body\":\"Your enquiry is received on Moray Limousines Thanks for your response we will respond you ( if needed ) soon.\",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"user\\/profile\"}', '2023-05-02 17:34:42', '2023-05-02 17:23:24', '2023-05-02 17:34:42'),
('889cb240-daf2-42d8-920a-be16f5247da8', 'App\\Notifications\\MorayLimousineNotifications', 'App\\Models\\User', 12, '{\"greeting\":\"You have a new enquiry from a user on Moray Limousines\",\"body\":\"dvwrsfff\",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"admin\\/index\"}', NULL, '2023-05-02 19:35:50', '2023-05-02 19:35:50'),
('74f1c229-6c51-417a-94e8-2dd95a4117ad', 'App\\Notifications\\MorayLimousineNotifications', 'App\\Models\\User', 1479, '{\"greeting\":\"Your enquiry is received on Moray Limousines\",\"body\":\"Your enquiry is received on Moray Limousines Thanks for your response we will respond you ( if needed ) soon.\",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"user\\/profile\"}', NULL, '2023-05-02 19:35:57', '2023-05-02 19:35:57'),
('b8bf0c09-6b45-4deb-8c17-8522001b16e2', 'App\\Notifications\\MorayLimousineNotifications', 'App\\Models\\User', 12, '{\"greeting\":\"You have a new enquiry from a user on Moray Limousines\",\"body\":\"checking\",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"admin\\/index\"}', NULL, '2023-05-03 19:42:08', '2023-05-03 19:42:08'),
('c42a0383-3560-4970-a8d8-24b07eaafc45', 'App\\Notifications\\MorayLimousineNotifications', 'App\\Models\\User', 1489, '{\"greeting\":\"Your enquiry is received on Moray Limousines\",\"body\":\"Your enquiry is received on Moray Limousines Thanks for your response we will respond you ( if needed ) soon.\",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"user\\/profile\"}', NULL, '2023-05-03 19:42:14', '2023-05-03 19:42:14'),
('d88151f6-9956-4fa8-a68c-7a99753363c6', 'App\\Notifications\\MorayLimousineNotifications', 'App\\Models\\User', 12, '{\"greeting\":\"You have a new enquiry from a user on Moray Limousines\",\"body\":\"checking\",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"admin\\/index\"}', NULL, '2023-05-03 19:42:16', '2023-05-03 19:42:16'),
('9322a76e-efdb-453e-8691-d7885439303d', 'App\\Notifications\\MorayLimousineNotifications', 'App\\Models\\User', 1489, '{\"greeting\":\"Your enquiry is received on Moray Limousines\",\"body\":\"Your enquiry is received on Moray Limousines Thanks for your response we will respond you ( if needed ) soon.\",\"thanks_text\":\"Thanks For Using Moray Limousine\",\"actionLink\":\"View My Site\",\"0\":\"user\\/profile\"}', NULL, '2023-05-03 19:42:22', '2023-05-03 19:42:22');

-- --------------------------------------------------------

--
-- Table structure for table `optionscategories`
--

CREATE TABLE `optionscategories` (
  `extraOption_id` bigint(20) UNSIGNED NOT NULL,
  `vehicleCategory_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `optionscategories`
--

INSERT INTO `optionscategories` (`extraOption_id`, `vehicleCategory_id`, `created_at`, `updated_at`) VALUES
(1, 2, '2020-01-24 16:45:19', '2020-01-24 16:45:19'),
(1, 3, '2020-01-24 16:45:19', '2020-01-24 16:45:19'),
(1, 4, '2020-01-24 16:45:20', '2020-01-24 16:45:20'),
(2, 2, '2020-01-24 16:45:33', '2020-01-24 16:45:33'),
(2, 3, '2020-01-24 16:45:33', '2020-01-24 16:45:33'),
(2, 4, '2020-01-24 16:45:33', '2020-01-24 16:45:33'),
(3, 2, '2020-01-24 16:44:39', '2020-01-24 16:44:39'),
(3, 3, '2020-01-24 16:44:39', '2020-01-24 16:44:39'),
(3, 4, '2020-01-24 16:44:39', '2020-01-24 16:44:39'),
(6, 2, '2020-04-25 11:28:17', '2020-04-25 11:28:17'),
(6, 3, '2020-04-25 11:28:17', '2020-04-25 11:28:17'),
(6, 4, '2020-04-25 11:28:17', '2020-04-25 11:28:17'),
(6, 5, '2020-04-25 11:28:17', '2020-04-25 11:28:17'),
(7, 2, '2020-04-25 11:29:21', '2020-04-25 11:29:21'),
(7, 3, '2020-04-25 11:29:21', '2020-04-25 11:29:21'),
(7, 4, '2020-04-25 11:29:21', '2020-04-25 11:29:21'),
(7, 5, '2020-04-25 11:29:21', '2020-04-25 11:29:21'),
(8, 2, '2020-04-25 11:29:57', '2020-04-25 11:29:57'),
(8, 3, '2020-04-25 11:29:57', '2020-04-25 11:29:57'),
(8, 4, '2020-04-25 11:29:57', '2020-04-25 11:29:57'),
(8, 5, '2020-04-25 11:29:57', '2020-04-25 11:29:57');

-- --------------------------------------------------------

--
-- Table structure for table `other_users`
--

CREATE TABLE `other_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `phone_number` varchar(40) DEFAULT NULL,
  `additional_information` text DEFAULT NULL,
  `flight_number` varchar(50) DEFAULT NULL,
  `flight_information` varchar(100) DEFAULT NULL,
  `banner_words` varchar(120) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `billing_address` varchar(100) DEFAULT NULL,
  `postcode` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `other_users`
--

INSERT INTO `other_users` (`id`, `booking_id`, `first_name`, `last_name`, `email`, `phone_number`, `additional_information`, `flight_number`, `flight_information`, `banner_words`, `company`, `billing_address`, `postcode`, `country`, `created_at`, `updated_at`) VALUES
(12, 54, 'Mylene', 'Hermanns', 'Marcus.Hermanns@gmx.de', '+491799114708', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-25 17:58:54', '2020-10-25 17:58:54'),
(13, 55, 'Alida', NULL, NULL, NULL, NULL, NULL, NULL, 'SDM', NULL, NULL, NULL, NULL, '2021-02-08 21:13:46', '2021-02-08 21:13:46'),
(14, 59, 'Sufyan', 'Sharif', 'writetosufyan@gmail.com', '03127291983', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-22 08:03:02', '2021-04-22 08:03:02'),
(15, 70, 'Herr', 'Kehr', 'dagmar.orths@kfw.de', '0049-173-185092', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-23 07:07:25', '2021-06-23 07:07:25'),
(16, 101, 'obaid', 'afridi', 'obaidkust@gmail.com', 'dadfadfad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-28 08:12:31', '2021-06-28 08:12:31'),
(17, 101, 'obaid', 'afridi', 'obaidkust@gmail.com', 'dadfadfad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-28 08:12:43', '2021-06-28 08:12:43'),
(18, 170, 'obaid', 'afridi', 'obi@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-28 09:08:36', '2021-06-28 09:08:36'),
(19, 170, 'obaid', 'afridi', 'obi@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-28 09:21:41', '2021-06-28 09:21:41'),
(20, 170, 'obaid', 'afridi', 'obi@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-28 09:31:03', '2021-06-28 09:31:03'),
(21, 170, 'obaid', 'afridi', 'obi@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-28 09:33:49', '2021-06-28 09:33:49'),
(22, 170, 'obaid', 'afridi', 'obi@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-28 09:34:33', '2021-06-28 09:34:33'),
(23, 170, 'obaid', 'afridi', 'obi@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-28 09:39:07', '2021-06-28 09:39:07'),
(24, 170, 'obaid', 'afridi', 'obi@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-28 09:39:36', '2021-06-28 09:39:36'),
(25, 170, 'obaid', 'afridi', 'obi@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-28 09:39:44', '2021-06-28 09:39:44'),
(26, 170, 'obaid', 'afridi', 'obi@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-28 10:13:24', '2021-06-28 10:13:24'),
(27, 170, 'obaid', 'afridi', 'obi@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-28 10:14:00', '2021-06-28 10:14:00'),
(28, 170, 'obaid', 'afridi', 'obi@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-28 10:14:16', '2021-06-28 10:14:16'),
(29, 173, 'Jammal', 'Rahim', 'info@qabby.de', '+491749275500', NULL, NULL, NULL, 'Mr. Hussain', NULL, NULL, NULL, NULL, '2021-06-28 15:25:19', '2021-06-28 15:25:19'),
(30, 173, 'Jammal', 'Rahim', 'info@qabby.de', '+491749275500', NULL, NULL, NULL, 'Mr. Hussain', NULL, NULL, NULL, NULL, '2021-06-28 15:30:28', '2021-06-28 15:30:28'),
(31, 173, 'Jammal', 'Rahim', 'info@qabby.de', '+491749275500', NULL, NULL, NULL, 'Mr. Hussain', NULL, NULL, NULL, NULL, '2021-06-28 15:32:55', '2021-06-28 15:32:55'),
(32, 177, 'abdul', 'basit', 'basitawan.abdul@gmail.com', '3243543532', '123', '123', NULL, '123', NULL, NULL, NULL, NULL, '2021-06-29 05:18:54', '2021-06-29 05:18:54'),
(33, 177, 'abdul', 'basit', 'basitawan.abdul@gmail.com', '3243543532', '123', '123', NULL, '123', NULL, NULL, NULL, NULL, '2021-06-29 05:19:07', '2021-06-29 05:19:07'),
(39, 179, 'abdul', 'basit', 'basitawan.abdul@gmail.com', '3243543532', '123', '12', NULL, '3123', NULL, NULL, NULL, NULL, '2021-06-29 09:03:52', '2021-06-29 09:03:52'),
(40, 180, 'Moheb', 'Hussain', 'info@qabby.de', '+491749275500', 'This is a very important booking for the test!!!', 'LH2020', NULL, 'Mr. Hussain', NULL, NULL, NULL, NULL, '2021-06-29 09:12:48', '2021-06-29 09:12:48'),
(42, 182, 'Moheb', 'Hussain', 'info@qabby.de', '+491749275500', 'Test123568900', 'LH2020', NULL, 'Mr-Hussain', NULL, NULL, NULL, NULL, '2021-06-29 11:57:35', '2021-06-29 11:57:35'),
(43, 183, 'Moheb', 'Hussain', 'info@qabby.de', '+491749275500', '1234567654323Test', 'LH2292', NULL, 'Mr.Hussain', NULL, NULL, NULL, NULL, '2021-06-29 12:02:56', '2021-06-29 12:02:56'),
(44, 187, 'Gökhan', 'Cirag', 'goekhan.cirag@gmail.com', '01773529498', 'Lieblichen Wein oder Sekt/Champagner.', 'KEINFLUG', NULL, 'Mr. Cirag', NULL, NULL, NULL, NULL, '2021-06-29 15:48:28', '2021-06-29 15:48:28'),
(45, 188, 'abdul', 'basit', 'basitawan.abdul@gmail.com', '3243543532', '123132213', '123', NULL, '123', NULL, NULL, NULL, NULL, '2021-06-30 04:24:02', '2021-06-30 04:24:02'),
(46, 189, '123', '123', '123', '123', '123', '123', NULL, '132', NULL, NULL, NULL, NULL, '2021-06-30 04:25:42', '2021-06-30 04:25:42'),
(47, 189, '123', '123', '123', '123', '123', '123', NULL, '132', NULL, NULL, NULL, NULL, '2021-06-30 04:25:59', '2021-06-30 04:25:59'),
(48, 190, '123', '123', '123', '123', '213', '123', NULL, '123', NULL, NULL, NULL, NULL, '2021-06-30 04:28:38', '2021-06-30 04:28:38'),
(49, 188, 'abdul', 'basit', 'basitawan.abdul@gmail.com', '3243543532', '123132213', '123', NULL, '123', NULL, NULL, NULL, NULL, '2021-06-30 04:57:08', '2021-06-30 04:57:08'),
(50, 188, 'abdul', 'basit', 'basitawan.abdul@gmail.com', '3243543532', '123132213', '123', NULL, '123', NULL, NULL, NULL, NULL, '2021-06-30 04:58:57', '2021-06-30 04:58:57'),
(51, 188, 'abdul', 'basit', 'basitawan.abdul@gmail.com', '3243543532', '123132213', '123', NULL, '123', NULL, NULL, NULL, NULL, '2021-06-30 04:59:19', '2021-06-30 04:59:19'),
(52, 191, '123', '123123', '123', '123', '123', '123', NULL, '123', NULL, NULL, NULL, NULL, '2021-06-30 05:26:35', '2021-06-30 05:26:35'),
(53, 190, '123', '123', '123', '123', '213', '123', NULL, '123', NULL, NULL, NULL, NULL, '2021-06-30 05:30:49', '2021-06-30 05:30:49'),
(54, 190, '123', '123', '123', '123', '213', '123', NULL, '123', NULL, NULL, NULL, NULL, '2021-06-30 05:31:36', '2021-06-30 05:31:36'),
(55, 190, '123', '123', '123', '123', '213', '123', NULL, '123', NULL, NULL, NULL, NULL, '2021-06-30 05:31:46', '2021-06-30 05:31:46'),
(56, 191, '123', '123123', '123', '123', '123', '123', NULL, '123', NULL, NULL, NULL, NULL, '2021-06-30 05:31:53', '2021-06-30 05:31:53'),
(57, 190, '123', '123', '123', '123', '213', '123', NULL, '123', NULL, NULL, NULL, NULL, '2021-06-30 05:33:16', '2021-06-30 05:33:16'),
(58, 191, '123', '123123', '123', '123', '123', '123', NULL, '123', NULL, NULL, NULL, NULL, '2021-06-30 05:34:14', '2021-06-30 05:34:14'),
(59, 191, '123', '123123', '123', '123', '123', '123', NULL, '123', NULL, NULL, NULL, NULL, '2021-06-30 05:35:22', '2021-06-30 05:35:22'),
(60, 191, '123', '123123', '123', '123', '123', '123', NULL, '123', NULL, NULL, NULL, NULL, '2021-06-30 05:36:11', '2021-06-30 05:36:11'),
(61, 191, '123', '123123', '123', '123', '123', '123', NULL, '123', NULL, NULL, NULL, NULL, '2021-06-30 05:39:55', '2021-06-30 05:39:55'),
(62, 191, '123', '123123', '123', '123', '123', '123', NULL, '123', NULL, NULL, NULL, NULL, '2021-06-30 05:40:16', '2021-06-30 05:40:16'),
(63, 191, '123', '123123', '123', '123', '123', '123', NULL, '123', NULL, NULL, NULL, NULL, '2021-06-30 05:40:32', '2021-06-30 05:40:32'),
(66, 190, '123', '123', '123', '123', '213', '123', NULL, '123', NULL, NULL, NULL, NULL, '2021-06-30 05:51:08', '2021-06-30 05:51:08'),
(67, 193, 'Moheb', 'Hussain', 'info@qabby.de', '+491749275500', 'Test123456789', 'LH2323', NULL, 'Mr-Hussain', NULL, NULL, NULL, NULL, '2021-06-30 09:00:00', '2021-06-30 09:00:00'),
(68, 194, 'abdul', 'basit', 'basitawan.abdul@gmail.com', '3243543532', '213', '123', NULL, '123', NULL, NULL, NULL, NULL, '2021-06-30 09:17:40', '2021-06-30 09:17:40'),
(69, 195, 'Abdul', 'Basit', 'test5@accrualgroup.com', '03115818727', '123', '123', NULL, '123', NULL, NULL, NULL, NULL, '2021-06-30 11:59:25', '2021-06-30 11:59:25'),
(70, 195, 'Abdul', 'Basit', 'test5@accrualgroup.com', '03115818727', '123', '123', NULL, '123', NULL, NULL, NULL, NULL, '2021-06-30 12:00:32', '2021-06-30 12:00:32'),
(71, 195, 'Abdul', 'Basit', 'test5@accrualgroup.com', '03115818727', '123', '123', NULL, '123', NULL, NULL, NULL, NULL, '2021-06-30 12:01:13', '2021-06-30 12:01:13'),
(72, 195, 'Abdul', 'Basit', 'test5@accrualgroup.com', '03115818727', '123', '123', NULL, '123', NULL, NULL, NULL, NULL, '2021-06-30 12:01:34', '2021-06-30 12:01:34'),
(73, 195, 'Abdul', 'Basit', 'test5@accrualgroup.com', '03115818727', '123', '123', NULL, '123', NULL, NULL, NULL, NULL, '2021-06-30 12:02:16', '2021-06-30 12:02:16'),
(74, 195, 'Abdul', 'Basit', 'test5@accrualgroup.com', '03115818727', '123', '123', NULL, '123', NULL, NULL, NULL, NULL, '2021-06-30 12:05:40', '2021-06-30 12:05:40'),
(75, 195, 'Abdul', 'Basit', 'test5@accrualgroup.com', '03115818727', '123', '123', NULL, '123', NULL, NULL, NULL, NULL, '2021-06-30 12:05:59', '2021-06-30 12:05:59'),
(76, 195, 'Abdul', 'Basit', 'test5@accrualgroup.com', '03115818727', '123', '123', NULL, '123', NULL, NULL, NULL, NULL, '2021-06-30 12:06:23', '2021-06-30 12:06:23'),
(77, 195, 'Abdul', 'Basit', 'test5@accrualgroup.com', '03115818727', '123', '123', NULL, '123', NULL, NULL, NULL, NULL, '2021-06-30 12:06:36', '2021-06-30 12:06:36'),
(78, 195, 'Abdul', 'Basit', 'test5@accrualgroup.com', '03115818727', '123', '123', NULL, '123', NULL, NULL, NULL, NULL, '2021-06-30 12:06:50', '2021-06-30 12:06:50'),
(79, 195, 'Abdul', 'Basit', 'test5@accrualgroup.com', '03115818727', '123', '123', NULL, '123', NULL, NULL, NULL, NULL, '2021-06-30 12:07:00', '2021-06-30 12:07:00'),
(80, 195, 'Abdul', 'Basit', 'test5@accrualgroup.com', '03115818727', '123', '123', NULL, '123', NULL, NULL, NULL, NULL, '2021-06-30 12:09:42', '2021-06-30 12:09:42'),
(81, 195, 'Abdul', 'Basit', 'test5@accrualgroup.com', '03115818727', '123', '123', NULL, '123', NULL, NULL, NULL, NULL, '2021-06-30 12:11:46', '2021-06-30 12:11:46'),
(82, 195, 'Abdul', 'Basit', 'test5@accrualgroup.com', '03115818727', '123', '123', NULL, '123', NULL, NULL, NULL, NULL, '2021-06-30 12:11:59', '2021-06-30 12:11:59'),
(83, 195, 'Abdul', 'Basit', 'test5@accrualgroup.com', '03115818727', '123', '123', NULL, '123', NULL, NULL, NULL, NULL, '2021-06-30 12:12:36', '2021-06-30 12:12:36'),
(84, 195, 'Abdul', 'Basit', 'test5@accrualgroup.com', '03115818727', '123', '123', NULL, '123', NULL, NULL, NULL, NULL, '2021-06-30 12:15:14', '2021-06-30 12:15:14'),
(85, 195, 'Abdul', 'Basit', 'test5@accrualgroup.com', '03115818727', '123', '123', NULL, '123', NULL, NULL, NULL, NULL, '2021-06-30 12:15:22', '2021-06-30 12:15:22'),
(86, 196, '123', '123', '123', '123', '123', '123', NULL, '132', NULL, NULL, NULL, NULL, '2021-06-30 12:16:34', '2021-06-30 12:16:34'),
(87, 195, 'Abdul', 'Basit', 'test5@accrualgroup.com', '03115818727', '123', '123', NULL, '123', NULL, NULL, NULL, NULL, '2021-06-30 12:17:37', '2021-06-30 12:17:37'),
(88, 196, '123', '123', '123', '123', '123', '123', NULL, '132', NULL, NULL, NULL, NULL, '2021-06-30 12:17:45', '2021-06-30 12:17:45'),
(89, 196, '123', '123', '123', '123', '123', '123', NULL, '132', NULL, NULL, NULL, NULL, '2021-06-30 12:19:17', '2021-06-30 12:19:17'),
(90, 196, '123', '123', '123', '123', '123', '123', NULL, '132', NULL, NULL, NULL, NULL, '2021-06-30 12:20:04', '2021-06-30 12:20:04'),
(91, 196, '123', '123', '123', '123', '123', '123', NULL, '132', NULL, NULL, NULL, NULL, '2021-06-30 12:20:26', '2021-06-30 12:20:26'),
(92, 198, '123', '123', '123', '123', '123', '123', NULL, '132', NULL, NULL, NULL, NULL, '2021-07-01 06:04:10', '2021-07-01 06:04:10'),
(93, 198, '123', '123', '123', '123', '123', '123', NULL, '132', NULL, NULL, NULL, NULL, '2021-07-01 06:10:27', '2021-07-01 06:10:27'),
(94, 198, '123', '123', '123', '123', '123', '123', NULL, '132', NULL, NULL, NULL, NULL, '2021-07-01 06:13:04', '2021-07-01 06:13:04'),
(95, 198, '123', '123', '123', '123', '123', '123', NULL, '132', NULL, NULL, NULL, NULL, '2021-07-01 06:13:15', '2021-07-01 06:13:15'),
(96, 198, '123', '123', '123', '123', '123', '123', NULL, '132', NULL, NULL, NULL, NULL, '2021-07-01 06:14:16', '2021-07-01 06:14:16'),
(97, 198, '123', '123', '123', '123', '123', '123', NULL, '132', NULL, NULL, NULL, NULL, '2021-07-01 06:14:59', '2021-07-01 06:14:59'),
(100, 215, 'Moheb', 'Hussain', 'info@qabby.de', '+491749275500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 11:58:47', '2021-07-05 11:58:47'),
(101, 217, 'Test1', 'Test1', 'info@morays-group.com', '+4917622777045', 'TEST', 'LH145', NULL, 'Testing', NULL, NULL, NULL, NULL, '2021-07-06 10:11:08', '2021-07-06 10:11:08'),
(102, 218, 'Test1', 'Test1', 'info@moray-limousines.com', '+4917622777045', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-06 10:27:45', '2021-07-06 10:27:45'),
(103, 219, 'sdf', 'sdfs', 'areebhassan4343@gmail.com', '03245040502', 'sdfwsd', 'sdf', NULL, 'dsf', NULL, NULL, NULL, NULL, '2021-07-07 04:25:09', '2021-07-07 04:25:09'),
(166, 291, 'Yetta', 'Mccoy', 'myrigy@mailinator.com', '+1 (196) 661-9308', 'Dolorem maxime molli', '+1 (184) 672-7873', NULL, '+1 (966) 551-1828', NULL, NULL, NULL, NULL, '2021-07-08 18:51:02', '2021-07-08 18:51:02'),
(168, 293, 'afdsgdhfdfsgdhf', 'dfghn', 'dfsgdfv', 'afsgedf', 'FASGDHFGJH', 'AFSDF', NULL, 'DAFSGDF', NULL, NULL, NULL, NULL, '2021-07-09 04:27:40', '2021-07-09 04:27:40'),
(169, 293, 'afdsgdhfdfsgdhf', 'dfghn', 'dfsgdfv', 'afsgedf', 'FASGDHFGJH', 'AFSDF', NULL, 'DAFSGDF', NULL, NULL, NULL, NULL, '2021-07-09 04:35:25', '2021-07-09 04:35:25'),
(185, 321, 'Lillian', 'Gates', 'jetujoto@mailinator.com', '+1 (729) 948-9666', 'Assumenda cupidatat', '+1 (267) 328-8712', NULL, '+1 (733) 324-6738', NULL, NULL, NULL, NULL, '2021-07-09 07:30:25', '2021-07-09 07:30:25'),
(186, 322, 'Boris', 'Solis', 'xokavoc@mailinator.com', '+1 (317) 171-6159', 'Unde in eu quod elig', '+1 (313) 762-6706', NULL, '+1 (997) 343-2769', NULL, NULL, NULL, NULL, '2021-07-09 09:16:44', '2021-07-09 09:16:44'),
(187, 322, 'Boris', 'Solis', 'xokavoc@mailinator.com', '+1 (317) 171-6159', 'Unde in eu quod elig', '+1 (313) 762-6706', NULL, '+1 (997) 343-2769', NULL, NULL, NULL, NULL, '2021-07-09 09:19:14', '2021-07-09 09:19:14'),
(188, 323, 'Ocean', 'Chan', 'duvuqako@mailinator.com', '+1 (766) 233-7222', 'Tempore delectus c', '+1 (529) 585-5088', NULL, '+1 (311) 744-8188', NULL, NULL, NULL, NULL, '2021-07-09 09:20:51', '2021-07-09 09:20:51'),
(189, 324, 'Petra', 'Rocha', 'wiben@mailinator.com', '+1 (132) 787-8167', 'Iusto commodi corrup', '+1 (499) 598-2244', NULL, '+1 (649) 203-8504', NULL, NULL, NULL, NULL, '2021-07-09 09:21:25', '2021-07-09 09:21:25'),
(190, 325, 'Signe', 'Swanson', 'cebizu@mailinator.com', '+1 (768) 928-5481', 'Ea laborum totam in', '+1 (521) 324-2816', NULL, '+1 (382) 796-3285', NULL, NULL, NULL, NULL, '2021-07-09 09:24:28', '2021-07-09 09:24:28'),
(191, 326, 'Dominic', 'Vance', 'faxukiqoj@mailinator.com', '+1 (511) 684-5109', 'Nisi sed quia sequi', '+1 (222) 626-1344', NULL, '+1 (263) 197-2367', NULL, NULL, NULL, NULL, '2021-07-09 09:26:09', '2021-07-09 09:26:09'),
(192, 327, 'Drew', 'Whitfield', 'juzir@mailinator.com', '+1 (341) 558-4718', 'Et id sint enim in', '+1 (221) 258-7693', NULL, '+1 (502) 811-8388', NULL, NULL, NULL, NULL, '2021-07-09 09:27:10', '2021-07-09 09:27:10'),
(194, 347, 'sdf', 'dsfsd', 'sdf', 'dsf', 'asd', 'qwe', NULL, 'qwd', NULL, NULL, NULL, NULL, '2021-07-09 10:56:24', '2021-07-09 10:56:24'),
(196, 348, 'sdf', 'dsfsd', 'sdf', 'dsf', 'asd', 'qwe', NULL, 'qwd', NULL, NULL, NULL, NULL, '2021-07-09 10:57:06', '2021-07-09 10:57:06'),
(199, 352, 'sdf', 'sdf', 'sdf', 'sdf', NULL, 'sdf', NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-09 11:14:02', '2021-07-09 11:14:02'),
(212, 355, 'sad', 'sa', 'as', 'sad', 'asd', 'sad', NULL, 'asd', NULL, NULL, NULL, NULL, '2021-07-09 14:38:16', '2021-07-09 14:38:16'),
(213, 356, 'Stella', 'Glass', 'cugaxisa@mailinator.com', '+1 (198) 655-3646', 'Sint veniam sed ess', '+1 (576) 979-7714', NULL, '+1 (458) 744-2215', NULL, NULL, NULL, NULL, '2021-07-09 14:42:19', '2021-07-09 14:42:19'),
(240, 370, 'h', 'h', 'h', 'h', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-12 09:36:31', '2021-07-12 09:36:31'),
(241, 373, 'Jammal', 'Rahim', 'info@qabby.de', '+491749275500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-12 11:34:48', '2021-07-12 11:34:48'),
(242, 374, 'Jammal', 'Rahim', 'info@qabby.de', '+491749275500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-12 12:40:46', '2021-07-12 12:40:46'),
(256, 378, 'Jammal', 'Rahim', 'info@qabby.de', '+491749275500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-12 13:37:23', '2021-07-12 13:37:23'),
(257, 380, 'Muhammad', 'Rizwan', 'rizwikhattak123321@gmail.com', '0154521441', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-13 03:49:19', '2021-07-13 03:49:19'),
(258, 381, 'obaid', 'afridi', 'obaidkust@gmail.com', '03336506505', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-15 07:39:51', '2021-07-15 07:39:51'),
(259, 431, 'obi', 'afridi', 'obi@gmail.com', '03336506505', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-19 07:27:56', '2021-07-19 07:27:56'),
(260, 431, 'obi', 'afridi', 'obi@gmail.com', '03336506505', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-19 07:31:29', '2021-07-19 07:31:29'),
(261, 434, 'Jason', 'Watson', 'jason@fashionpoint.pk', '03336506505', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-19 07:42:04', '2021-07-19 07:42:04'),
(262, 435, 'Jason', 'Watson', 'jason@fashionpoint.pk', '03336506505', NULL, NULL, NULL, NULL, NULL, '67, Nazimuddin Road G-8/4', '46000', 'Pakistan', '2021-07-19 07:43:53', '2021-07-19 07:43:53'),
(263, 436, 'Jason', 'Watson', 'jason@fashionpoint.pk', '03336506505', NULL, NULL, NULL, NULL, NULL, '67, Nazimuddin Road G-8/4', '46000', 'Pakistan', '2021-07-19 07:47:20', '2021-07-19 07:47:20'),
(264, 437, 'Jason', 'Watson', 'jason@fashionpoint.pk', '03336506505', NULL, NULL, NULL, NULL, 'accrual', '67, Nazimuddin Road G-8/4', '46000', 'Pakistan', '2021-07-19 07:55:11', '2021-07-19 07:55:11'),
(265, 437, 'Jason', 'Watson', 'jason@fashionpoint.pk', '03336506505', NULL, NULL, NULL, NULL, 'accrual', '67, Nazimuddin Road G-8/4', '46000', 'Pakistan', '2021-07-19 07:56:09', '2021-07-19 07:56:09'),
(266, 437, 'Jason', 'Watson', 'jason@fashionpoint.pk', '03336506505', NULL, NULL, NULL, NULL, 'accrual', '67, Nazimuddin Road G-8/4', '46000', 'Pakistan', '2021-07-19 07:56:41', '2021-07-19 07:56:41'),
(267, 440, 'Jason', 'Watson', 'jason@fashionpoint.pk', '03336506505', NULL, NULL, NULL, NULL, NULL, '67, Nazimuddin Road G-8/4', '46000', 'Pakistan', '2021-07-19 07:57:24', '2021-07-19 07:57:24'),
(268, 440, 'Jason', 'Watson', 'jason@fashionpoint.pk', '03336506505', NULL, NULL, NULL, NULL, NULL, '67, Nazimuddin Road G-8/4', '46000', 'Pakistan', '2021-07-19 07:58:44', '2021-07-19 07:58:44'),
(269, 440, 'Jason', 'Watson', 'jason@fashionpoint.pk', '03336506505', NULL, NULL, NULL, NULL, NULL, '67, Nazimuddin Road G-8/4', '46000', 'Pakistan', '2021-07-19 07:59:27', '2021-07-19 07:59:27'),
(270, 440, 'Jason', 'Watson', 'jason@fashionpoint.pk', '03336506505', NULL, NULL, NULL, NULL, NULL, '67, Nazimuddin Road G-8/4', '46000', 'Pakistan', '2021-07-19 07:59:30', '2021-07-19 07:59:30'),
(271, 449, 'Melodie', 'Barr', 'maby@mailinator.com', 'Mcclain Mejia Co', 'Minima enim reprehen', NULL, NULL, NULL, 'Kent and Nunez Associates', 'Cum molestiae quo re', 'Quod molestiae imped', 'Duis praesentium ull', '2023-05-03 14:36:43', '2023-05-03 14:36:43'),
(272, 452, 'Brielle', 'Jacobs', 'ziniwovy@mailinator.com', 'Michael Lara Trading', 'Ut cupiditate sed in', NULL, NULL, NULL, 'Stephenson Walsh LLC', 'Illum sapiente obca', 'Eiusmod enim aute vo', 'Omnis velit iste ips', '2023-05-03 16:45:47', '2023-05-03 16:45:47'),
(273, 453, 'Vanna', 'Levy', 'lesykuguv@mailinator.com', 'Cummings Daniel Inc', 'Deleniti minima sint', NULL, NULL, NULL, 'Macdonald and Melendez Plc', 'Adipisci voluptate v', 'Do quia repudiandae', 'Ipsum impedit ut co', '2023-05-03 19:35:02', '2023-05-03 19:35:02');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `skype_id` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `phone_number` varchar(20) NOT NULL,
  `whats_app` varchar(20) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `gender` enum('male','female') NOT NULL,
  `default_location` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_name` varchar(255) NOT NULL,
  `legal_form_company` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `user_id`, `skype_id`, `date_of_birth`, `phone_number`, `whats_app`, `address`, `gender`, `default_location`, `created_at`, `updated_at`, `company_name`, `legal_form_company`, `city`) VALUES
(1, 117, NULL, '1981-02-10', '12423523', '01791241614', NULL, 'male', 'Frankfurt Flughafen (FRA), Frankfurt am Main, Deutschland', '2020-04-02 16:02:59', '2020-04-02 16:02:59', '', '', ''),
(2, 117, NULL, '1981-02-10', '12423523', '01791241614', NULL, 'male', 'Frankfurt Flughafen (FRA), Frankfurt am Main, Deutschland', '2020-04-02 16:03:19', '2020-04-02 16:03:19', '', '', ''),
(3, 1488, NULL, NULL, '', NULL, NULL, 'male', '', NULL, NULL, 'Hicks and Finch Plc', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(50) NOT NULL,
  `token` varchar(150) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('mc100402525@gmail.com', '$2y$10$zHd4D63YD6WJhtl8fd6XgeiHkb0gZkLbb04OrM7mpGS9Gxh7fd2kK', '2020-02-01 13:52:29'),
('cachonoah@yahoo.com', '$2y$10$XPI1aG7pO8dmx.56zZRefeDtBGKQ.VIF60J9G0pGJeBV4x2x.uk8W', '2020-04-24 15:55:10'),
('gradeydawtry@yahoo.com', '$2y$10$ubVnBcmbU91D5u1fZZ5nX.A8NHbaS9YwI1K5/J3dKFJ18KgMqSrDq', '2020-04-28 06:54:07'),
('kristen4797@yahoo.com', '$2y$10$0Gt6ptXQR./Ah4DtL3ki2u6nGekXeYXLJzag3fmW6/rr7ebFTowNS', '2020-04-28 09:21:31'),
('bjl1292@yahoo.com', '$2y$10$MgYKzaTHEVeHYbgSmzgbY.Zk.ahchT0O.yizZ/amw1bX/j73ZRDO2', '2020-04-29 00:24:17'),
('simcd@att.net', '$2y$10$kRnl3tjmu8s3BMDRfZflyeB9PuW97NP0bynv1YVETO6vhLwQAkj9e', '2020-04-29 09:25:29'),
('juscelph@gmail.com', '$2y$10$LwCBpl4BIcG.yoK8iXMIJOwk7LL4zUVYib061gvVcVk5ur.B/Mmly', '2020-06-05 12:06:36'),
('sumitbaratarey@gmail.com', '$2y$10$p4tRdhK6ewok1n89eZ387uDBIVuUPToiThMJa8lwjzi3YFq9FbYcu', '2020-06-09 00:16:30'),
('jbojar@gmail.com', '$2y$10$K6P8P.ka5UWjL2ehPdsXkeFJUaRCFtO5oEf3XR33/DNtlgLAJOxYC', '2020-07-21 06:47:35'),
('dshoebich@icloud.com', '$2y$10$A145tZCSViwDT7FJ1uBUteSU2zpYh7xpwmdJSZ6HZvRIzm9sm7JHu', '2020-07-22 17:19:18'),
('cjdollens@yahoo.com', '$2y$10$OaTPKrZDd1M58zNJW6vW9OM05ekYp/8o1tSZRbrBK4gvDxHFCt4Fe', '2020-07-28 16:35:25'),
('eddie.back@yahoo.com', '$2y$10$sRb1ad6PZfvtnilXJxx1seQB7qzkoFsqzIgDah.jcsErUIlRhVBCq', '2020-07-28 23:43:43'),
('mommamia01930@yahoo.com', '$2y$10$m1jAhZ143QTfkEbPDtdmteTaMTP5.CWeY9seNh6DCxszHsR26kP.m', '2020-07-29 07:45:44'),
('awmiranda@gmail.com', '$2y$10$AkCWFCKM047ATKeGb9Sks.Fo6qDI/45hBzBqgfBSw7lv5TtmwNSfK', '2020-07-31 17:52:15'),
('williepb18@gmail.com', '$2y$10$Xkwz0MyYL7lVi1LKl3Oq8uGQAUIw2oLq776DqOId5LF4CKEU.FuC6', '2020-08-04 01:22:26'),
('alex@themarblecenter.com', '$2y$10$HvqUNxKqpHURKVuNqoRB/eD2yKID2ZY9lMhK9i3fyLZcGeyKY.rs2', '2020-09-06 15:43:17'),
('jmillerforreal@gmail.com', '$2y$10$tOJFj9ZgcHrARL0mX//fyuhrqG3II0Ar6qDj4aTYRsRVat0OWoDwm', '2020-09-11 00:45:26'),
('candklawn@gmail.com', '$2y$10$.nNTEPRNFXjSxibnINt2l.PMVIuclcMqrHcVSvtxDovhJ/vu8lA7u', '2020-09-12 00:51:01'),
('pacificgreencarpet@yahoo.com', '$2y$10$lRHjkNPxG1lakrWHfUEyrOmMWUSQYaE0rdBFgmc6MRGFysE676fIO', '2020-09-12 05:57:59'),
('nereaga_4@hotmail.com', '$2y$10$0dzAevMk8v1obI9ozUlqJ.jPy58x.opPSL6AWBKpXsqF2iD7hFkMm', '2020-09-12 14:16:05'),
('terrywatkinswilliams@yahoo.com', '$2y$10$lAnMmmvGx6BG3x6Pow9SMu5dYBOYW1VvOcBCZcDybkZ3jNy/VPXym', '2020-09-14 06:45:52'),
('lauraray74@gmail.com', '$2y$10$GhwR9XQZ4qSqsBh7.UhXVuV0BdAmI.MLT6/5RPzeu97JdZP.DaO8u', '2020-10-05 03:26:59'),
('stcrile@gmail.com', '$2y$10$gdcuF34CUTjBBldcFsS/BOpQEXmM8PnMaqJXuiu5TYQpdpVvlZqmG', '2021-01-17 00:51:03'),
('aploveart@hotmail.com', '$2y$10$RJX.sAR6.1a2moaGXQRWOuB8KNFo0S.AZ6BCmnUdWWheKyYhvEptK', '2021-03-10 18:38:13'),
('rlynch@madisonassociation.org', '$2y$10$2aVLbITbWWNdOrySDAtnpO1LdwD8Y4.Ej8JCExEFuQS.kJ/A9pDrq', '2021-03-15 19:53:37'),
('grantmostransky@gmail.com', '$2y$10$lxFNgG2epjLCvVUmwHlzY.s1XqrfAJqG5IyHv36I6T2PM7wjCoM/e', '2021-03-16 07:36:41'),
('tom.herrera7@gmail.com', '$2y$10$jMaVdjHXxgsMvt.R5OdJx.1zf1N0zTPjl7ozE.9WW2eAM4cGRXIvK', '2021-03-19 19:09:32'),
('shamrockpizza@gmail.com', '$2y$10$xYoVkRqx0PFdMfu25J7uxOBI.PW2.5yjnNylNgdIdHzJV4upt2Qta', '2021-04-13 17:13:56'),
('dmars40@gmail.com', '$2y$10$g76P/QUxjxzXwPKbCKs.dO/O0kYS6kaZNdECnN8f6Zw6P8U77LROa', '2021-05-03 21:16:54'),
('woodsveronica86@yahoo.com', '$2y$10$agnLoSVxaom2oTyzwaIejeFy6TMqj3JlD7Vs1urwBa2iPnw17PQnu', '2021-06-01 12:28:21'),
('deanfiloso@yahoo.com', '$2y$10$oHAkl46G8bIYOfPh5AQ42e2sL4cR4.NRWr.Px0/m027G5r4ZttfUK', '2021-06-02 19:47:54'),
('bgunjupali@yahoo.com', '$2y$10$Tl/.C/FI/QDpKR7THtEgIe7KrKGnycftoosaO.xTXX15iYqWw/VdO', '2021-06-06 17:54:35'),
('alamhamza18@gmail.com', '$2y$10$OdJyY910nTX.g37arO4w1OpytwfA6jF2TfnLUgZMRoWxLeh0dWGje', '2021-06-23 08:18:57'),
('khattakrizwan121@gmail.com', '$2y$10$AVHnX2XsxgZOpj232yMdvOYq8GAXwHOdaW3asYDb4x6r6j/T9yVlO', '2021-07-02 06:53:00'),
('obaidkust@gmail.com', '$2y$10$AGKLNKyf5rcq7GH6ZGsSAujm76JtHnMAZiwexTJF/oJd3woOTRTqC', '2021-07-06 10:21:32'),
('breweredouard@yahoo.com', '$2y$10$XNXJonp.hTsZQ5u6WFyF/eo.hskOgRTPFsfmpRTxxMd2oFaw03y22', '2021-07-07 12:29:36'),
('ronnystebbings@yahoo.com', '$2y$10$/63iwd6dvA72n4aiw0yIM.qkiw3KhOKAGwOscBi4.j9Qa2SrIRmKq', '2021-07-10 10:04:17'),
('linzey.jule@yahoo.com', '$2y$10$vsXoxg4BsWy9VN2MXbgEbeJBvGu0n8g5nqHU7Vsh4aG5pAHuwhb/.', '2021-07-11 17:26:07'),
('curtainwinny@yahoo.com', '$2y$10$F.r3FnbqOgq4jrJvxS/uIuX79uXzgYtNP5tCIYl1BK/eyXNCQ7siW', '2021-07-12 23:56:39'),
('fchan@chaninsurance.com', '$2y$10$r4x2MdIVv7HbU/DA6owVDev8S60NcxIUypRsnn/91bWhMTBcflbVW', '2021-07-23 08:17:56'),
('waltb3@gmail.com', '$2y$10$Y.dfiH.N4Jk1rS3SameX/e7xeuARu6Afyw0o.BoWKe6CfmJy3DYxG', '2021-07-23 20:48:00'),
('rizwan3@accrualgroup.com', '$2y$10$MvDsptgtWXklQJizHn/UJumIpP0kBZd.wb3E/Ey34qxSd0y3aCS/q', '2021-07-28 05:10:58');

-- --------------------------------------------------------

--
-- Table structure for table `pricingbydistance`
--

CREATE TABLE `pricingbydistance` (
  `id` int(10) UNSIGNED NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pricingbylocation`
--

CREATE TABLE `pricingbylocation` (
  `id` int(10) UNSIGNED NOT NULL,
  `from` varchar(255) NOT NULL,
  `to` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `selectedoptions`
--

CREATE TABLE `selectedoptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED DEFAULT NULL,
  `option_name` varchar(40) DEFAULT NULL,
  `quantity` decimal(8,2) DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `option_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `selectedoptions`
--

INSERT INTO `selectedoptions` (`id`, `booking_id`, `option_name`, `quantity`, `price`, `created_at`, `updated_at`, `option_id`) VALUES
(1, 3, 'Child seat 3-6 years', 1.00, 22.00, '2020-01-31 19:12:24', '2020-01-31 19:12:24', 1),
(2, 4, 'Child seat 3-6 years', 1.00, 22.00, '2020-01-31 19:27:02', '2020-01-31 19:27:02', 1),
(3, 6, 'Child seat 3-6 years', 2.00, 22.00, '2020-02-01 10:19:14', '2020-02-01 10:19:14', 1),
(4, 6, 'Booster 6-12 years', 2.00, 12.00, '2020-02-01 10:19:15', '2020-02-01 10:19:15', 3),
(5, 6, 'test', 1.00, 10.00, '2020-02-01 10:19:15', '2020-02-01 10:19:15', 5),
(6, 7, 'Booster 6-12 years', 1.00, 12.00, '2020-02-01 10:29:08', '2020-02-01 10:29:08', 3),
(7, 7, 'test', 1.00, 10.00, '2020-02-01 10:29:09', '2020-02-01 10:29:09', 5),
(8, 9, 'Child seat 3-6 years', 1.00, 22.00, '2020-02-01 16:03:54', '2020-02-01 16:03:54', 1),
(9, 9, 'Baby seat 0-2 years', 1.00, 32.00, '2020-02-01 16:03:54', '2020-02-01 16:03:54', 2),
(10, 9, 'Booster 6-12 years', 2.00, 12.00, '2020-02-01 16:03:55', '2020-02-01 16:03:55', 3),
(11, 9, 'test', 1.00, 10.00, '2020-02-01 16:03:55', '2020-02-01 16:03:55', 5),
(12, 10, 'Child seat 3-6 years', 1.00, 22.00, '2020-02-01 17:11:00', '2020-02-01 17:11:00', 1),
(13, 10, 'Baby seat 0-2 years', 1.00, 32.00, '2020-02-01 17:11:00', '2020-02-01 17:11:00', 2),
(14, 10, 'Booster 6-12 years', 1.00, 12.00, '2020-02-01 17:11:00', '2020-02-01 17:11:00', 3),
(15, 10, 'test', 1.00, 10.00, '2020-02-01 17:11:00', '2020-02-01 17:11:00', 5),
(16, 11, 'Child seat 3-6 years', 1.00, 22.00, '2020-02-01 12:56:31', '2020-02-01 12:56:31', 1),
(17, 11, 'Baby seat 0-2 years', 1.00, 32.00, '2020-02-01 12:56:31', '2020-02-01 12:56:31', 2),
(18, 11, 'Booster 6-12 years', 1.00, 12.00, '2020-02-01 12:56:31', '2020-02-01 12:56:31', 3),
(19, 11, 'Child seat 3-6 years', 1.00, 22.00, '2020-02-01 12:56:56', '2020-02-01 12:56:56', 1),
(20, 11, 'Baby seat 0-2 years', 1.00, 32.00, '2020-02-01 12:56:56', '2020-02-01 12:56:56', 2),
(21, 11, 'Booster 6-12 years', 1.00, 12.00, '2020-02-01 12:56:56', '2020-02-01 12:56:56', 3),
(22, 15, 'Baby seat 0-2 years', 1.00, 32.00, '2020-02-03 11:05:52', '2020-02-03 11:05:52', 2),
(23, 15, 'Booster 6-12 years', 1.00, 12.00, '2020-02-03 11:05:52', '2020-02-03 11:05:52', 3),
(24, 17, 'Child seat 3-6 years', 1.00, 22.00, '2020-02-03 11:23:57', '2020-02-03 11:23:57', 1),
(25, 17, 'Baby seat 0-2 years', 2.00, 32.00, '2020-02-03 11:23:57', '2020-02-03 11:23:57', 2),
(26, 20, 'Child seat 3-6 years', 1.00, 22.00, '2020-02-04 08:25:34', '2020-02-04 08:25:34', 1),
(27, 20, 'Booster 6-12 years', 1.00, 12.00, '2020-02-04 08:25:34', '2020-02-04 08:25:34', 3),
(28, 20, 'test', 1.00, 10.00, '2020-02-04 08:25:34', '2020-02-04 08:25:34', 5),
(29, 20, 'Child seat 3-6 years', 1.00, 22.00, '2020-02-04 08:25:34', '2020-02-04 08:25:34', 1),
(30, 20, 'Booster 6-12 years', 1.00, 12.00, '2020-02-04 08:25:34', '2020-02-04 08:25:34', 3),
(31, 20, 'test', 1.00, 10.00, '2020-02-04 08:25:34', '2020-02-04 08:25:34', 5),
(32, 36, 'In Car Wifi - 2 GB', 1.00, 9.00, '2020-05-24 10:39:57', '2020-05-24 10:39:57', 6),
(33, 42, 'In Car Wifi - 10 GB', 1.00, 19.00, '2020-06-30 12:58:33', '2020-06-30 12:58:33', 7),
(34, 43, 'In Car Wifi - 50 GB', 1.00, 99.00, '2020-06-30 13:27:16', '2020-06-30 13:27:16', 8),
(35, 44, 'Baby seat 0-2 years', 1.00, 32.00, '2020-06-30 13:54:42', '2020-06-30 13:54:42', 2),
(36, 45, 'Child seat 3-6 years', 1.00, 22.00, '2020-07-06 07:36:44', '2020-07-06 07:36:44', 1),
(37, 45, 'Booster 6-12 years', 2.00, 12.00, '2020-07-06 07:36:44', '2020-07-06 07:36:44', 3),
(38, 59, 'Baby seat 0-2 years', 2.00, 32.00, '2021-04-22 08:03:02', '2021-04-22 08:03:02', 2),
(39, 60, 'Child seat 3-6 years', 1.00, 22.00, '2021-04-26 04:30:36', '2021-04-26 04:30:36', 1),
(40, 66, 'Child seat 3-6 years', 1.00, 22.00, '2021-06-15 12:12:46', '2021-06-15 12:12:46', 1),
(41, 219, 'Child seat 3-6 years', 1.00, 22.00, '2021-07-07 04:25:09', '2021-07-07 04:25:09', 1),
(42, 291, 'In Car Wifi - 50 GB', 1.00, 99.00, '2021-07-08 18:51:02', '2021-07-08 18:51:02', 8),
(43, 321, 'Child seat 3-6 years', 1.00, 22.00, '2021-07-09 07:30:25', '2021-07-09 07:30:25', 1),
(44, 321, 'Baby seat 0-2 years', 1.00, 32.00, '2021-07-09 07:30:25', '2021-07-09 07:30:25', 2),
(45, 321, 'Booster 6-12 years', 1.00, 12.00, '2021-07-09 07:30:25', '2021-07-09 07:30:25', 3),
(46, 321, 'In Car Wifi - 2 GB', 1.00, 9.00, '2021-07-09 07:30:25', '2021-07-09 07:30:25', 6),
(47, 321, 'In Car Wifi - 50 GB', 1.00, 99.00, '2021-07-09 07:30:25', '2021-07-09 07:30:25', 8),
(48, 322, 'Child seat 3-6 years', 1.00, 22.00, '2021-07-09 09:16:44', '2021-07-09 09:16:44', 1),
(49, 322, 'Booster 6-12 years', 1.00, 12.00, '2021-07-09 09:16:44', '2021-07-09 09:16:44', 3),
(50, 322, 'In Car Wifi - 50 GB', 1.00, 99.00, '2021-07-09 09:16:44', '2021-07-09 09:16:44', 8),
(51, 322, 'Child seat 3-6 years', 1.00, 22.00, '2021-07-09 09:19:14', '2021-07-09 09:19:14', 1),
(52, 322, 'Booster 6-12 years', 1.00, 12.00, '2021-07-09 09:19:14', '2021-07-09 09:19:14', 3),
(53, 322, 'In Car Wifi - 50 GB', 1.00, 99.00, '2021-07-09 09:19:14', '2021-07-09 09:19:14', 8),
(54, 323, 'In Car Wifi - 2 GB', 1.00, 9.00, '2021-07-09 09:20:51', '2021-07-09 09:20:51', 6),
(55, 323, 'In Car Wifi - 50 GB', 1.00, 99.00, '2021-07-09 09:20:51', '2021-07-09 09:20:51', 8),
(56, 324, 'Booster 6-12 years', 1.00, 12.00, '2021-07-09 09:21:25', '2021-07-09 09:21:25', 3),
(57, 324, 'In Car Wifi - 10 GB', 1.00, 19.00, '2021-07-09 09:21:25', '2021-07-09 09:21:25', 7),
(58, 325, 'Child seat 3-6 years', 1.00, 22.00, '2021-07-09 09:24:28', '2021-07-09 09:24:28', 1),
(59, 325, 'In Car Wifi - 2 GB', 1.00, 9.00, '2021-07-09 09:24:28', '2021-07-09 09:24:28', 6),
(60, 325, 'In Car Wifi - 50 GB', 1.00, 99.00, '2021-07-09 09:24:28', '2021-07-09 09:24:28', 8),
(61, 326, 'Booster 6-12 years', 1.00, 12.00, '2021-07-09 09:26:09', '2021-07-09 09:26:09', 3),
(62, 326, 'In Car Wifi - 10 GB', 1.00, 19.00, '2021-07-09 09:26:09', '2021-07-09 09:26:09', 7),
(63, 326, 'In Car Wifi - 50 GB', 1.00, 99.00, '2021-07-09 09:26:09', '2021-07-09 09:26:09', 8),
(64, 327, 'Child seat 3-6 years', 1.00, 22.00, '2021-07-09 09:27:10', '2021-07-09 09:27:10', 1),
(65, 327, 'Booster 6-12 years', 1.00, 12.00, '2021-07-09 09:27:10', '2021-07-09 09:27:10', 3),
(66, 327, 'In Car Wifi - 10 GB', 1.00, 19.00, '2021-07-09 09:27:10', '2021-07-09 09:27:10', 7),
(67, 327, 'In Car Wifi - 50 GB', 1.00, 99.00, '2021-07-09 09:27:10', '2021-07-09 09:27:10', 8),
(68, 348, 'Child seat 3-6 years', 1.00, 22.00, '2021-07-09 10:57:06', '2021-07-09 10:57:06', 1),
(69, 348, 'Baby seat 0-2 years', 1.00, 32.00, '2021-07-09 10:57:06', '2021-07-09 10:57:06', 2),
(70, 349, 'Child seat 3-6 years', 2.00, 22.00, '2021-07-09 11:07:39', '2021-07-09 11:07:39', 1),
(71, 349, 'Baby seat 0-2 years', 2.00, 32.00, '2021-07-09 11:07:39', '2021-07-09 11:07:39', 2),
(72, 349, 'Booster 6-12 years', 2.00, 12.00, '2021-07-09 11:07:39', '2021-07-09 11:07:39', 3),
(73, 349, 'In Car Wifi - 2 GB', 1.00, 9.00, '2021-07-09 11:07:39', '2021-07-09 11:07:39', 6),
(74, 351, 'Child seat 3-6 years', 1.00, 22.00, '2021-07-09 11:08:11', '2021-07-09 11:08:11', 1),
(75, 351, 'Baby seat 0-2 years', 1.00, 32.00, '2021-07-09 11:08:11', '2021-07-09 11:08:11', 2),
(76, 352, 'Child seat 3-6 years', 1.00, 22.00, '2021-07-09 11:14:02', '2021-07-09 11:14:02', 1),
(77, 352, 'Baby seat 0-2 years', 1.00, 32.00, '2021-07-09 11:14:02', '2021-07-09 11:14:02', 2),
(78, 346, 'Child seat 3-6 years', 1.00, 22.00, '2021-07-09 11:23:58', '2021-07-09 11:23:58', 1),
(79, 346, 'Baby seat 0-2 years', 1.00, 32.00, '2021-07-09 11:23:58', '2021-07-09 11:23:58', 2),
(80, 346, 'Child seat 3-6 years', 1.00, 22.00, '2021-07-09 11:28:30', '2021-07-09 11:28:30', 1),
(81, 346, 'Baby seat 0-2 years', 1.00, 32.00, '2021-07-09 11:28:30', '2021-07-09 11:28:30', 2),
(82, 346, 'Child seat 3-6 years', 1.00, 22.00, '2021-07-09 11:32:59', '2021-07-09 11:32:59', 1),
(83, 346, 'Baby seat 0-2 years', 1.00, 32.00, '2021-07-09 11:32:59', '2021-07-09 11:32:59', 2),
(84, 353, 'Child seat 3-6 years', 1.00, 22.00, '2021-07-09 11:34:56', '2021-07-09 11:34:56', 1),
(85, 353, 'Baby seat 0-2 years', 1.00, 32.00, '2021-07-09 11:34:56', '2021-07-09 11:34:56', 2),
(86, 353, 'Child seat 3-6 years', 1.00, 22.00, '2021-07-09 11:38:37', '2021-07-09 11:38:37', 1),
(87, 353, 'Baby seat 0-2 years', 1.00, 32.00, '2021-07-09 11:38:37', '2021-07-09 11:38:37', 2),
(88, 354, 'Child seat 3-6 years', 1.00, 22.00, '2021-07-09 11:45:52', '2021-07-09 11:45:52', 1),
(89, 354, 'Child seat 3-6 years', 1.00, 22.00, '2021-07-09 11:50:08', '2021-07-09 11:50:08', 1),
(90, 354, 'Child seat 3-6 years', 1.00, 22.00, '2021-07-09 11:51:53', '2021-07-09 11:51:53', 1),
(91, 354, 'Child seat 3-6 years', 1.00, 22.00, '2021-07-09 11:52:40', '2021-07-09 11:52:40', 1),
(92, 354, 'Child seat 3-6 years', 1.00, 22.00, '2021-07-09 11:52:51', '2021-07-09 11:52:51', 1),
(93, 354, 'Child seat 3-6 years', 1.00, 22.00, '2021-07-09 11:57:21', '2021-07-09 11:57:21', 1),
(94, 354, 'Child seat 3-6 years', 1.00, 22.00, '2021-07-09 11:57:54', '2021-07-09 11:57:54', 1),
(95, 355, 'Child seat 3-6 years', 1.00, 22.00, '2021-07-09 14:38:16', '2021-07-09 14:38:16', 1),
(96, 356, 'Child seat 3-6 years', 1.00, 22.00, '2021-07-09 14:42:19', '2021-07-09 14:42:19', 1),
(97, 356, 'Booster 6-12 years', 1.00, 12.00, '2021-07-09 14:42:19', '2021-07-09 14:42:19', 3),
(98, 356, 'In Car Wifi - 10 GB', 1.00, 19.00, '2021-07-09 14:42:19', '2021-07-09 14:42:19', 7),
(99, 356, 'In Car Wifi - 50 GB', 1.00, 99.00, '2021-07-09 14:42:19', '2021-07-09 14:42:19', 8),
(100, 358, 'Child seat 3-6 years', 1.00, 22.00, '2021-07-12 03:12:30', '2021-07-12 03:12:30', 1),
(101, 358, 'Baby seat 0-2 years', 1.00, 32.00, '2021-07-12 03:12:30', '2021-07-12 03:12:30', 2),
(102, 359, 'Child seat 3-6 years', 1.00, 22.00, '2021-07-12 03:18:27', '2021-07-12 03:18:27', 1),
(103, 359, 'Baby seat 0-2 years', 1.00, 32.00, '2021-07-12 03:18:27', '2021-07-12 03:18:27', 2),
(104, 360, 'Child seat 3-6 years', 1.00, 22.00, '2021-07-12 03:23:53', '2021-07-12 03:23:53', 1),
(105, 360, 'Booster 6-12 years', 1.00, 12.00, '2021-07-12 03:23:53', '2021-07-12 03:23:53', 3),
(106, 360, 'Child seat 3-6 years', 1.00, 22.00, '2021-07-12 03:34:53', '2021-07-12 03:34:53', 1),
(107, 360, 'Booster 6-12 years', 1.00, 12.00, '2021-07-12 03:34:53', '2021-07-12 03:34:53', 3),
(108, 360, 'Child seat 3-6 years', 1.00, 22.00, '2021-07-12 03:35:21', '2021-07-12 03:35:21', 1),
(109, 360, 'Booster 6-12 years', 1.00, 12.00, '2021-07-12 03:35:21', '2021-07-12 03:35:21', 3),
(110, 360, 'Child seat 3-6 years', 1.00, 22.00, '2021-07-12 03:36:30', '2021-07-12 03:36:30', 1),
(111, 360, 'Booster 6-12 years', 1.00, 12.00, '2021-07-12 03:36:30', '2021-07-12 03:36:30', 3),
(112, 360, 'Child seat 3-6 years', 1.00, 22.00, '2021-07-12 03:38:05', '2021-07-12 03:38:05', 1),
(113, 360, 'Booster 6-12 years', 1.00, 12.00, '2021-07-12 03:38:05', '2021-07-12 03:38:05', 3),
(114, 360, 'Child seat 3-6 years', 1.00, 22.00, '2021-07-12 03:38:12', '2021-07-12 03:38:12', 1),
(115, 360, 'Booster 6-12 years', 1.00, 12.00, '2021-07-12 03:38:12', '2021-07-12 03:38:12', 3),
(116, 361, 'Child seat 3-6 years', 1.00, 22.00, '2021-07-12 03:44:32', '2021-07-12 03:44:32', 1),
(117, 361, 'Baby seat 0-2 years', 1.00, 32.00, '2021-07-12 03:44:32', '2021-07-12 03:44:32', 2),
(118, 361, 'Booster 6-12 years', 1.00, 12.00, '2021-07-12 03:44:32', '2021-07-12 03:44:32', 3),
(119, 361, 'In Car Wifi - 10 GB', 1.00, 19.00, '2021-07-12 03:44:32', '2021-07-12 03:44:32', 7),
(120, 363, 'Child seat 3-6 years', 1.00, 22.00, '2021-07-12 04:27:36', '2021-07-12 04:27:36', 1),
(121, 363, 'Baby seat 0-2 years', 1.00, 32.00, '2021-07-12 04:27:36', '2021-07-12 04:27:36', 2),
(122, 363, 'Booster 6-12 years', 1.00, 12.00, '2021-07-12 04:27:36', '2021-07-12 04:27:36', 3),
(123, 363, 'In Car Wifi - 2 GB', 1.00, 9.00, '2021-07-12 04:27:36', '2021-07-12 04:27:36', 6),
(124, 364, 'Child seat 3-6 years', 1.00, 22.00, '2021-07-12 05:06:16', '2021-07-12 05:06:16', 1),
(125, 364, 'Child seat 3-6 years', 1.00, 22.00, '2021-07-12 05:12:20', '2021-07-12 05:12:20', 1),
(126, 364, 'Child seat 3-6 years', 1.00, 22.00, '2021-07-12 05:12:41', '2021-07-12 05:12:41', 1),
(127, 364, 'Child seat 3-6 years', 1.00, 22.00, '2021-07-12 05:13:25', '2021-07-12 05:13:25', 1),
(128, 364, 'Child seat 3-6 years', 1.00, 22.00, '2021-07-12 05:13:40', '2021-07-12 05:13:40', 1),
(129, 364, 'Child seat 3-6 years', 1.00, 22.00, '2021-07-12 05:14:31', '2021-07-12 05:14:31', 1),
(130, 364, 'Child seat 3-6 years', 1.00, 22.00, '2021-07-12 05:14:41', '2021-07-12 05:14:41', 1),
(131, 364, 'Child seat 3-6 years', 1.00, 22.00, '2021-07-12 05:15:06', '2021-07-12 05:15:06', 1),
(132, 364, 'Child seat 3-6 years', 1.00, 22.00, '2021-07-12 05:19:30', '2021-07-12 05:19:30', 1),
(133, 365, 'Child seat 3-6 years', 1.00, 22.00, '2021-07-12 05:30:01', '2021-07-12 05:30:01', 1),
(134, 365, 'Child seat 3-6 years', 1.00, 22.00, '2021-07-12 05:32:32', '2021-07-12 05:32:32', 1),
(135, 366, 'Child seat 3-6 years', 1.00, 22.00, '2021-07-12 06:07:34', '2021-07-12 06:07:34', 1),
(136, 446, 'Child seat 3-6 years', 2.00, 22.00, '2021-10-08 03:25:40', '2021-10-08 03:25:40', 1),
(137, 448, 'Child seat 3-6 years', 1.00, 22.00, '2023-05-03 12:22:51', '2023-05-03 12:22:51', 1),
(138, 448, 'In Car Wifi - 2 GB', 1.00, 9.00, '2023-05-03 12:22:51', '2023-05-03 12:22:51', 6),
(139, 448, 'Child seat 3-6 years', 1.00, 22.00, '2023-05-03 13:00:00', '2023-05-03 13:00:00', 1),
(140, 448, 'In Car Wifi - 2 GB', 1.00, 9.00, '2023-05-03 13:00:00', '2023-05-03 13:00:00', 6),
(141, 448, 'Child seat 3-6 years', 1.00, 22.00, '2023-05-03 14:05:10', '2023-05-03 14:05:10', 1),
(142, 448, 'In Car Wifi - 2 GB', 1.00, 9.00, '2023-05-03 14:05:10', '2023-05-03 14:05:10', 6),
(143, 448, 'Child seat 3-6 years', 1.00, 22.00, '2023-05-03 14:33:26', '2023-05-03 14:33:26', 1),
(144, 448, 'In Car Wifi - 2 GB', 1.00, 9.00, '2023-05-03 14:33:26', '2023-05-03 14:33:26', 6),
(145, 449, 'Child seat 3-6 years', 1.00, 22.00, '2023-05-03 14:36:43', '2023-05-03 14:36:43', 1),
(146, 449, 'Baby seat 0-2 years', 1.00, 32.00, '2023-05-03 14:36:43', '2023-05-03 14:36:43', 2),
(147, 449, 'Booster 6-12 years', 1.00, 12.00, '2023-05-03 14:36:43', '2023-05-03 14:36:43', 3),
(148, 449, 'In Car Wifi - 2 GB', 1.00, 9.00, '2023-05-03 14:36:43', '2023-05-03 14:36:43', 6),
(149, 449, 'In Car Wifi - 10 GB', 1.00, 19.00, '2023-05-03 14:36:43', '2023-05-03 14:36:43', 7),
(150, 449, 'In Car Wifi - 50 GB', 1.00, 99.00, '2023-05-03 14:36:43', '2023-05-03 14:36:43', 8),
(151, 450, 'Child seat 3-6 years', 1.00, 22.00, '2023-05-03 14:39:40', '2023-05-03 14:39:40', 1),
(152, 450, 'Booster 6-12 years', 1.00, 12.00, '2023-05-03 14:39:40', '2023-05-03 14:39:40', 3),
(153, 450, 'In Car Wifi - 10 GB', 1.00, 19.00, '2023-05-03 14:39:40', '2023-05-03 14:39:40', 7),
(154, 451, 'Child seat 3-6 years', 1.00, 22.00, '2023-05-03 16:43:19', '2023-05-03 16:43:19', 1),
(155, 451, 'Baby seat 0-2 years', 1.00, 32.00, '2023-05-03 16:43:19', '2023-05-03 16:43:19', 2),
(156, 451, 'In Car Wifi - 50 GB', 1.00, 99.00, '2023-05-03 16:43:19', '2023-05-03 16:43:19', 8),
(157, 452, 'Booster 6-12 years', 1.00, 12.00, '2023-05-03 16:45:47', '2023-05-03 16:45:47', 3),
(158, 452, 'In Car Wifi - 2 GB', 1.00, 9.00, '2023-05-03 16:45:47', '2023-05-03 16:45:47', 6),
(159, 452, 'In Car Wifi - 10 GB', 1.00, 19.00, '2023-05-03 16:45:47', '2023-05-03 16:45:47', 7),
(160, 452, 'In Car Wifi - 50 GB', 1.00, 99.00, '2023-05-03 16:45:47', '2023-05-03 16:45:47', 8),
(161, 453, 'In Car Wifi - 10 GB', 1.00, 19.00, '2023-05-03 19:35:02', '2023-05-03 19:35:02', 7),
(162, 453, 'In Car Wifi - 50 GB', 1.00, 99.00, '2023-05-03 19:35:02', '2023-05-03 19:35:02', 8),
(163, 454, 'Baby seat 0-2 years', 1.00, 32.00, '2023-05-03 19:40:31', '2023-05-03 19:40:31', 2),
(164, 454, 'Booster 6-12 years', 1.00, 12.00, '2023-05-03 19:40:31', '2023-05-03 19:40:31', 3),
(165, 454, 'In Car Wifi - 50 GB', 1.00, 99.00, '2023-05-03 19:40:31', '2023-05-03 19:40:31', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE `tax` (
  `id` int(10) UNSIGNED NOT NULL,
  `tax` decimal(8,2) NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `uploadeddocuments`
--

CREATE TABLE `uploadeddocuments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `document_title` varchar(50) NOT NULL,
  `document_img` varchar(150) NOT NULL,
  `document_value` varchar(150) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `vehicle_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `document_status` enum('pending','approved','disapproved') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uploadeddocuments`
--

INSERT INTO `uploadeddocuments` (`id`, `document_title`, `document_img`, `document_value`, `user_id`, `vehicle_id`, `created_at`, `updated_at`, `document_status`) VALUES
(1, 'Company Legal Registration / Gewerbeanmeldung', '1585850485Gewerbe Anmeldung.pdf', NULL, 117, NULL, '2020-04-02 16:01:25', '2020-04-02 16:01:25', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `user_type` enum('end_user','driver','partner','admin') NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(150) NOT NULL,
  `creator_id` bigint(20) DEFAULT NULL,
  `status` enum('approved','pending','disapproved','blocked') NOT NULL DEFAULT 'pending',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `verified` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `user_type`, `phone_number`, `email`, `password`, `creator_id`, `status`, `remember_token`, `created_at`, `updated_at`, `verified`) VALUES
(12, 'Moray ', 'Admin', 'admin', '046455565768', 'booking@moray-limousines.com', '$2y$10$o7CPteKkldCObJ7xyhif5edgYsLpAujDFEXfBQoqfHo2rGjTVTsXy', NULL, 'approved', 'eWZAOyVAwe4ES89caahdhysE0iV5h72ezAOB9yVvZNcS04yRbwiXYsTNLVcB', NULL, '2021-06-29 16:03:57', 1),
(79, 'Hafiz', 'Shahid', 'end_user', '03157474084', 'mc100402525@gmail.com', '$2y$10$JxsgX4lWaL3wkNK/KXbf.OE67K3xdipN/2T2wV7XwzPpxmVMVqGem', NULL, 'pending', 'Hct7FNbkY7r6VRpQOSQI1c7vXZzFzBsnNb3XIPrkpJU9UAW0Qh67sygQJEyz', '2020-01-31 19:09:35', '2020-01-31 19:10:35', 1),
(80, 'Sufyan', 'Maher', 'end_user', '03078257570', 'writetosufyan@gmail.com', '$2y$10$cWYYg2IlaLOq8WE64KkCReXj.c9xTSnmWCE4AH7B3AQjN5JBZsm1u', NULL, 'pending', 'Rj5Abe8QisqlcAdV24PBMmU6LAOPgwAIQzbltJKNxaMWibPCBpe6NnGctaWD', '2020-01-31 19:32:27', '2020-05-29 10:01:21', 1),
(81, 'Jammal', 'Rahim', 'end_user', '+491634577758', 'nasir4716@gmail.com', '$2y$10$9hAXB8N.kxLRtUUPzKOfBeOsvxoS2X3Hl/JJH8UKLOzn804Gy3jDi', NULL, 'pending', '70c0w5qsclktCVPJL2zQldW0pX73x9RYUXKFNZpqFDRWbYRPSRrvP2gmHAdn', '2020-02-01 12:54:57', '2021-06-27 09:14:30', 1),
(82, 'Moheb Raza', 'Hussain', 'partner', '+491749275500', 'hussain@mylift.de', '$2y$10$wGx1vWDHoQWv2cursbDZt.0QgL4EhNAwtDYb.TCqMbyMHj47rdQrC', 12, 'approved', 'RoFlQ8FU16ltAsNUpPdnl68onYABAqHJ8H81kRKDSvSPoHORAAs4QYq4KaxD', '2020-02-03 00:15:17', '2020-02-03 00:18:08', 1),
(83, 'Moray', 'Limousines', 'partner', '+4915906406598', 'info@moray-limousines.com', '$2y$10$uOF0fJ16yUPGIglusbKbKutgDybo9Md325cqxDYKSQgU5ll0Rzn.i', 12, 'approved', 'bsgOHvpYqjsJrh9Kn6LDeBgOooxGkhsrqcepBQWIRZUQVspSST6aZzcdp4qQ', '2020-02-03 00:30:09', '2021-06-09 06:48:51', 1),
(84, 'Sufyan', 'Maher', 'end_user', '03078257570', 'umaher13@gmail.com', '$2y$10$i/4Vh58.r7.wX2bGcKT9RuX9h.qzZvK7GGHLugfEFWUCNhfnr9NmG', NULL, 'pending', 'rZNERZCiGuiHReY3G65PJngNrC4bZcXtNu4R6LcrcMBFBGDGOQXhfjMcFPpW', '2020-02-03 16:34:58', '2020-02-03 16:35:34', 1),
(85, 'Moheb Raza', 'Hussain', 'driver', '+491749275500', 'moheb.ra92@gmail.com', '$2y$10$RWm3gXUZHEOS1vSt.rRyjeDulgDQ4TnngIju6o0XJ7atQEq0chiEy', 83, 'approved', NULL, '2020-02-04 16:52:05', '2020-02-04 16:52:50', 0),
(86, 'Peter', 'Brunkhorst', 'driver', '6134189949', 'eventffm@gmx.de', '$2y$10$13Y0H2yiIolaDTItk1xw4egYIFMi0QZe3/MQzt6IwQE/KuYaGYZUu', NULL, 'pending', 'z7O1mnYORGpuWuWx6CBEUJ3wNqWoU5R5EqIOD6dsApm7DXKRIcb5BPCkLBuW', '2020-02-05 17:23:31', '2020-02-05 17:25:25', 1),
(87, 'Wahab', 'Javaid', 'end_user', '21312312312', 'bila@gmail.com', '$2y$10$KxcX19DuNXSZ7XzozByxBeLHSwSUk3Q4u0G3pihddx9RKlyjkg.Ba', NULL, 'pending', 'ExmJnPHpvjsa0aKi1l1yhI3YUDjmm44x054kVnD74IA1huw8Pl3uL2JgIpCm', '2020-02-06 10:43:40', '2020-02-06 10:43:40', 0),
(88, 'Wahab', 'Sabir', 'end_user', 'hbnmbbkj', 'codeilal@gmail.com', '$2y$10$cO8sjF3w5oYwuzIww.i8HuGwbO5dw3eV7WIyfdyE4rM6VTeIdOiOu', NULL, 'pending', NULL, '2020-02-06 10:48:12', '2020-02-06 10:48:12', 0),
(89, 'Steffen', 'Geyer', 'driver', '015903068754', 'geyerconsult@arcor.de', '$2y$10$4QVgn7NsKkF51SfeRnNCrernfCR6qwSBjOZMC8rCNLRE6eabzo8WW', NULL, 'pending', NULL, '2020-02-10 18:35:42', '2020-02-11 06:05:24', 1),
(90, 'Amin', 'El Tawil', 'driver', '+49 176 70907505', 'amineltawil@gmail.com', '$2y$10$ZSAS4.UoMehD.wtu2njN.uViuBR2mbwWSrOAWHQeRGAtBd9V0jM1e', NULL, 'pending', NULL, '2020-02-10 20:35:25', '2020-02-10 20:35:25', 0),
(91, 'Bridget', 'Gilmore', 'end_user', '44 07385 029798', 'bridgetgilmore@google.com', '$2y$10$UcAefEfLtd3Pq1ge7iD/Wep5jIE1RLnTlYLPSFMiPlj6wongTGulC', NULL, 'pending', NULL, '2020-02-10 20:36:34', '2020-02-10 20:36:34', 0),
(92, 'Isabelle', 'Skodda', 'end_user', '01726877880', 'iskodda@google.com', '$2y$10$5jUUO9ZaODDvHlEiKl59Ru/7sgazPYBG6V9TGxjfJub8/ysnUAXLK', NULL, 'pending', NULL, '2020-02-11 09:13:15', '2020-02-11 09:14:03', 1),
(93, 'Edem', 'Hounkali', 'end_user', '01754789644', 'eem-hounkali@hotmail.de', '$2y$10$o80vzrnnb4j.jHeLDml1hOgmJj4ykpXw62tAbNW9NFHlCfbG6KRdO', NULL, 'pending', '22Wid3fzAHnDnBNUMRMSi5Hc85ObnNKv2lbxBaMGoAaNsCDucZQ4hZCikjfT', '2020-02-12 22:47:42', '2020-02-12 22:47:42', 0),
(94, 'Rahmat', 'Shefai', 'partner', '017662756281', 'booking@munich-chauffeur-service.de', '$2y$10$ZbFSQOn7/Cgidae2ZvgvDudRkv5Y/y96rCHI3.M2DWonaqRvK1xQu', NULL, 'pending', NULL, '2020-02-13 17:25:35', '2020-02-13 17:26:00', 1),
(95, 'Wippen', 'Chandhok', 'driver', '017631267308', 'w.chandhok@gmx.de', '$2y$10$ciuZvhKjPD98.Ulf2M1eMO9NMKvBKtRPSvlPe66RiIzEJs4K1RWBK', NULL, 'pending', NULL, '2020-02-13 19:55:10', '2020-02-13 19:56:08', 1),
(96, 'Senad', 'Fazlagic', 'driver', '+49(0)1719181003', 'protecting@web.de', '$2y$10$34439ZVvY4dDdx2xxUfWF.hYWPNOSVheUi7m7oN/Xk9n/7PeOh6zG', NULL, 'pending', NULL, '2020-02-28 14:28:05', '2020-02-28 14:28:05', 0),
(97, 'Luca', 'Krieger', 'end_user', '01608157600', 'Krieger.Luca1@web.de', '$2y$10$ViY1s.0wARmAuUiSDhdDIeps3pUK5LxztohcpnEvM5QRQkIsnHE/S', NULL, 'pending', NULL, '2020-03-01 12:15:25', '2020-03-01 12:19:02', 1),
(98, 'Nikolaos', 'Katechakis', 'end_user', '004917677613701', 'katechakis44@hotmail.com', '$2y$10$vy.N3QZL3Hcb9racW1WPlun0xxwcW/VBtkUTndSLDNugvgLXA6oEG', NULL, 'pending', NULL, '2020-03-14 15:33:23', '2020-03-14 16:07:25', 1),
(99, 'YgjPHXDrun', 'csjuDQVznPIZUW', 'end_user', '8558375320', 'joanj3290@gmail.com', '$2y$10$rvPZpGHsVjfZe5h4rkBrzO74Yuo1aYNkrZwddFI4VeoIO/cEgELLu', NULL, 'pending', NULL, '2020-03-23 20:32:10', '2020-03-23 20:32:10', 0),
(100, 'hMvdHbRxj', 'EMZGPNgzV', 'end_user', '4216620329', 'l.fayad1@gmail.com', '$2y$10$2ZU2SsP9J2Qm1o0LOIUmGuYaZY0wtby2XyYhop1cplkJtJJDWveg6', NULL, 'pending', NULL, '2020-03-24 12:38:17', '2020-03-24 12:38:17', 0),
(101, 'JzNfQUFDkyTGhEt', 'iHGJYIqk', 'end_user', '8568924180', 'elena.sherman1962@gmail.com', '$2y$10$754P01vZF.ZUfMPYJNWpx.Q7d.UA3sAFVPwOQkrz/SUdnvJ9AVDsS', NULL, 'pending', NULL, '2020-03-24 14:51:57', '2020-03-24 14:51:57', 0),
(102, 'bFgGytIUMZNfuoE', 'YghSZwbzxpc', 'end_user', '4067029475', 'montgomereal@hotmail.com', '$2y$10$ptOb2aARbff7W9QeK706uesmXqjzGNJ5l/2qjpXhwlCJZXoNzJTXS', NULL, 'pending', NULL, '2020-03-24 17:22:49', '2020-03-24 17:22:49', 0),
(103, 'PjfWHkAKurQ', 'CQnHwUzlfiamRbD', 'end_user', '3723992068', 'pjrichie@gmail.com', '$2y$10$5nu1r8Muqi0R3fFCm8c24uHnYtZcwGwRwTfcP0b42YzO73NR.VgdC', NULL, 'pending', NULL, '2020-03-25 21:54:00', '2020-03-25 21:54:00', 0),
(104, 'vZysUuqwMxzOQ', 'RAIgZcmtbUySVGK', 'end_user', '2452506821', 'baylor.carey@yahoo.com', '$2y$10$nhelu2Gfyr7v6omTs6aT1.vQH1suYLqPyAEdKMHERAxSjVd9nR5ji', NULL, 'pending', NULL, '2020-03-26 01:06:34', '2020-03-26 01:06:34', 0),
(105, 'ePZEXHGp', 'VgIGtUWZyjdN', 'end_user', '3165090492', 'grupotech.jrvr@gmail.com', '$2y$10$2VnK1LBsWVk3do4A60.26uPov.E1WT31d7W2w7v3EnQ1Y3L7xn1PG', NULL, 'pending', NULL, '2020-03-26 10:04:03', '2020-03-26 10:04:03', 0),
(106, 'CAVRjYzUvqyNPD', 'NzCivwOBlatxRsn', 'end_user', '7347066884', 'lijing0592@gmail.com', '$2y$10$U4YLM.BulvwOTfYiI6noEuHOyLqjOKdbPte1aU52Sdy3URXqO54vy', NULL, 'pending', NULL, '2020-03-27 12:41:23', '2020-03-27 12:41:23', 0),
(107, 'eQlYLWBP', 'FMWarhDHGOA', 'end_user', '2411075235', 'wbennett2009@gmail.com', '$2y$10$McT1yyNwkOtiA/G98SwOc.sWkKjf0Y6QUk7ZYWv8RRcru7jzftZBy', NULL, 'pending', NULL, '2020-03-27 19:03:12', '2020-03-27 19:03:12', 0),
(108, 'QbTYgKnwZpqi', 'MGfDhUvubHC', 'end_user', '3757502489', 'comphervictor@gmail.com', '$2y$10$0HmAfFTbPORxYHvqbAXLNeMs5PqJQVIEC.0aYZa1aFfsG7WeGcFEm', NULL, 'pending', NULL, '2020-03-27 19:35:07', '2020-03-27 19:35:07', 0),
(109, 'beWMEJoCf', 'VsiXJGvZBD', 'end_user', '9070919419', 'jamallyf94@gmail.com', '$2y$10$CFvkyjqOWmDVjACWqx1rC.zznIl3rmMYnYUKlk/cKRSzl7zkDVyqG', NULL, 'pending', NULL, '2020-03-28 00:16:22', '2020-03-28 00:16:22', 0),
(110, 'exTrZoKmqBQyOS', 'elfvLZkSaQKi', 'end_user', '3693793433', 'mikep@chicagoladelivery.com', '$2y$10$MKJWnky9hR2CNpz0/DGUEeyyD9CI3u8q0hyc5P0EoDZQY9ceq7H16', NULL, 'pending', NULL, '2020-03-28 12:23:37', '2020-03-28 12:23:37', 0),
(111, 'quVwIcrgAnOBN', 'QBTjWGUVF', 'end_user', '7375565254', 'snr.tome@yahoo.com', '$2y$10$TRIuuTCDxK.N3ZdPy6TXMOOBKAn5yhDHohT4/UU0aMMiYcxcX1F5y', NULL, 'pending', NULL, '2020-04-01 13:12:58', '2020-04-01 13:12:58', 0),
(112, 'FHwLBUycZrk', 'IBHlZpswQyteFK', 'end_user', '7697688253', 'ashlynnglenn567@gmail.com', '$2y$10$5z6aTAXqzImf9SRwrQijI.yKoaQu0dzb.0sp7vO6FdYlFpCgrSM1u', NULL, 'pending', NULL, '2020-04-01 16:34:38', '2020-04-01 16:34:38', 0),
(113, 'STbWNvQmXiAj', 'MgCveyFkGEQwLWx', 'end_user', '2556298709', 'lafranchilucien@aol.com', '$2y$10$1RfqmQeEFBDj86gZx8Y/FuHWnIg3z90gRUxXL775on3FWWRzoq/Ta', NULL, 'pending', NULL, '2020-04-01 17:52:29', '2020-04-01 17:52:29', 0),
(114, 'hctmeaEQguLbDvIT', 'NPpTRBvdshFX', 'end_user', '2921888149', 'ewinf.konrad@yahoo.com', '$2y$10$gCZ9AkzyEStJhpQGv5LyAeIl2XicSTSphYC.76Cact/hOJ/8dage6', NULL, 'pending', NULL, '2020-04-01 19:37:33', '2020-04-01 19:37:33', 0),
(115, 'JdMvtuyXo', 'dJxeYaZyOMPtvR', 'end_user', '4250451445', 'stabler.pauly@aol.com', '$2y$10$kVH2IMEJ1l5mjf2RDvBNtO3t7ywq/GV7yb.jrcxqFjqZs9LpScCSi', NULL, 'pending', NULL, '2020-04-02 02:38:43', '2020-04-02 02:38:43', 0),
(116, 'OeNRmKogVHxM', 'BLVAHsmceybuGz', 'end_user', '9472934969', 'ousey@bellsouth.net', '$2y$10$xiizhrTxynQj9KA6G3SJg.GEVFihJl0oHpLvmRzm5UYZYcp4.vjFa', NULL, 'pending', NULL, '2020-04-02 13:11:16', '2020-04-02 13:11:16', 0),
(117, 'Atif', 'Bashi', 'partner', '01791241614', 'mab.mobility@outlook.com', '$2y$10$rlG2DmyVit0mhFRzwryacuh/iLQlVxsd6Lf3Xwfk51meOw2sbH3q6', NULL, 'pending', NULL, '2020-04-02 15:58:18', '2020-04-02 15:59:04', 1),
(118, 'ArwxkqhpoR', 'eQEosgdwiZB', 'end_user', '9035364603', 'cmtthomps@yahoo.com', '$2y$10$y7kNxk2EIaKWfmO/e.Owmu6XUQf//TONzetan22eZLI5RVZeyGOrq', NULL, 'pending', NULL, '2020-04-02 16:58:39', '2020-04-02 16:58:39', 0),
(119, 'lGsBXNFSrWVhEZR', 'GSAfbdUa', 'end_user', '5073313777', 'quin_bartee@yahoo.com', '$2y$10$OQXF7wvSQkqX9YmrQ8oIM.PQMqrdj3YSqkBSkdaW6Z30CnQqUnHc6', NULL, 'pending', NULL, '2020-04-02 19:30:02', '2020-04-02 19:30:02', 0),
(120, 'grvaRyVkGSAu', 'ELGYgmzOo', 'end_user', '2296801406', 'pyro-fx@sbcglobal.net', '$2y$10$I5UF4OQlkljZkpBTsX27n.W6UhCdP70WmQjWmwscXCiQIelwAURxm', NULL, 'pending', NULL, '2020-04-02 20:27:36', '2020-04-02 20:27:36', 0),
(121, 'qTEdJbKlUHYNVa', 'IJDFcbXgLQ', 'end_user', '8259378074', 'oliviajmoore@aol.com', '$2y$10$VA66JJLp7mOOS7F.D4m4Ue1uSH.Gg7MkH/gcNV9UDV480dWEp4PKi', NULL, 'pending', NULL, '2020-04-02 21:06:50', '2020-04-02 21:06:50', 0),
(122, 'TdhocnxF', 'yAmVKCagE', 'end_user', '3697445823', 'winsland.dom@yahoo.com', '$2y$10$dlRtycCt0GUPLnjQuADuxegFgxDlenzUFgjJLRrDFN22vnsSGRaQ6', NULL, 'pending', NULL, '2020-04-03 00:22:44', '2020-04-03 00:22:44', 0),
(123, 'jEkzoRvCtXdIO', 'WfFuMICc', 'end_user', '2208943557', 'jmsusskind@att.net', '$2y$10$PTZSwtIM0JuZxAxyHJaWmO7E/bpzFX9sPIuEaHpFGZ9bieCT9YVuW', NULL, 'pending', NULL, '2020-04-03 03:01:21', '2020-04-03 03:01:21', 0),
(124, 'aAlYCgJqitKNwUsL', 'EVBIlifDPJjmOUW', 'end_user', '3790153197', 'cmoersen@yahoo.com', '$2y$10$PfFNPcQnT1UuSip71KdR5OfcnvCGXKFzEumINTS9FW1QbledYEL5y', NULL, 'pending', NULL, '2020-04-03 04:43:41', '2020-04-03 04:43:41', 0),
(125, 'umcyhJerXpj', 'ALGozeQySx', 'end_user', '9458344018', 'darbeelinton@yahoo.com', '$2y$10$Nz7O4f2qK2QZsH/eyZb8G.2XXTagM9SE.EYMu1VMJIJmdhjpWYLAG', NULL, 'pending', NULL, '2020-04-03 04:54:43', '2020-04-03 04:54:43', 0),
(126, 'TdrpvWFlXwSRbQ', 'rRMiQuOGv', 'end_user', '3658675147', 'rankine.goddart@yahoo.com', '$2y$10$rQbhlo0ipZmC.vNTCC9UjeEtfLT1FqMIP3vjvW16ey6j8DqeDowG.', NULL, 'pending', NULL, '2020-04-03 05:06:41', '2020-04-03 05:06:41', 0),
(127, 'zqNjpcAgoYMHwQCk', 'ncWJNPtEvxbgrChV', 'end_user', '4680502300', 'christophhutchinson425@yahoo.com', '$2y$10$.PedQlovzG0DdU46DBBYGOd7Y8UsVCUrVCHdE/IGiJB5AHp0ErVBG', NULL, 'pending', NULL, '2020-04-15 23:52:30', '2020-04-15 23:52:30', 0),
(128, 'eIkvJWiAOG', 'KdSnYCiA', 'end_user', '6946689836', 'davidneal7548@gmail.com', '$2y$10$6Qmj7oYyggW0LavhlEhGQ.jszf1VVOrAya8VMvgwjUkcBnNKYlTSq', NULL, 'pending', NULL, '2020-04-18 10:07:42', '2020-04-18 10:07:42', 0),
(129, 'AoHEMRbwSIdGDay', 'mCuvrAOwYEc', 'end_user', '9356402443', 'isak_kane@yahoo.com', '$2y$10$N8G0JE8SjoR84TPycnelmeCCCHlwb/EwueOJ3Pcp/HVPxzJX2soda', NULL, 'pending', NULL, '2020-04-21 04:17:43', '2020-04-21 04:17:43', 0),
(130, 'SzADgmxadwJL', 'jKsUeTbNhnE', 'end_user', '5295870759', 'blackily.jarred@yahoo.com', '$2y$10$LSvN7Y1Z16QAKN0aJoeGC.JLH747.xaIq07uimJ3tcPV14LniOPPe', NULL, 'pending', NULL, '2020-04-24 10:23:28', '2020-04-24 10:23:28', 0),
(131, 'wlbTtPmXfYiy', 'vbDlxKRoIQrYcwHi', 'end_user', '6681739671', 'cachonoah@yahoo.com', '$2y$10$3iHKMFeVaLAQyewjYrb/m.HAGDAtOxrBUACY9PbEqlnhWNCaU1..q', NULL, 'pending', NULL, '2020-04-24 12:29:42', '2020-04-24 12:29:42', 0),
(132, 'rmunBweSNs', 'Jjyvegtmq', 'end_user', '3225927911', 'rdowouis@aol.com', '$2y$10$9vRdn0wq6B0AoNemyq6MDeqjWCz87YYz9ccKde4ygwT0so1qnKmjS', NULL, 'pending', NULL, '2020-04-24 12:39:01', '2020-04-24 12:39:01', 0),
(133, 'nMNkuVotmRq', 'OQbEBydhk', 'end_user', '7611840477', 'victoriaorobinson@yahoo.com', '$2y$10$cWK3Qh10fk3qK1MXLkSDkO9BesOUmpcCWFZvsGV/rcXXzcovBwjw2', NULL, 'pending', NULL, '2020-04-24 14:33:03', '2020-04-24 14:33:03', 0),
(134, 'iqLvAMnxBbrZ', 'QXtIpFoUwzAKgOaf', 'end_user', '9033018175', 'creativemind35@yahoo.com', '$2y$10$.1WwMePgMHTOPsSuvoXCnuy.3JFhuGTa/1xkETIND6OrPv.PtZlY6', NULL, 'pending', NULL, '2020-04-24 16:56:12', '2020-04-24 16:56:12', 0),
(135, 'YmfzwGyb', 'NLGmdfPoErzuj', 'end_user', '6763608897', 'sabaghart@yahoo.com', '$2y$10$7u5Is/oXLZ9YQbMs4aFmOeLdXC4va3n5hPxDLfrHlyvhRpROmAnxe', NULL, 'pending', NULL, '2020-04-24 18:12:59', '2020-04-24 18:12:59', 0),
(136, 'ORfmjIWADLlBbZ', 'UdhLtqonkRVDcmb', 'end_user', '8409367594', 'jvzarley@aol.com', '$2y$10$p9OY/ycsfkHtzJEGIUSKQu9juXRNX0Hy6VHLyK1vhqrH8WRx82V0.', NULL, 'pending', NULL, '2020-04-24 18:14:58', '2020-04-24 18:14:58', 0),
(137, 'pyAfOaKYFvXsS', 'uTBpXkPrhKtjNgLm', 'end_user', '5812995608', 'lilyking4619@gmail.com', '$2y$10$7.hC7qolB2nj4E9P877q.Om3Lie74wF3xxMiGbv5SBc4mOErSLnLC', NULL, 'pending', NULL, '2020-04-24 18:23:08', '2020-04-24 18:23:08', 0),
(138, 'SNEVoDzgelH', 'BZQnaTbvxjPmp', 'end_user', '8447720177', 'jmarrone1@aol.com', '$2y$10$6q7HTGS.5CGTYac.VEIz4.vcjdKPtLVIw9c06oTvjH9AAwDvFfWjC', NULL, 'pending', NULL, '2020-04-24 20:57:51', '2020-04-24 20:57:51', 0),
(139, 'bmHfcLhkVI', 'AhBKaVOWkC', 'end_user', '4693260108', 'braconinc@verizon.net', '$2y$10$aJKyVF7rSUCLQfbtCzy4tuLKTO5rbM3neBqgAjsI2.zSYT4zu3N1i', NULL, 'pending', NULL, '2020-04-24 21:07:42', '2020-04-24 21:07:42', 0),
(140, 'wymRZaoQH', 'RmrwCefsZXT', 'end_user', '3635979500', 'mwkeev1@aol.com', '$2y$10$99tanLqFeBDHGyDowqCN2eD6ei4qrcVU/zCGne3Q8XzgI7qpC41sq', NULL, 'pending', NULL, '2020-04-25 01:41:00', '2020-04-25 01:41:00', 0),
(141, 'FSUxoELtfJQHMKhY', 'xFQvknbDNYj', 'end_user', '9656267835', 'david.hay7@yahoo.com', '$2y$10$HaJBQEaT5HJRhca1QoHrf.MnPTONRGcL8Km9Y82Do0nBgXasTxIeK', NULL, 'pending', NULL, '2020-04-25 06:56:50', '2020-04-25 06:56:50', 0),
(142, 'hAUyviWXDSzPQ', 'tgTwahEd', 'end_user', '2897310573', 'kristen4797@yahoo.com', '$2y$10$Lqu3OYidvfJYlKW7WqqUH.kOZRu67oVQ11qBjVt50Hr2D6ZrqKSeK', NULL, 'pending', NULL, '2020-04-25 12:31:57', '2020-04-25 12:31:57', 0),
(143, 'fpkveUnYMVmwFOCg', 'jZpcWdEvieUCz', 'end_user', '9580383183', 'debdoc104@aol.com', '$2y$10$nR8aJMRpH2nlEJhak7/3YuTNmo/.zSX5p4TL2oimmNdQ2fXgOJAz2', NULL, 'pending', NULL, '2020-04-25 13:08:08', '2020-04-25 13:08:08', 0),
(144, 'NTjkdrYWexoLsBQR', 'HkrtzoeTKhWiNvQf', 'end_user', '9822341055', 'ashleyjunes@yahoo.com', '$2y$10$qo5oN4X9Di38Epe6z.m5Ou5UIgGUNwjUeWCRPz0UA27KuNPASgJFG', NULL, 'pending', NULL, '2020-04-25 14:10:50', '2020-04-25 14:10:50', 0),
(145, 'BIFAQlaRT', 'NHxDaQItRwo', 'end_user', '6946480256', 'zmamdouh@yahoo.com', '$2y$10$p5lHvtBr9RbfgTHJ/424ROsROZPiUZZR4PaYAzwj8oGjk8vp1Dbfi', NULL, 'pending', NULL, '2020-04-25 14:47:09', '2020-04-25 14:47:09', 0),
(146, 'bMGjhBZCu', 'vxNdEGDyOtX', 'end_user', '7343361202', 'nealroslind@gmail.com', '$2y$10$XD1mHb1ywVr4NWcAtysIB.FnLkAqQrxk6MFFbOrk/ZGvVQmNw5dQG', NULL, 'pending', NULL, '2020-04-25 15:44:45', '2020-04-25 15:44:45', 0),
(147, 'zgoKMhFdXUCBP', 'xRhIiptHlbKy', 'end_user', '3737541142', 'thomasdaren94@yahoo.com', '$2y$10$HhvWyoPetOrO8VpZfYE/j.BOIHCXPLKDHV3sZTbt42bj4/fn7SI1a', NULL, 'pending', NULL, '2020-04-25 16:06:38', '2020-04-25 16:06:38', 0),
(148, 'oAbxGBhCWnskaEz', 'pdyIWbYmiRKBhGq', 'end_user', '6002590086', 'jazzyblues2005@yahoo.com', '$2y$10$.DxedgHTJDEKpM/3TZuEzu6310qbI78SE8iyFVmI5Oa.UNKgr/mUS', NULL, 'pending', NULL, '2020-04-25 18:36:28', '2020-04-25 18:36:28', 0),
(149, 'xwznJNUjQkdIS', 'WgrZhANlUDtFn', 'end_user', '8857619860', 'long2_khan@yahoo.com', '$2y$10$PLBigbqlIqBXoCXtF8lvJOOqDeAM5WRrur.UEMcnxFl.tqTaARSaK', NULL, 'pending', NULL, '2020-04-26 02:49:25', '2020-04-26 02:49:25', 0),
(150, 'LcmvqgBPkxEj', 'EQDyWIVdbaJGsvxK', 'end_user', '5325237450', 'gradeydawtry@yahoo.com', '$2y$10$M5h2uItxfJGyJ/URSRMHoOJBMnBe7UOkc/Y8T572uLr3nTD2aytGS', NULL, 'pending', NULL, '2020-04-26 04:15:08', '2020-04-26 04:15:08', 0),
(151, 'kpNfZowBX', 'mYaHRSZkWxlE', 'end_user', '8266246275', 'alejandro_smyth@yahoo.com', '$2y$10$bbpXZQroB4B7U7lYi2FMOu42I18XRxckZQqArnhI01Xsq5btdYY3m', NULL, 'pending', NULL, '2020-04-26 05:37:47', '2020-04-26 05:37:47', 0),
(152, 'ofCUYHbXOpEmdMyJ', 'BryLsGAwfPx', 'end_user', '5756480385', 'bjl1292@yahoo.com', '$2y$10$2VVkSU53tYDxIiTDMYA7DO568cxqgXj58pZ22g7a0Steasv86y0Ty', NULL, 'pending', NULL, '2020-04-26 06:27:15', '2020-04-26 06:27:15', 0),
(153, 'njbYhWaz', 'vaMJTVpihut', 'end_user', '5544853442', 'satiate83@yahoo.com', '$2y$10$3p0Lk5GNHx3H6d4A3dITT.zhkvNHbw06rqSN/E.7dKpn08QPTI2YC', NULL, 'pending', NULL, '2020-04-26 11:14:32', '2020-04-26 11:14:32', 0),
(154, 'ZwXrLzpF', 'lHyQjvxIJmTFXMA', 'end_user', '9943766459', 'rcmancini@yahoo.com', '$2y$10$mnrtj72ZDh4VuQMcbgNS3eiWXFEQHQIA7AST.qZEE3pEIlzpp/wBa', NULL, 'pending', NULL, '2020-04-26 12:11:56', '2020-04-26 12:11:56', 0),
(155, 'nApKmhaI', 'wumTVKRvrFY', 'end_user', '5906878584', 'tylerdeeh@gmail.com', '$2y$10$yqEZvs8FxJtrGUT5scFjTe4bbGoIcMhbDRveXOnbeUVZNntjGm//2', NULL, 'pending', NULL, '2020-04-26 12:22:57', '2020-04-26 12:22:57', 0),
(156, 'FDtWrcCkIMvNA', 'jPLHZhcGlspqzi', 'end_user', '9340304216', 'darryllcovington@hotmail.com', '$2y$10$gAY4UEW.WGYYh/tOyLwXq.oUdmgo21Bxiz5QX8j0Y6z5oIeWbm2oC', NULL, 'pending', NULL, '2020-04-26 14:28:06', '2020-04-26 14:28:06', 0),
(157, 'Nico', 'Vogt', 'end_user', '0176/22652054', 'nicovogt.1@web.de', '$2y$10$70uM.3wMWmSzyTHpPTksyuveTkmVQvMZGVapO7WMI6t9uqQIt1gh2', NULL, 'pending', 'utMEshduunzL1H8fi4hQEVd7iQT20znLGjpWssEThyFLqD7ZSAUAViiR9hF4', '2020-04-26 14:37:40', '2020-04-26 14:41:21', 1),
(158, 'igzmpNJcsoUhw', 'sSBygkXerwtICKvT', 'end_user', '4788667483', 'teem08.td@gmail.com', '$2y$10$5LKhqqCSWq3e2OyOLhLOc.2k3Fr92lAMO1NdXRqUTCqxIb9bS4kSC', NULL, 'pending', NULL, '2020-04-27 11:55:37', '2020-04-27 11:55:37', 0),
(159, 'LfGoxdlCa', 'jHWcmqYsnDv', 'end_user', '2746574263', 'bhavikpatel1680@gmail.com', '$2y$10$JNrp2ojPSAoFa8tzeqim5Og8O.EhNH8PNdbnpc.E1qOJ4f6tlIwnC', NULL, 'pending', NULL, '2020-04-27 13:18:45', '2020-04-27 13:18:45', 0),
(160, 'opbFReUEYWsimwnS', 'PMBDITqkyb', 'end_user', '7080020710', 'bucketlady5@gmail.com', '$2y$10$3yNTF6jo/gtc1KaO8q.6DOi0KmROxFsPqiIeHsMG7NxvK5/7yhLdS', NULL, 'pending', NULL, '2020-04-27 14:16:56', '2020-04-27 14:16:56', 0),
(161, 'WZSBuYLqaUt', 'ignhkCHwScpMPud', 'end_user', '2167419142', 'rhubbardmd@gmail.com', '$2y$10$xv/OoCt8rk/ITRO/ZmFpt.z7NH3kDR2dNPzzAcZKE8txWgkmGtoIy', NULL, 'pending', NULL, '2020-04-27 17:01:31', '2020-04-27 17:01:31', 0),
(162, 'BADYtahzZ', 'adYxywZoQGBlCItU', 'end_user', '6243999229', 'mattfpalmer@gmail.com', '$2y$10$BvT7L4CpDN82Ql8PNTOIhe.21AJpYv81F8ZqBCAt7m5dnwLAlCkxK', NULL, 'pending', NULL, '2020-04-27 17:21:33', '2020-04-27 17:21:33', 0),
(163, 'DtSoOFCMKpZ', 'eHQIYvNpmnGXSr', 'end_user', '2294578470', 'bellosiciliano96@gmail.com', '$2y$10$ABK160iymmYqCZ54/TVNyO/Q9J.YpHCvn5DtbUFeXd2NLoQImdpqu', NULL, 'pending', NULL, '2020-04-28 07:54:26', '2020-04-28 07:54:26', 0),
(164, 'jaLOFMEXnCUlx', 'GdTjpEzHNkf', 'end_user', '8631485984', 'gabrielnuguit@aol.com', '$2y$10$2U6.TibKrAvVnQfXdV8lE.5ZaXgeOuIiX3oo1CHv2ZWdO5rZu6koq', NULL, 'pending', NULL, '2020-04-28 09:12:04', '2020-04-28 09:12:04', 0),
(165, 'tnbPohmviGUQeCH', 'qZJzFiheyxE', 'end_user', '3186227040', 'lilianagarcia95@yahoo.com', '$2y$10$6k45FaXnMGCPaADAsii6..fxgfCXFSml.ylk7ADaWo4TNFXXc0MEO', NULL, 'pending', NULL, '2020-04-28 11:47:55', '2020-04-28 11:47:55', 0),
(166, 'FqeIQABSlami', 'ZeYEvnadsLAQBWpG', 'end_user', '3812181011', 'm.salinas61@yahoo.com', '$2y$10$Jn2GlUx5GCbg0aT/vpx0AuqJYIroIPSFemiXQrQTUKsAIs89w4JQK', NULL, 'pending', NULL, '2020-04-28 12:21:11', '2020-04-28 12:21:11', 0),
(167, 'raeyzFkcbl', 'jreLJPqZmwbl', 'end_user', '3424975133', 'heidiandpete@yahoo.com', '$2y$10$GkMY8G9Jx20IfYwnep3IfuZ19JevX6B4MwDmiwmmOghmSCIOMBoJe', NULL, 'pending', NULL, '2020-04-28 13:17:53', '2020-04-28 13:17:53', 0),
(168, 'sklTHYDhnLurgJO', 'mcQPKsIpExWDC', 'end_user', '7390431132', 'minhee2406@yahoo.com', '$2y$10$9nI4SDShUr0I1TxZAkYUhuzBgfA00Ufc5GGpIcB1gScil9uOHBUJa', NULL, 'pending', NULL, '2020-04-28 14:08:50', '2020-04-28 14:08:50', 0),
(169, 'nwsuiZTdjGzWa', 'TDwdOKWjfycN', 'end_user', '7794154401', 'noahcefola@yahoo.com', '$2y$10$Zy0MtxKppzpNeploRXWbi.S5tIwt.Zkc2Q.8qHqwnuta0GDalLlm6', NULL, 'pending', NULL, '2020-04-28 15:28:48', '2020-04-28 15:28:48', 0),
(170, 'guOxWRKA', 'YSgsLOfkIwNq', 'end_user', '6886531535', 'duvidm@aol.com', '$2y$10$197G50R.FAOslK0bTr79YuQwdldjAjE0mKnXmfbZIDZqJUgaND0Uq', NULL, 'pending', NULL, '2020-04-28 16:54:47', '2020-04-28 16:54:47', 0),
(171, 'iyqmQuOxLeJYvPIr', 'DQkXopdfivAgtWI', 'end_user', '7364899987', 'kamron_croucher@yahoo.com', '$2y$10$vBitxuOjeWCBQ6gxzeI0IO2VDcwZPeLIM8XGxmO3SxpZoeEouNFT2', NULL, 'pending', NULL, '2020-04-28 17:22:46', '2020-04-28 17:22:46', 0),
(172, 'fpqGYSVzEnXy', 'ZCViOtMURyHxgBJm', 'end_user', '9293557165', 'agittrich0731@yahoo.com', '$2y$10$IyRoGnZcnoLkLhLc7FRa1.PsrbCBqo4WIpjrhADEgMWNLNrh9pc5W', NULL, 'pending', NULL, '2020-04-28 18:40:20', '2020-04-28 18:40:20', 0),
(173, 'DgsGeCXImx', 'uwvRcZkKJ', 'end_user', '5798201485', 'crdnblu@ymail.com', '$2y$10$wV5nRaK8o795NHPFvozoxukDLMzb6.kOnt2tIESgXda7BH3MFJbdW', NULL, 'pending', NULL, '2020-04-28 19:20:05', '2020-04-28 19:20:05', 0),
(174, 'mtWAZQexDYEJaI', 'UqyPtijMae', 'end_user', '5214434444', 'ericajgrant@aol.com', '$2y$10$4tejr4uR2RPwBqbIp/3.Hu/OE0BflWOV1esfOV0PSJHlevcSfjEme', NULL, 'pending', NULL, '2020-04-28 23:26:23', '2020-04-28 23:26:23', 0),
(175, 'ImqudCnUSXy', 'CoENrJRaDFlKVW', 'end_user', '4021817437', 'simcd@att.net', '$2y$10$zJGYOML8upZGV9vYmB77NeS0GyiBSmV8skN3Aj911vHp5/n.8jiX6', NULL, 'pending', NULL, '2020-04-28 23:34:24', '2020-04-28 23:34:24', 0),
(176, 'lreUGHYs', 'NWhKwQpUjz', 'end_user', '6707239119', 'seth1227@icloud.com', '$2y$10$dco8.GbTlbfaRop3kWU5c.njM./7NBMbX6l/jWSVs4ugfobl/KG3.', NULL, 'pending', NULL, '2020-04-28 23:34:53', '2020-04-28 23:34:53', 0),
(177, 'vfAhQROpUZ', 'nWAlOsUQLiTqrSG', 'end_user', '5453750967', 'chok_tam@yahoo.com', '$2y$10$9T6UixawC/fB2RjDb3KI0.5qlKSIFbHh.ZsZtzh3q/3fDCfl8/dNy', NULL, 'pending', NULL, '2020-04-29 01:43:32', '2020-04-29 01:43:32', 0),
(178, 'GhuEjsQpnCVetLZ', 'UiApQWcu', 'end_user', '9394846988', 'agnes.banach@aol.com', '$2y$10$J29m9VqhswZAdDw9qquvmuM1WpzwfoDxR0zHAHGyCQ.EbFt61lbhi', NULL, 'pending', NULL, '2020-04-29 02:09:37', '2020-04-29 02:09:37', 0),
(179, 'EVAPjLbdSUJD', 'nqZQNYGIKoPeRkgT', 'end_user', '4405839239', 'bobisamartin@yahoo.com', '$2y$10$BzfZUXrLN65Nv1LZscbfNONiY3NJd5TqAlF2rYKVvD3EhCtZ2Leje', NULL, 'pending', NULL, '2020-04-29 02:22:42', '2020-04-29 02:22:42', 0),
(180, 'XFxVfqng', 'ZxOzgPCG', 'end_user', '3379011831', 'amykiely47@yahoo.com', '$2y$10$rWw9KotwmIzd2mncL7g1G.yKlLUYilOcGMsDHge0NRqHyy6tk9FkK', NULL, 'pending', NULL, '2020-04-29 04:45:44', '2020-04-29 04:45:44', 0),
(181, 'jMyblAnSNGWpR', 'xmWniUMyjQHdpEu', 'end_user', '5366726181', 'lindacortez03@att.net', '$2y$10$dj1ltEYMZi.DOQHglBVkxuYkwpJ4qSAG5v1QcQcq5Z9U6LzLcm2F2', NULL, 'pending', NULL, '2020-04-29 05:04:10', '2020-04-29 05:04:10', 0),
(182, 'GCFNTRtemQnc', 'SNkdslCKheauF', 'end_user', '3077270544', 'katrina_d_perry@yahoo.com', '$2y$10$y.icD0HEz.oIkYz4hQJc/OxC9T3VVhp6grimzwqAb/CmuajUTw3lG', NULL, 'pending', NULL, '2020-04-29 05:48:55', '2020-04-29 05:48:55', 0),
(183, 'qUpzkPLfrMH', 'UORhMitubWd', 'end_user', '5914304569', 'lsbonner111@yahoo.com', '$2y$10$6Hs/FZV/MOwTIDyChi87o.iBIfP0qE2QIbqYrZ5VoEcEAl7pc.P5G', NULL, 'pending', NULL, '2020-04-29 06:00:26', '2020-04-29 06:00:26', 0),
(184, 'qLaNhirfWGB', 'PaCRMfJvO', 'end_user', '8936801051', 'valdezivan30@yahoo.com', '$2y$10$073ZtcLpxK6mKYZvCN/qXOSD6UTAoloF4AYlgtN/iJIfRBre.gE4y', NULL, 'pending', NULL, '2020-04-29 06:01:42', '2020-04-29 06:01:42', 0),
(185, 'YsiPouFmUKtZ', 'xnFJZYWPMQji', 'end_user', '2985405849', 'demitassecup@aol.com', '$2y$10$fDySAVywwMuInRnyFeinFefOVnFVTeI8Aqi/XXW5Tl06g.RU.b/9a', NULL, 'pending', NULL, '2020-04-29 06:14:27', '2020-04-29 06:14:27', 0),
(186, 'fxMdLWjSwoJq', 'CZkRydKpBwvbti', 'end_user', '7011188281', 'cannoncalhoun@yahoo.com', '$2y$10$o.XQpmSty.lzKOfGt.PNM.3DIURzk4TVfy.ll4AxJMzXdeUdq0v6S', NULL, 'pending', NULL, '2020-04-29 07:13:14', '2020-04-29 07:13:14', 0),
(187, 'WhIXJmvP', 'fbvzwuLjpehFQRU', 'end_user', '7687713982', 'lschrimpf@yahoo.com', '$2y$10$OdmciARURAAQ.dSGWU0YHOc4XNVtmdkKjMMMEZvcrbKwyaP6q491i', NULL, 'pending', NULL, '2020-04-29 07:56:50', '2020-04-29 07:56:50', 0),
(188, 'okOMiQFwNCZxT', 'PVJzdNWmlwOBcq', 'end_user', '9159742911', 'maria.gevorkyan@yahoo.com', '$2y$10$IntE55O/ulBCpMd3mT5NyeUWehA5gYTcu.8hNFVWHgscJtlIdJp72', NULL, 'pending', NULL, '2020-04-29 08:31:57', '2020-04-29 08:31:57', 0),
(189, 'bBfEDWsr', 'BSsITFrYJ', 'end_user', '9990767441', 'leslie_gutierrez_4@yahoo.com', '$2y$10$YPS8un9CALtvnJzFyjJm2ulbURx8nUKw/9UOxDI/YxE/YMkP/ssL6', NULL, 'pending', NULL, '2020-04-29 09:14:47', '2020-04-29 09:14:47', 0),
(190, 'sCLWYXpJve', 'FNMQoAihrUpwnC', 'end_user', '9733615040', 'elenas1999@gmail.com', '$2y$10$a3lIZcKXbvfZSf9XE6kIKedBl2hRAlIl/d5klJx6o1N27x0InnHom', NULL, 'pending', NULL, '2020-04-29 12:01:50', '2020-04-29 12:01:50', 0),
(191, 'xqlJALBIoRfh', 'doyERpBrzvm', 'end_user', '6123713609', 'courtneyolejniczak@yahoo.com', '$2y$10$604vi/NCISYgAqANu3wEfup5xj9zOAAn02.QZVmnnjRIEvOTYDBT.', NULL, 'pending', NULL, '2020-04-29 13:07:14', '2020-04-29 13:07:14', 0),
(192, 'wGBXCFbT', 'XCyckhJbZzKpUOGI', 'end_user', '6504504437', 'ikwakwa@yahoo.com', '$2y$10$mKodS6I/ZL233EHtayN6duQnlxgAVp/vhpvzhm5X7icecNG1iRBzi', NULL, 'pending', NULL, '2020-04-29 18:04:48', '2020-04-29 18:04:48', 0),
(193, 'HoUXPsYwjevaIt', 'vcPpQBSICFJRTye', 'end_user', '5094173012', 'alejandrotellez123@gmail.com', '$2y$10$FqqfK7MN8PKMgw7oUQvqWu4nilspg9mM.dV3OS2/3Q4Oslhwv5eve', NULL, 'pending', NULL, '2020-04-29 21:07:07', '2020-04-29 21:07:07', 0),
(194, 'fgGHMiYZ', 'rHejlGFzp', 'end_user', '9360843170', 'stewart.garrett24@yahoo.com', '$2y$10$BlaruOiv0sMqcsez7cAqa.vt5Yqp4HPHfUd9SLO2fBI5C1sDyWEo2', NULL, 'pending', NULL, '2020-04-29 21:48:59', '2020-04-29 21:48:59', 0),
(195, 'ReDjNhHrG', 'AFgGNhMOxLlmUXY', 'end_user', '8674056796', 'jrjune77@sbcglobal.net', '$2y$10$04cX9qal4Bp0TM4eS6k9X.5Npal8KxWYmYEBmycLdbD5jjHs5Fs9K', NULL, 'pending', NULL, '2020-04-30 00:43:33', '2020-04-30 00:43:33', 0),
(196, 'PcKaYBDwTmLz', 'vWJhixqZFe', 'end_user', '9897287570', 'mpt142@gmail.com', '$2y$10$EMlPSp410z5cDMgvtp5JnORdyD7bXN.4CH7cuHE53iyyCTaMuaxFK', NULL, 'pending', NULL, '2020-04-30 00:45:26', '2020-04-30 00:45:26', 0),
(197, 'mKFWkild', 'QkPEIhzOjsKq', 'end_user', '7386133405', 'caleb.woods13@yahoo.com', '$2y$10$MV1WV3R0tsSTK8mEhjYqBeooTKpEgOjP2bckKKZ3rYP3L2f1SRzEi', NULL, 'pending', NULL, '2020-04-30 08:14:20', '2020-04-30 08:14:20', 0),
(198, 'HeLuYVNg', 'oZxjvHsqI', 'end_user', '3025799562', 'jaimevega116@yahoo.com', '$2y$10$sDbpDHu7AMGwmSDczrneAuy69bBua/JXr9ZWer0L834l12T6e6WuO', NULL, 'pending', NULL, '2020-04-30 08:53:20', '2020-04-30 08:53:20', 0),
(199, 'ZakYCqRFOXGti', 'SxOjXGdBiQ', 'end_user', '5232676151', 'tmcbride408@aol.com', '$2y$10$A8vWiu6QG2vkxEaf.oEpJukcq8VNz8gppYl6X.71L9CfDq7jrp1nm', NULL, 'pending', NULL, '2020-04-30 09:02:24', '2020-04-30 09:02:24', 0),
(200, 'JRVtxnBgSaekb', 'RiSGeouqJhs', 'end_user', '6437733195', 'pdrjimenez@yahoo.com', '$2y$10$CBm06WUBLJyIypc.PBryVe1LJ8u2/PBqII9o7lYWiI.A.50a9NGbO', NULL, 'pending', NULL, '2020-04-30 10:00:19', '2020-04-30 10:00:19', 0),
(201, 'tuSOEVmawFpz', 'xMAVWgoLdpOYTuKi', 'end_user', '5454846093', 'moss80@gmail.com', '$2y$10$fubM4xuVgJtIp08LQOaVGOH6QsEMSCefWTXqhVYTTGYYIkTsYWCHa', NULL, 'pending', NULL, '2020-04-30 11:51:53', '2020-04-30 11:51:53', 0),
(202, 'HMCIolTQmSG', 'mftIyWQi', 'end_user', '3248021209', 'cooljoker90@live.com', '$2y$10$ZOH1FsqIT4q8BbViu3QdsucSO9M.jctYnXlduY3.N4bnTjg8JCMWm', NULL, 'pending', NULL, '2020-04-30 14:03:27', '2020-04-30 14:03:27', 0),
(203, 'DldZAWSmfuNCs', 'wQjByTOh', 'end_user', '8813801876', 'aginther@purdue.edu', '$2y$10$shO2oEpLNeXobhlHDPzGT.dU3tcB97I/6O1dJ66s9yKgHRFo.8onK', NULL, 'pending', NULL, '2020-04-30 17:46:25', '2020-04-30 17:46:25', 0),
(204, 'yixelTWLmGkMZs', 'SdljIHTgARJnx', 'end_user', '5061970070', 'alisonandris@yahoo.com', '$2y$10$HoPfZ1CyFhLMCqKmrnYZPePk0BnKN9dOvjj6GFGoPkFG6vldNuJVG', NULL, 'pending', NULL, '2020-05-01 10:27:50', '2020-05-01 10:27:50', 0),
(205, 'Duc Anh', 'Le', 'driver', '01738995036', 'ziduc10@hotmail.de', '$2y$10$E0RIK/474bN6b1SNudxy8OUy5h1cgHAayUtffGNq5zNOQrvzCo4t.', NULL, 'pending', NULL, '2020-05-01 11:39:03', '2020-05-01 11:39:18', 1),
(206, 'gCNdRqWXIVl', 'SjhOzWwby', 'end_user', '9484975867', 'kgallego93@gmail.com', '$2y$10$p1P2452B9s827Nmw.dqhJON9oGbWHpW41P.z1ciDgbAt07O6.bz/y', NULL, 'pending', NULL, '2020-05-01 15:38:28', '2020-05-01 15:38:28', 0),
(207, 'jNnsXWyYTVQ', 'nzrBHeGNuIFw', 'end_user', '8628717339', 'allykrout@comcast.net', '$2y$10$mXwixVQt6gMZlwRZzfDBZ.GubeaeKsG3ZUk/tkEbxDRugTqwTvcle', NULL, 'pending', NULL, '2020-05-02 21:10:37', '2020-05-02 21:10:37', 0),
(208, 'RWNgItApq', 'NaHbKuEYc', 'end_user', '5609788829', 'cvrunner1@gmail.com', '$2y$10$89XY6BWUEPkHsF.Prtnkce6XBl9FfnvLY26JHzw/.JyUyIc.swXzm', NULL, 'pending', NULL, '2020-05-03 07:56:00', '2020-05-03 07:56:00', 0),
(209, 'GhsqVgrKaX', 'rWfFuPGz', 'end_user', '9236795744', 'tamaskettlewell@yahoo.com', '$2y$10$1EeCjxkWSkyyOXduM6etz.4O9gL0TumKLA9wrF2xV/iv8OHElP3MO', NULL, 'pending', NULL, '2020-05-05 18:20:21', '2020-05-05 18:20:21', 0),
(210, 'eTNqyJQAczx', 'pVDtrIORTXkz', 'end_user', '2816770944', 'cleve.geldart@yahoo.com', '$2y$10$C/d/u4DrDoFAw2sHjHzEqu/LfIlcR3db6EzRndtjho4kgJAapy/.e', NULL, 'pending', NULL, '2020-05-08 08:13:06', '2020-05-08 08:13:06', 0),
(211, 'Zhivko', 'Gochev', 'driver', '+491796139215', 'jigochev@gmail.com', '$2y$10$xX8Fk4y50ShYxlpfFNyNv.kS6iEzKjNvIHdIW8Y50gmKQiPTRk1RS', NULL, 'pending', NULL, '2020-05-12 11:44:27', '2020-05-12 11:44:27', 0),
(212, 'Zhivko', 'Gochev', 'driver', '01796139215', 'jivkogochev@abv.bg', '$2y$10$7yNBEVx7iuAiFS5sh6UK6ekGJv8SJpYIwxkRUdtY9lkLwwgdeeZUm', NULL, 'pending', NULL, '2020-05-13 08:37:16', '2020-05-13 08:38:16', 1),
(213, 'WBjsxdmbEDIgihq', 'WMQDPIcnlAzdFBfE', 'end_user', '3939342446', 'burnet.urban@yahoo.com', '$2y$10$Y/OGX3eewr8exE2k5Qd9ye6mjCtdnvtAvvalBUH87SAHtTFimqtbK', NULL, 'pending', NULL, '2020-05-13 17:07:39', '2020-05-13 17:07:39', 0),
(214, 'XhmuWYLQpNj', 'NeFpOcVXHgwj', 'end_user', '9634995659', 'leonard.reneau@yahoo.com', '$2y$10$e1.dhNC10M1HPDkYGPszR.Evt8G5ZCMKRiWTY/7ZSc8QlESbXMzEu', NULL, 'pending', NULL, '2020-05-16 08:33:33', '2020-05-16 08:33:33', 0),
(215, 'tgQReLJYbilOFPUV', 'iwINEoadDvlUh', 'end_user', '2927619160', 'jed_bamberger@yahoo.com', '$2y$10$iOIgRTxY7/O8C7HlfxeVRutuilPOQHcHE39Il19vQO0NvVlo3hhDC', NULL, 'pending', NULL, '2020-05-16 14:43:06', '2020-05-16 14:43:06', 0),
(216, 'Mubashar Ahmad', 'Noon', 'partner', '0', 'info@mycab-limousine.com', '$2y$10$xA/SkqkSMJK72x0EIFt5TueLnIZ8z0tlY0oorWD.d5WNiKwdtiPIa', NULL, 'pending', 'CD756xffK2T9SQU8H0RH3C3CVupwJWT9gy16fAIWnXIuqWqH065TCPEiqQcT', '2020-05-19 14:30:41', '2020-05-19 14:31:34', 1),
(217, 'viVBxtPSjkAmhaC', 'kqKuLVemOywxS', 'end_user', '3583181754', 'falkner.isham@yahoo.com', '$2y$10$S419MKmJj8Hif98K0zrE9uRtCwUcGKyaUq.D122MLOv/BuMu3K1Wi', NULL, 'pending', NULL, '2020-05-23 06:43:29', '2020-05-23 06:43:29', 0),
(218, 'Lindell', 'Cumes', 'end_user', '+4917662403570', 'lindell.tag@gmail.com', '$2y$10$JXUfewX96vfEWAPwNQ0CYO1urBafJAxHRF/PB8QM8T03.sDp435Sy', NULL, 'pending', 'X8PHYSJQ6TXludNENpp1jHyG4h4Sl2ibOsjtFkTRHI91fDlzIFxomXHjiLKk', '2020-05-24 10:36:45', '2020-05-24 10:38:30', 1),
(219, 'sVXecmqOhyWZzEo', 'gUbNYBSjmysMnKao', 'end_user', '4844183524', 'saul.elli@yahoo.com', '$2y$10$HBclnUr3l6/52aS9BpIPre4M0plJxGcMQRzpZa53Noor36qjN5EWq', NULL, 'pending', NULL, '2020-05-25 20:28:23', '2020-05-25 20:28:23', 0),
(220, 'vCdHskiXeAbGypn', 'HgtJCwQNzYh', 'end_user', '3956101971', 'calhounspencer66@yahoo.com', '$2y$10$XBwj1qFsjg/LZ2gJhAp.uO2Ywmn0A27iK0N1zAslC/fCrn.KcCW.a', NULL, 'pending', NULL, '2020-05-27 22:48:04', '2020-05-27 22:48:04', 0),
(221, 'Julian', 'Diers', 'end_user', '01778913093', 'jdiers@gmx.de', '$2y$10$9jwpITsCs2sMEMvQEjAJCe8TT5Avep.A9nf0wah.51qdRvrWfgYda', NULL, 'pending', NULL, '2020-06-02 10:34:28', '2020-06-02 10:35:26', 1),
(222, 'VJiaqeZC', 'YoXKuasFDlkpvxBS', 'end_user', '3714083701', 'emma6239wri@gmail.com', '$2y$10$Ug8Qi/ZvyX7qQtOwgyD2m.Z8CYIxzziYO.GkLVAxJ5bDeTTqRrwqi', NULL, 'pending', NULL, '2020-06-03 17:48:10', '2020-06-03 17:48:10', 0),
(223, 'ujLYiEgtUwGsyKO', 'HISnafXKqJtQBm', 'end_user', '4390592840', 'banu.jai@gmail.com', '$2y$10$6q8vSR/REwyDCBzlUnR8jeurZxVmM/6EiftJHRKxVxm.Apf3Fw3yu', NULL, 'pending', NULL, '2020-06-03 20:01:01', '2020-06-03 20:01:01', 0),
(224, 'GTeLshtrmVBxHaPf', 'zLsoRuavUYAIB', 'end_user', '2189684169', 'lily4293wil@gmail.com', '$2y$10$ufpWoH0821mRuePLAF.g/.D7LzLDTuZk0brP9/yNweAv9eJymBFR2', NULL, 'pending', NULL, '2020-06-04 14:14:48', '2020-06-04 14:14:48', 0),
(225, 'jYnDAslZxuCMgvG', 'LtqFeWMbhxnYGZ', 'end_user', '7612357601', 'barbaraleehill@gmail.com', '$2y$10$MI.DkmipLJFp9gxGVX8W9OKAr/Zv8cA6zX51IaQiFgBT5ZF/8eUVu', NULL, 'pending', NULL, '2020-06-04 15:34:48', '2020-06-04 15:34:48', 0),
(226, 'TGDjwpPyUFoEbxJC', 'JYqefObpUCQxrKc', 'end_user', '2537573764', 'samran_92@hotmail.com', '$2y$10$jIC7xMiAksAqpWBnoTRlmuNiui77wpptyxqLde4gU.EEN9qezi2YW', NULL, 'pending', NULL, '2020-06-04 20:06:40', '2020-06-04 20:06:40', 0),
(227, 'ndIAUERxNaXFC', 'FdfxWHhcs', 'end_user', '8626983399', 'hamine13@hotmail.com', '$2y$10$xxPENthpC1mzuBXe7sEyV.4r66O8jW70P7K5FRDSeUR3sOGqgKFMW', NULL, 'pending', NULL, '2020-06-04 20:35:47', '2020-06-04 20:35:47', 0),
(228, 'KDYjrdepyOnFQWIB', 'APqRuKxfTJwD', 'end_user', '2327226623', 'mobo748@nyc.rr.com', '$2y$10$ku4cDZsIaM9d7OU/SkaihO/SXXUify5nxUpmIydBLByL6hwQDFcca', NULL, 'pending', NULL, '2020-06-04 22:12:10', '2020-06-04 22:12:10', 0),
(229, 'oUtvLylu', 'mcXGrRwLgsiMjAb', 'end_user', '4382568531', 'juscelph@gmail.com', '$2y$10$tt7s9jhcHJMtdFxYDnGyPO3IyDV5SXAQUfNuybWSZ3LyXAMrzeZ8S', NULL, 'pending', NULL, '2020-06-04 23:06:48', '2020-06-04 23:06:48', 0),
(230, 'JEvXwRahukLG', 'LpBWEcibxgz', 'end_user', '6278223504', 'jared.foster@tierpoint.com', '$2y$10$mqRjtH2KSQBKX94sxa/cgu97gOAri5FwXn1d2HCZveE3w7FQtxlji', NULL, 'pending', NULL, '2020-06-05 04:09:47', '2020-06-05 04:09:47', 0),
(231, 'NlvBFbsdnpyAa', 'gkDbzqJWEf', 'end_user', '8599172101', 'amandajewel@gmail.com', '$2y$10$wi/ipyNBrKVOULTCj7K2Eu75A1pBc1Wt2N1aU8aXQfbM.WM.7VJoa', NULL, 'pending', NULL, '2020-06-05 11:14:56', '2020-06-05 11:14:56', 0),
(232, 'ajDfMCkV', 'JGrMjSxbmgA', 'end_user', '3361409984', 'valepatinot@hotmail.com', '$2y$10$shL9YZlY0LMRPSDtmZhuYOr4FlrCXt4bMHjjgy6Y1Im8QtG2xx7pa', NULL, 'pending', NULL, '2020-06-05 18:32:21', '2020-06-05 18:32:21', 0),
(233, 'nVWKUahJEpjzHNgi', 'dQIRBkfnVgUGa', 'end_user', '5358685045', 'joshuasanchez08@icloud.com', '$2y$10$3otRnMVSZC3BykS2HDb9Fe/HmtExK77eMKi6mgEjL.Uls4m4UIiAK', NULL, 'pending', NULL, '2020-06-05 19:21:33', '2020-06-05 19:21:33', 0),
(234, 'yMjPabcH', 'CtxWFenRsrkIzNfD', 'end_user', '3639215504', 'tmrichardsusa@gmail.com', '$2y$10$Zt/1Z1y9y2s.DD/4jtp8nui6c6yew5NKCfSn1Fn9sUjwqFJr9ldfK', NULL, 'pending', NULL, '2020-06-05 20:00:33', '2020-06-05 20:00:33', 0),
(235, 'IPvODongfqwyBmRa', 'XdMlWagEIYmi', 'end_user', '5325955319', 'timmyzalm@hotmail.com', '$2y$10$fFJixrx4LXGrF1DB2V6mYuBY7aXyVjGX1TSs8UWGg3kqBJDkDUqFO', NULL, 'pending', NULL, '2020-06-06 01:47:15', '2020-06-06 01:47:15', 0),
(236, 'IExNAjvmCVhZuQ', 'RplwCDfuK', 'end_user', '9871883770', 'edith8641smi@gmail.com', '$2y$10$w35wsl5NR9w1Rekm4DL75OLgiYoOMHhBNhjICviaeS5RlYR0QGxY2', NULL, 'pending', NULL, '2020-06-06 22:27:27', '2020-06-06 22:27:27', 0),
(237, 'BvjbDxeam', 'YxXVdKyDIu', 'end_user', '3929406400', 'stephenm.johnson@netzero.com', '$2y$10$ETlfLBDpg5MZ/m8uY988kepa3W85XIJXZzmWw/pULdz6YwvUzaDre', NULL, 'pending', NULL, '2020-06-07 05:32:49', '2020-06-07 05:32:49', 0),
(238, 'Charly', 'Göhl', 'end_user', '(+49)  177 323 96 40', 'cg@cmed.de', '$2y$10$Two0TvNrO6A6vVP.bZcLsuZ56AS5rbpov3HdJ7wUVB0KXhx5ug5p6', NULL, 'pending', NULL, '2020-06-07 13:31:13', '2020-06-07 13:32:18', 1),
(239, 'Michael', 'Dallas', 'driver', '+49(0)17676627472', 'dallasm5@gmail.com', '$2y$10$gz3XJZHvQlm0OZPo4t.7we0svPVbhDg2izsWY8hfTyGBTAKYyuliO', NULL, 'pending', NULL, '2020-06-07 14:32:51', '2020-06-07 14:33:33', 1),
(240, 'DNBAiCVcvhkem', 'NnWFcsriCqft', 'end_user', '4209161704', 'djmiller@ucsd.edu', '$2y$10$57.aSYr06ma3xvFsbfHxcOAS3NvqFYhWyDcQah9Ha3urTymjY/Dlm', NULL, 'pending', NULL, '2020-06-07 23:11:57', '2020-06-07 23:11:57', 0),
(241, 'nojxauqwi', 'RtBLcuPNIDzKaH', 'end_user', '7110575862', 'npfinnen65@gmail.com', '$2y$10$HYKtZWMAGEiFCf5DD1WzW.lc7uyWuY6tCc8fAbe9DVP0mUYiTmAtm', NULL, 'pending', NULL, '2020-06-08 07:01:50', '2020-06-08 07:01:50', 0),
(242, 'CHsrnpVKx', 'UWQxZYbsiBwlyp', 'end_user', '7580887972', 'sumitbaratarey@gmail.com', '$2y$10$B5UEWJ4xwTmiE2TL0QhSXuHdOJhFNm7I08y.lKtudHnomajAY44KC', NULL, 'pending', NULL, '2020-06-08 17:55:40', '2020-06-08 17:55:40', 0),
(243, 'roOpQkIlwqfKT', 'hdCUwexafmG', 'end_user', '7599832791', 'nicolasricci92@gmail.com', '$2y$10$ncLDz9.HMABxsGlbaqbEFuHz7Uy5qec98iAds4nArJYGjssXtCOs2', NULL, 'pending', NULL, '2020-06-09 04:51:47', '2020-06-09 04:51:47', 0),
(244, 'lgKdQkeYaGbRyX', 'ZHNjFwCQS', 'end_user', '3707374618', 'gatewoodbarrie@yahoo.com', '$2y$10$.Yy7csJ4hHDpQaBZsMm3R.Q.AW/xgAgP5yGNBYyxGIZOAgWBd9YZ6', NULL, 'pending', NULL, '2020-06-09 15:03:44', '2020-06-09 15:03:44', 0),
(245, 'VDowbavTOMK', 'XJSwypquciNn', 'end_user', '7007895467', 'asuharsono@gmail.com', '$2y$10$/WlcoESL6ToT/ID3TuPv/e8DQu5zRqKEHJxpyghmUpzki0S2yaikq', NULL, 'pending', NULL, '2020-06-10 09:34:32', '2020-06-10 09:34:32', 0),
(246, 'CKhMgYorEs', 'SLZHupTN', 'end_user', '9098585838', 'statesj@prodigy.net', '$2y$10$fb1jCb31wzH0TYc3LXEx9e2q22mbcukczrEU5y4F0DXEf9M9NavW.', NULL, 'pending', NULL, '2020-06-10 16:34:39', '2020-06-10 16:34:39', 0),
(247, 'wiPnDaFY', 'tsJnkMLXuNChU', 'end_user', '6551418962', 'smcelhan@hotmail.com', '$2y$10$iruTFAj7XEnniW1IFJWfUuC6JY6aS0R0u2gimz623MJPs9HgA0NDy', NULL, 'pending', NULL, '2020-06-10 22:43:43', '2020-06-10 22:43:43', 0),
(248, 'nhpzceDmZ', 'SOUQJxwIzvun', 'end_user', '5439104345', 'ericbrown1929@gmail.com', '$2y$10$xEz0KXPjWHx.QXh1qVaWa.28nI6DP2m72UmIgpYquxRvWwcp2N5Mq', NULL, 'pending', NULL, '2020-06-11 04:21:57', '2020-06-11 04:21:57', 0),
(249, 'CvolRnwSWbgzQ', 'YCicmFWQevBN', 'end_user', '8389998423', 'brandonlee0331@gmail.com', '$2y$10$.DuPQ8C7k3RX8ntd0ydjhOYb9r.QBSYiozQL.syk6vxjXJYWTkLfy', NULL, 'pending', NULL, '2020-06-11 13:32:49', '2020-06-11 13:32:49', 0),
(250, 'NGKmlQRIUwJqeyF', 'QCxZVSaLN', 'end_user', '8274273484', 'diaz2202@comcast.net', '$2y$10$aFditQvDQ5AXJwKswFTG7OSKQDWTuPvxrO8DHQ4Kfzg9EqlNgujc2', NULL, 'pending', NULL, '2020-06-11 14:13:40', '2020-06-11 14:13:40', 0),
(251, 'VmdkeboOHptzCSQN', 'itfoYvRM', 'end_user', '9251430061', 'krechcigl@gmail.com', '$2y$10$6ZJPYxKiwv8NGLL9uyQK4O06Ni9YYHPPlL0c/kIe.O6dtOOuAph2y', NULL, 'pending', NULL, '2020-06-11 14:40:41', '2020-06-11 14:40:41', 0),
(252, 'aEPckUjJRo', 'SZkiInAhjYGWTE', 'end_user', '7663678997', 'johnsingleton521@gmail.com', '$2y$10$HDgGkhME9VuaaoeXdOHt9O2DxiVNTPPVf.YmIc21itkLC.3ms59S2', NULL, 'pending', NULL, '2020-06-11 20:05:48', '2020-06-11 20:05:48', 0),
(253, 'okReCNcv', 'JSVzpork', 'end_user', '9360033179', 'johncampbell8015@gmail.com', '$2y$10$de3JAa8bew/2cj2sf7BF9u9fgmRmZHLqjjzGQkKNQ1eIoQJXUwcbi', NULL, 'pending', NULL, '2020-06-11 21:22:37', '2020-06-11 21:22:37', 0),
(254, 'nMKEWRwSIbFXdA', 'iOfDhuUoNFgn', 'end_user', '3721173874', 'kbaker317@me.com', '$2y$10$cwTnFY8V2x0ngG1XJDg/DedfnVujj0eUF0S/3nqHdBP0n66is1zry', NULL, 'pending', NULL, '2020-06-11 22:15:24', '2020-06-11 22:15:24', 0),
(255, 'DAknBGMeIJVbsqf', 'IwejincEv', 'end_user', '8969420944', 'ryasskin13@gmail.com', '$2y$10$H2ajlEAOaY64N9CHP/YIa.Ex2wKgKC7ZyF68BKPfWfpOY.323.rJO', NULL, 'pending', NULL, '2020-06-11 22:55:21', '2020-06-11 22:55:21', 0),
(256, 'oaqEdCDQIt', 'nevdoEapsBf', 'end_user', '5511190229', 'sylaous@gmail.com', '$2y$10$O.pbSUn9v5jc8imnN/C3JO.zqJ.EGhUSfcCKpcWC1dLj1nSokrmiq', NULL, 'pending', NULL, '2020-06-11 23:10:01', '2020-06-11 23:10:01', 0),
(257, 'DvrUPzGHRCfhyK', 'EOXIhQFl', 'end_user', '2033944414', 'abysweets@gmail.com', '$2y$10$kVf3qQyACkplqrSpGc0Esu6guVVi0CiA11FWyHmEOdXVKqVpS1l32', NULL, 'pending', NULL, '2020-06-12 10:39:48', '2020-06-12 10:39:48', 0),
(258, 'KOvsHSACznTPRrZt', 'czvZSVxFENOeyra', 'end_user', '6151277145', 'siwardbow@yahoo.com', '$2y$10$7kyLM9ALeqECF9U6rTwBw.0Bomt87InLpP/KrkdTeTVgWcY89QTTG', NULL, 'pending', NULL, '2020-06-12 18:12:55', '2020-06-12 18:12:55', 0),
(259, 'jzIEqnhAWbyFD', 'GrCLbDEeUjvqQSM', 'end_user', '2520798582', 'briannaguevara10@gmail.com', '$2y$10$JT66I82hJMV9jrACX6fDZu1jrb9hYi6PSA8zSvj/tvWNS8G0CrpMO', NULL, 'pending', NULL, '2020-06-12 22:34:36', '2020-06-12 22:34:36', 0),
(260, 'ulksrRLWBNZKyG', 'bvjSXFqxnD', 'end_user', '2657482396', 'noah.flach@gmail.com', '$2y$10$GhSHjf2lpiG4czTF7VNGh.ptHYPeOoYqH/9zHNXE4N1VJoxodGKOK', NULL, 'pending', NULL, '2020-06-13 02:32:39', '2020-06-13 02:32:39', 0),
(261, 'Eliana', 'Thompson', 'end_user', '+49015153609041', 'elianathompson17@gmail.com', '$2y$10$UWkEYSM01X1wsIRUdNhYqu4e1nE5KKCIjK//I4F/zibPfGhfuLL/q', NULL, 'pending', NULL, '2020-06-13 15:24:39', '2020-06-13 15:24:39', 0),
(262, 'yeluCLVXjah', 'ZqGNYWzIPatf', 'end_user', '7587891403', 'debholland57@gmail.com', '$2y$10$zJUv9zfaFcFWuUMvEnf36Obh/J8/RLZXBmMxd7qXk7iO3my4DSiIy', NULL, 'pending', NULL, '2020-06-13 23:02:07', '2020-06-13 23:02:07', 0),
(263, 'KMZGTkuFC', 'gDbcpQlLVeavHdXJ', 'end_user', '7210350649', 'battiegiffard@yahoo.com', '$2y$10$Cmpvitd9lk4yFDIwpZkAA.Et6TVoL8r3zD3baQTODlxGrHUd919H2', NULL, 'pending', NULL, '2020-06-13 23:20:48', '2020-06-13 23:20:48', 0),
(264, 'hZkiPafTIjpNxbmo', 'NUTpAmonWc', 'end_user', '4871723085', 'erynjoyce@gmail.com', '$2y$10$KnY/FHWkNUEev8/QYIn4oul02hAt0Wxgw2djWw1d5Xs2JwFIq2reO', NULL, 'pending', NULL, '2020-06-15 18:05:26', '2020-06-15 18:05:26', 0),
(265, 'hUFdrCbanjNQPVf', 'BTNdShMrxkpgPEbX', 'end_user', '5618598174', 'mefretland@gmail.com', '$2y$10$Q0uXOXSTnhTKvDXgkl4u9OC80nv4JUa2.gdYsguwzT4ny699kf8a6', NULL, 'pending', NULL, '2020-06-15 20:15:19', '2020-06-15 20:15:19', 0),
(266, 'MUzErYJFw', 'vlWGuECcUTjLMIsS', 'end_user', '5525831890', 'stephanie_curtis@me.com', '$2y$10$TYcon2tNXtPA2EgosmPzuu4NkH9tkPPbctS29mLaTAbkYPTq8PQ7m', NULL, 'pending', NULL, '2020-06-15 22:08:36', '2020-06-15 22:08:36', 0),
(267, 'NZpuKiITYebUw', 'DgqOLSjHTrwf', 'end_user', '4869302393', 'sheuss@sandi.net', '$2y$10$4tHwmGlwXYjawveK3WKIie/fLXY4YlzbhSffdAATpgU9RPmZdSTH2', NULL, 'pending', NULL, '2020-06-15 22:10:52', '2020-06-15 22:10:52', 0),
(268, 'hwtOURlrSI', 'SHXbymJor', 'end_user', '9675420426', 'dearmrreina@gmail.com', '$2y$10$Pz9gt14xiMbz6KtrPkAPJ.Rk794DW/j7xIhWGpegIVcfDvdbcJTO6', NULL, 'pending', NULL, '2020-06-16 07:01:30', '2020-06-16 07:01:30', 0),
(269, 'EyrgRvlUPoMS', 'fHtdRLUOBow', 'end_user', '4221114836', 'susanklaw76@gmail.com', '$2y$10$2xAgIoglpGmMgtEk5FDGNekVTLOrwK.JQiF/tI7QMlgvU9PcxHjmO', NULL, 'pending', NULL, '2020-06-16 09:23:58', '2020-06-16 09:23:58', 0),
(270, 'TfdwWIoPVEClGry', 'ToLPhXsaZMDvgzQJ', 'end_user', '9573752846', 'bro.darushah@gmail.com', '$2y$10$R5w7xjrHl/T/6trx0Cem0.0/2T9QUe0j045ETxzc0cRUvTBsz4XMe', NULL, 'pending', NULL, '2020-06-16 11:48:04', '2020-06-16 11:48:04', 0),
(271, 'AwEyOqBvWzdCR', 'gZpEfFCkSOibhdxm', 'end_user', '9176929813', 'glbertmary9@gmail.com', '$2y$10$1AhIhOkP/hdT8aQfP7gF2uSRswgOsjdIbWIuC/YFk0JeFa6dBmjnO', NULL, 'pending', NULL, '2020-06-17 01:23:40', '2020-06-17 01:23:40', 0),
(272, 'TrHaobduCBqwY', 'cEhOJQtKHr', 'end_user', '5109695454', 'patchaffin@ix.netcom.com', '$2y$10$ZYd.DiE24EQ8O1v5V4jjh.aIR8u1cY4HVLaTIrSPWFb1OSr7XAK4i', NULL, 'pending', NULL, '2020-06-17 05:18:12', '2020-06-17 05:18:12', 0),
(273, 'EWMTfILNigvFDGZe', 'FKmgaOHQZUPqikN', 'end_user', '5068688270', 'teri@cnetpro.com', '$2y$10$pZfJzD9dEagTVzMAnUXIceeSaKsA1pmfYop9n1P7YhChGid3WIw9a', NULL, 'pending', NULL, '2020-06-17 08:27:30', '2020-06-17 08:27:30', 0),
(274, 'pVQzhmHwZo', 'SfElrgUhN', 'end_user', '2815261535', 'timpetryk95@gmail.com', '$2y$10$i5qAA9dm2gcC4JdthCxPkuL4e4u1U2Enc6308Onnko0hvfCivTd4i', NULL, 'pending', NULL, '2020-06-17 09:18:13', '2020-06-17 09:18:13', 0),
(275, 'wAUBfdNnIms', 'voqgrmMUpR', 'end_user', '5497427581', 'metorman8@gmail.com', '$2y$10$JShoheFzrv6w0riHUBMtv.G1OmI/xyAAk6znBa0c2vykPIZPRP6li', NULL, 'pending', NULL, '2020-06-17 14:02:19', '2020-06-17 14:02:19', 0),
(276, 'iNGZXFBanHpEA', 'poYFRudJCGAQ', 'end_user', '3884074464', 'hco24@icloud.com', '$2y$10$JnCcGJToWTQfe0E6grOZXeFycvU6ccLX6MtPwF/j9qq9Uxnvgu6fW', NULL, 'pending', NULL, '2020-06-17 17:33:09', '2020-06-17 17:33:09', 0),
(277, 'PhWYdwVGrOIB', 'oRiITYkEMaS', 'end_user', '4019668955', '332522459@qq.com', '$2y$10$SEu2bCyXdEXh.FC5DKHCa.rx.ce62Ka6tBfF2UzAQWTt3T8QD3zxW', NULL, 'pending', NULL, '2020-06-18 01:34:58', '2020-06-18 01:34:58', 0),
(278, 'qAQaRxyjl', 'WMZNuDSgLqTnwyG', 'end_user', '3872784598', 'dana.ebel5913@gmail.com', '$2y$10$FJM55W8WTHDgBxlQHVwNZuX1uOcZUEIWix0EjmyEDBj8bi55.6G4W', NULL, 'pending', NULL, '2020-06-18 11:11:01', '2020-06-18 11:11:01', 0),
(279, 'FPGYUalDHcTb', 'ZEqopeGBsTNi', 'end_user', '7193956145', 'marcelinajackson9@hotmail.com', '$2y$10$PQfYt78Cfqt/8AAYNlC5Jee9r7OV4djW9aUE9Lz3FO6lC26OQXQSK', NULL, 'pending', NULL, '2020-06-18 15:55:26', '2020-06-18 15:55:26', 0),
(280, 'toxXJpKHAmwSfj', 'RvIMxqGQUdwsgkV', 'end_user', '4764754431', 'bjhjmcmurray@gmail.com', '$2y$10$hyFGqnZ8pezcDQe2/jlbyezG6tP5UBhohF5d2JldhLSEvkdb.qj..', NULL, 'pending', NULL, '2020-06-18 23:37:26', '2020-06-18 23:37:26', 0),
(281, 'FeZJyNmu', 'dtQClgznyrvRFJwe', 'end_user', '6621479389', 'val.garibay15@gmail.com', '$2y$10$zWHBRiu5VOGvM0b.dopCgusaXlVDp44hRZQqxMjTy39e2KbWdNBci', NULL, 'pending', NULL, '2020-06-19 02:29:20', '2020-06-19 02:29:20', 0),
(282, 'PwSYtMZCquOV', 'ruYqasEwRSFcj', 'end_user', '8628453425', 'anmarobi@gmail.com', '$2y$10$HqTjxqu0er2Bo/VIdxIDk.XskyW4BCSzQcw8uklNfFlDrD6Ro4UE6', NULL, 'pending', NULL, '2020-06-19 11:24:21', '2020-06-19 11:24:21', 0),
(283, 'bAxKcMPqYwE', 'hJoYvrGDljqVAMR', 'end_user', '6436771863', 'jacksonramseyhall@icloud.com', '$2y$10$NxpfrM6k1hohMN7wyjgaweL.bKMuiniVFVXiL/L2oAGzSbQUgEWgG', NULL, 'pending', NULL, '2020-06-19 11:56:29', '2020-06-19 11:56:29', 0),
(284, 'ywoQvGfUpEM', 'OuJNQwxpUPlEbA', 'end_user', '9916430290', 'deborahandnicholas@charter.net', '$2y$10$F9IfgmRoHfm1XSO59Q/EjeWWTBYHqcqwcG5JtSaE5LF0xP91ubJBG', NULL, 'pending', NULL, '2020-06-19 18:18:03', '2020-06-19 18:18:03', 0),
(285, 'MZkvRsIHTUfSd', 'SpVTyPcQueGxnzU', 'end_user', '5880992051', 'jrecchio1@twcny.rr.com', '$2y$10$kZFB/f54PBbND4IG0o.fI.yy5skgTcM6KHon7HCh/EDXJ8K4XM/Gu', NULL, 'pending', NULL, '2020-06-19 21:22:02', '2020-06-19 21:22:02', 0),
(286, 'jTDZLJFlgsov', 'DvgPebOcmwAk', 'end_user', '8724465607', 'casual100st@gmail.com', '$2y$10$a2ACGBidMAUDHxpvjBzzKejQMGhLLltgKhm/A8E09ltpJ9Ld/I9Ve', NULL, 'pending', NULL, '2020-06-20 05:46:25', '2020-06-20 05:46:25', 0),
(287, 'bhcuKniNqJrBDgUI', 'HuGrVLtTl', 'end_user', '3687948604', 'michael.n.sabio@icloud.com', '$2y$10$XSudPxVMpUtR.FoSemMrAuuMTjZVZeI7hyiXEwm5m1R8I2xu48CDC', NULL, 'pending', NULL, '2020-06-20 11:32:34', '2020-06-20 11:32:34', 0),
(288, 'jsUQTDvtGfXbB', 'ztuabxXVFGBZLMPj', 'end_user', '2458043286', 'rickey.mott@yahoo.com', '$2y$10$CKZrtdcPcxplah57tbULIOdi4iMmNCHrdrkBIlMPeE1rOoDaXN9oy', NULL, 'pending', NULL, '2020-06-20 19:54:15', '2020-06-20 19:54:15', 0),
(289, 'QdbnMYLjhas', 'YEysQBtj', 'end_user', '7389448952', 'chandlercranston@yahoo.com', '$2y$10$N4RYrBU1H/FSHi.K8trE0urkZnLiD1.5yETiSDoq2H7cbOD3Kurku', NULL, 'pending', NULL, '2020-06-21 17:06:16', '2020-06-21 17:06:16', 0),
(290, 'vQnfDqdcRmH', 'nbqLIiPyjkSz', 'end_user', '9414374680', 'norby.bradstreet@yahoo.com', '$2y$10$spemdCINUd/zflk1zziGS.9/j2SHhY6qeMSc43hnAI9G0oAMzPIQC', NULL, 'pending', NULL, '2020-06-23 09:02:42', '2020-06-23 09:02:42', 0),
(291, 'yUujCOkdDiEBMb', 'UvqmCeBGJFbHi', 'end_user', '4233561195', 'orlan.convery@yahoo.com', '$2y$10$FFgIFoCyvEweELXuKldDiuBOUw56MV5y9J5D/2rYYr5hPUHzI.GBa', NULL, 'pending', NULL, '2020-06-25 23:46:45', '2020-06-25 23:46:45', 0),
(292, 'VXCMFBRdDLQxyI', 'VReMzpdr', 'end_user', '3785675838', 'grover_somerford@yahoo.com', '$2y$10$n5QuymHyai0XxEJKaz6BCOPUUca670If2BWDh3bsiqyO7cRBNqBVK', NULL, 'pending', NULL, '2020-06-29 22:53:32', '2020-06-29 22:53:32', 0),
(293, 'zeshan', 'shah', 'driver', '01777589551', 'shah_zeshan@hotmail.com', '$2y$10$3rypsm22oN6LedYjIsjUeu0iB6ymNYBlnnlX3Qmn0Ebo1gimpEDji', NULL, 'pending', 'mt0vIaKT84cD5DoNRCnI8sgIyG6mgQ9bICrPcuhJokPYCaFPcSiICutDONJI', '2020-07-02 12:55:41', '2020-07-02 12:56:09', 1),
(294, 'uiHGMaRb', 'mfvGHnPXgo', 'end_user', '2071590147', 'fowlkes_drugi@yahoo.com', '$2y$10$8g72PTM2vErvDjqV9suim.MSSbIcfMiFnFwjyZ100UdlUoYyEKqDC', NULL, 'pending', NULL, '2020-07-04 23:49:36', '2020-07-04 23:49:36', 0),
(295, 'Michael', 'Baier', 'end_user', '015170167443', 'michael.baier@jsafrasarasin.com', '$2y$10$w6krKneH/C.xk1p36XmCMOkwj7fgrG/I8bNE0414.KlrGqoFdKReC', NULL, 'pending', NULL, '2020-07-06 07:30:55', '2020-07-06 07:31:10', 1),
(296, 'Mohamed', 'Kaddouri', 'partner', '+491632594491', 'yarasel@hotmail.de', '$2y$10$kjiWOsSNmI.ZyRrp0lfhbOSwZEJY.mvuO3DPt2AahodwJXy0YEQk2', NULL, 'pending', NULL, '2020-07-06 16:04:00', '2020-07-06 16:04:00', 0),
(297, 'oEwvYcMXArNSDb', 'erjsIRfELBVpvKyX', 'end_user', '4265759197', 'denis_neilsonterry@yahoo.com', '$2y$10$.NHzWCBt.66x0dIuQDHr6eOKq/J1X6chB9i8409oFMz03tZ7QsRku', NULL, 'pending', NULL, '2020-07-08 03:41:44', '2020-07-08 03:41:44', 0);
INSERT INTO `users` (`id`, `first_name`, `last_name`, `user_type`, `phone_number`, `email`, `password`, `creator_id`, `status`, `remember_token`, `created_at`, `updated_at`, `verified`) VALUES
(298, 'Shehryar', 'Khalid', 'end_user', '017660891423', 'shehryarkhalid@outlook.com', '$2y$10$40URsDfhOn.Q8pOBll5UtuwTRWUTJvNpldYhJYxEn/xj4KdMiwI1y', NULL, 'pending', 'HLscZDTw6qgdb3669UERunhhl6gsxZsYANmcetiT9iui0r33YVHevDxq7MdX', '2020-07-09 19:50:55', '2020-07-09 20:11:21', 1),
(299, 'Timm', 'Radermacher', 'end_user', '+4917670486359', 'timm.radermacher@outlook.com', '$2y$10$CK1FBueTGkmfJRX8niVGxuZ51kIskuFHVjXlCfP/FC5gyIUvKkRBe', NULL, 'pending', NULL, '2020-07-11 11:51:21', '2020-07-11 11:51:36', 1),
(300, 'OZvkGfJPuYaCF', 'gjpIsBOP', 'end_user', '9894870082', 'peterbailey6524@gmail.com', '$2y$10$fZfU2LpMCkjOx7scNO/reeLYydMhKbF31B8kXwG1OspnpSquFoYiq', NULL, 'pending', NULL, '2020-07-12 00:33:01', '2020-07-12 00:33:01', 0),
(301, 'XHaZTDhYszLgQEMb', 'MCUBcWZqQFDKsrIh', 'end_user', '2974852335', 'clesstrom@msn.com', '$2y$10$G8KszQHaFQ3.F3zfnNnUHeO8HW2ifrHKO368vn9B3mXwJrRmfaQpi', NULL, 'pending', NULL, '2020-07-12 16:56:38', '2020-07-12 16:56:38', 0),
(302, 'pRjuzUsM', 'JgREuVpQye', 'end_user', '2621410505', 'kklrichie@gmail.com', '$2y$10$lPx92Dgftfsrophkk14Zt.u.ZSMA/CCkuz8nB1q7I5de8R0DHJVqm', NULL, 'pending', NULL, '2020-07-13 09:51:06', '2020-07-13 09:51:06', 0),
(303, 'vkRdVBXt', 'fIWtzdXJ', 'end_user', '4771192172', 'kgozzo671@gmail.com', '$2y$10$u0YtMttRh5wWAxJlHlI6tOkv.WVw0RjKG12mG0F.9MhyFG3BR0smC', NULL, 'pending', NULL, '2020-07-13 16:01:31', '2020-07-13 16:01:31', 0),
(304, 'tUnxSRiWEhdDyT', 'pXUdZIYtJSrGvz', 'end_user', '8629684057', 'etrudeau001@gmail.com', '$2y$10$YxWmD6fj8SLBO4cp3yGAbOlw37IY7Yxz2vvMmvvxMe/oX9/S8JAmO', NULL, 'pending', NULL, '2020-07-13 18:14:29', '2020-07-13 18:14:29', 0),
(305, 'ErYuBsqn', 'bhFxwiDV', 'end_user', '5974210189', 'harbawaad@gmail.com', '$2y$10$Tn6Zzl.QYEx9Y9GqFdI8beTYm.6.HIYJwTEyMQQurtLqsMRh7f1MC', NULL, 'pending', NULL, '2020-07-13 19:11:44', '2020-07-13 19:11:44', 0),
(306, 'hVueHpjyw', 'MLtVywhCkn', 'end_user', '9983821420', 'kaliquedoyle@gmail.com', '$2y$10$4nSCHqfOehHKZ/07qRvDpONRnoiBU0D4NA1Oh520VGrHdIyGhPrDq', NULL, 'pending', NULL, '2020-07-13 20:07:47', '2020-07-13 20:07:47', 0),
(307, 'NEfmFMawGCLBhn', 'qwePVsnyLmupEMao', 'end_user', '7705044916', 'ryanwright15@gmail.com', '$2y$10$y7Hkaa9OQavSOIJYJm7.EeCuZ0IbZet..R3XB3QuINOD5DoSFWGdi', NULL, 'pending', NULL, '2020-07-13 23:41:54', '2020-07-13 23:41:54', 0),
(308, 'JNEahZkGKuvpztX', 'qLCXQpNzrWfiaRu', 'end_user', '5770404134', 'kentaroiwasaki@gmail.com', '$2y$10$e8xwi4r2RV05JgiZNVsEzOU9Spw3mpuzkCEeckh7s4fSlycQxkgAa', NULL, 'pending', NULL, '2020-07-13 23:59:31', '2020-07-13 23:59:31', 0),
(309, 'DngmtwYrXsvyBqhE', 'EWznRIwbNtadcQj', 'end_user', '7376565113', 'jbojar@gmail.com', '$2y$10$A6nbOOzfwuz4ZjyfG5Mw7u.O0/0CPa/Q98p7.chb4x/1Fe5VxAFiC', NULL, 'pending', NULL, '2020-07-14 04:40:46', '2020-07-14 04:40:46', 0),
(310, 'mKhtOdvyzfiFXYqG', 'OpuwKxvCmdcMrBN', 'end_user', '9822026957', 'zakariassiewierski@gmail.com', '$2y$10$7SXSEEjV5A/Qxw3oxjcshO2sLG8/i4hAoZU.yzaCS1FRVMSq7jVQ2', NULL, 'pending', NULL, '2020-07-14 07:54:38', '2020-07-14 07:54:38', 0),
(311, 'qOXFPghcfmb', 'GASwtYrqhdx', 'end_user', '2449466795', 'jmillerforreal@gmail.com', '$2y$10$FjT9kd6YJO48XaWxzMQvP.9opMrdVEmPUnOFOMg8voszMt8gMLYwe', NULL, 'pending', NULL, '2020-07-14 08:11:51', '2020-07-14 08:11:51', 0),
(312, 'zBbaYVZXlIhgSc', 'yHvFoDgn', 'end_user', '3105302368', 'brandonfigueroa22@gmail.com', '$2y$10$SyEQMaGvrm18sK8rZuY/2OSmfT.5xHukKCglHEbhFdRSXq4sTF11.', NULL, 'pending', NULL, '2020-07-14 09:27:50', '2020-07-14 09:27:50', 0),
(313, 'fDBtUIsHryoniAaM', 'zjxwtFXobuHRykm', 'end_user', '9883176358', 'rymanning@gmail.com', '$2y$10$tJcsf/Mi1fpznXcbZBdwIunhiyhwWocmqctQT/tvKNgfFnSLy.cUO', NULL, 'pending', NULL, '2020-07-14 10:19:20', '2020-07-14 10:19:20', 0),
(314, 'oAGRLnIqjBkHPxC', 'xporOdqjPUTnDA', 'end_user', '3286480845', 'jis42081@gmail.com', '$2y$10$1lM5nwSXBKJnfKwGUh.iHuolOz9i2QEvM1PnbIMe1dTrd1G8/heRG', NULL, 'pending', NULL, '2020-07-14 14:56:51', '2020-07-14 14:56:51', 0),
(315, 'OHXKJzcQAiRhld', 'PSayzKwDACRnUg', 'end_user', '6974745527', 'hanaduy@foxmail.com', '$2y$10$mhwmOhg5GpyXHhshmBxDk.yYJ2SU167lkf5ZwzM8m7KmNEVhvs/tS', NULL, 'pending', NULL, '2020-07-14 15:44:14', '2020-07-14 15:44:14', 0),
(316, 'ICUqkVmMr', 'ldJUHqhiYaXR', 'end_user', '9136324983', 'mcngibson@embarqmail.com', '$2y$10$bbz/GUdAObUMTgWP3EBUzuhIfR.grZxsX1rdRt0Ks6s.xF97zaDk2', NULL, 'pending', NULL, '2020-07-14 17:42:39', '2020-07-14 17:42:39', 0),
(317, 'yivEJUoRcZma', 'NjXeEDcFbhOWGZB', 'end_user', '2911022209', 'dennypardue1031@gmail.com', '$2y$10$7RnV9KNxQq6KTgy5jjuFAO5yhZJO3t2eLz5ElDzzsrqNHbVfOFQoe', NULL, 'pending', NULL, '2020-07-15 10:06:46', '2020-07-15 10:06:46', 0),
(318, 'UVlcMXIio', 'bpXWsdYkIfwVMUE', 'end_user', '7820520042', 'jeremyauster@gmail.com', '$2y$10$5XiMvbNxTolFJaVHJAdfpe5QObA4zVbvrlemYZtlm/HKBdGXY2Uqq', NULL, 'pending', NULL, '2020-07-15 11:48:52', '2020-07-15 11:48:52', 0),
(319, 'PKgLirpdjlOt', 'seDMLHFgfuaSli', 'end_user', '3842832729', 'agaffney0611@gmail.com', '$2y$10$tnRnxOO6d9Xu5FgThq2.SeO3lb0ZJSwTCuQBCc3XwUwTBM03Tpk5q', NULL, 'pending', NULL, '2020-07-15 12:41:57', '2020-07-15 12:41:57', 0),
(320, 'POIiSYLoqC', 'uVJsxqEwbjUTF', 'end_user', '9555798465', 'mnicolegraves@gmail.com', '$2y$10$oZBzALm37MpU/UjYMFrOtuC.bwYwTaERVvmsPXswPTEi6Jd6Xm8GS', NULL, 'pending', NULL, '2020-07-15 12:53:01', '2020-07-15 12:53:01', 0),
(321, 'ZebSNYJuFiqC', 'IqBpLCJuSz', 'end_user', '8232749025', 'billy.elgert@gmail.com', '$2y$10$K/hg.wDk7JOAgqkdWGmFouEVoeLNYNbegFhWoku15Zgou1fkmwHt2', NULL, 'pending', NULL, '2020-07-15 15:04:23', '2020-07-15 15:04:23', 0),
(322, 'gSYCGMavRUjXTxQP', 'dXaJbxQcV', 'end_user', '8365713359', 'olen.greg@gmail.com', '$2y$10$t15ePwS7gsNU4uxk9dTqE.kGUwfCyFP5HDR1TE8fjDVv2g6Jjse4q', NULL, 'pending', NULL, '2020-07-15 15:23:57', '2020-07-15 15:23:57', 0),
(323, 'xnlokeXjyCtZ', 'MBteHSwDfgF', 'end_user', '9470155223', 'mjdeptula@gmail.com', '$2y$10$FJqJyQdnXjwKpfue9vmhYu0ScDqaUzSxEyL/hpDJEEvG0JVVhsxIK', NULL, 'pending', NULL, '2020-07-15 18:59:43', '2020-07-15 18:59:43', 0),
(324, 'hYtaNdlpuObxq', 'YPbQgueIEw', 'end_user', '7991068269', 'lamarmonday361@gmail.com', '$2y$10$LLmbfn2.TZCmSyziYxVxZe46aYarBd7cDGrpDJX9XWWD.Nh4tURZq', NULL, 'pending', NULL, '2020-07-15 20:36:36', '2020-07-15 20:36:36', 0),
(325, 'nHCRNcezk', 'PyJtUzsoiQdn', 'end_user', '5821666428', 'prashansadevi@live.com', '$2y$10$BF/cg8s1b7HyRT9EcBkQuOb4jRKscKMJGhcyvjC0IgU45h2CgrPzK', NULL, 'pending', NULL, '2020-07-16 21:06:45', '2020-07-16 21:06:45', 0),
(326, 'jMgzPYvND', 'YcfFgUWhLXnE', 'end_user', '7298270077', 'christopherltra@gmail.com', '$2y$10$Ma4QZXm79NEdTkqINcpdPuYMphtrAWRVG66yqdeN1gg1ImCXiWmWa', NULL, 'pending', NULL, '2020-07-16 22:35:50', '2020-07-16 22:35:50', 0),
(327, 'BIslAJVRbpH', 'LCydinhOetMswJD', 'end_user', '3337729650', 'k.subhash1993@gmail.com', '$2y$10$l8xpC91DFvz7MrIsNayJau6p058x.fZHcUaoLDBri5y3gUeEfeOKe', NULL, 'pending', NULL, '2020-07-17 10:39:47', '2020-07-17 10:39:47', 0),
(328, 'fKRvxJrjD', 'nRgVHEQYSsr', 'end_user', '7150829817', 'bbraganca@mail.com', '$2y$10$7zhDBbmYnapViKVzVq6ruOYstqW7/gk4SqPKApA9wY6mw//WagWty', NULL, 'pending', NULL, '2020-07-17 16:55:57', '2020-07-17 16:55:57', 0),
(329, 'FNMWBiQqpJex', 'bglxvKzmNFaZyG', 'end_user', '9295694154', 'madestoe@gmail.com', '$2y$10$lsKxo8stcTKXxi/4ev0kKOStvfAxCVxrgQ0JhfWxiTxTiZIuLECSy', NULL, 'pending', NULL, '2020-07-17 22:00:07', '2020-07-17 22:00:07', 0),
(330, 'AgNVZBEK', 'ckEWvrTwzYAjVbq', 'end_user', '9198305027', 'clwoody01@gmail.com', '$2y$10$RyJNVr3OJKSd2LE/XgTJTeAaiWCz3nDO53lh1FA2y.7MyrYtrgJPC', NULL, 'pending', NULL, '2020-07-17 23:14:59', '2020-07-17 23:14:59', 0),
(331, 'YnDWkUEtfIXPKy', 'bkWBMFgNh', 'end_user', '2109430446', 'stanleyadams12@gmail.com', '$2y$10$iqupZjeLdVd.gq.QdONV9OkBzd4YgNFuJ6Nvts7aXxU2Qq0aWqy4a', NULL, 'pending', NULL, '2020-07-18 03:05:09', '2020-07-18 03:05:09', 0),
(332, 'WgkYiUDm', 'VShcKUoCkJqTvd', 'end_user', '5141907979', 'dmusry1@gmail.com', '$2y$10$7No5ImySufQQcZlwzfOVfeIdGb3f1RYjort.aTBzc4v5Tr6CLAuBS', NULL, 'pending', NULL, '2020-07-18 04:18:32', '2020-07-18 04:18:32', 0),
(333, 'PDIWAVLEndgBsShH', 'qcQhlFTzxmaPIGXy', 'end_user', '4301930073', 'cardio816@gmail.com', '$2y$10$fLhRA5F4vVXu19begjOpTuqNGt4pKERpa3J1cliPazuJm1iSAIiWS', NULL, 'pending', NULL, '2020-07-18 04:25:50', '2020-07-18 04:25:50', 0),
(334, 'tnfsASKI', 'fHGczCvolYVZxsE', 'end_user', '8445378512', 'jyoung5811@gmail.com', '$2y$10$Q.CIORlgoFFyAfjt6ag46u6uWyp0fjXWbFwd74QJLQ5Cjpv8mEpKC', NULL, 'pending', NULL, '2020-07-18 07:21:48', '2020-07-18 07:21:48', 0),
(335, 'SdhkXfiCM', 'ioDOfhwqUGXm', 'end_user', '2583512145', 'vette.one@orange.fr', '$2y$10$o/sVet3DWci7k/1Hj/iW8e8PMA34UQ32fHTZixrDZPQlteBpTezNK', NULL, 'pending', NULL, '2020-07-18 10:15:01', '2020-07-18 10:15:01', 0),
(336, 'IvSuzDblPCNg', 'QXInRTOE', 'end_user', '8958504334', 'fusiohns@gmail.com', '$2y$10$w8jOhjovnCY3COHLd4aCWO1uBH/DWI6DqSJK/WK.nzZn4KAWRlXaW', NULL, 'pending', NULL, '2020-07-18 10:17:35', '2020-07-18 10:17:35', 0),
(337, 'WxcdMgmIAsjq', 'OtDjifeGpUzNAnY', 'end_user', '7411899322', 'jeneast1974@gmail.com', '$2y$10$HCvsJZYOchvHfVA0nG1G5euewrGcxhyJ85AOU9On4AKsE5ckuMK1K', NULL, 'pending', NULL, '2020-07-18 11:27:07', '2020-07-18 11:27:07', 0),
(338, 'ZJgkhNsrzdKUx', 'FiJcYlsPCUTGpMbq', 'end_user', '4617811368', 'tlove1918@gmail.com', '$2y$10$YxF67bAhDpspxKDQKzzQfOrz56ryWys3r5CSZyoVWzHMjfnwtw5qi', NULL, 'pending', NULL, '2020-07-19 02:40:14', '2020-07-19 02:40:14', 0),
(339, 'bSIPQtHfTmAaFB', 'KTCXwqbZQN', 'end_user', '8635131404', 'dowling8787@gmail.com', '$2y$10$axAa/Deyi7kl6.Y2XBIhvuTCVukhcf3IA0Amo8h1.Plr6tN.L2RTm', NULL, 'pending', NULL, '2020-07-19 11:05:20', '2020-07-19 11:05:20', 0),
(340, 'YsBprhSQemKu', 'xyIMmknKz', 'end_user', '6863849559', 'dshoebich@icloud.com', '$2y$10$pMDF1FTEXqyhLa2WEGX8xuvYJo.NaROrjhIDuSHtSRygQaDVWpWeS', NULL, 'pending', NULL, '2020-07-19 13:37:12', '2020-07-19 13:37:12', 0),
(341, 'fBIKagQPZ', 'dZRxpkNwcXy', 'end_user', '5414832890', 'marygreer1613@gmail.com', '$2y$10$YnCATKLxepqTxd6ITJAGluhSGOgAw3cQAa0dzymq9IDGKAPgujoZO', NULL, 'pending', NULL, '2020-07-19 20:50:32', '2020-07-19 20:50:32', 0),
(342, 'uPfIstSLnD', 'yeObaEvYtRdTpV', 'end_user', '6039308348', 'georgehenry1204@gmail.com', '$2y$10$1akylG2rVL6t1mWwu01FQu6UyNEXZEwrZv5A2hc.YLFeD8yUwF8QS', NULL, 'pending', NULL, '2020-07-19 20:59:07', '2020-07-19 20:59:07', 0),
(343, 'uWQpDcKFoj', 'kWrgLTuADP', 'end_user', '2673557030', 'danjax@gmail.com', '$2y$10$S4rVhAdzvVsGgfjlV/e2Kesn3yFONVzgBt75VS70jrdLT7pyldLUu', NULL, 'pending', NULL, '2020-07-20 09:30:42', '2020-07-20 09:30:42', 0),
(344, 'JSkdhVwtjrosUC', 'GKaCSADIZsBQlP', 'end_user', '3879329743', 'destinymarieusman@gmail.com', '$2y$10$vEwSR2VyRB5wNC5h6yXG3OUgxRQkDJqZhEot6504CdLXoK5D/nWLi', NULL, 'pending', NULL, '2020-07-20 10:23:01', '2020-07-20 10:23:01', 0),
(345, 'ANkSJrqzbiYnBj', 'wMVGIhbDm', 'end_user', '6172176537', 'taylor.summage@gmail.com', '$2y$10$N0HkhjMntdEGZgGj8g.YW.4W6FgfVM0nMg1Hk3DNxOFBJJpOyesbC', NULL, 'pending', NULL, '2020-07-20 12:58:24', '2020-07-20 12:58:24', 0),
(346, 'BayzYgPKrlhdQAe', 'POsgNxHBIdnyMQa', 'end_user', '3941616219', 'amybarnett27@gmail.com', '$2y$10$tgh/VL00PwDhdq7Fxtn9COOnAQlUIbWYAfKCWmH.Hsgj.9/Lv/HYu', NULL, 'pending', NULL, '2020-07-20 13:41:19', '2020-07-20 13:41:19', 0),
(347, 'OtzPMkeN', 'VjmMzxaHr', 'end_user', '4024704867', 'cottonj1127@gmail.com', '$2y$10$n1gz3HMDAhZTfHUqbdSg/ugfcIh5cPebO457eBTqTcjROLBEX2cni', NULL, 'pending', NULL, '2020-07-20 14:34:10', '2020-07-20 14:34:10', 0),
(348, 'beHZOdBk', 'uaIKOSVZJ', 'end_user', '3033476054', 'adwheeler35@gmail.com', '$2y$10$aWfsBUe9bsg8fVNmkoiU6u13xd4DrbNUAVvtfc7fVcxvV2mEv9Z7y', NULL, 'pending', NULL, '2020-07-20 20:38:48', '2020-07-20 20:38:48', 0),
(349, 'PzyMqKZIFGu', 'LPzvRJfHQlqmIsg', 'end_user', '3626965292', 'ming.i.huang1@gmail.com', '$2y$10$odHJ9G7.91dddVIPua/o5uBWNnXiK1/AsbAdLU1IFtQKJxZcuUt8q', NULL, 'pending', NULL, '2020-07-20 21:44:51', '2020-07-20 21:44:51', 0),
(350, 'BQZvjxVTRdJAPkI', 'PEUgCFjpLx', 'end_user', '8174699576', 'chris.varner68@yahoo.com', '$2y$10$neY6VDUQnAmjLOPLn2nL5OGJTAEJgRCgl2wkJ0Jf43bXTIiO1bg4C', NULL, 'pending', NULL, '2020-07-21 02:05:27', '2020-07-21 02:05:27', 0),
(351, 'URLkXZioTjfHFBSl', 'IZucVKvmFEdNAb', 'end_user', '7360476200', 'bubbasportswear@gmail.com', '$2y$10$dq0ie7cmbtMZZ8NxBG6gcOqYBYZwPSNAG2UEz1RIFCDZjseYriob6', NULL, 'pending', NULL, '2020-07-21 02:41:11', '2020-07-21 02:41:11', 0),
(352, 'HlYZbwPOVB', 'TuyPBMahzAOnvqj', 'end_user', '3073162930', 'jeff-patti-b@comcast.net', '$2y$10$PGRHnPX7qhfkmtdsTthD6e0mr60vseFP/0tIrh62y/Y3JJb3aiUge', NULL, 'pending', NULL, '2020-07-21 09:46:25', '2020-07-21 09:46:25', 0),
(353, 'adnJcobGLNYURm', 'gtZJaSuU', 'end_user', '7430838476', 'bradley.quarles@gmail.com', '$2y$10$t6nz72v0o/tub9fjpQW4PO9Kj2oVP3H9IpYERYXa7.jj6owaX9Ehi', NULL, 'pending', NULL, '2020-07-21 13:31:15', '2020-07-21 13:31:15', 0),
(354, 'LmxRriasNYEI', 'MXdrTyCW', 'end_user', '7911079792', 'ourbeaches18@gmail.com', '$2y$10$CJDnYk52k3eGT12rpfJZvu4ADeNIziwwdhFzVe9C3NCSWD5wmIGp6', NULL, 'pending', NULL, '2020-07-21 21:19:59', '2020-07-21 21:19:59', 0),
(355, 'qSkuJLgiPbOWK', 'SVgWasqUHumkBN', 'end_user', '6357359025', 'titomariano94@gmail.com', '$2y$10$ct7/SknkKJmr1QX8qmjD.OxB9RfaeVEplEpkcA/93.ZXlyc.g3UJG', NULL, 'pending', NULL, '2020-07-21 21:25:34', '2020-07-21 21:25:34', 0),
(356, 'eCEzmuWy', 'OcBAdYZTJGur', 'end_user', '4530202135', 'cortneytenentes@gmail.com', '$2y$10$UYIFGHTrGnXl0VF807m1X..FOJsHL71Wx65D4L7ODnQJpeZLdLsh.', NULL, 'pending', NULL, '2020-07-22 06:04:07', '2020-07-22 06:04:07', 0),
(357, 'XnxVEbBFvYrOJe', 'FrqPtjBTWMsiLG', 'end_user', '3815721643', 'grace.distilo@gmail.com', '$2y$10$SPQWuqaKb6.gB4xh.DxQa.8skG10Hq.9PRTKHd9AQxmaTrpQsxGOK', NULL, 'pending', NULL, '2020-07-22 06:06:38', '2020-07-22 06:06:38', 0),
(358, 'ZfmJrpewvlaDKkgx', 'tpkEdoZl', 'end_user', '4903407986', 'fergusonkatie79@yahoo.com', '$2y$10$pBeRT1NHLV8r/XyYFVKAj.sNS/HEy22UBsHcamNEZpL4Lr2Ir9Lpe', NULL, 'pending', NULL, '2020-07-22 11:46:09', '2020-07-22 11:46:09', 0),
(359, 'vzPNaDeKOGrbdHgX', 'OdeNCrHAWB', 'end_user', '4698702026', 'chadmathis8426@gmail.com', '$2y$10$sEwunOylyGrzTP/6IesIw.n8xJUA7SAvTN5GiMaHvInhmZiC8AIM2', NULL, 'pending', NULL, '2020-07-22 14:37:24', '2020-07-22 14:37:24', 0),
(360, 'WnzBrAyJ', 'LWaXGScwyDpsAjh', 'end_user', '9782098317', 'rsmith@smithassociatespc.com', '$2y$10$eoZZVN6rzGXU52fcUTdaHe7XjV61sCpm0OzOyQRMAGTKNn2BgK93i', NULL, 'pending', NULL, '2020-07-23 02:07:39', '2020-07-23 02:07:39', 0),
(361, 'TJrmZgHekRAcilK', 'xOdBWcqfXbz', 'end_user', '2342507770', 'thuyvy4288@gmail.com', '$2y$10$uc.WM.0LVHmUGqoNI7krzuAtiPRFZgl0UcfW8Q9DogF5GUYrQr8gG', NULL, 'pending', NULL, '2020-07-23 04:00:19', '2020-07-23 04:00:19', 0),
(362, 'PhJloeEsLvTfKqGt', 'fWUbaRZnqEJHVdz', 'end_user', '2262661835', 'kortneyrae@msn.com', '$2y$10$Dy76cq1lSvq7g1NvKXpb2.WpjGURg2nHf0PEyUq3O5.Qn/KM.GYRW', NULL, 'pending', NULL, '2020-07-23 06:43:16', '2020-07-23 06:43:16', 0),
(363, 'XcHEotCMq', 'ROqIXYpf', 'end_user', '2543813449', 'katashajj@gmail.com', '$2y$10$16EdyweYgxaMaJ.7mzOTnOAQvZSjbpabZqhPz.3XJfuaA8QsPb8yS', NULL, 'pending', NULL, '2020-07-23 08:16:48', '2020-07-23 08:16:48', 0),
(364, 'zMovPmKwqy', 'vAWOMoFlB', 'end_user', '2918704049', 'jonesashleigh507@yahoo.com', '$2y$10$Oipi99BTpC07kzbGWdV2yu3v/VeOS7OSQL3OB0HIGP4jLH61J2BEG', NULL, 'pending', NULL, '2020-07-23 10:07:44', '2020-07-23 10:07:44', 0),
(365, 'uUyhsVWKJZ', 'wqunbESgCM', 'end_user', '3624527242', 'rosasoares@optonline.net', '$2y$10$fa31KsRwdqT5JMaSFmjlOehHGYwtvDAi8itvfpWA.O.q74J3fhfGO', NULL, 'pending', NULL, '2020-07-23 11:46:04', '2020-07-23 11:46:04', 0),
(366, 'UJYnSbhVPtZ', 'nAamYMpegjlrz', 'end_user', '8739876340', 'tboulwar@hotmail.com', '$2y$10$6FIOQowUBzwRbtGhAAjHXew8g2R.ATnx/xUpbkk2nJcS4tjUd9O8S', NULL, 'pending', NULL, '2020-07-23 11:56:07', '2020-07-23 11:56:07', 0),
(367, 'sSgVtOvNWbHUZ', 'QvdkyWNSCREK', 'end_user', '9118357984', 'ladylarlar1969@gmail.com', '$2y$10$OOJWF/OerUygTFjEjwTs7ueBoJxGir64AU.4wCjsOnG3z3pJ8JOWW', NULL, 'pending', NULL, '2020-07-23 13:01:34', '2020-07-23 13:01:34', 0),
(368, 'BkGaDQmAuznV', 'OMUvpmrKyzYiBc', 'end_user', '6568836553', 'blakbruce1@gmail.com', '$2y$10$dEFB7pj7p3dB.yLmA/lxzeRK3BGvSr19/F16.I2p2CdGMq6aMbOJa', NULL, 'pending', NULL, '2020-07-23 13:41:29', '2020-07-23 13:41:29', 0),
(369, 'SvMkGVNOLUQc', 'DRbvEsPGtHjqd', 'end_user', '9512980755', 'laurahawkins246@gmail.com', '$2y$10$F/aiheJcdcHW9L8uRGFHhO0nVbCqdjhGjHDttWUTqlanZdCbEGPia', NULL, 'pending', NULL, '2020-07-23 14:20:19', '2020-07-23 14:20:19', 0),
(370, 'XxyUWTEIdzofmM', 'SVouAUnBMerxbJE', 'end_user', '7447396095', 'kwilhelm2274@gmail.com', '$2y$10$VkB8nZbfLUsRRk4Q6wkzmOeGgaEJgOWrmwDdyc.9vdon9jVuGEfAq', NULL, 'pending', NULL, '2020-07-23 15:28:39', '2020-07-23 15:28:39', 0),
(371, 'hWImYSkJHdznbOv', 'iUdqXCoDjhJGzc', 'end_user', '5792931951', 'mweldon1217@comcast.net', '$2y$10$e907RmO/jehqNt0j.lbNiOnmmOSLErhcelUz3ouU0eqcucRh7bgwy', NULL, 'pending', NULL, '2020-07-23 17:14:11', '2020-07-23 17:14:11', 0),
(372, 'svUphYwuyWQAL', 'srHRmBupjLV', 'end_user', '8837895183', 'sue.romeo411@gmail.com', '$2y$10$NnXt8lyMN4EnbRyStbtFneD3EJSDcZhz8Jsy2tgmRopybOGD0uwAq', NULL, 'pending', NULL, '2020-07-23 18:22:39', '2020-07-23 18:22:39', 0),
(373, 'gxvKRGPX', 'LUkmsfEpHBCY', 'end_user', '6404250784', 'herbowalker@earthlink.net', '$2y$10$c74PlnPoiIvgqpokViwzIe8AOVWLIsE9hs2I6wJwtI3zo9VHw8pUG', NULL, 'pending', NULL, '2020-07-23 19:56:49', '2020-07-23 19:56:49', 0),
(374, 'JNwqKmGUgZFODMQj', 'CZgQRylwfU', 'end_user', '5551948299', 'dkasan89@gmail.com', '$2y$10$mqEXLwJZHZ.DgsCzhwX31euOENA7MKxmNtJJz4KJH2RoYB.s7pFQq', NULL, 'pending', NULL, '2020-07-23 21:41:55', '2020-07-23 21:41:55', 0),
(375, 'bHUazgqrRMtSB', 'RzNLIaDK', 'end_user', '4061602228', 'andijustis@gmail.com', '$2y$10$T9bU.nKO1yNAlEo49DbrYObL43o5VOYmuOT06PTYuG4sl7UnUNEom', NULL, 'pending', NULL, '2020-07-24 00:19:46', '2020-07-24 00:19:46', 0),
(376, 'BYfHCcNheDRzwK', 'hYfdnezjvKV', 'end_user', '4963384944', 'shawniaryan72@gmail.com', '$2y$10$lv1nCZMTRpw85cRrlPYBSuJoRB71qoX8BnLCFqgJSLIUiInDGMsVG', NULL, 'pending', NULL, '2020-07-24 00:57:34', '2020-07-24 00:57:34', 0),
(377, 'ZTscVkMFSOHqDbm', 'IdJBEsnfGWTM', 'end_user', '3995278071', 'wqin31@gmail.com', '$2y$10$Wz/pZzDfoxAseTaFy7NC.ediqjvFZjdRbdo5qxtC/wa5.RcxC8b3W', NULL, 'pending', NULL, '2020-07-24 05:39:34', '2020-07-24 05:39:34', 0),
(378, 'JFuTPvWSeq', 'MOCRNTlUbfw', 'end_user', '3546737323', 'witoonponsang@gmail.com', '$2y$10$uRXiRBoKjo.XamF0LpDR8OQnnNGQ1W815AHA1mLQzBGgMONFGGw42', NULL, 'pending', NULL, '2020-07-24 07:38:19', '2020-07-24 07:38:19', 0),
(379, 'qbeZsrLMn', 'ZTFEIozRLuWm', 'end_user', '4725001617', 'mckleibrink@gmail.com', '$2y$10$HwSUsXRKElkqjuSQKiTMVOFpsXr2rXPaBEaTjla6BI87OAQMFS0rG', NULL, 'pending', NULL, '2020-07-24 13:00:22', '2020-07-24 13:00:22', 0),
(380, 'gUuicZpns', 'ucxDnLTYf', 'end_user', '8952519070', 'pkoziol@gmail.com', '$2y$10$Rk8Ia7BpOmsTS504QOROaex8rmv7be3P96k7loxTzC1bUMj1vLHXe', NULL, 'pending', NULL, '2020-07-25 00:15:06', '2020-07-25 00:15:06', 0),
(381, 'ZsFcOwuNVAMCGofP', 'jFMlJvhXLHbDS', 'end_user', '9900365278', 'martinezvic277@gmail.com', '$2y$10$SIoVC21.xhGGR0ZhkmAnkOgpTwFLoJ3f2jKdRnNBhmbXBHE47n0ly', NULL, 'pending', NULL, '2020-07-25 00:29:39', '2020-07-25 00:29:39', 0),
(382, 'HNnvtrOWFdPJ', 'XZNRUravP', 'end_user', '4659657696', 'bpyne66@gmail.com', '$2y$10$XH0IrsIGftLb/6b/SKU1Mej9prb73jm8WbAAqq3ZrsHdc.X7OYXAe', NULL, 'pending', NULL, '2020-07-25 01:38:54', '2020-07-25 01:38:54', 0),
(383, 'upVsACXgldH', 'doDwAEhIFmQp', 'end_user', '4167151925', 'johannaaragon8@gmail.com', '$2y$10$cVY/w.THBvHXLEaJcrVh4OxL47jASMu3l/4s8O/ApG.3/oJZ8NLDy', NULL, 'pending', NULL, '2020-07-25 05:10:35', '2020-07-25 05:10:35', 0),
(384, 'gUCbhVKzOZNlX', 'jzbIMYBJfOWTuV', 'end_user', '2678499280', 'steve@sghaberdasher.com', '$2y$10$2x/kDTrdvKSdlO.kEVPTrOabcBzjT2G328B5fzkslAalnMtvLmQjG', NULL, 'pending', NULL, '2020-07-26 13:47:49', '2020-07-26 13:47:49', 0),
(385, 'lHwSInXO', 'HcPCNhJtwgI', 'end_user', '8396443856', 'roman.bustamante@gmail.com', '$2y$10$oV2uR82LCLQ.I/Inq8ivSOh7osHoJcQV2d2jVdUBlGOSZ0uroW.D2', NULL, 'pending', NULL, '2020-07-27 13:52:39', '2020-07-27 13:52:39', 0),
(386, 'AgQMFmONjnr', 'pbsNfdGjIw', 'end_user', '6060117152', 'tandonsahil827@gmail.com', '$2y$10$7c0AukSWJY2988hacoAxEO7fsmwK2JQjuWG66DIR//9n.3pMguzf6', NULL, 'pending', NULL, '2020-07-27 14:56:41', '2020-07-27 14:56:41', 0),
(387, 'VfiRqTQB', 'MnCiXJZP', 'end_user', '4102471644', 'sonia7669@gmail.com', '$2y$10$798DLlBgYkulLfViFKT4JunHbw209bVMYY.Gebrf4Iew4U7yJhlzG', NULL, 'pending', NULL, '2020-07-27 15:27:57', '2020-07-27 15:27:57', 0),
(388, 'csdarYwxLuOAlZX', 'NOwVuCiSqQEP', 'end_user', '4425093882', 'tony@tayloragencies.com', '$2y$10$Uza4.zLEdQpZpwKSxV7sa.bylB7GjUbrKHV7fJOqg8r4BgrKuGhy.', NULL, 'pending', NULL, '2020-07-27 18:43:36', '2020-07-27 18:43:36', 0),
(389, 'fpNiwdjT', 'ueqQmadKkAD', 'end_user', '4544620009', 'markweaver1869@gmail.com', '$2y$10$nxg1jkrRqiCo6K9k3w4WVumIpeZg/PrmW8VVlADYbaTWHkJ8a02vO', NULL, 'pending', NULL, '2020-07-27 19:03:04', '2020-07-27 19:03:04', 0),
(390, 'sYEAGtZPRX', 'KVJrNyixEkOIGPhq', 'end_user', '5666523846', 'arkcraig76@gmail.com', '$2y$10$fhd/v/gFMMXHlZTIfp.pQ.RJjDrCZefvDtLTaysP99HkrMyVYCSj2', NULL, 'pending', NULL, '2020-07-27 20:16:39', '2020-07-27 20:16:39', 0),
(391, 'grukDzVv', 'HCUYSzcZvkpMdR', 'end_user', '3595022263', 'lindsaycynthia51@yahoo.com', '$2y$10$Ceg52rMRk85a17Q7810ZduJtHQ3iCY0SvJs.NXNLTuDDg3XyAxEvC', NULL, 'pending', NULL, '2020-07-27 21:25:51', '2020-07-27 21:25:51', 0),
(392, 'lCVamOFpYtnHJ', 'xXoGONBekqhHaJ', 'end_user', '5403436170', 'droy4773@gmail.com', '$2y$10$puQ9Au9ae.iBza9x0gqh5eOWylXVfCv5jvAdVEBEgNQqZQdBYx82a', NULL, 'pending', NULL, '2020-07-28 03:44:18', '2020-07-28 03:44:18', 0),
(393, 'ouvMiYyrxkdS', 'ubhEHDvnCFjoxs', 'end_user', '9351265623', 'ddhauschel@yahoo.com', '$2y$10$bixUwhbcVcKfDnwY.JqoIOoYvJ6qPKPdCu9BzqBUIAaP0ik2pmnHC', NULL, 'pending', NULL, '2020-07-28 06:59:15', '2020-07-28 06:59:15', 0),
(394, 'picNMSABbR', 'rabmzqeuHwVpxkY', 'end_user', '2568175320', 'hshalini@yahoo.com', '$2y$10$PMpFKs6XI14a4iNT7jbaQ.Tz6//kDX9IjHtEO3XPiQHizNAZxbZsm', NULL, 'pending', NULL, '2020-07-28 07:00:07', '2020-07-28 07:00:07', 0),
(395, 'oFuZEMmpTsL', 'BpnlzNoVdiru', 'end_user', '5812432497', 'andyshihuang@gmail.com', '$2y$10$W2UPLqedjay2OjneoklL/.ggfQl.idf448kRNidiGXEEc5yrus69e', NULL, 'pending', NULL, '2020-07-28 07:11:13', '2020-07-28 07:11:13', 0),
(396, 'CrYkmGEIMO', 'kqYBJEGFDiU', 'end_user', '7562044231', 'jacksxr650r@yahoo.com', '$2y$10$3zI6zNP5/H2fsgC.KteO1OjVC3ri6bWHWKRHU9Y/cKhKH99/vrOv.', NULL, 'pending', NULL, '2020-07-28 07:26:02', '2020-07-28 07:26:02', 0),
(397, 'xRVwdakrEXO', 'wbkdqLAg', 'end_user', '8478986882', 'lana1350@aol.com', '$2y$10$ErTW3O3A2h1HHqd3C4d.Z.gKhsw9vBo2f/Xv9vS9eddLs7XTY0Eo6', NULL, 'pending', NULL, '2020-07-28 08:10:02', '2020-07-28 08:10:02', 0),
(398, 'ZoGyOlxXUHYpb', 'ISxgyToMUhC', 'end_user', '8303585752', 'timikia_jackson@yahoo.com', '$2y$10$6kU2CigvguFj6iXR0g.8uOM2RbL.9SpcnEKGbddodR5Tv3e0r1mVS', NULL, 'pending', NULL, '2020-07-28 08:50:59', '2020-07-28 08:50:59', 0),
(399, 'ntjdKFsPArbZgov', 'CORedHWJlNqwpXM', 'end_user', '2209383882', 'edwardalanzo@yahoo.com', '$2y$10$UC5lA1KuDCOR3I9NE/W86Ona.UPxrHOiEZzLadIbD6R/70A4ulrGu', NULL, 'pending', NULL, '2020-07-28 09:10:27', '2020-07-28 09:10:27', 0),
(400, 'gqItJMbO', 'oHSxJruKEQ', 'end_user', '7164224362', 'cjdollens@yahoo.com', '$2y$10$oyrb2ppK.6j9mVe3eg.8VOhu8DxygMRkGZHlq0iO2NL2OF708Pmwa', NULL, 'pending', NULL, '2020-07-28 09:44:20', '2020-07-28 09:44:20', 0),
(401, 'JKIAzjPcsBFWrXaC', 'vAfRXNeH', 'end_user', '3118738698', 'ryanc730@yahoo.com', '$2y$10$nVgbX9C.jjX6XwiJ6kzRVu6F2M/Qv6zU2Qv7Lcv1KinkYrKOWI2G6', NULL, 'pending', NULL, '2020-07-28 11:43:28', '2020-07-28 11:43:28', 0),
(402, 'dVZwnTfOEiBA', 'gvIBzsObxdcMXu', 'end_user', '4066807670', 'alexinglish10@gmail.com', '$2y$10$kNW9VwcSXoZguDgCjf5hw.r8oNFfy5u.meVh6bPUpTyYYburZnfpG', NULL, 'pending', NULL, '2020-07-28 11:49:37', '2020-07-28 11:49:37', 0),
(403, 'WozwYlDxibVB', 'emyNxtFUQGOI', 'end_user', '4358024488', 'winnieharr@aol.com', '$2y$10$IxgJX9bF8KHTkmEgpOoIVuofoPTUWihxB77RHQmMxdUhUC9W7DYxm', NULL, 'pending', NULL, '2020-07-28 12:28:04', '2020-07-28 12:28:04', 0),
(404, 'RrumqLBPZfyTodt', 'KNbwhYfsIOMSm', 'end_user', '5156391069', 'courtneyslavek0831@gmail.com', '$2y$10$L3GtXe7cCuAe5yicf1kIpOaRxvjqmoIwP5UKEHjef4tcoWGoWGQ.e', NULL, 'pending', NULL, '2020-07-28 13:06:40', '2020-07-28 13:06:40', 0),
(405, 'JNCgRMiUoI', 'OqBAiXIsmRKvc', 'end_user', '9128204937', 'jason.reid14@yahoo.com', '$2y$10$W70ey6r/YEEZfP7irR5T6eYXBpC8VCUJk7u8pHN.iaEr8319f2sqa', NULL, 'pending', NULL, '2020-07-28 13:11:46', '2020-07-28 13:11:46', 0),
(406, 'uzXTtvnNUckhDQ', 'BaTOIdFeMmZjWz', 'end_user', '5665528578', 'dyr3022@att.net', '$2y$10$AbcfNTs3uihAK0V3cNYHwOSe7irfj.5NmiBMYmqT7q7CnUhHwVsjq', NULL, 'pending', NULL, '2020-07-28 13:47:50', '2020-07-28 13:47:50', 0),
(407, 'hCswJlpOiXHRnKm', 'UNnJcpPqVDh', 'end_user', '6591659020', 'threein18@bellsouth.net', '$2y$10$iMQzvcaDh5DMW5L1XRgRguBDbPrUKsxzqcoVNYdcIt/FwjWI/O4vG', NULL, 'pending', NULL, '2020-07-28 13:59:33', '2020-07-28 13:59:33', 0),
(408, 'wxCZyITmVG', 'FBtEOofCiPyVwxI', 'end_user', '3789036401', 'cyniveerix@rcn.com', '$2y$10$KVyaau95Q.9dVYwsQ/lsiOdXCEtUfZZ/2YCqWw2MxpjGd/XkmsKGW', NULL, 'pending', NULL, '2020-07-28 13:59:46', '2020-07-28 13:59:46', 0),
(409, 'wOYTGxtHdKfcsoXj', 'kRfeLIGda', 'end_user', '7058716631', 'tinafish6@msn.com', '$2y$10$3WOwO4lZrGvc5jVTy.DuPeQqXJFpE/ZN4t/ahGOyuAMOjAbDclMh2', NULL, 'pending', NULL, '2020-07-28 14:41:47', '2020-07-28 14:41:47', 0),
(410, 'jsVLRAPYW', 'IwhFKnCafQEmz', 'end_user', '3785769443', 'joshboi26red@gmail.com', '$2y$10$H0aNqCdvHHn6dr8PHHiFHeIKfONeU/cJUWkmBmPciYa/7Io6WEBO.', NULL, 'pending', NULL, '2020-07-28 15:58:56', '2020-07-28 15:58:56', 0),
(411, 'OGFuzfHr', 'ajseyflCNLBuOo', 'end_user', '7269327054', 'tammy180wong@yahoo.com', '$2y$10$xHXoGzOesIAQ78bNb/cG5eWPPdItD/W7MamgTGrvo81IHrxul9fA.', NULL, 'pending', NULL, '2020-07-28 16:30:06', '2020-07-28 16:30:06', 0),
(412, 'oYkaguyHifPwB', 'hnyRdFQmwM', 'end_user', '6356153860', 'mommamia01930@yahoo.com', '$2y$10$II/oU47o3UVR9eFAxjwcP.C06bBZAoGwgeAklsG0vY9Za9nMDC9dW', NULL, 'pending', NULL, '2020-07-28 17:17:21', '2020-07-28 17:17:21', 0),
(413, 'pLszBWuwSHeYdyX', 'dIEPrQVchpZLbm', 'end_user', '9248911544', 'jordanbaskins@yahoo.com', '$2y$10$P.CAfKW/yQrmRnyyVRgvDuifPQR/WkDi/GYs70Z.XuAxXQNynfFCm', NULL, 'pending', NULL, '2020-07-28 17:18:00', '2020-07-28 17:18:00', 0),
(414, 'JdElNkwUWBx', 'APFrTnloUOqCdtzG', 'end_user', '9755461246', 'eddie.back@yahoo.com', '$2y$10$V4b07Fa4QoABKqfVO9THAOC9vW9Poq1EcHPlg.ret9/nxJ7cGDGLS', NULL, 'pending', NULL, '2020-07-28 17:25:25', '2020-07-28 17:25:25', 0),
(415, 'kgfyEjWdDT', 'lEXBzNIc', 'end_user', '2643810837', 'ericwilkins161@yahoo.com', '$2y$10$Jxchf06jiaxc2r23W7nNB.hq0ftI/tf5mJ7IZBNq.vy1NuNLuSiEe', NULL, 'pending', NULL, '2020-07-28 17:30:45', '2020-07-28 17:30:45', 0),
(416, 'uUIxYPbLwsotkq', 'LcZzEQoYnkWTHwhe', 'end_user', '4664592752', 'dtennis1000@gmail.com', '$2y$10$zDaQSjbewuYrOyBASbZxmOd8PcC9L5K7olfGIUbvvuCWpzraXdvdq', NULL, 'pending', NULL, '2020-07-28 17:41:15', '2020-07-28 17:41:15', 0),
(417, 'rOiTWFIcUdYCxsG', 'ceJhFstriAy', 'end_user', '2286016403', 'steyererlynn@comcast.net', '$2y$10$AW0m65FBgLkjlLBMvcpuKe7MRMe9ePIdI1WOVy6IqlNoZ0Pg9tWNm', NULL, 'pending', NULL, '2020-07-28 18:06:52', '2020-07-28 18:06:52', 0),
(418, 'EBYxPUdaTov', 'TuCZraLJVPtcIv', 'end_user', '6591967735', 'awmiranda@gmail.com', '$2y$10$Q9ct.iBewQpQMP1Ey8HV.O8iMATXBkz/HuhtECZgTds.tHesmXGuS', NULL, 'pending', NULL, '2020-07-28 18:32:24', '2020-07-28 18:32:24', 0),
(419, 'XCnNGScVqspP', 'wQTsUALbNVcKOWo', 'end_user', '6872686305', 'billnikon@aol.com', '$2y$10$8GvW9JX8kHdvTM.MmXCPWeK965QnXabDATo3iQTqaCsvV1m6OYPCe', NULL, 'pending', NULL, '2020-07-28 18:57:27', '2020-07-28 18:57:27', 0),
(420, 'mvrkUsIEyFgThfCn', 'NtrVWqHmedY', 'end_user', '9591710104', 'hwooden24@yahoo.com', '$2y$10$PWXAzl6xi2d2PRVbGvWLgeGNbriEPzMzDHB3Cu6Xj.zZChZBltP.y', NULL, 'pending', NULL, '2020-07-28 20:31:59', '2020-07-28 20:31:59', 0),
(421, 'mEvoALVkwMCW', 'jLniYUHwMWbm', 'end_user', '4129687083', 'billy.rond@gmail.com', '$2y$10$c8Vk8DQ32UZcokPRukVwy.rFt5Hx8aQjrJaWNcSO2i0onCW5s/UQy', NULL, 'pending', NULL, '2020-07-28 21:22:32', '2020-07-28 21:22:32', 0),
(422, 'aoqWYRpmXxiwthLr', 'cYtOApSjEFf', 'end_user', '9085138711', 'timothynaple@gmail.com', '$2y$10$jZAmJUTE3plqCRokQyos6.sO4HxlIAz44zh.6G8M7vpP2S4468A82', NULL, 'pending', NULL, '2020-07-28 22:40:07', '2020-07-28 22:40:07', 0),
(423, 'tUGsIxLVOWv', 'hGnqEPrugob', 'end_user', '9568489713', 'rjssr@aol.com', '$2y$10$qPJdAJlGvYoOm6aI8aD26.kbjjF4TV63OjK2O1wGzcxBYPgzxB97m', NULL, 'pending', NULL, '2020-07-28 23:49:33', '2020-07-28 23:49:33', 0),
(424, 'FCeHGIdRjASh', 'xcXFOtTKCsoNjUEL', 'end_user', '7845594190', 'jillmusser99@msn.com', '$2y$10$MqZi1L7Bmer/AFFweG4GWe1EshRY4mmPuNwTL6rdKkJwpKnOI2.7a', NULL, 'pending', NULL, '2020-07-29 02:21:17', '2020-07-29 02:21:17', 0),
(425, 'KQuVbowLzJtjGvs', 'zdMCusYZH', 'end_user', '8693594786', 'cinnamonsumer@yahoo.com', '$2y$10$eoPt/LNTg1eNjOz8S4F5AOMfkTWny46ZYTwnATIQOdGstSIkLdGFC', NULL, 'pending', NULL, '2020-07-29 06:08:27', '2020-07-29 06:08:27', 0),
(426, 'sIDwKfvdO', 'MJUyOcjI', 'end_user', '3403079803', 'tayxclark@yahoo.com', '$2y$10$1UUviDsUpReqaJZ7gcRtKejPsFgdB0LAWlfmnjEfhogIh0eVIPk7W', NULL, 'pending', NULL, '2020-07-29 08:57:30', '2020-07-29 08:57:30', 0),
(427, 'rXtMqopgej', 'itrqyuWGsnTzOexP', 'end_user', '2192232662', 'lexie_stanley@yahoo.com', '$2y$10$xh5MmnzaY4ai1E4C1XoCHORDYCq6y7/chh5jLr46N93.ZnKMXPCy2', NULL, 'pending', NULL, '2020-07-29 11:01:21', '2020-07-29 11:01:21', 0),
(428, 'xqoImOhKjckvrJ', 'DpwZQVjbzaTrh', 'end_user', '3255658707', 'jsjlilly@yahoo.com', '$2y$10$60b7KrNJYHebaR4QTZGgueXhSHp1OpLTEITo3aZDyVj3/0K4Uo5ee', NULL, 'pending', NULL, '2020-07-29 11:44:36', '2020-07-29 11:44:36', 0),
(429, 'TEIowNgAaxKnUeDt', 'KFeiLWUtvkB', 'end_user', '7676144864', 'nicoledesousa72@yahoo.com', '$2y$10$AuUY9Yu3Z0GcP1H9qdrXUeQnP4HYlGm0FiHlGthrHCmfC9sLpDuLi', NULL, 'pending', NULL, '2020-07-29 12:42:13', '2020-07-29 12:42:13', 0),
(430, 'vWZlcXVezTp', 'tkAevrKsba', 'end_user', '5005671968', 'feyona1@yahoo.com', '$2y$10$Y0cjZUDzcCS8IPV9a75BpOdXH7PU2Nz0/go277CYg6dkvasa7Az..', NULL, 'pending', NULL, '2020-07-29 12:57:22', '2020-07-29 12:57:22', 0),
(431, 'kgCuKWyTjnehUtNL', 'RosadlXyxmfQeY', 'end_user', '3291430070', 'mazzelladds@gmail.com', '$2y$10$q.Gv5ru3i6GVaeNt.T0GrO1GItiss26oDo6rygUAK78fM7NQ3g9Zi', NULL, 'pending', NULL, '2020-07-29 13:14:41', '2020-07-29 13:14:41', 0),
(432, 'fcAEoRNYBKnulmC', 'DbCwtMJylS', 'end_user', '6553738977', 'pazgalit@yahoo.com', '$2y$10$ydaAZ4h6A9.KloyYex.rPuyM8Ff5Rq4NIV642UkbW8Y3dK7pFf39W', NULL, 'pending', NULL, '2020-07-29 14:56:53', '2020-07-29 14:56:53', 0),
(433, 'EzeOZsVhJm', 'ikWlLdeCHUGD', 'end_user', '2156982565', 'caseybarnaby@att.net', '$2y$10$DRgmeorWmUbUhKGMTE0II.IBAYEofEs/Ck9GQPP5oez5doKnjCwyK', NULL, 'pending', NULL, '2020-07-29 15:13:34', '2020-07-29 15:13:34', 0),
(434, 'BkVbpwZieXvDY', 'LkDVneGQUr', 'end_user', '3132259928', 'kdreporter@kc.rr.com', '$2y$10$dHNSMqbe3nlfevPOHHvT5ucOgH1fQ9h8m3oKESPhqXeJmMuBgAbFW', NULL, 'pending', NULL, '2020-07-29 15:20:30', '2020-07-29 15:20:30', 0),
(435, 'jylopPYLERQXt', 'wQfSbmRMWhPqgGU', 'end_user', '5031491789', 'timnit2008@yahoo.com', '$2y$10$wGeveLA1IUPTTkBQZHb97.L8HrG6PeoV8/7QF9aPpzlAhqf3ugUe2', NULL, 'pending', NULL, '2020-07-29 15:31:39', '2020-07-29 15:31:39', 0),
(436, 'FgqEBzZVkMJ', 'PRFDBySILnfKW', 'end_user', '4983415177', 'ktzanetop@gmail.com', '$2y$10$lXsofEihVZiiOxl4PlXhmuUGm/y7Mf6WGE9U4cN4PCh3/agE7BS3W', NULL, 'pending', NULL, '2020-07-29 15:36:34', '2020-07-29 15:36:34', 0),
(437, 'pclXBWZnN', 'kdKvtByHZXjJVIYu', 'end_user', '3941270608', 'soulekav@aol.com', '$2y$10$N4TE3Rqc/4sXrfDzEhZcFOUrYsfFu5Ccs7FjxYU6LdCvWFBpzlzD2', NULL, 'pending', NULL, '2020-07-29 16:00:22', '2020-07-29 16:00:22', 0),
(438, 'fMFlVoLwWGNtEAkQ', 'HpjDSLrfV', 'end_user', '9059685362', 'kschanda_jr@yahoo.com', '$2y$10$F3ujHQMs6jZopbDxa7p.7uTj/JWzo3Ce0pVNr8XQx7fC4GwHfpn1u', NULL, 'pending', NULL, '2020-07-29 16:18:06', '2020-07-29 16:18:06', 0),
(439, 'dNOLvokpcZRV', 'ePUudlnMTjbaKf', 'end_user', '5689210965', 'dragojr@aol.com', '$2y$10$70Sneny2QO4gCHeLN/Tej.pwvMAJ/Fojk./ksYkcEuL1MnatNqUBS', NULL, 'pending', NULL, '2020-07-29 17:11:33', '2020-07-29 17:11:33', 0),
(440, 'NKGgraFSzHZ', 'iDALxTtIR', 'end_user', '5133165041', 'nhall1@aol.com', '$2y$10$i0H1zlgEQwXeeDz0KxSKZuW7qCIkkxAjT8wNvPqUphaRtgLtjku7i', NULL, 'pending', NULL, '2020-07-29 18:05:46', '2020-07-29 18:05:46', 0),
(441, 'qzosKJiPCBfr', 'mYZhXDNqzKFW', 'end_user', '4520928221', 'bprice9506@hotmail.com', '$2y$10$z6nCJpiY0Ws1wDtnjc2tduliwDAbF1VKpeHTOFbffjgerZ1synekO', NULL, 'pending', NULL, '2020-07-29 18:57:49', '2020-07-29 18:57:49', 0),
(442, 'dtxpvJgFwU', 'XEvNaqTQUmJxCe', 'end_user', '4753694112', 'kimberlygreen677@aol.com', '$2y$10$Lu1Py4oVtjLK9ZOSYwvEiOY011HKEE2BBYRkajoKFriPnRVLysm46', NULL, 'pending', NULL, '2020-07-29 19:35:32', '2020-07-29 19:35:32', 0),
(443, 'phrzuQJcbFGSCxf', 'MXTRthvoYDGiC', 'end_user', '6208468278', 'pittsint@aol.com', '$2y$10$0O1fAI.HViv4DfUHp2el.OU8bkFPjPdqALdDgEO6VxAyuX9knEoR6', NULL, 'pending', NULL, '2020-07-29 20:03:11', '2020-07-29 20:03:11', 0),
(444, 'iKnsCchgjPH', 'ohQWCGTjYuXv', 'end_user', '9625839453', 'settindown@aol.com', '$2y$10$gVN27LEWX7xVw4PCH0w6dueXeFzNvzENWYBhTw3.iXyv29DHS1Gqq', NULL, 'pending', NULL, '2020-07-29 21:05:41', '2020-07-29 21:05:41', 0),
(445, 'LwWivykNGqU', 'jYUPvHwCacf', 'end_user', '3368651792', 'jcollibee@verizon.net', '$2y$10$XlRiqATZQoxUySDWXSmwaeb5dKfda8dmfPTxQHwir4MCU99.rk5wO', NULL, 'pending', NULL, '2020-07-29 21:10:05', '2020-07-29 21:10:05', 0),
(446, 'PMYrLcOI', 'pVwhJRvq', 'end_user', '3355413515', 'donj2833@gmail.com', '$2y$10$KMaVPNJN9IaOuOz664fsLOaYM0/G3/nUQV6tyBGXjv.fwt5Hk8aou', NULL, 'pending', NULL, '2020-07-29 21:15:44', '2020-07-29 21:15:44', 0),
(447, 'YFklrPBw', 'jCztDMXBWOAVGRyK', 'end_user', '3652600798', 'cifo@msit.us', '$2y$10$bHMuPjhIORwr/zpHkigwKuZTzun/4WintbEnkUxTTTYo0tHPVzYWG', NULL, 'pending', NULL, '2020-07-29 21:41:26', '2020-07-29 21:41:26', 0),
(448, 'UPlwdYqNyoTgWuMf', 'VkeajvpzxZ', 'end_user', '5004931778', 'liz.arceneaux@att.net', '$2y$10$R5zsaarA8mevVBg.82eWTOwfVCmWSLr4YczGdPAmiUzQtbmoKjTOK', NULL, 'pending', NULL, '2020-07-29 22:53:12', '2020-07-29 22:53:12', 0),
(449, 'scBtgfYPEGw', 'dGyMxSEkDXFRvm', 'end_user', '9941352722', 'tran_stevie@yahoo.com', '$2y$10$Si7psv2t/gvDo2wBKAdvzuW4ScChXgk0sZG2QydJKG8w9kr.bPpdO', NULL, 'pending', NULL, '2020-07-29 23:06:43', '2020-07-29 23:06:43', 0),
(450, 'rETtxAiFwKJ', 'kxtliIYnoEury', 'end_user', '8755958498', 'luisagarcia0227@yahoo.com', '$2y$10$e2CIsaEhkUTRVfx8.sjq9eDBbNGKHZ1gZF1acdSxAzbz2Fhlpzrwy', NULL, 'pending', NULL, '2020-07-30 01:41:13', '2020-07-30 01:41:13', 0),
(451, 'sgdeBHFyKkRxaJr', 'ItajPrLOkbRW', 'end_user', '5250843644', 'erlin5@yahoo.com', '$2y$10$IJztaBUx1i8hmZk.O4mJZe3vFh6AdbMLIISCvnxF9k6f1S8G.JKHi', NULL, 'pending', NULL, '2020-07-30 02:19:11', '2020-07-30 02:19:11', 0),
(452, 'WZFcoVlmgfJCTtdB', 'iRqJNAFzlepyS', 'end_user', '2001905122', 'rdrckbll@yahoo.com', '$2y$10$xzPWhLg6nIzZ2aOMH5Y/qOPgw.wqAsX2WYehf/IrmKf5CFg34GEzK', NULL, 'pending', NULL, '2020-07-30 03:43:48', '2020-07-30 03:43:48', 0),
(453, 'NtMZvIwyl', 'foWSmswPy', 'end_user', '9243394342', 'dwatkins5@satx.rr.com', '$2y$10$xT2peNVGq7eG84lsodhYquegpNecKKKK9Nv9XOHWGCmhXRtUf0Vta', NULL, 'pending', NULL, '2020-07-30 06:13:37', '2020-07-30 06:13:37', 0),
(454, 'bQFavkUJGXxt', 'mMATYfxBPdeVOs', 'end_user', '6037957576', 'jamielynphoto@gmail.com', '$2y$10$0DyKAJbepObBKA1U5eMui.8tZtQWNMSsY/lT0bBL2oW54wCQ4XAT2', NULL, 'pending', NULL, '2020-07-30 07:01:40', '2020-07-30 07:01:40', 0),
(455, 'IonehFOEcr', 'UWTnjYgCGHEIFfDt', 'end_user', '3126075857', 'reena.bochner@gmail.com', '$2y$10$Zv9TYsGxiyMJIP69xMn33unyGxdYssziBas/tHN/hHoPjw7MaZGri', NULL, 'pending', NULL, '2020-07-30 07:34:24', '2020-07-30 07:34:24', 0),
(456, 'vfPeIzjEwyD', 'lNqUbcFsKnrfAdE', 'end_user', '3077107113', 'kathyr2cu@hotmail.com', '$2y$10$JMCfmSuiuOTyh7GwypE9/.tOL5pKi6lzsiPUEra195oInZofXsxPO', NULL, 'pending', NULL, '2020-07-30 09:52:55', '2020-07-30 09:52:55', 0),
(457, 'rzwdgbev', 'GSBysaVYpTXnMWE', 'end_user', '7245115875', 'bholley88@gmail.com', '$2y$10$wTNAOm.xXwApttg3KV0qZOzuUvbDw/panBvdheLOujFjXaZDVp/nq', NULL, 'pending', NULL, '2020-07-30 10:37:57', '2020-07-30 10:37:57', 0),
(458, 'kigveWwUjHBLNd', 'ZMOzFbcl', 'end_user', '4846809306', 'nagynk59@gmail.com', '$2y$10$5gRv8RR.iz5nxPeugPGDSOGg3X1GzaZjV8cXxNZbaudTpywd/ofO.', NULL, 'pending', NULL, '2020-07-30 15:03:28', '2020-07-30 15:03:28', 0),
(459, 'YwPWeTdpBSkqAm', 'eqcLgBXjoNk', 'end_user', '6248117893', 'ana_cantu@rocketmail.com', '$2y$10$BJHL7Yv0hdrWHXpa2dLcKOaQ6380L77bjNhXvApniFHyQPJ1Zh8by', NULL, 'pending', NULL, '2020-07-30 15:44:44', '2020-07-30 15:44:44', 0),
(460, 'svOEIlbSmcD', 'lAXoCOpMs', 'end_user', '9163793457', 'mikabamgbose@gmail.com', '$2y$10$BQpfLsZHITGgKtOrLNdvgui.wCscIyyd.J67GZWpaDPLEs5QpIawu', NULL, 'pending', NULL, '2020-07-30 19:40:24', '2020-07-30 19:40:24', 0),
(461, 'kPnVqwFmOMj', 'OTmLBnsqldWyHp', 'end_user', '9547404063', 'ctedder@idplates.com', '$2y$10$u59s3Qyg/M58kVkwRzOMH.NL0WQvczMvtLOFerqRBfqK0erE5rIBu', NULL, 'pending', NULL, '2020-07-31 00:00:32', '2020-07-31 00:00:32', 0),
(462, 'QRaLGmINSlHWX', 'tzRfkyvn', 'end_user', '8212101887', 'thampan.joy@gmail.com', '$2y$10$9qXBm7SBE0.YorA/k1dxyeB6BzSNOrRQUNYjgUdjHUUkNZfzQBqii', NULL, 'pending', NULL, '2020-07-31 13:15:20', '2020-07-31 13:15:20', 0),
(463, 'KEgBQGHZD', 'OtcWvFKX', 'end_user', '8022482384', 'largo5@hotmail.com', '$2y$10$dIZKfLF1MlINWZn0qxCcluVHbD/k0QpH4KfdAvu/vTD9/LWN.FDKe', NULL, 'pending', NULL, '2020-07-31 14:14:10', '2020-07-31 14:14:10', 0),
(464, 'OdNBrCGwMqahYWi', 'WeLDlXsIrHwcC', 'end_user', '2873923813', 'dennisonshirley628@yahoo.com', '$2y$10$uKh8FC7ka5/O48Xxm2shm.iUjpEjZaK7Leu/kOluhF9lKMfT29no.', NULL, 'pending', NULL, '2020-07-31 16:33:15', '2020-07-31 16:33:15', 0),
(465, 'UurehQbRlVwjmXS', 'NolvyLjKSAG', 'end_user', '5474578151', 'williepb18@gmail.com', '$2y$10$mCNoXcbNCaNLk8vppPpGN.r8xy2Yr/7HrENGvV1YKy5WWgc9KAiX.', NULL, 'pending', NULL, '2020-07-31 17:23:11', '2020-07-31 17:23:11', 0),
(466, 'YsdmztcCKLD', 'gODNuiTGICbE', 'end_user', '3965409351', 'bschubert1979@gmail.com', '$2y$10$yPm8VJ1zMZyQIiZVIIbvB.3Gvqla0D2Wyl/AxwRb1Tx8pM5WHSQWK', NULL, 'pending', NULL, '2020-07-31 18:14:42', '2020-07-31 18:14:42', 0),
(467, 'rylJdLunsOcEoV', 'eULfsTwkjHCOxWKB', 'end_user', '9141010342', 'houghams@surewest.net', '$2y$10$oIoqkG/U/CW0GBzkS/MSluCvsp7rKu3NoVKmqrQLvhhmA.F/F6bee', NULL, 'pending', NULL, '2020-07-31 20:15:36', '2020-07-31 20:15:36', 0),
(468, 'IBfGAYOjwtoDyNR', 'TWQkvXGpNCPZhR', 'end_user', '9147636552', 'jvillasenor437@gmail.com', '$2y$10$0pSLMUhV5PMhbKaZXekMMugF2kktjuRP81MKbDGvm39tQC7p3gDlG', NULL, 'pending', NULL, '2020-08-01 08:44:06', '2020-08-01 08:44:06', 0),
(469, 'cCoKqeQkOpMXd', 'njXDFMVNlBLdsgax', 'end_user', '6234851246', 'soefclan@gmail.com', '$2y$10$POyBtm9PsRtFTDbtUIjtzemD3NiJWv5zsiKFN88i6JWe8ORk3dJ1e', NULL, 'pending', NULL, '2020-08-01 23:38:02', '2020-08-01 23:38:02', 0),
(470, 'xsfpzlrwD', 'EtbfzTYP', 'end_user', '9084544414', 'patbrooksher@yahoo.com', '$2y$10$IoLP7fyl6gBdSyyuls7alu4xgfuas09o/cTSw/8shWnsCeBYDKfdC', NULL, 'pending', NULL, '2020-08-02 01:59:11', '2020-08-02 01:59:11', 0),
(471, 'vUohtxHGBW', 'LyNisMxwICYBG', 'end_user', '9996441096', 'perry.liza@gmail.com', '$2y$10$gANB2yUVfR/8GedZ.qjQIuhqhBstuAngJyT2YbqUTX5UeLEK8QEAi', NULL, 'pending', NULL, '2020-08-02 06:15:01', '2020-08-02 06:15:01', 0),
(472, 'UiSBXDqCxbL', 'UMXcRrOlbGyNIWkV', 'end_user', '4958309892', 'sudharsan.raman@gmail.com', '$2y$10$c/cNTNutD1ljbAR7EdA2hepSpL4P1Dr7js1.7R46728m4TDfDxYUq', NULL, 'pending', NULL, '2020-08-02 22:03:14', '2020-08-02 22:03:14', 0),
(473, 'RJiXzPZl', 'UEsijANtLaVmf', 'end_user', '8186044310', 'kszitas22@gmail.com', '$2y$10$TEBPQr/71.fmq7PIl2sIm.TISKk1zvXUaThr9E6dHducj9chpJ3wy', NULL, 'pending', NULL, '2020-08-03 13:06:51', '2020-08-03 13:06:51', 0),
(474, 'IvNcwMXyBCAu', 'MduDnWUcRLFJezYx', 'end_user', '8211466558', 'sherry.chavez10@yahoo.com', '$2y$10$R1JI6SYFSVfH/zmhTGImJOYe2JXvFVfV/KQwrHahhdNQ0WslAAfA.', NULL, 'pending', NULL, '2020-08-03 15:12:15', '2020-08-03 15:12:15', 0),
(475, 'YBcnqmfLxpJMdIsZ', 'GeUSXdxJfkVsF', 'end_user', '8336493231', 'valerienolan@nolanchiro.com', '$2y$10$.e1H56n2.g5NoYYLK0PEpu2xDXtNBXVKH1BX3hBJ9DkPXFL4TENru', NULL, 'pending', NULL, '2020-08-03 17:22:43', '2020-08-03 17:22:43', 0),
(476, 'pnGBAKLklORYV', 'qoJhMwYpkRm', 'end_user', '7432847344', 'dmorrison@mainstreamllc.biz', '$2y$10$4BftbEZ.aSjjJSSghR0U/uQ5c/Br5WmVUdkZwJfgCPaOgJCzg0um2', NULL, 'pending', NULL, '2020-08-03 19:28:57', '2020-08-03 19:28:57', 0),
(477, 'UPzBOotnLDWj', 'KVeDqxuTUbzg', 'end_user', '7079078252', 'tazos_arrasando@hotmail.com', '$2y$10$X9HrF.znqYkMIRrzuKycDOJZ68a7cDe3uZ.xQ9uyKy2806SP6Sy6O', NULL, 'pending', NULL, '2020-08-03 22:04:13', '2020-08-03 22:04:13', 0),
(478, 'zkAnimLQ', 'wZKdDtJGxl', 'end_user', '6729195153', 'julieaguilar206@yahoo.com', '$2y$10$UIHsI1JiGfCbeDz8krUWe.V5Y9.xc0u5ttJhopinbIoFU6BOXslTO', NULL, 'pending', NULL, '2020-08-04 07:20:51', '2020-08-04 07:20:51', 0),
(479, 'jMmlVConDRB', 'LmFwQacyzUSV', 'end_user', '4925349215', 'kbsfishing@gmail.com', '$2y$10$Ooo7OMQs8em.2PUNx.wXWeYFizGpACTl7cY0TtqRrx1LiLvrHSDTW', NULL, 'pending', NULL, '2020-08-04 07:31:48', '2020-08-04 07:31:48', 0),
(480, 'lmLMoHsEfRWeU', 'ebDxzXZRG', 'end_user', '5702965152', 'chrisant91@optimum.net', '$2y$10$6UvQA0t7I2qQoZ5fKpfXEubeEcEkRDLzhOkfVxXBFa2SdW.lNhSwC', NULL, 'pending', NULL, '2020-08-04 07:50:16', '2020-08-04 07:50:16', 0),
(481, 'KfzSCaFEvNVTJ', 'GgOZrtCQxDpLE', 'end_user', '4467673487', 'jonro1997@gmail.com', '$2y$10$zJ6GUdInigVWEWpof9P3vOQV4d58SVikFeKK1I3eRxfRRIkl5pr/O', NULL, 'pending', NULL, '2020-08-04 08:02:00', '2020-08-04 08:02:00', 0),
(482, 'blLpZUhgIwnK', 'kLhlKJsUyVxn', 'end_user', '9250472279', 'willmyzhang@gmail.com', '$2y$10$isVqAkw2tzuuOY3dkSFi6eRj4J3.ELy2sg.1BO2ZbWxivbEfxp/Cm', NULL, 'pending', NULL, '2020-08-04 08:53:39', '2020-08-04 08:53:39', 0),
(483, 'zXebTaKLJjCnO', 'glWzsXpZBxQPykei', 'end_user', '7511175658', 'carlr22@yahoo.com', '$2y$10$E9VIxjhazl87kdwZn0mM4OENCWPsXqNjSHxLPWcpGEcB7UrKEv/E6', NULL, 'pending', NULL, '2020-08-04 12:36:02', '2020-08-04 12:36:02', 0),
(484, 'GkThCpaLRWi', 'CpWNhAdgIo', 'end_user', '3545564670', 'debaker2@hotmail.com', '$2y$10$MSFA2xrm/V5BqphM5z17ku4UHb9/DglpXpRO3LUf3K7HhFi5ufu7O', NULL, 'pending', NULL, '2020-08-04 14:19:59', '2020-08-04 14:19:59', 0),
(485, 'JQTNteiq', 'UQKuIxtWaEPsg', 'end_user', '9024982412', 'mvn-swimchick@cox.net', '$2y$10$JtlTkeyb1T.wYIi0RvHtf.lmMbskcuWytEx5l3bNIC.XvB2xbcB.O', NULL, 'pending', NULL, '2020-08-04 19:03:09', '2020-08-04 19:03:09', 0),
(486, 'LSbzXaMgIyRJEvP', 'koNFxtjDPrYKT', 'end_user', '5622720327', 'daniepreston78@gmail.com', '$2y$10$oLOuKkGVejBrRGz3kwSg9OE/yk1NTLhEZztqpKuYV6SSQ.L38XHsK', NULL, 'pending', NULL, '2020-08-04 19:10:12', '2020-08-04 19:10:12', 0),
(487, 'BpJVSDZtdj', 'jhtYHrfM', 'end_user', '3582184624', 'jbell@itoncallinc.com', '$2y$10$q7yJO1Git0.XBf2qbyILiuPbDgsTVaDHcfk1XVcUC4mAkgkMFqPHC', NULL, 'pending', NULL, '2020-08-05 14:12:09', '2020-08-05 14:12:09', 0),
(488, 'pLEsfIJlYSeGQw', 'hRAsMITf', 'end_user', '2054250806', 'teresamonson2@gmail.com', '$2y$10$tLitW3CynyucTCjoljiWx.POZvo.oO557xu9ARIFPFHaB.DGMdMNG', NULL, 'pending', NULL, '2020-08-05 15:32:47', '2020-08-05 15:32:47', 0),
(489, 'cjXQEgmoHVUIDON', 'IpqaeXAHditVhmUj', 'end_user', '5719968120', 'mh41235@gmail.com', '$2y$10$psr0u/YRGrWTBZ2B4tSoYeFphdXoeA.DxxI5zRzvPGbUtd6fYWM/e', NULL, 'pending', NULL, '2020-08-05 16:13:46', '2020-08-05 16:13:46', 0),
(490, 'rYdDvBITaR', 'GoedJgcnAzYPbNr', 'end_user', '6587422803', 'yaliaherrera@gmail.com', '$2y$10$CqeUaPoJmXbAxipGLPtQLu9jcKU87hnYCcE9vYChHm/sP.NgcgsGO', NULL, 'pending', NULL, '2020-08-05 18:55:53', '2020-08-05 18:55:53', 0),
(491, 'EluTxZmtfHWjDz', 'lJGNPzpkchibIxy', 'end_user', '9591251252', 'grahamnickel13@gmail.com', '$2y$10$vvN3g0f18FGGP/f7nhlW0.Gz8gSv7Xf5lJoqIznvQybo1GfeB3OXW', NULL, 'pending', NULL, '2020-08-06 00:01:16', '2020-08-06 00:01:16', 0),
(492, 'gIWebcnMrhGLR', 'GSOUFvrm', 'end_user', '2495560532', 'lsherburn@hotmail.com', '$2y$10$eA4k7Ucbt915YEuBAVedXe1Q1zZXmCJeLvr1r/YRmezxzqYsO/.0S', NULL, 'pending', NULL, '2020-08-06 13:50:50', '2020-08-06 13:50:50', 0),
(493, 'cWxzuvBTMtNVi', 'QaLyhiTd', 'end_user', '8146756923', 'm.pedro1@hotmail.com', '$2y$10$/Xa18ZHMpZreeSKQ8FDlzeGDnaZUPscTNoGsWXT7rXEljQzMkXy4i', NULL, 'pending', NULL, '2020-08-06 16:43:51', '2020-08-06 16:43:51', 0),
(494, 'EgbiWIcsVHTpAf', 'UEadeVorNubFfMB', 'end_user', '8051818190', 'deborahsorel@cableone.net', '$2y$10$jDcV5X.U4sg1VyngUtijgezygkurfUDCnWMuzf/AFtkwkOXGAaQ9W', NULL, 'pending', NULL, '2020-08-07 01:48:50', '2020-08-07 01:48:50', 0),
(495, 'IifBmOUXFy', 'GhoSHMXrPb', 'end_user', '5946098588', 'brown_sarah63@yahoo.com', '$2y$10$fL11LaXdoZSWVaowz/2IWOv/zQ/NZw/J9njbGUwpk0AaMRZivd.aa', NULL, 'pending', NULL, '2020-08-07 04:29:06', '2020-08-07 04:29:06', 0),
(496, 'ePZxpabBlUVCh', 'eGAdRxNiLXnpz', 'end_user', '8955669909', 'adams_daniel48@yahoo.com', '$2y$10$nhXV/Wl39slbvymYVRsG9ezY4pQqZOAgdRt11B3jHGFAW0KIq77K6', NULL, 'pending', NULL, '2020-08-07 09:54:41', '2020-08-07 09:54:41', 0),
(497, 'hPtRsQfJpMmwe', 'wOIQehbcAqxYC', 'end_user', '6444167057', 'klye@nwbio.com', '$2y$10$.OpwO.iyT8uu0tCNOOku8.sdTMcdDMoWYdLNulgbgwtrcy0MXuy5K', NULL, 'pending', NULL, '2020-08-07 10:05:05', '2020-08-07 10:05:05', 0),
(498, 'eBHRmbXjc', 'cUBxbhpDfmwuAPi', 'end_user', '3867948543', 'wayne46sanders@gmail.com', '$2y$10$ADSNU2AiHq8.VPyqIRPtKeSrc44SUNbWtZoNY2u3jhOG2ZuyXepqi', NULL, 'pending', NULL, '2020-08-07 11:07:06', '2020-08-07 11:07:06', 0),
(499, 'qiGuDaFNT', 'yoFbSQOnK', 'end_user', '3297103017', 'kevin.lye@gmail.com', '$2y$10$ApNLuey5bH2cO/3u1bmq8ucOLdO4xIfQZ.LLndEm5IbdvrqlAP/Rq', NULL, 'pending', NULL, '2020-08-07 12:14:35', '2020-08-07 12:14:35', 0),
(500, 'atJEZQBlsqoG', 'rsdwlWqBFQEzgm', 'end_user', '6569634512', 'craigporter3@gmail.com', '$2y$10$1pXiPambR8RBZNiKOV3J6OJMVpc7O8T/BhDKrINvAHbhK3AcmNRdy', NULL, 'pending', NULL, '2020-08-07 15:05:49', '2020-08-07 15:05:49', 0),
(501, 'UoJHNwutnkdmGAD', 'hBTaCiRoYEjyUX', 'end_user', '9087705288', 'leek64@unlv.nevada.edu', '$2y$10$vxiqXdPpzUPjWdcjH.wB..roEZwxTFUxpxq9LTiBYKvFNNaHCvMuu', NULL, 'pending', NULL, '2020-08-07 16:23:27', '2020-08-07 16:23:27', 0),
(502, 'xTzXguJQOHZoV', 'lpkWELHyzNJ', 'end_user', '4710606778', 'gordonmccarth@gmail.com', '$2y$10$PKofODioMlnGGFWObuMv6OaRTyCASPiXeVOy7yNYRCA3OAQa8q6OW', NULL, 'pending', NULL, '2020-08-07 17:41:46', '2020-08-07 17:41:46', 0),
(503, 'jUgoeXfGibQA', 'bPpJRkhqeS', 'end_user', '6334854238', 'usnavytank@gmail.com', '$2y$10$MMr6GlfxpVBb/eCmDadU5OR/7G/du1Dt2KEolpsNpSQ80ESuhcuqC', NULL, 'pending', NULL, '2020-08-08 04:06:48', '2020-08-08 04:06:48', 0),
(504, 'MelJwbWBxUrZFHmc', 'jMiGPAmkwX', 'end_user', '3216806585', 'ivan_parra17@outlook.com', '$2y$10$DHmL69Ym7ET6fEfMgp8iO.9yA/1MGsFrfOO6vy7F2QISbaw41Pn5i', NULL, 'pending', NULL, '2020-08-08 05:25:23', '2020-08-08 05:25:23', 0),
(505, 'KaCjgsmwTOPkidX', 'vyDnjMfuC', 'end_user', '9665997828', 'lcoffey_1@hotmail.com', '$2y$10$ADV9TazF1H4d3TqvRHv2jOHn79pnU3N3kIJV4aWwwXO7NkFUcXvRu', NULL, 'pending', NULL, '2020-08-08 14:38:06', '2020-08-08 14:38:06', 0),
(506, 'nCjNwciF', 'IipvQmGcBJCekMH', 'end_user', '3198039032', 'marahurd@gmail.com', '$2y$10$mdPJEIFGHb3UnuzvUGE9LuxECaV.MjZTF3/fJiw5Cr.5Ck6DU1bGi', NULL, 'pending', NULL, '2020-08-08 19:06:11', '2020-08-08 19:06:11', 0),
(507, 'wtYFMorLcl', 'ckDuPgEFfJproti', 'end_user', '4308138798', 'jlmccaslin@gmail.com', '$2y$10$iqLQZlyEGL5KQLM2xSEijurqhlvib7Xsse4Kiua3DdrlTsqgvf5we', NULL, 'pending', NULL, '2020-08-09 08:13:08', '2020-08-09 08:13:08', 0),
(508, 'aNCnLopS', 'jyaxPArNE', 'end_user', '4781703978', 'jbrentmarple@gmail.com', '$2y$10$HDSmwiVsolXlOfFpUZ1mwe6OqHCRSx1AYs2iA.5ITc8fl83qwpuR2', NULL, 'pending', NULL, '2020-08-09 17:32:24', '2020-08-09 17:32:24', 0),
(509, 'ilZEbtchOTMX', 'QDVXzgwqsi', 'end_user', '2601678444', 'reddveronica501@yahoo.com', '$2y$10$Akd0JhcQygFW9CLRZVizvOr/yxEByNnp8mK1eEpKGMfFwqKcw1eXK', NULL, 'pending', NULL, '2020-08-10 03:16:11', '2020-08-10 03:16:11', 0),
(510, 'rjLDzGFxlEtP', 'IWFlwKZCtfVyuYv', 'end_user', '4023448063', 'mancool33@live.com', '$2y$10$oA1hCHeEqvOUeLs8SIqL.uhaNHr4.DMVjGfgfaJgNwtpVt.VgY2ui', NULL, 'pending', NULL, '2020-08-10 13:23:14', '2020-08-10 13:23:14', 0),
(511, 'XmnLZzJjCT', 'TwEkoOibdjG', 'end_user', '3190005608', 'pdalbery@gmail.com', '$2y$10$yOJ4/SZoUY9Y.0RUuTdIp.s.VJMrcTmJ98y8T4brLQcKY6le9Cr0m', NULL, 'pending', NULL, '2020-08-10 17:46:19', '2020-08-10 17:46:19', 0),
(512, 'RrQbEwqPdBKflhc', 'KnvPdgVesADba', 'end_user', '7919513067', 'robinitaly@hotmail.com', '$2y$10$lGOjJkVKpMw.8XOAU8Z4Ze7YQ/0iBkCpTAFmaqdwQKIWy4CyhT6WC', NULL, 'pending', NULL, '2020-08-11 02:33:10', '2020-08-11 02:33:10', 0),
(513, 'kcZKqUsSPlvGhHBr', 'odfIQzpGemsCrwW', 'end_user', '2666112129', 'morgneric@gmail.com', '$2y$10$wEowGNwZraRqE8JGv/xh1Ocp08Q3W9uVvn9U57dd0MWT6eCS.zcKW', NULL, 'pending', NULL, '2020-08-11 03:21:42', '2020-08-11 03:21:42', 0),
(514, 'pAQhdPSkVDRUae', 'pxhFrWEN', 'end_user', '9272053625', 'rmarks14@comcast.net', '$2y$10$PBrWlthtphDpUk1FdVyuGuvONQmJgruHUAnhUwkiCszsDZFPUB9aq', NULL, 'pending', NULL, '2020-08-11 13:18:59', '2020-08-11 13:18:59', 0),
(515, 'fPMlLpWBkhdcHCg', 'GLmFJaSO', 'end_user', '4049951993', 'brettzo6@hotmail.com', '$2y$10$hyy3iszysbv7KH.yF3VPgehipbWW85CHaA26U4PiBntpWTj8kR2d2', NULL, 'pending', NULL, '2020-08-11 14:40:06', '2020-08-11 14:40:06', 0),
(516, 'jTJBdOvSLkozb', 'FNcuPDOmgqEBhx', 'end_user', '5221704995', 'cierra.suzanne@gmail.com', '$2y$10$0y9ZBD4kwJlF45BJA9RknuS.N8ioa9WS6HRJOAyQ8ObPV8Sx9ZZcK', NULL, 'pending', NULL, '2020-08-11 16:53:08', '2020-08-11 16:53:08', 0),
(517, 'SDfdsgzamxvG', 'bDJtfhsFCpNPl', 'end_user', '9442960125', 'kristystaggs@hotmail.com', '$2y$10$WY8ElaYA36kRYXmDrXrGAeB3C4OQLz6W55Ja7QHTw3VI6rjeZNH16', NULL, 'pending', NULL, '2020-08-11 20:16:53', '2020-08-11 20:16:53', 0),
(518, 'waIVJyUDSiCbt', 'fLcXNjKvaHg', 'end_user', '5066544795', 'nora-ordonez@hotmail.com', '$2y$10$8fWq4i0zIXQlmj6sT8mz8OFrFi/6buAVYW96udA2q2I.dIN6vENnW', NULL, 'pending', NULL, '2020-08-11 21:58:32', '2020-08-11 21:58:32', 0);
INSERT INTO `users` (`id`, `first_name`, `last_name`, `user_type`, `phone_number`, `email`, `password`, `creator_id`, `status`, `remember_token`, `created_at`, `updated_at`, `verified`) VALUES
(519, 'lMwyOjGnY', 'DmBOXQnuE', 'end_user', '4077627144', 'quinn.stamper@icloud.com', '$2y$10$UUIxho1COHIriDLfkrEzO.rZQYJpTI69tPVV7IjNgYHLPurEwltN.', NULL, 'pending', NULL, '2020-08-12 01:54:06', '2020-08-12 01:54:06', 0),
(520, 'TiLrFbtOdJaoWDlv', 'CERlNHiLGdTWArtw', 'end_user', '8563867704', 'jcpetrie@comcast.net', '$2y$10$1yhjc/lAHph9B8ykyw4qX.qTaf4FMYWa4BIfn/XboGGapCiVHlouO', NULL, 'pending', NULL, '2020-08-12 15:13:09', '2020-08-12 15:13:09', 0),
(521, 'rKflkTmp', 'jBaNxFROm', 'end_user', '5362970984', 'dacia_dunlap@yahoo.com', '$2y$10$qIEMtQNdni2N9mtXN.oRC.OPpDhN2eY7a5ZdZiNavxcO/QkoCmWfW', NULL, 'pending', NULL, '2020-08-12 15:37:48', '2020-08-12 15:37:48', 0),
(522, 'DLZaCwdxqJKXU', 'YzUOwqBuletrRV', 'end_user', '6923508309', 'hanley08@gmail.com', '$2y$10$7VG2wQiThDFOUl2tdM7gA.KTB0/q2mQwDudxHGjhomCnaUd61zloa', NULL, 'pending', NULL, '2020-08-12 15:47:50', '2020-08-12 15:47:50', 0),
(523, 'OgEzmAqPeYMXVdGk', 'RXBYvwya', 'end_user', '9375474638', 'msparks05@hotmail.com', '$2y$10$yBROgGpTGig7A.JbhUf5oOtHAnwLyBKtXPcMas7UV2UAnl3o7/6vO', NULL, 'pending', NULL, '2020-08-12 18:49:40', '2020-08-12 18:49:40', 0),
(524, 'KRvHXhNzIQ', 'RBTAxYVuLo', 'end_user', '9224730367', 'dietzgenw@yahoo.com', '$2y$10$vMCx4/vBTTum6Oq4oA02CeNL3Sue5XV1ot4arm12sSICk0q2tgf72', NULL, 'pending', NULL, '2020-08-12 19:42:50', '2020-08-12 19:42:50', 0),
(525, 'rICFKjdl', 'IaHWTRoi', 'end_user', '6218391623', 'boweslyon.julissa@yahoo.com', '$2y$10$lc9KyHhnIj7POK8qyZx/3um2DHg7UYTnwty1ZiZdZLTugCOGwxkwq', NULL, 'pending', NULL, '2020-08-20 18:57:23', '2020-08-20 18:57:23', 0),
(526, 'SmyHZegGuFsfE', 'bMXvURQNFKtVmn', 'end_user', '9368539224', 'stimson.christine@yahoo.com', '$2y$10$HYTDAZhoeS6h7K0AruD1s.sAYD8f7nujEearn/t5MCwJQ/22sKTDO', NULL, 'pending', NULL, '2020-08-26 13:53:05', '2020-08-26 13:53:05', 0),
(527, 'xqDXBoPcZO', 'ojfGYcdk', 'end_user', '2041442166', 'johnwillis8939@gmail.com', '$2y$10$wq8vuaswr19g2U0yFELFoOIJOTvAhcu1.o5zaFexonK9B7R9FaHOG', NULL, 'pending', NULL, '2020-08-29 08:39:13', '2020-08-29 08:39:13', 0),
(528, 'qWlhxODoZnwAy', 'LmYMlKwguZRsta', 'end_user', '5927921615', 'sumtercotman@gmail.com', '$2y$10$CYE7KQC6P1AF8C.RdSTmXO5pZZpAmABvl9ikLBBJ0QIcm5zsucpEy', NULL, 'pending', NULL, '2020-08-29 12:05:41', '2020-08-29 12:05:41', 0),
(529, 'UZlsPDSnOfrGagCq', 'FPhVoLdMNCknfT', 'end_user', '4531814465', 'cynthia.fernandez93@gmail.com', '$2y$10$u2uItA62EDZUqRkd7oTQ5u.xiwSV7CbSyuls552vwOC01IhD.k.3W', NULL, 'pending', NULL, '2020-08-29 12:21:32', '2020-08-29 12:21:32', 0),
(530, 'rRCctyYVwLTsUKPz', 'HhLZEkgwRGOI', 'end_user', '6539390037', 'mandyaz82@gmail.com', '$2y$10$rjDtShI0z/Wtvn71vRS35uzDp/2Wf9wpYJnShtgLNPftsIFVKONPm', NULL, 'pending', NULL, '2020-08-29 14:41:46', '2020-08-29 14:41:46', 0),
(531, 'cbYOhrBAIX', 'iUJQDXrHznjZxTY', 'end_user', '4852020207', 'nsilvadelrio@gmail.com', '$2y$10$2yczSqFIwbCSjxMQ/T3cFuRFEE9qvsKQpYaepUtzvenliU7IAVrI2', NULL, 'pending', NULL, '2020-08-29 15:04:43', '2020-08-29 15:04:43', 0),
(532, 'xtkSgEQdOof', 'JhPkVxKMgL', 'end_user', '3385197167', 'lori2409@comcast.net', '$2y$10$4mex5k/k/.nLsKuLU/iIB.XJblRST64pFAaZ6FMcCxNKSco.eX0tW', NULL, 'pending', NULL, '2020-08-30 22:46:23', '2020-08-30 22:46:23', 0),
(533, 'AHdqIzOpEFjQDNgy', 'ygotVdIZbzpQHW', 'end_user', '5947405385', 'elaine@prospectivetax.com', '$2y$10$rs2CfkvevZ4saIF.RE.LF.qErxduffnwUHIIcBpThkOS6bOcgQLnC', NULL, 'pending', NULL, '2020-08-31 01:47:35', '2020-08-31 01:47:35', 0),
(534, 'kutKVaLGgY', 'LxTpOPQbqAW', 'end_user', '7211082368', 'rsaposh@gmail.com', '$2y$10$WV5XvTd8wN.FayxJsR4Iw.lIPYU1e7F5D.bV.AUl/TumTwp9IpDrS', NULL, 'pending', NULL, '2020-08-31 04:56:28', '2020-08-31 04:56:28', 0),
(535, 'IwWdmolMUSKrjCN', 'pXJQyeHgfkV', 'end_user', '5087061758', 'duckyfactory@gmail.com', '$2y$10$XErekGEWUL9xPe4wJ6aZrOt/Z.lGabj8vK130bVGLpZrOjZ4Ij1ay', NULL, 'pending', NULL, '2020-08-31 11:02:54', '2020-08-31 11:02:54', 0),
(536, 'dKXrGRJaYsxOeEA', 'wDKkxREWm', 'end_user', '5325692616', 'roxannabunny@yahoo.com', '$2y$10$VjZ4jdJpbGuYZujjuwQcKOa6NJXuTDoMUe0ykbjLvGNhVefnk6wce', NULL, 'pending', NULL, '2020-08-31 12:36:28', '2020-08-31 12:36:28', 0),
(537, 'NOtfphivbdEZxT', 'NrUinFTBEXHmdI', 'end_user', '7579622761', 'halfountainsr@gmail.com', '$2y$10$m9sAkCeUHTLcCNfl//wVbu1531gPANAcwY7fxzJB8J.bFW07tdSlq', NULL, 'pending', NULL, '2020-08-31 17:05:56', '2020-08-31 17:05:56', 0),
(538, 'yxMEFdgNmHl', 'hOFLalAIfdT', 'end_user', '7822711193', 'bchenry1957@gmail.com', '$2y$10$pObizpNKPHGu4QGQQQA0Du5pXlhon0jGNUnS5BSMbOFYxtIQi0zVS', NULL, 'pending', NULL, '2020-08-31 20:03:03', '2020-08-31 20:03:03', 0),
(539, 'wSnvMXpIKaNr', 'phziwAygIcuLxvN', 'end_user', '7297817319', 'jkjconrad@cox.net', '$2y$10$yXSOmLtiAwuMAlhpEJkg/unc03hO/1kPi0yS4TkGrtBJ1PcEbcxYW', NULL, 'pending', NULL, '2020-09-01 04:25:42', '2020-09-01 04:25:42', 0),
(540, 'RqCfQLVUXjP', 'MtoXbiyYx', 'end_user', '8309676984', 'nereaga_4@hotmail.com', '$2y$10$7DaE1r7FhvE9ox0C7F9dgekhYlvDGIRvgO5IQMpWr31LGjB/ATHaa', NULL, 'pending', NULL, '2020-09-01 06:13:21', '2020-09-01 06:13:21', 0),
(541, 'CygbmIeEpT', 'BCPnHcgJqpXNxr', 'end_user', '6076833678', 'calikent0412@gmail.com', '$2y$10$LpF9ROFp.OIGvH3dRPzwpuMFxcf9kP9xRstQwJAab2.Hk9IapCxMC', NULL, 'pending', NULL, '2020-09-01 06:44:16', '2020-09-01 06:44:16', 0),
(542, 'rVYokZjpWStQv', 'dIyTqQrMXmfgcna', 'end_user', '9111190281', 'pberndt@tamu.edu', '$2y$10$jPwWUFmNETGyjK2rni.a6.f.0Dwgih7Te7QouJkKFP/mT3AnE9DTu', NULL, 'pending', NULL, '2020-09-01 15:38:34', '2020-09-01 15:38:34', 0),
(543, 'QcglkpuThP', 'sFNtwHAGYogJPfcD', 'end_user', '5632177017', 'simskiellc@gmail.com', '$2y$10$56EquQZcUo08ram5wiJP..vZoqZSBTXSFchue0up1/GCW8bkXGM6e', NULL, 'pending', NULL, '2020-09-02 01:14:00', '2020-09-02 01:14:00', 0),
(544, 'aASBgjnORbQCNk', 'AkmuhdYWqM', 'end_user', '6908971897', 'chingo.nc@netzero.net', '$2y$10$9BVTyPWnibjjjWzchV9GeOCQNtKaeIQ8NfgDryN5Idmmgg2yv6mmO', NULL, 'pending', NULL, '2020-09-02 03:18:43', '2020-09-02 03:18:43', 0),
(545, 'cTFeVUwt', 'MDCdeoSQyiZI', 'end_user', '7888624925', 'randyzeek@gmail.com', '$2y$10$5UPcPwToRkX86wGVivzu6uiF7RQBwwz.BI7x5lUcRPcxzkAhz1MYe', NULL, 'pending', NULL, '2020-09-02 07:21:52', '2020-09-02 07:21:52', 0),
(546, 'dwLRZgkmjEucTf', 'xldvaoDHbrhqjU', 'end_user', '8505234650', 'djfregos@gmail.com', '$2y$10$TMEz8YMzRvgg3NOUx7nZP.iV9PWnYL7XV77REmupnqd/WlGFV7Xjm', NULL, 'pending', NULL, '2020-09-02 07:37:31', '2020-09-02 07:37:31', 0),
(547, 'kDUTZMOrjaWsxS', 'avoXSUBtPzcqE', 'end_user', '5171925950', 'beckstrom@ecsellinstitute.com', '$2y$10$.xN.O81WRGMx9laANmhyjefjgtTq1Jk1.OBTnGR0dCxghU/3N2FQy', NULL, 'pending', NULL, '2020-09-02 10:36:30', '2020-09-02 10:36:30', 0),
(548, 'nGrOVjyRpMNvxKC', 'wdcKkmvzxJtbUST', 'end_user', '2471093450', 'purplemoon239@gmail.com', '$2y$10$nhesNkwEftiJGpYXRZfMM.8Wl3fawMO/ii7BqxQNBgfNQ92hARSPy', NULL, 'pending', NULL, '2020-09-02 17:01:08', '2020-09-02 17:01:08', 0),
(549, 'lZLdcXoIpuYEsrmT', 'hCgXaqntwdzQG', 'end_user', '3515433050', 'gonzalezjohnpaul@me.com', '$2y$10$WD7AfYxJCh4/hNWbGSDJHOO0GaucrgpmntuzUjz8pbzTMcTqZy/4i', NULL, 'pending', NULL, '2020-09-02 20:44:14', '2020-09-02 20:44:14', 0),
(550, 'AhIZgXqRUJEfn', 'EctxSYPpZieGd', 'end_user', '7248063273', 'shawnakeehner@gmail.com', '$2y$10$oAamAbTlE3KQjJo19dWoY.Kxkdu3F2MAfNY4nfpqYeO19ZkxFxEny', NULL, 'pending', NULL, '2020-09-02 21:12:53', '2020-09-02 21:12:53', 0),
(551, 'nLFrKZxPMsASgkjy', 'vngHxlQVKs', 'end_user', '9838481382', 'alex@themarblecenter.com', '$2y$10$DFFGedlDEFiJGAKKjH5R/uqm60yaEVp5Mm6ukRpZgPY12GCLEikRK', NULL, 'pending', NULL, '2020-09-02 22:09:01', '2020-09-02 22:09:01', 0),
(552, 'TjRHpNQCOXVI', 'edRoBwDcQZ', 'end_user', '9286596681', 'heidimartin7575@gmail.com', '$2y$10$JOg2YzLJtHxv47THto469uGxIN6Ce6Hl5AtRLYiPORLwV7.EutYi.', NULL, 'pending', NULL, '2020-09-03 05:01:13', '2020-09-03 05:01:13', 0),
(553, 'EwWTUuqxGQIslVA', 'nwVbcDBvTEHzjhMf', 'end_user', '7881671663', 'smchugh527@gmail.com', '$2y$10$33BIFFRw1khOXu4ohLyhI.dFXve963uuHeDQeNUL37Z2gq3zpdHCq', NULL, 'pending', NULL, '2020-09-03 10:42:37', '2020-09-03 10:42:37', 0),
(554, 'RpnAaVjzx', 'qvmoInPjBFhUKSg', 'end_user', '4809941264', 'jrexo97@gmail.com', '$2y$10$mVlG0FEeZ5D0PjZrbO/6xu0vmvt9p85DxMJDNuKbv2SMBr/8EcAhG', NULL, 'pending', NULL, '2020-09-03 11:10:49', '2020-09-03 11:10:49', 0),
(555, 'NuTgXQOqA', 'cMUlzVWbidRwyGS', 'end_user', '4706257620', 'indirahorton@yahoo.com', '$2y$10$zXS8lTKWHC0kU7lE2HdQ3.53gUGTkTmxVG67lTYj2ofEVI5kbW8VC', NULL, 'pending', NULL, '2020-09-03 11:30:35', '2020-09-03 11:30:35', 0),
(556, 'hPmQicNVOYByLaK', 'uOvpbcSQJPTD', 'end_user', '7805105346', 'sophielpobrien@gmail.com', '$2y$10$bzOt2TjrgmLAOrMFlDNcweZ9kpRE.f7E6xH9QGDLvmOC28FDIFcG.', NULL, 'pending', NULL, '2020-09-03 15:01:12', '2020-09-03 15:01:12', 0),
(557, 'OpXNcGVrklTaMfW', 'kVXKQbOIDPGUM', 'end_user', '8979677559', 'pasdairy@windstream.net', '$2y$10$Ynyy9QxOmFKSjSGiEDW3i.ielQUieuI7wc2BrVEjOtHidrTZg39lC', NULL, 'pending', NULL, '2020-09-04 13:49:27', '2020-09-04 13:49:27', 0),
(558, 'IjZJxDKPUzdTrAwF', 'oLAJslraTGIjKu', 'end_user', '2160118815', 'benderrecording@gmail.com', '$2y$10$ByRgd.Ubs5tqX56SYTr3rueZqsvtzOIJkROcsiX1tvu9YIsXV.SfW', NULL, 'pending', NULL, '2020-09-04 14:06:14', '2020-09-04 14:06:14', 0),
(559, 'BQkZfsoEcxFbOWt', 'vSYEXGmkxpwrs', 'end_user', '5357978932', 'jukka.kiviaho@gmail.com', '$2y$10$cgQFtxYwVTPxL.BG8hq/2.m3BaDYfjrLr17ABXfaloaf2w4WAP5km', NULL, 'pending', NULL, '2020-09-04 14:18:42', '2020-09-04 14:18:42', 0),
(560, 'MLbiSvXZuhf', 'LoNsXfhgzpYwIKAx', 'end_user', '4338331050', 'drew.frasch@gmail.com', '$2y$10$PdtjVEuayTLJ9nfnNbw2Qu1hZe3jT8uW86QlZaXeGbMT.JFUOhjaK', NULL, 'pending', NULL, '2020-09-04 16:30:46', '2020-09-04 16:30:46', 0),
(561, 'tdrxTfEDBijCa', 'uHrsAltgwec', 'end_user', '9780491360', 'honorjk@comcast.net', '$2y$10$YXlocsxLAWBMoTL0dqJeHuWlEOYa7LZ.LHwMM0WE19vedpQCn9zvW', NULL, 'pending', NULL, '2020-09-04 23:26:50', '2020-09-04 23:26:50', 0),
(562, 'EoumFTJxgeBnAS', 'wGHuRemDKgXbhT', 'end_user', '4943237527', 'ukicc7djsminhan@yahoo.com', '$2y$10$WJTzTVANydO7Zhx.BTJY/e6bhkILB2VPtgVGEi8Qnpv1xvpxMmdva', NULL, 'pending', NULL, '2020-09-05 03:15:04', '2020-09-05 03:15:04', 0),
(563, 'JCmgOnltNwyBqM', 'JzqGpChWVTKPtS', 'end_user', '4394263132', 'sfloratos@comcast.net', '$2y$10$UvbVGx8D4LOqIjyKP5TQ0eQlzOScJcoo6pIGTJ/sKLweahn4ej8Fa', NULL, 'pending', NULL, '2020-09-05 04:24:51', '2020-09-05 04:24:51', 0),
(564, 'IdKxnQojMgbBS', 'pJWyzBfQm', 'end_user', '3725840498', 'hoesch8admBasavanahally@yahoo.com', '$2y$10$cyUdOVdKUFW6uk8sfkdXyONjG75/GZocr3lkog3M6w7DLrcqEE426', NULL, 'pending', NULL, '2020-09-05 08:41:48', '2020-09-05 08:41:48', 0),
(565, 'EYuKZIpqWlh', 'VaphEtTedczm', 'end_user', '7774424312', 'anbroz2@gmail.com', '$2y$10$WzSGFsPqmF2aeCj9WmBiweqJQdbCf7ItZJprIi2pzPpU6I3kVEVOm', NULL, 'pending', NULL, '2020-09-05 12:25:36', '2020-09-05 12:25:36', 0),
(566, 'AJeGakWzyInEm', 'pWQbRtlMOx', 'end_user', '9054877804', 'zeimentzV5idQong@yahoo.com', '$2y$10$eVV9wA5ZoH5sK9VepVVJ6up86sGcQT99zLXPRWYMmEYstHwk.Pbda', NULL, 'pending', NULL, '2020-09-05 17:02:16', '2020-09-05 17:02:16', 0),
(567, 'vfOSzUlx', 'nVvEdQKIGSUtqg', 'end_user', '8301975358', 'ccr780225@gmail.com', '$2y$10$KpSXvGbr/rDtMhxGcX.yZeePy/fsXjSY3aBcdLIeukBfTgGJmdqCi', NULL, 'pending', NULL, '2020-09-05 19:22:37', '2020-09-05 19:22:37', 0),
(568, 'zRXVoQMaOxABh', 'BnCqIJbSVsfmRhHr', 'end_user', '5573498878', 'hopkinsgodfrey24@gmail.com', '$2y$10$61EHcFXqBMKh03ugY2WTAOvSAfY8Fk25BK1w8a5qeFUsJaSFWeuQi', NULL, 'pending', NULL, '2020-09-05 20:54:21', '2020-09-05 20:54:21', 0),
(569, 'SFtjcHiy', 'MqwgmkshWceObY', 'end_user', '2419860275', 'nissa.pirani@gmail.com', '$2y$10$JK8mzkkW2hr6x4CaLoV7O.Kv/9piQzzNEuSrnmQQF70J/llJqppti', NULL, 'pending', NULL, '2020-09-06 04:18:37', '2020-09-06 04:18:37', 0),
(570, 'LFESCroQHbuyPZ', 'iAzpDhFNsuaVbRq', 'end_user', '4263938393', 'fdfintl@cox.net', '$2y$10$Ho.TWoTpN6o0Jr2NdTIb7u2VbFnDFBgOOaUrzePi4v9jkRSqXPxZm', NULL, 'pending', NULL, '2020-09-06 04:43:54', '2020-09-06 04:43:54', 0),
(571, 'GAECIncyP', 'BiUNgDMTtyIluXA', 'end_user', '5871935020', 'markhouston1@comcast.net', '$2y$10$WGFnyHutqn/jD/yHsHSRJ.VGQpp7z/ed/RO6Q7ZbpxR7YecS3CEUy', NULL, 'pending', NULL, '2020-09-06 05:40:25', '2020-09-06 05:40:25', 0),
(572, 'XLqbQkPAaMofR', 'eElMkLdZxT', 'end_user', '9907988550', 'antony_lau@hotmail.com', '$2y$10$RChJrsFzbcFSiMVjkSmJp.Nk6cnrG289OQ9VTKCyB.bZQ0Bwv62tK', NULL, 'pending', NULL, '2020-09-06 19:46:30', '2020-09-06 19:46:30', 0),
(573, 'hCtQGEpLOMXBv', 'TCbpmKDQgJyPEvh', 'end_user', '9130637620', 'vfeliciano98@gmail.com', '$2y$10$zVsRINzc9su90PJIjYGWrOO8RWarQ9Q3/VqTGSqooSY95UCGJslFq', NULL, 'pending', NULL, '2020-09-06 19:55:39', '2020-09-06 19:55:39', 0),
(574, 'LRJyhYvAtHQCgb', 'JrHoWqAPSdOjbxZw', 'end_user', '5035740903', 'tnanderson@gmail.com', '$2y$10$P2/ky7VF/wOo7BcVxiopw.MC7UxdHxjo5mfJqMzDlLzW3sjuGz9Gq', NULL, 'pending', NULL, '2020-09-06 21:04:08', '2020-09-06 21:04:08', 0),
(575, 'sfKidOpvgqwAt', 'wlyRmQzdCN', 'end_user', '3933931012', 'elondensky@gmail.com', '$2y$10$rYBZ6I4vcCTQ83I9fefUyOu25P6pnoGo18OTbdC/zJlK1K2VpPC76', NULL, 'pending', NULL, '2020-09-07 17:25:43', '2020-09-07 17:25:43', 0),
(576, 'JLACyzWUGTSNqE', 'vIVThSkC', 'end_user', '4185691652', 'brenda.visani@gmail.com', '$2y$10$tBp39.Ecd6vsy5su8/hd9un.bf4hY.4tZQxYClAQqMpe9Mny2KMcS', NULL, 'pending', NULL, '2020-09-07 20:35:00', '2020-09-07 20:35:00', 0),
(577, 'MABVsaJXk', 'eCEySbtRguDdBYw', 'end_user', '4678520112', 'schwalmy@me.com', '$2y$10$oPmGVhSVSgTyjf9GQVUnle1RW2A4UB8jMDeSFPoLcZXLpHju4FDqG', NULL, 'pending', NULL, '2020-09-07 23:45:27', '2020-09-07 23:45:27', 0),
(578, 'dhPVbfNFOJoiSLE', 'pxBjTYfCn', 'end_user', '3413112340', 'tanatlw@gmail.com', '$2y$10$p1GRGIyK4BM5WaOof.f/I.TCNsDhD9j7kNT53RkA/izNZ.iFwXSdK', NULL, 'pending', NULL, '2020-09-07 23:58:08', '2020-09-07 23:58:08', 0),
(579, 'tCLUlTsO', 'stIqYOwPQ', 'end_user', '5794716297', 'Muzillaschoeeanu2uo@yahoo.com', '$2y$10$Tnwunz4bGpq2dt59uF5PFuqjO4YlodNG2sq1GNqYNsmKF.58bugRm', NULL, 'pending', NULL, '2020-09-08 14:48:40', '2020-09-08 14:48:40', 0),
(580, 'NhnOFVMEbfCiyI', 'MwSEOXmChyPBi', 'end_user', '8439239312', 'libtiChsHuch@yahoo.com', '$2y$10$x8xjT4z4PMaCjvOH734ubO/9f.YeB2ndKnz8Y3HVhXZJVlJuiRCtO', NULL, 'pending', NULL, '2020-09-08 16:13:57', '2020-09-08 16:13:57', 0),
(581, 'svRpjauwHDhUtYZV', 'LOsFADbB', 'end_user', '6551169753', 'beth@lochrie.com', '$2y$10$H4YvAjAgweAuXgqsBSHORu8vS3mK0cTRAjWYBJbv.Gs8747V5oaQq', NULL, 'pending', NULL, '2020-09-08 21:59:33', '2020-09-08 21:59:33', 0),
(582, 'gmzFDZnaYX', 'xCbRQzXGAtnIuoV', 'end_user', '5506494583', 'kaiyuhan@hotmail.com', '$2y$10$GyMfUthrtNwUA.dBBCE91.RZJk6jCE2MqjRg4Z6NnmePDJd1/DUU2', NULL, 'pending', NULL, '2020-09-08 23:25:55', '2020-09-08 23:25:55', 0),
(583, 'GQHSEubxiDrh', 'hbXPIoQur', 'end_user', '4684372517', 'figment51@hotmail.com', '$2y$10$4z2cHrIILy8QPbuAa7ywX.qWdjqGdCBjxrmAwyNHcDI0Uqul0PTXC', NULL, 'pending', NULL, '2020-09-08 23:44:01', '2020-09-08 23:44:01', 0),
(584, 'pFSelqJCUk', 'GcTyfhdQraFLX', 'end_user', '9121397885', 'rnorcia1@gmail.com', '$2y$10$jvMw7GVns2UaOWCA.b3XQ.U141hkmjnW1INhhitOW5nbdYAHLaQm6', NULL, 'pending', NULL, '2020-09-09 03:07:18', '2020-09-09 03:07:18', 0),
(585, 'gUqQzKAsZHlwBNv', 'KjZRCBJWMNxk', 'end_user', '7116686708', 'candklawn@gmail.com', '$2y$10$MvTNXgVIw3AFL5ikSeXJzO7w040bbarSEVKWEDJ9lsFcpv2G4ujuW', NULL, 'pending', NULL, '2020-09-09 06:07:38', '2020-09-09 06:07:38', 0),
(586, 'JZiXhDItAsjpuKl', 'GxiZQCcbLRut', 'end_user', '2598679908', 'alvin_george@live.com', '$2y$10$I38JPo7XkRFgFYBoorXEO.YAI9BE6YY5wJiO12jyruwr8a2DtNczy', NULL, 'pending', NULL, '2020-09-09 07:02:55', '2020-09-09 07:02:55', 0),
(587, 'LzWKGtDFvVZH', 'POrfjhHbaSplJFds', 'end_user', '7624799311', 'mdvorak@mpdconsulting.org', '$2y$10$hxo9rwyL1EEZaQIoSdP6/OQ/n3IsMxaXbUep3.x0PpmVTWHtRZTPO', NULL, 'pending', NULL, '2020-09-09 15:27:23', '2020-09-09 15:27:23', 0),
(588, 'hqitUOdJRHlY', 'FKoUGNQOBVE', 'end_user', '4642336793', 'tucker_heidi@hotmail.com', '$2y$10$gEsczVALMixAUDgOmjFzCuIXSqqQahXnJsWc9vTvgwQFNJEHnAYyG', NULL, 'pending', NULL, '2020-09-09 16:22:01', '2020-09-09 16:22:01', 0),
(589, 'qXuGbkJWsoiz', 'PIUwSdfjtkJmhED', 'end_user', '2059337725', 'amberrobertsdmd@gmail.com', '$2y$10$IHY6xc6mWMSvlwk7Z/r5DOsH5CQkEv4W8OaWfw2VPt8Pvep/UwGya', NULL, 'pending', NULL, '2020-09-09 17:21:45', '2020-09-09 17:21:45', 0),
(590, 'ICVviunB', 'fgZJwUNimQdpVuAD', 'end_user', '8387785252', 'jsraskin@gmail.com', '$2y$10$JqbNT3VBuop0/u4hcwr/gengzbcBMyy2YH9/NpdFBny44uvmtsyRa', NULL, 'pending', NULL, '2020-09-09 18:33:52', '2020-09-09 18:33:52', 0),
(591, 'StjdrUzGOiZ', 'AlgzyZhtMfEJ', 'end_user', '3513421243', 'jsingh@anjusintl.com', '$2y$10$L6UVliGMy3NQZMkWRPxkR.2D4.2C08G5Mu2JnmsRzg5NiddgRL0Qa', NULL, 'pending', NULL, '2020-09-09 18:34:38', '2020-09-09 18:34:38', 0),
(592, 'gNYzHGoQTSriZBpJ', 'RkIBczNAGlCOqtQn', 'end_user', '9517072482', 'nana99@cableone.net', '$2y$10$/PLOFkU/ivwJmRbZassKiuSKRDguOdz2hSuGtuOhjXp/1KM8ZFWsS', NULL, 'pending', NULL, '2020-09-09 23:51:21', '2020-09-09 23:51:21', 0),
(593, 'fvMdZDPXYVhJyC', 'pJGdXiyaYWczK', 'end_user', '6117890498', 'hpressman@gmail.com', '$2y$10$uSZsyGJ/5G2rGgTDLewAf.vyiMbPBl25yJf7kjGLrXEVCClIhfY6a', NULL, 'pending', NULL, '2020-09-10 04:21:05', '2020-09-10 04:21:05', 0),
(594, 'qwgXxtepU', 'qoiMgTuJE', 'end_user', '4936567803', 'citkaratmkhanyqL97y@yahoo.com', '$2y$10$676nR3cC0HseTAryGRX5Ae6SaxoNMypCQruUH6Ud.xHfDwtmSFdsq', NULL, 'pending', NULL, '2020-09-10 07:16:01', '2020-09-10 07:16:01', 0),
(595, 'YpZLaJwfM', 'hNYGtnTAOfWd', 'end_user', '5224146191', 'carrieh0829@gmail.com', '$2y$10$k7vCq2EYt7mCuQp/7xL3VOrq7EgSnPvDSQBa6WQxdpwLwvcuN7O.S', NULL, 'pending', NULL, '2020-09-10 07:51:35', '2020-09-10 07:51:35', 0),
(596, 'nWPjmpNdz', 'cyeitISoN', 'end_user', '2219719078', 'timothy-moran@sbcglobal.net', '$2y$10$c.tQQcT6XOwZecRU831urOELYnizt7/vvoB80iSUb3k6coA3I4oj2', NULL, 'pending', NULL, '2020-09-10 09:00:25', '2020-09-10 09:00:25', 0),
(597, 'kUXZqOmHGjILWYcF', 'IfpOHMWNZ', 'end_user', '4392033244', 'dolcemichael8@gmail.com', '$2y$10$6PvaSYIYzjQw88CTSadrzuNVQ.GX54dWulp0NOjE27XYZjD1WKwkq', NULL, 'pending', NULL, '2020-09-10 10:13:11', '2020-09-10 10:13:11', 0),
(598, 'UxHSzOuPKRYcF', 'MIAGtRFNH', 'end_user', '6698774876', 'dimples9461@aol.com', '$2y$10$ulWy86qxKNrFNP4/5p.nN.Ebh533qbfdIZ9QrK.lNMdBIvpFYtM5y', NULL, 'pending', NULL, '2020-09-10 11:28:16', '2020-09-10 11:28:16', 0),
(599, 'WgFrnZLGNEKuf', 'dZnOYMeiHqvl', 'end_user', '2807952594', 'cheryl.romano@rocketmail.com', '$2y$10$tMadH1f5gYFcLzr3xmp09e6WZvf9mGaI/YlOfbhEdsARO7lVDjKFK', NULL, 'pending', NULL, '2020-09-10 13:22:23', '2020-09-10 13:22:23', 0),
(600, 'LwtWvjyP', 'NrlxOJUPtALRQo', 'end_user', '6691791966', 'lisanordquistdvm@gmail.com', '$2y$10$ershgz6ws4DZhYBua3/nqey98O6YN5oHWl159TlR5S3.bHqww.a5u', NULL, 'pending', NULL, '2020-09-10 13:41:54', '2020-09-10 13:41:54', 0),
(601, 'QHZVaGdyjXv', 'TGJzihXnmtAfs', 'end_user', '9579673942', 'taciacynae@yahoo.com', '$2y$10$SwdqtcVDOo1Kih49LCQk4OBzpEsEbLVhJu6LRR/Yq4/sVuc6hBnWW', NULL, 'pending', NULL, '2020-09-10 13:53:33', '2020-09-10 13:53:33', 0),
(602, 'kjDRBNSOQXEsYM', 'kqfmSaYJhT', 'end_user', '7799200484', 'samara.sory@yahoo.com', '$2y$10$oyRR4KssyHBhi2v1KWabfu.kVH6dvGEMGjfNpfLg.nI6fLuGZCJXu', NULL, 'pending', NULL, '2020-09-10 16:26:12', '2020-09-10 16:26:12', 0),
(603, 'jiGekdvrSTM', 'YxwGIMFSi', 'end_user', '3019464730', 'bpolacikova@yahoo.com', '$2y$10$Jul7lvI/EkaBVmlqPr8tmOOwO4GrhF3jyWSBZnevfgZghwLuWDx2.', NULL, 'pending', NULL, '2020-09-10 16:31:06', '2020-09-10 16:31:06', 0),
(604, 'XWTxNjbmOLA', 'dUKIsTeL', 'end_user', '5042823842', 'elsamaycru@gmail.com', '$2y$10$8VFJEQphvJmvdFDmI2t7eu6bV78rgj5peMz3OrcNDy5TF3tc4c30C', NULL, 'pending', NULL, '2020-09-10 18:48:38', '2020-09-10 18:48:38', 0),
(605, 'XHmdjVMvxrgf', 'GBlSgZIf', 'end_user', '9219897804', 'keelstakata@yahoo.com', '$2y$10$m3U0EFqyzhnEYNt9e4ZDM.3G546z4hMLYaYqIqq3qFOyh58Hs6ojG', NULL, 'pending', NULL, '2020-09-10 21:33:03', '2020-09-10 21:33:03', 0),
(606, 'dwfBWqokIrv', 'fHYEtXdbDl', 'end_user', '9009067460', 'pacificgreencarpet@yahoo.com', '$2y$10$ol1oz7SQDj6UnXobdp0hm.lzHDiXgtgB29awFwAo92mdGTTQhA6iW', NULL, 'pending', NULL, '2020-09-10 22:15:22', '2020-09-10 22:15:22', 0),
(607, 'eNsKABMhZftdli', 'vXWAadCFtTrgUM', 'end_user', '3457784996', 'tia_riffle@att.net', '$2y$10$ql9QPx0bc8l8h2fhP.A2MOwgw3YYlmDDQ.U7i6CtbaLgyKRFf/LOu', NULL, 'pending', NULL, '2020-09-10 23:43:40', '2020-09-10 23:43:40', 0),
(608, 'TZRQhcCofHljYx', 'FYxeynfqhvZI', 'end_user', '6165843533', 'michelegilmore@yahoo.com', '$2y$10$Gg4YLckrlKtvtdDhOxcT6ufv6w9udKkRyjQiVIoBqqiSIOd3o5Mge', NULL, 'pending', NULL, '2020-09-11 00:32:35', '2020-09-11 00:32:35', 0),
(609, 'oCifGOYXgaVRb', 'oOTWcdEfn', 'end_user', '3884596210', 'haileys1granny@aol.com', '$2y$10$kZgouJcg3P5q1AwccNnulO4bAC4sTgaHHN/nfidvX3bGVx50pLV0G', NULL, 'pending', NULL, '2020-09-11 01:02:14', '2020-09-11 01:02:14', 0),
(610, 'lMOvPIEpJTAfYcoL', 'RQZipEBHTa', 'end_user', '8735004463', 'jimmm266@hotmail.com', '$2y$10$z7RNhFOBccIzsaDGfCyJqedF4cfRGYRFeL9ajEYGdrfJygrEZVfx.', NULL, 'pending', NULL, '2020-09-11 03:30:04', '2020-09-11 03:30:04', 0),
(611, 'EyFnuRLNwjfTHe', 'xnpruVfO', 'end_user', '2036001690', 'tdcdawn@yahoo.com', '$2y$10$DNnkx4r7wbwRiCR0j3uZL.iBhfsjNANNacqOxkywleUETLFnTdvvq', NULL, 'pending', NULL, '2020-09-11 03:55:26', '2020-09-11 03:55:26', 0),
(612, 'WiMUBDuFePtRsmp', 'sxGEBWYjmfZeQ', 'end_user', '2197942019', 'ryan09250@yahoo.com', '$2y$10$sFwn2KTpQrkAvubNo2G5mujGDO5eui6L2ntJPBPaosLs8OhBFss/.', NULL, 'pending', NULL, '2020-09-11 06:41:00', '2020-09-11 06:41:00', 0),
(613, 'wKDUpSjHBb', 'aNRzmAfThxW', 'end_user', '7735268499', 'bregister970@gmail.com', '$2y$10$Yeg9Eq5HysTVeS2RxmkAeOEO57bzRTaTQ/vx91OCmVZNBm.f/AbC6', NULL, 'pending', NULL, '2020-09-11 07:04:03', '2020-09-11 07:04:03', 0),
(614, 'bqSzNCMHYmfX', 'YimflEeOMUAJ', 'end_user', '7176449354', 'sharono696@aol.com', '$2y$10$93LZ42IAFLFc89RQsAvc1ux2m/fFPpwyXTU/cpW2ZuCkmD2MZSDCa', NULL, 'pending', NULL, '2020-09-11 07:57:10', '2020-09-11 07:57:10', 0),
(615, 'IcNiHsMuKqOrDW', 'oUKOPyAuFSHI', 'end_user', '4767072872', 'drf.markcarter@gmail.com', '$2y$10$Iia0Jslua38sq990PkMysePOWfJt9XAggdHxEagdJ5amJMihVSWq2', NULL, 'pending', NULL, '2020-09-11 10:23:29', '2020-09-11 10:23:29', 0),
(616, 'nwRpOjGayNcdTFHC', 'IEXgOHqClY', 'end_user', '5474074254', 'terrywatkinswilliams@yahoo.com', '$2y$10$iKokwkO3kuy875kpj1qAgeeMafWhLGi3RIIDnU6ghIgp1Gb1WG9ZC', NULL, 'pending', NULL, '2020-09-11 10:35:04', '2020-09-11 10:35:04', 0),
(617, 'flEyGoHiXgOCr', 'wbQekPWst', 'end_user', '4561228880', 'applesgonemia@gmail.com', '$2y$10$opVSZyxEcFUC9Q527W5oxuJpnI.KiRMIb6/p1odZMrg801DGc4iua', NULL, 'pending', NULL, '2020-09-11 10:47:59', '2020-09-11 10:47:59', 0),
(618, 'LabMjxzv', 'oElBtWzZK', 'end_user', '9638221175', 'arnoldiVerrinderXk9@yahoo.com', '$2y$10$gY7ySeGhw25CCYh/cuuHl.eLSFqeSIxtE5D6j.eTs.t/kkTTbfyIu', NULL, 'pending', NULL, '2020-09-11 10:56:19', '2020-09-11 10:56:19', 0),
(619, 'DnZIzOJeEk', 'vLSYjtRblH', 'end_user', '4347152778', 'bluelcatclaims@aol.com', '$2y$10$rldjav/W9XT1yTxeLZQymu7WuBeE2JqbYwnq7yss2Etaa5nc2ehmy', NULL, 'pending', NULL, '2020-09-11 10:57:53', '2020-09-11 10:57:53', 0),
(620, 'XIvGNJcKsx', 'EZrIOWsCMnRkD', 'end_user', '3522545307', 'j0mggggg@gmail.com', '$2y$10$UNP4MCHE3YEqj9WlTTkQm.e1KOjH6t8p/U5Ug9Xznt3fSYn52ccEe', NULL, 'pending', NULL, '2020-09-11 12:26:25', '2020-09-11 12:26:25', 0),
(621, 'xYhwAsebUgO', 'sBLHpFyP', 'end_user', '8165700361', 'whittneyy@yahoo.com', '$2y$10$TapsJc2lmZGkSl2syzmmPuWFRK4kTPMC3y2Pe17ZzQRMKirBqYwT2', NULL, 'pending', NULL, '2020-09-11 12:31:21', '2020-09-11 12:31:21', 0),
(622, 'xJEiMHXfWBm', 'KOdnETjsl', 'end_user', '5727680852', 'dyldm2018@outlook.com', '$2y$10$PDNO3xUcSK0jKhvGn44o4uRGaQRAOhbzM0fKr55hOl5KMmFTWnBNy', NULL, 'pending', NULL, '2020-09-11 13:25:09', '2020-09-11 13:25:09', 0),
(623, 'OpHUcQXsJfhnRSwT', 'mdKVUnMaitZvIlFG', 'end_user', '7091610145', 'hickoxcrew@aol.com', '$2y$10$W0jEm9SyLtSBX4pKsM5XhOyrzz20m4Op1konWc/nO/pVQnxBY36Qi', NULL, 'pending', NULL, '2020-09-11 13:40:18', '2020-09-11 13:40:18', 0),
(624, 'CLIilnEGdtyuVvM', 'EaQbzvuHCr', 'end_user', '9639350059', 'talucad.johnangelo@yahoo.com', '$2y$10$0TGiNODzNnA8C1Tz8L73FuPSucnqzwAX6xbCfC2vy22TXImqQ5c1O', NULL, 'pending', NULL, '2020-09-11 14:52:09', '2020-09-11 14:52:09', 0),
(625, 'CKbaVYAdBJW', 'FICGPQVD', 'end_user', '8603964163', 'ibarracas@att.net', '$2y$10$jcRZYKnT/ShRXvzBcgGTteNHN5cwyRgMixHIb313SNN5SpoLzka.2', NULL, 'pending', NULL, '2020-09-11 16:13:07', '2020-09-11 16:13:07', 0),
(626, 'OUtlZNFfbEujPJk', 'olXtFgJuDPGcZ', 'end_user', '3546501907', 'scott10@sbcglobal.net', '$2y$10$BjQq7lD.0otETrI5svNTqew2HPjxLsZ6HXflUOwCxbWq3GZzYzl3q', NULL, 'pending', NULL, '2020-09-11 17:05:18', '2020-09-11 17:05:18', 0),
(627, 'pUJFuojHP', 'EXJcYPjvmoM', 'end_user', '5782249273', 'pmsloop@aol.com', '$2y$10$atprM7xwGQfho27C3zEmmeiQklUSW9/VmnRQa4N12jfABzGkpm/MK', NULL, 'pending', NULL, '2020-09-11 18:15:08', '2020-09-11 18:15:08', 0),
(628, 'mqnoDfMd', 'IzljJVXaoHFPnd', 'end_user', '6964204920', 'pinky71982@yahoo.com', '$2y$10$U9AYLj.vPruFbT2EJTbZ8e2o58vxKt/9MIsSRAZDzHoO/5P6MZwm2', NULL, 'pending', NULL, '2020-09-11 18:50:22', '2020-09-11 18:50:22', 0),
(629, 'hbHIyzfZjncp', 'DKUYTinoMj', 'end_user', '9314351383', 'leo699679@yahoo.com', '$2y$10$VHUxNRLKTIe9Zv1DDk7L9OKT2NF7V9ZMlipSen7C/OCtPCAx42x3m', NULL, 'pending', NULL, '2020-09-11 19:40:45', '2020-09-11 19:40:45', 0),
(630, 'FqazwcrTVSsoBP', 'rIRSKQtNfY', 'end_user', '3123526713', 'kc3416@yahoo.com', '$2y$10$RzmazevkYSCIgm4i07mhaOawjpvqRA2.AL2JMvV/7A2xc7q3E7wg6', NULL, 'pending', NULL, '2020-09-11 21:14:29', '2020-09-11 21:14:29', 0),
(631, 'uGRyVELZpOth', 'eDdOkqihxIy', 'end_user', '7116010925', 'bombsquadwannabe01@yahoo.com', '$2y$10$HPuge7fcbPDhgSzTidyWV.f/1vPw0Q/EXDGh4nm/NUyAZ9IGroEBq', NULL, 'pending', NULL, '2020-09-11 22:10:36', '2020-09-11 22:10:36', 0),
(632, 'rwNgBhvnFtjxGkHO', 'ZpbQozHsNjuBYS', 'end_user', '4351649930', 'mchew08@aim.com', '$2y$10$PQYmViwvi9APVV6VVaBQmOxr92wn6sSsbHdIXyHtusIaHZ8URXYUe', NULL, 'pending', NULL, '2020-09-11 22:37:44', '2020-09-11 22:37:44', 0),
(633, 'kybrVaNJIxRMOm', 'WVBqEyrNGLmcpe', 'end_user', '2345862731', 'jebersche@msn.com', '$2y$10$zVM/gtBZASFbcQxcQKORKe0myghQCRyMEvxX/.o9ph/2FSkRnBbDG', NULL, 'pending', NULL, '2020-09-11 23:43:43', '2020-09-11 23:43:43', 0),
(634, 'fgGsIHkRQbNlKZij', 'DmFwgMvtAfcTQPZY', 'end_user', '2125952718', 'susan-mayer@sbcglobal.net', '$2y$10$ibwoxsF2cPfHjv.Y5Ll2V.gj0PzZYuE885T86WHreJk9FsJUoTdf.', NULL, 'pending', NULL, '2020-09-12 01:36:44', '2020-09-12 01:36:44', 0),
(635, 'TCxpVABk', 'PNnMhSxyEqTRgLc', 'end_user', '7958842702', 'erikjohnnelson@hotmail.com', '$2y$10$1tG7k7P7vc2vHwebtWuc.eGCin3x2IuCPsFQXd9SW5yPMScvIB5wq', NULL, 'pending', NULL, '2020-09-12 03:17:49', '2020-09-12 03:17:49', 0),
(636, 'RQwGVCxJZrz', 'woAOUxseY', 'end_user', '9663859591', 'watchthewaves@yahoo.com', '$2y$10$kS/R9L8sclwkWJbJe0gM4OQ2p/erGzWnX5F1Ki06/SbMgZN.tn8WS', NULL, 'pending', NULL, '2020-09-12 05:20:13', '2020-09-12 05:20:13', 0),
(637, 'qxDTwzcZiSluXP', 'pLUOsNbGjiyPqZEM', 'end_user', '4042166432', 'dpriest104@comcast.net', '$2y$10$zE2sps.o0fmhFI6qRUh66OsnNioDjvdWu1w/kHxAVn8Q04pSsDfKy', NULL, 'pending', NULL, '2020-09-12 05:42:34', '2020-09-12 05:42:34', 0),
(638, 'DriCXxuetbMfLWv', 'AnhHvbRXuWfDB', 'end_user', '3992584380', 'mnightingale@jobnewsusa.com', '$2y$10$.Z2wtMRp8Hl/k7Md3P8osuCBTxhKHp2WgdlcZnP0ZM/c2P2Wqu76a', NULL, 'pending', NULL, '2020-09-12 08:01:34', '2020-09-12 08:01:34', 0),
(639, 'oECHOKYhw', 'TPqDpumBJLFCMhd', 'end_user', '2382213476', 'starwarsrckr@hotmail.com', '$2y$10$UbPmRdx/NupnMgcqsr904evGnd/ozFO/Oo4h5WULNPEMIfVcGWLTi', NULL, 'pending', NULL, '2020-09-12 08:50:59', '2020-09-12 08:50:59', 0),
(640, 'WFvSJjhLXybT', 'QqcLOZGmBa', 'end_user', '9502605822', 'ctfrye@charter.net', '$2y$10$dWX3KV1vQTBihAO3raPS8OQCBLPZgZqt6kov4ZFldzi4TZQJhmt4e', NULL, 'pending', NULL, '2020-09-12 13:21:59', '2020-09-12 13:21:59', 0),
(641, 'EPnFZJpMxci', 'vJVAOEZXqS', 'end_user', '9173276951', 'chadaohaver@gmail.com', '$2y$10$jMxZu9mIYJUPMJ30ZJCJiOt6Q3FcokUrexNlZW8USolCqDDgfxcWq', NULL, 'pending', NULL, '2020-09-12 13:25:05', '2020-09-12 13:25:05', 0),
(642, 'QVgyIALOPW', 'fHLwDRnhcCmqtNjX', 'end_user', '2458434809', 'newt2456@yahoo.com', '$2y$10$FWDvVjskL9T33Z7PobXhJe/jDAp3axASVI.fZWTUi4f6zz/0A.Z9q', NULL, 'pending', NULL, '2020-09-12 14:46:18', '2020-09-12 14:46:18', 0),
(643, 'FXdnVimUG', 'SKiTNtdxDYbX', 'end_user', '3483675739', 'heatherleighwallace@gmail.com', '$2y$10$i3TR7RmFcyM/eTU5wN3IqechymKmL4GHh6D5RdksCDflbJRqXJ7ny', NULL, 'pending', NULL, '2020-09-12 15:50:16', '2020-09-12 15:50:16', 0),
(644, 'shOfAKVeWQmIjHE', 'jpWfiwdcnqQYS', 'end_user', '6163798215', 'moondog1017@yahoo.com', '$2y$10$R4bBIBn0jar6Zc.z2ejNp.VrLh/0Mgs5VAJ2q38UJuVZZZHVu9gga', NULL, 'pending', NULL, '2020-09-12 18:14:05', '2020-09-12 18:14:05', 0),
(645, 'oQHOXyYTir', 'hvpRArCzygnKM', 'end_user', '5950201242', 'rrsnotyours@yahoo.com', '$2y$10$yazz7QTk2LBKDnbh4B6guOaA1PpAnUEWlmOU3nx3MQVJiaADYrn0G', NULL, 'pending', NULL, '2020-09-12 18:49:45', '2020-09-12 18:49:45', 0),
(646, 'gaOQslMzGh', 'zfWbDmvNhHIkYGta', 'end_user', '2447273717', 'v.vijayreddy@aol.com', '$2y$10$9HuGIceN4iHrexNttt07Re0lzzTxLjpLp/GRdhT6axyfb5.iXpGNW', NULL, 'pending', NULL, '2020-09-12 19:29:01', '2020-09-12 19:29:01', 0),
(647, 'mYVwfkMhvnl', 'DtgwPVUBaEnLzky', 'end_user', '2880731349', 'jlashlock@yahoo.com', '$2y$10$KtCCyz1gM4xiR9rgj0vO8uDAqkyaa1Is3Z.tBK9hOovSeHzguh0Rm', NULL, 'pending', NULL, '2020-09-12 20:39:53', '2020-09-12 20:39:53', 0),
(648, 'hVAyaPSwdDv', 'FiMHmkfQK', 'end_user', '3816296040', 'bry9329@hotmail.com', '$2y$10$DTVblvV.WsArfCBX31aIiu51Yzt8FvlAvnfp5oISg3XriIWqTyEMC', NULL, 'pending', NULL, '2020-09-12 21:28:18', '2020-09-12 21:28:18', 0),
(649, 'hywJLbZkmqAPB', 'wYLPyZgnSvxO', 'end_user', '7640337137', 'HudobenkJP97pchad@yahoo.com', '$2y$10$JFWmg9xW7F.CaPcRs4D1u.wOSFON7hOhlgUF/0PwPgS7RpA2WTH4S', NULL, 'pending', NULL, '2020-09-12 23:56:46', '2020-09-12 23:56:46', 0),
(650, 'OtyfsBCUKYpgr', 'nraREIdeXjlWh', 'end_user', '6938769136', 'lm4198662@gmail.com', '$2y$10$8JyUeGhhFMXxorYialKLsu82fIW8TqRkKNw543Ra9k27UM7XqgSgu', NULL, 'pending', NULL, '2020-09-13 03:16:27', '2020-09-13 03:16:27', 0),
(651, 'vnqQzWgtMUxZk', 'ZhavQryFWBi', 'end_user', '8200742183', 'jesskatelynn@gmail.com', '$2y$10$Fh6OLB.lpAv9oRbunUGYeeuCasURudbdzhcs5I/eqWoudJqdjB3j6', NULL, 'pending', NULL, '2020-09-13 08:12:00', '2020-09-13 08:12:00', 0),
(652, 'YQpJWxZc', 'lTpLsvMRc', 'end_user', '4418193771', 'nitavalenti@aol.com', '$2y$10$aGhP2aZlwjsS13u5ImKvTuIBcDtivH1ok0I89jDoMMJq5mPHbyUHi', NULL, 'pending', NULL, '2020-09-13 12:46:24', '2020-09-13 12:46:24', 0),
(653, 'oHcftxjhWrX', 'WihxuIBpmyCJ', 'end_user', '7405717686', 'ibensous1@gmail.com', '$2y$10$HBhe4L/8sYZgmu8SjlHr5.DTlHPiMaXJrX6knG5BCd7/9pxR351ZG', NULL, 'pending', NULL, '2020-09-13 15:55:52', '2020-09-13 15:55:52', 0),
(654, 'BIyasMFwTpAd', 'OrqgZvFRNKoUxG', 'end_user', '5058495139', 'katasmohr@yahoo.com', '$2y$10$nR4evlvrXK8jKG2zDoPNeeSSoZr4YIDqm/LyDSVuTRrBZBC2Voiia', NULL, 'pending', NULL, '2020-09-13 16:19:28', '2020-09-13 16:19:28', 0),
(655, 'bwnzkhPSMeCBLDjR', 'pcKXtVixQ', 'end_user', '4384250094', 'ellery@gvtc.com', '$2y$10$Bpes3Z5xC/RSEZmgmx34ounmyi/7LNxLfuSHac6RFAPlXANfWYm.q', NULL, 'pending', NULL, '2020-09-13 17:15:52', '2020-09-13 17:15:52', 0),
(656, 'WiemUgkToudxR', 'vUIGpsAZki', 'end_user', '8102007969', 'julieannav@sbcglobal.net', '$2y$10$I/GOqdsz4huodhy2YxezwOXSNpvgQKgkhPwIeF/4X.LbqjTjxGeau', NULL, 'pending', NULL, '2020-09-13 18:46:24', '2020-09-13 18:46:24', 0),
(657, 'SKugWrVZzLOUkYCd', 'GqtyHAYBJc', 'end_user', '6587664631', 'romicat@outlook.com', '$2y$10$djE2i1k.Pvu7eHBxST1aoOCXWrP2ZtVUumZH1FDRvPO/b2l9urUdO', NULL, 'pending', NULL, '2020-09-14 04:53:04', '2020-09-14 04:53:04', 0),
(658, 'mRPuwdGWThz', 'APLrRIGXQTkh', 'end_user', '2739807645', 'jdmazon21@yahoo.com', '$2y$10$f8acqLhJUQE41Uw2El6n7ucTA2ZRT7Mp0YI6K1DaKYT3OBRgzdDaK', NULL, 'pending', NULL, '2020-09-14 05:17:09', '2020-09-14 05:17:09', 0),
(659, 'XuNtFmZTsfycg', 'MRlItUZbdNDACXL', 'end_user', '3796681888', 'Ghobralsclenz1TKb@yahoo.com', '$2y$10$Jug/qfH6D794qaPUNd8iTu/dajWohpd/53kgnlVX4j6kjklc5J0Xy', NULL, 'pending', NULL, '2020-09-14 05:27:23', '2020-09-14 05:27:23', 0),
(660, 'zDamovYIBFTGdEfV', 'txJTriYchA', 'end_user', '4262400306', 'k_sla1980@yahoo.com', '$2y$10$wgUylAM.MU/feN1b1pfDceJvXvBG4gxrlRqged/95TQzfC4a2xIay', NULL, 'pending', NULL, '2020-09-14 05:29:48', '2020-09-14 05:29:48', 0),
(661, 'mpbgOvoTUPMrB', 'lNakWxEAqwit', 'end_user', '8750453478', 'driver13440@gmail.com', '$2y$10$zL3lv6gKM.DmcpQ6cTw6q.3isL9eTds5e7V6yOEe2i9r6TktKpa76', NULL, 'pending', NULL, '2020-09-14 06:29:59', '2020-09-14 06:29:59', 0),
(662, 'vQzTRCByYreDnHp', 'dWUVnLwYqmHyCN', 'end_user', '8302115005', 'lhigleski@sbcglobal.net', '$2y$10$noGXTyN/Or/dUl4U2ma9NObJxHPXrpmwm2OpHzmEoaurmEFQ3hr0.', NULL, 'pending', NULL, '2020-09-14 07:06:43', '2020-09-14 07:06:43', 0),
(663, 'SQysZAuGq', 'vMCZVDwUWEskcIg', 'end_user', '5002700640', 'dsalustri@yahoo.com', '$2y$10$VEVdFi0EX3bKoDq2o1Bl7eksEop2H5En2hS0oa6FGVxYrJIyZzeGW', NULL, 'pending', NULL, '2020-09-14 08:59:43', '2020-09-14 08:59:43', 0),
(664, 'zuxBrhFbAimG', 'FqnhfjtbgQES', 'end_user', '3886240512', 'prpfek@hotmail.com', '$2y$10$oUg3C7XKbOvMqm9uplU.rea2HPxYLqLisiOXgJ00LpPy2QeqAxkkG', NULL, 'pending', NULL, '2020-09-14 09:25:39', '2020-09-14 09:25:39', 0),
(665, 'VixZwLHqzvglNE', 'MWFKnLrkJOGafY', 'end_user', '3556402752', 'judy.h.hsu@gmail.com', '$2y$10$FjW46eDzkrcvqyNJmw9.NOrTQn87XpLNm1YlcQ4QPlmtM5DxapCRy', NULL, 'pending', NULL, '2020-09-21 12:35:18', '2020-09-21 12:35:18', 0),
(666, 'glAGOysXDLw', 'inrOezksxg', 'end_user', '6637096116', 'selbye.mathew@yahoo.com', '$2y$10$aUeXOMdft3wVtt6KnZxWtOAfECuj48KutdFLcjC2qI/q8SODeBXRe', NULL, 'pending', NULL, '2020-09-23 16:58:22', '2020-09-23 16:58:22', 0),
(667, 'dvjYzUowqx', 'UqhEjmelGFMi', 'end_user', '2166010865', 'earsome.gabbie@yahoo.com', '$2y$10$m3t3277RJ8a6SpFCwN0Ro.P.Ys4rXBuL7wP7ErioJQAJaKsuLZ.Zy', NULL, 'pending', NULL, '2020-09-24 21:11:20', '2020-09-24 21:11:20', 0),
(668, 'IzaRsqBDMPjoJ', 'lRKCVETMNzreLZAu', 'end_user', '3301080586', 'rativedfc@gmail.com', '$2y$10$Nd1oANjSPN/NtfeVzTPih.YyzuntJBVyjCBrzpbjve4TPhaiJ0X4u', NULL, 'pending', NULL, '2020-09-30 22:08:21', '2020-09-30 22:08:21', 0),
(669, 'PLSIeovsNEQGm', 'GpHZUKbscrRAkL', 'end_user', '6352823630', 'lyka1212@gmail.com', '$2y$10$ylTVuEnylBLmIWweAFCnqesYDT2tDdQOd9LtuyXMDeJI/r9SkJqse', NULL, 'pending', NULL, '2020-09-30 22:50:11', '2020-09-30 22:50:11', 0),
(670, 'RFUqHOLkvj', 'eyOSQZaP', 'end_user', '2570974338', 'jaswanthreddy77@gmail.com', '$2y$10$zi2enrPb9G.p91Y8jN2FDO4bK/caoPfTP3G79gqaRm0Ylpw2M8sny', NULL, 'pending', NULL, '2020-10-01 08:10:38', '2020-10-01 08:10:38', 0),
(671, 'czYQdklmLoeTD', 'OuksGIVmtUc', 'end_user', '6015525488', 'ganberfsipne271@gmail.com', '$2y$10$6avn2eVddlXP0UmNXqhSyeLL8YFIGfpcwrgBsZB8TNiy0C1i0Obqy', NULL, 'pending', NULL, '2020-10-01 08:45:34', '2020-10-01 08:45:34', 0),
(672, 'JakjPfWbO', 'RvmhdMikgo', 'end_user', '5799683385', 'taefancemen8827@yahoo.com', '$2y$10$VlFTalG6hgoqBiPB/fZLH.CvBkFLErYCbAkiXpxIC6YmpWlQZFI1u', NULL, 'pending', NULL, '2020-10-01 13:18:53', '2020-10-01 13:18:53', 0),
(673, 'bOpIgiyGWYQhFms', 'sugQMdPJaApr', 'end_user', '7934569607', 'stevenagl12@gmail.com', '$2y$10$Jsj7yRFw7g2.zAcsTiNdI.twF.KHdX4uDtaYKnLm6Ru1iNb5xYqfC', NULL, 'pending', NULL, '2020-10-01 16:22:39', '2020-10-01 16:22:39', 0),
(674, 'VPNynmJQDAocwrBW', 'sjLGHVEto', 'end_user', '2522446712', 'stormystuartsimpson@gmail.com', '$2y$10$8Otj1PUiERwXp.5vRn2VFO1Fhj9ADenfOrw0abQMdxwzk0KGZ3ueu', NULL, 'pending', NULL, '2020-10-01 19:40:35', '2020-10-01 19:40:35', 0),
(675, 'vrGFTMkEmKBRXxUj', 'HTRubUiGygoa', 'end_user', '2054567404', 'bloskiewictz@gmail.com', '$2y$10$ztmpgjqvcU4x34O/5g8liuetqA08lzgoz6bmsunkHrxiE7Bk19qFe', NULL, 'pending', NULL, '2020-10-01 23:28:40', '2020-10-01 23:28:40', 0),
(676, 'dbwAXumsGhWtIp', 'uaPQFCHoZDtIOf', 'end_user', '2650974312', 'tuoheyben@gmail.com', '$2y$10$mdlUjYgfyKTvSGd7yi4OPewXZ9Hm3eBbd.G1whm1zG9s1g9dEgxeu', NULL, 'pending', NULL, '2020-10-02 03:23:57', '2020-10-02 03:23:57', 0),
(677, 'VFYDNTZuH', 'nVJebmHtTlvZ', 'end_user', '4109444531', 'caitlinunderscore@gmail.com', '$2y$10$bK7ucDfieen71dEPFpsd..8epqZNlG0r5sW6WPSQ3eksSSPkfkhkq', NULL, 'pending', NULL, '2020-10-02 06:07:25', '2020-10-02 06:07:25', 0),
(678, 'jIknKXquBbRcsLzQ', 'dmzhCfFS', 'end_user', '4165437794', 'chm1208@gmail.com', '$2y$10$WEpGQvMxASP.qKr0Mv7Z6uqFTtaS6DakKv1DhqBeCj0mvXsLsNhVq', NULL, 'pending', NULL, '2020-10-02 11:52:26', '2020-10-02 11:52:26', 0),
(679, 'eBgMTjIdrn', 'fgZsOXmvaFPRdWy', 'end_user', '5075165203', 'alisonmyeager@gmail.com', '$2y$10$/iyShLSPkcRc1pEXS.ovQuXVJi8Ab9jzPzqKa6QAy79FVBmpOejNe', NULL, 'pending', NULL, '2020-10-02 17:46:06', '2020-10-02 17:46:06', 0),
(680, 'MtODdYvbiBFrVueQ', 'noCuIQNaVPBYslO', 'end_user', '3631610891', 'gator4540@gmail.com', '$2y$10$0dLHufHC4ReOtFsoxt9dXudLihR7xGhzF2gNr9c2RUbrdc0KJ6epK', NULL, 'pending', NULL, '2020-10-03 04:25:09', '2020-10-03 04:25:09', 0),
(681, 'agCtWMrmBeGE', 'atXuKfvBqSIGer', 'end_user', '2370174321', 'aracarina25@gmail.com', '$2y$10$sZuscVjLb44Je382rM/wNedRms5cbATE3iCwm1MsRrT1EFPWO9CXi', NULL, 'pending', NULL, '2020-10-03 08:54:09', '2020-10-03 08:54:09', 0),
(682, 'ufmCTxYwGPnboL', 'FAqPSWaU', 'end_user', '4228309751', 'johnnosbisch@hotmail.com', '$2y$10$Y3iXgEDxFjBaVb7ZRv3qSexZKhz4e03V05n5xpr07P4RJh.Eckf6i', NULL, 'pending', NULL, '2020-10-04 04:17:34', '2020-10-04 04:17:34', 0),
(683, 'hYRTPHWuSBvVMGt', 'DzZMifxebUkWVyp', 'end_user', '4108281698', 'charlenemscarlett@gmail.com', '$2y$10$hRizo/UqEDI/MkxuHDjMx.nmR./sDNk5lexNAjyeRuLzX8kaPalhS', NULL, 'pending', NULL, '2020-10-04 09:55:38', '2020-10-04 09:55:38', 0),
(684, 'JsQgWLEtyMZqDiSp', 'SphuIzJRGfnK', 'end_user', '3425045009', 'krowe243@hotmail.com', '$2y$10$DHzYlP6cAj4lHkOMg15BtOEncfPHMwMFT5/oohkzkgP9ShxK5kfoa', NULL, 'pending', NULL, '2020-10-04 17:21:13', '2020-10-04 17:21:13', 0),
(685, 'MZHNFtWx', 'FcTJknCXqBIZeWA', 'end_user', '8244507624', 'guybrittcrm@gmail.com', '$2y$10$6g4eFG01UhZUbQbm43kklu1ebh9k/jndD93K0qi0JVAVdgKYQ4cOS', NULL, 'pending', NULL, '2020-10-04 22:04:14', '2020-10-04 22:04:14', 0),
(686, 'MFRkrNwhtOzvA', 'mWwZOQkbRBhJPD', 'end_user', '2647962860', 'jgdenaro@hotmail.com', '$2y$10$aWbpcUwH8jBWi5LK6ieC.O4bTCMpNl4wPWmE47X9G57U8kqw0dc2C', NULL, 'pending', NULL, '2020-10-05 00:03:43', '2020-10-05 00:03:43', 0),
(687, 'ZrkIgDymv', 'VbgSuPRHD', 'end_user', '4949614513', 'lauraray74@gmail.com', '$2y$10$dSzwgPZjPxTiqiI.m2YDO.8VNwUM6y2vs71.LhNZBBKYMtgxKN9SG', NULL, 'pending', NULL, '2020-10-05 00:13:00', '2020-10-05 00:13:00', 0),
(688, 'uJZpQxdDPGwav', 'upbhszrXUYnWaeCB', 'end_user', '9006916114', 'skingtrees@hotmail.com', '$2y$10$o21TSyrRQu4UEb0T0S20.uf9rW72grEki2E67sIanwgCOKoITjf8O', NULL, 'pending', NULL, '2020-10-05 09:32:44', '2020-10-05 09:32:44', 0),
(689, 'bTkvoaPtAMYq', 'QMaWxITDkKFS', 'end_user', '5456824219', 'berryap1964@gmail.com', '$2y$10$bZuhxd7oAjKGQyw9IsgjC.oPEv4ghvJC6o6NQk8nSjE2MQ9jhUpq.', NULL, 'pending', NULL, '2020-10-05 12:10:48', '2020-10-05 12:10:48', 0),
(690, 'ZAsnPGeDzQFJoIw', 'gbamfUiElp', 'end_user', '3069135144', 'rdgilmore@hotmail.com', '$2y$10$fb9bt4npMzfYNpERiJ5O..my6muChs8GhuxdbHrawrACoeA6EW37W', NULL, 'pending', NULL, '2020-10-05 15:19:51', '2020-10-05 15:19:51', 0),
(691, 'kEgmqLNhSIYfio', 'SJtpRwVEPDNuyGXh', 'end_user', '4529075585', 'lizwilliams521@hotmail.com', '$2y$10$JJ7PoS0PnwRM9F0pJ4aN6OhB7KGBkP1XgxWv8QjlO7Q6MiiyfbSQW', NULL, 'pending', NULL, '2020-10-05 16:04:01', '2020-10-05 16:04:01', 0),
(692, 'OemdAsFuPx', 'ecgaCuqH', 'end_user', '9560049120', 'dlouis6zoo@gmail.com', '$2y$10$mvNx.ppxY6.mSYcCEPzD9OMhiwWEbIh0fIIjQivNQ84I6FFqieyPC', NULL, 'pending', NULL, '2020-10-06 06:39:30', '2020-10-06 06:39:30', 0),
(693, 'zaGfRCJvgiNwEKrY', 'iZcuHqelBW', 'end_user', '2265620450', 'chan4066@hotmail.com', '$2y$10$g8cr0tFuMrJ2VApst4.p2ekpCgJXjSYnZQZUZT2KxuWWAqTlNjSny', NULL, 'pending', NULL, '2020-10-06 13:01:41', '2020-10-06 13:01:41', 0),
(694, 'wjCUgPNJFBKeAszM', 'FKukGIAPa', 'end_user', '7668493520', 'oyin62@live.co.uk', '$2y$10$yb.1HaBfKM3fNbTB9AveRO93w/t9jQZyXW9YWm8zvpABxQZw1T4y.', NULL, 'pending', NULL, '2020-10-06 17:26:09', '2020-10-06 17:26:09', 0),
(695, 'DznjBPHuZVgTs', 'idfbwZjpkmgxOeCh', 'end_user', '7120761699', 'joego9000@gmail.com', '$2y$10$u0/vmijv1e/zhhlcS8vqQOXHQxGFcN/cCJwJeqXJc7i367UGwiTEa', NULL, 'pending', NULL, '2020-10-06 21:00:15', '2020-10-06 21:00:15', 0),
(696, 'YSEJslVmGrojy', 'SODjgKvUhfXa', 'end_user', '8001495184', 'jwachuku@gmail.com', '$2y$10$SYV5Y83458YrXWdtfq5Zt.KjJU6rJ8GbLP4uK5t6AAOdseKr5aRae', NULL, 'pending', NULL, '2020-10-06 23:58:05', '2020-10-06 23:58:05', 0),
(697, 'WOdwDmGsM', 'AdufyEpVBibmMXY', 'end_user', '6039657339', 'strictlyanime4896@gmail.com', '$2y$10$TJioXi2Av/erUvhqlSDVqeMy12Er4zXK8GY/8GRpuEJFpV6YBb48C', NULL, 'pending', NULL, '2020-10-07 11:51:13', '2020-10-07 11:51:13', 0),
(698, 'XvfNaPQlRdcDgO', 'cPgXeTvCY', 'end_user', '5647948391', 'sarakodzukude@gmail.com', '$2y$10$3dNVPPruNOhr82xjjlO2PeppNsLYqPGDVaBqdoAYkE/LQpCB8hAxG', NULL, 'pending', NULL, '2020-10-08 19:14:05', '2020-10-08 19:14:05', 0),
(699, 'AyYMVdsDPr', 'ohRIdlgLejk', 'end_user', '7961394488', 'scaritiniv612@gmail.com', '$2y$10$7HaGyr7e73nia3QVWrTaEew9O9R8JHDxeWywK6I9fiH8v5N.g/M9i', NULL, 'pending', NULL, '2020-10-08 19:16:47', '2020-10-08 19:16:47', 0),
(700, 'hLJPeYcVqjUrsXf', 'NtovVTSzJu', 'end_user', '9700931947', 'icanfreel36@gmail.com', '$2y$10$UrDfSG1.n02y0GhXkumw7ehmeKj2jO2Z9Shykqzuj/6P5.joyfEgy', NULL, 'pending', NULL, '2020-10-08 19:29:08', '2020-10-08 19:29:08', 0),
(701, 'aJKDZBkvE', 'eJxNluMWYjn', 'end_user', '9427848142', 'danmary0424@gmail.com', '$2y$10$RI1yDHIXrmVAL9LAXHowQ.GFV.U1pN5pOcOgFUcv.yl3R7D.0NtJe', NULL, 'pending', NULL, '2020-10-09 00:06:50', '2020-10-09 00:06:50', 0),
(702, 'GOcdbAzilQJTB', 'BgmveSdL', 'end_user', '8098670492', 'cfranklinfreeman@gmail.com', '$2y$10$/SeT/rrW9zi.eFaU9qL4reXh4ijan9hCRihvqqUq9PX1OuzU45GgW', NULL, 'pending', NULL, '2020-10-09 21:57:16', '2020-10-09 21:57:16', 0),
(703, 'dZvYMNhtS', 'UZufhtvEPS', 'end_user', '5740499458', 'jtpenland@gmail.com', '$2y$10$D7BKC55RdiMnLL5kMIetyeXSb01Gq9/JUk5STiZU2JlhX5iDIbj8m', NULL, 'pending', NULL, '2020-10-10 06:50:00', '2020-10-10 06:50:00', 0),
(704, 'AnSEDwtIsg', 'xVwRfmnqYEiFCg', 'end_user', '3498254906', 'avernmellsmx@gmail.com', '$2y$10$q7FjsaxSmPrYyRUCCZ9kuObUIZnvfptZEU4Yqku9hhMM1fzzuYLz2', NULL, 'pending', NULL, '2020-10-13 13:28:00', '2020-10-13 13:28:00', 0),
(705, 'YIJupUxHPFtRBk', 'MfFNyxOsPXwklhve', 'end_user', '8014031218', 'imtolnisfan6491@yahoo.com', '$2y$10$zwKA7s/8NFYH6DJUeo3oweHkj562RiUqTWBW1kMx7fFh1tWXCym9u', NULL, 'pending', NULL, '2020-10-13 16:21:50', '2020-10-13 16:21:50', 0),
(706, 'MbKUkDodG', 'AwhSQmulc', 'end_user', '8802270332', 'caneumeltur7744@yahoo.com', '$2y$10$93wIM73xnZ.nsAtzhLiuWu30t8CWzVoD7Si3WBMzd/JmvOAbOzjki', NULL, 'pending', NULL, '2020-10-16 14:48:28', '2020-10-16 14:48:28', 0),
(707, 'PMHKfXDiVnGOvtb', 'wWPxYFLeNbHly', 'end_user', '7554862145', 'waterfulatjq@gmail.com', '$2y$10$kqgy1x/gk1g/DwJ8duLvr.1FxWr9NLqHndmMni0.ilR3tWI7KEQVq', NULL, 'pending', NULL, '2020-10-17 21:08:16', '2020-10-17 21:08:16', 0),
(708, 'Marcus', 'Hermanns', 'end_user', '+491799114708', 'Marcus.Hermanns@gmx.de', '$2y$10$cCWrK95YJhk2rCx04Sk9jugzl5yvYURAQi2K/9bzH6q47uI6Xtbxi', NULL, 'pending', NULL, '2020-10-25 16:57:20', '2020-10-25 17:56:55', 1),
(709, 'dDNwOPoiI', 'RcBelqOEb', 'end_user', '2131601770', 'susann.mell@yahoo.com', '$2y$10$8jBkMqJly4FzeYdSHUDb6uCMB.fWwiOemy6o1QTs7culwtRWwA7eq', NULL, 'pending', NULL, '2020-10-27 01:46:40', '2020-10-27 01:46:40', 0),
(710, 'xywrtmFzei', 'RxsIQvhwFeYL', 'end_user', '9592819788', 'coralee_whitmire@yahoo.com', '$2y$10$AsOMVh023ikABkEAHS2L4upYbk3FX6JVvg9Rk52cKzVSaMWlcu8ju', NULL, 'pending', NULL, '2020-10-27 08:53:11', '2020-10-27 08:53:11', 0),
(711, 'gohFeZmQH', 'dXBflSLEAes', 'end_user', '9447813199', 'navogen845@gmail.com', '$2y$10$XtsZuzIrbuCQ2vsfkyiCU.9Tnb8ftUI9GaLjZwyTeUyphJMz6q/mu', NULL, 'pending', NULL, '2020-10-27 15:15:35', '2020-10-27 15:15:35', 0),
(712, 'HmwKCrAvhlQeYSR', 'DZoUuOft', 'end_user', '4046391848', 'meghan.staveley@yahoo.com', '$2y$10$X0JajTxB56SvqsOapK3F/edAwRuE93647EHmKg0jEcLIO4zsRVAnm', NULL, 'pending', NULL, '2020-10-28 02:43:18', '2020-10-28 02:43:18', 0),
(713, 'zkiROqJacofBZYKM', 'eNvwsLiZfyKVkq', 'end_user', '9599456596', 'onita.stobbs@yahoo.com', '$2y$10$xaz2O9a5onzLFkGkk6XG3OV.fWcWVMTjL3GJhOw4JHWXBAB9MszZi', NULL, 'pending', NULL, '2020-10-30 09:49:58', '2020-10-30 09:49:58', 0),
(714, 'YCnLvitVmHbQX', 'KxHUAlbz', 'end_user', '7549232240', 'wesleybirch711@yahoo.com', '$2y$10$V4d.ikWB4hhloHkWwypev.//HFesR7GcU2Dg3nAhqpb3VxIYw.sxG', NULL, 'pending', NULL, '2020-11-01 18:43:21', '2020-11-01 18:43:21', 0),
(715, 'Lamia', 'Friedel', 'end_user', '015730435440', 'lamia.friedel@yahoo.de', '$2y$10$PcuhsuOr8OGN04QY269A0.PDarZKAQtbUPXldZ10Oibq0QlvkTLk6', NULL, 'pending', NULL, '2020-11-04 17:32:38', '2020-11-04 17:32:38', 0),
(716, 'PfnWMRIrthxD', 'AOupLMNGeIi', 'end_user', '9654498396', 'farrellcollene@yahoo.com', '$2y$10$WYy5N66dwhqqLNvLVMsPoe30F7NiYYCq01KhXXM8anPWXV2k8O3TW', NULL, 'pending', NULL, '2020-11-07 04:51:51', '2020-11-07 04:51:51', 0),
(717, 'eqMJfwPFQ', 'CYgVEDchZUOWpwet', 'end_user', '7345106803', 'keeling_sonya@yahoo.com', '$2y$10$YDj.iuq0s7tY.KvLf//iJOecj2XbP5QSUJO/0KPZWhptg4ZrCesWu', NULL, 'pending', NULL, '2020-11-22 12:16:40', '2020-11-22 12:16:40', 0),
(718, 'avMBmoJUWcrI', 'zkMtHFWxQDgnmh', 'end_user', '8022012496', 'tarahoversby@yahoo.com', '$2y$10$Dpb/bYiW/8h1Xh14AEfD2.10nLKe.tGJ15Nmu0lGFdET6BUaXKvvG', NULL, 'pending', NULL, '2020-11-23 06:07:52', '2020-11-23 06:07:52', 0),
(719, 'Ernst-Peter', 'Jacobus', 'end_user', '1728200804', 'peterjacobus@t-online.de', '$2y$10$/ZtMc0qFGCBkNtO/EJgBG.HQ6F/Us.Ekt.p.m/CbrnvaWs5KSnTkO', NULL, 'pending', NULL, '2020-11-24 20:15:41', '2020-11-24 20:15:41', 0),
(720, 'ASTulkGYJryZa', 'VKwSLsucqPC', 'end_user', '5438181282', 'marietta.fawcett@yahoo.com', '$2y$10$C9MOgLdA9S3CF/C4LNKJSOknj4lzAD9bRcHJ2cqBtQi/yXu2o/jHC', NULL, 'pending', NULL, '2020-11-25 19:44:16', '2020-11-25 19:44:16', 0),
(721, 'dhTSZcslVy', 'OVtFBenzXvHKQC', 'end_user', '8928713398', 'peibukuhon@gmail.com', '$2y$10$Yt.Hhdn19l59ePwHOWJ2KOQtR6578OFIXwC5HAwWkUhLcKpUeGReW', NULL, 'pending', NULL, '2020-11-26 21:53:26', '2020-11-26 21:53:26', 0),
(722, 'WAPiegKoytM', 'jCbHJTLWRg', 'end_user', '6802801742', 'itenshichimorina@gmail.com', '$2y$10$0fyLFkp456CPaGth2l31B.7fx/Hn9TIAX4LOl/BTXdxSqtQFoSZjy', NULL, 'pending', NULL, '2020-11-27 03:10:15', '2020-11-27 03:10:15', 0),
(723, 'IGbicwjWHPkF', 'xLifCdlqObvUA', 'end_user', '3329018606', 'ouldjuan@yahoo.com', '$2y$10$6TeZ67Wa33XbwylIdMnTf.pT48xIHZFdRDQECenSkH4j2ZOEOO.du', NULL, 'pending', NULL, '2020-11-27 12:57:13', '2020-11-27 12:57:13', 0),
(724, 'ycElJXrCZ', 'vljfESacrqCmdt', 'end_user', '2501523355', 'maryamcumbe@yahoo.com', '$2y$10$agW/meWgIXZJrs1bLFHBWuJeFDSRrgVehFyo.diYBKfypdXVNPC6S', NULL, 'pending', NULL, '2020-11-27 16:22:50', '2020-11-27 16:22:50', 0),
(725, 'RFKNWisTLJb', 'iCmFrBWQItnKb', 'end_user', '5413982225', 'sedgwick.i@yahoo.com', '$2y$10$Uzt8xfhyUMOxJQp3sTamx.2SNWbod.p9RIy3Xl57bUG1u7s0pXla2', NULL, 'pending', NULL, '2020-11-27 18:55:02', '2020-11-27 18:55:02', 0),
(726, 'EDKgUABuj', 'ykzBrxRhqQAUlDnS', 'end_user', '3602441375', 'mshe0728@gmail.com', '$2y$10$W4Vdj1oMKhC1DRJQzdy5Jeu.mw7DLoa0Q3I2NGtXt7mx.3bMH.KnG', NULL, 'pending', NULL, '2020-11-27 20:31:42', '2020-11-27 20:31:42', 0),
(727, 'SFJRPEYtTWodQIx', 'cyZFmhTXVtPDO', 'end_user', '9808581389', 'sdonnelly4100@gmail.com', '$2y$10$90azZhk74ImG0xaEdSN9bOfvfYJqtLKEATM562asGl3vRbwrgNWbC', NULL, 'pending', NULL, '2020-11-28 00:42:01', '2020-11-28 00:42:01', 0),
(728, 'QZODgEfKtlbJ', 'sPZYomRJE', 'end_user', '2879654671', 'sthomas@moneymailer.com', '$2y$10$0CmnUIjp7WG1wM0mOO/PBOjG4Zhz1pB9dJI9oDsjKtK098FjoNGzm', NULL, 'pending', NULL, '2020-11-29 11:12:40', '2020-11-29 11:12:40', 0),
(729, 'ZgodhzmWxtp', 'LXDhgFRI', 'end_user', '9313010613', 'thevalleysaver@gmail.com', '$2y$10$hAwgLMZjlovNYTYw0Q6z1OD7clrJ5ayIy.LOTiwNd973oml68maK6', NULL, 'pending', NULL, '2020-11-29 20:40:18', '2020-11-29 20:40:18', 0),
(730, 'TaDWGEhitMKCFqn', 'yIgtEMSfPix', 'end_user', '9523694411', 'amandanorell@gmail.com', '$2y$10$XnA7Dr5T/30uTFZcR9j1u.H9.MlBOf97iuZIdyOynIHJdi9k46PS.', NULL, 'pending', NULL, '2020-11-30 07:11:44', '2020-11-30 07:11:44', 0),
(731, 'lFjhCUYvf', 'CBWuMNFrQemb', 'end_user', '4408373302', 'moffit.georgeanna@yahoo.com', '$2y$10$rnbyFN56pbSR9riYgNvVCuLyFFLLiEzGFyK8ZskHH6iY/4qeCMyL2', NULL, 'pending', NULL, '2020-11-30 10:36:01', '2020-11-30 10:36:01', 0),
(732, 'loJfUNnQ', 'QgxnJMhrvs', 'end_user', '3520019564', 'c.greene@wavecable.com', '$2y$10$6O60uOLOUaZihnGcT8DFYOEA.RJTkDdsHhQ8nmBsVmKOphS0rVG36', NULL, 'pending', NULL, '2020-11-30 13:36:37', '2020-11-30 13:36:37', 0),
(733, 'lvgUAuiwKacI', 'yVJfdYDiSrCqLH', 'end_user', '3105528137', 'whiteman_ha@yahoo.com', '$2y$10$ixL6FKs46DHKlv78.r4a8u2MQjdTw/wV.oZnSJSUuDRV6j8jalIf6', NULL, 'pending', NULL, '2020-11-30 15:03:12', '2020-11-30 15:03:12', 0),
(734, 'SWmyrnFeKlZVDHQ', 'KkNirOMHj', 'end_user', '4045681093', 'leon@regentcoffee.com', '$2y$10$lIzxIpsT4hBcpzHShvsYJOwAjL4xoOoo0oi0FSEkK0JWzjV8.MY5.', NULL, 'pending', NULL, '2020-11-30 17:39:30', '2020-11-30 17:39:30', 0),
(735, 'JDfwSnmkoaleq', 'BvDkMZhop', 'end_user', '8299630961', 'dwaynebethel@gmail.com', '$2y$10$tarJOH95TsMpdjkNb76kVeS..zkAfxKt1dHHAB1j2a4LyT4jJAZW6', NULL, 'pending', NULL, '2020-11-30 18:31:44', '2020-11-30 18:31:44', 0),
(736, 'akNgweKlUticmd', 'NFXtiSAhErHMORzQ', 'end_user', '3553510687', 'cybarbo07@cox.net', '$2y$10$ql/BgVvcjOzp1SDVB0TCKuJJDHk.YJBkZDGClwTyLfFNMvyJ6B0hu', NULL, 'pending', NULL, '2020-12-01 14:59:44', '2020-12-01 14:59:44', 0),
(737, 'fBpPGxKCJwlRYL', 'sopIfmdZjxrbuD', 'end_user', '8671624104', 'cmcnaboe@hotmail.com', '$2y$10$O3CO/.eIiu6imWqv.pEumOctMcUF.RtTm9Xx.ELvQYcBuZH439fQm', NULL, 'pending', NULL, '2020-12-01 16:48:25', '2020-12-01 16:48:25', 0),
(738, 'oCZEujmqhdbW', 'YsdNpwvfUPkMoLe', 'end_user', '5728613858', 'youngsinsco@gmail.com', '$2y$10$dtoiCmIWauap91sSTjnf/e49Ctr.y.Bzu7JZosyB6PBw70iMuZY4y', NULL, 'pending', NULL, '2020-12-01 16:59:49', '2020-12-01 16:59:49', 0),
(739, 'fQvdKutewbsgRkzY', 'zUjGLfBKk', 'end_user', '7553190202', 'cbeozella@yahoo.com', '$2y$10$qdTYcFc30oN6tve5o8g2Se8tXaybcu2beSOnRd2o6WcGEW6D6JQlG', NULL, 'pending', NULL, '2020-12-01 21:32:17', '2020-12-01 21:32:17', 0);
INSERT INTO `users` (`id`, `first_name`, `last_name`, `user_type`, `phone_number`, `email`, `password`, `creator_id`, `status`, `remember_token`, `created_at`, `updated_at`, `verified`) VALUES
(740, 'eALyrSilogamJVIO', 'AyJdihGpSjaQr', 'end_user', '9240413061', 'fl.lannon@hotmail.com', '$2y$10$MWNmibYllluO.qEACwMr7.RLTocZcpvoSxW2Nn29rbmj4dkL8BL6S', NULL, 'pending', NULL, '2020-12-02 01:10:18', '2020-12-02 01:10:18', 0),
(741, 'hdORQKIC', 'zylMJbEhUDpZOkX', 'end_user', '5745698783', 'cabanissruthie@yahoo.com', '$2y$10$rzt6VztJydDDZ1ocZrBFKudhgIrlLstiy9EoxitKP4MKUHxD4Rpxa', NULL, 'pending', NULL, '2020-12-02 01:45:40', '2020-12-02 01:45:40', 0),
(742, 'ZdyCuptFQql', 'DSNjQzEHV', 'end_user', '5417743523', 'travelingwilkersons@gmail.com', '$2y$10$rC9wDDiOqih7dJMNqu5jNegdLw3zD6iqPV.9HRkXAGPqW0.YRj.Xm', NULL, 'pending', NULL, '2020-12-02 08:22:56', '2020-12-02 08:22:56', 0),
(743, 'ZNSjhoKOl', 'BstRfSEaZgLNk', 'end_user', '6027798927', 'pkyres@tampabay.rr.com', '$2y$10$WWyIXRNa2YKLdXKVA4xJXOxqTf0W1DnO8arfjg0CZ5noMI78blEpy', NULL, 'pending', NULL, '2020-12-02 13:51:37', '2020-12-02 13:51:37', 0),
(744, 'ejndVFqh', 'GTzLMvxhWAeygNRF', 'end_user', '4882727323', 'poleybv@nbnet.nb.ca', '$2y$10$iH7F/hno.G0yED/Qm18VMuqpXgJUjDRoSA7qsK2LqKIEyM9NR9mpW', NULL, 'pending', NULL, '2020-12-02 18:47:10', '2020-12-02 18:47:10', 0),
(745, 'uATSJPhWqoZd', 'YhdGKliFyCNqnBZ', 'end_user', '9308650361', 'enola_burch@yahoo.com', '$2y$10$d5OuOkVONTcfW4drXm2Yee1Xd6xcqh6aZNI6oIbKG4Pm5rUyHGFDW', NULL, 'pending', NULL, '2020-12-03 00:11:31', '2020-12-03 00:11:31', 0),
(746, 'ekFWpqYGCA', 'nEitCcNv', 'end_user', '2674486902', 'heavensent05@msn.com', '$2y$10$.ndnIumKRkJ71TZq4o7EoOQ4TFgoTqGW/LhScWsWnF1nCz3Vw3cJK', NULL, 'pending', NULL, '2020-12-03 19:27:43', '2020-12-03 19:27:43', 0),
(747, 'YtMTPRDqJja', 'GgahzNcx', 'end_user', '4503710997', 'anderlypetit@gmail.com', '$2y$10$DrgD2yRLLWpV0rXvY02nteuE1owqw10dKnteY8Tr60IxDsQaZI6MS', NULL, 'pending', NULL, '2020-12-03 22:25:41', '2020-12-03 22:25:41', 0),
(748, 'aAROjGylLBDeV', 'PGJIDQUZ', 'end_user', '4916745131', 'dsalcetti@gmail.com', '$2y$10$wh/5GAEJkB5.zWBhhr3vW.NVDmLj.d7V/oZylDWs721ytDGorBYvG', NULL, 'pending', NULL, '2020-12-04 01:50:57', '2020-12-04 01:50:57', 0),
(749, 'LvolOEnMXVsQe', 'grBekUQnFEmSyIR', 'end_user', '5292528327', 'hilaria.gascoigne@yahoo.com', '$2y$10$uj/iVCKRKdab0J/WKvSFRec0aVab07JQFhY2Iy4/J8LrGObj.8l/K', NULL, 'pending', NULL, '2020-12-04 03:12:10', '2020-12-04 03:12:10', 0),
(750, 'RdnNLaCz', 'ugKYzBToAa', 'end_user', '3633117462', 'r.maragaret@yahoo.com', '$2y$10$opovJvBRda4VcQemLUOMCem.BitZcNqsB8dFOPTVyeVx4eOj8iL8e', NULL, 'pending', NULL, '2020-12-04 04:37:45', '2020-12-04 04:37:45', 0),
(751, 'UEgWYdxOzK', 'vDqLuaXWpKTOdBHF', 'end_user', '8169691335', 'khokharwaseem@hotmail.com', '$2y$10$brX7twDbFHbO2EnZ4KA3iu7O/p9K88nqin8nmvSi/6fnrEHBFgErO', NULL, 'pending', NULL, '2020-12-04 15:57:12', '2020-12-04 15:57:12', 0),
(752, 'LoeYmMVxsWg', 'nIFtfykdBpj', 'end_user', '4253504075', 'mreed@nmcaz.com', '$2y$10$9tRFNpT/.OoOjGwlgRY.ruYmDjLU/DA5QvVSgr48Kx.ud5oulJWN.', NULL, 'pending', NULL, '2020-12-04 16:52:56', '2020-12-04 16:52:56', 0),
(753, 'FKJAoYqR', 'mnRQBOdvpSVkNTE', 'end_user', '4733659141', 'leyrolela751@gmail.com', '$2y$10$hBfUqfsLE7BSonGBO6V6je6cMEpmrWZdPI5VNhK5MUhRJwk0KZZ5W', NULL, 'pending', NULL, '2020-12-04 20:47:00', '2020-12-04 20:47:00', 0),
(754, 'pePuqJzr', 'ogaLpFbIqmxBQ', 'end_user', '2469785143', 'babrosnan@gmail.com', '$2y$10$VmHwoq.NkZM0XNdlcQgr8O95tLUeEM92e5YbJtCGnQpjLGgy/BDSa', NULL, 'pending', NULL, '2020-12-05 05:06:21', '2020-12-05 05:06:21', 0),
(755, 'DTdNaltQZmPe', 'nxtCbmkORgiLrso', 'end_user', '4230064010', 'jbruner.uga@gmail.com', '$2y$10$ST/6ul18AHzFxW.gSvtsfOa9LyqSvjmRf1HRu1g9NEHNnaX4I0FSW', NULL, 'pending', NULL, '2020-12-05 15:28:29', '2020-12-05 15:28:29', 0),
(756, 'KjWbuFBXwHtrQR', 'VJOPvngDZrETLaH', 'end_user', '5234414277', 'sye.shirleen@yahoo.com', '$2y$10$YVhAxl5YKFKsyoz/qzZbFezf2KPM9OdraTvoKFDI419JRpOqnK6Zy', NULL, 'pending', NULL, '2020-12-06 15:06:23', '2020-12-06 15:06:23', 0),
(757, 'PlqSupFmj', 'aVPJGpMjtBL', 'end_user', '3723444916', 'brokedenise@yahoo.com', '$2y$10$9cIIFlGw48yjscgxueibtudteUkUMFpRNRIsJxbCiw3NLUOzLpF0e', NULL, 'pending', NULL, '2020-12-06 15:55:00', '2020-12-06 15:55:00', 0),
(758, 'hglfytSeJVKEmi', 'tpuOJdoQFHMGkYv', 'end_user', '9131012934', 'kememi@gmail.com', '$2y$10$mDdxkseYodtfoSHrC2ZOz.ycAdcfy2pJt3mlInPmFoeAFi/Tsqimi', NULL, 'pending', NULL, '2020-12-07 12:34:54', '2020-12-07 12:34:54', 0),
(759, 'igfGUzBqpsWSF', 'NtivKyUoaRZzlQqg', 'end_user', '6382200464', 'yessi1499@hotmail.com', '$2y$10$/gZoaPSf1XoHP2lprRSs4eqwtYct5QXfhWQHE2if5xupIzjv5G8Ge', NULL, 'pending', NULL, '2020-12-07 13:49:30', '2020-12-07 13:49:30', 0),
(760, 'WOBluhDJCT', 'fIpbiNxRYt', 'end_user', '4112083415', 'lindacarter1952@gmail.com', '$2y$10$/CQz.r5CtVdBL12gysD9fOtACowA93jmDyp67nYhTjSaxLsDwiG5y', NULL, 'pending', NULL, '2020-12-07 14:01:18', '2020-12-07 14:01:18', 0),
(761, 'uJWSqCkhMf', 'ngVZXPcdSieTxst', 'end_user', '7296338455', 'masonjames2277@gmail.com', '$2y$10$HJboLG9Vkr9z/ASZR7NBVeAWZ2nuwyMorpGgx0TVGAzSV/K6SJFD.', NULL, 'pending', NULL, '2020-12-07 14:48:26', '2020-12-07 14:48:26', 0),
(762, 'kxYrUOKJMVbmvq', 'jRghaMFfEdHTm', 'end_user', '3946945111', 'meaganmoody_12@hotmail.com', '$2y$10$mWHLA8Hzxk4oi7s1RTd7Leoz3p7exlndgvfZZyDEPPTlfM1uCOh3.', NULL, 'pending', NULL, '2020-12-07 15:26:29', '2020-12-07 15:26:29', 0),
(763, 'PmZIsozgBkwCFth', 'xaAGlWfsScN', 'end_user', '9036038405', 'annacleveland5202@gmail.com', '$2y$10$VTAfhHyxyDdJDdNuFgBt0udcyxwnORNpXGuJwxSgoqEy4gyz1IJI2', NULL, 'pending', NULL, '2020-12-07 16:02:54', '2020-12-07 16:02:54', 0),
(764, 'IyrMosJmhbBfFTH', 'WjPHbJuiRrtcBkF', 'end_user', '5493378500', 'kerstin_allison@yahoo.com', '$2y$10$tPp6VFp.8kDWnf36XUVlk.z7zCLIBmQeoCDxGd6tX62MyooLfLBbO', NULL, 'pending', NULL, '2020-12-07 16:42:50', '2020-12-07 16:42:50', 0),
(765, 'jGgRYXBk', 'LHRWcwdGXQKpaik', 'end_user', '5662028773', 'teresatoscano@gmail.com', '$2y$10$9akv6Rm2iLToWI3w0RQGYuxCv/uWoBliJjkPB5W8EmfWd6h9rXBLK', NULL, 'pending', NULL, '2020-12-07 17:07:03', '2020-12-07 17:07:03', 0),
(766, 'sFyUELfZi', 'InkUGsLFZ', 'end_user', '2485261165', 'bak11403@gmail.com', '$2y$10$tYDt58.QbA9lszsGUmFKsOdP3h9CXMiMoSp7v6uP9dcW6Qdashr/e', NULL, 'pending', NULL, '2020-12-07 21:59:03', '2020-12-07 21:59:03', 0),
(767, 'OJPugLxwTMZbHhIp', 'zPEhBUvkgZ', 'end_user', '2839723662', 'vasilevska1234@gmail.com', '$2y$10$HZ7YJrAKUjMzc8Bx7Vrh6.vC.xijAiomABwGFXv0533APwOGJOQmW', NULL, 'pending', NULL, '2020-12-08 12:39:27', '2020-12-08 12:39:27', 0),
(768, 'GkJPQNjftxWVbnK', 'rJQBzUVlGjTWpARc', 'end_user', '9614603064', 'immameme5@gmail.com', '$2y$10$r/HJS./Sv9eL091nrYsr3OLSaYEmpZL5tHeQ9/9UiVyUcqvUU9tvq', NULL, 'pending', NULL, '2020-12-08 18:05:38', '2020-12-08 18:05:38', 0),
(769, 'HRQBSfyPjNhLMDt', 'nmXRiEBlgI', 'end_user', '4020357146', 'j.jacksonhewitt@gmail.com', '$2y$10$FXEfmbgZhdXG2NQzEBzlkOv23D9EWFBnDtHq2KHsxDK3KPx3PvPri', NULL, 'pending', NULL, '2020-12-09 02:57:27', '2020-12-09 02:57:27', 0),
(770, 'UWRrGgMlJEX', 'aLuTMIRHYkrg', 'end_user', '8449881942', 'sommerkristeen@yahoo.com', '$2y$10$GbfGRVe4BQBDtQZvmZmJoen4r1r.lAEKoeSitMaf6vHEnFnuWx.0u', NULL, 'pending', NULL, '2020-12-09 04:35:28', '2020-12-09 04:35:28', 0),
(771, 'euygpEbGoDnIax', 'aUAonePpOrFQ', 'end_user', '6759360005', 'la105@hotmail.com', '$2y$10$jK/QsQDgbItaBnG7mZIlXuVTgGC1Fm2WtZYWs2ybfrrI96wZiOOkG', NULL, 'pending', NULL, '2020-12-09 08:24:08', '2020-12-09 08:24:08', 0),
(772, 'bDvqBlKCkQS', 'oHKINuWnVOCX', 'end_user', '6727118003', 'amandamyers29@gmail.com', '$2y$10$lI8Gh.cmllBQ447Jg9f4gO0NLZM7P8xj8sZfhxeMWIizCivc934ee', NULL, 'pending', NULL, '2020-12-09 17:02:43', '2020-12-09 17:02:43', 0),
(773, 'glsyWaopZObIUD', 'sYBafEowrlD', 'end_user', '7477118335', 'bishopham@gmail.com', '$2y$10$9GnIrf4Kc5Owjh6FRQET9eRxbGFRqFskzpsCuHko6h2wzlc0x7MRm', NULL, 'pending', NULL, '2020-12-09 17:42:26', '2020-12-09 17:42:26', 0),
(774, 'lmASTrOJu', 'PmKBwsMN', 'end_user', '4173307754', 'fshupnik@cox.net', '$2y$10$G2T3qUD8.XicQqIcZ1./KeiBsaNT8C2u9mPIbqVSmpYt5h5jXiszu', NULL, 'pending', NULL, '2020-12-09 17:57:38', '2020-12-09 17:57:38', 0),
(775, 'YwGSfKDlxQcda', 'SNdHIJbolnRvrckA', 'end_user', '3323142567', 'darzuer@comcast.net', '$2y$10$tREzLFNgTtN5/qcWj0Plbud2qj1VS22oIcIOun6dIdpqR9Xd3kAGG', NULL, 'pending', NULL, '2020-12-09 21:31:54', '2020-12-09 21:31:54', 0),
(776, 'GlJbjcgseV', 'lAPvdCHGhQgfS', 'end_user', '7344928867', 'wfrier@netscape.net', '$2y$10$DYWpD3Dp8e6GNmTJXiqkmuK9/J7tbe3q0zvrw5ZuJ1G/a7xthVYHC', NULL, 'pending', NULL, '2020-12-09 22:18:49', '2020-12-09 22:18:49', 0),
(777, 'MVdLbRNgTzpoA', 'PLjsYEobpci', 'end_user', '6186075658', 'jerryunderwood788@yahoo.com', '$2y$10$ZPKIJcZvPiylvJoGTie1/udT9qfnYpwmGjSbEOanx9kGkooVGFHxC', NULL, 'pending', NULL, '2020-12-10 03:53:04', '2020-12-10 03:53:04', 0),
(778, 'kBhDsAPVeSwjNU', 'uZXLeMKdah', 'end_user', '4357212695', 'bc.wellness01@gmail.com', '$2y$10$tt2fcxp7.uIEd4j1AT5gwOWz40s5tcHFmDknJk17ghJi5U0HbL3ZS', NULL, 'pending', NULL, '2020-12-10 14:30:00', '2020-12-10 14:30:00', 0),
(779, 'ZvNjbytAS', 'gvzoqYxbE', 'end_user', '7569468334', 'tgkoepsell45@gmail.com', '$2y$10$7UqQQBYmi/4AVekFB0tjreY.E6XY6TVmE8VuZaLhfMcBNbcBy4f9y', NULL, 'pending', NULL, '2020-12-10 22:06:02', '2020-12-10 22:06:02', 0),
(780, 'pHGIQqFiNdARVXPh', 'gSslJzcBHGAukU', 'end_user', '7564596271', 'sergiosoto953@gmail.com', '$2y$10$jftjdoUooydJsNUyVwOY0OmEEpDUPbDNbtJ3e19SeX6xCzsaMbK..', NULL, 'pending', NULL, '2020-12-10 23:21:37', '2020-12-10 23:21:37', 0),
(781, 'xiXENhVldw', 'umwqEznlQfiDNYvj', 'end_user', '3512063905', 'kalexander51@gmail.com', '$2y$10$mUXRgxEMFNqSGmsJ1kb5aOrNvyKA1MWqfztf8RiI405zf2MtiyKuy', NULL, 'pending', NULL, '2020-12-11 14:19:43', '2020-12-11 14:19:43', 0),
(782, 'BblJcCijDWhVTqa', 'YflCdPoVi', 'end_user', '6121502467', 'jim@jeepsolutions.com', '$2y$10$Htp1i.5iZKkJ/HVtIACss.5.7wmoMr2egbT8ZlYvyO311yflEKUxS', NULL, 'pending', NULL, '2020-12-11 15:28:54', '2020-12-11 15:28:54', 0),
(783, 'meSytcDsR', 'bBzpReHNPZvtahQ', 'end_user', '4606313656', 'judimcleod52@gmail.com', '$2y$10$abjEIuB5KlC/PPaoVf2WAufVl/3CVXl8oz5jslEyzDoDbdOH9PLR6', NULL, 'pending', NULL, '2020-12-11 18:05:12', '2020-12-11 18:05:12', 0),
(784, 'wioxBVlGug', 'UVnrbjQBMxgXEquJ', 'end_user', '6237169320', 'orpha_buckley@yahoo.com', '$2y$10$YONvU.RaXmCwqIe5YbW67.Wsf2WdmaokQiStZRKifNr.NSu40pVMq', NULL, 'pending', NULL, '2020-12-11 18:15:22', '2020-12-11 18:15:22', 0),
(785, 'AJEMqXNSUvpbiCz', 'AEBPRTOvjCXbVdyf', 'end_user', '9685927284', 'rothwellshirleen@yahoo.com', '$2y$10$1TaRxu/vNk.eOpgP52X9xuD1Ecum109fbwfhqFQtDhywL9lf00dqO', NULL, 'pending', NULL, '2020-12-11 19:05:58', '2020-12-11 19:05:58', 0),
(786, 'nRxIFUqDM', 'CmoTgSrPYKh', 'end_user', '7835911069', 'breanne.renner@gmail.com', '$2y$10$mEcEJ2UbOlYdWqD6XlgJT.bxbCdgttoRuKVvZKHrbZwus2edzzjEK', NULL, 'pending', NULL, '2020-12-12 14:26:35', '2020-12-12 14:26:35', 0),
(787, 'UXegLjuSsnpd', 'oAxGpPniVygYHf', 'end_user', '7618586027', 'karengardner2807@gmail.com', '$2y$10$V/1u6sBSx3L2eowbkkHV3Ojg8tcyWQ/XjGPYjKMemE0C1Dp/aNjfW', NULL, 'pending', NULL, '2020-12-13 16:54:33', '2020-12-13 16:54:33', 0),
(788, 'TbVPkdNsK', 'IOVzAaeHkUTrPjGN', 'end_user', '2576958902', 'reeve.crissy@yahoo.com', '$2y$10$m8Jc.v/Uyygt3p602kAv8eO3EaOqMXL6hqvhtDtkCXXVRl/3sTmzC', NULL, 'pending', NULL, '2020-12-15 02:21:46', '2020-12-15 02:21:46', 0),
(789, 'Rais', 'Khan', 'partner', '01788820244', 'raiskhan92@icloud.com', '$2y$10$j9mGffzbXc9Hot80cY6LpOc867sI5MnAkkNWZCsq5gfhovnQophGW', NULL, 'pending', NULL, '2020-12-16 07:04:25', '2020-12-16 07:04:51', 1),
(790, 'CbvQNZkfIHzn', 'laOqdNJmBfuyRcW', 'end_user', '3615302379', 'denise.valllance@yahoo.com', '$2y$10$gW5dOZn.7F/UL609/WP2lOtjAdEuqfD1OfakuRLf/.gdxuuf9PDw6', NULL, 'pending', NULL, '2020-12-18 08:58:34', '2020-12-18 08:58:34', 0),
(791, 'HbgAfCPyEGlzRJQ', 'VNuigqlMzdXJ', 'end_user', '7213307739', 'clarita_mcpherson@yahoo.com', '$2y$10$usA9YpCPq89ON8o6VgFzm.ayObAeJSOLRmZsiFqcrCrcbOh6v4NkS', NULL, 'pending', NULL, '2020-12-18 13:39:06', '2020-12-18 13:39:06', 0),
(792, 'Sascha', 'Müller', 'end_user', '015229457413', 'sascha.mueller@mail.com', '$2y$10$HIEawQdJsxLI4/zEtO5k4u.WRkyPObXI3GBGN3d27Anr2hxZ73Vbq', NULL, 'pending', NULL, '2020-12-19 08:13:06', '2020-12-19 08:14:11', 1),
(793, 'HvfmqdYkgNCyX', 'nZSgfmQAFrWw', 'end_user', '6950879035', 'norcatlilian@yahoo.com', '$2y$10$rfDdLgml7CZuL/AAaHBboOWH3U/2nHk2hT8CNU9D4GQ7wZmiK1lPC', NULL, 'pending', NULL, '2020-12-24 12:11:13', '2020-12-24 12:11:13', 0),
(794, 'JtVHKbILqx', 'QmvNElBLhAt', 'end_user', '9114736817', 'kristykellt@yahoo.com', '$2y$10$KeRGqAudBtUcZmFxEGLWdul4jMuSx7sx6vHywTs/1/DaX6yberPc6', NULL, 'pending', NULL, '2020-12-30 12:22:39', '2020-12-30 12:22:39', 0),
(795, 'EhjVCFADrITi', 'euORpgahQnsoNwA', 'end_user', '5772946360', 'golbornevicky@yahoo.com', '$2y$10$4vWOlFvVHkGorggS26jc0./bOGEv6kmHtK5hm3CVJjg4W/diWSxnC', NULL, 'pending', NULL, '2021-01-01 01:56:00', '2021-01-01 01:56:00', 0),
(796, 'qHneYbpRNxhEQGXz', 'wEcCFqYZArTnjKSH', 'end_user', '6417468712', 'joie_mure@yahoo.com', '$2y$10$6UPqMRBhUzYfb6uHfzKsmOtu05EE5/AjRgECC9mBP24JvR/LpzdoC', NULL, 'pending', NULL, '2021-01-05 13:09:26', '2021-01-05 13:09:26', 0),
(797, 'KCBqWMbHlZxN', 'ElmIoBtxCjHk', 'end_user', '5437020513', 'englishalanna470@yahoo.com', '$2y$10$sKI8tKU6A9F78iuQqjQgVOM46VIz4RMpiw9dZXZfkvIq9n0bSkwoW', NULL, 'pending', NULL, '2021-01-08 08:29:14', '2021-01-08 08:29:14', 0),
(798, 'vZrzextnLY', 'EfGIHWQbXCZRlO', 'end_user', '2665740748', 'lorri.normandy@yahoo.com', '$2y$10$J20RYI2YMCcB8.4YM5ooNu8gF69w.sIWxHXbK6OjlgZlpZJ7uFR6q', NULL, 'pending', NULL, '2021-01-08 09:57:21', '2021-01-08 09:57:21', 0),
(799, 'rvMbsPoZ', 'JzNZmbSYE', 'end_user', '7218984237', 'webbjoshua524@gmail.com', '$2y$10$2v0V3oHzSwEf7B0TqnJFmuM8wqBmqzXhOiuinrRR3NWZh67KgUcIW', NULL, 'pending', NULL, '2021-01-11 10:02:18', '2021-01-11 10:02:18', 0),
(800, 'slVUybhMgXe', 'amvxcQKXiC', 'end_user', '9274539535', 'robinson89@live.com', '$2y$10$mrgS5C1hdjnFZcTGCwsehOtcfWHYA2UXCxOBnxFGTA7PA5iXrfori', NULL, 'pending', NULL, '2021-01-11 15:27:28', '2021-01-11 15:27:28', 0),
(801, 'LzuJjPhnMkvISlOa', 'wMzYtoCcVJ', 'end_user', '5277549827', 'rachel_house@cox.net', '$2y$10$rGCzioGswyzCLVob9nMcZeBPAT7D.8/KyIrHXAe1SwNtQD.kEO/g2', NULL, 'pending', NULL, '2021-01-11 15:30:28', '2021-01-11 15:30:28', 0),
(802, 'YeSljsIDEKUHXgB', 'HmJtQqIDfiRCnF', 'end_user', '7948233566', 'romartsa@outlook.com', '$2y$10$q6YS4tFK8bDP5v0Kh/KfWe4sKB5LuoamOtRHy336HBVM4kkTrUXD.', NULL, 'pending', NULL, '2021-01-11 19:05:58', '2021-01-11 19:05:58', 0),
(803, 'UxNGZBqJSH', 'nqcYOEMZPQwtDe', 'end_user', '4538763516', 'jeanjamurath@hotmail.com', '$2y$10$iHxvV2YvwwyDX5pYY4/mu.YR1P2qDE8lF6.ZdSbORUBXm2G5bqed.', NULL, 'pending', NULL, '2021-01-11 20:48:24', '2021-01-11 20:48:24', 0),
(804, 'ZaJLhrvyljiQDG', 'rKLeWmbZk', 'end_user', '3480441850', 'karpovitch@gmail.com', '$2y$10$JOrioRJwjntJyxd0KZX21uifcSltu6ZN1CF8YrS08Xr3si7KrX4BC', NULL, 'pending', NULL, '2021-01-12 10:34:18', '2021-01-12 10:34:18', 0),
(805, 'VTDbjvXe', 'knDYJUaT', 'end_user', '2204786017', 'michael.able27@gmail.com', '$2y$10$JW3nNvoMNhtzQPtHHQNs9eEqrKX8oRr63yrvgXEDSpVRFFFyKwZJi', NULL, 'pending', NULL, '2021-01-12 16:56:20', '2021-01-12 16:56:20', 0),
(806, 'JtczkgSnd', 'uycXiHwEUbgrDBp', 'end_user', '5316429738', 'stephanier2@hotmail.com', '$2y$10$w/DeTBiEBeeHgRUjyjlQQeedCn4ZNruj2Nn/gYWPCQMEJsB3sanJW', NULL, 'pending', NULL, '2021-01-12 18:38:28', '2021-01-12 18:38:28', 0),
(807, 'XdIfbBtUFvOrVwmc', 'hyFzTCZnBe', 'end_user', '2253527585', 'm21253821@gmail.com', '$2y$10$K.J5bG.rmYr5yxU28kPitOfwC.FdzM1WzwfrDUmV8/PyLzm.ZZxSu', NULL, 'pending', NULL, '2021-01-13 08:56:16', '2021-01-13 08:56:16', 0),
(808, 'fabXAvLQxWgiuSEK', 'HEaCAPZKNGDX', 'end_user', '8542916661', 'ytolstop@gmail.com', '$2y$10$Rr.OL.7zQVcjN3yoflMJ4eTZ8YwTFNz18pfZWOD98a8d9JDm3mH.q', NULL, 'pending', NULL, '2021-01-13 16:35:01', '2021-01-13 16:35:01', 0),
(809, 'vKIYoHbJrByPZhnN', 'WXSUJrGYmjQxuovl', 'end_user', '5857743535', '49sarge@gmail.com', '$2y$10$zwoUqnIKdwa74DAyKaJ8GOT6rmOVq.q2R/kpXKWIFo07jO55ZQj0y', NULL, 'pending', NULL, '2021-01-13 19:44:48', '2021-01-13 19:44:48', 0),
(810, 'ysepSzFUNtO', 'KNtwnQIeTHGujV', 'end_user', '3331382937', 'waindshaina@yahoo.com', '$2y$10$XSUFcz/6ZnU5PvcHy.8kfusEkzQF4h45/pj7v0YMPYBjX6/UH1cUG', NULL, 'pending', NULL, '2021-01-14 01:19:46', '2021-01-14 01:19:46', 0),
(811, 'WOqkLKtSgJ', 'MkxmGdHQfwLlD', 'end_user', '6571286722', 'okane.o@yahoo.com', '$2y$10$pKSltX.AZkmK67G/qy3jSuyL8Kf2Jn7CxBqZzJ2owJ3BbxoUnkkqu', NULL, 'pending', NULL, '2021-01-14 04:10:23', '2021-01-14 04:10:23', 0),
(812, 'gqIyvxRrtk', 'BrVpjPwtSRWMQHlA', 'end_user', '4844194175', 'rxjd88@gmail.com', '$2y$10$IEIeGFUpJwhzbEol4kr/EeNrhz/vvwIhJDVojK6Q9SBPYpDsFSXCK', NULL, 'pending', NULL, '2021-01-14 09:33:38', '2021-01-14 09:33:38', 0),
(813, 'ebOxXUmoEt', 'jCzbKrWLkqaN', 'end_user', '7623247006', 'kirwanrosalie@yahoo.com', '$2y$10$jfZRbRkRjxJw1SI.x.k5CeJR4GvJk.WzwQ7d8zP/rTDm/Y1fycDbS', NULL, 'pending', NULL, '2021-01-14 14:04:19', '2021-01-14 14:04:19', 0),
(814, 'GsKidJprTc', 'ynPmkpCODA', 'end_user', '4367030621', 'fishbaseballfootball@hotmail.com', '$2y$10$2ldzagXeQ65ZF5mW9vede.wOHsjjhSfcymoGjq0UGtCXT3n3VGbhm', NULL, 'pending', NULL, '2021-01-14 15:39:56', '2021-01-14 15:39:56', 0),
(815, 'IEOilUQhSFJ', 'RSkvyiZxNCz', 'end_user', '8518336078', 'seawings49@gmail.com', '$2y$10$TBy8Nvmj2cyiceAT5vSe6OW6xJnZIl2Vr0/F4eO/KtBa3poHkhIfS', NULL, 'pending', NULL, '2021-01-14 18:28:03', '2021-01-14 18:28:03', 0),
(816, 'bMntSBVAlWw', 'kmyaFiOXgTBjnErc', 'end_user', '8533641526', 'tomcan@comcast.net', '$2y$10$FvQGvzSG2bx4XfXNgAZFi.ha9deoALjUEs65OVO7fk6FjLZLc5Odq', NULL, 'pending', NULL, '2021-01-14 19:23:06', '2021-01-14 19:23:06', 0),
(817, 'EIgBjVUyRGnd', 'hwVKiqTsvYWkt', 'end_user', '5005642085', 'catharine.westbrook@yahoo.com', '$2y$10$V2pLex1245z5y18aEhPL3O8NMcmaO3SLA2KnkU4ABXomWJsyw0lti', NULL, 'pending', NULL, '2021-01-14 20:21:45', '2021-01-14 20:21:45', 0),
(818, 'TVIYrztxdEweWA', 'xjionlAQbZugmtVC', 'end_user', '3145453000', 'zhangqinyi0908@gmail.com', '$2y$10$HJKD8c0K0gLQ/EHkBWykleVoZO5125eGI4J8mYHupU231/Wfctd9C', NULL, 'pending', NULL, '2021-01-15 12:52:51', '2021-01-15 12:52:51', 0),
(819, 'WXjYRLHi', 'rTFeuLlqpsto', 'end_user', '3192104720', 'tetro.vella@yahoo.com', '$2y$10$jkT8K1SA.wLdmcDLR8uVOOGKW.VkUnasj5MbfpXWTqQ54Th0Q8tiq', NULL, 'pending', NULL, '2021-01-15 13:39:55', '2021-01-15 13:39:55', 0),
(820, 'FVKprfWyTGYZE', 'RSQVPnxLiNXt', 'end_user', '3589290652', 'ccyrus74@live.com', '$2y$10$/GuM4iR7hpcslEw7fm2zKeU1UsMR3gC1YVSgSF41o726bS/0kjr5S', NULL, 'pending', NULL, '2021-01-15 14:28:42', '2021-01-15 14:28:42', 0),
(821, 'kwqyGCgroZUp', 'mwJtkelbUH', 'end_user', '7621332832', 'terry.riddle@hhchospitality.com', '$2y$10$JeaqVwPGdtwCD2qkoF6bkeGFD6WLIXR83ioyMCahnjChsYsa1o80S', NULL, 'pending', NULL, '2021-01-15 15:38:04', '2021-01-15 15:38:04', 0),
(822, 'CfiQPKHTBy', 'wYQVACOKRtexZWLm', 'end_user', '2676798742', 'cathie.season@yahoo.com', '$2y$10$8xX5Z./N65P4YMME/F/ggeFWn8/1mjojiOWkZ13WBi5m7C66jUZeG', NULL, 'pending', NULL, '2021-01-15 20:53:26', '2021-01-15 20:53:26', 0),
(823, 'gUKFetHDGdkRPITu', 'UPbDpiJxBzdZ', 'end_user', '4719989089', 'mr121036@gmail.com', '$2y$10$gF5yd1WdjNkL8PVGuAEZw.HpK/SQRyMsH3Yk.HpBBP/jCXLYAE0gG', NULL, 'pending', NULL, '2021-01-15 22:32:24', '2021-01-15 22:32:24', 0),
(824, 'wyZdqjVcBzKfQTY', 'VzGTKdRDvZX', 'end_user', '8414697713', 'williamsullivan8406@gmail.com', '$2y$10$WJnTlhKqkMtA0Y4ejJWuEOOivZL5t1wC3Psv7IQXkxzY3vtbDfhCK', NULL, 'pending', NULL, '2021-01-16 02:34:56', '2021-01-16 02:34:56', 0),
(825, 'LRJmfylznuiVIST', 'VIKTqAJa', 'end_user', '7298442671', 'stcrile@gmail.com', '$2y$10$dMaBnc6VEtkvrCEzRmD2UekBkFXud5l4TceL6hDKR3qo6OUIVG3D.', NULL, 'pending', NULL, '2021-01-16 09:28:33', '2021-01-16 09:28:33', 0),
(826, 'rLmFwDCocNUQnu', 'vZiBXeIw', 'end_user', '7915544734', 'marymcinally4402@gmail.com', '$2y$10$hRYY6RLeqdxANboarnIv5egTn/htOgeLj71cSYszyB5Q8/yXkSWmS', NULL, 'pending', NULL, '2021-01-16 10:35:09', '2021-01-16 10:35:09', 0),
(827, 'fRkzhJqCULXaivFu', 'kjGewSQCNRHFr', 'end_user', '7507308284', 'dempster_nicky@yahoo.com', '$2y$10$RwqkIuFhpvZEAaOD.1KuZeDSfV5DTf5b33DlLC6uhedmQR3KrWZwa', NULL, 'pending', NULL, '2021-01-16 22:03:35', '2021-01-16 22:03:35', 0),
(828, 'rtbROaAlHpZDXJz', 'nXZfLKgRlWPcoAx', 'end_user', '4527805373', 'wolter.jeremy@gmail.com', '$2y$10$ZI7bquR6WFjK5LkbXe3fJOT7l4/fvCmWjIva4Ir/o9KiaPqqCQ/.S', NULL, 'pending', NULL, '2021-01-17 00:53:08', '2021-01-17 00:53:08', 0),
(829, 'tdlYpTRaGL', 'jIWKhzCs', 'end_user', '3182502983', 'jayhun21@gmail.com', '$2y$10$KM/ffRiD1tJ2r4vBQF1iRe36LP9GKgd5PIq2Ig/kgZvqwtmryp9M2', NULL, 'pending', NULL, '2021-01-17 09:40:34', '2021-01-17 09:40:34', 0),
(830, 'zNpOtyKQHh', 'JQDiEluGrPNk', 'end_user', '9584341185', 'ashford_katelyn@yahoo.com', '$2y$10$iWBtNV.P20t5SqM.fycBfOzT6gGFJ6GlgrY1bIlh/j3lqx3FleI5G', NULL, 'pending', NULL, '2021-01-17 15:02:10', '2021-01-17 15:02:10', 0),
(831, 'CPHJjplkouYM', 'YQueUCdaJ', 'end_user', '8290892349', 'abbey_dukes@yahoo.com', '$2y$10$wuRjeHqhPZse8VyZwOZ4nujSd/y8fvare6ZhPGCW3CcI.tzxyPQ62', NULL, 'pending', NULL, '2021-01-17 16:48:30', '2021-01-17 16:48:30', 0),
(832, 'ZxiDYIoSB', 'DgiYBFOTGPhUa', 'end_user', '9221434473', 'turnbull.meghann@yahoo.com', '$2y$10$1wSddUEsicE/2pA4Vyq7u.y5Dw4XvwSGozZmSRGT3IQ6dUqXSzyqu', NULL, 'pending', NULL, '2021-01-18 07:54:36', '2021-01-18 07:54:36', 0),
(833, 'HQRtKlBCewWrLf', 'jgBMNJEuet', 'end_user', '3791070083', 'hannhsgems@gmail.com', '$2y$10$tcHlMy4H0gXt7mm4L/o63uGLNeC/8FsWUDloNkKBrKZo1ViNiGpsu', NULL, 'pending', NULL, '2021-01-18 12:34:55', '2021-01-18 12:34:55', 0),
(834, 'uiOvNyJlbLM', 'lPpxfgWeDcFrS', 'end_user', '4606305071', 'daisyrodriguez1082@gmail.com', '$2y$10$A3JVh8KM/5VqbOkcsmpk9.DpZ4Q57Stl452BBPjNi.A5i1Y4SLqdm', NULL, 'pending', NULL, '2021-01-18 15:18:48', '2021-01-18 15:18:48', 0),
(835, 'FMHgbZThVDanJs', 'xyPhXZprgaNCR', 'end_user', '4665401437', 'fasta@vacsoc.com', '$2y$10$2kGxT.Muo8zdBCI0ntkvmOWTDMoCWK.EUE3BuU4l4QlOwrckFnSBG', NULL, 'pending', NULL, '2021-01-18 18:39:08', '2021-01-18 18:39:08', 0),
(836, 'fDISwcyzBruhtgia', 'jMGPZdwhBl', 'end_user', '3047212990', 'info@luminousbio.com', '$2y$10$./xHlPJsLU./IusMri6LMON/bRq7QrEOOmbwmDmSsa8vD.nRkykAW', NULL, 'pending', NULL, '2021-01-18 19:26:35', '2021-01-18 19:26:35', 0),
(837, 'UqQYCbLNrJvou', 'hoEKrypULzF', 'end_user', '7077257262', 'raines.elvira@yahoo.com', '$2y$10$7nhDzngCuNB.nsJynU0ZOO..4tTH9VzUeEDCRzEU5H3W1iQqaI4r.', NULL, 'pending', NULL, '2021-01-19 12:55:55', '2021-01-19 12:55:55', 0),
(838, 'TZHIyufLEhl', 'QOirCJcwEyDHeNtk', 'end_user', '9559338392', 'lindsentwistle722@gmail.com', '$2y$10$ozx8g.YaLCTCLzHTduNOeOf3ZaoIIUiKT/f1XuBCYfKWJ7rKQdVXu', NULL, 'pending', NULL, '2021-01-20 07:05:11', '2021-01-20 07:05:11', 0),
(839, 'eTMnqLuh', 'jkvVTBaFqxRQ', 'end_user', '6594231096', 'verdiepuppe@yahoo.com', '$2y$10$s7zejqEKp9JlkeLdr8KXI.H8DJ3hRO7qpkE.yb7dqivpbg8rgP4Ju', NULL, 'pending', NULL, '2021-01-20 23:38:37', '2021-01-20 23:38:37', 0),
(840, 'tpAojDbL', 'JIAzKSLXTsyOx', 'end_user', '5512135689', 'brierly.america@yahoo.com', '$2y$10$Inv9FTNMntDJG4FoFXnq2OziaueSYrrK3C.G5mOuYvgF3V4lctSnS', NULL, 'pending', NULL, '2021-01-21 00:53:33', '2021-01-21 00:53:33', 0),
(841, 'EUbvNocSTA', 'JCIlmKUBqRAX', 'end_user', '3795508149', 'GworekzLFoy@yahoo.com', '$2y$10$OCfUfuML1QyJuGsnygn0RuHLnDZwvbo7LA1JhJGTcg1EQOFR0Qjqi', NULL, 'pending', NULL, '2021-01-23 01:37:32', '2021-01-23 01:37:32', 0),
(842, 'jkheMfYgRcAHty', 'VwsRHoZuN', 'end_user', '8675257831', 'ur806625@gmail.com', '$2y$10$nbCyrDrt1xQTo/X0Bhq0aOxQe9LBFOxH7A3E9FVREaeQCujAShbx2', NULL, 'pending', NULL, '2021-01-26 01:17:46', '2021-01-26 01:17:46', 0),
(843, 'jYSQwGCqRfa', 'YCZUMHpylEhekqoS', 'end_user', '4205364233', 'ehteleasterby@yahoo.com', '$2y$10$CLWi4AYxjWWY3/DNk5NB1OeMC4vKBwBP0tOu4p8BstPqV0tlHuLbm', NULL, 'pending', NULL, '2021-01-30 01:49:21', '2021-01-30 01:49:21', 0),
(844, 'MfJUwOIoBkjgEV', 'DUGjPWbvTdz', 'end_user', '6892602781', 'johnstone.kristie@yahoo.com', '$2y$10$qAEM3Dpz472EYCsKsC05EuRCYvj1qUwOkCJJ3XqG93UQ0uwV.TJRm', NULL, 'pending', NULL, '2021-02-01 20:43:01', '2021-02-01 20:43:01', 0),
(845, 'sKzeXpGVt', 'qZivAnFRh', 'end_user', '9501873443', 'zoilawiseman@yahoo.com', '$2y$10$pVu7czO86IThpQsPro/bi.NUs6sZC2usuUASMnIao3WyRRdDygu32', NULL, 'pending', NULL, '2021-02-05 02:48:37', '2021-02-05 02:48:37', 0),
(846, 'John', 'Giuliani', 'end_user', '+4915110533411', 'john@s-d-management.com', '$2y$10$y5EWrdvYi2D4nExlLJ9jKOVy9G48VSot3Lj.qr16xJDhQsyAIGajS', NULL, 'pending', NULL, '2021-02-08 21:01:40', '2021-02-08 21:03:39', 1),
(847, 'DfTpCIMPoLVR', 'QSDyUltGoc', 'end_user', '4811060586', 'wallacebobbi29@yahoo.com', '$2y$10$SVGppaRK1nG.FY1mbW5RpOXmTHAkGmiyEur1I4tX43/BywaxPif9G', NULL, 'pending', NULL, '2021-02-11 22:19:00', '2021-02-11 22:19:00', 0),
(848, 'gvbiAQLkpPcsRynE', 'oPSROkXNBG', 'end_user', '6058762097', 'letyas.jayme@yahoo.com', '$2y$10$qukTWRTKMDImHPuZnVR5kebj0iMndO7C6aa.HNyxevlDb4sRwkd7m', NULL, 'pending', NULL, '2021-02-20 22:17:03', '2021-02-20 22:17:03', 0),
(849, 'PMYdfXZx', 'XqzkuhLyAdfOJRgc', 'end_user', '4373432025', 'angeliguest@yahoo.com', '$2y$10$v3e2MD47YMuFyGnYRna/0.N/MbF.N9.SsCvaHbnS7SV07v49iLJW.', NULL, 'pending', NULL, '2021-02-25 00:33:22', '2021-02-25 00:33:22', 0),
(850, 'amEvLjUNSkhXABR', 'mnuFoEyQXAdp', 'end_user', '5864535230', 'gawthorpelucias@yahoo.com', '$2y$10$ypPjbI2v9uzZdjV0aWxUa.E5AlAXCe50L34AJnQYnfZS0OlBR79XO', NULL, 'pending', NULL, '2021-02-25 16:01:29', '2021-02-25 16:01:29', 0),
(851, 'VoABdZWEpaXtj', 'azHsVvlECPScYe', 'end_user', '2665242254', 'shawnda_wensley@yahoo.com', '$2y$10$dTxxzT/Fa5iSxALsoN2x0ukVjrBLpHp00ZOKvwZK8EHz.rfBIUbj6', NULL, 'pending', NULL, '2021-02-28 10:20:51', '2021-02-28 10:20:51', 0),
(852, 'aXpvrzxCsn', 'LWmIlbYg', 'end_user', '7069110928', 'anthonynewman3565@gmail.com', '$2y$10$Ozf0Dh9r4cZXLWH0hQZHbex1YOfnC5byfut.53B5KIJRNTv97cwrW', NULL, 'pending', NULL, '2021-03-02 00:33:16', '2021-03-02 00:33:16', 0),
(853, 'ylKXUhoIWwA', 'VTBRFJqy', 'end_user', '4145736730', 'katecscriven@gmail.com', '$2y$10$tfn4YcO0BUlak9wjb4k3iO1oWm/sFQpARv/jr9UDrlRL3sGee3JHq', NULL, 'pending', NULL, '2021-03-02 10:00:48', '2021-03-02 10:00:48', 0),
(854, 'UsJlfTFcoIwi', 'UnBLYaDk', 'end_user', '6406215998', 'camille.robino@gmail.com', '$2y$10$0OfZzeU8ioJhWMQ37AfDjulbg3XrODUwHCVQvknecUK/aoI./F1F.', NULL, 'pending', NULL, '2021-03-02 12:14:33', '2021-03-02 12:14:33', 0),
(855, 'yAQRDfIUSxZPGuJ', 'GuKXeFBnDRwoyzdl', 'end_user', '9210006855', 'maxokingo3212@gmail.com', '$2y$10$e1XenGz4C1UZ1v3G4rH1ZuEB.PRsb0i/A9rJ1I44iXZr536xkopDO', NULL, 'pending', NULL, '2021-03-02 13:11:06', '2021-03-02 13:11:06', 0),
(856, 'mksVgDQh', 'XicgMyQz', 'end_user', '5140571613', 'alphonse.barfield@yahoo.com', '$2y$10$6V5RNOtnQf6il505TULpUOLZixH1e6oUCrwjOoDGqI61K3KWOrcaq', NULL, 'pending', NULL, '2021-03-02 14:53:36', '2021-03-02 14:53:36', 0),
(857, 'XpJbOzZQBEdaNgt', 'toSzdpLPNDn', 'end_user', '4158129936', 'emilyenamm@gmail.com', '$2y$10$2wkG3ApW715.zmd2Ua9j5.fGT/NMbyt8Elp4kNj0tAuaGi7aFLCJK', NULL, 'pending', NULL, '2021-03-02 15:06:39', '2021-03-02 15:06:39', 0),
(858, 'DAGFwiERYu', 'BZkAycWjU', 'end_user', '3443686912', 'orowe22@gmail.com', '$2y$10$W35.wkqkR8y2gqslcsiUt.NBFa.d9HG5mjusOEG76nEPBP1g7TX4W', NULL, 'pending', NULL, '2021-03-02 15:07:55', '2021-03-02 15:07:55', 0),
(859, 'fChERivWF', 'XAnyHSER', 'end_user', '3048095786', 'imamungia@gmail.com', '$2y$10$D62Sa8/8FIHKsdpMR/y/XuESS96xem76598AaH0l2wPgJZ9IlMFRy', NULL, 'pending', NULL, '2021-03-02 15:17:05', '2021-03-02 15:17:05', 0),
(860, 'tsgnqYKdEczOwaJm', 'PTiDsNSertlLA', 'end_user', '6840988845', 'official@optonline.net', '$2y$10$rw2N8vC46abjlqIx94El1.xoTfAmaKe0AOg1C6vBJxLUFXPocPI5G', NULL, 'pending', NULL, '2021-03-02 20:24:54', '2021-03-02 20:24:54', 0),
(861, 'lniaMSbckmzXor', 'DeOawFyQhLslUfj', 'end_user', '2042816542', 'doug_mccarran@yahoo.com', '$2y$10$g.sHtwOD6RfAA4t5CUmYX.JIJCMqz4GFkXEILLXq5Gutps0/cFsFq', NULL, 'pending', NULL, '2021-03-02 20:33:33', '2021-03-02 20:33:33', 0),
(862, 'QVYcnIOkm', 'DiwmJoIzdWFeEV', 'end_user', '8061930616', 'josheranderson@gmail.com', '$2y$10$TYrIIh6PwYAq8j1KXS1pWec7Suv1NVMWpv1SpOaQjtwQ7haoxdd92', NULL, 'pending', NULL, '2021-03-02 22:03:55', '2021-03-02 22:03:55', 0),
(863, 'wqMRsxinSVQo', 'LmeGVNlJUkXi', 'end_user', '3789085290', 'rrandhawa2003@gmail.com', '$2y$10$O4DPuLSG2B/eXmtC5B2lheQZpfaIaHWIdT5iuBezRGCjR5fBzUF06', NULL, 'pending', NULL, '2021-03-03 08:17:42', '2021-03-03 08:17:42', 0),
(864, 'Tanja', 'Morell', 'end_user', '15110998618', 'tanja1968@hotmail.com', '$2y$10$5Bo3UKCRG1q2QkNcd79Z0.NT.Qrc.jU2SrcVF5JnVos9EaUYgBMcW', NULL, 'pending', NULL, '2021-03-03 16:14:00', '2021-03-04 12:33:38', 1),
(865, 'SVCYkKucQX', 'TsoyMcIqdrEGtn', 'end_user', '4607011635', 'carolhales1947@icloud.com', '$2y$10$JZsKU6D0ST8pMGhYIKBO0.MddxtJnRdyn5d5VeR7TWoq2oXCgCnHK', NULL, 'pending', NULL, '2021-03-03 17:53:36', '2021-03-03 17:53:36', 0),
(866, 'Hiba', 'Hawi Alnabi', 'end_user', '15906195025', 'hawialnabihiba@gmail.com', '$2y$10$IYwI9mzNAI8E5C4OQTwc7.7YpLsRLaHmJLX/YB7G92Y5n2ttXBxUu', NULL, 'pending', NULL, '2021-03-03 22:00:53', '2021-03-03 22:02:28', 1),
(867, 'KlznteTYS', 'YTvSUDJcbMAlKE', 'end_user', '4793492323', 'boothe_dodwell@yahoo.com', '$2y$10$plJS8IJFUIsQsuESYu./Y.RXn5tT.yL0oddzfzsWh2GsuUCB0pmbC', NULL, 'pending', NULL, '2021-03-04 07:51:01', '2021-03-04 07:51:01', 0),
(868, 'PYGuLrbhFx', 'VhnKeJHqzFl', 'end_user', '2895005000', 'ruchie53@gmail.com', '$2y$10$TP.glXhchaKRPjSS0n0QJeQYfEGa0r4vH1qKpyTRt5qO5jdyAnVsu', NULL, 'pending', NULL, '2021-03-04 17:37:14', '2021-03-04 17:37:14', 0),
(869, 'QCSifOszjeaID', 'vGNuhnzj', 'end_user', '6747983781', 'aploveart@hotmail.com', '$2y$10$D2OBnMMANoTwDJCTdlTBDOwb3ZP4egX19BsiO15yMzrZnJy6KMWxe', NULL, 'pending', NULL, '2021-03-05 18:25:33', '2021-03-05 18:25:33', 0),
(870, 'qDTtdNUKyb', 'FemOKZSoTcU', 'end_user', '3769405956', 'jamesnigra@gmail.com', '$2y$10$u3eOLwkRyGT6mnyQFlG.4edefwvkGQv8N/WI.C8FwNlYezVqq1/8O', NULL, 'pending', NULL, '2021-03-05 19:10:16', '2021-03-05 19:10:16', 0),
(871, 'TxmlcHJIs', 'ljNRbeiWuSMw', 'end_user', '9653238479', 'shirley@johalimedical.com', '$2y$10$HUHgEBQ378E5tSkKU.GsiOHgPUi3KQazT6CUCFeX/b60KzLzPkEJG', NULL, 'pending', NULL, '2021-03-06 10:07:02', '2021-03-06 10:07:02', 0),
(872, 'KMtQqVnTDov', 'wRicbfvdGsME', 'end_user', '6049115972', 'tom.herrera7@gmail.com', '$2y$10$EB82Ens5vcnZLC.vb59awOs7bigve.AL1dKgDQ7rZXhO0s8XFNDB2', NULL, 'pending', NULL, '2021-03-06 15:25:40', '2021-03-06 15:25:40', 0),
(873, 'Ranell', 'James', 'end_user', '01788641841', 'addtaxhip@uma3.be', '$2y$10$NRVejVfn2jnAnFSeXtbHuezUW2Jly0WdbjUS5aWfR0LxyUeThF91u', NULL, 'pending', NULL, '2021-03-06 15:48:05', '2021-03-06 15:48:23', 1),
(874, 'kBfGtIMayOQ', 'BeZvkGmbOhKpH', 'end_user', '6620735387', 'greerann85@gmail.com', '$2y$10$TfsOJIkb2ZUlxn4yLL7kweXemmznEfYezOhNlXkiF9ql5nbzD94mC', NULL, 'pending', NULL, '2021-03-06 19:02:23', '2021-03-06 19:02:23', 0),
(875, 'gOIXbZKsdlwk', 'umwUBFPhcsD', 'end_user', '3214944250', 'islevivien@yahoo.com', '$2y$10$QevV8Udr1JUv5acgnigVEewnozPfKDIGyGHumFYGOru1kihMPYz4.', NULL, 'pending', NULL, '2021-03-07 16:32:27', '2021-03-07 16:32:27', 0),
(876, 'tBSYUcPhFj', 'FVHLvPrY', 'end_user', '3897566236', 'derbyharrower@yahoo.com', '$2y$10$YMoIFFl0e2gU7r0PnnrsJ.LGqU5on1y/OVFb7VLnUFNKiLnDOicpO', NULL, 'pending', NULL, '2021-03-07 23:27:53', '2021-03-07 23:27:53', 0),
(877, 'ZCXUbiWNxGF', 'nEkQNXcSH', 'end_user', '5829232204', 'regalnor@gmail.com', '$2y$10$SWax0VYajOzAwEqzIUCR3OaPsrTveS4enbfJFY8GM3HlHkjUG0XSC', NULL, 'pending', NULL, '2021-03-08 05:59:46', '2021-03-08 05:59:46', 0),
(878, 'ILuRvtdFGgPJpZV', 'gqISDBOFTyzWVYJ', 'end_user', '7769150710', 'lawton_nichol@yahoo.com', '$2y$10$KX/KaKEG/JTyqpmg1Bkg1.8qzA7Ft3VJ4piCABdW4HwaV0CsAEqeu', NULL, 'pending', NULL, '2021-03-08 09:01:26', '2021-03-08 09:01:26', 0),
(879, 'MfJqNuByXIHWY', 'QDdNmsKSROn', 'end_user', '5830481848', 'gusbarres@gmail.com', '$2y$10$DVHTFy5brgbeXev.EO2Rw.vsXjl9dW/Cl20bG6QBYBkL/D1LOTjv6', NULL, 'pending', NULL, '2021-03-08 12:57:55', '2021-03-08 12:57:55', 0),
(880, 'cNkdjvgGMF', 'tjCobHcn', 'end_user', '5033760636', 'brodolphe548@yahoo.com', '$2y$10$JVl.8g2Ix7cItyWmBSvRJ.7oglKtjegbL4R4hWn2WQQHv3C6X.vf.', NULL, 'pending', NULL, '2021-03-08 13:23:30', '2021-03-08 13:23:30', 0),
(881, 'RqlMUrCWae', 'arSNiIndh', 'end_user', '6570944151', 'nkhalil167@gmail.com', '$2y$10$eo6h.HGtI2mHTsQqzds99uangy.s82uNHBByESnWGuBqXH7P8xGx6', NULL, 'pending', NULL, '2021-03-08 20:21:20', '2021-03-08 20:21:20', 0),
(882, 'GmjOoJuRgbZtED', 'aZNHTbrXfev', 'end_user', '4940574017', 'majonicoservicelax@gmail.com', '$2y$10$pJEk7lezSADd4fCDEL5pnOtvYoAsVIYB5bbWp1G6HTwZX5GKZp1Oa', NULL, 'pending', NULL, '2021-03-09 03:15:34', '2021-03-09 03:15:34', 0),
(883, 'bYUxAypwQWqI', 'BDzmOyLfdwi', 'end_user', '7579719486', 'garnet@scoremarketing.ca', '$2y$10$4JMUUFN7LtiqUBCKWnvELO9NC9te/GhS4pVeo0ENiX2JyLDDgXGVC', NULL, 'pending', NULL, '2021-03-09 16:10:28', '2021-03-09 16:10:28', 0),
(884, 'caXGxLpfTtZ', 'JionvbBtSLk', 'end_user', '9820119291', 'gemaq45@hotmail.com', '$2y$10$G1jqxptKlj.sgaxe9cG7BueDcMvP0LAt2qDceKFPwce1SC/vryVWa', NULL, 'pending', NULL, '2021-03-09 16:58:51', '2021-03-09 16:58:51', 0),
(885, 'XhNSFljZvzpO', 'qiTOkQnwvNx', 'end_user', '5157934556', 'amberdembkowski@gmail.com', '$2y$10$hDNH3PeX1QodVBJ2x4bBAesGXFtx1SDevIxwH6GQujPucklHffbuu', NULL, 'pending', NULL, '2021-03-09 18:25:13', '2021-03-09 18:25:13', 0),
(886, 'UGYpcwmfSD', 'cUHkhsVYMEPWF', 'end_user', '8647940929', 'mhumbach2769@gmail.com', '$2y$10$UpFtKC8GR0MQHWl.gT4ZTuBc3yNVGMnNij3zKPIH/LcUG8Pq3hJLS', NULL, 'pending', NULL, '2021-03-09 20:10:37', '2021-03-09 20:10:37', 0),
(887, 'xOUAXVoDJMvPLzc', 'GMZBJAneNOrEk', 'end_user', '3532782881', 'swood@dc.rr.com', '$2y$10$k/o88ZnEaFxqUGcGEbOdXOQy.izNME2a.zKKWjKRtHbf2G10ajDFu', NULL, 'pending', NULL, '2021-03-09 23:38:59', '2021-03-09 23:38:59', 0),
(888, 'hiQfdxzl', 'ySUPJBsztHf', 'end_user', '5592992356', 'carangos@gmail.com', '$2y$10$Bt3MpG9OlpB6rT9QhggcR.M00J/Q5ieaB/wZh6PDZ3J7zRmga72JK', NULL, 'pending', NULL, '2021-03-10 08:00:03', '2021-03-10 08:00:03', 0),
(889, 'coiyPvql', 'BoyjeJlc', 'end_user', '7878158364', 'hayyim.tunningley@yahoo.com', '$2y$10$7CA9PXM/9C6/Yte9a5JKDOlzxGXxDC0oYkAYartJVE.atFfjjLjyq', NULL, 'pending', NULL, '2021-03-10 09:34:39', '2021-03-10 09:34:39', 0),
(890, 'iPSxXenL', 'ilzxnvCEapwqX', 'end_user', '7296083234', 'chalmers.aumonier@yahoo.com', '$2y$10$o3uTbCH68OOO20Hqk7CJh.WDW4bO1pinBBzO6IabXvTVlpd/kWC16', NULL, 'pending', NULL, '2021-03-10 11:59:01', '2021-03-10 11:59:01', 0),
(891, 'DSZcPtFhQdVXCy', 'uQLsgnZkGf', 'end_user', '6870129363', 'ppatel112697@gmail.com', '$2y$10$Lb0J2p4embhbn4yJ4d3Ri.kRpm8W9ounELqXDUw4lktRKMhBcmire', NULL, 'pending', NULL, '2021-03-11 02:24:15', '2021-03-11 02:24:15', 0),
(892, 'LwjfYKGaAk', 'oUCIEDSXbfPvL', 'end_user', '7251800867', 'azncy128@gmail.com', '$2y$10$0pcFrnCvog1UHB118qVjIeeWIBZ1Xe3J6Sk5UpKnS6G9QMTX26A5i', NULL, 'pending', NULL, '2021-03-11 03:07:36', '2021-03-11 03:07:36', 0),
(893, 'mxqPbOwKk', 'GbtZAfCzvWOelk', 'end_user', '3408873039', 'rosaflorsison1014@gmail.com', '$2y$10$TToRjR6b.nJnmK3YYjEFP.SJ4pLG3RQ8oUMt0OhHx.9Sbw5pm2y7O', NULL, 'pending', NULL, '2021-03-11 15:43:49', '2021-03-11 15:43:49', 0),
(894, 'wflejYZyQSGxPCdv', 'eDpWgJQLhYdrqPF', 'end_user', '2692614796', 'mjjohnson060104@gmail.com', '$2y$10$YIC3yE5PTEA0FO7DhuwsS.rEbyOzh7LZUgi.TYgvLJK8aXgiW3KGi', NULL, 'pending', NULL, '2021-03-12 12:48:53', '2021-03-12 12:48:53', 0),
(895, 'zBEKOqAvVyh', 'FUhdfbOpanq', 'end_user', '7737062911', 'kris@launitedmerchant.com', '$2y$10$klduMQ.S1d7TsEeY9lXhGeF0RXCikLSpiRZ/xyvzPPcICWXDA0n/.', NULL, 'pending', NULL, '2021-03-12 16:10:13', '2021-03-12 16:10:13', 0),
(896, 'uQGORVPfxTbMtDHJ', 'uZRyPfbnQolOLmN', 'end_user', '5575723698', 'galtuniv@gmail.com', '$2y$10$JhEsKnHVKJiE/TEGcUVQpO4wiNOYkyvMpLj92vApJB8TPvwyZP2QW', NULL, 'pending', NULL, '2021-03-12 16:35:34', '2021-03-12 16:35:34', 0),
(897, 'GdnqZOVpbNrX', 'JZfQdDkrpiMv', 'end_user', '4176337082', 'anthony.77duarte@gmail.com', '$2y$10$XnitkhrWS8JInd7OT2nSW.XV8b2TNCRFh57qE.251FQUqTfYGwmSq', NULL, 'pending', NULL, '2021-03-13 03:46:07', '2021-03-13 03:46:07', 0),
(898, 'dAslgxFfoUTuWPGv', 'NfAUbarhYxgG', 'end_user', '5604522014', 'diohannahgasgonia@gmail.com', '$2y$10$RAx5OKMvp28cSzdvDwAFV.JTZQ28CpiOOCyD1V.Ej.BrTgu9t9SvK', NULL, 'pending', NULL, '2021-03-13 12:51:12', '2021-03-13 12:51:12', 0),
(899, 'jMouRYfhbPdTcI', 'BYGqXZvfatVDr', 'end_user', '7038419960', 'jeffryjoseph9974@gmail.com', '$2y$10$O/8WFOfxcUGGbH8LPmchTe4na0icXwJ6Vf0G0yTp9H8XG0grpaVE2', NULL, 'pending', NULL, '2021-03-13 21:57:08', '2021-03-13 21:57:08', 0),
(900, 'XgZkQCFjs', 'LUzNOMlFJEnkxX', 'end_user', '5142022416', 'cotyjywrenge@yahoo.com', '$2y$10$jPeho7MxZqJ4TNo3hafroOiQT91p1i0R/TRtH82uR05jzedv8QJW2', NULL, 'pending', NULL, '2021-03-14 04:18:14', '2021-03-14 04:18:14', 0),
(901, 'pAnJeucYbiyLhlO', 'UjXMmQVziENhWOeP', 'end_user', '3959199229', 'talk2carterj2@gmail.com', '$2y$10$nyJ7hI0m0pSSo11JNPNSZu1rDgFgQ5qZzeqPIq.4CIvM5GJePxdU2', NULL, 'pending', NULL, '2021-03-15 11:28:22', '2021-03-15 11:28:22', 0),
(902, 'wWmtAGCv', 'YepuGVXfgsMNl', 'end_user', '8673946630', 'rlynch@madisonassociation.org', '$2y$10$FH286gCQLoY3HPppdOLCnOf5n33rJ/DUfupNFSe6zPxZnTe7eyS02', NULL, 'pending', NULL, '2021-03-15 18:52:41', '2021-03-15 18:52:41', 0),
(903, 'JoxPpzTrw', 'qFcgiWVuhoZ', 'end_user', '7329688590', 'donaldsk27@gmail.com', '$2y$10$WWANtJEU6sWZVzKe1R9mpuo/ghb/REBBSJOlQydUQz4qTGqUuflFO', NULL, 'pending', NULL, '2021-03-15 19:36:49', '2021-03-15 19:36:49', 0),
(904, 'gHzhiWrFbUGwysX', 'KZxnujYysAo', 'end_user', '9958849128', 'glshep67@gmail.com', '$2y$10$yGCUnSWzlcewqYsVqy2DUexXxN/0yObzKpmC56waO.E9595ruqJ4G', NULL, 'pending', NULL, '2021-03-15 19:49:03', '2021-03-15 19:49:03', 0),
(905, 'GhesSvKAVn', 'dEALMhwvpjOJC', 'end_user', '4571577778', 'daniel@caswebworks.com', '$2y$10$bF6rHO5tTR6UWP7hKSP/CO.IxTNlX2B6wniEdZMRQAmLE8StrQAaK', NULL, 'pending', NULL, '2021-03-15 21:18:38', '2021-03-15 21:18:38', 0),
(906, 'XKvdOZsbAPHCFM', 'QuUgNxZdV', 'end_user', '7063017607', 'rickdiaz55@gmail.com', '$2y$10$QO9z71f4Kz9zzMJ84z.Dqe6S9IcKzm9fG7JMR2zCFIpgAENyFor72', NULL, 'pending', NULL, '2021-03-15 22:40:24', '2021-03-15 22:40:24', 0),
(907, 'oARmrlesN', 'avngODuGPIHsTrY', 'end_user', '3683740955', 'ebonyl303030@gmail.com', '$2y$10$Oen3GYv4fJpgIziOq/Qzz.h6juH5LehbJS6W8QZQZu70eXC.G64TW', NULL, 'pending', NULL, '2021-03-15 22:41:17', '2021-03-15 22:41:17', 0),
(908, 'GhHyxRLoicNMD', 'pmHGcOfvLsy', 'end_user', '4144676366', 'grantmostransky@gmail.com', '$2y$10$/4s0TAbqBo4oPcdgkIc7q.GYBjSgiSBhWRoi8Ka5nWGf82cdwxlry', NULL, 'pending', NULL, '2021-03-15 22:50:50', '2021-03-15 22:50:50', 0),
(909, 'YpUOkLTj', 'DhaWRSTpcmYLgu', 'end_user', '5182545158', 'joanmoore293@gmail.com', '$2y$10$IE88ea284mRWERJx5LjaEePf48.acuvNlHnNvIG5TlCM/NubnOWTq', NULL, 'pending', NULL, '2021-03-15 23:29:26', '2021-03-15 23:29:26', 0),
(910, 'vXpnEdQtBjzCW', 'wUZslykV', 'end_user', '2459806685', 'alexbroadley1@gmail.com', '$2y$10$MrTCZI2etmAqIUG6eVpHXe9lr0AF8lUzw2UJ6wDKezVENDrvvk8FK', NULL, 'pending', NULL, '2021-03-16 03:45:24', '2021-03-16 03:45:24', 0),
(911, 'mUlEITrhFjWbveB', 'vBHpIOQMrtk', 'end_user', '9274951876', 'okayakeiei@gmail.com', '$2y$10$AWApi7TNvJsyhYZ3LFnTkOeoC.HISSzywUz.0BTbZj2Lt3xyE31Xm', NULL, 'pending', NULL, '2021-03-16 11:13:40', '2021-03-16 11:13:40', 0),
(912, 'gBdkVeiLovqO', 'lGhNzAqE', 'end_user', '2584399720', 'dsanford@fwtcwine.com', '$2y$10$8fdZZh3uh/Gwbm.HGLNQhetk1lngiN2jyYd/BqEMdj/fq3cwdX4ia', NULL, 'pending', NULL, '2021-03-16 12:30:56', '2021-03-16 12:30:56', 0),
(913, 'YMzOyTtDi', 'aVRmEdcBezuo', 'end_user', '5912872751', 'hema984@hotmail.com', '$2y$10$XStS7V9MwNkLPb/aJPdw7Oo92Efwzho5DL4JI0xV2BPQBLcHWvdsO', NULL, 'pending', NULL, '2021-03-16 13:18:00', '2021-03-16 13:18:00', 0),
(914, 'vUpQRLnyf', 'XZHoSAMTWJcxpC', 'end_user', '7572111577', 'jones.tiana1216@icloud.com', '$2y$10$az3.bbXo6eRSJReCR3n5rePJCoJsDsbWpo.43.7KrkKmAUKIhIw7S', NULL, 'pending', NULL, '2021-03-16 13:52:12', '2021-03-16 13:52:12', 0),
(915, 'pldbigXR', 'DSpFEZtjNIiRKh', 'end_user', '3799158061', 'aharbonne@cox.net', '$2y$10$xXcTBHgUIrzvY3O68UCtSudYZ/.gxd.qG9y9yrJ.zH7BH5fSfYZtC', NULL, 'pending', NULL, '2021-03-16 15:53:43', '2021-03-16 15:53:43', 0),
(916, 'pCoMQTaVysRlWt', 'cfumCRJZGi', 'end_user', '5953082833', '6064hilltopper@gmail.com', '$2y$10$pVJg7dpr0JgpA1gTp0wjG.4vdzIqBXsh7twX7fKoeFnZO0xgYcay.', NULL, 'pending', NULL, '2021-03-16 18:02:18', '2021-03-16 18:02:18', 0),
(917, 'pAKtlXZJPwEUznI', 'EXrGKODaPmcgT', 'end_user', '9394173644', 'danseeley@gmail.com', '$2y$10$9GttSF7j2KNegE8/tD.Yn.wdQQdOX/3.AQcZZ1w.BIeps0M7gIJWO', NULL, 'pending', NULL, '2021-03-16 18:10:54', '2021-03-16 18:10:54', 0),
(918, 'sIBTXlMwtL', 'AdjJODaoGxi', 'end_user', '7916019856', 'dsutherl@augusta.edu', '$2y$10$E6JebJ8CBlJtn1yBTyYQy.RdwiLP18913Zy7qhFClOB4tlrXm/c3q', NULL, 'pending', NULL, '2021-03-16 18:17:08', '2021-03-16 18:17:08', 0),
(919, 'gMZdcmekAB', 'BVklyQTavUmusOt', 'end_user', '2646431501', 'nam4@pct.edu', '$2y$10$DHWmx.v9HS4YoYhUhfvwBuLtWAj0Uoq8OiK24et4yye0IIZwg6ZMu', NULL, 'pending', NULL, '2021-03-16 18:19:51', '2021-03-16 18:19:51', 0),
(920, 'GfcIqWKsumgP', 'OpbDanwNmIexAhqM', 'end_user', '5661671412', 'frankmaguire53@gmail.com', '$2y$10$FGTbLa3K3hhtc5C2JnA2A.u5ckHkcYPxQZjmXie4yT.H./8EgIsy6', NULL, 'pending', NULL, '2021-03-16 18:43:47', '2021-03-16 18:43:47', 0),
(921, 'IjGMqoFvpldOZVW', 'LougfQbeAsI', 'end_user', '3380030599', 'joannes@andrew.cmu.edu', '$2y$10$7izNbWcR195UO47DC/0/Hu6IcfpIKWPQhcH1Yebcb7/.jSTavJC3W', NULL, 'pending', NULL, '2021-03-16 20:41:07', '2021-03-16 20:41:07', 0),
(922, 'uhRofWkaOsTKl', 'yoKXbizGUkFP', 'end_user', '8637921206', 'lukej.proformance@gmail.com', '$2y$10$DeudlW6BNS.D1ri1LN0oVuDB6aMq2ED45kLvL6manxDEMhL6KjToi', NULL, 'pending', NULL, '2021-03-16 20:46:30', '2021-03-16 20:46:30', 0),
(923, 'KcCOGJEYIFNxQpb', 'lbFwmnOoMpvC', 'end_user', '6649680761', 'strong128@gmail.com', '$2y$10$lo3Kod3D.3XgkBd/8fl7iuPrLXIfwY65co2b6JmRzqfPxwXfM0GW6', NULL, 'pending', NULL, '2021-03-16 21:57:08', '2021-03-16 21:57:08', 0),
(924, 'nrOSfPTpaFGU', 'UimuPZkGajfIq', 'end_user', '2796135306', 'aniamaura@gmail.com', '$2y$10$A0WEz439JeSB3r9.IpvAEOIJlWUfdMwhq6tr1BqGsYPZ7MQxzSt7e', NULL, 'pending', NULL, '2021-03-16 22:11:59', '2021-03-16 22:11:59', 0),
(925, 'VygdXPnLZluNAGh', 'UYnvdeKNkBWzCQ', 'end_user', '6884370614', 'barbfrankie@gmail.com', '$2y$10$lGPqqfTjgmP0vPU0anryeOtB7qMfrz9jON0eu9bWfB6QSGb7WUxBS', NULL, 'pending', NULL, '2021-03-17 00:58:31', '2021-03-17 00:58:31', 0),
(926, 'pjgSBWrcHwJD', 'tLUByDhI', 'end_user', '9501914746', 'lconnor155@earthlink.net', '$2y$10$5ygE5ebSJnsBYGVswHJUQOn6N8CM37AmYxj4XlAvKEdsTMstC7Hmy', NULL, 'pending', NULL, '2021-03-17 02:02:49', '2021-03-17 02:02:49', 0),
(927, 'VPzsevGpDaN', 'GZpIKTuRgHecWm', 'end_user', '8306063085', 'lmineo5f9@yahoo.com', '$2y$10$xUsVijsaY77akoIssIfMHeYhUDoarW3yTxRT8ylyyR.BeqzMCmbna', NULL, 'pending', NULL, '2021-03-17 09:31:15', '2021-03-17 09:31:15', 0),
(928, 'twCBTadvpJ', 'vdGLowCerpE', 'end_user', '3295155410', 'inspired2run@gmail.com', '$2y$10$E5KGtXUFtKOhFT3BoFghxuavIqaZ/ldIqAMgmDdmUU6Ua3qOyFeza', NULL, 'pending', NULL, '2021-03-17 10:55:58', '2021-03-17 10:55:58', 0),
(929, 'mMawoUQKAWV', 'QYTcjHGyqXWFNJ', 'end_user', '8403798474', 'szxsam96@gmail.com', '$2y$10$YbKkfWTO8ROkSTFfJN1mx.TUgcJzq6IwGepGmH1479oGiPVrQdY/K', NULL, 'pending', NULL, '2021-03-17 12:43:29', '2021-03-17 12:43:29', 0),
(930, 'akiodjQY', 'xrYfjWgqBe', 'end_user', '7673106923', 'houreya1111@gmail.com', '$2y$10$QjFxIkmwboYSThQRa/X8uedpGYD9AJx.48ruWlT61k1C.4qwNyDsi', NULL, 'pending', NULL, '2021-03-17 14:24:17', '2021-03-17 14:24:17', 0),
(931, 'DUABcLKtzlNxSZC', 'XfuMDltSOPqGdoc', 'end_user', '8904267063', 'nessarus2@gmail.com', '$2y$10$X.lTXVsXmJTm8n2bLrRw.eSwkPEkf5Qor7fzFv3G5y2.nFq2fx806', NULL, 'pending', NULL, '2021-03-17 16:37:40', '2021-03-17 16:37:40', 0),
(932, 'XEDyGJdNI', 'VZBkdayQ', 'end_user', '9546172580', 'sudip@pumoricapital.com', '$2y$10$RQ5SSgOzo8QeMCphIn7YweKIAbX80AJsL2wYBELKcInRxXxgSk8iK', NULL, 'pending', NULL, '2021-03-17 16:56:22', '2021-03-17 16:56:22', 0),
(933, 'xveYytLioCWAH', 'IjeoUczatngLVGf', 'end_user', '6102022530', 'myco@mastermindsinc.net', '$2y$10$xBRb31tdKspCUdfdZByzC.mnXUfLpouDuYc4YhWJLB4RqR77iTXfO', NULL, 'pending', NULL, '2021-03-17 20:05:44', '2021-03-17 20:05:44', 0),
(934, 'Vincent', 'Belger', 'end_user', '01605480129', 'vincentbelger80@gmail.com', '$2y$10$spniDgaBDSzIKlptOma83.V4tdU0fQhg6mRimkFaGkc9kjumdRxYy', NULL, 'pending', NULL, '2021-03-17 20:08:00', '2021-03-17 20:08:50', 1),
(935, 'RjstSKhPd', 'CwjLpQBH', 'end_user', '9286075697', 'jamie.soderberg@xsportfitness.com', '$2y$10$Jeo7GnSu6SuFebz49m/5d.AYw3ZPY1zhy9z/QLS4L9KHSPhn.xVP2', NULL, 'pending', NULL, '2021-03-18 05:43:21', '2021-03-18 05:43:21', 0),
(936, 'MJrhYywFNB', 'kGtBVuFPgmz', 'end_user', '6082723151', 'lahrn78@gmail.com', '$2y$10$7YqniqNlzsBL7uQPZ.wUVeXFrLwDEWpbi3x.AYZC.fXVERrgAy7Pm', NULL, 'pending', NULL, '2021-03-18 05:57:17', '2021-03-18 05:57:17', 0),
(937, 'HqCZyEIvxinOoLBV', 'LmxaoZdJc', 'end_user', '4706029236', 'jessemat99@gmail.com', '$2y$10$u/T1YwlgNAQ42bnE3WDDcO9A9WUZavblawG2l8ZBG3Ruid2VVlHPS', NULL, 'pending', NULL, '2021-03-18 06:47:22', '2021-03-18 06:47:22', 0),
(938, 'EXLxhDIjnYVep', 'NUzuQCAgym', 'end_user', '3381701732', 'wulingtao@gmail.com', '$2y$10$.f0/rZEP6F4uA3Valcbea.nk1gFqDuRUcCslUZ0O68OTBlC/DP6R2', NULL, 'pending', NULL, '2021-03-18 15:58:56', '2021-03-18 15:58:56', 0),
(939, 'qxuTDotQYXSk', 'eqfScQUoavjVkn', 'end_user', '7090304025', 'jendumdei@gmail.com', '$2y$10$qZtzfM8px0RepkjYBgnDz.wMjrfjOBYfGxBGVSnj6WWyv28hZVas6', NULL, 'pending', NULL, '2021-03-18 18:43:52', '2021-03-18 18:43:52', 0),
(940, 'VGBwFcpQvRat', 'udINGPSYheEjrMBy', 'end_user', '6898127728', 'managercampuspointe@gmail.com', '$2y$10$cXBdyKuT5UbgPlMyQVdJyOFbszE16O/J1vs30oXYPncOEgCuyAmPK', NULL, 'pending', NULL, '2021-03-18 22:30:36', '2021-03-18 22:30:36', 0),
(941, 'eyDSUGsvpockF', 'pqSywFVrJcU', 'end_user', '8409347885', 'ss731173@gmail.com', '$2y$10$YD2ok0k4J/gAg/83W6ah3eIs.7x22MSKkQCbkmYjGXf3MeIMq9tGa', NULL, 'pending', NULL, '2021-03-19 03:58:12', '2021-03-19 03:58:12', 0),
(942, 'OrBtHdCxaSMLzc', 'BZRYejJQqAiLI', 'end_user', '7461873973', 'chanelmi4@yahoo.com', '$2y$10$W9jMgO9mILYzRsNMhdOtXuM4Kdsx4i0v4tXJfrb5Uas6jHAiCo6h.', NULL, 'pending', NULL, '2021-03-19 04:46:35', '2021-03-19 04:46:35', 0),
(943, 'RFloEUbBmyN', 'QivAMnWxaTqE', 'end_user', '5104625736', 'xionghua@gmail.com', '$2y$10$8AQEqsI5jawaVUEbMO5Ib.RGhH6nLJkFoPBoGSYmuviWJt0Yi7gvy', NULL, 'pending', NULL, '2021-03-19 08:32:48', '2021-03-19 08:32:48', 0),
(944, 'fQlZnbqworp', 'PuRbqxHFXIN', 'end_user', '6343475235', 'davidrichardson3269@gmail.com', '$2y$10$qPY.rD9xSiRlHotiYHdmVeZ0CbeS6FOEwye0/BaBT44MR9zv1R9wq', NULL, 'pending', NULL, '2021-03-19 09:53:33', '2021-03-19 09:53:33', 0),
(945, 'Nour', 'Aljabery', 'end_user', '01786237613', 'noor.jabiri@gmail.com', '$2y$10$YjUsGAuFwMIDbGm2NkEvL.mlmF/NSgBVALA8.6acpXGr5zab0u2gG', NULL, 'pending', NULL, '2021-03-19 15:36:54', '2021-03-19 15:38:36', 1),
(946, 'UuHtzJAcOE', 'dUYrgkLPxvzi', 'end_user', '6526633742', 'michelkhoury24@gmail.com', '$2y$10$N2ppO/cD5DdiAnSjwmbgLOxypm6aQ3/t1VDdZWvuhbYy9NKi1KcbS', NULL, 'pending', NULL, '2021-03-19 16:30:20', '2021-03-19 16:30:20', 0),
(947, 'ConNXAayPBOF', 'IMzYlcRZsj', 'end_user', '4569789778', 'mc0913840@gmail.com', '$2y$10$OuSjj/OWI//QlrnJP1CKxe0aZMw7WhsbYVRuwCrA4PN2BrNZCflLK', NULL, 'pending', NULL, '2021-03-19 18:52:12', '2021-03-19 18:52:12', 0),
(948, 'kzEqDIYZ', 'MfZqkezXxnIdlY', 'end_user', '2122011001', 'jamesathomasjr@gmail.com', '$2y$10$.LkFQlT2X1mCDmUYr7xrj.HhL.jLQw//EDqqKCVbrp2eCZnz0ciyq', NULL, 'pending', NULL, '2021-03-19 19:50:12', '2021-03-19 19:50:12', 0),
(949, 'KBaJSHpsG', 'BhQzPNlLZCqAa', 'end_user', '8163508846', 'taleahsmom@hotmail.com', '$2y$10$jjZA4Ul9tOwpAXbpFPSp9eFS7R9q55HO1hUh8ZcyOur81wrSXQAA6', NULL, 'pending', NULL, '2021-03-19 20:50:54', '2021-03-19 20:50:54', 0),
(950, 'dGXNhFWVOUC', 'akbqpYRIFot', 'end_user', '8897992759', 'sarahmilksbethel@gmail.com', '$2y$10$Cdj5bFawAeJQ/Xi9dwE2MeJAv7DkAY0Rg1xGd16mL.n.rbN32Jac.', NULL, 'pending', NULL, '2021-03-20 00:33:01', '2021-03-20 00:33:01', 0),
(951, 'jVsUAvFlxuGtp', 'sgoxSXkheN', 'end_user', '9014035625', 'camoninga80@gmail.com', '$2y$10$shBJkmfk.UOIKNsPYaQAn.UUvYlyq7P3g2PZ0dbZcmO9Gs3EH/Nmi', NULL, 'pending', NULL, '2021-03-20 06:12:14', '2021-03-20 06:12:14', 0),
(952, 'rZJikAMcHgj', 'ELYWKyRCQhdrw', 'end_user', '6806586048', 'harley915@cox.net', '$2y$10$dvJvF8eVhGxFdZb.NsR3MeG0vZfpGo8qglwzmGOfe9knD.KdoHzuO', NULL, 'pending', NULL, '2021-03-20 13:50:00', '2021-03-20 13:50:00', 0),
(953, 'VRbIwmcL', 'ZhlGpHjoDLzCyO', 'end_user', '3695484213', 'jaybikedt@gmail.com', '$2y$10$JRVvrcunNSkH6Y5bHaG/.O3qqZvA64aqcZQJ/itgHQraCxgTrb3vG', NULL, 'pending', NULL, '2021-03-20 16:00:28', '2021-03-20 16:00:28', 0),
(954, 'nOhlizXodacejZVt', 'faSByGCvTuk', 'end_user', '8190031331', 'cksdl519@gmail.com', '$2y$10$hP4ZUz3VCdNuxO2v35TpMOoDiZ1j1t1vZnIuYWgaany4UdvJ6gH1W', NULL, 'pending', NULL, '2021-03-21 00:13:37', '2021-03-21 00:13:37', 0),
(955, 'TLWqYZpdFcEGMP', 'uOXJsbdpGalW', 'end_user', '2659563718', 'isaiah.m.kelly@gmail.com', '$2y$10$Qe9xNYg.PpG3zjb1rULlfONT7Qxi.iWedE9PA5GrjpO91hTuNPhla', NULL, 'pending', NULL, '2021-03-21 00:45:30', '2021-03-21 00:45:30', 0),
(956, 'tqNaVYvfbdDzIS', 'RqQfgzaDkI', 'end_user', '5978136323', 'brendafugle@gmail.com', '$2y$10$2WojQdUErTgVHuxyopEuBedlypBOYwy3fLtSHxNSMw4.NCzMVlW7y', NULL, 'pending', NULL, '2021-03-21 03:02:35', '2021-03-21 03:02:35', 0),
(957, 'TshGgqNpAaeK', 'pOFqGTKbUjRIfimC', 'end_user', '4101241116', 'ragf5jsas@yahoo.com', '$2y$10$Jo04zMuYYUO4ouPqc9l69uVj24rTLRK1jp4WQhtuIbtY23uCU0XOW', NULL, 'pending', NULL, '2021-03-21 07:43:34', '2021-03-21 07:43:34', 0),
(958, 'MHGNknPmJxVBwSti', 'BgVsLNJvDRfei', 'end_user', '2721034811', 'kinaw67v@yahoo.com', '$2y$10$gAydot2Kbi8/lvd7Z9/9WuuXLCY7HcC9G.N9PJt9uRbc/ZLApOZm.', NULL, 'pending', NULL, '2021-03-21 13:22:33', '2021-03-21 13:22:33', 0),
(959, 'ZNxWtJFb', 'SysFdUDaMeEBfg', 'end_user', '3099792401', 'cxq3ptoban@yahoo.com', '$2y$10$Fh1dsNbg980U7WhSyU.7O.wieb5AEh47/6ag3p3gZk/x.6GQZUvhy', NULL, 'pending', NULL, '2021-03-22 00:56:29', '2021-03-22 00:56:29', 0),
(960, 'zFUAtLuNyYiH', 'XhmfzQSi', 'end_user', '5864078368', 'hildepapdh@yahoo.com', '$2y$10$19dDd.D1HdMu/xd8NvtShuElzfmiN9LCnK7V1dTzhAe6svl6L8dKG', NULL, 'pending', NULL, '2021-03-22 03:15:04', '2021-03-22 03:15:04', 0);
INSERT INTO `users` (`id`, `first_name`, `last_name`, `user_type`, `phone_number`, `email`, `password`, `creator_id`, `status`, `remember_token`, `created_at`, `updated_at`, `verified`) VALUES
(961, 'FkugvGVBCn', 'IkFOPRwQGXb', 'end_user', '3522620938', 'jamaar9txb@yahoo.com', '$2y$10$6uu3u/i6ZetcmyU7uV8PsuSEvkw7imOurqdlYe1NKqoaRHfpBxvCy', NULL, 'pending', NULL, '2021-03-22 03:38:35', '2021-03-22 03:38:35', 0),
(962, 'PfNgTSMCyxHEltZ', 'WdPnrTKxbYNhF', 'end_user', '8856246867', 'jlzisa@gmail.com', '$2y$10$TXIxdAFOsfhTiUshmh2.l.Q7NeJoky.jFuudMEFAKy9uCaf3rntz.', NULL, 'pending', NULL, '2021-03-22 14:33:06', '2021-03-22 14:33:06', 0),
(963, 'TEBgWLmlU', 'wobpikLUZfXNMsc', 'end_user', '4193811130', 'danielhenriquezarq@gmail.com', '$2y$10$DsZOOLnjfyFxaXGvWeb69./eKUtTYY3a3TAY0QHU3Q20V1fs88roS', NULL, 'pending', NULL, '2021-03-22 15:59:08', '2021-03-22 15:59:08', 0),
(964, 'BWUuxyetkFfqn', 'BEfkKcjaYsm', 'end_user', '5240673397', 'omuszyns@gmail.com', '$2y$10$ciIZ8gkPnnjWk9MjI8t5s./0TFPDiq9psaJKHdep6B0QzMv/X7BZC', NULL, 'pending', NULL, '2021-03-22 16:07:08', '2021-03-22 16:07:08', 0),
(965, 'JuvYhRmlzD', 'omcAlbXJTfRrnD', 'end_user', '9884974574', 'chabotr@gmail.com', '$2y$10$TZAq53TzNNSL3A178H8WA.syubQ3qdCKmbG1bbP820ywrUFvoelm2', NULL, 'pending', NULL, '2021-03-22 16:10:40', '2021-03-22 16:10:40', 0),
(966, 'PZRpvjuhkHd', 'LXYUaPDy', 'end_user', '4947214137', 'linda.dong385@gmail.com', '$2y$10$UyqZD7kxewG0qKPEZ1NbS.LyBYWfDusnaxnNFgauUHSyaytIB9yIq', NULL, 'pending', NULL, '2021-03-22 21:22:36', '2021-03-22 21:22:36', 0),
(967, 'eVUhRljXqwT', 'lUFjuEqaGYDv', 'end_user', '5076828944', 'mtun2pizira@yahoo.com', '$2y$10$yEABDWT/vaREg7B4Wj/E1OPTrEH/1ilr2f27vzUg0TuzFFJaWom8i', NULL, 'pending', NULL, '2021-03-23 11:43:12', '2021-03-23 11:43:12', 0),
(968, 'yuEJZvdbj', 'rNVgJsUjXDFP', 'end_user', '7529911682', 'beibyt.yegizbayev@gmail.com', '$2y$10$ysevgnnXIOS55eH6r2Os1OUCAegsmywFmIIVYu6t.ChVWWBw3Fe1O', NULL, 'pending', NULL, '2021-03-23 14:34:46', '2021-03-23 14:34:46', 0),
(969, 'swaxiQXLB', 'CKTvBAniXx', 'end_user', '3458741693', 'nelms93@gmail.com', '$2y$10$YjlFgyuLSPq.GIFWbiUK/eW26PhqSnH6W4NaOx4KnYEAI.mhJLvP2', NULL, 'pending', NULL, '2021-03-23 18:11:35', '2021-03-23 18:11:35', 0),
(970, 'pJGTMkUd', 'HbkFXRiIW', 'end_user', '5561226852', 'canadiankeaton@gmail.com', '$2y$10$BYc4qRE/65YkLibTvXq54eqwsd1rKRPvFazA1Y81mcrtDftnOzaT.', NULL, 'pending', NULL, '2021-03-24 13:10:35', '2021-03-24 13:10:35', 0),
(971, 'IYWikNVmjzSHEA', 'rBZJPaRyCTqoD', 'end_user', '5442717840', 'bedeagner@gmail.com', '$2y$10$idAGqKyDQoGvyi2qQbRYGu50DFlLOz9930wSz34EuGtwmhRFPQVTe', NULL, 'pending', NULL, '2021-03-24 19:06:09', '2021-03-24 19:06:09', 0),
(972, 'JyghVQdvObKaAIzS', 'xdIrVSKzyTLeBamk', 'end_user', '4167289421', 'ramagostoshanique@yahoo.com', '$2y$10$4mzSFpqgVhmolw61FxrLB.ldG2iWPOso92OTEhkUZzshxoZngaH5y', NULL, 'pending', NULL, '2021-03-24 21:38:38', '2021-03-24 21:38:38', 0),
(973, 'OadTDxcUqoPQv', 'TLogicOewVGf', 'end_user', '9464389824', 'chougan7@gmail.com', '$2y$10$4.EmYiGcC/TD3Pd.vKvaRe1Pn6OVgqFzSr3q64.25enD8pqoKYaRC', NULL, 'pending', NULL, '2021-03-25 11:26:43', '2021-03-25 11:26:43', 0),
(974, 'ILdzlWKMxP', 'hiLnerktqAFBP', 'end_user', '5859552066', 'chris1911topher@gmail.com', '$2y$10$ANoH8N9MUtpKzhjlLmhZvem4Ksm.eR.AmmQXELUAIWF959hz72zfO', NULL, 'pending', NULL, '2021-03-25 14:49:36', '2021-03-25 14:49:36', 0),
(975, 'LIyBdCoS', 'CpRbsBefM', 'end_user', '9256824223', '4bergkate@gmail.com', '$2y$10$gI0634AjyqTDJokUH5X3IOEhQopr9X5S5rt7HFmhA7fpt6J7bf0e2', NULL, 'pending', NULL, '2021-03-25 15:44:45', '2021-03-25 15:44:45', 0),
(976, 'auPzwTNypb', 'ThtXDuszpJalUiN', 'end_user', '8580562966', 'snixon@stmarysmail.com', '$2y$10$5GpimcuC2aHL9Idcv6oRFufDqihSV0gN2ZWHjozcWRP26lPzWf96a', NULL, 'pending', NULL, '2021-03-26 13:32:57', '2021-03-26 13:32:57', 0),
(977, 'aXvJyZtew', 'ITknVDtZWJKGHU', 'end_user', '7798138553', 'istragesmo@gmail.com', '$2y$10$4naYuFUaEFDl1oI9KteI0eW0ydJqBPlBpbasnr3VMIgz2sOA.0Eby', NULL, 'pending', NULL, '2021-03-26 20:05:00', '2021-03-26 20:05:00', 0),
(978, 'mbrYTpLJ', 'DnhBNcKPqmvF', 'end_user', '8699101832', 'secultudykn@gmail.com', '$2y$10$VKsMDHHF.qbb5NJXSRnfd.zIoOTh8X7bFoD44.X3.Oiyd3wEvMgxi', NULL, 'pending', NULL, '2021-03-26 20:57:25', '2021-03-26 20:57:25', 0),
(979, 'rBHSypWtzvY', 'zyobxtBuA', 'end_user', '8959761424', 'forsmanalyssa@icloud.com', '$2y$10$15OQZgaIbZwi.I5trh3K/.KZffULUCkRtStkdWm48IG/KooQw.vye', NULL, 'pending', NULL, '2021-03-27 15:36:11', '2021-03-27 15:36:11', 0),
(980, 'yxhcwUJNR', 'KTgDLrHNiodbfwJ', 'end_user', '5415052581', 'christovich.dumpa@yahoo.com', '$2y$10$Dz9QHZlmx7QlUxqebemz8uF0NBK6NWokcR7qxC1C7/Pmoln.9DyAi', NULL, 'pending', NULL, '2021-03-28 00:14:55', '2021-03-28 00:14:55', 0),
(981, 'gPKSxmrOvubMfh', 'zIbqCJtjo', 'end_user', '7230989386', 'krawczynski.knelson@yahoo.com', '$2y$10$OrVWpaKlDU0vyg9c9qDe6uFWPell51xYqW9GM/pBpwiTbY1TX9k0W', NULL, 'pending', NULL, '2021-03-28 18:23:30', '2021-03-28 18:23:30', 0),
(982, 'MJGtBPqIQUmF', 'rbFwoKID', 'end_user', '8347577160', 'cotarelodenig@yahoo.com', '$2y$10$JxHZnb2pRENvYPHU/bKmr.2MtNqSLcYKCoDV6Rzg.aSc4oJW9AK1a', NULL, 'pending', NULL, '2021-03-29 15:02:00', '2021-03-29 15:02:00', 0),
(983, 'pJCyFBLrq', 'OQpkhicmW', 'end_user', '5879693397', 'jason.graden41@gmail.com', '$2y$10$.CQ/Uw611wmQHEEyY/BtI.PaAcyKFa.Cc5wAZq2mUIpqpGuJD2qBC', NULL, 'pending', NULL, '2021-03-29 16:52:36', '2021-03-29 16:52:36', 0),
(984, 'GowKXhWlHrED', 'munKzqfLeyxHc', 'end_user', '6240573913', 'mobachavenmn@gmail.com', '$2y$10$PE.G/dx5G627gUcXDAPP0OmvA4879NQiwsPRlx7pysUTjHQg5zqrC', NULL, 'pending', NULL, '2021-03-30 07:10:30', '2021-03-30 07:10:30', 0),
(985, 'UgojWcNe', 'MFCBikWhDs', 'end_user', '8381656207', 'larvee86@gmail.com', '$2y$10$hFWiwuAJvU5CjocU4ZdSQurNq3Ee.OQDPNWKfumuWARfLb1Zshdea', NULL, 'pending', NULL, '2021-03-30 10:09:32', '2021-03-30 10:09:32', 0),
(986, 'kygsUKhHQCVve', 'gWSjzuGL', 'end_user', '7278041592', 'appreadowcp@gmail.com', '$2y$10$km1cgwOSm6kbEa6jy8Jd0OjS5ztauGbeGUqrkHkAQj07RCiV9GSfe', NULL, 'pending', NULL, '2021-03-30 12:45:23', '2021-03-30 12:45:23', 0),
(987, 'vJxmalINpMkFw', 'JZPdcakt', 'end_user', '4384997628', 'ysutariya7@gmail.com', '$2y$10$gE3sKbtlRwz7eXvHcClNM.5MhSrZKTCJ732VSEzfR0swvHgPhVfKC', NULL, 'pending', NULL, '2021-03-30 15:13:40', '2021-03-30 15:13:40', 0),
(988, 'zrOekZPslinIYTjc', 'TxXVfBtljqH', 'end_user', '9510580296', 'lila@almon.ca', '$2y$10$iLCR59UZxcFDIjbly1W.wu0ftMY25gZZCnPUdDAmHsYmYPge3eYpa', NULL, 'pending', NULL, '2021-03-30 16:09:46', '2021-03-30 16:09:46', 0),
(989, 'ZvMVONeKRsBkSpQ', 'bwFrVHQvTIStgdDj', 'end_user', '3517208771', 'medichoward@hotmail.com', '$2y$10$x.wHhlHdtG2bNpSrmJ9BT.7V0J0mYMx989WJBTTgNkS4bBSAl3OLq', NULL, 'pending', NULL, '2021-03-30 20:00:51', '2021-03-30 20:00:51', 0),
(990, 'vkhyTUPbRBXz', 'muUCdzlRherEDsQF', 'end_user', '6522613039', 'coachd17@comcast.net', '$2y$10$fTw9gALZLO1YSz8i3IbJ6uT4195PHQftbPeohnIFxh3YQ/2Ha/WyG', NULL, 'pending', NULL, '2021-03-30 22:25:25', '2021-03-30 22:25:25', 0),
(991, 'keonzCWFXKaIP', 'KIyMzJSwjeUVCu', 'end_user', '6688174850', 'mikie4d@gmail.com', '$2y$10$TXDe2cAK8IM9h26tdlFbrOcEHPPwcDxf4jYl.2XW2ROgXpNAqbi3u', NULL, 'pending', NULL, '2021-03-31 05:48:03', '2021-03-31 05:48:03', 0),
(992, 'heriPtTkwF', 'deOQAwrksZm', 'end_user', '4949573352', 'aiteacher@lycos.com', '$2y$10$2KcIXfgNxgBTIg7fyPiej.PErBH5BHNYdTVpjsbVNC4PHdWvM3wVC', NULL, 'pending', NULL, '2021-03-31 06:40:45', '2021-03-31 06:40:45', 0),
(993, 'xdVnSQguPCO', 'LHFoNtkdTv', 'end_user', '5360171091', 'nickolasveitch1@gmail.com', '$2y$10$OK8b7thotrXKvrIUeGkn5OQ20gyUGLwdQRBKDy5rq.DL4YEZyr0hm', NULL, 'pending', NULL, '2021-03-31 08:34:00', '2021-03-31 08:34:00', 0),
(994, 'iayqWfhUANEKz', 'VUqPHtsnEzbeu', 'end_user', '6022063587', 'dropthepoptart13@gmail.com', '$2y$10$lSFpzBHKpuncIvSASrokE.TDKDmCwrdkNKjMPcYCOJ.PHyJ4ncGmq', NULL, 'pending', NULL, '2021-03-31 14:30:08', '2021-03-31 14:30:08', 0),
(995, 'kMPJQIjYnBxDb', 'WxlDLsoBmVhIPQM', 'end_user', '7039743227', 'aprilfreeze704@gmail.com', '$2y$10$xbWBDhYFQQMdegtRxOb8o.EFx/eZ9YzwuB03kOMTvcpjBoi4vXbwe', NULL, 'pending', NULL, '2021-03-31 17:36:11', '2021-03-31 17:36:11', 0),
(996, 'lpuSQiaWtLnRIfN', 'yIqLPwerUHT', 'end_user', '4071600802', 'mtressel@cox.net', '$2y$10$TMIoBwhmh/isGhTNz4aFhe.Lv3LoWu5XOmwNFJuBNnukFf4KUk7wi', NULL, 'pending', NULL, '2021-03-31 19:13:55', '2021-03-31 19:13:55', 0),
(997, 'ogyBrvZhskz', 'uwxYpNHBfySUJF', 'end_user', '8610250233', 'danielamacham35@hotmail.com', '$2y$10$sKIKI6NH93CEPXskCXLKUud9s6qLCre2QPWghHou8.kp5jdBdWUZG', NULL, 'pending', NULL, '2021-03-31 19:34:38', '2021-03-31 19:34:38', 0),
(998, 'XfrguNRiFWmPqx', 'NkuGXTIlr', 'end_user', '5592276948', 'jeanyvesestvil@gmail.com', '$2y$10$yGvlDxCcxJK/qR0gsi7BleXR4MSbtZLxheeQPAphbHyNA4n8ue1Qi', NULL, 'pending', NULL, '2021-04-01 12:42:15', '2021-04-01 12:42:15', 0),
(999, 'AWuEvtklOCnYHmrc', 'kqoBtvcEbiIKFwN', 'end_user', '4627416066', 'haydene221@gmail.com', '$2y$10$fjRa.SpLJNyD1rd9t8jwzOpuxCVKt3fvyKoxbcTgRYqcC9MA9el4e', NULL, 'pending', NULL, '2021-04-01 13:35:28', '2021-04-01 13:35:28', 0),
(1000, 'nHVZqWFSwIE', 'PLoxvVdgj', 'end_user', '9955728466', 'implicate.order@gmail.com', '$2y$10$TzSeHunfv3qGtRsckUxPOeZGh1l40sYIBAVZ0xsPgfTKlWPtqH6AW', NULL, 'pending', NULL, '2021-04-01 21:26:04', '2021-04-01 21:26:04', 0),
(1001, 'dcYFnpzlfCseNGqr', 'tKHdqGThmxsUa', 'end_user', '6251224011', 'alfons_brennand@yahoo.com', '$2y$10$gk5vOUttwoLTSE0cEsND9OZNs7P2axnMKSZWLgJNwxWMkI6e3bL6e', NULL, 'pending', NULL, '2021-04-01 23:35:30', '2021-04-01 23:35:30', 0),
(1002, 'xNbpjMGfni', 'ZRkGEavAcLPV', 'end_user', '4411142685', 'alli.hileman@gmail.com', '$2y$10$0LQEhGBaC9yrdFPPN095NuVYYpVGZ6k8fFMMknKxdLQ1zw/gPMen.', NULL, 'pending', NULL, '2021-04-02 03:05:46', '2021-04-02 03:05:46', 0),
(1003, 'iNtxjKMESp', 'shEiIqfaKgjPY', 'end_user', '4009470139', 'ptouhey60@msn.com', '$2y$10$u8eSnYRGj70QyRXWtPQTruoIPEgQaghbPwLynokNVBUTiOoHctadi', NULL, 'pending', NULL, '2021-04-02 14:01:08', '2021-04-02 14:01:08', 0),
(1004, 'lCxhctomi', 'dpCUnTrgBq', 'end_user', '3307003434', 'joejammoua@gmail.com', '$2y$10$VLONuCb34/NV6qzuAHNp2OP615.fbwwmZqwMi2FvpAbQoKlfMPU5q', NULL, 'pending', NULL, '2021-04-02 15:48:43', '2021-04-02 15:48:43', 0),
(1005, 'qsIALpTifdKmQ', 'BKfbzNnGR', 'end_user', '8716133529', 'cgcokchambersgolf@gmail.com', '$2y$10$iOarGwvHxfMTPMgn27hk4.aLBgGBH6w5EWAboqBlYZMP7qpGulueW', NULL, 'pending', NULL, '2021-04-02 20:28:45', '2021-04-02 20:28:45', 0),
(1006, 'pJNPojCulcIE', 'FmCMVYuqZ', 'end_user', '9288983017', 'dee@millardrealty.com', '$2y$10$SvZ0WgO.ZumMf5dLIh.dg.EyZPHeedE6gfEGvoTcNsJg75T2PmMUy', NULL, 'pending', NULL, '2021-04-02 20:57:36', '2021-04-02 20:57:36', 0),
(1007, 'AoLdwJIMFqySj', 'hYHiSsyag', 'end_user', '5615166347', 'sanj0109@gmail.com', '$2y$10$qv.PclQ5kHj1DYFkkX9LBuCVbl9AxK/wrYLYIFRNe2aiXMYIxBRcu', NULL, 'pending', NULL, '2021-04-02 21:55:13', '2021-04-02 21:55:13', 0),
(1008, 'UJMDqXQje', 'uSxZlXWophyjdrt', 'end_user', '5343990787', 'vk7lhence@yahoo.com', '$2y$10$kwUU.H2/RmhdJLWdDTAS7.PSfbNaq43CAA7emgnvd.QG9S/FFB64K', NULL, 'pending', NULL, '2021-04-02 22:15:32', '2021-04-02 22:15:32', 0),
(1009, 'iZydRYAVLgoKjGS', 'NcbtuLrwTXH', 'end_user', '3267991631', 'jessjean89@gmail.com', '$2y$10$G.GDQTIYF0kUFBaScVahJuaUSE3kp405mp9rGb13vSmo3k1bqsIrW', NULL, 'pending', NULL, '2021-04-03 04:00:40', '2021-04-03 04:00:40', 0),
(1010, 'zLAbxhQEKcGlIB', 'xNwQuMYEUaDpqPgf', 'end_user', '4424116702', 'rob.robinson2007@gmail.com', '$2y$10$VJjJGWenP3kJTnnmhYVuR.M6TAzqBzGadUuycgMRNLP7h/Qs6RxHi', NULL, 'pending', NULL, '2021-04-04 00:04:30', '2021-04-04 00:04:30', 0),
(1011, 'lqPKYUwZAn', 'LAkufipaeX', 'end_user', '9384243470', 'cqjviemvw@yahoo.com', '$2y$10$xizsIREhTrQe/1uGY0OHC.5lSROa3tpWxpmSJhm14C.PHqDEFXF0.', NULL, 'pending', NULL, '2021-04-04 09:22:00', '2021-04-04 09:22:00', 0),
(1012, 'FOdixVReSgNwmG', 'lYxhvmeHpKfNW', 'end_user', '3886137804', 'ivyhqcuxky@yahoo.com', '$2y$10$f548HiqtU7kdqYY3ze3lwuNDPEKqjnY0EVIxRrrYUnzp.NWR6o9RG', NULL, 'pending', NULL, '2021-04-04 09:28:33', '2021-04-04 09:28:33', 0),
(1013, 'Berkehan', 'Pala', 'end_user', '015203055328', 'berkehanp@icloud.com', '$2y$10$ObAqa8pWkD2G4gNXZaA8S.vqs3qAuDx42VfDgbmRe9BuLuBWPzJDS', NULL, 'pending', NULL, '2021-04-05 08:14:35', '2021-04-05 08:14:35', 0),
(1014, 'OIQBYXJTux', 'bHByjQIdX', 'end_user', '4433197915', 'n0ygt52xilznafln@yahoo.com', '$2y$10$qZey214wkSL/3JbHw0sdwezyaWKsrzBmAVK5fkOALnlPx2NY36YGu', NULL, 'pending', NULL, '2021-04-05 08:28:23', '2021-04-05 08:28:23', 0),
(1015, 'yjqTefmnF', 'dbwNXlMtPriaRuj', 'end_user', '7012879020', 'zgrue99@gmail.com', '$2y$10$I2b2YOwTNMlqrLnMCvzgyeIkAjubXHJsHrLAbF1T0WtSZM2fq9ed2', NULL, 'pending', NULL, '2021-04-05 10:23:20', '2021-04-05 10:23:20', 0),
(1016, 'iUSONoql', 'hVYDfPxWCpyojz', 'end_user', '5322026821', 'wpxeatxqro@yahoo.com', '$2y$10$Vf436g3.9tkXNKlfM8doCuwVTsooufdcey1iH2tks8EEvG90dMP0.', NULL, 'pending', NULL, '2021-04-05 12:21:29', '2021-04-05 12:21:29', 0),
(1017, 'xNYZVAymh', 'LNyBExHiYVGmnco', 'end_user', '2779681393', 'cnmoon3@gmail.com', '$2y$10$gZNZqLXujy0BIuUsCxumx.gjFn88WBjwtUcdQisMwgbBA3X5N9BDW', NULL, 'pending', NULL, '2021-04-05 14:10:52', '2021-04-05 14:10:52', 0),
(1018, 'hJFRbicdOsZ', 'XuFcpKNwSbVWd', 'end_user', '7518095479', 'thayanithysangar@gmail.com', '$2y$10$RXrn4Xi6fAC4G4..mDF..uU1lHFIVtBPp3rcfo3Qqafyj9uWzNQ5u', NULL, 'pending', NULL, '2021-04-05 17:23:11', '2021-04-05 17:23:11', 0),
(1019, 'TrUDoYbuv', 'JqFPrYUbBRWnuE', 'end_user', '6360292904', 'elias.georges12@gmail.com', '$2y$10$UTxnQfJwg6rt15RLoO.mKeE4Br2gTo5tg2V99NJd7bobwZo1fCwmG', NULL, 'pending', NULL, '2021-04-05 17:57:36', '2021-04-05 17:57:36', 0),
(1020, 'HfdJAItjq', 'VOXHyFgDsJjMxk', 'end_user', '7320072983', 'bosslady020435@gmail.com', '$2y$10$2c//i.75XLhm1kFXAs99J..oRzQCBYhDqe/3eEsKC3zAXqVjIfqGC', NULL, 'pending', NULL, '2021-04-06 06:07:13', '2021-04-06 06:07:13', 0),
(1021, 'pQkERLBSA', 'IqiYtDdnySWEPMrJ', 'end_user', '3559413624', 'paul.knight@rsmus.com', '$2y$10$H/RUMxUUkzwMCljLxSmRS.dHRtNaXJFkzF5D8GCDiqoZFfwuWGxZe', NULL, 'pending', NULL, '2021-04-06 13:02:23', '2021-04-06 13:02:23', 0),
(1022, 'TOfQYadDZEJmoR', 'kelPVTFQIXC', 'end_user', '5484668779', 'bittersweetkatrina@gmail.com', '$2y$10$1bTa3C.YE16GzgH6v6S9rOUwKHLqQd4YFtEsto348yZh3a8gwwbOO', NULL, 'pending', NULL, '2021-04-06 17:53:14', '2021-04-06 17:53:14', 0),
(1023, 'vJGZjFlxd', 'TqOAQHMXLPgopmB', 'end_user', '8328988670', 'kalexander@alexplumbing.com', '$2y$10$T2YmXo4rWothqTS4RE9Ej.fRiriKMBTOX6aolfmzbzbA/UclSlrIO', NULL, 'pending', NULL, '2021-04-06 18:13:31', '2021-04-06 18:13:31', 0),
(1024, 'dyAYtBlDwHoP', 'cCgGfZRathIquPX', 'end_user', '9491685742', 'attallahcb@gmail.com', '$2y$10$GR.rAFJ2jSaHkL9RVDzuo.TiK3A2gs7QaGSWAFn42pvjoja6efbhm', NULL, 'pending', NULL, '2021-04-06 23:21:56', '2021-04-06 23:21:56', 0),
(1025, 'MdTqGskDthpvnZ', 'pYFxLiVakudU', 'end_user', '8570880977', 'filvickengo@gmail.com', '$2y$10$8Q3pNQpL0W7GcGUcnIRZO.yOulc2cfLJPvx9mgkfCGgp80lKUk6TC', NULL, 'pending', NULL, '2021-04-07 01:46:53', '2021-04-07 01:46:53', 0),
(1026, 'YHlAIdtCPp', 'AFWSGYxPKOpVteRE', 'end_user', '5619536450', 'hyder5@rogers.com', '$2y$10$J6Hy1hmkPpEtnHzRxs.hV.QjeSNBJr96B2IGXgOGBdaMCOWmLthOO', NULL, 'pending', NULL, '2021-04-07 05:23:54', '2021-04-07 05:23:54', 0),
(1027, 'utmoDcLrjM', 'eadTPiGptYXf', 'end_user', '6565312281', 'ashlynn.mayfield@gmail.com', '$2y$10$mUkDHCiuwDURTYNJnXAmWOMhNHZ.2NrUAxdnFhMrsbEvHe7VpFtR.', NULL, 'pending', NULL, '2021-04-07 13:46:53', '2021-04-07 13:46:53', 0),
(1028, 'XrYceNGVbaktDO', 'TkGUaxoMjVzsQ', 'end_user', '5413881250', 'pkelly241@gmail.com', '$2y$10$RhILLO/1K/AXgGcrifE3QOXCWUaE/ejRRYXb5GmGiCbBTOumjTw96', NULL, 'pending', NULL, '2021-04-07 17:06:48', '2021-04-07 17:06:48', 0),
(1029, 'kmiZszVrItC', 'OLtaRdEiScNVXrvu', 'end_user', '7413946083', 'genjosali@gmail.com', '$2y$10$R/n9SkaardyuDUg4C847lO4MTDLFmsLez3JhcyBPNIJxFbvs3luZy', NULL, 'pending', NULL, '2021-04-08 03:48:17', '2021-04-08 03:48:17', 0),
(1030, 'ABWpDvSmrb', 'ACOlNyzcoK', 'end_user', '8070426091', 'jaxnvile73@gmail.com', '$2y$10$yvdE949Zatbp0zDn83TkuuWht5oMxBxLCdzhsc0b03IelBBMpv/JK', NULL, 'pending', NULL, '2021-04-08 04:06:31', '2021-04-08 04:06:31', 0),
(1031, 'djulsPaW', 'WipbBPFZzKxsRyj', 'end_user', '8578307493', 'mojiwilsonbeats@gmail.com', '$2y$10$bCE.tGDzBkk3hDoGvUWqPONPn9FR75OnvXU78/fohC6aa8BxG.Jvi', NULL, 'pending', NULL, '2021-04-08 08:07:24', '2021-04-08 08:07:24', 0),
(1032, 'adtvJkzHExMfRIu', 'EqMUuigbxAzIdJZ', 'end_user', '8269720347', 'kganley01@gmail.com', '$2y$10$JBJsxobHQ0OlRIc3KpHeW.j.Sbl2L7U5wLvk3WqRrNVswvvC3iy1W', NULL, 'pending', NULL, '2021-04-08 11:31:37', '2021-04-08 11:31:37', 0),
(1033, 'ZQTBDyvVN', 'sRLmtKrbZa', 'end_user', '7007522585', 'davenelson7@shaw.ca', '$2y$10$RrTHG2KzA7UwAa1q5uZXw.jWWmk7aGiXo.NDZj0JS6HiE1KXZqWqm', NULL, 'pending', NULL, '2021-04-08 11:49:46', '2021-04-08 11:49:46', 0),
(1034, 'UZfrcvjhTbxEG', 'fJZHIvlb', 'end_user', '3975855905', 'frankiemimi@gmail.com', '$2y$10$Ob7sJGs8bSkEvMcZGZqrFO/K.JTF0SnuADNLWl3BqEjWgzBtiOqje', NULL, 'pending', NULL, '2021-04-08 17:38:44', '2021-04-08 17:38:44', 0),
(1035, 'QCTGoneqrOLKZ', 'CgIZoxOR', 'end_user', '3254830793', 'bchiu07@gmail.com', '$2y$10$Fx04.tuQWSgctGH8moqxh.MRuJ2dSa3ROGZwqystvN0I58B.yxYyO', NULL, 'pending', NULL, '2021-04-08 18:37:25', '2021-04-08 18:37:25', 0),
(1036, 'CGdrhwxWlfb', 'shZyQgnBfWCXFiG', 'end_user', '6057210820', 'johnphelan999@gmail.com', '$2y$10$Ap1oTSSQ1GQc79511DviG.8Dky7JpvJASNDlieoVWZTyJ9NkzCv5.', NULL, 'pending', NULL, '2021-04-08 19:34:13', '2021-04-08 19:34:13', 0),
(1037, 'KdHUFWplJxIc', 'EnrOKJTV', 'end_user', '3745267946', 'itzel.perez0511@gmail.com', '$2y$10$.y62CNA1ZzKfdogygLPuf.yH8D/gwIL1OUP8myeM/dzMYlyPUofnO', NULL, 'pending', NULL, '2021-04-09 17:47:57', '2021-04-09 17:47:57', 0),
(1038, 'ANSBEFWsDJGadvHM', 'itZdLXjFAINrHs', 'end_user', '7335218981', 'irunomrfcdn@yahoo.com', '$2y$10$YpBJm0NBCp61x8i4KwqXbe61qGFGnTTKoYz4zWZ8EWcwzoqyva2qC', NULL, 'pending', NULL, '2021-04-10 02:36:25', '2021-04-10 02:36:25', 0),
(1039, 'HoBdFcDPpVLtSk', 'knOqHVxrZyPLlfo', 'end_user', '9147601787', 'ellarose516@gmail.com', '$2y$10$OCPz3qHigwtpazkA7Gbik.2L5KTTZbKNC7AfwY2nGqOHFNYxxdnRK', NULL, 'pending', NULL, '2021-04-12 13:03:34', '2021-04-12 13:03:34', 0),
(1040, 'EweXtKDiUxZc', 'QYcbxoRT', 'end_user', '8153503063', 'pimontel@gmail.com', '$2y$10$wCjjXSlNxyzYJJk5Vv2r4.6swg4gybR1tgW9Jx6pFI75d8oBVwO1i', NULL, 'pending', NULL, '2021-04-13 10:39:02', '2021-04-13 10:39:02', 0),
(1041, 'stMWAfKrP', 'fYDROamjJLqbg', 'end_user', '3755637286', 'dolan1917@gmail.com', '$2y$10$r/7IsrSZyh7n02ukMgJIiuxHVWXkKEeiMa2JFoVwm32Fcw7VzaYHu', NULL, 'pending', NULL, '2021-04-13 11:32:29', '2021-04-13 11:32:29', 0),
(1042, 'tbyVgOJBiuGLFw', 'VIJPQFEaMtY', 'end_user', '7984008749', 'shamrockpizza@gmail.com', '$2y$10$WtwcsyzeZZLsY/S9R2yBFufvLoEWdkXKqdfeWAu7c1YrRPx8lQk9u', NULL, 'pending', NULL, '2021-04-13 15:10:57', '2021-04-13 15:10:57', 0),
(1043, 'aAoyfCLJUjFuht', 'DEvcjspArNM', 'end_user', '7861445052', 'notme911@cox.net', '$2y$10$apQ1SpVdvJQC3r2MqxJBb.9WJd6UBJSV2LP4fcZlbnjm8eoz6mpUy', NULL, 'pending', NULL, '2021-04-13 16:49:02', '2021-04-13 16:49:02', 0),
(1044, 'zgDUuAFdaGfQRsS', 'DJoLgVxYNrWdUXsC', 'end_user', '4865698365', 'icespirit07@gmail.com', '$2y$10$virL3pKYn3f2gJHaqvjWL.Fr/pCrzvGDZ4txjhAZ.18koGzg2KZem', NULL, 'pending', NULL, '2021-04-14 01:32:39', '2021-04-14 01:32:39', 0),
(1045, 'CKGxVgLWszioZw', 'WRZNfswFnrEkzL', 'end_user', '8159623867', 'montyb42@yahoo.com', '$2y$10$Of.MCGX5d6HGAejPhA0wBeQPttliI9v96cCalvLamV4/XjVGJ7m0G', NULL, 'pending', NULL, '2021-04-14 03:33:35', '2021-04-14 03:33:35', 0),
(1046, 'uHUkFcrVmo', 'zIvCeLMyGDmuEkfr', 'end_user', '2978855046', 'tablinebury@gmail.com', '$2y$10$6zsJBjLuxF8d1u07/6tte.M0MZbEPRm2gcZQjwwh0g5xfdfRadi8y', NULL, 'pending', NULL, '2021-04-14 06:36:12', '2021-04-14 06:36:12', 0),
(1047, 'glKZndBUA', 'CtAIhPag', 'end_user', '6920743448', 'lozerface79@gmail.com', '$2y$10$EthC90Wt4Jrpx71eihBi3unXzFTWwKsJjKciiwLOxLydtBwD4A3IK', NULL, 'pending', NULL, '2021-04-14 08:28:11', '2021-04-14 08:28:11', 0),
(1048, 'HiModVusqFg', 'eliTqdoptNyPm', 'end_user', '5051222874', 'shaun_taggart@yahoo.com', '$2y$10$9Q5NZq0cbGQyG/wuPWcXfejRARPTVWaOLMXKZGe68CQAl8HQwUVfC', NULL, 'pending', NULL, '2021-04-14 11:05:18', '2021-04-14 11:05:18', 0),
(1049, 'ubNErLXgYZHMDS', 'lEFvWLBRKTz', 'end_user', '6012353461', 'eddie@appliedmfrgroup.com', '$2y$10$5xF2cit8bOLZLtbuK9YNKuUblcbTXxkajdKnTV5CJ8rjzOAMlVrEC', NULL, 'pending', NULL, '2021-04-14 12:31:43', '2021-04-14 12:31:43', 0),
(1050, 'nTQqtaVjGd', 'AzOptJxmLY', 'end_user', '3414969085', 'xandre.bui@gmail.com', '$2y$10$pIUPkfv/B.a8OBNbZvheqO8qjT0sPdvM07DgX87q7U8hZWVG1PJli', NULL, 'pending', NULL, '2021-04-14 12:59:56', '2021-04-14 12:59:56', 0),
(1051, 'itOENRoqwkPc', 'PihjDyEF', 'end_user', '8821333417', 'adamdeciccio@gmail.com', '$2y$10$KjXlO2wNXLE031YmPXnelOl7Z/H5KsbHlJPo3qW5GTQxZ.xhhfprq', NULL, 'pending', NULL, '2021-04-14 13:52:23', '2021-04-14 13:52:23', 0),
(1052, 'YNFyjSXChgzHZcGU', 'AGrekqUsXCHh', 'end_user', '4629810442', 'krissie.reynolds@gmail.com', '$2y$10$bzMVpSydcDlhd.yvkBKv4OdS.zFQnlsGvqzF8hMYqpNznkvFztHnq', NULL, 'pending', NULL, '2021-04-14 14:02:01', '2021-04-14 14:02:01', 0),
(1053, 'RyfFeXzDPSIajLYn', 'mCUhXSxBHGdguJ', 'end_user', '4926717169', 'cmdoyle01@gmail.com', '$2y$10$2WiBzc65DJqOVfF5IiKFTOCuM1Fmp209I.f7WA/I9SlPfHdVtQscq', NULL, 'pending', NULL, '2021-04-14 16:30:15', '2021-04-14 16:30:15', 0),
(1054, 'dGYkaBqouyXTgW', 'MLKABXkY', 'end_user', '2829781999', 'elgio1109@gmail.com', '$2y$10$icfjuWT4K8k5NIFA/XQvRO5aPIqumXa864Fi2m/urTfN2MZAtQfC.', NULL, 'pending', NULL, '2021-04-14 17:44:16', '2021-04-14 17:44:16', 0),
(1055, 'qnjtfLGDPWdApl', 'HuDaMYcOInXxiRA', 'end_user', '6753871806', 'estocco@telus.net', '$2y$10$gniIF9DZM.slcFS3FlI0Q.BEJHCGy7PZusy8x0qqY0Y3/wnQEc.bO', NULL, 'pending', NULL, '2021-04-14 19:04:23', '2021-04-14 19:04:23', 0),
(1056, 'JLQcVmHvY', 'nhETzgAKOjFHkUm', 'end_user', '2134872872', 'bmplifitfe@gmail.com', '$2y$10$g67L8opNbehya3wmsTwPmeP7XyjPW2e0fetvufJ/VVMFOMk2iHIWi', NULL, 'pending', NULL, '2021-04-14 19:43:48', '2021-04-14 19:43:48', 0),
(1057, 'BmyMuLrxKRzI', 'FHRKIqjow', 'end_user', '2235965205', 'bolinjasper@yahoo.com', '$2y$10$owb5NDNpLPvvavMnYDxUWOH8khKWNph6SgD/CUgGK9tSuAY02TIem', NULL, 'pending', NULL, '2021-04-15 05:31:35', '2021-04-15 05:31:35', 0),
(1058, 'hSfmzIPRrMQvgak', 'jeBhXQwAit', 'end_user', '8389290344', 'oonete@cogeco.ca', '$2y$10$xkocSq9wDWw69j7lMVf73Ovlj9ymZjPMljX4tkd0Sz4YoQdjy3T5a', NULL, 'pending', NULL, '2021-04-15 07:24:50', '2021-04-15 07:24:50', 0),
(1059, 'kCdcMouLBvsf', 'UedvBHZRPw', 'end_user', '2045918651', 'lindarevzan@comcast.net', '$2y$10$m1DInqYtBYRAUGaOlvL5C.Rsv//B/s8ueI/ITfsMvrmdpDcsMY9hS', NULL, 'pending', NULL, '2021-04-15 08:00:05', '2021-04-15 08:00:05', 0),
(1060, 'uodIWgEwGnp', 'JDAcKVNOMByndPC', 'end_user', '4603634902', 'hemming.beniamino@yahoo.com', '$2y$10$cnLNhm/mRRw8CFcCU4qdHuQgHi204mqZ4kXcE2H.P4QonNI8r0qra', NULL, 'pending', NULL, '2021-04-15 08:42:30', '2021-04-15 08:42:30', 0),
(1061, 'LVMeiqCzdTDhB', 'ZGEiKIMS', 'end_user', '8330647967', 'pieguy981@gmail.com', '$2y$10$UHkVXIUiHX1cjs9oYvsjyu8fxR207lgQPBUIyKvLyxT7ray.hN1za', NULL, 'pending', NULL, '2021-04-15 12:59:10', '2021-04-15 12:59:10', 0),
(1062, 'ExIMrviQVcZYgD', 'rAvtYNMhezRfTuCE', 'end_user', '9123219342', 'fcalcerano@rogers.com', '$2y$10$kkdFfGpSb7TC5gwS1rM2KOuI1mnkn7xSHIuSXZh4GzMjS4fFm1HHC', NULL, 'pending', NULL, '2021-04-15 16:18:05', '2021-04-15 16:18:05', 0),
(1063, 'WMyzYteSgNwu', 'OJMAwUnb', 'end_user', '4946923485', 'tomliang.tong@gmail.com', '$2y$10$8nVrGq4EQ5H5kmpF4qMKZu6r/PJ4OxyukQEx0yR2UoOMkQC4ucykO', NULL, 'pending', NULL, '2021-04-15 21:37:41', '2021-04-15 21:37:41', 0),
(1064, 'bdyRljzLQDipeSF', 'ZHyFdapMN', 'end_user', '5246011168', 'felipekinder260@yahoo.com', '$2y$10$xrByCuEC0QRMuHtpfpfwtu4h8068hyX4Pp.DOCCy9eRp3V98M3rte', NULL, 'pending', NULL, '2021-04-15 22:29:43', '2021-04-15 22:29:43', 0),
(1065, 'cBrWOEdikvCsRH', 'efXcaJnHVoOgI', 'end_user', '2784296927', 'blewis02@gmail.com', '$2y$10$5mKuiL.DNC75P1/gOw.d/.8u1S31KcruwaFdwcVGQ.M35PBVuP/HK', NULL, 'pending', NULL, '2021-04-15 23:40:21', '2021-04-15 23:40:21', 0),
(1066, 'umPoijLrWXM', 'ySvjRkbnXgTYeNIU', 'end_user', '3852092829', 'corbin4cheer@hotmail.com', '$2y$10$UQGPML8WMhhBQ7kFM5YyiupAf1m3kGceivb8MXUWTlZzvbJYRm2.6', NULL, 'pending', NULL, '2021-04-16 04:38:25', '2021-04-16 04:38:25', 0),
(1067, 'hHvYExzCctgQdAf', 'arMEAPjCHztZ', 'end_user', '5743906628', 'kaloqnjordanov@gmail.com', '$2y$10$o8r5FQ7EdEBoSJdtWyKTSe5VBarAgNXGKGgHoAnkDo5COtE90A7Ei', NULL, 'pending', NULL, '2021-04-16 17:34:26', '2021-04-16 17:34:26', 0),
(1068, 'twgIAiDVzLbqp', 'OvDhmdfkn', 'end_user', '2331378570', 'ylvisakerv@yahoo.com', '$2y$10$bSQ5dEQ1Gog8RXgLTjnyVuSutyFPchXF/8y35BoFReaaG6/qISvrm', NULL, 'pending', NULL, '2021-04-16 18:21:42', '2021-04-16 18:21:42', 0),
(1069, 'kBJARZwSyuDnLb', 'NvcUtAgFD', 'end_user', '9531329827', 'robertkj2@gmail.com', '$2y$10$JlrZcNo6/35HsC/0IVeRwOFRPMein0zw0o4J01tXPF0M9f0CnaF/W', NULL, 'pending', NULL, '2021-04-16 22:08:01', '2021-04-16 22:08:01', 0),
(1070, 'NagesRdZTfV', 'QwUTYBztIGP', 'end_user', '9148941848', 'ron.s.cheng@gmail.com', '$2y$10$feJ7rc26YZ52gd/IYWn8Ie1Ai5ces5kp.WtT/czbh.m83/rImhdfW', NULL, 'pending', NULL, '2021-04-18 18:25:23', '2021-04-18 18:25:23', 0),
(1071, 'UwPqngdT', 'EGTBoCfpD', 'end_user', '9094872748', 'marshalljae30@yahoo.com', '$2y$10$srjjk4lALVwwAL0ukJfsseCqwIIrCscbSPK.Tj7xyhj5KF2Z6wCWi', NULL, 'pending', NULL, '2021-04-18 21:28:46', '2021-04-18 21:28:46', 0),
(1072, 'rbNHKoeWidyBJ', 'EVQoPkeUhxgFIif', 'end_user', '4235142020', 'acevedo.lezli@gmail.com', '$2y$10$czMKolooweymUY4LVH0o1eoVoscvMNdjQzqQjRtFugOAhQD.yDuHm', NULL, 'pending', NULL, '2021-04-19 02:23:40', '2021-04-19 02:23:40', 0),
(1073, 'JSxoLRgTXuOcfKYd', 'IBVcvsFDlEWZeNxg', 'end_user', '8805188355', 'alexmeier1997@hotmail.com', '$2y$10$uGlGu1RUbLDo.brZL7HxaeqR/m6sEbLriK88BJrbELv4L1zHKzuQ6', NULL, 'pending', NULL, '2021-04-19 04:49:27', '2021-04-19 04:49:27', 0),
(1074, 'YkCruUdQpHPzSq', 'VxzwDufpJQY', 'end_user', '2876842600', 'zital@shaw.ca', '$2y$10$XKxOz8cblWKfKnyA2HXdeeRqNR.aLB/p0D1AbpLt1um6OEuqXIj2S', NULL, 'pending', NULL, '2021-04-19 16:16:47', '2021-04-19 16:16:47', 0),
(1075, 'QIbmnzrOSf', 'mLyWaTQKGq', 'end_user', '8318379073', 'nieves.lesley@yahoo.com', '$2y$10$q8.dNKVQu7/q1Sa99SpvjONp3EUwWyanSP.pcrzgsFNjqjdMrd1Mu', NULL, 'pending', NULL, '2021-04-19 17:24:46', '2021-04-19 17:24:46', 0),
(1076, 'lnZtWRysTGaYE', 'VFgeQDBmHkClWX', 'end_user', '6655193370', 'psquire25@yahoo.com', '$2y$10$XfYURh850TkGPSyf3HQUZueXjRgBrh.oIUVdsrtJg6hu8mlKn3PEy', NULL, 'pending', NULL, '2021-04-20 10:52:30', '2021-04-20 10:52:30', 0),
(1077, 'eswRIShPJLEtTuai', 'WVDTfXiRMLaAJnx', 'end_user', '4321792874', 'malissa@larsentileco.com', '$2y$10$3j7LT3PAbxHUMZHOg09uNOEMqCPg0yD.JkGc.yFX4IagleAjhX4Su', NULL, 'pending', NULL, '2021-04-20 10:55:47', '2021-04-20 10:55:47', 0),
(1078, 'elvSoBFRWhX', 'hOgprnUH', 'end_user', '2290120052', 'ellen@compressionsource.com', '$2y$10$ipxxAafAhLVEGvsAenm9feysHPtQvXbARIuU5mIk2JCSMs5Dh5nhq', NULL, 'pending', NULL, '2021-04-20 13:33:22', '2021-04-20 13:33:22', 0),
(1079, 'tnhiuqRB', 'eXxMCPqbWEmcjla', 'end_user', '3873465237', 'miriamrcantu@gmail.com', '$2y$10$Og/NwOgsCx3NoHz7bChCZ.1opeyho7X.eospNvxV8jmthd6iq6LIa', NULL, 'pending', NULL, '2021-04-20 17:13:14', '2021-04-20 17:13:14', 0),
(1080, 'uedzmkNpZnIvQW', 'pnsTAJmjFZf', 'end_user', '6552562674', 'dbangs@optonline.net', '$2y$10$hJFI0hEeK7JRcghL3FMNzeCK02K0/JMwWEYDoCgzRHJvYd7a6iiha', NULL, 'pending', NULL, '2021-04-21 12:11:24', '2021-04-21 12:11:24', 0),
(1081, 'mFSEVNlTJnfy', 'ugaqcMwDLxUofXd', 'end_user', '5501420659', 'ccoffey776@gmail.com', '$2y$10$.AmoM6liOecTuim9oY1EGeuV3n5DWoZ04nC0oVOVjKs/5KUl194Se', NULL, 'pending', NULL, '2021-04-21 14:46:26', '2021-04-21 14:46:26', 0),
(1082, 'vTKstFxf', 'AVZHfoIs', 'end_user', '8228945734', 'ats11698@gmail.com', '$2y$10$FOW2zJ/JCeycHq2th6CatOOQCDc4sZIE3Y4RZzE1R2ZC.Et3Gq16m', NULL, 'pending', NULL, '2021-04-21 15:42:37', '2021-04-21 15:42:37', 0),
(1083, 'QoqEPtZJFkKCL', 'iDybuPhe', 'end_user', '3510808506', 'batteenwolf@gmail.com', '$2y$10$uaI9NJx022Xqr7rtQ2JgzeTyZ3Ebp8teuVDWPqbImR24IbrM.5Rkq', NULL, 'pending', NULL, '2021-04-21 18:23:25', '2021-04-21 18:23:25', 0),
(1084, 'FVKuxwaMnyWEzf', 'pTxsKByLrwD', 'end_user', '3432683117', 'maxineluqosg@yahoo.com', '$2y$10$VZ1nSsrCabOaB6sIHChEmeP8fagP6/pDRe4sRDDKMWGmdHgQQEqQm', NULL, 'pending', NULL, '2021-04-21 20:28:34', '2021-04-21 20:28:34', 0),
(1085, 'FJmjQAZtGxkvfYg', 'yRxbDmMXCFNsLKrp', 'end_user', '8411824478', 'aperkins@miltope.com', '$2y$10$Bnexh2wZTG2GCC8Kud9RGeyq/6XdYr0kT3WOoU4nQSL6lqvb5mc.G', NULL, 'pending', NULL, '2021-04-22 16:48:17', '2021-04-22 16:48:17', 0),
(1086, 'NyTBLGIsKMX', 'shgiAvyaeDPIK', 'end_user', '9201285878', 'bailepoinlf@gmail.com', '$2y$10$vBAjQhPkgAnxuiTeU2tFruE6wdmNrUO33PBbF8eG5xoORAIBfBwfG', NULL, 'pending', NULL, '2021-04-22 19:13:20', '2021-04-22 19:13:20', 0),
(1087, 'PkIpEduhasjwR', 'NwTRIfrUkVmtPMYC', 'end_user', '7614286705', 'litiestaksxm@gmail.com', '$2y$10$sQ6hC8JuGoANZDIYf1MDYOn98fX3NTKhG88faWooERz0kbvjLkgRG', NULL, 'pending', NULL, '2021-04-22 19:32:06', '2021-04-22 19:32:06', 0),
(1088, 'LBtgaIpDWYwCmnr', 'uWbJFtnvlaoM', 'end_user', '7189507283', 'athomas@technologypub.com', '$2y$10$tKlYxPH.9LQOESXJgcjLuO3VI8GWi1YR9WP2tlh/S9HMQ5H75e1ie', NULL, 'pending', NULL, '2021-04-22 19:40:09', '2021-04-22 19:40:09', 0),
(1089, 'NaWpXMIZF', 'FaBgmlAtW', 'end_user', '6848237509', 'afolmer@technologypub.com', '$2y$10$xsMjX9dBsrov/BVU8gy5p.XkenjC/5R7nmTXXvewHnNpBop8qtz9.', NULL, 'pending', NULL, '2021-04-23 03:48:02', '2021-04-23 03:48:02', 0),
(1090, 'KPuJdMcnjeOf', 'CIyuSoesthzYRBW', 'end_user', '7751624442', 'bertramgordon55@gmail.com', '$2y$10$Y1lYNmzLx/zr4t/zfWfGxORcU3z16pGDvoZQS5j4uqcaMqeVrvjWe', NULL, 'pending', NULL, '2021-04-23 07:19:53', '2021-04-23 07:19:53', 0),
(1091, 'hkezToPy', 'wzofvyUpxMBt', 'end_user', '5621985668', 'dannydub718@gmail.com', '$2y$10$MKEJca3hQwXVYjQx99Y94ud..nDkfw3nJHjJI0lIbAtrJ3p.9oMSO', NULL, 'pending', NULL, '2021-04-23 09:15:39', '2021-04-23 09:15:39', 0),
(1092, 'guQyVwaFe', 'veUMXJsVPqOz', 'end_user', '3997422097', 'jfrisbie508@netscape.net', '$2y$10$LUUE0AfvPNvfsX95WUDuo.QhY/J/fLWS8.ZFRMvkPXVDCZLNtm3Om', NULL, 'pending', NULL, '2021-04-24 01:11:41', '2021-04-24 01:11:41', 0),
(1093, 'AKvLwGcDFg', 'jNmOAXDPHVcnlQte', 'end_user', '8574684082', 'campbelldoc@mac.com', '$2y$10$L6GvLB4SAybYJ0STPAmCVOPvpXyFY2kESFSZHZ7QLOLNwU4Glgn72', NULL, 'pending', NULL, '2021-04-24 07:52:05', '2021-04-24 07:52:05', 0),
(1094, 'YGTfaNCFOBUZ', 'HAgRKYGsySh', 'end_user', '8657061969', 'arlenww6@yahoo.com', '$2y$10$mpbGZP/IN7nQcJYOOHlkYudc74v8xxSZaCxXSaoAvO0l2IY9DlDD2', NULL, 'pending', NULL, '2021-04-24 16:14:39', '2021-04-24 16:14:39', 0),
(1095, 'NGTdruSJnBUx', 'cfMzbsupVR', 'end_user', '9604956274', 'dapreacha1@gmail.com', '$2y$10$MKIl0Xa3a4.NCNInAraD.OeruzKo.6B64Rdjdkx7gN4QAngpyMjeG', NULL, 'pending', NULL, '2021-04-24 23:55:13', '2021-04-24 23:55:13', 0),
(1096, 'fRJgEIPwMb', 'mlPhXfonscjNM', 'end_user', '7261123481', 'elviaif8pr@yahoo.com', '$2y$10$jOpSvYUt778LnFRy0PisROhdswropswHBdOFudvfHqDVwrpx/XQii', NULL, 'pending', NULL, '2021-04-25 00:15:11', '2021-04-25 00:15:11', 0),
(1097, 'gxAyaTGevs', 'XsHnyjmL', 'end_user', '5459804282', 'loseguera2332@gmail.com', '$2y$10$Xdr16kkodtDaWQ0Pyyj3EuXMD2ws4xSMMkUP.KRWCoXIhHc3iJsqi', NULL, 'pending', NULL, '2021-04-25 10:18:52', '2021-04-25 10:18:52', 0),
(1098, 'xBJCqQTe', 'wiZOtTXzNUYCj', 'end_user', '9279705073', 'toniablju61@yahoo.com', '$2y$10$tJfFSWrhQhH.jkA3jKxTLu9BXgrHX4PMyowyYd28uZXJTc9EpxbhK', NULL, 'pending', NULL, '2021-04-26 03:29:49', '2021-04-26 03:29:49', 0),
(1099, 'gUDMiVdaxXTzPLeq', 'PZfEDUyLiSjuxQn', 'end_user', '7499232703', 'aragrev64@gmail.com', '$2y$10$FuL4ImeTc7IU66lQxgMqCOlumg/IY4V.b/RkHliXvhHEKUCaS4abO', NULL, 'pending', NULL, '2021-04-26 21:11:47', '2021-04-26 21:11:47', 0),
(1100, 'advJrbWMPRXCOqk', 'OXKyBFRsEvYz', 'end_user', '8457125590', 'ericpollard@live.com', '$2y$10$bcJ1hXN2Ojb5gGNVKPL1i.j2n2vSgmgnqspDi52ir05DH1ibgCDE2', NULL, 'pending', NULL, '2021-04-26 22:53:37', '2021-04-26 22:53:37', 0),
(1101, 'MfhteExvViqPRd', 'iyYleEGn', 'end_user', '8898387556', 'larrypenny@hotmail.com', '$2y$10$QImUxoaVz/wC.C6txPJPG.vulq1jUqYHjjIGg9Jqj4FMbWf2KWBg2', NULL, 'pending', NULL, '2021-04-27 05:03:13', '2021-04-27 05:03:13', 0),
(1102, 'nkIuQBWY', 'EftcVvaXC', 'end_user', '6507590406', 'layton_huskey@charter.net', '$2y$10$76fyEBHkmy9mb0zVia0jZ.EZUnmfD0iUti7XGJ2704fuJngPxZZ.2', NULL, 'pending', NULL, '2021-04-27 05:03:52', '2021-04-27 05:03:52', 0),
(1103, 'DeiaOsCFRhTbUdkx', 'qiWQxbMN', 'end_user', '6553330316', 'wv4life32080@gmail.com', '$2y$10$IevzuaBmG5m2op7n3N65Ge/ErCt4PASNvAt9IZd5DGih4xSPR77tK', NULL, 'pending', NULL, '2021-04-27 06:10:10', '2021-04-27 06:10:10', 0),
(1104, 'MUsINTuwekflE', 'ZYxHkLRTzFu', 'end_user', '7438533641', 'gideonzook@gmail.com', '$2y$10$0WFvrR6./GXxc7SAhUJ2HenH.pHcFY3ge/G90NYjYvH1euhUyKLhy', NULL, 'pending', NULL, '2021-04-27 07:55:16', '2021-04-27 07:55:16', 0),
(1105, 'naSMvPLrZBgyuNCq', 'sRCNOecmrwG', 'end_user', '9340015804', 'dlyle@lqcr.net', '$2y$10$lIehPQRtrcn3tX/1pkTtXuMVjUdbo8WSnX06w8VstQE7uUbAOi.eO', NULL, 'pending', NULL, '2021-04-27 10:37:51', '2021-04-27 10:37:51', 0),
(1106, 'tBDxPVCTOmWIQbk', 'urhCMftelSzF', 'end_user', '9720775379', 'zmo2002@gmail.com', '$2y$10$klVIQZDAK2gxhxyqV4qc9O6c.qVRe4JKj3/BadtgwczWZffWYbUd.', NULL, 'pending', NULL, '2021-04-27 15:06:56', '2021-04-27 15:06:56', 0),
(1107, 'pRGgByOPfZduecIv', 'GPceARwL', 'end_user', '8042024657', 'socarroll@reevesbrightwell.com', '$2y$10$At4VdIgobbh4xRNOaQdN7eg5z8s2p74civ1d30uQ8oso4PxHE3HFe', NULL, 'pending', NULL, '2021-04-27 20:14:22', '2021-04-27 20:14:22', 0),
(1108, 'sCifLHPtYoaKERZ', 'IpLBnRywougYEAa', 'end_user', '5209337752', 'racer1281@gmail.com', '$2y$10$FPnR2VjszgPi/YoSxtYb9eU6JRVFK7GXOcFfcv7jSxYKto48tW6rq', NULL, 'pending', NULL, '2021-04-27 21:48:55', '2021-04-27 21:48:55', 0),
(1109, 'EDayTqcJrwvtihs', 'IvPQgnbxMhWz', 'end_user', '6327821579', 'davielclarke@gmail.com', '$2y$10$FdPT2vEwedkiwNzbIxd4X.TmVRPQeDRH.BDFcF.EuOIrNFuk/7XrW', NULL, 'pending', NULL, '2021-04-27 23:36:00', '2021-04-27 23:36:00', 0),
(1110, 'rcgVIiLY', 'yuUDivscYaHKFwr', 'end_user', '5519747863', 'gretchen@starwooddistributors.com', '$2y$10$CNbkncR8tdoJ84p9HPen1eLSvJ4Impwdi1e1pMW.KA2Qc84Rxfo4O', NULL, 'pending', NULL, '2021-04-28 07:09:01', '2021-04-28 07:09:01', 0),
(1111, 'ZDXcoMrdt', 'HKdlDcFmViqLna', 'end_user', '9967161848', 'fernandoferreirasells@gmail.com', '$2y$10$8mVhuRwkAWZc9RjI5N3DmepkaDvvBcjTtMyltIcsEPKHW/1vzTN4y', NULL, 'pending', NULL, '2021-04-28 09:14:47', '2021-04-28 09:14:47', 0),
(1112, 'jyFdoMNTlrYJmnE', 'YbloJButL', 'end_user', '2678505238', 'jesseparks42@gmail.com', '$2y$10$VFvkS3xlMD65w0Tvq3/nQu8M3K0f.M7JTgMfuhxLvzUNGk2hHcNTy', NULL, 'pending', NULL, '2021-04-28 12:12:11', '2021-04-28 12:12:11', 0),
(1113, 'RkfduXlVtmMwgKG', 'CsLcYQZthdNmV', 'end_user', '3030334977', 'mehreenriad@gmail.com', '$2y$10$u2XOoCo6tPAwJ9l/NOiP4.lcJ4dtcMAlfkMcQ4VBqCnZr/qd.rtx6', NULL, 'pending', NULL, '2021-04-28 18:54:15', '2021-04-28 18:54:15', 0),
(1114, 'YXuaSOPNndTgR', 'PxiGdfwgKW', 'end_user', '6271418353', 'cowbellrichelle@gmail.com', '$2y$10$0g9wlcrA.20eUot/Nsaqj.iWbAocDRw1BJRI0sgFQPDYF7uOzhzKC', NULL, 'pending', NULL, '2021-04-30 02:35:46', '2021-04-30 02:35:46', 0),
(1115, 'rNHLIxhbuk', 'XjmZzIcLdiCQA', 'end_user', '7632932501', 'delriojakeline@gmail.com', '$2y$10$RK.T4LkErn8PQbvJAhUyROnRYxr7NToc70PwBTbOThXJ8jxMbv.7y', NULL, 'pending', NULL, '2021-04-30 07:09:35', '2021-04-30 07:09:35', 0),
(1116, 'eOodAzUbDMQ', 'sCIJLMwuzNDbpofl', 'end_user', '4233527537', 'jungvwtzc@yahoo.com', '$2y$10$3kaQMuK1To85qujd36aAK.mQmSNfzO/IX/zINjoveyaVssGNUYJLS', NULL, 'pending', NULL, '2021-04-30 10:28:11', '2021-04-30 10:28:11', 0),
(1117, 'ZpNUBIyKWCru', 'dsUBlAbanCWLhiXI', 'end_user', '8157324325', 'hilarymcdevitt@hotmail.com', '$2y$10$gPmQJfL4NUTWKQgWdcyMVODjzfY.rN0r9KpngkKN5wngLgqdUozvm', NULL, 'pending', NULL, '2021-04-30 13:58:35', '2021-04-30 13:58:35', 0),
(1118, 'yDxOTwGdRFZnLBj', 'ZyIdljaJ', 'end_user', '8156613582', 'hepsie6km@yahoo.com', '$2y$10$7RfLT7uafARLAUmNAkMKleRZmXsrAq6ZsfhyclkGMK7YxO.L9KU12', NULL, 'pending', NULL, '2021-04-30 19:09:39', '2021-04-30 19:09:39', 0),
(1119, 'FVHYapoew', 'zLcMkawOAsiZBPyI', 'end_user', '5337348292', 'conorlyons315@gmail.com', '$2y$10$UmFdizS54yrs/BuFz/oG6.7zVMzJs54UTgeJ9pNlyi2YNVSAN0pyu', NULL, 'pending', NULL, '2021-04-30 20:18:04', '2021-04-30 20:18:04', 0),
(1120, 'JhBgouFSQMTGDjsw', 'HcZFBUzwJaOSIW', 'end_user', '6349952509', 'conferenceconferen@gmail.com', '$2y$10$qURcyor8CxCiJoT4BQSCAuKnJVr5kCjkCEd0DYrCVZpvHHLIOfoYm', NULL, 'pending', NULL, '2021-04-30 20:51:49', '2021-04-30 20:51:49', 0),
(1121, 'DqTibLfngXPdj', 'GfRhNJSXPdiC', 'end_user', '2772578907', 'mg6477@uncw.edu', '$2y$10$4NlTdLykdGgoXr4mPZWl1ORvkTyr8wXLUUakBPt.J5ZhmO6N2yxOy', NULL, 'pending', NULL, '2021-05-01 05:32:08', '2021-05-01 05:32:08', 0),
(1122, 'OaNsJAVQYfl', 'OlGdNABj', 'end_user', '6895184097', 'jswann13@msn.com', '$2y$10$59ECWctI5gbtkaLh7s0O2Oq41wJMrT1Po.sxgZth3CW31JMUvWC42', NULL, 'pending', NULL, '2021-05-01 08:43:39', '2021-05-01 08:43:39', 0),
(1123, 'zlgIhEpH', 'LJjHevGWYFoOP', 'end_user', '8708724265', 'weansrd@icloud.com', '$2y$10$xksb/xFYm3MSmtylTSYiiOf7IxTkCg43NVScigreiT/llTTIkEq3m', NULL, 'pending', NULL, '2021-05-02 07:48:30', '2021-05-02 07:48:30', 0),
(1124, 'yPHFnIRZbJd', 'lhikgnrLNHY', 'end_user', '3388213449', 'antwan7muwpedder@yahoo.com', '$2y$10$XXwX.LoiBk2BGTfuIxt7UuXt7GWYBGBLRPAT4BxZl0SI42BPLcP9O', NULL, 'pending', NULL, '2021-05-02 16:10:09', '2021-05-02 16:10:09', 0),
(1125, 'YSPzvpQclbM', 'ZtDLUrWF', 'end_user', '2708878839', 'co4281kubish@yahoo.com', '$2y$10$Kq2ZyzMJ2c8qGCEzDxqQ/OH8RRkov5GIUc7jQkxdLXL6VL2vfAb6e', NULL, 'pending', NULL, '2021-05-02 18:30:31', '2021-05-02 18:30:31', 0),
(1126, 'BTRwOzcrK', 'bxWIXhsrLl', 'end_user', '3948466791', 'devonaopal7f@yahoo.com', '$2y$10$xcfhKZI8.PCDsajhpvo4geNmOMkOD0xvbOecc8K620KBy6jNbotZm', NULL, 'pending', NULL, '2021-05-02 21:46:55', '2021-05-02 21:46:55', 0),
(1127, 'WxShwAHtGKNcn', 'JXdefbCyjDaPYwg', 'end_user', '7894225482', 'rockytoptennessee15@gmail.com', '$2y$10$GrtRgR5D/rVwZS95DuN/1uI0UeIV8ToQa75XP6CrOGQ7g6azgJSD.', NULL, 'pending', NULL, '2021-05-03 10:05:37', '2021-05-03 10:05:37', 0),
(1128, 'OIprowFdGXnPNQ', 'sDqeimIxBaMujNK', 'end_user', '9594358231', 'gregoryrandallosborn@gmail.com', '$2y$10$UjurGV6BM0GxOiLY7gdpsuw6VEadvoHoDjGFmEowi7UWMIcVtH1fW', NULL, 'pending', NULL, '2021-05-03 18:28:34', '2021-05-03 18:28:34', 0),
(1129, 'kdZLVjYzWJcqhEvT', 'tcbhKCiqOudrfAH', 'end_user', '3228844034', 'dmars40@gmail.com', '$2y$10$kJJ0zEE2QTa51tokcWQiP.rgAxCe2A0WvBNDUWbpg2NXDVpXoXTKe', NULL, 'pending', NULL, '2021-05-03 19:12:22', '2021-05-03 19:12:22', 0),
(1130, 'EYDvkJSjWwZA', 'zLCipQuFd', 'end_user', '2328375805', 'kthorpe1117@gmail.com', '$2y$10$ic6tuJPSHozcjZuEnEfoZeLc.OXr2fRXgPTQ5zO0FVlHpu6vI/z9q', NULL, 'pending', NULL, '2021-05-04 12:30:35', '2021-05-04 12:30:35', 0),
(1131, 'zRJbBgLa', 'buCfwzmZs', 'end_user', '5355126935', 'clairesodah53@yahoo.com', '$2y$10$EqTpLjg29G3/94xxXQ6Sk.AQL.e7DQyiovpJuulFFVvqxq4V1QPZ6', NULL, 'pending', NULL, '2021-05-04 21:03:31', '2021-05-04 21:03:31', 0),
(1132, 'szAJrnNXjBax', 'RgHEmIDluihsA', 'end_user', '4934251029', 'jimferrence@gmail.com', '$2y$10$zkU3JpD2k0z1b1JqlbF6HuS89Y2F3C1LArcUDKT0AaxU5K88S1.ou', NULL, 'pending', NULL, '2021-05-05 00:44:12', '2021-05-05 00:44:12', 0),
(1133, 'JcAbIuStglmX', 'eyTJsSEj', 'end_user', '3044113655', 'brettmichael2005@gmail.com', '$2y$10$6I24b2Z1xU/W5vxGo8AV/Oo08YVr8BgX/2CR09FVN9HiH.GtMFXmG', NULL, 'pending', NULL, '2021-05-05 12:04:25', '2021-05-05 12:04:25', 0),
(1134, 'FEVNwJLBYmI', 'XmSLzhVIQWqMl', 'end_user', '5618198276', 'hayleehughes24@gmail.com', '$2y$10$lON0pGsI4rDOIT6K3ZfzGem/wVFgktgS3LuOUTNGDmh81rm8RbycO', NULL, 'pending', NULL, '2021-05-05 16:17:52', '2021-05-05 16:17:52', 0),
(1135, 'mlHafzMZ', 'LIEusperS', 'end_user', '4929881505', 'wb4650@gmail.com', '$2y$10$fHMrw8Dn6XCoMW/yEs7KI.1kpYdmsAxPaUp/iJMPW9NAK15WS82/2', NULL, 'pending', NULL, '2021-05-06 06:10:46', '2021-05-06 06:10:46', 0),
(1136, 'QoIhjLia', 'ADriXjoKL', 'end_user', '6523194097', 'brenda.bissonnett@mail.com', '$2y$10$..VtdHoUCFcy3JTx6uQdCu9Ma2kgSkdmsC4MjIanI0UJa2BwcOLkm', NULL, 'pending', NULL, '2021-05-06 09:33:34', '2021-05-06 09:33:34', 0),
(1137, 'oqAepcBwKaODitTn', 'ebnCXzPGfcNwsVK', 'end_user', '8135219195', 'maxeneksm4a@yahoo.com', '$2y$10$DFKzjaul2BPO2XxKSg7MBeTW24fck4Ch338cX6cQJvL2qPIsnhYWS', NULL, 'pending', NULL, '2021-05-06 10:51:10', '2021-05-06 10:51:10', 0),
(1138, 'YfpMeXQnxBWTjS', 'AePOomCXFk', 'end_user', '5362946253', 'leeryan424@gmail.com', '$2y$10$Wt9aQ9Qy1u/cDOAGV1hYhOOjAlpJYkXJonUyg5L2tcL.Qr7w4CBVC', NULL, 'pending', NULL, '2021-05-06 12:55:05', '2021-05-06 12:55:05', 0),
(1139, 'pnXMtFGNChxiSVJO', 'ZeIzYLlUo', 'end_user', '9048368132', 'mattgrimes56@hotmail.com', '$2y$10$lnCYYDvDaJ/mtPtGD4hkVeHhTMHXXcX0RscX6RcrnX9z.k25iltaW', NULL, 'pending', NULL, '2021-05-06 18:21:34', '2021-05-06 18:21:34', 0),
(1140, 'eBjmgwEIiOJ', 'NXVkbKixujsF', 'end_user', '8911425480', 'walker.marlee@outlook.com', '$2y$10$p4TLsEwW3s1QxhEoqiV6jepRHpG8BhsaSjsZZjEnN/xc23hFFhRiS', NULL, 'pending', NULL, '2021-05-06 19:58:53', '2021-05-06 19:58:53', 0),
(1141, 'gZXDCiWTAFNvenE', 'cxCLbuKkP', 'end_user', '8850353716', 'post450@optonline.net', '$2y$10$64ED6lU2oV9Y8AKfRKg.jOsqrwLHsiM1vVGX/zjbpno8sbimzXp4W', NULL, 'pending', NULL, '2021-05-06 22:21:25', '2021-05-06 22:21:25', 0),
(1142, 'TBuhbQevdY', 'UBnuzbEfxkc', 'end_user', '4841045501', 'donnashaw111@gmail.com', '$2y$10$7q2BDAygP4GFzo5ArOpUxOB6xbbse7MP1aO56R2k9aJWMMseQom8i', NULL, 'pending', NULL, '2021-05-07 12:23:23', '2021-05-07 12:23:23', 0),
(1143, 'IlOHeTZyos', 'BdDLSwnJ', 'end_user', '6397170302', 'stefanigst0@yahoo.com', '$2y$10$wO1y5yuD8QoychiVmk0vhOFUphQNGuaS3wzGMg9xvTTYk/YLjtp/a', NULL, 'pending', NULL, '2021-05-07 14:01:31', '2021-05-07 14:01:31', 0),
(1144, 'XZFwzPpqv', 'supRDgYw', 'end_user', '7997850696', 'billzer32@hotmail.com', '$2y$10$omA0bij/aH00iZQptqPW2e3lZir9pw//kvVyXmp8wilay9EL.quSu', NULL, 'pending', NULL, '2021-05-07 14:20:46', '2021-05-07 14:20:46', 0),
(1145, 'xlUYIJvGLzpasK', 'abqkVQxtzLvHUT', 'end_user', '9149659071', 'listattlejt@gmail.com', '$2y$10$VIl7XTGFzVPD.KYwPqdWIeOIgMMMYUbFc5F4rMAvxZXtoYYkjqu9C', NULL, 'pending', NULL, '2021-05-07 21:22:07', '2021-05-07 21:22:07', 0),
(1146, 'oBYimHuRKcfCFsv', 'jOJNEZRc', 'end_user', '6117356331', 'ekl.mahaney@gmail.com', '$2y$10$9r25vA1LhfP1iUsZxNhGa.0kOX85ZaOs7DLHu7W0Ev/XjZmV.EfX.', NULL, 'pending', NULL, '2021-05-08 15:58:08', '2021-05-08 15:58:08', 0),
(1147, 'NYWuXjEawPLkO', 'tBJlFbNVdL', 'end_user', '2087600621', 'anteretsea@gmail.com', '$2y$10$O0sl6VufGzYyyh3IkSncNuVKW/KtmAdUqMsgGPqfy3XWMKrYa.XOW', NULL, 'pending', NULL, '2021-05-08 20:05:10', '2021-05-08 20:05:10', 0),
(1148, 'zRDbFguwlMGVj', 'wZicQHJqpxFIYl', 'end_user', '7701945080', 'jennifer.jones915@yahoo.com', '$2y$10$ehG5PCapkGNCyhCA4q3WPep8ccyFvAhdQynj05hOtpZ7SRgNeYLji', NULL, 'pending', NULL, '2021-05-08 22:27:26', '2021-05-08 22:27:26', 0),
(1149, 'KFsCSGAdoEelTOZ', 'UORKzxYoDsuy', 'end_user', '9333823642', 'smithapril140@yahoo.com', '$2y$10$dHxx/CP3NphVtMfUqhUEseb1qNg3ViK0cegiULIJJB6co5jjmzIui', NULL, 'pending', NULL, '2021-05-09 05:56:31', '2021-05-09 05:56:31', 0),
(1150, 'xeRjJlZo', 'aqZVwzKrC', 'end_user', '2912704669', 'brandoncasura@yahoo.com', '$2y$10$qrFkmzHz6Tc1lvjKlRLRVO/Wjcxr4pB9iCPWc0PgCcBS17B.7aSYm', NULL, 'pending', NULL, '2021-05-10 12:43:21', '2021-05-10 12:43:21', 0),
(1151, 'RmnkblwPNC', 'LuPKYHjef', 'end_user', '4793919249', 'nathan.sannes@yahoo.com', '$2y$10$ulf37BFqVQBLEOXpA0OBce8Nh2lcvLT2jbYS7Tts41skqd9r1g9km', NULL, 'pending', NULL, '2021-05-10 23:42:13', '2021-05-10 23:42:13', 0),
(1152, 'LrIRfZlPXYh', 'PEgjfQDXov', 'end_user', '8374882458', 'janetlocke362@yahoo.com', '$2y$10$cf7arnkleKJL7YLVc7HnZ.vJdsvATtAMy79r39h7eA3nGsm/SYDCq', NULL, 'pending', NULL, '2021-05-11 19:57:19', '2021-05-11 19:57:19', 0),
(1153, 'AMYIzHGFDr', 'ZmhyxStWKMInz', 'end_user', '4283943369', 'sterling.shelly@yahoo.com', '$2y$10$FWYabkJY1ImfmwgGy7Zd3.NOyDOpRH3Bqzd127SwIiRRIsMytPUby', NULL, 'pending', NULL, '2021-05-11 22:29:32', '2021-05-11 22:29:32', 0),
(1154, 'Rosina', 'di Farnese', 'end_user', '01748327076', 'info@asteria-servive.de', '$2y$10$yetQ2zVOA78HtdP34Ahuu.G/9IwdRI11FgZNjiYC/RFuLKl/yOgua', NULL, 'pending', NULL, '2021-05-12 19:34:06', '2021-05-12 19:34:06', 0),
(1155, 'rAIKzCEWaxgjmNk', 'umXLTqYgED', 'end_user', '3783213280', 'cullen_chopin@yahoo.com', '$2y$10$orLwmT69UjeHmVQDbPX7E.HLAf4BNa5B6Cq7eI9g/8dugb5aHtAOC', NULL, 'pending', NULL, '2021-05-13 07:37:50', '2021-05-13 07:37:50', 0),
(1156, 'MtCiwITcYmuNPqf', 'AXZpiMUgRxbNcC', 'end_user', '7839948618', 'richmonddavid84@yahoo.com', '$2y$10$.arvxF/cclQqgr4gThRYJugoSi6nnSC5JqmNKzsIE7rcZrBKXWjn.', NULL, 'pending', NULL, '2021-05-13 15:54:40', '2021-05-13 15:54:40', 0),
(1157, 'rkDFUGJTsgYRfy', 'VhfSHPtduknEjIOJ', 'end_user', '8676398836', 'ychris268@yahoo.com', '$2y$10$e3BrYW4KvPcFSaKsMlbyKOf65VaiX58iL8BlgGU7GsIoMwE9Zigtq', NULL, 'pending', NULL, '2021-05-13 17:06:26', '2021-05-13 17:06:26', 0),
(1158, 'gxYAIDqUEPbHiFJS', 'vwopkGdgCqczEAW', 'end_user', '5499681369', 'joanthan.twiggs@yahoo.com', '$2y$10$WUuszy5K4y29tFOJBEQ/DeANGEsFBTlJTi3kNAowGwyGN4ixiBEni', NULL, 'pending', NULL, '2021-05-14 06:30:20', '2021-05-14 06:30:20', 0),
(1159, 'pakYVCHSf', 'OeGcfQHasBjlXSWA', 'end_user', '3581456482', 'frankie.lascelles@yahoo.com', '$2y$10$hf9aYunN.0YwMGTC3uvEFe5eXE4rsYNYIl/dtWJ3o1ZrVRlLdSrGO', NULL, 'pending', NULL, '2021-05-17 23:10:09', '2021-05-17 23:10:09', 0),
(1160, 'ToifdZHgltL', 'iSVpshfCzMl', 'end_user', '5813021868', 'vanettaverden@yahoo.com', '$2y$10$unroKsCznKtfUrOPfPVq6.uPYXfi1hjpAW5RjGRl/rfTr4xGV/i/W', NULL, 'pending', NULL, '2021-05-21 03:25:35', '2021-05-21 03:25:35', 0),
(1161, 'oUVSDQac', 'RKZmChrDGTeU', 'end_user', '4180296885', 'rpardue71@yahoo.com', '$2y$10$TDmaXxvBoK8k.Opt4cPEZetX4TXzMYA/ky4r.n4/IzIYWga6sdt5C', NULL, 'pending', NULL, '2021-05-21 09:16:46', '2021-05-21 09:16:46', 0),
(1162, 'kmgBIGhcLdKMSYWl', 'TEAbaplsm', 'end_user', '8638133945', 'nan.grech@yahoo.com', '$2y$10$NahSk9b3JJwP.7k79xRs3uQipnC2Vl..GE7sRdVHBDLipTAvbn5WO', NULL, 'pending', NULL, '2021-05-22 06:26:33', '2021-05-22 06:26:33', 0),
(1163, 'UrESQIvCat', 'LONFuWmC', 'end_user', '3139971431', 'sharleen.dunning@yahoo.com', '$2y$10$BMhMKoGD0pgP2pvffoUpw.VUMYco5.Mw9e7DEdTduycW87MqWltN6', NULL, 'pending', NULL, '2021-05-22 10:03:42', '2021-05-22 10:03:42', 0),
(1164, 'yWpAlwbVmXzN', 'OMXfguUk', 'end_user', '8301370831', 'tinlandruthe@yahoo.com', '$2y$10$CwatmZU82joQfUgOb8aYouvLckm.IV8djIusj6vYyoVZ.f2DfhF.G', NULL, 'pending', NULL, '2021-05-22 16:54:07', '2021-05-22 16:54:07', 0),
(1165, 'RVZMjgtmFJABhoq', 'TRjhcMAsH', 'end_user', '6815676044', 'lockie.sandee@yahoo.com', '$2y$10$nEZk11BPIIsYYvJXL2rYtum7nWg/MBWIfjr28qL2891rPufil6WIG', NULL, 'pending', NULL, '2021-05-23 00:00:07', '2021-05-23 00:00:07', 0),
(1166, 'fZQGdaWSbhDULXc', 'XzFZuRGlHQjmV', 'end_user', '6223287357', 'wantylaurence@yahoo.com', '$2y$10$YWgXmfRy37DwGkiKssTKyuAhxoWR8ycyUX15EkEakm/ybzpzmS6jq', NULL, 'pending', NULL, '2021-05-23 09:25:38', '2021-05-23 09:25:38', 0),
(1167, 'Martin', 'Noori', 'end_user', '01745813656', 'martinsayed@gmx.de', '$2y$10$7LQfx41ku7W/yGXtGcvsoOnT2mMjf34dmi90rXaqEs8jY8RMABfMi', NULL, 'pending', NULL, '2021-05-23 10:00:57', '2021-05-23 10:02:14', 1),
(1168, 'vkWIwYlTMGQjJ', 'SVnIejEobJf', 'end_user', '5166846547', 'footesdonya@yahoo.com', '$2y$10$34wyqBEMoTTgVLsTVgL2yOEgkOTvLOzn8HiKalBrneVf0TJjrsraG', NULL, 'pending', NULL, '2021-05-23 14:46:57', '2021-05-23 14:46:57', 0),
(1169, 'LRgfZFbTk', 'VyBLoSEIdJrkMY', 'end_user', '8084359892', 'ifsperomenc@gmail.com', '$2y$10$ujcBm9xsJot44P8dyzrZledN15b2MlW2LRljJcYfkmb1PDgBlhi8q', NULL, 'pending', NULL, '2021-05-23 16:20:37', '2021-05-23 16:20:37', 0),
(1170, 'NbulSkMwGmeO', 'WDIoMsuQp', 'end_user', '4114536987', 'freewor1danonymous200@gmail.com', '$2y$10$gMop8VC685WxgBnSLG0IIuX7/pbKahtvtdw9tLfqkl/dsYLirgLR6', NULL, 'pending', NULL, '2021-05-24 12:47:24', '2021-05-24 12:47:24', 0),
(1171, 'tvRxwFWBJVfAc', 'TiuVqINUx', 'end_user', '7348788954', 'achwilkes@gmail.com', '$2y$10$xG9BvyUtF2.31j//XeJCgO6mi4rSuR4E13hXJJ/XJfvpalWV2Alw2', NULL, 'pending', NULL, '2021-05-24 19:24:17', '2021-05-24 19:24:17', 0),
(1172, 'QwVWiCSegYBbpn', 'RzOXBrdig', 'end_user', '2705923451', 'davidadonati@gmail.com', '$2y$10$xwGcxazNeZuerU/FviWIEeLczzIqoxDAlkfti84OL5g0s58CM35.q', NULL, 'pending', NULL, '2021-05-25 10:31:51', '2021-05-25 10:31:51', 0),
(1173, 'uESzPfoLBOeCdk', 'TUtEVCoaXmrpFn', 'end_user', '7123493446', 'natalie@dmfdetroit.com', '$2y$10$qI4QpGBLingjA3XtBUMIb.0XGPbr2sQokaOPrBEpFHrCPT0BRmL7q', NULL, 'pending', NULL, '2021-05-25 13:56:13', '2021-05-25 13:56:13', 0),
(1174, 'epTQaPiSdMJk', 'IGvopjmQ', 'end_user', '6163415664', 'gonzaleeza25@gmail.com', '$2y$10$TeOmikZ2byWJb6YJ1Votce9Aj2Ht6xLLe.eiN6duQ1OB6hkoerHfy', NULL, 'pending', NULL, '2021-05-25 14:15:52', '2021-05-25 14:15:52', 0),
(1175, 'wPWbygmKhqGQCiN', 'erIXvHJzqcfkO', 'end_user', '3834209429', 'victor@kormextrans.com', '$2y$10$.QV/jjlVj.7YLysWcq44eOog2he1iFkjxOoBXD1PKwYisDghmJocK', NULL, 'pending', NULL, '2021-05-25 17:25:00', '2021-05-25 17:25:00', 0),
(1176, 'BmPlnqHeSXKZVwE', 'VTsBbfwMWC', 'end_user', '7351407575', 'susannah_sellars@yahoo.com', '$2y$10$FulWZU/DRK6HyV239vlyX.5E7NJiLR10nJJN91rHzJnnkMt.3ATSi', NULL, 'pending', NULL, '2021-05-26 12:17:08', '2021-05-26 12:17:08', 0),
(1177, 'EBYgnsAhyF', 'ikfSLqWjQMxH', 'end_user', '2666442234', 'terrytierra680@yahoo.com', '$2y$10$o6dd7yZ.bjA6z0CxDg7WJOJUMyircr6YfIhMokxYAbOrdQx5MptOO', NULL, 'pending', NULL, '2021-05-26 15:28:11', '2021-05-26 15:28:11', 0),
(1178, 'sOoGPchYBUWlD', 'QgevyHExGBA', 'end_user', '3964569902', 'amanda.c.olson@gmail.com', '$2y$10$.Zfne5vROFKUAabZxH5HkeuwS28e2/YvFoS/Xl8OKCg7OnYtT48dC', NULL, 'pending', NULL, '2021-05-26 16:16:47', '2021-05-26 16:16:47', 0),
(1179, 'MtINQmdJO', 'nFkpYbDtgQu', 'end_user', '4103814711', 'noelschow@gmail.com', '$2y$10$GkRNzgtjnrr786zcTW5hbOAFpgz/yMq.AZe8LZlLuYHiDBRITnN4i', NULL, 'pending', NULL, '2021-05-26 17:42:49', '2021-05-26 17:42:49', 0),
(1180, 'phOsDZUT', 'TyaiZsNkGOEJChm', 'end_user', '7371509946', 'bill_rottler@qwestoffice.net', '$2y$10$Tt85/e4ggN30YogrlFK6kemqjg4F8gCxInrZSerRgOnGnY2snuYn.', NULL, 'pending', NULL, '2021-05-27 03:07:37', '2021-05-27 03:07:37', 0);
INSERT INTO `users` (`id`, `first_name`, `last_name`, `user_type`, `phone_number`, `email`, `password`, `creator_id`, `status`, `remember_token`, `created_at`, `updated_at`, `verified`) VALUES
(1181, 'zxlqvVWDSfKuTtZH', 'fQHzZxSEJyPaM', 'end_user', '8070964864', 'sandeep.pradhan.1@gmail.com', '$2y$10$w53hfLMOSViuaGjTU00W2uHqDsfp4ER18pVnMCqNMSBA6cWbJGgQ6', NULL, 'pending', NULL, '2021-05-27 07:29:36', '2021-05-27 07:29:36', 0),
(1182, 'HwPaLZus', 'VGhTusiYfbq', 'end_user', '8270235148', 'dagmar_meikeljohn@yahoo.com', '$2y$10$T1Sb/yEK6T38NtxqXUpwyuOreiEjs7U8bmV43G8exH6TOmfg1SohC', NULL, 'pending', NULL, '2021-05-27 10:49:39', '2021-05-27 10:49:39', 0),
(1183, 'vuAOHTLh', 'EtOsTCYg', 'end_user', '2072361603', 'rkim2006@gmail.com', '$2y$10$uwn3CvyNVTDI9Mx0zMA6X.O20R5.SQbQp2h7Zn9HUCJad.qQ/fmOu', NULL, 'pending', NULL, '2021-05-27 12:13:59', '2021-05-27 12:13:59', 0),
(1184, 'DQEnTUZqXuFwJam', 'wrjPmGavWRObxV', 'end_user', '8388427266', 'debbiewhite1234@comcast.net', '$2y$10$O3H5fLwb3XoAMxqlkPV.ledS3UUSQ95iqvbTbnjuq.LTQkvQUQc1C', NULL, 'pending', NULL, '2021-05-28 12:18:19', '2021-05-28 12:18:19', 0),
(1185, 'EvCTBKXRQmucDxj', 'KaIBspTXqtGHm', 'end_user', '3405273320', 'mike@mccorddesign.com', '$2y$10$XnoTwGMqq0gZG2raGNrRX.Oi4w0Xin6vKoXkf3khJ9yfcEi/Net26', NULL, 'pending', NULL, '2021-05-29 02:40:39', '2021-05-29 02:40:39', 0),
(1186, 'iNgjqmwzbYSy', 'celzMSxUHLjuIZ', 'end_user', '7587380098', 'ameen.mirdamadi@gmail.com', '$2y$10$RrLlu5WVu7ITx2Gv7zNZSuWwPU2etTsguIdXK3ZlS1CC1bmiLQwwW', NULL, 'pending', NULL, '2021-05-29 03:11:40', '2021-05-29 03:11:40', 0),
(1187, 'hxIgpvHnsLCb', 'ATpfWHkJiuBDadIZ', 'end_user', '8809119601', 'kena71fb@yahoo.com', '$2y$10$0wy09mxPuOHz0icNEgzi2.GW1IEKAVAFrlP85R3q2655wKr.vcEly', NULL, 'pending', NULL, '2021-05-30 09:10:48', '2021-05-30 09:10:48', 0),
(1188, 'UMVtzAWd', 'uNrJwjtKHWPgsZ', 'end_user', '5538662001', 'crshibata@gmail.com', '$2y$10$qCguzQAf269kWvwaPZUNT.Qyi.m7zdDImcuhqSjRqYO1lqOa2aiGu', NULL, 'pending', NULL, '2021-05-30 22:43:32', '2021-05-30 22:43:32', 0),
(1189, 'vYZpiajBcDCMlEX', 'kCbonJdrxH', 'end_user', '9071251459', 'smithkristen65@yahoo.com', '$2y$10$dWdRRp8E4aFW6h5YWevnee/Q.m9/nNGHKAlVCfOhpyxqh9QYCiDBu', NULL, 'pending', NULL, '2021-05-31 04:47:57', '2021-05-31 04:47:57', 0),
(1190, 'KqTBUFYlDjc', 'UJvztyBpNZhejE', 'end_user', '7163126705', 'saaron279@yahoo.com', '$2y$10$EFDClUtBluXKc5GFeOJpZexlh2xFO/VNMMVifk8hx17GxAomyY.42', NULL, 'pending', NULL, '2021-06-01 08:44:38', '2021-06-01 08:44:38', 0),
(1191, 'KfjPpubSnlXrc', 'rbUQDuikhMndT', 'end_user', '7359325638', 'parrakaden@yahoo.com', '$2y$10$AHa73SGbxr4SRd3EPHkc5ehzdV6f/dTDTfpTi7qj5ocZpGq6UQlwi', NULL, 'pending', NULL, '2021-06-01 09:40:53', '2021-06-01 09:40:53', 0),
(1192, 'zyrewPxtYU', 'MXeETpGdVCn', 'end_user', '2657235516', 'woodsveronica86@yahoo.com', '$2y$10$B.jxD6H0m2Qt76FBIskMQe3cMpdYGZLbk4vX0dMcHYsBIQbwpgpIK', NULL, 'pending', NULL, '2021-06-01 10:27:10', '2021-06-01 10:27:10', 0),
(1193, 'hgtjVWxas', 'ObmIifLTFhoU', 'end_user', '6408840367', 'r_deborst@yahoo.com', '$2y$10$Awqner3febn/xE0aYEphjObivt/ud.mUil.0iXWCdNwwjcTppXd8W', NULL, 'pending', NULL, '2021-06-01 13:05:55', '2021-06-01 13:05:55', 0),
(1194, 'VsUPWBAzT', 'FmVnpRgIXAZ', 'end_user', '3830370913', 'caseypark81@yahoo.com', '$2y$10$P0pa3PpeNkUYHukT.QnSjOlTcjpKlPGtS0hNyhUV8Oz4Y33HoEEmy', NULL, 'pending', NULL, '2021-06-01 13:09:55', '2021-06-01 13:09:55', 0),
(1195, 'rHyPQpxFSKjJuk', 'gWLUAfonwBiPQ', 'end_user', '5753287140', 'baileyireland@yahoo.com', '$2y$10$.3CH7nOh2kZt4fGUJHn8Z.zALwPJy0Rr1lghKl2T1LfKHxropb3WC', NULL, 'pending', NULL, '2021-06-01 17:25:52', '2021-06-01 17:25:52', 0),
(1196, 'SzLPtpyc', 'FHbhDfBQamil', 'end_user', '6186055726', 'comicflet@yahoo.com', '$2y$10$0NoNvpF9WTO6RkXsupYBLOK3iucCmBd4cuCReYF.IX6HQg1ruOIAa', NULL, 'pending', NULL, '2021-06-01 18:10:50', '2021-06-01 18:10:50', 0),
(1197, 'eOFzTaqjClXtuf', 'DsOQLvhg', 'end_user', '7515492539', 'auntym2u@aol.com', '$2y$10$9haeO1dE6tYymDuZErcV7.M7jDPuAsOtIOYzt5/28BX4HNxSgNUkq', NULL, 'pending', NULL, '2021-06-01 18:44:53', '2021-06-01 18:44:53', 0),
(1198, 'lrbZPjvxdMEypzOB', 'ARrJXQiP', 'end_user', '9455918337', 'haddycat@yahoo.com', '$2y$10$TDs/bop4mvEej2HMb4dKcuLHN/aMvtCMyPLmKFYyNVsTAFOnigeRK', NULL, 'pending', NULL, '2021-06-01 20:01:14', '2021-06-01 20:01:14', 0),
(1199, 'fZQYoUwWFBVcrA', 'SNKcXmvJORMsI', 'end_user', '4334779898', 'bgunjupali@yahoo.com', '$2y$10$mzTAxFO7ZiLyZ52Li1RwmutnclNtaNkSCQK3m9T9mKCLieKsMFEDq', NULL, 'pending', NULL, '2021-06-02 13:07:21', '2021-06-02 13:07:21', 0),
(1200, 'tcCyWHSIwAR', 'YjBxFPEnpwiWoXLR', 'end_user', '3001536831', 'shenrygurley@aol.com', '$2y$10$8/94zGQjeaU8IPnGJLalluJsZI./afKScueT0bK0otQofgRwX.NuC', NULL, 'pending', NULL, '2021-06-02 14:58:42', '2021-06-02 14:58:42', 0),
(1201, 'OoRKbwPvBS', 'fQIwFCXbGNR', 'end_user', '5938086997', 'flfspring@yahoo.com', '$2y$10$TqZI7zN/LzknINJ9c/oMTet3lCeE2Wcr5vL6hND0MD7mxEwpbkWsm', NULL, 'pending', NULL, '2021-06-02 16:58:00', '2021-06-02 16:58:00', 0),
(1202, 'cxvzFHyKogfCtN', 'rjyLQOexDa', 'end_user', '4733846146', 'deanfiloso@yahoo.com', '$2y$10$hGPFZmGK65/8HSBGLmiNkOetNSU2Hw5rqOlYNfmQcl1xScZS4g.jO', NULL, 'pending', NULL, '2021-06-02 17:35:17', '2021-06-02 17:35:17', 0),
(1203, 'CQMgZhcLdGBu', 'YCKOPzdkog', 'end_user', '6137954710', 'leeproctor13@yahoo.com', '$2y$10$qSG9CcCSgoeYL/96XSMt6eWLr1plqVibMqmv2J7Ou.VH01Hq273T.', NULL, 'pending', NULL, '2021-06-03 04:30:08', '2021-06-03 04:30:08', 0),
(1204, 'flQnsCRceKI', 'KebXcYnZS', 'end_user', '5536559507', 's.salonge@yahoo.com', '$2y$10$Wfcu7A3H55VBolTJSXxg3esUXrKht4IUVGD3/j5uwuX4zo8pAoe/y', NULL, 'pending', NULL, '2021-06-03 10:32:44', '2021-06-03 10:32:44', 0),
(1205, 'VCJXPnuhxi', 'PXawcpCWeOdFHVZl', 'end_user', '9590764956', 'shaan_e_shoukat@yahoo.com', '$2y$10$dJMmdFuM.cGcC6IxlX0bCelwwOgqBttV3yzOSRBv.v8BR5xlmMsGW', NULL, 'pending', NULL, '2021-06-03 13:53:31', '2021-06-03 13:53:31', 0),
(1206, 'DyKTbzpu', 'ulIJVkEYeQmrZFSX', 'end_user', '2728754638', 'roseybarbo@yahoo.com', '$2y$10$qS5GrjEwHGduOoMASdMpuOYRpcCZCYvPOkdFIorYBTufCe0Ek8Nci', NULL, 'pending', NULL, '2021-06-03 14:35:59', '2021-06-03 14:35:59', 0),
(1207, 'rseJzPaCMovRU', 'CxZHbSUvkctyV', 'end_user', '2088148990', 'timcoffield@yahoo.com', '$2y$10$S09Cm5.Ydh.erYMBfo57beR99L0NwG.lJZb2VCQfeneBWAddPikPm', NULL, 'pending', NULL, '2021-06-03 19:11:45', '2021-06-03 19:11:45', 0),
(1208, 'BcIqFMSb', 'HWCBPGOQZgfhDqLa', 'end_user', '4477484369', 'hjesse38@yahoo.com', '$2y$10$I2wR68QTD60PyWU/h5p0gOASHhAQ0XNcjudcKIfqyG17qFrypFN8G', NULL, 'pending', NULL, '2021-06-03 20:42:19', '2021-06-03 20:42:19', 0),
(1209, 'DIRPaZXUghHvE', 'gJINwKSjBWdrYvi', 'end_user', '5460629461', 'nicolevandervest@yahoo.com', '$2y$10$zWq53kcKpupH3sZzWWYeC.rtCHlwwMUaYPC8agZVNmh1CUWcSO0qu', NULL, 'pending', NULL, '2021-06-03 21:50:02', '2021-06-03 21:50:02', 0),
(1210, 'lDPZNRfCYwEn', 'RwVZHQqAvr', 'end_user', '7307477340', 'noemivargas07@yahoo.com', '$2y$10$0KNvW3xtKUxlfebBv2rutuu.cWWHsDWbkHe2DAWSi5TIa.IAQIGJS', NULL, 'pending', NULL, '2021-06-03 22:03:37', '2021-06-03 22:03:37', 0),
(1211, 'zEWDPluiwQOHc', 'KYQxIyOTNbBuACef', 'end_user', '4143959787', 'moreangela63@yahoo.com', '$2y$10$2nKzM2IUpunHtjT1lkg92uPqtRcyOVpMRx6fT0s0U1NBxRlAiWrLq', NULL, 'pending', NULL, '2021-06-03 22:23:52', '2021-06-03 22:23:52', 0),
(1212, 'QzTYoZLKxg', 'ieuwSvJYn', 'end_user', '6095968127', 'bosmike753@yahoo.com', '$2y$10$7wci1iKt53r.kIEac1BsgeMYipKLJyCYMlNhOHoAa2XcJTqSisMCC', NULL, 'pending', NULL, '2021-06-04 00:30:47', '2021-06-04 00:30:47', 0),
(1213, 'agHiulwOXWh', 'fHyaNAUoWReG', 'end_user', '5279654570', 'asfjkf@aol.com', '$2y$10$2kigb5INsllmMFMyb7WOqu8xVHp/t39n6wFIpaTEYWaaq/yImeaMu', NULL, 'pending', NULL, '2021-06-04 00:57:33', '2021-06-04 00:57:33', 0),
(1214, 'fTHlcbPDzZ', 'APIDGrvRFJmCcbg', 'end_user', '5628285280', 'moralesbianca308@yahoo.com', '$2y$10$t2AXLutAc0Mt5wDm5A9Jj.2XjnEyFlMAH1j0kel9TZkeFzVA5eHOu', NULL, 'pending', NULL, '2021-06-04 05:32:38', '2021-06-04 05:32:38', 0),
(1215, 'UZmHCynf', 'UQjtPGbyaeliFxh', 'end_user', '5498315107', 'metalmanjim@yahoo.com', '$2y$10$NV9JK8SLyrP1lazFEwotLeSNQkPtiaJbkh94m.tK0vNvklm2HfVPu', NULL, 'pending', NULL, '2021-06-04 09:15:11', '2021-06-04 09:15:11', 0),
(1216, 'RurFCyOc', 'zTZXNvYyIJ', 'end_user', '7592560543', 'vickyplace@sbcglobal.net', '$2y$10$rGM0mciDzMz4Y8mcJy/kZuNMeLMdCd8BphSQnAbLzKAWr8uRs78qW', NULL, 'pending', NULL, '2021-06-04 09:47:52', '2021-06-04 09:47:52', 0),
(1217, 'jQBJirvzsRGC', 'dypbktuAf', 'end_user', '8252420979', 'neverland@sbcglobal.net', '$2y$10$L3JFzaCxCIh2e2Z4XvqLKumCF7bEmeA3tnkPldS6dmCLPgrao.ZIq', NULL, 'pending', NULL, '2021-06-04 14:15:45', '2021-06-04 14:15:45', 0),
(1218, 'lgDjtybLoz', 'yNDxGOlhfUdCpbFM', 'end_user', '9133054080', 'elishanannenmu@yahoo.com', '$2y$10$WGLOwfc9AYjNaAtEyDjX2uthYJSQOQazeJRo3.uIhZTUGQXWZymui', NULL, 'pending', NULL, '2021-06-04 16:10:32', '2021-06-04 16:10:32', 0),
(1219, 'LfTrZzlXwGypjDc', 'MnZREFpX', 'end_user', '7302266823', 'dlswartz@att.net', '$2y$10$HeUvwZ5dwRzz2CNGQf46PupDNCxlKMj5tWMF7HWcGM5g.DJ6UcvGK', NULL, 'pending', NULL, '2021-06-04 17:15:03', '2021-06-04 17:15:03', 0),
(1220, 'LakSMcdUjKDBzAb', 'NnWkmByCQFlx', 'end_user', '6941287796', 'yassmineelghor@yahoo.com', '$2y$10$8OgmiKwThvuOxbsKGRZ2BuCRQ21I04eOwsiRMOClkhv8RhxyNQNmC', NULL, 'pending', NULL, '2021-06-04 18:35:31', '2021-06-04 18:35:31', 0),
(1221, 'MaiUTrVcZfSJFzBo', 'MgUQljyiZzu', 'end_user', '5556766900', 'kelldt33@yahoo.com', '$2y$10$b0EqcfygAlIZMV86lwE5zO9JLfSROUI7WHta2WB4br14QkzDXWSPC', NULL, 'pending', NULL, '2021-06-04 18:56:04', '2021-06-04 18:56:04', 0),
(1222, 'vEHChGmMXelrSkw', 'PtkrolGOJzgQh', 'end_user', '4132776936', 'daisymom2j@verizon.net', '$2y$10$MX50Oy6GmgewfIjd97HoPuDy38nzprLoMnaXR/iVh.u/RVhgFXaBK', NULL, 'pending', NULL, '2021-06-04 19:18:30', '2021-06-04 19:18:30', 0),
(1223, 'QrfsctmNIDEVFyqu', 'yvEaWPCskMGlKB', 'end_user', '4076282389', 'franklynsmom@yahoo.com', '$2y$10$aR5SnNhZGFsuEdk/c8Ip0uZFJid7GJTVkcW5Gc9HZgaaOhm7af2.e', NULL, 'pending', NULL, '2021-06-04 19:34:23', '2021-06-04 19:34:23', 0),
(1224, 'FHOtGTbV', 'ZSKpjTEhgwMPUFlJ', 'end_user', '5339586125', 'danlev06@yahoo.com', '$2y$10$6CsnfrInoyXx25TcufrPZOPnVv8BdRgeBmupxizUq12209iMB9Sd.', NULL, 'pending', NULL, '2021-06-05 10:31:00', '2021-06-05 10:31:00', 0),
(1225, 'maqTBbAkyjdCNQf', 'CjbFczvdDfoAOme', 'end_user', '8574736258', 'sherlypontis@yahoo.com', '$2y$10$3Phzd1U0zH.3qFsF2ZQj7uEONilWov8OlX3nEYmE8R1ympAViYIyO', NULL, 'pending', NULL, '2021-06-05 16:32:20', '2021-06-05 16:32:20', 0),
(1226, 'VKmRXWHQIScuszO', 'euRHmpLZj', 'end_user', '2581741903', 'bellamyjoann@aol.com', '$2y$10$A3GV5SIBaSzyesUnm8RnmuBu.9SfRTpKaAs6zsEW0ISfnr43WMwVu', NULL, 'pending', NULL, '2021-06-05 22:16:29', '2021-06-05 22:16:29', 0),
(1227, 'JuLOvwFZbWaM', 'kzvlamuPnL', 'end_user', '7726810451', 'valdesaj@yahoo.com', '$2y$10$JuOC2CKj5.T.fvg56Y9zJeuhWeFkqrziyXhMPE0KHAR6SUU1Byn5a', NULL, 'pending', NULL, '2021-06-06 15:40:16', '2021-06-06 15:40:16', 0),
(1228, 'fknzihPW', 'mDZcifuTxtMAYBpy', 'end_user', '7550772614', 'bhon1021@aol.com', '$2y$10$Sz7pDFTlYo7YCWmA4EjsmOBtfvYH20gbt1YXyfBja78IRnGs7G6oO', NULL, 'pending', NULL, '2021-06-06 18:18:47', '2021-06-06 18:18:47', 0),
(1229, 'viGakzVfSF', 'nqzoAFQPIlg', 'end_user', '2341790557', 'danaandhank@yahoo.com', '$2y$10$ZXR1ZJ9otTCOL7CQCvoVbe8MM36kMcCbLwmvvncvrkp9Fl1oddIVC', NULL, 'pending', NULL, '2021-06-07 04:04:18', '2021-06-07 04:04:18', 0),
(1230, 'BWJvcCSKU', 'NUAIlZovBbCKD', 'end_user', '7270496008', 'jmb3439@aol.com', '$2y$10$3dbJSN4yyk4Xo1W.2ZSma.XY9ewNwVvxKgHR9dXPi3fbUPzOei1eK', NULL, 'pending', NULL, '2021-06-07 08:08:16', '2021-06-07 08:08:16', 0),
(1231, 'Zabiullah', 'Nabiyar', 'driver', '004917662337521', 'zabi.nabiyar@gmail.com', '$2y$10$Txaqlqoq1qztb2HafSkbb.pSojE01V9IEKtSIMcNNpz0cfS3O5VnK', NULL, 'approved', NULL, '2021-06-07 10:25:31', '2021-06-15 07:43:49', 0),
(1232, 'kTlhysJpMawnDV', 'eNrglUfTL', 'end_user', '8553443003', 'linnetvilatvdx@yahoo.com', '$2y$10$0B71XztXBD48c1pYKpDdSOGjafFPnB96FBHyt/zUY4LKIzetzm4n.', NULL, 'pending', NULL, '2021-06-07 19:02:13', '2021-06-07 19:02:13', 0),
(1233, 'BRtbNkPDZXxLCsfv', 'JneUlfVArby', 'end_user', '2198326028', 'gaila7ha2ho@yahoo.com', '$2y$10$UP9ZgQl6TyI7FMKkzl34Z.CZkRINuwmlYmYGQEAc53wNyWXBf419u', NULL, 'pending', NULL, '2021-06-09 18:48:13', '2021-06-09 18:48:13', 0),
(1234, 'TleqHXgxdoyZKfk', 'bcmePEFBOirTGfzW', 'end_user', '5551520011', 'paulford168@gmail.com', '$2y$10$gm3.ptzenPBXL4TMD0Al8eOexZCVGgWq4gY/I4o5ooxf9/OJVguNm', NULL, 'pending', NULL, '2021-06-09 20:59:37', '2021-06-09 20:59:37', 0),
(1235, 'cUEZDBYlmVQ', 'wvqdQlazRcSNuW', 'end_user', '3545643635', 'norriserholmaen@yahoo.com', '$2y$10$NCyvVDWqEWxPKjDkNJ.pJO.rhZkTwBrUOd37xvt76XhQ.j3ML9nTa', NULL, 'pending', NULL, '2021-06-10 10:35:43', '2021-06-10 10:35:43', 0),
(1236, 'tPuWxRHOCsfymkTz', 'VqofUpZKz', 'end_user', '5807171134', 'nor5pregino@yahoo.com', '$2y$10$XQY3VhhYUCy9ZRDnet7gMuOA0QLyHxy48Xs5YjfUCcmYyC2bFZurO', NULL, 'pending', NULL, '2021-06-11 06:38:54', '2021-06-11 06:38:54', 0),
(1237, 'yUObTGopfVK', 'GhsqSQic', 'end_user', '3410964436', 'jeanelleutigp@yahoo.com', '$2y$10$U90HSbhoShbol2guzisLwuO3hwikyBvxSqElMqzDKrqsD4XLnku2a', NULL, 'pending', NULL, '2021-06-13 10:05:54', '2021-06-13 10:05:54', 0),
(1238, 'fAnohsTeEaGWzLxw', 'SnKpByvPkCXOib', 'end_user', '2143320747', 'bevswa08@yahoo.com', '$2y$10$orQww9rt5GhUNPHhtR6Dr.qeBgAUqXSTpXmTmszMO47eXlGniTIRC', NULL, 'pending', NULL, '2021-06-14 07:30:32', '2021-06-14 07:30:32', 0),
(1239, 'VwDMPjrckKyS', 'DHdRYOVXgLSv', 'end_user', '7578440768', 'bre3itoki@yahoo.com', '$2y$10$sk.2InH.iVFHeYSIWJdK1u0s4lXffwnGw1MVZQdL7FLxq4n/9UjGi', NULL, 'pending', NULL, '2021-06-14 11:09:18', '2021-06-14 11:09:18', 0),
(1240, 'hhh', 'nnmnmnnm', 'partner', '12345678', 'hjhjjh@gmail.com', '$2y$10$DbhbqmaUsLozzrAjv5W7B.rIn8h.DvxoSins4lNhLbpH6pfbu.DFi', NULL, 'pending', NULL, '2021-06-15 11:50:23', '2021-06-15 11:50:23', 0),
(1241, 'mithun', 'sharma', 'end_user', '9041533526', 'mithunbhardwaj84@gmail.com', '$2y$10$fXJ.V6jo1C7lMMja1.AJJ.yTXQQjxv6kOI6bwDfGwI7B1M.HV8awO', NULL, 'pending', 'CNJbeWSoP2bC5oefY9OyCOzT7N60iBQ2pmA0LjjtNmXvT45zgdxuMP2qx6QF', '2021-06-15 14:51:22', '2021-06-15 14:51:22', 0),
(1242, 'Test', 'Test', 'end_user', '123456789', 'info@qabby.de', '$2y$10$MJip3K33mziBDcrRStQpLe/6bLu9vVKbGEG8GqjJHCwiXf8rX8Pbu', NULL, 'pending', '3MB1fka0ofQynqUAtcuqVdOa9WaS3pFxod3Skod5icmdrXhUGpg6q6tDY15I', '2021-06-16 12:12:05', '2021-06-16 12:15:11', 1),
(1243, 'DZacSbEkC', 'UpJSIYdLrH', 'end_user', '4163949174', 'catheryno9f@yahoo.com', '$2y$10$1uoW9xZE4zIxJNrUJSJZZOlaD50DmPqgLAvjnXej5HGrG4XUZ7pKi', NULL, 'pending', NULL, '2021-06-16 21:46:19', '2021-06-16 21:46:19', 0),
(1244, 'UDCSPKpqWfYF', 'LomPDWbvdgeE', 'end_user', '7603987812', 'melbasoqix@yahoo.com', '$2y$10$FRaYDfAQjREpXWYeAipSMOIvPlQ/esIiiJyd68hQIqoRbNXK.Wnha', NULL, 'pending', NULL, '2021-06-17 10:46:46', '2021-06-17 10:46:46', 0),
(1245, 'PvRgkUpnY', 'NlVHwdTYbxC', 'end_user', '6246955105', 'dedragi3gkq@yahoo.com', '$2y$10$38R6DPRnPVea1AS4Rp1NEuljVHklOxShDRO2vxYpGfRBvuZV7hPDq', NULL, 'pending', NULL, '2021-06-17 13:49:20', '2021-06-17 13:49:20', 0),
(1246, 'EJVHtYbwRGB', 'ESiAlFIGHtr', 'end_user', '9666446012', 'mflaxje@yahoo.com', '$2y$10$KHbllA4yzu1APV4CgZcIeOrcGEJpYBocEzfSfCaX1v3Z3L/6WyYXm', NULL, 'pending', NULL, '2021-06-17 20:36:30', '2021-06-17 20:36:30', 0),
(1247, 'WuhNJUbSnk', 'TMSJlkoBezFNx', 'end_user', '5456992951', 'shaunagh8y@yahoo.com', '$2y$10$q4XfKARpuFsKen0TKA7MIePGRGApmjFJOVI1zWpCiGmgQlkVMfdUe', NULL, 'pending', NULL, '2021-06-18 03:40:37', '2021-06-18 03:40:37', 0),
(1248, 'YQgHJqBwFR', 'MTdWUarzhyj', 'end_user', '2273926627', 'tawnee8zpns@yahoo.com', '$2y$10$5foshde5miLAfguwP8BLReC41/pQ4zpLm2T/YNfuInQD8/tB2hvpa', NULL, 'pending', NULL, '2021-06-20 00:01:57', '2021-06-20 00:01:57', 0),
(1249, 'usaid bilal', 'yousufi', 'end_user', '+966568190192', 'bilal.yousufi96@gmail.com', '$2y$10$dd0bmONMbBgZaHVB/xijlOjeDBvr9EcDOak402xEStw1rrTgGNJNa', NULL, 'pending', NULL, '2021-06-20 12:38:35', '2021-06-20 12:39:40', 1),
(1250, 'UbuJOSmQjLBiof', 'JxLgjZcQ', 'end_user', '6765652580', 'blair8kvhanson@yahoo.com', '$2y$10$Z5drWp6TmVxcZBmEt728KuDyKtIeBwpbTFJ8T5Cq35VJ1eZ.HGXr2', NULL, 'pending', NULL, '2021-06-21 06:37:04', '2021-06-21 06:37:04', 0),
(1251, 'Hamza', 'Alam', 'end_user', '03359853140', 'alamhamza18@gmail.com', '$2y$10$m/x8cRVTMVfoq0j6637g0.HAOAYf06g/mPeoZvIfzkPo5.q8Jp7Xa', NULL, 'pending', 'BXLwl8g1b6d40ij7SFjR05qZLUWRJlJ3Egizt6vagUVsEjdDY1Vl5BEZpBkD', '2021-06-22 03:14:34', '2021-06-22 03:15:26', 1),
(1252, 'qSZFenxLyYU', 'wbzKpJrGoHDnlhxI', 'end_user', '9529859191', 'jaylinhuot585@yahoo.com', '$2y$10$.04FMebfixzwNjQ4xMK0w.7/4K9h0pFGJC2fpSO2EK66kxEKhHYjO', NULL, 'pending', NULL, '2021-06-22 13:03:23', '2021-06-22 13:03:23', 0),
(1253, 'DQWVembuCBpGAT', 'SQfnFPae', 'end_user', '6827785019', 'pricillapu2s@yahoo.com', '$2y$10$j4IvYOTDPaxVwNI2lOUrhezDDzeHOPBDvvOc4zyD2bA0VGLdE77DK', NULL, 'pending', NULL, '2021-06-22 17:24:02', '2021-06-22 17:24:02', 0),
(1254, 'eYEfdAUcV', 'yoPxcDVrAC', 'end_user', '7986767236', 'gayelordschdv@yahoo.com', '$2y$10$eCWH9uvSitYTp9HXFndnYeqmoT7n5h2xwQ553oiEprZBMU.NlFSfa', NULL, 'pending', NULL, '2021-06-23 02:41:19', '2021-06-23 02:41:19', 0),
(1257, 'qSFjXNlLMG', 'dpVkWFoDGbnK', 'end_user', '6018390592', 'marvellaffrg@yahoo.com', '$2y$10$iGVaTMVYGzffls22Heuz/uUCAPmwWnpTDPm19iUKkVIS2kMnOLIh6', NULL, 'pending', NULL, '2021-06-23 06:29:42', '2021-06-23 06:29:42', 0),
(1258, 'Dagmar', 'Orths', 'end_user', '0049-173-1850892', 'dagmar.orths@kfw.de', '$2y$10$FJjdTvNEIZ8Rg2yimNljquN/cNkY/EPTbubQoZ1pnLOj7IT4.O5aW', NULL, 'pending', NULL, '2021-06-23 07:05:17', '2021-06-23 07:05:37', 1),
(1259, 'chGiwsbBYygPu', 'FWLMJkTZfhbqznvs', 'end_user', '8971828722', 'shylalindell6@gmail.com', '$2y$10$o.TuSjsI36diPLtsfCRGkOEKl63eRNou.JVbmhmzTpgFlCKYotTfO', NULL, 'pending', NULL, '2021-06-26 20:27:29', '2021-06-26 20:27:29', 0),
(1261, 'cBvzrMDKpmT', 'dyUwFQCHmJ', 'end_user', '4733221571', 'raguel_barnesbaines@yahoo.com', '$2y$10$rEQ6m6YuUp7o3aBPXL69veNltltfWrpIwd.ruPK2IrJAvkUl9URfq', NULL, 'pending', NULL, '2021-06-28 12:00:39', '2021-06-28 12:00:39', 0),
(1263, 'Gökhan', 'Cirag', 'end_user', '01773529498', 'goekhan.cirag@gmail.com', '$2y$10$6cei2yNB11jXGTDE5yG3I.w1Yx2TwF.5Ij5wrYtQYEFCbW9PM2n1q', NULL, 'pending', 'w5wR5W1GfqKR1FVFAEG0tCik3zJuM8Db195HHezs0PyuNIt1M8DLHO3rTgza', '2021-06-29 15:27:59', '2021-06-29 15:28:41', 1),
(1264, 'Areeb', 'Hasssan', 'end_user', '03245040502', 'areebhassan4343@gmail.co', '$2y$10$NC.TUZWcbSAEtkvzOEA3xulvnN1bemzO49uBGb2m.939f.L/BnljS', NULL, 'pending', 'aNuiWI8AFWl1HKJzsItidz4CCj6rAUBtDXq4y8nbjNkkrKzwa8GFDnZS8f6e', '2021-06-30 06:16:09', '2021-06-30 06:16:09', 0),
(1265, 'KbJptGrAZHeQN', 'ViZDCNvpTkHau', 'end_user', '7806294324', 'langstreth.kenya@yahoo.com', '$2y$10$TlL0Gj8c3YrW4gZIETQdGeYF0302PullDNBMbqGy2xLhDBt.XPTc.', NULL, 'pending', NULL, '2021-06-30 07:30:06', '2021-06-30 07:30:06', 0),
(1268, 'nMtSeDgq', 'kLaTRJjKboWX', 'end_user', '9256036802', 'doan_jana@yahoo.com', '$2y$10$auDNMHpveWIR7AgclLZ1fOLflTVy3mpn94S.R/GyzaaB.38aIBk7.', NULL, 'pending', NULL, '2021-07-01 08:56:14', '2021-07-01 08:56:14', 0),
(1269, 'loZadAUKku', 'lTiueJkHmpOMSNxG', 'end_user', '4010562745', 'judie_mcgowan@yahoo.com', '$2y$10$GcMk0aWtr/0flg9DJNRQbe8MGQR96UywSCUdscqGHSw1HHM0v/Sda', NULL, 'pending', NULL, '2021-07-01 18:25:41', '2021-07-01 18:25:41', 0),
(1270, 'KuZkAMRiczBalwg', 'pFkVdwBJ', 'end_user', '6940134744', 'lyricb6kr@yahoo.com', '$2y$10$sMi9HxOYcyw/Ou3Dh1aNlu2CUH/oc23TBsCZ.2DILLpCdxm/Zq4.K', NULL, 'pending', NULL, '2021-07-01 20:47:46', '2021-07-01 20:47:46', 0),
(1274, 'Areeb', 'Hassan', 'end_user', '031457958422', 'areebhassan4343@gmail.com', '$2y$10$rY7H8rySFXctHYCIMl8me.H2GwmHf9RTgFYY6M7.WwTfDNpJu.9IG', NULL, 'pending', 'YX0RjE2ANHhft042mUd1glwHCxJescUc5pe6ZH7fgbDF3HkmdaTQzkdnLfRb', '2021-07-02 05:21:36', '2021-07-08 18:49:14', 1),
(1275, 'Noman', 'Shah', 'driver', '022851452211', 'khattakrizwan121@gmail.com', '$2y$10$FKsAa.oGjLeAZgtYaYqt5.CPWp7BoZSV7d8S1/n.Yxx19EIE.8EhC', NULL, 'pending', 'JY3rcy520bZ0LeVQNkLatrUiZDXgXJ12Qrh2z8fqD5VkKHT2VsJaWOBFsYDq', '2021-07-02 05:28:34', '2021-07-02 05:32:16', 1),
(1276, 'Billa', 'ahmed', 'end_user', '113265623163113', 'officalgamecenter@gmail.com', '$2y$10$fLnV/83VV6KjpFJ76ZODfORoxZMDpxfwNj7VNwbHEEYMS89/fSTPi', NULL, 'pending', '13BltnCsURry9AUHpDoh1ADIeFfFS5xiVFi4Q6NKFgrLc8g3JJfisSXQSQaB', '2021-07-02 05:38:56', '2021-07-02 05:47:31', 1),
(1277, 'kashif', 'Mehmood', 'partner', '45645464113131331', 'eyehacker.143@gmail.com', '$2y$10$RQL/nzLLGYh9CBCyDfJht.6.pEsIq7mF6E5cVLtRbapeofxRAcif2', NULL, 'pending', 'JmybnJQtNK3yRXyfhct6x4My5HlX2NtAOVystGjelHkYAXNIrYMbFP7ls3Sm', '2021-07-02 05:50:35', '2021-07-07 04:23:38', 1),
(1278, 'oWKwBqngAuLacjv', 'IEkgixazGfWjcMy', 'end_user', '3257250422', 'cara7ilah@yahoo.com', '$2y$10$VCSZb9HpxNn2RLgbyp1nueK3A.7y9h0cbfHDsaR84PX9.e3KzkN4W', NULL, 'pending', NULL, '2021-07-02 08:09:15', '2021-07-02 08:09:15', 0),
(1279, 'rZLmENkx', 'pzMrcihZ', 'end_user', '5923020478', 'alishian4zht@yahoo.com', '$2y$10$gegiipve5O9h9VWCbtKNfOpcDoqCgEu6TTuVaKtw0aR/L4Jd.f.Fe', NULL, 'pending', NULL, '2021-07-02 08:56:17', '2021-07-02 08:56:17', 0),
(1280, 'wAyUhTCmSXp', 'jwueaxMQyfnW', 'end_user', '7452186584', 'janefarrish@yahoo.com', '$2y$10$oSbIGyP5kR1XPoDCqMGy3u512WUgl73hhU0yl6iOV6JHqo/YEyZ4y', NULL, 'pending', NULL, '2021-07-03 21:38:54', '2021-07-03 21:38:54', 0),
(1281, 'hDXjTqlzLC', 'zdZeRBNkUuoC', 'end_user', '4687059718', 'sivell.valentina@yahoo.com', '$2y$10$n4XU7SrLHbEiGwFdOJq4N.1/vWysL.kh6OAxHpxapzkaNYo1cxsba', NULL, 'pending', NULL, '2021-07-03 22:26:34', '2021-07-03 22:26:34', 0),
(1282, 'LtmoHWKpnMsvfdiP', 'zTchrHiGPUk', 'end_user', '6321827913', 'hilma_mcwilliam@yahoo.com', '$2y$10$yvOGz3nEQryzY.j1Dgt0weRAfsCSdJ7sfD4wYCMj9Af6/9Xex1bou', NULL, 'pending', NULL, '2021-07-04 01:44:33', '2021-07-04 01:44:33', 0),
(1283, 'nKmFLVdqzBoD', 'kptRrUsMJvIQWbuO', 'end_user', '9855430296', 'joette.waltham@yahoo.com', '$2y$10$5NSj2Ihpneevu4/.crhC8uQvzLj11lv7sq4Ti.qhSMeE4J9MpuONS', NULL, 'pending', NULL, '2021-07-04 14:51:42', '2021-07-04 14:51:42', 0),
(1284, 'ALwHyzqREl', 'xJHAKVMouSs', 'end_user', '7691238417', 'minervapayne418@gmail.com', '$2y$10$SmWCmcaYQ2/taj9bEG1FL.SdZwCkn5mbdKDEYGmLRs6J0JY/QO29W', NULL, 'pending', NULL, '2021-07-04 18:46:54', '2021-07-04 18:46:54', 0),
(1285, 'gLhMPyJFzaIUcYKW', 'WsmuMLiRGUDxZ', 'end_user', '3260141244', 'pattyisaura@yahoo.com', '$2y$10$27i6gQQqdD1TYtFPDBIMO.iNLRRz/1StkSvv0tzAazEn2F18YJyDy', NULL, 'pending', NULL, '2021-07-04 21:39:31', '2021-07-04 21:39:31', 0),
(1286, 'GewmKgxaLBId', 'mjTFklDVa', 'end_user', '5001989765', 'floria.beckner@yahoo.com', '$2y$10$hv1XDlRlllko9KHrsaY2du.bgP23Rww7ic9XvXq2kmUqkAUe1IGXK', NULL, 'pending', NULL, '2021-07-05 00:19:37', '2021-07-05 00:19:37', 0),
(1287, 'lwyfijFLTpDbU', 'UWrcbwCNEO', 'end_user', '3559919078', 'holzkampkarol@yahoo.com', '$2y$10$Vi4Ktvm9a6hv7XeirTV/nOlllSu77ErVnQqv/UvwV6mxTyoZehmga', NULL, 'pending', NULL, '2021-07-05 14:26:21', '2021-07-05 14:26:21', 0),
(1288, 'kafZmGzAViM', 'PvdhLQCsuT', 'end_user', '7165668206', 'rosenanunn@yahoo.com', '$2y$10$C0Q2AAdZod8eB4qkxl4g4.2LnvKvrkqtGmmVJwfhAgxDGBpXprpUa', NULL, 'pending', NULL, '2021-07-06 01:02:23', '2021-07-06 01:02:23', 0),
(1290, 'lkdHQsAMc', 'AgOXKRsSkJ', 'end_user', '4253767012', 'sherwin.northrop@yahoo.com', '$2y$10$pODiQ14YyUtu/duUTsF1IOKrFTln56lOI5MIVyH7g9MoRPB1RgmPa', NULL, 'pending', NULL, '2021-07-06 05:35:45', '2021-07-06 05:35:45', 0),
(1291, 'Test1', 'Test1', 'end_user', '+4917622777045', 'info@morays-group.com', '$2y$10$3I9kVFI9NTrc/yDgnQBA6eDZyh1gZVBgngpbjxrho6iEpM7eGBCry', NULL, 'pending', '7acmRPdsab6sO80ftzEcTh5MDFvbvfXpulXcn3ALuKUpARvYdSwhq98S9TAo', '2021-07-06 10:06:39', '2021-07-06 10:08:49', 1),
(1292, 'Test2', 'Test2', 'end_user', '+4917622777045', 'info@moray-group.com', '$2y$10$jtMS4VrCPddMiWjjP.QICO/CtKWvk8JOcERcy/8/KBW.TlZKHbF92', NULL, 'pending', NULL, '2021-07-06 10:23:21', '2021-07-06 10:23:46', 1),
(1293, 'zFJfsZhMYXPc', 'xspgSIWTnQh', 'end_user', '3211143476', 'antin.egertonwarburton@yahoo.com', '$2y$10$WijK51OxYD/eS3wj3MhkSOoY9rW8FJCmP2SqF7rr8QU24wP.xy1na', NULL, 'pending', NULL, '2021-07-06 11:56:37', '2021-07-06 11:56:37', 0),
(1294, 'vjusleHnS', 'hQtolkIAPeZmB', 'end_user', '4198095505', 'liliana_dimma@yahoo.com', '$2y$10$Wox1ukFUlyAE7SGy68KHKeeAPsxbfKiOCS6k/GqUnCcOwqcIkXrpC', NULL, 'pending', NULL, '2021-07-06 20:31:59', '2021-07-06 20:31:59', 0),
(1295, 'Ashely', 'Vincent', 'end_user', '+1 (466) 915-4554', 'bakuxele@mailinator.com', '$2y$10$N1we.2VXTfVyGNVP4A6b7Ok1NnHkSwKGxE20055d5..0RkzXTOSHi', NULL, 'pending', 'YypuDs832YmWBssadOGrNhIkzJXNQVtlk5AHmvibeoqCgaPhpC5RYrMWkunD', '2021-07-07 03:29:48', '2021-07-07 03:29:48', 0),
(1296, 'saifi', 'afridi', 'end_user', '03336506505', 'saif@gmail.com', '$2y$10$mr5hJvxXKPEYi1qApEPEX.tt.nW6fS/vJCeYvKihSJy06HG.HjOpm', NULL, 'pending', NULL, '2021-07-07 05:47:18', '2021-07-07 05:47:18', 0),
(1302, 'lwxDrLCjyTBMFzW', 'PnqRLGgO', 'end_user', '8504226266', 'breweredouard@yahoo.com', '$2y$10$4NQsx4YnqnckSv1b9b7zlOTJO79rziQ0ce/oFwWpbuxmlOaqOkkq2', NULL, 'pending', NULL, '2021-07-07 10:29:10', '2021-07-07 10:29:10', 0),
(1303, 'ZgOvPVRlpcd', 'UrvwQklTDIzJV', 'end_user', '6959129897', 'grover_warner@yahoo.com', '$2y$10$JsKKrrVIjsdD3cXrutmnS.vrH0PfAqSPhqjiuFnlTgZNKeGu8ugk2', NULL, 'pending', NULL, '2021-07-07 11:08:17', '2021-07-07 11:08:17', 0),
(1304, 'SoJwcGfHdUyeT', 'hNlCqjPkY', 'end_user', '5495026075', 'fedderywendolyn@yahoo.com', '$2y$10$R6GLYt2d8h5mz9X2MSNpyutZbkcVb7i1yYGDz8dvC3pZxMnERogtu', NULL, 'pending', NULL, '2021-07-07 11:43:40', '2021-07-07 11:43:40', 0),
(1305, 'KnZUpCmW', 'vlMqEZaoe', 'end_user', '2411003132', 'pringlorena@yahoo.com', '$2y$10$s9VjFqUJKRa0AMgjfPAEw.UU31amoqpClA8KtjJdRkjCA7w5iUY5a', NULL, 'pending', NULL, '2021-07-07 16:04:56', '2021-07-07 16:04:56', 0),
(1306, 'loVqhkSyLZi', 'mbtdDjCOekgrlKx', 'end_user', '7036609261', 'carrick.germain@yahoo.com', '$2y$10$rJoqyl8dwWDj6f.yYxlWHubFybkzOcvo3FmACq.ty9F26j2jrW25G', NULL, 'pending', NULL, '2021-07-08 00:55:51', '2021-07-08 00:55:51', 0),
(1307, 'Mic', 'Alaka', 'end_user', '3502504007', 'webtimecreative@gmail.com', '$2y$10$rjZBFH0JgakxuZ0qqSFUuuy3tMnKSRaqpbE1G..igdVxLJWQkA5UW', NULL, 'pending', '9EghKHeqDoxjasslw2qXPv0HAl40YLDzrK8HU6MwBSg9PFDpjX7mTMSfiKJI', '2021-07-08 03:30:22', '2021-07-08 03:30:22', 0),
(1309, 'frUIlwnToERvZWha', 'SfmUyWpb', 'end_user', '7817095438', 'tisdallangeline@yahoo.com', '$2y$10$4exzEz6OnwEa/s30zTv0eO/F.HM.XxNBHAIxaWDd/dCyL80xPVWam', NULL, 'pending', NULL, '2021-07-08 04:11:14', '2021-07-08 04:11:14', 0),
(1311, 'Colt', 'Reed', 'end_user', '+1 (884) 587-3998', 'jumuga@mailinator.com', '$2y$10$CCivCnMxhDSMm/Y343cbvur40Stfh8cuJP6F1W84XUg5azQopOkL.', NULL, 'pending', NULL, '2021-07-08 18:31:10', '2021-07-08 18:31:10', 0),
(1312, 'Nelle', 'Perez', 'end_user', '+1 (742) 489-8241', 'fowew@mailinator.com', '$2y$10$reMgzcNzjKH/5b6KxA.FheRvj6D2pBOhzdWTsCucIvUq7I18kPXuC', NULL, 'pending', 'blvqdMIFYlkDubaFURyFxL1MXG4ZiH60Xb6mfUzkLExEUxpIyWOLnZo6qmt3', '2021-07-08 18:32:26', '2021-07-08 18:32:26', 0),
(1313, 'Emily', 'Mathis', 'end_user', '+1 (317) 546-5708', 'jatiwo@mailinator.com', '$2y$10$0CT3BErcUgdvF6Lxrqwy2uKdzwkiEiMulLd9wNCBWvzFJQL/Ajnxe', NULL, 'pending', NULL, '2021-07-08 18:39:08', '2021-07-08 18:39:08', 0),
(1314, 'kQXecGIYajwru', 'KnYkNdToZux', 'end_user', '6939235266', 'hincksshanika@yahoo.com', '$2y$10$fV0wNQ8qX50UiAH3qGGoVutC9QaSdVyxpscc1l23ni7/lPGTyN3/K', NULL, 'pending', NULL, '2021-07-08 19:00:47', '2021-07-08 19:00:47', 0),
(1315, 'deQhaxKJU', 'optHWwKM', 'end_user', '7775734463', 'suzie_mcclutcheon@yahoo.com', '$2y$10$91wEiX0oCEiDcgN8fhdGj.y1fnv/PFC6uHlJ/1Hmqr8T0pB96r8me', NULL, 'pending', NULL, '2021-07-08 20:59:37', '2021-07-08 20:59:37', 0),
(1333, 'McxKwWbQmedoIaP', 'JEjUBZsygvHhRF', 'end_user', '7778318378', 'thompson.sheff@yahoo.com', '$2y$10$wtES1uw3NiZ.kxmIC1sej.0JGLYAJUgAy9RfAsvkKvftOIrMhyhXG', NULL, 'pending', NULL, '2021-07-09 16:33:32', '2021-07-09 16:33:32', 0),
(1334, 'qoVmhDHvMtu', 'VufySapOPidG', 'end_user', '2595555515', 'ronnystebbings@yahoo.com', '$2y$10$oi4zj05OxTzNqsBqEHkZlOOv54yBN0R2KHevF8ghZ4QnFw240o606', NULL, 'pending', NULL, '2021-07-10 08:03:54', '2021-07-10 08:03:54', 0),
(1335, 'yUwFXsGzI', 'HqYpOznTyFg', 'end_user', '6303989251', 'bonnington.derrick@yahoo.com', '$2y$10$/dhrWMx41voveXbwnVffQ.1T7/elsTIfIomovLuMwqjfg01OTm2xa', NULL, 'pending', NULL, '2021-07-10 11:53:07', '2021-07-10 11:53:07', 0),
(1336, 'nbpwfONmDz', 'iWNYzbJprV', 'end_user', '2809911399', 'gordon.catharina@yahoo.com', '$2y$10$rwotMfeVcbg9P0znr//25O9z9gUYUxO7jCHCp46yuQnON6.IiFIzO', NULL, 'pending', NULL, '2021-07-10 18:14:54', '2021-07-10 18:14:54', 0),
(1337, 'zgaMOvtURcDrPkpx', 'hucklZqjH', 'end_user', '3936874227', 'emlyn.heck@yahoo.com', '$2y$10$MlvxcRsurnzp9Qvy1FXV9eb1ooBHndNcHiRGSUFMMUeVN./7SI4VO', NULL, 'pending', NULL, '2021-07-11 00:31:16', '2021-07-11 00:31:16', 0),
(1338, 'NSMJTzvZy', 'hwLygaSVAdjs', 'end_user', '6897881470', 'haskel_gatewood@yahoo.com', '$2y$10$mwce9bCIrZ8ZzPBiwHnWYuReu7sZcqmN3uNh7Lw/mSby5hF0MDeFW', NULL, 'pending', NULL, '2021-07-11 00:49:24', '2021-07-11 00:49:24', 0),
(1339, 'gsiyrWqzfJjZvQ', 'xKIXhQRkzVWM', 'end_user', '2287942089', 'granny_farmer@yahoo.com', '$2y$10$hbJIPrLYcbCmt8iWsTcLu./Y4t8FjPN1Ob6VeoFb8w7HmHGoM.YlS', NULL, 'pending', NULL, '2021-07-11 01:16:28', '2021-07-11 01:16:28', 0),
(1340, 'wqyGMSQa', 'SMuXlYLZj', 'end_user', '8426720759', 'natalya.karaulina93@gmail.com', '$2y$10$R91p7gkcou0cELwYHK2S5uOTDOgjiuWRpoegJf/WR88zeBzouIQfG', NULL, 'pending', NULL, '2021-07-11 09:36:31', '2021-07-11 09:36:31', 0),
(1341, 'MSWnDbJxE', 'SmDlqzXMRyN', 'end_user', '2638047200', 'linzey.jule@yahoo.com', '$2y$10$hRgD/gzyYFFN7uZ75ocVgOS2S0y9/ssuiq6lXHpBMiI5GVNqzZqMq', NULL, 'pending', NULL, '2021-07-11 15:24:22', '2021-07-11 15:24:22', 0),
(1344, 'naqvGIWONlZxPmzB', 'hCkfzZtgcS', 'end_user', '7792346523', 'takiyah101@mail.com', '$2y$10$HoLFRhs6Z6O9luo15A89x.QSF6rRZ0USp/lhS10onYTdOZN23Fopm', NULL, 'pending', NULL, '2021-07-12 09:07:40', '2021-07-12 09:07:40', 0),
(1345, 'Muhammad', 'Rizwan', 'end_user', '03145776427', 'rizwikhattak123321@gmail.com', '$2y$10$GgB/E7b3q56mXHDRT4DXseyAnNv2UuFIQ9ty6qjSN665jNnjtkFsS', NULL, 'pending', 'IYR1ai21GpFSMijfc6mLHMf3LWs25Xr4HcFpS74VgIEiv8hmA3Gnj92MXuRb', '2021-07-12 09:25:36', '2021-07-12 09:26:39', 1),
(1346, 'Oprah', 'Good', 'end_user', '+1 (165) 671-5309', 'masec@mailinator.com', '$2y$10$chYx4WCE2ALDbfpaDNqBM.2yIsgzgtdBNlqytlScCwh1x4oHLSr4m', NULL, 'pending', NULL, '2021-07-12 09:42:37', '2021-07-12 09:42:37', 0),
(1347, 'muhammad', 'rizwan', 'end_user', '0154521441', 'rizwikhattak268@gmail.com', '$2y$10$qP5FelFKq9VEBHmGhEU9He9VhtPIRV1CZ91Gs0D8qYo/GDrKSnzii', NULL, 'pending', '3oTkqYdsFDaY7jkI4uCXGSqVJKPPdOBAmGsVQYT7xXO6Ka6ZmtfZmwo4rPbH', '2021-07-12 10:59:50', '2021-07-12 11:00:38', 1),
(1348, 'OPxoAFtg', 'mKaqdLsEU', 'end_user', '2126346649', 'curtainwinny@yahoo.com', '$2y$10$M3f9vddG9NugfbVDQOxG/et55RIRcNp8lPN6DZ24Ol2wp6K3f1mEq', NULL, 'pending', NULL, '2021-07-12 21:56:25', '2021-07-12 21:56:25', 0),
(1353, 'Ali', 'Hamza', 'end_user', '122412356236', 'ali@gmail.com', '$2y$10$Yngt0C6bNBwYta8ccKQlzObA6bqGf42NzLVYumWuNSr26ofgxeFcW', NULL, 'pending', NULL, '2021-07-13 14:44:01', '2021-07-13 14:44:01', 0),
(1354, 'HqyzhMFO', 'IlVJrzxNEcPH', 'end_user', '6411991946', 'synthia0367@gmail.com', '$2y$10$/QHYCy4evmYW4jOMNMiueuY444EdumTYEXuuiRk4Q3ONE4A31r5gi', NULL, 'pending', NULL, '2021-07-13 16:27:10', '2021-07-13 16:27:10', 0),
(1355, 'NukxMGPCrEz', 'QrUelWkSTNJcvX', 'end_user', '2792580560', 'blynch39@comcast.net', '$2y$10$/aVltTv8wNvhPphVwOdPou4wdKZqKNUsn3D7HMUdnFGuw0pjVYK6i', NULL, 'pending', NULL, '2021-07-13 20:39:15', '2021-07-13 20:39:15', 0),
(1356, 'zMFpjbvE', 'GSnNAeitLzCu', 'end_user', '4215671393', 'jdizon1@cox.net', '$2y$10$Nk0zZpmdhFXkWZJdjlNq6u9x79DY/Zz4LehOvTeMPttMWKIx2B1aq', NULL, 'pending', NULL, '2021-07-13 21:26:16', '2021-07-13 21:26:16', 0),
(1357, 'sBYEaWCfXQFncKxD', 'tMdOIuRWfKAHmw', 'end_user', '8931229461', 'randalltaplin@gmail.com', '$2y$10$Z8G9RGqdk.ecHGzKZxTUq.ivwmp1tpaPL7SrauGv/.Z0F/zfOPKpK', NULL, 'pending', NULL, '2021-07-13 23:30:26', '2021-07-13 23:30:26', 0),
(1358, 'nBqozJgvjIyft', 'dTGYrkDRaiO', 'end_user', '6596578685', 'bridggi5@gmail.com', '$2y$10$Gq6k5dWJIgTeTxCYZJw3He1uw24yxxPCc.bBUMcZ0.lcG8njtoqXK', NULL, 'pending', NULL, '2021-07-13 23:43:41', '2021-07-13 23:43:41', 0),
(1374, 'OFsQEjMSnIqtha', 'HEFZTAYjisMRyQCB', 'end_user', '8682220744', 'rodgill8@gmail.com', '$2y$10$Ar22nXqXZx25N9GMDUzfxeiUWYzeCkIMUKJaT85HvHCQt/Qhhy3HG', NULL, 'pending', NULL, '2021-07-14 08:53:16', '2021-07-14 08:53:16', 0),
(1377, 'obaid', 'afridi', 'end_user', '03336506505', 'obaidkust@gmail.com', '$2y$10$1chBhxhanm6NBEeClg3CaO8MRbGzmBZstsJio4QzF.nsilpzRsbaC', NULL, 'pending', 'Y6eaFKecKVsrmkosrWEM4kHSOzZtMZ10b09A1jrhpSQ9zBqYJW7zNaxIcPoY', '2021-07-14 09:30:46', '2021-07-14 09:31:07', 1),
(1378, 'EYkDfFNIpjW', 'QrRPxNvgUbHsiEMS', 'end_user', '7011761725', 'walter@walterburkecatering.com', '$2y$10$r53JDU/7PijxRe0mbfIK5e2K9pt8e0ujocu7btZAMmfy1tntxXLri', NULL, 'pending', NULL, '2021-07-14 16:29:24', '2021-07-14 16:29:24', 0),
(1379, 'XYQkVIEhtNL', 'YQnRHaqfWOGBs', 'end_user', '2738380228', 'wbottoms0@gmail.com', '$2y$10$X2fnLWCQshCendtxKyr4DO5kHRKwVl760PKcEJRLUsIDuWa0K7nv2', NULL, 'pending', NULL, '2021-07-14 18:13:20', '2021-07-14 18:13:20', 0),
(1380, 'nrZwICOap', 'LbywejIECmXYP', 'end_user', '4253127764', 'sammy.bagdady@hotmail.com', '$2y$10$a8shwkRtPf8ec2fhf26nwOxBZRne.l1NyDwJ65NWpvvvOnB/0jOlq', NULL, 'pending', NULL, '2021-07-14 19:48:31', '2021-07-14 19:48:31', 0),
(1382, 'CpXsrvduHtOaUV', 'PIAVGtMfWv', 'end_user', '5988961929', 'thedeterminedgardener@gmail.com', '$2y$10$CxZBB3spUrtCEuwXyRpT6.fI3V.mUy4yw.GMHe9nrLUPpOxFzqnom', NULL, 'pending', NULL, '2021-07-15 14:27:14', '2021-07-15 14:27:14', 0),
(1383, 'HiSzascQpq', 'ZjFCDbfoipTNe', 'end_user', '3398542200', 'sparkocomputers@gmail.com', '$2y$10$b/OxCl4X5znt/FyaphyMSejRtODFQCSps.SMIyAl6pDGnYWZOZdni', NULL, 'pending', NULL, '2021-07-16 05:46:08', '2021-07-16 05:46:08', 0),
(1384, 'OAfzDsRPMpkCow', 'lmTwdugf', 'end_user', '6095539522', 'sayles.bryn@yahoo.com', '$2y$10$oEhKsOOZFh9pzszgAVE.aOUxhWLFNDDhWSUO13BaGbC7e5f6i6LLi', NULL, 'pending', NULL, '2021-07-16 11:25:30', '2021-07-16 11:25:30', 0),
(1385, 'pcLwEDzxZb', 'maiEInfUZTLhrJ', 'end_user', '6706334819', 'insaurralde.ap@gmail.com', '$2y$10$C1Ns9bj7t5ZLXBWdG8I8O.0/wgqNsoQiLrEyMymQza8b7.QXSofxC', NULL, 'pending', NULL, '2021-07-16 22:42:23', '2021-07-16 22:42:23', 0),
(1386, 'xlPHZqYC', 'ebkLWXMGmx', 'end_user', '4963274572', 'cz628174@gmail.com', '$2y$10$ePrAvDs3XY/B3z.PyefREuAN3a1DcaozAXb72EnkXLGn1rsxnh22e', NULL, 'pending', NULL, '2021-07-18 19:28:11', '2021-07-18 19:28:11', 0),
(1387, 'Muhammad', 'Rizwan', 'end_user', '031457764727', 'rizwan1@accrualgroup.com', '$2y$10$uC1N0S9faWKnHYLtFqaTdOhkqBQW6dJ5O0NNR29pLjmD.0/uTF6Oi', NULL, 'pending', '6LJfL44zD2cub2RENIZxW34ZPJuHrqcvDxfPsnVpfWOAe784U099cX5FiaBN', '2021-07-19 05:01:07', '2021-07-19 05:04:39', 1),
(1388, 'pzqJivjSewc', 'VSnhimNErltOMz', 'end_user', '8699745141', 'seraphinac3mwag@yahoo.com', '$2y$10$FomdUGXdSQwDWjOZTWP7Bejw0e96I3l2BkV5LbozgQnkAtQWhzRr6', NULL, 'pending', NULL, '2021-07-19 11:17:55', '2021-07-19 11:17:55', 0),
(1389, 'CovHtRLEWQdpxGM', 'iJIeTmzLvDGj', 'end_user', '4306725220', 'admin@belleroselaw.com', '$2y$10$dABK4nLkmtViQyOEl.a.0eNHwuDGqml3I45CNE9zU53QMvKbEnNzG', NULL, 'pending', NULL, '2021-07-19 13:39:38', '2021-07-19 13:39:38', 0),
(1390, 'WlKZFDAcvtNL', 'muyKcIjFtHiYRhW', 'end_user', '8471747970', 'ryalsc@duvalschools.org', '$2y$10$xQTdnv4n4fgmydU7AS0xSeSSF1Yf0SyQd5w1wBtYhTtJT8Oa9YHp6', NULL, 'pending', NULL, '2021-07-20 00:00:26', '2021-07-20 00:00:26', 0),
(1391, 'znYfJhgbDNej', 'JNZuqCajHGVOnmg', 'end_user', '6833056036', 'melernst34102@gmail.com', '$2y$10$CiBmhklBwJ3mnaSF90453eyOC.KIoEsuZ4H9t/QAkCbW5ASC9Jp9q', NULL, 'pending', NULL, '2021-07-20 13:58:37', '2021-07-20 13:58:37', 0),
(1392, 'OgZzuqeCvrR', 'holmirASJ', 'end_user', '6570792591', 'scottwiesenmd@hushmail.com', '$2y$10$k7/92.9jsDFy3vqli9BAj.O0uhIzT8.M0k1AaL3z0jDsWf8NuDImC', NULL, 'pending', NULL, '2021-07-20 14:58:58', '2021-07-20 14:58:58', 0),
(1393, 'arfAVUThmq', 'yFDlwdaWtoxHj', 'end_user', '8008459000', 'vanartsdalen.neils@yahoo.com', '$2y$10$HLfEg0dP7Mq009zBDoaZJuhTLUuoKsvqo7lFg5r7FdEVScMwftLBy', NULL, 'pending', NULL, '2021-07-20 15:09:14', '2021-07-20 15:09:14', 0),
(1394, 'SvItJRyUsHknwj', 'NxWEZPRlphVu', 'end_user', '6664549576', 'alissas5hilman@yahoo.com', '$2y$10$EzxX9SpeYFfPRAkrEfHbfeevcRbUU4gHvvvmbxxStBe1xfEDo8RxS', NULL, 'pending', NULL, '2021-07-20 15:23:51', '2021-07-20 15:23:51', 0),
(1395, 'fhjApPoHst', 'lzNUpyZmBvCY', 'end_user', '2816352766', 'jcastillo145.cc@gmail.com', '$2y$10$BH3PIAviF5bhHbA1AD6gwuSD5yhZofwg64hTI2BiLzpbob4KXD0Vq', NULL, 'pending', NULL, '2021-07-20 20:10:23', '2021-07-20 20:10:23', 0),
(1396, 'LnuFYCwWToBle', 'jzYqQEnwGdf', 'end_user', '4432249611', 'ibra.n.abassi@gmail.com', '$2y$10$q2E/IjGm5TKH/LLNvvT9S.BURQbc7rnThLI1lmEy3sWpEldQH.9qy', NULL, 'pending', NULL, '2021-07-21 01:26:46', '2021-07-21 01:26:46', 0),
(1397, 'EjzvynVugswUpbP', 'oKjeswSdNRUgFI', 'end_user', '4602967288', 'brian@themodgarage.net', '$2y$10$USmhxYQxTmO1V3x.aIzDh.XCiKazn2pLvUc/.mPYDYUYyT2B.ODdu', NULL, 'pending', NULL, '2021-07-21 09:32:31', '2021-07-21 09:32:31', 0),
(1398, 'ShAlqsCEz', 'SycIWHZLaNqjeb', 'end_user', '3756304902', 'ss72@comcast.net', '$2y$10$EXJwTer/FBTn.YeSvlsjPuctVmvJsaCGOymyzRvMwYMbhirgc3mS6', NULL, 'pending', NULL, '2021-07-21 17:18:16', '2021-07-21 17:18:16', 0),
(1399, 'JCwpItMUgTlSKVnu', 'gmUveVIQXTcz', 'end_user', '3009232669', 'carlosrincon3@gmail.com', '$2y$10$VV9/NshKMrGDGffcLZabmODLPxolLXqj9eukOxTVwKNeUOIsxZ6uG', NULL, 'pending', NULL, '2021-07-21 18:47:03', '2021-07-21 18:47:03', 0),
(1400, 'IdJmozlOnkKcPX', 'RymOirljqWQSkV', 'end_user', '3328776897', 'ramkissoon_o@hotmail.com', '$2y$10$22cqHh83mZIPP2brhy8m0eU2CpZXo2M15Pabje8Nax.w9J.C8f5y2', NULL, 'pending', NULL, '2021-07-22 05:10:20', '2021-07-22 05:10:20', 0),
(1401, 'LdmUazvprZQ', 'bJBrEhjkMX', 'end_user', '2966750592', 'vmartinez3698@gmail.com', '$2y$10$h91gIHOhrK8.tEzi9tOn4uFcZk2aAqjXIKLgsbJDFhTfZOxJ5bmaW', NULL, 'pending', NULL, '2021-07-22 17:05:11', '2021-07-22 17:05:11', 0),
(1402, 'qkKzsdgGYDFWem', 'MesVHxCgfavSOB', 'end_user', '8261351736', 'darren@catecorp.com', '$2y$10$xgskQllRoVYmDrI2GDsFjOuZN6UHteUsARj3mhrX2.SV6MDUfzr4G', NULL, 'pending', NULL, '2021-07-22 18:57:41', '2021-07-22 18:57:41', 0),
(1403, 'hjqUlOnMfgXkTBu', 'YjHfZePauVlDK', 'end_user', '6888837216', 'fchan@chaninsurance.com', '$2y$10$Ub/H20vL7bCHZDPFGJfGHOiibyyIBGVIjBBcyFDkV.qnlkToQhuIK', NULL, 'pending', NULL, '2021-07-22 21:13:46', '2021-07-22 21:13:46', 0),
(1404, 'FNersAqCYkjwHhQ', 'DWBREkGxIU', 'end_user', '5707044158', 'tmtmv1@comcast.net', '$2y$10$h0aIwY/p9UTtKF6am3Ahi.mZfP1IBQcyp/BUYOGA51FfwRYhiyzPO', NULL, 'pending', NULL, '2021-07-23 01:24:21', '2021-07-23 01:24:21', 0),
(1405, 'BlGnQfxsDgjUVerS', 'PrxuEeRY', 'end_user', '6203866063', 'mcfireprotection@gmail.com', '$2y$10$0T6NjEx//XFz5ezuWC27vOPp5x8I0EMCI2z6ZShPK.GZho5HxKuAS', NULL, 'pending', NULL, '2021-07-23 18:45:37', '2021-07-23 18:45:37', 0),
(1406, 'YyLAimRVTDnjS', 'AbdTPFDZjnCcL', 'end_user', '5679151011', 'waltb3@gmail.com', '$2y$10$qnWHCkxQ8x33zqtd/bMEHumOSQqqnAtJZjM0yLESY0AnxnDqXKprm', NULL, 'pending', NULL, '2021-07-23 18:47:43', '2021-07-23 18:47:43', 0),
(1407, 'dgiRCTSVIJmrWjH', 'JKWBcAzpsOTMCnq', 'end_user', '3893930480', 'karlo@focus5studios.com', '$2y$10$6J3totLcosv2h5wec7N5E.W3Mr5nOEr5boHUHjz/zQc/.J0kvWF0u', NULL, 'pending', NULL, '2021-07-24 05:05:16', '2021-07-24 05:05:16', 0),
(1408, 'MCNuKWQH', 'JsvQpCbfTESXq', 'end_user', '3617120449', 'lezley.pedley@yahoo.com', '$2y$10$i7vUkR0Zq3gjTTSGFRUnjOMvCZTA9HDV2iUkQZgZ0lqwtAHF0l1DG', NULL, 'pending', NULL, '2021-07-24 08:24:29', '2021-07-24 08:24:29', 0),
(1409, 'ncVgYIpMUrzFLol', 'ZXFVHxAChfku', 'end_user', '8213006648', 'warrenneary@gmail.com', '$2y$10$6Nn1vZp6to7vOz/a2aDrTOv1s4bb4.i5amPZAxLbF16p8JMcIY5a.', NULL, 'pending', NULL, '2021-07-24 20:53:55', '2021-07-24 20:53:55', 0),
(1410, 'saif', 'khan', 'end_user', '03336506505', 'saiffff@gmail.com', '$2y$10$ruEVQKObdJUKamZN6TP5iu4YhCI89YtNvyiKbWho7dFQ8phggRH1S', NULL, 'pending', NULL, '2021-07-27 04:46:18', '2021-07-27 04:46:18', 0),
(1411, 'Muhammad', 'Rizwan', 'end_user', '000000000', 'rizwan3@accrualgroup.com', '$2y$10$U0GUbV6hueioMbjvv90MTO9uo.TvG7Nx5TjdFAlSqa/dWSbPH43We', NULL, 'pending', NULL, '2021-07-27 06:56:51', '2021-07-27 06:56:51', 0),
(1412, 'Mic', 'Alaka', 'end_user', '3502504007', 'areeb.hassan@gmail.com', '$2y$10$hu9/H1IRrx0S/MqnDwl.sO1gA2zbqG0PUA2cu7UA9ERNf0X9TIHwO', NULL, 'pending', NULL, '2021-08-13 05:23:07', '2021-08-13 05:23:07', 0),
(1461, 'Felix', 'Tchenamboum', 'end_user', '015124011217', 'tchenamboumfelix@gmail.com', '$2y$10$wOwy/Fi5FEvV4vxaMu4mb.Ssj4O9Ho2jqmelCGOUbmAFatIGQdvBq', NULL, 'pending', NULL, '2021-09-18 08:26:41', '2021-09-18 08:26:41', 0),
(1462, 'Ruslan', 'Petrov', 'driver', '+4917627511656', 'ruslan.petrov23@yahoo.com', '$2y$10$3SPHxD7.zJYkbGKo5EDGd.ugW2xu8gWP/ejm6ghLuYQX7EDPyfc2W', NULL, 'pending', NULL, '2021-09-24 07:48:48', '2021-09-24 07:48:48', 0),
(1463, 'Khan Zad Said', 'Zubair', 'end_user', '004917661223853', 'zubairkhani1998@gmail.com', '$2y$10$eIGh6tkzlnK46wOfvLsvq.87mqkR.nJ9eLBzUmPx5uIHNsm/bFwxm', NULL, 'pending', NULL, '2021-09-27 14:21:38', '2021-09-27 14:21:38', 0),
(1464, 'Tommy', 'Drumm', 'end_user', '00353862423615', 'tdrumm@collen.com', '$2y$10$LsMh7Z.yM6LCkWNbCRutfuN3oAhfTt/dW.fzo8jrnaUW6e0xcrU1a', NULL, 'pending', NULL, '2021-10-01 10:18:10', '2021-10-01 10:18:10', 0),
(1471, 'Colette', 'Hooper', 'end_user', '+1 (966) 837-8062', 'basitawan.abdul@gmail.com', '$2y$10$h73mLPu/tuq.Df57EAHEReBodA7jhU0wYLTevtciqQiiqATIrxKyO', NULL, 'pending', 'hDa6jq9mvoGTmkNFJRUC3aflNX89Z9HCibW1p798B184XO3eZeU5jEj1pFQ1', '2021-10-06 10:12:41', '2021-10-07 03:06:10', 1),
(1472, 'Rebecca', 'Nolan', 'end_user', '+1 (304) 238-5949', 'abdul.basit@accrualgroup.com', '$2y$10$4rUOaHwPfboRqd3WbIkh.u01xFuON8xtd03dODiDK9IMOK9iqKULy', NULL, 'pending', NULL, '2021-10-06 10:43:51', '2021-10-06 10:43:51', 0),
(1473, 'Thanh', 'Tran', 'end_user', '01723009443', 'thanh.tran@aircom.de', '$2y$10$FkfKuMQSs9WPUFZlHYFtPuRDHHt28cKtxeQMByY5ZKXb1EQ.dCAte', NULL, 'pending', NULL, '2021-10-06 15:08:15', '2021-10-06 15:08:37', 1),
(1474, 'Areeb', 'Hassan', 'end_user', '03245040502', 'areeb.hassan@accrualgroup.com', '$2y$10$qb4XcMZ2FSSV9c8ihGtWvuOEo/5vGEh3mjrcpqp1btE/13jBoDR2K', NULL, 'pending', NULL, '2021-10-07 02:51:31', '2021-10-07 03:06:21', 1),
(1475, 'areeb', 'hassan', 'partner', '03245040502', 'areeb1@accrualgroup.com', '$2y$10$TDuloVFCYaMjqE.9JtjkEe62NNwoac8VESTYV8kaGEUC/Pa/L0K2q', 12, 'approved', 'HZZnKAmaDWDY5rAS6YB5ld0SQnWRUqpnrctHDmk8azKdHihqYLFzLzxTh4B5', '2021-10-08 03:30:48', '2021-10-08 03:31:07', 1),
(1476, 'dirver', 'areeb', 'driver', '03245040502', 'areeb2@accrualgroup.com', '$2y$10$Hgm00AhfvpVNRjMlBIgcWOQm76/akU6ScJVlYIUsCkki0nu.fa506', 1475, 'approved', 'znikdhwjthQMHQIHQS7UC95wLqgPn4lOkuhwwaFJgKoqlchWEYXMbKlmLGu8', '2021-10-08 03:54:51', '2021-10-08 03:58:36', 0),
(1477, 'areeb3', 'hassab', 'end_user', '151651', 'areeb3@accrualgroup.com', '$2y$10$KdUiWIWoTUDBwOJBYZseJepIXUnmU0Sn8X3Q6cmEsaNIS1zTmpHaK', NULL, 'pending', 'PrhCRBZJzk2VJkcXgVA4gkTJVFa2KSUHjNxazHfr1dURh2IloFwWEz31MNnf', '2021-10-08 04:10:52', '2021-10-08 04:13:06', 1),
(1478, 'Abc', 'def', 'end_user', '(+49) 123456789', 'abcd@gmail.com', '$2y$10$r3NEqpprJn5nLSKlc3nZ9OjzGac6C98pwb.ASosWiLCWDbXWCsYhO', NULL, 'pending', NULL, '2023-04-28 13:14:09', '2023-04-28 13:14:09', 0),
(1479, 'Zeshan', 'Rabnawaz', 'end_user', '123456789', 'jack123@gmail.com', '$2y$10$AvugzOOytiuPRxU0/rrSIu8ayYJENr/UKIv6u9gvTtNtK27/JLNHW', NULL, 'pending', '1rZl5dpehhwWK5qTC2ivaQ99YqbWuD2us6Aaz6IlssYfHBIdUcB1NmhplGNr', '2023-04-28 14:45:05', '2023-04-28 14:45:05', 0),
(1480, '', '', 'partner', '', 'abcde@gmail.com', '', NULL, 'pending', NULL, '2023-04-28 17:57:28', '2023-04-28 17:57:28', 0),
(1481, '', '', 'partner', '', 'abcdef@gmail.com', '', NULL, 'pending', NULL, '2023-04-28 17:59:14', '2023-04-28 17:59:14', 0),
(1482, 'Haroon', 'Naiz', 'end_user', '123456789', 'haroon123@gmail.com', '$2y$10$7tVL8Xm6tI1Rhct7zQ7yFO2xDLQ47eC1Q/CuRp6sdzkl17pzJ3qFS', NULL, 'pending', 'QEGczKFEecWqQevnZ2VahLzYCWWyfU4PL1owKNmTPHoAGZDqQMNyphejwfla', '2023-04-28 18:13:04', '2023-04-28 18:13:04', 0),
(1483, '', '', 'partner', '', 'zeshanrabnwz@gmail.com', '', NULL, 'pending', NULL, '2023-05-02 19:37:26', '2023-05-02 19:37:26', 0),
(1484, '', '', 'partner', '', 'abcd123@gmail.com', '', NULL, 'pending', NULL, '2023-05-02 19:55:05', '2023-05-02 19:55:05', 0),
(1485, '', '', 'partner', '', 'abdee12@gmail.com', '', NULL, 'pending', NULL, '2023-05-02 19:56:57', '2023-05-02 19:56:57', 0),
(1486, '', '', 'partner', '', 'abbs123@gmail.com', '', NULL, 'pending', NULL, '2023-05-02 19:59:16', '2023-05-02 19:59:16', 0),
(1487, '', '', 'partner', '', 'noled@mailinator.com', '', NULL, 'pending', NULL, '2023-05-02 20:01:23', '2023-05-02 20:01:23', 0),
(1488, '', '', 'partner', '', 'casinybo@mailinator.com', '', NULL, 'pending', NULL, '2023-05-02 20:03:33', '2023-05-02 20:03:33', 0),
(1489, 'Jack', 'Brown', 'end_user', '123456789', 'jack1234@gmail.com', '$2y$10$8W8Fu30Ybq2Ei8Dy1DMHP.31L7hdJ9NdHPcSr89GCbGThV2p.R3uC', NULL, 'pending', 'lJjHAXvhlIneKCikkpeAn0oZTIjDcqhTMdgKif8eADMz6YWQoAnLIZjnMXKF', '2023-05-03 11:54:59', '2023-05-03 11:54:59', 0),
(1490, 'Steve', 'Jack', 'end_user', '123456789', 'steve123@gmail.com', '$2y$10$ylvnSgIScQof369jLdFMg.jQpy17dENEYAQM6VE9Lls3KDf3UuqR.', NULL, 'pending', 'Br1hqCqkQUpAsfk3jnKfmk9eiCBtz2YxpOoZEzKaiIHvh0lFo1gfOD1v94cA', '2023-05-03 19:45:23', '2023-05-03 19:49:02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_media`
--

CREATE TABLE `users_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `image_name` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_location`
--

CREATE TABLE `user_location` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_location`
--

INSERT INTO `user_location` (`user_id`, `location_id`, `created_at`, `updated_at`) VALUES
(82, 1, '2020-02-03 00:21:02', '2020-02-03 00:21:02'),
(83, 1, '2020-02-03 00:33:30', '2020-02-03 00:33:30'),
(117, 1, '2020-04-02 16:03:19', '2020-04-02 16:03:19'),
(117, 4, '2020-04-02 16:03:19', '2020-04-02 16:03:19'),
(789, 1, '2020-12-16 10:58:07', '2020-12-16 10:58:07'),
(1488, 1, '2023-05-02 20:03:33', '2023-05-02 20:03:33');

-- --------------------------------------------------------

--
-- Table structure for table `user_user`
--

CREATE TABLE `user_user` (
  `creator_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('approved','disapproved','active','blocked','pending') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_user`
--

INSERT INTO `user_user` (`creator_id`, `user_id`, `created_at`, `updated_at`, `status`) VALUES
(83, 85, '2020-02-04 16:52:05', '2020-02-04 16:52:05', 'active'),
(1475, 1476, '2021-10-08 03:54:51', '2021-10-08 03:54:51', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `vehiclecategory`
--

CREATE TABLE `vehiclecategory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `max_bags` int(11) DEFAULT NULL,
  `max_seats` int(11) DEFAULT NULL,
  `price_per_km` decimal(8,2) DEFAULT NULL,
  `price_per_hr` decimal(8,2) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `is_public` enum('1','') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehiclecategory`
--

INSERT INTO `vehiclecategory` (`id`, `name`, `picture`, `description`, `max_bags`, `max_seats`, `price_per_km`, `price_per_hr`, `created_by`, `modified_by`, `is_public`, `created_at`, `updated_at`) VALUES
(2, 'Business Class', '1581433626eclass.jpg', '<p>60 Minuten kostenlose Wartezeit bei Flughafenabholungen, bei allen anderen 15 Minuten</p><p>Meet &amp; Greet-Service</p><p>Kostenlose Stornierung bis eine Stunde vor Abholung</p>', 3, 3, NULL, NULL, 12, NULL, '1', '2020-01-24 16:27:55', '2020-02-11 14:07:06'),
(3, 'Business Van', '1581433638vclass.jpg', '<p>Business Van</p>', 5, 5, NULL, NULL, 12, NULL, '1', '2020-01-24 16:32:26', '2020-02-11 14:07:18'),
(4, 'First Class', '1581433649sclass.jpg', '<p>60 Minuten kostenlose Wartezeit bei Flughafenabholungen, bei allen anderen 15 Minuten</p><p>Meet &amp; Greet-Service</p><p>Kostenlose Stornierung bis eine Stunde vor Abholung</p>', 3, 3, NULL, NULL, 12, NULL, '1', '2020-01-24 16:34:02', '2020-02-11 14:07:29'),
(5, 'First Class Choice', '1581528180costumerchoice.jpg', '<p>Sie bevorzugen ein bestimmtes Modell in unserer First Class? Dann Buchen Sie ein Garantiertes Fahrzeugmodell. Sie können zwischen folgenden Modellen auswählen:&nbsp;</p><ul><li>Mercedes S-Klasse</li><li>Audi A8</li><li>BMW 7er</li></ul><p>&nbsp;</p><p>Service</p><ul><li>60 Minuten kostenlose Wartezeit bei Flughafenabholungen, bei allen anderen 15 Minuten</li><li>Meet &amp; Greet-Service</li><li>Kostenlose Stornierung bis eine Stunde vor Abholung</li></ul>', 3, 3, NULL, NULL, 12, NULL, '1', '2020-01-26 19:39:14', '2020-02-12 16:23:00');

-- --------------------------------------------------------

--
-- Table structure for table `vehiclecategory_vehiclesubtype`
--

CREATE TABLE `vehiclecategory_vehiclesubtype` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subtype_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehiclecategory_vehiclesubtype`
--

INSERT INTO `vehiclecategory_vehiclesubtype` (`category_id`, `subtype_id`, `created_at`, `updated_at`) VALUES
(2, 1, NULL, NULL),
(2, 2, NULL, NULL),
(2, 3, NULL, NULL),
(3, 4, NULL, NULL),
(4, 5, NULL, NULL),
(4, 6, NULL, NULL),
(4, 7, NULL, NULL),
(5, 5, NULL, NULL),
(5, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehiclemake`
--

CREATE TABLE `vehiclemake` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehiclemodel`
--

CREATE TABLE `vehiclemodel` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehiclepricing`
--

CREATE TABLE `vehiclepricing` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `pricing_type` enum('per_km','per_hr') NOT NULL,
  `from` decimal(8,2) NOT NULL,
  `to` decimal(8,2) NOT NULL,
  `is_price_fixed` tinyint(1) NOT NULL DEFAULT 0,
  `base_price` decimal(8,2) DEFAULT NULL,
  `fixed_price` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehiclepricing`
--

INSERT INTO `vehiclepricing` (`id`, `category_id`, `created_by`, `pricing_type`, `from`, `to`, `is_price_fixed`, `base_price`, `fixed_price`, `created_at`, `updated_at`) VALUES
(2784, 5, 12, 'per_hr', 1.00, 2.90, 1, NULL, 153.95, '2020-01-26 20:22:56', '2020-01-26 20:22:56'),
(2785, 5, 12, 'per_hr', 3.00, 3.90, 1, NULL, 224.67, '2020-01-26 20:22:56', '2020-01-26 20:22:56'),
(2786, 5, 12, 'per_hr', 4.00, 4.90, 1, NULL, 295.39, '2020-01-26 20:22:57', '2020-01-26 20:22:57'),
(2787, 5, 12, 'per_hr', 5.00, 5.90, 1, NULL, 366.12, '2020-01-26 20:22:57', '2020-01-26 20:22:57'),
(2788, 5, 12, 'per_hr', 6.00, 6.90, 1, NULL, 436.84, '2020-01-26 20:22:57', '2020-01-26 20:22:57'),
(2789, 5, 12, 'per_hr', 7.00, 7.90, 1, NULL, 507.57, '2020-01-26 20:22:57', '2020-01-26 20:22:57'),
(2790, 5, 12, 'per_hr', 8.00, 8.90, 1, NULL, 578.29, '2020-01-26 20:22:57', '2020-01-26 20:22:57'),
(2791, 5, 12, 'per_hr', 9.00, 9.90, 1, NULL, 649.01, '2020-01-26 20:22:57', '2020-01-26 20:22:57'),
(2792, 5, 12, 'per_hr', 10.00, 10.90, 1, NULL, 719.74, '2020-01-26 20:22:58', '2020-01-26 20:22:58'),
(2793, 5, 12, 'per_hr', 11.00, 11.90, 1, NULL, 790.46, '2020-01-26 20:22:58', '2020-01-26 20:22:58'),
(2794, 5, 12, 'per_hr', 12.00, 12.90, 1, NULL, 861.19, '2020-01-26 20:22:58', '2020-01-26 20:22:58'),
(2795, 5, 12, 'per_hr', 13.00, 13.90, 1, NULL, 931.91, '2020-01-26 20:22:58', '2020-01-26 20:22:58'),
(2796, 5, 12, 'per_hr', 14.00, 14.90, 1, NULL, 1002.63, '2020-01-26 20:22:58', '2020-01-26 20:22:58'),
(2797, 5, 12, 'per_hr', 15.00, 15.90, 1, NULL, 1073.36, '2020-01-26 20:22:58', '2020-01-26 20:22:58'),
(2798, 5, 12, 'per_hr', 16.00, 16.90, 1, NULL, 1144.08, '2020-01-26 20:22:59', '2020-01-26 20:22:59'),
(2799, 5, 12, 'per_hr', 17.00, 17.90, 1, NULL, 1214.81, '2020-01-26 20:22:59', '2020-01-26 20:22:59'),
(2800, 5, 12, 'per_hr', 18.00, 18.90, 1, NULL, 1285.53, '2020-01-26 20:22:59', '2020-01-26 20:22:59'),
(2801, 5, 12, 'per_hr', 19.00, 19.90, 1, NULL, 1356.25, '2020-01-26 20:22:59', '2020-01-26 20:22:59'),
(2802, 5, 12, 'per_hr', 20.00, 20.90, 1, NULL, 1426.98, '2020-01-26 20:22:59', '2020-01-26 20:22:59'),
(2803, 5, 12, 'per_hr', 21.00, 21.90, 1, NULL, 1497.70, '2020-01-26 20:22:59', '2020-01-26 20:22:59'),
(2804, 5, 12, 'per_hr', 22.00, 22.90, 1, NULL, 1568.43, '2020-01-26 20:23:00', '2020-01-26 20:23:00'),
(2805, 5, 12, 'per_hr', 23.00, 23.90, 1, NULL, 1639.15, '2020-01-26 20:23:00', '2020-01-26 20:23:00'),
(2806, 5, 12, 'per_hr', 24.00, 24.90, 1, NULL, 1709.87, '2020-01-26 20:23:00', '2020-01-26 20:23:00'),
(2829, 3, 12, 'per_km', 0.00, 15.90, 1, NULL, 57.14, '2020-02-01 21:42:11', '2020-02-01 21:42:11'),
(2830, 3, 12, 'per_km', 16.00, 20.90, 0, 3.34, NULL, '2020-02-01 21:42:11', '2020-02-01 21:42:11'),
(2831, 3, 12, 'per_km', 21.00, 25.90, 0, 3.09, NULL, '2020-02-01 21:42:11', '2020-02-01 21:42:11'),
(2832, 3, 12, 'per_km', 26.00, 30.90, 0, 2.84, NULL, '2020-02-01 21:42:11', '2020-02-01 21:42:11'),
(2833, 3, 12, 'per_km', 31.00, 35.90, 0, 2.77, NULL, '2020-02-01 21:42:11', '2020-02-01 21:42:11'),
(2834, 3, 12, 'per_km', 36.00, 40.90, 0, 2.65, NULL, '2020-02-01 21:42:11', '2020-02-01 21:42:11'),
(2835, 3, 12, 'per_km', 41.00, 45.90, 0, 2.58, NULL, '2020-02-01 21:42:11', '2020-02-01 21:42:11'),
(2836, 3, 12, 'per_km', 46.00, 50.90, 0, 2.51, NULL, '2020-02-01 21:42:11', '2020-02-01 21:42:11'),
(2837, 3, 12, 'per_km', 51.00, 54.90, 0, 2.50, NULL, '2020-02-01 21:42:11', '2020-02-01 21:42:11'),
(2838, 3, 12, 'per_km', 55.00, 60.90, 0, 2.47, NULL, '2020-02-01 21:42:11', '2020-02-01 21:42:11'),
(2839, 3, 12, 'per_km', 61.00, 70.90, 0, 2.39, NULL, '2020-02-01 21:42:11', '2020-02-01 21:42:11'),
(2840, 3, 12, 'per_km', 71.00, 75.90, 0, 2.34, NULL, '2020-02-01 21:42:11', '2020-02-01 21:42:11'),
(2841, 3, 12, 'per_km', 76.00, 80.90, 0, 2.32, NULL, '2020-02-01 21:42:11', '2020-02-01 21:42:11'),
(2842, 3, 12, 'per_km', 81.00, 85.90, 0, 2.30, NULL, '2020-02-01 21:42:11', '2020-02-01 21:42:11'),
(2843, 3, 12, 'per_km', 86.00, 90.90, 0, 2.28, NULL, '2020-02-01 21:42:11', '2020-02-01 21:42:11'),
(2844, 3, 12, 'per_km', 91.00, 100.90, 0, 2.25, NULL, '2020-02-01 21:42:11', '2020-02-01 21:42:11'),
(2845, 3, 12, 'per_km', 101.00, 110.90, 0, 2.24, NULL, '2020-02-01 21:42:11', '2020-02-01 21:42:11'),
(2846, 3, 12, 'per_km', 111.00, 120.90, 0, 2.22, NULL, '2020-02-01 21:42:11', '2020-02-01 21:42:11'),
(2847, 3, 12, 'per_km', 121.00, 130.90, 0, 2.18, NULL, '2020-02-01 21:42:11', '2020-02-01 21:42:11'),
(2848, 3, 12, 'per_km', 131.00, 160.90, 0, 2.15, NULL, '2020-02-01 21:42:11', '2020-02-01 21:42:11'),
(2849, 3, 12, 'per_km', 161.00, 180.90, 0, 2.13, NULL, '2020-02-01 21:42:11', '2020-02-01 21:42:11'),
(2850, 3, 12, 'per_km', 181.00, 200.90, 0, 2.12, NULL, '2020-02-01 21:42:11', '2020-02-01 21:42:11'),
(2851, 3, 12, 'per_km', 201.00, 300.90, 0, 2.08, NULL, '2020-02-01 21:42:11', '2020-02-01 21:42:11'),
(2852, 3, 12, 'per_km', 301.00, 400.90, 0, 2.07, NULL, '2020-02-01 21:42:11', '2020-02-01 21:42:11'),
(2853, 3, 12, 'per_km', 401.00, 500.90, 0, 2.05, NULL, '2020-02-01 21:42:11', '2020-02-01 21:42:11'),
(2854, 3, 12, 'per_km', 501.00, 600.90, 0, 2.03, NULL, '2020-02-01 21:42:11', '2020-02-01 21:42:11'),
(2855, 3, 12, 'per_km', 601.00, 4000.00, 0, 2.02, NULL, '2020-02-01 21:42:11', '2020-02-01 21:42:11'),
(2856, 4, 12, 'per_km', 0.00, 15.90, 1, NULL, 73.95, '2020-02-01 21:51:14', '2020-02-01 21:51:14'),
(2857, 4, 12, 'per_km', 16.00, 20.90, 1, NULL, 82.35, '2020-02-01 21:51:14', '2020-02-01 21:51:14'),
(2858, 4, 12, 'per_km', 21.00, 25.90, 0, 3.74, NULL, '2020-02-01 21:51:14', '2020-02-01 21:51:14'),
(2859, 4, 12, 'per_km', 26.00, 30.90, 0, 3.37, NULL, '2020-02-01 21:51:14', '2020-02-01 21:51:14'),
(2860, 4, 12, 'per_km', 31.00, 35.90, 0, 3.36, NULL, '2020-02-01 21:51:14', '2020-02-01 21:51:14'),
(2861, 4, 12, 'per_km', 36.00, 40.90, 0, 3.19, NULL, '2020-02-01 21:51:14', '2020-02-01 21:51:14'),
(2862, 4, 12, 'per_km', 41.00, 45.90, 0, 3.11, NULL, '2020-02-01 21:51:14', '2020-02-01 21:51:14'),
(2863, 4, 12, 'per_km', 46.00, 50.90, 0, 3.05, NULL, '2020-02-01 21:51:14', '2020-02-01 21:51:14'),
(2864, 4, 12, 'per_km', 51.00, 55.90, 0, 2.97, NULL, '2020-02-01 21:51:14', '2020-02-01 21:51:14'),
(2865, 4, 12, 'per_km', 56.00, 60.90, 0, 2.87, NULL, '2020-02-01 21:51:14', '2020-02-01 21:51:14'),
(2866, 4, 12, 'per_km', 61.00, 65.90, 0, 2.78, NULL, '2020-02-01 21:51:14', '2020-02-01 21:51:14'),
(2867, 4, 12, 'per_km', 66.00, 70.90, 0, 2.76, NULL, '2020-02-01 21:51:14', '2020-02-01 21:51:14'),
(2868, 4, 12, 'per_km', 71.00, 75.90, 0, 2.73, NULL, '2020-02-01 21:51:14', '2020-02-01 21:51:14'),
(2869, 4, 12, 'per_km', 76.00, 80.90, 0, 2.71, NULL, '2020-02-01 21:51:14', '2020-02-01 21:51:14'),
(2870, 4, 12, 'per_km', 81.00, 85.90, 0, 2.68, NULL, '2020-02-01 21:51:14', '2020-02-01 21:51:14'),
(2871, 4, 12, 'per_km', 86.00, 90.90, 0, 2.66, NULL, '2020-02-01 21:51:14', '2020-02-01 21:51:14'),
(2872, 4, 12, 'per_km', 91.00, 95.90, 0, 2.63, NULL, '2020-02-01 21:51:14', '2020-02-01 21:51:14'),
(2873, 4, 12, 'per_km', 96.00, 100.90, 0, 2.59, NULL, '2020-02-01 21:51:14', '2020-02-01 21:51:14'),
(2874, 4, 12, 'per_km', 101.00, 105.90, 0, 2.54, NULL, '2020-02-01 21:51:14', '2020-02-01 21:51:14'),
(2875, 4, 12, 'per_km', 106.00, 110.90, 0, 2.52, NULL, '2020-02-01 21:51:14', '2020-02-01 21:51:14'),
(2876, 4, 12, 'per_km', 111.00, 125.90, 0, 2.49, NULL, '2020-02-01 21:51:14', '2020-02-01 21:51:14'),
(2877, 4, 12, 'per_km', 126.00, 150.90, 0, 2.47, NULL, '2020-02-01 21:51:14', '2020-02-01 21:51:14'),
(2878, 4, 12, 'per_km', 151.00, 160.90, 0, 2.44, NULL, '2020-02-01 21:51:14', '2020-02-01 21:51:14'),
(2879, 4, 12, 'per_km', 161.00, 180.90, 0, 2.42, NULL, '2020-02-01 21:51:14', '2020-02-01 21:51:14'),
(2880, 4, 12, 'per_km', 181.00, 200.90, 0, 2.40, NULL, '2020-02-01 21:51:14', '2020-02-01 21:51:14'),
(2881, 4, 12, 'per_km', 201.00, 215.90, 0, 2.39, NULL, '2020-02-01 21:51:14', '2020-02-01 21:51:14'),
(2882, 4, 12, 'per_km', 216.00, 235.90, 0, 2.36, NULL, '2020-02-01 21:51:14', '2020-02-01 21:51:14'),
(2883, 4, 12, 'per_km', 236.00, 260.90, 0, 2.35, NULL, '2020-02-01 21:51:14', '2020-02-01 21:51:14'),
(2884, 4, 12, 'per_km', 261.00, 300.90, 0, 2.34, NULL, '2020-02-01 21:51:14', '2020-02-01 21:51:14'),
(2885, 4, 12, 'per_km', 301.00, 330.90, 0, 2.33, NULL, '2020-02-01 21:51:14', '2020-02-01 21:51:14'),
(2886, 4, 12, 'per_km', 331.00, 345.90, 0, 2.31, NULL, '2020-02-01 21:51:14', '2020-02-01 21:51:14'),
(2887, 4, 12, 'per_km', 346.00, 370.90, 0, 2.29, NULL, '2020-02-01 21:51:14', '2020-02-01 21:51:14'),
(2888, 4, 12, 'per_km', 371.00, 450.90, 0, 2.28, NULL, '2020-02-01 21:51:14', '2020-02-01 21:51:14'),
(2889, 4, 12, 'per_km', 451.00, 500.90, 0, 2.26, NULL, '2020-02-01 21:51:14', '2020-02-01 21:51:14'),
(2890, 4, 12, 'per_km', 501.00, 600.90, 0, 2.25, NULL, '2020-02-01 21:51:14', '2020-02-01 21:51:14'),
(2891, 4, 12, 'per_km', 601.00, 4000.00, 0, 2.24, NULL, '2020-02-01 21:51:14', '2020-02-01 21:51:14'),
(2892, 5, 12, 'per_km', 0.00, 15.90, 1, NULL, 73.95, '2020-02-01 22:15:02', '2020-02-01 22:15:02'),
(2893, 5, 12, 'per_km', 16.00, 20.90, 1, NULL, 82.35, '2020-02-01 22:15:02', '2020-02-01 22:15:02'),
(2894, 5, 12, 'per_km', 21.00, 25.90, 0, 3.74, NULL, '2020-02-01 22:15:02', '2020-02-01 22:15:02'),
(2895, 5, 12, 'per_km', 26.00, 30.90, 0, 3.37, NULL, '2020-02-01 22:15:02', '2020-02-01 22:15:02'),
(2896, 5, 12, 'per_km', 31.00, 35.90, 0, 3.36, NULL, '2020-02-01 22:15:02', '2020-02-01 22:15:02'),
(2897, 5, 12, 'per_km', 36.00, 40.90, 0, 3.19, NULL, '2020-02-01 22:15:02', '2020-02-01 22:15:02'),
(2898, 5, 12, 'per_km', 41.00, 45.90, 0, 3.11, NULL, '2020-02-01 22:15:02', '2020-02-01 22:15:02'),
(2899, 5, 12, 'per_km', 46.00, 50.90, 0, 3.05, NULL, '2020-02-01 22:15:02', '2020-02-01 22:15:02'),
(2900, 5, 12, 'per_km', 51.00, 55.90, 0, 2.97, NULL, '2020-02-01 22:15:02', '2020-02-01 22:15:02'),
(2901, 5, 12, 'per_km', 56.00, 60.90, 0, 2.87, NULL, '2020-02-01 22:15:02', '2020-02-01 22:15:02'),
(2902, 5, 12, 'per_km', 71.00, 75.90, 0, 2.73, NULL, '2020-02-01 22:15:02', '2020-02-01 22:15:02'),
(2903, 5, 12, 'per_km', 76.00, 80.90, 0, 2.71, NULL, '2020-02-01 22:15:02', '2020-02-01 22:15:02'),
(2904, 5, 12, 'per_km', 81.00, 85.90, 0, 2.68, NULL, '2020-02-01 22:15:02', '2020-02-01 22:15:02'),
(2905, 5, 12, 'per_km', 86.00, 90.90, 0, 2.66, NULL, '2020-02-01 22:15:02', '2020-02-01 22:15:02'),
(2906, 5, 12, 'per_km', 91.00, 95.90, 0, 2.63, NULL, '2020-02-01 22:15:02', '2020-02-01 22:15:02'),
(2907, 5, 12, 'per_km', 96.00, 100.90, 0, 2.59, NULL, '2020-02-01 22:15:02', '2020-02-01 22:15:02'),
(2908, 5, 12, 'per_km', 101.00, 105.90, 0, 2.54, NULL, '2020-02-01 22:15:02', '2020-02-01 22:15:02'),
(2909, 5, 12, 'per_km', 106.00, 110.90, 0, 2.52, NULL, '2020-02-01 22:15:02', '2020-02-01 22:15:02'),
(2910, 5, 12, 'per_km', 111.00, 125.90, 0, 2.49, NULL, '2020-02-01 22:15:02', '2020-02-01 22:15:02'),
(2911, 5, 12, 'per_km', 126.00, 150.90, 0, 2.47, NULL, '2020-02-01 22:15:02', '2020-02-01 22:15:02'),
(2912, 5, 12, 'per_km', 151.00, 160.90, 0, 2.44, NULL, '2020-02-01 22:15:02', '2020-02-01 22:15:02'),
(2913, 5, 12, 'per_km', 161.00, 180.90, 0, 2.42, NULL, '2020-02-01 22:15:02', '2020-02-01 22:15:02'),
(2914, 5, 12, 'per_km', 181.00, 200.90, 0, 2.40, NULL, '2020-02-01 22:15:02', '2020-02-01 22:15:02'),
(2915, 5, 12, 'per_km', 201.00, 215.90, 0, 2.39, NULL, '2020-02-01 22:15:02', '2020-02-01 22:15:02'),
(2916, 5, 12, 'per_km', 216.00, 235.90, 0, 2.36, NULL, '2020-02-01 22:15:02', '2020-02-01 22:15:02'),
(2917, 5, 12, 'per_km', 236.00, 260.90, 0, 2.35, NULL, '2020-02-01 22:15:02', '2020-02-01 22:15:02'),
(2918, 5, 12, 'per_km', 261.00, 300.90, 0, 2.34, NULL, '2020-02-01 22:15:02', '2020-02-01 22:15:02'),
(2919, 5, 12, 'per_km', 301.00, 330.90, 0, 2.33, NULL, '2020-02-01 22:15:02', '2020-02-01 22:15:02'),
(2920, 5, 12, 'per_km', 331.00, 345.90, 0, 2.31, NULL, '2020-02-01 22:15:02', '2020-02-01 22:15:02'),
(2921, 5, 12, 'per_km', 346.00, 370.90, 0, 2.29, NULL, '2020-02-01 22:15:02', '2020-02-01 22:15:02'),
(2922, 5, 12, 'per_km', 371.00, 450.90, 0, 2.28, NULL, '2020-02-01 22:15:02', '2020-02-01 22:15:02'),
(2923, 5, 12, 'per_km', 451.00, 500.90, 0, 2.26, NULL, '2020-02-01 22:15:02', '2020-02-01 22:15:02'),
(2924, 5, 12, 'per_km', 501.00, 600.90, 0, 2.25, NULL, '2020-02-01 22:15:02', '2020-02-01 22:15:02'),
(2925, 5, 12, 'per_km', 601.00, 4000.00, 0, 2.24, NULL, '2020-02-01 22:15:02', '2020-02-01 22:15:02'),
(2926, 2, 12, 'per_hr', 1.00, 2.00, 1, NULL, 76.08, '2020-02-12 10:26:04', '2020-02-12 10:26:04'),
(2927, 2, 12, 'per_hr', 3.00, 3.90, 1, NULL, 130.59, '2020-02-12 10:26:04', '2020-02-12 10:26:04'),
(2928, 2, 12, 'per_hr', 4.00, 4.90, 1, NULL, 170.62, '2020-02-12 10:26:04', '2020-02-12 10:26:04'),
(2929, 2, 12, 'per_hr', 5.00, 5.90, 1, NULL, 210.64, '2020-02-12 10:26:04', '2020-02-12 10:26:04'),
(2930, 2, 12, 'per_hr', 6.00, 6.90, 1, NULL, 250.69, '2020-02-12 10:26:04', '2020-02-12 10:26:04'),
(2931, 2, 12, 'per_hr', 7.00, 7.90, 1, NULL, 290.71, '2020-02-12 10:26:04', '2020-02-12 10:26:04'),
(2932, 2, 12, 'per_hr', 8.00, 8.90, 1, NULL, 330.72, '2020-02-12 10:26:04', '2020-02-12 10:26:04'),
(2933, 2, 12, 'per_hr', 9.00, 9.90, 1, NULL, 370.78, '2020-02-12 10:26:04', '2020-02-12 10:26:04'),
(2934, 2, 12, 'per_hr', 10.00, 10.90, 1, NULL, 410.80, '2020-02-12 10:26:04', '2020-02-12 10:26:04'),
(2935, 2, 12, 'per_hr', 11.00, 11.90, 1, NULL, 450.82, '2020-02-12 10:26:04', '2020-02-12 10:26:04'),
(2936, 2, 12, 'per_hr', 12.00, 12.90, 1, NULL, 490.84, '2020-02-12 10:26:04', '2020-02-12 10:26:04'),
(2937, 2, 12, 'per_hr', 13.00, 13.90, 1, NULL, 530.87, '2020-02-12 10:26:04', '2020-02-12 10:26:04'),
(2938, 2, 12, 'per_hr', 14.00, 14.90, 1, NULL, 570.94, '2020-02-12 10:26:04', '2020-02-12 10:26:04'),
(2939, 2, 12, 'per_hr', 15.00, 15.90, 1, NULL, 610.97, '2020-02-12 10:26:04', '2020-02-12 10:26:04'),
(2940, 2, 12, 'per_hr', 16.00, 16.90, 1, NULL, 650.96, '2020-02-12 10:26:04', '2020-02-12 10:26:04'),
(2941, 2, 12, 'per_hr', 17.00, 17.90, 1, NULL, 691.00, '2020-02-12 10:26:04', '2020-02-12 10:26:04'),
(2942, 2, 12, 'per_hr', 18.00, 18.90, 1, NULL, 731.04, '2020-02-12 10:26:04', '2020-02-12 10:26:04'),
(2943, 2, 12, 'per_hr', 19.00, 19.90, 1, NULL, 771.02, '2020-02-12 10:26:04', '2020-02-12 10:26:04'),
(2944, 2, 12, 'per_hr', 20.00, 20.90, 1, NULL, 811.10, '2020-02-12 10:26:04', '2020-02-12 10:26:04'),
(2945, 2, 12, 'per_hr', 21.00, 21.90, 1, NULL, 858.66, '2020-02-12 10:26:04', '2020-02-12 10:26:04'),
(2946, 2, 12, 'per_hr', 22.00, 22.90, 1, NULL, 891.18, '2020-02-12 10:26:04', '2020-02-12 10:26:04'),
(2947, 2, 12, 'per_hr', 23.00, 23.90, 1, NULL, 931.21, '2020-02-12 10:26:04', '2020-02-12 10:26:04'),
(2948, 2, 12, 'per_hr', 24.00, 24.90, 1, NULL, 937.58, '2020-02-12 10:26:04', '2020-02-12 10:26:04'),
(2949, 3, 12, 'per_hr', 1.00, 2.90, 1, NULL, 116.99, '2020-02-12 10:36:31', '2020-02-12 10:36:31'),
(2950, 3, 12, 'per_hr', 3.00, 3.90, 1, NULL, 170.24, '2020-02-12 10:36:31', '2020-02-12 10:36:31'),
(2951, 3, 12, 'per_hr', 4.00, 4.90, 1, NULL, 223.48, '2020-02-12 10:36:31', '2020-02-12 10:36:31'),
(2952, 3, 12, 'per_hr', 5.00, 5.90, 1, NULL, 277.01, '2020-02-12 10:36:31', '2020-02-12 10:36:31'),
(2953, 3, 12, 'per_hr', 6.00, 6.90, 1, NULL, 329.95, '2020-02-12 10:36:31', '2020-02-12 10:36:31'),
(2954, 3, 12, 'per_hr', 7.00, 7.90, 1, NULL, 383.21, '2020-02-12 10:36:31', '2020-02-12 10:36:31'),
(2955, 3, 12, 'per_hr', 8.00, 8.90, 1, NULL, 436.44, '2020-02-12 10:36:31', '2020-02-12 10:36:31'),
(2956, 3, 12, 'per_hr', 9.00, 9.90, 1, NULL, 489.67, '2020-02-12 10:36:31', '2020-02-12 10:36:31'),
(2957, 3, 12, 'per_hr', 10.00, 10.90, 1, NULL, 540.55, '2020-02-12 10:36:32', '2020-02-12 10:36:32'),
(2958, 3, 12, 'per_hr', 11.00, 11.90, 1, NULL, 596.17, '2020-02-12 10:36:32', '2020-02-12 10:36:32'),
(2959, 3, 12, 'per_hr', 12.00, 12.90, 1, NULL, 649.41, '2020-02-12 10:36:32', '2020-02-12 10:36:32'),
(2960, 3, 12, 'per_hr', 13.00, 13.90, 1, NULL, 702.66, '2020-02-12 10:36:32', '2020-02-12 10:36:32'),
(2961, 3, 12, 'per_hr', 14.00, 14.90, 1, NULL, 755.88, '2020-02-12 10:36:32', '2020-02-12 10:36:32'),
(2962, 3, 12, 'per_hr', 15.00, 15.90, 1, NULL, 809.18, '2020-02-12 10:36:32', '2020-02-12 10:36:32'),
(2963, 3, 12, 'per_hr', 16.00, 16.90, 1, NULL, 862.45, '2020-02-12 10:36:32', '2020-02-12 10:36:32'),
(2964, 3, 12, 'per_hr', 17.00, 17.90, 1, NULL, 915.65, '2020-02-12 10:36:32', '2020-02-12 10:36:32'),
(2965, 3, 12, 'per_hr', 18.00, 18.90, 1, NULL, 968.82, '2020-02-12 10:36:32', '2020-02-12 10:36:32'),
(2966, 3, 12, 'per_hr', 19.00, 19.90, 1, NULL, 1022.09, '2020-02-12 10:36:32', '2020-02-12 10:36:32'),
(2967, 3, 12, 'per_hr', 20.00, 20.90, 1, NULL, 1075.38, '2020-02-12 10:36:32', '2020-02-12 10:36:32'),
(2968, 3, 12, 'per_hr', 21.00, 21.90, 1, NULL, 1128.62, '2020-02-12 10:36:32', '2020-02-12 10:36:32'),
(2969, 3, 12, 'per_hr', 22.00, 22.90, 1, NULL, 1181.81, '2020-02-12 10:36:32', '2020-02-12 10:36:32'),
(2970, 3, 12, 'per_hr', 23.00, 23.90, 1, NULL, 1235.04, '2020-02-12 10:36:32', '2020-02-12 10:36:32'),
(2971, 3, 12, 'per_hr', 24.00, 24.90, 1, NULL, 1288.34, '2020-02-12 10:36:32', '2020-02-12 10:36:32'),
(2972, 4, 12, 'per_hr', 1.00, 2.90, 1, NULL, 129.37, '2020-02-12 13:08:46', '2020-02-12 13:08:46'),
(2973, 4, 12, 'per_hr', 3.00, 3.90, 1, NULL, 188.80, '2020-02-12 13:08:46', '2020-02-12 13:08:46'),
(2974, 4, 12, 'per_hr', 4.00, 4.90, 1, NULL, 248.23, '2020-02-12 13:08:46', '2020-02-12 13:08:46'),
(2975, 4, 12, 'per_hr', 5.00, 5.90, 1, NULL, 307.66, '2020-02-12 13:08:46', '2020-02-12 13:08:46'),
(2976, 4, 12, 'per_hr', 6.00, 6.90, 1, NULL, 367.09, '2020-02-12 13:08:46', '2020-02-12 13:08:46'),
(2977, 4, 12, 'per_hr', 7.00, 7.90, 1, NULL, 426.53, '2020-02-12 13:08:46', '2020-02-12 13:08:46'),
(2978, 4, 12, 'per_hr', 8.00, 8.90, 1, NULL, 485.96, '2020-02-12 13:08:46', '2020-02-12 13:08:46'),
(2979, 4, 12, 'per_hr', 9.00, 9.90, 1, NULL, 545.39, '2020-02-12 13:08:46', '2020-02-12 13:08:46'),
(2980, 4, 12, 'per_hr', 10.00, 10.90, 1, NULL, 604.82, '2020-02-12 13:08:46', '2020-02-12 13:08:46'),
(2981, 4, 12, 'per_hr', 11.00, 11.90, 1, NULL, 664.25, '2020-02-12 13:08:46', '2020-02-12 13:08:46'),
(2982, 4, 12, 'per_hr', 12.00, 12.90, 1, NULL, 723.69, '2020-02-12 13:08:46', '2020-02-12 13:08:46'),
(2983, 4, 12, 'per_hr', 13.00, 13.90, 1, NULL, 783.12, '2020-02-12 13:08:46', '2020-02-12 13:08:46'),
(2984, 4, 12, 'per_hr', 14.00, 14.90, 1, NULL, 842.55, '2020-02-12 13:08:46', '2020-02-12 13:08:46'),
(2985, 4, 12, 'per_hr', 15.00, 15.90, 1, NULL, 901.98, '2020-02-12 13:08:46', '2020-02-12 13:08:46'),
(2986, 4, 12, 'per_hr', 16.00, 16.90, 1, NULL, 961.42, '2020-02-12 13:08:46', '2020-02-12 13:08:46'),
(2987, 4, 12, 'per_hr', 17.00, 17.90, 1, NULL, 1020.85, '2020-02-12 13:08:46', '2020-02-12 13:08:46'),
(2988, 4, 12, 'per_hr', 18.00, 18.90, 1, NULL, 1080.28, '2020-02-12 13:08:46', '2020-02-12 13:08:46'),
(2989, 4, 12, 'per_hr', 19.00, 19.90, 1, NULL, 1139.71, '2020-02-12 13:08:46', '2020-02-12 13:08:46'),
(2990, 4, 12, 'per_hr', 20.00, 20.90, 1, NULL, 1199.14, '2020-02-12 13:08:46', '2020-02-12 13:08:46'),
(2991, 4, 12, 'per_hr', 21.00, 21.90, 1, NULL, 1258.57, '2020-02-12 13:08:46', '2020-02-12 13:08:46'),
(2992, 4, 12, 'per_hr', 22.00, 22.90, 1, NULL, 1318.00, '2020-02-12 13:08:46', '2020-02-12 13:08:46'),
(2993, 4, 12, 'per_hr', 23.00, 23.90, 1, NULL, 1377.44, '2020-02-12 13:08:46', '2020-02-12 13:08:46'),
(2994, 4, 12, 'per_hr', 24.00, 24.90, 1, NULL, 1436.87, '2020-02-12 13:08:46', '2020-02-12 13:08:46'),
(3163, 2, 12, 'per_km', 0.00, 19.90, 1, NULL, 48.00, '2020-07-11 12:03:04', '2020-07-11 12:03:04'),
(3164, 2, 12, 'per_km', 20.00, 30.90, 0, 2.40, NULL, '2020-07-11 12:03:04', '2020-07-11 12:03:04'),
(3165, 2, 12, 'per_km', 31.00, 40.90, 0, 2.30, NULL, '2020-07-11 12:03:04', '2020-07-11 12:03:04'),
(3166, 2, 12, 'per_km', 41.00, 50.90, 0, 2.19, NULL, '2020-07-11 12:03:04', '2020-07-11 12:03:04'),
(3167, 2, 12, 'per_km', 51.00, 60.90, 0, 2.16, NULL, '2020-07-11 12:03:04', '2020-07-11 12:03:04'),
(3168, 2, 12, 'per_km', 61.00, 70.90, 0, 1.97, NULL, '2020-07-11 12:03:04', '2020-07-11 12:03:04'),
(3169, 2, 12, 'per_km', 71.00, 90.90, 0, 1.95, NULL, '2020-07-11 12:03:04', '2020-07-11 12:03:04'),
(3170, 2, 12, 'per_km', 91.00, 100.90, 0, 1.91, NULL, '2020-07-11 12:03:04', '2020-07-11 12:03:04'),
(3171, 2, 12, 'per_km', 101.00, 110.90, 0, 1.89, NULL, '2020-07-11 12:03:04', '2020-07-11 12:03:04'),
(3172, 2, 12, 'per_km', 111.00, 120.90, 0, 1.86, NULL, '2020-07-11 12:03:04', '2020-07-11 12:03:04'),
(3173, 2, 12, 'per_km', 121.00, 130.90, 0, 1.83, NULL, '2020-07-11 12:03:04', '2020-07-11 12:03:04'),
(3174, 2, 12, 'per_km', 131.00, 160.90, 0, 1.82, NULL, '2020-07-11 12:03:04', '2020-07-11 12:03:04'),
(3175, 2, 12, 'per_km', 161.00, 180.90, 0, 1.81, NULL, '2020-07-11 12:03:04', '2020-07-11 12:03:04'),
(3176, 2, 12, 'per_km', 181.00, 200.90, 0, 1.80, NULL, '2020-07-11 12:03:04', '2020-07-11 12:03:04'),
(3177, 2, 12, 'per_km', 201.00, 250.90, 0, 1.78, NULL, '2020-07-11 12:03:04', '2020-07-11 12:03:04'),
(3178, 2, 12, 'per_km', 251.00, 280.90, 0, 1.76, NULL, '2020-07-11 12:03:04', '2020-07-11 12:03:04'),
(3179, 2, 12, 'per_km', 281.00, 300.90, 0, 1.75, NULL, '2020-07-11 12:03:04', '2020-07-11 12:03:04'),
(3180, 2, 12, 'per_km', 301.00, 400.90, 0, 1.72, NULL, '2020-07-11 12:03:04', '2020-07-11 12:03:04'),
(3181, 2, 12, 'per_km', 401.00, 650.90, 0, 1.71, NULL, '2020-07-11 12:03:04', '2020-07-11 12:03:04'),
(3182, 2, 12, 'per_km', 651.00, 850.90, 0, 1.70, NULL, '2020-07-11 12:03:04', '2020-07-11 12:03:04'),
(3183, 2, 12, 'per_km', 851.00, 4000.00, 0, 1.69, NULL, '2020-07-11 12:03:04', '2020-07-11 12:03:04');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_name` varchar(200) DEFAULT NULL,
  `title` varchar(50) NOT NULL,
  `plate` varchar(20) NOT NULL,
  `model_no` varchar(20) NOT NULL,
  `vehicleCategory_id` bigint(20) UNSIGNED DEFAULT NULL,
  `standard` varchar(10) NOT NULL,
  `interior_color` varchar(50) DEFAULT NULL,
  `exterior_color` varchar(50) DEFAULT NULL,
  `length` varchar(30) NOT NULL,
  `engine_capacity` varchar(30) NOT NULL,
  `short_description` text DEFAULT NULL,
  `is_available` enum('YES','NO') NOT NULL DEFAULT 'YES',
  `creator_id` bigint(20) UNSIGNED NOT NULL,
  `fuel_type` varchar(20) NOT NULL,
  `transmission` enum('auto','manual') NOT NULL,
  `status` enum('approved','blocked','pending') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `price_per_hour` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `image_name`, `title`, `plate`, `model_no`, `vehicleCategory_id`, `standard`, `interior_color`, `exterior_color`, `length`, `engine_capacity`, `short_description`, `is_available`, `creator_id`, `fuel_type`, `transmission`, `status`, `created_at`, `updated_at`, `type_id`, `category_id`, `price_per_hour`) VALUES
(1, '1580838637fml592 2.jpg', 'Mercedes E-Class', 'F-ML-592', '2019', 2, '5', 'Black', 'Black', '3 Yard', '194', NULL, 'YES', 83, 'diesel', 'auto', 'approved', '2020-02-04 16:50:37', '2020-02-04 16:52:37', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicletype`
--

CREATE TABLE `vehicletype` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_subtypes`
--

CREATE TABLE `vehicle_subtypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_subtypes`
--

INSERT INTO `vehicle_subtypes` (`id`, `created_by`, `title`, `created_at`, `updated_at`) VALUES
(1, 12, 'Mercedes E-Class', '2020-01-24 15:53:55', '2020-01-24 15:53:55'),
(2, 12, 'Audi A6', '2020-01-24 15:54:07', '2020-01-24 15:54:07'),
(3, 12, 'BMW 5 Series', '2020-01-24 15:54:17', '2020-01-24 15:54:17'),
(4, 12, 'Mercedes V-Class', '2020-01-24 15:54:27', '2020-01-24 15:54:27'),
(5, 12, 'Mercedes S-Class', '2020-01-24 15:54:50', '2020-01-24 15:54:50'),
(6, 12, 'Audi A8', '2020-01-24 15:54:59', '2020-01-24 15:54:59'),
(7, 12, 'BMW 7 Series', '2020-01-24 15:55:09', '2020-01-24 15:55:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_vehicle_type_id_foreign` (`vehicle_type_id`),
  ADD KEY `booking_user_id_foreign` (`user_id`);

--
-- Indexes for table `booking_billing_address`
--
ALTER TABLE `booking_billing_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_user`
--
ALTER TABLE `booking_user`
  ADD PRIMARY KEY (`booking_id`,`user_id`),
  ADD KEY `booking_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `booking_vehicle`
--
ALTER TABLE `booking_vehicle`
  ADD PRIMARY KEY (`booking_id`,`vehicle_id`),
  ADD KEY `booking_vehicle_vehicle_id_foreign` (`vehicle_id`);

--
-- Indexes for table `city_wise_pricing`
--
ALTER TABLE `city_wise_pricing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_faqs`
--
ALTER TABLE `cms_faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_home_page`
--
ALTER TABLE `cms_home_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_services`
--
ALTER TABLE `cms_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configurations`
--
ALTER TABLE `configurations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactuses`
--
ALTER TABLE `contactuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `drivers_user_id_foreign` (`user_id`);

--
-- Indexes for table `endusers`
--
ALTER TABLE `endusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extend_bookings`
--
ALTER TABLE `extend_bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `extend_bookings_booking_id_foreign` (`booking_id`);

--
-- Indexes for table `extraoptions`
--
ALTER TABLE `extraoptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `happy_clients`
--
ALTER TABLE `happy_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location_booking_hours`
--
ALTER TABLE `location_booking_hours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location_vehicle`
--
ALTER TABLE `location_vehicle`
  ADD PRIMARY KEY (`location_id`,`vehicle_id`),
  ADD KEY `location_vehicle_vehicle_id_foreign` (`vehicle_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `optionscategories`
--
ALTER TABLE `optionscategories`
  ADD PRIMARY KEY (`extraOption_id`,`vehicleCategory_id`),
  ADD KEY `optionscategories_vehiclecategory_id_foreign` (`vehicleCategory_id`);

--
-- Indexes for table `other_users`
--
ALTER TABLE `other_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `other_users_booking_id_foreign` (`booking_id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pricingbydistance`
--
ALTER TABLE `pricingbydistance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pricingbylocation`
--
ALTER TABLE `pricingbylocation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `selectedoptions`
--
ALTER TABLE `selectedoptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tax_created_by_foreign` (`created_by`),
  ADD KEY `tax_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `uploadeddocuments`
--
ALTER TABLE `uploadeddocuments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uploadeddocuments_user_id_foreign` (`user_id`),
  ADD KEY `uploadeddocuments_vehicle_id_foreign` (`vehicle_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_media`
--
ALTER TABLE `users_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_location`
--
ALTER TABLE `user_location`
  ADD PRIMARY KEY (`user_id`,`location_id`),
  ADD KEY `user_location_location_id_foreign` (`location_id`);

--
-- Indexes for table `user_user`
--
ALTER TABLE `user_user`
  ADD PRIMARY KEY (`user_id`,`creator_id`),
  ADD KEY `user_user_creator_id_foreign` (`creator_id`);

--
-- Indexes for table `vehiclecategory`
--
ALTER TABLE `vehiclecategory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehiclecategory_created_by_foreign` (`created_by`);

--
-- Indexes for table `vehiclecategory_vehiclesubtype`
--
ALTER TABLE `vehiclecategory_vehiclesubtype`
  ADD PRIMARY KEY (`category_id`,`subtype_id`),
  ADD KEY `vehiclecategory_vehiclesubtype_subtype_id_foreign` (`subtype_id`);

--
-- Indexes for table `vehiclemake`
--
ALTER TABLE `vehiclemake`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehiclemodel`
--
ALTER TABLE `vehiclemodel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehiclepricing`
--
ALTER TABLE `vehiclepricing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehiclepricing_category_id_foreign` (`category_id`),
  ADD KEY `vehiclepricing_created_by_foreign` (`created_by`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicles_vehiclecategory_id_foreign` (`vehicleCategory_id`);

--
-- Indexes for table `vehicletype`
--
ALTER TABLE `vehicletype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_subtypes`
--
ALTER TABLE `vehicle_subtypes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicle_subtypes_created_by_foreign` (`created_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=455;

--
-- AUTO_INCREMENT for table `booking_billing_address`
--
ALTER TABLE `booking_billing_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `city_wise_pricing`
--
ALTER TABLE `city_wise_pricing`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms_faqs`
--
ALTER TABLE `cms_faqs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms_home_page`
--
ALTER TABLE `cms_home_page`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `cms_services`
--
ALTER TABLE `cms_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `configurations`
--
ALTER TABLE `configurations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contactuses`
--
ALTER TABLE `contactuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `endusers`
--
ALTER TABLE `endusers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `extend_bookings`
--
ALTER TABLE `extend_bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `extraoptions`
--
ALTER TABLE `extraoptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `happy_clients`
--
ALTER TABLE `happy_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `location_booking_hours`
--
ALTER TABLE `location_booking_hours`
  MODIFY `id` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `other_users`
--
ALTER TABLE `other_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=274;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pricingbydistance`
--
ALTER TABLE `pricingbydistance`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pricingbylocation`
--
ALTER TABLE `pricingbylocation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `selectedoptions`
--
ALTER TABLE `selectedoptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uploadeddocuments`
--
ALTER TABLE `uploadeddocuments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1491;

--
-- AUTO_INCREMENT for table `users_media`
--
ALTER TABLE `users_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehiclecategory`
--
ALTER TABLE `vehiclecategory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vehiclemake`
--
ALTER TABLE `vehiclemake`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehiclemodel`
--
ALTER TABLE `vehiclemodel`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehiclepricing`
--
ALTER TABLE `vehiclepricing`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3184;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vehicletype`
--
ALTER TABLE `vehicletype`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicle_subtypes`
--
ALTER TABLE `vehicle_subtypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_vehicle_type_id_foreign` FOREIGN KEY (`vehicle_type_id`) REFERENCES `vehiclecategory` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `booking_vehicle`
--
ALTER TABLE `booking_vehicle`
  ADD CONSTRAINT `booking_vehicle_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_vehicle_vehicle_id_foreign` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `drivers`
--
ALTER TABLE `drivers`
  ADD CONSTRAINT `drivers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `extend_bookings`
--
ALTER TABLE `extend_bookings`
  ADD CONSTRAINT `extend_bookings_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `location_vehicle`
--
ALTER TABLE `location_vehicle`
  ADD CONSTRAINT `location_vehicle_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `location_vehicle_vehicle_id_foreign` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `optionscategories`
--
ALTER TABLE `optionscategories`
  ADD CONSTRAINT `optionscategories_extraoption_id_foreign` FOREIGN KEY (`extraOption_id`) REFERENCES `extraoptions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `optionscategories_vehiclecategory_id_foreign` FOREIGN KEY (`vehicleCategory_id`) REFERENCES `vehiclecategory` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `other_users`
--
ALTER TABLE `other_users`
  ADD CONSTRAINT `other_users_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tax`
--
ALTER TABLE `tax`
  ADD CONSTRAINT `tax_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tax_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `uploadeddocuments`
--
ALTER TABLE `uploadeddocuments`
  ADD CONSTRAINT `uploadeddocuments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `uploadeddocuments_vehicle_id_foreign` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_location`
--
ALTER TABLE `user_location`
  ADD CONSTRAINT `user_location_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_location_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_user`
--
ALTER TABLE `user_user`
  ADD CONSTRAINT `user_user_creator_id_foreign` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vehiclecategory`
--
ALTER TABLE `vehiclecategory`
  ADD CONSTRAINT `vehiclecategory_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vehiclecategory_vehiclesubtype`
--
ALTER TABLE `vehiclecategory_vehiclesubtype`
  ADD CONSTRAINT `vehiclecategory_vehiclesubtype_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `vehiclecategory` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vehiclecategory_vehiclesubtype_subtype_id_foreign` FOREIGN KEY (`subtype_id`) REFERENCES `vehicle_subtypes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vehiclepricing`
--
ALTER TABLE `vehiclepricing`
  ADD CONSTRAINT `vehiclepricing_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `vehiclecategory` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vehiclepricing_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `vehicles_vehiclecategory_id_foreign` FOREIGN KEY (`vehicleCategory_id`) REFERENCES `vehiclecategory` (`id`);

--
-- Constraints for table `vehicle_subtypes`
--
ALTER TABLE `vehicle_subtypes`
  ADD CONSTRAINT `vehicle_subtypes_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
