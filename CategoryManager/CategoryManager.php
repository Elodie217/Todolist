<?php

namespace CategoryManager;

use DbConnexion\DbConnexion;
use Category\Category;

class CategoryManager
{

    private $pdo;

    public function __construct(DbConnexion $dbConnexion)
    {
        $this->pdo = $dbConnexion->getPDO();
    }

    public function getAllCategories()
    {
        $categories = [];

        try {
            $stmt = $this->pdo->query("SELECT * FROM category ");
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $categories[] = new Category($row);
            }
        } catch (\PDOException $e) {
            var_dump($e);
        }


        return $categories;
    }

 public function insertCategory(Category $objet){
        $name = $objet->getName_category();

        try{
            $stmt = $this->pdo->prepare("INSERT INTO category VALUES(NULL,?)");
              $stmt->execute([$name ]);
            return $stmt->rowCount() == 1;

        } catch (\PDOException $e) {
            // erreur
            var_dump($e);
        }

    }


}
