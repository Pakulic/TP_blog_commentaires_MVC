<!-- formulaire d'ajout de commentaires -->
<form action="index.php?action=addComment&id=<?= $_GET['id'] ?>" method="POST">
  <label for="author">Auteur du commentaire</label>
  <input type="text" id="author" name="author">
  <label for="comment">Commentaire</label>
  <input type="text" id="comment" name="comment">
  <button name="addComment">Ajouter le commentaire</button>
</form>