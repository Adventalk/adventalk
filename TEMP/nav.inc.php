

 <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">LokiSalle</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?= RACINE_SITE ?>accueil.php">Accueil</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a id="hidden" href="#">Espace membres</a>
                <ul id="hidden-nav">
                    <?php if(userAdmin()) : ?>
                     <li><a href="<?= RACINE_SITE ?>backoffice/gestionmembres.php">Gestion des membres</a></li>
                     <li><a href="<?= RACINE_SITE ?>backoffice/gestionsalles.php">Gestion des salles</a></li>
                     <li><a href="<?= RACINE_SITE ?>backoffice/gestioncommandes.php">Gestion des commandes</a></li>
                     <li><a href="<?= RACINE_SITE ?>backoffice/gestionproduits.php">Gestion des produits</a></li>
                     <li><a href="<?= RACINE_SITE ?>backoffice/gestionavis.php">Gestion des avis</a></li>
                     <li><a href="<?= RACINE_SITE ?>backoffice/statistiques.php">Statistiques</a></li>
                    <?php endif; ?>
                    <?php if(userConnecte()) : ?>
                     <li><a href="<?= RACINE_SITE ?>profil.php">Profil</a></li>
                     <li><a href="<?= RACINE_SITE ?>accueil.php?action=deconnexion">Déconnexion</a></li>
                     <?php else : ?>
                    <li><a href="#" data-toggle="modal" data-target="#signup-modal">Inscription</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#login-modal">Connexion</a></li>
                    <?php endif ; ?>
                    
                </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <body>
    <section class="container">