# C:\xampp\mysql\bin\mysql -uroot --default_character_set=utf8  < C:\Users\Kleep\Documents\GitHub\Projects\jelasvijeta.hr\jelasvijeta.sql

drop database if exists jelasvijeta;
create database jelasvijeta default charset utf8mb4;
use jelasvijeta;

create table jela(
    id int not null primary key auto_increment,
    kategorija int,
    sastojci int not null,
    tag int not null,
    jezik int not null
);

create table jezici(
    id int not null primary key auto_increment,
    jezik varchar(30) not null
);

create table kategorije (
    id int not null primary key auto_increment,
    kategorija varchar(50)
);

create table tags (
    id int not null primary key auto_increment,
    tag varchar(50)
);

create table sastojci(
    id int not null primary key auto_increment,
    sastojak varchar(50) not null
);

alter table jela add foreign key (kategorija) references kategorije(id);
alter table jela add foreign key (sastojci) references sastojci(id);
alter table jela add foreign key (jezik) references jezici(id);
alter table jela add foreign key (tag) references tags(id);

insert into sastojci (sastojak)
values ('sir'), ('kupus'), ('gljive');

insert into kategorije (kategorija)
values ('meso'), ('riba'), ('povrće');

insert into tags (tag)
values ('meso'), ('riba'), ('povrće');

insert into jezici (jezik)
values ('hrvatski'), ('engleski'), ('njemački');

insert into jela (kategorija, sastojci, tag, jezik)
values (1,1,1,1);