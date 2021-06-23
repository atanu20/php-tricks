CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `city`, `email`) VALUES
(1, 'Sumit Gupta', 'Mumbai', 'sumit@gmail.com'),
(2, 'Vishal Gupta', 'Delhi', 'vishal@gmail.com'),
(3, 'Amit Gupta', 'Delhi', 'amit@gmail.com'),
(4, 'Bhaavit Gupta', 'Noida', 'bhaavit@gmail.com'),
(5, 'Namit Gupta', 'Pune', 'namit@gmail.com');
