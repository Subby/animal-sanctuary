<?php require(VIEW_ROOT . '../templates/header.php'); ?>
	<?php if($animal): ?>
		<p>You have chosen to adopt <a href="view.php?id=<?php echo $animal['animalID']; ?>"><?php echo escape($animal['name']); ?></a>.</p>
		<p>Clicking the submit button below will activate an adoption request which will be reviewed by an administrator. You can track all of your requests using the <a href="index.php">home page.</a></p>
		<form action="adopt.php" method="POST">
			<input type="submit" value="Submit Request"/>
			<input type="hidden" name="id" value="<?php echo $animal['animalID']; ?>"/>
			<input type="hidden" name="submitted" value="true"/>
		</form>
	<?php else: ?>
		<p>Sorry no animal found or that animal is not available for adoption.</p>
	<?php endif; ?>

<?php require(VIEW_ROOT . '../templates/footer.php'); ?>