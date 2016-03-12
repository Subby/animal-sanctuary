<?php require(VIEW_ROOT . '../templates/header.php'); ?>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/stupidtable.js"></script>
<script type="text/javascript">    
	$(function(){
	        $("table").stupidtable();
	    });
</script>
	<?php if($animals): ?>
		<table class="center simpleTable">
			<thead>
				<tr>
					<th data-sort="string">Name</th>
					<th data-sort="date">Born</th>
					<th data-sort="string">Type</th>
					<th data-sort="string">Breed</th>
					<th>Image</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach($animals as $animal): 
			$date = date_create($animal['dateofbirth'])->format('d-m-Y');
			?>
				<tr>					
					<td><a href="view.php?id=<?php echo $animal['animalID']; ?>"><?php echo escape($animal	['name']); ?></a></td>
					<td><?php echo $date; ?></td>
					<td><?php echo escape($animal['type']); ?></td>
					<td>Lulz</td>
					<td><img src="images/<?php echo $animal['photo']; ?>" width="50" height="50"/></td>

				</tr>
			<?php endforeach; ?>	
			</tbody>

		</table>
	<?php else: ?>
		<p>No animals found, sorry.</p>
	<?php endif; ?>

<?php require(VIEW_ROOT . '../templates/footer.php'); ?>