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

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


	<title>Administration</title>
	
</head>

<body>
	<div class="bloc-page">
		<header><div class="my-header"><a href="index.php">accueil</a> <div class="user-right"><?php echo $user; ?></div></div></header>

		<h1>Administration</h1>

		<div class="admin-block">

			<ul class="nav nav-pills admin-navbar">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="pill" href="#new_post">Nouvelle publication</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="pill" href="#posts">Vos publications</a>
				</li >
				<li class="nav-item">
					<a class="nav-link" data-toggle="pill" href="#comments">Les commentaires</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="pill" href="#users">Gestion utilisateurs</a>
				</li>
			</ul>
			<div class="tab-content admin-main-part">
				<div id="new_post" class="tab-pane active fade show">
					<form class="panel-primary admin-main-part" method="post" action="main.php" onsubmit="return validateForm()">

						<div class="panel-heading">Nouvel publication</div>
						<div class="input-group">

							<label for="title">Titre: </label><input class="input-sm" id="title" type="text" name="title" required><br></div>
							<div class="input-group">

								<label for="content">Message: </label><textarea class="input-lg" id="content" type="text" name="content" required></textarea><br>

								<button type="submit" class="btn-success">Envoyer</button>

							</div>
						</form>
					</div>

					<div id="posts" class="tab-pane fade">
						<h3>Tous les articles</h3>
					</div>
					<div id="comments" class="tab-pane fade">
						<h3>Tous les commentaires</h3>
					</div>
					<div id="users" class="tab-pane fade">
						<h3>Tous les utilisateurs</h3>
					</div>
				</div>

			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
	</html>