CREATE TABLE mls_listbooks_author (
  ID int(11) NOT NULL AUTO_INCREMENT COMMENT 'Content Cell',
  FIRST_NAME varchar(255) DEFAULT NULL COMMENT 'Content Cell',
  LAST_NAME varchar(255) DEFAULT NULL COMMENT 'Фамилия',
  SECOND_NAME varchar(255) DEFAULT NULL COMMENT 'Отчество',
  CITY varchar(255) DEFAULT NULL COMMENT 'Город проживания',
  PRIMARY KEY (ID)
)
ENGINE = INNODB,
CHARACTER SET utf8,
COLLATE utf8_unicode_ci;

insert  into mls_listbooks_author (ID, FIRST_NAME, LAST_NAME, SECOND_NAME, CITY) values (1, 'Андрей', 'Соловьев', 'Анатольевич', 'Екатеринбург');
insert  into mls_listbooks_author (ID, FIRST_NAME, LAST_NAME, SECOND_NAME, CITY) values (2, 'Сергей', 'Иванов', 'Юрьевич', 'Москва');
insert  into mls_listbooks_author (ID, FIRST_NAME, LAST_NAME, SECOND_NAME, CITY) values (3, 'Иван', 'Семёнов', 'Сергеевич', 'Москва');
insert  into mls_listbooks_author (ID, FIRST_NAME, LAST_NAME, SECOND_NAME, CITY) values (4, 'Пётр', 'Петров', 'Иванович', 'Казань');
insert  into mls_listbooks_author (ID, FIRST_NAME, LAST_NAME, SECOND_NAME, CITY) values (5, 'Андрей', 'Сидоров', 'Петрович', 'Москва');
insert  into mls_listbooks_author (ID, FIRST_NAME, LAST_NAME, SECOND_NAME, CITY) values (6, 'Владимир', 'Кочкин', 'Андреевич', 'Екатеринбург');
insert  into mls_listbooks_author (ID, FIRST_NAME, LAST_NAME, SECOND_NAME, CITY) values (7, 'Юрий', 'Пушкин', 'Сергеевич', 'Москва');
insert  into mls_listbooks_author (ID, FIRST_NAME, LAST_NAME, SECOND_NAME, CITY) values (8, 'Сергей', 'Чехов', 'Алексеевич', 'Казань');
insert  into mls_listbooks_author (ID, FIRST_NAME, LAST_NAME, SECOND_NAME, CITY) values (9, 'Алексей', 'Лермонтов', 'Юрьевич', 'Москва');
insert  into mls_listbooks_author (ID, FIRST_NAME, LAST_NAME, SECOND_NAME, CITY) values (10, 'Сергей', 'Осипов', 'Анатольевич', 'Москва');

CREATE TABLE mls_listbooks_publishing (
  ID int(11) NOT NULL AUTO_INCREMENT,
  TITLE varchar(255) DEFAULT NULL,
  CITY varchar(255) DEFAULT NULL,
  AUTHOR_PROFIT int(11) DEFAULT NULL,
  PRIMARY KEY (ID)
)
ENGINE = INNODB,
CHARACTER SET utf8,
COLLATE utf8_unicode_ci;

insert  into mls_listbooks_publishing (ID, TITLE, CITY, AUTHOR_PROFIT) values (1, 'Издательство 1', 'Москва', 10000);
insert  into mls_listbooks_publishing (ID, TITLE, CITY, AUTHOR_PROFIT) values (2, 'Издательство 2', 'Москва', 10000);
insert  into mls_listbooks_publishing (ID, TITLE, CITY, AUTHOR_PROFIT) values (3, 'Издательство 3', 'Екатеринбург', 8000);
insert  into mls_listbooks_publishing (ID, TITLE, CITY, AUTHOR_PROFIT) values (4, 'Издательство 4', 'Екатеринбург', 7000);


CREATE TABLE mls_listbooks_book (
  ID int(11) NOT NULL AUTO_INCREMENT COMMENT 'Уникальный ID записи',
  TITLE varchar(255) DEFAULT NULL COMMENT 'Название',
  YEAR varchar(255) DEFAULT NULL COMMENT 'Год издания',
  COPIES_CNT int(11) DEFAULT NULL COMMENT 'Тираж',
  PUBLISHINGID int(11) NOT NULL,
  PRIMARY KEY (ID)
)
ENGINE = INNODB,
CHARACTER SET utf8,
COLLATE utf8_unicode_ci;

insert  into mls_listbooks_book (ID, TITLE, YEAR, COPIES_CNT, PUBLISHINGID) values (1, 'Книга 1', '2020', 1000, 1);
insert  into mls_listbooks_book (ID, TITLE, YEAR, COPIES_CNT, PUBLISHINGID) values (2, 'Книга 2', '2020', 500, 2);
insert  into mls_listbooks_book (ID, TITLE, YEAR, COPIES_CNT, PUBLISHINGID) values (3, 'Книга 3', '2020', 7000, 1);
insert  into mls_listbooks_book (ID, TITLE, YEAR, COPIES_CNT, PUBLISHINGID) values (4, 'Книга 4', '2020', 1000, 3);
insert  into mls_listbooks_book (ID, TITLE, YEAR, COPIES_CNT, PUBLISHINGID) values (5, 'Книга 5', '2020', 500, 4);
insert  into mls_listbooks_book (ID, TITLE, YEAR, COPIES_CNT, PUBLISHINGID) values (6, 'Книга 6', '2020', 600, 4);

CREATE TABLE mls_listbooks_authorbook (
  ID int(11) NOT NULL AUTO_INCREMENT COMMENT 'Уникальный ID записи',
  BOOKID int(11) DEFAULT NULL,
  AUTHORID int(11) DEFAULT NULL,
  PRIMARY KEY (ID)
)
ENGINE = INNODB,
CHARACTER SET utf8,
COLLATE utf8_unicode_ci;

insert  into mls_listbooks_authorbook (BOOKID, AUTHORID) values (1, 2);
insert  into mls_listbooks_authorbook (BOOKID, AUTHORID) values (2, 1);
insert  into mls_listbooks_authorbook (BOOKID, AUTHORID) values (3, 3);
insert  into mls_listbooks_authorbook (BOOKID, AUTHORID) values (4, 4);
insert  into mls_listbooks_authorbook (BOOKID, AUTHORID) values (5, 5);
insert  into mls_listbooks_authorbook (BOOKID, AUTHORID) values (6, 6);
insert  into mls_listbooks_authorbook (BOOKID, AUTHORID) values (5, 7);
insert  into mls_listbooks_authorbook (BOOKID, AUTHORID) values (4, 8);
insert  into mls_listbooks_authorbook (BOOKID, AUTHORID) values (3, 9);
insert  into mls_listbooks_authorbook (BOOKID, AUTHORID) values (2, 10);
insert  into mls_listbooks_authorbook (BOOKID, AUTHORID) values (1, 1);
insert  into mls_listbooks_authorbook (BOOKID, AUTHORID) values (1, 4);
insert  into mls_listbooks_authorbook (BOOKID, AUTHORID) values (2, 3);
insert  into mls_listbooks_authorbook (BOOKID, AUTHORID) values (2, 4);
insert  into mls_listbooks_authorbook (BOOKID, AUTHORID) values (3, 5);
insert  into mls_listbooks_authorbook (BOOKID, AUTHORID) values (4, 1);
insert  into mls_listbooks_authorbook (BOOKID, AUTHORID) values (3, 1);
insert  into mls_listbooks_authorbook (BOOKID, AUTHORID) values (5, 2);
insert  into mls_listbooks_authorbook (BOOKID, AUTHORID) values (6, 4);
insert  into mls_listbooks_authorbook (BOOKID, AUTHORID) values (1, 6);
insert  into mls_listbooks_authorbook (BOOKID, AUTHORID) values (2, 9);