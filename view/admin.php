
		<h1>Administration</h1>

		<div class="admin-block">

			<ul class="nav nav-pills admin-navbar">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="pill" href="#new_post">Nouvelle publication</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="pill" href="#posts">Vos publications</a>
				</li >
<!-- 				<li class="nav-item">
	<a class="nav-link" data-toggle="pill" href="#comments">Les commentaires</a>
</li> -->
<li class="nav-item">
	<a class="nav-link" data-toggle="pill" href="#users">Gestion utilisateurs</a>
</li>
</ul>
<div class="tab-content admin-main-part">
	<div id="new_post" class="tab-pane active fade show">
		<form class="panel-primary admin-main-part" method="post" action="../controller/main.php" onsubmit="return validateForm()">

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
					<em><a href="../controller/post_controller.php?id=<?= $post->id() ?>"><?=$comment_manager->getNumberOfComments($post->id())?> Commentaires</a></em>
					<form method="POST" action="../model/model.php">

						<button type="submit" class="btn-danger" name="post_id" value="<?= $post->id()?>">Supprimer</button>
					</form>
				</div>

			<?php } ?>

		</div>

		<div id="users" class="tab-pane fade">
			<h3>Tous les utilisateurs</h3>
			<?php 
			foreach ($users as $key => $ad_user) {

				?>
				<div class="bordering">

					<div class="user_bar"><div><strong>Id : </strong><?= htmlspecialchars($ad_user->id()); ?></div>
					<strong><?= $ad_user->nickname()?></strong> 
				</div>

				<form method="POST" action="../model/model.php">

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
