CREATE DATABASE IF NOT EXISTS kirby_game_v2 CHARACTER SET utf8mb4;
USE kirby_game_v2;

CREATE TABLE stages(
    id    INT PRIMARY KEY,
    name  VARCHAR(30)
);

INSERT INTO stages VALUES
(1,'🍄 菇菇平原'),
(2,'🌊 肥肥海岸'),
(3,'🕳️ 神秘洞窟');