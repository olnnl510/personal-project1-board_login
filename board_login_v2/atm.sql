-- --------------------------------------------------------
-- 호스트:                          127.0.0.1
-- 서버 버전:                        10.6.7-MariaDB - mariadb.org binary distribution
-- 서버 OS:                        Win64
-- HeidiSQL 버전:                  11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- atm 데이터베이스 구조 내보내기
CREATE DATABASE IF NOT EXISTS `atm` /*!40100 DEFAULT CHARACTER SET utf8mb3 */;
USE `atm`;

-- 테이블 atm.t_board 구조 내보내기
CREATE TABLE IF NOT EXISTS `t_board` (
  `i_board` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` varchar(2000) NOT NULL,
  `answer` varchar(2000) DEFAULT NULL,
  `i_user` int(10) unsigned NOT NULL,
  `que_at` datetime DEFAULT current_timestamp(),
  `ans_at` datetime DEFAULT current_timestamp(),
  `ansmod_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`i_board`),
  KEY `i_user` (`i_user`),
  CONSTRAINT `t_board_ibfk_1` FOREIGN KEY (`i_user`) REFERENCES `t_user` (`i_user`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb3;

-- 테이블 데이터 atm.t_board:~69 rows (대략적) 내보내기
/*!40000 ALTER TABLE `t_board` DISABLE KEYS */;
REPLACE INTO `t_board` (`i_board`, `question`, `answer`, `i_user`, `que_at`, `ans_at`, `ansmod_at`) VALUES
	(3, 'test1번test1번test1번test1번test1번', 'ㅅㄷㄴㅅ1', 1, '2022-07-07 17:36:25', '2022-07-07 17:36:25', '2022-07-07 17:36:25'),
	(4, 'test2번 test2번 test2번 test2번 test2번', 'test22222', 1, '2022-07-07 17:36:33', '2022-07-07 17:36:33', '2022-07-07 17:36:33'),
	(5, '질문33333질문33333질문33333질문33333질문33333', NULL, 1, '2022-07-07 17:36:52', '2022-07-07 17:36:52', '2022-07-07 17:36:52'),
	(6, '질문 4번~~~~~질문 4번~~~~~질문 4번~~~~~질문 4번~~~~~질문 4번~~~~~', NULL, 1, '2022-07-07 17:36:59', '2022-07-07 17:36:59', '2022-07-07 17:36:59'),
	(7, '짱구야 노올자~', NULL, 1, '2022-07-08 12:16:13', '2022-07-08 12:16:13', '2022-07-08 12:16:13'),
	(8, '짱구야 유리랑 철수랑 싸우면 누가 이김?', 'testtesttesttesttesttesttesttesttesttesttesttesttest', 1, '2022-07-08 12:16:21', '2022-07-08 12:16:21', '2022-07-08 12:16:21'),
	(9, 'testtesttesttesttesttesttesttesttesttest', NULL, 1, '2022-07-08 12:16:59', '2022-07-08 12:16:59', '2022-07-08 12:16:59'),
	(10, 'testtesttesttesttesttesttesttesttesttesttesttesttesttest', NULL, 1, '2022-07-08 12:17:00', '2022-07-08 12:17:00', '2022-07-08 12:17:00'),
	(11, 'testtesttesttesttesttesttesttesttesttesttesttesttesttest', 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest', 1, '2022-07-08 12:17:01', '2022-07-08 12:17:01', '2022-07-08 12:17:01'),
	(12, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', NULL, 1, '2022-07-08 12:17:03', '2022-07-08 12:17:03', '2022-07-08 12:17:03'),
	(13, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest', 'testtesttesttesttesttesttesttesttesttesttest', 1, '2022-07-08 12:17:04', '2022-07-08 12:17:04', '2022-07-08 12:17:04'),
	(14, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest', 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', 2, '2022-07-08 12:17:25', '2022-07-08 12:17:25', '2022-07-08 12:17:25'),
	(15, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest', 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', 2, '2022-07-08 12:17:26', '2022-07-08 12:17:26', '2022-07-08 12:17:26'),
	(16, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', NULL, 2, '2022-07-08 12:17:28', '2022-07-08 12:17:28', '2022-07-08 12:17:28'),
	(17, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', 2, '2022-07-08 12:17:29', '2022-07-08 12:17:29', '2022-07-08 12:17:29'),
	(18, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', NULL, 2, '2022-07-08 12:17:30', '2022-07-08 12:17:30', '2022-07-08 12:17:30'),
	(19, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', NULL, 2, '2022-07-08 12:17:30', '2022-07-08 12:17:30', '2022-07-08 12:17:30'),
	(20, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', 2, '2022-07-08 12:17:31', '2022-07-08 12:17:31', '2022-07-08 12:17:31'),
	(21, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', NULL, 2, '2022-07-08 12:17:32', '2022-07-08 12:17:32', '2022-07-08 12:17:32'),
	(22, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', 2, '2022-07-08 12:17:33', '2022-07-08 12:17:33', '2022-07-08 12:17:33'),
	(23, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', NULL, 2, '2022-07-08 12:17:33', '2022-07-08 12:17:33', '2022-07-08 12:17:33'),
	(24, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', NULL, 3, '2022-07-08 12:17:56', '2022-07-08 12:17:56', '2022-07-08 12:17:56'),
	(25, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', 3, '2022-07-08 12:17:57', '2022-07-08 12:17:57', '2022-07-08 12:17:57'),
	(26, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', 3, '2022-07-08 12:17:58', '2022-07-08 12:17:58', '2022-07-08 12:17:58'),
	(27, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', 3, '2022-07-08 12:17:58', '2022-07-08 12:17:58', '2022-07-08 12:17:58'),
	(28, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', NULL, 3, '2022-07-08 12:17:59', '2022-07-08 12:17:59', '2022-07-08 12:17:59'),
	(29, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', NULL, 3, '2022-07-08 12:18:01', '2022-07-08 12:18:01', '2022-07-08 12:18:01'),
	(30, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', 3, '2022-07-08 12:18:01', '2022-07-08 12:18:01', '2022-07-08 12:18:01'),
	(31, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', NULL, 3, '2022-07-08 12:18:02', '2022-07-08 12:18:02', '2022-07-08 12:18:02'),
	(32, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', NULL, 3, '2022-07-08 12:18:03', '2022-07-08 12:18:03', '2022-07-08 12:18:03'),
	(33, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', 3, '2022-07-08 12:18:04', '2022-07-08 12:18:04', '2022-07-08 12:18:04'),
	(34, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest', NULL, 4, '2022-07-08 12:18:23', '2022-07-08 12:18:23', '2022-07-08 12:18:23'),
	(35, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', NULL, 4, '2022-07-08 12:18:25', '2022-07-08 12:18:25', '2022-07-08 12:18:25'),
	(36, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', 4, '2022-07-08 12:18:26', '2022-07-08 12:18:26', '2022-07-08 12:18:26'),
	(37, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', NULL, 4, '2022-07-08 12:18:26', '2022-07-08 12:18:26', '2022-07-08 12:18:26'),
	(38, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', NULL, 4, '2022-07-08 12:18:27', '2022-07-08 12:18:27', '2022-07-08 12:18:27'),
	(39, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', NULL, 4, '2022-07-08 12:18:28', '2022-07-08 12:18:28', '2022-07-08 12:18:28'),
	(40, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', NULL, 4, '2022-07-08 12:18:28', '2022-07-08 12:18:28', '2022-07-08 12:18:28'),
	(41, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', NULL, 4, '2022-07-08 12:18:29', '2022-07-08 12:18:29', '2022-07-08 12:18:29'),
	(42, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', 4, '2022-07-08 12:18:30', '2022-07-08 12:18:30', '2022-07-08 12:18:30'),
	(43, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', 4, '2022-07-08 12:18:30', '2022-07-08 12:18:30', '2022-07-08 12:18:30'),
	(44, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', NULL, 4, '2022-07-08 12:18:31', '2022-07-08 12:18:31', '2022-07-08 12:18:31'),
	(45, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', 4, '2022-07-08 12:18:32', '2022-07-08 12:18:32', '2022-07-08 12:18:32'),
	(46, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', NULL, 4, '2022-07-08 12:18:32', '2022-07-08 12:18:32', '2022-07-08 12:18:32'),
	(47, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', 4, '2022-07-08 12:18:33', '2022-07-08 12:18:33', '2022-07-08 12:18:33'),
	(48, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', NULL, 5, '2022-07-08 12:18:57', '2022-07-08 12:18:57', '2022-07-08 12:18:57'),
	(49, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', 5, '2022-07-08 12:18:58', '2022-07-08 12:18:58', '2022-07-08 12:18:58'),
	(50, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', 5, '2022-07-08 12:18:59', '2022-07-08 12:18:59', '2022-07-08 12:18:59'),
	(51, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', 5, '2022-07-08 12:18:59', '2022-07-08 12:18:59', '2022-07-08 12:18:59'),
	(52, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', 5, '2022-07-08 12:19:00', '2022-07-08 12:19:00', '2022-07-08 12:19:00'),
	(53, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', NULL, 5, '2022-07-08 12:19:01', '2022-07-08 12:19:01', '2022-07-08 12:19:01'),
	(54, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', 5, '2022-07-08 12:19:01', '2022-07-08 12:19:01', '2022-07-08 12:19:01'),
	(55, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', NULL, 5, '2022-07-08 12:19:14', '2022-07-08 12:19:14', '2022-07-08 12:19:14'),
	(56, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', NULL, 5, '2022-07-08 12:19:15', '2022-07-08 12:19:15', '2022-07-08 12:19:15'),
	(57, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest', NULL, 5, '2022-07-08 12:19:16', '2022-07-08 12:19:16', '2022-07-08 12:19:16'),
	(58, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest', NULL, 5, '2022-07-08 12:19:17', '2022-07-08 12:19:17', '2022-07-08 12:19:17'),
	(59, 'testtesttesttesttesttesttesttesttesttesttesttesttesttesttest', NULL, 5, '2022-07-08 12:19:17', '2022-07-08 12:19:17', '2022-07-08 12:19:17'),
	(60, '맛있는 텐동집 추천해주세요~', '유이쯔 (대구 중구 중앙대로 376-20 1층), 저스트텐동(대구광역시 중구 동성로3길 20 101호 저스트텐동 동성로점) 입니다^^', 6, '2022-07-08 12:19:27', '2022-07-08 12:19:27', '2022-07-08 12:19:27'),
	(61, '맛있는 라멘집 추천해주세요~', '큐산 (대구 중구 동성로2길 49-17 1층), 유타로 (대구 중구 중앙대로 406-4 유타로) 입니다^^', 6, '2022-07-08 12:19:28', '2022-07-08 12:19:28', '2022-07-08 12:19:28'),
	(62, '레트로풍 호프집 추천좀ㅇㅇ', '꺼비슈퍼 (대구 중구 중앙대로79길 16) 강추ㅇㅇ', 6, '2022-07-08 12:19:28', '2022-07-08 12:19:28', '2022-07-08 12:19:28'),
	(63, '맛나는 소바집 있나여?', '칸다소바 (대구 중구 중앙대로 398-1) 돼지껍데기 아부라소바 강추여!', 6, '2022-07-08 12:19:29', '2022-07-08 12:19:29', '2022-07-08 12:19:29'),
	(64, '즉석떡복이 + 볶음밥 맛난집 있을까여..', '동성로 떡볶이 (대구 중구 동성로 19-7), 압구정 떡볶이 (대구 중구 동성로 19-15) 바로 옆집임다ㅇㅇ', 6, '2022-07-08 12:19:30', '2022-07-08 12:19:30', '2022-07-08 12:19:30'),
	(65, '경양식돈까쓰집 추천좀여ㅇㅇ', '전원돈까스 (대구 중구 동성로6길 2-23 B1F) 여기가 갑입니당ㅇㅇ', 6, '2022-07-08 12:19:30', '2022-07-08 12:19:30', '2022-07-08 12:19:30'),
	(66, '막창집 추천이여~', NULL, 6, '2022-07-08 12:19:31', '2022-07-08 12:19:31', '2022-07-08 12:19:31'),
	(71, '써브웨이 메뉴추천여ㅇㅇ', NULL, 6, '2022-07-08 16:35:03', '2022-07-08 16:35:03', '2022-07-08 16:35:03'),
	(72, '치킨 + 호프집 추천좀해주세요!', NULL, 6, '2022-07-08 16:35:09', '2022-07-08 16:35:09', '2022-07-08 16:35:09'),
	(73, '단체로 회식할장소 추천해주세용~ (고기집으로)', NULL, 6, '2022-07-08 16:35:20', '2022-07-08 16:35:20', '2022-07-08 16:35:20'),
	(76, 'Hi!', 'YEs!!!', 1, '2022-08-04 15:45:13', '2022-08-04 15:45:13', '2022-08-04 15:45:13');
/*!40000 ALTER TABLE `t_board` ENABLE KEYS */;

-- 테이블 atm.t_user 구조 내보내기
CREATE TABLE IF NOT EXISTS `t_user` (
  `i_user` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `upw` varchar(20) NOT NULL,
  `nm` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `intro` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `profile_img` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`i_user`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

-- 테이블 데이터 atm.t_user:~7 rows (대략적) 내보내기
/*!40000 ALTER TABLE `t_user` DISABLE KEYS */;
REPLACE INTO `t_user` (`i_user`, `upw`, `nm`, `email`, `intro`, `created_at`, `updated_at`, `profile_img`) VALUES
	(1, '1212', '짱구', 'olnnl5101@gmail.com', 'YESSESDSD', '2022-07-07 16:39:38', '2022-08-04 15:49:02', 'd8b1b90d-1b16-4cab-8697-955aa7c1f102.jpg'),
	(2, '1234', '강동원', 'olnnl5102@gmail.com', NULL, '2022-07-07 16:39:56', '2022-07-07 16:39:56', NULL),
	(3, '1234', '전지현', 'olnnl5103@gmail.com', NULL, '2022-07-07 16:40:05', '2022-07-07 16:40:05', NULL),
	(4, '1234', '루피', 'olnnl5104@gmail.com', NULL, '2022-07-07 16:52:29', '2022-07-07 16:52:29', NULL),
	(5, '1234', '연애상담', 'olnnl5105@gmail.com', NULL, '2022-07-07 16:52:50', '2022-07-07 16:52:50', '5.햘'),
	(6, '1234', '먹잘알', '1234@gmail.com', '동성로 근처 맛잘알입니다 물어보십셔', '2022-07-07 16:53:18', '2022-07-07 16:53:18', '683befc7-525f-4111-930b-202f6836fc0f.jpg'),
	(9, '1212', '전지현', '2332@2332', NULL, '2022-08-04 15:42:25', '2022-08-04 15:42:25', NULL);
/*!40000 ALTER TABLE `t_user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
