<?php require(VIEW_ROOT . '../templates/header.php'); ?>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/stupidtable.js"></script>
<script type="text/javascript">    
	$(function(){
	        $("table").stupidtable();
	    });
</script>
	<?php if($requests): ?>
		<p>Click on the table headers to sort</p>
		<table class="center simpleTable">
			<thead>
				<tr>
					<th data-sort="integer">ID</th>
					<th data-sort="string">Animal Name</th>
					<th data-sort="string">Made By</th>
					<th data-sort="string">Status</th>
					<th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($requests as $request): ?>
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
				<?php endforeach; ?>
			</tbody>
		</table>		
	<?php else: ?>
		<p>There are currently no adoption requests.</p>
	<?php endif; ?>		
<?php require(VIEW_ROOT . '../templates/footer.php'); ?>