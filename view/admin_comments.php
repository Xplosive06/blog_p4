<div id="comments" class="tab-pane panel-primary fade">
					<h2>Les commentaires signalés</h2>
					<?php 
					foreach ($posts as $key => $post) {

						$comments = $comment_manager->getList($post->id());
						foreach ($comments as $key => $comment) {
							if($comment->reports() > 0){

								?>
								<div class="post-preview bordering-comment">

									
									<div class="user_bar"><strong><?= htmlspecialchars($comment->author()) ?></strong><p> le <?= $comment->comment_date() ?></p></div>
									<p><?= nl2br(htmlspecialchars($comment->comment())) ?></p>
									<div class="text-left">
										<p>Signalé : <?= $comment->reports()?> fois</p>	
									</div>
									<div class="text-right">

										<form method="POST" action="<?php echo HOST.'delete_comment.html'?>">

											<button type="submit" class="btn btn-danger" name="comment_id" value="<?= $comment->id()?>">Supprimer</button>
										</form>
									</div>
								</div>
								<br>
							<?php }?>
						<?php }?>
					<?php } ?>
				</div>