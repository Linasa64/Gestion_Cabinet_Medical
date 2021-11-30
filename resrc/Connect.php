<?php

    //Connexion au serveur MySQL
    $link = mysqli_connect("localhost", "root", "root", "gestcabmed") or die("Error".mysqli_error($link));

    //Vérification de la connexion
    if(mysqli_connect_errno()){
        print("connect filed: \n".mysqli_connect_error());
        exit();
    }
    print_r($_POST);

 ?>