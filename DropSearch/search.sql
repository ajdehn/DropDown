


CREATE TABLE IF NOT EXISTS `search` (

	`ID` int(10) NOT NULL AUTO_INCREMENT,

	`Searchtitle` varchar(50) NOT NULL,
  
	`Searchlink` varchar(50) NOT NULL,
  
	PRIMARY KEY (`ID`)

);





INSERT INTO `search` (`ID`, `Searchtitle`, `Searchlink`) VALUES
(
	1, 'Google', 'www.google.com'),
	(2, 'Youtube', 'www.youtube.com'),

	(3, 'Facebook', 'www.facebook.com'),

	(4, 'Yahoo', 'www.yahoo.com'),

	(5, 'Amazon', 'www.amazon.com'),

	(6, 'Twitter', 'www.twitter.com'
);

