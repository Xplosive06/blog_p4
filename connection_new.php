<?php

require 'user.php';
require 'user_manager.php';

if (isset($_POST['nickname']) && isset($_POST['password']))
{	


	$db = new PDO('mysql:host=localhost;dbname=blog_p4;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	$user_manager = new UserManager($db);
	$users_list = $user_manager->getList();

	$checker = 0;

	foreach ($users_list as $users) {
		echo $users->nickname();
		$nickname = $users->nickname();
		if($nickname == $_POST['nickname']){
			echo "ùùùùùù Pseudo existe déjà !  ùùùùùù";
			$checker = 1;
			echo $checker;
			echo "ùùùùùù Pseudo existe déjà !  ùùùùùù";
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

	header('Location: main_page.php');

	}

/*	*/

}
?>