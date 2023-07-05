/*Afficher le stock*/
function toggle_text() {
    let span = document.getElementsByClassName("stock");
    for (let index = 0; index < span.length; index++) {
        if(span[index].style.display == "none") {
            span[index].style.display = "block";
        } else {
            span[index].style.display = "none";
        }
        
    }
}


/*Pour up et down la quantité à commander*/
function up(index) {
    var input= document.getElementById(index);
    var max = document.getElementById(index+"Stock").textContent;
    if (input.value<parseInt(max)) {
        input.value++;
    }
    
}

function down(index) {
    var input= document.getElementById(index);
    if(input.value>0) input.value--;
       
}

/*Zoom image*/
function zoomImg(index) {
    var img = document.getElementById(index);
    if (img.style.msTransform=="none") {
        img.style.msTransform = "scale(1.5)";
        img.style.webkitTransform= "scale(1.5)";
        img.style.transform= "scale(1.5)";
    } else {
        img.style.msTransform = "none";
        img.style.webkitTransform= "none";
        img.style.transform= "none";
    }
}


/* Pour valider le form*/
/*document.forms["priseContact"].addEventListener("submit", function(e) {
    var erreur='';
    var inputs= this;

    for (var i=0; i<inputs.length; i++) {
        if (!inputs[i].value) {
            erreur= "Veuillez renseigner tous les champs";
            
        }
    }

    if (erreur) {
        e.preventDefault();
        document.getElementById("erreur").innerHTML = erreur;
    }
    else {
        alert("Formulaire envoyé")
    }
});
*/

/*document.forms["priseContact"].addEventListener("submit", function(e) {
    var dateContact= document.forms["priseContact"]["dateContact"];
    var nom= document.forms["priseContact"]["nom"];
    var prenom= document.forms["priseContact"]["prenom"];
    var email= document.forms["priseContact"]["email"];
    var dateNaissance= document.forms["priseContact"]["dateNaissance"];
    var sujet= document.forms["priseContact"]["sujet"];
    var contenu= document.forms["priseContact"]["contenu"];
    var genre_h= document.forms["priseContact"]["Homme"];
    var genre_f= document.forms["priseContact"]["Femme"];

    var regexLettres= /^[a-zA-Z-\s]+$/;

    if (dateContact.value == "") {
        e.preventDefault();
        var erreurDateContact= document.getElementById("erreur-date-contact").innerHTML = "Veuillez renseigner une date, de la forme mm/dd/yyyy";
        dateContact.style.border= " 2px solid red";
        dateContact.focus();
        return false;
    }

    if (nom.value == "" || regexLettres.test(nom.value)==false) {
        e.preventDefault();
        var erreurNom= document.getElementById("erreur-nom").innerHTML = "Veuillez renseigner votre nom, seulement avec des lettres";
        nom.style.border= " 2px solid red";
        nom.focus();
        return false;
    }

    if (prenom.value == "" || regexLettres.test(nom.value)==false) {
        e.preventDefault();
        var erreurPrenom= document.getElementById("erreur-prenom").innerHTML = "Veuillez renseigner votre prenom, seulement avec des lettres";
        prenom.style.border= " 2px solid red";
        prenom.focus();
        return false;
    }

    if (email.value == "") {
        e.preventDefault();
        var erreurEmail= document.getElementById("erreur-email").innerHTML = "Veuillez renseigner une adresse email valide, du type mail@gmail.com";
        email.style.border= " 2px solid red";
        email.focus();
        return false;
    }

    if (!genre_f.checked && !genre_h.checked) {
        e.preventDefault();
        var erreurGenre= document.getElementById("erreur-genre").innerHTML = "Veuillez renseigner votre genre";
        genre_f.style.border= "2px solid red";
        genre_h.style.border= "2px solid red";
        return false;
    }

    if (dateNaissance.value == "") {
        e.preventDefault();
        var erreurDateNaissance= document.getElementById("erreur-date-naissance").innerHTML = "Veuillez renseigner votre date de naissance, de la forme mm/dd/yyyy";
        dateNaissance.style.border= " 2px solid red";
        dateNaissance.focus();
        return false;
    }

    if (sujet.value == "") {
        e.preventDefault();
        var erreurSujet= document.getElementById("erreur-sujet").innerHTML = "Veuillez renseigner un sujet";
        sujet.style.border= " 2px solid red";
        sujet.focus();
        return false;
    }

    if (contenu.value == "") {
        e.preventDefault();
        var erreurContenu= document.getElementById("erreur-contenu").innerHTML = "Veuillez renseigner un contenu";
        contenu.style.border= " 2px solid red";
        contenu.focus();
        return false;
    }

    else {
        alert("Formulaire envoyé");
    }

});*/



