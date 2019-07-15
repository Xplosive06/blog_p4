<body>
    <div class="bloc-page">

        <header>
            <div class="new-header" style='background-image: url("<?php echo IMG.'mast-header.jpg'?>")'>

                <!-- <div class="overlay"></div> -->
                <div class="container">
                  <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                      <div class="page-heading">
                        <h1>Blog de Jean</h1>
                        <span class="subheading">Mon blog de voyage</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>

<hr>

<div class="container">
    <div class="row">

        <div class="col-lg-8 col-md-10 mx-auto">
            <?php 
            foreach ($posts as $key => $post) {

                ?>

                <div class="post-preview">
                    <a href="<?php echo HOST.'post.html?get_post_id='?><?= $post->id() ?>">
                        <h2 class="post-title">
                            <?= htmlspecialchars($post->title()); ?>
                        </h2>
                    <p class="post-subtitle">
                        <?=
                        nl2br($post->getPreview());
                        ?>
                    </p>
                    </a>
                    <div class="flex-space post-meta">

                        <em>

                            <span><?=$comment_manager->getNumberOfComments($post->id())?> commentaire<?php 

                            if($comment_manager->getNumberOfComments($post->id())>1){echo 's';}?></span></em>

                            <em>le <?= $post->creation_date()?></em>

                        </div>

                    </div>
                    <br>
                    <hr>
                    <?php
                } 
                ?>
            </div>
        </div>
    </div>
</div>