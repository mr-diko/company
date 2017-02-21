<?php
define("DSN", "mysql:host=localhost;dbname=company");
define("USERNAME", "root");
define("PASSWORD", "root");
$options = array(PDO::ATTR_PERSISTENT => true);

try{
    $conn = new PDO(DSN, USERNAME, PASSWORD, $options);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "connecting successful";

}catch (PDOException $ex){
    echo "A database error occurred ".$ex->getMessage();
}