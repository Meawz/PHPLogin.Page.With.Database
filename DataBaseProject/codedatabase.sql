CREATE DATABASE login_db /* Create database */

CREATE TABLE Users (
    ID int,
    Name varchar(255),
    Email varchar(255),
    Password_hash(255)
) /* Create table inside the db */

ALTER TABLE users MODIFY ID int NOT NULL PRIMARY KEY AUTO_INCREMENT /* Modify table, auto increment on ID column */

ALTER TABLE `users` ADD UNIQUE(`Email`) /*  Modify table, UNIQUE INDEX on Email column */