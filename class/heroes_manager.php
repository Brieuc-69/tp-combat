

<?php

class HeroesManager {

    private PDO $db;

    private array $herosvivants;



    public function __construct($db) {
        $this->db = $db;

    }
    

    public function findAllHerosManager($db) {
        $request = $this->db->query('SELECT * FROM heroes');
        $heroes = $request->fetchAll();
        // return $heroes;

    }

    public function add($hero){ 
        $request =$this->db->prepare("INSERT INTO heroes (name ,image) VALUES(:name, :image)");
        $request->execute([
            'name' => $hero->getNom(),
            'image'=> 'cell.gif' // $hero->getImage()-
        ]);
    
     
        $id = $this->db->lastInsertId();
    
    
        $hero->setId($id);
        // var_dump($hero);
    }


    public function findAllAlive() {

        $query = "SELECT * FROM heroes WHERE health_point > 0";
        $request = $this->db->query($query);
        $heros = $request->fetchAll();
        return $heros;
    }
    
    public function hydrateAllheroes(array $data) {

        foreach ($data as $hero) {
            $newHero = new Hero($hero['name'], $hero['image']);
            $newHero-> setHealtPoint($hero['health_point']);
            $newHero-> setId($hero['id']);
            $this->herosvivants[] = $newHero;

        }
    
        return $this->herosvivants;
      

    }


    public function find($id) {
        $request = $this->db->prepare('SELECT * FROM heroes WHERE id = :id');
        $newHero = $request->fetchAll();

        $hero = new Hero($newHero['name'], $newHero['class']);
        
        $hero->setHealth_point($newHero['health_point']);
        $hero->setId($newHero['id']);

        return $hero;
    }

    public function findAllAlive() {
        $request = $this->db->query('SELECT * FROM heroes WHERE health_point > 0');
        $allHeroesDb = $request->fetchAll(PDO::FETCH_ASSOC);

        $allHeroes = [];


        foreach ($allHeroesDb as $heroData) {
            $hero = new Hero($heroData['name'], $heroData['health_point']);
            $hero->setId($heroData['id']);
            $hero->setClass($heroData['class']);
            $allHeroes[] = $hero;
        }

        return $allHeroes;

