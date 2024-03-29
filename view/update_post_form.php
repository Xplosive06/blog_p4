<script src="https://cdn.tiny.cloud/1/lpvl4tywiu6tvv87f912fuq0m91f8932hn5q699euk1oy2y8/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
	tinyMCE.init({
		selector: 'textarea'
	});
</script>

<div id="update_post" class="container update-post-container">
	<form class="panel-primary" method="post" enctype="multipart/form-data" action="<?= HOST.'update_post.html?get_post_id='.$post->id()?>" onsubmit="return validateForm()">

		<div class="panel-heading">
			<h2>Éditer la publication</h2>
		</div>
		<div class="control-group">
			<div class="form-group floating-label-form-group controls">

				<label for="title">Titre: </label>
				<input class="input-lg flex-column" id="title" value="<?= $post->title()?>" data-validation-required-message="Merci d'entrer un titre." type="text" name="title" required>

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
			<textarea class="input-lg" id="content" type="text" name="content"><?= htmlspecialchars($post->content())?></textarea>

			<button type="submit" class="btn btn-primary">Envoyer</button>

		</div>
	</form>
</div>