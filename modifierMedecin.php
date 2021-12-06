<?php

include "resrc/Connect.php";

if (isset($_GET["id_Usager"])) {
    $req = $linkpdo->prepare('SELECT * FROM usager WHERE id_Usager=?');
    $req->execute(array($_GET["id_Usager"]));
    $usager = $req->fetch()
?>

    <html>

    <body>
        <h1>Modification d'un usager</h1>

        <form action="modifierUsager.php" method="post">
        Civilité : <input type = text name="Civilite" value="<?php echo $medecin["Civilite"] ?>"/><br/>
        Nom : <input type="text" name="Nom" value="<?php echo $medecin["Nom"] ?>"><br />
        Prenom : <input type="text" name="Prenom" value="<?php echo $medecin["Prenom"] ?>"/><br />
       
        <input type="hidden" name="id_Usager" value="<?php echo $medecin["id_Medecin"] ?>" />
        <button type="submit">Modifier</button>
    </form>
    </body>

    </html>

<?php
} else if (isset($_POST["id_Medecin"])) {
    // Modification
    $reqModif = $linkpdo->prepare('UPDATE medecin SET Civilite = ?, Nom = ?, Prenom=?');
    $reqModif->execute(array($_POST["Civilite"], $_POST["Nom"], $_POST["Prenom"], $_POST["id_Medecin"]));
    header('Location: rechercheMedecin.php');
}

?>