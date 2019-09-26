<?php

abstract class Character
{
    // Attributs
    protected $name;
    protected $health;
    protected $resources;
    protected $weapon;
    protected $oponent;
    protected $isInFight;
    protected $isAlive;

    const LOW_MANA = 0;
    
    // Getters
    public function getHealth(): ?int
    {
        return $this->health;
    }

    public function getResources(): ?int
    {
        return $this->resources;
    }

    public function getWeapon(): ?weapon
    {
        return $this->weapon;
    }

    public function getName(): ?string
    {
        return $this->name;
    }
    public function getAlive(): ?bool
    {
        return $this->isAlive;
    }
    public function getFightStatut(): ?bool
    {
        return $this->isInFight;
    }

    // Setters
    public function setOponent($oponent)
    {
        $this->oponent = $oponent;
    }

    public function setHealth($health)
    {
        $this->health = $health;
    }

    public function setResources($resources)
    {
        $this->resources = $resources;
    }

    public function setWeapon($weapon)
    {
        $this->weapon = $weapon;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
    public function setAlive($isAlive)
    {
        $this->isAlive = $isAlive;
    }
    public function setFightStatut($isInFight)
    {
        $this->isAlive = $isInFight;
    }


    // Construct
    public function __construct(string $name, int $health, int $resources, weapon $weapon)
    {
        $this->setName($name);
        $this->setHealth($health);
        $this->setResources($resources);
        $this->setWeapon($weapon);
        $this->setFightStatut(false);
        $this->setAlive(true);
    }
    abstract public function hit():int;
    abstract public static function speak();
    abstract public function takeDamage(int $damage);

    public function startFight(Character $oponent){
        $this->isInFight = true;
        $this->oponent = $oponent;
        echo $this->name." rentre en combat contre ".$oponent->name."</br>";
        $dmg = $this->hit();
        if ($dmg > 0){
            $this->oponent->takeDamage($dmg);
        }
    }

    public function stopFight(){
        if($this->isInFight == true){
            echo  $this->name." a terminé son combat contre".$this->oponent->name."</br>";
            $this->setOponent('');
            $this->setFightStatut(false);
        }

    }
    // public function coolDown(){
    //     while ($isInFight = true){
    //         $time = time();
    //         if ($time = $this->weapon->speed){
    //             $this->hit();
    //         };
    //     };
    // }



    public function death(){
        $this->setAlive(false);
        $this->setFightStatut(false);
        echo $this->name." meurt";
    }
}
