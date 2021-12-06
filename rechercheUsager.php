<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" <body>
<div class="container">
    <h1>Recherche d'un usager</h1>
    <form action="rechercheUsager.php" method="get">
        <div class="mb-3">
            <label for="recherche" class="form-label">Saisissez l'usager à chercher :</label>
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
        $req = $linkpdo->prepare('SELECT * FROM usager WHERE Nom LIKE CONCAT("%", ?, "%") OR Prenom LIKE CONCAT("%", ?, "%")');
        ///Exécution de la requête avec les paramètres passés sous forme de tableau indexé
        $req->execute(array($recherche, $recherche));
    ?>

        <p>Votre recherche est : <strong><?php echo $recherche ?></strong></p>

    <?php
    } else {
    ?>
        <p>Voici tous les usagers</p>


    <?php
        $req = $linkpdo->prepare('SELECT * FROM usager');
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
                <th scope="col">Adresse</th>
                <th scope="col">Code postal</th>
                <th scope="col">Ville</th>
                <th scope="col">Date Naissance</th>
                <th scope="col">Ville Naissance</th>
                <th scope="col">Sécu</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>

            <?php
            while ($usager = $req->fetch()) {
            ?>
                <tr>
                    <td><?php echo $usager["Civilite"] ?> </td>
                    <td><?php echo $usager["Nom"] ?> </td>
                    <td><?php echo $usager["Prenom"] ?> </td>
                    <td><?php echo $usager["Adresse"] ?> </td>
                    <td><?php echo $usager["Code_postal"] ?> </td>
                    <td><?php echo $usager["Ville"] ?> </td>
                    <td><?php echo $usager["Date_Naissance"] ?> </td>
                    <td><?php echo $usager["Ville_Naissance"] ?> </td>
                    <td><?php echo $usager["Secu"] ?> </td>
                    <td> <a type="button" class="btn btn-outline-secondary btn-sm" href="modifierUsager.php?id_Usager=<?php echo $usager["id_Usager"] ?>">Modifier</a>
                    <td> <a type="button" class="btn btn-outline-danger btn-sm" href="suppressionUsager.php?id_Usager=<?php echo $usager["id_Usager"] ?>">Supprimer</a>
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