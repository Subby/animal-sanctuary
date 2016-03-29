<?php require(VIEW_ROOT . '../templates/header.php'); ?>
	<p>Type in/select the required values in the following text fields to find a matching animal</p>
	<form action="search.php" method="POST">
		<label for="name"> 
			Name
			<input type="text" name="name" id="name"/>
		</label>	
		<label for="age"> 
			Age <span class="small">(in years)</span>
			<input type="text" name="age" id="age"/>
		</label>
		<?php if(!empty($types)): ?>	

		<?php endif; ?>
		<label for="type"> 
			Type</br>
			<select name="type">
				<option value="-">-</option>			
				<?php foreach($types as $type): ?>
					<option value="<?php echo escape($type['type']); ?>"><?php echo escape($type['type']); ?></option>
				<?php endforeach; ?>
			</select>
			</br>
			</br>
		</label>
		<label for="breed"> 
			Breed
			<input type="text" name="breed" id="breed" />
		</label>		
		<input type="hidden" name="submitted" value="true"/>
		<input type="submit"/>
	</form>
<?php require(VIEW_ROOT . '../templates/footer.php'); ?>