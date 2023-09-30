<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Connexion à la base de données (assurez-vous d'ajuster les paramètres de connexion)
    $serveur = "localhost";
    $utilisateur = "root";
    $mot_de_passe = "";
    $base_de_donnees = "authentification_php";

    $conn = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

    // Vérifiez la connexion à la base de données
    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué : " . $conn->connect_error);
    }

    // Vérifiez si l'e-mail existe dans la base de données
    $sql = "SELECT * FROM utilisateurs WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo "L'adresse e-mail n'existe pas dans notre base de données. Veuillez réessayer.";
        exit();
    }

    // Générez un token unique
    $token = bin2hex(random_bytes(32)); // Vous pouvez ajuster la longueur selon vos besoins

    // Stockez le token dans la table demandes_reset avec un timestamp
    $sql = "INSERT INTO demande_reset (utilisateur_id, token, timestamp) VALUES (?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    
    $utilisateur_id = $result->fetch_assoc()['id'];
    
    $stmt->bind_param("ss", $utilisateur_id, $token);
    $stmt->execute();

    // Envoyez un e-mail à l'utilisateur avec un lien vers la page de réinitialisation de mot de passe
    $lien_reset = "http://votre-site.com/reinitialisation_mot_de_passe.php?token=$token";
    $sujet = "Réinitialisation de mot de passe";
    $message = "Cliquez sur le lien suivant pour réinitialiser votre mot de passe : $lien_reset";
    $headers = "From: webmaster@votre-site.com";

    mail($email, $sujet, $message, $headers);

    // Redirigez l'utilisateur vers une page de confirmation
    header("Location: confirmation_demande_reset.php");
    exit();
}
?>
