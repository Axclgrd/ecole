
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
 $sql = "SELECT * FROM inscription WHERE email = ? AND mot_de_passe = ?";
 $stmt = mysqli_prepare($conn, $sql);

  // Liaison des variables à la requête préparée
  mysqli_stmt_bind_param($stmt, "ss", $email, $password_hash);

  // Exécution de la requête
  mysqli_stmt_execute($stmt);

  // Récupération du résultat de la requête
  $result = mysqli_stmt_get_result($stmt);

  // Vérification de la correspondance entre l'email et le mot de passe
  if (mysqli_num_rows($result) == 1) {
    // Si l'email et le mot de passe correspondent, on démarre une session
    session_start();
    // On enregistre l'email de l'utilisateur dans la session
    $_SESSION['email'] = $email;
    // On redirige l'utilisateur vers la page protégée
    header('Location: /protected.php');
  } else {
    // Si l'email et le mot de passe ne correspondent pas, on affiche un message d'erreur
    echo "Adresse email ou mot de passe incorrect.";
  }
?>
