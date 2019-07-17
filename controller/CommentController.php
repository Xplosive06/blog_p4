<?php 
/**
 * 
 */
class CommentController extends Database
{

	public function addComment() {
		session_start();

		if (strlen($_POST['comment']) && isset($_SESSION['nickname']) && isset($_GET['get_post_id'])){

			$db = $this->getDb();

			$comment_manager = new CommentManager($db);
			$new_comment = new Comment();

			$new_comment->setComment($_POST['comment']);
			$new_comment->setAuthor($_SESSION['nickname']);
			$new_comment->setPost_id($_GET['get_post_id']);

			$comment_manager->add($new_comment);

			header('Location: '.HOST.'post.html?get_post_id='.$_GET['get_post_id']);
		}elseif (!isset($_SESSION['nickname'])) {
			header('Location: '.HOST.'connection.html');
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

		header('Location: '.HOST.'post.html?get_post_id='.$comment->post_id());

	}

}