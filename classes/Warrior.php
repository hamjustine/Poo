<?php

class Warrior extends Character{

    public $rage;
    public $actualRage;
    public $isBerserk;

    public function __construct(string $name, int $health, int $resources, weapon $weapon)
    {
        parent::__construct($name,$health,$resources,$weapon);
        $this->isBerserk = false;
        $this->actualRage=0;
        $this->rage = $this->getResources();
    }
    public function setActualRage($actualRage)
    {
        $this->actualRage = $actualRage;
    }
    public static function speak(){
        echo "GREAAAR";
    }
    public function hit():int {
        if($this->isBerserk == false){
            if ($this->actualRage >= $this->rage){
                $this->setActualRage(0);
                echo  $this->name." Entre en mode Berserk</br>";
                $turn = 0;
                $this->isBerserk = true;
            }
            $damage = rand($this->weapon->minDamage, $this->weapon->maxDamage);
            echo $this->name." inflige ".$damage." de dégats.</br>";
            $this->setActualRage($this->actualRage + $damage);
            return $damage;
        }
        if($this->isBerserk == true){

            $turn = $turn++;
            $damage = rand($this->weapon->minDamage, $this->weapon->maxDamage);
            $damage = $damage*2;
            echo $this->name." inflige ".$damage." de dégats.</br>";
            if($turn = 3){
                echo "fin du mode Berserk</br>";
                $this->isBerserk=false;
            }
            return $damage;
        }
    }

    
    public function takeDamage(int $damage){
        $this->setHealth($this->health - $damage);
        $this->setActualRage($damage);
        echo " Pv restant à ".$this->name." : ".$this->health."</br>";
        if ($this->health <= 0){
            $this->death();
        }
    }
}