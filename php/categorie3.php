<?php 
    session_start();
    include_once('varSession.inc.php');
    include_once('fonctions_panier.php');
    include_once('./bdd/bddData.php');
    include_once('./bdd/bdd.php');

    $res=connectDB($host, $dbUsername, $dbPass, $dbName, $cnx);
    if($res){
        $Equipements= getProductsFromDB('Equipement',$cnx);
    }

    if(count($Equipements)==0){
        echo'nul';
    }

?>


<input type="button"   value="Stock" id="afficherStock" onclick="toggle_text()"/>
<div class="page">
    <?php foreach($Equipements as $equipements): ?>
        <div class="item1">
            <div><p><img src="img/<?php echo $equipements['ref'];?>.jpg" alt="Vetements" id="<?php echo $equipements['ref'];?>" onclick="zoomImg('<?php echo $equipements['ref'];?>')" /></p></div>
            <div><p><?php echo $equipements['libelle']; ?> <br/><br/><?php echo $equipements['ref']; ?></p></div>
            <div><p><?php echo $equipements['prix'];?> €</p></div>
            <div class="passeCommande">
                <input type="button"   value="-"   onclick="down('<?php echo $equipements['id'];?>')" />
                <input type="number"   value=""  id="<?php echo $equipements['id'];?>" class="commande" min="0" />
                <input type="button"   value="+"  onclick="up('<?php echo $equipements['id'];?>')" />
                <div class="ajoutPanier"><input type="button"   value="Ajout au Panier" onClick="<?php ajouterArticle($equipements['libelle'],$equipements['ref'],2,$equipements['prix'])?>"/></div>
            </div>
            <div><p class="stock">stock : <span id="<?php echo $equipements['id'];?>Stock"><?php echo $equipements['stock'];?></span></p></div>
        </div>
    <?php endforeach;?>
    
    
</div>