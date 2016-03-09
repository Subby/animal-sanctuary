<?php require(VIEW_ROOT . '../templates/header.php'); ?>
	<?php if($animal): ?>
		<h2><?php echo escape($animal['name']); ?></h2>
		<p><?php echo escape($animal['description']); ?></p>
		<p><img src="images/<?php echo $animal['photo']; ?>" width="100" height="100"/></p>
		<p class="faded">
			Created on <?php echo $animal['dateofbirth']; ?>
			Type <?php echo $animal['type']; ?>
		</p>
	<?php else: ?>
		<p>No animal found, sorry.</p>
	<?php endif; ?>

<?php require(VIEW_ROOT . '../templates/footer.php'); ?>