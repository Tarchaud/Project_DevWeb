<!-- ouverture du ficiher json -->
<?php

$file1= './json/utilisateurs.json';
$data= file_get_contents($file1);
$tableau= json_decode($data, true);





?>

<!-- Validation du formulaire -->
<?php

if (isset($_POST['login']) && isset($_POST['password'])) {
    foreach($tableau as $login=>$password) {
        if($login === $_POST['login'] && $password === $_POST['password']) {
            $utilisateurConnecte = ['login' => $login,];
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['password'] = $_POST['password'];
        }
        else {
            $messageErreur = sprintf('Login ou mot de passe incorrect');
        }
    }
}
?>

<!-- Si l'utilisateur n'est pas reconnu --> 
<?php if(!isset($_SESSION['login'])): ?>
<form action="index.php" method="post">
                                
    <h3>Connexion</h3>
                            
    <input type="text" placeholder="Entrer le login" name="login" required>

    <br />
    
    <input type="password" placeholder="Entrer le mot de passe" name="password" required>

    <br />
    <input type="submit" id='submit' value='SE CONNECTER' >

    <?php if(isset($messageErreur)): ?>
        <div class="erreur_msg" role="alert">
            <p style= "color:red"><?php echo $messageErreur; ?></p>
        </div>
    <?php endif; ?>

</form>


<!-- Si l'utilisateur est reconnu --> 
<?php else: ?>
    <ul class="succes" role="alert">
        <li>
            <img src="./img/utilisateur.png" alt="utilisateur" />
            Bonjour <?php echo $_SESSION['login']; ?>
        </li>
        <li class="deco"><a href="./php/deconnexion.php">Se déconnecter</a></li>
        

</ul>
<?php endif; ?>
