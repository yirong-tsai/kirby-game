<?php
require_once 'hero.php';
require_once 'monster.php';

class Stage {
    public int $id ;
    public string $name;
    public array $monsters;

    public function __construct(int $id , string $name , array $monsters){
        $this -> id       = $id;
        $this -> name     = $name;
        $this -> monsters = $monsters;
    }
    public function play (Hero $hero) : void {
        echo " \n ======第{$this->id}關 : {$this->name}======\n" ;
        foreach ($this->monsters as $monster ){
            echo " \n 遭遇到怪物 : {$monster->name} !! \n" ;
            $this->fight ($hero, $monster);
            if (! $hero->isAlive()){
                echo " \n {$hero->name} 陣亡了！！ 遊戲結束。 \n " ;
                return;
            }
        }
        echo " \n 第{$this->id} 關通過 ! 所有怪物被打敗！！ \n";
    }
    private function fight( Hero $hero , Monster $monster):void{
        while ($hero->isAlive() && $monster -> isAlive()){
            $monster -> takeDamage($hero->attack);
            $this->printStatus($hero,$monster ,"{$hero->name} 攻擊 {$monster->name}");
            if ( ! $monster->isAlive()){
                echo "\n {$monster->name} 被擊敗 \n";
                break;
            }
            $hero->takeDamage($monster->attack);
            $this->printStatus($hero,$monster ,"{$monster->name} 反擊 {$hero->name}");
        }
    }
    private function printStatus (Hero $hero , Monster $monster , string $action ):void {
        echo "\n {$action} !! \n";
        echo "{$hero->name}" . $hero->hpbar() ."\n";
        echo "{$monster->name}" . $monster->hpbar() ."\n";
    }
}
?>