<?php
/**
 * 
 */
class PostController extends Database
{

	public function showPosts() {

		if(isset($_GET['get_post_id'])){
			$post_id = $_GET['get_post_id'];
		}
		if (isset($post_id) && $post_id > 0) {

			$post_manager = new PostManager();
			$post = $post_manager->get($post_id);

			$comment_manager = new CommentManager();
			$comments = $comment_manager->getList($post->id());

			$myView = new View('post_view');
			$myView->render(array(

				'post' 				=> $post, 
				'post_manager' 		=> $post_manager, 
				'comment_manager' 	=> $comment_manager,
				'comments'			=> $comments
			));

		}
		else {
			echo 'Erreur : aucun identifiant de billet envoyé';
		}
	}
	
	public function addPost() {
		if (strlen($_POST['title'])>0 && strlen($_POST['content'])>0)
		{
			$post_manager = new PostManager();
			$post = new Post();
			$post->setTitle($_POST['title']);
			$post->setContent($_POST['content']);

			$this->checkImage($post);

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

			$post_manager = new PostManager();
			$post = $post_manager->get($post_id);
			$post_manager->delete($post);
			header('Location: '.HOST.'admin.html');
		}
	}

	public function updatePostForm() {
		if (isset($_POST['post_id'])){
			$post_id = $_POST['post_id'];

			$post_manager = new PostManager();
			$post = $post_manager->get($post_id);

			$myView = new View('update_post_form');
			$myView->render(array(

				'post' => $post, 
			));
		}
	}

	public function updatePost() {
		if (strlen($_POST['title'])>0 && strlen($_POST['content'])>0 && isset($_GET['get_post_id']))
		{
			$post_manager = new PostManager();
			$post = $post_manager->get($_GET['get_post_id']);

			if($post->image()) 
			{
				$image_to_delete = ROOT.$post->image();

				if (file_exists($image_to_delete)) {
					unlink($image_to_delete);
				} else {
					echo " L'image n'existe pas ou plus";
				}
			}

			$post->setTitle($_POST['title']);
			$post->setContent($_POST['content']);
			
			$this->checkImage($post);

			$post_manager->update($post);

			header('Location: '.HOST.'admin.html');

		}
		else {
			echo "Title ou content incorrects";
		}

	}

	function checkImage($post){
		if (file_get_contents($_FILES['image']["tmp_name"]) !== NULL) {
			$folder = 'public/img/';
			$uploaddir = ROOT.$folder;
			$uploadfile = $uploaddir . basename($_FILES['image']['name'] . time());

			if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
				echo "File is valid, and was successfully uploaded.\n";
				$post->setImage($folder . basename($_FILES['image']['name']) . time());
			} else {
				echo "Upload failed";
			}

		}
	}

}