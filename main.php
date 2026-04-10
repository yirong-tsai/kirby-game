<?php
require 'stage_test.php';

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
echo "{$B}{$Red} #      ✦  卡比對戰遊戲  ✦      #{$R}\n";
echo "{$B}{$Red} #                            #{$R}\n";
echo "{$B}{$Red} #         選擇理想職業         #{$R}\n";
echo "{$B}{$Red} ##############################{$R}\n";
echo "\n";

echo "  {$G}1.{$R} 劍士     HP:120  攻擊:30  防禦:15\n";
echo "  {$G}2.{$R} 弓箭手   HP:100  攻擊:35  防禦:10\n";
echo "  {$G}3.{$R} 魔法師   HP:70   攻擊:50  防禦:8\n";
echo "  {$G}4.{$R} 聖騎士   HP:130  攻擊:25  防禦:20\n";
echo "  {$G}5.{$R} 暗影刺客  HP:90  攻擊:45  防禦:6\n";
echo "\n";
echo "  請輸入數字（1-5）：";

$input = trim(fgets(STDIN));
echo "請輸入你的名字";
$heroName = trim(fgets(STDIN));


$hero = match($input) {
    '1' => new Swordsman($heroName),
    '2' => new Archer($heroName),
    '3' => new Mage($heroName),
    '4' => new Paladin($heroName),
    '5' => new ShadowAssassin($heroName),
    default => new Swordsman($heroName),
};

echo " \n {$B}{$C} 卡比出發囉！！{$R}";
$hero->status();

// ============================================================
// 建立關卡
// ============================================================
$stages = [
    new stage(1 , '菇菇平原', [
        new Waddle(),
        new Waddle(),
        new WaddleBoss()
    ]),
    new stage(2 , '肥肥沼澤',[
        new Fatty(),
        new Fatty(),
        new FattyBoss(),
    ]),
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
    echo " {$B}{$G}  ======================={$R}\n";
    echo " {$B}{$G}  ║   恭喜！！通過所有關卡  ║{$R}\n";
    echo " {$B}{$G}. ======================={$R}\n";
    echo "\n";
}


?>