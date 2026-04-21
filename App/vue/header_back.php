<header class="fondVertSombre">
	<picture>
		<a href="
		 <?php if (!empty($_SESSION['user']) && ($_SESSION['user']->get('role') > 2)): ?>
		?path=backoffice_accueil
		<?php else: ?> 
		?path=backoffice				
		<?php endif ?> "><img src="./public/img/happy-craby-backless.png" alt="Logo crabe"></a>
	</picture>
	<h2>Le Crabe Migrateur</h2>

	<?php
	if (isset($_SESSION['message'])): ?>

		<p><?= $_SESSION['message'] ?></p>
		<?= $_SESSION['message'] = null ?>

	<?php endif; ?>

	<div class="connect ">
		<?php if (isset($_SESSION["user"])): ?>
			<a href="?path=logout_back">Se déconnecter</a>
		<?php endif; ?>
	</div>
</header>