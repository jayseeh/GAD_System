

CREATE TABLE `caps` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT '',
  `firstname` varchar(255) DEFAULT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `userlevel` varchar(255) DEFAULT '',
  `status` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4;


INSERT INTO caps VALUES
("1","Jorge","jojo","Ojascastro","Jorge","Valdez","Regional GAD Coordinator","ACTIVE"),
("2","Leo","ole","Lana","Leo","Andrew","Division GAD Coordinator","ACTIVE"),
("3","admin","admin","","","","Admin","ACTIVE"),
("21","Kobe","24","Bryant","Kobe","Bean","Division GAD Coordinator","ACTIVE"),
("23","Lebron","23","James","Lebron","lele","Regional GAD Coordinator","ACTIVE"),
("24","Ja","14","Morant","JA","Jajaja","Division GAD Coordinator","ACTIVE"),
("40","Rowel","roro","Dagooc","Rowel","Dags","Division GAD Coordinator","ACTIVE"),
("41","kilit","saddfa","adadasd","asda","asdad","Division GAD Coordinator","ACTIVE"),
("42","desu","sdgfsdf","asdafs","asdsf","dsgfsdf","Division GAD Coordinator","ACTIVE"),
("52","kilit","kiki","Toquero","Karylle","Valdez","Regional GAD Coordinator","ACTIVE");




CREATE TABLE `mandate` (
  `depedno` int(250) NOT NULL,
  `depedcontent` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`depedno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO mandate VALUES
("1","GAD Issue 3"),
("45647","sdagsvasdf"),
("45754","GAD Issue 2");




CREATE TABLE `template` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `filename` varchar(500) CHARACTER SET cp1256 DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;


INSERT INTO template VALUES
("6","2020-Consolidated-SDOs.xlsx"),
("7","2020-GAR-AR-Regional-Office-Proper-and-Consolidated-SDOs.xlsx");


