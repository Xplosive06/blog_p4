<?php 

require 'post.php';
require 'post_manager.php';

$db = new PDO('mysql:host=localhost;dbname=blog_p4;charset=utf8', 'root', '');





if (isset($_POST['title']) && isset($_POST['content']))
{
	if (strlen($_POST['title'])>0 && strlen($_POST['content'])>0)
	{
		$post_manager = new PostsManager($db);
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

}
else if (isset($_POST['id_director'])){
	$id_director = $_POST['id_director'];

	$post_manager = new PostsManager($db);
	$post = $post_manager->get($id_director);
	$post_manager->delete($post);

}

/*
$postsArray = $post_manager->getList();

foreach ($postsArray as $key => $value) {
	echo '[' . $key . '] vaut ' . $value->creation_date() . '<br />';
}*/

header('Location: main_page.php');

?>