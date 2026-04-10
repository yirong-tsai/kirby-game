<?php

require_once 'character.php'; 

// ============================================================
// 父類別：英雄 (Hero)
// ============================================================
class Hero extends AbstractCharacter {
    public string $job;

    public function __construct(string $name, string $job, int $hp, int $attack, int $defense) {
        parent::__construct($name, $hp, $attack, $defense);
        $this->job = $job;
    }

    public function status(): void {
        $B = "\033[1m";
        $C = "\033[36m";
        $R = "\033[0m";
        echo "\n{$B}{$C}【{$this->job}】{$this->name}{$R}\n";
        echo "  HP  " . $this->hpBar() . "\n";
        echo "  攻擊：{$this->attack}  防禦：{$this->defense}\n";
    }
}

// ============================================================
// 子類別：劍士 (Swordsman)
// ============================================================
class Swordsman extends Hero {
    public function __construct(string $name) {
        parent::__construct($name, '劍士', hp: 120, attack: 30, defense: 15);
    }
}

// ============================================================
// 子類別：弓箭手 (Archer)
// ============================================================
class Archer extends Hero {
    public function __construct(string $name) {
        parent::__construct($name, '弓箭手', hp: 100, attack: 35, defense: 10);
    }
}

// ============================================================
// 子類別：魔法師 (Mage)
// ============================================================
class Mage extends Hero {
    public function __construct(string $name) {
        parent::__construct($name, '魔法師', hp: 70, attack: 50, defense: 8);
    }
}

// ============================================================
// 子類別：聖騎士 (Paladin)
// ============================================================
class Paladin extends Hero {
    public function __construct(string $name) {
        parent::__construct($name, '聖騎士', hp: 130, attack: 25, defense: 20);
    }
}

// ============================================================
// 子類別：暗影刺客 (ShadowAssassin)
// ============================================================
class ShadowAssassin extends Hero {
    public function __construct(string $name) {
        parent::__construct($name, '暗影刺客', hp: 90, attack: 45, defense: 6);
    }
}
