<?php

require_once 'character.php';

// ============================================================
// 父類別：怪物 (Monster)
// ============================================================
class Monster extends AbstractCharacter {
    public string $type;

    public function __construct(string $name, string $type, int $hp, int $attack, int $defense) {
        parent::__construct($name, $hp, $attack, $defense);
        $this->type = $type;
    }

    public function status(): void {
        echo "【{$this->type}】{$this->name}\n";
        echo "  HP：{$this->hp}  攻擊：{$this->attack}  防禦：{$this->defense}\n";
    }
}

// ============================================================
// 第一關怪物
// ============================================================

class Waddle extends Monster {       // 菇菇仔（一般怪）
    public function __construct() {
        parent::__construct('菇菇仔', '雜兵', hp: 20, attack: 5, defense: 0);
    }
}

class WaddleBoss extends Monster {   // 菇菇寶貝（BOSS）
    public function __construct() {
        parent::__construct('菇菇寶貝', 'BOSS', hp: 80, attack: 15, defense: 5);
    }
}

// ============================================================
// 第二關怪物
// ============================================================

class Fatty extends Monster {        // 肥肥（一般怪）
    public function __construct() {
        parent::__construct('肥肥', '雜兵', hp: 40, attack: 10, defense: 3);
    }
}

class FattyBoss extends Monster {    // 緞帶肥肥（BOSS）
    public function __construct() {
        parent::__construct('緞帶肥肥', 'BOSS', hp: 150, attack: 25, defense: 10);
    }
}
