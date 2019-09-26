<?php

final class Mage extends Character{
    public $cost;
    public $actualMana;
    public function __construct(string $name, int $health, int $resources, weapon $weapon)
    {
        parent::__construct($name,$health,$resources,$weapon);
        $this->actualMana=0;
    }
    public function setActualMana($actualMana)
    {
        $this->actualMana = $actualMana;
    }
    public function getActualMana(): ?int
    {
        return $this->actualMana;
    }
    public static function speak(){
        echo "Par la puissance des arcanes !";
    }

    public function hit():int {
        if($this->actualMana == 40){
            $this->setActualMana(0);
            echo  $this->name." Lance un éclair de givre !</br>";
            return 25;
        }else{
            $damage = rand($this->weapon->minDamage, $this->weapon->maxDamage);
            echo $this->name." inflige ".$damage." de dégats.</br>";
            $this->setActualMana($this->actualMana + 10);
            return $damage;
            
        }
    }

    
    public function takeDamage(int $damage){
        $this->setHealth($this->health - $damage);
        echo " Pv restant à ".$this->name." : ".$this->health."</br>";
        if ($this->health <= 0){
            $this->death();
        }
    }
}