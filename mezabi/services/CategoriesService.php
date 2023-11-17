<?php

namespace services;

use PDOException;

class CategoriesService
{
    /**
     * @param $pdo
     *  the pdo object used to connect to the database
     * @return $searchStmt
     *  to access to all categories
     */
    public function findAllCategories($pdo)
    {
        $sql = "select code_categorie, designation 
            from a_categories
            order by code_categorie";
        $searchStmt = $pdo->prepare($sql);
        $searchStmt->execute();
        return $searchStmt;
    }


    /**
     * @param $pdo
     *  The pdo object used to connect to the database
     * @param $designation
     *  the new designation of the categorie
     * @param $code
     *  the code of the categorie
     */
    public function updateCategorie($pdo, $designation, $code) {
        try {
            $sql = "update a_categories set designation = ? where code_categorie = ?";
            $searchStmt = $pdo->prepare($sql);
            $searchStmt->execute([$designation, $code]);
        } catch(PDOException $exception) {
            throw new PDOException($exception->getMessage(), (int)$exception->getCode());
        }
    }
}