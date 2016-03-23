<?php require(VIEW_ROOT . '../templates/header.php'); 

		if(isset($errors) && count($errors) > 0) {
			echo "<div class=\"error\">";
			echo "<b>The following errors occured:</b>";
			echo "<ul>";
			foreach ($errors as $error) {
				echo "<li>$error</li>";
			}
			echo "</ul>";
			echo "</div>";
		}	
	?>	
	<h2><?php echo $title; ?></h2>
	<h5>Fields marked with a <span class="red">*</span> (red astrix) are required.</h5>
	<form action="add.php" enctype="multipart/form-data" method="POST" autocomplete="off">
		<label for="name" class="bold"> 
			Name <span class="red">*</span>
			<input type="text" name="name" id="name" value="<?php if(isset($_POST['name'])) echo escape($_POST['name']); ?>" required />
		</label>
		<label for="date" class="bold"> 
			Date of Birth <span class="red">*</span> <br/>
			<input type="date" name="date" id="date" value="<?php if(isset($_POST['date'])) echo $_POST['date']; ?>" required /><br/>
		</label>
		<label for="type" class="bold"> 
			Type <span class="red">*</span>
			<input type="text" name="type" id="type" value="<?php if(isset($_POST['type'])) echo escape($_POST['type']); ?>" required />
		</label>	
		<label for="breed" class="bold"> 
			Breed
			<input type="text" name="breed" id="breed" value="<?php if(isset($_POST['breed'])) echo escape($_POST['breed']); ?>" />
		</label>				
		<label for="desc" class="bold"> 
			Description <span class="red">*</span>
			<textarea name="desc" id="desc" cols="30" rows="10"/ required><?php if(isset($_POST['desc'])) echo escape($_POST['desc']); ?></textarea>
		</label>
		<label for="photo" class="bold"> 
			Photo <span class="red">*</span> <span class="small">(only jpg/png/gif are allowed)</span>
			<input type="file" name="photo" id="photo" required/>
		</label>	
		<input type="hidden" name="submitted" value="true"/>		
		<input type="submit" value="Submit"/>	
	</form>

<?php require(VIEW_ROOT . '../templates/footer.php'); ?>