create database postcards;
use postcards;

-- Tables Section
-- _____________ 

create table USER (
     username varchar(20) not null,
     email varchar(200) not null,
     password varchar(30) not null,
     profilePicture varchar(200),
     constraint IDUSER primary key (username));

create table POSTCARD (
     idPostCard int not null AUTO_INCREMENT,
     timeStamp date not null,
     location varchar(60) not null,
     image varchar(200) not null,
     caption varchar(200) not null,
     username varchar(20) not null,
     constraint IDPOSTCARD primary key (idPostCard));

create table COMMENT (
     idComment int not null AUTO_INCREMENT,
     text varchar(100) not null,
     timeStamp date not null,
     username varchar(20) not null,
     idPostCard int not null,
     constraint IDCOMMENT primary key (idComment));

create table NOTIFICATION (
     idNotification int not null AUTO_INCREMENT,
     timeStamp date not null,
     type int not null,
     username varchar(20) not null,
     constraint IDNOTIFICATION primary key (idNotification));

create table FRIENDSHIP (
     usernameReceiver varchar(20) not null,
     usernameSender varchar(20) not null,
     constraint IDFRIENDSHIP primary key (usernameSender, usernameReceiver));

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
