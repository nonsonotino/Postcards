create database postcards;
use postcards;

-- Tables Section
-- _____________ 

create table USER (
     username char(20) not null,
     email varchar(200) not null,
     password varchar(255) not null,
     profilePicture varchar(200) DEFAULT '../uploads/profile_default.jpg',
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

create table if not exists NOTIFICATION (
    id INT NOT NULL AUTO_INCREMENT,
    timeStamp TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    type INT NOT NULL CHECK (type IN (1, 2, 3)),
    readState BOOLEAN NOT NULL DEFAULT FALSE,
    sender VARCHAR(25) NOT NULL,
    receiver VARCHAR(25) NOT NULL,
    postcardId INT,
    PRIMARY KEY (id),
    CONSTRAINT REF_NOTIF_SENDER_FK FOREIGN KEY (sender) REFERENCES USER(username) ON DELETE CASCADE,
    CONSTRAINT REF_NOTIF_RECEIVER_FK FOREIGN KEY (receiver) REFERENCES USER(username) ON DELETE CASCADE,
    CONSTRAINT REF_NOTIF_POST_FK FOREIGN KEY (postcardId) REFERENCES POSTCARD(idPostCard) ON DELETE CASCADE
);

create table FRIENDSHIP (
     usernameReceiver char(20) not null,
     usernameSender char(20) not null,
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
