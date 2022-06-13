<?php
session_start();
include 'Class.php';
$co= new LoginRepository();
$verif=$co->login($_POST['login'],hash('md5', $_POST['mdp']));

if(count($verif)>0)
{
    $_SESSION['auth']=true;
    $_SESSION['user']['ID_Role']=$verif[0]['ID_Role'];
    $_SESSION['user']['nom']=$verif[0]['nom'];
    $_SESSION['user']['prenom']=$verif[0]['prenom'];
    $_SESSION['user']['email']=$verif[0]['email'];
    $_SESSION['user']['centre']=$verif[0]['centre'];
    $_SESSION['user']['id_user']=$verif[0]['id_user'];

    header("Location:../mainpage/mainPage.php");
    exit;
}
else{
    echo "L'identifiant ou le mot de passe est incorrect";
}
