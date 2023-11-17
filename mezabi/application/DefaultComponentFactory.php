<?php
/*
 * yasmf - Yet Another Simple MVC Framework (For PHP)
 *     Copyright (C) 2023   Franck SILVESTRE
 *
 *     This program is free software: you can redistribute it and/or modify
 *     it under the terms of the GNU Affero General Public License as published
 *     by the Free Software Foundation, either version 3 of the License, or
 *     (at your option) any later version.
 *
 *     This program is distributed in the hope that it will be useful,
 *     but WITHOUT ANY WARRANTY; without even the implied warranty of
 *     MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *     GNU Affero General Public License for more details.
 *
 *     You should have received a copy of the GNU Affero General Public License
 *     along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

namespace application;

use controllers\CategoriesController;
use controllers\HomeController;
use controllers\ArticlesController;
use services\ArticlesService;
use services\CategoriesService;
use yasmf\ComponentFactory;
use yasmf\NoControllerAvailableForNameException;
use yasmf\NoServiceAvailableForNameException;

/**
 *  The controller factory
 */
class DefaultComponentFactory implements ComponentFactory
{
    private ?ArticlesService $articlesService = null;
    private ?CategoriesService $categoriesService = null;

    /**
     * @param string $controller_name the name of the controller to instanciate
     * @return mixed the controller
     * @throws NoControllerAvailableForNameException when controller is not found
     */
    public function buildControllerByName(string $controller_name): mixed {
        return match ($controller_name) {
            "Home" => $this->buildHomeController(),
            "Articles" => $this->buildArticlesController(),
            "Categories" => $this->buildCategoriesController(),
            default => throw new NoControllerAvailableForNameException($controller_name)
        };
    }

    /**
     * @param string $service_name the name of the service
     * @return mixed the created service
     * @throws NoServiceAvailableForNameException when service is not found
     */
    public function buildServiceByName(string $service_name): mixed
    {
        return match ($service_name) {
            "Articles" => $this->buildArticlesService(),
            "Categories" => $this->buildCategoriesService(),
            default => throw new NoServiceAvailableForNameException($service_name)
        };
    }


    /**
     * @return HomeController
     */
    private function buildHomeController(): HomeController
    {
        return new HomeController($this->buildServiceByName("Categories"));
    }


    /**
     * @return ArticlesController
     */
    private function buildArticlesController(): ArticlesController
    {
        return new ArticlesController($this->buildServiceByName("Articles"));
    }

    /**
     * @return CategoriesController
     */
    private function buildCategoriesController(): CategoriesController
    {
        return new CategoriesController($this->buildServiceByName("Categories"));
    }

     /**
     * @return ArticlesService
     */
    private function buildArticlesService(): ArticlesService
    {
        if ($this->articlesService == null) {
            $this->articlesService = new ArticlesService();
        }
        return $this->articlesService;
    }

    /**
     * @return CategoriesService
     */
    private function buildCategoriesService(): CategoriesService
    {
        if ($this->categoriesService == null) {
            $this->categoriesService = new CategoriesService();
        }
        return $this->categoriesService;
    }

}