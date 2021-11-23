<?php

namespace Models;

class ChampsForm
{

  // fonction pour nettoyer et sécurer les champs input
  public static function  validInput($input)
  {
    // je transforme les caractères en entités html=>chaine de caractères.
    htmlentities($input);
    //Supprime les antislashs d'une chaîne    
    stripslashes($input);
    // j'enlève les espaces en trop.
    trim($input);
    // je retourne la valeur
    return $input;
  }
}
