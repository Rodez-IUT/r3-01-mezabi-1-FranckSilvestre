<?php
namespace controllers;

use services\ArticlesService;
use yasmf\HttpHelper;
use yasmf\View;

class ArticlesController {

    private ArticlesService $articlesService;

    public function __construct(ArticlesService $articlesService) {
        $this->articlesService = $articlesService;
    }
    public function index($pdo) {
        $codeCategorie = HttpHelper::getParam("code_categorie");
        $designationCategorie = HttpHelper::getParam("categorie");
        $searchStmt = $this->articlesService->findAllArticlesByCategorie($pdo, $codeCategorie);
        $view = new View("/views/all_articles");
        $view->setVar('searchStmt',$searchStmt);
        $view->setVar('categorie', $designationCategorie);
        return $view;
    }

}


