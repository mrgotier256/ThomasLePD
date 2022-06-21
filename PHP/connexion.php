<?php
session_start();
include 'Class.php';

if (isset($_SESSION['deleteCookie']) && @$_SESSION['deleteCookie'] == true) // Si on est sur une deconnexion
{

/* --------------------------------Supression Cookies------------------------------------- */
    setcookie("auth", "", time() - 3600);    
    unset($_COOKIE['auth']);

    setcookie("id_user", "", time() - 3600);  
    unset($_COOKIE['id_user']);
 
    $_SESSION['DoneDeleteCookie'] = true;
    header('location: ../deco/deconnexion.php');
}
else
{

        $co= new LoginRepository();
    if (@$_COOKIE["auth"] == true)                    //Si les cookies sont actifs, connexion auto
    {
        $verif=$co->loginCookie($_COOKIE['id_user']);
    }
    else if (isset($_POST['login']) && isset($_POST['mdp'])) // Si pas de cookies, connexion manuelle
    {
        $verif=$co->login($_POST['login'],hash('md5', $_POST['mdp']));
    }
    else
    {
        header('location: ..\mainpage\mainPage.php');   // Si pas de cookies et pas de volonté de se connecté, direction le main
    }


    if(count($verif)>0)
    {
        /* --------------------------------Variables Sessions utilisateurs------------------------------------- */
        $_SESSION['auth'] = true;                              
        $_SESSION['user']['ID_Role']=$verif[0]['ID_Role'];
        $_SESSION['user']['nom']=$verif[0]['nom'];
        $_SESSION['user']['prenom']=$verif[0]['prenom'];
        $_SESSION['user']['email']=$verif[0]['email'];
        $_SESSION['user']['centre']=$verif[0]['centre'];
        $_SESSION['user']['id_user']=$verif[0]['id_user'];

        /* --------------------------------Cookies utilisateurs------------------------------------- */        
        setcookie("auth", $_SESSION['auth'], time()+3600);  /* expire dans 1 heure */
        setcookie("id_user", $_SESSION['user']['id_user'], time()+3600);  /* expire dans 1 heure */

        header("Location:../mainpage/mainPage.php");
        exit;
    }
    else{
        echo "L'identifiant ou le mot de passe est incorrect";
    }
}

