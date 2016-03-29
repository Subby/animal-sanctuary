<?php require(VIEW_ROOT . '../templates/header.php'); ?>
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/stupidtable.js"></script>
<script type="text/javascript">    
	$(function(){
	        $("table").stupidtable();
	    });
</script>
	<?php if($animals): ?>
		<h2>All animals</h2>
		<p>Click on the table headers to sort.</p>
		<table class="center simpleTable">
			<thead>
				<tr>
					<th data-sort="string">Name</th>
					<th data-sort="int">Age</th>
					<th data-sort="string">Type</th>
					<th data-sort="string">Breed</th>
					<th>Image</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach($animals as $animal): 
			$date = date_create($animal['dateofbirth']);
			$date_now = new DateTime();
			$age = $date_now->diff($date);
			?>
				<tr>					
					<td><a href="../view.php?id=<?php echo $animal['animalID']; ?>"><?php echo escape($animal	['name']); ?></a></td>
					<td data-sort-value="<?php echo $date->format('U')?>"><?php echo $age->format('%y year(s) %m month(s)'); ?></td>
					<td><?php echo escape($animal['type']); ?></td>
					<td><?php echo escape($animal['breed']); ?></td>
					<td><img src="../images/<?php echo $animal['photo']; ?>" width="50" height="50"/></td>

				</tr>
			<?php endforeach; ?>	
			</tbody>

		</table>
	<?php else: ?>
		<p>No animals found, sorry.</p>
	<?php endif; ?>

	<?php if($owned_animals): ?>
		<h2>All owned animals</h2>	
		<p>Click on the table headers to sort.</p>
		<table class="center simpleTable">
			<thead>
				<tr>
					<th data-sort="string">Name</th>
					<th data-sort="string">Owned By</th>
					<th>Image</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach($owned_animals as $animal): ?>
				<tr>					
					<td><a href="../view.php?id=<?php echo $animal['animalID']; ?>"><?php echo escape($animal['name']); ?></a></td>
					<td><?php echo escape($animal['username']); ?></td>
					<td><img src="../images/<?php echo $animal['photo']; ?>" width="50" height="50"/></td>
				</tr>
			<?php endforeach; ?>	
			</tbody>

		</table>
	<?php else: ?>
		<p>No animals found, sorry.</p>
	<?php endif; ?>	

<?php require(VIEW_ROOT . '../templates/footer.php'); ?>