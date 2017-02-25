<?php
include_once "database.php";
if (in_array("", $_POST)) {
    header("Location: form.php?warning=1");
    die();
}

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
