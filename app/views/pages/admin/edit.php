<?php require(VIEW_ROOT . '../templates/header.php'); ?>
	<?php if($animal): ?>
	<h2>Edit <?php echo escape($animal['name']); ?></h2>

	<form action="edit.php" enctype="multipart/form-data" method="POST" autocomplete="off">
		<label for="name" class="bold"> 
			Name
			<input type="text" name="name" id="name" value="<?php echo escape($animal['name']); ?>" required/>
		</label>
		<label for="date" class="bold"> 
			Date of Birth <br/>
			<input type="date" name="date" id="date" value="<?php echo $animal['dateofbirth']; ?>" required/><br/>
		</label>
		<label for="type" class="bold"> 
			Type
			<input type="text" name="type" id="type" value="<?php echo escape($animal['type']); ?>" required/>
		</label>			
		<label for="breed" class="bold"> 
			Breed
			<input type="text" name="breed" id="breed" value="<?php echo escape($animal['breed']); ?>" required/>
		</label>		
		<label for="desc" class="bold"> 
			Description
			<textarea name="desc" id="desc" cols="30" rows="10"/ required><?php echo escape($animal['description']); ?></textarea>
		</label>
		<label for="photo" class="bold"> 
			Photo <span class="small">(only jpg/png/gif are allowed - please note that the old photo will be lost)</span>
			<input type="file" name="photo" id="photo" />
		</label>	
		<input type="hidden" name="submitted" value="true"/>		
		<input type="submit" value="Submit"/>	
	</form>
	<?php else: ?>
		<p>No animal found, sorry.</p>
	<?php endif; ?>

<?php require(VIEW_ROOT . '../templates/footer.php'); ?>