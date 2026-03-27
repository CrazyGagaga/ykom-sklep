CREATE TABLE IF NOT EXISTS `produkt` (
	`id` int AUTO_INCREMENT NOT NULL UNIQUE,
	`nazwa_prod` decimal(50) NOT NULL,
	`opis_prod` varchar(250) NOT NULL,
	`id_kategoria` int NOT NULL,
	`cena_sztuka` decimal(10,0) NOT NULL,
	`ilosc_magazyn` int NOT NULL,
	`zdjecie_prod` blob NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `kategorie` (
	`id` int AUTO_INCREMENT NOT NULL UNIQUE,
	`nazwa_kat` varchar(50) NOT NULL,
	`opis_kat` int NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `dane_uzyt_zam` (
	`id` int AUTO_INCREMENT NOT NULL UNIQUE,
	`imie` varchar(50) NOT NULL,
	`nazwisko` varchar(50) NOT NULL,
	`nr_dom` varchar(4) NOT NULL,
	`ulica` varchar(50) NOT NULL,
	`miejscowosc` varchar(50) NOT NULL,
	`kod_poczt` varchar(6) NOT NULL,
	`nr_tel` varchar(12) NOT NULL,
	`email` varchar(50) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `zamowienia` (
	`id` int AUTO_INCREMENT NOT NULL UNIQUE,
	`id_osob` int NOT NULL,
	`data_zamow` datetime NOT NULL,
	`status` varchar(50) NOT NULL,
	`kwota` decimal(10,0) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `zamow_produkty` (
	`id` int AUTO_INCREMENT NOT NULL UNIQUE,
	`id_zamow` int NOT NULL,
	`id_produkt` int NOT NULL,
	`ilosc` int NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `uzyt_login` (
	`email` int AUTO_INCREMENT NOT NULL UNIQUE,
	`login` varchar(50) NOT NULL,
	`haslo` varchar(50) NOT NULL,
	PRIMARY KEY (`email`)
);

ALTER TABLE `produkt` ADD CONSTRAINT `produkt_fk3` FOREIGN KEY (`id_kategoria`) REFERENCES `kategorie`(`id`);


ALTER TABLE `zamowienia` ADD CONSTRAINT `zamowienia_fk1` FOREIGN KEY (`id_osob`) REFERENCES `dane_uzyt_zam`(`id`);
ALTER TABLE `zamow_produkty` ADD CONSTRAINT `zamow_produkty_fk1` FOREIGN KEY (`id_zamow`) REFERENCES `zamowienia`(`id`);

ALTER TABLE `zamow_produkty` ADD CONSTRAINT `zamow_produkty_fk2` FOREIGN KEY (`id_produkt`) REFERENCES `produkt`(`id`);
ALTER TABLE `uzyt_login` ADD CONSTRAINT `uzyt_login_fk0` FOREIGN KEY (`email`) REFERENCES `dane_uzyt_zam`(`email`);