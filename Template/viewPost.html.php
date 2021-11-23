<h2>Article</h2>

<p>Titre :<?= $post['title'] ?></p>
<p>Description :<?= $post['description'] ?></p>

<h2>Commentaires</h2>

<?php
foreach ($comment as $comment) {
?>
  <p>Date :<?= $comment['comment_date'] ?></p>
  <p>Auteur :<?= $comment['author'] ?></p>
  <p>Commentaire :<?= $comment['comment'] ?></p>
<?php
}
?>
<form action="index.php?action=formAddComment&id=<?= $post['post_id'] ?>" method="POST">
  <button>Ajouter un commentaire</button>
</form>