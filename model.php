<?php
require('post_manager.php');
require('post_model.php');
require('comment_model.php');
require('comment_manager.php');

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
