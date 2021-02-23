<?php

//Test des $_POST
if (isset($_POST['titre']) and isset($_POST['adresse']) and isset($_POST['codePostal']) and isset($_POST['ville']) and isset($_POST['surface']) and isset($_POST['prix']) and isset($_POST['type']) and $_POST['titre'] != "" and $_POST['adresse'] != "" and $_POST['codePostal'] != "" and $_POST['ville'] != "" and $_POST['surface'] != "" and $_POST['prix'] != "" and $_POST['type'] != "") {

    //securisation des variables
    $titre = htmlspecialchars($_POST['titre']);
    $adresse = htmlspecialchars($_POST['adresse']);
    $codePostal = htmlspecialchars($_POST['codePostal']);

    //vérif code postale
    if (!preg_match('#^((0[1-9])|([1-8][0-9])|(9[0-8])|(2A)|(2B))[0-9]{3}$#', $codePostal)) header('Location: index.php?err=2');

    //securisation des variables
    $ville = htmlspecialchars($_POST['ville']);
    $surface = (int) htmlspecialchars($_POST['surface']);
    $prix = (int) htmlspecialchars($_POST['prix']);
    $type = htmlspecialchars($_POST['type']);

    $description = htmlspecialchars($_POST['description']) ?? "";

    //test image uploadée
    if (isset($_FILES['image']) and $_FILES['image']['error'] == 0) {

        // Test si le fichier n'est pas trop gros
        if ($_FILES['image']['size'] <= 1000000) {

            // Test si l'extension est autorisée
            $infosfichier = pathinfo($_FILES['image']['name']);
            $extension_upload = $infosfichier['extension'];
            $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png', 'jfif');

            if (in_array($extension_upload, $extensions_autorisees)) {

                // vérification de l'existence du repertoire
                if (!is_dir('uploads')) {
                    mkdir('uploads', 0755, true);
                }
                $image = './uploads/logement_' . time() . '.' . $extension_upload ?? "";

                // Validation du fichier et stockage définitif
                move_uploaded_file($_FILES['image']['tmp_name'], $image);
            }
        }
    }

    //ouverture de la base
    include "bdd.php";

    //prepare et ajute la ligne
    $ajout = $bdd->prepare('INSERT INTO `logement`(`titre`, `adresse`, `ville`, `cp`, `surface`, `prix`, `photo`, `type`, `description`) VALUES (?,?,?,?,?,?,?,?,?)');

    $ajout->execute(array($titre, $adresse, $ville, $codePostal, $surface, $prix, $image, $type, $description));

    //redirection vers l'affichage des biens
    header('Location: affichage.php');
} else header('Location: index.php?err=1');
