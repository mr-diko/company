<?php
include_once "read.php";

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1><?php echo $company['company_name'] ?></h1>
<p><?php echo $company['site_adress'] ?></p>
<p>Телефон</p>
<ul>
    <?php echo $phone; ?>
</ul>
<p>Адреса офісу</p>
<ul>
    <?php echo $address; ?>
</ul>
<p>Контактна особа: <?php echo $company['contact_person'] ?></p>
<p>Дата створення: <?php echo $company['creation_date'] ?></p>
<p><?php echo $company['description'] ?></p>
<p><a href="index.php"><На головну</a></p>
</body>
</html>