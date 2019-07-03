<?php
require('post_manager.php');
require('post.php');

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
	$db = dbConnect();
	$comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
	$comments->execute(array($postId));

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
