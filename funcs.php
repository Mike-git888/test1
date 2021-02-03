<?php



function save_mess() //записываем сообщение
{
	global $db;

	 $name = mysqli_real_escape_string($db, $_POST['name']);
	 $text = mysqli_real_escape_string($db, $_POST['text']);
	 $query = "INSERT INTO gbook (name, message) VALUES ('$name', '$text')";

	  mysqli_query($db, $query);
}

function get_mess()  //читаем все сообщения
{
	global $db;
	$query = "SELECT * FROM gbook ORDER BY id DESC";
	$res = mysqli_query($db, $query);
	return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

function del_mess() //удаляем выбранное сообщение
{
    global $db;
    $id=$_GET['del'];
    $query="DELETE FROM gbook WHERE id={$id}";
    mysqli_query($db, $query);

}

