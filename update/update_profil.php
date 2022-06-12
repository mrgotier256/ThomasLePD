<?php
session_start();
if (@$_SESSION['auth'] == true) {
    include '../base/head.php';
    echo '<link rel="stylesheet" href="creation.css">';
    include '../base/header.php';
?>
    <script type="text/javascript" defer="defer">
        function griserpromo() {
            var BoutonPromo = document.getElementById('PromotionTR');

            if (document.getElementById('Delegue').checked == true) {
                BoutonPromo.style.visibility = 'hidden'
            } else if (document.getElementById('Delegue').checked == false) {
                BoutonPromo.style.visibility = 'visible';
            }
        }
    </script>
    <main>
        <div class="container">
            <div class="row">
                <form action="../update/upd_profil.php" method="post" class="text-center">
                    <fieldset>
                        <legend>Mise a jour d'un profil</legend>
                        <div class="row">
                            <table>
                                <tr>
                                    <div class="col-2"><label for="Pilote">Pilote</label></div>
                                    <div class="col-2"><input type="radio" id="Pilote" name="Role" value="2" required onChange="griserpromo()" /></div>
                                    <div class="col-2"><label for="Eleve">Eleve</label></div>
                                    <div class="col-2"><input type="radio" id="Eleve" name="Role" value="4" required onChange="griserpromo()" /></div>
                                    <div class="col-2"><label for="Delegue">Delegue</label></div>
                                    <div class="col-2"><input type="radio" id="Delegue" name="Role" value="3" required onChange="griserpromo()" /></div>
                                </tr>
                                <div style="padding-left:200px">
                                    <tr>
                                        <td>
                                            <div class="col-6"><label for="Login">Login</label></div>
                                        </td>
                                        <td>
                                            <div class="col-6"><input type="text" name="Login" placeholder="Saisissez un login" required /></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="col-6"><label for="Nom">Nom</label></div>
                                        </td>
                                        <td>
                                            <div class="col-6"><input type="text" name="Nom" placeholder="Saisissez un nom" /></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="col-6"><label for="Prenom">Prenom</label></div>
                                        </td>
                                        <td>
                                            <div class="col-6"><input type="text" name="Prenom" placeholder="Saisissez un prenom" /></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="col-6"><label for="Email">Email</label></div>
                                        </td>
                                        <td>
                                            <div class="col-6"><input type="email" name="Email" placeholder="Saisissez un email" /></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="col-6"><label for="Centre">Centre</label></div>
                                        </td>
                                        <td> <select name="Centre" class="col-6">
                                                <option value="">Saississez votre Centre</option>
                                                <option value="Aix-en-Provence">Aix-en-Provence</option>
                                                <option value="Angoulême">Angoulême</option>
                                                <option value="Arras">Arras</option>
                                                <option value="Bordeaux">Bordeaux</option>
                                                <option value="Brest">Brest</option>
                                                <option value="Caen">Caen</option>
                                                <option value="Dijon">Dijon</option>
                                                <option value="Grenoble">Grenoble</option>
                                                <option value="Rochelle">La Rochelle</option>
                                                <option value="Le Mans">Le Mans</option>
                                                <option value="Lille">Lille</option>
                                                <option value="Lyon">Lyon</option>
                                                <option value="Montpellier">Montpellier</option>
                                                <option value="Nancy">Nancy</option>
                                                <option value="Nantes">Nantes</option>
                                                <option value="Nice">Nice</option>
                                                <option value="Orléans">Orléans</option>
                                                <option value="Paris Nanterre">Paris Nanterre</option>
                                                <option value="Pau">Pau</option>
                                                <option value="Reims">Reims</option>
                                                <option value="Rouen">Rouen</option>
                                                <option value="Saint-Nazaire">Saint-Nazaire</option>
                                                <option value="Strasbourg">Strasbourg</option>
                                                <option value="Toulouse">Toulouse</option>
                                            </select></td>
                                    </tr>
                                    <tr id="PromotionTR">
                                        <td>
                                            <div class="col-6"><label for="Promotion">Promotion</label></div>
                                        </td>
                                        <td>
                                            <select name="Promotion">
                                                <option value="">Saississez votre Promotion</option>
                                                <option value="CPIA1">CPI A1</option>
                                                <option value="CPIA2-INFORMATIQUE">CPIA2-INFORMATIQUE</option>
                                                <option value="CPIA2-SYSTEME EMBARQUÉ">CPIA2-SYSTEME EMBARQUÉ</option>
                                                <option value="CPIA2-BTP">CPIA2-BTP</option>
                                                <option value="CPIA2-GENERALISTE">CPIA2-GENERALISTE</option>
                                                <option value="A3-INFORMATIQUE">A3-INFORMATIQUE</option>
                                                <option value="A3-SYSTEME EMBARQUÉ">A3-SYSTEME EMBARQUÉ</option>
                                                <option value="A3-BTP">A3-BTP </option>
                                                <option value="A3-GENERALISTE">A3-GENERALISTE </option>
                                                <option value="A4-INFORMATIQUE">A4-INFORMATIQUE </option>
                                                <option value="A4-SYSTEME EMBARQUÉ">A4-SYSTEME EMBARQUÉ </option>
                                                <option value="A4-BTP">A4-BTP </option>
                                                <option value="A4-GENERALISTE">A4-GENERALISTE </option>
                                                <option value="A5-INFORMATIQUE">A5-INFORMATIQUE </option>
                                                <option value="A5-SYSTEME EMBARQUÉ">A5-SYSTEME EMBARQUÉ </option>
                                                <option value="A5-BTP">A5-BTP </option>
                                                <option value="A5-GENERALISTE">A5-GENERALISTE </option>
                                            </select>
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