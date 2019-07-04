<?php
require('post_manager.php');
require('post_model.php');
require('comment_model.php');
require('comment_manager.php');
require('user.php');
require('user_manager.php');

function getPosts(){
	$post_manager = new PostManager(dbConnect());
	$posts = $post_manager->getList();

	return $posts;
}

function getPost($postId)
{
	$post_manager = new PostManager(dbConnect());
	$post = $post_manager->get($postId);

	echo "getPost appelé";

	return $post;
}

function getComments($postId)
{	
	$comments = [];
	$comment_manager = new CommentManager(dbConnect());
	$comments = $comment_manager->getList($postId);

	return $comments;
}

function getNumberOfComments($postId){
	$comments = getComments($postId);

	$numberOfComments = count($comments);
	return $numberOfComments;
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

	header('Location: admin_page.php');
}else if(isset($_POST['user_nickname'])){
	$user_nickname = $_POST['user_nickname'];

	$user_manager = new UserManager(dbConnect());
	$user = $user_manager->get($user_nickname);
	$user_manager->delete($user);

	header('Location: admin_page.php');
}
