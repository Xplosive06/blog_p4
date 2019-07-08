<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
	tinymce.init({selector: '#content'});
</script>


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
			<form class="panel-primary admin-main-part" method="post" action="<?php echo HOST.'add_post.html'?>" onsubmit="return validateForm()">

				<div class="panel-heading">Nouvelle publication</div>
				<div class="input-group">

					<label for="title">Titre: </label><input class="input-sm flex-column" id="title" type="text" name="title" required><br></div>
					<div class="input-group flex-column">

						<label for="content">Message: </label>
						<textarea class="input-lg" id="content" type="text" name="content" required></textarea>

						<button type="submit" class="btn-success">Envoyer</button>

					</div>
				</form>
			</div>

			<div id="posts" class="tab-pane panel-primary admin-main-part fade">
				<h3>Tous les articles</h3>
				<?php 

				foreach ($posts as $key => $post) {

					?>
					<div class="bordering">

						<p>
							<p><strong>Titre : </strong><?= htmlspecialchars($post->title()); ?></p>
							<em><strong>le</strong> <?= $post->creation_date()?></em>
						</p>

						<p><strong>Contenu :</strong>
							<?=
							nl2br(htmlspecialchars($post->content()));
							?>
						</p>
						<em><a href="<?php echo HOST.'comments.html?get_post_id='?><?= $post->id() ?>"><?=$comment_manager->getNumberOfComments($post->id())?> Commentaires</a></em>
						<form method="POST" action="<?php echo HOST.'delete_post.html'?>">

							<button type="submit" class="btn-danger" name="post_id" value="<?= $post->id()?>">Supprimer</button>
						</form>
					</div>

				<?php } ?>

			</div>

			<div id="comments" class="tab-pane panel-primary admin-main-part fade">
				<h3>Les commentaires signalés</h3>
				<?php 
				foreach ($posts as $key => $post) {

					$comments = $comment_manager->getList($post->id());
					foreach ($comments as $key => $comment) {
						if($comment->reports() > 0){

							?>
							<div class="bordering">

								<div class="user_bar">
									<strong><?= $post->creation_date()?></strong> 

									<strong>Titre de la publication : <?= $post->title()?></strong> 
								</div>
								<h3>Contenu du commentaire</h3>
								<strong><?= $comment->comment()?></strong>

								<form method="POST" action="<?php echo HOST.'delete_comment.html'?>">

									<button type="submit" class="btn-danger" name="comment_id" value="<?= $comment->id()?>">Supprimer</button>
								</form>
							</div>
						<?php }?>
					<?php }?>
				<?php } ?>
			</div>

			<div id="users" class="tab-pane panel-primary admin-main-part fade">
				<h3>Tous les utilisateurs</h3>
				<?php 
				foreach ($users as $key => $ad_user) {

					?>
					<div class="bordering">

						<div class="user_bar"><div><strong>Id : </strong><?= htmlspecialchars($ad_user->id()); ?></div>
						<strong><?= $ad_user->nickname()?></strong> 
					</div>

					<form method="POST" action="<?php echo HOST.'delete_user.html'?>">

						<button type="submit" class="btn-danger" name="user_nickname" value="<?= $ad_user->nickname()?>">Supprimer</button>
					</form>
				</div>

			<?php } ?>
		</div>

	</div>

</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
