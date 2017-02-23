<?php
include_once "database.php";

$selectQuery = "SELECT id, company_name FROM tbl_company";

try{
    $stmt = $conn->query($selectQuery);

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $compList .= "<li><a href='read.php?id={$row['id']}'>{$row['company_name']}</a></li>";
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
</head>
<body>
    <ul>
        <?php echo $compList; ?>
        <li><a href="form.php">+Додати компанію+</a></li>
    </ul>
</body>
</html>
