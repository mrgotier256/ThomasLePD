<?php
session_start();
include 'Class.php';
$co= new LoginRepository();
$verif=$co->login($_POST['login'],hash('md5', $_POST['mdp']));

if(count($verif)>0)
{
    $_SESSION['auth']=true;
    $_SESSION['user']['ID_Role']=$verif[0]['ID_Role'];
    header("Location:../mainpage/mainPage.php");
    exit;
}
else{
    echo "L'identifiant ou le mot de passe est incorrect";
}

?>