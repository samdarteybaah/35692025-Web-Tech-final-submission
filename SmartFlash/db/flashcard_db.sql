-- Database: `flashcard_db`
CREATE DATABASE IF NOT EXISTS flashcard_db;

-- --------------------------------------------------------
--
-- Table structure for table `People`
--
CREATE TABLE `People` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  PRIMARY KEY (`pid`)
);

-- --------------------------------------------------------
--
-- Table structure for table `FlashcardSets`
--
CREATE TABLE `FlashcardSet` (
  `flashcardsetid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`flashcardsetid`),
  KEY `userid` (`userid`),
  CONSTRAINT `flashcardset_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `People` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE
);

-- --------------------------------------------------------
--
-- Table structure for table `Flashcard`
--
CREATE TABLE `Flashcard` (
  `flashcardid` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `flashcardsetid` int(11) NOT NULL,
  PRIMARY KEY (`flashcardid`),
  KEY `flashcardsetid` (`flashcardsetid`),
  CONSTRAINT `flashcard_ibfk_1` FOREIGN KEY (`flashcardsetid`) REFERENCES `FlashcardSet` (`flashcardsetid`) ON DELETE CASCADE ON UPDATE CASCADE
);


-- Indexes for table `Flashcard`
--
ALTER TABLE `Flashcard` ADD INDEX `flashcardsetid_index` (`flashcardsetid`);
