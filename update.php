<?php require ("connexion.php");


$id_product = $_GET['id'];
    if( $_SERVER['REQUEST_METHOD']==="POST")
    {

        
        
        if( !empty($_POST["nom_produit"]) && !empty($_POST["categorie_produit"]) && !empty( $_POST["quantite_produit"] ) && !empty( $_POST["prix_produit"]))
        {
            echo "<p>Produit modifier avec success<p/><a href=\"index.php\">Revenir en arrierre<a/>";
            $nom = $_POST["nom_produit"];
            $categorie =(int) $_POST["categorie_produit"];
            $quantite =(int)$_POST["quantite_produit"] ;
            $prix =(int)$_POST["prix_produit"];
            $description = $_POST["description_produit"];

            $sql2 = "update  product set product_name='$nom' , product_categorie=$categorie, product_description ='$description' , product_quantity =$quantite, product_price =$prix where id=$id_product";
            if($connexion->query($sql2) === true) echo "mise à jour efffectuer";
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

    <?php  
        $id_product = $_GET['id'];
        $sql = "select * from product where id = $id_product";
        $produits = $connexion->query($sql);
        $produit = $produits->fetch(PDO::FETCH_OBJ);
    ?>
    <div class="resultat">
        <p><?= $resultat ?></p>
    </div>
    <div class="popup-ajout">
            <form action="#" method="post" class="form-add">
                <input type="text" name="nom_produit" id="" placeholder="nom du produit" value="<?= $produit->product_name?>">
                <input type="number" name="quantite_produit" id="" placeholder="Quantité du produit" value="<?= $produit->product_quantity?>">
                <input type="number" name="prix_produit" id="" placeholder="prix du produit" value="<?= $produit->product_price?>">
                <select name="categorie_produit" id="">
                    <?php foreach($lignes->fetchAll(PDO::FETCH_OBJ)as $ligne): ?>
                    <option value="<?=$ligne->id_cotegorie?>"><?= $ligne->nom_categorie?> </option>
                    <?php endforeach; ?>
                </select>
                <textarea name="description_produit" id=""placeholder="Description du produit" value="<?=$produit->product_name?>"></textarea>
                <label for="img_produit">Definir l'image du produits</label>
                <input type="file" name="" id="img_produit" class="choose">
                <button type="submit" class="btn-sub">Ajouter</button>
                <button type="reset" class="btn">Effacer</button>
            </form>
        </div>
</body>
</html>