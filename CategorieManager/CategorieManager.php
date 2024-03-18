<?php

namespace CategorieManager;

use Categorie\Categorie;
use DbConnexion\DbConnexion;
use PDO;

class CategorieManager
{

    private $pdo;

    public function __construct(DbConnexion $dbConnexion)
    {
        $this->pdo = $dbConnexion->getPDO();
    }


    // public function getAllCategories()
    // {
    //     $sql = "SELECT * FROM tdl_categorie";

    //     $retour = $this->pdo->query($sql)->fetchAll(PDO::FETCH_CLASS, 'Categorie');

    //     return $retour;
    // }


    // public function getAllCategories()
    // {
    //     $products = [];

    //     try {
    //         $stmt = $this->pdo->query("SELECT * FROM tdl_categorie");

    //         while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
    //             $products[] = new Categorie($row);
    //         }
    //     } catch (\PDOException $e) {
    //         var_dump($e);
    //     }

    //     return $products;
    // }

    public function getAllCategories()
    {
        $sql = "SELECT * FROM tdl_categorie";

        $retour = $this->pdo->query($sql)->fetchAll(PDO::FETCH_CLASS, 'Categorie\Categorie');

        return $retour;
    }
}
