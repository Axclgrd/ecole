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
  $dbname = "inscription";

  $conn = mysqli_connect($host, $username, $password, $dbname);

  // Vérification de la connexion
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Préparation de la requête SQL d'insertion
  $sql = "INSERT INTO inscription (prenom, nom, sexe, naissance, email, diplome) VALUES (?,?,?,?,?,?)";
  $stmt = mysqli_prepare($conn, $sql);

  // Liaison des variables à la requête préparée
  mysqli_stmt_bind_param($stmt, $prenom, $nom, $sexe, $naissance, $email, $diplome);

  // Exécution de la requête
  mysqli_stmt_execute($stmt);

  // Fermeture de la requête et de la connexion
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
 
?>
<!-- 
<?php
// Récupération des valeurs du formulaire HTML
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$sexe = $_POST['sexe'];
$naissance = $_POST['naissance'];
$email = $_POST['email'];
$diplome = $_POST['diplome'];

// Connexion à la base de données MySQL
$host = 'localhost';
$username = 'root';
$password = 'root';
$dbname = 'inscription';
$mysqli = new mysqli($host, $username, $password, $dbname);

// Vérification de la connexion
if ($mysqli->connect_errno) {
    echo "Échec de la connexion à la base de données MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit;
}?>
-->

