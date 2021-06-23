CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `page` (`id`, `title`) VALUES
(1, 'Record 1'),
(2, 'Record 2'),
(3, 'Record 3'),
(4, 'Record 4'),
(5, 'Record 5'),
(6, 'Record 6'),
(7, 'Record 7'),
(8, 'Record 8'),
(9, 'Record 9'),
(10, 'Record 10'),
(11, 'Record 11'),
(12, 'Record 12'),
(13, 'Record 13'),
(14, 'Record 14'),
(15, 'Record 15'),
(16, 'Record 16'),
(17, 'Record 17'),
(18, 'Record 18'),
(19, 'Record 19'),
(20, 'Record 20'),
(21, 'Record 21');

ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;