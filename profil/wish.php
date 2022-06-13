<?php
include '../base/head.php';
echo '<link rel="stylesheet" href="wish.css">';
include '../base/header.php';
?>

<main>
    <div class="container">
        <div class="row">
            <a class="btn btn-secondary col-1 bout fixed-top" style="margin:56px 0; width: 53px; height:53px;" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                +
            </a>
            <div class="text-center col-11">
                <article class="prof"> 
                    Wish-Liste
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

<?php include '../base/footer.php'; ?>