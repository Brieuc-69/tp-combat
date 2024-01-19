<?php

class Monster {
    private $monstre;
    private $health_point = 100;


    public function getNom() {
        return $this->monstre;

    }


    public function getHealth_point() {
        return $this->health_point;
    }

    
    public function setNom($monstre) {
        $this->monstre = $monstre;
    }

    public function setHealth_point($health_point) {
        $this->health_point = $health_point;
    } 

    public function hit(Monster $monster) {
        $damage = rand(0,50);
        $monsterpointdevie = $monster->getHealth_point();
        $monster->setHealth_point($monsterpointdevie-$damage);

        return $damage;








}

}


?>