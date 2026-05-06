<?php
require_once 'character.php' ;

class Monster extends AbstractCharacter{

    public function __construct(string $name, int $hp, int $attack, int $defense){
        parent::__construct($name, $hp, $attack, $defense);
    }

    public function hpbar(): string{
        return $this -> buildHpBar(COLOR_MONSTER);
    }
    public static function fromDB(array $row): static{
        return new static ($row['name'],$row['hp'],$row['attack'],$row['defense']);
    }
}
?>