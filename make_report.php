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
			<div class = "menu">Изменить данные</div>
		</a>
    <a href = "Make_report.php">
			<div class = "menu_in">Построить отчёт</div>
		</a>
	</div>
</body>
</html>
