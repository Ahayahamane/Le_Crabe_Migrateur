<!DOCTYPE html>
<html lang="fr">
	
	<head>
		<?php require VUE . '/head.php' ?>
	</head>
	<body>
        <?php require VUE . '/header.php' ?>
		<main>
			<?php require VUE . '/navbar.php' ?> 
			<?php require $view_path ?>
		</main>
        <?php require VUE . '/footer.php' ?>
	</body>
</html>