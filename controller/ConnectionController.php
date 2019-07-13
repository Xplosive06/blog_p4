<?php
/**
 * 
 */
class ConnectionController extends Database
{

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

				if ($check_user->role() == "admin") {
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


	public function showConnectionCheck() 
	{
		$myView = new View('connection');
		$myView->render();
	}


	public function showConnectionNew() 
	{
		$myView = new View('new_connection');
		$myView->render();
	}

	public function disconnection() {
		session_start();
		if(isset($_SESSION['nickname'])){
			unset($_SESSION['nickname']);
		}
		header('Location: '.HOST.'home.html');
	}
}