<?php 
/**
 * 
 */
class CommentController
{

	public function getDb(){
		$db = new PDO('mysql:host=localhost;dbname=blog_p4;charset=utf8', 'root', '');

		return $db;

	}

	public function showComments($post_id = null) {

		if(isset($_GET['get_post_id'])){
			$post_id = $_GET['get_post_id'];
		}
		if (isset($post_id) && $post_id > 0) {
			$db = $this->getDb();
			$post_manager = new PostManager($db);
			$post = $post_manager->get($post_id);

			$comment_manager = new CommentManager($db);
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

	public function addComment() {
		session_start();

	if (strlen($_POST['comment']) && isset($_SESSION['nickname']) && isset($_GET['get_post_id']) /*ajouter check SESSION[nickname]*/){

		$db = $this->getDb();

		$comment_manager = new CommentManager($db);
		$new_comment = new Comment();

		$new_comment->setComment($_POST['comment']);
		$new_comment->setAuthor($_SESSION['nickname']);
		$new_comment->setPost_id($_GET['get_post_id']);

		$comment_manager->add($new_comment);

		header('Location: '.HOST.'comments.html?get_post_id='.$_GET['get_post_id']);
		echo "essaye d'utiliser header ici"; exit;
	}
}

public function deleteComment(){

	$db = $this->getDb();

	$comment_manager = new CommentManager($db);
	$comment_manager->delete($_POST['comment_id']);

	header('Location: '.HOST.'admin.html');
}

public function reportComment(){
	$db = $this->getDb();

	$comment_manager = new CommentManager($db);
	$comment = $comment_manager->get($_POST['comment_id']);

	$comment->reported();

	$comment_manager->updateReports($comment);

	header('Location: '.HOST.'comments.html?get_post_id='.$comment->post_id());

}

}