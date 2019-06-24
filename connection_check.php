<?php

require 'user.php';
require 'user_manager.php';

if (isset($_POST['nickname']) && isset($_POST['password']))
{	
	echo $_POST['nickname'];
	echo $_POST['password'];

	$db = new PDO('mysql:host=localhost;dbname=blog_p4;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	$user_nickname = $_POST['nickname'];

	$user_manager = new UserManager($db);
	$check_user = $user_manager->get($user_nickname);

	echo $check_user->nickname();

	// Comparaison du pass envoyé via le formulaire avec la base
$isPasswordCorrect = password_verify($_POST['password'], $check_user->password());

if ($isPasswordCorrect) {
	session_start();
        $_SESSION['nickname'] = $check_user->nickname();
        echo 'Vous êtes connecté !';
	if ($check_user->nickname() == "JeanAdmin") {
		header('Location: admin_page.php');
	}
	else {
		header('Location: main_page.php');
	}
        
        
    }
    else {
        echo 'Mauvais identifiant ou mot de passe !';
    }


}
?>