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
<?php if($_GET['warning']) echo "<p style='color: red;'>Заповніть всі поля</p>"; ?>
<form action="create.php" method="post">
    <table>
        <tr>
            <td>Назва компанії</td>
            <td><input type="text" name="companyName"></td>
        </tr>
        <tr>
            <td>Дата створення</td>
            <td><input type="date" name="creationDate"></td>
        </tr>
        <tr>
            <td>Адреса сайту</td>
            <td><input type="text" name="siteAddress"></td>
        </tr>
        <tr>
            <td>Імя контактної особи</td>
            <td><input type="text" name="contactPerson"></td>
        </tr>
        <tr>
            <td>Адреса офісу <a href="#" class="add-input">додати ще одну адресу</a></td>
            <td class="input-cell"><input type="text" name="address[]"></td>
        </tr>
        <tr>
            <td>Номер телефону <a href="#" class="add-input">додати ще один номер телефону</a></td>
            <td class="input-cell"><input type="text" name="telephone[]"></td>
        </tr>
        <tr>
            <td>Опис діяльності</td>
            <td><textarea name="description" cols="30" rows="10"></textarea></td>
        </tr>
    </table>
    <input type="submit" value="Відправити">
</form>
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script>
$(function() {
  function cloneInput($input) {
    return $input.clone().val('');
  }

  $('.add-input').on('click', function() {
    var $inputContainer = $(this).closest('tr').find('.input-cell');
    var $newInput = cloneInput($inputContainer.find('input').first());

    $inputContainer.append($('<br />')).append($newInput);
  });
});
</script>
</body>
</html>
