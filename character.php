<?php
// ============================================================
// 抽象父類別：角色 (AbstractCharacter)
// Hero 和 Monster 共用的屬性和方法
// ============================================================

abstract class AbstractCharacter {
    public string $name;
    public int $hp;
    public int $maxHp;
    public int $attack;
    public int $defense;

    public function __construct(string $name , int $hp , int $attack , int $defense){
        $this->name    = $name; 
        $this->hp      = $hp;
        $this->maxHp   = $hp;  // 建立時記住最大 HP
        $this->attack  = $attack;
        $this->defense = $defense;
    }
// HP 血條（文字血條 + ANSI 顏色）
    public function hpBar(): string {
        $ratio  = $this->maxHp > 0 ? max(0, $this->hp) / $this->maxHp : 0;
                       
        $filled = (int) round($ratio * 10);  
        $empty  = 10 - $filled;
        $bar    = str_repeat('█', $filled) . str_repeat('░', $empty);

        if ($ratio > 0.5) {
            $color = "\033[32m";   // 綠色：HP 充足
        } elseif ($ratio > 0.2) {
            $color = "\033[33m";   // 黃色：HP 偏低
        } else {
            $color = "\033[31m";   // 紅色：HP 危險
        }
        $reset = "\033[0m";
        $hp    = max(0, $this->hp);
        return "{$color}[{$bar}] {$hp}/{$this->maxHp}{$reset}";
    }

//共用：普通攻擊
    public function normalAttack(): string {
        return " {$this->name} 發動攻擊 , 造成 {$this->attack} 點傷害" ;
    }
//共用：是否存活
    public function isAlive(): bool{
        return  $this->hp >0 ;
    }
//共用：顯示狀態
    abstract public function status():void;
}


?>