<?php
session_start();

if (!isset($_SESSION['nom_utilisateur'])) {
    // Redirigez l'utilisateur vers la page de connexion s'il n'est pas authentifié
    header("Location: login.php");
    exit;
}

// Vous pouvez afficher ici le contenu de la page d'accueil pour l'utilisateur authentifié
?>
<!DOCTYPE html>
<html>
<head>
    <title>Accueil</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Bienvenue, <?php echo $_SESSION['nom_utilisateur']; ?>!</h2>
                    </div>
                    <div class="card-body">
                        <p class="text-center">Contenu de la page d'accueil.</p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="deconnexion.php" class="btn btn-danger">Se déconnecter</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

