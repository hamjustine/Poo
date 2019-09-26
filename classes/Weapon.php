<?php

class Weapon
{
    // Attributs
    private $name;
    public $minDamage;
    public $maxDamage;
    public $speed;
    
    // Getters
    public function getMinDamage(): ?int
    {
        return $this->minDamage;
    }

    public function getMaxDamage(): ?int
    {
        return $this->maxDamage;
    }

    public function getSpeed(): ?string
    {
        return $this->speed;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    // Setters
    public function setMinDamage($minDamage)
    {
        $this->minDamage = $minDamage;
    }

    public function setmaxDamage($maxDamage)
    {
        $this->maxDamage = $maxDamage;
    }

    public function setSpeed($speed)
    {
        $this->speed = $speed;
    }

    public function setName($name)
    {
        $this->name = $name;
    }


    // Construct
    public function __construct(string $name, int $speed, int $minDamage, int $maxDamage)
    {
        $this->setName($name);
        $this->setSpeed($speed);
        $this->setminDamage($minDamage);
        $this->setmaxDamage($maxDamage);
    }
}
