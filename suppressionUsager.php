<?php

include 'resrc/Connect.php';

if (isset($_GET["id_Usager"])) {
    $req = $linkpdo->prepare('SELECT * FROM usager WHERE id_Usager=?');
    $req->execute(array($_GET["id_Usager"]));
    $usager = $req->fetch();
?>

    <html>

    <body>

        <h1>
            Suppression d'un usager 
            <?php echo $usager["Nom"]." ".$usager["Prenom"] ?> 
            ?
        </h1>

        <form action="suppressionUsager.php" method="post">
            <input type="hidden" name="id_Usager" value="<?php echo $usager["id_Usager"] ?>" />
            <button type="submit">Supprimer</button>
        </form>

    </body>

    </html>

<?php
} else if (isset($_POST["id_Usager"])) {
    $reqDel = $linkpdo->prepare('DELETE FROM usager WHERE id_Usager=?');
    $reqDel->execute(array($_POST["id_Usager"]));
    header('Location: rechercheUsager.php');
}
?>