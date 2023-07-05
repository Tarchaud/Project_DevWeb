<?php

    include('bddData.php');

    function connectDB($host, $dbUsername, $dbPass, $dbName, &$cnx){
        include_once("bddData.php");
        $cnx = mysqli_connect($host,$dbUsername,$dbPass);
        if(mysqli_connect_errno($cnx)) {
        echo mysqli_connect_error();
        return false;
        }
        $cnx -> set_charset("utf8");
        $boolRes = mysqli_select_db($cnx,$dbName);
        return $boolRes;
    }

    function disconnectDB($connexion){
        mysqli_close($connexion);
    }

    function getProductsFromDB($Categorie, $connexion){  
        $result = mysqli_query($connexion, "SELECT * FROM $Categorie");
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    


?>