<?php
include_once "database.php";
$companyId = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

$queryComp = "SELECT * FROM tbl_company WHERE id = {$companyId}";
$queryPhone = "SELECT telephone FROM tbl_phone_numbers WHERE company_id = {$companyId}";
$queryAddress = "SELECT adress FROM tbl_address WHERE company_id = {$companyId}";



try{
    $stmtComp = $conn->query($queryComp);
    $company = $stmtComp->fetch(PDO::FETCH_ASSOC);

    $stmtPhone = $conn->query($queryPhone);
    while($row = $stmtPhone->fetch(PDO::FETCH_ASSOC)){
        $phone .= "<li>{$row['telephone']}</li>";
    }


    $stmtAddress = $conn->query($queryAddress);
    while($row = $stmtAddress->fetch(PDO::FETCH_ASSOC)){
        $address .= "<li>{$row['adress']}</li>";
    }

}catch(PDOException $ex){
    echo "<br>A database error occured ".$ex->getMessage();
}

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

