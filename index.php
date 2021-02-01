<?php
    require_once 'include/database.php';
    require_once 'include/functions.php';

    if(isset($_POST["add_file"])) // при нажатии кнопки add_file (Применить) вызываем функцию переноса выбранных файлов на сервер
        $res = get_files_on_server($link);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
    <title>vkr</title>
</head>

<body>
    <header>
        <a href="#">Внести данные</a>
        <a href="#">Получить данные</a>
        <a href="#">Изменить данные</a>
        <a href="#">Построить отчет</a>
    </header>
    <main>
        <form action="" name="add_data_form" id="add_data_form" enctype="multipart/form-data" method="post">
            <input type="file" name="select_file[]" id="select_file" multiple accept="application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" />
            <br>
            <input type="submit" , name="add_file" id="add_file" value="Применить">
        </form>
        <?php
            echo("Ячейка массива res: ".trim($res[0][3][2]));
        ?>
    </main>
</body>

</html>
