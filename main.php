<?php 
session_start();

require 'post_model.php';
require 'post_manager.php';
require 'user.php';
require 'user_manager.php';


$db = new PDO('mysql:host=localhost;dbname=blog_p4;charset=utf8', 'root', '');

if (isset($_POST['title']) && isset($_POST['content']))
{
	if(empty($_SESSION)){
		header("Location: /connection.php");
	}
	else if (strlen($_POST['title'])>0 && strlen($_POST['content'])>0)
	{
		$post_manager = new PostManager($db);
		$post = new Post();
		$post->setTitle($_POST['title']);
		$post->setContent($_POST['content']);
		$post_manager->add($post);
		echo $post->title();
		echo $post->content();
	}
	else {
		echo "Title ou content incorrects";
	}

	header('Location: index.php');

}
else if (isset($_POST['id_director'])){
	$id_director = $_POST['id_director'];

	$post_manager = new PostManager($db);
	$post = $post_manager->get($id_director);
	$post_manager->delete($post);

	header('Location: index.php');
}