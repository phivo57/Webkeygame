--
-- Table structure for table `token_key`
--

CREATE TABLE `token_key` (
  `rid` int(11) NOT NULL,
  `token` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `timp` varchar(11) NOT NULL,
  `valid` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `role` varchar(100) NOT NULL,
  `data_log` varchar(60) NOT NULL,
  `valid` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `data_log`, `valid`) VALUES
(0, 'admin@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', '', 1);


--
-- Indexes for dumped tables
--

--
-- Indexes for table `token_key`
--
ALTER TABLE `token_key`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `token_key`
--
ALTER TABLE `token_key`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
