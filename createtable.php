<?php
include_once "database.php";

$tableCompany = "CREATE TABLE IF NOT EXISTS `tbl_company` (
                      `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                      `company_name` VARCHAR(45) NOT NULL,
                      `creation_date` DATE NOT NULL,
                      `site_adress` VARCHAR(45) NOT NULL,
                      `contact_person` VARCHAR(45) NOT NULL,
                      `description` TEXT NOT NULL,
                      PRIMARY KEY (`id`),
                      UNIQUE INDEX `id_UNIQUE` (`id` ASC))
                    ENGINE = InnoDB
                    DEFAULT CHARACTER SET = utf8";
$tableAddress = "CREATE TABLE IF NOT EXISTS `tbl_address` (
                  `id` INT NOT NULL AUTO_INCREMENT,
                  `company_id` INT UNSIGNED NOT NULL,
                  `adress` VARCHAR(45) NOT NULL,
                  PRIMARY KEY (`id`),
                  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
                  INDEX `fk_tbl_address_1_idx` (`company_id` ASC),
                  CONSTRAINT `fk_tbl_address_1`
                    FOREIGN KEY (`company_id`)
                    REFERENCES `tbl_company` (`id`)
                    ON DELETE CASCADE
                    ON UPDATE NO ACTION)
                ENGINE = InnoDB
                DEFAULT CHARACTER SET = utf8";
$tablePhoneNumbers = "CREATE TABLE IF NOT EXISTS `tbl_phone_numbers` (
                      `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                      `company_id` INT UNSIGNED NOT NULL,
                      `telephone` VARCHAR(45) NOT NULL,
                      PRIMARY KEY (`id`),
                      UNIQUE INDEX `id_UNIQUE` (`id` ASC),
                      INDEX `fk_tbl_phone_numbers_1_idx` (`company_id` ASC),
                      CONSTRAINT `fk_tbl_phone_numbers_1`
                        FOREIGN KEY (`company_id`)
                        REFERENCES `tbl_company` (`id`)
                        ON DELETE CASCADE
                        ON UPDATE CASCADE)
                    ENGINE = InnoDB
                    DEFAULT CHARACTER SET = utf8";

try{
    $conn->query($tableCompany);
    $conn->query($tableAddress);
    $conn->query($tablePhoneNumbers);

    echo "<br>Tables created";
}catch(PDOException $ex){
    echo "<br>A database error occurred ".$ex->getMessage();
}