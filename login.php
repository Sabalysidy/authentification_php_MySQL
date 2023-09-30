<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <!-- Ajout de Bootstrap pour le style -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Ajout de votre fichier CSS personnalisé si nécessaire -->
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Connexion</h2>
                    </div>
                    <div class="card-body">
                        <form action="login_traitement.php" method="post">
                            <div class="form-group">
                                <label for="nom_utilisateur">Nom d'utilisateur :</label>
                                <input type="text" id="nom_utilisateur" name="nom_utilisateur" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="mot_de_passe">Mot de passe :</label>
                                <input type="password" id="mot_de_passe" name="mot_de_passe" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Se connecter" class="btn btn-primary btn-block">
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <p class="mb-0">Pas encore de compte ? <a href="inscription.php">Inscrivez-vous</a></p>
                        <p class="mb-0"><a href="mot_de_passe_oublie.php">Mot de passe oublié ?</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
