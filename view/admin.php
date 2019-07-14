<script src="https://cdn.tiny.cloud/1/lpvl4tywiu6tvv87f912fuq0m91f8932hn5q699euk1oy2y8/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
	tinymce.init({
		selector: 'textarea'

	});
</script>

<div class="container admin-container">
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
				<?php include VIEW.'admin_new_post.php'?>

				<?php include VIEW.'admin_posts.php'?>
				
				<?php include VIEW.'admin_comments.php'?>				

				<?php include VIEW.'admin_users.php'?>

		</div>

	</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
