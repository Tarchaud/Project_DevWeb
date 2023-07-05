<?php 
    session_start();
    include_once('varSession.inc.php');
    include_once('fonctions_panier.php');
    include_once('./bdd/bddData.php');
    include_once('./bdd/bdd.php');

    $res=connectDB($host, $dbUsername, $dbPass, $dbName, $cnx);
    if($res){
        $Chaussures= getProductsFromDB('Chaussure',$cnx);
    }

    if(count($Chaussures)==0){
        echo'nul';
    }

?>



<input type="button"   value="Stock" id="afficherStock" onclick="toggle_text()"/>
<div class="page">
    <?php foreach($Chaussures as $chaussures): ?>
        
        <div class="item1">
            <div><p><img src="img/<?php echo $chaussures['ref'];?>.jpg" alt="Chaussures" id="<?php echo $chaussures['ref'];?>" onclick="zoomImg('<?php echo $chaussures['ref'];?>')" /></p></div>
            <div><p><?php echo $chaussures['libelle']; ?><br/><br/><?php echo $chaussures['ref']; ?></p></div>
            <div><p><?php echo $chaussures['prix'];?> €</p></div>
            <div class="passeCommande">
                <input type="button"   value="-"   onclick="down('<?php echo $chaussures['id'];?>')" />
                <input type="number"   value=""  id="<?php echo $chaussures['id'];?>" class="commande" min="0" />
                <input type="button"   value="+"  onclick="up('<?php echo $chaussures['id'];?>')" />
                <div class="ajoutPanier"><input type="submit"   value="Ajout au Panier" onClick="<?php ajouterArticle($chaussures['libelle'],$chaussures['ref'],2,$chaussures['prix'])?>"/></div>
            </div>
            <div><p class="stock">stock : <span id="<?php echo $chaussures['id'];?>Stock"><?php echo $chaussures['stock'];?></span></p></div>
        </div>
    <?php endforeach;?>
    
    
</div>