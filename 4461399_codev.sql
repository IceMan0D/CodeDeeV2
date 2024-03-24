-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: fdb1033.awardspace.net
-- Generation Time: Mar 24, 2024 at 05:01 PM
-- Server version: 8.0.32
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `4461399_codev2`
--

-- --------------------------------------------------------

--
-- Table structure for table `basket`
--

CREATE TABLE `basket` (
  `basket_id` int NOT NULL,
  `user_id` int NOT NULL,
  `course_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `basket`
--

INSERT INTO `basket` (`basket_id`, `user_id`, `course_id`) VALUES
(1, 1, 3),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int NOT NULL,
  `user_username` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `course_img` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `course_name` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `course_price` decimal(10,2) NOT NULL,
  `course_promotion` varchar(7) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_promotion` int NOT NULL,
  `course_detail` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `course_example` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `rate_id` int NOT NULL,
  `course_seller` int DEFAULT NULL,
  `course_notsell` int NOT NULL,
  `course_certificate` varchar(70) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `type_id` int NOT NULL,
  `requirements` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `suitable_for` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `income` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `30per` varchar(7) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `user_username`, `course_img`, `course_name`, `course_price`, `course_promotion`, `user_promotion`, `course_detail`, `course_example`, `rate_id`, `course_seller`, `course_notsell`, `course_certificate`, `type_id`, `requirements`, `description`, `suitable_for`, `income`, `30per`) VALUES
(40, 'pp', 'images.jpg', 'Introduction to JavaScript', 299.00, NULL, 0, 'พื้นฐานแบบก้าวกระโดดสำหรับ JavaScript', 'https://youtu.be/2FcCuBloC9o', 0, NULL, 0, '', 1, '', 'เรียนรู้ฟรี กับ ภาษาแห่งอนาคต\r\nปฏิเสธไม่ได้ว่าปัจจุบันเทคโนโลยี JavaScript นั้นไปไกลกว่าที่เราคิดไว้มากสามารถสร้างสรรค์งานได้ทั้ง Web App ฝั่ง Front-E', '', '290', '87'),
(41, 'pp', 'html and css.jpg', 'Lite : Fundamental Web Dev with HTML5 &amp; CSS3', 2500.00, NULL, 0, 'เรียนรู้พื้นฐานการสร้างเว็บไซต์ตั้งแต่ต้นด้วย HTML5 และ CSS3', 'https://youtu.be/ZyicuJiLxoc', 0, NULL, 0, '', 1, '', 'การพัฒนาเว็บไซต์ ถือว่าเป็นสิ่งที่จำเป็นที่ทุกธุรกิจต้องมีในปัจจุบัน ทั้งธุรกิจขนาดเล็ก เจ้าของคนเดียว ถึงธุรกิจขนาดใหญ่ เพราะเป็นการเปิดโอกาสให้ผู้คน', '', '0', NULL),
(42, 'pp', '1_f7ztMaMM0etsFHpEfkdiwA.png', 'Introduction to Web App Development with Node.js &amp; Express', 500.00, NULL, 0, 'เริ่มต้นพัฒนาเว็บแอปของคุณด้วย Node.js และ Express', 'https://youtu.be/_cRpE7P9zIY', 0, NULL, 0, '', 1, '', 'หากคุณกำลังอยากเริ่มต้นพัฒนาเว็บแอปพลิเคชันสมัยใหม่\r\n\r\nหากคุณมีพื้นฐานการเขียนโปรแกรมมาบ้างแล้ว แต่ไม่รู้จะต่อยอดยังไง\r\n\r\nหากคุณต้องการเรียนรู้ทักษะด้', '', '0', NULL),
(43, 'pp', 'php_course.png', 'Get Started With PHP', 990.00, NULL, 0, 'หลักสูตรราคาประหยัดเข้าถึงง่ายเรียนพื้นฐานแบบไว ๆ เร็วจนไฟลุก ! จบได้ใน 7 วัน', 'https://youtu.be/CC-d3xJ-UCk', 0, NULL, 0, '', 1, 'HTML CSS ', '', '', '0', NULL),
(44, 'pp', 'sprint_boot.png', 'Java Spring Boot', 250.00, NULL, 0, 'พัฒนาเว็บแอปพลิเคชัน Java เร็วทันใจ', 'https://youtu.be/xSuabBW17cI', 0, NULL, 0, '', 1, 'JAVA', '', '', '0', NULL),
(45, 'Noppon Angchoun', 'GameDevIconCard.png', 'Game Development with Unity', 1290.00, NULL, 0, '', 'https://youtu.be/pqynpfenP3k', 0, NULL, 0, '', 3, '', '', '', '0', NULL),
(46, 'ชลิต', 'oop.png', 'OOP with JavaScript', 1200.00, NULL, 0, 'หลักสูตรนี้ถูกออกแบบมาเพื่อให้ผู้เรียนได้เข้าใจและประยุกต์ใช้หลักการเขียนโปรแกรมเชิงวัตถุ (OOP) ผ่านภาษา JavaScript ซึ่งเป็นหนึ่งในภาษาโปรแกรมมิ่งที่ได้รับความนิยมและมีบทบาทสำคัญในการพัฒนาเว็บแอปพลิเคชั่นในปัจจุบัน. จะช่วยให้ผู้เรียนเข้าใจหลักการของ OOP และสามารถนำไปประยุกต์ใช้ในการพัฒนาโปรแกรมได้อย่างมีประสิทธิภาพ', 'https://youtu.be/WPCCCKjwcQQ?si=C41367_E-z3X0OUR', 0, NULL, 0, '', 2, '', '', '', '0', NULL),
(47, 'Noppon Angchoun', 'unreal_engine.png', 'Game Development with Unreal Engine', 990.00, NULL, 0, 'พื้นฐานสำหรับเริ่มต้นพัฒนาเกมสุดสมจริงด้วย Unreal Engine', 'https://youtu.be/nzQuvFRN_oE', 0, NULL, 0, '', 3, '', 'เริ่มต้นสร้างเกมสุดสมจริงจากพื้นฐาน\r\nGame Development With Unreal Engine\r\nกับพื้นฐานที่สำคัญที่สุดของการสร้างเกมที่ทำให้คุณเข้าใจภาพรวม\r\nและ ขั้นตอนกา', 'ทักษะคณิตศาสตร์เบื้องต้น, ทักษะคอมพิวเตอร์เบื้องต้', '0', NULL),
(48, 'Chalit Thanomnual', 'unity.png', 'Advanced Game Development with Unity', 1590.00, NULL, 0, 'เส้นทางการเป็นนักพัฒนาเกมขั้นสูง', 'https://youtu.be/mrcNc6Vt6oA', 0, NULL, 0, '', 3, 'Basic Programming, OOP', 'เริ่มต้นด้วยแนวคิดที่สำคัญที่สุด\r\nไม่ว่าเราจะอยากพัฒนาเกมในรูปแบบใด พื้นฐานที่ควรมีล้วนเริ่มต้นเหมือนกัน ดังนั้นในหลักสูตรนี้เราจะพาไปรู้จักกับ 3 การท', '', '1590', '477'),
(49, 'chalit', 'test.png\r\n', 'Basic Software Testing\r\n', 3000.00, NULL, 0, 'หลักสูตรพื้นฐานการทดสอบซอฟต์แวร์ ซึ่งจะช่วยให้ผู้เข้าร่วมเข้าใจความสำคัญของการทดสอบในระยะการพัฒนาซอฟต์แวร์ และจะให้ความรู้ทางปฏิบัติเกี่ยวกับประเภทต่าง ๆ ของการทดสอบ, วิธีการทดสอบ, และเครื่องมือการทดสอบ ที่จำเป็นสำหรับคนไอที / นักพัฒนาโปรแกรม', 'https://youtu.be/xSuabBW17cI?si=WjfE-9qr62h2SqX9', 0, NULL, 0, '', 2, '', '', '', '0', NULL),
(50, 'chalitt', 'da.png', 'Design iOS Application with SwiftUI', 1000.00, NULL, 0, 'เข้าใจการออกแบบแอปพลิเคชันบน SwiftUI เครื่องมือใหม่จาก Apple ช่วยให้เราออกแบบ iOS App ได้ง่ายขึ้น พร้อม Workshop สุดพิเศษ ประกอบบทเรียนที่ให้คุณเห็นภาพทุกการเรียนรู้', 'https://youtu.be/CRK9mHNuONE?si=aObKfdook5PczmPc', 0, NULL, 0, '', 2, '', 'เข้าใจการออกแบบแอปพลิเคชันบน SwiftUI เครื่องมือใหม่จาก Apple ช่วยให้เราออกแบบ iOS App ได้ง่ายขึ้น พร้อม Workshop สุดพิเศษ ประกอบบทเรียนที่ให้คุณเห็นภา', '', '0', NULL),
(51, 'Nonthanan Sirikanon', 'unity_1.jpg', 'Complete C# Unity Game Developer 2D', 3490.00, NULL, 0, 'Learn Unity in C# & Code Your First Five 2D Video Games for Web, Mac & PC. The Tutorials Cover Tilemap', 'https://www.youtube.com/watch?v=MBXKV66hXno', 0, NULL, 0, '', 0, 'Mac or PC capable of running Unity 2019 or later.\r\nA passion and willingness to learn how to code', 'This course started as a runaway success on Kickstarter and has gone on to become the most popular and most watched Unity game development course on Udemy. The course has full English closed-captions throughout.\r\n\r\nLearn how to create video games using Unity, the world-leading free-to-use game development tool. We start super simple so you need no prior experience of Unity or coding! With our online tutorials, you\'ll be amazed what you can achieve right from the first moment you start the course. ', 'Competent and confident with using a computer.\r\nSome programming experience helpful, but not required.\r\nArtists who want to learn to bring their assets into games.\r\nComplete beginners who are willing to work hard.\r\nDevelopers who want to re-skill across to game development.', '0', NULL),
(52, 'chaala', 'dogker.png', 'Docker & Container Technology', 999.00, NULL, 0, 'พบกับคอร์สเรียนที่จะพาท่านเข้าสู่โลกของ Docker และ Container Technology อย่างมืออาชีพ!\r\n? สร้าง,จัดการ,และประยุกต์ใช้งาน Containerได้อย่างมั่นใจ เปิดประสบการณ์ใหม่กับการใช้งาน\r\nDockerและวิธีการทำงานร่วมกับTech Stack ต่างๆ!', 'https://youtu.be/FOLyhNrn87g?si=Lk_UtwgKbMz-s3-g', 0, NULL, 0, '', 2, '', '', '', '0', NULL),
(53, 'ไทยพานิชย์', 'blender3.jpg', 'Blender Character Creator for Video Games Design', 2290.00, NULL, 0, 'Model Video Game Characters. Use The Sculpt Tool To Shape, Add Texture, Rig & Animate Video Game Characters', 'https://youtu.be/fxemRnf0xoo', 0, NULL, 0, '', 3, 'You should be able to use a PC at a beginner level.\r\nA 3-button mouse with scroll wheel recommended.\r\n', 'Take your first steps to becoming a 3D character artist - learn everything from modelling to painting to animating the character. The course is the sequel to the highly popular Blender Character Creator course, enjoyed by 10s of thousands of students.\r\n\r\nThis course has been created using Blender 2.83 and is compatible with newer versions of Blender.\r\n\r\nWhether you\'re a beginner or more advanced, the experienced instructors will take you through every step of the process, ensuring that you aren\'t just \"copy and pasting\" what you see, but learning the tools and developing your own creative process as you go.', 'You should want to learn Blender 2.8 - specifically for character creation.\r\nYou may want to learn to rig and animate a character you\'ve already created.\r\nYou have a character that you want to transfer into a game engine.', '0', NULL),
(54, 'conan', 'kub.png', 'Introduction to Kubernetes', 2300.00, NULL, 0, '? รับรู้ความลับของ Kubernetes และการจัดการ Container!\r\n\r\n? พัฒนา, ติดตั้ง, และบำรุงรักษา Kubernetes ด้วยความเชี่ยวชาญ!\r\n\r\n? เรียนรู้การใช้งานร่วมกับ Cloud & Container Technology ด้วยตนเอง!', 'https://youtu.be/xSuabBW17cI?si=2k84mohKn1MEuLZD', 0, NULL, 0, '', 2, '', '', '', '0', NULL),
(55, 'Prayut Monday', 'excel.png', 'Advanced Excel', 0.00, NULL, 0, 'ปลดล็อกพลังของข้อมูลของคุณ', '', 0, NULL, 0, '', 5, 'ไม่ต้องมีความรู้ก็เรียนได้', 'หลักสูตร Advanced Excel นี้ถูกออกแบบมาเพื่อผู้ที่ต้องการเรียนรู้และใช้ Excel ในระดับขั้นสูง จากการจัดการข้อมูล, การวิเคราะห์ข้อมูล, ถึงการสร้าง Dashboard แบบ Dynamic และการใช้ Power Query และ Macro คุณจะได้เรียนรู้ทักษะที่จำเป็นสำหรับการเป็นผู้เชี่ยวชาญใน Excel ในหลักสูตรเดียว', 'ผู้เริ่มต้น', '0', NULL),
(56, 'Chaiyo Maya', 'data.jpg', 'Statistics / Data Analysis in SPSS: Inferential Statistics', 0.00, NULL, 0, 'Increase Your Data Analytic Skills – Highly Valued And Sought After By Employers', 'https://youtu.be/vYa3ak-3p60?list=RDcfA_ZNkvwsU', 0, NULL, 0, '', 5, 'Introduction to statistics course (either currently taking or already have completed) is recommended but not absolutely necessary\r\nAccess to IBM SPSS Statistical software (strongly recommended)', 'This course is great for professionals, as it provides step by step instruction of tests with clear and accurate explanations. Get ahead of the competition and make these tests important parts of your data analytic toolkit!\r\n\r\nStudents will also have the tools needed to succeed in their statistics and experimental design courses.', 'Students seeking help with SPSS, especially how to analyze and interpret the results of statistical analyses\r\nProfessionals desiring to augment their statistical skills\r\nAnyone seeking to increase their data analytic skills', '0', NULL),
(57, 'Panthip Ocha', 'SQL2.png', 'Fundamentals of Database Engineering', 0.00, NULL, 0, 'Learn ACID, Indexing, Partitioning, Sharding, Concurrency control, Replication, DB Engines, Best Practices and More!', '', 0, NULL, 0, '', 5, 'Have worked with databases before but wish to get deeper understanding\r\nBasic SQL knowledge', 'Database Engineering is a very interesting sector in software engineering. If you are interested in learning about database engineering you have come to the right place. I have curated this course carefully to discuss the Fundamental concepts of database engineering.\r\n\r\n', 'Software Engineers and Database Engineers', '0', NULL),
(58, 'Dr.Slump', 'ui.png', 'ROAD TO UX/UI DESIGN BOOTCAMP', 35000.00, NULL, 0, 'เป็นหลักสูตรการเรียนรู้ UX/UI Design แบบเข้มข้น ออกแบบมาสำหรับผู้ที่สนใจเริ่มต้นอาชีพ UX/UI Designer หลักสูตรนี้ครอบคลุมเนื้อหาที่จำเป็นทั้งหมด ตั้งแต่พื้นฐานการออกแบบ UX/UI ไปจนถึงการประยุกต์ใช้จริงในโครงการต่าง ๆ ได้ภายใน 3 เดือนครึ่ง จากผู้เชี่ยวชาญด้าน                                                                                                                             Human Computer Interface และ UX/UI Design ที่มีประสบการณ์ในการสอนมาอย่างยาวนาน\r\nโดยมีเป้าหมายของหลักสูตรคือ “ทำให้คุณสา', 'https://youtu.be/IutJKgcnWng?si=2fzvl-8O9135nY9b', 0, NULL, 0, '', 4, '', '', '', '0', NULL),
(59, 'Robert Na Nakorn', 'word.png', 'The Ultimate Microsoft Word Beginner to Expert Bundle', 0.00, NULL, 0, 'Master Word 2021 and Word 2019 with this great value three-course beginner to advanced bundle!', '', 0, NULL, 0, '', 5, 'Access to Microsoft Word 2021, Word 2019, or Word 365\r\nNo prior knowledge of Word is required', 'Most of us use Microsoft Word, but are we using it effectively?\r\n\r\n\r\n\r\nWe’ve combined our Microsoft Word 2021, Word 2019 Beginners, and Word 2019 Advanced courses to create this amazing value 3-course training bundle. With over 30 hours of Word tutorials, we leave no stone unturned in teaching you everything MS Word offers.\r\n\r\n\r\n\r\nUnlock the power of Word today and master creating and working with documents. We even threw in additional training for you!\r\n\r\n\r\n\r\nThese courses are aimed at Word 2021 and Word 2019 users but are also suitable for Word 365 users.\r\n\r\n', 'Users new to Word 2021 or 2019 and those upgrading from previous software versions\r\nAnyone who wants to be more productive at work and organize their documents\r\nParalegals, Administrators, anyone who uses MS Word a lot', '0', NULL),
(60, 'doramon', 'ad.png', 'Professional Android Development', 1500.00, NULL, 0, 'กับระบบปฏิบัติการที่มีผู้ใช้งานมากที่สุดในโลก เข้าไปอยู่ในทุกอุปกรณ์ที่ไม่ใช่แค่โทรศัพท์มือถือ ทั้งบน Tablet และ อุปกรณ์อัจฉริยะ ทำให้คุณสามารถเปิดโลกอันกว้างใหญ่ของการพัฒนาโปรแกรม ที่เน้นการปฏิบัติจริง ตัวอย่างจริง กับแอปพลิเคชันที่ออกมาจริงๆ ทำให้คุณไม่พลาดโอกาสที่สำคัญสำหรับยุคนี้', 'https://youtu.be/Fzj_UsHjKlE?si=ncbLD2CylzKi4jkT', 0, NULL, 0, '', 4, '', '', '', '0', NULL),
(61, 'อาดัม TV', 'valorant.png', 'วิธีเก็บ Ace วาโร', 0.00, NULL, 0, 'เราแจกวิธีเก็บ Ace วาโรเกมหมาที่เรารักกันน่ะครับ', 'https://youtu.be/Mtc1OnGR9DI', 0, NULL, 0, '', 5, 'มีเกาวาโร\r\nคอมไม่กาก\r\nเน็ตปิง 0', 'ไม่มี', 'วัยรุ่นวาโร', '0', NULL),
(62, 'nobita', 'pb.png', 'Master of Python Bootcamp', 3400.00, NULL, 0, 'คอร์สเรียนที่จะทำให้คุณได้เข้าใจกระบวนการคิดการพัฒนาโปรแกรมตั้งแต่เริ่มต้น จนเข้าใจ และ พัฒนาโปรแกรมด้วย Python จนไปถึงภาษาโปรแกรมอื่น ๆ ได้ด้วยตัวเอง นี่คือคอร์สที่เริ่มต้นตั้งแต่ปูพื้นฐานจนสามารถสร้างสรรค์ผลงานที่ใช้ได้จริงในระดับองค์กร', 'https://youtu.be/VXRGoL1izdA?si=wo87u2FqtvxuN_Ni', 0, NULL, 0, '', 4, '', '', '', '0', NULL),
(63, 'Mr.Jang ', 'pe.png', 'Programming for Everyone', 2300.00, NULL, 0, 'Programming For Everyone\r\nเพราะการพัฒนาโปรแกรมสำคัญสำหรับทุกวัย\r\nสนุกกับการเรียน เติมแต่งจินตนาการ “พัฒนาโปรแกรมแรกด้วย Java Script”\r\nคอร์สเรียนเดียวที่เหมาะสำหรับทุกเพศทุกวัย พร้อมปฏิบัติจริง ทุกที่ ทุกเวลา !', 'https://youtu.be/VXRGoL1izdA?si=bye-AbemgOaVf-n0', 0, NULL, 0, '', 4, '', '', '', '0', NULL),
(64, 'Ms.Game ZAZA', 'wa.png', 'Web Application Development With Python & Flask', 550.00, NULL, 0, 'ที่ครบเครื่อง และ จัดเต็มสำหรับผู้ที่มีพื้นฐานการเขียนโปรแกรม\r\nอย่างน้อย 1 ภาษา ให้คุณได้ลองสร้างเว็บแอปที่ทำงานได้จริง\r\nไม่ว่าจะต่อยอดเป็น Ecommerce หรือ งานอื่น ๆ ก็สามารถทำได้ !', 'https://youtu.be/Ar_yWclabz4?si=9O78tRFZXxMoCcfn', 0, NULL, 0, '', 4, '', '', '', '0', NULL),
(65, 'pp', 'math.jpg', 'Math For Video Games: The Fastest Way To Get Smarter At Math', 1790.00, NULL, 0, 'Learn Math for Video Game Design & Coding through Solving fun Video Game Problems', '', 0, NULL, 0, '', 3, 'Pen & paper or digital equivalent\r\nInternet access for quizzes and reference\r\nNO math skills required', 'Maths and video games go hand-in-hand. Video games are a practical, challenging, and fun way to sharpen your math skills. What\'s more, video games are like living math. From graphics and physics, to AI and movement, games are full of math.', 'Game developers of any level who want strong math foundations\r\nNon game-developers who want to learn math the fun way\r\nThose competent in math who want to hone their skills', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_content`
--

CREATE TABLE `course_content` (
  `course_content_id` int NOT NULL,
  `type_content_id` int NOT NULL,
  `display_order` int NOT NULL,
  `course_content_name` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `course_id` int NOT NULL,
  `link_content` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_content`
--

INSERT INTO `course_content` (`course_content_id`, `type_content_id`, `display_order`, `course_content_name`, `course_id`, `link_content`) VALUES
(1, 1, 1, 'PHP แบบไว ๆ ใน 3 นาที', 2, 'https://www.youtube.com/watch?v=IFhboIz8Ap4'),
(2, 1, 2, 'มัดรวมให้แล้ว ! 14 คำสั่ง PHP ', 2, 'https://youtu.be/-r7dyqvXcEI'),
(3, 2, 1, 'การติดตั้ง XAMPP บน Windows', 2, 'https://youtu.be/jvMwiQDtk9k'),
(4, 3, 1, 'บทที่ 1 : สอน PHP จัดการฐานข้อมูลด้วย My sql', 2, 'https://youtu.be/K3XYF7-gDG8'),
(5, 3, 2, 'บทที่ 2 : สอน PHP ทำระบบ Register + Login', 2, 'https://youtu.be/yZrp8RpWVXU'),
(6, 1, 1, 'ทำความรู้จัก Figma', 3, 'https://youtu.be/oUv-dtdWjMU'),
(7, 2, 1, 'How to สมัครใช้งาน Figma', 3, 'https://youtu.be/R-xMBCZiuBM'),
(8, 3, 1, 'รวม บทที่1-21 : การใช้งานโปรแกรม Figma เนื้อหาเต็ม 21 บท ', 3, 'https://youtu.be/wfyKQfVYkZE');

-- --------------------------------------------------------

--
-- Table structure for table `notify`
--

CREATE TABLE `notify` (
  `notify_id` int NOT NULL,
  `notify_topic` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `notify_detail` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notify`
--

INSERT INTO `notify` (`notify_id`, `notify_topic`, `notify_detail`) VALUES
(1, 'แจ้งเตือนปิดปรับปรุง ครั้ง1', 'ปัดปรับปรุงฟหกฟหกฟหกฟหกฟหก'),
(2, 'แจ้งเตือนปิดปรับปรุง ครั้ง2', 'ฟหกฟหกฟหกผปแผปแผปแผปแฟไำๆำไๆไำๆไ');

-- --------------------------------------------------------

--
-- Table structure for table `payment_status`
--

CREATE TABLE `payment_status` (
  `payment_status_id` int NOT NULL,
  `payment_status_name` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_status`
--

INSERT INTO `payment_status` (`payment_status_id`, `payment_status_name`) VALUES
(1, 'รอชำระเงิน'),
(2, 'รอยืนยันจากผู้ขาย'),
(3, 'ชำระเงินเรียนร้อย');

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `rate_id` int NOT NULL,
  `course_id` int NOT NULL,
  `total_score` varchar(7) COLLATE utf8mb4_general_ci NOT NULL,
  `user_voting` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `average_score` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`rate_id`, `course_id`, `total_score`, `user_voting`, `average_score`) VALUES
(1, 2, '4', '1', 4),
(2, 3, '3', '1', 3);

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `sale_id` int NOT NULL,
  `user_id` int NOT NULL,
  `course_id` int NOT NULL,
  `sale_paid` varchar(7) COLLATE utf8mb4_general_ci NOT NULL,
  `insert_img` int NOT NULL,
  `name_img` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `review` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `rate` varchar(1) COLLATE utf8mb4_general_ci NOT NULL,
  `finished_studying` int NOT NULL,
  `name_in_certificate` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `payment_status_id` int NOT NULL,
  `type_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`sale_id`, `user_id`, `course_id`, `sale_paid`, `insert_img`, `name_img`, `review`, `rate`, `finished_studying`, `name_in_certificate`, `payment_status_id`, `type_id`) VALUES
(1, 1, 40, '290', 1, 'slipbanking.png', 'ดีมากๆเลยงับ รู้เรื่องมากเลย', '4', 1, 'นาย นนทก ที่ล้างเท้านางสีดา', 3, 1),
(2, 2, 48, '1590', 1, 'slipbanking2.png', 'ดีคร้าบบบ แต่สอนยาวไปหน่อย รวมไฟล์ด้วยเลยแยกเรียนไม่ค่อยสะดวก', '3', 1, 'นาง สีดา พยานาคราช', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int NOT NULL,
  `status_name` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_name`) VALUES
(1, 'ผู้ดูแลระบบ'),
(2, 'คนขายคอร์ส'),
(3, 'ผู้ใช้งานทั่วไป'),
(4, 'เมทเทอร์');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int NOT NULL,
  `type_name` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `type_name`) VALUES
(1, 'Web Developer'),
(2, 'Softtware Developer'),
(3, 'Game Developer'),
(4, 'UX/UI Design'),
(5, 'Free Course'),
(6, 'Data Analytics');

-- --------------------------------------------------------

--
-- Table structure for table `type_course_content`
--

CREATE TABLE `type_course_content` (
  `type_content_id` int NOT NULL,
  `type_content_name` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `type_course_content`
--

INSERT INTO `type_course_content` (`type_content_id`, `type_content_name`) VALUES
(1, 'บทนำ'),
(2, 'ติดตั้งเครื่องมือพื้นฐาน'),
(3, 'เนื้อหา');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int NOT NULL,
  `profile` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `user_username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `user_password` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `user_fullname` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `user_email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `user_address` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tel` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `img_banking` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `number_banking` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status_id` int NOT NULL,
  `occupation` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `detail` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `profile`, `user_username`, `user_password`, `user_fullname`, `user_email`, `user_address`, `tel`, `img_banking`, `number_banking`, `status_id`, `occupation`, `detail`) VALUES
(1, 'profile-user.png', 'user', '1234', 'Test User', 'Test@email.com', '31 หมู่ 6 ต.มะขามเตี้ย อ.เมือง จ.สุราษฎร์ธานี 84000', '0884566211', NULL, NULL, 3, NULL, NULL),
(2, 'profile-user.png', 'test', '1234', 'User TestNo.2', 'Test2@email.com', '75 หมู่ 8 ต.มะขามเตี้ย อ.เมือง จ.สุราษฎร์ธานี 84100', '0996322588', NULL, NULL, 3, NULL, NULL),
(3, 'profile-user.png', 'pp', '1234', 'Nonthanan Sirikanon', '6540011027@email.psu.ac.th', '93/7, ถ.กระโรม, ต.โพธิ์เสด็จ อ.เมือง จ.นครศรีธรรมราช, 80000', '0884565877', NULL, NULL, 1, NULL, NULL),
(4, 'profile-user.png', 'adam', '1234', 'Adam Awae ', '6540011053@email.psu.ac.th', '637-639 Vongsawang Road Bangsue,Bangsu,Bangkok,10800', '0845688210', NULL, NULL, 1, NULL, NULL),
(5, 'profile-user.png', 'game', '1234', 'Nanthawat Nurod', '6540011030@email.psu.ac.th', '3 Soi Chidlom Ploenchit Road Lumpini Pathumwan,Pathumwan,Bangkok 10330', '0990211744', NULL, NULL, 1, NULL, NULL),
(6, 'profile-user.png', 'jang222', '1234', 'noppon angchoun', '6540011028@email.psu.ac.th', '23th FL, Thai CC, Bldg.,Yannawa,Bangkok 10120', '0641379818', NULL, NULL, 1, NULL, NULL),
(7, 'profile-user.png', 'new', '1234', 'ชลิต ถนอมนวล', '6540011010@email.psu.ac.th', '3/43 Moo 10 Nongpo,Nong Khae,Saraburi 18140', '0987744123', NULL, NULL, 1, NULL, NULL),
(8, 'profile-user.png', 'peat', '1234', 'Peat NaJa', '6540011063@email.psu.ac.th', '454 Charansanitwong Road, Bang-O, Bang Phlat, Bangkok 10700', '0996335789', NULL, NULL, 1, NULL, NULL),
(9, 'profile-user.png', 'sell1', '1234', 'Test Sell1', 'Sell@email.com', '73/88 Krungthep-Nonth Bang Kaen Mueang, Nonthaburi 11000', '0823211562', 'slip1.png', '123-456-7890', 2, 'พนักงานราชการ', 'มีประสบการณ์การทำงานมากกว่า บลาๆ'),
(10, 'profile-user.png', 'sell2', '1234', 'Sell2 Test', 'Sell2@email.com', '367 Sukothai Suan Chitlada Dusit, Dusit, Bangkok 10300', '0823655232', 'slip2.png', '321-654-9870', 2, 'Dev.', 'นักพัฒนนาระบบระดับโลก บลาๆ'),
(11, 'profile-user.png', 'ADAM1', '$2y$10$vEOgyf/V87KjQ', 'ADAM HUAK', 'NAMEADAMAWAE@GMAIL.COM', '55/55', '000000000', NULL, NULL, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `will_be_learned`
--

CREATE TABLE `will_be_learned` (
  `will_be_learned_id` int NOT NULL,
  `course_id` int NOT NULL,
  `detail` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `will_be_learned`
--

INSERT INTO `will_be_learned` (`will_be_learned_id`, `course_id`, `detail`) VALUES
(1, 2, 'เรียนรู้พื้นฐานการใช้งาน React'),
(2, 2, 'เรียนรู้การใช้งาน States & Props ใน React'),
(3, 2, 'เข้าใจหลักการแชร์ข้อมูล ใน React ด้วย Context'),
(4, 2, 'จัดการ URL ด้วย React Router V6 (Routing)'),
(5, 3, 'How to begin working as a UX Designer using Figma.'),
(6, 3, 'How to make fully interactive prototypes.'),
(7, 3, 'How to work with a UX personas.'),
(8, 3, 'You will be able to add UX designer to your CV.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`basket_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_content`
--
ALTER TABLE `course_content`
  ADD PRIMARY KEY (`course_content_id`),
  ADD KEY `type_con` (`type_content_id`);

--
-- Indexes for table `notify`
--
ALTER TABLE `notify`
  ADD PRIMARY KEY (`notify_id`);

--
-- Indexes for table `payment_status`
--
ALTER TABLE `payment_status`
  ADD PRIMARY KEY (`payment_status_id`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `type_course_content`
--
ALTER TABLE `type_course_content`
  ADD PRIMARY KEY (`type_content_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `status` (`status_id`);

--
-- Indexes for table `will_be_learned`
--
ALTER TABLE `will_be_learned`
  ADD PRIMARY KEY (`will_be_learned_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basket`
--
ALTER TABLE `basket`
  MODIFY `basket_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `course_content`
--
ALTER TABLE `course_content`
  MODIFY `course_content_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notify`
--
ALTER TABLE `notify`
  MODIFY `notify_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_status`
--
ALTER TABLE `payment_status`
  MODIFY `payment_status_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `rate_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `sale_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `type_course_content`
--
ALTER TABLE `type_course_content`
  MODIFY `type_content_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `will_be_learned`
--
ALTER TABLE `will_be_learned`
  MODIFY `will_be_learned_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `course_content`
--
ALTER TABLE `course_content`
  ADD CONSTRAINT `type_con` FOREIGN KEY (`type_content_id`) REFERENCES `type_course_content` (`type_content_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `status` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
