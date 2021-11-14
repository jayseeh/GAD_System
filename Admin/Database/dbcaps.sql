

CREATE TABLE `attendees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) DEFAULT NULL,
  `position` varchar(500) DEFAULT NULL,
  `gender` varchar(500) DEFAULT NULL,
  `division` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;


INSERT INTO attendees VALUES
("17","Kobe","Principal","male","Ilocos Norte"),
("18","Vannessa","Master Teacher II","female","Ilocos Norte"),
("19","Leobron","Master Teacher I","male","Ilocos Norte"),
("20","Jorge","Principal","Male","Ilocos Norte"),
("21","Rowel","Master Teacher II","Male","Ilocos Norte"),
("22","Maricris","Teacher I","Female","Ilocos Norte"),
("23","Mark","Teacher I","Male","Ilocos Norte"),
("24","Leona","Administrative Assistant I","Female","Ilocos Norte"),
("25","Ako","Principal","male","San Fernando City"),
("26","Ikaw","Master Teacher II","female","San Fernando City"),
("27","Ako ulit","Master Teacher I","male","San Fernando City");




CREATE TABLE `caps` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT '',
  `firstname` varchar(255) DEFAULT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `userlevel` varchar(255) DEFAULT '',
  `location` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=utf8mb4;


INSERT INTO caps VALUES
("1","Jorge","jojo","Ojascastro","Jorge","Valdez","Regional GAD Coordinator","Region 1","ACTIVE"),
("3","admin","admin","","","","Admin","","ACTIVE"),
("70","Rowel","roro","Dagooc","Rowel","Row","Division GAD Coordinator","San Fernando City","ACTIVE"),
("72","sdaa","adf","asdf","asdf","asdf","Division GAD Coordinator","Pangasinan I","ACTIVE"),
("73","gtferty","wert","wertwe","retw","wretwe","Regional GAD Coordinator","Region 1","ACTIVE"),
("74","sfds","asdf","asdf","gfh","fghf","Division GAD Coordinator","Dagupan City","ACTIVE"),
("75","sdfas","dfaf","dfasf","dfas","dfa","Division GAD Coordinator","Ilocos Sur","ACTIVE"),
("76","safsadf","asdfa","adfadsf","asdff","asdfdsf","Division GAD Coordinator","Vigan City","ACTIVE"),
("79","kiki","fdsd","dsfasf","dsfas","asdf","Division GAD Coordinator","San Carlos City","ACTIVE"),
("80","koko","asd","asf","fdg","dfg","Division GAD Coordinator","Candon City","ACTIVE"),
("82","fudge","ert","rey","ery","tyui","Division GAD Coordinator","Alaminos City","ACTIVE"),
("84","albert","albert","albert","albert","albert","Division GAD Coordinator","La Union","ACTIVE"),
("155","wqer","ewrt","wert","wert","wert","Division GAD Coordinator","Laoag City","ACTIVE"),
("156","Leo","leo","Lana","Leo","Andrew","Division GAD Coordinator","Pangasinan II","ACTIVE");




CREATE TABLE `division` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `division` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4;


INSERT INTO division VALUES
("1","Ilocos Norte"),
("2","Ilocos Sur"),
("3","La Union"),
("4","Pangasinan I"),
("5","Pangasinan II"),
("6","Alaminos City"),
("7","Batac City"),
("8","Candon City"),
("9","Dagupan City"),
("10","Laoag City"),
("11","San Carlos City"),
("12","San Fernando City"),
("13","Urdaneta City"),
("14","Vigan City");




CREATE TABLE `gad_form` (
  `form_number` varchar(20) NOT NULL,
  `requestor_id` varchar(100) DEFAULT NULL,
  `form_status` varchar(100) DEFAULT NULL,
  `approver_id` varchar(100) DEFAULT NULL,
  `date_approved` varchar(100) DEFAULT NULL,
  `date_submitted` varchar(100) DEFAULT NULL,
  `remarks` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`form_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO gad_form VALUES
("GAD-1635921260389","156","DISAPPROVED","1","2021-11-12 13-14-51","2021-11-03 14-34-20",""),
("GAD-1635921348063","156","APPROVED","1","2021-11-03 16-10-05","2021-11-03 14-35-47",""),
("GAD-1635921409333","156","ACTION REQUIRED","1","2021-11-12 13-15-59","2021-11-03 14-36-49","goods"),
("GPB-1635920630821","156","APPROVED","1","2021-11-03 14-38-59","2021-11-03 14-23-50",""),
("GPB-1635920679422","156","APPROVED","1","2021-11-06 18-45-25","2021-11-03 14-24-39",""),
("GPB-1635920693622","156","ACTION REQUIRED","1","2021-11-03 14-46-20","2021-11-03 14-24-53",""),
("GPB-1635921290845","156","DISAPPROVED","1","2021-11-03 14-48-59","2021-11-03 14-34-50",""),
("GPB-1635921303522","156","ACTION REQUIRED","1","2021-11-06 18-44-25","2021-11-03 14-35-03","asgdsd");




CREATE TABLE `gad_table_entry_value` (
  `form_number` varchar(20) DEFAULT NULL,
  `col1` varchar(500) DEFAULT NULL,
  `col2` varchar(500) DEFAULT NULL,
  `col3` varchar(500) DEFAULT NULL,
  `col4` varchar(500) DEFAULT NULL,
  `col5` varchar(500) DEFAULT NULL,
  `col6` varchar(500) DEFAULT NULL,
  `col7` double(255,0) DEFAULT NULL,
  `col8` varchar(500) DEFAULT NULL,
  `col9` varchar(500) DEFAULT NULL,
  `col10` varchar(500) DEFAULT NULL,
  `requestor_id` varchar(100) DEFAULT NULL,
  `date_requested` varchar(100) DEFAULT NULL,
  `row_number` varchar(100) DEFAULT NULL,
  `category_focused` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO gad_table_entry_value VALUES
("GPB-1635920630821","aa","a","a","a","a","a","0","a","a","","156","2021-11-03 14-23-50","1","CLIENT"),
("GPB-1635920630821","b","b","b","b","b","b","0","b","b","","156","2021-11-03 14-23-50","2","ORGANIZATION"),
("GPB-1635920679422","coo","c","c","c","c","c","0","c","c","","156","2021-11-03 14-24-39","1","CLIENT"),
("GPB-1635920693622","d","d","d","d","d","d","0","d","d","","156","2021-11-03 14-24-53","1","CLIENT"),
("GAD-1635921260389","s","s","s","s","s","s","0","s","s","s","156","2021-11-03 14-34-20","1","CLIENT"),
("GAD-1635921260389","d","d","d","d","d","d","0","d","d","d","156","2021-11-03 14-34-20","2","ORGANIZATION"),
("GPB-1635921290845","f","f","f","f","f","f","0","f","f","","156","2021-11-03 14-34-50","1","CLIENT"),
("GPB-1635921303522","g","g","g","g","g","g","0","g","g","","156","2021-11-03 14-35-03","1","CLIENT"),
("GPB-1635921303522","z","z","z","z","z","z","0","z","z","","156","2021-11-03 14-35-03","2","CLIENT"),
("GAD-1635921348063","z","z","z","z","z","z","0","z","z","z","156","2021-11-03 14-35-47","1","CLIENT"),
("GAD-1635921348063","x","x","x","x","x","x","0","x","x","t","156","2021-11-03 14-35-47","2","CLIENT"),
("GAD-1635921409333","g","g","g","g","g","g","0","g","g","g","156","2021-11-03 14-36-49","1","CLIENT"),
("GAD-1635921409333","g","g","g","g","g","g","0","g","g","g","156","2021-11-03 14-36-49","2","ORGANIZATION");




CREATE TABLE `mandate` (
  `id` int(20) NOT NULL,
  `depedno` varchar(250) NOT NULL DEFAULT '',
  `depedcontent` varchar(500) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO mandate VALUES
("0","32, s. 2017: ","Gender-Responsive Basic Education Policy");




CREATE TABLE `template` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `filename` varchar(500) CHARACTER SET cp1256 DEFAULT '',
  `date_temp` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;


INSERT INTO template VALUES
("14","GAD_AR_Trained_Personnel_Template.xlsx","2021-10-25 12:18:00");


