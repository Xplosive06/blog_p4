<div id="users" class="tab-pane panel-primary fade">
					<h2>Tous les utilisateurs</h2>
					<?php 
					foreach ($users as $key => $ad_user) {

						?>
						<div class="post-preview bordering-comment">

							<div class="user_bar"><div><p>Id : <strong><?= $ad_user->id()?></strong></p></div>
							<strong><?= $ad_user->nickname()?></strong> 
						</div>
						<div><p>Créé le : <?= $ad_user->creation_date()?></p></div>

						<form method="POST" action="<?php echo HOST.'delete_user.html'?>">

							<button type="submit" class="btn-danger" name="user_nickname" value="<?= $ad_user->nickname()?>">Supprimer</button>
						</form>
					</div>
					<br>

				<?php } ?>
			</div>