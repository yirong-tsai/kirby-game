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


    public static function fromDB(string $name,array $row): static {
        return new static($name,$row['name'], $row['hp'], $row['attack'], $row['defense']);
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
