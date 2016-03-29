<?php require(VIEW_ROOT . '../templates/header_admin.php');  ?>
	<?php if($animal): 
			if(isset($errors) && count($errors) > 0) {
			echo "<div class=\"error\">";
			echo "<b>The following errors occured:</b>";
			echo "<ul>";
			foreach ($errors as $error) {
				echo "<li>$error</li>";
			}
			echo "</ul>";
			echo "</div>";
		}	?>
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
			<input type="text" name="breed" id="breed" value="<?php echo escape($animal['breed']); ?>" />
		</label>		
		<label for="desc" class="bold"> 
			Description
			<textarea name="desc" id="desc" cols="30" rows="10"/ required><?php echo escape($animal['description']); ?></textarea>
		</label>
		<label for="photo" class="bold"> 
			Photo <span class="small">(only jpg/png/gif are allowed - please note that the old photo will be lost if you choose to upload a new one)</span>
			<input type="file" name="photo" id="photo" />
		</label>	
		<input type="hidden" name="submitted" value="true"/>		
		<input type="hidden" name="id" value="<?php echo $animal['animalID']; ?>"/>	
		<input type="submit" value="Submit"/>	
	</form>
	<?php else: ?>
		<p>No animal found, sorry.</p>
	<?php endif; ?>

<?php require(VIEW_ROOT . '../templates/footer.php'); ?>