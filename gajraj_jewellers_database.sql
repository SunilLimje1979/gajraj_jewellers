-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 11, 2026 at 03:18 PM
-- Server version: 5.7.23-23
-- PHP Version: 8.1.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `solaltxh_gajraj_jewellers`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(80) NOT NULL,
  `name` varchar(120) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `name`, `password_hash`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '$2y$10$DbDQ3J7Ud3Gtig/v/3SSl../O2t3ESXJJmzbNMV/.KxqcLFGz.Qgm', 'active', '2026-08-05 10:05:20', '2026-08-05 10:05:20');

-- --------------------------------------------------------

--
-- Table structure for table `app_screenshots`
--

CREATE TABLE `app_screenshots` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `caption` varchar(160) DEFAULT NULL,
  `sort_order` int(11) DEFAULT '0',
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(180) NOT NULL,
  `certificate_type` varchar(120) DEFAULT NULL,
  `description` text,
  `thumbnail` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `download_enabled` tinyint(1) DEFAULT '1',
  `sort_order` int(11) DEFAULT '0',
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact_enquiries`
--

CREATE TABLE `contact_enquiries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(160) DEFAULT NULL,
  `mobile` varchar(30) DEFAULT NULL,
  `email` varchar(180) DEFAULT NULL,
  `subject` varchar(180) DEFAULT NULL,
  `message` text,
  `status` enum('new','contacted','resolved','closed') DEFAULT 'new',
  `internal_note` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` varchar(220) NOT NULL,
  `answer` text NOT NULL,
  `category` varchar(120) DEFAULT NULL,
  `sort_order` int(11) DEFAULT '0',
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `category`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Can I track monthly installments in the app?', 'Yes. Customers can view scheme details, installment history, and digital receipts in the official app.', 'App', 1, 'active', '2026-08-05 10:05:22', '2026-08-05 10:05:22'),
(2, 'Are scheme benefits fixed?', 'Scheme terms and benefits are determined by the jewellery shop and communicated as per current policy.', 'Scheme', 2, 'active', '2026-08-05 10:05:22', '2026-08-05 10:05:22');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(180) NOT NULL,
  `category` varchar(120) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text,
  `sort_order` int(11) DEFAULT '0',
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `category`, `image`, `description`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bangles', 'Bridal', 'uploads/gallery/ad15a1467edc11b786b409bc583a6598.avif', '', 0, 'active', '2026-08-05 07:11:53', '2026-08-05 07:11:53'),
(2, 'Traditional', '', 'uploads/gallery/6218ccec6f66ed8ad753073c073cbcd6.avif', '', 0, 'active', '2026-08-05 07:12:31', '2026-08-05 07:12:31'),
(3, 'Wedding', '', 'uploads/gallery/f726cc0479ab40c66baf8fbd0236173c.avif', '', 0, 'active', '2026-08-05 07:12:49', '2026-08-05 07:12:49');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_categories`
--

CREATE TABLE `gallery_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(120) DEFAULT NULL,
  `sort_order` int(11) DEFAULT '0',
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jewellery_categories`
--

CREATE TABLE `jewellery_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(160) NOT NULL,
  `slug` varchar(180) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text,
  `sort_order` int(11) DEFAULT '0',
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jewellery_categories`
--

INSERT INTO `jewellery_categories` (`id`, `name`, `slug`, `image`, `description`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Gold Jewellery', 'gold-jewellery', NULL, 'Elegant daily wear and festive gold pieces.', 1, 'active', '2026-08-05 10:05:22', '2026-08-05 10:05:22'),
(2, 'Bridal Jewellery', 'bridal-jewellery', NULL, 'Curated bridal ornaments for special occasions.', 2, 'active', '2026-08-05 10:05:22', '2026-08-05 10:05:22'),
(3, 'Mangalsutra', 'mangalsutra', NULL, 'Traditional and modern mangalsutra designs.', 3, 'active', '2026-08-05 10:05:22', '2026-08-05 10:05:22'),
(4, 'Bangles', 'bangles', NULL, 'Classic bangles and kada selections.', 4, 'active', '2026-08-05 10:05:22', '2026-08-05 10:05:22');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(120) DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `success` tinyint(1) DEFAULT '0',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `username`, `ip_address`, `success`, `created_at`) VALUES
(1, 'admin', '::1', 1, '2026-08-05 06:37:55'),
(2, 'admin', '2409:4090:2054:ec1a:5911:fc9e:9ffe:e6b9', 1, '2026-08-06 12:16:05'),
(3, 'admin', '2409:4090:2054:ec1a:5911:fc9e:9ffe:e6b9', 1, '2026-08-07 12:15:19');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(120) DEFAULT NULL,
  `location` varchar(80) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `label` varchar(120) NOT NULL,
  `url` varchar(255) NOT NULL,
  `target` varchar(20) DEFAULT '_self',
  `sort_order` int(11) DEFAULT '0',
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `label`, `url`, `target`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Home', '', '_self', 1, 'active', '2026-08-05 10:05:22', '2026-08-05 10:05:22'),
(2, 'About', 'about-us', '_self', 2, 'active', '2026-08-05 10:05:22', '2026-08-05 10:05:22'),
(4, 'Vault App', 'mobile-app', '_self', 4, 'active', '2026-08-05 10:05:22', '2026-08-07 12:17:15'),
(6, 'Contact', 'contact-us', '_self', 6, 'active', '2026-08-05 10:05:22', '2026-08-05 10:05:22');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(180) NOT NULL,
  `slug` varchar(180) NOT NULL,
  `content` mediumtext NOT NULL,
  `meta_title` varchar(180) DEFAULT NULL,
  `meta_description` text,
  `featured_image` varchar(255) DEFAULT NULL,
  `show_in_footer` tinyint(1) DEFAULT '1',
  `sort_order` int(11) DEFAULT '0',
  `status` enum('active','draft') DEFAULT 'active',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `content`, `meta_title`, `meta_description`, `featured_image`, `show_in_footer`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Gold Saving Scheme', 'gold-saving-scheme', '<p>Our monthly gold-saving scheme information is available through the official app. Customers can view installment records, payment history, maturity status, and redemption details.</p><p><strong>Disclaimer:</strong> Scheme terms, eligibility, payment schedule, maturity benefits, and redemption conditions are determined by the jewellery shop and may change as per shop policy.</p>', 'Gold Saving Scheme', 'Gold-saving scheme details and app download information.', NULL, 1, 1, 'active', '2026-08-05 10:05:21', '2026-08-05 10:05:21'),
(2, 'Privacy Policy', 'privacy-policy', '<h1>Privacy Policy &amp; Cookie Policy&nbsp;</h1><p>Effective Date: 1st January 2026&nbsp;<br>Issued by:&nbsp;Gajraj Jewellers and Saraf</p><p>&nbsp;</p><p>This Privacy Policy explains how we collect, use, store, and protect the personal information of\nusers (“User”, “You”, “Your”) who use the Gold Wallet mobile application (“App”) and related\nservices. By using the App, You consent to the practices described in this Policy.&nbsp;</p><h1><hr id=\"null\"></h1><h3>1. Information We Collect\nWe may collect the following types of information:&nbsp;</h3><p>● Personal Identification Data: Name, mobile number, email ID, date of birth, address,\nand government-issued ID (for KYC compliance).&nbsp;<br>● Transaction Data: Wallet purchases, payment details (including UPI transaction IDs),\nredemptions, and order history.<br>● Device &amp; Usage Data: IP address, device information, browser type, and in-app activity\nfor security and analytics.&nbsp;<br>● Support Queries: Any information you provide when contacting our customer support\nteam.&nbsp;</p><h3>2. How We Use Your Information\nWe may use your information for:&nbsp;</h3><p>● Processing and confirming your gold purchases and wallet redemptions.&nbsp;<br>● KYC verification and compliance with legal requirements.&nbsp;<br>● Maintaining transaction records and preventing fraud.&nbsp;<br>● Providing customer support and responding to your queries.&nbsp;<br>● Sending important service updates, alerts, and policy changes.&nbsp;<br>● Internal audits, data analysis, and service improvements.&nbsp;</p><h3>3. Sharing of Information&nbsp;</h3><p>We do not sell or rent your personal data. However, we may share information with:&nbsp;</p><p>● Payment service providers &amp; banks (to process UPI transactions).&nbsp;<br>● Regulatory authorities if required by law.&nbsp;<br>● Technology partners who assist us in operating the App (under confidentiality\nobligations).&nbsp;</p><h3>4. Data Security&nbsp;</h3><p>● We implement reasonable security practices (encryption, firewalls, access controls) to\nsafeguard your data.&nbsp;<br>● However, we cannot guarantee 100% security of data transmitted online. Users are\nadvised to keep login credentials confidential.&nbsp;</p><h3>5. Data Retention&nbsp;</h3><p>● We retain your personal data only as long as necessary for legal, regulatory, and\nbusiness purposes.&nbsp;<br>● Transaction records may be retained as per applicable financial and tax laws in India.&nbsp;</p><h3>6. Your Rights\nYou have the right to:&nbsp;</h3><p>● Access and review your personal data.&nbsp;<br>● Correct or update inaccurate information.&nbsp;<br>● Request deletion of your data (subject to legal retention requirements).\n● Withdraw consent for non-essential data usage.\nRequests may be submitted via the “Contact Us” section of the App.&nbsp;</p><h3>7. Children’s Privacy&nbsp;</h3><p>The Gold Wallet is not intended for individuals under the age of 18. If such data is inadvertently\ncollected, it will be deleted upon discovery.&nbsp;</p><h3>8. Changes to Policy&nbsp;</h3><p>We reserve the right to update this Privacy Policy at any time. Updates will be published on the\nApp, and continued use will signify acceptance.</p><h1>Cookie Policy&nbsp;</h1><p>Effective Date: 1st January 2026</p><p>This Cookie Policy explains how Gajraj Jewellers and Saraf uses cookies and similar technologies on\nthe Gold Wallet App and website.&nbsp;</p><p><br><h3>1. What Are Cookies?&nbsp;</h3></p><p>Cookies are small data files stored on your device when you access the App or website. They\nhelp us improve functionality, personalize experience, and analyze usage.&nbsp;</p><p><br><h3>2. Types of Cookies We Use&nbsp;</h3>● Essential Cookies: Required for secure login, transactions, and navigation.&nbsp;<br>● Performance Cookies: Collect anonymous usage data to help us improve services.&nbsp;<br>● Functionality Cookies: Remember user preferences such as language, login session.&nbsp;<br>● Analytics &amp; Marketing Cookies (if applicable): Track interactions for insights and\noptional promotional offers.&nbsp;</p><p><br><h3>3. How We Use Cookies\nWe use cookies to:&nbsp;</h3>● Enable secure and smooth wallet transactions.&nbsp;<br>● Remember your session for faster login.&nbsp;<br>● Monitor app performance and detect technical issues.<br>● Improve user experience and services.&nbsp;</p><p><br><h3>4. Managing Cookies&nbsp;</h3>● You can control or disable cookies in your device/app settings.&nbsp;<br>● Disabling cookies may limit some functionality of the App.&nbsp;</p><p><br><h3>5. Updates to Cookie Policy&nbsp;</h3></p><p>We may update this Cookie Policy from time to time. The latest version will always be available\nin the App/website.&nbsp;</p><p><br><h3>9. Contact Us&nbsp;</h3></p><p>For any questions,&nbsp;please contact:&nbsp;</p><p>Gajraj Jewellers and Saraf</p><p>Main Bazaar Road, Pune, Maharashtra, India&nbsp;</p><p>+91 98765 43210&nbsp;</p><p>care@multigold.example</p>', 'Privacy Policy', 'Privacy policy for the jewellery app website.', NULL, 1, 2, 'active', '2026-08-05 10:05:21', '2026-08-05 10:05:21'),
(3, 'Terms and Conditions', 'terms-and-conditions', '<h1>Terms &amp; Conditions</h1>\n\n<p><strong>Gold Vault</strong></p>\n\n<p>\nEffective Date: 1st January 2026<br>\nIssued by: Gajraj Jewellers and Saraf (\"Jeweller\", \"We\", \"Us\", \"Our\")\n</p>\n\n<p>\nThese Terms &amp; Conditions (\"Terms\") govern the use of the Gold Vault platform operated by the Jeweller, which enables registered customers (\"User\", \"You\", \"Your\") to digitally purchase, accumulate, and redeem gold through the mobile application (\"App\"). By registering, accessing, or using the Gold Vault, You agree to be bound by these Terms.\n</p>\n\n<h1><hr></h1>\n\n<h3>1. Eligibility</h3>\n\n<p>\n<strong>1.1</strong> The Gold Vault facility is available only to:\n</p>\n\n<p>\n● Individuals who are Indian residents above the age of 18 years; and<br>\n● Who complete registration and provide valid Know Your Customer (KYC) details as required under applicable laws.\n</p>\n\n<p>\n<strong>1.2</strong> The Jeweller reserves the right to deny or suspend membership if the provided information is false, incomplete, or non-compliant with regulatory requirements.\n</p>\n\n<h3>2. Registration &amp; Membership</h3>\n\n<p>\n<strong>2.1</strong> By signing up on the App, You become a registered member of the Gold Vault Club and a customer of the Jeweller.\n</p>\n\n<p>\n<strong>2.2</strong> You are responsible for maintaining the confidentiality of Your login credentials and all activities carried out under Your account.\n</p>\n\n<h3>3. Gold Purchase &amp; Payment</h3>\n\n<p>\n<strong>3.1</strong> Users may purchase gold through the App using Unified Payments Interface (UPI) only.<br>\n<strong>3.2</strong> A minimum purchase amount of INR 100 is required. There is no upper limit, subject to applicable laws and the Jeweller\'s acceptance.<br>\n<strong>3.3</strong> Orders shall be processed only after successful confirmation of payment from the bank.<br>\n<strong>3.4</strong> Users are advised to enter the Transaction ID in the App for faster reconciliation of payments.\n</p>\n\n<h3>4. Wallet Balance &amp; Redemption</h3>\n\n<p>\n<strong>4.1</strong> The purchased gold shall be credited to the User\'s Gold Wallet in grams (gms).<br>\n<strong>4.2</strong> The Wallet balance can only be redeemed against jewellery purchases at the Jeweller\'s physical store.<br>\n<strong>4.3</strong> Redemption requires a minimum balance of <strong>1.0000 gms</strong> of gold in the Wallet. Balances below this threshold cannot be redeemed.<br>\n<strong>4.4</strong> Users must raise a withdrawal request at least one (1) day in advance through the App before the intended redemption or delivery date.<br>\n<strong>4.5</strong> Delivery and redemption shall be fulfilled only during the Jeweller\'s official store working hours. No home delivery or off-site service is provided.\n</p>\n\n<h3>5. Restrictions</h3>\n\n<p>\n<strong>5.1</strong> The Wallet balance:\n</p>\n\n<p>\n● Cannot be converted into cash;<br>\n● Cannot be transferred to any bank account;<br>\n● Cannot be transferred to another jeweller, individual, or platform;<br>\n● Cannot be exchanged for any loyalty rewards or equivalents.\n</p>\n\n<h3>6. Gold Pricing &amp; Valuation</h3>\n\n<p>\n<strong>6.1</strong> The price of gold for purchases and redemptions shall be based on the prevailing gold rate determined by the Jeweller at the time of transaction.<br>\n<strong>6.2</strong> Prices may vary from market or online bullion rates due to factors such as making charges, taxes, and business policies.\n</p>\n\n<h3>7. Customer Support &amp; Queries</h3>\n\n<p>\n<strong>7.1</strong> Users may raise queries through the App at any time. Queries will be addressed by the Jeweller\'s support team during store working hours.<br>\n<strong>7.2</strong> Users may also contact support via the phone number listed in the <strong>Contact Us</strong> section of the App.\n</p>\n\n<h3>8. Risks &amp; Disclaimers</h3>\n\n<p>\n<strong>8.1</strong> Gold prices are subject to fluctuations due to market conditions. The Jeweller is not liable for any notional loss in the Wallet value arising from such fluctuations.<br>\n<strong>8.2</strong> The Gold Vault is not an investment product or financial scheme but a digital facility to accumulate gold for jewellery redemption.<br>\n<strong>8.3</strong> The Jeweller shall not be responsible for delays or failures caused by payment gateways, banking networks, internet connectivity, or force majeure events.\n</p>\n\n<h3>9. Refunds &amp; Cancellations</h3>\n\n<p>\n<strong>9.1</strong> Once a gold purchase is successfully processed, no cancellation or refund shall be permitted.<br>\n<strong>9.2</strong> Any mistaken or duplicate transactions must be reported immediately, and resolution will be at the sole discretion of the Jeweller.\n</p>\n\n<h3>10. Limitation of Liability</h3>\n\n<p>\n<strong>10.1</strong> The Jeweller\'s liability is limited strictly to the quantity of gold credited in the User\'s Wallet.\n</p>\n\n<p>\n<strong>10.2</strong> The Jeweller shall not be liable for:\n</p>\n\n<p>\n● Any indirect, incidental, or consequential losses;<br>\n● Loss of profit or opportunity;<br>\n● Errors caused by third-party systems (banks, UPI providers, payment gateways, etc.).\n</p>\n\n<h3>11. Governing Law &amp; Jurisdiction</h3>\n\n<p>\n<strong>11.1</strong> These Terms shall be governed by and construed in accordance with the laws of India.<br>\n<strong>11.2</strong> Any disputes arising under these Terms shall be subject to the exclusive jurisdiction of the courts at Pune, Maharashtra, where the Jeweller\'s principal place of business is located.\n</p>\n\n<h3>12. Amendments</h3>\n\n<p>\n<strong>12.1</strong> The Jeweller reserves the right to amend, modify, or update these Terms at any time. Updated Terms shall be published in the App, and continued use of the Gold Vault shall constitute acceptance of the revised Terms.\n</p>\n\n<h3>13. Contact Us</h3>\n\n<p>\nFor any questions regarding these Terms &amp; Conditions, please contact:\n</p>\n\n<p><strong>Gajraj Jewellers and Saraf</strong></p>\n\n<p>Main Bazaar Road, Pune, Maharashtra, India</p>\n\n<p>+91 98765 43210</p>\n\n<p>care@multigold.example</p>', 'Terms and Conditions', 'Terms and conditions.', NULL, 1, 3, 'active', '2026-08-05 10:05:21', '2026-08-05 10:05:21'),
(4, 'Shipping Policy', 'shipping-policy', '<p>This website does not provide online checkout. Shipping, where applicable, is handled directly by the jewellery shop.</p>', 'Shipping Policy', 'Shipping policy.', NULL, 1, 4, 'active', '2026-08-05 10:05:21', '2026-08-05 10:05:21'),
(5, 'Return Policy', 'return-policy', '<p>Returns are governed by shop policy, product condition, invoice details, and applicable regulations.</p>', 'Return Policy', 'Return policy.', NULL, 1, 5, 'active', '2026-08-05 10:05:21', '2026-08-05 10:05:21'),
(6, 'Refund Policy', 'refund-policy', '<h1>Refund &amp; Cancellation Policy</h1>\n\n<p>\nEffective Date: 1st January 2026<br>\nIssued by: Gajraj Jewellers and Saraf (\"Jeweller\", \"We\", \"Us\", \"Our\")\n</p>\n\n<p>\nThis Refund &amp; Cancellation Policy (\"Policy\") applies to all Users (\"User\", \"You\", \"Your\") of the Gold Wallet mobile application (\"App\") operated by the Jeweller. By purchasing gold through the Gold Wallet, You agree to this Policy.\n</p>\n\n<h1><hr></h1>\n\n<h3>1. Cancellation of Orders</h3>\n\n<p>\n<strong>1.1</strong> Once a gold purchase order is placed and payment is successfully processed, the transaction cannot be cancelled by the User.\n</p>\n\n<p>\n<strong>1.2</strong> The Jeweller does not allow cancellations after order confirmation as gold prices are subject to market fluctuations.\n</p>\n\n<h3>2. Refunds</h3>\n\n<p>\n<strong>2.1</strong> As per the nature of the product, no refund will be provided once a gold purchase is credited to the User\'s Wallet.\n</p>\n\n<p>\n<strong>2.2</strong> Refunds will only be permitted under the following exceptional circumstances:\n</p>\n\n<p>\n● Payment was debited from the User\'s account but not received by the Jeweller due to a technical error.<br>\n● Duplicate payment made by the User for the same order.<br>\n● Transaction failure where the Wallet balance was not updated.\n</p>\n\n<p>\n<strong>2.3</strong> In such cases, Users must raise a refund request through the App or customer support within <strong>3 working days</strong> of the transaction.\n</p>\n\n<h3>3. Processing of Refunds</h3>\n\n<p>\n<strong>3.1</strong> All eligible refunds will be processed only after due verification and reconciliation with the payment gateway or bank.<br>\n<strong>3.2</strong> Refunds, where applicable, will be made to the original source of payment (UPI account) within <strong>7–10 working days</strong>, depending on bank or payment provider timelines.<br>\n<strong>3.3</strong> The Jeweller shall not be liable for delays caused by banking networks or third-party payment providers.\n</p>\n\n<h3>4. Redemption &amp; Delivery</h3>\n\n<p>\n<strong>4.1</strong> Gold accumulated in the Wallet is redeemable only against jewellery purchases at the Jeweller\'s shop and cannot be refunded in cash or transferred to any bank account.<br>\n<strong>4.2</strong> Users must follow the withdrawal and redemption process as defined in the Terms &amp; Conditions.\n</p>\n\n<h3>5. Disputes</h3>\n\n<p>\n<strong>5.1</strong> Any disputes related to payments, refunds, or cancellations must be reported to the Jeweller\'s support team within <strong>7 working days</strong> of the transaction.<br>\n<strong>5.2</strong> The Jeweller\'s decision on the validity of a refund claim shall be final and binding.\n</p>\n\n<h3>6. Contact for Refund Queries</h3>\n\n<p>\nFor any refund or cancellation-related queries, please contact:\n</p>\n\n<p><strong>Gajraj Jewellers and Saraf</strong></p>\n\n<p>Main Bazaar Road, Pune, Maharashtra, India</p>\n\n<p>+91 98765 43210</p>\n\n<p>care@multigold.example</p>', 'Refund Policy', 'Refund policy.', NULL, 1, 6, 'active', '2026-08-05 10:05:21', '2026-08-05 10:05:21'),
(7, 'Jewellery Care Policy', 'jewellery-care-policy', '<p>Store jewellery separately, avoid chemicals, and visit the shop for professional cleaning and inspection.</p>', 'Jewellery Care Policy', 'Jewellery care guidance.', NULL, 1, 7, 'active', '2026-08-05 10:05:21', '2026-08-05 10:05:21'),
(8, 'Disclaimer', 'disclaimer', '<h1>Risk Disclaimer Notice</h1>\n\n<p>\nIssued by: Gajraj Jewellers and Saraf (\"Jeweller\")<br>\nApplicable to: Gold Wallet Scheme\n</p>\n\n<p>\nThis Risk Disclaimer Notice applies to all users of the Gold Wallet Scheme. By using the Gold Wallet, You acknowledge that You have read, understood, and accepted the risks described in this Notice.\n</p>\n\n<h1><hr></h1>\n\n<h3>1. Nature of the Gold Wallet</h3>\n\n<p>\n<strong>1.1</strong> The Gold Wallet is a facility for the digital purchase and accumulation of gold offered by the Jeweller, exclusively for redemption against jewellery purchases at the Jeweller\'s physical store.\n</p>\n\n<h3>2. Not an Investment Product</h3>\n\n<p>\n<strong>2.1</strong> The Gold Wallet is <strong>not</strong> a financial investment, savings scheme, deposit, or chit fund.<br>\n<strong>2.2</strong> The Jeweller does not offer or guarantee any interest, dividend, or return on the gold purchased through the Wallet.\n</p>\n\n<h3>3. Gold Price Fluctuation</h3>\n\n<p>\n<strong>3.1</strong> Gold prices are subject to market fluctuations. The value of gold credited in Your Wallet may increase or decrease depending on prevailing market conditions.<br>\n<strong>3.2</strong> The Jeweller shall not be liable for any notional loss arising from such price fluctuations.\n</p>\n\n<h3>4. Wallet Restrictions</h3>\n\n<p>\n<strong>4.1</strong> Wallet balances cannot be encashed, refunded, or transferred to a bank account, third party, or other jewellers, except as specifically permitted under the Refund &amp; Cancellation Policy.\n</p>\n\n<h3>5. Redemption Conditions</h3>\n\n<p>\n<strong>5.1</strong> Redemption of gold is strictly subject to the Terms &amp; Conditions, including minimum redemption requirements, advance withdrawal requests, and the Jeweller\'s official store working hours.\n</p>\n\n<h3>6. Limitation of Responsibility</h3>\n\n<p>\n<strong>6.1</strong> The Jeweller shall not be responsible for delays or failures arising due to:\n</p>\n\n<p>\n● Banking or payment system errors.<br>\n● Internet or mobile connectivity issues.<br>\n● Force majeure events beyond the Jeweller\'s reasonable control.\n</p>\n\n<h3>7. Customer Acknowledgement</h3>\n\n<p>\n<strong>7.1</strong> Customers are advised to carefully read and understand the Terms &amp; Conditions, Refund &amp; Cancellation Policy, Privacy Policy, and Cookie Policy before participating in the Gold Wallet Scheme.\n</p>\n\n<p>\n<strong>7.2</strong> By using the Gold Wallet, You acknowledge that You have read and understood this Risk Disclaimer Notice and agree to the inherent risks associated with gold price fluctuations.\n</p>\n\n<h3>8. Contact Us</h3>\n\n<p>\nFor any questions regarding this Risk Disclaimer Notice, please contact:\n</p>\n\n<p><strong>Gajraj Jewellers and Saraf</strong></p>\n\n<p>Main Bazaar Road, Pune, Maharashtra, India</p>\n\n<p>+91 98765 43210</p>\n\n<p>care@multigold.example</p>', 'Disclaimer', 'Website disclaimer.', NULL, 1, 8, 'active', '2026-08-05 10:05:21', '2026-08-05 10:05:21');

-- --------------------------------------------------------

--
-- Table structure for table `scheme_steps`
--

CREATE TABLE `scheme_steps` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(160) DEFAULT NULL,
  `description` text,
  `sort_order` int(11) DEFAULT '0',
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scheme_steps`
--

INSERT INTO `scheme_steps` (`id`, `title`, `description`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Download the app', 'Install the official Android or iOS app.', 1, 'active', '2026-08-05 10:05:22', '2026-08-05 10:05:22'),
(2, 'Register or login', 'Access your customer profile securely.', 2, 'active', '2026-08-05 10:05:22', '2026-08-05 10:05:22'),
(3, 'Join a scheme', 'Select available shop scheme options.', 3, 'active', '2026-08-05 10:05:22', '2026-08-05 10:05:22'),
(4, 'Pay monthly', 'Track installment records and receipts.', 4, 'active', '2026-08-05 10:05:22', '2026-08-05 10:05:22'),
(5, 'Redeem as per terms', 'Complete redemption according to shop policy.', 5, 'active', '2026-08-05 10:05:22', '2026-08-05 10:05:22');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `setting_key` varchar(120) NOT NULL,
  `setting_value` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `setting_key`, `setting_value`, `created_at`, `updated_at`) VALUES
(1, 'shop_name', 'Gajraj Jewellers and Saraf', '2026-08-05 10:05:21', '2026-08-07 12:16:43'),
(2, 'tagline', 'Jewellery, Trust and Gold Savings', '2026-08-05 10:05:21', '2026-08-07 12:16:43'),
(3, 'establishment_year', '1998', '2026-08-05 10:05:21', '2026-08-07 12:16:43'),
(4, 'short_description', 'Gajraj Jewellers and Saraf brings trusted jewellery service with app-enabled gold-saving scheme access.', '2026-08-05 10:05:21', '2026-08-07 12:16:43'),
(5, 'shop_full_description', 'Gajraj Jewellers and Saraf serves families with BIS hallmarked jewellery, careful guidance, and transparent scheme records. Our official mobile app helps customers join monthly gold-saving schemes, track installments, view digital receipts, and stay updated with shop announcements.', '2026-08-05 10:05:21', '2026-08-05 10:05:21'),
(6, 'email', 'care@multigold.example', '2026-08-05 10:05:21', '2026-08-07 12:16:43'),
(7, 'phone', '+91 98765 43210', '2026-08-05 10:05:21', '2026-08-07 12:16:43'),
(8, 'alternate_phone', '+91 98765 43211', '2026-08-05 10:05:21', '2026-08-07 12:16:43'),
(9, 'whatsapp', '919876543210', '2026-08-05 10:05:21', '2026-08-07 12:16:43'),
(10, 'address', 'Main Bazaar Road, Pune, Maharashtra, India', '2026-08-05 10:05:21', '2026-08-07 12:16:43'),
(11, 'business_hours', 'Mon-Sat 10:30 AM - 8:30 PM', '2026-08-05 10:05:21', '2026-08-07 12:16:43'),
(12, 'gst_number', '27ABCDE1234F1Z5', '2026-08-05 10:05:21', '2026-08-07 12:16:43'),
(13, 'bis_details', 'BIS Hallmarked Jewellery Available', '2026-08-05 10:05:21', '2026-08-07 12:16:43'),
(14, 'android_url', '#', '2026-08-05 10:05:21', '2026-08-07 12:16:43'),
(15, 'ios_url', '#', '2026-08-05 10:05:21', '2026-08-07 12:16:43'),
(16, 'android_enabled', '1', '2026-08-05 10:05:21', '2026-08-07 12:16:43'),
(17, 'ios_enabled', '1', '2026-08-05 10:05:21', '2026-08-07 12:16:43'),
(18, 'app_heading', 'Manage your gold-saving scheme from your phone', '2026-08-05 10:05:21', '2026-08-07 12:16:43'),
(19, 'app_short_description', 'Join schemes, track installments, download receipts, and receive shop updates securely.', '2026-08-05 10:05:21', '2026-08-07 12:16:43'),
(20, 'primary_color', '#8306A8', '2026-08-05 10:05:21', '2026-08-07 12:16:43'),
(21, 'secondary_color', '#E4B83E', '2026-08-05 10:05:21', '2026-08-07 12:16:43'),
(22, 'accent_color', '#F7EFFB', '2026-08-05 10:05:21', '2026-08-07 12:16:43'),
(23, 'heading_color', '#211126', '2026-08-05 10:05:21', '2026-08-07 12:16:43'),
(24, 'text_color', '#5E5064', '2026-08-05 10:05:21', '2026-08-07 12:16:43'),
(25, 'footer_color', '#15051D', '2026-08-05 10:05:21', '2026-08-07 12:16:43'),
(26, 'button_radius', '24', '2026-08-05 10:05:21', '2026-08-07 12:16:43'),
(27, 'card_radius', '8', '2026-08-05 10:05:21', '2026-08-07 12:16:43'),
(28, 'announcement_enabled', '1', '2026-08-05 10:05:21', '2026-08-07 12:16:43'),
(29, 'announcement_text', 'Download our vault app and start your gold-saving journey today', '2026-08-05 10:05:21', '2026-08-07 12:16:43'),
(30, 'announcement_link', '#download', '2026-08-05 10:05:21', '2026-08-07 12:16:43'),
(31, 'announcement_bg', '#8306A8', '2026-08-05 10:05:21', '2026-08-07 12:16:43'),
(32, 'announcement_text_color', '#FFFFFF', '2026-08-05 10:05:21', '2026-08-07 12:16:43'),
(33, 'logo', 'uploads/logo/gajraj-logo-mark.avif', '2026-08-05 10:05:21', '2026-08-05 10:05:21'),
(34, 'full_logo', 'uploads/logo/gajraj-logo-full.avif', '2026-08-05 10:05:21', '2026-08-05 10:05:21'),
(35, 'meta_description', 'Premium jewellery shop app landing page for gold-saving and jewellery installment schemes.', '2026-08-05 10:05:21', '2026-08-07 12:16:43'),
(36, 'maps_embed', '', '2026-08-05 07:17:56', '2026-08-07 12:16:43'),
(37, 'maps_url', '', '2026-08-05 07:17:56', '2026-08-07 12:16:43'),
(38, 'facebook', '', '2026-08-05 07:17:56', '2026-08-07 12:16:43'),
(39, 'instagram', '', '2026-08-05 07:17:56', '2026-08-07 12:16:43'),
(40, 'youtube', '', '2026-08-05 07:17:56', '2026-08-07 12:16:43'),
(41, 'linkedin', '', '2026-08-05 07:17:56', '2026-08-07 12:16:43'),
(42, 'twitter', '', '2026-08-05 07:17:56', '2026-08-07 12:16:43'),
(43, 'pinterest', '', '2026-08-05 07:17:56', '2026-08-07 12:16:43'),
(44, 'meta_title', '', '2026-08-05 07:17:56', '2026-08-07 12:16:43'),
(45, 'canonical_base_url', '', '2026-08-05 07:17:56', '2026-08-07 12:16:43'),
(46, 'app_image', 'uploads/app/fbf0d22de44b65e8192f0ec958761003.avif', '2026-08-05 07:17:56', '2026-08-05 07:17:56');

-- --------------------------------------------------------

--
-- Table structure for table `shop_trust_points`
--

CREATE TABLE `shop_trust_points` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(160) DEFAULT NULL,
  `description` text,
  `icon` varchar(120) DEFAULT NULL,
  `sort_order` int(11) DEFAULT '0',
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop_trust_points`
--

INSERT INTO `shop_trust_points` (`id`, `title`, `description`, `icon`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'BIS Hallmarked Jewellery', 'Clear purity guidance and trusted jewellery standards.', 'fa-solid fa-certificate', 1, 'active', '2026-08-05 10:05:22', '2026-08-05 10:05:22'),
(2, 'Transparent Scheme Tracking', 'Customers can check installments and records in the app.', 'fa-solid fa-receipt', 2, 'active', '2026-08-05 10:05:22', '2026-08-05 10:05:22'),
(3, 'Personal Support', 'Our team helps with schemes, redemption, and jewellery selection.', 'fa-solid fa-headset', 3, 'active', '2026-08-05 10:05:22', '2026-08-05 10:05:22');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `desktop_image` varchar(255) DEFAULT NULL,
  `mobile_image` varchar(255) DEFAULT NULL,
  `heading` varchar(180) NOT NULL,
  `subheading` varchar(180) DEFAULT NULL,
  `description` text,
  `primary_text` varchar(80) DEFAULT NULL,
  `primary_link` varchar(255) DEFAULT NULL,
  `secondary_text` varchar(80) DEFAULT NULL,
  `secondary_link` varchar(255) DEFAULT NULL,
  `text_align` enum('left','center') DEFAULT 'left',
  `overlay_opacity` decimal(3,2) DEFAULT '0.45',
  `sort_order` int(11) DEFAULT '0',
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `desktop_image`, `mobile_image`, `heading`, `subheading`, `description`, `primary_text`, `primary_link`, `secondary_text`, `secondary_link`, `text_align`, `overlay_opacity`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'uploads/sliders/ce87f3bdecf9f52f60ee2d4b0c116653.avif', NULL, 'Save and build your gold future', 'Our Vault App', 'Join gold-saving schemes, track installments, view receipts, and manage progress from your phone.', 'Download App', '#download', 'View Scheme', 'gold-saving-scheme', 'left', 0.45, 1, 'active', '2026-08-05 10:05:21', '2026-08-07 12:16:21');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(160) NOT NULL,
  `review` text NOT NULL,
  `rating` tinyint(4) DEFAULT '5',
  `customer_image` varchar(255) DEFAULT NULL,
  `city` varchar(120) DEFAULT NULL,
  `sort_order` int(11) DEFAULT '0',
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `customer_name`, `review`, `rating`, `customer_image`, `city`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Priya Shah', 'The app makes installment tracking very clear and easy for our family.', 5, NULL, 'Pune', 1, 'active', '2026-08-05 10:05:22', '2026-08-05 10:05:22'),
(2, 'Amit Patil', 'Trustworthy shop and helpful staff. Digital receipts are very convenient.', 5, NULL, 'Mumbai', 2, 'active', '2026-08-05 10:05:22', '2026-08-05 10:05:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `app_screenshots`
--
ALTER TABLE `app_screenshots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`),
  ADD KEY `sort_order` (`sort_order`);

--
-- Indexes for table `contact_enquiries`
--
ALTER TABLE `contact_enquiries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`),
  ADD KEY `sort_order` (`sort_order`);

--
-- Indexes for table `gallery_categories`
--
ALTER TABLE `gallery_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jewellery_categories`
--
ALTER TABLE `jewellery_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `status` (`status`),
  ADD KEY `sort_order` (`sort_order`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `created_at` (`created_at`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`),
  ADD KEY `sort_order` (`sort_order`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `status` (`status`),
  ADD KEY `sort_order` (`sort_order`);

--
-- Indexes for table `scheme_steps`
--
ALTER TABLE `scheme_steps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `setting_key` (`setting_key`);

--
-- Indexes for table `shop_trust_points`
--
ALTER TABLE `shop_trust_points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`),
  ADD KEY `sort_order` (`sort_order`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `app_screenshots`
--
ALTER TABLE `app_screenshots`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_enquiries`
--
ALTER TABLE `contact_enquiries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gallery_categories`
--
ALTER TABLE `gallery_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jewellery_categories`
--
ALTER TABLE `jewellery_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `scheme_steps`
--
ALTER TABLE `scheme_steps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `shop_trust_points`
--
ALTER TABLE `shop_trust_points`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
