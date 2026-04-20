<header class="fondVertSombre">
	<picture>
		<img src="./public/img/happy-craby-backless.png" alt="Logo crabe">
	</picture>
	<h2>Le Crabe Migrateur</h2>
	<?php
	if (isset($_SESSION['message'])): ?>

		<p><?= $_SESSION['message'] ?></p>
		<?= $_SESSION['message'] = null ?>

	<?php endif; ?>
	<div class="connect ">
		<?php if (!isset($_SESSION["user"])): ?>
			<a href="?path=first_login">Se connecter</a>
		<?php else: ?>
			<a href="?path=account">Mon compte</a>
		<?php endif; ?>
	</div>
</header>