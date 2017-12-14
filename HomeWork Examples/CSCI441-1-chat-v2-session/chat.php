<?php

require("common.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	newChat();
}
elseif($_SERVER['REQUEST_METHOD'] == "GET")
{
	getChats();
}
else
{
		header("HTTP/1.1 400 Bad Request - Only GET and POST are supported.");
		die();
}

function newChat()
{
	if(!isset($_SESSION["username"]) || $_SESSION["username"] == "")
	{
		header("HTTP/1.1 401 Unauthorized - Please login before POSTing new chats.");
		die();
	}
	if(!isset($_POST["message"]))
	{
		header("HTTP/1.1 400 Bad Request - Must specify 'message' when POSTing.");
		die();
	}

	global $db;
	$stmt = $db->prepare("INSERT INTO Chats (user, message) VALUES (:user, :message)");

	$stmt->bindValue(":user", $_SESSION["username"]);
	$stmt->bindValue(":message", $_POST["message"]);

	$stmt->execute();
}

function getChats()
{
	session_write_close(); //terrible hack to prevent infinite waiting
	$lastChat=0;

	if(isset($_GET["lastChat"]))
	{
		if(!is_numeric($_GET["lastChat"]))
		{
			header("HTTP/1.1 400 Bad Request - lastChat should be numeric.");
			die();
		}
		else
		{
			$lastChat = $_GET["lastChat"];
		}
	}

	global $db;

	while(true)
	{
		$stmt = $db->prepare("Select * FROM Chats WHERE id > :lastChat ORDER BY id");
		$stmt->bindValue("lastChat", $lastChat);
		$stmt->execute();

		$result = array();

		while($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			$result[] = $row;
		}

		if(empty($result))
		{
			sleep(1);
		}
		else
		{
			echo json_encode($result);
			return;
		}
	}
}
