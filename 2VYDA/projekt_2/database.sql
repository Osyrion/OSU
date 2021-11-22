-- 2VYDA_projekt2

CREATE DATABASE vydap_projekt CHARACTER SET utf8;

CREATE TABLE vydap_projekt.predmety (
    zkratka_predmetu varchar(5) PRIMARY KEY,
    nazev varchar(50),
    pocet_kreditu smallint(6),
    pocet_hodin_prednasek smallint(6),
    pocet_hodin_cviceni smallint(6),
    ukonceni varchar(2),
    anotace text
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;
