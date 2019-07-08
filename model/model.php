<?php

function getPosts(){
	$post_manager = new PostManager(dbConnect());
	$posts = $post_manager->getList();

	return $posts;
}

function getPost($postId)
{
	$post_manager = new PostManager(dbConnect());
	$post = $post_manager->get($postId);

	return $post;
}

function getComments($postId)
{	
	$comments = [];
	$comment_manager = new CommentManager(dbConnect());
	$comments = $comment_manager->getList($postId);

	return $comments;
}


// Nouvelle fonction qui nous permet d'éviter de répéter du code
function dbConnect()
{
	try
	{
		$db = new PDO('mysql:host=localhost;dbname=blog_p4;charset=utf8', 'root', '');
		return $db;
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}
}

function getUsers(){
	$user_manager = new UserManager(dbConnect());
	$users = $user_manager->getList();

	return $users;
}


if (isset($_POST['post_id'])){
	$post_id = $_POST['post_id'];

	$post_manager = new PostManager(dbConnect());
	$post = $post_manager->get($post_id);
	$post_manager->delete($post);

	header('Location: ../view/admin_page.php');
}else if(isset($_POST['user_nickname'])){
	$user_nickname = $_POST['user_nickname'];

	$user_manager = new UserManager(dbConnect());
	$user = $user_manager->get($user_nickname);
	$user_manager->delete($user);

	header('Location: ../view/admin_page.php');
}

if (isset($_GET['get_post_id']) && $_GET['get_post_id'] > 0) {
    $post = getPost($_GET['get_post_id']);
    $comments = getComments($_GET['get_post_id']);
    require('../view/post_view.php');
}
else {
    echo 'Erreur : aucun identifiant de billet envoyé';
}