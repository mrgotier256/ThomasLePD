<?php
session_start();
if (@$_SESSION['auth'] == true) {
    include '../base/head.php';
    echo '<link rel="stylesheet" href="creation.css">';
    include '../base/header.php';
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styleindex.css">
        <title>Document</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="../PHP/script.js" type="text/javascript"></script>

    </head>
    <main>
        <div class="container">
            <div class="row">
                <form action="../delete/del_profil.php" method="post" class="text-center">
                    <fieldset>
                        <legend>Suppression d'un profil</legend>
                        <div class="row">
                            <table>
                                <tr>
                                    <div class="col-2"><label for="Pilote">Pilote</label></div>
                                    <div class="col-2"><input type="radio" id="Pilote" name="Role" value="2" required /></div>
                                    <div class="col-2"><label for="Eleve">Eleve</label></div>
                                    <div class="col-2"><input type="radio" id="Eleve" name="Role" value="4" required /></div>
                                    <div class="col-2"><label for="Delegue">Delegue</label></div>
                                    <div class="col-2"><input type="radio" id="Delegue" name="Role" value="3" required /></div>
                                </tr>
                                <div style="padding-left:200px">
                                    <tr>
                                        <td>
                                            <div class="col-6"><label for="Login">Login</label></div>
                                        </td>
                                        <td>
                                            <div class="col-8"><input type="text" name="Login" placeholder="Saisissez un login" id="name" onkeyup="GetProfile()" required /></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="col-6"><input type="submit" value="Envoyer" id="envoyer"></div>
                                        </td>
                                        <td>
                                            <div class="col-6"><input type="reset" value="Annuler" /></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div id="resultTyping"> </div>
                                        </td>
                                    </tr>
                                </div>
                            </table>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <a class="btn btn-secondary col-1 bout fixed-top" style="margin:56px 0; width: 53px; height:53px; outline:none; text-decoration:none" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
            +
        </a>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" style="width:200px;background-color:black;">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel" style="color:white;">Menu</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body" style="color:white;">
                <a href="../profil/admin.php">Profil</a>
                <br></br>
                <a href="../listes/l-eleve.php">Liste des élèves</a>
                <br></br>
                <a href="../listes/l-pilote.php">Listes des pilotes</a>
                <br></br>
                <a href="../listes/l-delegue.php">Listes des délegués</a>
                <br></br>
                <a href="../listes/l-entreprise.php">Listes des entreprises</a>
                <br></br>
                <a href="../listes/l-offre.php">Listes des offres de stage</a>
                <br></br>
                <a href="../creation/creation_profil.php">Création d'un profil</a>
                <br></br>
                <a href="../creation/creation_entreprise.php">Création d'une entreprise</a>
                <br></br>
                <a href="../creation/creation_offre.php">Création d'une offre</a>
                <br></br>
                <div>
                    <a class="deco" href="../deco/deconnexion.php">Deconnexion</a>
                </div>
            </div>
        </div>
    </main>

<?php
    include '../base/footer.php';
} else {
    header("Location:../connexion/connexion.php");
    exit;
}
?>