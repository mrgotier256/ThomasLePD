<?php
session_start();
if (@$_SESSION['auth'] == true) {
    include '../base/head.php';
    echo '<link rel="stylesheet" href="liste.css">';
    include '../base/header.php';
?>

    <main>
        <div class="container">
            <div class="row">
                <a class="btn btn-secondary col-1 bout fixed-top" style="margin:56px 0; width: 53px; height:53px;" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                    +
                </a>
                <div class="text-center col-12">
                    <article class="prof">Liste des entreprises
                        <?php require '../PHP/Class.php';
                        $users = new Entreprise();
                        if (isset($_GET['page']) && !empty($_GET['page'])) {
                            $page = $_GET['page'] - 1;
                        } else {
                            $page = 0;
                        }
                        foreach ($users->getEntreprise($page * 10) as $user) {
                            $lien_entreprise = "";
                            $lien_entreprise = $user['Nom'] . " " . "|" . " " . $user['Secteur_activite'] . " " . "|" . " " . $user['Localite'] . " " . "|" . " " . $user['Nb_stagiaire_cesi'] . " " . " stagiaire(s) " . " " . "|" . " " . $user['evaluation_stagiaire'] . "/5" . " |" . " " . $user['confiance_pilote'] . "/5" . " " . "|" . " " . $user['id_fiche'];
                            echo "<div class=\"bdd\"><a class=\"joie\" href = '../profil/entreprise.php?idFiche=" . $user['id_fiche'] . "&&Nom=" . $user['Nom'] . "'><b>" . $lien_entreprise . "</b></a></div>";
                        }
                        $users->getEntreprise();

                        $toutesLignes = (int)$users->compterEntreprise();
                        $totoalPages = ceil($toutesLignes / 10);
                        if (isset($_GET['page']) && !empty($_GET['page'])) {
                            $currentPage = (int) strip_tags($_GET['page']) - 1;
                        } else {
                            $currentPage = 0;
                        }
                        ?>

                        <nav>
                            <ul class="pagination justify-content-center">
                                <li class="page-item <?php if ($page <= 0) {
                                                            echo 'disabled';
                                                        } ?>">
                                    <a class="page-link" href="<?php if ($page < 0) {
                                                                    echo '#';
                                                                } else {
                                                                    echo "?page=" . ($currentPage - 1);
                                                                } ?>">Precedent</a>
                                </li>
                                <?php for ($i = 1; $i <= $totoalPages; $i++) : ?>
                                    <li class="page-item <?php if (($page + 1) == $i) {
                                                                echo 'active';
                                                            } ?>">
                                        <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
                                    </li>
                                <?php endfor; ?>
                                <li class="page-item <?php if (($page + 1) >= $totoalPages) {
                                                            echo 'disabled';
                                                        } ?>">
                                    <a class="page-link" href="<?php if ($page >= $totoalPages) {
                                                                    echo '#';
                                                                } else {
                                                                    echo "?page=" . ($currentPage + 2);
                                                                } ?>">Suivant</a>
                                </li>
                            </ul>
                        </nav>
                        <?php
                        if ($_SESSION['user']['ID_Role'] != 4) {  ?>
                            <form method="post" action="../delete/delete_entreprise.php">
                                <span><input type="id" name="id_fiche" placeholder="Saisissez l'id de l'entreprise" required /></span>
                                <span><input type="submit" value="Supprimer" name="supprimer" /></span>
                            </form>
                        <?php } ?>
                    </article>
                </div>
            </div>
        </div>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" style="width:200px;background-color:black;">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel" style="color:white;">Menu</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body" style="color:white;">
                <?php
                include '../link_bar/link_bar.php';
                ?>
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