-- phpMyAdmin SQL Dump
-- version 4.6.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 07, 2016 at 03:36 PM
-- Server version: 5.6.27
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `postgah.com`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing_invoice`
--

CREATE TABLE `billing_invoice` (
  `id` int(11) NOT NULL COMMENT 'شناسه',
  `user_id` int(11) NOT NULL COMMENT 'شناسه کاربر',
  `order_table` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'جدول سفارش',
  `order_id` int(11) NOT NULL COMMENT 'شناسه سفارش',
  `cost` int(11) NOT NULL COMMENT 'مبلغ',
  `method` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'درگاه پرداخت',
  `transaction` varchar(1024) COLLATE utf8_persian_ci NOT NULL COMMENT 'تراکنش',
  `date` int(11) NOT NULL COMMENT 'تاریخ پرداخت',
  `date_created` int(11) NOT NULL COMMENT 'تاریخ ثبت',
  `hide` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `billing_invoice`
--

INSERT INTO `billing_invoice` (`id`, `user_id`, `order_table`, `order_id`, `cost`, `method`, `transaction`, `date`, `date_created`, `hide`) VALUES
(1, 7, 'item_plan_duration', 1, 3000, 'wallet', 'wallet', 1469377805, 1469377800, 0),
(2, 7, 'item_plan_duration', 2, 3000, 'wallet', 'wallet', 1469377821, 1469377816, 0),
(3, 7, 'item_plan_duration', 3, 4000, '', '', 0, 1469378746, 0),
(4, 7, 'item_plan_duration', 4, 12000, 'wallet', 'wallet', 1469379068, 1469379054, 0),
(5, 7, 'item_plan_duration', 5, 4000, 'wallet', 'wallet', 1469811195, 1469807464, 0),
(6, 7, 'item_plan_duration', 6, 3000, 'wallet', 'wallet', 1469811524, 1469811517, 0),
(7, 7, '', 0, 1000, 'manual2', '', 0, 1469928197, 0),
(8, 7, '', 0, 1000, 'manual2', '', 0, 1469928203, 0),
(9, 7, '', 0, 1000, 'manual2', '', 0, 1469928237, 0),
(10, 7, '', 0, 1000, 'manual2', '', 0, 1469928274, 0),
(11, 7, '', 0, 1000, 'manual2', '', 0, 1469928305, 0),
(12, 7, '', 0, 12000, 'manual2', '98iuhkhkjhkh::1470139200', 0, 1469928326, 0),
(13, 7, '', 0, 90000, 'mellat', '', 0, 1469928445, 0);

-- --------------------------------------------------------

--
-- Table structure for table `billing_method`
--

CREATE TABLE `billing_method` (
  `id` int(11) NOT NULL,
  `method` text COLLATE utf8_persian_ci NOT NULL,
  `unit` text COLLATE utf8_persian_ci NOT NULL,
  `terminal_id` text COLLATE utf8_persian_ci NOT NULL,
  `terminal_user` text COLLATE utf8_persian_ci NOT NULL,
  `terminal_pass` text COLLATE utf8_persian_ci NOT NULL,
  `c1` text COLLATE utf8_persian_ci NOT NULL,
  `c2` text COLLATE utf8_persian_ci NOT NULL,
  `c3` text COLLATE utf8_persian_ci NOT NULL,
  `c4` text COLLATE utf8_persian_ci NOT NULL,
  `c5` text COLLATE utf8_persian_ci NOT NULL,
  `hide` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `billing_method`
--

INSERT INTO `billing_method` (`id`, `method`, `unit`, `terminal_id`, `terminal_user`, `terminal_pass`, `c1`, `c2`, `c3`, `c4`, `c5`, `hide`) VALUES
(1, 'mellat', '0.1', '111111', 'username00', '856305402', '', '', '', '', '', 0),
(2, 'manual1', '', '', '', '', 'بانک ملت', '1234567890', '6104666655554444', '', 'offline', 0),
(3, 'manual2', '', '', '', '', 'بانک صادرات', '8123212345', '6037691044443333', '', 'offline', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cat`
--

CREATE TABLE `cat` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'عنوان',
  `desc` text COLLATE utf8_persian_ci NOT NULL COMMENT 'توضیحات',
  `kw` text COLLATE utf8_persian_ci NOT NULL COMMENT 'کلمات کلیدی',
  `parent` int(11) NOT NULL,
  `cat` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `ord` int(11) NOT NULL,
  `logo` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `flag` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `cat`
--

INSERT INTO `cat` (`id`, `name`, `desc`, `kw`, `parent`, `cat`, `ord`, `logo`, `flag`) VALUES
(12, 'زیر دیپلم', '', '', 0, 'academic_degree', 0, '', 1),
(13, 'دیپلم', '', '', 0, 'academic_degree', 0, '', 1),
(14, 'فوق دیپلم', '', '', 0, 'academic_degree', 0, '', 1),
(15, 'لیسانس', '', '', 0, 'academic_degree', 0, '', 1),
(16, 'فوق لیسانس', '', '', 0, 'academic_degree', 0, '', 1),
(17, 'دکترا', '', '', 0, 'academic_degree', 0, '', 1),
(18, 'مایل به جواب دادن نیستم', '', '', 0, 'academic_degree', 0, '', 1),
(19, 'شاغل', '', '', 0, 'emplyment_status', 0, '', 1),
(20, 'بدون شغل', '', '', 0, 'emplyment_status', 0, '', 1),
(21, 'در جستجوی کار', '', '', 0, 'emplyment_status', 0, '', 1),
(22, 'دانش آموز', '', '', 0, 'emplyment_status', 0, '', 1),
(23, 'دانشجو', '', '', 0, 'emplyment_status', 0, '', 1),
(24, 'بازنشسته', '', '', 0, 'emplyment_status', 0, '', 1),
(25, 'خانه دار', '', '', 0, 'emplyment_status', 0, '', 1),
(26, 'مایل به جواب دادن نیستم', '', '', 0, 'emplyment_status', 0, '', 1),
(27, 'لباس و پوشاک', '', '', 0, 'adsCat', 1, 'data/cat/adsCat/0-1461127377-commercepng.png', 1),
(28, 'کامپیوتر و لپ تاپ', '', '', 0, 'adsCat', 2, '', 1),
(29, 'موبایل و تبلت', '', '', 0, 'adsCat', 3, 'data/cat/adsCat/0-1461127412-technologypng.png', 1),
(30, 'ارتباطات', '', '', 0, 'adsCat', 4, 'data/cat/adsCat/0-1461127431-communicationpng.png', 1),
(31, 'آموزشی', '', '', 0, 'adsCat', 5, 'data/cat/adsCat/0-1461127439-graduationpng.png', 1),
(32, 'صوتی،‌ تصویر و دیجیتال', '', '', 0, 'adsCat', 6, 'data/cat/adsCat/0-1461127458-monitorpng.png', 1),
(33, 'خدماتی', '', '', 0, 'adsCat', 7, 'data/cat/adsCat/0-1461127586-foodpng.png', 1),
(34, 'وسایل نقلیه', '', '', 0, 'adsCat', 8, 'data/cat/adsCat/0-1461127550-transportpng.png', 1),
(35, 'حیوانات خانگی', '', '', 0, 'adsCat', 9, 'data/cat/adsCat/0-1461127544-silhouettepng.png', 1),
(36, 'لوازم و ابزار', '', '', 0, 'adsCat', 10, 'data/cat/adsCat/0-1461127538-wrenchpng.png', 1),
(37, 'خانه و دکوراسیون', '', '', 0, 'adsCat', 11, 'data/cat/adsCat/0-1461127533-buildingspng.png', 1),
(38, 'اجناس کلکسیونی', '', '', 0, 'adsCat', 12, '', 1),
(39, 'سیر و سفر', '', '', 0, 'adsCat', 13, 'data/cat/adsCat/0-1461127498-beachpng.png', 1),
(40, 'صنعت و تجارت', '', '', 0, 'adsCat', 14, 'data/cat/adsCat/0-1461127488-peoplepng.png', 1),
(41, 'املاک و مستغلات', '', '', 0, 'adsCat', 15, 'data/cat/adsCat/0-1461127476-webpng.png', 1),
(42, 'بازار کار و سرمایه', '', '', 0, 'adsCat', 16, 'data/cat/adsCat/0-1461127471-up-arrowpng.png', 1),
(43, 'شورت', '', '', 27, 'adsCat', 0, '', 1),
(44, 'سوتین', '', '', 27, 'adsCat', 0, '', 1),
(45, 'شورت مارکدار', '', '', 43, 'adsCat', 0, '', 1),
(46, 'شورت فیلی', '', '', 43, 'adsCat', 0, '', 1),
(47, 'لوازم جانبی', '', '', 28, 'adsCat', 0, '', 1),
(48, 'موس و کیبورد', '', '', 47, 'adsCat', 0, '', 1),
(49, 'نو (آکبند)', '', '', 0, 'product-state', 0, '', 1),
(50, 'نو (غیرآکبند)', '', '', 0, 'product-state', 0, '', 1),
(51, 'دست‌دوم', '', '', 0, 'product-state', 0, '', 1),
(52, 'معیوب', '', '', 0, 'product-state', 0, '', 1),
(53, '۱۵ روز', '', '', 0, 'product-sale-duration', 0, '', 1),
(54, '۳۰ روز', '', '', 0, 'product-sale-duration', 0, '', 1),
(55, '۶۰ روز', '', '', 0, 'product-sale-duration', 0, '', 1),
(56, '۹۰ روز', '', '', 0, 'product-sale-duration', 0, '', 1),
(57, '۱ سال', '', '', 0, 'product-sale-duration', 0, '', 1),
(58, 'نامحدود', '', '', 0, 'product-sale-duration', 0, '', 1),
(59, 'زیر ۱ کیلوگرم', '', '', 0, 'product-weight', 0, '', 1),
(60, 'بین ۱ تا ۱۰ کیلوگرم', '', '', 0, 'product-weight', 0, '', 1),
(61, 'بین ۱۰ تا ۵۰ کیلوگرم', '', '', 0, 'product-weight', 0, '', 1),
(62, '۵۰ تا ۱۰۰ کیلوگرم', '', '', 0, 'product-weight', 0, '', 1),
(63, 'بیشتر از ۱۰۰ کیلوگرم', '', '', 0, 'product-weight', 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `catcustomfield`
--

CREATE TABLE `catcustomfield` (
  `id` int(11) NOT NULL COMMENT 'شناسه',
  `cat_id` int(11) NOT NULL COMMENT 'دسته',
  `name` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'عنوان',
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'نوع',
  `prio` int(11) NOT NULL COMMENT 'اولویت',
  `flag` int(1) NOT NULL COMMENT 'وضعیت',
  `hide` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catcustomfield`
--

INSERT INTO `catcustomfield` (`id`, `cat_id`, `name`, `type`, `prio`, `flag`, `hide`) VALUES
(1, 28, 'رنگبندی', 'select', 2, 1, 0),
(2, 28, 'برند', 'radio', 1, 1, 0),
(10, 29, 'نمتنم ۳تهقمث', 'select', 3, 1, 0),
(8, 29, 'نمتنم ۰', 'text', 1, 1, 0),
(9, 29, 'نمتنم ۱', 'text', 2, 1, 0),
(11, 28, 'پرداخت آنلاین', 'checkbox', 3, 1, 0),
(12, 28, 'شرح بیشتر', 'textarea', 4, 1, 0),
(13, 28, 'عنوان ثانویه', 'text', 5, 1, 0),
(14, 48, 'نوع اتصال', 'select', 1, 1, 0),
(15, 28, 'چک باکس تست', 'checkbox', 6, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `catcustomfield_option`
--

CREATE TABLE `catcustomfield_option` (
  `id` int(11) NOT NULL COMMENT 'شناسه',
  `catcustomfield_id` int(11) NOT NULL COMMENT 'ویژگی',
  `option` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'گزینه',
  `hide` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catcustomfield_option`
--

INSERT INTO `catcustomfield_option` (`id`, `catcustomfield_id`, `option`, `hide`) VALUES
(1, 2, 'توشیبا', 0),
(2, 2, 'سونی', 0),
(3, 1, 'طوسی', 0),
(4, 2, 'jjjj', 1),
(5, 2, 'توشیبا', 1),
(6, 3, '', 0),
(7, 4, '', 0),
(8, 5, '', 0),
(9, 6, '', 0),
(10, 7, '', 0),
(11, 8, '', 0),
(12, 9, '', 0),
(13, 10, 'گزینه ۱', 0),
(14, 10, 'گزینه ۲', 0),
(15, 11, '', 0),
(16, 12, '', 0),
(17, 13, '', 0),
(18, 14, 'درگاه USB', 0),
(19, 14, 'درگاه PS2', 0),
(20, 15, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `catcustomfield_value`
--

CREATE TABLE `catcustomfield_value` (
  `id` int(11) NOT NULL COMMENT 'شناسه',
  `item_table` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'جدول محتوا',
  `item_id` int(11) NOT NULL COMMENT 'شناسه محتوا',
  `catcustomfield_id` int(11) NOT NULL COMMENT 'شناسه فیلد دلخواه',
  `option_id` int(11) NOT NULL COMMENT 'گزینه'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catcustomfield_value`
--

INSERT INTO `catcustomfield_value` (`id`, `item_table`, `item_id`, `catcustomfield_id`, `option_id`) VALUES
(1, 'item', 2, 13, 0),
(2, 'item', 2, 1, 3),
(3, 'item', 2, 2, 1),
(4, 'item', 2, 12, 0),
(10, 'item', 2, 11, 1),
(11, 'item', 2, 15, 0),
(12, 'item', 2, 14, 19);

-- --------------------------------------------------------

--
-- Table structure for table `catcustomfield_value_text`
--

CREATE TABLE `catcustomfield_value_text` (
  `id` int(11) NOT NULL COMMENT 'شناسه',
  `catcustomfield_value_id` int(11) NOT NULL COMMENT 'شناسه محتوا',
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'محتوا'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catcustomfield_value_text`
--

INSERT INTO `catcustomfield_value_text` (`id`, `catcustomfield_value_id`, `text`) VALUES
(8, 1, 'آزمایش متن ۰'),
(7, 4, 'متن بزرگ ۰۹');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL COMMENT 'شناسه',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'نام کاربر',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ایمیل کاربر',
  `cell` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'شماره همراه',
  `to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'مقصد',
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'عنوان پیام',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'متن پیام',
  `date` int(11) NOT NULL COMMENT 'زمان',
  `hide` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `cell`, `to`, `subject`, `content`, `date`, `hide`) VALUES
(1, 'مجید طوسی', 'tusi@gmail.com', '+989143332211', 'support@postgah.com', 'درخواست سورس نرم افزار', 'سلام\r\nبا تشکر از وبسایت زیبا و کامل شما، لطفا شماره تماس برنامه نویس را برای بنده ارسال کنید تا یک کپی از ورسایت شما را از ایشان به قیمت مفت خریداری و مثل قارچ همه جا  پخش کنم\r\nبا تشکر\r\nمجید طوسی\r\n', 1430332222, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cronjob`
--

CREATE TABLE `cronjob` (
  `id` int(11) NOT NULL,
  `func` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'function name without ()',
  `vars` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` bigint(10) NOT NULL COMMENT 'only U format'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cronjob`
--

INSERT INTO `cronjob` (`id`, `func`, `vars`, `date`) VALUES
(1, 'pgPlan_syncItemPlan', '1', 1469421005),
(2, 'pgPlan_syncItemPlan', '1', 1469421005),
(3, 'pgPlan_syncItemPlan', '1', 1469464205),
(4, 'pgPlan_syncItemPlan', '6', 1469897595),
(5, 'pgPlan_syncItemPlan', '7', 1469855073);

-- --------------------------------------------------------

--
-- Table structure for table `email_template`
--

CREATE TABLE `email_template` (
  `id` int(11) NOT NULL COMMENT 'شناسه',
  `name` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'عنوان',
  `mail_form_name` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'نام ارسال کننده',
  `mail_from_address` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ایمیل ارسال کننده',
  `mail_subject` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'عنوان ایمیل',
  `mail_text` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'محتوای ایمیل',
  `flag` int(1) NOT NULL COMMENT 'وضعیت'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_template`
--

INSERT INTO `email_template` (`id`, `name`, `mail_form_name`, `mail_from_address`, `mail_subject`, `mail_text`, `flag`) VALUES
(1, 'فعالسازی حساب کاربری', '', '', '', '', 0),
(2, 'خوش آمدگویی کاربر', '', '', '', '', 0),
(3, 'هشدار اتمام زمان آگهی', '', '', '', '', 0),
(4, 'پاسخ به حل اختلاف', '', '', '', '', 0),
(5, 'اعلام فروش به فروشنده', '', '', '', '', 0),
(6, 'تایید خریدار / آزاد شدن پول', '', '', '', '', 0),
(7, 'اعلام تائید آگهی توسط مدیریت', '', '', '', '', 0),
(8, 'اعلام عدم تائید آگهی توسط مدیریت', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL COMMENT 'شناسه',
  `user_id` int(11) NOT NULL COMMENT 'شناسه کاربر',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'عنوان',
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'توضیحات',
  `cat_id` int(11) NOT NULL COMMENT 'دسته بندی',
  `position_id` int(11) NOT NULL COMMENT 'موقعیت',
  `address` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'آدرس',
  `cost` int(11) NOT NULL COMMENT 'قیمت',
  `cell` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'موبایل',
  `tell` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'تلفن ثابت',
  `sale_by_postgah` int(1) NOT NULL COMMENT 'فروش با همکاری پستگاه',
  `state` int(11) NOT NULL COMMENT 'کارکرد کالا',
  `count_of_stock` int(11) NOT NULL COMMENT 'موجودی کالا',
  `weight` int(11) NOT NULL COMMENT 'وزن تقریبی',
  `sale_duration` int(11) NOT NULL COMMENT 'مدت زمان فروش',
  `delivery_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'هزینه ارسال',
  `delivery_cost_town` int(11) NOT NULL COMMENT 'هزینه ارسال به شهر خودم',
  `delivery_cost_country` int(11) NOT NULL COMMENT 'هزینه ارسال به کل کشور',
  `sold` int(1) NOT NULL COMMENT 'موجودیت کالا',
  `flag` int(1) NOT NULL COMMENT 'وضعیت تایید',
  `expired` int(1) NOT NULL COMMENT 'وضعیت انقضاء',
  `plan` int(11) NOT NULL COMMENT 'شناسه پلان ویژه',
  `date_created` int(11) NOT NULL,
  `date_updated` int(11) NOT NULL,
  `hide` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='آیتم/آیتم ها';

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `user_id`, `name`, `text`, `cat_id`, `position_id`, `address`, `cost`, `cell`, `tell`, `sale_by_postgah`, `state`, `count_of_stock`, `weight`, `sale_duration`, `delivery_method`, `delivery_cost_town`, `delivery_cost_country`, `sold`, `flag`, `expired`, `plan`, `date_created`, `date_updated`, `hide`) VALUES
(1, 7, '۱۵ روز0', 'oioooiio', 27, 114, '', 0, '', '', 0, 0, 0, 0, 0, '', 0, 0, 0, 2, 0, 4, 1469059134, 1469924767, 0),
(3, 7, '889', '98', 36, 127, '', 0, '', '', 0, 0, 0, 0, 0, '', 0, 0, 0, 1, 0, 0, 1469060126, 1470260293, 0),
(4, 7, '00oi', 'ooi90', 33, 123, '', 0, '', '', 0, 0, 0, 0, 0, '', 0, 0, 0, 1, 0, 0, 1469378745, 1469928131, 0),
(5, 7, 'ععاعا', 'هعاهعاهعا', 45, 1018, '', 0, '', '', 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 1469379054, 1469379054, 1),
(6, 7, '9998', 'jiji', 31, 116, '', 0, '', '', 0, 0, 0, 0, 0, '', 0, 0, 0, 2, 0, 12, 1469807464, 1469811195, 0),
(7, 7, '90u', 'jjk', 27, 120, '', 0, '', '', 0, 0, 0, 0, 0, '', 0, 0, 0, 2, 0, 4, 1469811491, 1469926257, 0),
(8, 7, 'hjk', 'n', 30, 117, '', 0, '', '', 0, 0, 0, 0, 0, '', 0, 0, 0, 1, 0, 0, 1469928162, 1470008709, 0);

-- --------------------------------------------------------

--
-- Table structure for table `item_image`
--

CREATE TABLE `item_image` (
  `id` int(11) NOT NULL COMMENT 'شناسه',
  `item_id` int(11) NOT NULL COMMENT 'شناسه آیتم',
  `image` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'تصویر',
  `hide` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='تصویر آیتم/تصاویر آیتم';

-- --------------------------------------------------------

--
-- Table structure for table `item_plan_duration`
--

CREATE TABLE `item_plan_duration` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `plan_duration_id` int(11) NOT NULL,
  `date_start` int(11) NOT NULL,
  `date_end` int(11) NOT NULL,
  `cost` int(11) NOT NULL COMMENT 'هزینه',
  `flag` int(11) NOT NULL COMMENT 'payment flag',
  `revokedBy` int(1) NOT NULL COMMENT 'ابطال بعد از انتخاب پلان دیگری روی این پلان',
  `type_of_request` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'NewUpgrade ReplaceRevoke RenewAds',
  `request_for_date` int(1) NOT NULL COMMENT 'نیاز به بروزرسانی زمان سرویس حین تایید آگهی - استفاده نشده',
  `hide` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='نمایش آگهی/نمایش آگهی ها';

--
-- Dumping data for table `item_plan_duration`
--

INSERT INTO `item_plan_duration` (`id`, `item_id`, `plan_duration_id`, `date_start`, `date_end`, `cost`, `flag`, `revokedBy`, `type_of_request`, `request_for_date`, `hide`) VALUES
(1, 1, 8, 1469377805, 1469421005, 3000, 1, 0, 'NewUpgrade', 0, 0),
(2, 1, 8, 1469421005, 1469464205, 3000, 1, 0, 'RenewAds', 0, 0),
(3, 4, 29, 0, 0, 4000, 0, 0, '', 0, 0),
(4, 5, 1, 0, 0, 12000, 1, 0, '', 1, 0),
(5, 6, 29, 1469811195, 1469897595, 4000, 1, 0, '', 0, 0),
(6, 7, 8, 1469811873, 1469855073, 3000, 1, 0, 'NewUpgrade', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `item_reject`
--

CREATE TABLE `item_reject` (
  `id` int(11) NOT NULL COMMENT 'شناسه',
  `item_id` int(11) NOT NULL COMMENT 'شناسه آیتم',
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'متن ارجاء',
  `date_created` int(11) NOT NULL COMMENT 'تاریخ'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_reject`
--

INSERT INTO `item_reject` (`id`, `item_id`, `text`, `date_created`) VALUES
(1, 8, 'مشکل در عنوان آگهی\r\nمشکل در عنوان آگهی مشکل در عنوان آگهی\r\nمشکل در عنوان آگهی\r\n', 1470008709),
(2, 3, 'sdkjhfkjhw', 1470260293),
(3, 4, '', 1470260293);

-- --------------------------------------------------------

--
-- Table structure for table `kword`
--

CREATE TABLE `kword` (
  `id` int(11) NOT NULL,
  `kword` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'کلمه',
  `usage_count` int(11) NOT NULL COMMENT 'تعداد استفاده'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kword`
--

INSERT INTO `kword` (`id`, `kword`, `usage_count`) VALUES
(1, 'مدرسه', 0),
(2, 'دوربین', 0),
(3, 'داستان', 0),
(28, 'تست ۱۲', 0),
(5, 'پردازش', 0),
(6, 'قیف', 0),
(7, 'کربن', 0),
(9, 'کتاب', 0),
(33, 'آزمایش', 0),
(34, 'سریال', 0),
(35, 'ماجرا', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kwordbanned`
--

CREATE TABLE `kwordbanned` (
  `id` int(11) NOT NULL,
  `kword` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'کلمه'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kwordbanned`
--

INSERT INTO `kwordbanned` (`id`, `kword`) VALUES
(7, 'VPN');

-- --------------------------------------------------------

--
-- Table structure for table `kwordusage`
--

CREATE TABLE `kwordusage` (
  `id` int(11) NOT NULL,
  `table_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_id` int(11) NOT NULL,
  `kword_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `linkify`
--

CREATE TABLE `linkify` (
  `id` int(11) NOT NULL COMMENT 'شناسه',
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'عنوان پیوند',
  `url` text COLLATE utf8_persian_ci NOT NULL COMMENT 'آدرس پیوند',
  `pic` text COLLATE utf8_persian_ci NOT NULL COMMENT 'عکس',
  `flag` int(11) NOT NULL COMMENT 'وضعیت',
  `prio` int(11) NOT NULL COMMENT 'موقعیت',
  `parent` int(11) NOT NULL COMMENT 'معرف',
  `cat` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'موقعیت'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `linkify`
--

INSERT INTO `linkify` (`id`, `name`, `url`, `pic`, `flag`, `prio`, `parent`, `cat`) VALUES
(1, 'صفحه اصلی', './?page=1', '', 1, 0, 0, 'main');

-- --------------------------------------------------------

--
-- Table structure for table `mailq`
--

CREATE TABLE `mailq` (
  `id` int(11) NOT NULL,
  `to` text COLLATE utf8_persian_ci NOT NULL,
  `subject` text COLLATE utf8_persian_ci NOT NULL,
  `text` text COLLATE utf8_persian_ci NOT NULL,
  `mail_from` text COLLATE utf8_persian_ci NOT NULL,
  `html` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `mailq`
--

INSERT INTO `mailq` (`id`, `to`, `subject`, `text`, `mail_from`, `html`) VALUES
(1, 'tusi@gmail.com', 'پاسخ:‌ درخواست سورس نرم افزار', 'سلام\r\nبا تشکر از دوست عزیزمون\r\nفایل ضمیمه شد\r\nلطفا با مستندات پخش نمایید\r\nتشکر\n\n- - - - - - - - - - - - - - - - - -\n\n> \n> سلام\r\n> با تشکر از وبسایت زیبا و کامل شما، لطفا شماره تماس برنامه نویس را برای بنده ارسال کنید تا یک کپی از ورسایت شما را از ایشان به قیمت مفت خریداری و مثل قارچ همه جا  پخش کنم\r\n> با تشکر\r\n> مجید طوسی\r\n> ', 'support@postgah.com', 0),
(2, 'tusi@gmail.com', 'پاسخ:‌ درخواست سورس نرم افزار', '\n\n- - - - - - - - - - - - - - - - - -\n\n> \n> سلام\r\n> با تشکر از وبسایت زیبا و کامل شما، لطفا شماره تماس برنامه نویس را برای بنده ارسال کنید تا یک کپی از ورسایت شما را از ایشان به قیمت مفت خریداری و مثل قارچ همه جا  پخش کنم\r\n> با تشکر\r\n> مجید طوسی\r\n> ', 'support@postgah.com', 0),
(3, 'tusi@gmail.com', 'پاسخ:‌ درخواست سورس نرم افزار', 'ggg\n\n- - - - - - - - - - - - - - - - - -\n\n> \n> سلام\r\n> با تشکر از وبسایت زیبا و کامل شما، لطفا شماره تماس برنامه نویس را برای بنده ارسال کنید تا یک کپی از ورسایت شما را از ایشان به قیمت مفت خریداری و مثل قارچ همه جا  پخش کنم\r\n> با تشکر\r\n> مجید طوسی\r\n> ', 'support@postgah.com', 0),
(4, 'billing_userpanel_payment_offline_save_n_congragulate_admin_email', '', '', 'noreply@127.0.0.1', 0),
(5, 'billing_userpanel_payment_offline_save_n_congragulate_user_email', '', '', 'noreply@127.0.0.1', 0),
(6, 'billing_userpanel_payment_offline_save_n_congragulate_admin_email', '', '', 'noreply@127.0.0.1', 0),
(7, 'billing_userpanel_payment_offline_save_n_congragulate_user_email', '', '', 'noreply@127.0.0.1', 0),
(8, 'support@parsunix.com', 'ثبت پرداخت آفلاین به مبلغ 12000 تومان', 'سلام\r\nثبت مبلغ 12000 تومان توسط کاربر با نام {user_name} در بانک بانک صادرات انجام شد', 'noreply@127.0.0.1', 0),
(9, 'mahmud.ghaznavi@gmail.com', 'پرداخت آفلاین به مبلغ 12000 تومان', 'با سلام\r\nپرداخت شما به مبلغ 12000 تومان ثبت گردید و بزودی به تایید مدیریت خواهد رسید\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(10, 'support@parsunix.com', 'ثبت پرداخت آفلاین به مبلغ 12000 تومان', 'سلام\r\nثبت مبلغ 12000 تومان توسط کاربر با نام {user_name} در بانک بانک صادرات انجام شد', 'noreply@127.0.0.1', 0),
(11, 'mahmud.ghaznavi@gmail.com', 'پرداخت آفلاین به مبلغ 12000 تومان', 'با سلام\r\nپرداخت شما به مبلغ 12000 تومان ثبت گردید و بزودی به تایید مدیریت خواهد رسید\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(12, 'support@parsunix.com', 'ثبت پرداخت آفلاین به مبلغ 12000 تومان', 'سلام\r\nثبت مبلغ 12000 تومان توسط کاربر با نام {user_name} در بانک بانک صادرات انجام شد', 'noreply@127.0.0.1', 0),
(13, 'mahmud.ghaznavi@gmail.com', 'پرداخت آفلاین به مبلغ 12000 تومان', 'با سلام\r\nپرداخت شما به مبلغ 12000 تومان ثبت گردید و بزودی به تایید مدیریت خواهد رسید\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(14, 'support@parsunix.com', 'ثبت پرداخت آفلاین به مبلغ 12000 تومان', 'سلام\r\nثبت مبلغ 12000 تومان توسط کاربر با نام {user_name} در بانک بانک صادرات انجام شد', 'noreply@127.0.0.1', 0),
(15, 'mahmud.ghaznavi@gmail.com', 'پرداخت آفلاین به مبلغ 12000 تومان', 'با سلام\r\nپرداخت شما به مبلغ 12000 تومان ثبت گردید و بزودی به تایید مدیریت خواهد رسید\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(16, 'support@parsunix.com', 'ثبت پرداخت آفلاین به مبلغ 12000 تومان', 'سلام\r\nثبت مبلغ 12000 تومان توسط کاربر با نام {user_name} در بانک بانک صادرات انجام شد', 'noreply@127.0.0.1', 0),
(17, 'mahmud.ghaznavi@gmail.com', 'پرداخت آفلاین به مبلغ 12000 تومان', 'با سلام\r\nپرداخت شما به مبلغ 12000 تومان ثبت گردید و بزودی به تایید مدیریت خواهد رسید\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(18, 'support@parsunix.com', 'ثبت پرداخت آفلاین به مبلغ 12000 تومان', 'سلام\r\nثبت مبلغ 12000 تومان توسط کاربر با نام {user_name} در بانک بانک صادرات انجام شد', 'noreply@127.0.0.1', 0),
(19, 'mahmud.ghaznavi@gmail.com', 'پرداخت آفلاین به مبلغ 12000 تومان', 'با سلام\r\nپرداخت شما به مبلغ 12000 تومان ثبت گردید و بزودی به تایید مدیریت خواهد رسید\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(20, 'support@parsunix.com', 'ثبت پرداخت آفلاین به مبلغ 12000 تومان', 'سلام\r\nثبت مبلغ 12000 تومان توسط کاربر با نام {user_name} در بانک بانک صادرات انجام شد', 'noreply@127.0.0.1', 0),
(21, 'mahmud.ghaznavi@gmail.com', 'پرداخت آفلاین به مبلغ 12000 تومان', 'با سلام\r\nپرداخت شما به مبلغ 12000 تومان ثبت گردید و بزودی به تایید مدیریت خواهد رسید\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(22, 'support@parsunix.com', 'ثبت پرداخت آفلاین به مبلغ 12000 تومان', 'سلام\r\nثبت مبلغ 12000 تومان توسط کاربر با نام {user_name} در بانک بانک صادرات انجام شد', 'noreply@127.0.0.1', 0),
(23, 'mahmud.ghaznavi@gmail.com', 'پرداخت آفلاین به مبلغ 12000 تومان', 'با سلام\r\nپرداخت شما به مبلغ 12000 تومان ثبت گردید و بزودی به تایید مدیریت خواهد رسید\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(24, 'support@parsunix.com', 'ثبت پرداخت آفلاین به مبلغ 12000 تومان', 'سلام\r\nثبت مبلغ 12000 تومان توسط کاربر با نام {user_name} در بانک بانک صادرات انجام شد', 'noreply@127.0.0.1', 0),
(25, 'mahmud.ghaznavi@gmail.com', 'پرداخت آفلاین به مبلغ 12000 تومان', 'با سلام\r\nپرداخت شما به مبلغ 12000 تومان ثبت گردید و بزودی به تایید مدیریت خواهد رسید\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(26, 'support@parsunix.com', 'ثبت پرداخت آفلاین به مبلغ 12000 تومان', 'سلام\r\nثبت مبلغ 12000 تومان توسط کاربر با نام {user_name} در بانک بانک صادرات انجام شد', 'noreply@127.0.0.1', 0),
(27, 'mahmud.ghaznavi@gmail.com', 'پرداخت آفلاین به مبلغ 12000 تومان', 'با سلام\r\nپرداخت شما به مبلغ 12000 تومان ثبت گردید و بزودی به تایید مدیریت خواهد رسید\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(28, 'support@parsunix.com', 'ثبت پرداخت آفلاین به مبلغ 12000 تومان', 'سلام\r\nثبت مبلغ 12000 تومان توسط کاربر با نام {user_name} در بانک بانک صادرات انجام شد', 'noreply@127.0.0.1', 0),
(29, 'mahmud.ghaznavi@gmail.com', 'پرداخت آفلاین به مبلغ 12000 تومان', 'با سلام\r\nپرداخت شما به مبلغ 12000 تومان ثبت گردید و بزودی به تایید مدیریت خواهد رسید\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(30, 'support@parsunix.com', 'ثبت پرداخت آفلاین به مبلغ 12000 تومان', 'سلام\r\nثبت مبلغ 12000 تومان توسط کاربر با نام {user_name} در بانک بانک صادرات انجام شد', 'noreply@127.0.0.1', 0),
(31, 'mahmud.ghaznavi@gmail.com', 'پرداخت آفلاین به مبلغ 12000 تومان', 'با سلام\r\nپرداخت شما به مبلغ 12000 تومان ثبت گردید و بزودی به تایید مدیریت خواهد رسید\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(32, 'support@parsunix.com', 'ثبت پرداخت آفلاین به مبلغ 12000 تومان', 'سلام\r\nثبت مبلغ 12000 تومان توسط کاربر با نام {user_name} در بانک بانک صادرات انجام شد', 'noreply@127.0.0.1', 0),
(33, 'mahmud.ghaznavi@gmail.com', 'پرداخت آفلاین به مبلغ 12000 تومان', 'با سلام\r\nپرداخت شما به مبلغ 12000 تومان ثبت گردید و بزودی به تایید مدیریت خواهد رسید\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(34, 'support@parsunix.com', 'ثبت پرداخت آفلاین به مبلغ 12000 تومان', 'سلام\r\nثبت مبلغ 12000 تومان توسط کاربر با نام {user_name} در بانک بانک صادرات انجام شد', 'noreply@127.0.0.1', 0),
(35, 'mahmud.ghaznavi@gmail.com', 'پرداخت آفلاین به مبلغ 12000 تومان', 'با سلام\r\nپرداخت شما به مبلغ 12000 تومان ثبت گردید و بزودی به تایید مدیریت خواهد رسید\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(36, 'support@parsunix.com', 'ثبت پرداخت آفلاین به مبلغ 12000 تومان', 'سلام\r\nثبت مبلغ 12000 تومان توسط کاربر با نام {user_name} در بانک بانک صادرات انجام شد', 'noreply@127.0.0.1', 0),
(37, 'mahmud.ghaznavi@gmail.com', 'پرداخت آفلاین به مبلغ 12000 تومان', 'با سلام\r\nپرداخت شما به مبلغ 12000 تومان ثبت گردید و بزودی به تایید مدیریت خواهد رسید\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(38, 'support@parsunix.com', 'ثبت پرداخت آفلاین به مبلغ 12000 تومان', 'سلام\r\nثبت مبلغ 12000 تومان توسط کاربر با نام {user_name} در بانک بانک صادرات انجام شد', 'noreply@127.0.0.1', 0),
(39, 'mahmud.ghaznavi@gmail.com', 'پرداخت آفلاین به مبلغ 12000 تومان', 'با سلام\r\nپرداخت شما به مبلغ 12000 تومان ثبت گردید و بزودی به تایید مدیریت خواهد رسید\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(40, 'support@parsunix.com', 'ثبت پرداخت آفلاین به مبلغ 12000 تومان', 'سلام\r\nثبت مبلغ 12000 تومان توسط کاربر با نام {user_name} در بانک بانک صادرات انجام شد', 'noreply@127.0.0.1', 0),
(41, 'mahmud.ghaznavi@gmail.com', 'پرداخت آفلاین به مبلغ 12000 تومان', 'با سلام\r\nپرداخت شما به مبلغ 12000 تومان ثبت گردید و بزودی به تایید مدیریت خواهد رسید\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(42, 'support@parsunix.com', 'ثبت پرداخت آفلاین به مبلغ 12000 تومان', 'سلام\r\nثبت مبلغ 12000 تومان توسط کاربر با نام {user_name} در بانک بانک صادرات انجام شد', 'noreply@127.0.0.1', 0),
(43, 'mahmud.ghaznavi@gmail.com', 'پرداخت آفلاین به مبلغ 12000 تومان', 'با سلام\r\nپرداخت شما به مبلغ 12000 تومان ثبت گردید و بزودی به تایید مدیریت خواهد رسید\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(44, 'support@parsunix.com', 'ثبت پرداخت آفلاین به مبلغ 12000 تومان', 'سلام\r\nثبت مبلغ 12000 تومان توسط کاربر با نام {user_name} در بانک بانک صادرات انجام شد', 'noreply@127.0.0.1', 0),
(45, 'mahmud.ghaznavi@gmail.com', 'پرداخت آفلاین به مبلغ 12000 تومان', 'با سلام\r\nپرداخت شما به مبلغ 12000 تومان ثبت گردید و بزودی به تایید مدیریت خواهد رسید\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(46, 'support@parsunix.com', 'ثبت پرداخت آفلاین به مبلغ 12000 تومان', 'سلام\r\nثبت مبلغ 12000 تومان توسط کاربر با نام {user_name} در بانک بانک صادرات انجام شد', 'noreply@127.0.0.1', 0),
(47, 'mahmud.ghaznavi@gmail.com', 'پرداخت آفلاین به مبلغ 12000 تومان', 'با سلام\r\nپرداخت شما به مبلغ 12000 تومان ثبت گردید و بزودی به تایید مدیریت خواهد رسید\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(48, 'support@parsunix.com', 'ثبت پرداخت آفلاین به مبلغ 12000 تومان', 'سلام\r\nثبت مبلغ 12000 تومان توسط کاربر با نام {user_name} در بانک بانک صادرات انجام شد', 'noreply@127.0.0.1', 0),
(49, 'mahmud.ghaznavi@gmail.com', 'پرداخت آفلاین به مبلغ 12000 تومان', 'با سلام\r\nپرداخت شما به مبلغ 12000 تومان ثبت گردید و بزودی به تایید مدیریت خواهد رسید\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(50, 'support@parsunix.com', 'ثبت پرداخت آفلاین به مبلغ 12000 تومان', 'سلام\r\nثبت مبلغ 12000 تومان توسط کاربر با نام {user_name} در بانک بانک صادرات انجام شد', 'noreply@127.0.0.1', 0),
(51, 'mahmud.ghaznavi@gmail.com', 'پرداخت آفلاین به مبلغ 12000 تومان', 'با سلام\r\nپرداخت شما به مبلغ 12000 تومان ثبت گردید و بزودی به تایید مدیریت خواهد رسید\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(52, 'support@parsunix.com', 'ثبت پرداخت آفلاین به مبلغ 12000 تومان', 'سلام\r\nثبت مبلغ 12000 تومان توسط کاربر با نام {user_name} در بانک بانک صادرات انجام شد', 'noreply@127.0.0.1', 0),
(53, 'mahmud.ghaznavi@gmail.com', 'پرداخت آفلاین به مبلغ 12000 تومان', 'با سلام\r\nپرداخت شما به مبلغ 12000 تومان ثبت گردید و بزودی به تایید مدیریت خواهد رسید\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(54, 'support@parsunix.com', 'ثبت پرداخت آفلاین به مبلغ 12,000 تومان', 'سلام\r\nثبت مبلغ 12,000 تومان توسط کاربر با نام {user_name} در بانک بانک صادرات انجام شد', 'noreply@127.0.0.1', 0),
(55, 'mahmud.ghaznavi@gmail.com', 'پرداخت آفلاین به مبلغ 12,000 تومان', 'با سلام\r\nپرداخت شما به مبلغ 12,000 تومان ثبت گردید و بزودی به تایید مدیریت خواهد رسید\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(56, 'support@parsunix.com', 'ثبت پرداخت آفلاین به مبلغ 12,000 تومان', 'سلام\r\nثبت مبلغ 12,000 تومان توسط کاربر با نام {user_name} در بانک بانک صادرات انجام شد', 'noreply@127.0.0.1', 0),
(57, 'mahmud.ghaznavi@gmail.com', 'پرداخت آفلاین به مبلغ 12,000 تومان', 'با سلام\r\nپرداخت شما به مبلغ 12,000 تومان ثبت گردید و بزودی به تایید مدیریت خواهد رسید\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(58, 'support@parsunix.com', '', '', 'noreply@127.0.0.1', 0),
(59, 'mahmud.ghaznavi@gmail.com', 'پرداخت شما به مبلغ 12,000 تومان تایید شد', 'با سلام\r\nکاربر گرامی، محمود غضنوی\r\nپرداخت شما به مبلغ 12,000 تومان از بانک صادرات مورد تایید مدیریت قرار گرفته و در حساب کاربری شما منظور گردید\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(60, 'mahmud.ghaznavi@gmail.com', 'پرداخت شما به مبلغ 12,000 تومان تایید شد', 'با سلام\r\nکاربر گرامی، {user_name}\r\nپرداخت شما به مبلغ 12,000 تومان از بانک صادرات مورد تایید مدیریت قرار گرفته و در حساب کاربری شما منظور گردید\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(61, 'mahmud.ghaznavi@gmail.com', 'پرداخت شما به مبلغ 12,000 تومان تایید شد', 'با سلام\r\nکاربر گرامی، {user_name}\r\nپرداخت شما به مبلغ 12,000 تومان از بانک صادرات مورد تایید مدیریت قرار گرفته و در حساب کاربری شما منظور گردید\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(62, 'mahmud.ghaznavi@gmail.com', 'پرداخت شما به مبلغ 12,000 تومان تایید شد', 'با سلام\r\nکاربر گرامی، محمود غضنوی\r\nپرداخت شما به مبلغ 12,000 تومان از بانک صادرات مورد تایید مدیریت قرار گرفته و در حساب کاربری شما منظور گردید\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(63, 'mahmud.ghaznavi@gmail.com', 'پرداخت شما به مبلغ 12,000 تومان تایید شد', 'با سلام\r\nکاربر گرامی، محمود غضنوی\r\nپرداخت شما به مبلغ 12,000 تومان از بانک صادرات مورد تایید مدیریت قرار گرفته و در حساب کاربری شما منظور گردید\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(64, 'mahmud.ghaznavi@gmail.com', 'پرداخت شما به مبلغ 12,000 تومان تایید شد', 'با سلام\r\nکاربر گرامی، محمود غضنوی\r\nپرداخت شما به مبلغ 12,000 تومان از بانک صادرات مورد تایید مدیریت قرار گرفته و در حساب کاربری شما منظور گردید\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(65, 'mahmud.ghaznavi@gmail.com', 'پرداخت شما به مبلغ 12,000 تومان تایید شد', 'با سلام\r\nکاربر گرامی، محمود غضنوی\r\nپرداخت شما به مبلغ 12,000 تومان از بانک صادرات مورد تایید مدیریت قرار گرفته و در حساب کاربری شما منظور گردید\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(66, 'mahmud.ghaznavi@gmail.com', 'پرداخت شما به مبلغ 12,000 تومان تایید شد', 'با سلام\r\nکاربر گرامی، محمود غضنوی\r\nپرداخت شما به مبلغ 12,000 تومان از بانک صادرات مورد تایید مدیریت قرار گرفته و در حساب کاربری شما منظور گردید\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(67, 'mahmud.ghaznavi@gmail.com', 'پرداخت شما به مبلغ 12,000 تومان تایید شد', 'با سلام\r\nکاربر گرامی، محمود غضنوی\r\nپرداخت شما به مبلغ 12,000 تومان از بانک صادرات مورد تایید مدیریت قرار گرفته و در حساب کاربری شما منظور گردید\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(68, 'mahmud.ghaznavi@gmail.com', 'پرداخت شما به مبلغ 12,000 تومان تایید شد', 'با سلام\r\nکاربر گرامی، محمود غضنوی\r\nپرداخت شما به مبلغ 12,000 تومان از بانک صادرات مورد تایید مدیریت قرار گرفته و در حساب کاربری شما منظور گردید\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(69, 'mahmud.ghaznavi@gmail.com', 'پرداخت شما به مبلغ 12,000 تومان تایید شد', 'با سلام\r\nکاربر گرامی، محمود غضنوی\r\nپرداخت شما به مبلغ 12,000 تومان از بانک صادرات مورد تایید مدیریت قرار گرفته و در حساب کاربری شما منظور گردید\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(70, 'support@parsunix.com', 'ثبت پرداخت آفلاین به مبلغ 12,000 تومان', 'سلام\r\nثبت مبلغ 12,000 تومان توسط کاربر با نام {user_name} در بانک بانک صادرات انجام شد', 'noreply@127.0.0.1', 0),
(71, 'mahmud.ghaznavi@gmail.com', 'پرداخت آفلاین به مبلغ 12,000 تومان', 'با سلام\r\nپرداخت شما به مبلغ 12,000 تومان ثبت گردید و بزودی به تایید مدیریت خواهد رسید\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(72, 'mahmud.ghaznavi@gmail.com', 'پرداخت شما به مبلغ 12,000 تومان تایید شد', 'با سلام\r\nکاربر گرامی، محمود غضنوی\r\nپرداخت شما به مبلغ 12,000 تومان از بانک صادرات مورد تایید مدیریت قرار گرفته و در حساب کاربری شما منظور گردید\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(73, 'support@parsunix.com', 'ثبت پرداخت آفلاین به مبلغ 1,200 تومان', 'سلام\r\nثبت مبلغ 1,200 تومان توسط کاربر با نام {user_name} در بانک بانک صادرات انجام شد', 'noreply@127.0.0.1', 0),
(74, 'mahmud.ghaznavi@gmail.com', 'پرداخت آفلاین به مبلغ 1,200 تومان', 'با سلام\r\nپرداخت شما به مبلغ 1,200 تومان ثبت گردید و بزودی به تایید مدیریت خواهد رسید\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(75, 'mahmud.ghaznavi@gmail.com', 'پرداخت شما به مبلغ 1,200 تومان تایید شد', 'با سلام\r\nکاربر گرامی، محمود غضنوی\r\nپرداخت شما به مبلغ 1,200 تومان از بانک صادرات مورد تایید مدیریت قرار گرفته و در حساب کاربری شما منظور گردید\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(76, 'support@parsunix.com', 'ثبت پرداخت آفلاین به مبلغ 12,000 تومان', 'سلام\r\nثبت مبلغ 12,000 تومان توسط کاربر با نام {user_name} در بانک بانک صادرات انجام شد', 'noreply@127.0.0.1', 0),
(77, 'mahmud.ghaznavi@gmail.com', 'پرداخت آفلاین به مبلغ 12,000 تومان', 'با سلام\r\nپرداخت شما به مبلغ 12,000 تومان ثبت گردید و بزودی به تایید مدیریت خواهد رسید\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(78, 'support@parsunix.com', 'ثبت پرداخت آفلاین به مبلغ 9,000 تومان', 'سلام\r\nثبت مبلغ 9,000 تومان توسط کاربر با نام {user_name} در بانک بانک ملت انجام شد', 'noreply@127.0.0.1', 0),
(79, 'mahmud.ghaznavi@gmail.com', 'پرداخت آفلاین به مبلغ 9,000 تومان', 'با سلام\r\nپرداخت شما به مبلغ 9,000 تومان ثبت گردید و بزودی به تایید مدیریت خواهد رسید\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(80, 'mahmud.ghaznavi@gmail.com', 'پرداخت شما به مبلغ 12,000 تومان تایید شد', 'با سلام\r\nکاربر گرامی، محمود غضنوی\r\nپرداخت شما به مبلغ 12,000 تومان از بانک صادرات مورد تایید مدیریت قرار گرفته و در حساب کاربری شما منظور گردید\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(81, 'mahmud.ghaznavi@gmail.com', 'پرداخت شما به مبلغ 9,000 تومان تایید شد', 'با سلام\r\nکاربر گرامی، محمود غضنوی\r\nپرداخت شما به مبلغ 9,000 تومان از بانک ملت مورد تایید مدیریت قرار گرفته و در حساب کاربری شما منظور گردید\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(82, 'support@parsunix.com', 'پرداخت 24000 از کیف پول {user_name}', 'سلام\r\nمبلغ 24000 از کیف پول {user_name} بابت فاکتور شماره 46 انجام شد', 'noreply@127.0.0.1', 0),
(83, 'mahmud.ghaznavi@gmail.com', 'تایید پرداخت از کیف پول', 'سلام\r\nمبلغ 24000 از کیف پول شما بابت فاکتور 46 دریافت شد.\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(84, 'support@parsunix.com', 'پرداخت 24,000 تومان از کیف پول {user_name}', 'سلام\r\nمبلغ 24,000 تومان از کیف پول {user_name} بابت فاکتور شماره 46 انجام شد', 'noreply@127.0.0.1', 0),
(85, 'mahmud.ghaznavi@gmail.com', 'تایید پرداخت از کیف پول', 'سلام\r\nمبلغ 24,000 تومان از کیف پول شما بابت فاکتور 46 دریافت شد.\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(86, 'support@parsunix.com', 'پرداخت 24,000 تومان از کیف پول {user_name}', 'سلام\r\nمبلغ 24,000 تومان از کیف پول {user_name} بابت فاکتور شماره 46 انجام شد', 'noreply@127.0.0.1', 0),
(87, 'mahmud.ghaznavi@gmail.com', 'تایید پرداخت از کیف پول', 'سلام\r\nمبلغ 24,000 تومان از کیف پول شما بابت فاکتور 46 دریافت شد.\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(88, 'support@parsunix.com', 'پرداخت فاکتور به شماره 46', 'سلام\r\nفاکتور به مبلغ 24,000 تومان با شناسه 46 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(89, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 46 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 24,000 تومان به شناسه 46 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(90, 'support@parsunix.com', 'پرداخت فاکتور به شماره 46', 'سلام\r\nفاکتور به مبلغ 24,000 تومان با شناسه 46 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(91, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 46 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 24,000 تومان به شناسه 46 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(92, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 31', 'سلام\r\nسفارش جدید به مبلغ 24000 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(93, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 31', 'سلام\r\nسفارش شما به شماره 31 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(94, 'support@parsunix.com', 'ثبت پرداخت آفلاین به مبلغ 12,000 تومان', 'سلام\r\nثبت مبلغ 12,000 تومان توسط کاربر با نام {user_name} در بانک بانک ملت انجام شد', 'noreply@127.0.0.1', 0),
(95, 'mahmud.ghaznavi@gmail.com', 'پرداخت آفلاین به مبلغ 12,000 تومان', 'با سلام\r\nپرداخت شما به مبلغ 12,000 تومان ثبت گردید و بزودی به تایید مدیریت خواهد رسید\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(96, 'mahmud.ghaznavi@gmail.com', 'پرداخت شما به مبلغ 12,000 تومان تایید شد', 'با سلام\r\nکاربر گرامی، محمود غضنوی\r\nپرداخت شما به مبلغ 12,000 تومان از بانک ملت مورد تایید مدیریت قرار گرفته و در حساب کاربری شما منظور گردید\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(97, 'support@parsunix.com', 'ثبت پرداخت آفلاین به مبلغ 12,000 تومان', 'سلام\r\nثبت مبلغ 12,000 تومان توسط کاربر با نام {user_name} در بانک بانک صادرات انجام شد', 'noreply@127.0.0.1', 0),
(98, 'mahmud.ghaznavi@gmail.com', 'پرداخت آفلاین به مبلغ 12,000 تومان', 'با سلام\r\nپرداخت شما به مبلغ 12,000 تومان ثبت گردید و بزودی به تایید مدیریت خواهد رسید\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(99, 'support@parsunix.com', '', '', 'noreply@127.0.0.1', 0),
(100, 'mahmud.ghaznavi@gmail.com', '', '', 'noreply@127.0.0.1', 0),
(101, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 51', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 51 به مبلغ 3000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(102, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 3,000 تومان', 'سلام\r\nدرخواست ارتقاء به طرح پوشاک آگهی به شناسه 50 با عنوان sl3409uf 0o به مبلغ 3,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(103, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 50 ثبت شد.\r\nفاکتور جدید به مبلغ 3,000 تومان با شناسه 51 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=51\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "sl3409uf 0o" ، به مدت 12 ساعت ، تحت پلن طرح پوشاک بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(104, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 52', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 52 به مبلغ 14000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(105, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 14,000 تومان', 'سلام\r\nدرخواست ارتقاء به طرح پوشاک آگهی به شناسه 50 با عنوان sl3409uf 0o به مبلغ 14,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(106, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 50 ثبت شد.\r\nفاکتور جدید به مبلغ 14,000 تومان با شناسه 52 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=52\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "sl3409uf 0o" ، به مدت 168 ساعت ، تحت پلن طرح پوشاک بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(107, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 53', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 53 به مبلغ 3000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(108, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 3,000 تومان', 'سلام\r\nدرخواست ارتقاء به طرح پوشاک آگهی به شناسه 50 با عنوان sl3409uf 0o به مبلغ 3,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(109, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 50 ثبت شد.\r\nفاکتور جدید به مبلغ 3,000 تومان با شناسه 53 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=53\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "sl3409uf 0o" ، به مدت 12 ساعت ، تحت پلن طرح پوشاک بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(110, 'support@parsunix.com', 'پرداخت فاکتور به شماره 53', 'سلام\r\nفاکتور به مبلغ 3,000 تومان با شناسه 53 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(111, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 53 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 3,000 تومان به شناسه 53 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(112, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 35', 'سلام\r\nسفارش جدید به مبلغ 0 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(113, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 35', 'سلام\r\nسفارش شما به شماره 35 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(114, 'support@parsunix.com', 'پرداخت فاکتور به شماره 52', 'سلام\r\nفاکتور به مبلغ 14,000 تومان با شناسه 52 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(115, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 52 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 14,000 تومان به شناسه 52 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(116, 'support@parsunix.com', 'پرداخت فاکتور به شماره 51', 'سلام\r\nفاکتور به مبلغ 3,000 تومان با شناسه 51 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(117, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 51 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 3,000 تومان به شناسه 51 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(118, 'support@parsunix.com', 'پرداخت فاکتور به شماره 50', 'سلام\r\nفاکتور به مبلغ 24,000 تومان با شناسه 50 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(119, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 50 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 24,000 تومان به شناسه 50 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(120, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 54', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 54 به مبلغ 4000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(121, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 4,000 تومان', 'سلام\r\nدرخواست ارتقاء به نمایش برتر آگهی به شناسه 50 با عنوان sl3409uf 0o به مبلغ 4,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(122, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 50 ثبت شد.\r\nفاکتور جدید به مبلغ 4,000 تومان با شناسه 54 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=54\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "sl3409uf 0o" ، به مدت 24 ساعت ، تحت پلن نمایش برتر بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(123, 'support@parsunix.com', 'پرداخت فاکتور به شماره 54', 'سلام\r\nفاکتور به مبلغ 4,000 تومان با شناسه 54 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(124, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 54 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 4,000 تومان به شناسه 54 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(125, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 55', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 55 به مبلغ 4000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(126, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 4,000 تومان', 'سلام\r\nدرخواست ارتقاء به نمایش برتر آگهی به شناسه 50 با عنوان sl3409uf 0o به مبلغ 4,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(127, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 50 ثبت شد.\r\nفاکتور جدید به مبلغ 4,000 تومان با شناسه 55 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=55\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "sl3409uf 0o" ، به مدت 24 ساعت ، تحت پلن نمایش برتر بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(128, 'support@parsunix.com', 'پرداخت فاکتور به شماره 55', 'سلام\r\nفاکتور به مبلغ 4,000 تومان با شناسه 55 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(129, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 55 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 4,000 تومان به شناسه 55 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(130, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 56', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 56 به مبلغ 4000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(131, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 4,000 تومان', 'سلام\r\nدرخواست ارتقاء به نمایش برتر آگهی به شناسه 50 با عنوان sl3409uf 0o به مبلغ 4,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(132, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 50 ثبت شد.\r\nفاکتور جدید به مبلغ 4,000 تومان با شناسه 56 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=56\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "sl3409uf 0o" ، به مدت 24 ساعت ، تحت پلن نمایش برتر بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(133, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 57', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 57 به مبلغ 4000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(134, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 4,000 تومان', 'سلام\r\nدرخواست ارتقاء به نمایش برتر آگهی به شناسه 50 با عنوان sl3409uf 0o به مبلغ 4,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(135, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 50 ثبت شد.\r\nفاکتور جدید به مبلغ 4,000 تومان با شناسه 57 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=57\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "sl3409uf 0o" ، به مدت 24 ساعت ، تحت پلن نمایش برتر بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(136, 'support@parsunix.com', 'پرداخت فاکتور به شماره 57', 'سلام\r\nفاکتور به مبلغ 4,000 تومان با شناسه 57 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(137, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 57 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 4,000 تومان به شناسه 57 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(138, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 39', 'سلام\r\nسفارش جدید به مبلغ 0 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(139, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 39', 'سلام\r\nسفارش شما به شماره 39 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(140, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 58', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 58 به مبلغ 3000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(141, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 3,000 تومان', 'سلام\r\nدرخواست ارتقاء به طرح پوشاک آگهی به شناسه 50 با عنوان sl3409uf 0o به مبلغ 3,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(142, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 50 ثبت شد.\r\nفاکتور جدید به مبلغ 3,000 تومان با شناسه 58 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=58\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "sl3409uf 0o" ، به مدت 12 ساعت ، تحت پلن طرح پوشاک بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(143, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 59', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 59 به مبلغ 3000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(144, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 3,000 تومان', 'سلام\r\nدرخواست ارتقاء به طرح پوشاک آگهی به شناسه 50 با عنوان sl3409uf 0o به مبلغ 3,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(145, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 50 ثبت شد.\r\nفاکتور جدید به مبلغ 3,000 تومان با شناسه 59 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=59\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "sl3409uf 0o" ، به مدت 12 ساعت ، تحت پلن طرح پوشاک بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(146, 'support@parsunix.com', 'پرداخت فاکتور به شماره 59', 'سلام\r\nفاکتور به مبلغ 3,000 تومان با شناسه 59 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(147, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 59 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 3,000 تومان به شناسه 59 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(148, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 41', 'سلام\r\nسفارش جدید به مبلغ 0 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(149, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 41', 'سلام\r\nسفارش شما به شماره 41 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(150, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 60', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 60 به مبلغ 4000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(151, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 4,000 تومان', 'سلام\r\nدرخواست ارتقاء به نمایش برتر آگهی به شناسه 50 با عنوان sl3409uf 0o به مبلغ 4,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(152, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 50 ثبت شد.\r\nفاکتور جدید به مبلغ 4,000 تومان با شناسه 60 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=60\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "sl3409uf 0o" ، به مدت 24 ساعت ، تحت پلن نمایش برتر بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(153, 'support@parsunix.com', 'پرداخت فاکتور به شماره 60', 'سلام\r\nفاکتور به مبلغ 4,000 تومان با شناسه 60 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(154, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 60 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 4,000 تومان به شناسه 60 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(155, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 42', 'سلام\r\nسفارش جدید به مبلغ 0 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(156, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 42', 'سلام\r\nسفارش شما به شماره 42 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(157, 'support@parsunix.com', 'پرداخت فاکتور به شماره 58', 'سلام\r\nفاکتور به مبلغ 3,000 تومان با شناسه 58 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(158, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 58 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 3,000 تومان به شناسه 58 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(159, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 40', 'سلام\r\nسفارش جدید به مبلغ 0 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(160, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 40', 'سلام\r\nسفارش شما به شماره 40 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(161, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 61', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 61 به مبلغ 4000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(162, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 4,000 تومان', 'سلام\r\nدرخواست ارتقاء به نمایش برتر آگهی به شناسه 50 با عنوان sl3409uf 0o به مبلغ 4,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(163, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 50 ثبت شد.\r\nفاکتور جدید به مبلغ 4,000 تومان با شناسه 61 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=61\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "sl3409uf 0o" ، به مدت 24 ساعت ، تحت پلن نمایش برتر بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(164, 'support@parsunix.com', 'پرداخت فاکتور به شماره 61', 'سلام\r\nفاکتور به مبلغ 4,000 تومان با شناسه 61 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(165, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 61 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 4,000 تومان به شناسه 61 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(166, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 43', 'سلام\r\nسفارش جدید به مبلغ 0 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(167, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 43', 'سلام\r\nسفارش شما به شماره 43 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(168, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 62', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 62 به مبلغ 3000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(169, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 3,000 تومان', 'سلام\r\nدرخواست ارتقاء به طرح پوشاک آگهی به شناسه 50 با عنوان sl3409uf 0o به مبلغ 3,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(170, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 50 ثبت شد.\r\nفاکتور جدید به مبلغ 3,000 تومان با شناسه 62 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=62\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "sl3409uf 0o" ، به مدت 12 ساعت ، تحت پلن طرح پوشاک بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(171, 'support@parsunix.com', 'پرداخت فاکتور به شماره 62', 'سلام\r\nفاکتور به مبلغ 3,000 تومان با شناسه 62 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(172, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 62 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 3,000 تومان به شناسه 62 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(173, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 44', 'سلام\r\nسفارش جدید به مبلغ 0 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(174, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 44', 'سلام\r\nسفارش شما به شماره 44 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(175, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 63', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 63 به مبلغ 4000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(176, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 4,000 تومان', 'سلام\r\nدرخواست ارتقاء به نمایش برتر آگهی به شناسه 50 با عنوان sl3409uf 0o به مبلغ 4,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(177, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 50 ثبت شد.\r\nفاکتور جدید به مبلغ 4,000 تومان با شناسه 63 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=63\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "sl3409uf 0o" ، به مدت 24 ساعت ، تحت پلن نمایش برتر بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(178, 'support@parsunix.com', 'پرداخت فاکتور به شماره 63', 'سلام\r\nفاکتور به مبلغ 4,000 تومان با شناسه 63 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(179, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 63 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 4,000 تومان به شناسه 63 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(180, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 45', 'سلام\r\nسفارش جدید به مبلغ 0 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(181, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 45', 'سلام\r\nسفارش شما به شماره 45 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(182, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 64', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 64 به مبلغ 3000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(183, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 3,000 تومان', 'سلام\r\nدرخواست ارتقاء به طرح پوشاک آگهی به شناسه 50 با عنوان sl3409uf 0o به مبلغ 3,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(184, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 50 ثبت شد.\r\nفاکتور جدید به مبلغ 3,000 تومان با شناسه 64 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=64\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "sl3409uf 0o" ، به مدت 12 ساعت ، تحت پلن طرح پوشاک بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(185, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 65', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 65 به مبلغ 3000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(186, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 3,000 تومان', 'سلام\r\nدرخواست ارتقاء به طرح پوشاک آگهی به شناسه 50 با عنوان sl3409uf 0o به مبلغ 3,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(187, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 50 ثبت شد.\r\nفاکتور جدید به مبلغ 3,000 تومان با شناسه 65 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=65\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "sl3409uf 0o" ، به مدت 12 ساعت ، تحت پلن طرح پوشاک بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(188, 'support@parsunix.com', 'پرداخت فاکتور به شماره 65', 'سلام\r\nفاکتور به مبلغ 3,000 تومان با شناسه 65 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(189, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 65 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 3,000 تومان به شناسه 65 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(190, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 47', 'سلام\r\nسفارش جدید به مبلغ 0 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(191, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 47', 'سلام\r\nسفارش شما به شماره 47 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(192, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 66', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 66 به مبلغ 4000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(193, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 4,000 تومان', 'سلام\r\nدرخواست ارتقاء به نمایش برتر آگهی به شناسه 50 با عنوان sl3409uf 0o به مبلغ 4,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(194, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 50 ثبت شد.\r\nفاکتور جدید به مبلغ 4,000 تومان با شناسه 66 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=66\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "sl3409uf 0o" ، به مدت 24 ساعت ، تحت پلن نمایش برتر بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(195, 'support@parsunix.com', 'پرداخت فاکتور به شماره 66', 'سلام\r\nفاکتور به مبلغ 4,000 تومان با شناسه 66 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(196, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 66 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 4,000 تومان به شناسه 66 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(197, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 67', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 67 به مبلغ 4000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(198, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 4,000 تومان', 'سلام\r\nدرخواست ارتقاء به نمایش برتر آگهی به شناسه 50 با عنوان sl3409uf 0o به مبلغ 4,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(199, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 50 ثبت شد.\r\nفاکتور جدید به مبلغ 4,000 تومان با شناسه 67 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=67\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "sl3409uf 0o" ، به مدت 24 ساعت ، تحت پلن نمایش برتر بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(200, 'support@parsunix.com', 'پرداخت فاکتور به شماره 67', 'سلام\r\nفاکتور به مبلغ 4,000 تومان با شناسه 67 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(201, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 67 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 4,000 تومان به شناسه 67 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(202, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 68', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 68 به مبلغ 4000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(203, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 4,000 تومان', 'سلام\r\nدرخواست ارتقاء به نمایش برتر آگهی به شناسه 50 با عنوان sl3409uf 0o به مبلغ 4,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(204, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 50 ثبت شد.\r\nفاکتور جدید به مبلغ 4,000 تومان با شناسه 68 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=68\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "sl3409uf 0o" ، به مدت 24 ساعت ، تحت پلن نمایش برتر بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(205, 'support@parsunix.com', 'پرداخت فاکتور به شماره 68', 'سلام\r\nفاکتور به مبلغ 4,000 تومان با شناسه 68 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(206, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 68 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 4,000 تومان به شناسه 68 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(207, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 69', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 69 به مبلغ 4000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(208, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 4,000 تومان', 'سلام\r\nدرخواست ارتقاء به نمایش برتر آگهی به شناسه 50 با عنوان sl3409uf 0o به مبلغ 4,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(209, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 50 ثبت شد.\r\nفاکتور جدید به مبلغ 4,000 تومان با شناسه 69 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=69\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "sl3409uf 0o" ، به مدت 24 ساعت ، تحت پلن نمایش برتر بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(210, 'support@parsunix.com', 'پرداخت فاکتور به شماره 69', 'سلام\r\nفاکتور به مبلغ 4,000 تومان با شناسه 69 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(211, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 69 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 4,000 تومان به شناسه 69 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(212, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 51', 'سلام\r\nسفارش جدید به مبلغ 4000 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(213, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 51', 'سلام\r\nسفارش شما به شماره 51 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(214, 'mahmud.ghaznavi@gmail.com', 'حذف آگهی انجام شد', 'سلام\r\nکاربر گرامی\r\nآگهی شما به شناسه 52 با عنوان\r\nklkjlk j\r\nبه درخواست شما حذف شد\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(215, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 70', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 70 به مبلغ 4000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(216, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 4,000 تومان', 'سلام\r\nدرخواست ارتقاء به نمایش برتر آگهی به شناسه 53 با عنوان 897y8hiu به مبلغ 4,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(217, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 53 ثبت شد.\r\nفاکتور جدید به مبلغ 4,000 تومان با شناسه 70 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=70\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "897y8hiu" ، به مدت 24 ساعت ، تحت پلن نمایش برتر بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(218, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 71', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 71 به مبلغ 4000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(219, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 4,000 تومان', 'سلام\r\nدرخواست ارتقاء به نمایش برتر آگهی به شناسه 53 با عنوان 897y8hiu به مبلغ 4,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(220, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 53 ثبت شد.\r\nفاکتور جدید به مبلغ 4,000 تومان با شناسه 71 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=71\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "897y8hiu" ، به مدت 24 ساعت ، تحت پلن نمایش برتر بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(221, 'support@parsunix.com', 'پرداخت فاکتور به شماره 71', 'سلام\r\nفاکتور به مبلغ 4,000 تومان با شناسه 71 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(222, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 71 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 4,000 تومان به شناسه 71 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0);
INSERT INTO `mailq` (`id`, `to`, `subject`, `text`, `mail_from`, `html`) VALUES
(223, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 53', 'سلام\r\nسفارش جدید به مبلغ 4000 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(224, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 53', 'سلام\r\nسفارش شما به شماره 53 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(225, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 72', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 72 به مبلغ 4000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(226, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 4,000 تومان', 'سلام\r\nدرخواست ارتقاء به نمایش برتر آگهی به شناسه 54 با عنوان lkjjlkj l به مبلغ 4,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(227, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 54 ثبت شد.\r\nفاکتور جدید به مبلغ 4,000 تومان با شناسه 72 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=72\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "lkjjlkj l" ، به مدت 24 ساعت ، تحت پلن نمایش برتر بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(228, 'support@parsunix.com', 'پرداخت فاکتور به شماره 72', 'سلام\r\nفاکتور به مبلغ 4,000 تومان با شناسه 72 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(229, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 72 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 4,000 تومان به شناسه 72 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(230, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 54', 'سلام\r\nسفارش جدید به مبلغ 4000 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(231, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 54', 'سلام\r\nسفارش شما به شماره 54 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(232, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 73', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 73 به مبلغ 3000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(233, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 3,000 تومان', 'سلام\r\nدرخواست ارتقاء به طرح پوشاک آگهی به شناسه 51 با عنوان lkjlkj000 به مبلغ 3,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(234, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 51 ثبت شد.\r\nفاکتور جدید به مبلغ 3,000 تومان با شناسه 73 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=73\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "lkjlkj000" ، به مدت 12 ساعت ، تحت پلن طرح پوشاک بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(235, 'support@parsunix.com', 'پرداخت فاکتور به شماره 73', 'سلام\r\nفاکتور به مبلغ 3,000 تومان با شناسه 73 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(236, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 73 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 3,000 تومان به شناسه 73 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(237, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 55', 'سلام\r\nسفارش جدید به مبلغ 3000 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(238, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 55', 'سلام\r\nسفارش شما به شماره 55 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(239, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 74', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 74 به مبلغ 3000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(240, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 3,000 تومان', 'سلام\r\nدرخواست ارتقاء به طرح پوشاک آگهی به شناسه 51 با عنوان lkjlkj000 به مبلغ 3,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(241, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 51 ثبت شد.\r\nفاکتور جدید به مبلغ 3,000 تومان با شناسه 74 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=74\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "lkjlkj000" ، به مدت 12 ساعت ، تحت پلن طرح پوشاک بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(242, 'support@parsunix.com', 'پرداخت فاکتور به شماره 74', 'سلام\r\nفاکتور به مبلغ 3,000 تومان با شناسه 74 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(243, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 74 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 3,000 تومان به شناسه 74 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(244, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 56', 'سلام\r\nسفارش جدید به مبلغ 3000 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(245, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 56', 'سلام\r\nسفارش شما به شماره 56 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(246, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 75', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 75 به مبلغ 3000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(247, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 3,000 تومان', 'سلام\r\nدرخواست ارتقاء به طرح پوشاک آگهی به شناسه 55 با عنوان lkmkm به مبلغ 3,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(248, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 55 ثبت شد.\r\nفاکتور جدید به مبلغ 3,000 تومان با شناسه 75 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=75\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "lkmkm" ، به مدت 12 ساعت ، تحت پلن طرح پوشاک بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(249, 'support@parsunix.com', 'پرداخت فاکتور به شماره 75', 'سلام\r\nفاکتور به مبلغ 3,000 تومان با شناسه 75 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(250, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 75 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 3,000 تومان به شناسه 75 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(251, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 57', 'سلام\r\nسفارش جدید به مبلغ 3000 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(252, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 57', 'سلام\r\nسفارش شما به شماره 57 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(253, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 76', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 76 به مبلغ 3000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(254, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 3,000 تومان', 'سلام\r\nدرخواست ارتقاء به طرح پوشاک آگهی به شناسه 56 با عنوان lkj lj lk به مبلغ 3,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(255, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 56 ثبت شد.\r\nفاکتور جدید به مبلغ 3,000 تومان با شناسه 76 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=76\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "lkj lj lk" ، به مدت 12 ساعت ، تحت پلن طرح پوشاک بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(256, 'support@parsunix.com', 'پرداخت فاکتور به شماره 76', 'سلام\r\nفاکتور به مبلغ 3,000 تومان با شناسه 76 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(257, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 76 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 3,000 تومان به شناسه 76 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(258, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 58', 'سلام\r\nسفارش جدید به مبلغ 3000 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(259, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 58', 'سلام\r\nسفارش شما به شماره 58 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(260, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 77', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 77 به مبلغ 4000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(261, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 4,000 تومان', 'سلام\r\nدرخواست ارتقاء به نمایش برتر آگهی به شناسه 57 با عنوان lkj klj lk به مبلغ 4,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(262, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 57 ثبت شد.\r\nفاکتور جدید به مبلغ 4,000 تومان با شناسه 77 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=77\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "lkj klj lk" ، به مدت 24 ساعت ، تحت پلن نمایش برتر بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(263, 'support@parsunix.com', 'پرداخت فاکتور به شماره 77', 'سلام\r\nفاکتور به مبلغ 4,000 تومان با شناسه 77 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(264, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 77 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 4,000 تومان به شناسه 77 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(265, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 59', 'سلام\r\nسفارش جدید به مبلغ 4000 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(266, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 59', 'سلام\r\nسفارش شما به شماره 59 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(267, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 78', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 78 به مبلغ 4000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(268, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 4,000 تومان', 'سلام\r\nدرخواست ارتقاء به نمایش برتر آگهی به شناسه 58 با عنوان lkj l به مبلغ 4,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(269, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 58 ثبت شد.\r\nفاکتور جدید به مبلغ 4,000 تومان با شناسه 78 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=78\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "lkj l" ، به مدت 24 ساعت ، تحت پلن نمایش برتر بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(270, 'support@parsunix.com', 'پرداخت فاکتور به شماره 78', 'سلام\r\nفاکتور به مبلغ 4,000 تومان با شناسه 78 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(271, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 78 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 4,000 تومان به شناسه 78 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(272, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 60', 'سلام\r\nسفارش جدید به مبلغ 4000 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(273, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 60', 'سلام\r\nسفارش شما به شماره 60 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(274, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 79', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 79 به مبلغ 4000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(275, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 4,000 تومان', 'سلام\r\nدرخواست ارتقاء به نمایش برتر آگهی به شناسه 59 با عنوان l; k; به مبلغ 4,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(276, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 59 ثبت شد.\r\nفاکتور جدید به مبلغ 4,000 تومان با شناسه 79 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=79\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "l; k;" ، به مدت 24 ساعت ، تحت پلن نمایش برتر بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(277, 'support@parsunix.com', 'پرداخت فاکتور به شماره 79', 'سلام\r\nفاکتور به مبلغ 4,000 تومان با شناسه 79 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(278, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 79 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 4,000 تومان به شناسه 79 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(279, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 61', 'سلام\r\nسفارش جدید به مبلغ 4000 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(280, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 61', 'سلام\r\nسفارش شما به شماره 61 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(281, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 80', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 80 به مبلغ 4000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(282, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 4,000 تومان', 'سلام\r\nدرخواست ارتقاء به نمایش برتر آگهی به شناسه 60 با عنوان lkklj jl به مبلغ 4,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(283, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 60 ثبت شد.\r\nفاکتور جدید به مبلغ 4,000 تومان با شناسه 80 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=80\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "lkklj jl" ، به مدت 24 ساعت ، تحت پلن نمایش برتر بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(284, 'support@parsunix.com', 'پرداخت فاکتور به شماره 80', 'سلام\r\nفاکتور به مبلغ 4,000 تومان با شناسه 80 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(285, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 80 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 4,000 تومان به شناسه 80 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(286, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 62', 'سلام\r\nسفارش جدید به مبلغ 4000 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(287, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 62', 'سلام\r\nسفارش شما به شماره 62 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(288, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 81', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 81 به مبلغ 4000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(289, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 4,000 تومان', 'سلام\r\nدرخواست ارتقاء به نمایش برتر آگهی به شناسه 60 با عنوان lkklj jl به مبلغ 4,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(290, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 60 ثبت شد.\r\nفاکتور جدید به مبلغ 4,000 تومان با شناسه 81 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=81\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "lkklj jl" ، به مدت 24 ساعت ، تحت پلن نمایش برتر بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(291, 'support@parsunix.com', 'پرداخت فاکتور به شماره 81', 'سلام\r\nفاکتور به مبلغ 4,000 تومان با شناسه 81 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(292, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 81 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 4,000 تومان به شناسه 81 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(293, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 63', 'سلام\r\nسفارش جدید به مبلغ 4000 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(294, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 63', 'سلام\r\nسفارش شما به شماره 63 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(295, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 82', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 82 به مبلغ 4000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(296, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 4,000 تومان', 'سلام\r\nدرخواست ارتقاء به نمایش برتر آگهی به شناسه 60 با عنوان lkklj jl به مبلغ 4,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(297, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 60 ثبت شد.\r\nفاکتور جدید به مبلغ 4,000 تومان با شناسه 82 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=82\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "lkklj jl" ، به مدت 24 ساعت ، تحت پلن نمایش برتر بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(298, 'support@parsunix.com', 'پرداخت فاکتور به شماره 82', 'سلام\r\nفاکتور به مبلغ 4,000 تومان با شناسه 82 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(299, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 82 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 4,000 تومان به شناسه 82 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(300, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 64', 'سلام\r\nسفارش جدید به مبلغ 4000 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(301, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 64', 'سلام\r\nسفارش شما به شماره 64 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(302, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 83', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 83 به مبلغ 4000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(303, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 4,000 تومان', 'سلام\r\nدرخواست ارتقاء به نمایش برتر آگهی به شناسه 60 با عنوان lkklj jl به مبلغ 4,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(304, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 60 ثبت شد.\r\nفاکتور جدید به مبلغ 4,000 تومان با شناسه 83 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=83\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "lkklj jl" ، به مدت 24 ساعت ، تحت پلن نمایش برتر بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(305, 'support@parsunix.com', 'پرداخت فاکتور به شماره 83', 'سلام\r\nفاکتور به مبلغ 4,000 تومان با شناسه 83 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(306, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 83 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 4,000 تومان به شناسه 83 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(307, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 84', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 84 به مبلغ 4000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(308, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 4,000 تومان', 'سلام\r\nدرخواست ارتقاء به نمایش برتر آگهی به شناسه 60 با عنوان lkklj jl به مبلغ 4,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(309, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 60 ثبت شد.\r\nفاکتور جدید به مبلغ 4,000 تومان با شناسه 84 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=84\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "lkklj jl" ، به مدت 24 ساعت ، تحت پلن نمایش برتر بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(310, 'support@parsunix.com', 'پرداخت فاکتور به شماره 84', 'سلام\r\nفاکتور به مبلغ 4,000 تومان با شناسه 84 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(311, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 84 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 4,000 تومان به شناسه 84 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(312, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 66', 'سلام\r\nسفارش جدید به مبلغ 4000 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(313, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 66', 'سلام\r\nسفارش شما به شماره 66 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(314, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 85', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 85 به مبلغ 4000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(315, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 4,000 تومان', 'سلام\r\nدرخواست ارتقاء به نمایش برتر آگهی به شناسه 60 با عنوان lkklj jl به مبلغ 4,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(316, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 60 ثبت شد.\r\nفاکتور جدید به مبلغ 4,000 تومان با شناسه 85 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=85\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "lkklj jl" ، به مدت 24 ساعت ، تحت پلن نمایش برتر بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(317, 'support@parsunix.com', 'پرداخت فاکتور به شماره 85', 'سلام\r\nفاکتور به مبلغ 4,000 تومان با شناسه 85 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(318, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 85 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 4,000 تومان به شناسه 85 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(319, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 67', 'سلام\r\nسفارش جدید به مبلغ 4000 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(320, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 67', 'سلام\r\nسفارش شما به شماره 67 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(321, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 86', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 86 به مبلغ 4000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(322, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 4,000 تومان', 'سلام\r\nدرخواست ارتقاء به نمایش برتر آگهی به شناسه 60 با عنوان lkklj jl به مبلغ 4,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(323, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 60 ثبت شد.\r\nفاکتور جدید به مبلغ 4,000 تومان با شناسه 86 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=86\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "lkklj jl" ، به مدت 24 ساعت ، تحت پلن نمایش برتر بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(324, 'support@parsunix.com', 'پرداخت فاکتور به شماره 86', 'سلام\r\nفاکتور به مبلغ 4,000 تومان با شناسه 86 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(325, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 86 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 4,000 تومان به شناسه 86 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(326, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 68', 'سلام\r\nسفارش جدید به مبلغ 4000 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(327, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 68', 'سلام\r\nسفارش شما به شماره 68 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(328, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 1', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 1 به مبلغ 3000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(329, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 3,000 تومان', 'سلام\r\nدرخواست ارتقاء به طرح پوشاک آگهی به شناسه 1 با عنوان ۱۵ روز به مبلغ 3,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(330, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 1 ثبت شد.\r\nفاکتور جدید به مبلغ 3,000 تومان با شناسه 1 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=1\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "۱۵ روز" ، به مدت 12 ساعت ، تحت پلن طرح پوشاک بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(331, 'support@parsunix.com', 'پرداخت فاکتور به شماره 1', 'سلام\r\nفاکتور به مبلغ 3,000 تومان با شناسه 1 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(332, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 1 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 3,000 تومان به شناسه 1 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(333, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 1', 'سلام\r\nسفارش جدید به مبلغ 3000 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(334, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 1', 'سلام\r\nسفارش شما به شماره 1 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(335, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 2', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 2 به مبلغ 4000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(336, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 4,000 تومان', 'سلام\r\nدرخواست ارتقاء به نمایش برتر آگهی به شناسه 2 با عنوان ۱۵ روز 00 به مبلغ 4,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(337, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 2 ثبت شد.\r\nفاکتور جدید به مبلغ 4,000 تومان با شناسه 2 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=2\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "۱۵ روز 00" ، به مدت 24 ساعت ، تحت پلن نمایش برتر بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(338, 'support@parsunix.com', 'پرداخت فاکتور به شماره 2', 'سلام\r\nفاکتور به مبلغ 4,000 تومان با شناسه 2 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(339, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 2 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 4,000 تومان به شناسه 2 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(340, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 2', 'سلام\r\nسفارش جدید به مبلغ 4000 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(341, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 2', 'سلام\r\nسفارش شما به شماره 2 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(342, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 3', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 3 به مبلغ 4000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(343, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 4,000 تومان', 'سلام\r\nدرخواست ارتقاء به نمایش برتر آگهی به شناسه 3 با عنوان 889 به مبلغ 4,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(344, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 3 ثبت شد.\r\nفاکتور جدید به مبلغ 4,000 تومان با شناسه 3 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=3\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "889" ، به مدت 24 ساعت ، تحت پلن نمایش برتر بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(345, 'support@parsunix.com', 'پرداخت فاکتور به شماره 3', 'سلام\r\nفاکتور به مبلغ 4,000 تومان با شناسه 3 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(346, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 3 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 4,000 تومان به شناسه 3 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(347, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 3', 'سلام\r\nسفارش جدید به مبلغ 4000 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(348, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 3', 'سلام\r\nسفارش شما به شماره 3 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(349, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 4', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 4 به مبلغ 4000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(350, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 4,000 تومان', 'سلام\r\nدرخواست ارتقاء به نمایش برتر آگهی به شناسه 1 با عنوان ۱۵ روز به مبلغ 4,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(351, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 1 ثبت شد.\r\nفاکتور جدید به مبلغ 4,000 تومان با شناسه 4 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=4\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "۱۵ روز" ، به مدت 24 ساعت ، تحت پلن نمایش برتر بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(352, 'support@parsunix.com', 'پرداخت فاکتور به شماره 4', 'سلام\r\nفاکتور به مبلغ 4,000 تومان با شناسه 4 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(353, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 4 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 4,000 تومان به شناسه 4 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(354, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 4', 'سلام\r\nسفارش جدید به مبلغ 4000 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(355, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 4', 'سلام\r\nسفارش شما به شماره 4 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(356, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 5', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 5 به مبلغ 4000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(357, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 4,000 تومان', 'سلام\r\nدرخواست ارتقاء به نمایش برتر آگهی به شناسه 1 با عنوان ۱۵ روز به مبلغ 4,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(358, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 1 ثبت شد.\r\nفاکتور جدید به مبلغ 4,000 تومان با شناسه 5 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=5\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "۱۵ روز" ، به مدت 24 ساعت ، تحت پلن نمایش برتر بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(359, 'support@parsunix.com', 'پرداخت فاکتور به شماره 5', 'سلام\r\nفاکتور به مبلغ 4,000 تومان با شناسه 5 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(360, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 5 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 4,000 تومان به شناسه 5 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(361, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 5', 'سلام\r\nسفارش جدید به مبلغ 4000 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(362, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 5', 'سلام\r\nسفارش شما به شماره 5 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(363, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 6', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 6 به مبلغ 4000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(364, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 4,000 تومان', 'سلام\r\nدرخواست ارتقاء به نمایش برتر آگهی به شناسه 1 با عنوان ۱۵ روز به مبلغ 4,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(365, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 1 ثبت شد.\r\nفاکتور جدید به مبلغ 4,000 تومان با شناسه 6 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=6\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "۱۵ روز" ، به مدت 24 ساعت ، تحت پلن نمایش برتر بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(366, 'support@parsunix.com', 'پرداخت فاکتور به شماره 6', 'سلام\r\nفاکتور به مبلغ 4,000 تومان با شناسه 6 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(367, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 6 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 4,000 تومان به شناسه 6 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(368, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 6', 'سلام\r\nسفارش جدید به مبلغ 4000 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(369, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 6', 'سلام\r\nسفارش شما به شماره 6 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(370, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 7', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 7 به مبلغ 4000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(371, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 4,000 تومان', 'سلام\r\nدرخواست ارتقاء به نمایش برتر آگهی به شناسه 1 با عنوان ۱۵ روز به مبلغ 4,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(372, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 1 ثبت شد.\r\nفاکتور جدید به مبلغ 4,000 تومان با شناسه 7 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=7\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "۱۵ روز" ، به مدت 24 ساعت ، تحت پلن نمایش برتر بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(373, 'support@parsunix.com', 'پرداخت فاکتور به شماره 7', 'سلام\r\nفاکتور به مبلغ 4,000 تومان با شناسه 7 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(374, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 7 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 4,000 تومان به شناسه 7 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(375, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 7', 'سلام\r\nسفارش جدید به مبلغ 4000 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(376, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 7', 'سلام\r\nسفارش شما به شماره 7 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(377, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 1', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 1 به مبلغ 4000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(378, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 4,000 تومان', 'سلام\r\nدرخواست ارتقاء به نمایش برتر آگهی به شناسه 1 با عنوان ۱۵ روز به مبلغ 4,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(379, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 1 ثبت شد.\r\nفاکتور جدید به مبلغ 4,000 تومان با شناسه 1 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=1\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "۱۵ روز" ، به مدت 24 ساعت ، تحت پلن نمایش برتر بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(380, 'support@parsunix.com', 'پرداخت فاکتور به شماره 1', 'سلام\r\nفاکتور به مبلغ 4,000 تومان با شناسه 1 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(381, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 1 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 4,000 تومان به شناسه 1 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(382, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 1', 'سلام\r\nسفارش جدید به مبلغ 4000 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(383, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 1', 'سلام\r\nسفارش شما به شماره 1 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(384, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 1', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 1 به مبلغ 4000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(385, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 4,000 تومان', 'سلام\r\nدرخواست ارتقاء به نمایش برتر آگهی به شناسه 1 با عنوان ۱۵ روز به مبلغ 4,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(386, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 1 ثبت شد.\r\nفاکتور جدید به مبلغ 4,000 تومان با شناسه 1 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=1\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "۱۵ روز" ، به مدت 24 ساعت ، تحت پلن نمایش برتر بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(387, 'support@parsunix.com', 'پرداخت فاکتور به شماره 1', 'سلام\r\nفاکتور به مبلغ 4,000 تومان با شناسه 1 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(388, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 1 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 4,000 تومان به شناسه 1 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(389, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 1', 'سلام\r\nسفارش جدید به مبلغ 4000 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(390, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 1', 'سلام\r\nسفارش شما به شماره 1 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(391, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 1', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 1 به مبلغ 4000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(392, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 4,000 تومان', 'سلام\r\nدرخواست ارتقاء به نمایش برتر آگهی به شناسه 1 با عنوان ۱۵ روز به مبلغ 4,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(393, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 1 ثبت شد.\r\nفاکتور جدید به مبلغ 4,000 تومان با شناسه 1 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=1\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "۱۵ روز" ، به مدت 24 ساعت ، تحت پلن نمایش برتر بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(394, 'support@parsunix.com', 'پرداخت فاکتور به شماره 1', 'سلام\r\nفاکتور به مبلغ 4,000 تومان با شناسه 1 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(395, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 1 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 4,000 تومان به شناسه 1 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(396, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 1', 'سلام\r\nسفارش جدید به مبلغ 4000 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(397, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 1', 'سلام\r\nسفارش شما به شماره 1 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(398, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 1', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 1 به مبلغ 4000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(399, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 4,000 تومان', 'سلام\r\nدرخواست ارتقاء به نمایش برتر آگهی به شناسه 1 با عنوان ۱۵ روز به مبلغ 4,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(400, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 1 ثبت شد.\r\nفاکتور جدید به مبلغ 4,000 تومان با شناسه 1 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=1\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "۱۵ روز" ، به مدت 24 ساعت ، تحت پلن نمایش برتر بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(401, 'support@parsunix.com', 'پرداخت فاکتور به شماره 1', 'سلام\r\nفاکتور به مبلغ 4,000 تومان با شناسه 1 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(402, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 1 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 4,000 تومان به شناسه 1 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(403, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 1', 'سلام\r\nسفارش جدید به مبلغ 4000 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(404, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 1', 'سلام\r\nسفارش شما به شماره 1 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(405, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 1', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 1 به مبلغ 4000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(406, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 4,000 تومان', 'سلام\r\nدرخواست ارتقاء به نمایش برتر آگهی به شناسه 1 با عنوان ۱۵ روز به مبلغ 4,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(407, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 1 ثبت شد.\r\nفاکتور جدید به مبلغ 4,000 تومان با شناسه 1 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=1\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "۱۵ روز" ، به مدت 24 ساعت ، تحت پلن نمایش برتر بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(408, 'support@parsunix.com', 'پرداخت فاکتور به شماره 1', 'سلام\r\nفاکتور به مبلغ 4,000 تومان با شناسه 1 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(409, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 1 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 4,000 تومان به شناسه 1 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(410, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 1', 'سلام\r\nسفارش جدید به مبلغ 4000 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(411, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 1', 'سلام\r\nسفارش شما به شماره 1 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(412, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 2', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 2 به مبلغ 4000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(413, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 4,000 تومان', 'سلام\r\nدرخواست ارتقاء به نمایش برتر آگهی به شناسه 1 با عنوان ۱۵ روز به مبلغ 4,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(414, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 1 ثبت شد.\r\nفاکتور جدید به مبلغ 4,000 تومان با شناسه 2 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=2\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "۱۵ روز" ، به مدت 24 ساعت ، تحت پلن نمایش برتر بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(415, 'support@parsunix.com', 'پرداخت فاکتور به شماره 2', 'سلام\r\nفاکتور به مبلغ 4,000 تومان با شناسه 2 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(416, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 2 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 4,000 تومان به شناسه 2 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(417, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 2', 'سلام\r\nسفارش جدید به مبلغ 4000 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(418, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 2', 'سلام\r\nسفارش شما به شماره 2 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(419, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 3', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 3 به مبلغ 3000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(420, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 3,000 تومان', 'سلام\r\nدرخواست ارتقاء به طرح پوشاک آگهی به شناسه 1 با عنوان ۱۵ روز به مبلغ 3,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(421, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 1 ثبت شد.\r\nفاکتور جدید به مبلغ 3,000 تومان با شناسه 3 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=3\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "۱۵ روز" ، به مدت 12 ساعت ، تحت پلن طرح پوشاک بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(422, 'support@parsunix.com', 'پرداخت فاکتور به شماره 3', 'سلام\r\nفاکتور به مبلغ 3,000 تومان با شناسه 3 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(423, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 3 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 3,000 تومان به شناسه 3 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(424, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 3', 'سلام\r\nسفارش جدید به مبلغ 3000 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(425, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 3', 'سلام\r\nسفارش شما به شماره 3 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(426, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 1', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 1 به مبلغ 3000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(427, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 3,000 تومان', 'سلام\r\nدرخواست ارتقاء به طرح پوشاک آگهی به شناسه 1 با عنوان ۱۵ روز به مبلغ 3,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(428, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 1 ثبت شد.\r\nفاکتور جدید به مبلغ 3,000 تومان با شناسه 1 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=1\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "۱۵ روز" ، به مدت 12 ساعت ، تحت پلن طرح پوشاک بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(429, 'support@parsunix.com', 'پرداخت فاکتور به شماره 1', 'سلام\r\nفاکتور به مبلغ 3,000 تومان با شناسه 1 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(430, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 1 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 3,000 تومان به شناسه 1 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(431, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 1', 'سلام\r\nسفارش جدید به مبلغ 3000 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(432, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 1', 'سلام\r\nسفارش شما به شماره 1 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(433, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 2', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 2 به مبلغ 4000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(434, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 4,000 تومان', 'سلام\r\nدرخواست ارتقاء به نمایش برتر آگهی به شناسه 1 با عنوان ۱۵ روز به مبلغ 4,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(435, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 1 ثبت شد.\r\nفاکتور جدید به مبلغ 4,000 تومان با شناسه 2 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=2\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "۱۵ روز" ، به مدت 24 ساعت ، تحت پلن نمایش برتر بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(436, 'support@parsunix.com', 'پرداخت فاکتور به شماره 2', 'سلام\r\nفاکتور به مبلغ 4,000 تومان با شناسه 2 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(437, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 2 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 4,000 تومان به شناسه 2 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(438, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 2', 'سلام\r\nسفارش جدید به مبلغ 4000 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0);
INSERT INTO `mailq` (`id`, `to`, `subject`, `text`, `mail_from`, `html`) VALUES
(439, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 2', 'سلام\r\nسفارش شما به شماره 2 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(440, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 3', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 3 به مبلغ 3000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(441, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 3,000 تومان', 'سلام\r\nدرخواست ارتقاء به طرح پوشاک آگهی به شناسه 1 با عنوان ۱۵ روز به مبلغ 3,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(442, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 1 ثبت شد.\r\nفاکتور جدید به مبلغ 3,000 تومان با شناسه 3 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=3\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "۱۵ روز" ، به مدت 12 ساعت ، تحت پلن طرح پوشاک بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(443, 'support@parsunix.com', 'پرداخت فاکتور به شماره 3', 'سلام\r\nفاکتور به مبلغ 3,000 تومان با شناسه 3 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(444, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 3 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 3,000 تومان به شناسه 3 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(445, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 3', 'سلام\r\nسفارش جدید به مبلغ 3000 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(446, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 3', 'سلام\r\nسفارش شما به شماره 3 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(447, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 4', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 4 به مبلغ 3000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(448, 'support@parsunix.com', 'ثبت درخواست تمدید آگهی به مبلغ 3,000 تومان', 'سلام\r\nدرخواست تمدید به طرح پوشاک آگهی به شناسه 1 با عنوان ۱۵ روز به مبلغ 3,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(449, 'mahmud.ghaznavi@gmail.com', 'درخواست تمدید آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست تمدید آگهی شما با شناسه 1 ثبت شد.\r\nفاکتور جدید به مبلغ 3,000 تومان با شناسه 4 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=4\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "۱۵ روز" ، به مدت 12 ساعت ، تحت پلن طرح پوشاک بصورت ویژه تمدید خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(450, 'support@parsunix.com', 'پرداخت فاکتور به شماره 4', 'سلام\r\nفاکتور به مبلغ 3,000 تومان با شناسه 4 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(451, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 4 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 3,000 تومان به شناسه 4 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(452, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 4', 'سلام\r\nسفارش جدید به مبلغ 3000 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(453, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 4', 'سلام\r\nسفارش شما به شماره 4 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(454, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 5', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 5 به مبلغ 3000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(455, 'support@parsunix.com', 'ثبت درخواست تمدید آگهی به مبلغ 3,000 تومان', 'سلام\r\nدرخواست تمدید به طرح پوشاک آگهی به شناسه 1 با عنوان ۱۵ روز به مبلغ 3,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(456, 'mahmud.ghaznavi@gmail.com', 'درخواست تمدید آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست تمدید آگهی شما با شناسه 1 ثبت شد.\r\nفاکتور جدید به مبلغ 3,000 تومان با شناسه 5 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=5\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "۱۵ روز" ، به مدت 12 ساعت ، تحت پلن طرح پوشاک بصورت ویژه تمدید خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(457, 'support@parsunix.com', 'پرداخت فاکتور به شماره 5', 'سلام\r\nفاکتور به مبلغ 3,000 تومان با شناسه 5 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(458, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 5 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 3,000 تومان به شناسه 5 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(459, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 5', 'سلام\r\nسفارش جدید به مبلغ 3000 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(460, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 5', 'سلام\r\nسفارش شما به شماره 5 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(461, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 6', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 6 به مبلغ 3000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(462, 'support@parsunix.com', 'ثبت درخواست تمدید آگهی به مبلغ 3,000 تومان', 'سلام\r\nدرخواست تمدید به طرح پوشاک آگهی به شناسه 1 با عنوان ۱۵ روز به مبلغ 3,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(463, 'mahmud.ghaznavi@gmail.com', 'درخواست تمدید آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست تمدید آگهی شما با شناسه 1 ثبت شد.\r\nفاکتور جدید به مبلغ 3,000 تومان با شناسه 6 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=6\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "۱۵ روز" ، به مدت 12 ساعت ، تحت پلن طرح پوشاک بصورت ویژه تمدید خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(464, 'support@parsunix.com', 'پرداخت فاکتور به شماره 6', 'سلام\r\nفاکتور به مبلغ 3,000 تومان با شناسه 6 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(465, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 6 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 3,000 تومان به شناسه 6 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(466, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 6', 'سلام\r\nسفارش جدید به مبلغ 3000 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(467, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 6', 'سلام\r\nسفارش شما به شماره 6 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(468, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 7', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 7 به مبلغ 3000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(469, 'support@parsunix.com', 'ثبت درخواست تمدید آگهی به مبلغ 3,000 تومان', 'سلام\r\nدرخواست تمدید به طرح پوشاک آگهی به شناسه 1 با عنوان ۱۵ روز به مبلغ 3,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(470, 'mahmud.ghaznavi@gmail.com', 'درخواست تمدید آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست تمدید آگهی شما با شناسه 1 ثبت شد.\r\nفاکتور جدید به مبلغ 3,000 تومان با شناسه 7 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=7\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "۱۵ روز" ، به مدت 12 ساعت ، تحت پلن طرح پوشاک بصورت ویژه تمدید خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(471, 'support@parsunix.com', 'پرداخت فاکتور به شماره 7', 'سلام\r\nفاکتور به مبلغ 3,000 تومان با شناسه 7 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(472, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 7 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 3,000 تومان به شناسه 7 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(473, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 7', 'سلام\r\nسفارش جدید به مبلغ 3000 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(474, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 7', 'سلام\r\nسفارش شما به شماره 7 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(475, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 1', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 1 به مبلغ 3000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(476, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 3,000 تومان', 'سلام\r\nدرخواست ارتقاء به طرح پوشاک آگهی به شناسه 1 با عنوان ۱۵ روز به مبلغ 3,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(477, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 1 ثبت شد.\r\nفاکتور جدید به مبلغ 3,000 تومان با شناسه 1 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=1\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "۱۵ روز" ، به مدت 12 ساعت ، تحت پلن طرح پوشاک بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(478, 'support@parsunix.com', 'پرداخت فاکتور به شماره 1', 'سلام\r\nفاکتور به مبلغ 3,000 تومان با شناسه 1 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(479, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 1 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 3,000 تومان به شناسه 1 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(480, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 1', 'سلام\r\nسفارش جدید به مبلغ 3000 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(481, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 1', 'سلام\r\nسفارش شما به شماره 1 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(482, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 2', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 2 به مبلغ 3000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(483, 'support@parsunix.com', 'ثبت درخواست تمدید آگهی به مبلغ 3,000 تومان', 'سلام\r\nدرخواست تمدید به طرح پوشاک آگهی به شناسه 1 با عنوان ۱۵ روز به مبلغ 3,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(484, 'mahmud.ghaznavi@gmail.com', 'درخواست تمدید آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست تمدید آگهی شما با شناسه 1 ثبت شد.\r\nفاکتور جدید به مبلغ 3,000 تومان با شناسه 2 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=2\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "۱۵ روز" ، به مدت 12 ساعت ، تحت پلن طرح پوشاک بصورت ویژه تمدید خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(485, 'support@parsunix.com', 'پرداخت فاکتور به شماره 2', 'سلام\r\nفاکتور به مبلغ 3,000 تومان با شناسه 2 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(486, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 2 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 3,000 تومان به شناسه 2 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(487, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 2', 'سلام\r\nسفارش جدید به مبلغ 3000 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(488, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 2', 'سلام\r\nسفارش شما به شماره 2 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(489, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 3', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 3 به مبلغ 4000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(490, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 4', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 4 به مبلغ 12000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(491, 'support@parsunix.com', 'پرداخت فاکتور به شماره 4', 'سلام\r\nفاکتور به مبلغ 12,000 تومان با شناسه 4 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(492, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 4 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 12,000 تومان به شناسه 4 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(493, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 4', 'سلام\r\nسفارش جدید به مبلغ 12000 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(494, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 4', 'سلام\r\nسفارش شما به شماره 4 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(495, 'support@parsunix.com', '', '', 'noreply@127.0.0.1', 0),
(496, 'mahmud.ghaznavi@gmail.com', '', '', 'noreply@127.0.0.1', 0),
(497, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 5', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 5 به مبلغ 4000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(498, 'support@parsunix.com', 'پرداخت فاکتور به شماره 5', 'سلام\r\nفاکتور به مبلغ 4,000 تومان با شناسه 5 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(499, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 5 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 4,000 تومان به شناسه 5 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(500, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 5', 'سلام\r\nسفارش جدید به مبلغ 4000 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(501, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 5', 'سلام\r\nسفارش شما به شماره 5 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(502, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 6', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 6 به مبلغ 3000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(503, 'support@parsunix.com', 'ثبت درخواست ارتقاء آگهی به مبلغ 3,000 تومان', 'سلام\r\nدرخواست ارتقاء به طرح پوشاک آگهی به شناسه 7 با عنوان 90u به مبلغ 3,000 تومان توسط کاربر محمود غضنوی ثبت شده است.\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(504, 'mahmud.ghaznavi@gmail.com', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، محمود غضنوی\r\nدرخواست ارتقاء آگهی شما با شناسه 7 ثبت شد.\r\nفاکتور جدید به مبلغ 3,000 تومان با شناسه 6 ایجاد شد.\r\n\r\nhttp://127.0.0.1/PROJ/postgah.com/?page=14&do=billing_userpanel_payment&invoice_id=6\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "90u" ، به مدت 12 ساعت ، تحت پلن طرح پوشاک بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(505, 'support@parsunix.com', 'پرداخت فاکتور به شماره 6', 'سلام\r\nفاکتور به مبلغ 3,000 تومان با شناسه 6 توسط {user_name} پرداخت شد.', 'noreply@127.0.0.1', 0),
(506, 'mahmud.ghaznavi@gmail.com', 'فاکتور شما به شماره 6 پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ 3,000 تومان به شناسه 6 پرداخت شد.\r\nبا تشکر از خرید شما', 'noreply@127.0.0.1', 0),
(507, 'support@parsunix.com', 'ثبت سفارش جدید به شماره 6', 'سلام\r\nسفارش جدید به مبلغ 3000 تومان توسط {user_name} ثبت شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(508, 'mahmud.ghaznavi@gmail.com', 'ثبت سفارش شماره 6', 'سلام\r\nسفارش شما به شماره 6 ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'noreply@127.0.0.1', 0),
(509, 'support@parsunix.com', '', '', 'noreply@127.0.0.1', 0),
(510, 'mahmud.ghaznavi@gmail.com', '', '', 'noreply@127.0.0.1', 0),
(511, 'support@parsunix.com', '', '', 'noreply@127.0.0.1', 0),
(512, 'mahmud.ghaznavi@gmail.com', '', '', 'noreply@127.0.0.1', 0),
(513, 'support@parsunix.com', '', '', 'noreply@127.0.0.1', 0),
(514, 'mahmud.ghaznavi@gmail.com', '', '', 'noreply@127.0.0.1', 0),
(515, 'support@parsunix.com', '', '', 'noreply@127.0.0.1', 0),
(516, 'mahmud.ghaznavi@gmail.com', '', '', 'noreply@127.0.0.1', 0),
(517, 'support@parsunix.com', '', '', 'noreply@127.0.0.1', 0),
(518, 'mahmud.ghaznavi@gmail.com', '', '', 'noreply@127.0.0.1', 0),
(519, 'support@parsunix.com', '', '', 'noreply@127.0.0.1', 0),
(520, 'mahmud.ghaznavi@gmail.com', '', '', 'noreply@127.0.0.1', 0),
(521, 'support@parsunix.com', '', '', 'noreply@127.0.0.1', 0),
(522, 'mahmud.ghaznavi@gmail.com', '', '', 'noreply@127.0.0.1', 0),
(523, 'support@parsunix.com', '', '', 'noreply@127.0.0.1', 0),
(524, 'mahmud.ghaznavi@gmail.com', '', '', 'noreply@127.0.0.1', 0),
(525, 'support@parsunix.com', '', '', 'noreply@127.0.0.1', 0),
(526, 'mahmud.ghaznavi@gmail.com', '', '', 'noreply@127.0.0.1', 0),
(527, 'support@parsunix.com', '', '', 'noreply@127.0.0.1', 0),
(528, 'mahmud.ghaznavi@gmail.com', '', '', 'noreply@127.0.0.1', 0),
(529, 'support@parsunix.com', '', '', 'noreply@127.0.0.1', 0),
(530, 'mahmud.ghaznavi@gmail.com', '', '', 'noreply@127.0.0.1', 0),
(531, 'support@parsunix.com', '', '', 'noreply@127.0.0.1', 0),
(532, 'mahmud.ghaznavi@gmail.com', '', '', 'noreply@127.0.0.1', 0),
(533, 'support@parsunix.com', '', '', 'noreply@127.0.0.1', 0),
(534, 'mahmud.ghaznavi@gmail.com', '', '', 'noreply@127.0.0.1', 0),
(535, 'support@parsunix.com', '', '', 'noreply@127.0.0.1', 0),
(536, 'mahmud.ghaznavi@gmail.com', '', '', 'noreply@127.0.0.1', 0),
(537, 'support@parsunix.com', '', '', 'noreply@127.0.0.1', 0),
(538, 'mahmud.ghaznavi@gmail.com', '', '', 'noreply@127.0.0.1', 0),
(539, 'support@parsunix.com', '', '', 'noreply@127.0.0.1', 0),
(540, 'mahmud.ghaznavi@gmail.com', '', '', 'noreply@127.0.0.1', 0),
(541, 'support@parsunix.com', '', '', 'noreply@127.0.0.1', 0),
(542, 'mahmud.ghaznavi@gmail.com', '', '', 'noreply@127.0.0.1', 0),
(543, 'support@parsunix.com', '', '', 'noreply@127.0.0.1', 0),
(544, 'mahmud.ghaznavi@gmail.com', '', '', 'noreply@127.0.0.1', 0),
(545, 'support@parsunix.com', '', '', 'noreply@127.0.0.1', 0),
(546, 'mahmud.ghaznavi@gmail.com', '', '', 'noreply@127.0.0.1', 0),
(547, 'support@parsunix.com', '', '', 'noreply@127.0.0.1', 0),
(548, 'mahmud.ghaznavi@gmail.com', '', '', 'noreply@127.0.0.1', 0),
(549, 'support@parsunix.com', '', '', 'noreply@127.0.0.1', 0),
(550, 'mahmud.ghaznavi@gmail.com', '', '', 'noreply@127.0.0.1', 0),
(551, 'support@parsunix.com', '', '', 'noreply@127.0.0.1', 0),
(552, 'mahmud.ghaznavi@gmail.com', '', '', 'noreply@127.0.0.1', 0),
(553, 'support@parsunix.com', '', '', 'noreply@127.0.0.1', 0),
(554, 'mahmud.ghaznavi@gmail.com', '', '', 'noreply@127.0.0.1', 0),
(555, 'support@parsunix.com', '', '', 'noreply@127.0.0.1', 0),
(556, 'mahmud.ghaznavi@gmail.com', '', '', 'noreply@127.0.0.1', 0),
(557, 'support@parsunix.com', '', '', 'noreply@127.0.0.1', 0),
(558, 'mahmud.ghaznavi@gmail.com', '', '', 'noreply@127.0.0.1', 0),
(559, 'support@parsunix.com', '', '', 'noreply@127.0.0.1', 0),
(560, 'mahmud.ghaznavi@gmail.com', '', '', 'noreply@127.0.0.1', 0),
(561, 'support@parsunix.com', '', '', 'noreply@127.0.0.1', 0),
(562, 'mahmud.ghaznavi@gmail.com', '', '', 'noreply@127.0.0.1', 0),
(563, 'support@parsunix.com', '', '', 'noreply@127.0.0.1', 0),
(564, 'mahmud.ghaznavi@gmail.com', '', '', 'noreply@127.0.0.1', 0),
(565, 'support@parsunix.com', '', '', 'noreply@127.0.0.1', 0),
(566, 'mahmud.ghaznavi@gmail.com', '', '', 'noreply@127.0.0.1', 0),
(567, 'support@parsunix.com', '', '', 'noreply@127.0.0.1', 0),
(568, 'mahmud.ghaznavi@gmail.com', '', '', 'noreply@127.0.0.1', 0),
(569, 'support@parsunix.com', '', '', 'noreply@127.0.0.1', 0),
(570, 'mahmud.ghaznavi@gmail.com', '', '', 'noreply@127.0.0.1', 0),
(571, 'support@parsunix.com', '', '', 'noreply@127.0.0.1', 0),
(572, 'mahmud.ghaznavi@gmail.com', '', '', 'noreply@127.0.0.1', 0),
(573, 'support@parsunix.com', '', '', 'noreply@127.0.0.1', 0),
(574, 'mahmud.ghaznavi@gmail.com', '', '', 'noreply@127.0.0.1', 0),
(575, 'support@parsunix.com', '', '', 'noreply@127.0.0.1', 0),
(576, 'mahmud.ghaznavi@gmail.com', '', '', 'noreply@127.0.0.1', 0),
(577, 'support@parsunix.com', '', '', 'noreply@127.0.0.1', 0),
(578, 'mahmud.ghaznavi@gmail.com', '', '', 'noreply@127.0.0.1', 0),
(579, 'support@parsunix.com', '', '', 'noreply@127.0.0.1', 0),
(580, 'mahmud.ghaznavi@gmail.com', '', '', 'noreply@127.0.0.1', 0),
(581, 'support@parsunix.com', '', '', 'noreply@127.0.0.1', 0),
(582, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 7', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 7 به مبلغ 1000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(583, 'support@parsunix.com', '', '', 'noreply@127.0.0.1', 0),
(584, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 8', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 8 به مبلغ 1000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(585, 'support@parsunix.com', '', '', 'noreply@127.0.0.1', 0),
(586, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 9', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 9 به مبلغ 1000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(587, 'support@parsunix.com', '', '', 'noreply@127.0.0.1', 0),
(588, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 10', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 10 به مبلغ 1000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(589, 'support@parsunix.com', '', '', 'noreply@127.0.0.1', 0),
(590, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 11', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 11 به مبلغ 1000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(591, 'support@parsunix.com', '', '', 'noreply@127.0.0.1', 0),
(592, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 12', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 12 به مبلغ 12000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(593, 'support@parsunix.com', 'ثبت پرداخت آفلاین به مبلغ 12,000 تومان', 'سلام\r\nثبت مبلغ 12,000 تومان توسط کاربر با نام {user_name} در بانک بانک صادرات انجام شد', 'noreply@127.0.0.1', 0),
(594, 'mahmud.ghaznavi@gmail.com', 'پرداخت آفلاین به مبلغ 12,000 تومان', 'با سلام\r\nپرداخت شما به مبلغ 12,000 تومان ثبت گردید و بزودی به تایید مدیریت خواهد رسید\r\nبا تشکر', 'noreply@127.0.0.1', 0),
(595, 'support@parsunix.com', '', '', 'noreply@127.0.0.1', 0),
(596, 'mahmud.ghaznavi@gmail.com', 'ثبت فاکتور 13', 'کاربر گرامی\r\nمحمود غضنوی\r\n\r\nفاکتور جدید به شناسه 13 به مبلغ 90000 ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', 'noreply@127.0.0.1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_persian_ci NOT NULL DEFAULT '',
  `meta_title` text COLLATE utf8_persian_ci NOT NULL COMMENT 'عنوان صفحه',
  `meta_kw` text COLLATE utf8_persian_ci NOT NULL COMMENT 'کلمات کلیدی',
  `meta_desc` text COLLATE utf8_persian_ci NOT NULL COMMENT 'توضیحات'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `name`, `meta_title`, `meta_kw`, `meta_desc`) VALUES
(2, 'ارتباط با ما', '', '', ''),
(20, 'سوالات متداول', '', '', ''),
(1, 'صفحه اصلی', '', '', ''),
(3, 'درباره ما', '', '', ''),
(4, 'راهنمای سایت', '', '', ''),
(5, 'آموزش', '', '', ''),
(6, 'قوانین و مقرارت', '', '', ''),
(7, 'ضوابط حفظ حریم خصوصی', '', '', ''),
(14, 'محیط کاربری', '', '', ''),
(19, 'پروفایل کاربر', '', '', ''),
(58, 'ثبت نام', '', '', ''),
(59, 'ثبت نام #2', '', '', ''),
(60, 'ورود کاربر', '', '', ''),
(63, 'فراموشی کلمه عبور', '', '', ''),
(64, 'همکاری با پستگاه چیست؟', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `page_layer`
--

CREATE TABLE `page_layer` (
  `id` int(11) NOT NULL,
  `page_id` int(6) NOT NULL DEFAULT '0',
  `prio` int(6) NOT NULL DEFAULT '0',
  `func` varchar(250) COLLATE utf8_persian_ci NOT NULL DEFAULT '',
  `type` varchar(25) COLLATE utf8_persian_ci NOT NULL DEFAULT '',
  `name` varchar(250) COLLATE utf8_persian_ci NOT NULL DEFAULT '',
  `data` text COLLATE utf8_persian_ci NOT NULL,
  `framed` int(6) NOT NULL DEFAULT '0',
  `flag` int(6) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `page_layer`
--

INSERT INTO `page_layer` (`id`, `page_id`, `prio`, `func`, `type`, `name`, `data`, `framed`, `flag`) VALUES
(2, 2, 1, 'contact_vw_form', '', 'ارتباط با ما', '', 1, 1),
(20, 20, 1, 'faq_display', '', 'سوالات متداول', '', 1, 1),
(1, 1, 2, 'post', 'HTML', 'صفحه اصلی', 'درحال آماده سازی ...', 1, 1),
(3, 3, 1, 'post', 'HTML', 'درباره ما', 'درحال آماده سازی ...', 1, 1),
(4, 4, 1, 'post', 'HTML', 'راهنمای سایت', 'درحال آماده سازی ...', 1, 1),
(5, 5, 1, 'post', 'HTML', 'آموزش', 'درحال آماده سازی ...', 1, 1),
(6, 6, 1, 'post', 'HTML', 'قوانین و مقرارت', 'درحال آماده سازی ...', 1, 1),
(7, 7, 1, 'post', 'HTML', 'ضوابط حفظ حریم خصوصی', 'درحال آماده سازی ...', 1, 1),
(14, 14, 2, 'userpanel_desk', '', 'پنل کاربر', '', 1, 1),
(15, 14, 1, 'userpanel_menu', '', 'منوی کاربر', '', 1, 1),
(19, 19, 1, 'userprofile_vw', 'PHP5', 'پروفایل', '', 1, 1),
(58, 58, 1, 'post', 'PHP5', 'ثبت نام', '<?\r\nusers_register_form();\r\n?>', 1, 1),
(59, 59, 1, 'post', 'PHP5', 'ثبت نام', '<?\r\nusers_register_do();\r\n?>', 1, 1),
(60, 60, 1, 'post', 'PHP5', 'ورود کاربر', '<?\r\nusers_login_form();\r\n?>', 1, 1),
(63, 63, 1, 'post', 'PHP5', 'فراموشی کلمه عبور', '<?\r\nusers_forgot_form();\r\n?>', 1, 1),
(64, 64, 1, 'layout_post', 'HTML', 'همکاری با پستگاه چیست؟', '<p style="text-align: center;"><br /><br />درحال&nbsp;آماده سازی<br /><br /><br /><br /></p>', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `id` int(11) NOT NULL COMMENT 'شناسه',
  `name` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'عنوان',
  `name_on_form` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'عنوان در فرم',
  `cat_id` int(11) NOT NULL COMMENT 'گروه',
  `position_id` int(11) NOT NULL COMMENT 'منطقه',
  `icon` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'آیکن',
  `watermark` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'واترمارک',
  `watermark_onlyfirst` int(11) NOT NULL COMMENT 'فقط تصویر اصلی',
  `sample_page` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'صفحه نمونه',
  `search_box_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'رنگ کادر جستجو',
  `search_box_color_flag` int(1) NOT NULL COMMENT 'تمایز رنگ در نتایج',
  `show_in_index` int(1) NOT NULL COMMENT 'نمایش در صفحه اصلی',
  `suggest_as_related` int(1) NOT NULL COMMENT 'پیشنهاد به عنوان آگهی مرتبط',
  `send_in_newsletter` int(1) NOT NULL COMMENT 'ارسال در خبرنامه',
  `pin_in_all_cat` int(1) NOT NULL COMMENT 'نمایش در صدر همه گروه ها',
  `pin_in_own_cat` int(1) NOT NULL COMMENT 'نمایش در صدر گروه خود',
  `pin_in_search` int(1) NOT NULL COMMENT 'نمایش در صدر جستجو',
  `search_result_cover` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'عکس کادر جستجو',
  `prio` int(11) NOT NULL COMMENT 'اولویت',
  `flag` int(1) NOT NULL COMMENT 'وضعیت',
  `hide` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`id`, `name`, `name_on_form`, `cat_id`, `position_id`, `icon`, `watermark`, `watermark_onlyfirst`, `sample_page`, `search_box_color`, `search_box_color_flag`, `show_in_index`, `suggest_as_related`, `send_in_newsletter`, `pin_in_all_cat`, `pin_in_own_cat`, `pin_in_search`, `search_result_cover`, `prio`, `flag`, `hide`) VALUES
(2, 'پوشش جامع', 'نمایش با پوشش جامع', 45, 1018, '', '', 1, 'http://postgah.com/1023223.html', '#ea89e1', 1, 1, 1, 1, 1, 0, 1, '', 3, 1, 0),
(4, 'ویژه پوشاک', 'طرح پوشاک', 27, 0, 'data/plan_icon/4/0-1468392855-ScreenShot2016-07-13at110555AM.jpg', 'data/plan_watermark/4/0-1468392855-ScreenShot2016-07-13at110555AM.jpg', 1, 'http://google.com/yahoo.html', '#ff2f92', 1, 1, 1, 1, 1, 1, 1, 'data/plan_search_result_cover/4/0-1468392855-ScreenShot2016-07-13at110627AM.jpg', 2, 1, 0),
(12, 'پلان همگانی ویژه', 'نمایش برتر', 0, 0, '', '', 0, '', '#000000', 0, 0, 0, 0, 0, 0, 0, '', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `plan_duration`
--

CREATE TABLE `plan_duration` (
  `id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'عنوان زمانی',
  `hour` int(11) NOT NULL COMMENT 'ساعت',
  `cost` int(11) NOT NULL COMMENT 'هزینه'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plan_duration`
--

INSERT INTO `plan_duration` (`id`, `plan_id`, `name`, `hour`, `cost`) VALUES
(1, 2, 'روزانه', 24, 12000),
(3, 2, 'سه روزه', 72, 24000),
(4, 7, 'ldkjflkfjs999 999', 12, 23990),
(5, 7, 'sklfjldfjk1', 18, 23094),
(6, 7, 'jjkj', 89, 899889),
(7, 4, 'یک هفته', 168, 14000),
(8, 4, 'نیمه روز', 12, 3000),
(29, 12, 'روزانه', 24, 4000);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `parent` int(11) NOT NULL,
  `type` varchar(50) COLLATE utf8_persian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='region/city/state/coutry/continent';

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `name`, `parent`, `type`) VALUES
(1001, 'آبش احمد', 101, 'city'),
(1004, 'تنکابن', 138, 'city'),
(1018, 'آذر شهر', 101, 'city'),
(1019, 'اسکو', 101, 'city'),
(1020, 'آقکند', 101, 'city'),
(1021, 'اهر', 101, 'city'),
(1022, 'ایلخچی', 101, 'city'),
(1023, 'احمد سر گوراب', 136, 'city'),
(1024, 'اسالم', 136, 'city'),
(1025, 'آستارا', 136, 'city'),
(1090, 'آستانه اشرفیه', 136, 'city'),
(1027, 'باسمنج', 101, 'city'),
(1028, 'بخشایش', 101, 'city'),
(1029, 'بستان آباد', 101, 'city'),
(1030, 'بناب', 101, 'city'),
(1031, 'تبریز', 101, 'city'),
(1032, 'ترک', 101, 'city'),
(1033, 'ترکمنچای', 101, 'city'),
(1034, 'تسوج', 101, 'city'),
(1035, 'تیکمه داش', 101, 'city'),
(1036, 'جلفا', 101, 'city'),
(1037, 'خاروانا', 101, 'city'),
(1038, 'خامنه', 101, 'city'),
(1039, 'خراجو', 101, 'city'),
(1040, 'خسروشهر', 101, 'city'),
(1041, 'خمارلو', 101, 'city'),
(1042, 'خواجه', 101, 'city'),
(1043, 'دوزدوزان', 101, 'city'),
(1044, 'زرنق', 101, 'city'),
(1045, 'زنوز', 101, 'city'),
(1046, 'سراب', 101, 'city'),
(1047, 'سردرود', 101, 'city'),
(1048, 'سیس', 101, 'city'),
(1049, 'سیه رود', 101, 'city'),
(1050, 'شبستر', 101, 'city'),
(1051, 'شربیان', 101, 'city'),
(1052, 'شرفخانه', 101, 'city'),
(1053, 'شندآباد', 101, 'city'),
(1054, 'صوفیان', 101, 'city'),
(1055, 'عجب شیر', 101, 'city'),
(1056, 'قره آغاج', 101, 'city'),
(1057, 'کشک سرای', 101, 'city'),
(1058, 'کلوانق', 101, 'city'),
(1059, 'کلیبر', 101, 'city'),
(1060, 'کوزه کنان', 101, 'city'),
(1061, 'گوگان', 101, 'city'),
(1062, 'لیلان', 101, 'city'),
(1063, 'مراغه', 101, 'city'),
(1064, 'مرند', 101, 'city'),
(1065, 'ملکان', 101, 'city'),
(1066, 'ممقان', 101, 'city'),
(1067, 'مهربان', 101, 'city'),
(1068, 'میانه', 101, 'city'),
(1069, 'وایقان', 101, 'city'),
(1070, 'ورزقان', 101, 'city'),
(1071, 'هادی شهر', 101, 'city'),
(1072, 'هریس', 101, 'city'),
(1073, 'هشترود', 101, 'city'),
(1074, 'هوراند', 101, 'city'),
(1075, 'یامچی', 101, 'city'),
(1076, 'ارومیه', 114, 'city'),
(1077, 'اشنویه', 114, 'city'),
(1078, 'بوکان', 114, 'city'),
(1079, 'پیرانشهر', 114, 'city'),
(1080, 'تکاب', 114, 'city'),
(1081, 'خوی', 114, 'city'),
(1082, 'چالدران', 114, 'city'),
(1083, 'سردشت', 114, 'city'),
(1084, 'سلماس', 114, 'city'),
(1085, 'شاهین دژ', 114, 'city'),
(1086, 'ماکو', 114, 'city'),
(1087, 'مهاباد', 114, 'city'),
(1088, 'میاندوآب', 114, 'city'),
(1089, 'نقده', 114, 'city'),
(1091, 'اطاقور', 136, 'city'),
(1092, 'املش', 136, 'city'),
(1093, 'بازار جمعه', 136, 'city'),
(1094, 'بره سر', 136, 'city'),
(1095, 'بندر انزلی', 136, 'city'),
(1096, 'پره سر', 136, 'city'),
(1097, 'توتکابن', 136, 'city'),
(1098, 'جیرنده', 136, 'city'),
(1099, 'چابکسر', 136, 'city'),
(1100, 'حویق', 136, 'city'),
(1101, 'خشکبیجار', 136, 'city'),
(1102, 'دیلمان', 136, 'city'),
(1103, 'رانکوه', 136, 'city'),
(1104, 'رحیم آباد', 136, 'city'),
(1105, 'رستم آباد', 136, 'city'),
(1106, 'رضوانشهر', 136, 'city'),
(1107, 'رودبار', 136, 'city'),
(1108, 'رودسر', 136, 'city'),
(1109, 'رودبنه', 136, 'city'),
(1110, 'سنگر', 136, 'city'),
(1111, 'سیاهکل', 136, 'city'),
(1112, 'شفت', 136, 'city'),
(1113, 'شلمان', 136, 'city'),
(1114, 'لاهیجان', 136, 'city'),
(1115, 'لشت نشا', 136, 'city'),
(1116, 'لنگرود', 136, 'city'),
(1117, 'لوشان', 136, 'city'),
(1118, 'لوندویل', 136, 'city'),
(1119, 'لیسار', 136, 'city'),
(1120, 'ماسال', 136, 'city'),
(1121, 'ماسوله', 136, 'city'),
(1122, 'مرجقل', 136, 'city'),
(1123, 'منجیل', 136, 'city'),
(1124, 'واجارگاه', 136, 'city'),
(1125, 'هشتپر', 136, 'city'),
(1126, 'ازنا', 137, 'city'),
(1127, 'اشترینان', 137, 'city'),
(1128, 'الشتر', 137, 'city'),
(1129, 'الیگودرز', 137, 'city'),
(1130, 'بروجرد', 137, 'city'),
(1131, 'پل دختر', 137, 'city'),
(1132, 'چالانچولان', 137, 'city'),
(1133, 'چغلوندی', 137, 'city'),
(1134, 'چقابل', 137, 'city'),
(1135, 'خرم آباد', 137, 'city'),
(1136, 'دورود', 137, 'city'),
(1137, 'زاغه', 137, 'city'),
(1138, 'سپید دشت', 137, 'city'),
(1139, 'سراب دوره', 137, 'city'),
(1140, 'فیروز آباد', 137, 'city'),
(1141, 'کونانی', 137, 'city'),
(1142, 'کوهدشت', 137, 'city'),
(1143, 'گراب', 137, 'city'),
(1144, 'محمودوند', 137, 'city'),
(1145, 'معمولان', 137, 'city'),
(1146, 'مومن آباد', 137, 'city'),
(1147, 'نور آباد', 137, 'city'),
(1148, 'آلاشت', 138, 'city'),
(1149, 'آمل', 138, 'city'),
(1150, 'امیر کلا', 138, 'city'),
(1151, 'بابل', 138, 'city'),
(1152, 'بابلسر', 138, 'city'),
(1153, 'بلده', 138, 'city'),
(1154, 'بهشهر', 138, 'city'),
(1155, 'بهنمیر', 138, 'city'),
(1156, 'پل سفید', 138, 'city'),
(1157, 'تنکابن', 138, 'city'),
(1158, 'جویبار', 138, 'city'),
(1159, 'چالوس', 138, 'city'),
(1160, 'چمستان', 138, 'city'),
(1161, 'خرم آباد', 138, 'city'),
(1162, 'خوش رودپی', 138, 'city'),
(1163, 'رامسر', 138, 'city'),
(1164, 'رستمکلا', 138, 'city'),
(1165, 'رویان', 138, 'city'),
(1166, 'رینه', 138, 'city'),
(1167, 'زرگرمحله', 138, 'city'),
(1168, 'زیرآب', 138, 'city'),
(1169, 'ساری', 138, 'city'),
(1170, 'سرخ رود', 138, 'city'),
(1171, 'سلمان شهر', 138, 'city'),
(1172, 'سورک', 138, 'city'),
(1173, 'شیرگاه', 138, 'city'),
(1174, 'عباس آباد', 138, 'city'),
(1175, 'فریدون کنار', 138, 'city'),
(1176, 'قائم شهر', 138, 'city'),
(1177, 'کتالم و سادات شهر', 138, 'city'),
(1178, 'کلارآباد', 138, 'city'),
(1179, 'کلاردشت', 138, 'city'),
(1180, 'کله بست', 138, 'city'),
(1181, 'کوهی خیل', 138, 'city'),
(1182, 'کیاسر', 138, 'city'),
(1183, 'کیاکلا', 138, 'city'),
(1184, 'گزنک', 138, 'city'),
(1185, 'گلوگاه ( بهشهر )', 138, 'city'),
(1186, 'گلوگاه', 138, 'city'),
(1187, 'محمود آباد', 138, 'city'),
(1188, 'مرزیکلا', 138, 'city'),
(1189, 'نشتارود', 138, 'city'),
(1190, 'نکا', 138, 'city'),
(1191, 'نور', 138, 'city'),
(1192, 'نوشهر', 138, 'city'),
(1193, 'اراک', 139, 'city'),
(1194, 'آستانه', 139, 'city'),
(1195, 'آشتیان', 139, 'city'),
(1196, 'تفرش', 139, 'city'),
(1197, 'توره', 139, 'city'),
(1198, 'خمین', 139, 'city'),
(1199, 'خنداب', 139, 'city'),
(1200, 'داود آباد', 139, 'city'),
(1201, 'دلیجان', 139, 'city'),
(1202, 'رازقان', 139, 'city'),
(1203, 'زاویه', 139, 'city'),
(1204, 'ساوه', 139, 'city'),
(1205, 'سنجان', 139, 'city'),
(1206, 'شازند', 139, 'city'),
(1207, 'غرق آباد', 139, 'city'),
(1208, 'فرمهین', 139, 'city'),
(1209, 'قورچی باشی', 139, 'city'),
(1210, 'کرهرود', 139, 'city'),
(1211, 'کمیجان', 139, 'city'),
(1212, 'ماُمونیه', 139, 'city'),
(1213, 'محلات', 139, 'city'),
(1214, 'میلاجرد', 139, 'city'),
(1215, 'نراق', 139, 'city'),
(1216, 'نوبران', 139, 'city'),
(1217, 'نیمور', 139, 'city'),
(1218, 'هندودر', 139, 'city'),
(1219, 'ابوموسی', 140, 'city'),
(1220, 'بستک', 140, 'city'),
(1221, 'بندر چارک', 140, 'city'),
(1222, 'بندر خمیر', 140, 'city'),
(1223, 'بندر عباس', 140, 'city'),
(1224, 'بندر لنگه', 140, 'city'),
(1225, 'جاسک', 140, 'city'),
(1226, 'جناح', 140, 'city'),
(1227, 'حاجی آباد', 140, 'city'),
(1228, 'دهبارز', 140, 'city'),
(1229, 'سوزا', 140, 'city'),
(1230, 'سیریک', 140, 'city'),
(1231, 'فین', 140, 'city'),
(1232, 'قشم', 140, 'city'),
(1233, 'کنگ', 140, 'city'),
(1234, 'کیش', 140, 'city'),
(1235, 'گاوبندی', 140, 'city'),
(1236, 'هرمز', 140, 'city'),
(1237, 'میناب', 140, 'city'),
(1238, 'ازندریان', 141, 'city'),
(1239, 'اسدآباد', 141, 'city'),
(1240, 'بهار', 141, 'city'),
(1241, 'تویسرکان', 141, 'city'),
(1242, 'جورقان', 141, 'city'),
(1243, 'جوکار', 141, 'city'),
(1244, 'دمق', 141, 'city'),
(1245, 'رزن', 141, 'city'),
(1246, 'سامن', 141, 'city'),
(1247, 'سرکان', 141, 'city'),
(1248, 'شیرین سو', 141, 'city'),
(1249, 'صالح آباد', 141, 'city'),
(1250, 'فامنین', 141, 'city'),
(1251, 'فرسفج', 141, 'city'),
(1252, 'فیروزان', 141, 'city'),
(1253, 'قروه درجزین', 141, 'city'),
(1254, 'قهاوند', 141, 'city'),
(1255, 'کبودرآهنگ', 141, 'city'),
(1256, 'گل تپه', 141, 'city'),
(1257, 'لالجین', 141, 'city'),
(1258, 'مریانج', 141, 'city'),
(1259, 'ملایر', 141, 'city'),
(1260, 'نهاوند', 141, 'city'),
(1261, 'همدان', 141, 'city'),
(1262, 'ابرکوه', 142, 'city'),
(1263, 'احمدآباد', 142, 'city'),
(1264, 'اردکان', 142, 'city'),
(1265, 'اشکذر', 142, 'city'),
(1266, 'بافق', 142, 'city'),
(1267, 'بهاباد', 142, 'city'),
(1268, 'تفت', 142, 'city'),
(1269, 'حمیدیا', 142, 'city'),
(1270, 'خضرآباد', 142, 'city'),
(1271, 'زارچ', 142, 'city'),
(1272, 'شاهدیه', 142, 'city'),
(1273, 'شواز', 142, 'city'),
(1274, 'طبس', 142, 'city'),
(1275, 'عشق آباد', 142, 'city'),
(1276, 'مروست', 142, 'city'),
(1277, 'مهردشت', 142, 'city'),
(1278, 'مهریز', 142, 'city'),
(1279, 'میبد', 142, 'city'),
(1280, 'ندوشن', 142, 'city'),
(1281, 'نیر', 142, 'city'),
(1282, 'هرات', 142, 'city'),
(1283, 'یزد', 142, 'city'),
(1284, 'آزادشهر', 135, 'city'),
(1285, 'آق قلا', 135, 'city'),
(1286, 'انبار آلوم', 135, 'city'),
(1287, 'اینچه برون', 135, 'city'),
(1288, 'بندر ترکمن', 135, 'city'),
(1289, 'بندر گز', 135, 'city'),
(1290, 'خان ببین', 135, 'city'),
(1291, 'دلند', 135, 'city'),
(1292, 'رامیان', 135, 'city'),
(1293, 'سرخنکلاته', 135, 'city'),
(1294, 'سیمین شهر', 135, 'city'),
(1295, 'علی آباد', 135, 'city'),
(1296, 'فاضل آباد', 135, 'city'),
(1297, 'کرد کوی', 135, 'city'),
(1298, 'کلاله', 135, 'city'),
(1299, 'گالیکش', 135, 'city'),
(1300, 'گرگان', 135, 'city'),
(1301, 'گمیش تپه', 135, 'city'),
(1302, 'گنبد کاووس', 135, 'city'),
(1303, 'مراوه تپه', 135, 'city'),
(1304, 'مینو دشت', 135, 'city'),
(1305, 'نوده خاندوز', 135, 'city'),
(1306, 'نوکنده', 135, 'city'),
(1307, 'باشت', 134, 'city'),
(1308, 'چرام', 134, 'city'),
(1309, 'دهدشت', 134, 'city'),
(1310, 'دوگنبدان', 134, 'city'),
(1311, 'دیشموک', 134, 'city'),
(1312, 'سوق', 134, 'city'),
(1313, 'سی سخت', 134, 'city'),
(1314, 'قلعه رئیسی', 134, 'city'),
(1315, 'گراب سفلی', 134, 'city'),
(1316, 'لنده', 134, 'city'),
(1317, 'لیکک', 134, 'city'),
(1318, 'مارگون', 134, 'city'),
(1319, 'یاسوج', 134, 'city'),
(1320, 'آبی بیگلو', 115, 'city'),
(1321, 'اردبیل', 115, 'city'),
(1322, 'اصلاندوز', 115, 'city'),
(1323, 'بیله سوار', 115, 'city'),
(1324, 'پارس آباد', 115, 'city'),
(1325, 'تازه کند انگوت', 115, 'city'),
(1326, 'جعفر آباد', 115, 'city'),
(1327, 'خلخال', 115, 'city'),
(1328, 'رضی', 115, 'city'),
(1329, 'سرعین', 115, 'city'),
(1330, 'عنبران', 115, 'city'),
(1331, 'کلور', 115, 'city'),
(1332, 'گرمی', 115, 'city'),
(1333, 'گیوی', 115, 'city'),
(1334, 'لاهرود', 115, 'city'),
(1335, 'مشکین شهر', 115, 'city'),
(1336, 'نمین', 115, 'city'),
(1337, 'نیر', 115, 'city'),
(1338, 'هشتجین', 115, 'city'),
(1339, 'هیر', 115, 'city'),
(1340, 'ابریشم', 116, 'city'),
(1341, 'ابوزیدآباد', 116, 'city'),
(1342, 'آران و بیدگل', 116, 'city'),
(1343, 'اردستان', 116, 'city'),
(1344, 'اژیه', 116, 'city'),
(1345, 'اصفهان', 116, 'city'),
(1346, 'افوس', 116, 'city'),
(1347, 'انارک', 116, 'city'),
(1348, 'ایمان شهر', 116, 'city'),
(1349, 'بادرود', 116, 'city'),
(1350, 'باغ بهادران', 116, 'city'),
(1351, 'برزک', 116, 'city'),
(1352, 'برف انبار', 116, 'city'),
(1353, 'بهاران شهر', 116, 'city'),
(1354, 'بهارستان', 116, 'city'),
(1355, 'بوئین و میاندشت', 116, 'city'),
(1356, 'پیربکران', 116, 'city'),
(1357, 'تودشک', 116, 'city'),
(1358, 'تیران', 116, 'city'),
(1359, 'جندق', 116, 'city'),
(1360, 'جوشقان و کامو', 116, 'city'),
(1361, 'چادگان', 116, 'city'),
(1362, 'چرمهین', 116, 'city'),
(1363, 'چم گردان', 116, 'city'),
(1364, 'حبیب آباد', 116, 'city'),
(1365, 'حسن آباد', 116, 'city'),
(1366, 'حنا', 116, 'city'),
(1367, 'خمینی شهر', 116, 'city'),
(1368, 'خوانسار', 116, 'city'),
(1369, 'خور', 116, 'city'),
(1370, 'خوراسگان', 116, 'city'),
(1371, 'خورزوق', 116, 'city'),
(1372, 'داران', 116, 'city'),
(1373, 'دامنه', 116, 'city'),
(1374, 'درچه پیاز', 116, 'city'),
(1375, 'دستگرد', 116, 'city'),
(1376, 'دهاقان', 116, 'city'),
(1377, 'دهق', 116, 'city'),
(1378, 'دولت آباد', 116, 'city'),
(1379, 'دیزیچه', 116, 'city'),
(1380, 'رزوه', 116, 'city'),
(1381, 'رضوان شهر', 116, 'city'),
(1382, 'زاینده رود', 116, 'city'),
(1383, 'زرین شهر', 116, 'city'),
(1384, 'زواره', 116, 'city'),
(1385, 'زیباشهر', 116, 'city'),
(1386, 'سده لنجان', 116, 'city'),
(1387, 'سفید شهر', 116, 'city'),
(1388, 'سگزی', 116, 'city'),
(1389, 'سمیرم', 116, 'city'),
(1390, 'شاهین شهر', 116, 'city'),
(1391, 'شهرضا', 116, 'city'),
(1392, 'طالخونچه', 116, 'city'),
(1393, 'عسگران', 116, 'city'),
(1394, 'علویجه', 116, 'city'),
(1395, 'فریدون شهر', 116, 'city'),
(1396, 'فلاورجان', 116, 'city'),
(1397, 'فولادشهر', 116, 'city'),
(1398, 'قمصر', 116, 'city'),
(1399, 'قهدریجان', 116, 'city'),
(1400, 'کاشان', 116, 'city'),
(1401, 'کرکوند', 116, 'city'),
(1402, 'کلیشاد و سودرجان', 116, 'city'),
(1403, 'کمشجه', 116, 'city'),
(1404, 'کمه', 116, 'city'),
(1405, 'کهریزسنگ', 116, 'city'),
(1406, 'کوشک', 116, 'city'),
(1407, 'کوهپایه', 116, 'city'),
(1408, 'گز', 116, 'city'),
(1409, 'گلپایگان', 116, 'city'),
(1410, 'گل دشت', 116, 'city'),
(1411, 'گل شهر', 116, 'city'),
(1412, 'گوگد', 116, 'city'),
(1413, 'مبارکه', 116, 'city'),
(1414, 'محمدآباد', 116, 'city'),
(1415, 'منظریه', 116, 'city'),
(1416, 'مهاباد', 116, 'city'),
(1417, 'میمه', 116, 'city'),
(1418, 'نائین', 116, 'city'),
(1419, 'نجف آباد', 116, 'city'),
(1420, 'نصر آباد', 116, 'city'),
(1421, 'نطنز', 116, 'city'),
(1422, 'نوش آباد', 116, 'city'),
(1423, 'نیاسر', 116, 'city'),
(1424, 'نیک آباد', 116, 'city'),
(1425, 'ورزنه', 116, 'city'),
(1426, 'ورنامخواست', 116, 'city'),
(1427, 'وزوان', 116, 'city'),
(1428, 'ونک', 116, 'city'),
(1429, 'هرند', 116, 'city'),
(1430, 'آبدانان', 117, 'city'),
(1431, 'اراکواز', 117, 'city'),
(1432, 'ایلام', 117, 'city'),
(1433, 'ایوان', 117, 'city'),
(1434, 'بدره', 117, 'city'),
(1435, 'پهله', 117, 'city'),
(1436, 'توحید', 117, 'city'),
(1437, 'چوار', 117, 'city'),
(1438, 'دره شهر', 117, 'city'),
(1439, 'دهلران', 117, 'city'),
(1440, 'زرنه', 117, 'city'),
(1441, 'سرابله', 117, 'city'),
(1442, 'صالح آباد', 117, 'city'),
(1443, 'لومار', 117, 'city'),
(1444, 'مهران', 117, 'city'),
(1445, 'موسیان', 117, 'city'),
(1446, 'میمه', 117, 'city'),
(1447, 'آب پخش', 118, 'city'),
(1448, 'آبدان', 118, 'city'),
(1449, 'امام حسن', 118, 'city'),
(1450, 'اهرم', 118, 'city'),
(1451, 'برازجان', 118, 'city'),
(1452, 'بردخون', 118, 'city'),
(1453, 'بندر دیر', 118, 'city'),
(1454, 'بندر دیلم', 118, 'city'),
(1455, 'بندر ریگ', 118, 'city'),
(1456, 'بندر کنگان', 118, 'city'),
(1457, 'بندر گناوه', 118, 'city'),
(1458, 'بوشهر', 118, 'city'),
(1459, 'جم', 118, 'city'),
(1460, 'چغادک', 118, 'city'),
(1461, 'خارک', 118, 'city'),
(1462, 'خورموج', 118, 'city'),
(1463, 'دالکی', 118, 'city'),
(1464, 'دلوار', 118, 'city'),
(1465, 'سعد آباد', 118, 'city'),
(1466, 'شبانکاره', 118, 'city'),
(1467, 'کاکی', 118, 'city'),
(1468, 'وحدتیه', 118, 'city'),
(1469, 'آبسرد', 119, 'city'),
(1470, 'اسلام شهر', 119, 'city'),
(1471, 'اشتهارد', 119, 'city'),
(1472, 'اندیشه', 119, 'city'),
(1473, 'باقرشهر', 119, 'city'),
(1474, 'بومهن', 119, 'city'),
(1475, 'پاکدشت', 119, 'city'),
(1476, 'پردیس', 119, 'city'),
(1477, 'پیشوا', 119, 'city'),
(1478, 'تجریش', 119, 'city'),
(1479, 'تهران', 119, 'city'),
(1480, 'جوادآباد', 119, 'city'),
(1481, 'چهار دانگه', 119, 'city'),
(1482, 'حسن آباد', 119, 'city'),
(1483, 'دماوند', 119, 'city'),
(1484, 'رباط کریم', 119, 'city'),
(1485, 'رودهن', 119, 'city'),
(1486, 'شاهدشهر', 119, 'city'),
(1487, 'شریف آباد', 119, 'city'),
(1488, 'ری', 119, 'city'),
(1489, 'شهریار', 119, 'city'),
(1490, 'صباشهر', 119, 'city'),
(1491, 'صفادشت', 119, 'city'),
(1492, 'طالقان', 119, 'city'),
(1493, 'فردوسیه', 119, 'city'),
(1494, 'فشم', 119, 'city'),
(1495, 'فیروزکوه', 119, 'city'),
(1496, 'قدس', 119, 'city'),
(1497, 'قرچک', 119, 'city'),
(1498, 'کرج', 119, 'city'),
(1499, 'کمال شهر', 119, 'city'),
(1500, 'کهریزک', 119, 'city'),
(1501, 'کیلان', 119, 'city'),
(1502, 'گلستان', 119, 'city'),
(1503, 'لواسان', 119, 'city'),
(1504, 'ماهدشت', 119, 'city'),
(1505, 'محمدشهر', 119, 'city'),
(1506, 'مشکین دشت', 119, 'city'),
(1507, 'ملارد', 119, 'city'),
(1508, 'نسیم شهر', 119, 'city'),
(1509, 'نظر آباد', 119, 'city'),
(1510, 'وحیدیه', 119, 'city'),
(1511, 'ورامین', 119, 'city'),
(1512, 'هشتگرد', 119, 'city'),
(1513, 'اردل', 120, 'city'),
(1514, 'آلونی', 120, 'city'),
(1515, 'باباحیدر', 120, 'city'),
(1516, 'بروجن', 120, 'city'),
(1517, 'بلداجی', 120, 'city'),
(1518, 'بن', 120, 'city'),
(1519, 'جونقان', 120, 'city'),
(1520, 'چلگرد', 120, 'city'),
(1521, 'سامان', 120, 'city'),
(1522, 'سفید دشت', 120, 'city'),
(1523, 'سودجان', 120, 'city'),
(1524, 'سورشجان', 120, 'city'),
(1525, 'شلمزار', 120, 'city'),
(1526, 'شهر کرد', 120, 'city'),
(1527, 'طاقانک', 120, 'city'),
(1528, 'فارسان', 120, 'city'),
(1529, 'فرادنبه', 120, 'city'),
(1530, 'فرخ شهر', 120, 'city'),
(1531, 'کیان', 120, 'city'),
(1532, 'گندمان', 120, 'city'),
(1533, 'گهرو', 120, 'city'),
(1534, 'لردگان', 120, 'city'),
(1535, 'مال خلیفه', 120, 'city'),
(1536, 'ناغان', 120, 'city'),
(1537, 'نافچ', 120, 'city'),
(1538, 'هفشجان', 120, 'city'),
(1539, 'بیرجند', 121, 'city'),
(1540, 'فردوس', 121, 'city'),
(1541, 'قائن', 121, 'city'),
(1542, 'سرایان', 121, 'city'),
(1543, 'نهبندان', 121, 'city'),
(1544, 'سر بیشه', 121, 'city'),
(1545, 'اسدیه', 121, 'city'),
(1546, 'بشرویه', 121, 'city'),
(1547, 'آیسک', 121, 'city'),
(1548, 'سه قلعه', 121, 'city'),
(1549, 'خوسف', 121, 'city'),
(1550, 'شوسف', 121, 'city'),
(1551, 'انابد', 122, 'city'),
(1552, 'باجگیران', 122, 'city'),
(1553, 'باخرز', 122, 'city'),
(1554, 'بایک', 122, 'city'),
(1555, 'بجستان', 122, 'city'),
(1556, 'بردسکن', 122, 'city'),
(1557, 'بیدخت', 122, 'city'),
(1558, 'تایباد', 122, 'city'),
(1559, 'تربت جام', 122, 'city'),
(1560, 'تربت حیدریه', 122, 'city'),
(1561, 'جغتای', 122, 'city'),
(1562, 'چاپشلو', 122, 'city'),
(1563, 'چکنه', 122, 'city'),
(1564, 'چناران', 122, 'city'),
(1565, 'حاجی آباد', 122, 'city'),
(1566, 'خرو', 122, 'city'),
(1567, 'خضری دشت بیاض', 122, 'city'),
(1568, 'خلیل آباد', 122, 'city'),
(1569, 'خواف', 122, 'city'),
(1570, 'داورزن', 122, 'city'),
(1571, 'دررود', 122, 'city'),
(1572, 'درگز', 122, 'city'),
(1573, 'دولت آباد', 122, 'city'),
(1574, 'رباط سنگ', 122, 'city'),
(1575, 'رشتخوار', 122, 'city'),
(1576, 'رضویه', 122, 'city'),
(1577, 'رودآب', 122, 'city'),
(1578, 'ریوش', 122, 'city'),
(1579, 'سبزوار', 122, 'city'),
(1580, 'سرخس', 122, 'city'),
(1581, 'سلطان آباد', 122, 'city'),
(1582, 'سنگان', 122, 'city'),
(1583, 'شاندیز', 122, 'city'),
(1584, 'ششتمد', 122, 'city'),
(1585, 'صالح آباد', 122, 'city'),
(1586, 'طرقبه', 122, 'city'),
(1587, 'عشق آباد', 122, 'city'),
(1588, 'فرهاد گرد', 122, 'city'),
(1589, 'فریمان', 122, 'city'),
(1590, 'فیروزه', 122, 'city'),
(1591, 'فیض آباد', 122, 'city'),
(1592, 'قاسم آباد', 122, 'city'),
(1593, 'قدمگاه', 122, 'city'),
(1594, 'قلندر آباد', 122, 'city'),
(1595, 'قوچان', 122, 'city'),
(1596, 'کاخک', 122, 'city'),
(1597, 'کاریز', 122, 'city'),
(1598, 'کاشمر', 122, 'city'),
(1599, 'کدکن', 122, 'city'),
(1600, 'کلات', 122, 'city'),
(1601, 'گناباد', 122, 'city'),
(1602, 'لطف آباد', 122, 'city'),
(1603, 'مشهد', 122, 'city'),
(1604, 'ملک آباد', 122, 'city'),
(1605, 'نشتیفان', 122, 'city'),
(1606, 'نصر آباد', 122, 'city'),
(1607, 'نقاب', 122, 'city'),
(1608, 'نو خندان', 122, 'city'),
(1609, 'نیشابور', 122, 'city'),
(1610, 'اسفراین', 123, 'city'),
(1611, 'آشخانه', 123, 'city'),
(1612, 'بجنورد', 123, 'city'),
(1613, 'پیش قلعه', 123, 'city'),
(1614, 'حصار گرم خان', 123, 'city'),
(1615, 'درق', 123, 'city'),
(1616, 'راز', 123, 'city'),
(1617, 'سنخواست', 123, 'city'),
(1618, 'شوقان', 123, 'city'),
(1619, 'شیروان', 123, 'city'),
(1620, 'صفی آباد', 123, 'city'),
(1621, 'فاروج', 123, 'city'),
(1622, 'قاضی', 123, 'city'),
(1623, 'گرمه جاجرم', 123, 'city'),
(1624, 'لوجلی', 123, 'city'),
(1625, 'آبادان', 124, 'city'),
(1626, 'اروند کنار', 124, 'city'),
(1627, 'آغاجاری', 124, 'city'),
(1628, 'الوان', 124, 'city'),
(1629, 'امیدیه', 124, 'city'),
(1630, 'اندیمشک', 124, 'city'),
(1631, 'اهواز', 124, 'city'),
(1632, 'ایذه', 124, 'city'),
(1633, 'باغ', 124, 'city'),
(1634, 'ملک', 124, 'city'),
(1635, 'بستان', 124, 'city'),
(1636, 'بندر امام خمینی', 124, 'city'),
(1637, 'بندر ماهشهر', 124, 'city'),
(1638, 'بهبهان', 124, 'city'),
(1639, 'جایزان', 124, 'city'),
(1640, 'چمران', 124, 'city'),
(1641, 'حر', 124, 'city'),
(1642, 'حسینیه', 124, 'city'),
(1643, 'حمیدیه', 124, 'city'),
(1644, 'خرمشهر', 124, 'city'),
(1645, 'دزآب', 124, 'city'),
(1646, 'دزفول', 124, 'city'),
(1647, 'دهدز', 124, 'city'),
(1648, 'رامشیر', 124, 'city'),
(1649, 'رامهرمز', 124, 'city'),
(1650, 'رفیع', 124, 'city'),
(1651, 'زهره', 124, 'city'),
(1652, 'سالند', 124, 'city'),
(1653, 'سردشت', 124, 'city'),
(1654, 'سوسنگرد', 124, 'city'),
(1655, 'شادگان', 124, 'city'),
(1656, 'شوش', 124, 'city'),
(1657, 'شوشتر', 124, 'city'),
(1658, 'شیبان', 124, 'city'),
(1659, 'صفی آباد', 124, 'city'),
(1660, 'صیدون', 124, 'city'),
(1661, 'قلعه خواجه', 124, 'city'),
(1662, 'قلعه تل', 124, 'city'),
(1663, 'گتوند', 124, 'city'),
(1664, 'لالی', 124, 'city'),
(1665, 'مسجد سلیمان', 124, 'city'),
(1666, 'مقاومت', 124, 'city'),
(1667, 'ملا ثانی', 124, 'city'),
(1668, 'میانرود', 124, 'city'),
(1669, 'مینوشهر', 124, 'city'),
(1670, 'هفتگل', 124, 'city'),
(1671, 'هندیجان', 124, 'city'),
(1672, 'هویزه', 124, 'city'),
(1673, 'ویس', 124, 'city'),
(1674, 'آب بر', 125, 'city'),
(1675, 'ابهر', 125, 'city'),
(1676, 'چورزق', 125, 'city'),
(1677, 'حلب', 125, 'city'),
(1678, 'خرمدره', 125, 'city'),
(1679, 'دندی', 125, 'city'),
(1680, 'زرین آباد', 125, 'city'),
(1681, 'زرین رود', 125, 'city'),
(1682, 'زنجان', 125, 'city'),
(1683, 'سجاس', 125, 'city'),
(1684, 'سلطانیه', 125, 'city'),
(1685, 'صائین قلعه', 125, 'city'),
(1686, 'قیدار', 125, 'city'),
(1687, 'گرماب', 125, 'city'),
(1688, 'ماه نشان', 125, 'city'),
(1689, 'هیدج', 125, 'city'),
(1690, 'آرادان', 126, 'city'),
(1691, 'امیریه', 126, 'city'),
(1692, 'ایوانکی', 126, 'city'),
(1693, 'بسطام', 126, 'city'),
(1694, 'بیارجمند', 126, 'city'),
(1695, 'دامغان', 126, 'city'),
(1696, 'دیباج', 126, 'city'),
(1697, 'سرخه', 126, 'city'),
(1698, 'سمنان', 126, 'city'),
(1699, 'سنگسر', 126, 'city'),
(1700, 'شاهرود', 126, 'city'),
(1701, 'شهمیرزاد', 126, 'city'),
(1702, 'کلاته خیج', 126, 'city'),
(1703, 'گرمسار', 126, 'city'),
(1704, 'مجن', 126, 'city'),
(1705, 'میامی', 126, 'city'),
(1706, 'ادیمی', 127, 'city'),
(1707, 'اسپکه', 127, 'city'),
(1708, 'ایرانشهر', 127, 'city'),
(1709, 'بزمان', 127, 'city'),
(1710, 'بمپور', 127, 'city'),
(1711, 'بنت', 127, 'city'),
(1712, 'بنجار', 127, 'city'),
(1713, 'پیشین', 127, 'city'),
(1714, 'جالق', 127, 'city'),
(1715, 'چابهار', 127, 'city'),
(1716, 'خاش', 127, 'city'),
(1717, 'دوست محمد', 127, 'city'),
(1718, 'راسک', 127, 'city'),
(1719, 'زابل', 127, 'city'),
(1720, 'زابلی', 127, 'city'),
(1721, 'زاهدان', 127, 'city'),
(1722, 'زهک', 127, 'city'),
(1723, 'سراوان', 127, 'city'),
(1724, 'سرباز', 127, 'city'),
(1725, 'سوران', 127, 'city'),
(1726, 'سیرکان', 127, 'city'),
(1727, 'فنوج', 127, 'city'),
(1728, 'قصرقند', 127, 'city'),
(1729, 'کنارک', 127, 'city'),
(1730, 'گلمورتی', 127, 'city'),
(1731, 'محمدآباد', 127, 'city'),
(1732, 'میرجاوه', 127, 'city'),
(1733, 'نصرت آباد', 127, 'city'),
(1734, 'نگور', 127, 'city'),
(1735, 'نوک آباد', 127, 'city'),
(1736, 'نیک شهر', 127, 'city'),
(1737, 'آباده طشک', 128, 'city'),
(1738, 'آباده', 128, 'city'),
(1739, 'اردکان', 128, 'city'),
(1740, 'ارسنجان', 128, 'city'),
(1741, 'اسیر', 128, 'city'),
(1742, 'اشکنان', 128, 'city'),
(1743, 'اقلید', 128, 'city'),
(1744, 'اهل', 128, 'city'),
(1745, 'اوز', 128, 'city'),
(1746, 'ایج', 128, 'city'),
(1747, 'ایزدخواست', 128, 'city'),
(1748, 'باب انار', 128, 'city'),
(1749, 'بالاده', 128, 'city'),
(1750, 'بنارویه', 128, 'city'),
(1751, 'بهمن', 128, 'city'),
(1752, 'بیرم', 128, 'city'),
(1753, 'بیضا', 128, 'city'),
(1754, 'جنت شهر', 128, 'city'),
(1755, 'جهرم', 128, 'city'),
(1756, 'جویم', 128, 'city'),
(1757, 'حاجی آباد', 128, 'city'),
(1758, 'خاوران', 128, 'city'),
(1759, 'خرامه', 128, 'city'),
(1760, 'خشت', 128, 'city'),
(1761, 'خنج', 128, 'city'),
(1762, 'خور', 128, 'city'),
(1763, 'داراب', 128, 'city'),
(1764, 'داریان', 128, 'city'),
(1765, 'رونیز', 128, 'city'),
(1766, 'زاهدشهر', 128, 'city'),
(1767, 'زرقان', 128, 'city'),
(1768, 'سده', 128, 'city'),
(1769, 'سروستان', 128, 'city'),
(1770, 'سعادت شهر', 128, 'city'),
(1771, 'سوریان', 128, 'city'),
(1772, 'سیدان', 128, 'city'),
(1773, 'ششده', 128, 'city'),
(1774, 'شهر پیر', 128, 'city'),
(1775, 'شیراز', 128, 'city'),
(1776, 'صغاد', 128, 'city'),
(1777, 'صفاشهر', 128, 'city'),
(1778, 'علامرودشت', 128, 'city'),
(1779, 'فتح آباد', 128, 'city'),
(1780, 'فراشبند', 128, 'city'),
(1781, 'فسا', 128, 'city'),
(1782, 'فیروز آباد', 128, 'city'),
(1783, 'قائمیه', 128, 'city'),
(1784, 'قادر آباد', 128, 'city'),
(1785, 'قطب آباد', 128, 'city'),
(1786, 'قیر و کارزین', 128, 'city'),
(1787, 'کازرون', 128, 'city'),
(1788, 'کامفیروز', 128, 'city'),
(1789, 'کره ای', 128, 'city'),
(1790, 'کنار تخته', 128, 'city'),
(1791, 'کوار', 128, 'city'),
(1792, 'گراش', 128, 'city'),
(1793, 'گله دار', 128, 'city'),
(1794, 'لار', 128, 'city'),
(1795, 'لامرد', 128, 'city'),
(1796, 'لپوئی', 128, 'city'),
(1797, 'مرودشت', 128, 'city'),
(1798, 'مشکان', 128, 'city'),
(1799, 'مصیری', 128, 'city'),
(1800, 'مهر', 128, 'city'),
(1801, 'میمند', 128, 'city'),
(1802, 'نودان', 128, 'city'),
(1803, 'نور آباد', 128, 'city'),
(1804, 'نیریز', 128, 'city'),
(1805, 'وراوی', 128, 'city'),
(1806, 'آبگرم', 129, 'city'),
(1807, 'آبیک', 129, 'city'),
(1808, 'ارداق', 129, 'city'),
(1809, 'اسفرورین', 129, 'city'),
(1810, 'اقبالیه', 129, 'city'),
(1811, 'الوند', 129, 'city'),
(1812, 'آوج', 129, 'city'),
(1813, 'بوئین زهرا', 129, 'city'),
(1814, 'بیدستان', 129, 'city'),
(1815, 'تاکستان', 129, 'city'),
(1816, 'خرمدشت', 129, 'city'),
(1817, 'دانسفهان', 129, 'city'),
(1818, 'رازمیان', 129, 'city'),
(1819, 'شال', 129, 'city'),
(1820, 'ظیاء آباد', 129, 'city'),
(1821, 'قزوین', 129, 'city'),
(1822, 'کوهین', 129, 'city'),
(1823, 'محمدیه', 129, 'city'),
(1824, 'محمود آباد نمونه', 129, 'city'),
(1825, 'معلم کلایه', 129, 'city'),
(1826, 'جعفریه', 130, 'city'),
(1827, 'دستجرد', 130, 'city'),
(1828, 'قم', 130, 'city'),
(1829, 'قنوات', 130, 'city'),
(1830, 'کهک', 130, 'city'),
(1832, 'آرمرده', 131, 'city'),
(1833, 'بابارشانی', 131, 'city'),
(1834, 'بانه', 131, 'city'),
(1835, 'بوئین سفلی', 131, 'city'),
(1836, 'بیجار', 131, 'city'),
(1837, 'چناره', 131, 'city'),
(1838, 'دزج', 131, 'city'),
(1839, 'دلبران', 131, 'city'),
(1840, 'دهگلان', 131, 'city'),
(1841, 'دیواندره', 131, 'city'),
(1842, 'زرینه', 131, 'city'),
(1843, 'سروآباد', 131, 'city'),
(1844, 'سریش آباد', 131, 'city'),
(1845, 'سقز', 131, 'city'),
(1846, 'سنندج', 131, 'city'),
(1847, 'شویشه', 131, 'city'),
(1848, 'صاحب', 131, 'city'),
(1849, 'قروه', 131, 'city'),
(1850, 'کامیاران', 131, 'city'),
(1851, 'کانی سور', 131, 'city'),
(1852, 'مریوان', 131, 'city'),
(1853, 'موچش', 131, 'city'),
(1854, 'یاسوکند', 131, 'city'),
(1855, 'اختیار آباد', 132, 'city'),
(1856, 'ارزوئیه', 132, 'city'),
(1857, 'انار', 132, 'city'),
(1858, 'باغین', 132, 'city'),
(1859, 'بافت', 132, 'city'),
(1860, 'بردسیر', 132, 'city'),
(1861, 'بروات', 132, 'city'),
(1862, 'بزنجان', 132, 'city'),
(1863, 'بم', 132, 'city'),
(1864, 'بهرمان', 132, 'city'),
(1865, 'پاریز', 132, 'city'),
(1866, 'جبالبارز', 132, 'city'),
(1867, 'جوپار', 132, 'city'),
(1868, 'جیرفت', 132, 'city'),
(1869, 'چترود', 132, 'city'),
(1870, 'حسین آباد', 132, 'city'),
(1871, 'خانوک', 132, 'city'),
(1872, 'درب بهشت', 132, 'city'),
(1873, 'دهج', 132, 'city'),
(1874, 'رابر', 132, 'city'),
(1875, 'راور', 132, 'city'),
(1876, 'راین', 132, 'city'),
(1877, 'رفسنجان', 132, 'city'),
(1878, 'رودبار', 132, 'city'),
(1879, 'زرند', 132, 'city'),
(1880, 'زنگی آباد', 132, 'city'),
(1881, 'زید آباد', 132, 'city'),
(1882, 'سیرجان', 132, 'city'),
(1883, 'شهداد', 132, 'city'),
(1884, 'شهر بابک', 132, 'city'),
(1885, 'عنبر آباد', 132, 'city'),
(1886, 'فاریاب', 132, 'city'),
(1887, 'فهرج', 132, 'city'),
(1888, 'قلعه گنج', 132, 'city'),
(1889, 'کاظم آباد', 132, 'city'),
(1890, 'کرمان', 132, 'city'),
(1891, 'کشکوئیه', 132, 'city'),
(1892, 'کهنوج', 132, 'city'),
(1893, 'کوه بنان', 132, 'city'),
(1894, 'کیان شهر', 132, 'city'),
(1895, 'گلباف', 132, 'city'),
(1896, 'گلزار', 132, 'city'),
(1897, 'ماهان', 132, 'city'),
(1898, 'محمد آباد', 132, 'city'),
(1899, 'محی آباد', 132, 'city'),
(1900, 'مس سرچشمه', 132, 'city'),
(1901, 'منوجان', 132, 'city'),
(1902, 'نجف شهر', 132, 'city'),
(1903, 'نرماشیر', 132, 'city'),
(1904, 'نگار', 132, 'city'),
(1905, 'اسلام آباد غرب ( شاه آباد )', 133, 'city'),
(1906, 'باینگان', 133, 'city'),
(1907, 'بیستون', 133, 'city'),
(1908, 'پاوه', 133, 'city'),
(1909, 'تازه آباد', 133, 'city'),
(1910, 'جوانرود', 133, 'city'),
(1911, 'حمیل', 133, 'city'),
(1912, 'رباط', 133, 'city'),
(1913, 'روانسر', 133, 'city'),
(1914, 'سرپل ذهاب', 133, 'city'),
(1915, 'سرمست', 133, 'city'),
(1916, 'سنقر', 133, 'city'),
(1917, 'سومار', 133, 'city'),
(1918, 'صحنه', 133, 'city'),
(1919, 'قصر شیرین', 133, 'city'),
(1920, 'کرمانشاه', 133, 'city'),
(1921, 'کرند', 133, 'city'),
(1922, 'کنگاور', 133, 'city'),
(1923, 'کوزران', 133, 'city'),
(1924, 'گهواره', 133, 'city'),
(1925, 'گیلان غرب', 133, 'city'),
(1926, 'میان راهان', 133, 'city'),
(1927, 'نودشه', 133, 'city'),
(1928, 'نوسود', 133, 'city'),
(1929, 'هرسین', 133, 'city'),
(1930, 'هلشی', 133, 'city'),
(1931, 'رشت', 136, 'city'),
(1932, 'صومعه سرا', 136, 'city'),
(1933, 'دابودشت', 138, 'city'),
(101, 'آذربایجان شرقی', 11, 'state'),
(114, 'آذربایجان غربی', 11, 'state'),
(115, 'اردبیل', 11, 'state'),
(116, 'اصفهان', 11, 'state'),
(117, 'ایلام', 11, 'state'),
(118, 'بوشهر', 11, 'state'),
(119, 'تهران', 11, 'state'),
(120, 'چهار محال و بختیاری', 11, 'state'),
(121, 'خراسان جنوبی', 11, 'state'),
(122, 'خراسان رضوی', 11, 'state'),
(123, 'خراسان شمالی', 11, 'state'),
(124, 'خوزستان', 11, 'state'),
(125, 'زنجان', 11, 'state'),
(126, 'سمنان', 11, 'state'),
(127, 'سیستان و بلوچستان', 11, 'state'),
(128, 'فارس', 11, 'state'),
(129, 'قزوین', 11, 'state'),
(130, 'قم', 11, 'state'),
(131, 'کردستان', 11, 'state'),
(132, 'کرمان', 11, 'state'),
(133, 'کرمانشاه', 11, 'state'),
(134, 'کهکیلویه و بویراحمد', 11, 'state'),
(135, 'گلستان', 11, 'state'),
(136, 'گیلان', 11, 'state'),
(137, 'لرستان', 11, 'state'),
(138, 'مازندران', 11, 'state'),
(139, 'مرکزی', 11, 'state'),
(140, 'هرمزگان', 11, 'state'),
(141, 'همدان', 11, 'state'),
(142, 'یزد', 11, 'state'),
(1, 'آسیا', 0, 'continent'),
(2, 'اروپا', 0, 'continent'),
(3, 'آمریکا', 0, 'continent'),
(4, 'اقیانوسیه', 0, 'continent'),
(5, 'آفریقا', 0, 'continent'),
(1940, 'یوسف آباد', 1479, 'region'),
(11, 'ایران', 1, 'country'),
(12, 'امارات متحده عربی', 1, 'country'),
(1939, 'ستارخان', 1479, 'region'),
(1947, 'سجاد', 1603, 'region'),
(1944, 'وکیل آباد', 1603, 'region'),
(1946, 'احمدآباد', 1603, 'region'),
(1950, 'آزادشهر', 1603, 'region');

-- --------------------------------------------------------

--
-- Table structure for table `sale_duration`
--

CREATE TABLE `sale_duration` (
  `id` int(11) NOT NULL COMMENT 'شناسه',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'عنوان دوره',
  `days` int(11) NOT NULL COMMENT 'تعداد روزها',
  `prio` int(11) NOT NULL COMMENT 'اولویت',
  `flag` int(11) NOT NULL COMMENT 'وضعیت',
  `hide` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='مدت‌زمان/مدت‌زمان ها';

--
-- Dumping data for table `sale_duration`
--

INSERT INTO `sale_duration` (`id`, `name`, `days`, `prio`, `flag`, `hide`) VALUES
(1, '', 0, 0, 0, 1),
(2, '۱۵ روز', 15, 1, 1, 0),
(3, '۳۰ روز', 30, 2, 1, 0),
(4, '۶۰ روز', 60, 3, 1, 0),
(5, '۹۰ روز', 90, 4, 1, 0),
(6, 'نامحدود', 0, 5, 1, 0),
(7, 'kljl', 9, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `slug` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `component` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`slug`, `name`, `text`, `component`) VALUES
('main_title', 'عنوان سایت', 'پرتال تبلیغاتی پستگاه', ''),
('money_unit', 'واحد پولی', 'تومان', ''),
('template', 'قالب سایت', 'Default', ''),
('websitedescription', 'فعالیت سایت', 'مدیریت محتوا', ''),
('keywords', 'کلمات کلیدی', 'مدیریت,محتوا,نرم افزار', ''),
('html_footer_copyright', 'کپی رایت پایین سایت', 'کلیه حقوق این سایت برای پستگاه محفوظ است', ''),
('page', '', 'admin', ''),
('free_ads_duration_limit', 'محدودیت زمانی آگهی مجانی', '30', ''),
('sms_state', 'وضعیت ارسال پیامک', '', ''),
('webstatus_main', 'وضعیت سایت', '1', ''),
('html_extra_tags', 'تگ های اضافی', 'ooo', ''),
('unsuccessful_attack', '', '182', ''),
('user_noaccess_delay', '', '3600', ''),
('user_max_access', '', '200', ''),
('tiny_title', 'نام سایت', 'پستگاه', ''),
('contact_tell', 'شماره ثابت', '(21) 22334433', ''),
('contact_cell', 'شماره همراه', '(98) 9127766554', ''),
('contact_fax', 'شماره فکس', '(21) 22332211', ''),
('contact_address', 'آدرس دفتر', ' ستارخان، برق آلستوم، مجتمع توحید', ''),
('contact_email_address_0', '', 'support@parsunix.com', ''),
('contact_email_address_1', '', 'info@parsunix.com', ''),
('cp', '', 'setting_mg', ''),
('do', '', 'save', ''),
('func', '', 'setting_mg_main', ''),
('webstatus_main_content', 'متن وضعیت غیرفعال', 'وبسایت در حال آماده سازی میباشد', '');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `id` int(11) NOT NULL COMMENT 'شناسه',
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'آدرس اینترنتی',
  `name` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'نام فروشگاه',
  `desc` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'شرح فعالیت',
  `user_id` int(11) NOT NULL COMMENT 'شناسه کاربر',
  `logo` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'لوگو',
  `address` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'آدرس',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'تلفن',
  `flag` int(1) NOT NULL COMMENT 'وضعیت فروشگاه',
  `hide` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`id`, `path`, `name`, `desc`, `user_id`, `logo`, `address`, `phone`, `flag`, `hide`) VALUES
(5, 'monospace.postgah.com', 'عنوان فروشگاه من', 'شرح فعالیت من\r\nشرح همه فعالیت ها ، و همه آنچه شرح داده نشده است.', 7, 'data/shop_logo/5/0-1466938367-ScreenShot2016-06-26at31851PM.jpg', 'سیدخندان، ارسباران، پلاک ۳۳۲', '02144433221', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `shop_item`
--

CREATE TABLE `shop_item` (
  `id` int(11) NOT NULL COMMENT 'شناسه',
  `shop_id` int(11) NOT NULL COMMENT 'شناسه فروشگاه',
  `item_id` int(11) NOT NULL COMMENT 'شناسه کالا'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `texty`
--

CREATE TABLE `texty` (
  `id` int(11) NOT NULL COMMENT 'شناسه',
  `slug` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'نام',
  `prompt` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'اعلان کادر',
  `user_email_subject` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'عنوان ایمیل کاربر',
  `user_email_content` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'متن ایمیل کاربر',
  `admin_email_subject` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'عنوان ایمیل مدیر',
  `admin_email_content` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'متن ایمیل مدیر',
  `user_sms` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'متن پیامک کاربر',
  `admin_sms` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'متن پیامک مدیر',
  `flag` int(1) NOT NULL COMMENT 'وضعیت'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `texty`
--

INSERT INTO `texty` (`id`, `slug`, `name`, `prompt`, `user_email_subject`, `user_email_content`, `admin_email_subject`, `admin_email_content`, `user_sms`, `admin_sms`, `flag`) VALUES
(1, 'users_register_do', 'تایید ثبت نام', '', 'ثبت نام در {main_title}', 'سلام\r\n\r\nکاربر گرامی، {user_name} عزیز، \r\nحساب کاربری شما با موفقیت ایجاد شد\r\nاطلاعات حساب شما به شرح زیر است : \r\nنام کاربری:‌ {username}\r\nگذرواژه: {password}\r\n\r\nورود به سایت :‌\r\n{_URL}/login\r\n\r\nبا تشکر', '', '', 'کاربر گرامی خوش آمدید ثبت نام با موفقیت انجام شد نام کاربری: {username} کلمه عبور: {password}', '', 1),
(2, 'billing_invoiceSettle', 'تایید پرداخت فاکتور', 'پرداخت به مبلغ {cost} با موفقیت انجام شد.', 'فاکتور شما به شماره {id} پرداخت شد', 'سلام\r\nکاربر گرامی\r\nفاکتور شما به مبلغ {cost} به شناسه {id} پرداخت شد.\r\nبا تشکر از خرید شما', 'پرداخت فاکتور به شماره {id}', 'سلام\r\nفاکتور به مبلغ {cost} با شناسه {id} توسط {user_name} پرداخت شد.', '', '', 1),
(3, 'billing_invoiceMake_congratulate', 'ایجاد فاکتور جدید', '', 'ثبت فاکتور {invoice_id}', 'کاربر گرامی\r\n{user_name}\r\n\r\nفاکتور جدید به شناسه {invoice_id} به مبلغ {cost} ایجاد شد\r\nبرای پرداخت فاکتور از لینک زیر اقدام نمایید.\r\n\r\nبا تشکر', '', '', '', '', 1),
(4, 'billing_management_offline_list_flag', 'تایید پرداخت آفلاین', 'پرداخت به مبلغ {cost} تایید و برای {user_name} منظور گردید', 'پرداخت شما به مبلغ {cost} تایید شد', 'با سلام\r\nکاربر گرامی، {user_name}\r\nپرداخت شما به مبلغ {cost} از {bank_name} مورد تایید مدیریت قرار گرفته و در حساب کاربری شما منظور گردید\r\nبا تشکر', '', '', '', '', 1),
(5, 'billing_userpanel_payment_offline_save_n_congragulate', 'ثبت گزارش پرداخت آفلاین', 'پرداخت شما به مبلغ {cost} ثبت شد.\r\nبه زودی مورد بررسی قرار خواهد گرفت.', 'پرداخت آفلاین به مبلغ {cost}', 'با سلام\r\nپرداخت شما به مبلغ {cost} ثبت گردید و بزودی به تایید مدیریت خواهد رسید\r\nبا تشکر', 'ثبت پرداخت آفلاین به مبلغ {cost}', 'سلام\r\nثبت مبلغ {cost} توسط کاربر با نام {user_name} در بانک {bank_name} انجام شد', '', '', 1),
(6, 'pgPlan_user_MakePremium_do_congratulate', 'ثبت درخواست ارتقاء آگهی', 'ارتقاء آگهی شما با شناسه {item_id} ثبت شد\r\nفاکتور جدید به مبلغ {cost} با شناسه {invoice_id} ایجاد شد.\r\n\r\n{button_payment_form}  {button_list_of_invoices}', 'درخواست ارتقاء آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، {user_name}\r\nدرخواست ارتقاء آگهی شما با شناسه {item_id} ثبت شد.\r\nفاکتور جدید به مبلغ {cost} با شناسه {invoice_id} ایجاد شد.\r\n\r\n{invoice_link}\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "{item_name}" ، به مدت {duration} ، تحت پلن {plan_name} بصورت ویژه بنمایش گذاشته خواهد شد.\r\n\r\nبا تشکر', 'ثبت درخواست ارتقاء آگهی به مبلغ {cost}', 'سلام\r\nدرخواست ارتقاء به {plan_name} آگهی به شناسه {item_id} با عنوان {item_name} به مبلغ {cost} توسط کاربر {user_name} ثبت شده است.\r\nبا تشکر', '', '', 1),
(7, 'pgPlan_user_RenewAds_do_congratulate', 'ثبت درخواست تمدید آگهی', 'تمدید آگهی شما با شناسه {item_id} ثبت شد\r\nفاکتور جدید به مبلغ {cost} با شناسه {invoice_id} ایجاد شد.\r\n\r\n{button_payment_form}  {button_list_of_invoices}', 'درخواست تمدید آگهی شما ثبت شد', 'با سلام،\r\n\r\nکاربر گرامی، {user_name}\r\nدرخواست تمدید آگهی شما با شناسه {item_id} ثبت شد.\r\nفاکتور جدید به مبلغ {cost} با شناسه {invoice_id} ایجاد شد.\r\n\r\n{invoice_link}\r\n\r\nو در صورت پرداخت فاکتور ، آگهی شما با عنوان "{item_name}" ، به مدت {duration} ، تحت پلن {plan_name} بصورت ویژه تمدید خواهد شد.\r\n\r\nبا تشکر', 'ثبت درخواست تمدید آگهی به مبلغ {cost}', 'سلام\r\nدرخواست تمدید به {plan_name} آگهی به شناسه {item_id} با عنوان {item_name} به مبلغ {cost} توسط کاربر {user_name} ثبت شده است.\r\nبا تشکر', '', '', 1),
(8, 'pgItem_user_saveNew', 'ثبت آگهی جدید', 'آگهی جدید شما به شماره {item_id} ثبت شد\r\nو پس از تایید مدیریت فعال خواهد شد.', '', '', '', '', '', '', 1),
(9, 'pgItem_user_saveNew_invoiceMake', 'ثبت فاکتور جدید', 'آگهی جدید شما با شناسه {item_id} ثبت شد\r\nفاکتور جدید به مبلغ {cost} با شناسه {invoice_id} ایجاد شد.\r\n\r\n{button_payment_form}  {button_list_of_invoices}', '', '', '', '', '', '', 1),
(10, 'pgItem_user_saveEdit', 'ویرایش آگهی', 'آگهی شما به شماره {item_id} با عنوان <b>{item_name}</b> ویرایش شد\r\nو پس از تایید مدیریت فعال خواهد شد.', '', '', '', '', '', '', 1),
(11, 'pgItem_user_remove', 'حذف آگهی توسط کاربر', 'آگهی به شناسه {id} حذف شد', 'حذف آگهی انجام شد', 'سلام\r\nکاربر گرامی\r\nآگهی شما به شناسه {id} با عنوان\r\n{name}\r\nبه درخواست شما حذف شد\r\nبا تشکر', '', '', '', '', 1),
(12, 'billing_orderSettle', 'تایید پرداخت سفارش', 'سفارش به شماره {id} ثبت شد', 'ثبت سفارش شماره {id}', 'سلام\r\nسفارش شما به شماره {id} ثبت و پس از بررسی فعال خواهد شد\r\nموفق باشید', 'ثبت سفارش جدید به شماره {id}', 'سلام\r\nسفارش جدید به مبلغ {cost} توسط {user_name} ثبت شد\r\nموفق باشید', '', '', 1),
(13, 'users_forgot_save', 'انجام بازیابی گذرواژه', 'بازیابی گذرواژه با موفقیت انجام شد', 'بازیابی گذرواژه انجام شد', 'با سلام\r\nکاربر گرامی\r\nباز یابی گذرواژه حساب شما با موفقیت انجام شد.\r\nبا تشکر', '', '', '', '', 1),
(14, 'users_forgot_send', 'ارسال لینک بازیابی گذرواژه', 'با سلام\r\nلینک بازیابی گذرواژه به آدرس ایمیل {email} ارسال شد.\r\nلطفا با باز کردن لینک فرم مربوطه را تکمیل نمایید.', 'درخواست گذرواژه جدید', 'سلام،\r\n\r\nبا توجه به درخواست شما برای ثبت کلمه عبور جدید ، ما یک پیوند برای تنظیم مجدد کلمه عبور به آدرس ایمیل شما ارسال نمودیم.\r\nلینک : \r\n{link}\r\n\r\nبا تشکر', '', '', '', '', 1),
(15, 'pgItem_remove_byAdmin', 'حذف آگهی توسط مدیر', 'آگهی به شناسه {id} حذف شد', 'حذف آگهی با عنوان {name}', 'با سلام\r\nکاربر گرامی، {user_name} \r\n\r\nآگهی شما به شناسه {id} و با عنوان :\r\n{name}\r\nتوسط مدیریت سایت حذف شد.\r\n\r\nبا تشکر', '', '', '', '', 1),
(16, 'pgItem_remove_byUser', 'حذف آگهی توسط کاربر', 'آگهی به شناسه {id} حذف شد', '', '', 'حذف آگهی به شناسه {id}', 'با سلام\r\nآگهی با عنوان {name} توسط {user_name} حذف شد\r\nبا تشکر', '', '', 1),
(18, 'contact_vw_send', 'فرم تماس', 'پیام شما ثبت شد', 'پیام شما دریافت شد', 'کاربر گرامی، {name}\r\nپبام شما دریافت شد و در اولین فرصت پاسخ داده خواهد شد', 'پیام ارتباط با ما از طرف {name}', 'باسلام\r\n\r\nپیام جدید توسط کاربری با نام {name} دریافت شد\r\nبرای مشاهده پیام :\r\n{_URL}/?page=admin&cp=contact_mg\r\n\r\nبا تشکر', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `useraccess`
--

CREATE TABLE `useraccess` (
  `id` int(11) NOT NULL COMMENT 'شناسه',
  `users_id` int(11) NOT NULL COMMENT 'شناسه کاربر',
  `component` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'بخش'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL COMMENT 'شناسه کاربر',
  `date` int(11) NOT NULL COMMENT 'زمان',
  `ip` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'آی پی',
  `action` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'نوع فعالیت'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'آدرس ایمیل',
  `password` varchar(255) COLLATE utf8_persian_ci NOT NULL DEFAULT '' COMMENT 'کلمه عبور',
  `permission` int(12) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'نام و نام خانوادگی',
  `tell` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'شماره تلفن',
  `cell` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'شماره موبایل',
  `wallet_credit` int(11) NOT NULL,
  `position_id` int(11) NOT NULL COMMENT 'موقعیت',
  `address` text COLLATE utf8_persian_ci NOT NULL COMMENT 'آدرس',
  `profile_pic` varchar(1024) COLLATE utf8_persian_ci NOT NULL COMMENT 'عکس',
  `im_a` int(11) NOT NULL COMMENT 'حرفه/شغل',
  `work_at` int(11) NOT NULL COMMENT 'محل کار',
  `gender` int(11) NOT NULL COMMENT 'جنسیت',
  `management_title` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'سمت مدیریتی',
  `register_ip` varchar(15) COLLATE utf8_persian_ci NOT NULL COMMENT 'آی پی ثبت نام',
  `register_date` int(11) NOT NULL COMMENT 'زمان ثبت نام',
  `login_ip` varchar(15) COLLATE utf8_persian_ci NOT NULL COMMENT 'آی پی آخرین ورود',
  `login_date` int(11) NOT NULL COMMENT 'زمان آخرین ورود',
  `auth` text COLLATE utf8_persian_ci NOT NULL COMMENT 'اطلاعات ثبت نام مجازی',
  `flag_admin` int(1) NOT NULL COMMENT 'وضعیت مدیریت',
  `flag_user` int(1) NOT NULL COMMENT 'وضعیت کاربری'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `permission`, `name`, `tell`, `cell`, `wallet_credit`, `position_id`, `address`, `profile_pic`, `im_a`, `work_at`, `gender`, `management_title`, `register_ip`, `register_date`, `login_ip`, `login_date`, `auth`, `flag_admin`, `flag_user`) VALUES
(1, 'info@postgah.com', 'info@postgah.com', 2, 'مدیریت سایت', '02166936950', '09127744129', 900000, 0, '', '', 0, 0, 0, '', '', 1420201122, '', 0, '', 0, 0),
(7, 'mahmud.ghaznavi@gmail.com', '1122ww22', 0, 'محمود غضنوی', '', '09124433221', 1146000, 0, '', '', 0, 0, 0, 'مدیریت مالی', '', 1423221122, '', 0, '', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing_invoice`
--
ALTER TABLE `billing_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing_method`
--
ALTER TABLE `billing_method`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catcustomfield`
--
ALTER TABLE `catcustomfield`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catcustomfield_option`
--
ALTER TABLE `catcustomfield_option`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catcustomfield_value`
--
ALTER TABLE `catcustomfield_value`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catcustomfield_value_text`
--
ALTER TABLE `catcustomfield_value_text`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `catcustomfield_value_id` (`catcustomfield_value_id`);
ALTER TABLE `catcustomfield_value_text` ADD FULLTEXT KEY `text` (`text`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cronjob`
--
ALTER TABLE `cronjob`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_template`
--
ALTER TABLE `email_template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_image`
--
ALTER TABLE `item_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_plan_duration`
--
ALTER TABLE `item_plan_duration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_reject`
--
ALTER TABLE `item_reject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kword`
--
ALTER TABLE `kword`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kword` (`kword`);

--
-- Indexes for table `kwordbanned`
--
ALTER TABLE `kwordbanned`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kword` (`kword`);

--
-- Indexes for table `kwordusage`
--
ALTER TABLE `kwordusage`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `table_name` (`table_name`,`table_id`,`kword_id`);

--
-- Indexes for table `linkify`
--
ALTER TABLE `linkify`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mailq`
--
ALTER TABLE `mailq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_layer`
--
ALTER TABLE `page_layer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan_duration`
--
ALTER TABLE `plan_duration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_duration`
--
ALTER TABLE `sale_duration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`slug`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_item`
--
ALTER TABLE `shop_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `texty`
--
ALTER TABLE `texty`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `useraccess`
--
ALTER TABLE `useraccess`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing_invoice`
--
ALTER TABLE `billing_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه', AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `billing_method`
--
ALTER TABLE `billing_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `cat`
--
ALTER TABLE `cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `catcustomfield`
--
ALTER TABLE `catcustomfield`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه', AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `catcustomfield_option`
--
ALTER TABLE `catcustomfield_option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه', AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `catcustomfield_value`
--
ALTER TABLE `catcustomfield_value`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه', AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `catcustomfield_value_text`
--
ALTER TABLE `catcustomfield_value_text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه', AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cronjob`
--
ALTER TABLE `cronjob`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `email_template`
--
ALTER TABLE `email_template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه', AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه', AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `item_image`
--
ALTER TABLE `item_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه';
--
-- AUTO_INCREMENT for table `item_plan_duration`
--
ALTER TABLE `item_plan_duration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `item_reject`
--
ALTER TABLE `item_reject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه', AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kword`
--
ALTER TABLE `kword`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `kwordbanned`
--
ALTER TABLE `kwordbanned`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `kwordusage`
--
ALTER TABLE `kwordusage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `linkify`
--
ALTER TABLE `linkify`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mailq`
--
ALTER TABLE `mailq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=597;
--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `page_layer`
--
ALTER TABLE `page_layer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه', AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `plan_duration`
--
ALTER TABLE `plan_duration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1955;
--
-- AUTO_INCREMENT for table `sale_duration`
--
ALTER TABLE `sale_duration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه', AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `shop_item`
--
ALTER TABLE `shop_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه', AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `texty`
--
ALTER TABLE `texty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه', AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `useraccess`
--
ALTER TABLE `useraccess`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'شناسه', AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
