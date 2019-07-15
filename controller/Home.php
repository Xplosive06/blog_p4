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

		if(!isset($_SESSION)) 
		{ 
			session_start(); 
		} 
		if(isset($_SESSION['nickname']))
		{

			$user_manager = new UserManager();
			$session_user = $user_manager->get($_SESSION['nickname']);
			$session_user_role = $session_user->role();

			if ($session_user_role = 'admin') {

				$comments = array();

				$comment_manager = new CommentManager();
				$post_manager = new PostManager();

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
			}else {
				header('Location: '.HOST.'home.html');
			}

		}else {
			header('Location: '.HOST.'home.html');
		}
	}

	public function showContact() {

		$myView = new View('contact');
		$myView->render();
	}
}
