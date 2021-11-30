<?php

    //Connexion au serveur MySQL
    $link = mysqli_connect("localhost", "root", "", "gestcabmed") or die("Error".mysqli_error($link));

    //Vérification de la connexion
    if(mysqli_connect_errno()){
        print("connect filed: \n".mysqli_connect_error());
        exit();
    }
    print_r($_POST);
    
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