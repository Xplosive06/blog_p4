<?php
/**
 * 
 */
class PostController
{
	
	public function addPost() {
		if (strlen($_POST['title'])>0 && strlen($_POST['content'])>0)
		{
			$post_manager = new PostManager($this->getDb());
			$post = new Post();
			$post->setTitle($_POST['title']);
			$post->setContent($_POST['content']);
			$post_manager->add($post);

			header('Location: '.HOST.'admin.html');

		}
		else {
			echo "Title ou content incorrects";
		}
	}

	public function deletePost(){
		if (isset($_POST['post_id'])){
			$post_id = $_POST['post_id'];

			$post_manager = new PostManager($this->getDb());
			$post = $post_manager->get($post_id);
			$post_manager->delete($post);
			header('Location: '.HOST.'admin.html');
		}
	}

}