<!DOCTYPE html>
<html lang="fr">

<head>
	<?php require VUE . '/head.php' ?>
</head>

<body>
	<?php require VUE . '/interactiveMessage.php' ?>
	<?php require VUE . '/header_back.php' ?>
	<main>
		<!-- <?php require VUE . '/navbar.php' ?>  -->
		<?php require $view_path ?>
	</main>

	<footer>
		<?php require VUE . '/footer.php' ?>
	</footer>
</body>

</html>