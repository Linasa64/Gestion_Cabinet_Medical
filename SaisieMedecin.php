<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Ajout Medecin</title>
</head>

<body>

    <h1>Saisie d'un nouveau Médecin</h1>
    <form action="SaisieMedecin.php" method="POST">
        <label for="Civilite"> Civilité :</label> <input type = text name="Civilite" id="Civilite" /><br>
        <label for="Nom"> Nom : </label> <input type="text" name="Nom" id="Nom"><br>
        <label for="Prenom"> Prenom : </label> <input type="text" name="Prenom" id="Prenom"/><br>

        <input type="submit" value="Ajout" name="ajout">
        <input type="reset" value="Reset" name="reset"> 
    </form>

    <?php

        $link = mysqli_connect("localhost", "root", "", "gestcabmed") or die("Error".mysqli_error($link));

        //Vérification de la connexion
        if(mysqli_connect_errno()){
            print("connect filed: \n".mysqli_connect_error());
            exit();
        }        
        
        if( isset($_POST['Civilite']) && isset($_POST['Nom']) && isset($_POST['Prenom'])) {
            //La requête
            $civilite = $_POST['Civilite'];
            $nom = $_POST['Nom'];
            $prenom = $_POST['Prenom'];

            $requete = 'INSERT INTO medecin(Civilite, Nom, Prenom) 
                        VALUES("'.$civilite.'", "'.$nom.'", "'.$prenom.'")';
            if (!empty($civilite) && !empty($nom) && !empty($prenom)){
                $result = mysqli_query($link, $requete);
                header('Location: index.php');
            }
            else{
                print("oh nooooo");
            }
        }

    ?>

</body>

</html>