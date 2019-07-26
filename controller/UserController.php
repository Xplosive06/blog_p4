<?php
/**
 * 
 */
class UserController extends Database
{
	
	public function addUser(){
		if (isset($_POST['nickname']) && isset($_POST['password'])) {	

			$db = $this->getDb();

			$user_manager = new UserManager($db);
			$users_list = $user_manager->getList();

			$checker = 0;

			foreach ($users_list as $users) {

				$nickname = $users->nickname();
				// Check if nickname already exists in db
				if($nickname == $_POST['nickname']) {
					header('Location: '.HOST.'new_connection.html');
					$checker = 1;
				}
			}
			// If nickname doesn't exists
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

	public function deleteUser(){

		if(isset($_POST['user_nickname'])) {

			$comment_manager = new CommentManager($this->getDb());
			$user_manager = new UserManager($this->getDb());

			$user = $user_manager->get($_POST['user_nickname']);
			//Change the name of the deleted User
			$comment_manager->deleteAuthorName($user->nickname());
			$user_manager->delete($user);

			header('Location: '.HOST.'admin.html');
		}
	}
}