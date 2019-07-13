<?php
/**
 * 
 */
class UserController extends Database
{
	
	public function addUser(){
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

	public function deleteUser(){
		if(isset($_POST['user_nickname'])){

			$user_manager = new UserManager($this->getDb());
			$user = $user_manager->get($_POST['user_nickname']);
			$user_manager->delete($user);

			header('Location: '.HOST.'admin.html');
		}
	}
}