<?php
session_start();
if (@$_SESSION['auth'] == true) {
    include '../base/head.php';
    echo '<link rel="stylesheet" href="wishlist.css">';
    include '../base/header.php';
?>

    <main>
        <div class="container">
            <div class="row">
                <a class="btn btn-secondary col-1 bout fixed-top" style="margin:56px 0; width: 53px; height:53px;" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                    +
                </a>
                <div class="text-center col-12">
                    <article class="prof">Wishlist
                        <?php require '../PHP/Class.php';
                        $identifiant = $id_user = $_SESSION['user']['id_user'];

                        $users = new WishListe();

                        if (isset($_GET['page']) && !empty($_GET['page'])) {
                            $page = $_GET['page'] - 1;
                        } else {
                            $page = 0;
                        }
                        $Wishlist = $users->getWishListe($identifiant);

                        if ($Wishlist == false) {
                            echo '<div class=\"bdd\"><br> <h2> Votre Wishlist est vide </h2> <div>';
                        } else {
                            foreach ($Wishlist as $user) {
                                $date = new DateTime($user['date_offre']);
                                $lien = "";
                                $lien =  $user['localite'] . " " . "|" . " " . $user['entreprise'] . " " . "|" . " " . $user['competences'] . " " . "|" . " " . $user['duree'] . " " . 'semaines' . " " . "|" . " " . $user['remuneration'] . " " . '€' . " " . "|" . " " . date_format($date, 'd-m-Y');
                        ?>
                                <div class="bdd">
                                    <b style="color: black">
                                        <?= 
                                        "<a class=\"joie\" href = '../mineures/offre.php?idOffre=" . $user['id_offre'] . "'><b>" . $lien . "</b></a>" 
                                        ?>
                                    </b><?php
                                    if ($_SESSION['user']['ID_Role'] == 4)
                                    { ?>
                                    <button id=" <?= $user['id_offre'] ?>" name="<?= $user['id_offre'] ?>" onclick="DelFromWishList(<?= $user['id_offre'] ?>)"> Supprimer</button>
                                </div>
                                <?php } ?>
                                <?php
                                    }
                                    $users->getWishListe($identifiant);
                                    $toutesLignes = (int)$users->getWishListe($identifiant);
                                    $totoalPages = ceil($toutesLignes / 10);
                                    if (isset($_GET['page']) && !empty($_GET['page'])) {
                                        $currentPage = (int) strip_tags($_GET['page']) - 1;
                                    } else {
                                        $currentPage = 0;
                                    }
                                        ?> <nav>
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
                                                                    }  ?>">Suivant</a>
                                    </li>
                                </ul>
                            </nav>
                        <?php
                        } ?>
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

<script>
    function DelFromWishList(idoffre) {
        if (idoffre) {
            $.post('../Wishlist/InteractWishList.php', {
                id_offre: idoffre,
                DelFromWishList: true,
            }, function(data) {
                alert(data);
                location.reload();
            });
        }
    }
</script>