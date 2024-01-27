create database postcards;
use postcards;

-- Tables Section
-- _____________ 

create table USER (
     username char(20) not null,
     email varchar(200) not null,
     password varchar(30) not null,
     profilePicture varchar(200) DEFAULT 'profile_default.jpg',
     constraint IDUSER primary key (username));

create table POSTCARD (
     idPostCard int not null AUTO_INCREMENT,
     timeStamp date not null DEFAULT CURRENT_TIMESTAMP,
     location varchar(60) not null,
     image varchar(200) not null,
     caption varchar(200) not null,
     username char(20) not null,
     constraint IDPOSTCARD primary key (idPostCard));

create table COMMENT (
     idComment int not null AUTO_INCREMENT,
     text varchar(100) not null,
     timeStamp date not null default CURRENT_TIMESTAMP,
     username char(20) not null,
     idPostCard int not null,
     constraint IDCOMMENT primary key (idComment));

create table NOTIFICATION (
     idNotification int not null AUTO_INCREMENT,
     timeStamp date not null default CURRENT_TIMESTAMP,
     type int not null,
     username char(20) not null,
     constraint IDNOTIFICATION primary key (idNotification));

create table FRIENDSHIP (
     usernameReceiver char(20) not null,
     usernameSender char(20) not null,
     constraint IDFRIENDSHIP primary key (usernameSender, usernameReceiver));

create user 'sec_user'@'localhost' identified by '62L5LaaWysx4';
grant select, insert, update on 'postcards'.* to 'sec_user'@'localhost';

-- Constraints Section
-- ___________________ 

alter table COMMENT add constraint FKwrites
     foreign key (username)
     references USER (username);

alter table COMMENT add constraint FKrel
     foreign key (idPostCard)
     references POSTCARD (idPostCard);

alter table FRIENDSHIP add constraint FKasks
     foreign key (usernameSender)
     references USER (username);

alter table FRIENDSHIP add constraint FKreceive
     foreign key (usernameReceiver)
     references USER (username);

alter table NOTIFICATION add constraint FKreceives
     foreign key (username)
     references USER (username);

alter table POSTCARD add constraint FKshares
     foreign key (username)
     references USER (username);
