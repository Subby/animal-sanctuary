<?php require(VIEW_ROOT . '../templates/header.php'); ?>

	<?php if($animals): ?>
		<table class="center">
			<thead>
			<tr>
				<td>Name</td>
				<td>Born</td>
				<td>Type</td>
				<td>Breed</td>
				<td>Image</td>
			</tr>
			</thead>
			<tbody>
			<tr>
			<?php foreach($animals as $animal): 
			$date = date_create($animal['dateofbirth'])->format('d-m-Y');
			?>
				
				<td><a href="view.php?id=<?php echo $animal['animalID']; ?>"><?php echo escape($animal['name']); ?></a></td>
				<td><?php echo $date; ?></td>
				<td><?php echo escape($animal['name']); ?></td>
				<td>Lulz</td>
				<td><img src="images/<?php echo $animal['photo']; ?>" width="50" height="50"/></td>
			</tr>
			</tbody>
			<?php endforeach; ?>
		</table>
	<?php else: ?>
		<p>No animals found, sorry.</p>
	<?php endif; ?>

<?php require(VIEW_ROOT . '../templates/footer.php'); ?>