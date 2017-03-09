<?php require VIEW_ROOT . '/templates/header.php'; ?>

	<?php if (!$page): ?>
    <p>No page found, sory.</p>
<?php else: ?>

    <h2><?php echo $page['company_name']; ?></h2>

    <?php echo $page['description']; ?>
<!---->
<!--    <p class="faded">-->
<!--        Created on --><?php //echo $page['created']->format('d m Y'); ?>
<!--        --><?php //if($page['updated']): ?>
<!--            Last updated --><?php //echo $page['updated']->format('d m Y'); ?>
<!--        --><?php //endif; ?>
<!--    </p>-->

<?php endif; ?>

<?php require VIEW_ROOT . '/templates/footer.php'; ?>