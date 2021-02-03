<?php
error_reporting(-1);
require_once 'connect.php';
require_once 'funcs.php';

//проверяем есть ли что на удаление
if(!empty($_GET)){

    del_mess();

}
// проверяем есть ли что на запись
if(!empty($_POST)){
	save_mess();
	header("Location: {$_SERVER['PHP_SELF']}");
	exit;
}
//получаем массив всех сообщений
$messages = get_mess();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Гостевая книга</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
	<h1>Оставте сообщение</h1>
    <form action="index.php" method="post" >
		<p>
			<label for="name">Имя:</label><br>
			<input type="text" name="name" id="name" placeholder="Введите Имя" class="form-control" maxlength="100">
		</p>
		<p>
			<label for="text">Текст:</label><br>
			<textarea name="text" id="text" placeholder="Введите сообщение" class="form-control" maxlength="500"></textarea>
		</p>
		<button type="submit" class="btn btn-success">Написать</button>
	</form>
</div>
	<hr>


	<?php
    if(!empty($messages)):
		 foreach($messages as $message):
			echo "<div class=\"alert alert-info\"> ";
			echo "<p>Автор: " . htmlspecialchars($message['name']) . " <br> Дата: {$message['time']}</p>";
			echo "<div>" . nl2br(htmlspecialchars($message['message'])) . "</div>";
			echo "<a href='index.php?del={$message['id']}'> <buttone type=\"submit\" class=\"btn btn-danger\">Удалить</buttone></a></div>";
		endforeach;
	 endif;
	 ?>


</body>
</html>