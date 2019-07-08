
<body>
	<div class="bloc-page">

		<h1>Créer un nouveau compte</h1>

		<form class="panel-primary" method="post" action="<?php echo HOST.'add_user.html'?>">
			<div class="panel-heading">Nouveau compte</div>
			<div class="form-bloc">
				<div class="left-side-form">
					<div class="input-group">
						<label for="nickname">Pseudo: </label><input class="input-sm" id="nickname" type="text" name="nickname" autocomplete="username" required><br></div>
						<div class="input-group">
							<label for="password">Mot de passe: </label><input class="input-sm" id="password" type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" autocomplete="new-password" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" autocomplete="new-password" required></input><br></div>
							<div class="input-group">
								<label for="password-confirmation">Confirmation: </label><input class="input-sm" id="password-confirmation" type="password" name="password-confirmation" autocomplete="new-password" required></input><br></div>
								<div class="flex-space">
									<button type="submit" class="btn-success" onclick="return validate()">Envoyer</button>
								</div>
							</div>
							<div class="right-side-form">
								<div id="message">
									<h3>Votre mot de passe doît contenir :</h3>
									<p id="letter" class="invalid">Une lettre en <b>minuscule</b></p>
									<p id="capital" class="invalid">Une lettre en <b>capitale</b></p>
									<p id="number" class="invalid">Un <b>chiffre</b></p>
									<p id="length" class="invalid">Au minimum<b>8 caractères</b></p>
								</div>
							</div>

						</div>

					</form>

				</div>

				
				<script src="<?php echo JS.'form_check.js'?>"></script>
