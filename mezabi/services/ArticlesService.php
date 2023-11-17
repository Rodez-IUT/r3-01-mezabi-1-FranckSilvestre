<?php

namespace services;

use PDOException;

class ArticlesService
{
    
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