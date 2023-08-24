<?php

require_once __DIR__.'/models/Chat.php';
require_once __DIR__.'/models/Chien.php';
require_once __DIR__.'/models/Personne.php';

session_start();
if(!isset($_SESSION['bob'])){
    $bob = new Personne('Bob', 'Programmeur', '1500');
    $chat = new Chat('Mitaine');
    $chien = new Chien('Roboto');
    $bob->adopterAnimal($chat);
    $bob->adopterAnimal($chien);
    $_SESSION['bob'] = $bob;
    $_SESSION['temps'] = new DateTime();
    $_SESSION['erreur'] = '';
}
$bob = $_SESSION['bob'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>La vie de Bob</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
<?php include __DIR__.'/views/components/header.php'?>
<main class="container">
    <h1 class="mt-0">Bob, Mitaine et Roboto</h1>
    <p><?= $_SESSION['temps']->format('d M Y H:i'); ?></p>
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
            <div class="card h-100">
                <img src="fichiers/Bob/profil.png" class="card-img-top img-fluid w-25" alt="Image Bob">
                <div class="card-body">
                    <h2 class="card-title">Bob</h2>
                    <div class="card-text">
                        <ul>
                            <li>Argent disponible : <?=  $bob->getCompte()/100 ?>$</li>
                            <li>Taux horaire : <?= $bob->getSalaire()/100 ?>$</li>
                            <li>Poste : <?= $bob->getTravail() ?></li>
                        </ul>
                        <form action="actions/travailler.php" name="travailler" method="post">
                            <button type="submit" class="btn btn-primary">Travailler 8h</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="fichiers/Mitaine/profil.png" class="card-img-top img-fluid w-25" alt="Image Mitaine">
                <div class="card-body">
                    <h2 class="card-title">Mitaine</h2>
                    <div class="card-text">
                        <ul>
                            <li>Dernier repas : <?= $bob->getAnimalParNom('Mitaine')->dernierRepas->format('d M Y H:i') ?></li>
                            <li>A faim : <?= $bob->getAnimalParNom('Mitaine')->isAFaim($_SESSION['temps']) ? 'oui' : 'non' ?></li>
                        </ul>
                        <form action="actions/nourrir.php" name="nourrirMitaine" method="post">
                            <input type="hidden" name="nom" value="Mitaine">
                            <button type="submit" class="btn btn-primary">Nourrir Mitaine</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="fichiers/Roboto/profil.png" class="card-img-top img-fluid w-25" alt="Image Roboto">
                <div class="card-body">
                    <h2 class="card-title">Roboto</h2>
                    <div class="card-text">
                        <ul>
                            <li>Dernier repas : <?= $bob->getAnimalParNom('Roboto')->dernierRepas->format('d M Y H:i') ?></li>
                            <li>A faim : <?= $bob->getAnimalParNom('Roboto')->isAFaim($_SESSION['temps']) ? 'oui' : 'non' ?></li>
                        </ul>
                        <form action="actions/nourrir.php" name="nourrirRoboto" method="post">
                            <input type="hidden" name="nom" value="Roboto">
                            <button type="submit" class="btn btn-primary">Nourrir Roboto</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<footer class="container">
    <a href="views/photos.php" class="btn btn-secondary mt-4">Modifier les photos de profil</a>
</footer>
</body>
</html>