

CREATE TABLE `attendees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) DEFAULT NULL,
  `position` varchar(500) DEFAULT NULL,
  `gender` varchar(500) DEFAULT NULL,
  `division` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;


INSERT INTO attendees VALUES
("12","Jorge","Principal","Male",""),
("13","Rowel","Master Teacher II","Male",""),
("14","Maricris","Teacher I","Female",""),
("15","Mark","Teacher I","Male",""),
("16","Leona","Administrative Assistant I","Female","");




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
) ENGINE=InnoDB AUTO_INCREMENT=156 DEFAULT CHARSET=utf8mb4;


INSERT INTO caps VALUES
("1","Jorge","jojo","Ojascastro","Jorge","Valdez","Regional GAD Coordinator","Region 1","ACTIVE"),
("2","Leo","leo","Lana","Leo","Andrew","Division GAD Coordinator","Pangasinan I","ACTIVE"),
("3","admin","admin","","","","Admin","","ACTIVE"),
("70","Rowel","roro","Dagooc","Rowel","Row","Division GAD Coordinator","Pangasinan II","ACTIVE"),
("72","sdaa","adf","asdf","asdf","asdf","Division GAD Coordinator","Ilocos Norte","ACTIVE"),
("73","gtferty","wert","wertwe","retw","wretwe","Regional GAD Coordinator","Region 1","ACTIVE"),
("74","sfds","asdf","asdf","gfh","fghf","Division GAD Coordinator","Dagupan City","ACTIVE"),
("75","sdfas","dfaf","dfasf","dfas","dfa","Division GAD Coordinator","Ilocos Sur","ACTIVE"),
("76","safsadf","asdfa","adfadsf","asdff","asdfdsf","Division GAD Coordinator","Vigan City","ACTIVE"),
("79","kiki","fdsd","dsfasf","dsfas","asdf","Division GAD Coordinator","San Carlos City","ACTIVE"),
("80","koko","asd","asf","fdg","dfg","Division GAD Coordinator","Candon City","ACTIVE"),
("82","fudge","ert","rey","ery","tyui","Division GAD Coordinator","Alaminos City","ACTIVE"),
("84","albert","albert","albert","albert","albert","Division GAD Coordinator","La Union","ACTIVE"),
("155","wqer","ewrt","wert","werty","wert","Division GAD Coordinator","Batac City","ACTIVE");




CREATE TABLE `division` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `division` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;


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
("GAD-1632881179014","2","APPROVED","1","2021-10-05 17-25-08","2021-09-29 10-06-18",""),
("GAD-1633423782940","2","APPROVED","1","2021-10-23 16-31-14","2021-10-05 16-49-42",""),
("GAD-1633500380448","84","APPROVED","1","2021-10-23 15-46-01","2021-10-06 14-06-20",""),
("GAD-1634973713935","2","APPROVED","1","2021-10-23 15-44-40","2021-10-23 15-21-53",""),
("GAD-1634973784828","2","APPROVED","1","2021-10-23 16-11-17","2021-10-23 15-23-04",""),
("GAD-1634978303993","2","APPROVED","1","2021-10-23 16-42-56","2021-10-23 16-38-23",""),
("GAD-1634978638160","2","PENDING","","","2021-10-23 16-43-57",""),
("GPB-1632634881319","2","APPROVED","1","2021-09-26 13-42-40","2021-09-26 13-41-21",""),
("GPB-1632884474885","2","APPROVED","1","2021-10-05 17-14-07","2021-09-29 11-01-14",""),
("GPB-1633424363561","2","APPROVED","1","2021-10-23 16-32-26","2021-10-05 16-59-23",""),
("GPB-1633499950942","84","APPROVED","1","2021-10-06 14-02-32","2021-10-06 13-59-10",""),
("GPB-1634971514242","2","APPROVED","1","2021-10-23 15-40-58","2021-10-23 14-45-14",""),
("GPB-1634978520039","2","APPROVED","1","2021-10-23 16-42-42","2021-10-23 16-41-59",""),
("GPB-1634978618004","2","PENDING","","","2021-10-23 16-43-37","");




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
("GPB-1632634881319","gpb","gpb","gpb","gpb","gpb","gpb","10000","gpb","gpb","","2","2021-09-26 13-41-21","1","CLIENT"),
("GAD-1632881179014","Lack of awareness and appreciation on gender equality and gender issues within DepEd","Need to initiate, coordinate and monitor gender mainstreaming at the regional level ","A gender audit establishes a baseline, identifies critical gaps and challenges, and recommends ways of addressing them, suggesting possible improvements and innovations. It also documents good practices towards the achievement of gender equality. ","MFO2-Basic Education Services","Gender Audit Training-Workshop with Orientation on Magna Carta of Women and DO 32 s. 2017 (Gender-Responsive Basic Education Policy)","Strengthened GAD mechanism in the region","100","197500","197500","The resource speaker is a member of PCW national Pool of Trainers/ GEDSI exper","2","2021-09-29 10-06-18","1","CLIENT"),
("GPB-1632884474885","DepEd Order No. 32, s. 2017: DepEd Gender-Responsive Basic Education Policy and RA 92962: Anti-Violence Against Women and their Children Act of 2004","Minimal  opportunity for the Regional Office Personnel - especially the women - to participate in information-awareness campaigns  and be made aware of their rights and roles in the society","Maintained a VAWC-free workplace where male and female personnel enjoy human rights and empowerment, resulting to improved delivery of customer services and well-addressed/resolved issues, if not totally eliminated problems, in the workplace","MFO2-Basic Education Services","Advocacy Campaign for Women Equality and Empowerment (National Women’s Month, 18-Day Campaign to End VAW)","100% of ROI Personnel capacitated on empowering women, upholding respect for and protection of human rights, maintaining VAWC-free workplace and providing gender-responsive, quality basic customer services","110500","GAD Fund","Regional Office I","","2","2021-09-29 11-01-14","1","CLIENT"),
("GAD-1633423782940","ar","ar","ar","ar","ar","ar","0","ar","ar","ar","2","2021-10-05 16-49-42","1","CLIENT"),
("GAD-1633423782940","arr","arr","arr","arr","arr","arr","0","arr","arr","","2","2021-10-05 16-49-42","2","ORGANIZATION"),
("GPB-1633424363561","aa","aa","aa","aa","aa","aa","0","aa","aa","","2","2021-10-05 16-59-23","1","CLIENT"),
("GPB-1633424363561","aaa","aaa","aaa","aaa","aaa","aaa","0","aaa","aaa","","2","2021-10-05 16-59-23","2","ORGANIZATION"),
("GPB-1633499950942","xx","xx","xxxx","xx","xx","xx","0","xx","xx","","84","2021-10-06 13-59-10","1","CLIENT"),
("GAD-1633500380448","yy","yy","yy","yy","yy","yy","0","yy","yy","yy","84","2021-10-06 14-06-20","1","CLIENT"),
("GPB-1634971514242","jo","j","j","j","j","j","0","j","j","","2","2021-10-23 14-45-14","1","CLIENT"),
("GPB-1634971514242","oo","o","o","o","o","o","0","o","o","","2","2021-10-23 14-45-14","2","ORGANIZATION"),
("GAD-1634973713935","g","g","g","g","g","g","0","g","g","g","2","2021-10-23 15-21-53","1","CLIENT"),
("GAD-1634973713935","h","h","h","h","h","h","0","h","h","h","2","2021-10-23 15-21-53","2","ORGANIZATION"),
("GAD-1634973784828","aa","a","a","a","a","a","0","a","a","a","2","2021-10-23 15-23-04","1","CLIENT"),
("GAD-1634973784828","ss","s","s","s","s","s","0","s","s","s","2","2021-10-23 15-23-04","2","ORGANIZATION"),
("GAD-1634978303993","d","d","d","d","d","d","0","d","d","d","2","2021-10-23 16-38-23","1","CLIENT"),
("GPB-1634978520039","f","f","f","f","f","f","0","f","f","","2","2021-10-23 16-41-59","1","CLIENT"),
("GPB-1634978618004","d","d","d","d","d","d","5","d","d","","2","2021-10-23 16-43-37","1","CLIENT"),
("GAD-1634978638160","g","g","g","g","g","g","7","77","g","g","2","2021-10-23 16-43-57","1","CLIENT");




CREATE TABLE `mandate` (
  `depedno` varchar(250) DEFAULT '',
  `depedcontent` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO mandate VALUES
("32, s. 2017","DepEd Gender-Responsive Basic Education Policy and RA 92962: Anti-Violence Against Women and their Children Act of 2004"),
("40, s. 2012","DepEd Child Protection Policy and RA 9710: The Magna Carta of Women and Public School Teacher"),
("5645","Child labor"),
("1234","Child Abuse"),
("5678","Womens right"),
("3333","Mens Right");




CREATE TABLE `personnel` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `division` varchar(500) DEFAULT NULL,
  `filename` varchar(500) DEFAULT NULL,
  `date_submitted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;






CREATE TABLE `template` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `filename` varchar(500) CHARACTER SET cp1256 DEFAULT '',
  `date_temp` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;


INSERT INTO template VALUES
("10","GAD_AR_Trained_Personnel_Template.xlsx","2021-09-22 09:27:00");


