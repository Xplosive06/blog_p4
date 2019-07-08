<body>
	<div class="bloc-page">

		<h1>Connexion</h1>

		<form class="panel-primary" method="post" action="<?php echo HOST.'check_connection.html'?>">
			<div class="panel-heading">Connexion</div>
			<div class="input-group">
				<label for="nickname">Pseudo: </label><input class="input-sm" id="nickname" type="text" name="nickname" required><br></div>
				<div class="input-group">
					<label for="password">Mot de passe: </label><input class="input-sm" id="password" type="password" name="password" required></input><br></div>
					<div class="flex-space">
						<button type="submit" class="btn-success">Envoyer</button>
						<a href="<?php echo HOST.'new_connection.html'?>">Pas encore de compte?</a>
					</div>

				</form>

			</div>