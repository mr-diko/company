<?php
include "read.php";

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
    "addressId" => [
        "filter" => FILTER_SANITIZE_STRING,
        'flags'  => FILTER_REQUIRE_ARRAY,
    ],
    "telephone" => [
        "filter" => FILTER_SANITIZE_STRING,
        'flags'  => FILTER_REQUIRE_ARRAY,
    ],
    "phoneId" => [
        "filter" => FILTER_SANITIZE_NUMBER_INT,
        'flags'  => FILTER_REQUIRE_ARRAY,
    ]
];

$companyId = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
$checkedInputs = filter_input_array(INPUT_POST, $args);

try{
    $updateQueryComp = "UPDATE tbl_company SET
                    company_name = :company_name,
                    creation_date = :creation_date,
                    site_adress = :site_address,
                    contact_person = :contact_person,
                    description = :description
                    WHERE id = :id
    ";
    $statement = $conn->prepare($updateQueryComp);
    $statement->execute(array(
        ":company_name"=> $checkedInputs['companyName'],
        ":creation_date"=>$checkedInputs['creationDate'],
        ":site_address"=>$checkedInputs['siteAddress'],
        ":contact_person"=>$checkedInputs['contactPerson'],
        ":description"=>$checkedInputs['description'],
        ":id"=>$companyId
    ));


    $updateQueryPhone = " UPDATE tbl_phone_numbers SET
                    telephone = :telephone
                    WHERE id = :id
    ";
    $statement = $conn->prepare($updateQueryPhone);
    foreach ($checkedInputs['telephone'] as $key => $val){
        $statement->bindParam(":telephone", $val);
        $statement->bindParam(":id", $checkedInputs['phoneId'][$key]);

        $statement->execute();
    }

    $updateQueryAddress = " UPDATE tbl_address SET
                    adress = :address
                    WHERE id = :id
    ";
    $statement = $conn->prepare($updateQueryAddress);
    foreach ($checkedInputs['address'] as $key => $val){
        $statement->bindParam(":address", $val);
        $statement->bindParam(":id", $checkedInputs['addressId'][$key]);

        $statement->execute();
    }

    echo "Всьо апдейтнулось. Повернутись на <a href='index.php'>головну</a>.";


}catch (PDOException $ex){
    echo "<br>A database error occurred ".$ex->getMessage();
}