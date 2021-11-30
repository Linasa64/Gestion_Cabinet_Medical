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
    $adresse = $_POST['Adresse'];
    $cp = $_POST['Code_postal'];
    $ville = $_POST['Ville'];
    $Date_Naissance = $_POST['Date_Naissance'];
    $Ville_Naissance = $_POST['Ville_Naissance'];
    $Secu = $_POST['Secu'];


    $requete = 'INSERT INTO usager(Civilite, Nom, Prenom, Adresse, Code_postal, Ville, Date_Naissance, Ville_Naissance, Secu) 
                VALUES("'.$civilite.'", "'.$nom.'", "'.$prenom.'", "'.$adresse.'", "'.$cp.'", "'.$ville.'", "'.$Date_Naissance.'", "'.$Ville_Naissance.'", "'.$Secu.'")';
    echo $requete;
    if (!empty($nom) && !empty($prenom) && !empty($Secu)){
        if(isset($_POST['Secu'])) {
            $result = mysqli_query($link, $requete);
        }
    }
    else{
        print("oh nooooo");
    }
?>