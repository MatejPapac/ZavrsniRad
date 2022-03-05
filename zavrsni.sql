drop  database if exists zavrsni;
create database zavrsni character set utf8mb4;
use zavrsni;



create table operater(
    sifra           int not null primary key auto_increment,
    email           varchar(50) not null,
    lozinka         char(60) not null, # čitati https://medium.com/analytics-vidhya/password-hashing-pbkdf2-scrypt-bcrypt-and-argon2-e25aaf41598e
    ime             varchar(50) not null,
    prezime         varchar(50) not null,
    uloga           varchar(10) not null
);

create table jelo(
        sifra  int not null primary key auto_increment,
        naziv  varchar(50) not null,
        cijena decimal(16,2) not null,
        vrsta  int not null 
       
       
    );

create table pice(
        sifra int not null primary key auto_increment,
        naziv varchar(50) not null,
        cijena decimal(16,2) not null,
        vrsta int not null


);

    create table rezervacija(
        sifra int not null primary key auto_increment,
        datumiVrijeme datetime not null,
        osoba varchar(50) not null,
        brojRezerviranihMjesta varchar(50) not null,
        mjesto int not null ,
        kontakt varchar(50) not null,
        napomena varchar(50)
);

create table mjesto(
        sifra int not null primary key  auto_increment,
        naziv varchar(50) not null,
        brojStolica varchar(50)
  

 
);

create table vrsta (
        sifra int not null primary key auto_increment,
        naziv varchar (50) not null
);

create table rezervacija_mjesto (
        sifra int not null primary key auto_increment,
        rezervacija int not null,
        mjesto int not null
);

alter table jelo add foreign key (vrsta) references vrsta(sifra);
alter table pice add foreign key (vrsta) references vrsta(sifra);

alter table rezervacija_mjesto add foreign key (mjesto) references rezervacija(sifra);
alter table rezervacija_mjesto add foreign key (rezervacija) references mjesto(sifra);


# unos operatera
insert into operater(email,lozinka,ime,prezime, uloga) values
# lozinka   papac
('admin@edunova.hr','$2a$12$fSZf4fcRiekXTX6/.tqWq.1gvACtJPb5oz0JDSYz1ioJA3KVRZw/W','Administrator','Edunova','admin'),
# lozinka bapac
('oper@edunova.hr','$2a$12$/NAoBs.yaFlnqXaJIZBpK.NY4w9sI.DioZMedqRLEnzeuyauR7Yo.','Operater','Edunova','oper');


insert into vrsta(sifra,naziv)values
(null,'Sok'),
(null,'Zesta'),
(null,'Gazirana pica');

insert into pice(sifra,naziv,cijena,vrsta)
values(null,'Cedevita',9.00,1),
       (null,'Pelinkovac 0,03',8.00,2),
       (null,'Coca-Cola',14.00,3);


insert into rezervacija(sifra,datumiVrijeme,osoba,brojRezerviranihMjesta,mjesto,kontakt,napomena)
values(null,'12-2-2019','Miljenko',12,1,'Goformiljenko@gmail.com','abcd'),
(null,'13-2-2019','Andrija',8,2,'GoforAndrija@gmail.com','abcd'),
(null,'14-2-2019','Vjekoslav',24,3,'GoforVjekoslav@gmail.com','abcd');

insert into mjesto (sifra,naziv,brojStolica)
values(null,'Stol 101','4'),
      (null, 'Stol 102','5'),
      (null,'Stol 103','6');

      insert into rezervacija_mjesto(sifra, rezervacija,mjesto)
      values(null,1,1),
      (null,2,2),
      (null ,1,3);