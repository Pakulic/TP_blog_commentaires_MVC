<?php

namespace Controllers;

use Exception;

include 'Models/AddComments.php';
include 'Models/ChampsForm.php';

use \Models\ChampsForm;

// controller pour vérifier les champs saisis dans le formulaire d'ajout de commentaire 
class Comments
{
  public function controlAddComments($id)
  {
    if (isset($_POST['addComment'])) {
      // on vérifie ce qui a été saisi dans les inputs
      $comment = ChampsForm::validInput($_POST['comment']);
      $author = ChampsForm::validInput($_POST['author']);
      // si tout est ok, on peut ajouter les données du formulaire en base
      $bddAddComment = new \Models\AddComments;
      $bddAddComment->addComment($id, $author, $comment);
      if ($bddAddComment) {
        // throw new Exception('Les données ont bien été enregistrées');
      } else {
        throw new Exception('les données n\'ont pas pu être enregistrées');
      }
    }
  }
}
