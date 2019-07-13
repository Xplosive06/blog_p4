<body>
	<div class="container connection-container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">

				<h1>Connexion</h1>

				<form class="panel-primary" method="post" action="<?php echo HOST.'check_connection.html'?>">
					<div class="control-group">
						<div class="form-group floating-label-form-group controls">
							<label for="nickname">Pseudo: </label><input class="form-control" id="nickname" placeholder="Pseudo" type="text" name="nickname" required></div>
						</div>
						<div class="control-group">
						<div class="form-group floating-label-form-group controls">
							<label for="password">Mot de passe: </label><input class="form-control" id="password" placeholder="Mot de passe" type="password" name="password" required></input>
						</div>
						</div>
							<div class="flex-space">
								<button type="submit" class="btn btn-primary">Envoyer</button>
								<a href="<?php echo HOST.'new_connection.html'?>">Pas encore de compte?</a>
							</div>

						</form>

					</div>

				</div>

			</div>