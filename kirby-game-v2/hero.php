<?php
require_once 'character.php' ;

class Hero extends AbstractCharacter{
    public string $job;

    public function __construct(string $name, string $job ,int $hp, int $attack, int $defense){
        parent::__construct($name, $hp, $attack, $defense);
        $this -> job = $job;
    }
    public function hpbar(): string{
        return $this -> buildHpBar(COLOR_HERO);
    }

}

?>