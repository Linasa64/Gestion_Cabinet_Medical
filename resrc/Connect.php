<?php

    //Connexion au serveur MySQL
    $linkpdo = mysqli_connect("localhost", "root", "", "gestcabmed") or die("Error".mysqli_error($linkpdo));

    //Vérification de la connexion
    if(mysqli_connect_errno()){
        print("connect filed: \n".mysqli_connect_error());
        exit();
    }
    print_r($_POST);

 ?>