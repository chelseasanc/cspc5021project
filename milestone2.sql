-- Milestone 2 --
-- Aaron Pollack | Chelsea Thompson --

-- DROP ALL EXISTING TABLES IN CORRECT ORDER TO CLEAR DB--------

DROP TABLE IF EXISTS TEST;
DROP TABLE IF EXISTS TEST_TYPE;
DROP TABLE IF EXISTS EMPLOYMENT_HISTORY;
DROP TABLE IF EXISTS EMPLOYER;
DROP TABLE IF EXISTS DEGREE_EARNED;
DROP TABLE IF EXISTS PAST_INSTITUION;
DROP TABLE IF EXISTS APPLICATION;
DROP TABLE IF EXISTS MAJOR;
DROP TABLE IF EXISTS COLLEGE;
DROP TABLE IF EXISTS STUDENT_TYPE;
DROP TABLE IF EXISTS DEGREE_TYPE;
DROP TABLE IF EXISTS TERM;
DROP TABLE IF EXISTS APPLICANT_RACE;
DROP TABLE IF EXISTS RACE;
DROP TABLE IF EXISTS MILITARY_STATUS;
DROP TABLE IF EXISTS MIL_BRANCH_TYPE;
DROP TABLE IF EXISTS MIL_STATUS_TYPE;
DROP TABLE IF EXISTS APPLICANT;
DROP TABLE IF EXISTS ADDRESS;
DROP TABLE IF EXISTS STATE;
DROP TABLE IF EXISTS COUNTRY;
DROP TABLE IF EXISTS GENDER;

--- CREATE TABLES --------

CREATE TABLE STATE(
  STATE_ID CHAR(2) PRIMARY KEY NOT NULL,
  STATE_NAME VARCHAR ( 30 ) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE COUNTRY(
  COUNTRY_ID CHAR(2) PRIMARY KEY NOT NULL,
  COUNTRY_NAME VARCHAR ( 30 ) NOT NULL
) ENGINE=InnoDB;

----- CREATE TABLE WITH FOREIGN KEY -------
----- USE `ON UPDATE CASCADE` for referential integrity -----
----- ASSUME 30 CHAR ENOUGH FOR ADDRESS LINE 1 -------

CREATE TABLE ADDRESS(
  ADDRESS_ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  LINE_1 VARCHAR ( 30 ) NOT NULL,
  LINE_2 VARCHAR ( 30 ),
  CITY VARCHAR ( 30 ) NOT NULL,
  STATE_ID CHAR(2),
  FOREIGN KEY ( STATE_ID ) REFERENCES STATE ( STATE_ID ) ON UPDATE CASCADE,
  ZIP_CODE VARCHAR ( 7 ) NOT NULL,
  COUNTRY_ID CHAR(2),
  FOREIGN KEY ( COUNTRY_ID ) REFERENCES COUNTRY ( COUNTRY_ID ) ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE GENDER(
  GENDER_ID INT NOT NULL PRIMARY KEY,
  GENDER_TYPE VARCHAR ( 5 ) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE LOGIN(
  EMAIL VARCHAR(100) NOT NULL PRIMARY KEY,
  PASSWORD VARCHAR(100) NOT NULL
) ENGINE=InnoDB;

----- ASSUME 30 CHAR ENOUGH FOR FIRST AND LAST NAME ------

CREATE TABLE APPLICANT(
  APPLICANT_ID INT NOT NULL PRIMARY KEY,
  EMAIL VARCHAR(100) NOT NULL,
  FOREIGN KEY ( EMAIL ) REFERENCES LOGIN ( EMAIL ) ON DELETE CASCADE,
  ADDRESS_ID INT NOT NULL,
  FOREIGN KEY ( ADDRESS_ID ) REFERENCES ADDRESS ( ADDRESS_ID ) ON UPDATE CASCADE,
  FIRST_NAME VARCHAR ( 30 ) NOT NULL,
  LAST_NAME VARCHAR ( 30 ) NOT NULL,
  PREFERRED_NAME VARCHAR ( 30 ),
  DOB DATE NOT NULL,
  PHONE_AREA_CODE CHAR ( 3 ) NOT NULL,
  PHONE_LAST_SEVEN CHAR ( 7 ) NOT NULL,
  US_CITIZEN BOOLEAN NOT NULL,
  NATIVE_LANGUAGE BOOLEAN NOT NULL,
  GENDER_ID INT NOT NULL,
  FOREIGN KEY ( GENDER_ID ) REFERENCES GENDER ( GENDER_ID ) ON UPDATE CASCADE,
  HISP_LATINO BOOLEAN NOT NULL
) ENGINE=InnoDB;

CREATE TABLE EMPLOYER(
  EMPLOYER_ID INT NOT NULL PRIMARY KEY,
  ADDRESS_ID INT NOT NULL,
  FOREIGN KEY ( ADDRESS_ID ) REFERENCES ADDRESS ( ADDRESS_ID) ON UPDATE CASCADE,
  PHONE_AREA_CODE CHAR( 3 ) NOT NULL,
  PHONE_LAST_SEVEN CHAR( 7 ) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE RACE(
  RACE_CODE INT NOT NULL PRIMARY KEY,
  RACE_NAME VARCHAR ( 32 ) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE TERM(
  TERM_ID INT NOT NULL PRIMARY KEY,
  QUARTER VARCHAR ( 7 ) NOT NULL,
  YEAR VARCHAR ( 4 ) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE TEST_TYPE(
  TEST_TYPE_ID INT NOT NULL PRIMARY KEY,
  TEST_NAME VARCHAR( 30 )
) ENGINE=InnoDB;

CREATE TABLE MIL_STATUS_TYPE(
  STATUS_CODE INT NOT NULL PRIMARY KEY,
  STATUS_NAME VARCHAR ( 17 )
) ENGINE=InnoDB;

CREATE TABLE MIL_BRANCH_TYPE(
  BRANCH_CODE INT NOT NULL PRIMARY KEY,
  BRANCH_NAME VARCHAR ( 11 )
) ENGINE=InnoDB;

CREATE TABLE MILITARY_STATUS(
  APPLICANT_ID INT NOT NULL PRIMARY KEY,
  FOREIGN KEY ( APPLICANT_ID ) REFERENCES APPLICANT ( APPLICANT_ID ) ON UPDATE CASCADE,
  STATUS_CODE INT NOT NULL,
  FOREIGN KEY ( STATUS_CODE ) REFERENCES MIL_STATUS_TYPE ( STATUS_CODE ) ON UPDATE CASCADE,
  BRANCH_CODE INT NOT NULL,
  FOREIGN KEY ( BRANCH_CODE ) REFERENCES MIL_BRANCH_TYPE ( BRANCH_CODE ) ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE COLLEGE(
  COLLEGE_ID INT NOT NULL PRIMARY KEY,
  COLLEGE_NAME VARCHAR ( 50 ) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE MAJOR(
  MAJOR_ID INT NOT NULL PRIMARY KEY,
  COLLEGE_ID INT NOT NULL,
  FOREIGN KEY ( COLLEGE_ID ) REFERENCES COLLEGE ( COLLEGE_ID ) ON UPDATE CASCADE,
  MAJOR_NAME VARCHAR ( 32 ) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE DEGREE_TYPE(
  DEGREE_TYPE_ID INT NOT NULL PRIMARY KEY,
  DEGREE_TYPE_NAME VARCHAR ( 30 ) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE STUDENT_TYPE(
  STUDENT_TYPE_ID INT NOT NULL PRIMARY KEY,
  STUDENT_TYPE_NAME VARCHAR ( 30 )
) ENGINE=InnoDB;

CREATE TABLE APPLICATION(
  APP_ID INT NOT NULL PRIMARY KEY,
  APPLICANT_ID INT NOT NULL,
  FOREIGN KEY ( APPLICANT_ID ) REFERENCES APPLICANT( APPLICANT_ID ) ON UPDATE CASCADE,
  MAJOR_ID INT NOT NULL,
  FOREIGN KEY ( MAJOR_ID ) REFERENCES MAJOR ( MAJOR_ID ),
  STUDENT_TYPE_ID INT NOT NULL,
  FOREIGN KEY (STUDENT_TYPE_ID) REFERENCES STUDENT_TYPE (STUDENT_TYPE_ID) ON UPDATE CASCADE,
  ACADEMIC_PROBATION BOOLEAN NOT NULL,
  DEGREE_TYPE_ID INT NOT NULL,
  FOREIGN KEY ( DEGREE_TYPE_ID ) REFERENCES DEGREE_TYPE ( DEGREE_TYPE_ID ) ON UPDATE CASCADE,
  TERM_ID INT NOT NULL,
  FOREIGN KEY ( TERM_ID ) REFERENCES TERM ( TERM_ID ),
  FINANCIAL_AID BOOLEAN NOT NULL,
  EMP_TUITION_ASSISTANCE BOOLEAN NOT NULL,
  OTHER_PROGRAMS BOOLEAN NOT NULL,
  FELON_MISDEMEAN BOOLEAN NOT NULL
) ENGINE=InnoDB;

CREATE TABLE PAST_INSTITUION(
  INSTITUTION_ID INT NOT NULL PRIMARY KEY,
  APP_ID INT NOT NULL,
  FOREIGN KEY ( APP_ID ) REFERENCES APPLICATION ( APP_ID ) ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE DEGREE_EARNED(
  DEGREE_ID INT NOT NULL PRIMARY KEY,
  INSTITUTION_ID INT NOT NULL,
  FOREIGN KEY ( INSTITUTION_ID ) REFERENCES PAST_INSTITUION ( INSTITUTION_ID) ON UPDATE CASCADE,
  DEGREE VARCHAR ( 30 ) NOT NULL,
  MAJOR VARCHAR ( 30 ) NOT NULL,
  DATE_RECEIVED DATE NOT NULL
) ENGINE=InnoDB;

CREATE TABLE EMPLOYMENT_HISTORY(
  EMPLOY_HIST_ID INT NOT NULL PRIMARY KEY,
  APP_ID INT NOT NULL,
  FOREIGN KEY ( APP_ID ) REFERENCES APPLICATION ( APP_ID ) ON UPDATE CASCADE,
  EMPLOYER_ID INT NOT NULL,
  FOREIGN KEY ( EMPLOYER_ID ) REFERENCES EMPLOYER ( EMPLOYER_ID ) ON UPDATE CASCADE,
  TITLE VARCHAR ( 30 ) NOT NULL,
  CURRENT BOOLEAN NOT NULL,
  START_DATE DATE NOT NULL,
  END_DATE DATE NOT NULL,
  FTE_STATUS BOOLEAN NOT NULL
) ENGINE=InnoDB;

CREATE TABLE APPLICANT_RACE(
  APPLICANT_ID INT NOT NULL,
  FOREIGN KEY ( APPLICANT_ID ) REFERENCES APPLICANT ( APPLICANT_ID) ON UPDATE CASCADE,
  RACE_CODE INT NOT NULL,
  FOREIGN KEY ( RACE_CODE ) REFERENCES RACE ( RACE_CODE ) ON UPDATE CASCADE,
  PRIMARY KEY (APPLICANT_ID, RACE_CODE)
) ENGINE=InnoDB;

---- USE BUILT IN DATE TYPE FOR `TEST_DATE` ------

CREATE TABLE TEST(
  TEST_ID INT NOT NULL PRIMARY KEY,
  APP_ID INT NOT NULL,
  FOREIGN KEY ( APP_ID ) REFERENCES APPLICATION ( APP_ID ) ON UPDATE CASCADE,
  TEST_TYPE_ID INT NOT NULL,
  FOREIGN KEY ( TEST_TYPE_ID ) REFERENCES TEST_TYPE ( TEST_TYPE_ID ) ON UPDATE CASCADE,
  TEST_DATE DATE NOT NULL
) ENGINE=InnoDB;

------- INSERT VALUES INTO TABLE --------

INSERT INTO RACE VALUES
  (0, 'Asian'),
  (1, 'Black/African American'),
  (2, 'Native Hawaiian/Pacific Islander'),
  (3, 'Native American/Native Indian'),
  (4, 'White/Middle Eastern');

INSERT INTO TEST_TYPE VALUES
  (0, 'CBEST'),
  (1, 'GMAT'),
  (2, 'GRE General'),
  (3, 'IELTS'),
  (4, 'MAT'),
  (5, 'PRAXIS'),
  (6, 'TOEFL'),
  (7, 'WEST-B'),
  (8, 'WEST-E');

INSERT INTO MIL_BRANCH_TYPE VALUES
  (0, 'Army'),
  (1, 'Marin Corp'),
  (2, 'Navy'),
  (3, 'Air Force'),
  (4, 'Coast Gaurd');

INSERT INTO MIL_STATUS_TYPE VALUES
  (0, 'Not a veteran'),
  (1, 'Currently serving'),
  (2, 'Previously served'),
  (3, 'Current dependent');

INSERT INTO COLLEGE VALUES
    (0, 'College of Sciente and Engineering'),
    (1, 'Albers School of Business'),
    (2, 'College of Arts and Sciences'),
    (3, 'College of Education'),
    (4, 'College of Nursing'),
    (5, 'School of Theology and Ministry');

INSERT INTO MAJOR VALUES
    (0,'Certificate in Computer Science Fundamentals',1),
    (1,'Certificate in Software Architecture and Design',1),
    (2,'Certificate in Software Project Management',1);

INSERT INTO DEGREE_TYPE VALUES
    (0,'Certificates'),
    (1,'Masters');

INSERT INTO STUDENT_TYPE VALUES
    (0,'Graduate'),
    (1,'Graduate Non-Matriculated'),
    (2,'Graduate Readmission');

INSERT INTO TERM VALUES
    (0, 'Summer', '2016'),
    (1, 'Fall', '2016'),
    (2, 'Winter', '2017'),
    (3, 'Spring', '2017');

INSERT INTO STATE VALUES
  ("AL","Alabama"),
  ("AK","Alaska"),
  ("AZ","Arizona"),
  ("AR","Arkansas"),
  ("CA","California"),
  ("CO","Colorado"),
  ("CT","Connecticut"),
  ("DE","Delaware"),
  ("DC","District Of Columbia"),
  ("FL","Florida"),
  ("GA","Georgia"),
  ("HI","Hawaii"),
  ("ID","Idaho"),
  ("IL","Illinois"),
  ("IN","Indiana"),
  ("IA","Iowa"),
  ("KS","Kansas"),
  ("KY","Kentucky"),
  ("LA","Louisiana"),
  ("ME","Maine"),
  ("MD","Maryland"),
  ("MA","Massachusetts"),
  ("MI","Michigan"),
  ("MN","Minnesota"),
  ("MS","Mississippi"),
  ("MO","Missouri"),
  ("MT","Montana"),
  ("NE","Nebraska"),
  ("NV","Nevada"),
  ("NH","New Hampshire"),
  ("NJ","New Jersey"),
  ("NM","New Mexico"),
  ("NY","New York"),
  ("NC","North Carolina"),
  ("ND","North Dakota"),
  ("OH","Ohio"),
  ("OK","Oklahoma"),
  ("OR","Oregon"),
  ("PA","Pennsylvania"),
  ("RI","Rhode Island"),
  ("SC","South Carolina"),
  ("SD","South Dakota"),
  ("TN","Tennessee"),
  ("TX","Texas"),
  ("UT","Utah"),
  ("VT","Vermont"),
  ("VA","Virginia"),
  ("WA","Washington"),
  ("WV","West Virginia"),
  ("WI","Wisconsin"),
  ("WY","Wyoming");

INSERT INTO COUNTRY (COUNTRY_NAME, COUNTRY_ID) VALUES
  ("Afghanistan","AF"),
  ("Aland Islands","AX"),
  ("Albania","AL"),
  ("Algeria","DZ"),
  ("American Samoa","AS"),
  ("Andorra","AD"),
  ("Angola","AO"),
  ("Anguilla","AI"),
  ("Antarctica","AQ"),
  ("Antigua and Barbuda","AG"),
  ("Argentina","AR"),
  ("Armenia","AM"),
  ("Aruba","AW"),
  ("Australia","AU"),
  ("Austria","AT"),
  ("Azerbaijan","AZ"),
  ("Bahamas","BS"),
  ("Bahrain","BH"),
  ("Bangladesh","BD"),
  ("Barbados","BB"),
  ("Belarus","BY"),
  ("Belgium","BE"),
  ("Belize","BZ"),
  ("Benin","BJ"),
  ("Bermuda","BM"),
  ("Bhutan","BT"),
  ("Bolivia, Plurinational State of","BO"),
  ("Bonaire, Sint Eustatius and Saba","BQ"),
  ("Bosnia and Herzegovina","BA"),
  ("Botswana","BW"),
  ("Bouvet Island","BV"),
  ("Brazil","BR"),
  ("British Indian Ocean Territory","IO"),
  ("Brunei Darussalam","BN"),
  ("Bulgaria","BG"),
  ("Burkina Faso","BF"),
  ("Burundi","BI"),
  ("Cambodia","KH"),
  ("Cameroon","CM"),
  ("Canada","CA"),
  ("Cape Verde","CV"),
  ("Cayman Islands","KY"),
  ("Central African Republic","CF"),
  ("Chad","TD"),
  ("Chile","CL"),
  ("China","CN"),
  ("Christmas Island","CX"),
  ("Cocos (Keeling) Islands","CC"),
  ("Colombia","CO"),
  ("Comoros","KM"),
  ("Congo","CG"),
  ("Congo, the Democratic Republic of the","CD"),
  ("Cook Islands","CK"),
  ("Costa Rica","CR"),
  ("Côte d'Ivoire","CI"),
  ("Croatia","HR"),
  ("Cuba","CU"),
  ("Curaçao","CW"),
  ("Cyprus","CY"),
  ("Czech Republic","CZ"),
  ("Denmark","DK"),
  ("Djibouti","DJ"),
  ("Dominica","DM"),
  ("Dominican Republic","DO"),
  ("Ecuador","EC"),
  ("Egypt","EG"),
  ("El Salvador","SV"),
  ("Equatorial Guinea","GQ"),
  ("Eritrea","ER"),
  ("Estonia","EE"),
  ("Ethiopia","ET"),
  ("Falkland Islands (Malvinas)","FK"),
  ("Faroe Islands","FO"),
  ("Fiji","FJ"),
  ("Finland","FI"),
  ("France","FR"),
  ("French Guiana","GF"),
  ("French Polynesia","PF"),
  ("French Southern Territories","TF"),
  ("Gabon","GA"),
  ("Gambia","GM"),
  ("Georgia","GE"),
  ("Germany","DE"),
  ("Ghana","GH"),
  ("Gibraltar","GI"),
  ("Greece","GR"),
  ("Greenland","GL"),
  ("Grenada","GD"),
  ("Guadeloupe","GP"),
  ("Guam","GU"),
  ("Guatemala","GT"),
  ("Guernsey","GG"),
  ("Guinea","GN"),
  ("Guinea-Bissau","GW"),
  ("Guyana","GY"),
  ("Haiti","HT"),
  ("Heard Island and McDonald Islands","HM"),
  ("Holy See (Vatican City State)","VA"),
  ("Honduras","HN"),
  ("Hong Kong","HK"),
  ("Hungary","HU"),
  ("Iceland","IS"),
  ("India","IN"),
  ("Indonesia","ID"),
  ("Iran, Islamic Republic of","IR"),
  ("Iraq","IQ"),
  ("Ireland","IE"),
  ("Isle of Man","IM"),
  ("Israel","IL"),
  ("Italy","IT"),
  ("Jamaica","JM"),
  ("Japan","JP"),
  ("Jersey","JE"),
  ("Jordan","JO"),
  ("Kazakhstan","KZ"),
  ("Kenya","KE"),
  ("Kiribati","KI"),
  ("Korea, Democratic People's Republic of","KP"),
  ("Korea, Republic of","KR"),
  ("Kuwait","KW"),
  ("Kyrgyzstan","KG"),
  ("Lao People's Democratic Republic","LA"),
  ("Latvia","LV"),
  ("Lebanon","LB"),
  ("Lesotho","LS"),
  ("Liberia","LR"),
  ("Libya","LY"),
  ("Liechtenstein","LI"),
  ("Lithuania","LT"),
  ("Luxembourg","LU"),
  ("Macao","MO"),
  ("Macedonia, the Former Yugoslav Republic of","MK"),
  ("Madagascar","MG"),
  ("Malawi","MW"),
  ("Malaysia","MY"),
  ("Maldives","MV"),
  ("Mali","ML"),
  ("Malta","MT"),
  ("Marshall Islands","MH"),
  ("Martinique","MQ"),
  ("Mauritania","MR"),
  ("Mauritius","MU"),
  ("Mayotte","YT"),
  ("Mexico","MX"),
  ("Micronesia, Federated States of","FM"),
  ("Moldova, Republic of","MD"),
  ("Monaco","MC"),
  ("Mongolia","MN"),
  ("Montenegro","ME"),
  ("Montserrat","MS"),
  ("Morocco","MA"),
  ("Mozambique","MZ"),
  ("Myanmar","MM"),
  ("Namibia","NA"),
  ("Nauru","NR"),
  ("Nepal","NP"),
  ("Netherlands","NL"),
  ("New Caledonia","NC"),
  ("New Zealand","NZ"),
  ("Nicaragua","NI"),
  ("Niger","NE"),
  ("Nigeria","NG"),
  ("Niue","NU"),
  ("Norfolk Island","NF"),
  ("Northern Mariana Islands","MP"),
  ("Norway","NO"),
  ("Oman","OM"),
  ("Pakistan","PK"),
  ("Palau","PW"),
  ("Palestine, State of","PS"),
  ("Panama","PA"),
  ("Papua New Guinea","PG"),
  ("Paraguay","PY"),
  ("Peru","PE"),
  ("Philippines","PH"),
  ("Pitcairn","PN"),
  ("Poland","PL"),
  ("Portugal","PT"),
  ("Puerto Rico","PR"),
  ("Qatar","QA"),
  ("Réunion","RE"),
  ("Romania","RO"),
  ("Russian Federation","RU"),
  ("Rwanda","RW"),
  ("Saint Barthélemy","BL"),
  ("Saint Helena, Ascension and Tristan da Cunha","SH"),
  ("Saint Kitts and Nevis","KN"),
  ("Saint Lucia","LC"),
  ("Saint Martin (French part)","MF"),
  ("Saint Pierre and Miquelon","PM"),
  ("Saint Vincent and the Grenadines","VC"),
  ("Samoa","WS"),
  ("San Marino","SM"),
  ("Sao Tome and Principe","ST"),
  ("Saudi Arabia","SA"),
  ("Senegal","SN"),
  ("Serbia","RS"),
  ("Seychelles","SC"),
  ("Sierra Leone","SL"),
  ("Singapore","SG"),
  ("Sint Maarten (Dutch part)","SX"),
  ("Slovakia","SK"),
  ("Slovenia","SI"),
  ("Solomon Islands","SB"),
  ("Somalia","SO"),
  ("South Africa","ZA"),
  ("South Georgia and the South Sandwich Islands","GS"),
  ("South Sudan","SS"),
  ("Spain","ES"),
  ("Sri Lanka","LK"),
  ("Sudan","SD"),
  ("Suriname","SR"),
  ("Svalbard and Jan Mayen","SJ"),
  ("Swaziland","SZ"),
  ("Sweden","SE"),
  ("Switzerland","CH"),
  ("Syrian Arab Republic","SY"),
  ("Taiwan, Province of China","TW"),
  ("Tajikistan","TJ"),
  ("Tanzania, United Republic of","TZ"),
  ("Thailand","TH"),
  ("Timor-Leste","TL"),
  ("Togo","TG"),
  ("Tokelau","TK"),
  ("Tonga","TO"),
  ("Trinidad and Tobago","TT"),
  ("Tunisia","TN"),
  ("Turkey","TR"),
  ("Turkmenistan","TM"),
  ("Turks and Caicos Islands","TC"),
  ("Tuvalu","TV"),
  ("Uganda","UG"),
  ("Ukraine","UA"),
  ("United Arab Emirates","AE"),
  ("United Kingdom","GB"),
  ("United States","US"),
  ("United States Minor Outlying Islands","UM"),
  ("Uruguay","UY"),
  ("Uzbekistan","UZ"),
  ("Vanuatu","VU"),
  ("Venezuela, Bolivarian Republic of","VE"),
  ("Viet Nam","VN"),
  ("Virgin Islands, British","VG"),
  ("Virgin Islands, U.S.","VI"),
  ("Wallis and Futuna","WF"),
  ("Western Sahara","EH"),
  ("Yemen","YE"),
  ("Zambia","ZM"),
  ("Zimbabwe","ZW");

