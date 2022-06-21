<?php 
if (@$_SESSION['auth'] != true) {
session_start();
}
?>

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container-fluid">
                <?php
                if(@$_SESSION['auth']==true){
                    switch ($_SESSION['user']['ID_Role']){
                        case 1 :
                            echo "<div> <a class=\"navbar-brand pad\" href='../profil/admin.php'>Profil</a></div>";
                            break;
                        case 2 :
                            echo '<a class="navbar-brand pad" href="../profil/pilote.php">Profil</a>';
                            break;
                        case 3 :
                            echo '<a class="navbar-brand pad" href="../profil/delegue.php">Profil</a>';
                            break;
                        case 4 :
                            echo '<a class="navbar-brand pad" href="../profil/eleve.php">Profil</a>';
                            break;
                    }

                }else{
                    echo '<a class="navbar-brand pad" href="../connexion/connexion.php">Connexion</a>';
                }?>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav w-100 justify-content-between">
                        <a class="nav-link active" aria-current="page" href="../mainpage/mainPage.php">Home</a>
                        <a class="nav-link" href="../mineures/info.php">Informatique</a>
                        <a class="nav-link" href="../mineures/btp.php">BTP</a>
                        <a class="nav-link" href="../mineures/gene.php">Généraliste</a>
                        <a class="nav-link" href="../mineures/s3e.php">S3E</a>
                        <a class="nav-link" href="../lettrecv/lettrecv.php">CV et Lettre de Motivation</a>
                        <form class="d-flex" action="../search/search.php">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="Recherche">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    </header>
