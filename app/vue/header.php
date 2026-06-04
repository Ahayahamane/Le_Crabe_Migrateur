<header class="fondVertSombre">
	<picture>
		<a href="?path=accueil"><img src="./public/img/happy-craby-backless.png" alt="Logo crabe"></a>
	</picture>
	<h1>Le Crabe Migrateur</h1>
	
	<div class="connect ">
		<?php if (!isset($_SESSION["user"])): ?>
			<a href="?path=first_login">Se connecter</a>
		<?php else: ?>
			<a href="?path=account">Mon compte</a>
		<?php endif; ?>
	</div>
</header>