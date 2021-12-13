<?php

    //Connexion au serveur MySQL
    try {
        $linkpdo = new PDO("mysql:host=localhost;dbname=gestcabmed", 'root');
    }
    ///Capture des erreurs éventuelles
    catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
 ?>