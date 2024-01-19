<?php



include_once('./config/db.php');
include_once('./class/heroes_manager.php');
include_once('./class/hero.php');

$FindAllManager = new HeroesManager($db);
// if(isset($_POST['name']) && !empty ($_POST['name'])) {
//   // var_dump($_POST);
//   $hero = new Hero($_POST['name']);
//   $FindAllManager->add($hero);
// }


// var_dump($_Post);

$newHeroManager = new HeroesManager($db);


$listhero = $newHeroManager-> findAllAlive();
$herolist = $newHeroManager->hydrateAllheroes($listhero);
//var_dump($herolist);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./style.css">
    <title>tp-combat</title>
</head>
<body>
    
<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1">TP Jeu de Fight</span>
  </div>
</nav>
<div class ="image">
<form action="" method="post">
        <label for="nom">Nom du Héros :</label>
        <input type="text" id="nom" name="name" required>



        <button type="submit">Créer Héros</button>
    </form>

</div>


<section id="heroes_list" class="row justify-content-center gap-3">
    <?php foreach($herolist as $hero){?>
    
        <img src="./img/<?php echo $hero->getImage() ?>" alt="sylvanas">
        <div class="hero_card d-flex flex-column justify-content-center align-items-center">
        <h3><?= $hero->getNom()?></h3>
        <p> HP: <?= $hero->getHealthPoint()?></p>
        <form action="./class/fights.php" method="post">
            <input type="hidden" name="heroID" value="<?= $hero->getId()?>">
            <button type="submit" class="btn">Choisir</button>
        </form>
        </div>
    




    <?php } ?>














<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>