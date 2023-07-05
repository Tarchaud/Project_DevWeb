<?php
session_start();
$title="";
$file="";
$head="";
if(isset($_GET['page'])){
    $page = $_GET['page'];
    $page = strip_tags($page);
    $page = stripslashes($page);
    $page = trim($page);

    switch($page)
    {
        case "accueil":
            $file = './php/accueil.php';
            $title = 'Le Vestiaire Du Foot';
            $head="./php/head1.php";
            break;
        case "categorie1":
            $file = './php/categorie1.php';
            $title = 'Chaussure';
            $head="./php/head2.php";
            break;
        case "categorie2":
            $file = './php/categorie2.php';
            $title = 'Vêtement';
            $head="./php/head2.php";
            break;
        case "categorie3":
            $file = './php/categorie3.php';
            $title = 'Equipement';
            $head="./php/head2.php";
            break;
        case "contact":
            $file = './php/contact.php';
            $title = 'Contactez-nous';
            $head="./php/head1.php";
            break;
        case "panier":
            $file= "./php/panier.php";
            $title= 'Panier';
            $head= './php/head2.php';
            break;
        default:
            $file = './php/accueil.php';
            $head="./php/head1.php";
            $title = 'Le Vestiaire Du Foot';
    }
}
else{
    $file = './php/accueil.php';
    $title = 'Le Vestiaire Du Foot';
    $head="./php/head1.php";
}

?>
<html lang="fr">
    <head>
        <title><?php echo $title; ?></title>
        <?php include($head) ?>
    </head>
    <body>
        <?php include("./php/header.php") ?>
        <?php include($file) ?>   
        <?php include("./php/footer.php") ?>
    </body>
</html>



