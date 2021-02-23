<?php
//ouverture de la base de donnée
try {
    $bdd = new PDO('mysql:host=localhost;dbname=immobilier;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    die($e->getMessage());
}
