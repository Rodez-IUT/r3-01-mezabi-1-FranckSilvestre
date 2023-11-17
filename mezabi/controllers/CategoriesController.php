<?php
namespace controllers;

use services\CategoriesService;
use yasmf\HttpHelper;
use yasmf\View;

class CategoriesController {

    private CategoriesService $categoriesService;

    public function __construct(CategoriesService $categoriesService) {
        $this->categoriesService = $categoriesService;
    }

    /**
     * @param $pdo
     *  the pdo object used to connect to the database
     * @return View
     *  the view in charge of displaying the form to update the categorie
     */
    public function goEditCategorie($pdo) {
        $code = HttpHelper::getParam('code_categorie');
        $designation = HttpHelper::getParam('categorie');
        $view = new View("/views/edit_categorie");
        $view->setVar('code', $code);
        $view->setVar('designation', $designation);
        $view->setVar('message', null);
        $view->setVar('error', null);
        return $view;
    }

    /**
     * @param $pdo
     *  the pdo object used to connect to the database
     * @return View
     *  the view in charge of displaying the form to update the categorie
     */
    public function saveCategorie($pdo) {
        $code = HttpHelper::getParam('code_categorie');
        $designation = HttpHelper::getParam('categorie');
        $view = new View("/views/edit_categorie");
        $view->setVar('code', $code);
        $view->setVar('designation', $designation);
        $view->setVar('message', null);
        $view->setVar('error', null);
        try {
            $this->categoriesService->updateCategorie($pdo,$designation, $code);
            $view->setVar('message', "Categorie modifiée !");
        } catch(\PDOException $ex) {
            $view->setVar('error', "Un problème est survenu.");
        }
        return $view;
    }

}


