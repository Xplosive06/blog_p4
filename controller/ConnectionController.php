<?php

class ConnectionController
{

	public function checkConnection(){
		if (isset($_POST['nickname']) && isset($_POST['password']))
		{	

			$user_nickname = $_POST['nickname'];

			$user_manager = new UserManager();
			$check_user = $user_manager->get($user_nickname);

	// Compared sended pass to pass in db
			$isPasswordCorrect = password_verify($_POST['password'], $check_user->password());
			// If OK : start the session with the good nickname
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
			else { // If NOT : go back to connection page
				$this->showConnectionCheck();
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