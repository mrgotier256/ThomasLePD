<?php
include '../base/head.php';
echo '<link rel="stylesheet" href="mainPage.css">';
include '../base/header.php';
?>

<main>
    <div>
        <?php 
        if (@$_SESSION['auth'] == true) 
        { ?>
            <a class="btn btn-secondary col-1 bout fixed-top" style="margin:56px 0; width: 53px; height:53px;" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                +
            </a>
        <?php 
        } ?>

        <!------------ Début carroussel ------------>
        <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href="https://objectif-languedoc-roussillon.latribune.fr/carrieres/emploi/2022-06-01/penurie-de-candidats-dans-le-btp-les-personnes-eloignees-de-l-emploi-peuvent-etre-une-ressource-920195.html">
                        <img src="../assets/images/btp.jpg" class="d-block w-100" alt="BTP">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="https://www.francebleu.fr/infos/economie-social/la-nouvelle-eco-pratik-une-web-application-destinee-aux-personnes-a-la-rue-1653067063">
                        <img src="../assets/images/info.jpg" class="d-block w-100" alt="INFO">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="https://objectifaquitaine.latribune.fr/business/aeronautique-et-defense/2021-03-02/luos-choisit-l-open-source-pour-commercialiser-son-architecture-de-systemes-embarques-878853.html">
                        <img src="../assets/images/s3e.jpg" class="d-block w-100" alt="S3E">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="https://www.petitbleu.fr/2022/06/15/une-innovation-technologique-pour-le-suivi-des-recoltes-10366756.php">
                        <img src="../assets/images/gene.jpg" class="d-block w-100" alt="GENE">
                    </a>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!------------ Fin carroussel ------------>
    </div>
    </br>
    <!------------ Début affichage des offres de stage ------------>
    <div class="text-center" style="width:76%;margin:auto;">
        <section>
            <h5><strong>Offres de stage </strong></h5>
            <?php require '../PHP/Class.php';

            $users = new Offre();

            if (isset($_GET['page']) && !empty($_GET['page'])) {
                $page = $_GET['page'] - 1;
            } else {
                $page = 0;
            }

            foreach ($users->getOffre($page * 10) as $user) {
                $date = new DateTime($user['date_offre']);
                $lien = "";

                if (@$_SESSION['auth'] == true && @$_SESSION['user']['ID_Role'] == 1) {
                    $lien = $user['id_offre'] . " " . "|" . " " . $user['localite'] . " " . "|" . " " . $user['entreprise'] . " " . "|" . " " . $user['competences'] . " " . "|" . " " . $user['duree'] . " " . 'semaines' . " " . "|" . " " . $user['remuneration'] . " " . '€' . " " . "|" . " " . date_format($date, 'd-m-Y') . " " . "|" . " " . $user['id_fiche'];                }
                else {
                    $lien =  $user['localite'] . " " . "|" . " " . $user['entreprise'] . " " . "|" . " " . $user['competences'] . " " . "|" . " " . $user['duree'] . " " . 'semaines' . " " . "|" . " " . $user['remuneration'] . " " . '€' . " " . "|" . " " . date_format($date, 'd-m-Y');
                }
                echo "<div class=\"bdd\"><a class=\"joie\" href = '../mineures/offre.php?idOffre=" . $user['id_offre'] . "'><b>" . $lien . "</b></a></div>";
            }
            $users->getOffre();
            $toutesLignes = (int)$users->compterOffre();
            $totoalPages = ceil($toutesLignes / 10);
            if (isset($_GET['page']) && !empty($_GET['page'])) {
                $currentPage = (int) strip_tags($_GET['page']) - 1;
            } else {
                $currentPage = 0;
            } ?>

            <!------------ Début pagination ------------>
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
            <!------------ Fin pagination ------------>
        </section>
    </div>
    <!------------ Fin affichage des offres de stage ------------>
    <?php 
    if (@$_SESSION['auth'] == true) { ?>
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
            <div id="ajax"> </div>
        </div>
    <?php }   ?>
</main>

<?php include '../base/footer.php'; ?>