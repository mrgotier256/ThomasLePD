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



                        <!-- <nav>
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
                        </nav> -->

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
                    include'../link_bar/link_bar.php'; 
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