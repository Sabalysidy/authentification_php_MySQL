<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $token = $_POST['token'];
    $nouveau_mot_de_passe = $_POST['nouveau_mot_de_passe'];

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

    // Vérifiez si le token est valide et n'a pas expiré
    $sql = "SELECT * FROM demande_reset WHERE token = ? AND TIMESTAMPDIFF(HOUR, timestamp, NOW()) <= 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo "Le token est invalide ou a expiré. Veuillez réessayer.";
        exit();
    }

    // Récupérez l'ID de l'utilisateur associé au token
    $row = $result->fetch_assoc();
    $utilisateur_id = $row['utilisateur_id'];

    // Mettez à jour le mot de passe de l'utilisateur dans la base de données
    $nouveau_mot_de_passe_hash = password_hash($nouveau_mot_de_passe, PASSWORD_DEFAULT);
    $sql = "UPDATE utilisateurs SET mot_de_passe = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $nouveau_mot_de_passe_hash, $utilisateur_id);

    if ($stmt->execute()) {
        // Supprimez le token de la table demandes_reset
        $sql = "DELETE FROM demande_reset WHERE token = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $token);
        $stmt->execute();

        // Redirigez l'utilisateur vers une page de confirmation de réinitialisation
        header("Location: mot_de_passe_reinitialise.php");
        exit();
    } else {
        echo "Une erreur s'est produite lors de la réinitialisation du mot de passe. Veuillez réessayer.";
    }

    // Fermez la connexion à la base de données
    $conn->close();
}
?>
