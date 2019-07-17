
<body>
	<div class="container connection-container">

		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">

				<h1>Créer un nouveau compte</h1>

				<form class="panel-primary" method="post" action="<?php echo HOST.'add_user.html'?>">

					<div class="control-group">
						<div class="form-group floating-label-form-group controls">
							<label for="nickname">Pseudo: </label><input class="form-control" id="nickname" type="text" placeholder="Pseudo" name="nickname" autocomplete="username" required></div>
						</div>
						<div class="control-group">
							<div class="form-group floating-label-form-group controls">
								<label for="password">Mot de passe: </label><input class="form-control" id="password" type="password" name="password"
								placeholder="Mot de passe" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" autocomplete="new-password" title="Le mot de passe doît contenir au moins : un chiffre, une majuscule, une minuscule et 8 caractères minimum" required></input>
							</div>
						</div>
						<div class="control-group">
							<div class="form-group floating-label-form-group controls">
								<label for="password-confirmation">Confirmation: </label><input class="input-sm" placeholder="Confirmation" id="password-confirmation" type="password" name="password-confirmation" autocomplete="new-password" required></input>
							</div>
						</div>
						<div class="flex-space">
							<button type="submit" class="btn btn-primary" onclick="return validate()">Envoyer</button>
						</div>
					</form>

				</div>
			</div>
		</div>


		<script src="<?php echo JS.'form_check.js'?>"></script>
