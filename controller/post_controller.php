<?php


if (isset($_GET['post_id']) && $_GET['post_id'] > 0) {
    $post = getPost($_GET['post_id']);
    $comments = getComments($_GET['post_id']);
    require('../view/post_view.php');
}
else {
    echo 'Erreur : aucun identifiant de billet envoyé';
}

