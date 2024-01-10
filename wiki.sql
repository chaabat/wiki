
-- Database: `wiki`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `categorieID` int(11) NOT NULL,
  `nomCategorie` varchar(255) NOT NULL,
  `dateCategorie` datetime NOT NULL
) ;



-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tagID` int(11) NOT NULL,
  `nomTag` varchar(255) NOT NULL
);



-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(10) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL
) ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `nom`, `prenom`, `email`, `pass`, `tel`, `role`) VALUES
(9, 'AYOUB', 'ddd', 'smilemoreinfo@gmail.com', '$2y$10$wdiHvj.QsyPJuSH7jENpg.K4aYSS6YZsFQr7Ga4RTKm79JlVRpnIW', '0655778022', 'admin'),
(10, 'AYOUB', 'aaa', 's@s.s', '$2y$10$GWArZ7fBx689b.O.Uj3F6utBH5qXyEUZ23aOnZA6ygt8FtT0qPEmu', '0655778022', 'auteur'),
(11, 'ddd', 'ddd', 'dd@d.d', '$2y$10$APVq0D48Q0T0Ka7RL7JbNOMR8D7fuvdVD2HhadS.SAEdN.kniAZAK', '5555555555', 'auteur');

-- --------------------------------------------------------

--
-- Table structure for table `wiki`
--

CREATE TABLE `wiki` (
  `wikiID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creationDate` datetime NOT NULL,
  `archive` int(11) DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL,
  `categorieID` int(11) DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `wikitag`
--

CREATE TABLE `wikitag` (
  `wikiID` int(11) NOT NULL,
  `tagID` int(11) NOT NULL
);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`categorieID`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tagID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `wiki`
--
ALTER TABLE `wiki`
  ADD PRIMARY KEY (`wikiID`),
  ADD KEY `iduser` (`iduser`),
  ADD KEY `categorieID` (`categorieID`);

--
-- Indexes for table `wikitag`
--
ALTER TABLE `wikitag`
  ADD PRIMARY KEY (`wikiID`,`tagID`),
  ADD KEY `tagID` (`tagID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `categorieID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tagID` int(11) NOT NULL AUTO_INCREMENT ;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(10) NOT NULL AUTO_INCREMENT ;

--
-- AUTO_INCREMENT for table `wiki`
--
ALTER TABLE `wiki`
  MODIFY `wikiID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `wiki`
--
ALTER TABLE `wiki`
  ADD CONSTRAINT `wiki_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wiki_ibfk_2` FOREIGN KEY (`categorieID`) REFERENCES `categorie` (`categorieID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wikitag`
--
ALTER TABLE `wikitag`
  ADD CONSTRAINT `wikitag_ibfk_1` FOREIGN KEY (`wikiID`) REFERENCES `wiki` (`wikiID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wikitag_ibfk_2` FOREIGN KEY (`tagID`) REFERENCES `tags` (`tagID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;


