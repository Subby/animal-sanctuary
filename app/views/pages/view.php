<?php require(VIEW_ROOT . '../templates/header.php'); ?>
	<?php if($animal): 
		$date = date_create($animal['dateofbirth'])->format('d-m-Y');
	?>
		<h2><?php echo escape($animal['name']); ?></h2>
		<p><?php echo escape($animal['description']); ?></p>
		<p><img src="images/<?php echo $animal['photo']; ?>" width="100" height="100"/></p>
		<p class="faded"><span class="bold">Born: </span><?php echo $date; ?></p>
		<p class="faded"><span class="bold">Type: </span><?php echo escape($animal['type']); ?></p>
		<p class="faded"><span class="bold">Breed: </span><?php echo escape($animal['breed']); ?></p>
	<?php else: ?>
		<p>No animal found, sorry.</p>
	<?php endif; ?>

<?php require(VIEW_ROOT . '../templates/footer.php'); ?>