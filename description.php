<?php include "head.php" ?>

<body>

    <?php include "nav.php" ?>

    <div class="container">
        <h1 class="p-4">Description</h1>
        <?php
        if (isset($_GET['plus'])) {
            $id = htmlspecialchars($_GET['plus']);
            //ouverture de la base de donnée

            include "bdd.php";

            $count = $bdd->prepare('SELECT COUNT(*) FROM logement WHERE id_logement = ?');
            $count->execute(array($id));
            $compteur = $count->fetch();

            if ($compteur[0] > 0) {
                $plus = $bdd->prepare('SELECT * FROM logement WHERE id_logement = ?');
                $plus->execute(array($id));
                $row = $plus->fetch();

        ?>
                <div class="card p-1">
                    <div class="text-end">
                        <a class="btn btn-danger" href="affichage.php">X</a>
                    </div>
                    <div class=" row p-5 d-flex justify-content-between align-items-center">
                        <div class="col-md-6">
                            <h2><?= $row['titre'] ?></h2>
                            <h3><?= $row['adresse'] ?></h3>
                            <h3><?= $row['cp'] . ' ' . $row['ville'] ?></h3>
                            <h4><?= $row['surface'] . ' m²' . ' ' . $row['type'] ?></h4>

                            <h4 class="fst-italic my-5"><?= $row['description'] ?></h4>
                            <h3 class="btn btn-secondary py-2"><?= $row['prix'] ?> €</h3>
                        </div>
                        <div class="col-md-6">
                            <img class="mw-100 rounded shadow" src="./<?= $row['photo'] ?>" alt="">
                        </div>
                    </div>

                </div>

        <?php
            } else header('Location: index.php');
        } else header('Location: index.php');

        ?>

    </div>
    <?php include "footer.php" ?>
</body>

</html>