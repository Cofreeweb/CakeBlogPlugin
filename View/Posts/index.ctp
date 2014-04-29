<? foreach( $posts as $post): ?>
    <p><a href="<?= $post ['Post']['url'] ?>"><?= $post ['Post']['title'] ?></a></p>
<? endforeach ?>