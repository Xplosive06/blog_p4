<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8" />

	<link href="style.css" rel="stylesheet" />

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> 

	<title>Page de connexion</title>
</head>
<body>
	<div class="bloc-page">

	<header><a href="main_page.php">accueil</a></header>

	<h1>Connexion</h1>

	<form class="panel-primary" method="post" action="main.php">
		<div class="panel-heading">Connexion</div>
		<div class="input-group">
			<label for="nickname">Pseudo: </label><input class="input-sm" id="nickname" type="text" name="nickname" required><br></div>
			<div class="input-group">
				<label for="password">Mot de passe: </label><input class="input-sm" id="password" type="password" name="password" required></input><br></div>
				<div class="flex-space">
				<button type="submit" class="btn-success">Envoyer</button>
				<a href="new_connection.php">Pas encore de compte?</a>
				</div>

			</form>

			</div>

		</body>
		</html>