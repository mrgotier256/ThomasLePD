<?php
include 'base_main/head.php';
echo '<link rel="stylesheet" href="mainpage/mainPage.css">';
include 'base_main/header.php';
?>

<main>
    <div>
        <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href="https://la1ere.francetvinfo.fr/martinique/hausse-des-materiaux-le-btp-souhaite-negocier-avec-l-etat-et-les-collectivites-pour-maintenir-l-activite-en-martinique-1266648.html">
                        <img src="assets/images/btp.jpg" class="d-block w-100" alt="BTP">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="https://korii.slate.fr/tech/cristaux-temporels-futur-informatique-quantique-universite-melbourne-57-qubits-ibm-structure-reproduction-energie">
                        <img src="assets/images/info.jpg" class="d-block w-100" alt="INFO">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="https://info-du-continent.com/chiffre-daffaires-systemes-embarques-a-microcontraleur-2022/">
                        <img src="assets/images/s3e.jpg" class="d-block w-100" alt="S3E">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="https://www.msn.com/fr-fr/finance/economie/lindustrie-est-morte-vive-la-nouvelle-industrie-fran-c3-a7aise/ar-AAVzACd">
                        <img src="assets/images/gene.jpg" class="d-block w-100" alt="GENE">
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
    </div>
    </br>
    <div class="text-center" style="width:75%;margin:auto;">
        <section>
            <h5><strong>Offres de stage</strong></h5>

            <?php require 'PHP/Class.php';

            $users = new Offre();

            if (isset($_GET['page']) && !empty($_GET['page'])) {
                $page = $_GET['page'] - 1;
            } else {
                $page = 0;
            }

            foreach ($users->getOffre($page * 10) as $user) {
                $date = new DateTime($user['date_offre']);
                $lien = "";
                $lien =  $user['id_offre'] . " " . "|" . " " . $user['localite'] . " " . "|" . " " . $user['entreprise'] . " " . "|" . " " . $user['competences'] . " " . "|" . " " . $user['duree'] . " " . 'semaines' . " " . "|" . " " . $user['remuneration'] . " " . '€' . " " . "|" . " " . date_format($date, 'd-m-Y') . " " . "|" . " " . $user['id_fiche'] . " ";
                echo "<div class=\"bdd\"><a class=\"joie\" href = 'mineures/offre.php?idOffre=" . $user['id_offre'] . "'><b>" . $lien . "</b></a></div>";
            }
            $users->getOffre();
            $toutesLignes = (int)$users->compterOffre();
            $totoalPages = ceil($toutesLignes / 10);
            if (isset($_GET['page']) && !empty($_GET['page'])) {
                $currentPage = (int) strip_tags($_GET['page']) - 1;
            } else {
                $currentPage = 0;
            } ?>

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
        </section>
    </div>
</main>

<?php include 'base_main/footer.php'; ?>