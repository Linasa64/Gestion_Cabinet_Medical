<?php

include 'resrc/Connect.php';
    
    //La requête

    $civilite = $_POST['Civilite'];
    $nom = $_POST['Nom'];
    $prenom = $_POST['Prenom'];

    $requete = 'INSERT INTO medecin(Civilite, Nom, Prenom) 
                VALUES("'.$civilite.'", "'.$nom.'", "'.$prenom.'")';
    if (!empty($civilite) && !empty($nom) && !empty($prenom)){
        $result = mysqli_query($link, $requete);
    }
    else{
        print("oh nooooo");
    }
    header('Location: index.php');
?>