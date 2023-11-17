<?php

namespace services;

use PDOException;

class ArticlesService
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
     * @param $codeCategorie
     *  The code of the categorie
     * @return $searchStmt
     *  to access to all articles of the categorie
     */
    public function findAllArticlesByCategorie($pdo, $codeCategorie)
    {
        $sql = "select id_article, code_article, designation 
            from articles
            where categorie = ?
            order by code_article";
        $searchStmt = $pdo->prepare($sql);
        $searchStmt->execute([$codeCategorie]);
        return $searchStmt;
    }
}