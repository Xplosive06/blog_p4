<?php session_start(); 

if(isset($_SESSION['nickname'])){ // OR isset($_SESSION['user']), if array
$user = $_SESSION['nickname'];
}else{
    $user = 'Non connecté';
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />

    <link href="style.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> 

    <title>Le blog de Jean</title>
    
</head>

<body>
    <div class="bloc-page">
        <header><div class="my-header"><a href="connection.php">connexion</a> <div class="user-right"><?= $user; ?></div></div></header>
        <h1>Le blog de Jean</h1>

        <h1>Derniers billets du blog :</h1>

        <?php 
        foreach ($posts as $key => $post) {

            ?>
            <div class="news">
                <h3>
                    <?= htmlspecialchars($post->title()); ?>
                    <em>le <?= $post->creation_date()?></em>
                </h3>
                <div class="content-area">
                    <p>
                        <?=
                        nl2br(htmlspecialchars($post->content()));
                        ?>
                        <br />
                    </p>
                    <div class="flex-space">
                        <em><a href="post_controller.php?id=<?= $post->id() ?>">Commentaires</a></em>
                        <form method="POST" action="main.php">

                            <button type="submit" class="btn-danger" name="id_director" value="<?= $post->id()?>">Supprimer</button>
                        </form>
                    </div>

                </div>

            </div>
            <?php
} // Fin de la boucle des billets
?>
</div>
</body>
</html>