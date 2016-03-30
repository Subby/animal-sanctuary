<?php require(VIEW_ROOT . '../templates/header.php'); ?>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/stupidtable.js"></script>
<script type="text/javascript">    
	$(function(){
	        $("table").stupidtable();
	    });
</script>	
	<p>Hello and welcome to the animal sanctuary website.</p>
	<?php if($owns_assoc): ?>
		<p>Below are all the animals you own <span class="small">(click on the table headers to sort)</span>:</p>
		<table class="center simpleTable">
			<thead>
				<tr>
					<th data-sort="string">Name</th>
					<th data-sort="int">Age</th>
					<th>Image</th>
				</tr>
			</thead>	
			<tbody>
			<?php foreach($owns_assoc as $animal): 
			$date = date_create($animal['dateofbirth']);
			$date_now = new DateTime();
			$age = $date_now->diff($date);
			?>
				<tr>
					<td><a href="view.php?id=<?php echo $animal['animalID']; ?>"><?php echo escape($animal['name']); ?></a></td>
					<td data-sort-value="<?php echo $date->format('U')?>"><?php echo $age->format('%y year(s) %m month(s)'); ?></td>
					<td><img src="images/<?php echo $animal['photo']; ?>" width="50" height="50"/></td>
				</tr>
			<?php endforeach; ?>
			</tbody>	
		</table>
	<?php else: ?>
		<p>You have no owned animals.</p>
	<?php endif; ?>

	<?php if($requests_assoc): ?>
		<p>Below are all the adoption requests you have submitted <span class="small">(click on the table headers to sort)</span>:</p>
			<table class="center simpleTable">
			<thead>
				<tr>
					<th data-sort="string">Name</th>
					<th data-sort="string">Approval Status</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($requests_assoc as $request): ?>
					<tr>
						<td><a href="view.php?id=<?php echo $request['animalID'];?>"><?php echo escape($request['name']);?></a></td>
						<td><?php 
						if($request['approved'] == 1) {
							echo "Approved";
						} else if($request['approved'] == 2) {
							echo "Denied";
						} else {
							echo "Unchecked";
						}
						?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
			</table>
		<?php else: ?>
			<p>You have no adoption requests.</p>
	<?php endif; ?>			


<?php require(VIEW_ROOT . '../templates/footer.php'); ?>