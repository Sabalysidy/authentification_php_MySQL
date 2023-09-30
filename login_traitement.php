<?php
session_start();

$nom_utilisateur = $_POST['nom_utilisateur'];
$mot_de_passe = $_POST['mot_de_passe'];

// Connexion à la base de données (remplacez les valeurs par les vôtres)
$connexion = new mysqli("localhost", "root", "", "authentification_php");

// Vérification de la connexion
if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}

// Requête SQL pour vérifier les identifiants de l'utilisateur
$requete = "SELECT id, mot_de_passe FROM utilisateurs WHERE nom_utilisateur = '$nom_utilisateur'";
$resultat = $connexion->query($requete);

if ($resultat->num_rows == 1) {
    $row = $resultat->fetch_assoc();
    if (password_verify($mot_de_passe, $row['mot_de_passe'])) {
        // Authentification réussie, créez une session
        $_SESSION['nom_utilisateur'] = $nom_utilisateur;
        header("Location: accueil.php");
    } else {
        // Mot de passe incorrect
        echo "Mot de passe incorrect.";
    }
} else {
    // Nom d'utilisateur incorrect
    echo "Nom d'utilisateur incorrect.";
}

// Fermer la connexion à la base de données
$connexion->close();
?>
