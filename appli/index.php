<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Ajout produit</title>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">MyFirstApp</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav flex-navbar">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Ajout</a>
                        </li>
                        <li class="nav-item notif-articles-flex">
                            <a class="nav-link" href="recap.php">Panier</a>
                            <span>
                                <?php 
                                    session_start();
                                    $nbrArticles = 0;
                                    if(isset($_SESSION['products'])){
                                        foreach($_SESSION['products'] as $index => $product){
                                            $nbrArticles = $index + 1;
                                        }
                                        echo $nbrArticles;
                                    }else{
                                        echo $nbrArticles;
                                    }
                                ?>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <h1>Ajouter un produit</h1>
        <div class="form-group flex-form">
            <form action="traitement.php?action=ajouterProduit" method="post">
                <p>
                    <label>
                        Nom du produit :
                        <input type="text"class="form-control" name="name">
                    </label>
                </p>
                <p>
                    <label>
                        Prix du produit :
                        <input type="number" class="form-control" step="any" name="price">
                    </label>
                </p>
                <p>
                    <label>
                        Quantité désirée :
                        <input type="number" class="form-control" name="qtt" value="1">
                    </label>
                </p>
                <p>
                    <input type="submit" class="btn btn-primary btn-form" name="submit" value="Ajouter le produit">
                </p>
            </form>
        </div>
    </main>
</body>
</html>