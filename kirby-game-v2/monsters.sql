CREATE DATABASE IF NOT EXISTS kirby_game_v2 CHARACTER SET utf8mb4;
USE kirby_game_v2;

CREATE TABLE monsters(
    id        INT PRIMARY KEY,
    stage_id  INT,
    name      VARCHAR(20),
    hp        INT,
    attack    INT,
    defense   INT
    FOREIGN KEY (stage_id) REFERENCES stages(id)
);

INSERT INTO monsters VALUES
(1, 1, '菇菇寶貝', 40, 18, 5),
(2, 2, '緞帶肥肥', 55, 25, 10),
(3, 3, '百變怪', 65, 28, 14);