<?php

function creationPanier(){
    if(!isset($_SESSION['panier'])) {
        $_SESSION['panier']=array();
        $_SESSION['panier']['libelle']=array();
        $_SESSION['panier']['reference']=array();
        $_SESSION['panier']['quantite']=array();
        $_SESSION['panier']['prix']=array();

    }
    return true;
}

function ajouterArticle($libelle, $ref, $quantite, $prix) {

    if(creationPanier()) {
        $positionProduit = array_search($libelle, $_SESSION['panier']['libelle']);
        if ($positionProduit !== false) {
            $_SESSION['panier']['quantite'][$positionProduit] += $quantite;

        }
        else {
            array_push($_SESSION['panier']['libelle'], $libelle);
            array_push($_SESSION['panier']['reference'], $ref);
            array_push($_SESSION['panier']['quantite'], $quantite);
            array_push($_SESSION['panier']['prix'], $prix);
        }
    }
    else {
        echo "Un problème est survenu";
    }
}

function supprimerArticle($libelle) {

    if(creationPanier()) {
        $panier_tmp=array();
        $panier_tmp['libelle']=array();
        $panier_tmp['reference']=array();
        $panier_tmp['quantite']=array();
        $panier_tmp['prix']=array();

        for ($i=0; $i<count($_SESSION['panier']['libelle']); $i++) {

            if($_SESSION['panier']['libelle'][$i] !== $libelle) {
                array_push($panier_tmp['libelle'], $_SESSION['panier']['libelle'][$i]);
                array_push($panier_tmp['reference'], $_SESSION['panier']['reference'][$i]);
                array_push($panier_tmp['quantite'], $_SESSION['panier']['quantite'][$i]);
                array_push($panier_tmp['prix'], $_SESSION['panier']['prix'][$i]);
            }
        }

        $_SESSION['panier']=$panier_tmp;
        unset($tmp);
    }
    else {
        echo("Une erreur est survenue");
    }

}

function modifierQuantiteArticle($libelle, $quantite) {

    if(creationPanier()) {

        if($quantite>0) {
            $positionProduit= array_search($libelle, $_SESSION['panier']['libelle']);

            if($positionProduit !== false) {
                $_SESSION['panier']['quantite'][$positionProduit] = $quantite;
            }
        }
        else {
            supprimerArticle($libelle);
        }
    }
    else {
        echo "Erreur";
    }
}

function montantTotal() {
    $montant=0;
    
    for($i=0; $i<count($_SESSION['panier']['libelle']); $i++) {
        $montant += $_SESSION['panier']['prix'][$i] * $_SESSION['panier']['quantite'][$i];
    }
    return $montant;
}

function supprimerPanier() {
    unset($_SESSION['panier']);
}

function nombreArticles() {
    $total=0;
    if(isset($_SESSION['panier'])) {
        
        for($i=0; $i<count($_SESSION['panier']['libelle']); $i++) {
            $total+= $_SESSION['panier']['quantite'][$i];
        }
    }
    return $total;
}
?>