<?php

include '../PHP/Class.php';


if ($_POST['Role'] == 2) {
    $co = new Pilote();
    $creater_pilote = $co->addPilote(
        $_POST['Login'],
        hash('md5', $_POST['Mdp']),
        $_POST['Nom'],
        $_POST['Prenom'],
        $_POST['Email'],
        $_POST['Centre'],
        $_POST['Role'],
        $_POST['Promotion']
    );

    if ($creater_pilote) {
        header("Location:../listes/l-pilote.php");
        exit;
    } else {
        echo "La création d'offre à échouée";
    }
}

if ($_POST['Role'] == 4) {
    $co = new eleve();
    $creater_pilote = $co->addEleve(
        $_POST['Login'],
        hash('md5', $_POST['Mdp']),
        $_POST['Nom'],
        $_POST['Prenom'],
        $_POST['Email'],
        $_POST['Centre'],
        $_POST['Role'],
        $_POST['Promotion']
    );

    if ($creater_pilote) {
        header("Location:../listes/l-eleve.php");
        exit;
    } else {
        echo "La création d'offre à échouée";
    }
}

if ($_POST['Role'] == 3) {
    $co = new delegue();
    $creater_pilote = $co->addDelegue(
        $_POST['Login'],
        hash('md5', $_POST['Mdp']),
        $_POST['Nom'],
        $_POST['Prenom'],
        $_POST['Email'],
        $_POST['Centre'],
        $_POST['Role'],
        $_POST['Promotion']
    );

    if ($creater_pilote) {
        header("Location:../listes/l-delegue.php");
        exit;
    } else {
        echo "La création d'offre à échouée";
    }
}
