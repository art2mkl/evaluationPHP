<!DOCTYPE html>
<html lang="fr">

<?php include "head.php" ?>

<body>

    <?php include "nav.php" ?>

    <div class="container">

        <h2 class="p-5">Liste des appartements</h2>

        <!-- tableau -->
        <table class="table mt-5">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Cp</th>
                    <th scope="col">Ville</th>
                    <th scope="col">Surface</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Type</th>
                    <th scope="col">Description</th>
                </tr>
            </thead>
            <tbody>
                <?php

                //ouverture de la base
                include "bdd.php";
                $affiche = $bdd->query('SELECT * FROM logement');

                //Boucle d'affichage
                while ($row = $affiche->fetch()) {
                ?>
                    <tr>
                        <td><img src="<?= $row['photo'] ?? './uploads/default.jpg' ?> " alt="" class="image"></td>
                        <td><a href="description.php?plus=<?= $row['id_logement'] ?>"><?= $row['titre'] ?></a></td>
                        <td><?= $row['adresse'] ?></td>
                        <td><?= $row['cp'] ?></td>
                        <td><?= $row['ville'] ?></td>
                        <td><?= $row['surface'] . ' m²' ?></td>
                        <td><?= $row['prix'] . ' €' ?></td>
                        <td><?= $row['type'] ?></td>
                        <!-- description tronquée -->
                        <td><?= strlen($row['description']) >= 50 ? substr($row['description'], 0, 50) . "..." : $row['description'] ?></td>

                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <!-- espaceur -->
        <div class="m-5"></div>

    </div>

    <?php include "footer.php" ?>
</body>

</html>