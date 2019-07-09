-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2019 年 06 月 27 日 08:34
-- 伺服器版本： 10.1.40-MariaDB
-- PHP 版本： 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `my_works_cafe`
--

-- --------------------------------------------------------

--
-- 資料表結構 `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `introduction` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_get` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `display` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `about_us`
--

INSERT INTO `about_us` (`id`, `title`, `introduction`, `img_name`, `type`, `url_get`, `number`, `display`) VALUES
(1, '經營理念', '內文測試AAA，內文測試AAA，內文測試AAA，內文測試AAA，內文測試AAA。內文測試AAA，內文測試AAA，內文測試AAA，內文測試AAA，內文測試AAA。', 'background-row_09.jpg', 'idea', 'idea_ap', 'no-01', 1),
(2, '本店介紹', '內文測試BBB，內文測試BBB，內文測試BBB，內文測試BBB，內文測試BBB，內文測試BBB，內文測試BBB，內文測試BBB，內文測試BBB，內文測試BBB，內文測試BBB，內文測試BBB，內文測試BBB，內文測試BBB。', 'background-row_06.jpg', 'drink', 'drink_ap', 'no-none', 0),
(3, '本店介紹', '內文測試CCC，內文測試CCC，內文測試CCC，內文測試CCC，內文測試CCC。內文測試CCC，內文測試CCC，內文測試CCC，內文測試CCC，內文測試CCC。', 'background-row_04.jpg', 'dessert', 'dessert_ap', 'no-none', 0),
(4, '關於我們', '內文測試DDD，內文測試DDD，內文測試DDD，內文測試DDD，內文測試DDD。內文測試DDD，內文測試DDD，內文測試DDD，內文測試DDD，內文測試DDD。', 'background-row_05.jpg', 'idea', 'idea_ap', 'no-none', 0),
(5, '本店介紹', '內文測試EEE，內文測試EEE，內文測試EEE，內文測試EEE，內文測試EEE。內文測試EEE，內文測試EEE，內文測試EEE，內文測試EEE，內文測試EEE。', 'background-row_03.jpg', 'dessert', 'dessert_ap', 'no-none', 0),
(6, '本店介紹', '內文測試FFF，內文測試FFF，內文測試FFF，內文測試FFF，內文測試FFF，內文測試FFF，內文測試FFF，內文測試FFF，內文測試FFF，內文測試FFF。', 'background-row_07.jpg', 'dessert', 'dessert_ap', 'no-none', 0),
(7, '本店介紹', '內文測試GGG，內文測試GGG，內文測試GGG，內文測試GGG，內文測試GGG，內文測試GGG，內文測試GGG，內文測試GGG。', 'background-row_05.jpg', 'drink', 'drink_ap', 'no-02', 1),
(8, '本店介紹', '內文測試HHH，內文測試HHH，內文測試HHH，內文測試HHH，內文測試HHH，內文測試HHH，內文測試HHH，內文測試HHH。', 'background-row_08.jpg', 'dessert', 'dessert_ap', 'no-03', 1),
(9, '本店介紹', '內文測試III，內文測試III，內文測試III，內文測試III，內文測試III，內文測試III，內文測試III，內文測試III，內文測試III，內文測試III，內文測試III，內文測試III，內文測試III，內文測試III，內文測試III，內文測試III，內文測試III。', 'background-row_10.jpg', 'drink', 'drink_ap', 'no-none', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `footer_table`
--

CREATE TABLE `footer_table` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `display` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `footer_table`
--

INSERT INTO `footer_table` (`id`, `title`, `subject`, `link`, `type`, `display`) VALUES
(1, '關於我們', '經營理念', 'idea_ap', 'about_us', 1),
(2, '關於我們', '本店介紹', 'drink_ap', 'about_us', 1),
(3, '關於我們', '交通資訊', 'traffic_ap', 'about_us', 1),
(4, '關於我們', '招募人才', 'enlist_ap', 'about_us', 0),
(6, '商標訊息', '逍遙派', 'my_logo02.png', 'logo', 1),
(8, '商標訊息', '鑫點子', 'my_logo.png', 'logo', 0),
(9, '關於我們', '廠商合作', 'teamwork_ap', 'about_us', 0),
(19, '管理連結', '夥伴登入', 'login.php', 'login', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `header_billboard`
--

CREATE TABLE `header_billboard` (
  `id` int(11) NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `introduction` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_get` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `folder_name` text COLLATE utf8mb4_unicode_ci,
  `img_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_name` text COLLATE utf8mb4_unicode_ci,
  `date` date NOT NULL,
  `display` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `header_billboard`
--

INSERT INTO `header_billboard` (`id`, `subject`, `introduction`, `url_get`, `folder_name`, `img_name`, `number`, `type`, `logo_name`, `date`, `display`) VALUES
(1, '年關將近，本店推出各種口味之菓子點心及禮盒，限時優惠中。', '這是測試文案AAA，圖文不符請見諒。不知春節該帶什麼回鄉團圓嗎，甜點禮盒年節期間一律八折優惠，活動日期108/01/25~108/02/28為止。', 'cm-img01', 'cm', 'cm-img01.jpg', 'no-01', 'sale', 'cake-logo06.png', '2019-05-27', 1),
(2, '夏日祭，本店糕點商品全品項優惠中，再來杯冰涼的咖啡或飲品，簡直絕妙搭配。', '這是測試文案BBB，圖文不符請見諒。夏季甜心派對活動開跑囉，活動期間本店糕點全品項一律八折優惠，活動日期108/06/25~9月底為止', 'cm-img02', 'cm', 'cm-img02.jpg', 'no-02', 'sale', 'cake-logo06.png', '2019-05-27', 1),
(3, '八角淡香咖啡即日起於本店上架，10月01日至10月30日止半價優惠中。', '這是測試文案CCC，圖文不符請見諒。最新商品，八角淡香咖啡於5月份開始正式推出，八角的清香搭配純正濃郁的咖啡，令人無法抵擋的魅力滋味。', 'drink-coffee-img07', 'drink', 'drink-coffee-img07.jpg', 'no-03', 'sale', 'coffee-logo01.png', '2019-05-25', 1),
(4, '國慶連假到來，本店咖啡全品項一律七折優惠，歡迎大家一起同樂。', '這是測試文案DDD，圖文不符請見諒。由10月05日至10月15日止，咖啡全品項一律七折優惠，國慶連假逍遙派與大家一起狂歡同樂。', 'drink-coffee-img03', 'drink', 'drink-coffee-img03.jpg', 'no-04', 'sale', 'coffee-logo01.png', '2019-05-25', 1),
(5, '質感冰霸杯、保溫瓶，集點加價購，詳情請見活動內文。', '這是測試文案EEE，圖文不符請見諒。活動期間11月01日至12月31日止，凡在本店單筆消費達200元以上者可集一點點數，集滿十點再加價300元，即可獲得超實用質感冰霸杯；若加價700元即可獲得原價1200元的超耐用保溫杯，二者皆為限量商品，售完為止，要買要快。', 'om-img01', 'om', 'om-img01.jpg', 'no-05', 'other', 'other-logo01.png', '2019-05-27', 1),
(6, '薄荷草莓派即日起於本店上架，02月01日至02月30日止半價優惠中。', '這是測試文案FFF，圖文不符請見諒。清涼幽香的薄荷，搭配上酸甜多汁的草莓，加上濃濃的奶油與海綿蛋糕，一口咬下品嘗多層次口感的新滋味。', 'alc-img04', 'alc', 'alc-img04.jpg', 'no-06', 'sale', 'cake-logo06.png', '2019-05-25', 1),
(7, '這是測試標題GGG，這是測試標題GGG。', '這是測試文案GGG，這是測試文案GGG，這是測試文案GGG，這是測試文案GGG，這是測試文案GGG，這是測試文案GGG，這是測試文案GGG。', 'drink-other-img05', 'drink', 'drink-other-img05.jpg', 'no-none', 'other', 'other-logo01.png', '2019-05-22', 1),
(8, '這是測試標題HHH，這是測試標題HHH。', '這是測試文案HHH，這是測試文案HHH，這是測試文案HHH，這是測試文案HHH，這是測試文案HHH，這是測試文案HHH，這是測試文案HHH。', 'drink-other-img06', 'drink', 'drink-coffee-img01.jpg', 'no-none', 'other', 'coffee-logo01.png', '2019-05-26', 1),
(11, '這是測試標題NNN，這是測試標題NNN。', '這是測試文案NNN，這是測試文案NNN，這是測試文案NNN，這是測試文案NNN，這是測試文案NNN，這是測試文案NNN，這是測試文案NNN，這是測試文案NNN，這是測試文案NNN。', 'cm-img05', 'cm', 'cm-img05.jpg', 'no-none', 'sale', 'cake-logo06.png', '2019-05-17', 1),
(12, '這是測試標題MMM，這是測試標題MMM。', '這是測試文案MMM，這是測試文案MMM，這是測試文案MMM，這是測試文案MMM，這是測試文案MMM，這是測試文案MMM，這是測試文案MMM，這是測試文案MMM。', 'alc-img15', 'alc', 'alc-img15.jpg', 'no-none', 'sale', 'cake-logo06.png', '2019-05-18', 1),
(13, '這是測試標題LLL，這是測試標題LLL。', '這是測試文案LLL，這是測試文案LLL，這是測試文案LLL，這是測試文案LLL，這是測試文案LLL，這是測試文案LLL。', 'cm-img10', 'cm', 'cm-img10.jpg', 'no-none', 'sale', 'cake-logo06.png', '2019-05-19', 1),
(14, '這是測試標題KKK，這是測試標題KKK。', '這是這是測試文案KKK，這是測試文案KKK，這是測試文案KKK，這是測試文案KKK，這是測試文案KKK，這是測試文案KKK，這是測試文案KKK，這是測試文案KKK，這是測試文案KKK，這是測試文案KKK，這是測試文案KKK，測試文案KKK，。', 'alc-img13', 'alc', 'alc-img13.jpg', 'no-none', 'sale', 'cake-logo06.png', '2019-05-20', 1),
(15, '這是測試標題JJJ，這是測試標題JJJ。', '這是測試文案JJJ，這是測試文案JJJ，這是測試文案JJJ，這是測試文案JJJ，這是測試文案JJJ，這是測試文案JJJ，這是測試文案JJJ，這是測試文案JJJ，這是測試文案JJJ。', 'cm-img07', 'cm', 'cm-img07.jpg', 'no-none', 'other', 'cake-logo06.png', '2019-05-21', 0),
(16, '這是測試標題III，這是測試標題III。', '這是文案標題III，這是文案標題III，這是文案標題III，這是文案標題III，這是文案標題III，這是文案標題III，這是文案標題III，這是文案標題III，這是文案標題III。', 'drink-other-img01', 'drink', 'drink-other-img01.jpg', 'no-none', 'sale', 'other-logo01.png', '2019-05-22', 1),
(17, '這是測試標題FFF，這是測試標題FFF。', '這是測試文案FFF，這是測試文案FFF，這是測試文案FFF，這是測試文案FFF，這是測試文案FFF，這是測試文案FFF，這是測試文案FFF，這是測試文案FFF。', 'alc-img17', 'alc', 'alc-img17.jpg', 'no-none', 'sale', 'cake-logo06.png', '2019-05-23', 1),
(18, '這是測試標題EEE，這是測試標題EEE。', '這是測試文案EEE，這是測試文案EEE，這是測試文案EEE，這是測試文案EEE，這是測試文案EEE，這是測試文案EEE，這是測試文案EEE，這是測試文案EEE，這是測試文案EEE。', 'drink-beans-img05', 'drink', 'drink-beans-img05.jpg', 'no-none', 'sale', 'coffee-logo01.png', '2019-05-24', 1),
(19, '這是測試標題SSS，這是測試標題SSS。', '這是測試文案SSS，這是測試文案SSS，這是測試文案SSS，這是測試文案SSS，這是測試文案SSS，這是測試文案SSS，這是測試文案SSS，這是測試文案SSS。', 'drink-beans-img03', 'drink', 'drink-beans-img03.jpg', 'no-none', 'sale', 'coffee-logo01.png', '2019-05-25', 1),
(20, '這是測試標題DDD，這是測試標題DDD，。', '這是測試文案DDD，這是測試文案DDD，這是測試文案DDD，這是測試文案DDD，這是測試文案DDD，這是測試文案DDD，這是測試文案DDD，這是測試文案DDD，這是測試文案DDD，這是測試文案DDD。', 'drink-other-img02', 'drink', 'drink-other-img02.jpg', 'no-none', 'other', 'other-logo01.png', '2019-05-26', 0),
(27, '這是測試標題CCC，這是測試標題CCC。', '這是測試文案CCC，這是測試文案CCC，這是測試文案CCC，這是測試文案CCC，這是測試文案CCC，這是測試文案CCC，這是測試文案CCC，這是測試文案CCC。', 'cm-img13', 'cm', 'cm-img13.jpg', 'no-none', 'other', 'cake-logo06.png', '2019-06-16', 0),
(34, '這是替代標題AAA，這是替代標題AAA。', '這是替代文案AAA，這是替代文案AAA，這是替代文案AAA，這是替代文案AAA，這是替代文案AAA，這是替代文案AAA，這是替代文案AAA，這是替代文案AAA，這是替代文案AAA，這是替代文案AAA。', 'cm-img08', 'cm', 'cm-img08.jpg', 'no-none', 'sale', 'cake-logo06.png', '2019-06-18', 0),
(35, '這是測試標題BBB，這是測試標題BBB。', '這是測試文案BBB，這是測試文案BBB，這是測試文案BBB，這是測試文案BBB，這是測試文案BBB，這是測試文案BBB，這是測試文案BBB，這是測試文案BBB，這是測試文案BBB。', 'cm-img12', 'cm', 'cm-img12.jpg', 'no-none', 'other', 'cake-logo06.png', '2019-06-18', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `main_combo`
--

CREATE TABLE `main_combo` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `introduction` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_get` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `display` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `main_combo`
--

INSERT INTO `main_combo` (`id`, `title`, `introduction`, `price`, `url_get`, `img_name`, `number`, `type`, `display`) VALUES
(1, '一號套餐', 'Cannelés bordelais 可麗露,相傳可麗露起源於18世紀的時,波爾多港口進口大量麵粉跟香草,修道院的修女就收及搬運過程中散落在地上的麵粉,波爾多也是聞名的紅酒產區,在清酒過程中酒廠會利用大量蛋白對酒進行過濾,而剩餘的蛋黃就會送給修道院的修女們,最後修女就利用這兩樣基本原料在加入其他副產品製成Cannelé送給居民,網路上關於可麗露說法百百種,剛好有找到法國電視節目France 2 L\'histoire des Cannelés 介紹可麗露我就決定取自於電視節目了.', '套餐售價:110元', 'cm-img01', 'cm-img01.jpg', 'no-01', 'cm', 1),
(2, '二號套餐', 'Saint-Honoré 的結構一開始至今有很大且很多的變化,早期一開始上面放的不是小泡芙(pâte à choux),而是布里歐麵包(La Brioche),但布里歐在兩個小時內就因為吸收鮮奶油的水分而軟化導致影響口感,到了19世紀末才慢慢演變成小泡芙(pâte à choux)和沾著一層焦糖.', '套餐售價:150元', 'cm-img02', 'cm-img02.jpg', 'no-02', 'cm', 1),
(3, '三號套餐', '慕斯在法語的意思就是泡沫，用泡沫來形容慕斯真是在貼切不過了，慕斯最主要就是將鮮奶油或是蛋白霜打出氣泡，讓口感如同吃到空氣般輕盈，入口即化、香滑順口，同時慕斯也是變化性很高的甜點，加入不同的材料就會呈現出完全不同的風味，正因為慕斯的變化性高，所以也考驗著所有的師傅的功力呢～', '套餐售價:170元', 'cm-img03', 'cm-img03.jpg', 'no-03', 'cm', 1),
(4, '四號套餐', '現在市面上，從隨處可見的便利商店到甜品專門店，都不難看到焦糖布丁的身影，許多人可能想不到焦糖布丁也是經典法式甜點之一，焦糖布丁最大的特色就在於布丁上面薄薄的一層焦糖，火候的掌控是很重要的，一不小心就會使糖燒焦產生焦臭味，這樣布丁就不好吃了～', '套餐售價:99元', 'cm-img04.', 'cm-img04.jpg', 'no-04', 'cm', 1),
(5, '五號套餐', '美娜一直覺得布列塔尼很像巨大的布丁麵包或是蛋塔，跟一般的蛋糕不一樣，布列塔尼外皮鬆軟、內部像布丁一樣滑順，通常會加入蜜李或葡萄乾增加香氣，是一個非常有濃厚地方色彩的甜點。', '套餐售價:90元', 'cm-img05', 'cm-img05.jpg', 'no-05', 'cm', 1),
(6, '六號套餐', '蒙布朗其實就是栗子蛋糕，法文原文的意思就是白朗峰，因為蒙布朗的外表會用栗子奶油擠成條狀覆蓋在蛋糕外圍，接著在灑上糖粉，看起來就是一座迷你的白朗峰，香甜濃郁的栗子香氣，是很多女生喜愛的口味。', '套餐售價:150元', 'cm-img06', 'cm-img06.jpg', 'no-06', 'cm', 1),
(7, '七號套餐', '閃電泡芙是法國每家甜點店裡面都會有的點心，法國流傳一個小故事，奶油和蛋糕結婚了所以有了奶油蛋糕，麵包卻從此失戀了，它把對奶油的愛深深藏在心裡，因此誕生了泡芙，所以在法國泡芙象徵著對幸福的憧憬，但由於泡芙在吃的時候很容易把奶油沾的滿手，長條狀的閃電泡芙就此誕生～細長的外型夾著滿滿內餡，加上表面的糖霜，口感更加豐富、變化也更多了。', '套餐售價:130元', 'cm-img07', 'cm-img07.jpg', 'no-07', 'cm', 1),
(8, '八號套餐', '瑪德蓮是法國傳統的貝殼形狀小蛋糕，有的時候會在喜餅裡面出現，味道比海綿蛋糕濃郁，有些在製作的時候會加上杏仁或檸檬皮絲，瑪德蓮的甜度比較高，非常適合搭配清淡的紅茶喔～', '套餐售價:99元', 'cm-img08', 'cm-img08.jpg', 'no-none', 'cm', 0),
(9, '九號套餐', '馬卡龍被譽為時尚甜點的象徵，許多人以為馬卡龍的起源是法國，但其實最早出現的馬卡龍配方是在義大利一間修道院裡面，不過後來馬卡龍在法國發揚光大，如法國瑪麗安托瓦內特皇后就是馬卡龍的忠實粉絲，材料簡單、作法也不複雜的馬卡龍卻是失敗率極高的甜點，如同它的名字「少女的酥胸」，柔軟嬌貴，如何做出表面光滑、入口即化的馬卡龍考驗著所有師傅的功力，而馬卡龍外殼酥脆、內部柔軟溼潤的口感也是讓女孩們無法抗拒的魅力所在。', '套餐售價:160元', 'cm-img09', 'cm-img09.jpg', 'no-none', 'cm', 0),
(10, '十號套餐', '喜歡甜點的人對這個名字一定不陌生，舒芙蕾的口感如同雲朵般輕柔，若有似無但香氣十足，而它最大的特點就是要現烤現吃，一旦放置20～30分鐘左右就會完全塌陷，口感就差了，所以舒芙蕾又被譽為「稍縱即逝的美味」。', '套餐售價:1220元', 'cm-img10', 'cm-img10.jpg', 'no-08', 'cm', 1),
(13, '十一號套餐', '這個拿破崙可不是那個拿破崙，哈哈～好像在繞口令，拿破崙在法語的意思是「一千層」，所以拿破崙蛋糕也叫做法式千層酥或千層蛋糕，是由三層酥皮夾住滿滿的香草奶油和卡士達餡或果醬，濃郁的餡料和酥脆的餅皮在口中化開，讓人好有幸福的感覺呢～', '套餐售價:1000元', 'cm-img11', 'cm-img11.jpg', 'no-none', 'cm', 0),
(14, '十二號套餐', '慕斯的英文名是mousse，最早起源於美食之都法國巴黎，甜點大師們為了改善奶油的結構並起到穩定的作用，在鮮奶油中加入了十數種新鮮輔料，並且通過對溫度、原料比例的控制、以及對PH值的把握，使這個全新誕生的混合物在外型、色澤、口味上都比原來更自然純正、變化豐富。他們給這種甜品起了一個好聽的名字 —— 慕斯。', '套餐售價:500元', 'cm-img12', 'cm-img12.jpg', 'no-none', 'cm', 0),
(15, '十三號套餐', 'Pullman Loaves的中文譯音為【普爾曼】麵包，起源於美國鐵路公司Pullman，這樣以錫鐵材質做成的帶蓋烤模，早期大量用在車廂裡狹窄廚房空間。再往前推演，早在18世紀歐洲，就已經開始使用這樣的烤模，以降低外皮酥殼形成的厚度。', '套餐售價:800元', 'cm-img13', 'cm-img13.jpg', 'no-none', 'cm', 0),
(16, '十四號套餐', '這是測試內文AAA，這是測試內文AAA，這是測試內文AAA，這是測試內文AAA，這是測試內文AAA，這是測試內文AAA，這是測試內文AAA，這是測試內文AAA，這是測試內文AAA。', '套餐售價:600元', 'cm-img09', 'cm-img09.jpg', 'no-none', 'cm', 0),
(17, '十五號套餐', '這是測試內文BBB，這是測試內文BBB，這是測試內文BBB，這是測試內文BBB，這是測試內文BBB，這是測試內文BBB，這是測試內文BBB，這是測試內文BBB，這是測試內文BBB，這是測試內文BBB。', '套餐售價:1000元', 'cm-img10', 'cm-img10.jpg', 'no-none', 'cm', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `main_drink`
--

CREATE TABLE `main_drink` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `introduction` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_get` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kind` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `display` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `main_drink`
--

INSERT INTO `main_drink` (`id`, `title`, `introduction`, `url_get`, `img_name`, `number`, `type`, `kind`, `price`, `display`) VALUES
(1, '咖啡物語大標-01', 'banner-01。(banner:請照此格式。)', 'drink-coffee-banner01', 'drink-coffee-banner01.jpg', 'no-none', 'drink', 'coffee', 'none', 0),
(2, '咖啡物語大標-02', 'banner-02。(banner:請照此格式。)', 'drink-coffee-banner02', 'drink-coffee-banner02.jpg', 'no-none', 'drink', 'coffee', 'none', 0),
(3, '咖啡物語大標-03', 'banner-03。(banner:請照此格式。)', 'drink-coffee-banner03', 'drink-coffee-banner03.jpg', 'no-none', 'drink', 'coffee', 'none', 0),
(4, '咖啡物語大標-04', 'banner-04。(banner:請照此格式。)', 'drink-coffee-banner04', 'drink-coffee-banner04.jpg', 'no-banner', 'drink', 'coffee', 'none', 1),
(5, '義式奶香咖啡', '這是測試文案EEE，這是測試文案EEE，這是測試文案EEE，這是測試文案EEE，這是測試文案EEE，這是測試文案EEE。', 'drink-coffee-img01', 'drink-coffee-img01.jpg', 'no-none', 'drink', 'coffee', '售價:50元', 1),
(6, '西班牙深焙咖啡', '這是測試文案FFF，這是測試文案FFF，這是測試文案FFF，這是測試文案FFF，這是測試文案FFF，這是測試文案FFF。', 'drink-coffee-img02', 'drink-coffee-img02.jpg', 'no-02', 'drink', 'coffee', '售價:60元', 1),
(7, '古坑竹香咖啡', '這是測試文案GGG，這是測試文案GGG，這是測試文案GGG，這是測試文案GGG，這是測試文案GGG，這是測試文案GGG。', 'drink-coffee-img03', 'drink-coffee-img03.jpg', 'no-03', 'drink', 'coffee', '售價:70元', 1),
(8, '法式黑咖啡', '這是測試文案HHH，這是測試文案HHH，這是測試文案HHH，這是測試文案HHH，這是測試文案HHH，這是測試文案HHH。', 'drink-coffee-img04', 'drink-coffee-img04.jpg', 'no-04', 'drink', 'coffee', '售價:70元', 1),
(9, '西雅圖黑咖啡', '這是測試文案III，這是測試文案III，這是測試文案III，這是測試文案III，這是測試文案III，這是測試文案III。', 'drink-coffee-img05', 'drink-coffee-img05.jpg', 'no-05', 'drink', 'coffee', '售價:75元', 1),
(10, '純濃黑咖啡', '這是測試文案JJJ，這是測試文案JJJ，這是測試文案JJJ，這是測試文案JJJ，這是測試文案JJJ，這是測試文案JJJ。', 'drink-coffee-img06', 'drink-coffee-img06.jpg', 'no-none', 'drink', 'coffee', '售價:45元', 1),
(11, '八角淡香咖啡', '這是測試文案KKK，這是測試文案KKK，這是測試文案KKK，這是測試文案KKK，這是測試文案KKK，這是測試文案KKK。', 'drink-coffee-img07', 'drink-coffee-img07.jpg', 'no-01', 'drink', 'coffee', '售價:65元', 1),
(12, '卡布奇諾', '這是測試文案LLL，這是測試文案LLL，這是測試文案LLL，這是測試文案LLL，這是測試文案LLL，這是測試文案LLL。', 'drink-coffee-img08', 'drink-coffee-img08.jpg', 'no-none', 'drink', 'coffee', '售價:70元', 1),
(13, '法式重乳拿鐵', '測試文案AAA，測試文案AAA。測試文案AAA，測試文案AAA。測試文案AAA，測試文案AAA。測試文案AAA，測試文案AAA。', 'drink-coffee-img09', 'drink-coffee-img09.jpg', 'no-none', 'drink', 'coffee', '售價:70元', 0),
(14, '義式咖啡豆', '測試文案BBB，測試文案BBB。測試文案BBB，測試文案BBB。測試文案BBB，測試文案BBB。測試文案BBB，測試文案BBB。', 'drink-beans-img01', 'drink-beans-img01.jpg', 'no-none', 'drink', 'beans', '售價:600元', 1),
(15, '經典深焙咖啡豆', '測試文案CCC，測試文案CCC。測試文案CCC，測試文案CCC。測試文案CCC，測試文案CCC。測試文案CCC，測試文案CCC。', 'drink-beans-img02', 'drink-beans-img02.jpg', 'no-none', 'drink', 'beans', '售價:450元', 0),
(16, '原生古坑咖啡豆', '測試文案DDD，測試文案DDD。測試文案DDD，測試文案DDD。測試文案DDD，測試文案DDD。測試文案DDD，測試文案DDD。', 'drink-beans-img03', 'drink-beans-img03.jpg', 'no-none', 'drink', 'beans', '售價:800元', 1),
(17, '九和一濾掛咖啡組12入', '測試文案EEE，測試測試文案EEE，測試文案EEE。測試文案EEE，測試文案EEE。文案EEE。', 'drink-beans-img04', 'drink-beans-img04.jpg', 'no-none', 'drink', 'beans', '售價:300元', 1),
(18, '即品咖啡豆', '測試文案FFF，測試文案FFF。測試文案FFF，測試文案FFF。測試文案FFF，測試文案FFF。', 'drink-beans-img05', 'drink-beans-img05.jpg', 'no-none', 'drink', 'beans', '售價:500元', 0),
(19, '阿薩姆紅茶', '測試文案MMM，測試文案MMM。測試文案MMM，測試文案MMM。測試文案MMM，測試文案MMM。測試文案MMM，測試文案MMM。測試文案MMM，測試文案MMM。測試文案MMM，測試文案MMM。', 'drink-other-img01', 'drink-other-img01.jpg', 'no-none', 'drink', 'other', '售價:25元', 1),
(20, '大吉嶺紅茶', '測試文案NNN，測試文案NNN。測試文案NNN，測試文案NNN。測試文案NNN，測試文案NNN。測試文案NNN，測試文案NNN。', 'drink-other-img02', 'drink-other-img02.jpg', 'no-none', 'drink', 'other', '售價:35元', 1),
(21, '鮮橙檸檬紅茶', '測試文案OOO，測試文案OOO。測試文案OOO，測試文案OOO。測試文案OOO，測試文案OOO。測試文案OOO，測試文案OOO。', 'drink-other-img03', 'drink-other-img03.jpg', 'no-06', 'drink', 'other', '售價:30元', 1),
(22, '風味綠茶', '測試文案PPP，測試文案PPP。測試文案PPP，測試文案PPP。測試文案PPP，測試文案PPP。測試文案PPP，測試文案PPP。測試文案PPP，測試文案PPP。測試文案PPP，測試文案PPP。', 'drink-other-img04', 'drink-other-img04.jpg', 'no-none', 'drink', 'other', '售價:25元', 1),
(23, '鮮摘清香綠茶', '測試文案QQQ，測試文案QQQ。測試文案QQQ，測試文案QQQ。測試文案QQQ，測試文案QQQ。測試文案QQQ，測試文案QQQ。', 'drink-other-img05', 'drink-other-img05.jpg', 'no-none', 'drink', 'other', '售價:45元', 1),
(24, '日式抹茶', '測試文案RRR，測試文案RRR。測試文案RRR，測試文案RRR。測試文案RRR，測試文案RRR。', 'drink-other-img06', 'drink-other-img06.jpg', 'no-none', 'drink', 'other', '售價:60元', 0),
(25, '咖啡物語大標-05', 'banner-05。(banner:請照此格式。)', 'drink-coffee-banner05', 'drink-coffee-banner05.jpg', 'no-none', 'drink', 'coffee', 'none', 0),
(26, '咖啡物語大標-06', 'banner-06。(banner:請照此格式。)', 'drink-coffee-banner06', 'drink-coffee-banner06.jpg', 'no-none', 'drink', 'coffee', 'none', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `main_sale`
--

CREATE TABLE `main_sale` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `introduction` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_get` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kind` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `display` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `main_sale`
--

INSERT INTO `main_sale` (`id`, `title`, `introduction`, `url_get`, `img_name`, `number`, `type`, `kind`, `price`, `display`) VALUES
(1, '香草杯子蛋糕', 'Cannelés bordelais 可麗露,相傳可麗露起源於18世紀的時,波爾多港口進口大量麵粉跟香草,修道院的修女就收及搬運過程中散落在地上的麵粉,波爾多也是聞名的紅酒產區,在清酒過程中酒廠會利用大量蛋白對酒進行過濾,而剩餘的蛋黃就會送給修道院的修女們,最後修女就利用這兩樣基本原料在加入其他副產品製成Cannelé送給居民,網路上關於可麗露說法百百種,剛好有找到法國電視節目France 2 L\'histoire des Cannelés 介紹可麗露我就決定取自於電視節目了.', 'alc-img01', 'alc-img01.jpg', 'no-none', 'alc', 'cake', '單項售價:50元', 1),
(2, '馬卡龍', 'Saint-Honoré 的結構一開始至今有很大且很多的變化,早期一開始上面放的不是小泡芙(pâte à choux),而是布里歐麵包(La Brioche),但布里歐在兩個小時內就因為吸收鮮奶油的水分而軟化導致影響口感,到了19世紀末才慢慢演變成小泡芙(pâte à choux)和沾著一層焦糖.', 'alc-img02', 'alc-img02.jpg', 'no-none', 'alc', 'macaron', '單項售價:30元', 1),
(3, '草莓圓杯蛋糕', '慕斯在法語的意思就是泡沫，用泡沫來形容慕斯真是在貼切不過了，慕斯最主要就是將鮮奶油或是蛋白霜打出氣泡，讓口感如同吃到空氣般輕盈，入口即化、香滑順口，同時慕斯也是變化性很高的甜點，加入不同的材料就會呈現出完全不同的風味，正因為慕斯的變化性高，所以也考驗著所有的師傅的功力呢～', 'alc-img03', 'alc-img03.jpg', 'no-none', 'alc', 'cake', '單項售價:40元', 1),
(4, '草莓夾層蛋糕', '現在市面上，從隨處可見的便利商店到甜品專門店，都不難看到焦糖布丁的身影，許多人可能想不到焦糖布丁也是經典法式甜點之一，焦糖布丁最大的特色就在於布丁上面薄薄的一層焦糖，火候的掌控是很重要的，一不小心就會使糖燒焦產生焦臭味，這樣布丁就不好吃了～', 'alc-img04', 'alc-img04.jpg', 'no-none', 'alc', 'cake', '單項售價:35元', 1),
(5, '迷你馬卡龍', '美娜一直覺得布列塔尼很像巨大的布丁麵包或是蛋塔，跟一般的蛋糕不一樣，布列塔尼外皮鬆軟、內部像布丁一樣滑順，通常會加入蜜李或葡萄乾增加香氣，是一個非常有濃厚地方色彩的甜點。', 'alc-img05', 'alc-img05.jpg', 'no-none', 'alc', 'macaron', '單項售價:35元', 0),
(6, '風味馬卡龍', '蒙布朗其實就是栗子蛋糕，法文原文的意思就是白朗峰，因為蒙布朗的外表會用栗子奶油擠成條狀覆蓋在蛋糕外圍，接著在灑上糖粉，看起來就是一座迷你的白朗峰，香甜濃郁的栗子香氣，是很多女生喜愛的口味。', 'alc-img06', 'alc-img06.jpg', 'no-none', 'alc', 'macaron', '單項售價:30元', 1),
(7, '聖誕草莓蛋糕', '閃電泡芙是法國每家甜點店裡面都會有的點心，法國流傳一個小故事，奶油和蛋糕結婚了所以有了奶油蛋糕，麵包...', 'alc-img07', 'alc-img07.jpg', 'no-none', 'alc', 'cake', '單項售價:65元', 0),
(8, '軟Q糖果球', '瑪德蓮是法國傳統的貝殼形狀小蛋糕，有的時候會在喜餅裡面出現，味道比海綿蛋糕濃郁，有些在製作的時候會加...', 'alc-img08', 'alc-img08.jpg', 'no-none', 'alc', 'candy', '單項售價:50元', 1),
(9, '七彩馬卡龍', '馬卡龍被譽為時尚甜點的象徵，許多人以為馬卡龍的起源是法國，但其實最早出現的馬卡龍配方是在義大利一間修...', 'alc-img09', 'alc-img09.jpg', 'no-none', 'alc', 'macaron', '單項售價:40元', 1),
(10, '藍桑奶油小蛋糕', '歐培拉在台灣又稱為歌劇蛋糕、法國歌劇蛋糕、劇院蛋糕等，傳統的歐培拉就是在杏仁蛋糕上刷一層咖啡糖漿，夾...', 'alc-img12', 'alc-img12.jpg', 'no-none', 'alc', 'cake', '單項售價:50元', 1),
(11, '甜甜草莓糖', '喜歡甜點的人對這個名字一定不陌生，舒芙蕾的口感如同雲朵般輕柔，若有似無但香氣十足，而它最大的特點就是...', 'alc-img11', 'alc-img11.jpg', 'no-none', 'alc', 'candy', '單項售價:70元', 1),
(12, '法式草莓蛋糕', '這個拿破崙可不是那個拿破崙，哈哈～好像在繞口令，拿破崙在法語的意思是「一千層」，所以拿破崙蛋糕也叫做法式千層酥或千層蛋糕，是由三層酥皮夾住滿滿的香草奶油和卡士達餡或果醬，濃郁的餡料和酥脆的餅皮在口中化開，讓人好有幸福的感覺呢～', 'alc-img10', 'alc-img10.jpg', 'no-01', 'alc', 'cake', '單項售價:60元', 1),
(13, '玫瑰奶油蛋糕', '作法相似，都是將泡芙填入卡士達醬，表面刷上糖霜，最常見的口味是巧克力和咖啡，近年開心果與香草口味也很流行。兩款泡芙外型大不同，名稱背後也有有趣的典故。', 'alc-img13', 'alc-img13.jpg', 'no-02', 'alc', 'cake', '單項售價:70元', 1),
(14, '雪人椰絲糖 ', '由一大一小的圓形泡芙堆疊起來的修女泡芙，1856年在巴黎的咖啡廳推出後大受好評，進而風靡全法國。雖然外形像個小雪人，法國人卻認為塗上糖霜的泡芙外形像修女罩袍因此命名…這就要請各位自行發揮想像力了。', 'alc-img14', 'alc-img14.jpg', 'no-banner', 'alc', 'candy', '單項售價:100元', 1),
(15, '紅配綠蛋塔 ', '法式甜點的「塔」口味千變萬化，但甜塔以巧克力與檸檬塔最為常見。製作塔殼是甜點師傅的基本功，從外形與口感，就能判斷師傅技術是否到位。這兩款塔不若一般法式甜點花俏，但檸檬塔在19世紀是進貢給國王的甜品，象徵著財富與幸運。現在的檸檬塔不再遙不可及，是街頭平民美食啦。', 'alc-img15', 'alc-img15.jpg', 'no-03', 'alc', 'egg_tart', '單項售價:150元', 1),
(16, '原味酥脆蛋塔', '蛋塔為香港地道代表食物之一，香港蛋塔分為酥皮，奶油皮兩款。1940年代，香港高級西餐廳引入蛋塔，1950年代開始出現於茶餐廳。初時茶餐廳的蛋塔都比較大，一個蛋塔便可以成為一份下午茶餐。1990年代起，兼營包餅之茶餐廳逐漸減少，只有舊式茶餐廳方有自家烤製的蛋塔，大部份茶餐廳從麵包工場訂購\r\n蛋塔。大部分麵包店都會供應蛋塔。另一方面，香港不少酒樓的點心中也包括蛋塔仔（小型蛋塔）。', 'alc-img16', 'alc-img16.jpg', 'no-04', 'alc', 'egg_tart', '單項售價:150元', 1),
(17, '綜合水果塔', '色彩繽紛的水果塔是眾多塔類最受歡迎的一種, 接受度超高的, 就算不愛吃甜點的人也會吃上一兩個。\r\n個人覺得處理水果塔最難的不是捏塔皮, 而是如何在小巧的空間內組合水果, 讓它看起來秀色可餐?\r\n這多少得有些藝術天份加靈活手指才行, 正所謂: \"巧思巧手\" 就是這個意思。\r\n', 'alc-img17', 'alc-img17.jpg', 'no-none', 'alc', 'egg_tart', '單項售價:200元', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `user_admin`
--

CREATE TABLE `user_admin` (
  `id` int(11) NOT NULL,
  `acc_admin` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pwd_admin` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `eid_admin` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_admin` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_admin` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `position_admin` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sp_admin` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_admin` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `user_admin`
--

INSERT INTO `user_admin` (`id`, `acc_admin`, `pwd_admin`, `eid_admin`, `name_admin`, `birth_admin`, `position_admin`, `sp_admin`, `type_admin`, `display_admin`) VALUES
(1, 'admin', 'admin', ' adimn', 'admin', 'none', 'admin', '\r\nforever', '0', 0),
(2, 'A001', 'A001', 'A001', '店長', 'unknown', 'manager', '2020/01/01~至今', '1', 1),
(3, 'B001', 'B001', 'B001', '黃大昌', '1990/01/01', 'deputy_manager', '2020/01/01~至今', '2', 1),
(4, 'B002', 'B002', 'B002', '黃小捷', '1990/03/03', 'deputy_manager', '2020/01/01~至今', '2', 1),
(5, 'C001', 'C001', 'C001', '呱小吉', '1991/01/01', 'senior_staff', '2020/03/03~至今', '3', 1),
(6, 'C002', 'C002', 'C002', '張小蔓', '1991/02/02', 'senior_staff', '2020/05/05~至今', '3', 1),
(7, 'C003', 'C003', 'C003', '高小瑜', '1991/03/03', 'senior_staff', '2020/06/06~至今', '3', 1),
(8, 'C004', 'C004', 'C004', '李小緣', '1991/04/04', 'senior_staff', '2020/07/07~至今', '3', 1),
(9, 'C005', 'C005', 'C005', '宋小恬', '1991/06/06', 'senior_staff', '2020/09/09~至今', '3', 1),
(10, 'D001', 'D001', 'D001', '劉小志', '1993/05/05', 'staff', '2021/07/07~至今', '4', 1),
(11, 'D002', 'D002', 'D002', '言小佳', '1993/06/06', 'staff', '2021/08/08~至今', '4', 1),
(12, 'D003', 'D003', 'D003', '鄒小賢', '1993/07/07', 'staff', '2021/09/09~至今', '4', 1),
(13, 'D004', 'D004', 'D004', '葉小明', '1993/08/08', 'staff', '2021/10/10~至今', '4', 1),
(14, 'D005', 'D005', 'D005', '鍾小茵', '1993/09/09', 'staff', '2021/11/11~至今', '4', 1),
(15, 'D006', 'D006', 'D006', '李小芸', '1993/10/10', 'staff', '2021/12/12~至今', '4', 1),
(16, 'E001', 'E001', 'E001', '孟小君', '1995/01/01', 'rookie', '2023/01/01~至今', '5', 1),
(17, 'E002', 'E002', 'E002', '蔡小欣', '1995/03/03', 'rookie', '2023/03/03~至今', '5', 1),
(18, 'E003', 'E003', 'E003', '鄭小祥', '1995/05/05', 'rookie', '2023/05/05~至今', '5', 1),
(23, 'E004', 'E004', 'E004', '王小仁', '1995/06/06', 'rookie', '2023/06/06~至今', '5', 1),
(26, 'E005', 'E005', 'E005', '簡小陞', '1995/07/07', 'rookie', '2023/07/07~至今', '5', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `user_log`
--

CREATE TABLE `user_log` (
  `id` int(11) NOT NULL,
  `user` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` datetime NOT NULL,
  `logout` datetime NOT NULL,
  `Permission` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `user_log`
--

INSERT INTO `user_log` (`id`, `user`, `login`, `logout`, `Permission`) VALUES
(7, 'B001', '2019-06-26 12:46:40', '2019-06-26 14:00:03', '2'),
(8, 'A001', '2019-06-26 12:58:30', '0000-00-00 00:00:00', '1'),
(9, 'B001', '2019-06-26 13:59:44', '2019-06-26 14:00:03', '2'),
(10, 'D001', '2019-06-26 14:00:13', '2019-06-26 14:01:19', '4'),
(13, 'D001', '2019-06-26 14:15:01', '2019-06-26 14:16:25', '4'),
(14, 'D001', '2019-06-26 14:16:55', '2019-06-26 14:17:08', '4'),
(16, 'A001', '2019-06-26 15:21:50', '2019-06-26 17:56:35', '1'),
(25, 'A001', '2019-06-27 11:30:52', '2019-06-27 11:33:57', '1'),
(26, 'A001', '2019-06-27 11:34:04', '2019-06-27 11:36:10', '1'),
(27, 'B001', '2019-06-27 12:36:51', '0000-00-00 00:00:00', '2'),
(28, 'A001', '2019-06-27 12:47:10', '0000-00-00 00:00:00', '1');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `footer_table`
--
ALTER TABLE `footer_table`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `header_billboard`
--
ALTER TABLE `header_billboard`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `main_combo`
--
ALTER TABLE `main_combo`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `main_drink`
--
ALTER TABLE `main_drink`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `main_sale`
--
ALTER TABLE `main_sale`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user_admin`
--
ALTER TABLE `user_admin`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動增長(AUTO_INCREMENT)
--

--
-- 使用資料表自動增長(AUTO_INCREMENT) `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `footer_table`
--
ALTER TABLE `footer_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `header_billboard`
--
ALTER TABLE `header_billboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `main_combo`
--
ALTER TABLE `main_combo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `main_drink`
--
ALTER TABLE `main_drink`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `main_sale`
--
ALTER TABLE `main_sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `user_admin`
--
ALTER TABLE `user_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `user_log`
--
ALTER TABLE `user_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
