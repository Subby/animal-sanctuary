<?php require(VIEW_ROOT . '/templates/header.php'); ?>
	<?php if($page): ?>
		<h2><?php echo escape($page['title']); ?></h2>
		<p><?php echo escape($page['body']); ?></p>
		<p class="faded">
			Created on <?php echo $page['created']->format('jS M Y'); ?>
			<?php if ($page['updated']): ?>
				Last updated <?php echo $page['updated']->format('jS M Y'); ?>
			<?php endif; ?>
		</p>
	<?php else: ?>
		<p>No page found, sorry.</p>
	<?php endif; ?>

<?php require(VIEW_ROOT . '/templates/footer.php'); ?>