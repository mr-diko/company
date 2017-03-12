<?php require VIEW_ROOT . '/templates/header.php'; ?>

	<?php if (!$tbl_company): ?>
    <p>No page found, sory.</p>
<?php else: ?>

    <h2><?php echo $tbl_company['company_name']; ?></h2>
    <ul>
        <li>Дата створення: <?php echo $tbl_company['creation_date']->format('d.m.Y'); ?></li>
        <li>Телефон: <?php echo get_phone_numbers($tbl_phone_numbers);?></li>
        <li>Адрес: <?php echo get_addresses($tbl_address);?></li>
        <li>Контактна особа: <?php echo $tbl_company['contact_person']?></li>
    </ul>

    <p style="clear: left"><?php echo $tbl_company['description']; ?></p>


<?php endif; ?>

<?php require VIEW_ROOT . '/templates/footer.php'; ?>