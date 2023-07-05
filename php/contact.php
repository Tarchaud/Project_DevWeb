<?php
    @$date_contact=$_POST["date_contact"];
    @$nom=$_POST["nom"];
    @$prenom=$_POST["prenom"];
    @$email=$_POST["email"];
    @$genre=$_POST["genre"];
    @$date_naissance=$_POST["date_naissance"];
    @$sujet=$_POST["sujet"];
    @$message=$_POST["message"];
    @$valider=$_POST["submit"];
    $red="black";
    $red1="black";
    $red2="black";
    $red3="black";
    $red4="black";
    $red5="black";
    $red6="black";
    
    if($valider){
        if($date_contact==''){
            $red3="red";
        }   
        if($nom == "" ){ 
            $nomerreur = "Ex : Chautard";
            $red = "red";
        }
        if($prenom == ""){
            $prenomerreur = "Ex : Corentin";
            $red1 = "red";
        }
        if($email=='' || strpos($email, '@') == false){
            $emailerreur = "Ex : mail@___.com, mail@__.fr";
            $red2 = "red";
        }
        if($date_naissance==''){
            $red4="red";
        }
        if($sujet==''){
            $sujeterreur = "Ex : Prix chaussures";
            $red5="red";
        }
        if($message==''){
            $messageerreur = "Ne peux pas être vide";
            $red6="red";
        }
    }

    if(isset($email) && $email!=""){
        $destinataire="Webmaster@exemple.com";

        $entete ="Content-Type : text/html;\n";
        $entete.="Form: ".$email;

        $contenu=utf8_decode($message)."\r\n";
        $contenu="De: ".$email."<br /><br /><strong>Sujet: ".$sujet."</strong><br /><br />".$contenu;
        $contenu="<html><body>".$contenu."</body></html>";

        mail($destinataire,$sujet,$contenu,$entete);
    }

?>

<div class="page">
    <div>
        <h2>Demande de Contact</h2>
    <form action="" method="post" name="priseContact" >
        <div id="verif1">
            <div class="verif">
                Date du contact : <input type="date" name="date_contact" id="dateContact" style="border-color : <?php echo $red3; ?>"/>
            </div>
            <!--<div class="verif" style= "color: red;" id="erreur-date-contact"></div>-->
        </div>
        <div id="verif2">
            <div class="verif">
                Nom : <input type="text" name="nom" id="nom" placeholder="<?php echo $nomerreur; ?>" style="border-color : <?php echo $red; ?>" value="<?php echo $nom; ?>"/>
            </div>
            <!--<div class="verif" style= "color: red;" id="erreur-nom"></div>-->
        </div>
        <div id="verif3">
            <div class="verif">
                Prénom : <input type="text" name="prenom" id="prenom" placeholder="<?php echo $prenomerreur; ?>" value="<?php echo $prenom; ?>" style="border-color : <?php echo $red1; ?>"/>
            </div>
            <!--<div class="verif" style= "color: red;" id="erreur-prenom"></div>-->
        </div>
        <div id="verif4">
            <div class="verif">
                Email : <input type="email" id ="email" name="email" placeholder="<?php echo $emailerreur; ?>" value="<?php echo $email; ?>"style="border-color : <?php echo $red2; ?>"/>
            </div>
            <!--<div class="verif" style= "color: red;" id="erreur-email"></div>-->
        </div>
        <div id="verif5">
            <div class="verif">
                Genre : <input type="radio" name="genre" value="Femme" id="Femme" /><label for="Femme" >Femme</label> 
                <input type="radio" name="genre" value="Homme" id="Homme" /><label for="Homme">Homme</label>
            </div>
            <!--<div class="verif" style= "color: red;" id="erreur-genre"></div>-->
        </div>
        <div id="verif6">
            <div class="verif">
                Date de naissance : <input type="date" name="date_naissance" id="dateNaissance" style="border-color : <?php echo $red4; ?>"/>
            </div>
            <!--<div class="verif" style= "color: red;" id="erreur-date-naissance"></div>-->
        </div>
        <div id="verif7">
            <div class="verif">
                Sujet : <input type="text" name="sujet" id="sujet" placeholder="<?php echo $sujeterreur; ?>" value="<?php echo $sujet; ?>" style="border-color : <?php echo $red5; ?>"/>
            </div>
            <!--<div class="verif" style= "color: red;" id="erreur-sujet"></div>-->
        </div>
        <div id="verif8">
            <div class="verif"> 
                Contenu<br />
                <textarea name="message" id="contenu" placeholder="<?php echo $messageerreur; ?>" value="<?php echo $message; ?>" style="border-color : <?php echo $red6; ?>"></textarea>
            </div>
            <!--<div class="verif" style= "color: red;" id="erreur-contenu"></div>-->
        </div>
        <input type="submit" name="submit" value="Envoyer" /> 
    </form>


    <!--p style= "color: red;" id="erreur"></p>
    <script type="text/javascript" src="js/script.js"></script>
    </div>-->
    
</div>