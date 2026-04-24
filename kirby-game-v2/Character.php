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
    public function takeDamage(int $damage):void{
        $actualDamage = max( 0, $damage - $this ->defense );
        $this -> hp = max( 0, $this-> hp - $actualDamage );
    }
    //hp>0 存活
    public function isAlive():bool{
        return $this -> hp >0;
    }
    protected function buildHpBar(string $color):string {
        if ($this ->maxHp > 0){
            $ratio = $this->hp / $this-> maxHp;
        } else {
            $ratio =0 ;
        }
        $filled =  (int)round ($ratio * HP_BAR_LENGTH);
        $bar = str_repeat('█', $filled) . str_repeat('░', HP_BAR_LENGTH - $filled);
        $isDanger = $ratio < HP_DANGER_THRESHOLD;
        if ($isDanger){
            $displayColor = COLOR_DANGER;
        }else{
            $displayColor = $color;
        }
        return " {$displayColor}「{$bar}」" . COLOR_RESET . "{$this->hp}/{$this->maxHp}";
        
    }

}
?>