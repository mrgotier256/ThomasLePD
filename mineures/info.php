<?php
include '../base/head.php';
echo '<link rel="stylesheet" href="info.css">';
include '../base/header.php';
require '../PHP/Class.php';
?>

<main>
    <div class="container" >
        <div class="row">
            <article class="col-2" style="text-align:left;">Filtrage
                <form method="post" action="../recherche/RechercheStage.php">
                        <tr>
                            <div class="col-2">Entreprise</div>
                        </tr>
                        <select id="EntrepriseNom" name="EntrepriseNom" style="width:100px;">
                            <option value="">Entreprise</option>
                            <?php
                            $NomEntreprises = new Entreprise;
                            foreach ($NomEntreprises->getEntrepriseSansLimite() as $NomEntreprise) {
                            ?>
                                <option value="<?= $NomEntreprise['Nom'] ?>"><?= $NomEntreprise['Nom'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <tr>
                            <div class="col-2">Compétences</label></div>
                        </tr>
                        <select id="StageCompetence" name="StageCompetence" style="width:100px;">
                            <option value="">Competence</option>
                            <?php
                            $OffreCompetences = new Offre;
                            foreach ($OffreCompetences->getOffreCompetence() as $OffreCompetence) {
                            ?>
                                <option value="<?= $OffreCompetence['competences'] ?>"><?= $OffreCompetence['competences'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <tr>
                            <div class="col-2">Localité</label></div>
                        </tr>
                        <select id="StageLocalite" name="StageLocalite" style="width:100px;">
                            <option value="">Localité</option>
                            <?php
                            $OffreLocali = new Offre;
                            foreach ($OffreLocali->getOffreLocalite() as $OffreLocal) {
                            ?>
                                <option value="<?= $OffreLocal['localite'] ?>"><?= $OffreLocal['localite'] ?></option>
                            <?php
                            }
                            ?>
                        </select>

                        <tr>
                            <div class="col-2">Durée (semaines)</label></div>
                        </tr>
                        <div class="col-6"><input type="number" name="StageDuree" placeholder="Durée de stage" style="width:90px;" /></div>
                        <br>
                        <button class="btn btn-outline-light" type="submit">Search</button>
                </form>
            </article>
            <article class="col-9" style="text-align:center;width:80%;">
                <?php
                $users = new Offre();
                if (isset($_GET['page']) && !empty($_GET['page'])) {
                    $page = $_GET['page'] - 1;
                } else {
                    $page = 0;
                }
                foreach ($users->getOffre($page * 10) as $user) {
                    $date = new DateTime($user['date_offre']);
                    $lien = "";
                    $lien = $user['competences'] . " " . "|" . " " . $user['localite'] . " " . "|" . " " . $user['entreprise'] . " " . "|" . " " . $user['duree'] . " " . " semaines" . " " . "|" . " " . $user['remuneration'] . " " . '€' . " " . "|" . " " . date_format($date, 'd-m-Y') . " " . "|" . " " . $user['id_fiche'] . " ";
                    echo "<div class=\"bdd\"><a class=\"joie\" href = './offre.php?idOffre=" . $user['id_offre'] . "'><b>" . $lien . "</b></a></div>";
                }
                $users->getOffre();

                $toutesLignes = (int)$users->compterOffre();
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
            </article>
        </div>
    </div>
</main>

<?php include '../base/footer.php'; ?>