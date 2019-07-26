			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

			<div id="new_post" class="tab-pane active fade show">
				<form class="panel-primary" method="post" enctype="multipart/form-data" action="<?php echo HOST.'add_post.html'?>" onsubmit="return validateForm()">

					<div class="panel-heading">
						<h2>Nouvelle publication</h2></div>
						<div class="control-group">
							<div class="form-group floating-label-form-group controls">


								<label for="title">Titre: </label><input class="input-lg flex-column" id="title" placeholder="Titre" data-validation-required-message="Merci d'entrer un titre." type="text" name="title" required>
							</div>
						</div>
						<div class="control-group">
							<div class="form-group floating-label-form-group controls">

								<label for="image">Insérer une image : </label>
								<input type="hidden" name="MAX_FILE_SIZE" value="512000" />
								<input type="file" name="image" id="image">
							</div>
						</div>
						<div class="control-group">

							<label for="content">Contenu : </label>
							<textarea class="input-lg" id="content" type="text" name="content"></textarea>


						</div>
						<button id ="submit" type="submit" class="btn btn-primary">Envoyer</button>
					</form>
				</div>