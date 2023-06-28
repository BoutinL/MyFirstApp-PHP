<?php
    session_start();

if(isset($_GET["action"])){

    switch($_GET["action"]) {

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

        case "viderPanier":
            unset($_SESSION["products"]);
            header("Location:recap.php"); exit;
            break;

        case "supprimerProduit":
            if(isset($_POST['submit'])){
                
            }
            break;
    }

} else {
    header("Location:index.php");
}

