<?php require(VIEW_ROOT . '/templates/header.php'); ?>

	<h2>Edit Page</h2>

	<form action="<?php echo BASE_URL; ?>/admin/edit.php" method="POST" autocomplete="off">
		<label for="title"> 
			Title
			<input type="text" name="title" id="title" value="<?php echo escape($page['title']); ?>"/>
		</label>
		<label for="label"> 
			Label
			<input type="text" name="label" id="label" value="<?php echo escape($page['label']); ?>"/>
		</label>
		<label for="slug"> 
			Slug
			<input type="text" name="slug" id="slug" value="<?php echo escape($page['slug']); ?>"/>
		</label>	
		<label for="body"> 
			Body
			<textarea name="body" id="body" cols="30" rows="10"/><?php echo escape($page['body']); ?></textarea>
		</label>		

		<input type="hidden" name="id" value="<?php echo escape($page['id']);?>"/>
		<input type="submit" value="Submit"/>	
	</form>

<?php require(VIEW_ROOT . '/templates/footer.php'); ?>