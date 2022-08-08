

<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Baudrien.fr | <?php echo $mainTitle; ?> </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./assets/css/style.css">
  </head>



  <header>
        <div class="container-fluid">
            <div class="row">
                <nav class="navbar navbar-expand-md navbar-light bg-light navbar-fixed-top">
                        <button class="btn btn-starter" id="theme-btn"><i class="bi bi-brightness-high-fill"></i></button>


                        <a class="navbar-brand text-uppercase fw-bold" href="./index.php">
                            <span class="bg-primary bg-gradient p-1 rounded-3 text-light">Baudrien</span>
                        </a>


                        <?php
                            if(isConnected()) {
                                $email = $_SESSION['email'];
                                $pseudo = $_SESSION["pseudo"];
                            ?>



                                <div id="user-menu">
                                    <img id="avatar-img" src="./assets/img/avatar.jpeg" alt="" data-bs-toggle="dropdown" aria-expanded="false">
                                        <ul class="dropdown-menu">
                                            <h4> <?php echo $pseudo ?> </h4>
                                            <li><a class="dropdown-item" href="#"><i class="bi bi-info-circle"></i>  Mes informations</a></li>
                                            <li><a class="dropdown-item" href="#"><i class="bi bi-gear"></i>  Paramètres</a></li>
                                            <li><a class="dropdown-item" href="logout.php"><i class="bi bi-power">  Déconnexion</i></a></li>
                                        </ul>
                                </div>


                                <?php } else { ?>



                        <!-- Button trigger modal -->

                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="bi bi-box-arrow-in-right"> Se connecter</i>
                        </button>
                        <?php } ?>


                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link" href="./index.php">Accueil</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#expertise">Louer un camping</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#portfolio">Proposer une location</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#contact">Boutique</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#contact">Qui sommes-nous ?</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#contact">Contact</a>
                                </li>
                            </ul>
                        </div>
                </nav>
            </div>
        </div>
    


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Connexion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        
                        <form method="POST" action="./login.php">
                            <input type="email" class="form-control" name="email" placeholder="Votre email" required="required"><br>
                            <input type="password" class="form-control" name="pwd" placeholder="Mot de passe" required="required"><br>
                        
                            <a href="#">
                                <button class="btn btn-starter">
                                    Mot de passe oublié ?
                                </button>
                            </a>
                    </div>
                    <div class="modal-footer">
                        <a href="./registrer.php">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">S'inscrire</button>
                        </a>
                        
                        <button type="submit" class="btn btn-primary">
                            Se connecter
                        </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

</header>







    <body>
