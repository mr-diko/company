<?php
include_once "database.php";
$companyId = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

$queryComp = "SELECT * FROM tbl_company WHERE id = {$companyId}";
$queryPhone = "SELECT * FROM tbl_phone_numbers WHERE company_id = {$companyId}";
$queryAddress = "SELECT * FROM tbl_address WHERE company_id = {$companyId}";



try{
    $stmtComp = $conn->query($queryComp);
    $company = $stmtComp->fetch(PDO::FETCH_ASSOC);

    $stmtPhone = $conn->query($queryPhone);

    while($row = $stmtPhone->fetch(PDO::FETCH_ASSOC)){
        if (!empty($row['telephone']))
            $ArrPhone['telephone'][] = $row['telephone'];
            $ArrPhone['id'][] = $row['id'];
    }



    $stmtAddress = $conn->query($queryAddress);
    while($row = $stmtAddress->fetch(PDO::FETCH_ASSOC)){
        if (!empty($row['adress']))
            $arrAddress['address'][] = $row['adress'];
            $arrAddress['id'][] = $row['id'];
    }

}catch(PDOException $ex){
    echo "<br>A database error occured ".$ex->getMessage();
}


