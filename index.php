<?php


// Autoloader pour charger toutes les classes du dossier "classes"
function loadClasses($class) { 
    require './classes/' . $class . '.php';
} 
spl_autoload_register('loadClasses');

$Deuillegivre = new Weapon("Deuillegivre",2,4,15);
$Atiesh = new Weapon("Atiesh",1,1,5);
$Arthas = new Warrior("Arthas", 30, Character::LOW_MANA, $Deuillegivre);
$Medivh = new Mage("Medivh",25,40,$Atiesh);

function startFight(Character $J1, Character $J2){
    $turn = 1;
    while ($J1->isAlive == true && $J2->isAlive == true){
        echo "Tour ".$turn."</br>";
        $turn+=1;
        $dmg = $J1->hit();
        if($J2->isAlive==true){
        $dmg= $J2->hit();
        }
    }


}
$Arthas->startFight($Medivh);
$Medivh->startFight($Arthas);
Warrior::speak(); 