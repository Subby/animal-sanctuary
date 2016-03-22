<?php require(VIEW_ROOT . '../templates/header.php'); ?>

	<h2>Edit <?php echo escape($animal['name']); ?></h2>

	<form action="add.php" enctype="multipart/form-data" method="POST" autocomplete="off">
		<label for="name" class="bold"> 
			Name
			<input type="text" name="name" id="name" value="<?php echo escape($animal['name']); ?>" required />
		</label>
		<label for="date" class="bold"> 
			Date of Birth <br/>
			<input type="date" name="date" id="date" value="<?php echo $animal['dateofbirth']; ?>" required /><br/>
		</label>
		<label for="type" class="bold"> 
			Type
			<input type="text" name="type" id="type" value="<?php echo escape($animal['type']); ?>" required />
		</label>			
		<label for="desc" class="bold"> 
			Description
			<textarea name="desc" id="desc" cols="30" rows="10"/><?php echo escape($animal['description']); ?></textarea>
		</label>
		<label for="photo" class="bold"> 
			Photo <span class="small">(only jpg/png/gif are allowed)</span>
			<input type="file" name="photo" id="photo" required/>
		</label>	
		<input type="hidden" name="submitted" value="true"/>		
		<input type="submit" value="Submit"/>	
	</form>

<?php require(VIEW_ROOT . '../templates/footer.php'); ?>