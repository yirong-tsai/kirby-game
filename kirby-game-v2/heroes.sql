CREATE DATABASE IF NOT EXISTS kirby_game_v2 CHARACTER SET utf8mb4;
USE kirby_game_v2;

CREATE TABLE heroes(
	id  INT PRIMARY KEY,
	job VARCHAR(20),
	emoji VARCHAR(10),
	hp INT,
	attack INT,
	defense INT,
	desc_text VARCHAR(50)
);
INSERT INTO heroes VALUES
(1,'劍士','⚔️',120,30,15,'均衡型劍士'),
(2,'弓箭手','🏹',100,35,10,'高攻擊速攻'),
(3,'魔法師','🪄',70,50,8,'超高傷害輸出'),
(4,'聖騎士','🛡️',130,25,20,'最強防禦坦克'),
(5,'暗影刺客','🪃',90,45,6,'高風險高回報');