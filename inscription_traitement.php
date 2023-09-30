<?php
session_start();

$nom_utilisateur = $_POST['nom_utilisateur'];
$mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);
$email = $_POST['email'];

// Connexion à la base de données (remplacez les valeurs par les vôtres)
$connexion = new mysqli("localhost", "root", "", "authentification_php");

// Vérification de la connexion
if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}

// Requête SQL pour insérer l'utilisateur dans la base de données
$requete = "INSERT INTO utilisateurs (nom_utilisateur, mot_de_passe, email) VALUES ('$nom_utilisateur', '$mot_de_passe', '$email')";

if ($connexion->query($requete) === TRUE) {
    // Rediriger vers la page de connexion après une inscription réussie
    header("Location: login.php");
} else {
    echo "Erreur lors de l'inscription : " . $connexion->error;
}

// Fermer la connexion à la base de données
$connexion->close();
?>
