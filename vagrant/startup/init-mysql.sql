CREATE USER 'bbcg'@'localhost' IDENTIFIED BY 'bbcg';
CREATE DATABASE bbcg CHARACTER SET utf8 COLLATE utf8_general_ci;
GRANT ALL PRIVILEGES ON bbcg.* TO 'bbcg'@'localhost';
FLUSH PRIVILEGES;