<body>

    <div class="container post-container">
        <div class="row">

            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-preview">
                    <?php if ($post->image()) {
                    ?>
                    <br>
                    <div class="text-center">
                    <img class="img-thumbnail" src="<?php echo HOST.$post->image()?>">
                    </div>

                   <?php } ?>
                    <h2 class="post-title">
                        <?= htmlspecialchars($post->title()) ?>

                    </h2>

                    <p class="post-subtitle">
                        <?= nl2br($post->content()) ?>
                    </p>
                    <div class="flex-space post-meta">

                        <em>

                            <span><?=$comment_manager->getNumberOfComments($post->id())?> commentaire<?php 

                            if($comment_manager->getNumberOfComments($post->id())>1){echo 's';}?></span></em>

                            <em>le <?= $post->creation_date()?></em>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <hr>
        <br>

        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-md-10 mx-auto">
                    <h2 class="post-title">Commentaire<?php 

                    if($comment_manager->getNumberOfComments($post->id())>1){echo 's';}?>
                    (<?=$comment_manager->getNumberOfComments($post->id())?>)
                </h2>

                <br>

                <?php
                foreach ($comments as $key => $comment) {

                    ?>
                    <div class="post-preview bordering-comment">

                        <div class="user_bar"><strong><?= htmlspecialchars($comment->author()) ?></strong><p> le <?= $comment->comment_date() ?></p></div>
                        <p><?= nl2br(htmlspecialchars($comment->comment())) ?></p>
                        <div class="text-right">
                            <form method="POST" action="<?php echo HOST.'report_comment.html'?>">

                                <button type="submit" class="btn btn-primary btn-report btn-show-alert" name="comment_id" value="<?php echo $comment->id()?>">Signaler "<?php echo $comment->reports()?>"</button>
                            </form>
                        </div>
                    </div>
                    <br>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>

    <br>
    <hr>
    <br>

    <div class="container post-container post-comment-container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">

                <form class="panel-primary news" method="post" action="<?php echo HOST.'add_comment.html?get_post_id='?><?= $post->id()?>">
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">

                            <h2 class="post-title">Mon commentaire</h2>


                            <label for="comment">Message: </label><textarea rows="5" class="form-control" placeholder="Message" id="comment" type="text" name="comment" data-validation-required-message="Merci d'entrer votre message." required></textarea>

                        </div>
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>