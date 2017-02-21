<?php
include_once "createtable.php";

try{
    $insertIntoCompany = "INSERT INTO tbl_company (id, company_name, office_address, creation_date, site_adress, phone_number, contact_person, description) VALUES (NULL, :company_name, :office_address, :creation_date, :site_address, :phone_number, :contact_person, :description)";
    $statement = $conn->prepare($insertIntoCompany);
    $statement->execute(array(":company_id"=>$companyId, ":company_name"=> $companyName, ":office_address"=>$officeAdress, ":creation_date"=>$creationDate, ":site_address"=>$siteAdress, ":phone_number"=>$phoneNumber, ":contact_person"=>$contactPerson, ":description"=>$description));


    $insertIntoTbladdress = "INSERT INTO tbl_address(id, company_id, adress)
                    VALUES (NUll, :company_id, :adress)";
    $statement = $conn->prepare($insertIntoTbladdress);
    $statement->execute(array(":company_id"=>$companyId, ":adress"=>$adress));
}catch (PDOException $ex){
    echo "<br>A database error occurred ".$ex->getMessage();
}