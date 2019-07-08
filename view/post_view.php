

<body>
    <h1>Mon super blog !</h1>

    <div class="news panel-primary">
        <h3>
            <?= htmlspecialchars($post->title()) ?>
            <em>le <?= $post->creation_date() ?></em>
        </h3>

        <p>
            <?= nl2br(htmlspecialchars($post->content())) ?>
        </p>
    </div>

    <div class="center">
    <h2>Commentaires</h2>
    </div>

    <div class="news panel-primary">

    <?php
    foreach ($comments as $key => $comment) {

        ?>
        
        <div class="user_bar"><p><strong><?= htmlspecialchars($comment->author()) ?></strong> le <?= $comment->comment_date() ?></p><form method="POST" action="<?php echo HOST.'report_comment.html'?>">

            <button type="submit" class="btn-danger" name="comment_id" value="<?php echo $comment->id()?>">Signaler "<?php echo $comment->reports()?>"</button>
        </form></div>
        <p><?= nl2br(htmlspecialchars($comment->comment())) ?></p>
        <?php
    }
    ?>
    </div>

    <form class="panel-primary news" method="post" action="<?php echo HOST.'add_comment.html?get_post_id='?><?= $post->id()?>">

        <div class="panel-heading">Mon commentaire</div>

        <div class="input-group">

            <label for="comment">Message: </label><textarea class="input-lg" id="comment" type="text" name="comment" required></textarea><br>

            <button type="submit" class="btn-success">Envoyer</button>

        </div>
    </form>
