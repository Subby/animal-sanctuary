<?php require(VIEW_ROOT . '../templates/header.php'); ?>
	<p>Type in the required values in the following text fields to find a matching animal</p>
	<form action="search.php" method="POST">
		<label for="name"> 
			Name
			<input type="text" name="name" id="name" value="<?php if(isset($_POST['name'])) echo escape($_POST['name']); ?>" />
		</label>	
		<label for="age"> 
			Age
			<input type="text" name="age" id="age" value="<?php if(isset($_POST['age'])) echo escape($_POST['age']); ?>" />
		</label>	
		<label for="type"> 
			Type
			<input type="text" name="type" id="type" value="<?php if(isset($_POST['type'])) echo escape($_POST['type']); ?>" />
		</label>
		<label for="breed"> 
			Breed
			<input type="text" name="breed" id="breed" value="<?php if(isset($_POST['breed'])) echo escape($_POST['breed']); ?>" />
		</label>		
		<input type="hidden" name="submitted" value="true"/>
		<input type="submit"/>
	</form>
<?php require(VIEW_ROOT . '../templates/footer.php'); ?>