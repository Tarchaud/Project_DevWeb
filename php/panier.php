<?php
    session_start();
    include_once("fonctions_panier.php");
    $erreur = false;

$action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null )) ;
if($action !== null)
{
   if(!in_array($action,array('ajout', 'suppression', 'refresh')))
   $erreur=true;

   //récupération des variables en POST ou GET
   $l = (isset($_POST['l'])? $_POST['l']:  (isset($_GET['l'])? $_GET['l']:null )) ;
   $p = (isset($_POST['p'])? $_POST['p']:  (isset($_GET['p'])? $_GET['p']:null )) ;
   $q = (isset($_POST['q'])? $_POST['q']:  (isset($_GET['q'])? $_GET['q']:null )) ;

   //Suppression des espaces verticaux
   $l = preg_replace('#\v#', '',$l);
   //On vérifie que $p est un float
   $p = floatval($p);

   //On traite $q qui peut être un entier simple ou un tableau d'entiers
    
   if (is_array($q)){
      $QteArticle = array();
      $i=0;
      foreach ($q as $contenu){
         $QteArticle[$i++] = intval($contenu);
      }
   }
   else
   $q = intval($q);
    
}

if (!$erreur){
   switch($action){
      Case "ajout":
         ajouterArticle($l,$r,$q,$p);
         break;

      Case "suppression":
         supprimerArticle($l);
         break;

      Case "refresh" :
         for ($i = 0 ; $i < count($QteArticle) ; $i++)
         {
            modifierQuantiteArticle($_SESSION['panier']['libelleProduit'][$i],round($QteArticle[$i]));
         }
         break;

      Default:
         break;
   }
}

?>

<form method="post" action="panier.php">
    <table style="width: 400px">
        <tr>
            <td colspan="5">Votre panier</td>
        </tr>
        <tr>
            <td>Libelle</td>
            <td>Reference</td>
            <td>quantite</td>
            <td>prix</td>
            <td>action</td>
        </tr>
        <?php
                if (creationPanier())
                {
                    
                    $nbArticles=count($_SESSION['panier']['libelle']);
                    if ($nbArticles <= 0)
                    echo "<tr><td>Votre panier est vide </ td></tr>";
                    else
                    {
                        for ($i=0 ;$i < $nbArticles ; $i++)
                        {
                            echo "<tr>";
                            echo "<td>".htmlspecialchars($_SESSION['panier']['libelle'][$i])."</ td>";
                            echo "<td>".htmlspecialchars($_SESSION['panier']['reference'][$i])."</ td>";
                            echo "<td><input type=\"text\" size=\"4\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['panier']['quantite'][$i])."\"/></td>";
                            echo "<td>".htmlspecialchars($_SESSION['panier']['prix'][$i])."</td>";
                            echo "<td><input type=\"button\" value=\"supprimer\" onclick=\"\" /></td>";
                            echo "</tr>";
                        }

                        echo "<tr><td colspan=\"2\"> </td>";
                        echo "<td colspan=\"2\">";
                        echo "Total : ".MontantTotal();
                        echo "</td></tr>";
                    }
                }
        ?>
    </table>
</form>
