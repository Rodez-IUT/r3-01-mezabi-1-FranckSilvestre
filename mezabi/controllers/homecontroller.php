<?php
namespace controllers;

use services\CategoriesService;
use yasmf\View;


class HomeController {
    private CategoriesService $categoriesService;

    public function __construct(CategoriesService $categoriesService) {
        $this->categoriesService = $categoriesService;
    }
    public function index($pdo) {
        $searchStmt = $this->categoriesService->findAllCategories($pdo);        
        $view = new View("/views/all_categories");
        $view->setVar('searchStmt',$searchStmt);
        return $view;
    }

    

}


