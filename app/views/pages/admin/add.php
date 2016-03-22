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

	<form action="add.php" enctype="multipart/form-data" method="POST" autocomplete="off">
		<label for="name" class="bold"> 
			Name
			<input type="text" name="name" id="name" value="<?php if(isset($_POST['name'])) echo escape($_POST['name']); ?>" required />
		</label>
		<label for="date" class="bold"> 
			Date of Birth <br/>
			<input type="date" name="date" id="date" value="<?php if(isset($_POST['date'])) echo $_POST['date']; ?>" required /><br/>
		</label>
		<label for="type" class="bold"> 
			Type
			<input type="text" name="type" id="type" value="<?php if(isset($_POST['type'])) echo escape($_POST['type']); ?>" required />
		</label>			
		<label for="desc" class="bold"> 
			Description
			<textarea name="desc" id="desc" cols="30" rows="10"/><?php if(isset($_POST['desc'])) echo escape($_POST['desc']); ?></textarea>
		</label>
		<label for="photo" class="bold"> 
			Photo <span class="small">(only jpg/png/gif are allowed)</span>
			<input type="file" name="photo" id="photo" required/>
		</label>	
		<input type="hidden" name="submitted" value="true"/>		
		<input type="submit" value="Submit"/>	
	</form>

<?php require(VIEW_ROOT . '../templates/footer.php'); ?>