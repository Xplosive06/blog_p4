
        
    <body>
        <h1>Mon super blog !</h1>

        <div class="news">
            <h3>
                <?= htmlspecialchars($post->title()) ?>
                <em>le <?= $post->creation_date() ?></em>
            </h3>
            
            <p>
                <?= nl2br(htmlspecialchars($post->content())) ?>
            </p>
        </div>

        <h2>Commentaires</h2>

        <?php
        foreach ($comments as $key => $comment) {

        ?>
            <p><strong><?= htmlspecialchars($comment->author()) ?></strong> le <?= $comment->comment_date() ?></p>
            <p><?= nl2br(htmlspecialchars($comment->comment())) ?></p>
        <?php
        }
        ?>

        <form class="panel-primary" method="post" action="main.php">

            <div class="panel-heading">Mon commentaire</div>
    
                <div class="input-group">

                    <label for="comment">Message: </label><textarea class="input-lg" id="comment" type="text" name="comment" required></textarea><br>

                    <button type="submit" class="btn-success">Envoyer</button>

                </div>
            </form>
