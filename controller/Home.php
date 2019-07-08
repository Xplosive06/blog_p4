<?php 

class Home {

	public function getDb(){
		$db = new PDO('mysql:host=localhost;dbname=blog_p4;charset=utf8', 'root', '');

		return $db;

	}

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
			'users'				=> $users
		));
	}

	public function showComments() {
		$db = $this->getDb();
		$post_manager = new PostManager($db);
		$post = $post_manager->get($_GET['get_post_id']);
		
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

	public function showConnectionCheck() {

		$myView = new View('connection');
		$myView->render();
	}


	public function showConnectionNew() {
		$myView = new View('new_connection');
		$myView->render();
	}

	public function checkConnection(){
		if (isset($_POST['nickname']) && isset($_POST['password']))
		{	

			$db = $this->getDb();

			$user_nickname = $_POST['nickname'];

			$user_manager = new UserManager($db);
			$check_user = $user_manager->get($user_nickname);

	// Comparaison du pass envoyé via le formulaire avec la base
			$isPasswordCorrect = password_verify($_POST['password'], $check_user->password());

			if ($isPasswordCorrect) {
				session_start();
				$_SESSION['nickname'] = $check_user->nickname();

				if ($check_user->nickname() == "JeanAdmin") {
					header('Location: '.HOST.'admin.html');
				}
				else {
					header('Location: '.HOST.'home.html');
				}


			}
			else {
				echo 'Mauvais identifiant ou mot de passe !';
			}


		}
	}

	public function newConnection(){
		if (isset($_POST['nickname']) && isset($_POST['password']))
		{	


			$db = $this->getDb();

			$user_manager = new UserManager($db);
			$users_list = $user_manager->getList();

			$checker = 0;

			/*AJOUTER METHODE CHECK DANS MANAGER A LA PLACE DE CETTE MERDE*/
			foreach ($users_list as $users) {
				echo $users->nickname();
				$nickname = $users->nickname();
				if($nickname == $_POST['nickname']){
					echo $nickname."¤¤¤¤ Pseudo existe déjà ! ¤¤¤¤";
					$checker = 1;
				}
			}

			if($checker == 0){

				$new_user = new User();
				$new_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

				$new_user->setNickname($_POST['nickname']);
				$new_user->setPassword($new_password);

				$user_manager->add($new_user);

				session_start();

				$_SESSION['nickname'] = $new_user->nickname();

				header('Location: '.HOST.'home.html');

			}
		}
	}
}
/*if (isset($_POST['title']) && isset($_POST['content']))
{
	if(empty($_SESSION)){
		header("Location: ".VIEW."/connection.php");
	}
	else if (strlen($_POST['title'])>0 && strlen($_POST['content'])>0)
	{
		$post_manager = new PostManager($db);
		$post = new Post();
		$post->setTitle($_POST['title']);
		$post->setContent($_POST['content']);
		$post_manager->add($post);

	}
	else {
		echo "Title ou content incorrects";
	}

	header('Location: ../index.php');

}*/

/*if (strlen($_POST['comment'])){

	$comment_manager = new CommentManager($db);
	$new_comment = new Comment();

	$new_comment->setComment($_POST['comment']);
	$new_comment->setAuthor($_SESSION['nickname']);
	$new_comment->setPost_id($_SESSION['post_id']);

	$comment_manager->add($new_comment);

	header('Location: post_controller.php?id='.$_SESSION['post_id']);
}*/