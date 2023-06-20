CREATE DATABASE login_db /* Creeaza baza de date */

CREATE TABLE Users (
    ID int,
    Name varchar(255),
    Email varchar(255),
    Password_hash(255)
) /* Creeaza tabelul cu date in db */

ALTER TABLE users MODIFY ID int NOT NULL PRIMARY KEY AUTO_INCREMENT /* Modifica tabelul, se pune auto incrementare pe coloana ID */

ALTER TABLE `users` ADD UNIQUE(`Email`) /* Modifica tabelul, se pune UNIQUE INDEX pe coloana Email */