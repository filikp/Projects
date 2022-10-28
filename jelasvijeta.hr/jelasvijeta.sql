# C:\xampp\mysql\bin\mysql -uroot --default_character_set=utf8  < C:\Users\Kleep\Documents\GitHub\Projects\jelasvijeta.hr\jelasvijeta.sql

drop database if exists jelasvijeta;
create database jelasvijeta default charset utf8mb4;
use jelasvijeta;

create table jela(
    id int not null primary key auto_increment,
    naziv varchar(50) not null,
    kategorije int,
    tags int not null
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

create table sastojciujelima(
    id int not null primary key auto_increment,
    jela int not null,
    sastojci int not null,
    jezici int
);

alter table jela add foreign key (kategorije) references kategorije(id);
alter table jela add foreign key (tags) references tags(id);
alter table sastojciujelima add foreign key (jela) references jela(id);
alter table sastojciujelima add foreign key (sastojci) references sastojci(id);
alter table sastojciujelima add foreign key (jezici) references jezici(id);

insert into sastojci (sastojak)
values ('sastojak1'), ('sastojak2'), ('sastojak3');

insert into kategorije (kategorija)
values ('kategorija1'), ('kategorija2'), ('kategorija3');

insert into tags (tag)
values ('tag1'), ('tag2'), ('tag3');

insert into jezici (jezik)
values ('hrv'), ('eng'), ('de');

insert into jela (naziv, kategorije, tags)
values ('Prase',1,1), ('Burek',3,3);

insert into sastojciujelima (jela, sastojci, jezici)
values (1,1,1), (1,2,1), (1,3,2), (2,1,2), (2,3,3)