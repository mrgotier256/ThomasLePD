<?php
session_start();

if (isset($_SESSION['DoneDeleteCookie']) && @$_SESSION['DoneDeleteCookie'] == true)
{
    $_SESSION = array();
    session_destroy();
    //header("Location:../mainpage/mainPage.php");
    header("Location:../index.php");
}
else
{
    $_SESSION['deleteCookie'] = true;
    header("Location:../PHP/connexion.php");
}


?>