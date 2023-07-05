<header>
    <div class="logo">
        <a href="../index.php"><img src="img/logo.png" alt="logo" /></a>
        <h1>Le Vestiaire<br/>Du Foot</h1>
    </div>
    <nav>
        <ul class="menu">
            <li class="bouton"><a href="index.php?page=accueil">Accueil</a></li>
            <li class="bouton"><a href="#">Nos Produits</a>
                <ul>
                    <li><a href="index.php?page=categorie1">Chaussures</a></li>
                    <li><a href="index.php?page=categorie2">Vêtements</a></li>
                    <li><a href="index.php?page=categorie3">Equipements</a></li>
                </ul>
            </li>
            <li class="bouton"><a href="index.php?page=contact">Contact</a></li>
        </ul>
    </nav>
    
    <ul class="interaction">
        <li><?php include('connexion.php'); ?></li>
        <li class="panier"><a href="index.php?page=panier">Mon panier</a></li>
    </ul>

</header>