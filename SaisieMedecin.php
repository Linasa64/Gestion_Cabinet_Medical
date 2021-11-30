<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Ajout Medecin</title>
</head>

<body>

    <h1>Saisie d'un nouveau Médecin</h1>
    <form action="ajoutMedecin.php" method="post">
        Civilité : <input type = text name="Civilite" /><br>
        Nom : <input type="text" name="Nom"><br>
        Prenom : <input type="text" name="Prenom" /><br>

        <input type="submit" value="Ajout" name="ajout">
        <input type="reset" value="Reset" name="reset">
    </form>

</body>

</html>