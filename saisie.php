<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Ajout usager</title>
</head>

<body>

    <h1>Saisie d'un nouvel usager</h1>
    <form action="ajoutUsager.php" method="post">
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

</body>

</html>