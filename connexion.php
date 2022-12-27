<?php
  // Récupération des données du formulaire de connexion
  $email = $_POST['email'];
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

  // Préparation de la requête SQL de sélection de l'utilisateur
  $sql = "SELECT * FROM inscription WHERE email = ? AND motdepasse = ?";
  $stmt = mysqli_prepare($conn, $sql);

  mysqli_stmt_bind_param($stmt, "ss", $email, $password_hash);

  // Exécution de la requête
  mysqli_stmt_execute($stmt);

  // Récupération du résultat de la requête
  $result = mysqli_stmt_get_result($stmt);

  // Vérification de la correspondance entre l'email et le mot de passe
  if (mysqli_num_rows($result) == 1) {
    
    $link = mysqli_connect('192.168.1.52', 'root', 'root', 'insciption');
    if (!$link) {
      die("Erreur de connexion : " . mysqli_connect_error());
    } 

    $query = "SELECT nom, prenom, sexe, naissance, diplome FROM inscription WHERE email = '$email'";

    // Exécution de la requête
    $result = mysqli_query($link,$query);

    // Vérification de l'exécution de la requête
    if (!$result) {
        die("Erreur d'exécution de la requête : " . mysqli_error($link));
    }

    // Récupération du résultat de la requête sous forme de tableau associatif
    $resultat = mysqli_fetch_assoc($result);
    
    // Enregistrement du résultat de la requête dans une variable de session
    session_start();
    $_SESSION['email'] = $email;
    $_SESSION['nom'] = $resultat['nom'];
    $_SESSION['prenom'] = $resultat['prenom'];
    $_SESSION['sexe'] = $resultat['sexe'];
    $_SESSION['naissance'] = $resultat['naissance'];
    $_SESSION['diplome'] = $resultat['diplome'];

    // Fermeture de la connexion à la base de données
    $pdo = null;
    // On enregistre l'email de l'utilisateur dans la session
    // On redirige l'utilisateur vers la page protégée
    header('Location: /espaceperso.php');
  } else {
    // Si l'email et le mot de passe ne correspondent pas, on affiche un message d'erreur
    echo "Adresse email ou mot de passe incorrect. <script language=\"javascript\" type=\"text/javascript\">
    window.setTimeout('window.location=\"/connexion.html\"; ',3000);
   </script>";
  }
  // Fermeture de la requête et de la connexion
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
?>
\