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
        <header><div class="my-header"><a href="connection.php">connexion</a> <div class="user-right"><?php echo $user; ?></div></div></header>
        <h1>Le blog de Jean</h1>

            <h1>Derniers billets du blog :</h1>

            <?php
            try
            {
                $bdd = new PDO('mysql:host=localhost;dbname=blog_p4;charset=utf8', 'root', '');
            }
            catch(Exception $e)
            {
                die('Erreur : '.$e->getMessage());
            }

            $req = $bdd->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

            while ($donnees = $req->fetch())
            {
                ?>
                <div class="news">
                    <h3>
                        <?php echo htmlspecialchars($donnees['title']); ?>
                        <em>le <?php echo $donnees['creation_date_fr']; ?></em>
                    </h3>
                    <div class="content-area">
                        <p>
                            <?php
    // On affiche le contenu du billet
                            echo nl2br(htmlspecialchars($donnees['content']));
                            ?>
                            <br />
                        </p>
                        <div class="flex-space">
                            <em><a href="commentaires.php?billet=<?php echo $donnees['id']; ?>">Commentaires</a></em>
                            <form method="POST" action="main.php">

                                <button type="submit" class="btn-danger" name="id_director" value="<?php echo $donnees['id']; ?>">Supprimer</button>
                            </form>
                        </div>

                    </div>

                </div>
                <?php
} // Fin de la boucle des billets
$req->closeCursor();
?>
</div>
</body>
</html>