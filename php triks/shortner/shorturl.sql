CREATE TABLE IF NOT EXISTS `shorturl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(255) NOT NULL,
  `short_link` varchar(50) NOT NULL,
  `txt` varchar(50) NOT NULL,
  `hit_count` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `shorturl`
--

INSERT INTO `shorturl` (`id`, `link`, `short_link`, `txt`, `hit_count`, `status`) VALUES
(6, 'https://timesofindia.indiatimes.com/tv/news/hindi/ekta-kapoor-bids-adieu-to-yeh-hai-mohabbatein-in-style-drops-hints-about-her-new-project-with-divyanka-tripathi-and-karan-patel/articleshow/72422690.cms', 'ekta', 'ekta', 0, 1);