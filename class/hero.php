<?php


    class Hero {

        private $id;

        private $image;
       
        private $nom;
    
        private $health_point;

        private $class;
    
        public function __construct($nom , $image) {
            $this->nom = $nom;
            $this->image = $image;
          
        }
    

        public function frapperMonstre() {
            echo $this->nom . " frappe le monstre!\n";
          
        }
    
 
        public function getNom() {
            return $this->nom;
        }
    
        public function getHealthPoint() {
            return $this->health_point;
        }

        public function getID() {

            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function setHealtPoint($health_point) {
            $this->health_point = $health_point;
        }

        public function setImage($image) {
            $this->image = $image;
        }

        public function getImage() {
            return $this->image;
        }

        public function getClass() {
            return $this->class;
        }

        public function setClass($class) {
            $this->class = $class;
        }

        public function hit(Monster $monster) {
            $damage = rand(0,50);
            $monsterpointdevie = $monster->getHealth_point();
            $monster->setHealth_point($monsterpointdevie-$damage);

            return $damage;



        }


    
    }
    
   
    // $monHero = new Hero("SuperHéros", 100);
    // echo "Nom du héros : " . $monHero->getNom() . "\n";
    // echo "Points de vie du héros : " . $monHero->getHealthPoint() . "\n";
    // $monHero->frapperMonstre();
    
    ?>
    
  

?>