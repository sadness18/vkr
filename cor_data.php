<?php
require_once 'include/database.php';
require_once 'include/functions.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>vkr</title>
  <meta http-equiv = "Content-Type" content = "text/html; charset = UTF-8" />
	<link rel = "stylesheet" type = "text/css" href = "style.css" />
</head>
<body>
  <div class = "bor"> <!-- block top menu -->
		<a href = "index.php">
			<div class = "menu">Внести данные</div>
		</a>
		<a href = "get_data.php">
			<div class = "menu">Получить данные</div>
		</a>
		<a href = "cor_data.php">
			<div class = "menu_in">Изменить данные</div>
		</a>
    <a href = "Make_report.php">
			<div class = "menu">Построить отчёт</div>
		</a>
	</div>
  <form name = "cor_data_form" id = "cor_data_form" action = "index.php" method = "post" enctype = "multipart/form-data">
    <div style = "margin-bottom: 5px;">
      <?php echo "Изменить данные за период: " ?>
      C <input type = "date" name = "first_date_cor" id = "first_date_cor" />
      По <input type = "date" name = "second_date_cor" id = "second_date_cor" />
    </div>
    <input type = "submit" name = "cor_data" id = "cor_data" value = "Применить" style = "font-size: 1.0em; padding-bottom: 2px;" /> <!-- Кнопка "Применить" -->
  </form>
</body>
</html>
