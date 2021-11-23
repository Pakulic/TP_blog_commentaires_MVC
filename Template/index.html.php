<h2>Articles</h2>

<?php
foreach ($post as $post) {
?>
  <p>Titre :<?= $post['title'] ?></p>
  <p>Description :<?= $post['description'] ?></p>
  <Form action="index.php?action=post&id=<?= $post['post_id'] ?>" method='POST'>
    <button name='id' value="$post['post_id']">En savoir plus</button>
  </Form>
<?php
}
?>