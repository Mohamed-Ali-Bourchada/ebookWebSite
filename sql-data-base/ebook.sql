-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2024 at 04:23 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id_book` int(11) NOT NULL,
  `title_book` varchar(255) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `writer` varchar(255) NOT NULL,
  `file_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id_book`, `title_book`, `image_url`, `writer`, `file_url`) VALUES
(1, '5 Passive Income Business You Can Start Today', 'assets/books_images/5_Passive_Income_Business_You_Can_Start_Today.png', 'Md Osman Gani Khan', 'assets/pdfs_files/5-passive-income-business-you-can-start-today.pdf'),
(2, '7 Secrets To Achieving Personal Freedom', 'assets/books_images/7_Secrets_To_Achieving_Personal_Freedom.png', ' Med\'s PersonalFreedom Publishing', 'assets/pdfs_files/7-secrets-to-achieving-personal-freedom.pdf'),
(3, '15 Questions About Native Advertising', 'assets/books_images/15_Questions_About_Native_Advertising.jpg', 'Massimo Moruzzi', 'assets/pdfs_files/15-questions-about-native-advertising.pdf'),
(4, 'Addiction To Nutrition', 'assets/books_images/Addiction_To_Nutrition.png', 'Adele straws', 'assets/pdfs_files/addiction-to-nutrition.pdf'),
(5, 'Advances In Quantitative AnalysisOfFinance And Accounting', 'assets/books_images/Advances_In_Quantitative_AnalysisOfFinance_And_Accounting.jpg', 'Cheng F Lee', 'assets/pdfs_files/advances-in-quantitative-analysis-of-finance-and-accounting-advances-in-quantitative-analysis-of-finance.pdf'),
(6, 'Alleem Sustainable Development Goals', 'assets/books_images/Alleem_Sustainable_Development_Goals.jpg', 'Dr Rashid Alleem', 'assets/pdfs_files/alleem-sustainable-development-goals.pdf'),
(7, 'Beginning Programming For Dummies 3rd', 'assets/books_images/Beginning_Programming_For_Dummies_3rd.jpg', 'Wallace Wang', 'assets/pdfs_files/beginning-programming-for-dummies-3rd.pdf'),
(8, 'Behavioural Economics And Finance', 'assets/books_images/Behavioural_Economics_And_Finance.jpg', 'Michelle Baddeley', 'assets/pdfs_files/behavioural-economics-and-finance.pdf'),
(9, 'Business Plan Development Guide', 'assets/books_images/Business_Plan_Development_Guide.jpg', 'Lee A. Swanson', 'assets/pdfs_files/business-plan-development-guide.pdf'),
(10, 'Cash For Blogging Part 1', 'assets/books_images/Cash_For_Blogging_Part_1.png', 'JettDigitals Publication Services', 'assets/pdfs_files/cash-for-blogging.pdf'),
(11, 'Financial terms dictionary', 'assets/books_images/financial_terms_dictionary.jpeg', 'Thomas Herold', 'assets/pdfs_files/financial-terms-dictionary-100-most-popular-financial-terms-explained.pdf'),
(12, 'Forex Trading Manuel', 'assets/books_images/Forex_Trading_Manuel.jpeg', 'Javier Paz', 'assets/pdfs_files/forex-trading-manuel.pdf'),
(13, 'Fostering Creativity And Innovation', 'assets/books_images/Fostering_Creativity_And_Innovation.jpg', 'Dr.Rashid Alleem', 'assets/pdfs_files/fostering-creativity-and-innovation.pdf'),
(14, 'Frequently Asked Questions In Quantitative Finance', 'assets/books_images/Frequently_Asked_Questions_In_Quantitative_Finance.jpg', 'Paul Wilmott', 'assets/pdfs_files/frequently-asked-questions-in-quantitative-finance.pdf'),
(15, 'Government Finance Statistics Manual2014', 'assets/books_images/Government_Finance_Statistics_Manual2014.jpg', 'Mrs.Sage De Clerck, Tobias Wickens', 'assets/pdfs_files/government-finance-statistics-manual-2014.pdf'),
(16, 'Health Insurance Basic Actuarial Models', 'assets/books_images/Health_Insurance_Basic_Actuarial_Models.jpg', 'Ermanno Pitacco', 'assets/pdfs_files/health-insurance-basic-actuarial-models.pdf'),
(17, 'How To Write A Business Plan ', 'assets/books_images/How_To_Write_A_Business_Plan.jpg', 'Mike Mckeever', 'assets/pdfs_files/how-to-write-a-business-plan.pdf'),
(18, 'International Insurance', 'assets/books_images/International_Insurance.jpg', 'Insurance Information Institute', 'assets/pdfs_files/international-insurance.pdf'),
(19, 'Internet Marketing Rockstar Blueprint', 'assets/books_images/Internet_Marketing_Rockstar_Blueprint.png', 'Liz Tomey', 'assets/pdfs_files/internet-marketing-rockstar-blueprint.pdf'),
(20, 'Inventing a simple guide for beginners', 'assets/books_images/inventing.jpg', 'Glen K.Dash', 'assets/pdfs_files/inventing-a-simple-guide-for-beginners.pdf'),
(21, 'New perspectives on web design', 'assets/books_images/NEW_PERSPECTIVES_ON_WEB_DESIGN.jpg', 'Harry Roberts', 'assets/pdfs_files/new-perspectives-on-web-design.pdf'),
(22, 'RISK MANAGEMENT Dentists Insurance', 'assets/books_images/RISK_MANAGEMENT-Dentists_Insurance.jpg', 'Martina Horn', 'assets/pdfs_files/risk-management-dentists-insurance.pdf'),
(23, 'Shares That Grow', 'assets/books_images/Shares_That_Grow.jpg', 'Kevin A.O Brien', 'assets/pdfs_files/shares-that-grow.pdf'),
(24, 'The Clockwork Course', 'assets/books_images/The_Clockwork_Course.jpg', 'WANDA HARPER', 'assets/pdfs_files/the-clockwork-course.pdf'),
(25, 'The Internet Ideology', 'assets/books_images/The_Internet_Ideology.jpg', 'Massimo Moruzzi', 'assets/pdfs_files/the-internet-ideology-from-a-as-in-advertising-to-z-as-in-zipcar.pdf'),
(26, 'the science of getting rich', 'assets/books_images/the_science_of_getting_rich.jpeg', 'Wallace D. Wattles', 'assets/pdfs_files/the-science-of-getting-rich.pdf'),
(27, 'The SEWA Project Management Model', 'assets/books_images/The_SEWA_Project_Management_Model.jpg', 'Dr Rashid Alleem', 'assets/pdfs_files/the-sewa-project-management-model.pdf'),
(28, 'The Valuation Of Financia Companies', 'assets/books_images/The_Valuation_Of_Financia_Companies.jpg', 'Mario Massari,Gianfranco Gianfrate,Laura Zanetti', 'assets/pdfs_files/the-valuation-of-financial-companies.pdf'),
(29, 'The White Coat Investor', 'assets/books_images/The_White_Coat_Investor.jpg', 'James M. Dahle,MD', 'assets/pdfs_files/the-white-coat-investor.pdf'),
(30, 'Understanding Cooperative Societies Law', 'assets/books_images/Understanding_Cooperative_Societies_Law.jpg', 'Eluid Kitime', 'assets/pdfs_files/understanding-cooperative-societies-law-student-s-handbook.pdf'),
(31, 'You Are What You Eat', 'assets/books_images/You_Are_What_You_Eat.png', 'James B. Driscoll', 'assets/pdfs_files/you-are-what-you-eat.pdf'),
(32, 'The Psychology Of Motivation', 'assets/books_images/the-psychology-of-motivation.pdf.jpg', ' Richard Brown', 'assets/pdfs_files/the-psychology-of-motivation.pdf'),
(33, 'Business Analysis Methodology Book', 'assets/books_images/business-analysis-methodology-book.png', 'Emrah Yayici', 'assets/pdfs_files/business-analysis-methodology-book.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `insertion_date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` char(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `date_of_birth`, `email`, `password`, `gender`, `created_at`) VALUES
(1, 'bourchada mohamed ali', '2003-05-27', 'mohamedbourchada123@gmail.com', '$2y$10$lPljnYO0z/XLKvY94F9F5Oxz8q7em0ysSUy6q5Rs62hqJRkpR6HNS', 'M', '2024-05-24 14:14:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id_book`),
  ADD UNIQUE KEY `title_book` (`title_book`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id_book` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `fk_user_messages` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
