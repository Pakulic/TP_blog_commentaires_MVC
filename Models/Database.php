<?php

namespace Models;


class Database
{

  /* création d'une fonction protégée qui permet la connexion avec la base de données */
  protected function getPdo()
  {
    // essaie la connexion avec la base
    try {
      $pdo = new \PDO('mysql:host=localhost;dbname=exo_mvc_commentaires;charset=utf8', 'tpblog', 'Tp2021Formation');
      // et retourne les erreurs en cas de problème 
    } catch (\Exception $e) {
      die('Erreur : ' . $e->getMessage());
    }
    return $pdo;
  }
}
