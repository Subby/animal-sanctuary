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
			<input type="text" name="name" id="name"/>
		</label>
		<label for="date" class="bold"> 
			Date of Birth <br/>
			<input type="date" name="date" id="date"/><br/>
		</label>
		<label for="type" class="bold"> 
			Type
			<input type="text" name="type" id="type"/>
		</label>			
		<label for="desc" class="bold"> 
			Description
			<textarea name="desc" id="desc" cols="30" rows="10"/></textarea>
		</label>
		<label for="photo" class="bold"> 
			Photo <span class="small">(only jpg/png/gif are allowed)</span>
			<input type="file" name="photo" id="photo"/>
		</label>	
		<input type="hidden" name="submitted" value="true"/>		
		<input type="submit" value="Submit"/>	
	</form>

<?php require(VIEW_ROOT . '../templates/footer.php'); ?>