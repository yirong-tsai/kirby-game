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

    public static function fromDB(array $row): static {
        return new static($row['name'], $row['type'], $row['hp'], $row['attack'], $row['defense']);
    }

    public function status(): void {
        echo "【{$this->type}】{$this->name}\n";
        echo "  HP：{$this->hp}  攻擊：{$this->attack}  防禦：{$this->defense}\n";
    }
}
