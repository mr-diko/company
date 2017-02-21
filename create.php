<?php
include_once "database.php";
include_once "functions.php";

$args = [
    "companyName" => FILTER_SANITIZE_STRING,
    "creationDate" => FILTER_SANITIZE_NUMBER_INT,
    "siteAddress" => FILTER_SANITIZE_EMAIL,
    "contactPerson" => FILTER_SANITIZE_STRING,
    "description" => FILTER_SANITIZE_STRING,
    "address" => [
        "filter" => FILTER_SANITIZE_STRING,
        'flags'  => FILTER_REQUIRE_ARRAY,
    ],
    "telephone" => [
        "filter" => FILTER_SANITIZE_STRING,
        'flags'  => FILTER_REQUIRE_ARRAY,
    ]
];
$checkedInputs = filter_input_array(INPUT_POST, $args);

$companyName = filter_var("SoftGroup", FILTER_SANITIZE_STRING);
//$creationDate= date("Y.m.d", mktime(0,0,0,03,06,1989));
$siteAddress=filter_var("softgroup.com", FILTER_SANITIZE_ENCODED);
$contactPerson=filter_var("Vasya Pupkin", FILTER_SANITIZE_STRING);
$description="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia fugit officiis, suscipit perspiciatis, totam incidunt eos quaerat ad maxime quia numquam blanditiis quisquam aperiam officia minima consequatur, distinctio praesentium dolor, aspernatur sapiente possimus cupiditate. Recusandae earum error optio quidem possimus nisi sint, sed nulla nostrum voluptas voluptatibus, esse modi, magni.";




try{
    $insertIntoCompany = "INSERT INTO tbl_company (id, company_name, creation_date, site_adress, contact_person, description)
VALUES (NULL, :company_name, :creation_date, :site_address, :contact_person, :description)";
    $statement = $conn->prepare($insertIntoCompany);
    $statement->execute(array(":company_name"=> $checkedInputs['companyName'],":creation_date"=>$checkedInputs['creationDate'], ":site_address"=>$checkedInputs['siteAddress'], ":contact_person"=>$checkedInputs['contactPerson'], ":description"=>$checkedInputs['description']));
    $companyId =  $conn->lastInsertId();

    $insertIntoTblAddress = "INSERT INTO tbl_address(id, company_id, adress)
                                              VALUES (NUll, :company_id, :adress)";
    $statement = $conn->prepare($insertIntoTblAddress);
    foreach ($checkedInputs['address'] as $adr){
        $statement->bindParam(":company_id", $companyId);
        $statement->bindParam(":adress", $adr);
        $statement->execute();
    }

    $insertIntoPhoneNumbers = "INSERT INTO tbl_phone_numbers(id, company_id, telephone)
                                              VALUES (NUll, :company_id, :telephone)";
    $statement = $conn->prepare($insertIntoPhoneNumbers);
    foreach ($checkedInputs['telephone'] as $val){
        $statement->bindParam(":company_id",$companyId);
        $statement->bindParam(":telephone", $val);
        $statement->execute();
    }
}catch (PDOException $ex){
    echo "<br>A database error occurred ".$ex->getMessage();
}
