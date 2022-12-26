<!-- Modifier la structure pour rediriger vers login pour evitér duplicata -->
<!-- Probleme hashage mot de passe a revoir -->
<?php
  // ob_start();
  // Récupération des données du formulaire
  $prenom = $_POST['prenom'];
  $nom = $_POST['nom'];
  $sexe = $_POST['sexe'];
  $naissance = $_POST['naissance'];
  $email = $_POST['email'];
  $diplome = $_POST['diplome'];
  $motdepasse = $_POST['motdepasse'];
  $password_hash = hash('sha256', $motdepasse);
  // Connexion à la base de données
  $host = "192.168.1.52";
  $username = "root";
  $password = "root";
  $dbname = "insciption";

  $conn = mysqli_connect($host, $username, $password, $dbname);

  // Vérification de la connexion
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Préparation de la requête SQL d'insertion
  $sql = "INSERT INTO inscription (prenom, nom, sexe, naissance, email, diplome, motdepasse) VALUES (?,?,?,?,?,?,?)";
  $stmt = mysqli_prepare($conn, $sql);

  // Liaison des variables à la requête préparée
  mysqli_stmt_bind_param($stmt, "sssssss", $prenom, $nom, $sexe, $naissance, $email, $diplome, $password_hash);

  // Exécution de la requête
  mysqli_stmt_execute($stmt);

  // Fermeture de la requête et de la connexion
  mysqli_stmt_close($stmt);
  mysqli_close($conn);

  // Redirection vers la page de destination
  // header('Location: /inscriptiondone.php');

  // echo "<p>Vous allez être redirigé vers la page de destination. si la redirection ne fontionne pas cliqez <a href:'/inscriptiondone.php'>ici</a></p>";

  // // Envoi du contenu HTML généré à la page
  // ob_end_flush();
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
        <form action="inscription.php" method="post">
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
                <h1 class="titr-bvn">BIENVENUE <br> <?php echo($prenom)?>  <?php echo($nom)?></h1>
            </div>
        </header>
        <!-- Contenu du site -->
        <main>
            <h1>Votre inscription a bien été prise en compte !</h1>
            <p>Vous allez entre rediriger vers la page de connexion dans 5seconde ...</p>
        <script language="javascript" type="text/javascript">
     window.setTimeout('window.location="/connexion.php"; ',5000);
    </script>
            <!-- <script src="tmps.js"></script>
            <p>Voici ton espace perso, ici tu aura accées a toute les ressources dons tu aura besoin. <br> Noublie pas de bien vérifier des information peronnel afin que nous puissions de contacter.</p>
            <h1>Prénom et Nom : <?php echo($prenom)?> <?php echo($nom)?> <br> Email : <?php echo($email) ?> <br> Dernier diplome (vérification humaine avant la rentré): <?php echo($diplome)?> <br> Date de naissance : <?php echo($naissance) ?></h1>
            <p> Une erreur de saisie ? cliques <a href="/modifinfo.php">ici</a> pour modifier vos information <p>
            <div class="container">
                <h1 id="headline">Prochaine rentrée scolaire</h1>
                <div id="countdown">
                <ul>
                    <li><span id="days"></span>days</li>
                    <li><span id="hours"></span>Hours</li>
                    <li><span id="minutes"></span>Minutes</li>
                    <li><span id="seconds"></span>Seconds</li>
                </ul>
                </div>
            </div> -->
        </main>
    </body>
    <footer>
    <p>AELA School<br>Tout droits réservés©</p>
    </footer>
</html>