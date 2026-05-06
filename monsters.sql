CREATE DATABASE IF NOT EXISTS kirby_game CHARACTER SET utf8mb4;
USE kirby_game;

CREATE TABLE monsters(
    id        INT PRIMARY KEY,
    name      VARCHAR(20),
    type      VARCHAR(10),
    hp        INT,
    attack    INT,
    defense   INT
);

INSERT INTO monsters VALUES
(1,'菇菇仔','雜兵',20,5,0),
(2,'菇菇寶貝','BOSS',80,15,5),
(3,'肥肥','雜兵',40,10,3),
(4,'緞帶肥肥','BOSS',150,25,10)