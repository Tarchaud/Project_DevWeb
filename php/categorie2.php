<?php 
    session_start();
    include_once('varSession.inc.php');
    include_once('fonctions_panier.php');
    include_once('./bdd/bddData.php');
    include_once('./bdd/bdd.php');

    $res=connectDB($host, $dbUsername, $dbPass, $dbName, $cnx);
    if($res){
        $Vetements= getProductsFromDB('Vêtement',$cnx);
    }

    if(count($Vetements)==0){
        echo'nul';
    }

?>

<input type="button"   value="Stock" id="afficherStock" onclick="toggle_text()"/>
<div class="page">
    <?php foreach($Vetements as $vetements): ?>
        <div class="item1">
            <div><p><img src="img/<?php echo $vetements['ref'];?>.jpg" alt="Vetements" id="<?php echo $vetements['ref'];?>" onclick="zoomImg('<?php echo $vetements['ref'];?>')" /></p></div>
            <div><p><?php echo $vetements['libelle']; ?><br/><br/><?php echo $vetements['ref']; ?></p></div>
            <div><p><?php echo $vetements['prix'];?> €</p></div>
            <div class="passeCommande">
                <input type="button"   value="-"   onclick="down('<?php echo $vetements['id'];?>')" />
                <input type="number"   value=""  id="<?php echo $vetements['id'];?>" class="commande" min="0" />
                <input type="button"   value="+"  onclick="up('<?php echo $vetements['id'];?>')" />
                <div class="ajoutPanier"><input type="submit"   value="Ajout au Panier" onClick="<?php ajouterArticle($vetements['libelle'],$vetements['ref'],2,$vetements['prix'])?>"/></div>
            </div>
            <div><p class="stock">stock : <span id="<?php echo $vetements['id'];?>Stock"><?php echo $vetements['stock'];?></span></p></div>
        </div>
    <?php endforeach;?>
    
    
</div>