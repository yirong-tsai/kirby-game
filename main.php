<?php
require 'stage_test.php';
$pdo = require 'db.php';

// ANSI 顏色
$B = "\033[1m";    //粗體
$C = "\033[36m";   //青色（cyan) 文字
$G = "\033[32m";   //綠色文字
$Y = "\033[33m";   //黃色文字
$Red = "\033[31m"; //紅色文字
$R = "\033[0m";    //重置（恢復預設顏色）
// ============================================================
// 選擇職業畫面
// ============================================================
echo "\n";
echo "{$B}{$Red} ##############################{$R}\n";
echo "{$B}{$Red} #      ✦  卡比對戰遊戲  ✦    #{$R}\n";
echo "{$B}{$Red} #                            #{$R}\n";
echo "{$B}{$Red} #         選擇理想職業       #{$R}\n";
echo "{$B}{$Red} ##############################{$R}\n";
echo "\n";

// 從 DB 讀取職業清單
$heroRows = $pdo->query("SELECT * FROM heroes ORDER BY id")->fetchAll();
foreach ($heroRows as $row) {
    echo "  {$G}{$row['id']}.{$R} {$row['name']}  HP:{$row['hp']}  攻擊:{$row['attack']}  防禦:{$row['defense']}\n";
}
echo "\n";
echo "  請輸入數字（1-5）：";

$input = trim(fgets(STDIN));
echo "請輸入你的名字";
$heroName = trim(fgets(STDIN));


// 從 DB 讀取選擇的職業
$stmt = $pdo->prepare("SELECT * FROM heroes WHERE id = ?");
$stmt->execute([$input]);
$heroRow = $stmt->fetch();
if (!$heroRow) $heroRow = $heroRows[0]; // 輸入錯誤時預設第一個職業

$hero = Hero::fromDB($heroName, $heroRow);

echo " \n {$B}{$C} 卡比出發囉！！{$R}";
$hero->status();

// ============================================================
// 建立關卡
// ============================================================
// 從 DB 讀取怪物
$monsterRows = $pdo->query("SELECT * FROM monsters ORDER BY id")->fetchAll();
$monsters = array_map(fn($row) => Monster::fromDB($row), $monsterRows);

$stages = [
    new stage(1, '菇菇平原', [$monsters[0], $monsters[0], $monsters[1]]),
    new stage(2, '肥肥沼澤',  [$monsters[2], $monsters[2], $monsters[3]]),
];

// ============================================================
// 跑關卡
// ============================================================
foreach ($stages as $stage){
    $stage -> play($hero);
    if ($hero->hp <=0){
        break;
    }
    echo " \n  {$G} 目前 HP : {$R}" .$hero->hpBar()."\n";
}

if ($hero->hp >0){
    echo "\n";
    echo " {$B}{$G}  =========================={$R}\n";
    echo " {$B}{$G}  ║   恭喜！！通過所有關卡  ║{$R}\n";
    echo " {$B}{$G}. =========================={$R}\n";
    echo "\n";
}


?>