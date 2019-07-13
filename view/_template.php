<?php 

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	<link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<link href="<?php echo CSS.'style.css'?>" rel="stylesheet" />

	<title>Le blog de Jean</title>

</head>
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
	<div class="container">
		<a class="navbar-brand" href='<?php echo HOST."home.html"?>'>Jean On The Road</a>
		<button class="navbar-toggler navbar-toggler-right collapsed" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			Menu
			<i class="fas fa-bars"></i>
		</button>
		<div class="navbar-collapse collapse" id="navbarResponsive" style="">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="<?php echo HOST.$link_1?>"><?php echo $link_name_1?></a>
				</li>
				<li <?php echo $display?> class="nav-item">
					<a class="nav-link" href="<?php echo HOST.$link_2?>"><?php echo $link_name_2?></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo HOST.$link_3?>"><?php echo $link_name_3?></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo HOST.'contact.html'?>">Contact</a>
				</li>
			</ul>
		</div>
	</div>
</nav>

<?php echo $contentPage ;?>

<hr>

<footer>
	<div class="connected-user">
		<?php echo $user_link?>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<ul class="list-inline text-center">
					<li class="list-inline-item">
						<a href="#">
							<span class="fa-stack fa-lg">
								<i class="fas fa-circle fa-stack-2x"></i>
								<i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
							</span>
						</a>
					</li>
					<li class="list-inline-item">
						<a href="#">
							<span class="fa-stack fa-lg">
								<i class="fas fa-circle fa-stack-2x"></i>
								<i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
							</span>
						</a>
					</li>
					<li class="list-inline-item">
						<a href="#">
							<span class="fa-stack fa-lg">
								<i class="fas fa-circle fa-stack-2x"></i>
								<i class="fab fa-github fa-stack-1x fa-inverse"></i>
							</span>
						</a>
					</li>
				</ul>
				<p class="copyright text-muted">Copyright © M.Notta 2019</p>
			</div>
		</div>
	</div>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
