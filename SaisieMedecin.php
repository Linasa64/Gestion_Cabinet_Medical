<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Ajout Medecin</title>
</head>

<body>

    <h1>Saisie d'un nouveau Médecin</h1>
    <form action="SaisieMedecin.php" method="post">
        Civilité : <input type = text name="Civilite" /><br>
        Nom : <input type="text" name="Nom"><br>
        Prenom : <input type="text" name="Prenom" /><br>

        <input type="submit" value="Ajout" name="ajout">
        <input type="reset" value="Reset" name="reset">
    </form>

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
            header('Location: index.php');
        }
        else{
            print("oh nooooo");
        }
    
    ?>

</body>

</html>