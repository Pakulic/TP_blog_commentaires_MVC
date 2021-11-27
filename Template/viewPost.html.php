<h2>Article</h2>

<p>Titre :<?= $post['title'] ?></p>
<p>Description :<?= $post['description'] ?></p>

<h2>Commentaires</h2>

<?php
foreach ($comment as $comment) {
?>
  <p>Date :<?= $comment['comment_date_fr'] ?></p>
  <p>Auteur :<?= $comment['author'] ?></p>
  <p>Commentaire :<?= $comment['comment'] ?></p>
<?php
}
?>
<form action="view<?= $post['post_id'] ?>-addcomment" method="POST">
  <button name='id' value="$post['post_id']" >Ajouter un commentaire</button>
</form>