<?php
    include_once "read.php";

    function inputList(array $arr, $mark) {
        foreach($arr[$mark] as $val){
            $input .= "<input type='text' name='{$mark}[]' value=\"$val\">";
        }

        return $input;
    }

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>
    <style>
        td {
            vertical-align: top;
        }
    </style>
</head>
<body>
<form action="update.php?<?php echo "id={$companyId}"; ?>" method="post">
    <table>
        <tr>
            <td>Назва компанії</td>
            <td><input type="text" name="companyName" value="<?php echo $company['company_name'] ?>"></td>
        </tr>
        <tr>
            <td>Дата створення</td>
            <td><input type="date" name="creationDate" value="<?php echo $company['creation_date'] ?>"></td>
        </tr>
        <tr>
            <td>Адреса сайту</td>
            <td><input type="text" name="siteAddress" value="<?php echo $company['site_adress'] ?>"></td>
        </tr>
        <tr>
            <td>Імя контактної особи</td>
            <td><input type="text" name="contactPerson" value="<?php echo $company['contact_person'] ?>"></td>
        </tr>
        <tr>
            <td>Адреса офісу <a href="#"</td>
            <td><?php echo inputList($arrAddress, "address"); ?></td>
        </tr>
        <tr>
            <td>Номер телефону</td>
            <td><?php echo inputList($ArrPhone, "telephone"); ?></td>
        </tr>
        <tr>
            <td>Опис діяльності</td>
            <td><textarea name="description" cols="30" rows="10"><?php echo $company['description'] ?></textarea></td>
        </tr>
        <tr>
            <td>
                <?php
                    foreach ($arrAddress['id'] as $id){
                        echo "<input type='hidden' name='addressId[]' value='$id'>";
                    }
                ?>
            </td>
            <td>
                <?php
                    foreach ($ArrPhone['id'] as $id){
                        echo "<input type='hidden' name='phoneId[]' value='$id'>";
                    }
                ?>
            </td>
        </tr>
    </table>
    <input type="submit" value="Відправити">
    <p><a href="index.php"><На головну</a></p>

</form>
</body>
</html>

