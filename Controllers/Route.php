<?php

namespace Controllers;

class Route
{

    private $routes = [];

    public function __construct()
    {
    }

    public function addRoute($method, $url)
    {
        $this->routes[] = array(
            'method' => $method,
            'url' => $url
        );
    }

    public function doRouting()
    {// je recupère l'url de la page
        $reqUrl = $_SERVER['REQUEST_URI'];
        // je récupère la méthode de requête de la page
        $reqMet = $_SERVER['REQUEST_METHOD'];
        // pour chaque routage 
        foreach ($this->routes as  $route) {
            // je crée la nouvelle url que je récupère de la fonction addRoute()
            $newUrl = preg_quote($route['url']);
            // je parse l'url actuel
            $reqUrl = explode('/', $reqUrl);
            //je remplace une partie de l'url par la nouvelle url
            $reqUrl[2]=stripslashes($newUrl);
            // $reqUrl[3] =stripslashes($newUrl);
            if ($reqMet == $route['method']) {
                // je recompile l'url (split)
                $_SERVER['REQUEST_URI'] = implode('/',$reqUrl);
                return  $_SERVER['REQUEST_URI'];
            }
        }
    }
}
