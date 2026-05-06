<?php
require 'stage.php';
$pdo = require 'db.php';

$heroStmt = $pdo->query("SELECT * FROM heroes");
$heroes = $heroStmt->fetchAll();

echo " \n ＝＝＝＝＝＝＝卡比大冒險＝＝＝＝＝＝＝\n";
echo " 請選擇你的職業： \n  ";
foreach ($heroes as $heroOption){
    echo " [{$heroOption['id']}] {$heroOption['emoji']} {$heroOption['job']} HP : {$heroOption['hp']} ATK : {$heroOption['attack']} DEF : {$heroOption['defense']} - {$heroOption['desc_text']} \n ";
}
echo " \n 請輸入角色名稱：";
$playerName = trim(fgets(STDIN));

echo " \n 請選擇職業的編碼 ： ";
$heroId = (int)trim(fgets(STDIN));
$heroRow = null;
foreach ($heroes as $heroOption){
    if ((int)$heroOption['id'] === $heroId){
        $heroRow = $heroOption;
        break;
    }
}
if (!$heroRow){
    die("無效職業編號，遊戲結束。 \n");
}

$insertStmt = $pdo->prepare("INSERT INTO players (name, hero_id) VALUES (?, ?)");
$insertStmt->execute([$playerName, $heroId]);

$heroRow['name'] = $playerName;
$hero = Hero::fromDB($heroRow);

echo "\n{$heroRow['emoji']} {$hero->job} 「{$hero->name}」準備出發！\n";

$stageStmt = $pdo->query("SELECT * FROM stages ORDER BY id");
$stages = $stageStmt->fetchAll();
$monsterStmt = $pdo->prepare("SELECT * FROM monsters WHERE stage_id = ? ORDER BY id");
foreach ($stages as $stageRow) {
    $monsterStmt->execute([$stageRow['id']]);
    $monsterRows = $monsterStmt->fetchAll();

    $monsters = [];
    foreach ($monsterRows as $row) {
        $monsters[] = Monster::fromDB($row);
    }
    $stage = new Stage($stageRow['id'], $stageRow['name'], $monsters);
    $stage->play($hero);

    if (!$hero->isAlive()) {
        break;
    }
}

if ($hero->isAlive()) {
    echo "\n 恭喜 {$hero->name} 通關所有關卡！\n";
}

?>