<?php
session_start();
?>

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
                <a href="index.html"><img decoding="async" src="img/image-removebg-preview.png" alt="Logo"></a>
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
                <li><a class="login-button" <?php session_destroy()?> href="/connexion.html">Déconexion</a></li>
            </ul>
        <script src="script.js"></script>
        </nav>
            <!-- PopUp demande d'inscription -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content"> <!-- ajout d'un form mot de passe avec Hachage en back avant sql-->
        <span class="close">&times;</span>
        <p>Merci de bien vouloir indiquer vos informations afin de vous inscrire.<br> Nous vous contacterons par la suite.</p>
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
            <label for="diplome">Dernier diplôme*:</label><br>
            <input type="text" id="diplome" name="diplome" placeholder="Dernier diplome"><br>
            <label for="naissance">Date de naissance*:</label>
            <input type="date" id="naissance" name="naissance" required><br>
            <label for="email">Email*:</label><br>
            <input type="email" id="email" name="email" size="30" placeholder="email@nomdomaine.com"><br>
            <label for="motdepasse">Mot de passe :</label><br>
            <input type="password" id="motdepasse" name="motdepasse" size="30"><br>
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

    // redirection page connection
    const button = document.getElementById('btnconnect');
    button.addEventListener('click', function() {
    window.location.assign('connexion.html');
    });

    </script>

        <!-- En tete du site -->
        <header>
            <div>
                <h1 class="titr-bvn">BONJOUR <br><?php echo ($_SESSION['prenom'])?>  <?php echo($_SESSION['nom'])?></h1>
            </div>
        </header>
        <!-- Contenu du site -->
        <main>
            <script src="tmps.js"></script>
            <p>Voici votre espace personnel, plus d'informations seron à votre disposition au moment de la rentrée</p>
            <p>Vous etes un(e) <?php echo($_SESSION['sexe'])?></p>
            <p>Votre email : <?php echo($_SESSION['email'])?></p>
            <p>Votre dernier diplome : <?php echo($_SESSION['diplome'])?></p>
            <p>Votre date de naissance : <?php echo($_SESSION['naissance'])?></p>
            <h1>En cas de problème, contactez-nous pour modifier vos informations personnelles</h1>
            <div class="container">
                <h1 id="headline">Votre rentrée :</h1>
                <div id="countdown">  
                <ul>
                    <li><span id="days"></span>days</li>
                    <li><span id="hours"></span>Hours</li>
                    <li><span id="minutes"></span>Minutes</li>
                    <li><span id="seconds"></span>Seconds</li>
                </ul>
                </div>
            </div>
        </main>
    </body>
    <footer>
    <p>AELA School<br>Tout droits réservés©</p>
    </footer>
</html>