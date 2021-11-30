<?php
///Connexion au serveur MySQL
try {
    $linkpdo = new PDO("mysql:host=localhost;dbname=gestcabmed", 'root');
}
///Capture des erreurs éventuelles
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

if (isset($_GET["id_Usager"])) {
    $req = $linkpdo->prepare('SELECT * FROM carnet WHERE id_Usager=?');
    $req->execute(array($_GET["id_Usager"]));
    $usager = $req->fetch()
?>

    <html>

    <body>
        <h1>Suppression d'un usager <?php echo $usager["Nom"]." ".$contact["Prenom"] ?> ?</h1>
        <form action="suppressionUsager.php" method="post">
            <input type="hidden" name="id_Usager" value="<?php echo $contact["id_Usager"] ?>" />
            <button type="submit">Supprimer</button>
        </form>
    </body>

    </html>

<?php
} else if (isset($_POST["id_Usager"])) {
    $reqDel = $linkpdo->prepare('DELETE FROM carnet WHERE id_Usager=?');
    $reqDel->execute(array($_POST["id_Usager"]));
    header('Location: rechercheUsager.php');
}
?>