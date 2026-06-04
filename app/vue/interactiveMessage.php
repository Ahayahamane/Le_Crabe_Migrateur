<?php
	if (isset($_SESSION['message'])):
		if (!empty($_SESSION['message'])): ?>
			<div id="notification-popup" class="notification-popup">
				<span><?php echo $_SESSION['message'] ?></span>
			</div>

	<?php $_SESSION['message'] = null;
    endif;
	endif; ?>