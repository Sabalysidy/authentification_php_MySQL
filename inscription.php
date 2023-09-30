<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Inscription</h2>
                    </div>
                    <div class="card-body">
                        <form action="inscription_traitement.php" method="post">
                            <div class="form-group">
                                <label for="nom_utilisateur">Nom d'utilisateur :</label>
                                <input type="text" id="nom_utilisateur" name="nom_utilisateur" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="mot_de_passe">Mot de passe :</label>
                                <input type="password" id="mot_de_passe" name="mot_de_passe" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email :</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="S'inscrire" class="btn btn-primary btn-block">
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <p class="mb-0">Déjà inscrit ? <a href="login.php">Connectez-vous</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
