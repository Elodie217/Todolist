<?php

namespace ProductManager;

use DbConnexion\DbConnexion;
use Product\Product;

class ProductManager
{

    private $pdo;

    public function __construct(DbConnexion $dbConnexion)
    {
        // On récupére la fonctin getPdo de DbConnexion
        $this->pdo = $dbConnexion->getPDO();
    }

    public function getAllProductsWithCategories()
    {
        // On déclare une variable products comme tableau vide
        $products = [];

        try {
            // Le manager récupère l'instance de connexion pdo fournit par la classe DBConnexion
            // Il utilise cette instance de connexion et utilise la fonction query qui commme son nom l'indique
            // requête sur la bdd via notre instance de connexion
            $stmt = $this->pdo->query("SELECT * FROM products INNER JOIN category ON products.id_category = category.id_category  ");

            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                // Pour chaque ligne de résultat de la requête on ajoute 
                // cette ligne dans $products
                // au format Product ( notre classe qui agit comme un moule a gauffre)
                // Dans products se trouvera un tableau d'objet au format Product
                // Et donc avec les méthodes de classes ( getters et setters)
                $products[] = new Product($row);
            }
        } catch (\PDOException $e) {
            var_dump($e);
            // Ici si il y a une erreur on la var_dump
        }

        // Une fois la requete finie on return le tableau de products
        return $products;
    }


    public function insertProduct(Product $objet)
    {

        // Dans les paramètres on récupére un objet $objet 
        // formaté par la classe Product
        // Du coup on peut utiliser les getters
        $name = $objet->getName_products();
        $id_category = $objet->getId_category();
        $price = $objet->getPrice_products();
        $image = $objet->getImage_products();
        $description = $objet->getDescription_products();

        try {
            // Ici on requête 
            // prepare sert a nettoyer la donnée avant insertion
            // Attention d'avoir le bon nombre de champs dans la requête)
            $stmt = $this->pdo->prepare("INSERT INTO products VALUES(NULL,?,?,?,?,?)");

            // Ici la requête est éxécutée après nettoiement, attention à avoir le même 
            // ordre que dans votre bdd.
            $stmt->execute([$name, $description, $price, $image, $id_category]);

            // SI une ligne a été affectée par le  changement alors on renvoi true
            // Cela permettra d'utiliser cette fonction avec un if dans le traitement
            // If ( ca a fonctionné)
            return $stmt->rowCount() == 1;
        } catch (\PDOException $e) {
            // erreur
            var_dump($e);
        }
    }

    public function deleteProduct($id)
    {
        try {
            // Après avoir récupéré l'id en GET, je passe cet id dans ma requête SQL, 

            $stmt = $this->pdo->query("DELETE FROM products WHERE id_products = $id");
            return $stmt->rowCount() == 1;
        } catch (\PDOException $e) {
            // erreur
            var_dump($e);
        }
    }



    public function getSingleProdutById($id)
    {
        try {
            $stmt = $this->pdo->query("SELECT * FROM products INNER JOIN category ON products.id_category = category.id_category  WHERE id_products = $id ");
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $product = new Product($row);
            }
        } catch (\PDOException $e) {
            var_dump($e);
        }
        return $product;
    }


    public function editProduct(Product $objet)
    {
        $id= $objet->getId_products();
        $name = $objet->getName_products();
        $id_category = $objet->getId_category();
        $price = $objet->getPrice_products();
        $image = $objet->getImage_products();
        $description = $objet->getDescription_products();

        try {
    
            $stmt = $this->pdo->prepare("UPDATE `products` SET `name_products` = ?,`description_products` = ?,`price_products` = ?, `image_products` = ?,  `id_category` = ? WHERE `products`.`id_products` = $id");
            $stmt->execute([$name, $description, $price, $image, $id_category]);
      return $stmt->rowCount() == 1;
        } catch (\PDOException $e) {
            // erreur
            var_dump($e);
        }
    }
}