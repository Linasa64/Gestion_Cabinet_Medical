<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Ajout usager</title>
</head>

<body>

    <h1>Saisie d'un nouvel usager</h1>
    <form action="saisieUsager.php" method="post">
        Civilité : <input type = text name="Civilite" /><br/>
        Nom : <input type="text" name="Nom"><br />
        Prenom : <input type="text" name="Prenom" /><br />
        Adresse : <input type="text" name="Adresse" /><br />
        Code Postal : <input type="text" name="Code_postal" /><br />
        Ville : <input type="text" name="Ville" /><br />
        Date de Naissance : <input type="date" name="Date_Naissance" /><br />
        Ville de Naissance : <input type="text" name="Ville_Naissance" /><br />
        Numéro de sécurité sociale : <input type="text" name="Secu" /><br />

        <input type="submit" value="Ajout" name="ajout">
        <input type="reset" value="Reset" name="reset">
    </form>


    <?php

        include 'resrc/Connect.php';
        
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
                header('Location: index.php');
            }
        }
        else{
            print("oh nooooo");
        }
    ?>

</body>

</html>