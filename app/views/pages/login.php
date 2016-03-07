<?php require(VIEW_ROOT . '../templates/header.php'); ?>
	<?php
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
	<form action="login.php" method="post">
		<label for="username"> 
			Name
			<input type="text" name="username" id="username"/>
		</label>		
		<label for="password"> 
			Password
			<input type="password" name="password" id="password"/>
		</label>
		<input type="submit"/>
		<input type="hidden" name="submitted" value="true"/>
	</form>

<?php require(VIEW_ROOT . '../templates/footer.php'); ?>