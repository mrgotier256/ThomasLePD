<?php
session_start();
include 'Class.php';

if (isset($_SESSION['deleteCookie']) && @$_SESSION['deleteCookie'] == true)
{
    setcookie("auth", "", time() - 3600);  
    unset($_COOKIE['auth']);

    setcookie("ID_Role","", time() - 3600);
    unset($_COOKIE['ID_Role']);

    setcookie("nom", "", time() - 3600); 
    unset($_COOKIE['nom']);

    setcookie("prenom","", time() - 3600);  
    unset($_COOKIE['prenom']);

    setcookie("email", "", time() - 3600);  
    unset($_COOKIE['email']);

    setcookie("centre", "", time() - 3600);  
    unset($_COOKIE['centre']);

    setcookie("id_user", "", time() - 3600);  
    unset($_COOKIE['id_user']);
 
    $_SESSION['DoneDeleteCookie'] = true;
    header('location: ../deco/deconnexion.php');
}
else
{

        $co= new LoginRepository();
    if (@$_COOKIE["auth"] == true)
    {
        var_dump($_COOKIE['id_user']);
        $verif=$co->loginCookie($_COOKIE['id_user']);
    }
    else if (isset($_POST['login']) && isset($_POST['mdp']))
    {
        $verif=$co->login($_POST['login'],hash('md5', $_POST['mdp']));
    }
    else
    {
        header('location: ..\mainpage\mainPage.php');
    }


    if(count($verif)>0)
    {
        $_SESSION['auth'] = true;
        $_SESSION['user']['ID_Role']=$verif[0]['ID_Role'];
        $_SESSION['user']['nom']=$verif[0]['nom'];
        $_SESSION['user']['prenom']=$verif[0]['prenom'];
        $_SESSION['user']['email']=$verif[0]['email'];
        $_SESSION['user']['centre']=$verif[0]['centre'];
        $_SESSION['user']['id_user']=$verif[0]['id_user'];

        setcookie("auth", $_SESSION['auth'], time()+3600);  /* expire dans 1 heure */
        setcookie("ID_Role", $_SESSION['user']['ID_Role'], time()+3600);  /* expire dans 1 heure */
        setcookie("nom", $_SESSION['user']['nom'], time()+3600);  /* expire dans 1 heure */
        setcookie("prenom", $_SESSION['user']['prenom'], time()+3600);  /* expire dans 1 heure */
        setcookie("email", $_SESSION['user']['email'], time()+3600);  /* expire dans 1 heure */
        setcookie("centre", $_SESSION['user']['centre'], time()+3600);  /* expire dans 1 heure */
        setcookie("id_user", $_SESSION['user']['id_user'], time()+3600);  /* expire dans 1 heure */

        var_dump($_COOKIE['auth']);
        var_dump($_COOKIE['ID_Role']);
        var_dump($_COOKIE['nom']);
        var_dump($_COOKIE['prenom']);
        var_dump($_COOKIE['email']);
        var_dump($_COOKIE['centre']);
        var_dump($_COOKIE['id_user']);

        header("Location:../mainpage/mainPage.php");
        exit;
    }
    else{
        echo "L'identifiant ou le mot de passe est incorrect";
    }
}

