-- ucitele
INSERT INTO vydap_projekt.teachers VALUES (1, 'pajansky', 'Pavel', 'Jánsky', 'Mgr.', 'PhD.', '12345');
INSERT INTO vydap_projekt.teachers VALUES (2, '', '', '', '', '', '');
INSERT INTO vydap_projekt.teachers VALUES (3, '', '', '', '', '', '');
INSERT INTO vydap_projekt.teachers VALUES (4, '', '', '', '', '', '');
INSERT INTO vydap_projekt.teachers VALUES (5, '', '', '', '', '', '');

-- studenti
INSERT INTO vydap_projekt.students VALUES (11, 'jfulmek', 'Jiří', 'Fulmek', 'abcdef');
INSERT INTO vydap_projekt.students VALUES (12, '', '', '', '', '', '');
INSERT INTO vydap_projekt.students VALUES (13, '', '', '', '', '', '');
INSERT INTO vydap_projekt.students VALUES (14, '', '', '', '', '', '');
INSERT INTO vydap_projekt.students VALUES (15, '', '', '', '', '', '');

-- mistnosti
INSERT INTO vydap_projekt.rooms VALUES ('C105', 'FPR 1.patro', '20');
INSERT INTO vydap_projekt.rooms VALUES ('C104', 'FPR 1.patro', '10');
INSERT INTO vydap_projekt.rooms VALUES ('C210', 'FPR 2.patro', '30');
INSERT INTO vydap_projekt.rooms VALUES ('A308', 'LF 3.patro', '25');
INSERT INTO vydap_projekt.rooms VALUES ('B220', 'FF 2.patro', '15');

-- predmety
INSERT INTO vydap_projekt.courses VALUES ('7OPER', 'Operační systémy', '7', '10', '16', 'Zk', 'Windows, Linux, Android');
INSERT INTO vydap_projekt.courses VALUES ('7DBSY', 'Databázové systémy', '5', '12', '8', 'Zá', 'SQL, MySQL, Oracle');
INSERT INTO vydap_projekt.courses VALUES ('7PROG', 'Úvod do programování', '4', '8', '16', 'Zk', 'Python');
INSERT INTO vydap_projekt.courses VALUES ('7UIMA', 'Umelá inteligencia', '3', '8', '4', 'Zá', 'Roboty');
INSERT INTO vydap_projekt.courses VALUES ('7SWIO', 'Softwarové inžinierstvo', '5', '9', '0', 'Zk', 'UML, Návrhové vzory');

-- ucitele a predmety
INSERT INTO vydap_projekt.teachers2courses VALUES ('1', '7OPER');
INSERT INTO vydap_projekt.teachers2courses VALUES ('', '7');
INSERT INTO vydap_projekt.teachers2courses VALUES ('', '7');
INSERT INTO vydap_projekt.teachers2courses VALUES ('', '7');
INSERT INTO vydap_projekt.teachers2courses VALUES ('', '7');

--studenti a predmety
INSERT INTO vydap_projekt.students2courses VALUES ('11', '7PROG');
INSERT INTO vydap_projekt.students2courses VALUES ('', '7');
INSERT INTO vydap_projekt.students2courses VALUES ('', '7');
INSERT INTO vydap_projekt.students2courses VALUES ('', '7');
INSERT INTO vydap_projekt.students2courses VALUES ('', '7');

INSERT INTO vydap_projekt.exams VALUES ('1', 'C105', '1', '7OPER', '01-12-2021 12:40', '20', 'prukaz');