-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2020 年 03 月 01 日 15:26
-- 伺服器版本： 5.5.64-MariaDB
-- PHP 版本： 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `s1080404`
--

-- --------------------------------------------------------

--
-- 資料表結構 `t1_admin`
--

CREATE TABLE `t1_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `acc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pwd` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `t1_admin`
--

INSERT INTO `t1_admin` (`id`, `acc`, `pwd`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- 資料表結構 `t2_member_account`
--

CREATE TABLE `t2_member_account` (
  `id` int(10) UNSIGNED NOT NULL,
  `acc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pwd` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `re_pwd` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `t2_member_account`
--

INSERT INTO `t2_member_account` (`id`, `acc`, `email`, `pwd`, `re_pwd`) VALUES
(1, 'admin', 'admin@admin.com', '1234', '1234'),
(2, 'test01', 'test01@test01.com', 'test01', 'test01');

-- --------------------------------------------------------

--
-- 資料表結構 `t3_member_info`
--

CREATE TABLE `t3_member_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_number` text COLLATE utf8mb4_unicode_ci,
  `name` text COLLATE utf8mb4_unicode_ci,
  `acc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pwd` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` text COLLATE utf8mb4_unicode_ci,
  `sex` text COLLATE utf8mb4_unicode_ci,
  `birth` text COLLATE utf8mb4_unicode_ci,
  `address` text COLLATE utf8mb4_unicode_ci,
  `phone` text COLLATE utf8mb4_unicode_ci,
  `phonedpy` int(11) DEFAULT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `emaildpy` int(11) DEFAULT NULL,
  `line` text COLLATE utf8mb4_unicode_ci,
  `linedpy` int(11) DEFAULT NULL,
  `wapp` text COLLATE utf8mb4_unicode_ci,
  `wappdpy` int(11) DEFAULT NULL,
  `registdate` datetime NOT NULL,
  `updatetime` datetime NOT NULL,
  `chk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `t3_member_info`
--

INSERT INTO `t3_member_info` (`id`, `id_number`, `name`, `acc`, `pwd`, `nickname`, `sex`, `birth`, `address`, `phone`, `phonedpy`, `email`, `emaildpy`, `line`, `linedpy`, `wapp`, `wappdpy`, `registdate`, `updatetime`, `chk`) VALUES
(1, 'IF000001', '會員1', 'user', '1234', '暱稱1', '女', '1994-10-31', '新北市泰山區貴子里', '0912-345-678', NULL, '123@gmail.com', NULL, NULL, NULL, NULL, NULL, '2020-01-06 08:50:45', '2020-01-14 22:51:28', 1),
(2, 'IF000002', '會員2', 'test02', '1234', '暱稱2', '男', '1990-02-07', '新北市泰山區貴子里', '0966-666-666', NULL, 'test02@test.com', NULL, NULL, NULL, NULL, NULL, '2020-01-06 08:49:48', '2020-01-10 16:04:25', 0),
(3, NULL, '會員3', 'test03', '3214', '暱稱3', '男', '1999-12-31', '新北市泰山區貴子里', '0987-654-321', NULL, '123@gmail.com', NULL, NULL, NULL, NULL, NULL, '2020-01-10 13:10:16', '2020-01-10 16:04:25', 0),
(4, NULL, '會員3', 'test04', '1234', '暱稱4', '男', '1999-12-31', '新北市泰山區貴子里', '0988-888-888', NULL, '123@gmail.com', NULL, NULL, NULL, NULL, NULL, '2020-01-10 13:11:25', '2020-01-10 16:04:25', 0),
(9, NULL, '會員5', 'test05', '1234', '暱稱5', '女', '1999-12-31', '新北市泰山區貴子里', '0910-111-222', NULL, '1234@gmail.com', NULL, NULL, NULL, NULL, NULL, '2020-01-15 13:03:56', '2020-01-15 13:03:56', 0),
(10, NULL, '會員6', 'test06', '1234', '暱稱6', '男', '1988-10-10', '新北市泰山區貴子里', '0966-000-888', NULL, 'abc@gmail.com', NULL, NULL, NULL, NULL, NULL, '2020-01-15 13:05:12', '2020-01-15 13:05:12', 0),
(11, NULL, '會員7', 'test07', '1234', '暱稱7', '男', '1978-02-05', '新北市泰山區貴子里', '0965-432-198', NULL, 'abcd@gmail.com', NULL, NULL, NULL, NULL, NULL, '2020-01-15 13:05:52', '2020-01-15 13:05:52', 0),
(13, NULL, NULL, '0000', '123456', NULL, NULL, NULL, NULL, NULL, NULL, 'abcjoe61115@gmail.com', NULL, NULL, NULL, NULL, NULL, '2020-01-21 14:00:49', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `t4_profile`
--

CREATE TABLE `t4_profile` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_number` text COLLATE utf8mb4_unicode_ci,
  `acc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` text COLLATE utf8mb4_unicode_ci,
  `sex` text COLLATE utf8mb4_unicode_ci,
  `phonedpy` int(11) DEFAULT NULL,
  `line` text COLLATE utf8mb4_unicode_ci,
  `linedpy` int(11) DEFAULT NULL,
  `wapp` text COLLATE utf8mb4_unicode_ci,
  `wappdpy` int(11) DEFAULT NULL,
  `emaildpy` text COLLATE utf8mb4_unicode_ci,
  `price` int(11) DEFAULT NULL,
  `freetime1` int(11) DEFAULT NULL,
  `freetime2` int(11) DEFAULT NULL,
  `location` text COLLATE utf8mb4_unicode_ci,
  `locat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `place` text COLLATE utf8mb4_unicode_ci,
  `intro` text COLLATE utf8mb4_unicode_ci,
  `interest` text COLLATE utf8mb4_unicode_ci,
  `item` text COLLATE utf8mb4_unicode_ci,
  `img` text COLLATE utf8mb4_unicode_ci,
  `chk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `t4_profile`
--

INSERT INTO `t4_profile` (`id`, `id_number`, `acc`, `nickname`, `sex`, `phonedpy`, `line`, `linedpy`, `wapp`, `wappdpy`, `emaildpy`, `price`, `freetime1`, `freetime2`, `location`, `locat`, `place`, `intro`, `interest`, `item`, `img`, `chk`) VALUES
(1, 'IFtest01', 'user', '暱稱1', '女', 1, 'ifriend123', 0, '0987-654-321', 1, '1', 120, 10, 18, '新北', '北部地區', '新北、台北', '熱愛交友，喜歡運動', '籃球、爬山、美食', NULL, 'member-1.jpg', 0),
(2, NULL, 'test02', '暱稱2', '男', 0, '0', 0, '0', 0, '0', 80, 13, 19, '新北', '北部地區', NULL, '體驗數學研究所，意義是一個，相同承擔市政府技巧論壇，還能攻擊由於近年來也不你沒有戰士最多，飯店事情權利劇情資源位元有點版權演唱主題軍事，來到第二次的說高興附近吃螺絲臨床臺中幾年提出了堅持，評分研究什麼樣偉大大幅長大行為電視劇浙江人力讓你變化，穩定訊息地方。', '美食、電玩、藝術、運動', NULL, 'member-2.jpg', 0),
(3, NULL, 'test03', '暱稱3', '男', 0, '0', 0, '0', 0, '0', 120, 10, 15, '高雄', '南部地區', NULL, '相同承擔市政府技巧論壇，還能攻擊由於近年來也不你沒有戰士最多，飯店事情權利劇情資源位元有點版權演唱主題軍事，來到第二次的說高興附近吃螺絲臨床臺中幾年提出了堅持', '攝影、運動、舞蹈', NULL, 'member-3.jpg', 0),
(4, NULL, 'test04', '暱稱4', '女', 0, '0', 0, '0', 0, '0', 60, 10, 15, '台南', '南部地區', NULL, '相同承擔市政府技巧論壇，還能攻擊由於近年來也不你沒有戰士最多，飯店事情權利劇情資源位元有點版權演唱主題軍事，來到第二次的說高興附近吃螺絲臨床臺中幾年提出了堅持', '攝影、運動、舞蹈', NULL, 'member-4.jpg', 0),
(5, NULL, 'test05', '暱稱5', '男', 0, '0', 0, '0', 0, '0', 200, 13, 19, '新竹', '中部地區', NULL, '體驗數學研究所，意義是一個，相同承擔市政府技巧論壇，還能攻擊由於近年來也不你沒有戰士最多，飯店事情權利劇情資源位元有點版權演唱主題軍事，來到第二次的說高興附近吃螺絲臨床臺中幾年提出了堅持，評分研究什麼樣偉大大幅長大行為電視劇浙江人力讓你變化，穩定訊息地方。', '美食、電玩、藝術、運動', NULL, 'member-5.jpg', 0),
(6, NULL, 'test06', '暱稱6', '男', 0, '0', 0, '0', 0, '0', 150, 10, 15, '高雄', '南部地區', NULL, '相同承擔市政府技巧論壇，還能攻擊由於近年來也不你沒有戰士最多，飯店事情權利劇情資源位元有點版權演唱主題軍事，來到第二次的說高興附近吃螺絲臨床臺中幾年提出了堅持', '攝影、運動、舞蹈', NULL, 'member-6.jpg', 0),
(7, NULL, 'test07', '暱稱7', '女', 0, '0', 0, '0', 0, '0', 100, 9, 17, '台南', '南部地區', NULL, '關閉需要建築不需要目光表示賓館說是忘記光臨本類因素危機，背景管理會不會工業有一定電視台，結構宣佈高。', '籃球、爬山、美食、電影', NULL, 'member-7.jpg', 0),
(8, NULL, 'test08', '暱稱8', '男', 0, '0', 0, '0', 0, '0', 80, 13, 19, '新北', '北部地區', NULL, '體驗數學研究所，意義是一個，相同承擔市政府技巧論壇，還能攻擊由於近年來也不你沒有戰士最多，飯店事情權利劇情資源位元有點版權演唱主題軍事，來到第二次的說高興附近吃螺絲臨床臺中幾年提出了堅持，評分研究什麼樣偉大大幅長大行為電視劇浙江人力讓你變化，穩定訊息地方。', '美食、電玩、藝術、運動', NULL, 'member-8.jpg', 0),
(9, NULL, 'test09', '暱稱9', '男', 0, '0', 0, '0', 0, '0', 120, 10, 15, '高雄', '南部地區', NULL, '相同承擔市政府技巧論壇，還能攻擊由於近年來也不你沒有戰士最多，飯店事情權利劇情資源位元有點版權演唱主題軍事，來到第二次的說高興附近吃螺絲臨床臺中幾年提出了堅持', '攝影、運動、舞蹈', NULL, 'member-9.jpg', 0),
(10, NULL, 'test10', '暱稱10', '女', 0, '0', 0, '0', 0, '0', 60, 10, 15, '台南', '南部地區', NULL, '相同承擔市政府技巧論壇，還能攻擊由於近年來也不你沒有戰士最多，飯店事情權利劇情資源位元有點版權演唱主題軍事，來到第二次的說高興附近吃螺絲臨床臺中幾年提出了堅持', '攝影、運動、舞蹈', NULL, 'member-10.jpg', 0),
(11, NULL, 'test11', '暱稱11', '男', 0, '0', 0, '0', 0, '0', 200, 13, 19, '新竹', '中部地區', NULL, '體驗數學研究所，意義是一個，相同承擔市政府技巧論壇，還能攻擊由於近年來也不你沒有戰士最多，飯店事情權利劇情資源位元有點版權演唱主題軍事，來到第二次的說高興附近吃螺絲臨床臺中幾年提出了堅持，評分研究什麼樣偉大大幅長大行為電視劇浙江人力讓你變化，穩定訊息地方。', '美食、電玩、藝術、運動', NULL, 'member-11.jpg', 0),
(12, NULL, 'test12', '暱稱12', '男', 0, '0', 0, '0', 0, '0', 150, 10, 15, '高雄', '南部地區', NULL, '相同承擔市政府技巧論壇，還能攻擊由於近年來也不你沒有戰士最多，飯店事情權利劇情資源位元有點版權演唱主題軍事，來到第二次的說高興附近吃螺絲臨床臺中幾年提出了堅持', '攝影、運動、舞蹈', NULL, 'member-12.jpg', 0),
(13, NULL, '0000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `t5_event`
--

CREATE TABLE `t5_event` (
  `id` int(10) UNSIGNED NOT NULL,
  `acc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `eventname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `organizer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `locat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `place` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `placeadd` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `num` int(11) NOT NULL,
  `order_num` int(11) NOT NULL,
  `timelength` int(11) NOT NULL,
  `type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `budget` int(11) NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `memo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `t5_event`
--

INSERT INTO `t5_event` (`id`, `acc`, `eventname`, `organizer`, `locat`, `place`, `placeadd`, `num`, `order_num`, `timelength`, `type`, `budget`, `intro`, `memo`, `date`) VALUES
(1, 'user', '吃海鮮', '暱稱1', '北部地區', '海鮮餐廳', '新北市泰山區貴子里', 5, 3, 2, '聚餐', 300, '四個必要大約利益未知迅速重量，理論文章速度您現在，當時存在說出後來也不消失我現在請您出口破解比例形式，保證產品，那些推薦要求修改推坑王字幕有人我愛吃飯', '當時存在說出後來也不消失我現在請您出口破解比例形式，保證產品，那些推薦要求修改推坑王字幕有人我愛吃飯', '2020-02-01 12:00:00'),
(2, '', '玩桌遊', '暱稱2', '南部地區', '桌遊店', '台中市桌遊餐廳', 6, 3, 3, '室內活動', 200, '', '', '2020-01-16 14:00:00'),
(3, '', '參觀美術館', '暱稱3', '北部地區', '台北市立美術館', '台北市中山區中山北路三段181號', 1, 0, 3, '室內活動', 100, '', '', '2020-02-14 10:00:00'),
(4, '', '看夜景', '暱稱4', '北部地區', '象山', '台北市信義區五段150巷22弄(象山捷運站)', 3, 1, 4, '室外活動', 0, '', '', '2020-01-29 20:30:00'),
(5, '', '看電影+吃大餐', '暱稱5', '南部地區', '電影院、美式餐廳', '高雄大遠百威秀影城', 3, 3, 5, '室內活動', 600, '', '', '2020-02-14 10:00:00'),
(6, '', '爬山', '暱稱6', '南部地區', '阿里山', '嘉義小火車', 2, 1, 8, '室外活動', 200, '', '', '2020-02-23 07:00:00'),
(7, 'user', '打麻將', '暱稱1', '北部地區', '我家', '新北市泰山區貴子里', 3, 0, 4, '室內活動', 500, '明星一缺三 等你來挑戰', '提供酒水', '2020-01-24 18:30:00'),
(8, 'user', '吃火鍋', '暱稱1', '北部地區', '迎客門', '新北市泰山區貴子里泰山職訓場山下', 10, 0, 2, '聚餐', 140, '吃飯', '結訓前一天聚聚', '2020-01-15 17:00:00'),
(9, 'user', '周年慶購物', '暱稱1', '中部地區', 'SOGO百貨', '台中SOGO百貨公司', 2, 0, 3, '室內活動', 5000, '周年慶大搶購', '買到傾家蕩產', '2020-01-27 09:20:00'),
(10, 'test02', '測試活動', '暱稱1', '北部地區', '泰山職訓場', '新北市泰山區貴子里', 1, 0, 2, '室內活動', 100, '測試用', '測試用', '2020-01-30 09:50:00'),
(11, 'test03', '測試活動2', '暱稱1', '北部地區', '泰山職訓場', '新北市泰山區貴子里', 1, 0, 2, '室內活動', 100, '測試用2', '測試用2', '2020-01-10 09:50:00'),
(12, 'user', '測試活動3', '暱稱1', '北部地區', '泰山職訓場', '新北市泰山區貴子里', 1, 0, 2, '室內活動', 100, '測試用3', '測試用3', '2020-01-10 09:50:00'),
(13, 'admin', '測試活動', '官方', '北部地區', '泰山職訓場', '新北市泰山區貴子里', 5, 0, 2, '室內活動', 200, '測試用', '測試用', '2020-01-30 09:50:00'),
(14, 'admin', '測試活動2', '官方', '北部地區', '泰山職訓場', '新北市泰山區貴子里', 5, 0, 2, '室內活動', 200, '測試用2', '測試用2', '2020-01-10 09:50:00'),
(15, 'admin', '測試活動3', '官方', '北部地區', '泰山職訓場', '新北市泰山區貴子里', 5, 0, 2, '室內活動', 200, '測試用3', '測試用3', '2020-01-10 09:50:00'),
(16, 'admin', '測試活動4', '官方', '中部地區', '台中火車站', '台中市台中火車站', 5, 0, 2, '室外活動', 100, '測試用4', '測試用4', '2020-01-30 09:50:00'),
(17, 'admin', '測試活動5', '官方', '南部地區', '台南火車站', '台南市台南火車站', 5, 0, 2, '室外活動', 100, '測試用5', '測試用5', '2020-01-30 09:50:00'),
(18, 'admin', '測試活動6', '官方', '東部地區', '台東火車站', '台東市台東火車站', 3, 0, 2, '室外活動', 200, '測試用6', '測試用6', '2020-01-10 09:50:00'),
(19, 'admin', '測試活動7', '官方', '離島及其他地區', '朝日溫泉', '臺東縣綠島鄉公館村溫泉167號', 5, 0, 2, '室內活動', 200, '測試用7', '測試用7', '2020-01-10 09:50:00'),
(20, 'admin', '測試活動10', '官方', '北部地區', '泰山職訓場', '新北市泰山區貴子里', 10, 0, 4, '室內活動', 500, '測試用', '測試', '2020-01-27 09:20:00'),
(21, 'admin', '測試活動11', '官方', '中部地區', '台中火車站', '台中SOGO百貨公司', 10, 0, 2, '室內活動', 140, '測試用', '測試', '2020-01-30 09:50:00'),
(22, 'admin', '測試活動12', '官方', '離島及其他地區', '綠島朝日溫泉', '綠島朝日溫泉', 3, 0, 3, '室內活動', 200, '測試用', '測試', '2020-02-14 00:00:00'),
(23, 'user', '1234', '暱稱1', '東部地區', '222222', '1231313', 100, 0, 2, '遊戲', 100, '失我現在請您出口破解比例形式，保證產品，那些推薦要求修改推坑王字幕有人我愛吃飯', '當時存在說出後來也不消失我現在請您出口破解比例形式，保證產品，那些推薦', '2020-01-17 09:45:00'),
(24, 'admin', '123', '官方', '南部地區', '22222', 'xxxxxxxx', 10, 0, 2, '聚餐', 200, '123', '322321', '2020-01-30 00:00:00');

-- --------------------------------------------------------

--
-- 資料表結構 `t6_event_order`
--

CREATE TABLE `t6_event_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `eventname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `organizer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `organizer_acc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_acc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ememo` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `t6_event_order`
--

INSERT INTO `t6_event_order` (`id`, `eventname`, `organizer`, `event_id`, `date`, `organizer_acc`, `user_acc`, `ememo`) VALUES
(1, '吃海鮮', '會員1', 1, '2020-02-01 12:00:00', 'test01', 'test01', '提早半小時離開'),
(2, '爬山', '暱稱6', 6, '2020-02-23 07:00:00', '', 'user', ''),
(3, '吃海鮮', '暱稱1', 1, '2020-02-01 12:00:00', 'user', 'user', '123');

-- --------------------------------------------------------

--
-- 資料表結構 `t7_member_order`
--

CREATE TABLE `t7_member_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `whoacc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `useracc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `timelength` int(11) NOT NULL,
  `place` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `schedule` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `budget` int(11) NOT NULL,
  `memo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `updatetime` datetime NOT NULL,
  `chk` int(11) NOT NULL,
  `chk2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `t7_member_order`
--

INSERT INTO `t7_member_order` (`id`, `whoacc`, `useracc`, `date`, `timelength`, `place`, `schedule`, `budget`, `memo`, `updatetime`, `chk`, `chk2`) VALUES
(1, 'test12', 'user', '2020-01-28 10:45:00', 2, '新北', '看電影', 300, '絕地戰警3', '2020-01-15 10:51:11', 1, 1),
(2, 'test12', 'user', '2020-01-21 17:45:00', 4, '新北', '看電影', 220, '看變身特務', '2020-01-15 10:52:57', 1, 1),
(3, 'test12', 'user', '2020-01-16 18:40:00', 2, '迎客門', '吃晚餐', 150, '我付錢', '2020-01-15 14:37:14', 1, 0),
(4, 'test13', 'user', '2020-01-18 16:50:00', 3, '台中', '聚餐', 600, '一起吃燒烤', '2020-02-28 16:42:27', 1, 1),
(5, 'user', 'test13', '2020-03-07 16:50:00', 3, '台中', '聚餐', 800, '一起吃燒烤', '2020-02-28 16:42:27', 1, 1),
(6, 'user', 'test13', '2020-03-02 15:30:00', 2, '台北', '吃下午茶', 300, '甜點吃到飽', '2020-02-28 23:00:24', 1, 0),
(7, 'test02', 'test13', '2020-03-18 14:30:00', 2, '台北', '看電影', 250, '看小丑女', '2020-02-28 23:09:48', 0, 0),
(8, 'test13', 'user', '2020-02-18 14:30:00', 2, '新光三越', '吃下午茶', 350, '台北車站旁', '2020-02-29 15:52:20', 1, 0),
(9, 'test13', 'user', '2020-02-20 10:30:00', 3, '欣欣秀泰', '看電影', 200, '早場電影', '2020-02-29 15:53:18', 0, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `t8_contact`
--

CREATE TABLE `t8_contact` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `t8_contact`
--

INSERT INTO `t8_contact` (`id`, `name`, `email`, `subject`, `content`) VALUES
(1, '123', 'lily40623@yahoo.com.tw', '111111', '56548494');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `t1_admin`
--
ALTER TABLE `t1_admin`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `t2_member_account`
--
ALTER TABLE `t2_member_account`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `t3_member_info`
--
ALTER TABLE `t3_member_info`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `t4_profile`
--
ALTER TABLE `t4_profile`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `t5_event`
--
ALTER TABLE `t5_event`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `t6_event_order`
--
ALTER TABLE `t6_event_order`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `t7_member_order`
--
ALTER TABLE `t7_member_order`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `t8_contact`
--
ALTER TABLE `t8_contact`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `t1_admin`
--
ALTER TABLE `t1_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `t2_member_account`
--
ALTER TABLE `t2_member_account`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `t3_member_info`
--
ALTER TABLE `t3_member_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `t4_profile`
--
ALTER TABLE `t4_profile`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `t5_event`
--
ALTER TABLE `t5_event`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `t6_event_order`
--
ALTER TABLE `t6_event_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `t7_member_order`
--
ALTER TABLE `t7_member_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `t8_contact`
--
ALTER TABLE `t8_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
