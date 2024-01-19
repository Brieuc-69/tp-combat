<?php

require_once('./config/autoload.php');
require_once('./config/db.php');



$heroesManager = new HeroesManager($db); 

if(isset($_POST['hero_id'])) {
    $hero=$heroesManager->find($_POST['hero_id']);
}




?>