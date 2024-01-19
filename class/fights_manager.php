<?php

class FightsManager {

    private $monster;

    public function createMonster() {
   
        $monster = new Monster("Dragon", 100);
        $this->monster = $monster;
        echo "Un monstre a été créé : " . $monster->getNom() . " avec " . $monster->getHealth_Point() . " points de vie.\n";
    }

    public function fight() {
        
    }




$heroesManager = new HeroesManager ($db);


    $heroId = isset($_POST['hero_id']) ? intval($_POST['hero_id']) : 0;
    

    $hero = $heroesManager->find($heroId);
    

    $fightManager = new FightManager();
    

    $fightManager->createMonster();
    
  
    $fightManager->fight($hero, $fightManager->getMonster());
    

    $heroesManager->update($hero);
    


    


}
?>