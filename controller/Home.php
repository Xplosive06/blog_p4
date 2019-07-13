<?php 
/**
 * 
 */
class Home  extends Database
{

	public function showHome() {
		$db = $this->getDb();
		
		$comment_manager = new CommentManager($db);
		$post_manager = new PostManager($db);
		$posts = $post_manager->getList();

		
		$myView = new View('home');
		$myView->render(array(
			
			'posts' 			=> $posts, 
			'post_manager' 		=> $post_manager,
			'comment_manager' 	=> $comment_manager));

	}

	public function showAdmin() {
		$db = $this->getDb();
		$comments = array();
		
		$comment_manager = new CommentManager($db);
		$post_manager = new PostManager($db);
		$user_manager = new UserManager($db);

		$posts = $post_manager->getList();
		$users = $user_manager->getList();

		$myView = new View('admin');
		$myView->render(array(

			'posts' 			=> $posts, 
			'post_manager' 		=> $post_manager, 
			'comment_manager' 	=> $comment_manager,
			'users'				=> $users,
			'comments'			=> $comments,
		));
	}
}
