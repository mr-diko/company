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
        $ArrPhone[] = $row['telephone'];
    }



    $stmtAddress = $conn->query($queryAddress);
    while($row = $stmtAddress->fetch(PDO::FETCH_ASSOC)){
        $arrAddress[] = $row['adress'];
    }

}catch(PDOException $ex){
    echo "<br>A database error occured ".$ex->getMessage();
}


