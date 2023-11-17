<?php
namespace controllers;

use yasmf\View;
use services\ArticlesService;

class HomeController {
    private ArticlesService $articlesService;

    public function __construct(ArticlesService $articlesService) {
        $this->articlesService = $articlesService;
    }
    public function index($pdo) {
        $searchStmt = $this->articlesService->findAllCategories($pdo);        
        $view = new View("/views/all_categories");
        $view->setVar('searchStmt',$searchStmt);
        return $view;
    }

}


