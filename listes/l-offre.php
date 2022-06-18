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
                    <article style="height :540px;">Liste des offres
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
                            // $lien =  $user['competences'] . " " . "|" . " " . $user['localite'] . " " . "|" . " " . $user['entreprise'] . " " . "|" . " " . $user['duree'] . " " . " semaines" . " " . "|" . " " . $user['remuneration'] . " " . '€' . " " . "|" . " " . date_format($date, 'd-m-Y') . " " . "|" . " " . $user['id_fiche'] . " ";
                            $lien =  $user['competences'] . " " . "|" . " " . $user['localite'] . " " . "|" . " " . $user['entreprise'] . " " . "|" . " " . $user['duree'] . " " . " semaines" . " " . "|" . " " . $user['remuneration'] . " " . '€' . " " . "|" . " " . date_format($date, 'd-m-Y');
                        ?>
                            <div class="bdd">
                                <a class="joie" href="../mineures/offre.php?idOffre=<?= $user['id_offre'] ?>"><b><?= $lien ?> </b></a>
                                <button id="<?= $user['id_offre'] ?>" name="<?= $user['id_offre'] ?>" onclick="ToWishList(<?= $user['id_offre'] ?>)">Ajouter</button>
                                <button id="<?= $user['id_offre'] ?>" name="<?= $user['id_offre'] ?>" onclick="DelFromWishList(<?= $user['id_offre'] ?>)"> Supprimer</button>
                            </div><?php
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
                        <div id="ajax"> </div>

                    </article>
                    <form method="get" action="../delete/delete_offre.php">
                        <span><input type="id" name="id_offre" placeholder="Saisissez l\'id" required /></span>
                        <span><input type="submit" value="Supprimer" name="supprimer" /></span>
                    </form>
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
            <div id="ajax"> </div>
        </div>
    </main>

<?php
    include '../base/footer.php';
} else {
    header("Location:../connexion/connexion.php");
    exit;
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
    function ToWishList(idoffre) {
        if (idoffre) {
            $.post('../Wishlist/InteractWishList.php', {
                id_offre: idoffre,
                ToWishList: true,
            }, function(data) {
                alert(data);
            });
        }
    }

    function DelFromWishList(idoffre) {
        if (idoffre) {
            $.post('../Wishlist/InteractWishList.php', {
                id_offre: idoffre,
                DelFromWishList: true,
            }, function(data) {
                alert(data);
            });
        }
    }
</script>