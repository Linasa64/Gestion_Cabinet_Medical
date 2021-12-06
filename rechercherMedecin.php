<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" <body>
<div class="container">
    <h1>Recherche d'un medecin</h1>
    <form action="rechercherMedecin.php" method="get">
        <div class="mb-3">
            <label for="recherche" class="form-label">Saisissez le medecin à chercher :</label>
            <input type="text" id="recherche" name="recherche" class="form-control" value="<?php if (isset($_GET['recherche'])) echo $_GET["recherche"] ?>" />
        </div>

        <button class="btn btn-primary" type="submit">Rechercher</button>
    </form>

    <?php

    ///Connexion au serveur MySQL
    try {
        $linkpdo = new PDO("mysql:host=localhost;dbname=gestcabmed", 'root');
    }
    ///Capture des erreurs éventuelles
    catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    if (isset($_GET['recherche'])) {
        $recherche = $_GET['recherche'];

        ///Préparation de la requête sans les variables (marqueurs : ?)
        $req = $linkpdo->prepare('SELECT * FROM medecin WHERE Nom LIKE CONCAT("%", ?, "%") OR Prenom LIKE CONCAT("%", ?, "%")');
        ///Exécution de la requête avec les paramètres passés sous forme de tableau indexé
        $req->execute(array($recherche, $recherche));
    ?>

        <p>Votre recherche est : <strong><?php echo $recherche ?></strong></p>

    <?php
    } else {
    ?>
        <p>Voici tous les medecins</p>


    <?php
        $req = $linkpdo->prepare('SELECT * FROM medecin');
        ///Exécution de la requête avec les paramètres passés sous forme de tableau indexé
        $req->execute();
    }
    ?>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Civilité</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>

            <?php
            while ($medecin = $req->fetch()) {
            ?>
                <tr>
                    <td><?php echo $medecin["Civilite"] ?> </td>
                    <td><?php echo $medecin["Nom"] ?> </td>
                    <td><?php echo $medecin["Prenom"] ?> </td>
                    <td> <a type="button" class="btn btn-outline-secondary btn-sm" href="modifierUsager.php?id_Medecin=<?php echo $medecin["id_Medecin"] ?>">Modifier</a>
                    <td> <a type="button" class="btn btn-outline-danger btn-sm" href="suppressionMedecin.php?id_Medecin=<?php echo $medecin["id_Medecin"] ?>">Supprimer</a>
                </tr>
            <?php
            }
            ?>

        </tbody>
    </table>
</div>

</body>

</html>

</html>