<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Saisie d'un rendez-vous</title>
</head>

<body>
    <h1>Enregistrer un nouveau rendez-vous</h1>

    <?php

    try {
        $linkpdo = new PDO("mysql:host=localhost;dbname=gestcabmed", 'root');
    }
    ///Capture des erreurs éventuelles
    catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    if (isset($_GET["id_Usager"])) {
        $req = $linkpdo->prepare('SELECT * FROM usager WHERE id_Usager=?');
        $req->execute(array($_GET["id_Usager"]));
        $usager = $req->fetch();
    }
    ?>

    <h2>Nouveau rendez-vous pour l'usager <?php echo $usager["Nom"] . " " . $usager["Prenom"] ?></h2>

    Rendez-vous avec le médecin :

    <?php
    if (isset($_GET["id_Usager"])) {
        $reqNomMedRef = $linkpdo->prepare('SELECT Nom, Prenom FROM medecin, referent WHERE id_Usager=? AND medecin.id_Medecin = referent.id_Medecin ');
        $reqNomMedRef->execute(array($_GET["id_Usager"]));
        $idMedRef = $reqNomMedRef->fetch();
        
    }
    ?>
    <?php echo $idMedRef[0], ' ', $idMedRef[1]; ?>
    </br>
    <form action="saisieRdv.php" method="post">
        Date du rendez-vous :
        <input type="date" id="start" name="dateRdv" value=<?php echo date('Y-m-d'); ?> min=<?php echo date('Y-m-d'); ?> max="<?php echo date('2100-12-31'); ?>">
        </br>
        Heure du rendez-vous :
        <input type="time" id="appt" name="heureRdv" min="08:00" max="20:00" required>
        </br>
        Durée du rendez-vous :
        <input type="time" name="dureeRdv" value="00:30" />
    </form>

    </br>
    
    <button type="submit">Enregistrer</button>


</body>

</html>