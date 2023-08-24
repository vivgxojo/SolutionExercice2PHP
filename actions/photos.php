<?php

session_start();

//var_dump($_FILES); - tout se trouve ici
//var_dump($_POST); - vide
//var_dump($_REQUEST); - vide

function setPhoto($nom)
{
    if (isset($_FILES[$nom])) {
        if (!is_dir("../fichiers/{$nom}")) {
            mkdir("../fichiers/{$nom}", 0644);
        }
        if(!empty($_FILES[$nom]["tmp_name"])){
            $url = "../fichiers/{$nom}/" . 'profil.png';
            move_uploaded_file($_FILES[$nom]["tmp_name"], $url);
        }

    }
}
if(isset($_FILES)){
    foreach ($_FILES as $nom => $val) {
        setPhoto($nom);
    }
}

header("Location: ./../index.php",TRUE,301);






