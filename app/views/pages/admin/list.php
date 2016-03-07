<?php require(VIEW_ROOT . '/templates/header.php'); ?>
	<?php if(!empty($pages)): ?>
		<table>
		<thead> 
			<tr>
				<th>Label</th>
				<th>Title</th>
				<th>Slug</th>
				<th></th>
				<th></th>

			</tr>
		</thead>
		<tbody>
			<?php foreach($pages as $page): ?>
				<tr>
					<td><?php echo escape($page['label']); ?></td>
					<td><?php echo escape($page['title']); ?></td>
					<td><a href="<?php echo BASE_URL; ?>/page.php?page=<?php echo escape($page['slug']);?>"><?php echo escape($page['slug']);?></a></td>
					<td><a href="<?php echo BASE_URL; ?>/admin/edit.php?id=<?php echo escape($page['id']);?>">Edit</a></td>
					<td><a href="<?php echo BASE_URL; ?>/admin/delete.php?id=<?php echo escape($page['id']);?>">Delete</a></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
		</table>
	<?php else: ?>
		<p>No pages at the moment.</p>
	<?php endif; ?>		

	<a href="<?php echo BASE_URL; ?>/admin/add.php">Add new page</a>
<?php require(VIEW_ROOT . '/templates/footer.php'); ?>