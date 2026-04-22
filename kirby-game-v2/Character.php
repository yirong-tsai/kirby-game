<?php
abstract class AbstractCharacter {
    public string $name;
    public int $hp;
    public int $maxHp;
    public int $attack;
    public int $defense;

    public function __construct( string $name, int $hp, int $attack,int $defense)
    {
        $this -> name    =   $name;
        $this -> hp      =   $hp;
        $this -> maxHp   =   $hp;
        $this -> attack  =   $attack;
        $this -> defense =   $defense; 
    }
    //血條
    abstract public function hpbar():string ;

    //受到傷害
    public function takeDamage(int $damage){

    }
    //hp>0 存活
    public function isAlive():bool{
        return $this -> hp >0;
    }
}
?>