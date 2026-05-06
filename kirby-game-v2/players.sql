CREATE DATABASE IF NOT EXISTS kirby_game_v2 CHARACTER SET utf8mb4 ;
USE kirby_game_v2 ;

CREATE TABLE players(
    id      INT PRIMARY KEY AUTO_INCREMENT,
    name    VARCHAR(20) NOT NULL,
    hero_id INT NOT NULL,
    FOREIGN KEY (hero_id) REFERENCES heroes(id)
);