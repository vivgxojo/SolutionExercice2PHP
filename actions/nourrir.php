<?php

require_once __DIR__.'/../models/Personne.php';
session_start();

if(isset($_SESSION['bob'])){

    try{
        $animal = $_SESSION['bob']->getAnimalParNom($_REQUEST['nom']);
        $_SESSION['bob']->nourrirAnimal($animal, $_SESSION['temps']);
        $_SESSION['erreur'] = '';
    }
    catch(Error $e){
        $_SESSION['erreur'] = 'Un problème est survenu';
    }

}

header("Location: ./../index.php",TRUE,301);