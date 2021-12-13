<?php
///Connexion au serveur MySQL
include "resrc/Connect.php";

if (isset($_GET["id_Medecin"])) {
    $req = $linkpdo->prepare('SELECT * FROM medecin WHERE id_Medecin=?');
    $req->execute(array($_GET["id_Medecin"]));
    $medecin = $req->fetch()
?>

    <html>

    <body>
        <h1>Suppression d'un médecin <?php echo $medecin["Nom"]." ".$medecin["Prenom"] ?> ?</h1>
        <form action="suppressionMedecin.php" method="post">
            <input type="hidden" name="id_Medecin" value="<?php echo $medecin["id_Medecin"] ?>" />
            <button type="submit">Supprimer</button>
        </form>
    </body>

    </html>

<?php
} else if (isset($_POST["id_Medecin"])) {
    $reqDel = $linkpdo->prepare('DELETE FROM medecin WHERE id_Medecin=?');
    $reqDel->execute(array($_POST["id_Medecin"]));
    header('Location: rechercheUsager.php');
}
?> 