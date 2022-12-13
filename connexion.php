<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@30,300,0,0" />
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="img/image-removebg-preview.ico">
    <title>AELA School</title>
</head>
    <body>
        <!-- menu de navigation -->
        <nav>
            <div class="logo">
                <img decoding="async" src="img/image-removebg-preview.png" alt="Logo">
            </div>
            <div class="hamburger">
                <div class="bars1"></div>
                <div class="bars2"></div>
                <div class="bars3"></div>
            </div>
            <ul class="nav-links">
                <li><a href="index.html">Acceuil <span class="material-symbols-outlined">
                    home
                    </span></a></li>
                <li><a href="formation.html">Formations<span class="material-symbols-outlined">
                    history_edu
                    </span></a></li>
                <li><a href="info.html">Informations<span class="material-symbols-outlined">
                    info
                    </span></a></li>
                <li><button class="login-button"><a href="connexion.html">Mon espace</button></li></a> <!-- Revoir lien entre page connexion et inscription-->
                <li><button id="myBtn" class="login-button">S'inscrire</button></li>
            </ul>
        <script src="script.js"></script>
        </nav>
            <!-- PopUp demande d'inscription -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
        <span class="close">&times;</span>
        <p>Merci d'entrer vos information afin de vous inscrire.<br> Nous vous contacterons par la suite.</p>
        <form action="inscriptiondone.php" method="post">
            <label for="prenom">Prénom*:</label><br>
            <input type="text" id="fname" name="prenom" placeholder="Prénom"><br>
            <label for="nom">Nom*:</label><br>
            <input type="text" id="lname" name="nom" placeholder="Nom"><br>
            <label for="sexe">Sexe*:</label><br>
            <input type="radio" id="homme" name="sexe" value="homme">
            <label for="homme">Homme</label><br>
            <input type="radio" id="femme" name="sexe" value="femme">
            <label for="femme">Femme</label><br>
            <label for="diplome">Dernier diplome*:</label><br>
            <input type="text" id="diplome" name="diplome" placeholder="Dernier diplome"><br>
            <label for="naissance">Date de naissance*:</label>
            <input type="date" id="naissance" name="naissance" required><br>
            <label for="email">Email*:</label><br>
            <input type="email" id="email" name="email" size="30" placeholder="email@nomdomaine.com">
            <p>*Champs a caractère obligatoire</p>
            <button class="login-button" type="submit">Envoyer le formulaire</button>
        </form>

        </div>
    
    </div>
    
    <script>
        // Get the modal
    var modal = document.getElementById("myModal");
    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    // When the user clicks the button, open the modal 
    btn.onclick = function() {
    modal.style.display = "block";
    }
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
    modal.style.display = "none";
    }
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }}
    </script>

        <!-- En tete du site -->
        <header>
            <div>
                <h1 class="titr-bvn">BIENVENUE <br> AELA School</h1>
            </div>
        </header>
        <!-- Contenu du site -->
        <main>
            <h1>Connexion :</h1>
            <div class="connect">
            <form action="inscriptiondone.php" method="get">
            <label for="email">Email :</label><br>
            <input type="email" id="email" name="email" size="30" placeholder="email@nomdomaine.com"><br>
            <label for="password">Mot de passe :</label><br>
            <input type="password" id="password" name="password" size="30"><br>
            <button class="login-button" type="submit">Connexion</button>
            </div>
        </form>

            <p>AELA School : Faites de votre passion pour l'informatique votre métier.</p>
            
        </main>
    </body>
    <footer>
    <p>AELA School<br>Tout droits réservés©</p>
    </footer>
</html>