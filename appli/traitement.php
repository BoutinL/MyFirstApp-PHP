<?php
    session_start();

if(isset($_GET["action"])){

    switch($_GET["action"]) {
        // Ajouter un produit au panier
        case "ajouterProduit":
            if(isset($_POST['submit'])){
                $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);
            
                if($name && $price && $qtt){
                    $product = [
                        "name" => $name,
                        "price" => $price,
                        "qtt" => $qtt,
                        "total" => $price*$qtt
                    ];
                    
                    $_SESSION['products'][] = $product;
                }
                header("Location:recap.php"); exit;
            }
            break;

        // Vider un panier
        case "viderPanier":
            unset($_SESSION["products"]);
            header("Location:recap.php"); exit;
            break;

        // Supprimer un produit du panier
        case "supprimerProduit":
            if(isset($_GET['id']) && isset($_SESSION["products"][$_GET['id']])){
                unset($_SESSION["products"][$_GET['id']]);
                header("Location:recap.php"); exit;
            } else {
                // afficher ce produit n'existe pas!
            }
            break;
            
        // Supprimer un produit déja présent au panier
        case "plusProduit":
        
            break;

        // Ajouter un produit déja présent au panier
        case "moinsProduit":
            if(isset($_GET['id']) && isset($_SESSION["products"][$_GET['id']])){
                foreach($_SESSION['products'] as $index => $product){
                    $product['qtt']++;
                }
                header("Location:recap.php"); exit;
            }
            break;
    }

} else {
    header("Location:index.php");
}

