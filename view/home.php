<body>
    <div class="bloc-page">
        
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
                        <em><a href="<?php echo HOST.'comments.html?get_post_id='?><?= $post->id() ?>"><?=$comment_manager->getNumberOfComments($post->id())?> commentaires</a></em>
                        
                    </div>

                </div>

            </div>
            <?php
} 
?>
</div>