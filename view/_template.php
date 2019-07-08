<?php session_start(); 

if(isset($_SESSION['nickname'])){ // OR isset($_SESSION['user']), if array
$user = $_SESSION['nickname'];
}else{
	$user = 'Non connecté';
}

$request = $_GET['r'];

if ($request == 'home.html') {
	$link = 'connection.html';
	$link_name = 'connexion';
}
else{
	$link = 'home.html';
	$link_name = 'accueil';
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />

	<link href="<?php echo CSS.'style.css'?>" rel="stylesheet" />

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<title>Le blog de Jean</title>

</head>
<header><div class="my-header"><a href="<?php echo HOST.$link?>"><?php echo $link_name?></a> <div class="user-right"><?= $user; ?></div></div></header>

<?php echo $contentPage ;?>

</body>
</html>