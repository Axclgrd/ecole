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
                <li><a href="#">Acceuil <span class="material-symbols-outlined">
                    home
                    </span></a></li>
                <li><a href="#">Formation<span class="material-symbols-outlined">
                    history_edu
                    </span></a></li>
                <li><a href="#">Info<span class="material-symbols-outlined">
                    info
                    </span></a></li>
                <li><a href="#">Nous contacter<span class="material-symbols-outlined">
                    call
                    </span>
                    </a></li>
                <li><button id="myBtn" class="login-button">S'inscrire</button></li>
            </ul>
            <script src="script.js"></script>
        </nav>
            <!-- PopUp demande d'inscription -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
        <span class="close">&times;</span>
        <p>Merci d'entrer vos information afin de vous inscrire. Nous vous contacterons par la suite</p>
        <form method="post" action="inscription.php">
            <label for="prenom">Prénom*:</label><br>
            <input type="text" id="fname" name="prenom" placeholder="Prénom"><br>
            <label for="nom">Nom*:</label><br>
            <input type="text" id="lname" name="nom" placeholder="Nom"><br>
            <label for="sexe">Sexe*:</label><br>
            <input type="radio" id="homme" name="sexe" value="Homme">
            <label for="homme">Homme</label><br>
            <input type="radio" id="femme" name="sexe" value="Femme">
            <label for="femme">Femme</label><br>
            <input type="radio" id="autre" name="sexe" value="Autre">
            <label for="autre">Autre</label><br>
            <label for="diplome">Dernier diplome*:</label><br>
            <input type="text" id="diplome" name="diplome" placeholder="Dernier diplome"><br>
            <label for="naissance">Date de naissance*:</label>
            <input type="date" id="naissance" name="naissance" required><br>
            <label for="email">Email*:</label><br>
            <input type="email" id="email" size="30" placeholder="email@nomdomaine.com"></form>
            <p>*Champs à caractère obligatoire</p>
            <button class="login-button" type="submit">Envoyer le formulaire</button>

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
            <p>Une école prestigieuse qui vous accompagne de votre vie de jeune à la vie active.</p>
            <div class="container">
                <h1 id="headline">Prochaine rentré scolaire</h1>
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
</html>
<?php
//index.php

$error = '';
$name = '';
$email = '';
$subject = '';
$message = '';

function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}

if(isset($_POST["submit"]))
{
 if(empty($_POST["name"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Name</label></p>';
 }
 else
 {
  $name = clean_text($_POST["name"]);
  if(!preg_match("/^[a-zA-Z ]*$/",$name))
  {
   $error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
  }
 }
 if(empty($_POST["email"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Email</label></p>';
 }
 else
 {
  $email = clean_text($_POST["email"]);
  if(!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
   $error .= '<p><label class="text-danger">Invalid email format</label></p>';
  }
 }
 if(empty($_POST["subject"]))
 {
  $error .= '<p><label class="text-danger">Subject is required</label></p>';
 }
 else
 {
  $subject = clean_text($_POST["subject"]);
 }
 if(empty($_POST["message"]))
 {
  $error .= '<p><label class="text-danger">Message is required</label></p>';
 }
 else
 {
  $message = clean_text($_POST["message"]);
 }

 if($error == '')
 {
  $file_open = fopen("contact_data.csv", "a");
  $no_rows = count(file("contact_data.csv"));
  if($no_rows > 1)
  {
   $no_rows = ($no_rows - 1) + 1;
  }
  $form_data = array(
   'sr_no'  => $no_rows,
   'name'  => $name,
   'email'  => $email,
   'subject' => $subject,
   'message' => $message
  );
  fputcsv($file_open, $form_data);
  $error = '<label class="text-success">Thank you for contacting us</label>';
  $name = '';
  $email = '';
  $subject = '';
  $message = '';
 }
};