<?php
  // Récupération des données du formulaire
  $prenom = $_POST['prenom'];
  $nom = $_POST['nom'];
  $sexe = $_POST['sexe'];
  $naissance = $_POST['naissance'];
  $email = $_POST['email'];
  $diplome = $_POST['diplome'];

  // Connexion à la base de données
  $host = "localhost";
  $username = "mon_utilisateur";
  $password = "mon_mot_de_passe";
  $dbname = "ma_base_de_donnees";

  $conn = mysqli_connect($host, $username, $password, $dbname);

  // Vérification de la connexion
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Préparation de la requête SQL d'insertion
  $sql = "INSERT INTO formulaire_contact (prenom, nom, sexe, naissance, email, diplome) VALUES (?, ?, ?, ?, ?, ?)";
  $stmt = mysqli_prepare($conn, $sql);

  // Liaison des variables à la requête préparée
  mysqli_stmt_bind_param($stmt, "sss", $prenom, $nom, $sexe, $naissance, $email, $diplome);

  // Exécution de la requête
  mysqli_stmt_execute($stmt);

  // Fermeture de la requête et de la connexion
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
?>