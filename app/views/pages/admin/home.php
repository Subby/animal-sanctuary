<?php require(VIEW_ROOT . '../templates/header_admin.php');  ?>
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/stupidtable.js"></script>
<script type="text/javascript">    
	$(function(){
	        $("table").stupidtable();
	    });
</script>
	<?php if($requests): ?>
		<p>Click on the table headers to sort. Approving a adoption request where there are other requests for the same animal will automatically deny all other requests.</p>
		<table class="center simpleTable">
			<thead>
				<tr>
					<th data-sort="int">ID</th>
					<th data-sort="string">Animal Name</th>
					<th data-sort="string">Made By</th>
					<th data-sort="string">Status</th>
					<th>Approve/Deny</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($requests as $request): ?>
					<tr>
					<td><?php echo $request['adoptionID'];?></td>
					<td><a href="../view.php?id=<?php echo $request['animalID'];?>"><?php echo $request['name'];?></a></td>
					<td><?php echo $request['username'];?></td>
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
					<td><a href="adoptions.php?id=<?php echo $request['adoptionID'];?>&amp;m=1&amp;aid=<?php echo $request['adoptionID'];?>&amp;uid=<?php echo $request['userID'];?>">Approve</a> <a href="adoptions.php?id=<?php echo $request['adoptionID'];?>&amp;m=2&amp;aid=<?php echo $request['adoptionID'];?>&amp;uid=<?php echo $request['userID'];?>">Deny</a></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>		
	<?php else: ?>
		<p>There are currently no adoption requests.</p>
	<?php endif; ?>		

	<?php if($animals): ?>
		<h2>Available animals for adoption</h2>
		<p>Click on the table headers to sort.</p>
		<table class="center simpleTable">
			<thead>
				<tr>
					<th data-sort="string">Name</th>
					<th data-sort="int">Age</th>
					<th data-sort="string">Type</th>
					<th data-sort="string">Breed</th>
					<th>Image</th>
					<th>Edit</th>
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
					<td><a href="edit.php?id=<?php echo $animal['animalID']; ?>">Edit</a></td>

				</tr>
			<?php endforeach; ?>	
			</tbody>

		</table>
	<?php else: ?>
		<p>No animals found, sorry.</p>
	<?php endif; ?>	
<?php require(VIEW_ROOT . '../templates/footer.php'); ?>