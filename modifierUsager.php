<?php
///Connexion au serveur MySQL
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
        Civilité : <input type = text name="Civilite" value="<?php echo $usager["Civilite"] ?>"/><br/>
        Nom : <input type="text" name="Nom" value="<?php echo $usager["Nom"] ?>"><br />
        Prenom : <input type="text" name="Prenom" value="<?php echo $usager["Prenom"] ?>"/><br />
        Adresse : <input type="text" name="Adresse" value="<?php echo $usager["Adresse"] ?>"/><br />
        Code Postal : <input type="text" name="Code_postal" value="<?php echo $usager["Code_postal"] ?>"/><br />
        Ville : <input type="text" name="Ville" value="<?php echo $usager["Ville"] ?>"/><br />
        Date de Naissance : <input type="date" name="Date_Naissance" value="<?php echo $usager["Date_Naissance"] ?>"/><br />
        Ville de Naissance : <input type="text" name="Ville_Naissance" value="<?php echo $usager["Ville_Naissance"] ?>"/><br />
        Numéro de sécurité sociale : <input type="text" name="Secu" value="<?php echo $usager["Secu"] ?>"/><br />

        <input type="hidden" name="id_Usager" value="<?php echo $usager["id_Usager"] ?>" />
        <button type="submit">Modifier</button>
    </form>
    </body>

    </html>

<?php
} else if (isset($_POST["id_Usager"])) {
    // Modification
    $reqModif = $linkpdo->prepare('UPDATE usager SET Civilite = ?, Nom = ?, Prenom=?, Adresse=?, Code_postal=?, Ville=?, Date_Naissance=?, Ville_Naissance = ?, Secu = ? WHERE id_Usager=?');
    $reqModif->execute(array($_POST["Civilite"], $_POST["Nom"], $_POST["Prenom"], $_POST["Adresse"], $_POST["Code_postal"], $_POST["Ville"], $_POST["Date_Naissance"], $_POST["Ville_Naissance"], $_POST["Secu"], $_POST["id_Usager"]));
    header('Location: rechercheUsager.php');
}
?>