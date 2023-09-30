<!DOCTYPE html>
<html>
<head>
    <title>Mot de passe oublié</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Mot de passe oublié</h2>
                    </div>
                    <div class="card-body">
                        <form action="mot_de_passe_oublie_traitement.php" method="post">
                            <div class="form-group">
                                <label for="email">Adresse e-mail :</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Réinitialiser le mot de passe" class="btn btn-primary btn-block">
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <p class="mb-0">Retour à <a href="login.php">la page de connexion</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
