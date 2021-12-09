-- ucitele
INSERT INTO vydap_projekt.teachers VALUES ('xjany', 'Pavel', 'Jánsky', 'Mgr.', 'PhD.', '12345');
INSERT INTO vydap_projekt.teachers VALUES ('xdrob', 'Karel', 'Drobný', 'Ing.', 'Csc.', '12345');
INSERT INTO vydap_projekt.teachers VALUES ('xhala', 'Miroslav', 'Hála', 'Mgr. et Mgr.', '', '12345');
INSERT INTO vydap_projekt.teachers VALUES ('xnova', 'Tatiana', 'Nová', 'Prof.', 'Csc.', '12345');
INSERT INTO vydap_projekt.teachers VALUES ('xsekl', 'Radek', 'Šekl', 'Doc.', 'PhD.', '12345');

-- studenti
INSERT INTO vydap_projekt.students VALUES ('xfule', 'Jiří', 'Fulmek', '12345');
INSERT INTO vydap_projekt.students VALUES ('xball', 'František', 'Balla', '12345');
INSERT INTO vydap_projekt.students VALUES ('xkala', 'Denisa', 'Kálavská', '12345');
INSERT INTO vydap_projekt.students VALUES ('xfara', 'Alexandra', 'Farná', '12345');
INSERT INTO vydap_projekt.students VALUES ('xriec', 'Tomáš', 'Riečan', '12345');

-- mistnosti
INSERT INTO vydap_projekt.classes VALUES ('C105', 'FPR 1.patro', '20');
INSERT INTO vydap_projekt.classes VALUES ('C104', 'FPR 1.patro', '10');
INSERT INTO vydap_projekt.classes VALUES ('C210', 'FPR 2.patro', '30');
INSERT INTO vydap_projekt.classes VALUES ('A308', 'LF 3.patro', '25');
INSERT INTO vydap_projekt.classes VALUES ('B220', 'FF 2.patro', '15');

-- predmety
INSERT INTO vydap_projekt.courses VALUES ('7OPER', 'Operační systémy', '7', '10', '16', 'Zk', 'Windows, Linux, Android');
INSERT INTO vydap_projekt.courses VALUES ('7DBSY', 'Databázové systémy', '5', '12', '8', 'Zá', 'SQL, MySQL, Oracle');
INSERT INTO vydap_projekt.courses VALUES ('7PROG', 'Úvod do programování', '4', '8', '16', 'Zk', 'Python');
INSERT INTO vydap_projekt.courses VALUES ('7UIMA', 'Umelá inteligencia', '3', '8', '4', 'Zá', 'Roboty');
INSERT INTO vydap_projekt.courses VALUES ('7SWIO', 'Softwarové inžinierstvo', '5', '9', '0', 'Zk', 'UML, Návrhové vzory');

-- ucitele a predmety
INSERT INTO vydap_projekt.teachers2courses VALUES ('xjany', '7OPER');
INSERT INTO vydap_projekt.teachers2courses VALUES ('xjany', '7DBSY');
INSERT INTO vydap_projekt.teachers2courses VALUES ('xjany', '7PROG');
INSERT INTO vydap_projekt.teachers2courses VALUES ('xdrob', '7PROG');
INSERT INTO vydap_projekt.teachers2courses VALUES ('xdrob', '7UIMA');
INSERT INTO vydap_projekt.teachers2courses VALUES ('xnova', '7SWIO');

-- studenti a predmety
INSERT INTO vydap_projekt.students2courses VALUES ('xfule', '7PROG');
INSERT INTO vydap_projekt.students2courses VALUES ('xfule', '7SWIO');
INSERT INTO vydap_projekt.students2courses VALUES ('xkala', '7UIMA');
INSERT INTO vydap_projekt.students2courses VALUES ('xfara', '7PROG');
INSERT INTO vydap_projekt.students2courses VALUES ('xriec', '7DBSY');
INSERT INTO vydap_projekt.students2courses VALUES ('xriec', '7PROG');

INSERT INTO vydap_projekt.exams VALUES ('1', 'C105', '1', '7OPER', '01-12-2021 12:40', '20', 'prukaz');