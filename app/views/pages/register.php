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
	<form action="register.php" method="post">
		<label for="username"> 
			Username <span class="small">(12 characters or less)</span>
			<input type="text" name="username" id="username" value="<?php if(isset($_POST['username'])) echo escape($_POST['username']); ?>" required />
		</label>		
		<label for="password"> 
			Password <span class="small">(6 characters or more)</span>
			<input type="password" name="password" id="password" required />
		</label>			
		<input type="submit"/>
		<input type="hidden" name="submitted" value="true"/>
	</form>

<?php require(VIEW_ROOT . '../templates/footer.php'); ?>