<?php
  // Récupération des données du formulaire
  $prenom = $_POST['prenom'];
  $nom = $_POST['nom'];
  $sexe = $_POST['sexe'];
  $naissance = $_POST['naissance'];
  $email = $_POST['email'];
  $diplome = $_POST['diplome'];

  // Connexion à la base de données
  $host = "10.101.0.61";
  $username = "root";
  $password = "root";
  $dbname = "insciption";

  $conn = mysqli_connect($host, $username, $password, $dbname);

  // Vérification de la connexion
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Préparation de la requête SQL d'insertion
  $sql = "INSERT INTO inscription (prenom, nom, sexe, naissance, email, diplome) VALUES (?,?,?,?,?,?)";
  $stmt = mysqli_prepare($conn, $sql);

  // Liaison des variables à la requête préparée
  mysqli_stmt_bind_param($stmt, "ssssss", $prenom, $nom, $sexe, $naissance, $email, $diplome);

  // Exécution de la requête
  mysqli_stmt_execute($stmt);

  // Fermeture de la requête et de la connexion
  mysqli_stmt_close($stmt);
  mysqli_close($conn);

  header("location: /index.html");
  exit;
?>