<?php

namespace Models;

include_once 'Database.php';

class AddComments extends Database
{
  //récupère tous les commentaires associés à l'id d'un post
  public function addComment($id, $author, $comment)
  {
    // extract($params);
    $pdo = $this->getPdo();
    // je prépare ma requete sql pour sécuriser contre les injections
    $requete = $pdo->prepare('INSERT INTO comments (author,comment,post_id) VALUES (:author,:comment,:id)');
    // j'execute ma requête
    $requete->execute(['id' => $id, 'author' => $author, 'comment' => $comment]);
    // je ferme ma connexion à la base de données
    $requete->closeCursor();
  }
}
