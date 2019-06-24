<?php session_start(); 

if(isset($_SESSION['nickname'])){ // OR isset($_SESSION['user']), if array
$user = $_SESSION['nickname'];
}else{
	$user = 'Non connecté';
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />

	<link href="style.css" rel="stylesheet" />

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> 

	<title>Administration</title>
	
</head>

<body>
	<div class="bloc-page">
		<header><div class="my-header"><a href="main_page.php">accueil</a> <div class="user-right"><?php echo $user; ?></div></div></header>

		<h1>Administration</h1>

		<div class="admin-block">

			<ul class="nav nav-pills admin-navbar">
				<li class="nav-item">
					<a class="nav-link active" href="#">Nouvelle publication</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Vos publications</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Les commentaires</a>
				</li>
				<li class="nav-item">
					<a class="nav-link disabled" href="#">Gestion utilisateurs</a>
				</li>
			</ul>

			<form class="panel-primary admin-main-part" method="post" action="main.php" onsubmit="return validateForm()">

				<div class="panel-heading">Nouveau billet</div>
				<div class="input-group">

					<label for="title">Titre: </label><input class="input-sm" id="title" type="text" name="title" required><br></div>
					<div class="input-group">

						<label for="content">Message: </label><textarea class="input-lg" id="content" type="text" name="content" required></textarea><br>

						<button type="submit" class="btn-success">Envoyer</button>

					</div>
				</form>

			</div>
		</div>
	</body>
	</html>