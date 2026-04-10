<?php


require 'hero.php';
require 'monster.php';
// ============================================================
// 關卡 (Stage)
// ============================================================
class stage{
    public int $id; //第 ？ 關卡
    public string $name; // 關卡名稱
    public array $monsters; 

    public function __construct(int $id,string $name,array $monsters){
        $this->id       = $id;
        $this->name     = $name;
        $this->monsters = $monsters;
    }

    public function play(Hero $hero):void{
        echo "\n=======第{$this->id}關 : {$this->name}========\n";

        foreach ($this->monsters as $monster){
            echo "遭遇 『{$monster->type}』{$monster->name}!!\n";
            // 輪流攻擊，直到其中一方 HP 歸零
            while ($hero->hp > 0 && $monster->hp >0){
                //英雄攻擊怪物
                $dmg = max(0,$hero->attack - $monster->defense);
                $monster->hp -=$dmg;
                echo "{$hero->name} 攻擊 {$monster->name} ， 造成{$dmg} 點傷害 (怪物剩餘 HP : {$monster->hp})\n";
                if ($monster->hp <= 0){
                    echo "{$monster->name} 被擊敗\n";
                    break;
                }
                //怪物攻擊英雄
                $dmg = max(0,$monster->attack - $hero->defense );
                $hero->hp -= $dmg;
                echo "{$monster->name} 反擊 {$hero->name} ，造成 {$dmg} 點傷害 (英雄剩餘 HP : {$hero->hp})\n";
                if ($hero->hp <= 0){
                    echo "\n {$hero->name} 陣亡，遊戲結束!! \n";
                    return;
                }
            }
        }
        echo "通關!! {$this->name} 完成\n。";

    }
}



?>