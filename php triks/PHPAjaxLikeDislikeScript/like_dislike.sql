CREATE TABLE IF NOT EXISTS `like_dislike` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post` varchar(500) NOT NULL,
  `like_count` int(11) NOT NULL,
  `dislike_count` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `like_dislike`
--

INSERT INTO `like_dislike` (`id`, `post`, `like_count`, `dislike_count`) VALUES
(1, 'Post1', 5, 5),
(2, 'Post2', 36, 19),
(3, 'Post3', 13, 11),
(4, 'Post4', 0, 0);