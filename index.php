<!DOCTYPE html>
<html lang="fr">

<?php include "head.php" ?>

<body>

    <?php include "nav.php" ?>



    <div class="container">
        <?php

        //verif si erreur de saisie
        if (isset($_GET['err'])) {
            $err = $_GET['err'];
        ?>
            <div class="alert alert-danger"><?= $err == 2 ? "Code postal incorrect" : "Paramètres incorrects" ?>"</div>
        <?php
        }
        ?>

        <!-- formulaire de connexion -->
        <form action="ajout.php" method='post' class="w-75 mx-auto pt-5 my-1 " enctype="multipart/form-data">

            <!-- titre -->
            <div class="mb-3">
                <label for="titre" class="form-label">Titre</label>
                <input type="text" class="form-control" id="titre" name="titre" required>
            </div>
            <!-- adresse -->
            <div class="mb-3">
                <label for="adresse" class="form-label">Adresse</label>
                <input type="text" class="form-control" id="adresse" name="adresse" required>
            </div>

            <!-- code postal, ville -->
            <div class="d-flex justify-content-between">
                <div class="mb-3">
                    <label for="codePostal" class="form-label">Code postal</label>
                    <input type="text" class="form-control" id="codePostal" name="codePostal" required>
                </div>
                <div class="mb-3">
                    <label for="ville" class="form-label">Ville</label>
                    <input type="text" class="form-control" id="ville" name="ville" required>
                </div>
            </div>

            <!-- surface, prix et type -->
            <div class="d-flex justify-content-between align-items-center">
                <div class="mb-3 w-25">
                    <label for="surface" class="form-label">Surface (m²)</label>
                    <input type="number" class="form-control" id="surface" name="surface" required>
                </div>
                <div class="mb-3 w-25">
                    <label for="prix" class="form-label">Prix</label>
                    <input type="number" class="form-control" id="prix" name="prix" required>
                </div>
                <div class="d-flex flex-column pe-4">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="type" id="location" checked value="Location">
                        <label class="form-check-label" for="location">
                            Location
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="type" id="vente" value="Vente">
                        <label class="form-check-label" for="vente">
                            Vente
                        </label>
                    </div>
                </div>
            </div>

            <!-- image -->
            <div class="mb-3 border border-info rounded p-2">
                <label for="image" class="form-label">Choisissez une image</label>
                <input id="image" type="file" name="image">
            </div>

            <!-- description -->
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description" rows="5"></textarea>
            </div>

            <!-- bouton -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary w-100">envoyer</button>
            </div>
        </form>

        <!-- espaceur -->
        <div class="m-5"></div>
    </div>
    <?php include "footer.php" ?>
</body>

</html>