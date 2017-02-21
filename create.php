<?php
include_once "database.php";

$companyName = "SoftGroup";
$officeAdress="Великі Підзалупки";
$creationDate=date("Y.m.d", mktime(0,0,0,03,06,1989));
$siteAdress="softgroup.com";$contactPerson="Vasya Pupkin";
$description="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia fugit officiis, suscipit perspiciatis, totam incidunt eos quaerat ad maxime quia numquam blanditiis quisquam aperiam officia minima consequatur, distinctio praesentium dolor, aspernatur sapiente possimus cupiditate. Recusandae earum error optio quidem possimus nisi sint, sed nulla nostrum voluptas voluptatibus, esse modi, magni.";

$adress = "Великі підзалупки 13 Б";

$telephone = "0342 50 50 50";


try{
    $insertIntoCompany = "INSERT INTO tbl_company (id, company_name, creation_date, site_adress, contact_person, description)
VALUES (NULL, :company_name, :creation_date, :site_address, :contact_person, :description)";
    $statement = $conn->prepare($insertIntoCompany);
    $statement->execute(array(":company_name"=> $companyName,":creation_date"=>$creationDate, ":site_address"=>$siteAdress, ":contact_person"=>$contactPerson, ":description"=>$description));
    $companyId =  $conn->lastInsertId();

    $insertIntoTbladdress = "INSERT INTO tbl_address(id, company_id, adress)
                                              VALUES (NUll, :company_id, :adress)";
    $statement = $conn->prepare($insertIntoTbladdress);
    $statement->execute(array(":company_id"=>$companyId, ":adress"=>$adress));

    $insertIntoPhoneNumbers = "INSERT INTO tbl_phone_numbers(id, company_id, telephone)
                                              VALUES (NUll, :company_id, :telephone)";
    $statement = $conn->prepare($insertIntoPhoneNumbers);
    $statement->execute(array(":company_id"=>$companyId, ":telephone"=>$telephone));
}catch (PDOException $ex){
    echo "<br>A database error occurred ".$ex->getMessage();
}
