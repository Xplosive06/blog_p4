<div id="posts" class="tab-pane fade">
					<h2>Tous les articles</h2>
					<?php 

					foreach ($posts as $key => $post) {

						?>
						<div class="bordering-comment">

							<p>
								<p><strong>Titre : </strong><?= htmlspecialchars($post->title()); ?></p>
								<em><strong>le</strong> <?= $post->creation_date()?></em>
							</p>

							<p><strong>Contenu :</strong>
								<?=
								nl2br(($post->content()));
								?>
							</p>
							<em><a href="<?php echo HOST.'post.html?get_post_id='?><?= $post->id() ?>"><?=$comment_manager->getNumberOfComments($post->id())?> commentaire<?php if($comment_manager->getNumberOfComments($post->id())>1){echo 's';}?></a></em>
							<form method="POST" action="<?php echo HOST.'delete_post.html'?>">

								<button type="submit" class="btn-danger" name="post_id" value="<?= $post->id()?>">Supprimer</button>
							</form>
						</div>
						<br>

					<?php } ?>

				</div>