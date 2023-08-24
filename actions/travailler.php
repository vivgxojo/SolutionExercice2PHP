<?php

require_once __DIR__.'/../models/Personne.php';
session_start();

if(isset($_SESSION['bob'])){
    $_SESSION['bob']->travailler(8);
    $_SESSION['temps']->modify('+ 8 hour');
}

header("Location: ./../index.php",TRUE,301);