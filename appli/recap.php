<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Récapitulatif des produits</title>
</head>
<body>
    <main>
        <header>
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">MyFirstApp</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
                        <ul class="navbar-nav flex-navbar">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php">Ajout Produit</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="recap.php">Mon panier</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <section class="array-panier">
            <?php
                if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
                    echo "<p>Auncun produit en session...</p>";
                }else{
                    echo"<table class='table table-bordered'>",
                            "<thead>",
                                "<tr>",
                                    "<th class='center-content-array'>#</th>",
                                    "<th class='center-content-array'>Nom</th>",
                                    "<th class='center-content-array'>Prix</th>",
                                    "<th class='center-content-array'>Quantité</th>",
                                    "<th class='center-content-array'>Total</th>",
                                "<tr/>",
                            "</thead>",
                            "<tbody>";
                    $totalGeneral = 0;
                    foreach($_SESSION['products'] as $index => $product){
                            echo"<tr>",
                                    "<td class='center-content-array'>".$index."</td>",
                                    "<td class='center-content-array'>".$product['name']."</td>",
                                    "<td class='center-content-array'>".number_format($product['price'],2,",", "&nbsp;")."&nbsp;€</td>",
                                    "<td class='center-content-array'>".$product['qtt']."</td>",
                                    "<td class='center-content-array'>".number_format($product['total'],2,",", "&nbsp;")."&nbsp;€</td>",
                                "</tr>";
                                $totalGeneral += $product['total'];
                        }
                        echo    "<tr>",
                                    "<td colspan=4>Total général : </td>",
                                    "<td class='center-content-array'><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>",
                                "</tr>",
                            "</tbody>",
                        "</table>";
                }
            ?>
        </section>
    </main>
</body>
</html>