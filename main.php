<?php 

require 'post.php';
require 'post_manager.php';

$db = new PDO('mysql:host=localhost;dbname=blog_p4;charset=utf8', 'root', '');

$post = new Post();

$post->setTitle('titre test');
$post->setContent('test pour voir si la classe fonctionne');

$post_manager = new PostsManager($db);
$post_manager->add($post);

$getFirstPost = $post_manager->get(1);

echo $db;

echo $getFirstPost->title();

$post_manager->add($post);
?>