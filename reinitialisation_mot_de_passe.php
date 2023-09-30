<!DOCTYPE html>
<html>
<head>
    <title>Réinitialisation du mot de passe</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Réinitialisation du mot de passe</h2>
                    </div>
                    <div class="card-body">
                        <form action="reinitialisation_mot_de_passe_traitement.php" method="post">
                            <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
                            <div class="form-group">
                                <label for="nouveau_mot_de_passe">Nouveau mot de passe :</label>
                                <input type="password" id="nouveau_mot_de_passe" name="nouveau_mot_de_passe" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Réinitialiser le mot de passe" class="btn btn-primary btn-block">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
