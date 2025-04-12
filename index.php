<?php
    require("connexion.php");
    if( $_SERVER['REQUEST_METHOD'] === "POST")
    {
        if( !empty($_POST["nom_produit"]) && !empty($_POST["categorie_produit"]) && !empty( $_POST["quantite_produit"] ) && !empty( $_POST["prix_produit"]) && !empty( $_POST["description_produit"]))
        {
            $nom = $_POST["nom_produit"];
            $categorie = $_POST["categorie_produit"];
            $quantite = $_POST["quantite_produit"] ;
            $prix =  $_POST["prix_produit"];
            $description = $_POST["description_produit"];

            $sql = "insert into product (product_name, product_categorie, product_description, product_quantity, product_price ) values ('$nom', $categorie, '$description', $quantite, $prix)";
            if($connexion->query($sql))
            {
                echo "Success !";
            }
           
        }
        else
            echo "<p>Veuillez remplir tous les champs</p>";
    }

    if( $_SERVER['REQUEST_METHOD'] == "GET")
    {
        $id = $_GET["id"];
        $supprime = " delete from product where id =:id;";
        $supprimer = $connexion->prepare($supprime);
        $supprimer->bindParam(":id", $id, PDO::PARAM_INT);
        $supprimer->execute();
        
    }
    

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Crud Product</title>
</head>
<body>
    <header></header>
    <main>
        <h1>Gestion de produits</h1>    
        <div class="contenaire">
            <div class="items-header">
                <div class="items">
                    <form action="">
                        <input type="search" name="" id="" placeholder="Chercher un produit">
                        <button type="submit">chercher</button>
                    </form>
                </div>
                <div class="items">
                    <button class="btn-ajouter">+Ajouter</button>
                </div>
            </div>
            <?php
                    $requette_produits = "select * from product";
                    $produits = $connexion->query($requette_produits);
                    if ($produits->rowCount() > 0) :
                ?>
            <table>
                <thead>
                    <tr>
                        <th>Nom du produit</th>
                        <th>Catégorie du produit</th>
                        <th>Descripyion du produit</th>
                        <th>Quantité du produit</th>
                        <th>Prix du produit</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                
                    <tbody>
                        <?php foreach ($produits->fetchAll(PDO::FETCH_OBJ) as $produit): ?>
                        <tr >
                            <td><?=$produit->product_name?></td>
                            <td><?=$produit->product_categorie?></td>
                            <td><?=$produit->product_description?></td>
                            <td><?=$produit->product_quantity?></td>
                            <td><?=$produit->product_price . " FCFA"?> </td>
                            <th>
                                <button ><a href="update.php?id=<?=$produit->id ?>">Modifier</a></button>
                                <button method="none"  class="btn-sup"><a  href="?id=<?=$produit->id?>">Surprimer</a></button>
                            </th>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <?php else:?>
                        <p>Aucun produits clicquer pour ajouter un produit</p>
                <?php endif; ?>
            </table>
        </div>

        <div class="popup-ajout">
            <form action="#" method="post" class="form-add">
                <input type="text" name="nom_produit" id="" placeholder="nom du produit" value="">
                <input type="number" name="quantite_produit" id="" placeholder="Quantité du produit">
                <input type="number" name="prix_produit" id="" placeholder="prix du produit">
                <select name="categorie_produit" id="">
                    <?php foreach($lignes->fetchAll(PDO::FETCH_OBJ)as $ligne): ?>
                    <option value="<?=$ligne->id_cotegorie?>"><?= $ligne->nom_categorie?> </option>
                    <?php endforeach; ?>
                </select>
                <textarea name="description_produit" id=""placeholder="Description du produit"></textarea>
                <label for="img_produit">Definir l'image du produits</label>
                <input type="file" name="" id="img_produit" class="choose">
                <button type="submit" class="btn-sub">Ajouter</button>
                <button type="reset" class="btn">Effacer</button>
            </form>
        </div>

        <div class="popup-del">
            <p>Voulez-vous Surprimer le produits <?=$produit->product_name?></p>
            <form action="" method="get">
                <button id="btn-annulee">annulée</button>
                <button id="btn-confirm">Confirmer</button>
            </form>
        </div>
    </main>
    <footer></footer>

<script src="script.js"></script>
</body>
</html>