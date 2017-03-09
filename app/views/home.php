<?php require VIEW_ROOT . '/templates/header.php' ?>

<?php if(empty($pages)): ?>
    <p>Sorry, no pages at the moment.</p>
<?php else: ?>
    <ul>
        <?php foreach ($pages as $page): ?>
            <li><a href="<?php echo BASE_URL . "/page.php?page={$page['id']}" ?>"><?php echo $page['company_name']; ?></a></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php require VIEW_ROOT . '/templates/footer.php' ?>
